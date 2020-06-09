<?php

$id = 0;
$valores = array();
$smarty = new Template();

$motivoanulac = new MotivosAnulacao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetMotivosanulacao());
$smarty->assign('PAG_MOTIVOANUL', Rotas::pag_Motivosanulacao());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($motivoanulac->Grava($valores)) {
        $motivoanulac->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $motivoanulac->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Motivosanulacao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $motivoanulac->GetMotivosAnulacaoID($id);
        foreach ($motivoanulac->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $motivoanulac->alert);
$smarty->display('det_motivosanulacao.tpl');
?>
  