<?php

$id = 0;
$valores = array();
$smarty = new Template();

$log = new Log();
$smarty->assign('PAG_EDIT', Rotas::pag_DetLog());
$smarty->assign('PAG_LOG', Rotas::pag_Log());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(
    "Codigo" => '',
    "Descricao" => '',
    "OBS" => '',
    "Data" => '',
    "CodigoUtilizador" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Descricao' => $_GET['Descricao'],
        'OBS' => $_GET['OBS'],
        'Data' => $_GET['Data'],
        'CodigoUtilizador' => $_GET['CodigoUtilizador']
    );
    if ($log->Grava($valores)) {
        $log->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $log->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Log());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $log->GetLogID($id);
        foreach ($log->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $log->alert);
$smarty->display('det_log.tpl');
?>
  