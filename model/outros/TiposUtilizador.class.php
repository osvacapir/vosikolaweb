<?php 
Class TiposUtilizador extends Conexao{

    private $Codigo;
    private $Designacao;

    function __construct() {
        parent::__construct();
        $this->setTabela('tipos_utilizador');
    }
    
    function Preparar($Codigo, $Designacao) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
      
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

  
    function GetTiposUtilizador() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }
    
    function GetTiposUtilizadorID($id) {
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
        $this->GetTiposUtilizadorID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }


    
     function get(TiposUtilizador $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
    
}
 ?>