<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_mysqliConfiguration = array(
    "host" => "localhost",
    "port" => "3307",
    "username" => "root",
    "password" => "root@123",
    "database" => "jackpot",
    "socket" => ""
);

$mysqli = new mysqli($_mysqliConfiguration["host"].":".$_mysqliConfiguration["port"], $_mysqliConfiguration["username"], $_mysqliConfiguration["password"], $_mysqliConfiguration["database"]);
