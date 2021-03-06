<?php
session_start();
require_once "../includeAdmin/classes/adminClass.php";


if(isset($_POST['register'])) {
    $user = new Admin(); 

    if($_GET['table'] == "customers") {

        $customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_MAGIC_QUOTES);
        $contactLastName = filter_input(INPUT_POST, 'contactLastName', FILTER_SANITIZE_MAGIC_QUOTES);
        $contactFirstName = filter_input(INPUT_POST, 'contactFirstName', FILTER_SANITIZE_MAGIC_QUOTES);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_MAGIC_QUOTES);
        $addressLine1 = filter_input(INPUT_POST, 'addressLine1', FILTER_SANITIZE_MAGIC_QUOTES);
        $addressLine2 = filter_input(INPUT_POST, 'addressLine2', FILTER_SANITIZE_MAGIC_QUOTES);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_MAGIC_QUOTES);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_MAGIC_QUOTES);
        $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_MAGIC_QUOTES);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_MAGIC_QUOTES);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
     
        if ($user->registerCustomer2( $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, 
        $addressLine2, $city, $state, $postalCode, $country, $username, $password)) {
            header('Location: skapaAccAdmin.php');
            exit;
        } else { 
        }   


    }
    else if($_GET['table'] == "employees") {
        
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_MAGIC_QUOTES);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_MAGIC_QUOTES);
        $extension = filter_input(INPUT_POST, 'extension', FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_MAGIC_QUOTES);
        $officeCode = filter_input(INPUT_POST, 'officeCode', FILTER_SANITIZE_MAGIC_QUOTES);
        $reportsTo = filter_input(INPUT_POST, 'reportsTo', FILTER_SANITIZE_NUMBER_INT);
        $jobTitle = filter_input(INPUT_POST, 'jobTitle', FILTER_SANITIZE_MAGIC_QUOTES);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
        $admin = filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_NUMBER_INT);

        if ($user->registerAdmin2($lastName, $firstName, $extension, $email, $officeCode, $reportsTo, 
                $jobTitle, $username, $password, $admin)) {
                    header('Location: skapaAccAdmin.php');
            exit;
        } else { 
        }
    }
    else {
        echo "choose table :)";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Skapa Konto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" media="screen" href="../includeAdmin/css/header.css">
     <link rel="stylesheet" type="text/css" media="screen" href="../includeAdmin/css/main.css">


    <script src="main.js"></script>
    
</head>
<body>

    <div class="container">

        <?php 
        require_once '../includeAdmin/other/header.php';
        ?>
        <main class="mainChild main"> 
                    <div class="row bg_1">
                         <h1><i> Registrera </i></h1>

                        <?php 
                            
                        ?>
                         <form method="get" action="#">
                            <select name="table">
                                <option value="-">-</option>
                                <option value="customers">Customer</option>
                                <option value="employees"> Employee</option>
                            </select>
                            <input type="submit" name="showInputs" value="Hämta Inputs">
                        </form>
                        <form method="post" class="">

                            <?php 
                            if(isset($_GET['showInputs']) ) {
                                // Hämtar angiven tabell. 
                                $selected_val = $_GET['table'];                                 
                                $user = new Admin();
                                // Hämtar kolumnerna från databasen som är kopplade till tabellen. 
                                $user->registerTest($selected_val);
                                                            
                            echo "  <div class='col-3 input-effect regContainer'>
                                        <input type='submit' name='register' class='effect-19 reg' value='Register'>
                                    </div> <br><br>";                               
                            } 
                             ?>
                        </form>
            </div>
        </main>
    </div>
</body>
</html>


