<?php

$id = 0;
$valores = array();
$smarty = new Template();

$pagamento = new Pagamento();
$smarty->assign('PAG_EDIT', Rotas::pag_DetPagamento());
$smarty->assign('PAG_PAGAMENTO', Rotas::pag_Pagamento());

$aluno = new Aluno();
$aluno->GetAluno();
$smarty->assign('ALUNO',$aluno->GetItens());

$tiposervico = new TipoServico();
$tiposervico->GetTipoServicoL();
$smarty->assign('TIPOSERVIC',$tiposervico->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());


$valores = array(

    "Codigo" => '',
    "CodigoAluno" => '',
    "Codigo_Tipo_Servico" => '',
    "Data" => '',
    "N_Bordoro" => '',
    "Multa" => '',
    "Mes" => '',
    "Codigo_Utilizador" => '',
    "Observacao" => '',
    "Ano" => '',
    "ContaMovimentada" => '',
    "Quantidade" => '',
    "Desconto" => '',
    "Totalgeral" => '',
    "DataBanco" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        'Codigo' => $_GET['Codigo'],
        'CodigoAluno' => $_GET['CodigoAluno'],
        'Codigo_Tipo_Servico' => $_GET['Codigo_Tipo_Servico'],
        'Data' => $_GET['Data'],               
        'N_Bordoro' => $_GET['N_Bordoro'],
        'Multa' => $_GET['Multa'],
        'Mes' => $_GET['Mes'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'Observacao' => $_GET['Observacao'],
        'Ano' => $_GET['Ano'],
        'ContaMovimentada' => $_GET['ContaMovimentada'],
        'Quantidade' => $_GET['Quantidade'],
        'Desconto' => $_GET['Desconto'],
        'Totalgeral' => $_GET['Totalgeral'],
        'DataBanco' => $_GET['DataBanco']
        
    );
    if ($pagamento->Grava($valores)) {
        $pagamento->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $pagamento->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Pagamento());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $pagamento->GetPagamentoID($id);
        foreach ($pagamento->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $pagamento->alert);
$smarty->display('det_pagamento.tpl');
?>
  