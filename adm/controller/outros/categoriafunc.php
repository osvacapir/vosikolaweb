<?php

$smarty=new Template();
$categoriafun=new CategoriaFunc();
$categoriafun->GetCategoriaFunc();

$smarty->assign('CATEGORIAFUN', $categoriafun->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetCategoriaFunc());
$smarty->assign('PAG_CATEGORIAFUN', Rotas::pag_CategoriaFunc());
$smarty->assign('SMS_ERRO', $categoriafun->alert); 

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
    if ($categoriafun->Apaga($id)) {
        $categoriafun->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $categoriafun->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_CategoriaFunc());
}

$smarty->assign('SMS_ERRO', $categoriafun->alert);
$smarty->display('categoriaFunc.tpl');

?>