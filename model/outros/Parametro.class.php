<?php 
Class Parametro extends Conexao{

    private $Codigo;
    private $Designacao;
    private $Valor;    
    private $Descricao;

    function __construct() {
        parent::__construct();  
       $this->setTabela('parametro');
    }

    function Preparar($Codigo, $Designacao, $Valor,$Descricao) {
        
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->setValor($Valor);
        $this->setDescricao($Descricao);
   
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getValor() {
        return $this->Valor;
    }

    function getDescricao() {
        return $this->Descricao;
    }

    function GetParametro() {
        $query = "SELECT *FROM tb_parametro";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                'Valor' => $lista['Valor'],
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

    function GetParametroID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetParametroID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4):
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

    function setValor($Valor) {
        $this->Valor = $Valor;
    }

    function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    function get(Parametro $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>