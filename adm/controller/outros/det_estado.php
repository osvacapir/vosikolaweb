<?php

$id = 0;
$valores = array();
$smarty = new Template();

$estado = new Estado();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEstado());
$smarty->assign('PAG_ESTADO', Rotas::pag_Estado());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if  ($estado->Grava($valores)){
        $estado->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $estado->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Estado());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $estado->GetEstadoID($id);
        foreach ($estado->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $estado->alert);
$smarty->display('det_estado.tpl');
?>
  