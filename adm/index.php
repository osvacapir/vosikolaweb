<?php
//error_reporting(0);
date_default_timezone_set('Africa/Luanda');

if (!isset($_SESSION)) {
    session_start();
}

/*
  if(!isset($_SESSION['PED']['pedido'])){
  $_SESSION['pedido'] = md5(uniqid(date('YmdHms')));
  }

  if(!isset($_SESSION['PED']['ref'])){
  $_SESSION['ref'] = date('ymdHms');
  }
 */

require '../lib/autoload.php';

if (!Login::LogadoADM()) {
    Rotas::Redirecionar(1, '../');
    //Rotas::Redirecionar(1, 'login.php');
    exit('<h2>Erro! Acesso negado </h2>');
}


$smarty = new Template();
$classe = new Classe();
/* $categorias = new Categorias();
  $categorias->GetCategorias();
 */
//valores para o template
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('TITULO_SITE', Config::SITE_NOME);
$smarty->assign('SITE_NOME', Config::SITE_NOME);
$smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());
$smarty->assign('GET_SITE_ADM', Rotas::get_SiteADM());
$smarty->assign('PAG_ADM_CLIENTE', Rotas::pag_ClientesADM());
$smarty->assign('PAG_ADM_PEDIDOS', Rotas::pag_PedidosADM());
$smarty->assign('PAG_CONTATO', Rotas::pag_Contato());
$smarty->assign('PAG_CATEGORIAS', Rotas::pag_CategoriasADM());
$smarty->assign('PAG_ADM_PRODUTOS', Rotas::pag_ProdutosADM());
$smarty->assign('PAG_SENHA', Rotas::get_SiteADM() . '/adm_senha');
$smarty->assign('PAG_LOGOFF', Rotas::pag_LogoffADM());
//$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('DATA', Sistema::DataAtualBR());
$smarty->assign('LOGADO', Login::LogadoADM());

$smarty->assign('PAG_AVALIACAO', Rotas::pag_Avaliacao());
//$smarty->assign('LOGADO', Login::LogadoADM());
//$smarty->assign('PAG_LOGOFF', Rotas::get_SiteADM() .'/logoff');
//$smarty->assign('PAG_SENHA', Rotas::get_SiteADM() .'/adm_senha');


if (Login::LogadoADM()) {
    /* 	$smarty->assign('USER', $_SESSION['ADM']['user_nome']);
      $smarty->assign('DATA', $_SESSION['ADM']['user_data']);
      $smarty->assign('HORA', $_SESSION['ADM']['user_hora']);
     */
}
//LINKS MENU



$smarty->assign('$PAG_HOME', Rotas::pag_Home());
$smarty->assign('PAG_ANO_L', Rotas::pag_AnoLectivo());
$smarty->assign('PAG_CURSO', Rotas::pag_Curso());
$smarty->assign('PAG_SALA', Rotas::pag_Sala());
$smarty->assign('PAG_PERIOD_LECTIV', Rotas::pag_Periodolectivo());
$smarty->assign('PAG_PERIODO', Rotas::pag_Periodo());
$smarty->assign('PAG_DISCIPLINA', Rotas::pag_Disciplinas());
$smarty->assign('PAG_ACESSO', Rotas::pag_Acesso());
$smarty->assign('PAG_USUARIO', Rotas::pag_Usuario());
$smarty->assign('PAG_MATRICULA', Rotas::pag_Matricula());
$smarty->assign('PAG_PROFESSOR', Rotas::pag_Professor());
$smarty->assign('PAG_DEF_ESCOLA', Rotas::pag_DefEscola());
$smarty->assign('PAG_CURRICULO', Rotas::pag_Curriculo());
$tur_prof = new Turma();
$prof = $_SESSION['USER']['Codigo'];

/* if (isset($prof)&&$prof=2) {
  $tur_prof->GetTurma();
  $smarty->assign('GET_TURMAS', $tur_prof->GetItens());
  }
  $smarty->assign('PAG_TURMAS', Rotas::pag_Turma());
 * */
$tur_prof->GetTurma();
$smarty->assign('GET_TURMAS', $tur_prof->GetItens());
$classe->GetClasse();
$smarty->assign('GET_CLASSES', $classe->GetItens());

$smarty->assign('PAG_TURMA', Rotas::pag_Turma());

$smarty->display('adm_index.tpl');
?>