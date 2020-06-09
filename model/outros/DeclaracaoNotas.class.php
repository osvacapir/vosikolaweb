<?php

Class DeclaracaoNotas extends Conexao {

    private $codigo;
    private $dataPedido;
    private $codigoMatricula;
    private $codigoEfeito;
    private $codigoUtilizador;
	
	
	 function __construct() {

        parent::__construct();
        $this->setTabela('declaracaoNotas');
    }

    function Preparar($codigo, $dataPedido, $codigoMatricula,$codigoEfeito,$codigoUtilizador) {
        $this->SetCodigo($codigo);
		$this->SetCodigo($dataPedido);
		$this->setCodigoMatricula($codigoMatricula);
        $this->setCodigoEfeito($codigoEfeito);
		$this->setCodigoUtilizador($codigoUtilizador);
    }

    public function getCodigo() {
        return $codigo;
    }

 
    public function getDataPedido() {
        return $dataPedido;
    }

    public function getCodigoMatricula() {
        return $codigoMatricula;
    }

    public function getCodigoEfeito() {
        return $codigoEfeito;
    }

    public function getCodigoUtilizador() {
        return $codigoUtilizador;
    }
  
    function GetDeclaracaoNotas() {
        $query = "SELECT
            tb_declaracao_nota.`Codigo` AS Codigo,
            tb_declaracao_nota.`dataPedido` AS dataPedido,
            tb_declaracao_nota.`Codigo_Matricula` AS tb_declaracao_nota_Codigo_Matricula,
            tb_declaracao_nota.`Codigo_Efeito` AS Codigo_Efeito,
            tb_declaracao_nota.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_efeitos_declaracao.`Designacao` AS Efeitos_Designacao,
            tb_utilizador.`Nome` AS Utilizadores_Nome,
            tb_pessoa.`Nome` AS Alunos_Nome
       FROM
            `tb_efeitos_declaracao` tb_efeitos_declaracao INNER JOIN `tb_declaracao_nota` tb_declaracao_nota ON tb_efeitos_declaracao.`Codigo` = tb_declaracao_nota.`Codigo_Efeito`
            INNER JOIN `tb_matricula` tb_matricula ON tb_declaracao_nota.`Codigo_Matricula` = tb_matricula.`Codigo`
            INNER JOIN `tb_utilizador` tb_utilizador ON tb_declaracao_nota.`Codigo_Utilizador` = tb_utilizador.`Codigo`
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
                'dataPedido' => $lista['dataPedido'],
                'Efeitos_Designacao' => $lista['Efeitos_Designacao'],
                'Alunos_Nome' => $lista['Alunos_Nome'],
                'Utilizadores_Nome' => $lista['Utilizadores_Nome']);
            $i++;
        endwhile;
    }

    function GetDeclaracaoNotasID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
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
        $this->GetDeclaracaoNotasID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDataPedido($dataPedido) {
        $this->dataPedido = $dataPedido;
        if (strlen($dataPedido) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite a data do pedido  ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->dataPedido = $dataPedido;
        endif;
    }
	
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
	
    public function setCodigoMatricula($codigoMatricula) {
        $this->codigoMatricula = $codigoMatricula;
    }

    public function setCodigoEfeito($codigoEfeito) {
        $this->codigoEfeito = $codigoEfeito;
    }

    public function setCodigoUtilizador($codigoUtilizador) {
        $this->codigoUtilizador = $codigoUtilizador;
    }

    function get(DeclaracaoNotas $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}

?>