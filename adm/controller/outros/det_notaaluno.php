<?php

$id = 0;
$valores = array();
$smarty = new Template();

$notaaluno = new NotaAluno();
$smarty->assign('PAG_EDIT', Rotas::pag_DetNotaaluno());
$smarty->assign('PAG_NOTAALUNO', Rotas::pag_Notaaluno());

$aluno = new Aluno();
$aluno->GetAluno();
$smarty->assign('ALUNO',$aluno->GetItens());

$disciplin = new Disciplinas();
$disciplin->GetDisciplinas();
$smarty->assign('DISCIPLIN',$disciplin->GetItens());

$tipoavaliac = new TipoAvaliacao();
$tipoavaliac->GetTipoAvaliacao();
$smarty->assign('TIPOAVALIAC',$tipoavaliac->GetItens());

$classe = new AnoLectivo();
$classe->GetAnoLectivos();
$smarty->assign('ANOLECTIV',$classe->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "CodigoAluno" => '',
    "CodigoDisciplina" => '',
    "Nota" => '',
    "CodigoAnoLectivo" => '',
    "CodigoTipoAvaliacao" => '',
    "CodigoTrimestre" => '',
    "DataCadastro" => '',
    "CodigoUtilizador" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'CodigoAluno' => $_GET['CodigoAluno'],
        'CodigoDisciplina' => $_GET['CodigoDisciplina'],
        'Nota' => $_GET['Nota'],               
        'CodigoAnoLectivo' => $_GET['CodigoAnoLectivo'],
        'CodigoTipoAvaliacao' => $_GET['CodigoTipoAvaliacao'],
        'CodigoTrimestre' => $_GET['CodigoTrimestre'],
        'DataCadastro' => $_GET['DataCadastro'],
        'CodigoUtilizador' => $_GET['CodigoUtilizador']
    );
    if ($notaaluno->Grava($valores)) {
        $notaaluno->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $notaaluno->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Notaaluno());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $notaaluno->GetNotaAlunoID($id);
        foreach ($notaaluno->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $notaaluno->alert);
$smarty->display('det_notaaluno.tpl');
?>
  