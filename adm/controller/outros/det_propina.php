<?php

$id = 0;
$valores = array();
$smarty = new Template();

$propina = new Propina();
$smarty->assign('PAG_EDIT', Rotas::pag_DetPropina());
$smarty->assign('PAG_PROPINA', Rotas::pag_Propina());

$aluno = new Aluno();
$aluno->GetAluno();
$smarty->assign('ALUNO',$aluno->GetItens());

$tipopropin = new TipoPropina();
$tipopropin->GetTipoPropina();
$smarty->assign('TIPOPROPINA',$tipopropin->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Aluno" => '',
    "Codigo_Tipo_Propina" => '',
    "Data_Pagamento" => '',
    "Desconto" => '',
    "Multa" => '',
    "Cambio" => '',
    "Total_Pago_USD" => '',
    "Codigo_Utilizador" => '',
    "DataVencimento" => '',
    "obs" => '',
    "N_Bordoro" => '',
    "ContaMovimentada" => '',
    "Total_Pago_AKZ" => '',
    "HoraPagamento" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Codigo_Aluno' => $_GET['Codigo_Aluno'],
        'Codigo_Tipo_Propina' => $_GET['Codigo_Tipo_Propina'],
        'Data_Pagamento' => $_GET['Data_Pagamento'],
        'Desconto' => $_GET['Desconto'],
        'Multa' => $_GET['Multa'],
        'Cambio' => $_GET['Cambio'],
        'Total_Pago_USD' => $_GET['Total_Pago_USD'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'DataVencimento' => $_GET['DataVencimento'],
        'obs' => $_GET['obs'],
        'N_Bordoro' => $_GET['N_Bordoro'],
        'ContaMovimentada' => $_GET['ContaMovimentada'],
        'Total_Pago_AKZ' => $_GET['Total_Pago_AKZ'],
        'HoraPagamento' => $_GET['HoraPagamento'],
    );
    if ($propina->Grava($valores)) {
        $propina->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $propina->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Propina());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $propina->GetPropinaID($id);
        foreach ($propina->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $propina->alert);
$smarty->display('det_propina.tpl');
?>
  