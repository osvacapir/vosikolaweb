<?php

Class Estado extends Conexao {

    private $Codigo;
    private $Designacao;

    function __construct() {

        parent::__construct();
        $this->setTabela(Tab::ESTADO);
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

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function GetEstado() {
        $query = "SELECT *FROM {$this->tabela}";
        $query .= " ORDER BY Designacao ASC";
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

    function GetEstadoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetEstadoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um estado ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }

    function get(Estado $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>
