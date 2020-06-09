<?php

$smarty = new Template();

$escola = new Escola();
$escola->GetEscola();

$smarty->assign('ESCOLA', $escola->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_Escola());

if (isset(Rotas::$pag[1]) && Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
    $escola->GetEscolaID($id);
    foreach ($escola->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if (isset($_POST['bt_apaga'])) {
        if ($escola->Apaga($id)) {
            $escola->setAlert('Registo Apagado com sucesso', 2);
            Rotas::Redirecionar(1, Rotas::pag_Escola());
        } else {
            $escola->setAlert('Registo não apagado');
        }
    }
} else {
    $smarty->assign('DESIGNACAO', "");
    $smarty->assign('TELEFONE_FIXO', "");
    $smarty->assign('TELEFONE_MOVEL', "");
    $smarty->assign('EMAIL', "");
    $smarty->assign('SITE', "");
    $smarty->assign('LOCALIDADE', "");
    $smarty->assign('NIF', "");
    $smarty->assign('CONTA_BANCARIA1', "");
    $smarty->assign('CONTA_BANCARIA2', "");
    $smarty->assign('CONTA_BANCARIA3', "");
    $smarty->assign('CONTA_BANCARIA4', "");
    $smarty->assign('CONTA_BANCARIA5', "");
    $smarty->assign('CONTA_BANCARIA6', "");
    $smarty->assign('VAGAS_TURMA', "");
    $smarty->assign('VAGAS_ALUNO', "");
}

if (isset($_POST['bt_grava'])) {
    $codigo = isset($_POST['Codigo']) ? $_POST['Codigo'] : 0;
    $designacao = isset($_POST['Designacao']) ? $_POST['Designacao'] : "";
    $telefone_fixo = isset($_POST['Telefone_Fixo']) ? $_POST['Telefone_Fixo'] : "";
    $telefone_movel = isset($_POST['Telefone_Movel']) ? $_POST['Telefone_Movel'] : "";
    $email = isset($_POST['Email']) ? $_POST['Email'] : "";
    $site = isset($_POST['Site']) ? $_POST['Site'] : "";
    $localidade = isset($_POST['Localidade']) ? $_POST['Localidade'] : "";
    $nif = isset($_POST['Nif']) ? $_POST['Nif'] : "";
    $conta_bancaria1 = isset($_POST['Conta_Bancaria1']) ? $_POST['Conta_Bancaria1'] : "";
    $conta_bancaria2 = isset($_POST['Conta_Bancaria2']) ? $_POST['Conta_Bancaria2'] : "";
    $conta_bancaria3 = isset($_POST['Conta_Bancaria3']) ? $_POST['Conta_Bancaria3'] : "";
    $conta_bancaria4 = isset($_POST['Conta_Bancaria4']) ? $_POST['Conta_Bancaria4'] : "";
    $conta_bancaria5 = isset($_POST['Conta_Bancaria5']) ? $_POST['Conta_Bancaria5'] : "";
    $conta_bancaria6 = isset($_POST['Conta_Bancaria6']) ? $_POST['Conta_Bancaria6'] : "";
    $vagas_turma = isset($_POST['Vagas_Turma']) ? $_POST['Vagas_Turma'] : 0;
    $vagas_alunos = isset($_POST['Vagas_Alunos']) ? $_POST['Vagas_Alunos'] : 0;
    

    //$curso->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao,
        "Telefone_Fixo" => $telefone_fixo,
        "Telefone_Movel" => $telefone_movel,
        "Email" => $email,
        "Site" => $site,
        "Localidade" => $localidade,
        "NIF" => $nif,
        "Conta_Bancaria1" => $conta_bancaria1,
        "Conta_Bancaria2" => $conta_bancaria2,
        "Conta_Bancaria3" => $conta_bancaria3,
        "Conta_Bancaria4" => $conta_bancaria4,
        "Conta_Bancaria5" => $conta_bancaria5,
        "Conta_Bancaria6" => $conta_bancaria6,
        "Vagas_Turma" => $vagas_turma,
        "Vagas_Alunos" => $vagas_alunos
    );
    if ($escola->Grava($valores)) {
        $escola->setAlert('Registo inserido com sucesso', 2);
       Rotas::Redirecionar(1, Rotas::pag_Escola());
    } else {
        $escola->setAlert('Registo não insrido');
    }
}
    unset($_POST);
$smarty->assign('SMS_ERRO', $escola->alert);
$smarty->display('escola.tpl');
?>