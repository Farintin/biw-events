<?php
require('db.php');

if (getenv('DB_TECHNOLOGY') == 'mysql') {
    if ($conn->connect_error) {
      die('Connection failed: ' .$conn->connect_error. '<br>');
    } else {


    };
};
?>