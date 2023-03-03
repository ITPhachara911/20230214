<?php

     session_start();
     require('../config.php');

     $sql_query = " SELECT * FROM `application` WHERE `Ntion_ID` = '".$_SESSION['national_id']."' AND `TCAS` = ".$_SESSION['TCAS_round']." ;  ";
     $result = $mysqli->query($sql_query);
     $record_number = mysqli_num_rows( $result );

     if( $record_number == 1){
        $personal_data = $result->fetch_assoc();
        $_SESSION['app_data'] = $personal_data;    
     }
   //   print_r( $_SESSION['app_data'] );
     header("Location: ../views/print.php");
?>