<?php

$id = 0;
$valores = array();
$smarty = new Template();

$itemperm = new ItemPermissaoUtilizador();
$smarty->assign('PAG_EDIT', Rotas::pag_DetItempermissaoutilizador());
$smarty->assign('PAG_ITEMPER', Rotas::pag_Itempermissaoutilizador());

$usuar = new Usuario();
$usuar->GetUsuario();
$smarty->assign('USUARIO', $usuar->GetItens());

$permiss = new Permissao();
$permiss->GetPermissao();
$smarty->assign('PERMISSAO', $permiss->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Permissao" => '',
    "Codigo_Utilizador" => '',
    "Data_Permissao" => '',
    "status" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        'Codigo' => $_GET['Codigo'],
        'Codigo_Permissao' => $_GET['Codigo_Permissao'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'Data_Permissao' => $_GET['Data_Permissao'],
        'status' => $_GET['status']
    );
    if ($itemperm->Grava($valores)) {
        $itemperm->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $itemperm->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Itempermissaoutilizador());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $itemperm->GetItemPermissaoUtilizadorID($id);
        foreach ($itemperm->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $itemperm->alert);
$smarty->display('det_itempermissaoutilizador.tpl');
?>
  