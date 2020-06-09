<?php  
Class EstadoCivil extends Conexao {

    private $codigo;
    private $designacao;	
	
    function __construct() {
        parent::__construct();
	 	$this->setTabela('estado_Civil');
    }
	
	function Preparar($codigo, $designacao) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
       
    }

    public function getCodigo() {
        return $codigo;
    }

    public function getDesignacao() {
        return $designacao;
    }

    function GetEstadoCivil() {
        $query = "SELECT *FROM tb_estado_civil";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao']);
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

    function GetEstadoCivilID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetEstadoCivilID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($designacao) {
        $this->designacao = $designacao;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digiteo estado ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $designacao;
        endif;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function get(EstadoCivil $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
	
}
?>