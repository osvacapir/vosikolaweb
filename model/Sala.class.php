<?php

Class Sala extends Conexao {

    private $codigo,
            $designacao;

    function __construct() {

        //echo 'ghghggfghfgh'. $this->tabela;
        parent::__construct();
        $this->setTabela(Tab::SALA);
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

    function GetSala() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Codigo ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetSalaID($id) {
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
        $this->GetSalaID($id);
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

    function get(Sala $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>