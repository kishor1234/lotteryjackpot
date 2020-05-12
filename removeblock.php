<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
include 'config.php';
$sqls = "update  user set block='0',blocktime='' where id='{$_POST['id']}'";
$mysqli->query($sqls);
echo json_encode(array("status"=>"1","diff"=>0));
