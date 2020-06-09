<?php

Class CurriculoDet extends Conexao {

    private $codigoCurriculo;
    private $codigoDisciplina;
    private $designacao;
    private $sql="";

    function __construct($cur = null) {
        parent::__construct();
        $this->setTabela(Tab::CURRICULO_DET);
        if (!is_null($cur))
            $this->codigoCurriculo = $cur;

        $this->sql = "SELECT
            {$this->tabela}.`Codigo_Curriculo` AS Codigo_Curriculo,
            {$this->tabela}.`Codigo_Disciplina` AS Codigo_Disciplina,
            tb_disciplina.`Designacao` AS Designacao
       FROM
            `{$this->tabela}` {$this->tabela} 
            INNER JOIN `" . Tab::DISCIPLINA . "` " . Tab::DISCIPLINA . " ON {$this->tabela}.`Codigo_Disciplina` = " . Tab::DISCIPLINA . ".`Codigo`";
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

        $this->SetDesignacao($codigoSubsistema);
        $this->setCodigoSubsistema($codigoCurso);
        $this->setCodigoDisciplina($codigoDisciplina);
        $this->setCodigoClasse($codigoClasse);
    }

    function GetCurriculoDet() {
        $cond = $this->codigoCurriculo > 0 ? " WHERE {$this->tabela}.Codigo_Curriculo=" . $this->codigoCurriculo . " ORDER BY Codigo DESC" : "";
        $query = $this->sql . $cond;
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetCurriculoDetID($id = 0) {
        $cond = $id > 0 ? " WHERE {$this->tabela}.Codigo_Curriculo=" . $id : "";
        $query = $this->sql . $cond;
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetDisciplinasCurriculoID() {
        $query = $this->sql . " GROUP BY {$this->tabela}.Codigo_Curriculo ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo_Curriculo' => $lista['Codigo_Curriculo'],
                'Codigo_Disciplina' => $lista['Codigo_Disciplina']
            );
            $i ++;
        //  $this->GetCurriculoDet($lista['Codigo']);
        endwhile;
    }

    private function GetListaDet() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo_Disciplina' => $lista['Codigo_Disciplina'],
                'Codigo_Curriculo' => $lista['Codigo_Curriculo']
            );
            $i

                    ++;
        endwhile;
    }

    function Grava($obj) {
        if ((isset($obj['Codigo_Disciplina']) && $obj['Codigo_Disciplina'] > 0) && (isset($obj['Codigo_Curriculo']) && $obj['Codigo_Curriculo'] > 0)) {
            return $this->Editar($obj, array(
                        'Codigo_Disciplina' => $obj['Codigo_Disciplina'],
                        'Codigo_Curriculo' => $obj['Codigo_Curriculo']
                            ), $this->tabela);
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