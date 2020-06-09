<?php

$id = 0;
$valores = array();
$smarty = new Template();

$declarac = new DeclaracaoNotas();
$smarty->assign('PAG_EDIT', Rotas::pag_DetDeclaracaoNotas());
$smarty->assign('PAG_DECLARAC', Rotas::pag_DeclaracaoNotas());

$matricul = new Matricula();
$matricul->GetMatricula();
$smarty->assign('MATRICUL',$matricul->GetItens());

$efeito = new EfeitosDeclaracao();
$efeito->GetEfeitosDeclaracao();
$smarty->assign('EFEITODECLA',$efeito->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "dataPedido" => '',
    "Codigo_Matricula" => '',
    "Codigo_Efeito" => '',
    "Codigo_Utilizador" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "dataPedido" => $_GET['dataPedido'],
        "Codigo_Matricula" => $_GET['Codigo_Matricula'],
        "Codigo_Efeito" => $_GET['Codigo_Efeito'],
        "Codigo_Utilizador" => $_GET['Codigo_Utilizador']
    );
    if ($declarac->Grava($valores)) {
        $declarac->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $declarac->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_DeclaracaoNotas());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $declarac->GetDeclaracaoNotasID($id);
        foreach ($declarac->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $declarac->alert);
$smarty->display('det_declaracaonotas.tpl');
?>
  