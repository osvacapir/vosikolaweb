<?php 
Class Password extends Conexao{

    private $Codigo;
    private $CodigoUtilizador;
    private $Token;    
    private $CodigoEstado;

    function __construct() {
        parent::__construct();  
        $this->setTabela('password');
    }

    function Preparar($Codigo, $CodigoUtilizador, $Token,$CodigoEstado) {
        $this->SetCodigo($Codigo);
        $this->SetCodigoUtilizador($CodigoUtilizador);
        $this->setToken($Token);
        $this->setCodigoEstado($CodigoEstado);
        
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function getToken() {
        return $this->Token;
    }

    function getCodigoEstado() {
        return $this->CodigoEstado;
    }

    function GetPassword() {
        $query = "SELECT
                tb_password.`Codigo` AS Codigo,
                tb_password.`Codigo_Utilizador` AS Codigo_Utilizador,
                tb_password.`Token` AS Token,
                tb_password.`Codigo_Estado` AS Codigo_Estado,
                tb_utilizador.`Nome` AS Utilizador_Nome
           FROM
                `tb_utilizador` tb_utilizador INNER JOIN `tb_password` tb_password ON tb_utilizador.`Codigo` = tb_password.`Codigo_Utilizador`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Token' => $lista['Token'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Codigo_Estado' => $lista['Codigo_Estado']);
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

    function GetPasswordID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetPasswordID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
        if (strlen($designacao) < 4):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o codigo do utilizador ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoUtilizador = $CodigoUtilizador;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setToken($Token) {
        $this->Token = $Token;
    }

    function setCodigoEstado($CodigoEstado) {
        $this->CodigoEstado = $CodigoEstado;
    }

    function get(Password$obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>