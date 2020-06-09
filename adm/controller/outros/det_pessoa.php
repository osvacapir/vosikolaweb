<?php
  $id = 0;
$valores = array();
$smarty = new Template();
$pessoa = new Pessoa();

$naciona = new Nacionalidade();

$naciona = new Nacionalidade();

$smarty->assign('PAG_EDIT', Rotas::pag_DetPessoa());
$smarty->assign('PAG_PESSOA', Rotas::pag_Pessoa());

    $valores = array(

        "Codigo" => '',
        "Nome" => '',
        'Pai' => '',
        'Mae' => '',
        'Codigo_Nacionalidade' => '',
        'Codigo_Estado_Civil' => '',
        'DataNascimento' => '',
        'Email' => '',
        'Telefone' => '',
        'Codigo_Status' => '',
        'Codigo_Endereco' => '',
        'Codigo_Utilizador' => '',
        'Sexo' => '',
        'N_Doc_ID' => '',
        'DataCadastro' => '',
        'URL_Foto' => '',
        'Curso' => ''
    );

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Nome" => $_GET['Nome'],
        'Pai' => $_GET['Pai'],
        'Mae' => $_GET['Mae'],
        'Codigo_Nacionalidade' => $_GET['Codigo_Nacionalidade'],
        'Codigo_Estado_Civil' => $_GET['Codigo_Estado_Civil'],
        'DataNascimento' => $_GET['DataNascimento'],
        'Email' => $_GET['Email'],
        'Telefone' => $_GET['Telefone'],
        'Codigo_Status' => $_GET['Codigo_Status'],
        'Codigo_Endereco' => $_GET['Codigo_Endereco'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'Sexo' => $_GET['Sexo'],
        'N_Doc_ID' => $_GET['N_Doc_ID'],
        'DataCadastro' => $_GET['DataCadastro'],
        'URL_Foto' => $_GET['URL_Foto'],
        'Curso' => $_GET['Curso']
    );

    if ($pessoa->Grava($valores)) {
        $pessoa->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $pessoa->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Pessoa());

} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $pessoa->GetPessoaID($id);
        foreach ($pessoa->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }  
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $pessoa->alert);
$smarty->display('det_pessoa.tpl');
?>
  