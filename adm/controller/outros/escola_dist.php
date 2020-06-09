<?php

$smarty = new Template();

$pessoa = new Pessoa();
$pessoa->GetPessoa();

$usuario = new Usuario();
$usuario->GetUsuario();

$turm = new Turma();
$turm->GetTurma();

$matricul = new Matricula();
$matricul->GetMatricula();

$prof = new Professor();
$prof->GetProfessor();

$alun = new Aluno();
$alun->GetAluno();

$smarty->assign('PESSOA', $pessoa->GetItens());

$smarty->assign('PAG_ACESSO', Rotas::pag_Acesso());

$smarty->assign('USUARIO', $usuario->GetItens());

$smarty->assign('TURMA', $turm->GetItens());


$smarty->assign('SMS_ERRO', $pessoa->alert);

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}

$senha = 0;  $count = 0;
$tipoUser = 0;  $texto = "";
$tabelaEscol = '';

if ($id > 0) {
    $id = Rotas::$pag[1];
    $matricul->GetAlunosMatriculados($id);
    $smarty->assign('PESSOA', $matricul->GetItens());
    $senha = 4;
    $tipoUser = 10;
} else {
    //$id = Rotas::$pag[1];
    $prof->GetProfessor();
    $smarty->assign('PESSOA', $prof->GetItens());
    $senha = 6;
    $tipoUser = 6;
}
if(isset($_GET['selecionarPessoa'])){
  $checkbox = $_GET['selecionarPessoa'];

  foreach($checkbox as $cod){
      echo $cod;

      $valores = array(
        "User" => $cod,
        "Passe" => Sistema::GerarPassword($senha),
        "Codigo_Tipo_Utilizador" => $tipoUser,
        "Codigo_Escola" => $_SESSION['SYS']['CodEscola'],
        "DataCadastro" => Sistema::DataAtualUS()
      );
     
      if ($usuario->Grava($valores)) {
        echo $usuario->Ultimo();
        $valoresActual = array(
          "Codigo" => $cod,
          "Codigo_Utilizador" => $usuario->Ultimo()
        );

        if($tipoUser == 6){

          $prof->Grava($valoresActual);

        }elseif($tipoUser == 10){

          $alun->Grava($valoresActual);
          
        }
          $count = $count + 1;
          $texto .= 'Usuário: '.$valores['User'] . ' - Senha: '.$valores['Passe'].'<br/>';
        } else {
          
        } 
  }

  if ($count > 0) {
    $usuario->setAlert($count . ' REGISTOS GRAVADOS!<br>' . $texto, 2);
    $count = 0;
    $texto = "";
  } else {
    $usuario->setAlert('NENHUM REGISTO GRAVADO!');
    $count = 0;
    $texto = "";
  }
}

    $smarty->assign('SMS_ERRO', $usuario->alert);
    $count = 0;
    $texto = "";
    //Rotas::Redirecionar (0, Rotas::pag_Acesso());
  
$smarty->display('escola_dist.tpl');
?>
  