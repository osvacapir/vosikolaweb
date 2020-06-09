<?php 
Class Professor extends Pessoa{

    private $Codigo;
    private $Abreviatura;
    private $Codigo_Pessoa;
    private $Codigo_Categoria;


    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::PROFESSOR);
    }
    
    function Preparar($Codigo, $Nome, $Abreviatura, $Codigo_Pessoa, $Codigo_Categoria) {
        
        $this->SetCodigo($Codigo);
        $this->SetNome($Nome);
        $this->setAbreviatura($Abreviatura);
        $this->setCodigo_Pessoa($Codigo_Pessoa);
        $this->setCodigo_Categoria($Codigo_Categoria);
        
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getNome() {
        return $this->Nome;
    }

    function getAbreviatura() {
        return $this->Abreviatura;
    }

    function getCodigo_Pessoa() {
        return $this->Codigo_Pessoa;
    }

    function getCodigo_Categoria() {
        return $this->Codigo_Categoria;
    }
    
    function GetProfessor() {
        $query = "SELECT
            {$this->tabela}.`Codigo` AS Codigo,
            tb_pessoa.`Nome` AS Nome,
            {$this->tabela}.`Abreviatura` AS Abreviatura,
            {$this->tabela}.`Codigo_Pessoa` AS Codigo_Pessoa,
            {$this->tabela}.`Codigo_Categoria` AS Codigo_Categoria,
            tb_categoria_func.`Designacao` AS Categoria_func_Designacao,
            tb_pessoa.`Nome` AS Pessoa_Nome
       FROM
            `{$this->tabela}` {$this->tabela} "
            . "INNER JOIN `tb_pessoa` tb_pessoa ON tb_pessoa.`Codigo` = {$this->tabela}.`Codigo_Pessoa`
            INNER JOIN `tb_categoria_func` tb_categoria_func ON {$this->tabela}.`Codigo_Categoria` = tb_categoria_func.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Nome' => $lista['Nome'],
                'Abreviatura' => $lista['Abreviatura'],
                'Codigo_Pessoa' => $lista['Codigo_Pessoa'],
                'Codigo_Categoria' => $lista['Codigo_Categoria'],
                'Categoria_func_Designacao' => $lista['Categoria_func_Designacao'],
                'Pessoa_Nome' => $lista['Pessoa_Nome']);
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

    function GetProfessorID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }    

    function Apaga($id) {
        $this->GetProfessorID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Nome) {
        $this->designacao = $Nome;
        if (strlen($designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Nome ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $Nome;
        endif;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setAbreviatura($Abreviatura) {
        $this->Abreviatura = $Abreviatura;
    }

    function setCodigo_Pessoa($Codigo_Pessoa) {
        $this->Codigo_Pessoa = $Codigo_Pessoa;
    }

    function setCodigo_Categoria($Codigo_Categoria) {
        $this->Codigo_Categoria = $Codigo_Categoria;
    }
    
    function get(Professor $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>