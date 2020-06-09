<?php

$id = 0;
$valores = array();
$smarty = new Template();

$estadocivil = new EstadoCivil();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEstadoCivil());
$smarty->assign('PAG_ESTADOCIVIL', Rotas::pag_EstadoCivil());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($estadocivil->Grava($valores)) {
        $estadocivil->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $estadocivil->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_EstadoCivil());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $estadocivil->GetEstadoCivilID($id);
        foreach ($estadocivil->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $estadocivil->alert);
$smarty->display('det_estadocivil.tpl');
?>
  