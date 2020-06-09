<?php

Class Modulo extends Conexao {

    private $Codigo;
    private $Designacao;
    private $CodigoTurma;
    private $CodigoDisciplina;
    private $CodigoAnolectivo;
    private $CodigoClasse;
    private $CodigoCurso;
    private $CodigoProfessor;

    function __construct() {
        parent::__construct();
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getCodigoTurma() {
        return $this->CodigoTurma;
    }

    function getCodigoDisciplina() {
        return $this->CodigoDisciplina;
    }

    function getCodigoAnolectivo() {
        return $this->CodigoAnolectivo;
    }

    function getCodigoClasse() {
        return $this->CodigoClasse;
    }

    function getCodigoCurso() {
        return $this->CodigoCurso;
    }

    function getCodigoProfessor() {
        return $this->CodigoProfessor;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setCodigoTurma($CodigoTurma) {
        $this->CodigoTurma = $CodigoTurma;
    }

    function setCodigoDisciplina($CodigoDisciplina) {
        $this->CodigoDisciplina = $CodigoDisciplina;
    }

    function setCodigoAnolectivo($CodigoAnolectivo) {
        $this->CodigoAnolectivo = $CodigoAnolectivo;
    }

    function setCodigoClasse($CodigoClasse) {
        $this->CodigoClasse = $CodigoClasse;
    }

    function setCodigoCurso($CodigoCurso) {
        $this->CodigoCurso = $CodigoCurso;
    }

    function setCodigoProfessor($CodigoProfessor) {
        $this->CodigoProfessor = $CodigoProfessor;
    }

    function GetModulo() {
        $query = "SELECT
                tb_modulo.`Codigo` AS Codigo,
                tb_modulo.`Designacao` AS Designacao,
                tb_modulo.`Codigo_Turma` AS Codigo_Turma,
                tb_modulo.`Codigo_Disciplina` AS Codigo_Disciplina,
                tb_modulo.`Codigo_AnoLectivo` AS Codigo_AnoLectivo,
                tb_modulo.`Codigo_Classe` AS Codigo_Classe,
                tb_modulo.`Codigo_Curso` AS Codigo_Curso,
                tb_modulo.`Codigo_Professor` AS Codigo_Professor,
                tb_professor.`Nome` AS Professore_Nome,
                tb_classe.`Designacao` AS Classe_Designacao,
                tb_ano_lectivo.`Designacao` AS Ano_lectivo_Designacao,
                tb_disciplina.`Designacao` AS Disciplina_Designacao,
                tb_turma.`Designacao` AS Turma_Designacao,
                tb_curso.`Designacao` AS Curso_Designacao,
                tb_pessoa.`Nome` AS Pessoa_Nome
           FROM
                `tb_professor` tb_professor INNER JOIN `tb_modulo` tb_modulo ON tb_professor.`Codigo` = tb_modulo.`Codigo_Professor`
                INNER JOIN `tb_classe` tb_classe ON tb_modulo.`Codigo_Classe` = tb_classe.`Codigo`
                INNER JOIN `tb_curso` tb_curso ON tb_modulo.`Codigo_Curso` = tb_curso.`Codigo`
                INNER JOIN `tb_ano_lectivo` tb_ano_lectivo ON tb_modulo.`Codigo_AnoLectivo` = tb_ano_lectivo.`Codigo`
                INNER JOIN `tb_disciplina` tb_disciplina ON tb_modulo.`Codigo_Disciplina` = tb_disciplina.`Codigo`
                INNER JOIN `tb_turma` tb_turma ON tb_modulo.`Codigo_Turma` = tb_turma.`Codigo`
                AND tb_ano_lectivo.`Codigo` = tb_turma.`Codigo_AnoLectivo`
                AND tb_curso.`Codigo` = tb_turma.`Codigo_Curso`
                AND tb_classe.`Codigo` = tb_turma.`Codigo_Classe`
                INNER JOIN `tb_pessoa` tb_pessoa ON tb_professor.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                'Codigo_Turma' => $lista['Codigo_Turma'],
                'Codigo_Disciplina' => $lista['Codigo_Disciplina'],
                'Codigo_AnoLectivo' => $lista['Codigo_AnoLectivo'],
                'Codigo_Classe' => $lista['Codigo_Classe'],
                'Codigo_Curso' => $lista['Codigo_Curso'],
                'Professore_Nome' => $lista['Professore_Nome'],
                'Classe_Designacao' => $lista['Classe_Designacao'],
                'Ano_lectivo_Designacao' => $lista['Ano_lectivo_Designacao'],
                'Disciplina_Designacao' => $lista['Disciplina_Designacao'],
                'Turma_Designacao' => $lista['Turma_Designacao'],
                'Curso_Designacao' => $lista['Curso_Designacao'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'Codigo_Professor' => $lista['Codigo_Professor']);
            $i++;
        endwhile;
    }

    function GetModuloID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
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
        $this->GetModuloID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite a moeda';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }    
}
?>