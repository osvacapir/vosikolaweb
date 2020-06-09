<?php

$smarty = new Template();
$curriculo = new Curriculo();
$cur_det = new CurriculoDet();
$curriculo->GetCurriculo();
/* echo '<pre>';
  print_r($curriculo->GetItens());
  echo '</pre>'; */
$smarty->assign('CURRICULOS', $curriculo->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetCurriculo());
$smarty->assign('PAG_CURRICULO', Rotas::pag_Curriculo());
$smarty->assign('SMS_ERRO', $curriculo->alert);

$discipli = new Disciplinas();
$discipli->GetDisciplinas();
$smarty->assign('DISCIPLINAS', $discipli->GetItens());

$curso = new Cursos();
$curso->GetCursos();
$smarty->assign('CURSOS', $curso->GetItens());

$classe = new Classe();
$classe->GetClasse();
$smarty->assign('CLASSES', $classe->GetItens());

$subsistem = new Subsistema();
$subsistem->GetSubsistema();
$smarty->assign('SUBSISTEMAS', $subsistem->GetItens());

$smarty->assign('CODIGO', "");
$smarty->assign('DESIGNACAO', "");
$id = 0;

if (isset(Rotas::$pag[1]) && (Rotas::$pag[1] > 0)) {
    $id = Rotas::$pag[1];
    $curriculo->GetCurriculoID($id);
    if ($curriculo->TotalDados() > 0) {
        foreach ($curriculo->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        $cur_det = new CurriculoDet($id);
        $cur_det->GetCurriculoDet();

        $smarty->assign('DISC_CURR', $cur_det->GetItens());

        /* if (isset($_POST['bt_apaga'])) {
          if ($curriculo->Apaga($id)) {
          $curriculo->setAlert('Registo Apagado com sucesso', 2);
          } else {
          $curriculo->setAlert('Registo não apagado');
          }
          Rotas::Redirecionar(1, Rotas::pag_Curriculo());
          } */
    } else {
        //$curriculo->setAlert('ESTE CURRÍCULO NÃO EXISTE');
        //Rotas::Redirecionar(1, Rotas::pag_Curriculo());
    }
}
if (isset($_POST['bt_gravar_det'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $qtd = $_POST['qtd'];
    // echo "curr-" . $_POST['Codigo_Curriculo'] . " disc- " . $_POST['Num_Disciplina'];
    for ($a = 1; $a <= $qtd; $a++) {
        $valores = array(
            "Codigo_Disciplina" => $_POST['Codigo_Disciplina_' . $a],
            "Codigo_Curriculo" => $_POST['Codigo_Curriculo_' . $a]
        );
        if ($cur_det->Grava($valores)) {

            $count = $count + 1;
            $texto .= $_POST['nome_' . $a] . ', ';
        }
    }
    if ($count > 0) {
        $cur_det->setAlert($count . ' REGISTOS GRAVADOS!<br>' . $texto, 2);
        Rotas::Redirecionar(0, Rotas::pag_Curriculo());
    } else {
        $cur_det->setAlert('NENHUM REGISTO GRAVADO!');
    }
    $count = 0;

    $texto = "";
}if (isset($_POST['bt_gravar_cab'])) {
    $valores = array(
        "Codigo" => $_POST['Codigo'],
        "Codigo_Curso" => $_POST['Codigo_Curso'],
        "Codigo_Classe" => $_POST['Codigo_Classe'],
        "Designacao" => $_POST['Designacao'],
        "Codigo_Subsistema" => $_POST['Codigo_Subsistema'],
        "Num_Disciplina" => (int) $_POST['Num_Disciplina']
    );

    if ($curriculo->Grava($valores)) {
        $curriculo->setAlert('REGISTO GRAVADO!', 2);
        Rotas::Redirecionar(1, Rotas::pag_Curriculo());
    } else {
        $curriculo->setAlert('REGISTO NÃO GRAVADO!');
    }
}
/* if ($curriculo->TotalDados() > 0) {

  $cur_det->GetCurriculoDetID($codigo);
  $smarty->assign('DISC_CURR', $cur_det->itens_det);
  } */

$smarty->assign('SMS_ERRO', $curriculo->alert);

$smarty->display('curriculo.tpl');
?>