<?php 
Class EntradaValor extends Conexao{

    private $Codigo;
    private $CodigoAluno;
    private $SaldoAnterior;
    private $Turma;
    private $Curso;
    private $ValorEntregue;
    private $Moeda;
    private $ContraValor;
    private $SaldoActual;
    private $ContaMovimentada;
    private $NBordoro;
    private $Cambio;
    private $DataDeposito;
    private $DataCadastro;
    private $CodigoUtilizador;

    function __construct() {
        parent::__construct();  
        $this->setTabela('entradaValor');
    }
      function Preparar(
               $Codigo, 
               $CodigoAluno, 
               $SaldoAnterior, 
               $Turma, 
               $Curso, 
               $ValorEntregue, 
               $Moeda, 
               $ContraValor, 
               $SaldoActual, 
               $ContaMovimentada, 
               $NBordoro, 
               $Cambio, 
               $DataDeposito, 
               $DataCadastro,  
               $CodigoUtilizador) {
          
               $this->SetCodigo($codigo);
               $this->setCodigoAluno($CodigoAluno);
               $this->setSaldoActual($SaldoAnterior);
               $this->setTurma($Turma);
               $this->setCurso($Curso);
               $this->setValorEntregue($ValorEntregue);
               $this->setMoeda($Moeda);
               $this->setContraValor($ContraValor);
               $this->setSaldoActual($SaldoActual);
               $this->setContaMovimentada($ContaMovimentada);
               $this->setNBordoro($NBordoro);
               $this->setCambio($Cambio);
               $this->setDataDeposito($DataDeposito);
               $this->setDataDeposito($DataCadastro);
               $this->setCodigoUtilizador($CodigoUtilizador);             
               
               
    }

    private function getCodigo() {
        return $this->Codigo;
    }

    private function getCodigoAluno() {
        return $this->CodigoAluno;
    }

    private function getSaldoAnterior() {
        return $this->SaldoAnterior;
    }

    private function getTurma() {
        return $this->Turma;
    }

    private function getCurso() {
        return $this->Curso;
    }

    private function getValorEntregue() {
        return $this->ValorEntregue;
    }

    private function getMoeda() {
        return $this->Moeda;
    }

    private function getContraValor() {
        return $this->ContraValor;
    }

    private function getSaldoActual() {
        return $this->SaldoActual;
    }

    private function getContaMovimentada() {
        return $this->ContaMovimentada;
    }

    private function getNBordoro() {
        return $this->NBordoro;
    }

    private function getCambio() {
        return $this->Cambio;
    }

    private function getDataDeposito() {
        return $this->DataDeposito;
    }

    private function getDataCadastro() {
        return $this->DataCadastro;
    }

    private function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    
        
    function GetEntradaValor() {
        $query = "SELECT
        tb_entrada_valore.`Codigo` AS Codigo,
        tb_entrada_valore.`CodigoAluno` ASCodigoAluno,
        tb_entrada_valore.`SaldoAnterior` AS SaldoAnterior,
        tb_entrada_valore.`Turma` AS Turma,
        tb_entrada_valore.`Curso` AS Curso,
        tb_entrada_valore.`ValorEntregue` AS ValorEntregue,
        tb_entrada_valore.`Moeda` AS Moeda,
        tb_entrada_valore.`ContraValor` AS ContraValor,
        tb_entrada_valore.`SaldoActual` AS SaldoActual,
        tb_entrada_valore.`ContaMovimentada` AS ContaMovimentada,
        tb_entrada_valore.`NBordoro` AS NBordoro,
        tb_entrada_valore.`Cambio` AS Cambio,
        tb_entrada_valore.`DataDeposito` AS DataDeposito,
        tb_entrada_valore.`DataCadastro` AS DataCadastro,
        tb_entrada_valore.`CodigoUtilizador` AS CodigoUtilizador,
        tb_pessoa.`Nome` AS Pessoa_Nome,
        tb_utilizador.`Nome` AS Utilizador_Nome
   FROM
        `tb_alunos` tb_alunos INNER JOIN `tb_entrada_valore` tb_entrada_valore ON tb_alunos.`Codigo` = tb_entrada_valore.`CodigoAluno`
        INNER JOIN `tb_pessoa` tb_pessoa ON tb_alunos.`Codigo_Pessoa` = tb_pessoa.`Codigo`
        INNER JOIN `tb_utilizador` tb_utilizador ON tb_alunos.`Codigo_Utilizador` = tb_utilizador.`Codigo`
        AND tb_utilizador.`Codigo` = tb_entrada_valore.`CodigoUtilizador` ORDER BY Pessoa_Nome ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }
      function GetEntradaValorID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }


    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'CodigoAluno' => $lista['CodigoAluno'],
                'SaldoAnterior' => $lista['SaldoAnterior'],
                'Turma' => $lista['Turma'],
                'Curso' => $lista['Curso'],
                'ValorEntregue' => $lista['ValorEntregue'],
                'Moeda' => $lista['Moeda'],
                'ContraValor' => $lista['ContraValor'],
                'SaldoActual' => $lista['SaldoActual'],
                'ContaMovimentada' => $lista['ContaMovimentada'],
                'NBordoro' => $lista['NBordoro'],
                'Cambio' => $lista['Cambio'],
                'DataDeposito' => $lista['DataDeposito'],
                'DataCadastro' => $lista['DataCadastro'],
                'CodigoUtilizador' => $lista['CodigoUtilizador'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'Utilizador_Nome' => $lista['Utilizador_Nome']);
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
        $this->GetAnoLectivoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }
    
        function setCodigoAluno($CodigoAluno) {
        $this->CodigoAluno = $CodigoAluno;
        if (strlen($CodigoAluno) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite Codigo do Aluno ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->CodigoAluno = $CodigoAluno;
        endif;
    }

    
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setSaldoAnterior($SaldoAnterior) {
        $this->SaldoAnterior = $SaldoAnterior;
    }

    function setTurma($Turma) {
        $this->Turma = $Turma;
    }

    function setCurso($Curso) {
        $this->Curso = $Curso;
    }

    function setValorEntregue($ValorEntregue) {
        $this->ValorEntregue = $ValorEntregue;
    }

    function setMoeda($Moeda) {
        $this->Moeda = $Moeda;
    }

    function setContraValor($ContraValor) {
        $this->ContraValor = $ContraValor;
    }

    function setSaldoActual($SaldoActual) {
        $this->SaldoActual = $SaldoActual;
    }

    function setContaMovimentada($ContaMovimentada) {
        $this->ContaMovimentada = $ContaMovimentada;
    }

    function setNBordoro($NBordoro) {
        $this->NBordoro = $NBordoro;
    }

    function setCambio($Cambio) {
        $this->Cambio = $Cambio;
    }

    function setDataDeposito($DataDeposito) {
        $this->DataDeposito = $DataDeposito;
    }

    function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }


    function get(EntradaValor $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
    
}
 ?>