<?php 
Class Nota extends Conexao{

    private $Codigo;
    private $CodigoConfirmacao;
    private $Nota;
    private $CodigoDisciplina;
    private $DataCadastro;
    private $CodigoTipoAvaliacao;
    private $CodigoUtilizador;

    function __construct() {
        parent::__construct();
        $this->setTabela('nota');
    }
    
    function Preparar($Codigo, $CodigoConfirmacao, $Nota, $CodigoDisciplina,$DataCadastro,$CodigoTipoAvaliacao,$CodigoUtilizador) {
        
        $this->SetCodigo($Codigo);
        $this->SetCodigoConfirmacao($CodigoConfirmacao);
        $this->setNota($Nota);
        $this->setCodigoDisciplina($CodigoDisciplina);
        $this->setDataCadastro($DataCadastro);
        $this->setCodigoTipoAvaliacao($CodigoTipoAvaliacao);
        $this->setCodigoUtilizador($CodigoUtilizador);

    }
    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoConfirmacao() {
        return $this->CodigoConfirmacao;
    }

    /*function getNota() {
        return $this->Nota;
    }*/

    function getCodigoDisciplina() {
        return $this->CodigoDisciplina;
    }

    function getDataCadastro() {
        return $this->DataCadastro;
    }

    function getCodigoTipoAvaliacao() {
        return $this->CodigoTipoAvaliacao;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }
 
    function GetNota() {
        $query = "SELECT
                tb_nota.`Codigo` AS  Codigo,
                tb_nota.`CodigoMatricula` AS  CodigoMatricula,
                tb_nota.`Nota` AS  Nota,
                tb_nota.`CodigoDisciplina` AS  CodigoDisciplina,
                tb_nota.`DataCadastro` AS  DataCadastro,
                tb_nota.`CodigoTrimestre` AS  CodigoTrimestre,
                tb_nota.`CodigoTipoAvaliacao` AS  CodigoTipoAvaliacao,
                tb_nota.`CodigoUtilizador` AS  CodigoUtilizador,
                tb_disciplina.`Designacao` AS Disciplina_Designacao,
                tb_tipo_avaliacao.`Descricao` AS Tipo_Avaliacao_Descricao,
                tb_utilizador.`Nome` AS Utilizador_Nome,
                tb_pessoa.`Nome` AS Pessoa_Nome
        FROM
                `tb_nota` tb_nota INNER JOIN `tb_matricula` tb_matricula ON tb_matricula.`Codigo` = tb_nota.`CodigoMatricula`
                INNER JOIN `tb_disciplina` tb_disciplina ON tb_nota.`CodigoDisciplina` = tb_disciplina.`Codigo`
                INNER JOIN `tb_tipo_avaliacao` tb_tipo_avaliacao ON tb_nota.`CodigoTipoAvaliacao` = tb_tipo_avaliacao.`Codigo`
                INNER JOIN `tb_utilizador` tb_utilizador ON tb_nota.`CodigoUtilizador` = tb_utilizador.`Codigo`
                AND tb_utilizador.`Codigo` = tb_matricula.`Codigo_Utilizador`
                INNER JOIN `tb_alunos` tb_alunos ON tb_utilizador.`Codigo` = tb_alunos.`Codigo_Utilizador`
                AND tb_alunos.`Codigo` = tb_matricula.`Codigo_Aluno`
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
                'CodigoMatricula' => $lista['CodigoMatricula'],
                'Nota' => $lista['Nota'],
                'CodigoDisciplina' => $lista['CodigoDisciplina'],
                'DataCadastro' => $lista['DataCadastro'],
                'CodigoTrimestre' => $lista['CodigoTrimestre'],
                'CodigoTipoAvaliacao' => $lista['CodigoTipoAvaliacao'],
                'Disciplina_Designacao' => $lista['Disciplina_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Tipo_Avaliacao_Descricao' => $lista['Tipo_Avaliacao_Descricao'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'CodigoUtilizador' => $lista['CodigoUtilizador']);
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
    
    function GetNotaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetNotaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoConfirmacao($CodigoConfirmacao) {
        $this->designacao = $CodigoConfirmacao;
        if (strlen($CodigoConfirmacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoConfirmacao = $CodigoConfirmacao;
        endif;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setNota($Nota) {
        $this->Nota = $Nota;
    }

    function setCodigoDisciplina($CodigoDisciplina) {
        $this->CodigoDisciplina = $CodigoDisciplina;
    }

    function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    function setCodigoTipoAvaliacao($CodigoTipoAvaliacao) {
        $this->CodigoTipoAvaliacao = $CodigoTipoAvaliacao;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }
    
    function get(Nota $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>