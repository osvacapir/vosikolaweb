<?php 
Class Municipio extends Conexao {

    private $codigo;
    private $Codigo_Provincia;
    private $Designacao;

    function __construct() {
        parent::__construct();
        $this->setTabela('municipio');
    }

    function Preparar($codigo, $Codigo_Provincia, $Designacao) {
        
        $this->SetCodigo($codigo);
        $this->SetCodigo_Provincia($Codigo_Provincia);
        $this->setDesignacao($Designacao);

    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getCodigo_Provincia() {
        return $this->Codigo_Provincia;
    }

    public function getDesignacao() {
        return $this->Designacao;
    }

    function GetMunicipio() {
        $query = "SELECT
            tb_municipio.`Codigo` AS Codigo,
            tb_municipio.`Codigo_Provincia` AS Codigo_Provincia,
            tb_municipio.`Designacao` AS Designacao,
            tb_provincia.`Designacao` AS Provincia_Designacao
       FROM
            `tb_provincia` tb_provincia INNER JOIN `tb_municipio` tb_municipio ON tb_provincia.`Codigo` = tb_municipio.`Codigo_Provincia`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Provincia' => $lista['Codigo_Provincia'],
                'Designacao' => $lista['Designacao'],
                'Provincia_Designacao' => $lista['Provincia_Designacao']);
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

    function GetMunicipioID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }  

    function Apaga($id) {
        $this->GetMunicipioID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($Designacao) {
        $this->Designacao = $Designacao;
        if (strlen($Designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Municipio ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Designacao = $Designacao;
        endif;
    }
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCodigo_Provincia($Codigo_Provincia) {
        $this->Codigo_Provincia = $Codigo_Provincia;
    }

    function get(Municipio $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
?>