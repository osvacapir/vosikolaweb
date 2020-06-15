<?php
Class Provincia extends \CoffeeCode\DataLayer\DataLayer {



    public function __construct() {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true
        parent::__construct(Tab::PROVINCIA, ['Designacao'], 'Codigo', false);
    }
/*
    function Preparar($codigo, $Designacao) {

        $this->SetCodigo($codigo);
        $this->SetDesignacao($Designacao);
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function GetProvincia() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetProvinciaID($id) {
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
        $this->GetProvinciaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($designacao) {
        $this->designacao = $designacao;
        if (strlen($designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $designacao;
        endif;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function get(Provincia $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
*/
}

?>