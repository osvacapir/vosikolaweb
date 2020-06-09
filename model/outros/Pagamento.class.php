<?php 
Class Pagamento extends Conexao{

    private $Codigo;
    private $CodigoAluno;
    private $CodigoTipoServico;    
    private $Data;
    private $NBordoro;
    private $Multa;
    private $Mes;    
    private $CodigoUtilizador;
    private $Observacao;
    private $Ano;
    private $ContaMovimentada;
    private $Quantidade;
    private $Desconto;
    private $Totalgeral;
    private $DataBanco;

    function __construct() {
        parent::__construct();
        $this->setTabela('pagamento');
    }
    
    
    function Preparar($Codigo, 
             $CodigoAluno, 
             $CodigoTipoServico,
             $Data,
             $NBordoro,
             $Multa,
             $Mes,
             $CodigoUtilizador,
             $Observacao,
             $Ano,
             $ContaMovimentada,
             $Quantidade,
             $Desconto, 
             $Totalgeral,
             $DataBanco) {
        
            $this->SetCodigo($codigo);
            $this->SetCodigoTipoServico($CodigoTipoServico);
            $this->SetData($Data);
            $this->SetNBordoro($NBordoro); 
            $this->SetMulta($Multa); 
            $this->SetMes($Mes); 
            $ths->SetCodigoUtilizador($CodigoUtilizador);
            $ths->SetObservacao($Observacao);
            $ths->SetAno($Ano);
            $ths->SetContaMovimentada($ContaMovimentada);
            $ths->SetQuantidade($Quantidade);
            $ths->SetDesconto($Desconto);
            $ths->SetTotalgeral(Totalgeral);
            $ths->SetDataBanco($DataBanco);
               
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getCodigoAluno() {
        return $this->CodigoAluno;
    }

    function getCodigoTipoServico() {
        return $this->CodigoTipoServico;
    }

    function getData() {
        return $this->Data;
    }

    function getNBordoro() {
        return $this->NBordoro;
    }

    function getMulta() {
        return $this->Multa;
    }

    function getMes() {
        return $this->Mes;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function getObservacao() {
        return $this->Observacao;
    }

    function getAno() {
        return $this->Ano;
    }

    function getContaMovimentada() {
        return $this->ContaMovimentada;
    }

    function getQuantidade() {
        return $this->Quantidade;
    }

    function getDesconto() {
        return $this->Desconto;
    }

    function getTotalgeral() {
        return $this->Totalgeral;
    }

    function getDataBanco() {
        return $this->DataBanco;
    }

    
    function GetPagamento() {
        $query = "SELECT
                tb_pagamento.`Codigo` AS Codigo,
                tb_pagamento.`Codigo_Aluno` AS Codigo_Aluno,
                tb_pagamento.`Codigo_Tipo_Servico` AS Codigo_Tipo_Servico,
                tb_pagamento.`Data` AS Data,
                tb_pagamento.`N_Bordoro` AS N_Bordoro,
                tb_pagamento.`Multa` AS Multa,
                tb_pagamento.`Mes` AS Mes,
                tb_pagamento.`Codigo_Utilizador` AS Codigo_Utilizador,
                tb_pagamento.`Observacao` AS Observacao,
                tb_pagamento.`Ano` AS Ano,
                tb_pagamento.`ContaMovimentada` AS ContaMovimentada,
                tb_pagamento.`Quantidade` AS Quantidade,
                tb_pagamento.`Desconto` AS Desconto,
                tb_pagamento.`Totalgeral` AS Totalgeral,
                tb_pagamento.`DataBanco` AS DataBanco,
                tb_tipo_servico.`Designacao` AS Tipo_servico_Designacao,
                tb_utilizador.`Nome` AS Utilizador_Nome,
                tb_pessoa.`Nome` AS Pessoa_Nome
           FROM
                `tb_pagamento` tb_pagamento INNER JOIN `tb_alunos` tb_alunos ON tb_alunos.`Codigo` = tb_pagamento.`Codigo_Aluno`
                INNER JOIN `tb_tipo_servico` tb_tipo_servico ON tb_pagamento.`Codigo_Tipo_Servico` = tb_tipo_servico.`Codigo`
                INNER JOIN `tb_utilizador` tb_utilizador ON tb_pagamento.`Codigo_Utilizador` = tb_utilizador.`Codigo`
                AND tb_utilizador.`Codigo` = tb_tipo_servico.`Codigo_Utilizador`
                AND tb_utilizador.`Codigo` = tb_alunos.`Codigo_Utilizador`
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
                'CodigoAluno' => $lista['CodigoAluno'],
                'Codigo_Tipo_Servico' => $lista['Codigo_Tipo_Servico'],
                'Data' => $lista['Data'],               
                'N_Bordoro' => $lista['N_Bordoro'],
                'Multa' => $lista['Multa'],
                'Mes' => $lista['Mes'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Observacao' => $lista['Observacao'],
                'Ano' => $lista['Ano'],
                'ContaMovimentada' => $lista['ContaMovimentada'],
                'Quantidade' => $lista['Quantidade'],
                'Desconto' => $lista['Desconto'],
                'Totalgeral' => $lista['Totalgeral'],
                'Tipo_servico_Designacao' => $lista['Tipo_servico_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'DataBanco' => $lista['DataBanco']);
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

    function GetPagamentoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetPagamentoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigoAluno($CodigoAluno) {
        $this->CodigoAluno = $CodigoAluno;
        if (strlen($CodigoAluno) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o codigo do Aluno ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoAluno = $CodigoAluno;
        endif;
    }

    function setCodigo($Codigo): void {
        $this->Codigo = $Codigo;
    }

    function setCodigoTipoServico($CodigoTipoServico): void {
        $this->CodigoTipoServico = $CodigoTipoServico;
    }

    function setData($Data): void {
        $this->Data = $Data;
    }

    function setNBordoro($NBordoro): void {
        $this->NBordoro = $NBordoro;
    }

    function setMulta($Multa): void {
        $this->Multa = $Multa;
    }

    function setMes($Mes): void {
        $this->Mes = $Mes;
    }

    function setCodigoUtilizador($CodigoUtilizador): void {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function setObservacao($Observacao): void {
        $this->Observacao = $Observacao;
    }

    function setAno($Ano): void {
        $this->Ano = $Ano;
    }

    function setContaMovimentada($ContaMovimentada): void {
        $this->ContaMovimentada = $ContaMovimentada;
    }

    function setQuantidade($Quantidade): void {
        $this->Quantidade = $Quantidade;
    }

    function setDesconto($Desconto): void {
        $this->Desconto = $Desconto;
    }

    function setTotalgeral($Totalgeral): void {
        $this->Totalgeral = $Totalgeral;
    }

    function setDataBanco($DataBanco): void {
        $this->DataBanco = $DataBanco;
    }
    
    function get(Pagamento $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>