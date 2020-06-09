<?php

Class Faltas extends Conexao {

    private $codigo;
    private $nFaltas;
    private $codigoMatricula;
    private $codigoDisciplina;
    private $dataFalta;
    private $codigoUtilizadores;
    private $descricao;
	
	
    function __construct() {

        parent::__construct();
        $this->setTabela('faltas');
    }
	
    function Preparar($codigo, $nFaltas, $codigoMatricula,$codigoDisciplina, $dataFalta,$codigoUtilizadores,$descricao) {
        $this->SetCodigo($codigo);
        $this->SetNFaltas($nFaltas);
        $this->setCodigoMatricula($codigoMatricula);
	    $this->setCodigoDisciplina($codigoDisciplina);
	    $this->setDataFalta($dataFalta);
		$this->setCodigoUtilizadores($codigoUtilizadores);
		$this->setDescricao($descricao);
    }

    public function getCodigo() {
        return $codigo;
    }
  
    public function getNFaltas() {
        return $nFaltas;
    }
 
    public function getCodigoMatricula() {
        return $codigoMatricula;
    }

    public function getCodigoDisciplina() {
        return $codigoDisciplina;
    }

    public function getDataFalta() {
        return $dataFalta;
    }
 
    public function getCodigoUtilizadores() {
        return $codigoUtilizadores;
    }

    public function getDescricao() {
        return $descricao;
    }

    function GetFaltas() {
        $query = "SELECT
            tb_falta.`Codigo` AS Codigo,
            tb_falta.`nFaltas` AS nFaltas,
            tb_falta.`Codigo_Matricula` AS Codigo_Matricula,
            tb_falta.`Codigo_Disciplina` AS Codigo_Disciplina,
            tb_falta.`dataFalta` AS dataFalta,
            tb_falta.`Codigo_Utilizadores` AS Codigo_Utilizadores,
            tb_falta.`Descricao` AS Descricao,
            tb_disciplina.`Designacao` AS Disciplina_Designacao,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_pessoa.`Nome` AS Aluno_Nome
       FROM
            `tb_disciplina` tb_disciplina INNER JOIN `tb_falta` tb_falta ON tb_disciplina.`Codigo` = tb_falta.`Codigo_Disciplina`
            INNER JOIN `tb_matricula` tb_matricula ON tb_falta.`Codigo_Matricula` = tb_matricula.`Codigo`
            INNER JOIN `tb_utilizador` tb_utilizador ON tb_falta.`Codigo_Utilizadores` = tb_utilizador.`Codigo`
            AND tb_utilizador.`Codigo` = tb_matricula.`Codigo_Utilizador`
            INNER JOIN `tb_alunos` tb_alunos ON tb_matricula.`Codigo_Aluno` = tb_alunos.`Codigo`
            INNER JOIN `tb_pessoa` tb_pessoa ON tb_alunos.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'nFaltas' => $lista['nFaltas'],
                'Codigo_Matricula' => $lista['Codigo_Matricula'],
                'Codigo_Disciplina' => $lista['Codigo_Disciplina'],
                'Codigo_Utilizadores' => $lista['Codigo_Utilizadores'],
                'dataFalta' => $lista['dataFalta'],
                'Disciplina_Designacao' => $lista['Disciplina_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Aluno_Nome' => $lista['Aluno_Nome'],
                'Descricao' => $lista['Descricao']);
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

    function GetFaltasID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetFaltasID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setNFaltas($nFaltas) {
        $this->nFaltas = $nFaltas;
        if (strlen($nFaltas) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o Nª de faltas ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->nFaltas = $nFaltas;
        endif;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
	
	function setCodigoMatricula($codigoMatricula) {
        $this->CodigoMatricula = $codigoMatricula;
    }
	
	
	function setCodigoDisciplina($codigoDisciplina) {
        $this->CodigoDisciplina = $codigoDisciplina;
    }
	
	function setDataFalta($dataFalta) {
        $this->DataFalta = $dataFalta;
    }
	
	function setCodigoUtilizadores($codigoUtilizadores) {
        $this->CodigoUtilizadores = $codigoUtilizadores;
    }
	
	
	function setDescricao($descricao) {
        $this->Descricao = $descricao;
    }


    function get(Faltas $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>