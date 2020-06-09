<?php
  $id = 0;
$valores = array();
$smarty = new Template();
$sala = new Sala();

$smarty->assign('PAG_EDIT', Rotas::pag_DetSala());
$smarty->assign('PAG_SALA', Rotas::pag_Sala());

    $valores = array(
        "Codigo" => '',
        "Designacao" => ''
    );

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => Sistema::convertText($_GET['Designacao'])
    );
    if ($sala->Grava($valores)) {
        $sala->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $sala->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Sala());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $sala->GetSalaID($id);
        foreach ($sala->GetItens()[1] as $campo => $valor) {
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
$smarty->assign('SMS_ERRO', $sala->alert);
$smarty->display('det_sala.tpl');
?>
  