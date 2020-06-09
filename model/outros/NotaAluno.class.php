<?php 
Class NotaAluno extends Conexao{

    private $Codigo;
    private $CodigoAluno;
    private $CodigoDisciplina;    
    private $Nota;
    private $CodigoAnolectivo;
    private $CodigoTipoAvaliacao;
    private $CodigoTrimestre;    
    private $DataCadastro;

    function __construct() {
        parent::__construct();  
        $this->setTabela('notaAluno ');
    }

    function Preparar($Codigo, 
                 $CodigoAluno, 
                 $CodigoDisciplina,
                 $Nota,
                 $CodigoAnolectivo,
                 $CodigoTipoAvaliacao,
                 $CodigoTrimestre,
                 $DataCadastro
               ) 
                {
         $this->SetCodigo($Codigo);
         $this->SetCodigoAluno($CodigoAluno);
         $this->setCodigoDisciplina($CodigoDisciplina);
         $this->setNotata($Nota);
         $this->setCodigoAnolectivo($CodigoAnolectivo);
         $this->setCodigoTipoAvaliacao($CodigoTipoAvaliacao);
         $this->setCodigoTrimestre($CodigoTrimestre);
         $this->set($DataCadastro);   
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoAluno() {
        return $this->CodigoAluno;
    }

    function getCodigoDisciplina() {
        return $this->CodigoDisciplina;
    }

    function getNota() {
        return $this->Nota;
    }

    function getCodigoAnolectivo() {
        return $this->CodigoAnolectivo;
    }

    function getCodigoTipoAvaliacao() {
        return $this->CodigoTipoAvaliacao;
    }

    function getCodigoTrimestre() {
        return $this->CodigoTrimestre;
    }

    function getDataCadastro() {
        return $this->DataCadastro;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function GetNotaAluno() {
        $query = "SELECT
            tb_notas_aluno.`Codigo` AS Codigo,
            tb_notas_aluno.`Codigo_Aluno` AS Codigo_Aluno,
            tb_notas_aluno.`CodigoDisciplina` AS CodigoDisciplina,
            tb_notas_aluno.`Nota` AS Nota,
            tb_notas_aluno.`Codigo_AnoLectivo` AS Codigo_AnoLectivo,
            tb_notas_aluno.`Codigo_Tipo_Avaliacao` AS Codigo_Tipo_Avaliacao,
            tb_notas_aluno.`Codigo_Trimestre` AS Codigo_Trimestre,
            tb_notas_aluno.`Data_Cadastro` AS Data_Cadastro,
            tb_notas_aluno.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_tipo_avaliacao.`Descricao` AS Tipo_Avaliacao_Descricao,
            tb_ano_lectivo.`Designacao` AS Ano_Lectivo_Designacao,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_disciplina.`Designacao` AS Disciplina_Designacao,
            tb_pessoa.`Nome` AS Aluno_Nome
       FROM
            `tb_utilizador` tb_utilizador INNER JOIN `tb_notas_aluno` tb_notas_aluno ON tb_utilizador.`Codigo` = tb_notas_aluno.`CodigoUtilizador`
            INNER JOIN `tb_tipo_avaliacao` tb_tipo_avaliacao ON tb_notas_aluno.`CodigoTipoAvaliacao` = tb_tipo_avaliacao.`Codigo`
            INNER JOIN `tb_alunos` tb_alunos ON tb_notas_aluno.`CodigoAluno` = tb_alunos.`Codigo`
            INNER JOIN `tb_ano_lectivo` tb_ano_lectivo ON tb_notas_aluno.`CodigoAnoLectivo` = tb_ano_lectivo.`Codigo`
            INNER JOIN `tb_disciplina` tb_disciplina ON tb_notas_aluno.`CodigoDisciplina` = tb_disciplina.`Codigo`
            AND tb_utilizador.`Codigo` = tb_alunos.`Codigo_Utilizador`
            INNER JOIN `tb_pessoa` tb_pessoa ON tb_alunos.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Aluno' => $lista['Codigo_Aluno'],
                'Codigo_Disciplina' => $lista['Codigo_Disciplina'],
                'Nota' => $lista['Nota'],               
                'Codigo_AnoLectivo' => $lista['Codigo_Ano_Lectivo'],
                'Codigo_Tipo_Avaliacao' => $lista['Codigo_Tipo_Avaliacao'],
                'Codigo_Trimestre' => $lista['Codigo_Trimestre'],
                'Data_Cadastro' => $lista['Data_Cadastro'],
                'Aluno_Nome' => $lista['Aluno_Nome'],
                'Disciplina_Designacao' => $lista['Disciplina_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Ano_lectivo_Designacao' => $lista['Ano_Lectivo_Designacao'],
                'Tipo_avaliacao_Descricao' => $lista['Tipo_Avaliacao_Descricao'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador']);
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

    function GetNotaAlunoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetNotaAlunoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoAluno($CodigoAluno) {
        $this->CodigoAluno = $CodigoAluno;
        if (strlen($CodigoAluno) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o codigo do Aluno ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoAluno = $CodigoAluno;
        endif;
    }
    
    function setCodigo($Codigo): void {
        $this->Codigo = $Codigo;
    }

    function setCodigoDisciplina($CodigoDisciplina): void {
        $this->CodigoDisciplina = $CodigoDisciplina;
    }

    function setNota($Nota): void {
        $this->Nota = $Nota;
    }

    function setCodigoAnolectivo($CodigoAnolectivo): void {
        $this->CodigoAnolectivo = $CodigoAnolectivo;
    }

    function setCodigoTipoAvaliacao($CodigoTipoAvaliacao): void {
        $this->CodigoTipoAvaliacao = $CodigoTipoAvaliacao;
    }

    function setCodigoTrimestre($CodigoTrimestre): void {
        $this->CodigoTrimestre = $CodigoTrimestre;
    }

    function setDataCadastro($DataCadastro): void {
        $this->DataCadastro = $DataCadastro;
    }

    function get(NotaAluno $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>