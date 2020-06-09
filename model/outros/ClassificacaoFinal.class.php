<?php
Class TbClassificacaoFinal extends Conexao {
   
    private $Codigo;
    private $Designacao;
    private $Descricao;
    
    
        function __construct() {

         parent::__construct();
        $this->setTabela('classificacao_final');
    }
    
    function Preparar($Codigo, $Designacao, $Descricao) {
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->SetDesignacao($Descricao);
      
    }

    public function getCodigo() {
        return $codigo;
    }

    public function getDesignacao() {
        return $designacao;
    }
 
    public function getDescricao() {
        return $descricao;
    }

    function GetClassificacao_final() {
        $query = "SELECT *FROM tb_classificacao_final";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetTbClassificacaoFinalID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Descricao' => $lista['Descricao'],
                'Designacao' => $lista['Designacao']);
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

    function Apaga($id) {
        $this->GetTbClassificacaoFinalID($id);
        return $this->Apagar(array("Codigo" => $id));
    }
    
    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite a classificação  ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    function get(TbClassificacaoFinalsss $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>