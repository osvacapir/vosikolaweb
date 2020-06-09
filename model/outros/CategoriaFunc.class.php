<?php 

Class CategoriaFunc extends Conexao {
    
    private $codigo;
    private $designacao;
    
    
     function __construct() {
        parent::__construct();
        $this->setTabela('categoria_func');
    }

   function GetCategoriaFuncID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function GetCategoriaFunc() {
        $query = "SELECT *FROM tb_categoria_func";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
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
    
    function Apaga($id) {
        $this->GetCategoriaFuncID($id);
        return $this->Apagar(array("Codigo" => $id));
    }
}
?>