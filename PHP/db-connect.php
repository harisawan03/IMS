<?php

// used for all php scripts to make connection to database

$serverName = "RVC-INVENTORY";
$serverNameDemo = "HARIS-PC"; 

$connectionInfo = array( "Database"=>"RVC-INVENTORY");
$connectionInfoDemo = array( "Database"=>"IMS-DEMO");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( !$conn ) {
     $conn = sqlsrv_connect( $serverNameDemo, $connectionInfoDemo);

     if ( !$conn ) {
          echo "Connection could not be established.<br />";
          die( print_r( sqlsrv_errors(), true));
     }
}

?>
