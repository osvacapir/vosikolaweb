<?php 
Class Irmao extends Conexao{

    private $Codigo;
    private $Aluno1;
    private $Aluno2;


    function __construct() {
        parent::__construct(); 
       $this->setTabela('irmao');
    }

    function Preparar($codigo, $Aluno1, $Aluno2) {
        $this->SetCodigo($codigo);
        $this->setAluno1($Aluno1);
        $this->setAluno2($Aluno2);
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getAluno1() {
        return $this->Aluno1;
    }

    function getAluno2() {
        return $this->Aluno2;
    }

    function GetIrmao() {
        $query = "SELECT *FROM tb_irmao";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetIrmaoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }
    
    private  function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Aluno1' => $lista['Aluno1'],
                'Aluno2' => $lista['Aluno2'],
            );
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
        $this->GetIrmaoID($id);
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

    function setAluno1($Aluno1) {
        $this->Aluno1 = $Aluno1;
    }

    function setAluno2($Aluno2) {
        $this->Aluno2 = $Aluno2;
    }

    function get(Irmao $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>