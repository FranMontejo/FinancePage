<?php

include 'dbConnection.php';

//abrir la bd
$conn = OpenCon();

// variables html
$moneyValue = intval(htmlspecialchars($_REQUEST['moneyInput']));
$option = stringOption();
$date = date('Y-m-d');

//operaciones con la bd
$sql = "INSERT INTO ingreso (incomeValue,incomeDate,incomeType) values ('$moneyValue','$date','$option')";


//verifico conexicon con la bd
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    if($conn->query($sql) === TRUE){
        echo '<script>alert("Ingreso guardado de forma correcta.")</script>';
        header("Location: index.html", true, 301);
        
    }
    else{
        echo"Error en la base de datos";
        
    }

    
    function stringOption(){
        $op = htmlspecialchars($_REQUEST['optionReason']);
        $st = 'trabajo';
        if($op == 1){
            $st = 'beca';
        }   
    
        return $st;
    }

