<?php 
Class ProcessosDisciplinar extends Conexao{

    private $Codigo;
    private $Designacao;
    private $CodigoMatricula;
    private $DataProcDisc;
    private $CodigoUtilizador;


    function __construct() {
        parent::__construct();  
        $this->setTabela('processos_disciplinar');
    }

    function Preparar($Codigo, $Designacao, $CodigoMatricula, $DataProcDisc) {
        
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->setCodigoMatricula($CodigoMatricula);
        $this->setDataProcDisc($DataProcDisc);
        
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getCodigoMatricula() {
        return $this->CodigoMatricula;
    }

    function getDataProcDisc() {
        return $this->DataProcDisc;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function GetProcessosDisciplinar() {
        $query = "SELECT
            tb_processos_disciplinar.`Codigo` AS Codigo,
            tb_processos_disciplinar.`Descricao` AS Descricao,
            tb_processos_disciplinar.`Codigo_Matricula` AS Codigo_Matricula,
            tb_processos_disciplinar.`Data_Proc_Disc` AS Data_Proc_Disc,
            tb_processos_disciplinar.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_utilizador.`Nome` AS Utilizador_Nome,
            tb_pessoa.`Nome` AS Pessoa_Nome
       FROM
            `tb_utilizador` tb_utilizador INNER JOIN `tb_processos_disciplinar` tb_processos_disciplinar ON tb_utilizador.`Codigo` = tb_processos_disciplinar.`Codigo_Utilizador`
            INNER JOIN `tb_matricula` tb_matricula ON tb_utilizador.`Codigo` = tb_matricula.`Codigo_Utilizador`
            AND tb_matricula.`Codigo` = tb_processos_disciplinar.`Codigo_Matricula`
            INNER JOIN `tb_alunos` tb_alunos ON tb_matricula.`Codigo_Aluno` = tb_alunos.`Codigo`
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
                'Descricao' => $lista['Descricao'],
                'Codigo_Matricula' => $lista['Codigo_Matricula'],
                'Data_Proc_Disc' => $lista['Data_Proc_Disc'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
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

    function GetProcessosDisciplinarID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetProcessosDisciplinarID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
        if (strlen($Codigo) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite o Codigo do processo ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Codigo = $Codigo;
        endif;
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
    }

    function setCodigoMatricula($CodigoMatricula) {
        $this->CodigoMatricula = $CodigoMatricula;
    }

    function setDataProcDisc($DataProcDisc) {
        $this->DataProcDisc = $DataProcDisc;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function get(ProcessosDisciplinar $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>