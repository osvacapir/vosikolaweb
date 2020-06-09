<?php

$id = 0;
$valores = array();
$smarty = new Template();

$parametro = new Parametro();
$smarty->assign('PAG_EDIT', Rotas::pag_DetParametro());
$smarty->assign('PAG_PARAMENTRO', Rotas::pag_Parametro());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
    "Valor" => '',
    "Descricao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Designacao' => $_GET['Designacao'],
        'Valor' => $_GET['Valor'],
        'Descricao' => $_GET['Descricao']
    );
    if ($parametro->Grava($valores)) {
        $parametro->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $parametro->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Parametro());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $parametro->GetParametroID($id);
        foreach ($parametro->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $parametro->alert);
$smarty->display('det_parametro.tpl');
?>
  