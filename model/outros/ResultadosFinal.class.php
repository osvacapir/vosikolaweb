<?php 
Class ResultadosFinal extends Conexao{

    private $Codigo;
    private $CodigoConfirmacao;
    private $CodigoDisciplina;
    private $MediaFinal;
    private $CodigoClassificacaoFinal;
    private $CodigoUtilizador;

    function __construct() {
        parent::__construct();  
        $this->setTabela('resultados_final');
    }
      
    function Preparar($Codigo, $CodigoConfirmacao, $CodigoDisciplina, $MediaFinal,$CodigoClassificacaoFinal,$CodigoUtilizador) {
        
        $this->SetCodigo($Codigo);
        $this->SetCodigoConfirmacao($CodigoConfirmacao);
        $this->setCodigoDisciplina($CodigoDisciplina);
        $this->setCodigoClassificacaoFinal($CodigoClassificacaoFinal);
        $this->setCodigoClassificacaoFinal($CodigoClassificacaoFinal);
        $this->setCodigoUtilizador($CodigoUtilizador);
       
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoConfirmacao() {
        return $this->CodigoConfirmacao;
    }

    function getCodigoDisciplina() {
        return $this->CodigoDisciplina;
    }

    function getMediaFinal() {
        return $this->MediaFinal;
    }

    function getCodigoClassificacaoFinal() {
        return $this->CodigoClassificacaoFinal;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function GetResultadosFinal() {
        $query = "SELECT
            tb_resultados_final.`Codigo` AS Codigo,
            tb_resultados_final.`Codigo_Confirmacao` AS Codigo_Confirmacao,
            tb_resultados_final.`Codigo_Disciplina` AS Codigo_Disciplina,
            tb_resultados_final.`Media_Final` AS Media_Final,
            tb_resultados_final.`Codigo_Classificacao_Final` AS Codigo_Classificacao_Final,
            tb_resultados_final.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_disciplina.`Designacao` AS Disciplina_Designacao,
            tb_classificacao_final.`Designacao` AS Classificacao_Final_Designacao,
            tb_classificacao_final.`Descricao` AS Classificacao_Final_Descricao,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_pessoa.`Nome` AS Pessoa_Nome
    FROM
            `tb_resultados_final` tb_resultados_final INNER JOIN `tb_matricula` tb_matricula ON tb_matricula.`Codigo` = tb_resultados_final.`Codigo_Confirmacao`
            INNER JOIN `tb_disciplina` tb_disciplina ON tb_resultados_final.`Codigo_Disciplina` = tb_disciplina.`Codigo`
            INNER JOIN `tb_classificacao_final` tb_classificacao_final ON tb_resultados_final.`Codigo_Classificacao_Final` = tb_classificacao_final.`Codigo`
            INNER JOIN `tb_utilizador` tb_utilizador ON tb_resultados_final.`Codigo_Utilizador` = tb_utilizador.`Codigo`
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
                'Codigo_Confirmacao' => $lista['Codigo_Confirmacao'],
                'Codigo_Disciplina' => $lista['Codigo_Disciplina'],
                'Media_Final' => $lista['Media_Final'],
                'Codigo_Classificacao_Final' => $lista['Codigo_Classificacao_Final'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Disciplina_Designacao' => $lista['Disciplina_Designacao'],
                'Classificacao_Final_Designacao' => $lista['Classificacao_Final_Designacao'],
                'Classificacao_Final_Descricao' => $lista['Classificacao_Final_Descricao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Pessoa_Nome' => $lista['Pessoa_Nome']);
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
    
    function GetResultadosFinalID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }    

    function Apaga($id) {
        $this->GetResultadosFinalID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoConfirmacao($CodigoConfirmacao) {
        $this->CodigoConfirmacao = $CodigoConfirmacao;
        if (strlen($CodigoConfirmacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o codigo de comfirmação';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoConfirmacao = $CodigoConfirmacao;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setCodigoDisciplina($CodigoDisciplina) {
        $this->CodigoDisciplina = $CodigoDisciplina;
    }

    function setMediaFinal($MediaFinal) {
        $this->MediaFinal = $MediaFinal;
    }

    function setCodigoClassificacaoFinal($CodigoClassificacaoFinal) {
        $this->CodigoClassificacaoFinal = $CodigoClassificacaoFinal;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function get(ResultadosFinal $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>