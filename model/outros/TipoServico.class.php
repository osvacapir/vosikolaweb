<?php 
Class TipoServico extends Conexao{

    private $Codigo;
    private $Designacao;
    private $Preco;
    private $Descricao;
    private $CodigoUtilizador;
    private $CodigoMoeda;
    private $TipoServico;
    private $Status;

    function __construct() {
        parent::__construct();
        $this->setTabela('tipo_servico');
    }

    function Preparar($Codigo, $Designacao, $Preco, $Descricao,$CodigoUtilizador,$CodigoMoeda,$TipoServico,$Status) {
        
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->setPreco($Preco);
        $this->setDescricao($Descricao);
        $this->setCodigoUtilizador($CodigoUtilizador);
        $this->setCodigoMoeda($CodigoMoeda);
        $this->setTipoServico($TipoServico);
        $this->setStatus($Status); 
             
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getPreco() {
        return $this->Preco;
    }

    function getDescricao() {
        return $this->Descricao;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function getCodigoMoeda() {
        return $this->CodigoMoeda;
    }

    function getTipoServico() {
        return $this->TipoServico;
    }

    function getStatus() {
        return $this->Status;
    }

    function GetTipoServicoL() {
        $query = "SELECT
            tb_tipo_servico.`Codigo` AS Codigo,
            tb_tipo_servico.`Designacao` AS Designacao,
            tb_tipo_servico.`Preco` AS Preco,
            tb_tipo_servico.`Descricao` AS Descricao,
            tb_tipo_servico.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_tipo_servico.`Codigo_Moeda` AS Codigo_Moeda,
            tb_tipo_servico.`TipoServico` AS TipoServico,
            tb_tipo_servico.`Status` AS Status,
            tb_moeda.`Designacao` AS Moeda_Designacao,
            tb_utilizador.`Nome` AS Utilizador_Nome
       FROM
            `tb_utilizador` tb_utilizador INNER JOIN `tb_tipo_servico` tb_tipo_servico ON tb_utilizador.`Codigo` = tb_tipo_servico.`Codigo_Utilizador`
            INNER JOIN `tb_moeda` tb_moeda ON tb_tipo_servico.`Codigo_Moeda` = tb_moeda.`Codigo`";
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
                'Preco' => $lista['Preco'],
                'Descricao' => $lista['Descricao'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Codigo_Moeda' => $lista['Codigo_Moeda'],
                'TipoServico' => $lista['TipoServico'],
                'Moeda_Designacao' => $lista['Moeda_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Status' => $lista['Status']);
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

    function GetTipoServicoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }  

    function Apaga($id) {
        $this->GetTipoServicoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite Tipo de serviço ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setPreco($Preco) {
        $this->Preco = $Preco;
    }

    function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function setCodigoMoeda($CodigoMoeda) {
        $this->CodigoMoeda = $CodigoMoeda;
    }

    function setTipoServico($TipoServico) {
        $this->TipoServico = $TipoServico;
    }

    function setStatus($Status) {
        $this->Status = $Status;
    }

    function get(TipoServico $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>