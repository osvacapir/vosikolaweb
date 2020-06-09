<?php 
Class Usuario extends Conexao {

    private $codigo;
    private $Nome;
    private $User;
    private $Passe;
    private $Codigo_Tipo_Utilizador;
    private $EstadoActual;
    private $DataCadastro;
    private $LoginStatus;
    private $Codigo_Escola;
    private $salt;
    
    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::USER);
         
    }

    function Preparar($codigo,
              $Nome, 
              $User, 
              $Passe, 
              $Codigo_Tipo_Utilizador, 
              $EstadoActual, 
              $DataCadastro, 
              $LoginStatus, 
              $Codigo_Escola, 
              $salt ) {
                
        $this->SetCodigo($codigo);
        $this->setNome($Nome);
        $this->setUser($User);
        $this->setCodigo_Tipo_Utilizador($Codigo_Tipo_Utilizador);
        $this->setEstadoActual($EstadoActual);
        $this->setDataCadastro($DataCadastro);
        $this->setLoginStatus($LoginStatus);
        $this->setCodigo_Escola($Codigo_Escola);
        $this->setSalt($salt); 
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function getUser() {
        return $this->User;
    }

    public function getPasse() {
        return $this->Passe;
    }

    public function getCodigo_Tipo_Utilizador() {
        return $this->Codigo_Tipo_Utilizador;
    }

    public function getEstadoActual() {
        return $this->EstadoActual;
    }

    public function getDataCadastro() {
        return $this->DataCadastro;
    }

    public function getLoginStatus() {
        return $this->LoginStatus;
    }

    public function getCodigo_Escola() {
        return $this->Codigo_Escola;
    }

    public function getSalt() {
        return $this->salt;
    }
  
    public function GetUsuario() {
        $query = "SELECT
            tb_utilizador.`Codigo` AS Codigo,
            tb_utilizador.`Nome` AS Nome,
            tb_utilizador.`User` AS User,
            tb_utilizador.`Passe` AS Passe,
            tb_utilizador.`Codigo_Tipo_Utilizador` AS Codigo_Tipo_Utilizador,
            tb_utilizador.`EstadoActual` AS EstadoActual,
            tb_utilizador.`DataCadastro` AS DataCadastro,
            tb_utilizador.`LoginStatus` AS LoginStatus,
            tb_utilizador.`Codigo_Escola` AS Codigo_Escola,
            tb_utilizador.`salt` AS salt,
            tb_utilizador.`Tempo` AS Tempo,
            tb_tipos_utilizador.`Designacao` AS Designacao,
            tb_escola.`Designacao` AS Escola_Nome
       FROM
            `tb_escola` tb_escola INNER JOIN `tb_utilizador` tb_utilizador ON tb_escola.`Codigo` = tb_utilizador.`Codigo_Escola`
            INNER JOIN `tb_tipos_utilizador` tb_tipos_utilizador ON tb_utilizador.`Codigo_Tipo_Utilizador` = tb_tipos_utilizador.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    public function GetUsuarioID($id) {
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
                'Nome' => $lista['Nome'],
                'User' => $lista['User'],
                'Passe' => $lista['Passe'],
                'Codigo_Tipo_Utilizador' => $lista['Codigo_Tipo_Utilizador'],
                'EstadoActual' => $lista['EstadoActual'],
                'DataCadastro' => $lista['DataCadastro'],
                'LoginStatus' => $lista['LoginStatus'],
                'Codigo_Escola' => $lista['Codigo_Escola'],
                'salt' => $lista['salt'],
                'Tempo' => $lista['Tempo'],
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

    function Apaga($id) {
        $this->GetUsuarioID($id);
        return $this->Apagar(array("Codigo" => $id));   
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Nome = $Nome;
        endif;
    }
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setUser($User) {
        $this->User = $User;
    }

    function setPasse($Passe) {
        $this->Passe = $Passe;
    }

    function setCodigo_Tipo_Utilizador($Codigo_Tipo_Utilizador) {
        $this->Codigo_Tipo_Utilizador = $Codigo_Tipo_Utilizador;
    }

    function setEstadoActual($EstadoActual) {
        $this->EstadoActual = $EstadoActual;
    }

    function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    function setLoginStatus($LoginStatus) {
        $this->LoginStatus = $LoginStatus;
    }

    function setCodigo_Escola($Codigo_Escola) {
        $this->Codigo_Escola = $Codigo_Escola;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }

    function get(Usuario $obj) {
       $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
       $this->setObject($obj, $query);
    }

    

}
?>