<?php

$id = 0;
$valores = array();
$smarty=new Template();
$classific_fin=new TbClassificacaoFinal();

$smarty->assign('PAG_EDIT', Rotas::pag_DetClassificacaoFinal());
$smarty->assign('PAG_CLASSIFIC_FINAL', Rotas::pag_ClassificacaoFinal());

$valores = array(
    "Codigo" => '',
    "Descricao" => '',
    "Designacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Descricao" => Sistema::convertText($_GET['Descricao']),
        "Designacao" => Sistema::convertText($_GET['Designacao'])
    );
    if ($classific_fin->Grava($valores)) {
        $classific_fin->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $classific_fin->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_ClassificacaoFinal());
} else {
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
    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $classific_fin->alert);
$smarty->display('det_classificacaofinal.tpl');
?>
  