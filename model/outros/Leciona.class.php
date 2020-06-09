<?php 
Class Leciona extends Conexao{

    private $Codigo;
    private $Designacao;
    private $CodigoModulo;
    private $CodigoProfessor;


    function __construct() {
        parent::__construct(); 
        $this->setTabela('leciona');
    }
    
    function Preparar($codigo, $Designacao, $CodigoModulo,  $CodigoProfessor) {

        $this->SetCodigo($codigo);
        $this->SetDesignacao($Designacao);
        $this->setCodigoModulo($CodigoModulo);
        $this->setCodigoProfessor($CodigoProfessor);    
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function getCodigoModulo() {
        return $this->CodigoModulo;
    }

    function getCodigoProfessor() {
        return $this->CodigoProfessor;
    }
 
    function GetLeciona() {
        $query = "SELECT *FROM tb_leciona";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetLecionaID($id) {
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
                'Designacao' => $lista['Designacao'],
                'CodigoModulo' => $lista['CodigoModulo'],
                'CodigoProfessor' => $lista['CodigoProfessor']);
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
    
    function setDesignacao($designacao) {
        $this->designacao = $designacao;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $designacao;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setCodigoModulo($CodigoModulo) {
        $this->CodigoModulo = $CodigoModulo;
    }

    function setCodigoProfessor($CodigoProfessor) {
        $this->CodigoProfessor = $CodigoProfessor;
    }

    function get(Leciona $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>