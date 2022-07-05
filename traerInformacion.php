<?php

    include 'dbConnection.php';

    function fillBlanks ($type){
        $conn = OpenCon();

        if($type == 'ingreso') $sql = "SELECT SUM(incomeValue) AS sum FROM ingreso";
        else $sql = "SELECT SUM(moneyValue) AS sum FROM gasto";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['sum'];

        }
        
        
    }


    function result(){

        $conn = OpenCon();

        $sql = "SELECT SUM(incomeValue) AS sum FROM ingreso";
        $sql2 = "SELECT SUM(moneyValue) AS gasto FROM gasto";

        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        if ($result->num_rows > 0  && $result2->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row2 = $result2->fetch_assoc();
            echo intval($row['sum']) - intval($row2['gasto']);

        }

    }


?>