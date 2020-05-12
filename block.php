<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
include 'config.php';
$sql = "select * FROM user where id='{$_POST["id"]}'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if ($row["block"] === "1") {
    $starttimestamp = strtotime(data["H:i:s"]);
    //$endtimestamp = strtotime($row["blocktime"]);
    $difference = (int)strtotime($row["blocktime"])-(int)strtotime(date("H:i:s"));
    echo json_encode(array("status"=>"1","diff"=>$difference));
}else{
    echo json_encode(array("status"=>"0","diff"=>0));
}
