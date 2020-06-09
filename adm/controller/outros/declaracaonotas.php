<?php

$smarty = new Template();

$declarac = new DeclaracaoNotas();
$declarac->GetDeclaracaoNotas();

$smarty->assign('DECLARACAONOTAS',$declarac->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetDeclaracaoNotas());
$smarty->assign('PAG_DECLARAC', Rotas::pag_DeclaracaoNotas());
$smarty->assign('SMS_ERRO', $declarac->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $declarac->GetDeclaracaoNotasID($id);
    foreach ($declarac->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($declarac->Apaga($id)) {
        $declarac->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $declarac->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_DeclaracaoNotas());
}

$smarty->assign('SMS_ERRO', $declarac->alert);
$smarty->display('declaracaonotas.tpl');

?>