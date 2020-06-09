<?php

$id = 0;
$valores = array();
$smarty = new Template();

$password = new Password();
$smarty->assign('PAG_EDIT', Rotas::pag_DetPassword());
$smarty->assign('PAG_PASSWORD', Rotas::pag_Password());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Utilizador" => '',
    "Token" => '',
    "Codigo_Estado" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'Token' => $_GET['Token'],
        'Codigo_Estado' => $_GET['Codigo_Estado']
    );
    if ($password->Grava($valores)) {
        $password->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $password->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Password());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $password->GetPasswordID($id);
        foreach ($password->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $password->alert);
$smarty->display('det_password.tpl');
?>
  