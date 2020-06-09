<?php

$id = 0;
$valores = array();
$smarty = new Template();

$linguaopc = new LinguaOpcao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetLinguaopcao());
$smarty->assign('PAG_LINGUAOP', Rotas::pag_Linguaopcao());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($linguaopc->Grava($valores)) {
        $linguaopc->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $linguaopc->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Linguaopcao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $linguaopc->GetLinguaOpcaoID($id);
        foreach ($linguaopc->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $linguaopc->alert);
$smarty->display('det_linguaopcao.tpl');
?>
  