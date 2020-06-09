<?php 
Class EntregaDeclarcao extends Conexao{

    private $Codigo;
    private $CodigoPedidoDeclaracao;
    private $DataEntrega;
    private $CodigoUtilizador;

    function __construct() {
        parent::__construct();
        $this->setTabela('entrega_declarcao');
    }

    function Preparar($Codigo, $CodigoPedidoDeclaracao, $DataEntrega,$CodigoUtilizador) {
        $this->SetCodigo($Codigo);
        $this->setCodigoPedidoDeclaracao($CodigoPedidoDeclaracao);
        $this->setDataEntrega($DataEntrega);
		$this->setCodigoUtilizador($CodigoUtilizador);
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoPedidoDeclaracao() {
        return $this->CodigoPedidoDeclaracao;
    }

    function getDataEntrega() {
        return $this->DataEntrega;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function GetEntregaDeclarcao() {
        $query = "SELECT
            tb_entrega_declarcao.`Codigo` AS Codigo,
            tb_entrega_declarcao.`Codigo_Pedido_Declaracao` AS Codigo_Pedido_Declaracao,
            tb_entrega_declarcao.`Data_Entrega` AS Data_Entrega,
            tb_entrega_declarcao.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_pedidos_declaracao.`Data_Pedido_Declaracao` AS Data_Pedido_Declaracao
       FROM
            `tb_pedidos_declaracao` tb_pedidos_declaracao INNER JOIN `tb_entrega_declarcao` tb_entrega_declarcao ON tb_pedidos_declaracao.`Codigo` = tb_entrega_declarcao.`Codigo_Pedido_Declaracao`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Pedido_Declaracao' => $lista['Codigo_Pedido_Declaracao'],
                'Data_Entrega' => $lista['Data_Entrega'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Data_Pedido_Declaracao' => $lista['Data_Pedido_Declaracao']);
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
        $this->GetEntregaDeclarcaoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoPedidoDeclaracao($CodigoPedidoDeclaracao) {
        $this->CodigoPedidoDeclaracao = $CodigoPedidoDeclaracao;
        if (strlen($CodigoPedidoDeclaracao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o código do pedido da declaração ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoPedidoDeclaracao = $CodigoPedidoDeclaracao;
        endif;
    }
	
	    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setDataEntrega($DataEntrega) {
        $this->DataEntrega = $DataEntrega;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function get(EntregaDeclarcao $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
 ?>