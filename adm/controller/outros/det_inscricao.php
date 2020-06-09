<?php

$id = 0;
$valores = array();
$smarty = new Template();

$inscricao = new Inscricao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetInscricao());
$smarty->assign('PAG_INSCRICAO', Rotas::pag_Inscricao());

$pessoa = new Pessoa();
$pessoa->GetPessoa();
$smarty->assign('PESSOA', $pessoa->GetItens());

$curs = new Cursos();
$curs->GetCursos();
$smarty->assign('CURSOS', $curs->GetItens());

$valores = array(

    'Codigo_Pessoa' => '',
    'Codigo_Curso' => '',
    'Codigo' => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        'Codigo_Pessoa' => $_GET['Codigo_Pessoa'],
        'Codigo_Curso' => $_GET['Codigo_Curso'],
        "Codigo" => $_GET['Codigo']
    );
    if ($inscricao->Grava($valores)) {
        $inscricao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $inscricao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Inscricao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $inscricao->GetInscricaoID($id);
        foreach ($inscricao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $inscricao->alert);
$smarty->display('det_inscricao.tpl');
?>
  