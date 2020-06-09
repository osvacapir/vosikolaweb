<?php 
Class Log extends Conexao{

    private $Codigo;
    private $Designacao;
    private $OBS;
    private $Data;
    private $CodigoUtilizador;


    function __construct() {
        parent::__construct();
        $this->setTabela('Log');
    }
    
    function Preparar($Codigo, $Designacao, $OBS, $Data, $CodigoUtilizador) {
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->SetOBS($OBS);
        $this->SetData($Data);
        $this->SetCodigoUtilizador($CodigoUtilizador);
        
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getOBS() {
        return $this->OBS;
    }

    function getData() {
        return $this->Data;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function GetLog() {
        $query = "SELECT
            tb_log.`Codigo` AS Codigo,
            tb_log.`Descricao` AS Descricao,
            tb_log.`OBS` AS OBS,
            tb_log.`Data` AS Data,
            tb_log.`CodigoUtilizador` AS CodigoUtilizador,
            tb_utilizador.`Nome` AS Utilizador_Nome
    FROM
            `tb_utilizador` tb_utilizador INNER JOIN `tb_log` tb_log ON tb_utilizador.`Codigo` = tb_log.`CodigoUtilizador`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Descricao' => $lista['Descricao'],
                'OBS' => $lista['OBS'],
                'Data' => $lista['Data'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
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

    function GetLogID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetLogID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setOBS($OBS) {
        $this->OBS = $OBS;
    }

    function setData($Data) {
        $this->Data = $Data;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }
    
    function get(Log $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>