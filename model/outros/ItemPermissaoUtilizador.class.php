<?php 
Class ItemPermissaoUtilizador extends Conexao{

    private $Codigo;
    private $CodigoPermissao;
    private $CodigoUtilizador;
    private $DataPermissao;
    private $status;

    function __construct() {

        parent::__construct();
        $this->setTabela('item_permissao_utilizador');
    }

  
    private function getCodigo() {
        return $this->Codigo;
    }

    private function getCodigoPermissao() {
        return $this->CodigoPermissao;
    }

    private function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    private function getDataPermissao() {
        return $this->DataPermissao;
    }

    private function getStatus() {
        return $this->status;
    }
   
    function GetItemPermissaoUtilizador() {
        $query = "SELECT
            tb_item_permissao_utilizador.`Codigo` AS Codigo,
            tb_item_permissao_utilizador.`Codigo_Permissao` AS Codigo_Permissao,
            tb_item_permissao_utilizador.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_item_permissao_utilizador.`Data_Permissao` AS Data_Permissao,
            tb_item_permissao_utilizador.`status` AS status,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_permissao.`Designacao` AS Permissao_Designacao
    FROM
            `tb_permissao` tb_permissao INNER JOIN `tb_item_permissao_utilizador` tb_item_permissao_utilizador ON tb_permissao.`Codigo` = tb_item_permissao_utilizador.`Codigo_Permissao`
            INNER JOIN `tb_utilizador` tb_utilizador ON tb_item_permissao_utilizador.`Codigo_Utilizador` = tb_utilizador.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Permissao' => $lista['Codigo_Permissao'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Data_Permissao' => $lista['Data_Permissao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Permissao_Designacao' => $lista['Permissao_Designacao'],
                'status' => $lista['status']);
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

    function GetItemPermissaoUtilizadorID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }    

    function Apaga($id) {
        $this->GetItemPermissaoUtilizadorID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoPermissao($CodigoPermissao) {
        $this->CodigoPermissao = $CodigoPermissao;
        if (strlen($CodigoPermissao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o código de permissão ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $CodigoPermissao;
        endif;
    }
	
	private function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    private function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    private function setDataPermissao($DataPermissao) {
        $this->DataPermissao = $DataPermissao;
    }

    private function setStatus($status) {
        $this->status = $status;
    }

    function get(ItemPermissaoUtilizador $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
 ?>