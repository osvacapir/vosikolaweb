<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tipomulta = new TipoMulta();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipomulta());
$smarty->assign('PAG_TIPOMULTA', Rotas::pag_Tipomulta());

$valores = array(

    "Codigo" => '',
    "Descrisao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Descrisao" => $_GET['Descrisao']
    );
    if ($tipomulta->Grava($valores)) {
        $tipomulta->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tipomulta->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tipomulta());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tipomulta->GetTipoMultaID($id);
        foreach ($tipomulta->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tipomulta->alert);
$smarty->display('det_tipomulta.tpl');
?>
  