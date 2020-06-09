<?php

date_default_timezone_set('Africa/Luanda');
require './lib/autoload.php';
$smarty = new Template();

if (!isset($_SESSION)) {
    session_start();
}

/*
  if(!isset($_SESSION['PED']['pedido'])){
  $_SESSION['pedido'] = md5(uniqid(date('YmdHms')));
  }

  if(!isset($_SESSION['PED']['ref'])){
  $_SESSION['ref'] = date('ymdHms');
  }
 */


$login = new Login();

// print_r($_SESSION['USER']['Codigo']);

if (isset($_POST['txt_logar']) && isset($_POST['txt_email'])) {
    $user = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    if (strlen($senha) < 6 || strlen($senha) > 10) {
        $login->setAlert("Preencha sua <u>senha</u> corretamente.", 1);
    } else {
        if ($login->GetLoginADM($user, $senha)) {
            Rotas::Redirecionar(0, 'adm/index.php');
            exit();
        } else {
            $login->setAlert('Usuário não encontrado. Verifique sua senha ou contacte o Administrador');
        }
    }
}


$smarty->assign('TITULO_SITE', Config::SITE_NOME);


$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('GET_SITE_ADM', Rotas::get_SiteADM());
//$smarty->assign('LOGO', Rotas::ImageLink("logo.png", 150, 20));
$smarty->assign('IM', array(
    Rotas::get_ImageURL() . "1.jpg",
    Rotas::get_ImageURL() . "2.jpg",
    Rotas::get_ImageURL() . "3.jpg",
    Rotas::get_ImageURL() . "4.jpg",
    Rotas::get_ImageURL() . "5.jpg",
    Rotas::get_ImageURL() . "6.jpg")
);


$smarty->assign('IG', array(
    Rotas::get_ImageURL() . "galeria/1.jpg",
    Rotas::get_ImageURL() . "galeria/2.jpg",
    Rotas::get_ImageURL() . "galeria/3.jpg",
    Rotas::get_ImageURL() . "galeria/4.jpg",
    Rotas::get_ImageURL() . "galeria/5.jpg",
    Rotas::get_ImageURL() . "galeria/6.jpg")
);

$smarty->assign('CARR1A', Rotas::ImageLink("banner1.png", 2000, 400));
$smarty->assign('CARR1B', Rotas::ImageLink("banner2.png", 1400, 400));
$smarty->assign('CARR1C', Rotas::ImageLink("banner3.png", 800, 400));
$smarty->assign('CARR1D', Rotas::ImageLink("banner4.png", 600, 400));
$smarty->assign('FB', Rotas::ImageLink("face.png", 40, 40));
$smarty->assign('FB1', Rotas::ImageLink("you.png", 40, 40));
$smarty->assign('FB2', Rotas::ImageLink("g.png", 40, 40));
$smarty->assign('FB3', Rotas::ImageLink("w.png", 40, 40));
$smarty->assign('FB4', Rotas::ImageLink("in.jpg", 40, 40));
$smarty->assign('FB5', Rotas::ImageLink("TWU.png", 40, 40));
$smarty->assign('LOGO', Rotas::ImageLink("logo.png", 87, 49));
$smarty->assign('FUNDO', Rotas::get_ImagePasta() . "0.png");
$smarty->assign('SMS_ERRO', $login->alert);
$login->setAlert();
$smarty->display('index.tpl');
?>