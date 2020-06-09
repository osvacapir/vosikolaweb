<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tentativalogin = new TentativaLogin();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTentativaLogin());
$smarty->assign('PAG_TENTATIVALOGIN', Rotas::pag_TentativaLogin());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Usuario" => '',
    "Data_Tentativa" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Codigo_Usuario' => $_GET['Codigo_Usuario'],
        'Data_Tentativa' => $_GET['Data_Tentativa']
    );
    if ($tentativalogin->Grava($valores)) {
        $tentativalogin->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tentativalogin->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_TentativaLogin());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tentativalogin->GetTentativaLoginID($id);
        foreach ($tentativalogin->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tentativalogin->alert);
$smarty->display('det_tentativalogin.tpl');
?>
  