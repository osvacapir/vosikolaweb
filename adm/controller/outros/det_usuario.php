<?php
  $id = 0;
$valores = array();
$smarty = new Template();
$usuar = new Usuario();

$smarty->assign('PAG_EDIT', Rotas::pag_DetUsuario());
$smarty->assign('PAG_USUARIO', Rotas::pag_Usuario());

$valores = array(
    "Codigo" => '',
    "Nome" => '',
    "User" => '',
    "Passe" => '',
    "Codigo_Tipo_Utilizador" => '',
    "DataCadastro" => '',
    "LoginStatus" => '',
    "Tempo" => ''
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Nome" => $_GET['Nome'],
        "User" => $_GET['User'],
        "Passe" => $_GET['Passe'],
        "Codigo_Tipo_Utilizador" => $_GET['Codigo_Tipo_Utilizador'],
        "DataCadastro" => $_GET['DataCadastro'],
        "LoginStatus" => $_GET['LoginStatus'],
        "Tempo" => $_GET['Tempo']
    );

    if ($usuar->Grava($valores)) {
        $usuar->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $usuar->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Usuario());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $usuar->GetUsuarioID($id);
        foreach ($usuar->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        
    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $usuar->alert);
$smarty->display('det_usuario.tpl');
?>
  