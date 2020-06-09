<?php
  $id = 0;
$valores = array();
$smarty = new Template();
$period = new Periodo();

$smarty->assign('PAG_EDIT', Rotas::pag_DetPeriodo());
$smarty->assign('PAG_PERIODO', Rotas::pag_Periodo());

    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => Sistema::convertText($_GET['Designacao'])
    );

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($period->Grava($valores)) {
        $period->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $period->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Periodo());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $period->GetPeriodoID($id);
        foreach ($period->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        //  $smarty->display('edit_anolectivo.tpl');
    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }  
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $period->alert);
$smarty->display('det_periodo.tpl');
?>
  