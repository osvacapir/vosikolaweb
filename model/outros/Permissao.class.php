<?php 
Class Permissao extends Conexao{

    private $Codigo;
    private $Designacao;

	function __construct() {
        parent::__construct();
        $this->setTabela('permissao');
    }

    function Preparar($Codigo, $Designacao) {
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
      
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function GetPermissao() {
        $query = "SELECT *FROM tb_permissao";
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

    function GetPermissaoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetPermissaoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite uma permissão';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $Designacao;
        endif;
    }

    function setCodigo($Codigo) {
        $this->codigo = $Codigo;
    }

    function get(Permissao $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }	
}
?>