<?php

$smarty = new Template();

$nacionalidade = new Nacionalidade();
$nacionalidade->GetNacionalidade();

$smarty->assign('NACIONALIDADE',$nacionalidade->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetNacionalidade());
$smarty->assign('PAG_NACIONALIDADE', Rotas::pag_Nacionalidade());
$smarty->assign('SMS_ERRO', $nacionalidade->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $nacionalidade->GetNacionalidadeID($id);
    foreach ($nacionalidade->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($nacionalidade->Apaga($id)) {
        $nacionalidade->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $nacionalidade->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Nacionalidade());
}

$smarty->assign('SMS_ERRO', $nacionalidade->alert);
$smarty->display('nacionalidade.tpl');

?>