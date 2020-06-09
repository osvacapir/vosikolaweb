<?php 
Class Multa extends Conexao{

    private $Codigo;
    private $DiaInicio;
    private $DiaFim;
    private $Percentagem;
    private $CodigoTipoMulta;

    function __construct() {
        parent::__construct();  
        $this->setTabela('multa');
    }
     
    function Preparar($codigo, $DiaInicio, $DiaFim, $Percentagem, $CodigoTipoMulta) {
        
        $this->SetCodigo($codigo);
        $this->setDiaInicio($DiaInicio);
        $this->setDiaFim($DiaFim);
        $this->setCodigoPercentagem($Percentagem);
        $this->setCodigoTipoMulta($CodigoTipoMulta);
                
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDiaInicio() {
        return $this->DiaInicio;
    }

    function getDiaFim() {
        return $this->DiaFim;
    }

    function getPercentagem() {
        return $this->Percentagem;
    }

    function getCodigoTipoMulta() {
        return $this->CodigoTipoMulta;
    }
    
    function GetMulta() {
        $query = "SELECT
                tb_multa.`Codigo` AS Codigo,
                tb_multa.`Dia_Inicio` AS Dia_Inicio,
                tb_multa.`Dia_Fim` AS Dia_Fim,
                tb_multa.`Percentagem` AS Percentagem,
                tb_multa.`Codigo_Tipo_Multa` AS Codigo_Tipo_Multa,
                tb_tipo_multa.`Descrisao` AS Tipo_Multa_Descrisao
           FROM
                `tb_tipo_multa` tb_tipo_multa INNER JOIN `tb_multa` tb_multa ON tb_tipo_multa.`Codigo` = tb_multa.`Codigo_Tipo_Multa`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Dia_Inicio' => $lista['Dia_Inicio'],
                'Dia_Fim' => $lista['Dia_Fim'],
                'Percentagem' => $lista['Percentagem'],
                'Tipo_Multa_Descrisao' => $lista['Tipo_Multa_Descrisao'],
                'Codigo_Tipo_Multa' => $lista['Codigo_Tipo_Multa']);
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

    function GetMultaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }  
    
    function Apaga($id) {
        $this->GetMultaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDiaInicio($DiaInicio) {
        $this->$DiaInicio = $DiaInicio;
        if (strlen($DiaInicio) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite O dia de inicio ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->$DiaInicio = $DiaInicio;
        endif;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    } 

    function setDiaFim($DiaFim) {
        $this->DiaFim = $DiaFim;
    }

    function setPercentagem($Percentagem) {
        $this->Percentagem = $Percentagem;
    }

    function setCodigoTipoMulta($CodigoTipoMulta) {
        $this->CodigoTipoMulta = $CodigoTipoMulta;
    }    
    
    function get(Multa $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>