<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'config.php';
$point = 0;

$sql = "update  user set balance=balance-{$_POST["point"]} where id='{$_POST['id']}'";
if ($mysqli->query($sql)) {
   
    echo json_encode(array("status"=>"1","point"=>$point));
} else {
    echo json_encode(array("status"=>"0","point"=>$point));
}