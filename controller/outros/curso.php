<?php
$smarty = new Template();

if (isset($_POST['ok'])) {
    echo "CLICADO";
} else {
     echo " NAO CLICADO";
}

$smarty->display('curso.tpl');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

