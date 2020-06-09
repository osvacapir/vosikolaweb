<?php

$id = 0;
$valores = array();
$smarty = new Template();

$encarreg = new Encarregado();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEncarregado());
$smarty->assign('PAG_ENCARREGAD', Rotas::pag_Encarregado());

$profissao = new Profissao();
$profissao->GetProfissao();
$smarty->assign('PROFISSAO',$profissao->GetItens());

$valores = array(

    "Codigo" => '',
    "Nome" => '',
    "Telefone" => '',
    "Email" => '',
    "Codigo_Profissao" => '',
    "Local_Trabalho" => '',
    "Codigo_Utilizador" => '',
    "DataCadastro" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Nome" => $_GET['Nome'],
        "Telefone" => $_GET['Telefone'],
        "Email" => $_GET['Email'],
        "Codigo_Profissao" => $_GET['Codigo_Profissao'],
        "Local_Trabalho" => $_GET['Local_Trabalho'],
        "Codigo_Utilizador" => $_GET['Codigo_Utilizador'],
        "DataCadastro" => $_GET['DataCadastro']
    );
    if ($encarreg->Grava($valores)) {
        $encarreg->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $encarreg->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Encarregado());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $encarreg->GetEncarregadoID($id);
        foreach ($encarreg->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $encarreg->alert);
$smarty->display('det_encarregado.tpl');
?>
  