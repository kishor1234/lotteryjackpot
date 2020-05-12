<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'config.php';
$point = 0;
//$_POST["first"] = "2";
//$_POST["second"] = "2";
//$_POST["third"] = "2";

if ((((int) $_POST["first"] - (int) $_POST["second"]) == 0)) {
    $point = 200;
}
if ((((int) $_POST["second"] - (int) $_POST["third"]) == 0)) {
    $point = 200;
}
if ((((int) $_POST["first"] - (int) $_POST["third"]) == 0)) {
    $point = 200;
}
if ((((int) $_POST["first"] - (int) $_POST["second"]) == 0) && (((int) $_POST["second"] - (int) $_POST["third"]) == 0) && (((int) $_POST["first"] - (int) $_POST["third"]) == 0)) {
    $point = 500;
}

$sql = "INSERT INTO `userredim`( `id`, `first`, `second`, `third`, `point`) VALUES ('{$_POST["id"]}','{$_POST["first"]}','{$_POST["second"]}','{$_POST["third"]}','{$point}')";
$sqls = "update  user set balance=balance+{$point} where id='{$_POST['id']}'";
if ($mysqli->query($sql)) {
    $mysqli->query($sqls);
    $_SESSION["count"] = ($_SESSION["count"] + 1);
    if ($_SESSION["count"] >= 3) {
        $time = strtotime(date("H:i:s"));
        $endTime = date("H:i:s", strtotime('+30 minutes', $time));
        $sqls = "update  user set block='1',blocktime='{$endTime}' where id='{$_POST['id']}'";
        $mysqli->query($sqls);
    }
    echo json_encode(array("status"=>"1","point"=>$point));
} else {
    echo json_encode(array("status"=>"0","point"=>$point));
}