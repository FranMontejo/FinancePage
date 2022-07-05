<?php

include 'dbConnection.php';

//abrir la bd
$conn = OpenCon();

// variables html
$moneyValue = intval(htmlspecialchars($_REQUEST['moneyInput']));
$option = stringOption();
$date = date('Y-m-d');
echo $moneyValue;

//verificaciones de datos



//operaciones con la bd
$sql = "INSERT INTO gasto (moneyValue,spentDate,spentType) values ('$moneyValue','$date','$option')";


//verifico conexicon con la bd
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    if($conn->query($sql) === TRUE){
        
        echo "Se ha registrado correctamente el gasto!";
        header("Location: index.html", true, 301);
    }
    else{
        echo"Error en la base de datos";
        
    }


    function stringOption(){
        $op = htmlspecialchars($_REQUEST['optionReason']);
        
        switch($op){
            case 1: return 'transporte';
            case 2: return 'facultad';
            case 3: return 'otros';
        }

    }



?>