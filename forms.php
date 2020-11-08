<?php
  require_once('db.php');
  require('env.php');

  $my_email_addr = getenv('EMAIL');
  
  require('smtp.php');
  

  $json_msg = array();
  
  try {
        if (isset($_POST['action'])) {

          $action = $_POST['action'];
          if ($action == 'masterclass') {

            if ($_POST['name'] & $_POST['email'] & $_POST['address'] & $_POST['phone']) {

              if (getenv('DB_TECH') == 'mysql') {

                $name = $conn->real_escape_string($_POST['name']);
                $by = $email = $conn->real_escape_string($_POST['email']);
                $addr = $conn->real_escape_string($_POST['address']);
                $phone = $conn->real_escape_string($_POST['phone']);

                if ($conn->connect_error) {

                  die('Connection failed: ' .$conn->connect_error. '<br>');

                } else {

                  $sql_insert = 'INSERT INTO masterclass (name, email, address, phone) VALUES ("' .$name. '", "' .$email. '", "' .$addr. '", "' .$phone. '")';

                  if ($conn->query($sql_insert) === TRUE) {
                    
                    $json_msg['sql_insert'] = TRUE;

                  } else {

                    $json_msg['sql_insert'] = FALSE;
                    $json_msg['error'] = $sql_insert .'<br>'. $conn->error .'<br>';

                  };
                  $conn->close();

                };

              } elseif (getenv('DB_TECH') == 'postgresql') {
                
                $name = pg_escape_string($_POST['name']);
                $by = $email = pg_escape_string($_POST['email']);
                $addr = pg_escape_string($_POST['address']);
                $phone = pg_escape_string($_POST['phone']);

                if ($conn_stat === PGSQL_CONNECTION_OK) {

                  echo ' PGSQL_CONNECTION_OK ';
                  $sql_insert = 'INSERT INTO masterclass (name, email, address, phone) VALUES (\'' .$name. '\', \'' .$email. '\', \'' .$addr. '\', \'' .$phone. '\')';
                  $result = pg_query($sql_insert);
                  if (!$result) {
                      
                    $json_msg['sql_insert'] = FALSE;
                    $json_msg['error'] = $sql_insert .' <br>Connection status ok<br> ';
                    echo " An error occurred.\n ";
                    exit;

                  } else {

                    $json_msg['sql_insert'] = TRUE;

                  };
                  pg_close($conn);

                } else {

                  die('Connection status bad');

                };

              };
              
              $mail->setFrom($my_email_addr, 'biwmodels.com masterclass registration form');
              $mail->addAddress($by, $name);
              $mail->addAddress($my_email_addr, 'Farintin Obialor');
              $mail->Subject = 'Masterclass Submission';
              $mail->Body = 'By Email: '. $by .'
'.'Name: '. $name .'
Address: '. $addr .'.
Phone No.: '. $phone;

              /* Finally send the mail. */
              if ($mail->send()) {

                $json_msg['mail_delivery'] = TRUE;

              } else {

                $json_msg['mail_delivery'] = FALSE;

              };

            } else {

              $json_msg['error'] = 'Fill in completely the forms';

            };

          } elseif ($action == 'event') {

            if ($_POST['name'] & $_POST['email'] & $_POST['phone'] & $_POST['message']) {

              if (getenv('DB_TECH') == 'mysql') {

                $name = $conn->real_escape_string($_POST['name']);
                $by = $email = $conn->real_escape_string($_POST['email']);
                $phone = $conn->real_escape_string($_POST['phone']);
                $msg = $conn->real_escape_string($_POST['message']);

                if ($conn->connect_error) {

                  die('Connection failed: ' .$conn->connect_error. '<br>');

                } else {

                  $sql_insert = 'INSERT INTO event (name, email, phone, message) VALUES ("' .$name. '", "' .$email. '", "' .$phone. '", "' .$msg. '")';

                  if ($conn->query($sql_insert) === TRUE) {
                    
                    $json_msg['sql_insert'] = TRUE;

                  } else {

                    $json_msg['sql_insert'] = FALSE;
                    $json_msg['error'] = $sql_insert .'<br>'. $conn->error .'<br>';

                  };
                  $conn->close();

                };

              } elseif (getenv('DB_TECH') == 'postgresql') {
                
                $name = pg_escape_string($_POST['name']);
                $by = $email = pg_escape_string($_POST['email']);
                $phone = pg_escape_string($_POST['phone']);
                $msg = pg_escape_string($_POST['message']);

                if ($conn_stat === PGSQL_CONNECTION_OK) {

                  echo ' PGSQL_CONNECTION_OK ';
                  $sql_insert = 'INSERT INTO event (name, email, phone, message) VALUES (\'' .$name. '\', \'' .$email. '\', \'' .$phone. '\', \'' .$msg. '\')';
                  $result = pg_query($sql_insert);
                  if (!$result) {
                      
                    $json_msg['sql_insert'] = FALSE;
                    $json_msg['error'] = $sql_insert .' <br>Connection status ok<br> ';
                    echo " An error occurred.\n ";
                    exit;

                  } else {

                    $json_msg['sql_insert'] = TRUE;

                  };
                  pg_close($conn);

                } else {

                  die('Connection status bad');

                };

              };
              
              $mail->setFrom($my_email_addr, 'biwmodels.com event question form');
              $mail->addAddress($by, $name);
              $mail->addAddress($my_email_addr, 'Farintin Obialor');
              $mail->Subject = 'Events Submission';
              $mail->Body = 'By: '. $by .'
        '.'Name: '. $name .', phone: '. $phone .'

            '
            . $msg;

              /* Finally send the mail. */
              if ($mail->send()) {

                $json_msg['mail_delivery'] = TRUE;

              } else {

                $json_msg['mail_delivery'] = FALSE;

              };

            } else {

              $json_msg['error'] = 'Fill in completely the forms';

            };

          } elseif ($action == 'newsletter') {

            if ($_POST['email']) {

              if (getenv('DB_TECH') == 'mysql') {

                $by = $email = $conn->real_escape_string($_POST['email']);

                if ($conn->connect_error) {

                  die('Connection failed: ' .$conn->connect_error. '<br>');

                } else {

                  $sql_insert = 'INSERT INTO newsletter (email) VALUES ("' .$email. '")';

                  if ($conn->query($sql_insert) === TRUE) {
                    
                    $json_msg['sql_insert'] = TRUE;

                  } else {

                    $json_msg['sql_insert'] = FALSE;
                    $json_msg['error'] = $sql_insert .'<br>'. $conn->error .'<br>';

                  };
                  $conn->close();

                };

              } elseif (getenv('DB_TECH') == 'postgresql') {
                
                $by = $email = pg_escape_string($_POST['email']);

                if ($conn_stat === PGSQL_CONNECTION_OK) {

                  echo ' PGSQL_CONNECTION_OK ';
                  $sql_insert = 'INSERT INTO newsletter (email) VALUES (\'' .$email. '\')';
                  $result = pg_query($sql_insert);
                  if (!$result) {
                      
                    $json_msg['sql_insert'] = FALSE;
                    $json_msg['error'] = $sql_insert .' <br>Connection status ok<br> ';
                    echo " An error occurred.\n ";
                    exit;

                  } else {

                    $json_msg['sql_insert'] = TRUE;

                  };
                  pg_close($conn);

                } else {

                  die('Connection status bad');

                };

              };
              
              $mail->setFrom($my_email_addr, 'biwmodels.com newsletter form sign up');
              $mail->addAddress($by, 'Subscriber');
              $mail->addAddress($my_email_addr, 'Farintin Obialor');
              $mail->Subject = 'Newsletter SignUp';
              $mail->Body = 'By: '. $by;

              /* Finally send the mail. */
              if ($mail->send()) {

                $json_msg['mail_delivery'] = TRUE;

              } else {

                $json_msg['mail_delivery'] = FALSE;

              };

            } else {

              $json_msg['error'] = 'Fill in completely the forms';

            };

          } else {

              $json_msg['error'] = 'Unknown form request';

          };

        };

  } catch (Exception $e) {

     //$err_array = $mail->getSMTPInstance()->getError();
     //echo '<br>1<br>'.$err_array['smtp_code'];
     $json_msg['error'] = $e->errorMessage();

  } catch (\Exception $e) {

     //echo $e->getCode().'<br>'.$e->getMessage().'<br>2<br>';
     $json_msg['error'] = $e->getMessage();

  };

  $fp = fopen('msg.json', 'w') or die("Unable to open file!");
  fwrite($fp, json_encode($json_msg));
  fclose($fp);

?>