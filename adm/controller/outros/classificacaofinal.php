<?php

$smarty=new Template();
$classific_fin=new TbClassificacaoFinal();
$classific_fin->GetClassificacao_final();

$smarty->assign('CLASSIFIC_FINAL', $classific_fin->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetClassificacaoFinal());
$smarty->assign('PAG_CLASSIFIC_FINAL', Rotas::pag_ClassificacaoFinal());
$smarty->assign('SMS_ERRO', $classific_fin->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $classific_fin->GetTbClassificacaoFinalID($id);
    foreach ($classific_fin->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($classific_fin->Apaga($id)) {
        $classific_fin->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $classific_fin->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_ClassificacaoFinal());
}

$smarty->assign('SMS_ERRO', $classific_fin->alert);
$smarty->display('classificacaofinal.tpl');

?>