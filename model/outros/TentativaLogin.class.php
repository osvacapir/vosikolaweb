<?php 
Class TentativaLogin extends Conexao{

    private $Codigo=0;
    private $CodigoUsuario;
    private $DataTentativa;

    function __construct() {
        parent::__construct(); 
        $this->setTabela('tentativa_login'); 
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoUsuario() {
        return $this->CodigoUsuario;
    }

    function getDataTentativa() {
        return $this->DataTentativa;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setCodigoUsuario($CodigoUsuario) {
        $this->CodigoUsuario = $CodigoUsuario;
    }

    function setDataTentativa($DataTentativa) {
        $this->DataTentativa = $DataTentativa;
    }
    
    function GetTentativaLogin() {
        $query = "SELECT
        tb_tentativa_login.`Codigo` AS Codigo,
        tb_tentativa_login.`Codigo_Usuario` AS Codigo_Usuario,
        tb_tentativa_login.`Data_Tentativa` AS Data_Tentativa,
        tb_utilizador.`Nome` AS Utilizador_Nome
   FROM
        `tb_utilizador` tb_utilizador INNER JOIN `tb_tentativa_login` tb_tentativa_login ON tb_utilizador.`Codigo` = tb_tentativa_login.`Codigo_Usuario`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Usuario' => $lista['Codigo_Usuario'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Data_Tentativa' => $lista['Data_Tentativa']);
            $i++;
        endwhile;
    }

    function GetTentativaLoginID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
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
        $this->GetTentativaLoginID($id);
        return $this->Apagar(array("Codigo" => $id));
    }
}
 ?>