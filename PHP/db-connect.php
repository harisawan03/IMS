<?php

// used for all php scripts to make connection to database

$serverName = "RVC-INVENTORY";

$connectionInfo = array( "Database"=>"RVC-INVENTORY");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( !$conn ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>