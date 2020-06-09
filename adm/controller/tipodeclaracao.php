<?php

$smarty = new Template();

$tipodeclaracao = new TipoDeclaracao();
$tipodeclaracao->GetTipoDeclaracao();

$smarty->assign('TIPODECLARAC',$tipodeclaracao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipodeclaracao());
$smarty->assign('PAG_TIPODECLARAC', Rotas::pag_Tipodeclaracao());
$smarty->assign('SMS_ERRO', $tipodeclaracao->alert); 

//var_dump($smarty->getTemplateVars());
$tipodeclaracao->GetTipoDeclaracao();
$codigo = 0;
$smarty->assign('DESIGNACAO', '');

if (isset(Rotas::$pag[1])&& Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
        $tipodeclaracao->GetTipodeclaracaoID($id);
        foreach ($tipodeclaracao->GetItens()[1] as $campo => $valor) {
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
    if ($tipodeclaracao->Grava($valores)) {
        $tipodeclaracao->setAlert('REGISTO GRAVADO!', 2);
        unset($_POST);
        Rotas::Redirecionar(0, Rotas::pag_Tipodeclaracao());
    } else {
        $tipodeclaracao->setAlert('REGISTO NÃO GRAVADO!');
    }
    //echo '' . $period->alert;
} else if (isset($_POST['bt_altera'])) {
    if (isset($_POST['codigo']) && $_POST['codigo'] > 0)
        Rotas::Redirecionar(0, Rotas::pag_Tipodeclaracao() . '/' . $_POST['codigo']);
//variaveis
}

$smarty->assign('SMS_ERRO', $tipodeclaracao->alert);
$smarty->display('tipodeclaracao.tpl');

?>