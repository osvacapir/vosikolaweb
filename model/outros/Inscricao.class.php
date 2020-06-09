<?php

Class Inscricao extends Conexao {

    private $codigo;
    private $codigoCurso;
    private $codigoPessoa;
	
	function __construct() {

        parent::__construct();
        $this->setTabela('inscricao');
    }

    public function getCodigo() {
        return $codigo;
    }

    public function getCodigoCurso() {
        return $codigoCurso;
    }

    public function getCodigoPessoa() {
        return $codigoPessoa;
    }

    function GetInscricao() {
        $query = "SELECT
                tb_inscricao.`Codigo_Pessoa` AS Codigo_Pessoa,
                tb_inscricao.`Codigo_Curso` AS Codigo_Curso,
                tb_inscricao.`Codigo` AS Codigo,
                tb_curso.`Designacao` AS Curso_Designacao,
                tb_pessoa.`Nome` AS Pessoa_Nome
        FROM
                `tb_curso` tb_curso INNER JOIN `tb_inscricao` tb_inscricao ON tb_curso.`Codigo` = tb_inscricao.`Codigo_Curso`
                INNER JOIN `tb_pessoa` tb_pessoa ON tb_inscricao.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo_Pessoa' => $lista['Codigo_Pessoa'],
                'Codigo_Curso' => $lista['Codigo_Curso'],
                'Curso_Designacao' => $lista['Curso_Designacao'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'Codigo' => $lista['Codigo']);
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

    function GetInscricaoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetInscricaoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($codigoCurso) {
        $this->codigoCurso = $codigoCurso;
        if (strlen($codigoCurso) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o código do Curso ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->codigoCurso = $codigoCurso;
        endif;
    }

	public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
 
    public function setCodigoPessoa($codigoPessoa) {
        $this->codigoPessoa = $codigoPessoa;
    }

    function get(Inscricao $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}

?>