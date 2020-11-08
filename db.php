<?php
require('env.php');

if (getenv('DB_TECH') == 'mysql') {
    if (getenv('ENV') == 'dev') {
      $db_conn = new mysqli('localhost', 'root', '', 'biw-landing-page');

    } elseif (getenv('ENV') == 'pro') {
      $db_conn = new mysqli(getenv('MYSQL_HOST'), getenv('MYSQL_USERNAME'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DB_NAME'));
    };

} elseif (getenv('DB_TECH') == 'pgsql') {
    if (getenv('ENV') == 'dev') {
      //echo $password;
      $db_conn = pg_connect('host=localhost dbname=biw-landing-page user=postgres password='.getenv('PGSQL_PWD')) or die("Could not connect");
      echo "Connected successfully\n";

    } elseif (getenv('ENV') == 'pro') {
      $db_conn = pg_connect(getenv("DB_URL")) or die("Could not connect");

    };
    $db_conn_stat = pg_connection_status($db_conn);
    echo $db_conn_stat;

};

?>