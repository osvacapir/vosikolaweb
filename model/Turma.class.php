<?php

Class Turma extends Conexao {

    private $Codigo,
            $Designacao,
            $Codigo_Classe,
            $Codigo_Curso,
            $Codigo_Sala,
            $Codigo_Periodo,
            $Codigo_Estado,
            $Codigo_AnoLectivo,
            $Codigo_Subsistema,
            $Sala_Designacao,
            $Periodo_Designacao,
            $Ano_lectivo_Designacao,
            $Subsistema_Designacao,
            $Classe_Designacao,
            $Curso_Designacao,
            $Curso_Abreviatura,
            $Codigo_Professor,
            $Professor_Nome,
            $Vaga;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::TURMA);
// $this->setAlert();
        $this->sql = "SELECT
            {$this->tabela}.`Codigo` AS Codigo,
            {$this->tabela}.`Designacao` AS Designacao,
            {$this->tabela}.`Codigo_Classe` AS Codigo_Classe,
            {$this->tabela}.`Codigo_Curso` AS Codigo_Curso,
            {$this->tabela}.`Codigo_Sala` AS Codigo_Sala,
            {$this->tabela}.`Codigo_Periodo` AS Codigo_Periodo,
            {$this->tabela}.`Codigo_Estado` AS Codigo_Estado,
            {$this->tabela}.`Codigo_AnoLectivo` AS Codigo_AnoLectivo,
             {$this->tabela}.`Codigo_Professor` AS Codigo_Professor,
            {$this->tabela}.`Codigo_Subsistema` AS Codigo_Subsistema,
            {$this->tabela}.`Vaga_Alunos` AS Vaga_Alunos,
            tb_sala.`Designacao` AS Sala_Designacao,
            tb_curso.`Designacao` AS Curso_Designacao,
            tb_curso.`Abreviatura` AS Curso_Abreviatura,
            tb_periodo.`Designacao` AS Periodo_Designacao,
            tb_ano_lectivo.`Designacao` AS Ano_lectivo_Designacao,
            " . TAB::PROFESSOR . ".`Nome` AS Professor_Nome,
            tb_subsistema.`Designacao` AS Subsistema_Designacao,
            tb_classe.`Designacao` AS Classe_Designacao
       FROM
       `{$this->tabela}` {$this->tabela} 
            INNER JOIN `tb_classe` tb_classe ON tb_classe.`Codigo` = {$this->tabela}.`Codigo_Classe`
            INNER JOIN `" . TAB::PROFESSOR . "` " . TAB::PROFESSOR . " ON " . TAB::PROFESSOR . ".`Codigo` = {$this->tabela}.`Codigo_Professor`
            INNER JOIN `tb_sala` tb_sala ON {$this->tabela}.`Codigo_Sala` = tb_sala.`Codigo`
            INNER JOIN `tb_curso` tb_curso ON {$this->tabela}.`Codigo_Curso` = tb_curso.`Codigo`
            INNER JOIN `tb_periodo` tb_periodo ON {$this->tabela}.`Codigo_Periodo` = tb_periodo.`Codigo`
            INNER JOIN `tb_ano_lectivo` tb_ano_lectivo ON {$this->tabela}.`Codigo_AnoLectivo` = tb_ano_lectivo.`Codigo`
            INNER JOIN `tb_escola_sistema` tb_escola_sistema ON {$this->tabela}.`Codigo_Subsistema` = tb_escola_sistema.`Codigo`
            INNER JOIN `tb_subsistema` tb_subsistema ON tb_subsistema.`Codigo` = tb_escola_sistema.`Codigo_Subsistema`
             WHERE tb_escola_sistema.Codigo_Escola=" . $_SESSION['SYS']['CodEscola'] . "";
    }

    /*  function Preparar($Codigo,
      $Designacao,
      $CodigoClasse,
      $CodigoCurso,
      $CodigoSala,
      $CodigoPeriodo,
      $Status,
      $Codigo_AnoLectivo,
      $Codigo_Subsistema) {
      $this->SetCodigo($codigo);
      $this->SetDesignacao($Designacao);
      $this->setCodigoCurso($CodigoCurso);
      $this->setCodigoSala($CodigoSala);
      $this->setCodigoPeriodo($CodigoPeriodo);
      $this->setStatus($Status);
      $this->setCodigo_AnoLectivo($Codigo_AnoLectivo);
      $this->setCodigo_Subsistema($Codigo_Subsistema);
      }
     */

    function GetTurma($id = null) {
        $query = $this->sql . " AND Codigo_AnoLectivo=" . $_SESSION['SYS']['CodAno'];
        if (isset($id) && $id > 0) {
            $query .=" AND {$this->tabela}.Codigo=" . $id;
        } else {
            $query .= " ORDER BY {$this->tabela}.Designacao ASC";
        }
        $this->ExecutaSQL($query);
        $this->GetLista();
    //    $this->setObject(new Turma(), $this->GetItem());
    }

    /*
     *  function GetTurma() {

      $query = $this->sql . " AND Codigo_AnoLectivo=" . $_SESSION['SYS']['CodAno'];
      $query .= " ORDER BY Designacao ASC";
      $this->ExecutaSQL($query);

      $this->GetLista();
      }
     */

    function GetTurmaP($id_prof) {

        $query = $this->sql . " AND Codigo_Professor=$id_prof";
        $query .= " ORDER BY Designacao DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    /* function GetTurmaID($id) {

      $query = $this->sql . " AND {$this->tabela}.Codigo=:Codigo";
      $params = array(':Codigo' => (int) $id);
      $this->ExecutaSQL($query, $params);
      $this->GetLista();
      } */

    private function GetLista() {
        $i = 1;


        while ($lista = $this->ListarDados()):

            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                'Codigo_Classe' => $lista['Codigo_Classe'],
                'Codigo_Curso' => $lista['Codigo_Curso'],
                'Codigo_Sala' => $lista['Codigo_Sala'],
                'Codigo_Periodo' => $lista['Codigo_Periodo'],
                'Codigo_Estado' => $lista['Codigo_Estado'],
                'Codigo_AnoLectivo' => $lista['Codigo_AnoLectivo'],
                'Codigo_Subsistema' => $lista['Codigo_Subsistema'],
                'Sala_Designacao' => $lista['Sala_Designacao'],
                'Periodo_Designacao' => $lista['Periodo_Designacao'],
                'Ano_lectivo_Designacao' => $lista['Ano_lectivo_Designacao'],
                'Subsistema_Designacao' => $lista['Subsistema_Designacao'],
                'Classe_Designacao' => $lista['Classe_Designacao'],
                'Curso_Designacao' => $lista['Curso_Designacao'],
                'Curso_Abreviatura' => $lista['Curso_Abreviatura'],
                'Codigo_Professor' => $lista['Codigo_Professor'],
                'Professor_Nome' => $lista['Professor_Nome'],
                'Vaga_Alunos' => $lista['Vaga_Alunos']
            );

            $i++;
        endwhile;
      //  $this->setObject(new Turma(), $this->GetItem());
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
        $this->GetTurma($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class = "alert alert-danger " id = "erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }

    public function __get($name) {
        return $this->name;
    }

    public function __set($name, $value) {
        $this->name = $value;
    }

    function get(Turma $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->Codigo}'"));
        $this->setObject($obj, $query);
    }

}

?>