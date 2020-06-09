
<?php

Class Anulacoes extends Conexao {

    private $codigo;
    private $codigoConfirmacao;
    private $dataAnulacao;
    private $codigoMotivoAnulacao;
    private $codigoUtilizador;

     

    function __construct() {
        parent::__construct();
        $this->setTabela('anulacoes');
    }
    
      function Preparar($codigo, $codigoConfirmacao, $dataAnulacao, $codigoMotivoAnulacao,$codigoUtilizador) {
        
        $this->SetCodigo($codigo);
        $this->SetCodigoConfirmacao($codigoConfirmacao);
        $this->setdataAnulacao($dataAnulacao);
        $this->setCodigoMotivoAnulacao($codigoMotivoAnulacao);
        $this->setCodigoUtilizador($codigoUtilizador);
        
    }
    function GetAnulacoes() {
        $query = "SELECT
        tb_anulacao.`Codigo` AS Codigo,
        tb_anulacao.`Codigo_Matricula` AS Codigo_Matricula,
        tb_anulacao.`Data_Anulacao` AS Data_Anulacao,
        tb_anulacao.`Codigo_Motivo_Anulacao` AS Codigo_Motivo_Anulacao,
        tb_anulacao.`Codigo_Utilizador` AS Codigo_Utilizador,
        tb_pessoa.`Nome` AS Alunos_Nome,
        tb_utilizador.`Nome` AS Utilizador_Nome,
        tb_motivos_anulacao.`Designacao` AS Motivos_anulacao
   FROM
        `tb_matricula` tb_matricula INNER JOIN `tb_anulacao` tb_anulacao ON tb_matricula.`Codigo` = tb_anulacao.`Codigo_Matricula`
        INNER JOIN `tb_alunos` tb_alunos ON tb_matricula.`Codigo_Aluno` = tb_alunos.`Codigo`
        INNER JOIN `tb_pessoa` tb_pessoa ON tb_alunos.`Codigo_Pessoa` = tb_pessoa.`Codigo`
        INNER JOIN `tb_motivos_anulacao` tb_motivos_anulacao ON tb_anulacao.`Codigo_Motivo_Anulacao` = tb_motivos_anulacao.`Codigo`
        INNER JOIN `tb_utilizador` tb_utilizador ON tb_anulacao.`Codigo_Utilizador` = tb_utilizador.`Codigo`";
        $query .= " ORDER BY Data_Anulacao DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Data_Anulacao' => $lista['Data_Anulacao'],
                'Alunos_nome' => $lista['Alunos_nome'],
                'Motivos_anulacao' => $lista['Motivos_anulacao']);
            $i++;
        endwhile;
    }

    function GetAnulacoesID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }
    
    function setCodigoConfirmacao($CodigoConfirmacao) {
        $this->designacao = $CodigoConfirmacao;
        if (strlen($CodigoConfirmacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o codigo da Anulação  ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoConfirmacao = $CodigoConfirmacao;
        endif;
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
        $this->GetAnulacoesID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDataAnulacao($dataAnulacao) {
        $this->dataAnulacao = $dataAnulacao;
    }

    function setCodigoMotivoAnulacao($codigoMotivoAnulacao) {
        $this->codigoMotivoAnulacao = $codigoMotivoAnulacao;
    }

    function setCodigoUtilizador($codigoUtilizador) {
        $this->codigoUtilizador = $codigoUtilizador;
    }
  
    function get(Anulacoes $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}

?>