<?php

$id = 0;
$valores = array();
$smarty=new Template();
$categoriafun=new CategoriaFunc();

$smarty->assign('PAG_EDIT', Rotas::pag_DetCategoriaFunc());
$smarty->assign('PAG_CATEGORIAFUN', Rotas::pag_CategoriaFunc());

$valores = array(
    "Codigo" => '',
    "Designacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => Sistema::convertText($_GET['Designacao'])
    );
    if ($categoriafun->Grava($valores)) {
        $categoriafun->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $categoriafun->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_CategoriaFunc());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $categoriafun->GetCategoriaFuncID($id);
        foreach ($categoriafun->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $categoriafun->alert);
$smarty->display('det_categoriafunc.tpl');
?>
  