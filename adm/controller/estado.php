<?php

$smarty = new Template();

$estado = new Estado();
$estado->GetEstado();

$smarty->assign('ESTADO',$estado->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEstado());
$smarty->assign('PAG_ESTADO', Rotas::pag_Estado());
$smarty->assign('SMS_ERRO', $estado->alert); 
//var_dump($smarty->getTemplateVars());
$estado->GetEstado();
$codigo = 0;
$smarty->assign('DESIGNACAO', '');

if (isset(Rotas::$pag[1])&& Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
        $estado->GetEstadoID($id);
        foreach ($estado->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : 0;
    }

if (isset($_POST['bt_gravar'])) {
//variaveis

    $designacao = $_POST['Designacao'];

    //$curso->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao
    );
    if ($estado->Grava($valores)) {
        $estado->setAlert('REGISTO GRAVADO!', 2);
        unset($_POST);
        Rotas::Redirecionar(0, Rotas::pag_Estado());
    } else {
        $estado->setAlert('REGISTO NÃO GRAVADO!');
    }
    //echo '' . $period->alert;
} else if (isset($_POST['bt_altera'])) {
    if (isset($_POST['codigo']) && $_POST['codigo'] > 0)
        Rotas::Redirecionar(0, Rotas::pag_Estado() . '/' . $_POST['codigo']);
//variaveis
}

$smarty->assign('SMS_ERRO', $estado->alert);
$smarty->display('estado.tpl');

?>