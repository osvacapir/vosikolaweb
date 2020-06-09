<?php

$id = 0;
$valores = array();
$smarty = new Template();

$profissao = new Profissao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetProfissao());
$smarty->assign('PAG_PROFISSAO', Rotas::pag_Profissao());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($profissao->Grava($valores)) {
        $profissao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $profissao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Profissao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $profissao->GetProfissaoID($id);
        foreach ($profissao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $profissao->alert);
$smarty->display('det_profissao.tpl');
?>
  