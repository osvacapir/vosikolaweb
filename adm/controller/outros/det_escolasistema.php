<?php

$id = 0;
$valores = array();
$smarty = new Template();

$escolasistem = new TbEscolaSistema();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEscolaSistema());
$smarty->assign('PAG_ESCOLASIST', Rotas::pag_EscolaSistema());

$escola = new Escola();
$escola->GetEscola();
$smarty->assign('ESCOLA',$escola->GetItens());

$subsistem = new Subsistema();
$subsistem->GetSubsistema();
$smarty->assign('SUBSISTEM',$subsistem->GetItens());

$valores = array(

    'Codigo_Escola' => '',
    'Codigo_SubSistema' => '',
    'Codigo_Coord_Subs' => '',
    'Vaga_Alunos' => '',
    'Codigo' => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Codigo_Escola' => $_GET['Codigo_Escola'],
        'Codigo_SubSistema' => $_GET['Codigo_SubSistema'],
        'Codigo_Coord_Subs' => $_GET['Codigo_Coord_Subs'],
        'Vaga_Alunos' => $_GET['Vaga_Alunos']
    );
    if ($escolasistem->Grava($valores)) {
        $escolasistem->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $escolasistem->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_EscolaSistema());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $escolasistem->GetEscolaSistemaID($id);
        foreach ($escolasistem->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $escolasistem->alert);
$smarty->display('det_escolasistema.tpl');
?>
  