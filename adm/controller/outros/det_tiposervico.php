<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tiposervico = new TipoServico();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTiposervico());
$smarty->assign('PAG_TIPOSERVICO', Rotas::pag_Tiposervico());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$moeda = new Moeda();
$moeda->GetMoeda();
$smarty->assign('MOEDA',$moeda->GetItens());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
    "Preco" => '',
    "Descricao" => '',
    "Codigo_Utilizador" => '',
    "Codigo_Moeda" => '',
    "TipoServico" => '',
    "Status" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Designacao' => $_GET['Designacao'],
        'Preco' => $_GET['Preco'],
        'Descricao' => $_GET['Descricao'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'Codigo_Moeda' => $_GET['Codigo_Moeda'],
        'TipoServico' => $_GET['TipoServico'],
        'Status' => $_GET['Status']
    );
    if ($tiposervico->Grava($valores)) {
        $tiposervico->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tiposervico->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tiposervico());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tiposervico->GetTipoServicoID($id);
        foreach ($tiposervico->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tiposervico->alert);
$smarty->display('det_tiposervico.tpl');
?>
  