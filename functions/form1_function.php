<?php
    session_start();
    require('../config.php');
    // print_r( $_POST );



    $fname = $mysqli->real_escape_string( $_POST['th_firstname'] );
    $lname = $mysqli->real_escape_string( $_POST['th_lastname'] );

    $selected_religion = $_POST['religion'];
    if( $selected_religion == -1 ){
        $selected_religion = $_POST['other_religion'];
    }    
    $selected_ethnicity = $_POST['ethnicity'];
    if( $selected_ethnicity == -1 ){
        $selected_ethnicity = $_POST['other_ethnicity'];
    }    
    $selected_nationality = $_POST['nationality'];
    if( $selected_nationality == -1 ){
        $selected_nationality = $_POST['other_nationality'];
    } 
    
    $date = "'".date('Y-m-d', strtotime(str_replace('-', '/', $_POST['app_birthday'])))."'";

    // CHECK existing record
    $sql_query = " SELECT * FROM `application` WHERE `Ntion_ID` = '".$_SESSION['new_national_id']."' AND `TCAS` = ".$_SESSION['TCAS_round']." ;  ";
    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    //  print( $record_number." ".$date );

    if( $record_number == 1 ){
        $update_sql = " UPDATE `application` SET  `Region` = '".$selected_religion."', 
                                        `prefix_TH` =  '".$_POST['th_prefix']."',
                                        `Fristname_TH` = '".$_POST['th_firstname']."',
                                        `lastname_TH` =  '".$_POST['th_lastname']."',
                                        `prefix_EN` = '".$_POST['en_prefix']."',
                                        `Fristname_EN` =  '".$_POST['en_firstname']."',
                                        `lastname_EN` = '".$_POST['en_lastname']."',
                                        `Ethnicity` = '".$selected_ethnicity."',
                                        `Nationality` =  '".$selected_nationality."',
                                        `Address` =  '".$_POST['Address']."',
                                        `street` = '".$_POST['street']."',
                                        `Province` =  '".$_POST['Province']."',
                                        `District` = '".$_POST['District']."',
                                        `sub_District` =  '".$_POST['sub_District']."',
                                        `Zipcode` = '".$_POST['zipcode']."',
                                        `Telephone` =  '".$_POST['Telephone']."',
                                        `Email` = '".$_POST['Email']."',
                                        `Birthday` =  ".$date."
                                         WHERE Ntion_ID = '".$_SESSION['new_national_id']."' ;";
        // echo $update_sql;
        $mysqli->query($update_sql);


    }
    else{
        $insert_sql = "INSERT INTO `application` (`TCAS`, `prefix_TH`, `Fristname_TH`, `lastname_TH`, `prefix_EN`, `Fristname_EN`, `lastname_EN`, `Birthday`, `Ethnicity`, `Nationality`, `Region`, `Address`,`street`,`Province`,`District`,`sub_District`,`Zipcode`,`Telephone`,`Email`,`Ntion_ID`)
        VALUES ('".$_SESSION['TCAS_round']."','".$_POST['th_prefix']."','".$_POST['th_firstname']."','".$_POST['th_lastname']."','".$_POST['en_prefix']."','".$_POST['en_firstname']."','".$_POST['en_lastname']."',".$date.",'".$_POST['ethnicity']."','".$_POST['nationality']."','".$selected_religion."','".$_POST['Address']."','".$_POST['street']."','".$_POST['Province']."','".$_POST['District']."','".$_POST['sub_District']."','".$_POST['zipcode']."','".$_POST['Telephone']."','".$_POST['Email']."','".$_SESSION['new_national_id']."') ";
        $mysqli->query($insert_sql);
    }




    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;



    header("Location: ../views/form2.php");

?>