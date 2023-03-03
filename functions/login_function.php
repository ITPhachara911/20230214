<?php
    session_start();
    require('../config.php');
    // print_r( $_REQUEST );

    $national_id = $mysqli->real_escape_string( $_POST['inputNationalID'] );
    $tcas_round = $mysqli->real_escape_string( $_POST['inputTCASRound'] );
    $sql_query = " SELECT * FROM `application` WHERE `Ntion_ID` = '".$national_id."' AND `TCAS` = ".$tcas_round." ;  ";
    // echo $sql_query;

    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    // print( $record_number );

    // unset($_SESSION['app_data']);
    if( $record_number == 1 ){

        $personal_data = $result->fetch_assoc();
        // if($personal_data['TCAS'] != $tcas_round ){
        //     $_SESSION['new_national_id'] = $national_id;
        //     $_SESSION['new_TCAS_round'] = $tcas_round;
        //     $_SESSION['app_data'] = $personal_data;
        //     $_SESSION['national_id'] = $personal_data['Ntion_ID'];  
        // }else{
              // Associative array              
        $_SESSION['national_id'] = $personal_data['Ntion_ID'];        
        $_SESSION['TCAS_round'] = $personal_data['TCAS'];        
        $_SESSION['app_data'] = $personal_data;
        $_SESSION['new_national_id'] = $national_id;
        $_SESSION['new_TCAS_round'] = $tcas_round;
        // }
      
    }    
    else{
        $_SESSION['new_national_id'] = $national_id;
        $_SESSION['new_TCAS_round'] = $tcas_round;
        // $_SESSION['app_data'] = array();
    }
    
    header("Location: ../views/form1.php");
    


?>