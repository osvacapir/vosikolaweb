<?php

$id = 0;
$valores = array();
$smarty = new Template();

$permissao = new Permissao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetPermissao());
$smarty->assign('PAG_PERMISSAO', Rotas::pag_Permissao());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($permissao->Grava($valores)) {
        $permissao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $permissao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Permissao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $permissao->GetPermissaoID($id);
        foreach ($permissao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $permissao->alert);
$smarty->display('det_permissao.tpl');
?>
  