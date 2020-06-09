<?php 
Class TipoAvaliacao extends Conexao{

    private $Codigo;
    private $Designacao;

    function __construct() {
        parent::__construct(); 
        $this->setTabela('tipo_avaliacao');
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

    function GetTipoAvaliacao() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Descricao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetTipoAvaliacaoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }
    
    private  function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Descricao' => $lista['Descricao'],
                
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
        $this->GetTipoAvaliacaoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($designacao) < 4):
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

    function get(TipoAvaliacao $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }    
}
?>