<?php 
Class Propina extends Conexao{

    private $Codigo;
    private $CodigoAluno;
    private $CodigoTipoPropina;
    private $DataPagamento;
    private $Desconto;
    private $Multa;
    private $Cambio;
    private $Total_Pago_USD;
    private $Codigo_Utilizador;
    private $DataVencimento;
    private $obs;
    private $NBordoro;
    private $ContaMovimentada;
    private $TotalPagoAKZ;
    private $HoraPagamento;


    function __construct() {
        parent::__construct();  
            $this->setTabela('propina');
    }
    
      function Preparar(
                $Codigo,
                $CodigoAluno, 
                $CodigoTipoPropina, 
                $DataPagamento,
                $Desconto,
                $Multa,
                $Cambio,
                $Total_Pago_USD,
                $Codigo_Utilizador,
                $DataVencimento,
                $obs,
                $NBordoro,
                $ContaMovimentada,
                $TotalPagoAKZ,
                $HoraPagamento ) {
        
                $this->SetCodigo($Codigo);
                $this->SetDesignacao($CodigoAluno);
                $this->setcodigo_Status($CodigoTipoPropina);
                $this->setAbreviatura($DataPagamento);
                $this->setAbreviatura($Desconto);
                $this->setAbreviatura($Desconto);
                $this->setAbreviatura($Multa);
                $this->setAbreviatura($Cambio);
                $this->setAbreviatura($Total_Pago_USD);
                $this->setAbreviatura($Codigo_Utilizador);
                $this->setAbreviatura($obs);
                $this->setAbreviatura($NBordoro);
                $this->setAbreviatura($TotalPagoAKZ);
                $this->setAbreviatura($TotalPagoAKZ);
                $this->setAbreviatura($HoraPagamento);
       }
    
       function getCodigo() {
           return $this->Codigo;
       }

       function getCodigoAluno() {
           return $this->CodigoAluno;
       }

       function getCodigoTipoPropina() {
           return $this->CodigoTipoPropina;
       }

       function getDataPagamento() {
           return $this->DataPagamento;
       }

       function getDesconto() {
           return $this->Desconto;
       }

       function getMulta() {
           return $this->Multa;
       }

       function getCambio() {
           return $this->Cambio;
       }

       function getTotal_Pago_USD() {
           return $this->Total_Pago_USD;
       }

       function getCodigo_Utilizador() {
           return $this->Codigo_Utilizador;
       }

       function getDataVencimento() {
           return $this->DataVencimento;
       }

       function getObs() {
           return $this->obs;
       }

       function getNBordoro() {
           return $this->NBordoro;
       }

       function getContaMovimentada() {
           return $this->ContaMovimentada;
       }

       function getTotalPagoAKZ() {
           return $this->TotalPagoAKZ;
       }

       function getHoraPagamento() {
           return $this->HoraPagamento;
       }

           
    function GetPropina() {
        $query = "SELECT
            tb_propina.`Codigo` AS Codigo,
            tb_propina.`Codigo_Aluno` AS Codigo_Aluno,
            tb_propina.`Codigo_Tipo_Propina` AS Codigo_Tipo_Propina,
            tb_propina.`Data_Pagamento` AS Data_Pagamento,
            tb_propina.`Desconto` AS Desconto,
            tb_propina.`Multa` AS Multa,
            tb_propina.`Cambio` AS Cambio,
            tb_propina.`Total_Pago_USD` AS Total_Pago_USD,
            tb_propina.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_propina.`DataVencimento` AS DataVencimento,
            tb_propina.`obs` AS obs,
            tb_propina.`N_Bordoro` AS N_Bordoro,
            tb_propina.`ContaMovimentada` AS ContaMovimentada,
            tb_propina.`Total_Pago_AKZ` AS Total_Pago_AKZ,
            tb_propina.`HoraPagamento` AS HoraPagamento,
            tb_tipos_propina.`Designacao` AS Tipos_propina_Designacao,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_pessoa.`Nome` AS Pessoa_Nome
       FROM
            `tb_utilizador` tb_utilizador INNER JOIN `tb_propina` tb_propina ON tb_utilizador.`Codigo` = tb_propina.`Codigo_Utilizador`
            INNER JOIN `tb_tipos_propina` tb_tipos_propina ON tb_utilizador.`Codigo` = tb_tipos_propina.`Codigo_Utilizador`
            AND tb_tipos_propina.`Codigo` = tb_propina.`Codigo_Tipo_Propina`
            INNER JOIN `tb_alunos` tb_alunos ON tb_propina.`Codigo_Aluno` = tb_alunos.`Codigo`
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
                'Codigo_Aluno' => $lista['Codigo_Aluno'],
                'Codigo_Tipo_Propina' => $lista['Codigo_Tipo_Propina'],
                'Data_Pagamento' => $lista['Data_Pagamento'],
                'Desconto' => $lista['Desconto'],
                'Multa' => $lista['Multa'],
                'Cambio' => $lista['Cambio'],
                'Total_Pago_USD' => $lista['Total_Pago_USD'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'DataVencimento' => $lista['DataVencimento'],
                'obs' => $lista['obs'],
                'N_Bordoro' => $lista['N_Bordoro'],
                'ContaMovimentada' => $lista['ContaMovimentada'],
                'Total_Pago_AKZ' => $lista['Total_Pago_AKZ'],
                'HoraPagamento' => $lista['HoraPagamento'],
                'Tipos_propina_Designacao' => $lista['Tipos_propina_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Pessoa_Nome' => $lista['Pessoa_Nome']);
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
    
    function GetPropinaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    } 

    function Apaga($id) {
        $this->GetPropinaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }
    
    
    function setDesignacao($CodigoAluno) {
        $this->Designacao = $CodigoAluno;
        if (strlen($CodigoAluno) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite Codigo do aluno ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $CodigoAluno;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setCodigoAluno($CodigoAluno) {
        $this->CodigoAluno = $CodigoAluno;
    }

    function setCodigoTipoPropina($CodigoTipoPropina) {
        $this->CodigoTipoPropina = $CodigoTipoPropina;
    }

    function setDataPagamento($DataPagamento) {
        $this->DataPagamento = $DataPagamento;
    }

    function setDesconto($Desconto) {
        $this->Desconto = $Desconto;
    }

    function setMulta($Multa) {
        $this->Multa = $Multa;
    }

    function setCambio($Cambio) {
        $this->Cambio = $Cambio;
    }

    function setTotal_Pago_USD($Total_Pago_USD) {
        $this->Total_Pago_USD = $Total_Pago_USD;
    }

    function setCodigo_Utilizador($Codigo_Utilizador) {
        $this->Codigo_Utilizador = $Codigo_Utilizador;
    }

    function setDataVencimento($DataVencimento) {
        $this->DataVencimento = $DataVencimento;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setNBordoro($NBordoro) {
        $this->NBordoro = $NBordoro;
    }

    function setContaMovimentada($ContaMovimentada) {
        $this->ContaMovimentada = $ContaMovimentada;
    }

    function setTotalPagoAKZ($TotalPagoAKZ) {
        $this->TotalPagoAKZ = $TotalPagoAKZ;
    }

    function setHoraPagamento($HoraPagamento) {
        $this->HoraPagamento = $HoraPagamento;
    }

    
    
    function get(Propina $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
    
}
 ?>