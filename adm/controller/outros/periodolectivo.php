<?php

$smarty = new Template();
$periodlectiv = new PeriodoLectivo();
$periodlectiv->GetPeriodoLectivo();

$smarty->assign('PERIOD_LECTIV', $periodlectiv->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetPeriodolectivo());
$smarty->assign('PAG_PERIOD_LECTIV', Rotas::pag_Periodolectivo());
$smarty->assign('SMS_ERRO', $periodlectiv->alert); //array("COD" => '', "SMS" => '')
//var_dump($smarty->getTemplateVars());



if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $periodlectiv->GetPeriodoLectivoID($id);
    foreach ($periodlectiv->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($periodlectiv->Apaga($id)) {
        $periodlectiv->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $periodlectiv->setAlert('Registo não apagado');
    }
}

$smarty->assign('SMS_ERRO', $periodlectiv->alert);
$smarty->display('periodolectivo.tpl');

/*
  if (isset($_POST['btInserir'])) {
  Rotas::Redirecionar(0, Rotas::pag_CategoriasADM());
  $ano->alert('BOTÃO INSERIR CLICADO', 2);
  }

  /*
  $valores_inserir = array(
  "Codigo" => $_GET['Codigo'],
  "Designacao" => $_GET['Designacao'],
  "Codigo_Estado" => $_GET['Codigo_Estado']
  );
  $ano->setObject($obj, $valores_inserir);
  $ano->InserirM($ano); */
/*
  if (isset($_POST['cate_nova'])) {
  $cate_nome = $_POST['cate_nome'];
  if ($categorias->Inserir($cate_nome)) {
  echo '<div class="alert alert-success"> Categoria Inserida com sucesso!! </div>';
  Rotas::Redirecionar(0, Rotas::pag_CategoriasADM());
  }
  }
  if (isset($_REQUEST['btEdita'])) {
  $valores_inserir = array(
  "Codigo" => $_GET['Codigo'],
  "Designacao" => $_GET['Designacao'],
  "Codigo_Estado" => $_GET['Codigo_Estado']
  );
  $valores_campos = array_values($valores_inserir);
  $valores = implode("','", $valores_campos);

  $ano->table = 'tb_ano_lectivo';
  if ($ano->Inserir($valores_inserir)) {
  $ano->setAlert("Gravou " . $valores_inserir['Designacao'], 2);
  } else {
  $ano->setAlert("Não Gravou '" . $valores_inserir['Designacao'] . "' Talvez já esteja gravado");
  }
  }
  $id = Rotas::$pag[1];
  $ano->GetAnoLectivoID($id);

  $smarty->display('edit_anolectivo.tpl');

  $ano->setAlert($valores . " Registo Eliminado com Sucesso", 2);
  Rotas::Redirecionar(0, Rotas::pag_AnoLectivo());

  $ano->setAlert("Problemas ao Eliminar " . $valores);






  /*
  $smarty->assign('ANO_L','Página do ANO LECTIVO');
 */
?>