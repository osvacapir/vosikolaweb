<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author TECNOLOGIA
 */
//put your code here
define(
        "DATA_LAYER_CONFIG", [
    "driver" => "mysql",    "host" => "localhost",    "port" => "3366",    "dbname" => "u578573205_osiko",    "username" => "u578573205_osiko",    "passwd" => "avatarbd",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
        ]
);
