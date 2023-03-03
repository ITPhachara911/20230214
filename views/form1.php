<?php
    session_start();
    require('../config.php');

    if(!isset($_SESSION['new_national_id'])){
        header("Location: ../views/login.php");
    }
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>ข้อมูลส่วนตัว</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/form-validation.css" rel="stylesheet">
</head>
<style>
.app_subsection {
    padding-top: 20px;
    color: red;
    font-weight: 800;
    font-size: 120%;
}
</style>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="mb-4" src="../assets/images/KU_Logo.png" alt="" width="100">
            <h2>กรอกข้อมูลส่วนตัว</h2>
            <p class="lead">
                <?php echo isset($_SESSION['national_id']) ? "ผู้สมัคร : ".$_SESSION['app_data']['prefix_TH']." ".$_SESSION['app_data']['Fristname_TH']." ".$_SESSION['app_data']['lastname_TH']."  ( รอบ".$_SESSION['new_TCAS_round']." ) "  : "ผู้สมัครใหม่";  ?>
            </p>
        </div>



        <form class="form-signin" action="../functions/form1_function.php" method="POST">
            <div>
                ข้อมูลส่วนบุคคลอ้างอิงจากบัตรประชาชน<br><br>
                <label for="">เลขประจำตัวประชาชน</label>
                <input class=" form-control " type="text"
                    value=" <?php echo isset($_SESSION['national_id']) ?  $_SESSION['national_id'] : $_SESSION['new_national_id'] ;  ?> ">
                <div class="app_subsection">
                    ข้อมูลภาษาไทย
                </div>
                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12 form-group">
                        <label for="th_prefix">คำนำหน้า</label><br>
                        <select name="th_prefix" id="th_prefix">
                            <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['prefix_TH']=='นาย') {
                                            echo 'selected="selected"';
                                       } ?> value="นาย">นาย</option>
                            <option <?php if(isset($_SESSION['app_data']) && $_SESSION['app_data']['prefix_TH']=='นาง') {
                                            echo 'selected="selected"';
                                       } ?> value="นาง">นาง</option>
                            <option <?php if(isset($_SESSION['app_data']) && $_SESSION['app_data']['prefix_TH']=='นางสาว') {
                                            echo 'selected="selected"';
                                       } ?> value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <?php
                        $th_firstname_value = "";
                        if( isset( $_SESSION['app_data']['Fristname_TH'] ) ){
                            $th_firstname_value = $_SESSION['app_data']['Fristname_TH'] ; 
                        }                    
                    ?>

                    <div class="col-lg-4 col-12 form-group">
                        <label for="th_firstname">ชื่อ</label>
                        <input value="<?php echo $th_firstname_value ?>" type="text" class="form-control"
                            id="th_firstname" name="th_firstname" placeholder="ชื่อภาษาไทย">
                    </div>

                    <?php
                        $th_lastname_value = "";
                        if( isset( $_SESSION['app_data']['lastname_TH'] ) ){
                            $th_lastname_value = $_SESSION['app_data']['lastname_TH'] ; 
                        }                    
                    ?>

                    <div class="col-lg-4 col-12 form-group">
                        <label for="th_lastname">นามสกุล</label>
                        <input value="<?php echo $th_lastname_value  ?>" type="text" class="form-control"
                            id="th_lastname" name="th_lastname" placeholder="นามสกุลภาษาไทย">
                    </div>
                </div>


                <div class="app_subsection">
                    ข้อมูลอังกฤษ
                </div>
                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12  form-group">
                        <label for="en_prefix">Prefix</label><br>
                        <select class="form-select" aria-label="Default select example" name="en_prefix" id="en_prefix">
                            <option <?php if( isset($_SESSION['app_data']) &&  $_SESSION['app_data']['prefix_EN']=='Mr.') {
                                            echo 'selected="selected"';
                                       } ?> value="Mr.">Mr.</option>
                            <option <?php if(isset($_SESSION['app_data']) &&  $_SESSION['app_data']['prefix_EN']=='Ms.') {
                                            echo 'selected="selected"';
                                       } ?> value="Ms.">Ms.</option>
                            <option <?php if(isset($_SESSION['app_data']) &&  $_SESSION['app_data']['prefix_EN']=='Mrs.') {
                                            echo 'selected="selected"';
                                       } ?> value="Mrs.">Mrs.</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-12 form-group">

                        <?php
                        $en_firstname_value = "";
                        if( isset( $_SESSION['app_data']['Fristname_EN'] ) ){
                            $en_firstname_value = $_SESSION['app_data']['Fristname_EN'] ; 
                        }                    
                    ?>

                        <label for="en_firstname">Firstname</label>
                        <input type="text" class="form-control" id="en_firstname" name="en_firstname"
                            placeholder="Firstname" value="<?php echo $en_firstname_value;  ?>">
                    </div>


                    <?php
                        $en_lasttname_value = "";
                        if( isset( $_SESSION['app_data']['lastname_EN'] ) ){
                            $en_lasttname_value = $_SESSION['app_data']['lastname_EN'] ; 
                        }                    
                    ?>

                    <div class="col-lg-4 col-12 form-group">
                        <label for="en_lastname">Lastname</label>
                        <input value="<?php echo $en_lasttname_value ?>" placeholder="Lastname" type="text"
                            class="form-control" id="en_lastname" name="en_lastname">
                    </div>
                </div>

                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-12 col-12 form-group">
                        <?php
                        $birthday_value = "";
                        if( isset( $_SESSION['app_data']['Birthday'] ) ){
                            $birthday_value = $_SESSION['app_data']['Birthday'] ; 
                        }                    
                    ?>
                        <label for="app_birthday">วัน/เดือน/ปี เกิด</label>
                        <input type="text" class="form-control" id="app_birthday" name="app_birthday"
                            placeholder="Birthday" value="<?php echo $birthday_value; ?>">
                    </div>
                </div>


                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12  form-group">
                        <label for="ethnicity">เชื้อชาติ</label><br>
                        <select name="ethnicity" id="ethnicity">
                            <option <?php 
                        if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Ethnicity'] == 'ไทย'){
                            echo 'selected="selected"';
                        }
                        ?> value="ไทย">ไทย</option>
                            <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Ethnicity'] != 'ไทย'){
                             echo 'selected="selected"';
                        }  ?> value="-1">อื่นๆ</option>
                        </select>
                        <input value=" <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Ethnicity'] != 'ไทย'){
                            echo $_SESSION['app_data']['Ethnicity'];
                    } ?> " type="text" name="other_ethnicity" id="other_ethnicity" style="display:none<?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Ethnicity'] != 'ไทย'){
                        echo "a";
                } ?>;">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <label for="nationality">สัญชาติ</label><br>
                        <select name="nationality" id="nationality">
                            <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Nationality'] == 'ไทย'){
                             echo 'selected="selected"';
                        }  ?> value="ไทย">ไทย</option>
                            <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Nationality'] != 'ไทย'){
                             echo 'selected="selected"';
                        }  ?> value="-1">อื่นๆ</option>
                        </select>
                        <input value=" <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Nationality'] != 'ไทย') {
                          echo   $_SESSION['app_data']['Nationality'];                               }
                    ?>  " type="text" name="other_nationality" id="other_nationality" style="display:none<?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Nationality'] != 'ไทย'){
                        echo "a";
                    } ?>;">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <label for="religion">ศาสนา</label><br>
                        <select name="religion" id="religion">
                            <option <?php if( isset($_SESSION['app_data']) &&  $_SESSION['app_data']['Region']=='พุทธ') {
                                            echo 'selected="selected"';
                                       } ?> value="พุทธ">พุทธ</option>
                            <option <?php if( isset($_SESSION['app_data']) &&  $_SESSION['app_data']['Region']=='คริสต์') {
                                            echo 'selected="selected"';
                                       } ?> value="คริสต์">คริสต์</option>
                            <option <?php if( isset($_SESSION['app_data']) &&  $_SESSION['app_data']['Region']=='อิสลาม') {
                                            echo 'selected="selected"';
                                       } ?> value="อิสลาม">อิสลาม</option>
                            <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Region'] != 'พุทธ' &&  $_SESSION['app_data']['Region'] != 'คริสต์' &&  $_SESSION['app_data']['Region'] != 'อิสลาม') {
                                            echo 'selected="selected"';
                                       } ?> value="-1">อื่นๆ</option>
                        </select>
                        <input value="<?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Region'] != 'พุทธ' &&  $_SESSION['app_data']['Region'] != 'คริสต์' &&  $_SESSION['app_data']['Region'] != 'อิสลาม'){

                            echo   $_SESSION['app_data']['Region'] ;

                    }
                    
                    ?> " type="text" name="other_religion" id="other_religion" style="display:none <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['Region'] != 'พุทธ' &&  $_SESSION['app_data']['Region'] != 'คริสต์' &&  $_SESSION['app_data']['Region'] != 'อิสลาม'){

                        echo   "a";

                }
                
                ?>;">
                    </div>
                </div>


                <div class="app_subsection">
                    ข้อมูลติดต่อ
                </div>

                ที่อยู่ที่สามารถติดต่อได้


                <div class="col-lg-12 col-12 row ">
                    <div class="col-4 form-group ">
                        <label for="Address">บ้านเลขที่/หมู่/ชื่อหมูบ้าน(เรียงตามลำดับ)</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Address'])) {
                                            echo $_SESSION['app_data']['Address'];
                                       } ?>" type="text" class="form-control" id="Address" name="Address"
                            placeholder="บ้านเลขที่/หมู่/ชื่อหมูบ้าน">
                    </div>

                    <div class="col-4 form-group ">
                        <label for="street">ถนน</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['street'])) {
                                            echo $_SESSION['app_data']['street'];
                                       } ?>" type="text" class="form-control" id="street" name="street"
                            placeholder="ถนน">
                    </div>

                    <div class="col-4 form-group ">
                        <label for="sub_District">ตำบล</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['sub_District'])) {
                                            echo $_SESSION['app_data']['sub_District'];
                                       } ?>" type="text" class="form-control" id="sub_District" name="sub_District"
                            placeholder="ตำบล">
                    </div>
                    <div class="col-4 form-group ">
                        <label for="District">อำเภอ</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['District'])) {
                                            echo $_SESSION['app_data']['District'];
                                       } ?>" type="text" class="form-control" id="District" name="District"
                            placeholder="อำเภอ">
                    </div>

                    <div class="col-4 form-group ">
                        <label for="Province">จังหวัด</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Province'])) {
                                            echo $_SESSION['app_data']['Province'];
                                       } ?>" type="text" class="form-control" id="Province" name="Province"
                            placeholder="จังหวัด">
                    </div>


                    <div class="col-4 form-group ">
                        <label for="zipcode">รหัสไปรษณีย์</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Zipcode'])) {
                                            echo $_SESSION['app_data']['Zipcode'];
                                       } ?>" type="text" class="form-control" id="zipcode" name="zipcode"
                            placeholder="รหัสไปรษณีย์">
                    </div>
                    <div class="col-4 form-group ">
                        <label for="Email">อีเมล</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Email'])) {
                                            echo $_SESSION['app_data']['Email'];
                                       } ?>" type="email" class="form-control" id="Email" name="Email"
                            placeholder="อีเมล">
                    </div>
                    <div class="col-4 form-group ">
                        <label for="Telephone">เบอร์โทร</label>
                        <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Telephone'])) {
                                            echo $_SESSION['app_data']['Telephone'];
                                       } ?>" type="text" class="form-control" id="Telephone" name="Telephone"
                            placeholder="เบอร์โทร">
                    </div>
                </div>






            </div>

            <div style="padding-top:18px;">
                <button class="btn btn-sm btn-primary btn-block" type="submit">หน้าต่อไป</button>
            </div>
        </form>

        <!-- <?php
        
            // for($i=0;$i<20;$i++){
            //     echo "<br>";
            // }
        ?> -->

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2018 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <link rel="stylesheet" href="../assets/jquery-ui/jquery-ui.css">

    <script src="../assets/jquery-ui/jquery.js"></script>
    <script src="../assets/jquery-ui/jquery-ui.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script type="text/javascript">

    </script>


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {



        'use strict';

        $("#app_birthday").datepicker();
        $("#app_birthday").datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $("#religion").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_religion").show();
                $("#other_religion").focus();
            } else {
                $("#other_religion").hide()
            }

        });

        $("#ethnicity").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_ethnicity").show();
                $("#other_ethnicity").focus();
            } else {
                $("#other_ethnicity").hide()
            }

        });

        $("#nationality").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_nationality").show();
                $("#other_nationality").focus();
            } else {
                $("#other_nationality").hide()
            }

        });



        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>

</html>