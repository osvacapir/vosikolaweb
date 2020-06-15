<?php 
Class Pessoa extends Conexao{

    private $Codigo;
    protected $Nome;
    private $Pai;
    private $Mae;
    private $CodigoNacionalidade;
    private $CodigoEstadoCivil;
    private $DataNascimento;
    private $Email;
    private $Telefone;
    private $CodigoStatus;
    private $CodigoEndereco;
    private $CodigoUtilizador;
    private $Sexo;
    private $NDocID;
    private $DataCadastro;
    private $URLFoto;
    private $Curso;

    function __construct() {
        parent::__construct(); 
        $this->setTabela(Tab::PESSOA);
    }
    
    function PrepararPessoa(
            
            $codigo, 
            $Nome, 
            $Pai, 
            $Mae, 
            $CodigoNacionalidade,
            $CodigoEstadoCivil, 
            $DataNascimento,
            $Email,
            $Telefone,
            $CodigoStatus,
            $CodigoEndereco,
            $CodigoUtilizador,
            $Sexo,
            $NDocID,
            $DataCadastro,
            $URLFoto, 
            $Curso) {
        
            $this->SetCodigo($codigo);
            $this->setNome($Nome);
            $this->setPai($Pai);
            $this->setMae($Mae);
            $this->setCodigoNacionalidade($CodigoNacionalidade);
            $this->setCodigoEstadoCivil($CodigoEstadoCivil);
            $this->setDataNascimento($DataNascimento);
            $this->setEmail($Email);
            $this->setTelefone($Telefone);
            $this->setCodigoStatus($CodigoStatus);
            $this->setCodigoEndereco($CodigoEndereco);
            $this->setCodigoUtilizador($CodigoUtilizador);
            $this->setSexo($Sexo);
            $this->setNDocID($NDocID);
            $this->setDataCadastro($DataCadastro);
            $this->setURLFoto($URLFoto);
           $this->setCurso($Curso);        
    }
    function getCodigo() {
        return $this->Codigo;
    }

    function getNome() {
        return $this->Nome;
    }

    function getPai() {
        return $this->Pai;
    }

    function getMae() {
        return $this->Mae;
    }

    function getCodigoNacionalidade() {
        return $this->CodigoNacionalidade;
    }

    function getCodigoEstadoCivil() {
        return $this->CodigoEstadoCivil;
    }

    function getDataNascimento() {
        return $this->DataNascimento;
    }

    function getEmail() {
        return $this->Email;
    }

    function getTelefone() {
        return $this->Telefone;
    }

    function getCodigoStatus() {
        return $this->CodigoStatus;
    }

    function getCodigoEndereco() {
        return $this->CodigoEndereco;
    }

    function getCodigoUtilizador() {
        return $this->CodigoUtilizador;
    }

    function getSexo() {
        return $this->Sexo;
    }

    function getNDocID() {
        return $this->NDocID;
    }

    function getDataCadastro() {
        return $this->DataCadastro;
    }

    function getURLFoto() {
        return $this->URLFoto;
    }

    function getCurso() {
        return $this->Curso;
    }
    
    function GetPessoa() {
        $query = "SELECT *FROM tb_pessoa";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GravaP($obj) {
        if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
            return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
        } elseif (!isset($valores['Codigo'])) {        
            unset($obj['Codigo']);
            return $this->Inserir($obj);
        }
    }
    
    function GetPessoaID($id) {
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
                'Pai' => $lista['Pai'],
                'Mae' => $lista['Mae'],
                'Codigo_Nacionalidade' => $lista['Codigo_Nacionalidade'],
                'Codigo_Estado_Civil' => $lista['Codigo_Estado_Civil'],
                'DataNascimento' => $lista['DataNascimento'],
                'Email' => $lista['Email'],
                'Telefone' => $lista['Telefone'],
                'Codigo_Status' => $lista['Codigo_Status'],
                'Codigo_Endereco' => $lista['Codigo_Endereco'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'Sexo' => $lista['Sexo'],
                'N_Doc_ID' => $lista['N_Doc_ID'],
                'DataCadastro' => $lista['DataCadastro'],
                'URL_Foto' => $lista['URL_Foto'],
                'Curso' => $lista['Curso']);
            $i++;
        endwhile;
    }
    function Apaga($id) {
        $this->GetPessoaID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
        if (strlen($Nome) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um nome ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Nome = $Nome;
        endif;
    }
    
    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setPai($Pai) {
        $this->Pai = $Pai;
    }

    function setMae($Mae) {
        $this->Mae = $Mae;
    }

    function setCodigoNacionalidade($CodigoNacionalidade) {
        $this->CodigoNacionalidade = $CodigoNacionalidade;
    }

    function setCodigoEstadoCivil($CodigoEstadoCivil) {
        $this->CodigoEstadoCivil = $CodigoEstadoCivil;
    }

    function setDataNascimento($DataNascimento) {
        $this->DataNascimento = $DataNascimento;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    function setCodigoStatus($CodigoStatus) {
        $this->CodigoStatus = $CodigoStatus;
    }

    function setCodigoEndereco($CodigoEndereco) {
        $this->CodigoEndereco = $CodigoEndereco;
    }

    function setCodigoUtilizador($CodigoUtilizador) {
        $this->CodigoUtilizador = $CodigoUtilizador;
    }

    function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    function setNDocID($NDocID) {
        $this->NDocID = $NDocID;
    }

    function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    function setURLFoto($URLFoto) {
        $this->URLFoto = $URLFoto;
    }

    function setCurso($Curso) {
        $this->Curso = $Curso;
    }

    function getP(Pessoa $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}
 ?>