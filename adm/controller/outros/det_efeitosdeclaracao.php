<?php

$id = 0;
$valores = array();
$smarty = new Template();

$efeitodecla = new EfeitosDeclaracao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEfeitosDeclaracao());
$smarty->assign('PAG_EFEITODECLA', Rotas::pag_EfeitosDeclaracao());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($efeitodecla->Grava($valores)) {
        $efeitodecla->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $efeitodecla->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_EfeitosDeclaracao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $efeitodecla->GetEfeitosDeclaracaoID($id);
        foreach ($efeitodecla->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $efeitodecla->alert);
$smarty->display('det_efeitosdeclaracao.tpl');
?>
  