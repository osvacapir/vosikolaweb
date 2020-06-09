<?php

Class Cursos extends Conexao {

    private $Codigo;
    private $Designacao;
    private $Codigo_Estado;
    private $Abreviatura;
    private $sql = ";";

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::CURSO);
        $this->sql = "SELECT 
                {$this->tabela}.Codigo AS Codigo,
                {$this->tabela}.Designacao AS Designacao,"
                . Tab::ESTADO . ".Designacao AS Estado_Designacao,
                {$this->tabela}.Abreviatura AS Abreviatura,
                {$this->tabela}.Codigo_Estado AS Codigo_Estado                
                FROM  {$this->tabela}  
                INNER JOIN `" . Tab::ESTADO . "` " . Tab::ESTADO . "  ON " . Tab::ESTADO . ".Codigo={$this->tabela}.Codigo_Estado";
    }

    function Preparar($codigo, $designacao, $codigo_Etado, $Abreviatura) {

        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
        $this->setCodigo_Estado($codigo_Etado);
        $this->setAbreviatura($Abreviatura);
    }

    public function getCodigo() {
        return $codigo;
    }

    public function getDesignacao() {
        return $designacao;
    }

    public function getCodigoStatus() {
        return $codigoStatus;
    }

    function getCodigo_Status() {
        return $this->Codigo_Estado;
    }

    function getAbreviatura() {
        return $this->Abreviatura;
    }

    function GetCursos() {
        $query = $this->sql . " ORDER BY {$this->tabela}.Designacao ASC";
        $query .= $this->PaginacaoLinks("Codigo", $this->tabela);
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetCursosID($id) {
        $query = $this->sql . " WHERE " . Tab::CURSO . ".Codigo = :Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' =>
                $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                'Abreviatura' => $lista['Abreviatura'],
                'Codigo_Estado' => $lista['Codigo_Estado'],
                'Estado_Designacao' => $lista['Estado_Designacao']
            );
            $i++;
        endwhile;
    }

    function Grava($obj) {

        if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
            return $this->Editar($obj, array('Codigo' => $obj['Codigo']),
                            $this->tabela);
        } else {
            $obj['Codigo'] = 0;
            // print_r($obj);
            return $this->Inserir($obj);
        }
        unset($obj[
                'Codigo']);
    }

    function Apaga($id) {
        $this->GetCursosID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao(
            $designacao) {
        $this->Designacao = $designacao;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $designacao







            ;
        endif;
    }

    function setCodigo($codigo) {
        $this->Codigo = $codigo







        ;
    }

    function setCodigo_Estado($codigo_Estado) {
        $this->Codigo_Estado = $codigo_Estado







        ;
    }

    function setAbreviatura($Abreviatura) {
        $this->Abreviatura = $Abreviatura







        ;
    }

    function get(Cursos $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM" . Tab::CURSO . " WHERE Codigo = '{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>