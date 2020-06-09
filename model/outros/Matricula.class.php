<?php

Class Matricula extends Aluno {

    private $odigo;
    private $designacao;
    private $codigoStatus;
    private $AlunosList;
    private $TurmasList;
    private $InscricaoList;
    private $CurriculoList;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::MATRICULA);
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

    public function getCodigoStatus() {
        return $codigoStatus;
    }

    public function setCodigoStatus($codigoStatus) {
        $this->codigoStatus = $codigoStatus;
    }

    public function getTbAlunosList() {
        return $AlunosList;
    }

    public function setTbAlunosList($AlunosList) {
        $this->AlunosList = $AlunosList;
    }

    public function getTbTurmasList() {
        return $TurmasList;
    }

    public function setTbTurmasList($tbTurmasList) {
        $this->TurmasList = $TurmasList;
    }

    public function getInscricaoList() {
        return $InscricaoList;
    }

    public function setInscricaoList($InscricaoList) {
        $this->InscricaoList = $InscricaoList;
    }

    public function getTbCurriculoList() {
        return $CurriculoList;
    }

    public function setCurriculoList($tbCurriculoList) {
        $this->CurriculoList = $CurriculoList;
    }

    function GetMatricula() {
        $query = "SELECT
            tb_matricula.`Codigo` AS Matricula_Codigo,
            tb_matricula.`Codigo_Turma` AS Matricula_Codigo_Turma,
            tb_matricula.`Codigo` AS Codigo,
            tb_pessoa.`Nome` AS Nome,
            tb_pessoa.`Sexo` AS Sexo,
            tb_pessoa.`DataNascimento` AS DataNascimentoN
       FROM
            `tb_matricula` tb_matricula 
            INNER JOIN `tb_aluno` tb_aluno ON tb_aluno.`Codigo` = tb_matricula.`Codigo_Aluno`
            INNER JOIN `tb_pessoa` tb_pessoa ON tb_aluno.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Nome ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Sexo' => $lista['Sexo'],
                'Nome' => $lista['Nome'],
                'Codigo_Lingua_Opcao' => $lista['Matricula_Codigo__Lingua_Opcao'],
                'DataNascimento' => Sistema::Fdata_D_M_A($lista['DataNascimento']),
                'Idade' => Sistema::CalculaIdade($lista['DataNascimento'])
            );
            $i++;
        endwhile;
    }

    public function GetAlunosMatriculados($turma = null) {

        $query = "SELECT
            tb_matricula.`Codigo` AS Codigo,
            tb_matricula.`Codigo_Turma` AS Matricula_Codigo_Turma,
            tb_matricula.`Codigo_Lingua_Opcao` AS Matricula_Codigo__Lingua_Opcao,
            tb_matricula.`Codigo` AS Codigo_Aluno,
            tb_pessoa.`Nome` AS Nome,
            tb_pessoa.`Sexo` AS Sexo,
             tb_pessoa.`DataNascimento` AS DataNascimento
       FROM
            `tb_matricula` tb_matricula INNER JOIN `tb_aluno` tb_aluno ON tb_aluno.`Codigo` = tb_matricula.`Codigo_Aluno`
            INNER JOIN `tb_pessoa` tb_pessoa ON tb_aluno.`Codigo_Pessoa` = tb_pessoa.`Codigo`";

        $params = is_null($turma) ? null : array(':Codigo' => (int) $turma);
        $query .= is_null($params) ? "" : " WHERE tb_matricula.`Codigo_Turma`=:Codigo";
        $query .= " ORDER BY Nome";
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function GravaM($obj) {

        if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
            return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
          
        } elseif (!isset($valores['Codigo'])) {
            unset($obj['Codigo']);
            return $this->Inserir($obj);
        }
    }

    function GravaMatrLista($mat, $alun, $pessoa, $turm) {
//INSERIR PESSOA
        if (isset($pessoa['Codigo']) && $pessoa['Codigo'] > 0) {
            return $pessoa->Editar($obj, array('Codigo' => $pessoa['Codigo']), $pessoa->tabela);
        } elseif (!isset($valores['Codigo'])) {
            unset($pessoa['Codigo']);
            return Inserir($pessoa);
        } else {

            //INSERIR ALUNO
            if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
                return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
            } elseif (!isset($valores['Codigo'])) {
                unset($obj['Codigo']);
                return $this->Inserir($obj);
            } else {
                //INSERIR MATRICULA
                if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
                    return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
                } elseif (!isset($valores['Codigo'])) {
                    unset($obj['Codigo']);
                    return $this->Inserir($obj);
                }
            }
        }
    }

}

?>