<?php

Class TipoPropina extends Conexao {

    private $Codigo;
    private $Designacao;
    private $Valor;
    private $CodigoUtilizador;
    private $Moeda;
    private $Codigo_Turma;

    function __construct() {
        parent::__construct();
        $this->setTabela('tipos_propina');
    }

    function Preparar($Codigo, $Designacao, $Valor, $CodigoUtilizador, $Moeda, $Codigo_Turma) {
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->setValor($Valor);
        $this->setCodigoUtilizador($CodigoUtilizador);
        $this->setMoeda($Moeda);
        $this->setCodigo_Turma($Codigo_Turma);
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getValor() {
        return $this->Valor;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function getMoeda() {
        return $this->Moeda;
    }

    function getCodigo_Turma() {
        return $this->Codigo_Turma;
    }

    function GetTipoPropina() {
        $query = "SELECT
            tb_tipos_propina.`Codigo` AS Codigo,
            tb_tipos_propina.`Designacao` AS Designacao,
            tb_tipos_propina.`Valor` AS Valor,
            tb_tipos_propina.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_tipos_propina.`Moeda` AS Moeda,
            tb_tipos_propina.`Codigo_Turma` AS Codigo_Turma,
            tb_turma.`Designacao` AS Turma_Designacao,
            tb_utilizador.`Nome` AS Utilizador_Nome
       FROM
            `tb_turma` tb_turma INNER JOIN `tb_tipos_propina` tb_tipos_propina ON tb_turma.`Codigo` = tb_tipos_propina.`Codigo_Turma`
            INNER JOIN `tb_utilizador` tb_utilizador ON tb_tipos_propina.`Codigo_Utilizador` = tb_utilizador.`Codigo`";
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
                'Valor' => $lista['Valor'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Moeda' => $lista['Moeda'],
                'Turma_Designacao' => $lista['Turma_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Codigo_Turma' => $lista['Codigo_Turma']);
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

    function GetTipoPropinaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetTipoPropinaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o tipo de pagamento ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setValor($Valor) {
        $this->Valor = $Valor;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function setMoeda($Moeda) {
        $this->Moeda = $Moeda;
    }

    function setCodigo_Turma($Codigo_Turma) {
        $this->Codigo_Turma = $Codigo_Turma;
    }

    function get(TipoPropina $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>