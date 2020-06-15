<?php

$con = CoffeeCode\DataLayer\Connect::getInstance();
$erro = CoffeeCode\DataLayer\Connect::getError();
/* $con->getInstance();
  $con->getError();
 * 
 */
if ($erro) {
    echo '<pre>';
    print_r($con);
    echo '</pre>';
} else {
    $provincia = new Provincia();
    echo '<pre>';
    print_r($provincia->find()->data());
    echo '</pre>';
    //$provincia->find();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

