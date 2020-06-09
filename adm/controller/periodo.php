<?php

$smarty = new Template();
$period = new Periodo();
$period->GetPeriodo();

$smarty->assign('PERIOD', $period->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetPeriodo());
$smarty->assign('PAG_PERIODO', Rotas::pag_Periodo());
$smarty->assign('SMS_ERRO', $period->alert); //array("COD" => '', "SMS" => '')
//var_dump($smarty->getTemplateVars());
$period->GetPeriodo();
$codigo = 0;
$smarty->assign('DESIGNACAO', '');

if (isset(Rotas::$pag[1])&& Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
        $period->GetPeriodoID($id);
        foreach ($period->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : 0;
    }

if (isset($_POST['bt_gravar'])) {
//variaveis

    $designacao = $_POST['Designacao'];

    //$curso->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao
    );
    if ($period->Grava($valores)) {
        $period->setAlert('REGISTO GRAVADO!', 2);
        unset($_POST);
        Rotas::Redirecionar(0, Rotas::pag_Periodo());
    } else {
        $period->setAlert('REGISTO NÃO GRAVADO!');
    }
    //echo '' . $period->alert;
} else if (isset($_POST['bt_altera'])) {
    if (isset($_POST['codigo']) && $_POST['codigo'] > 0)
        Rotas::Redirecionar(0, Rotas::pag_Periodo() . '/' . $_POST['codigo']);
//variaveis
}

$smarty->assign('SMS_ERRO', $period->alert);
$smarty->display('periodo.tpl');

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