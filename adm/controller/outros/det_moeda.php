<?php

$id = 0;
$valores = array();
$smarty = new Template();

$moeda = new Moeda();
$smarty->assign('PAG_EDIT', Rotas::pag_DetMoeda());
$smarty->assign('PAG_MOEDA', Rotas::pag_Moeda());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($moeda->Grava($valores)) {
        $moeda->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $moeda->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Moeda());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $moeda->GetMoedaID($id);
        foreach ($moeda->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $moeda->alert);
$smarty->display('det_moeda.tpl');
?>
  