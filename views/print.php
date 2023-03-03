<?php 
    session_start();
    // print_r( $_SESSION['app_data'] )
    
    if(!isset($_SESSION['new_national_id'])){
        header("Location: ../views/login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าปริ้น</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

<!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../assets/css/form-validation.css" rel="stylesheet">
</head>
<body>
        <div class="container">
            <div class="text-center">
                <h1> ชื่อ <?php echo $_SESSION['app_data']['Fristname_TH']." ".$_SESSION['app_data']['lastname_TH']  ?> </h1>
            </div>
        </div>
</body>
</html>