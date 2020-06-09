<?php
  $id = 0;
$valores = array();
$smarty = new Template();
$periodlectiv = new PeriodoLectivo();

$smarty->assign('PAG_EDIT', Rotas::pag_DetPeriodolectivo());
$smarty->assign('PAG_PERIOD_LECTIV', Rotas::pag_Periodolectivo());

    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => Sistema::convertText($_GET['Designacao'])
    );

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($periodlectiv->Grava($valores)) {
        $periodlectiv->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $periodlectiv->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Periodolectivo());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $periodlectiv->GetPeriodoLectivoID($id);
        foreach ($periodlectiv->GetItens()[1] as $campo => $valor) {
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
$smarty->assign('SMS_ERRO', $periodlectiv->alert);
$smarty->display('det_periodolectivo.tpl');
?>
  