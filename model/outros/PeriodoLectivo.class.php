<?php

Class PeriodoLectivo extends Conexao {

    private $codigo,
            $designacao;

    function __construct() {

        parent::__construct();
        $this->setTabela('periodo_lectivo');
    }

    function Preparar($codigo, $designacao) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDesignacao() {
        return $this->designacao;
    }

    function GetPeriodoLectivo() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetPeriodoLectivoID($id) {
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
                'Designacao' => $lista['Designacao'],
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
        $this->GetPeriodoLectivoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    /* function InserirM($valores_inserir) {

      $valores_campos = array_values($valores_inserir);
      $valores = implode("','", $valores_campos);
      if ($ano->Inserir($valores_inserir, 'tb_ano_lectivo')) {
      $ano->erro = array("COD" => 1, "SMS" => "  Gravou '" . $valores_inserir['Designacao'] . "'");
      } else {

      $ano->erro = array("COD" => 2, "SMS" => "  Não Gravou '" . $valores_inserir['Designacao'] . "' Talvez já esteja gravado");
      }
      }
     */

    function get(PeriodoLectivo $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>