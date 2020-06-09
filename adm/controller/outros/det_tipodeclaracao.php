<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tipodeclaracao = new TipoDeclaracao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipodeclaracao());
$smarty->assign('PAG_TIPODECLARAC', Rotas::pag_Tipodeclaracao());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($tipodeclaracao->Grava($valores)) {
        $tipodeclaracao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tipodeclaracao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tipodeclaracao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tipodeclaracao->GetTipoDeclaracaoID($id);
        foreach ($tipodeclaracao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tipodeclaracao->alert);
$smarty->display('det_tipodeclaracao.tpl');
?>
  