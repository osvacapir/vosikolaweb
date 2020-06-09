<?php

$smarty = new Template();

$municipio = new Municipio();
$municipio->GetMunicipio();

$smarty->assign('MUNICIPIO',$municipio->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetMunicipio());
$smarty->assign('PAG_MUNICIPIO', Rotas::pag_Municipio());
$smarty->assign('SMS_ERRO', $municipio->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $municipio->GetMunicipioID($id);
    foreach ($municipio->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($municipio->Apaga($id)) {
        $municipio->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $municipio->setAlert('Registo não apagado');
    }
    //Rotas::Redirecionar(1, Rotas::pag_Municipio());
}

$smarty->assign('SMS_ERRO', $municipio->alert);
$smarty->display('municipio.tpl');

?>