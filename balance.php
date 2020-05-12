<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'config.php';
$sql = "select * FROM user where id='{$_POST["id"]}'";
$result = $mysqli->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    echo $row["balance"];
} else {
    echo 0.00;
}