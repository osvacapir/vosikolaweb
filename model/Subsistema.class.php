<?php

Class Subsistema extends Conexao {

    private $codigo;
    private $Designacao;
    private $sql = "";
    private $sql_escola = "";

    function __construct() {

        parent::__construct();
        $this->setTabela(Tab::SUBSISTEMA);
        $this->sql_escola = "SELECT tb_escola_sistema.Codigo AS Codigo,
            tb_escola_sistema.Codigo_SubSistema AS Codigo_SubSistema,
            tb_subsistema.Designacao AS Designacao,
            tb_escola_sistema.Codigo_Escola AS Codigo_Escola
                FROM tb_escola_sistema
                INNER JOIN {$this->tabela} ON tb_escola_sistema.Codigo_SubSistema={$this->tabela}.Codigo";

        $this->sql = "SELECT *FROM tb_subsistema ";
    }

    function Preparar($codigo, $Designacao) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($Designacao);
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDesignacao() {
        return $this->Designacao;
    }

    function GetSubsistemaEscola() {

        $query = $this->sql_escola . " WHERE Codigo_Escola=" . $_SESSION['SYS']['CodEscola'];
        $query .= " ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetSubsistema() {

        $query = $this->sql . " ORDER BY Designacao DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                //'Codigo_SubSistema' => $lista['Codigo_SubSistema'],
                'Designacao' => $lista['Designacao']
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

    function GetSubsistemaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetSubsistemaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o Subsistema ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $Designacao;
        endif;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function get(Subsistema $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>