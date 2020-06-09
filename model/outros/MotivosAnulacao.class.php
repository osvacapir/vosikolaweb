<?php 
Class MotivosAnulacao extends Conexao{

    private $Codigo=0;
    private $Designacao;


    function __construct() {
        parent::__construct();  
        $this->setTabela('motivos_anulacao');
    }
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getDesignacao() {
        return $this->Designacao;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
    }
    
    function GetMotivosAnulacao() {
        $query = "SELECT *FROM tb_motivos_anulacao";
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

    function GetMotivosAnulacaoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }  
    
    function Apaga($id) {
        $this->GetMotivosAnulacaoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }    
}
 ?>