<?php

Class Aluno extends Pessoa {

    private $codigo;
    private $Codigo_Status;
    private $Codigo_Utilizador;
    private $Codigo_Curso;
    private $DataCadastro;
    private $Saldo;
    private $Desconto;
    private $Tipo_desconto;
    private $Data_Matricula;
    private $NumProcesso;
    private $Codigo_Escola;
    private $Codigo_Encarregado;
    private $Codigo_Pessoa;
    private $Mes_Comecar;
    private $Mes_Pagar;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::ALUNO);
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getCodigo_Status() {
        return $this->Codigo_Status;
    }

    public function getCodigo_Utilizador() {
        return $this->Codigo_Utilizador;
    }

    public function getCodigo_Curso() {
        return $this->Codigo_Curso;
    }

    public function getDataCadastro() {
        return $this->DataCadastro;
    }

    public function getSaldo() {
        return $this->Saldo;
    }

    public function getDesconto() {
        return $this->Desconto;
    }

    public function getTipo_desconto() {
        return $this->Tipo_desconto;
    }

    public function getData_Matricula() {
        return $this->Data_Matricula;
    }

    public function getNumProcesso() {
        return $this->NumProcesso;
    }

    public function getCodigo_Escola() {
        return $this->Codigo_Escola;
    }

    public function getCodigo_Encarregado() {
        return $this->Codigo_Encarregado;
    }

    public function getCodigo_Pessoa() {
        return $this->Codigo_Pessoa;
    }

    public function getMes_Comecar() {
        return $this->Mes_Comecar;
    }

    public function getMes_Pagar() {
        return $this->Mes_Pagar;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setCodigo_Status($Codigo_Status) {
        $this->Codigo_Status = $Codigo_Status;
    }

    public function setCodigo_Utilizador($Codigo_Utilizador) {
        $this->Codigo_Utilizador = $Codigo_Utilizador;
    }

    public function setCodigo_Curso($Codigo_Curso) {
        $this->Codigo_Curso = $Codigo_Curso;
    }

    public function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    public function setSaldo($Saldo) {
        $this->Saldo = $Saldo;
    }

    public function setDesconto($Desconto) {
        $this->Desconto = $Desconto;
    }

    public function setTipo_desconto($Tipo_desconto) {
        $this->Tipo_desconto = $Tipo_desconto;
    }

    public function setData_Matricula($Data_Matricula) {
        $this->Data_Matricula = $Data_Matricula;
    }

    public function setNumProcesso($NumProcesso) {
        $this->NumProcesso = $NumProcesso;
    }

    public function setCodigo_Escola($Codigo_Escola) {
        $this->Codigo_Escola = $Codigo_Escola;
    }

    public function setCodigo_Encarregado($Codigo_Encarregado) {
        $this->Codigo_Encarregado = $Codigo_Encarregado;
    }

    public function setCodigo_Pessoa($Codigo_Pessoa) {
        $this->Codigo_Pessoa = $Codigo_Pessoa;
    }

    public function setMes_Comecar($Mes_Comecar) {
        $this->Mes_Comecar = $Mes_Comecar;
    }

    public function setMes_Pagar($Mes_Pagar) {
        $this->Mes_Pagar = $Mes_Pagar;
    }

    public function GetAluno() {
        $query = "SELECT
            tb_alunos.`Codigo` AS Codigo,
            tb_alunos.`Codigo_Status` AS Codigo_Status,
            tb_alunos.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_alunos.`Codigo_Curso` AS Codigo_Curso,
            tb_alunos.`DataCadastro` AS DataCadastro,
            tb_alunos.`Saldo` AS Saldo,
            tb_alunos.`Desconto` AS Desconto,
            tb_alunos.`Tipo_desconto` AS Tipo_desconto,
            tb_alunos.`Data_Matricula` AS Data_Matricula,
            tb_alunos.`NumProcesso` AS NumProcesso,
            tb_alunos.`Codigo_Escola` AS Codigo_Escola,
            tb_alunos.`Codigo_Encarregado` AS Codigo_Encarregado,
            tb_alunos.`Codigo_Pessoa` AS Codigo_Pessoa,
            tb_alunos.`Mes_Comecar` AS Mes_Comecar,
            tb_alunos.`Mes_Pagar` AS Mes_Pagar,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_escola.`Designacao` AS Escola_Nome,
            tb_pessoa.`Nome` AS Pessoa_Nome,
            tb_curso.`Designacao` AS Curso_Designacao
       FROM
            `tb_alunos` tb_alunos INNER JOIN `tb_utilizador` tb_utilizador ON tb_utilizador.`Codigo` = tb_alunos.`Codigo_Utilizador`
            INNER JOIN `tb_curso` tb_curso ON tb_alunos.`Codigo_Curso` = tb_curso.`Codigo`
            INNER JOIN `tb_escola` tb_escola ON tb_alunos.`Codigo_Escola` = tb_escola.`Codigo`	
            INNER JOIN `tb_pessoa` tb_pessoa ON tb_alunos.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL(array($query, $params));
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Status' => $lista['Codigo_Status'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Codigo_Curso' => $lista['Codigo_Curso'],
                'DataCadastro' => $lista['DataCadastro'],
                'Saldo' => $lista['Saldo'],
                'Desconto' => $lista['Desconto'],
                'Tipo_desconto' => $lista['Tipo_desconto'],
                'Data_Matricula' => $lista['Data_Matricula'],
                'NumProcesso' => $lista['NumProcesso'],
                'Codigo_Escola' => $lista['Codigo_Escola'],
                'Codigo_Encarregado' => $lista['Codigo_Encarregado'],
                'Codigo_Pessoa' => $lista['Codigo_Pessoa'],
                'Mes_Comecar' => $lista['Mes_Comecar'],
                'Mes_Pagar' => $lista['Mes_Pagar'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Escola_Nome' => $lista['Escola_Nome'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'Curso_Designacao' => $lista['Curso_Designacao']);
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

}

?>