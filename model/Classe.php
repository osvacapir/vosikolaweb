<?php

Class Classe extends Conexao {

    private $codigo;
    private $designacao;
    private $TurmasList;
    private $CurriculoList;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::CLASSE);
    }

    public function Preparar($codico, $designacao) {
        $this->codigo = $codico;
        $this->designacao = $designacao;
    }

    public function getCodigo() {
        return $codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDesignacao() {
        return $designacao;
    }

    public function setDesignacao($designacao) {
        $this->designacao = $designacao;
    }

    public function getTurmasList() {
        return $TurmasList;
    }

    public function setTurmasList($TurmasList) {
        $this->tbTurmasList = $tbTurmasList;
    }

    public function getCurriculoList() {
        return $CurriculoList;
    }

    public function setCurriculoList($CurriculoList) {
        $this->tbCurriculoList = $CurriculoList;
    }

    function GetClasse() {
        $query = "SELECT *FROM tb_classe";
        $query .= " ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    /* function GetListaTurma() {
      $query = "SELECT *FROM tb_classe";
      $query .= " ORDER BY Codigo DESC";
      $this->ExecutaSQL($query);
      $this->GetLista();
      } */

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

    function GetClasseID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
          $query .= $this->PaginacaoLinks("Codigo", $this->tabela);
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetClassesID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

}

?>