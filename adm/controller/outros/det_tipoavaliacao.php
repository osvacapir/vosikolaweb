<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tipoavaliacao = new TipoAvaliacao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipoavaliacao());
$smarty->assign('PAG_tipoavaliacao', Rotas::pag_Tipoavaliacao());

$valores = array(

    "Codigo" => '',
    "Descricao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Descricao" => $_GET['Descricao']
    );
    if ($tipoavaliacao->Grava($valores)) {
        $tipoavaliacao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tipoavaliacao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tipoavaliacao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tipoavaliacao->GetTipoAvaliacaoID($id);
        foreach ($tipoavaliacao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tipoavaliacao->alert);
$smarty->display('det_tipoavaliacao.tpl');
?>
  