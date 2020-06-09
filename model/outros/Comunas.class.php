<?php  
Class Comunas extends Conexao {

    private $codigo;
    private $codigoMunicipio;
    private $designacao;
    
      function __construct() {

        parent::__construct();
        $this->setTabela('Comuna');
    }
    
       function Preparar($codigo, $codigoMunicipio, $designacao) {
        $this->SetCodigo($codigo);
        $this->SetcodigoMunicipio($codigoMunicipio);
        $this->setdesignacao($designacao);
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getCodigoMunicipio() {
        return $this->codigoMunicipio;
    }

    function getDesignacao() {
        return $this->designacao;
    }

      function GetComunas() {
        $query = "SELECT
        tb_comuna.`Codigo` AS Codigo,
        tb_comuna.`Codigo_Municipio` AS Codigo_Municipio,
        tb_comuna.`Designacao` AS Designacao,
        tb_municipio.`Designacao` AS Municipios_Designacao
   FROM
        `tb_municipio` tb_municipio INNER JOIN `tb_comuna` tb_comuna ON tb_municipio.`Codigo` = tb_comuna.`Codigo_Municipio`
         ORDER BY Designacao ASC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }
    

      function GetComunasID($id) {
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
                'Codigo_Municipio' => $lista['Codigo_Municipio'],
                'Designacao' => $lista['Designacao'],
                'Municipios_Designacao' => $lista['Municipios_Designacao']);
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
        $this->GetComunasID($id);
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
    
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCodigoMunicipio($codigoMunicipio) {
        $this->codigoMunicipio = $codigoMunicipio;
    }

    function get(Comunas $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
    
    
}
?>