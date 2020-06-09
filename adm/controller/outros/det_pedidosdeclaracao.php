<?php

$id = 0;
$valores = array();
$smarty = new Template();

$pedidosdeclaracao = new PedidosDeclaracao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetPedidosdeclaracao());
$smarty->assign('PAG_PEDIDOSDECLARACAO', Rotas::pag_Pedidosdeclaracao());

$matricula = new Matricula();
$matricula->GetMatricula();
$smarty->assign('MATRICULA',$matricula->GetItens());

$efeito = new EfeitosDeclaracao();
$efeito->GetEfeitosDeclaracao();
$smarty->assign('EFEITO',$efeito->GetItens());

$tipodeclarac = new TipoDeclaracao();
$tipodeclarac->GetTipoDeclaracao();
$smarty->assign('TIPODECLARAC',$tipodeclarac->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Confirmacao" => '',
    "Data_Pedido_Declaracao" => '',
    "Codigo_Efeito" => '',
    "Codigo_Tipo_Declaracao" => '',
    "Codigo_Utilizador" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Codigo_Confirmacao' => $_GET['Codigo_Confirmacao'],
        'Data_Pedido_Declaracao' => $_GET['Data_Pedido_Declaracao'],
        'Codigo_Efeito' => $_GET['Codigo_Efeito'],
        'Codigo_Tipo_Declaracao' => $_GET['Codigo_Tipo_Declaracao'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador']
    );
    if ($pedidosdeclaracao->Grava($valores)) {
        $pedidosdeclaracao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $pedidosdeclaracao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Pedidosdeclaracao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $pedidosdeclaracao->GetPedidosDeclaracaoID($id);
        foreach ($pedidosdeclaracao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $pedidosdeclaracao->alert);
$smarty->display('det_pedidosdeclaracao.tpl');
?>
  