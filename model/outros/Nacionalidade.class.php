<?php 
Class Nacionalidade extends Conexao {

    private $codigo;
    private $Designacao;

    function __construct() {
        parent::__construct();
        $this->setTabela('nacionalidade');
    } 

    function Preparar($codigo, $designacao) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
        
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function GetNacionalidade() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetNacionalidadeID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetNacionalidadeID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao']);
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
    
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
    }

    function get(Nacionalidade $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }  
}
?>