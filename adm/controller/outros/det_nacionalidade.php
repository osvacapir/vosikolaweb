<?php

$id = 0;
$valores = array();
$smarty = new Template();

$nacionalidade = new Nacionalidade();
$smarty->assign('PAG_EDIT', Rotas::pag_DetNacionalidade());
$smarty->assign('PAG_NACIONALIDADE', Rotas::pag_Nacionalidade());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($nacionalidade->Grava($valores)) {
        $nacionalidade->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $nacionalidade->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Nacionalidade());
} else {
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

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $nacionalidade->alert);
$smarty->display('det_nacionalidade.tpl');
?>