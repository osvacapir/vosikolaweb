<?php 
Class PedidosDeclaracao extends Conexao{

    private $Codigo=0;
    private $CodigoConfirmacao;
    private $DataPedidoDeclaracao;    
    private $CodigoEfeito;
    private $CodigoTipoDeclaracao;
    private $CodigoUtilizador;

    function __construct() {
        parent::__construct();  
        $this->setTabela('pedidos_declaracao');
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoConfirmacao() {
        return $this->CodigoConfirmacao;
    }

    function getDataPedidoDeclaracao() {
        return $this->DataPedidoDeclaracao;
    }

    function getCodigoEfeito() {
        return $this->CodigoEfeito;
    }

    function getCodigoTipoDeclaracao() {
        return $this->CodigoTipoDeclaracao;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function setCodigoConfirmacao($CodigoConfirmacao) {
        $this->CodigoConfirmacao = $CodigoConfirmacao;
    }

    function setDataPedidoDeclaracao($DataPedidoDeclaracao) {
        $this->DataPedidoDeclaracao = $DataPedidoDeclaracao;
    }

    function setCodigoEfeito($CodigoEfeito) {
        $this->CodigoEfeito = $CodigoEfeito;
    }

    function setCodigoTipoDeclaracao($CodigoTipoDeclaracao) {
        $this->CodigoTipoDeclaracao = $CodigoTipoDeclaracao;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }
    
    function GetPedidosDeclaracao() {
        $query = "SELECT
            tb_pedidos_declaracao.`Codigo` AS Codigo,
            tb_pedidos_declaracao.`Codigo_Confirmacao` AS Codigo_Confirmacao,
            tb_pedidos_declaracao.`Data_Pedido_Declaracao` AS Data_Pedido_Declaracao,
            tb_pedidos_declaracao.`Codigo_Efeito` AS Codigo_Efeito,
            tb_pedidos_declaracao.`Codigo_Tipo_Declaracao` AS Codigo_Tipo_Declaracao,
            tb_pedidos_declaracao.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_tipo_declaracao.`Designacao` AS Tipo_Declaracao_Designacao,
            tb_pessoa.`Nome` AS Pessoa_Nome,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_efeitos_declaracao.`Designacao` AS Efeito_Designacao
        FROM
            `tb_utilizador` tb_utilizador INNER JOIN `tb_pedidos_declaracao` tb_pedidos_declaracao ON tb_utilizador.`Codigo` = tb_pedidos_declaracao.`Codigo_Utilizador`
            INNER JOIN `tb_tipo_declaracao` tb_tipo_declaracao ON tb_pedidos_declaracao.`Codigo_Tipo_Declaracao` = tb_tipo_declaracao.`Codigo`
            INNER JOIN `tb_efeitos_declaracao` tb_efeitos_declaracao ON tb_pedidos_declaracao.`Codigo_Efeito` = tb_efeitos_declaracao.`Codigo`
            INNER JOIN `tb_matricula` tb_matricula ON tb_utilizador.`Codigo` = tb_matricula.`Codigo_Utilizador`
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
                'Data_Pedido_Declaracao' => $lista['Data_Pedido_Declaracao'],
                'Codigo_Efeito' => $lista['Codigo_Efeito'],
                'Codigo_Tipo_Declaracao' => $lista['Codigo_Tipo_Declaracao'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Tipo_Declaracao_Designacao' => $lista['Tipo_Declaracao_Designacao'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Efeito_Designacao' => $lista['Efeito_Designacao']);
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

    function GetPedidosDeclaracaoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetPedidosDeclaracaoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }    
}
?>