<?php

$id = 0;
$valores = array();
$smarty = new Template();

$entradavalo = new EntradaValor();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEntradavalor());
$smarty->assign('PAG_ENTRADAVALOR', Rotas::pag_Entradavalor());


$valores = array(

    "Codigo" => '',
    'CodigoAluno' => '',
    'SaldoAnterior' => '',
    'Turma' => '',
    'Curso' => '',
    'ValorEntregue' => '',
    'Moeda' => '',
    'ContraValor' => '',
    'SaldoActual' => '',
    'ContaMovimentada' => '',
    'NBordoro' => '',
    'Cambio' => '',
    'DataDeposito' => '',
    'DataCadastro' => '',
    'CodigoUtilizador' => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'CodigoAluno' => $_GET['CodigoAluno'],
        'SaldoAnterior' => $_GET['SaldoAnterior'],
        'Turma' => $_GET['Turma'],
        'Curso' => $_GET['Curso'],
        'ValorEntregue' => $_GET['ValorEntregue'],
        'Moeda' => $_GET['Moeda'],
        'ContraValor' => $_GET['ContraValor'],
        'SaldoActual' => $_GET['SaldoActual'],
        'ContaMovimentada' => $_GET['ContaMovimentada'],
        'NBordoro' => $_GET['NBordoro'],
        'Cambio' => $_GET['Cambio'],
        'DataDeposito' => $_GET['DataDeposito'],
        'DataCadastro' => $_GET['DataCadastro'],
        'CodigoUtilizador' => $_GET['CodigoUtilizador']

    );
    if ($entradavalo->Grava($valores)) {
        $entradavalo->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $entradavalo->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Entradavalor());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $entradavalo->GetEntradaValorID($id);
        foreach ($entradavalo->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $entradavalo->alert);
$smarty->display('det_entradavalor.tpl');
?>
  