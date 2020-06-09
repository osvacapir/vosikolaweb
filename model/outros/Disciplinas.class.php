<?php

Class Disciplinas extends Conexao {
    
    private $Codigo;
    private $Designacao;
    private $Abreviatura;
    private $CurriculoList;



    function __construct() {

        //echo 'ghghggfghfgh'. $this->tabela;
        parent::__construct();
        $this->setTabela(Tab::DISCIPLINA);
        
    }

    function Preparar($codigo, $designacao) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
        $this->SetDesignacao($Abreviatura);
        $this->SetDesignacao($CurriculoList);
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getAbreviatura() {
        return $this->Abreviatura;
    }

    function getCurriculoList() {
        return $this->CurriculoList;
    }
    
    function GetDisciplinas() {
        $query = "SELECT *FROM {$this->tabela} ORDER BY Designacao ASC";
          $query .= $this->PaginacaoLinks("Codigo", $this->tabela);
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetDisciplinasID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }
 function GeDisciplinasCurriculoID($id) {
        $query = $this->sql . " WHERE {$this->tabela}.Codigo=" . $id;
        $this->ExecutaSQL($query);
        $this->GetLista
        ();
    }
    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                 'Abreviatura' => $lista['Abreviatura']
                
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
        $this->GetDisciplinasID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
    }

    function setAbreviatura($Abreviatura) {
        $this->Abreviatura = $Abreviatura;
    }

    function setCurriculoList($CurriculoList) {
        $this->CurriculoList = $CurriculoList;
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

    function get(Disciplinas $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>