<?php

 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '';
 $dbname = 'sdp';
 
 $connect = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

 if( $connect->connect_error )
 {
 	die('Gagal Sambungan : '. $connect->connect_error);
 }
 ?>