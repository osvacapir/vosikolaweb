<?php

class Escola extends Conexao {

    private $codigo;
    private $nome;
    private $telefoneFixo;
    private $telefoneMovel;
    private $email;
    private $site;
    private $localidade;
    private $nif;
    private $contaBancaria1;
    private $contaBancaria2;
    private $contaBancaria3;
    private $contaBancaria4;
    private $contaBancaria5;
    private $contaBancaria6;
    private $UtilizadoresList;
    private $EscolaSistemaList;
    private $MatriculasList;

    function __construct() {

        parent::__construct();
        $this->setTabela(Tab::ESCOLA);
    }

    function Preparar() {

        $this->SetCodigo($codigo);
        $this->SetNome($nome);
        $this->setTelefoneFixe($telefoneFixo);
        $this->setTelefoneMovel($telefoneMovel);
        $this->setEmail($email);
        $this->setSite($site);
        $this->setNife($nif);
        $this->setLocalidade($localidade);
        $this->setContaBancaria1($contaBancaria1);
        $this->setContaBancaria2($contaBancaria2);
        $this->setContaBancaria3($contaBancaria3);
        $this->setContaBancaria4($contaBancaria4);
        $this->setContaBancaria5($contaBancaria5);
        $this->setContaBancaria6($contaBancaria6);
        $this->setUtilizadoresList($UtilizadoresList);
        $this->setEscolaSistemaList($EscolaSistemaList);
        $this->setcodigo_Status($MatriculasList);
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefoneFixo() {
        return $this->telefoneFixo;
    }

    function getTelefoneMovel() {
        return $this->telefoneMovel;
    }

    function getEmail() {
        return $this->email;
    }

    function getSite() {
        return $this->site;
    }

    function getLocalidade() {
        return $this->localidade;
    }

    function getNif() {
        return $this->nif;
    }

    function getContaBancaria1() {
        return $this->contaBancaria1;
    }

    function getContaBancaria2() {
        return $this->contaBancaria2;
    }

    function getContaBancaria3() {
        return $this->contaBancaria3;
    }

    function getContaBancaria4() {
        return $this->contaBancaria4;
    }

    function getContaBancaria5() {
        return $this->contaBancaria5;
    }

    function getContaBancaria6() {
        return $this->contaBancaria6;
    }

    function getUtilizadoresList() {
        return $this->UtilizadoresList;
    }

    function getEscolaSistemaList() {
        return $this->EscolaSistemaList;
    }

    function getMatriculasList() {
        return $this->MatriculasList;
    }

    function GetEscola() {
        $query = "SELECT *FROM tb_escola";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetEscolaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                'Telefone_Fixo' => $lista['Telefone_Fixo'],
                'Telefone_Movel' => $lista['Telefone_Movel'],
                'Email' => $lista['Email'],
                'Site' => $lista['Site'],
                'Localidade' => $lista['Localidade'],
                'NIF' => $lista['NIF'],
                'Conta_Bancaria1' => $lista['Conta_Bancaria1'],
                'Conta_Bancaria2' => $lista['Conta_Bancaria2'],
                'Conta_Bancaria3' => $lista['Conta_Bancaria3'],
                'Conta_Bancaria4' => $lista['Conta_Bancaria4'],
                'Conta_Bancaria5' => $lista['Conta_Bancaria5'],
                'Conta_Bancaria6' => $lista['Conta_Bancaria6'],
                'Vagas_Turma' => $lista['Vagas_Turma'],
                'Vagas_Alunos' => $lista['Vagas_Alunos']
            );
            $i++;
        endwhile;
    }

    function Grava($obj) {
        if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
            return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
        } elseif (!isset($valores['Codigo'])) {
            unset($obj['Codigo']);
            return $this->Inserir($obj);
        }
    }

    function Apaga($id) {
        $this->GetEscolaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setNome($nome) {
        $this->nome = $nome;
        if (strlen($nome) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Nome ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->nome = $nome;
        endif;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTelefoneFixo($telefoneFixo) {
        $this->telefoneFixo = $telefoneFixo;
    }

    function setTelefoneMovel($telefoneMovel) {
        $this->telefoneMovel = $telefoneMovel;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSite($site) {
        $this->site = $site;
    }

    function setLocalidade($localidade) {
        $this->localidade = $localidade;
    }

    function setNif($nif) {
        $this->nif = $nif;
    }

    function setContaBancaria1($contaBancaria1) {
        $this->contaBancaria1 = $contaBancaria1;
    }

    function setContaBancaria2($contaBancaria2) {
        $this->contaBancaria2 = $contaBancaria2;
    }

    function setContaBancaria3($contaBancaria3) {
        $this->contaBancaria3 = $contaBancaria3;
    }

    function setContaBancaria4($contaBancaria4) {
        $this->contaBancaria4 = $contaBancaria4;
    }

    function setContaBancaria5($contaBancaria5) {
        $this->contaBancaria5 = $contaBancaria5;
    }

    function setContaBancaria6($contaBancaria6) {
        $this->contaBancaria6 = $contaBancaria6;
    }

    function setUtilizadoresList($UtilizadoresList) {
        $this->UtilizadoresList = $UtilizadoresList;
    }

    function setEscolaSistemaList($EscolaSistemaList) {
        $this->EscolaSistemaList = $EscolaSistemaList;
    }

    function setMatriculasList($MatriculasList) {
        $this->MatriculasList = $MatriculasList;
    }

    function get(Escola $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>