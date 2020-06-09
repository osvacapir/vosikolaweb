<?php

Class Curriculo extends Conexao {

    private $codigo;
    private $codigoSubsistema;
    private $codigoDisciplina;
    private $codigoCurso;
    private $codigoClasse;
    private $sql_cab = "";
    private $cur_det = null;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::CURRICULO);
        $this->sql_cab = "SELECT
            {$this->tabela}.`Codigo` AS Codigo,
            {$this->tabela}.`Codigo_Curso` AS Codigo_Curso,
            {$this->tabela}.`Codigo_Classe` AS Codigo_Classe,
            {$this->tabela}.`Designacao` AS Designacao,
            {$this->tabela}.`Num_Disciplina` AS Num_Disciplina,
            {$this->tabela}.`Codigo_Subsistema` AS Codigo_Subsistema,
            " . Tab::CURSO . ".`Designacao` AS Curso_Designacao,
            " . Tab::SUBSISTEMA . ".`Designacao` AS Subsistema_Designacao,
            " . Tab::CLASSE . ".`Designacao` AS Classe_Designacao
       FROM
            `{$this->tabela}` {$this->tabela} 
            INNER JOIN `" . Tab::CURSO . "` " . Tab::CURSO . " ON " . Tab::CURSO . ".`Codigo` = {$this->tabela}.`Codigo_Curso`
            INNER JOIN `" . Tab::CLASSE . "` " . Tab::CLASSE . " ON {$this->tabela}.`Codigo_Classe` = " . Tab::CLASSE . ".`Codigo`
            INNER JOIN `" . Tab::SUBSISTEMA . "` " . Tab::SUBSISTEMA . " ON {$this->tabela}.`Codigo_Subsistema` = " . Tab::SUBSISTEMA . ".`Codigo`
            ";
    }

    /*
      function SetItens_Det($curr) {

      $this->itens_det=array('Codigo'=>);
      }
     */

    function Preparar(
            $codigo,
            $codigoSubsistema,
            $codigoDisciplina,
            $codigoCurso,
            $codigoClasse) {

        $this->SetCodigo($codigo);
        $this->SetDesignacao($codigoSubsistema);
        $this->setCodigoSubsistema($codigoCurso);
        $this->setCodigoDisciplina($codigoDisciplina);
        $this->setCodigoClasse($codigoClasse);
    }

    public function getCodigo() {
        return $codigo;
    }

    public function getDesignacao() {
        return $designacao;
    }

    public function getCodigoSubsistema() {
        return $codigoSubsistema;
    }

    public function getCodigoDisciplina() {
        return $codigoDisciplina;
    }

    public function getCodigoCurso() {
        return $codigoCurso;
    }

    public function getCodigoClasse() {
        return $codigoClasse;
    }

    function GetCurriculo() {
        $query = $this->sql_cab . " ORDER BY Subsistema_Designacao,Classe_Designacao,Curso_Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetCurriculoID($id) {
        $query = $this->sql_cab . " WHERE {$this->tabela}.Codigo=" . $id;
        $this->ExecutaSQL($query);
        $this->GetLista();
     
    }

    function GetDisciplinasCurriculoID() {
        $query = $this->sql_cab . " GROUP BY {$this->tabela}.Codigo ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista
        ();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $cur_det = new CurriculoDet($lista['Codigo']);
            $cur_det->GetCurriculoDet();
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Curso' => $lista['Codigo_Curso'],
                'Codigo_Classe' => $lista['Codigo_Classe'],
                'Designacao' => $lista['Designacao'],
                'Classe_Designacao' => $lista['Classe_Designacao'],
                'Curso_Designacao' => $lista['Curso_Designacao'],
                'Subsistema_Designacao' => $lista['Subsistema_Designacao'],
                'Codigo_Subsistema' => $lista['Codigo_Subsistema'],
                'Num_Disciplina' => $lista['Num_Disciplina'],
                'Lista' => $cur_det->itens
            );

            $i ++;
        //  $this->GetCurriculoDet($lista['Codigo']);
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

    function Apaga(
            $id) {
        $this->GetCurriculoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setcodigoSubsistema(
            $codigoSubsistema) {
        $this->codigoSubsistema = $codigoSubsistema;
        if (strlen($codigoSubsistema) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Curriculo ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->codigoSubsistema = $codigoSubsistema

            ;
        endif;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo

        ;
    }

    function setCodigoDisciplina($codigoDisciplina) {
        $this->codigoDisciplina = $codigoDisciplina

        ;
    }

    function setCodigoCurso($codigoCurso) {
        $this->codigoCurso = $codigoCurso

        ;
    }

    function setCodigoClasse($codigoClasse) {
        $this->codigoClasse = $codigoClasse

        ;
    }

    function get(Curriculo $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo = '{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>