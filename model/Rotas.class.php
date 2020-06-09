<?php

Class Rotas {

    public static $pag;
    private static $pasta_controller = 'controller';
    private static $pasta_view = 'view';
    private static $pasta_ADM = 'adm';

    static function get_SiteHOME() {
        return Config::SITE_URL . '/' . Config::SITE_PASTA;
    }

    static function get_SiteRAIZ() {
        return $_SERVER['DOCUMENT_ROOT'] . '/' . Config::SITE_PASTA;
    }

    static function get_SiteTEMA() {
        return self::get_SiteHOME() . '/' . self::$pasta_view;
    }

    static function pag_ClienteCadastro() {
        return self::get_SiteHOME() . '/cadastro';
    }

    static function pag_CLienteDados() {
        return self::get_SiteHOME() . '/clientes_dados';
    }

    static function pag_CLienteSenha() {
        return self::get_SiteHOME() . '/clientes_senha';
    }

    static function pag_ClienteRecovery() {
        return self::get_SiteHOME() . '/clientes_recovery';
    }

    static function pag_CLientePedidos() {
        return self::get_SiteHOME() . '/clientes_pedidos';
    }

    static function pag_ClienteItens() {
        return self::get_SiteHOME() . '/cliente_itens';
    }

    static function pag_Carrinho() {
        return self::get_SiteHOME() . '/carrinho';
    }

    static function pag_ClienteLogin() {
        return self::get_SiteHOME() . '/login';
    }

    static function pag_Logoff() {
        return self::get_SiteHOME() . '/logoff';
    }

    static function pag_CarrinhoAlterar() {
        return self::get_SiteHOME() . '/carrinho_alterar';
    }

    static function pag_Produtos() {
        return self::get_SiteHOME() . '/produtos';
    }

    static function pag_ProdutosInfo() {
        return self::get_SiteHOME() . '/produtos_info';
    }

    static function pag_Contato() {
        return self::get_SiteHOME() . '/contato';
    }

    static function pag_MinhaConta() {
        return self::get_SiteHOME() . '/minhaconta';
    }

    static function pag_ClienteConta() {
        return self::get_SiteHOME() . '/minhaconta';
    }

    static function pag_PedidoConfirmar() {
        return self::get_SiteHOME() . '/pedido_confirmar';
    }

    static function pag_PedidoFinalizar() {
        return self::get_SiteHOME() . '/pedido_finalizar';
    }

    static function pag_PedidoRetorno() {

        return self::get_SiteHOME() . '/pedido_retorno';
    }

    static function pag_PedidoRetornoERRO() {

        return self::get_SiteHOME() . '/pedido_retorno_erro';
    }

    static function get_ImagePasta() {
        return 'media/images/';
    }

    static function get_ImageURL() {
        return self::get_SiteHOME() . '/' . self::get_ImagePasta();
    }

    //rotas para área administrativa

    static function get_SiteADM() {
        return self::get_SiteHOME() . '/' . self::$pasta_ADM;
    }

    static function pag_ProdutosADM() {
        return self::get_SiteADM() . '/adm_produtos';
    }

    static function pag_ProdutosNovoADM() {
        return self::get_SiteADM() . '/adm_produtos_novo';
    }

    static function pag_ProdutosEditarADM() {
        return self::get_SiteADM() . '/adm_produtos_editar';
    }

    static function pag_ProdutosDeletarADM() {
        return self::get_SiteADM() . '/adm_produtos_deletar';
    }

    static function pag_ProdutosImgADM() {
        return self::get_SiteADM() . '/adm_produtos_img';
    }

    static function pag_ClientesADM() {
        return self::get_SiteADM() . '/adm_clientes';
    }

    static function pag_ClientesEditarADM() {
        return self::get_SiteADM() . '/adm_clientes_editar';
    }

    static function pag_PedidosADM() {
        return self::get_SiteADM() . '/adm_pedidos';
    }

    static function pag_ItensADM() {
        return self::get_SiteADM() . '/adm_itens';
    }

    static function pag_CategoriasADM() {
        return self::get_SiteADM() . '/adm_categorias';
    }

    static function pag_LogoffADM() {
        return self::get_SiteADM() . '/adm_logoff';
    }

    static function ImageLink($img, $largura, $altura) {
        $imagem = self::get_ImageURL() . "thumb.php?src={$img}&w={$largura}&h={$altura}&zc=1";

        return $imagem;
    }

    static function get_Pasta_Controller() {
        return self::$pasta_controller;
    }

    //MÉTODO PARA REDIRECIONAR
    static function Redirecionar($tempo, $pagina) {
        $url = '<meta http-equiv="refresh" content="' . $tempo . '; url=' . $pagina . '">';
        echo $url;
    }

    static function get_Pagina() {
        if (isset($_GET['pag'])) {

            $pagina = $_GET['pag'];

            self::$pag = explode('/', $pagina);

            //echo '<pre>';
            //var_dump(self::$pag);
            //echo '</pre>';


            $pagina = 'controller/' . self::$pag[0] . '.php';
            //$pagina = 'controller/' .$_GET['pag'] . '.php';

            if (file_exists($pagina)) {
                include $pagina;
            } else {
                include 'erro.php';
            }
        } else {
            include 'home.php';
        }
    }

//ROTAS DAS OUTRAS PÁGINAS
// CHAMADA DAS PÁGINAS
    static function pag_DefEscola() {
        return self::get_SiteADM() . '/def_escola';
    }

    static function pag_AnoLectivo() {
        return self::get_SiteADM() . '/anolectivo';
    }

    static function pag_Processa() {
        return self::get_SiteADM() . '/processa';
    }

    static function pag_Delete_Por_ID() {
        return self::get_SiteADM() . '/delete_id';
    }

    static function pag_Home() {
        return self::get_SiteHOME() . '/home';
    }

    static function pag_Info_Sys() {
        return self::get_SiteHOME() . '/info_sys';
    }

    static function pag_Login() {
        return self::get_SiteHOME() . '/login';
    }

    static function pag_Anulacoes() {
        return self::get_SiteADM() . '/anulacoes';
    }

    static function pag_DetAnulacoes() {
        return self::get_SiteADM() . '/det_anulacoes';
    }

    static function pag_CategoriaFunc() {
        return self::get_SiteADM() . '/categoriafunc';
    }

    static function pag_DetCategoriaFunc() {
        return self::get_SiteADM() . '/det_categoriafunc';
    }

    static function pag_Classe() {
        return self::get_SiteADM() . '/classe';
    }



    static function pag_ClassificacaoFinal() {
        return self::get_SiteADM() . '/classificacaofinal';
    }

    static function pag_DetClassificacaoFinal() {
        return self::get_SiteADM() . '/det_classificacaofinal';
    }

    static function pag_Comunas() {
        return self::get_SiteADM() . '/comunas';
    }

    static function pag_DetComunas() {
        return self::get_SiteADM() . '/det_comunas';
    }

    static function pag_Curriculo() {
        return self::get_SiteADM() . '/curriculo';
    }

    static function pag_DetCurriculo() {
        return self::get_SiteADM() . '/det_curriculo';
    }

    static function pag_Curso() {
        return self::get_SiteADM() . '/curso';
    }

    static function pag_DeclaracaoNotas() {
        return self::get_SiteADM() . '/declaracaonotas';
    }

    static function pag_DetDeclaracaoNotas() {
        return self::get_SiteADM() . '/det_declaracaonotas';
    }

    static function pag_Disciplinas() {
        return self::get_SiteADM() . '/disciplina';
    }

 

    static function pag_EfeitosDeclaracao() {
        return self::get_SiteADM() . '/efeitosdeclaracao';
    }

    static function pag_DetEfeitosDeclaracao() {
        return self::get_SiteADM() . '/det_efeitosdeclaracao';
    }

    static function pag_Escola() {
        return self::get_SiteADM() . '/escola';
    }

    static function pag_DetEscola() {
        return self::get_SiteADM() . '/det_escola';
    }

    static function pag_EscolaSistema() {
        return self::get_SiteADM() . '/escolasistema';
    }

    static function pag_DetEscolaSistema() {
        return self::get_SiteADM() . '/det_escolasistema';
    }

    static function pag_EstadoCivil() {
        return self::get_SiteADM() . '/estadocivil';
    }

    static function pag_DetEstadoCivil() {
        return self::get_SiteADM() . '/det_estadocivil';
    }

    static function pag_Faltas() {
        return self::get_SiteADM() . '/faltas';
    }

    static function pag_DetFaltas() {
        return self::get_SiteADM() . '/det_faltas';
    }

    static function pag_Inscricao() {
        return self::get_SiteADM() . '/inscricao';
    }

    static function pag_DetInscricao() {
        return self::get_SiteADM() . '/det_inscricao';
    }

    static function pag_Usuario() {
        return self::get_SiteADM() . '/usuario';
    }

    static function pag_DetUsuario() {
        return self::get_SiteADM() . '/det_usuario';
    }

    // CHAMADA DAS PÁGINAS 2
    static function pag_Aluno() {
        return self::get_SiteADM() . '/aluno';
    }

    static function pag_DetAluno() {
        return self::get_SiteADM() . '/det_aluno';
    }

    static function pag_Encarregado() {
        return self::get_SiteADM() . '/encarregado';
    }

    static function pag_DetEncarregado() {
        return self::get_SiteADM() . '/det_encarregado';
    }

    static function pag_Entradavalor() {
        return self::get_SiteADM() . '/entradavalor';
    }

    static function pag_DetEntradavalor() {
        return self::get_SiteADM() . '/det_entradavalor';
    }

    static function pag_Entregadeclarcao() {
        return self::get_SiteADM() . '/entregadeclarcao';
    }

    static function pag_DetEntregadeclarcao() {
        return self::get_SiteADM() . '/det_entregadeclarcao';
    }

    static function pag_Estado() {
        return self::get_SiteADM() . '/estado';
    }

    static function pag_DetEstado() {
        return self::get_SiteADM() . '/det_estado';
    }

    static function pag_Irmao() {
        return self::get_SiteADM() . '/irmao';
    }

    static function pag_DetIrmao() {
        return self::get_SiteADM() . '/det_irmao';
    }

    static function pag_Itempermissaoutilizador() {
        return self::get_SiteADM() . '/itempermissaoutilizador';
    }

    static function pag_DetItempermissaoutilizador() {
        return self::get_SiteADM() . '/det_itempermissaoutilizador';
    }

    static function pag_Leciona() {
        return self::get_SiteADM() . '/leciona';
    }

    static function pag_DetLeciona() {
        return self::get_SiteADM() . '/det_leciona';
    }

    static function pag_Linguaopcao() {
        return self::get_SiteADM() . '/linguaopcao';
    }

    static function pag_DetLinguaopcao() {
        return self::get_SiteADM() . '/det_linguaopcao';
    }

    static function pag_Log() {
        return self::get_SiteADM() . '/log';
    }

    static function pag_DetLog() {
        return self::get_SiteADM() . '/det_log';
    }

    static function pag_Matricula() {
        return self::get_SiteADM() . '/matricula';
    }

    static function pag_Avaliacao() {
        return self::get_SiteADM() . '/lanca_nota';
    }

    static function pag_Exame() {
        return self::get_SiteADM() . '/lanca_exame';
    }

    static function pag_Falta() {
        return self::get_SiteADM() . '/lanca_falta';
    }

    static function pag_DetMatricula() {
        return self::get_SiteADM() . '/det_matricula';
    }

    static function pag_Merito() {
        return self::get_SiteADM() . '/merito';
    }

    static function pag_DetMerito() {
        return self::get_SiteADM() . '/det_merito';
    }

    static function pag_Modulo() {
        return self::get_SiteADM() . '/modulo';
    }

    static function pag_DetModulo() {
        return self::get_SiteADM() . '/det_modulo';
    }

    static function pag_Moeda() {
        return self::get_SiteADM() . '/moeda';
    }

    static function pag_DetMoeda() {
        return self::get_SiteADM() . '/det_moeda';
    }

    static function pag_Motivosanulacao() {
        return self::get_SiteADM() . '/motivosanulacao';
    }

    static function pag_DetMotivosanulacao() {
        return self::get_SiteADM() . '/det_motivosanulacao';
    }

    static function pag_Multa() {
        return self::get_SiteADM() . '/multa';
    }

    static function pag_DetMulta() {
        return self::get_SiteADM() . '/det_multa';
    }

    static function pag_Municipio() {
        return self::get_SiteADM() . '/municipio';
    }

    static function pag_DetMunicipio() {
        return self::get_SiteADM() . '/det_municipio';
    }

    static function pag_Nacionalidade() {
        return self::get_SiteADM() . '/nacionalidade';
    }

    static function pag_DetNacionalidade() {
        return self::get_SiteADM() . '/det_nacionalidade';
    }

    static function pag_Nota() {
        return self::get_SiteADM() . '/nota';
    }

    static function pag_DetNota() {
        return self::get_SiteADM() . '/det_nota';
    }

    static function pag_Notaaluno() {
        return self::get_SiteADM() . '/notaaluno';
    }

    static function pag_DetNotaaluno() {
        return self::get_SiteADM() . '/det_notaaluno';
    }

    static function pag_Pagamento() {
        return self::get_SiteADM() . '/pagamento';
    }

    static function pag_DetPagamento() {
        return self::get_SiteADM() . '/det_pagamento';
    }

    static function pag_Parametro() {
        return self::get_SiteADM() . '/parametro';
    }

    static function pag_DetParametro() {
        return self::get_SiteADM() . '/det_parametro';
    }

    static function pag_Password() {
        return self::get_SiteADM() . '/password';
    }

    static function pag_DetPassword() {
        return self::get_SiteADM() . '/det_password';
    }

    static function pag_Pedidosdeclaracao() {
        return self::get_SiteADM() . '/pedidosdeclaracao';
    }

    static function pag_DetPedidosdeclaracao() {
        return self::get_SiteADM() . '/det_pedidosdeclaracao';
    }

    static function pag_Periodo() {
        return self::get_SiteADM() . '/periodo';
    }

    static function pag_DetPeriodo() {
        return self::get_SiteADM() . '/det_periodo';
    }

    static function pag_Periodolectivo() {
        return self::get_SiteADM() . '/periodolectivo';
    }

    static function pag_DetPeriodolectivo() {
        return self::get_SiteADM() . '/det_periodolectivo';
    }

    static function pag_Permissao() {
        return self::get_SiteADM() . '/permissao';
    }

    static function pag_DetPermissao() {
        return self::get_SiteADM() . '/det_permissao';
    }

    static function pag_Pessoa() {
        return self::get_SiteADM() . '/pessoa';
    }

    static function pag_DetPessoa() {
        return self::get_SiteADM() . '/det_pessoa';
    }

    static function pag_Processosdisciplinar() {
        return self::get_SiteADM() . '/processosdisciplinar';
    }

    static function pag_DetProcessosdisciplinar() {
        return self::get_SiteADM() . '/det_processosdisciplinar';
    }

    static function pag_Professor() {
        return self::get_SiteADM() . '/professor';
    }

    static function pag_DetProfessor() {
        return self::get_SiteADM() . '/det_professor';
    }

    static function pag_Profissao() {
        return self::get_SiteADM() . '/profissao';
    }

    static function pag_DetProfissao() {
        return self::get_SiteADM() . '/det_profissao';
    }

    static function pag_Propina() {
        return self::get_SiteADM() . '/propina';
    }

    static function pag_DetPropina() {
        return self::get_SiteADM() . '/det_propina';
    }

    static function pag_Provincia() {
        return self::get_SiteADM() . '/provincia';
    }

    static function pag_DetProvincia() {
        return self::get_SiteADM() . '/det_provincia';
    }

    static function pag_Resultadosfinal() {
        return self::get_SiteADM() . '/resultadosfinal';
    }

    static function pag_DetResultadosfinal() {
        return self::get_SiteADM() . '/det_resultadosfinal';
    }

    static function pag_Sala() {
        return self::get_SiteADM() . '/sala';
    }

    static function pag_DetSala() {
        return self::get_SiteADM() . '/det_sala';
    }

    static function pag_Subsistema() {
        return self::get_SiteADM() . '/subsistema';
    }

    static function pag_DetSubsistema() {
        return self::get_SiteADM() . '/det_subsistema';
    }

    static function pag_TentativaLogin() {
        return self::get_SiteADM() . '/tentativaLogin';
    }

    static function pag_DetTentativaLogin() {
        return self::get_SiteADM() . '/det_tentativaLogin';
    }

    static function pag_Tipoavaliacao() {
        return self::get_SiteADM() . '/tipoavaliacao';
    }

    static function pag_DetTipoavaliacao() {
        return self::get_SiteADM() . '/det_tipoavaliacao';
    }

    static function pag_Tipodeclaracao() {
        return self::get_SiteADM() . '/tipodeclaracao';
    }

    static function pag_DetTipodeclaracao() {
        return self::get_SiteADM() . '/det_tipodeclaracao';
    }

    static function pag_Tipomulta() {
        return self::get_SiteADM() . '/tipomulta';
    }

    static function pag_DetTipomulta() {
        return self::get_SiteADM() . '/det_tipomulta';
    }

    static function pag_Tipopropina() {
        return self::get_SiteADM() . '/tipopropina';
    }

    static function pag_DetTipopropina() {
        return self::get_SiteADM() . '/det_tipopropina';
    }

    static function pag_Tiposervico() {
        return self::get_SiteADM() . '/tiposervico';
    }

    static function pag_DetTiposervico() {
        return self::get_SiteADM() . '/det_tiposervico';
    }

    static function pag_Tiposutilizador() {
        return self::get_SiteADM() . '/tiposutilizador';
    }

    static function pag_DetTiposutilizador() {
        return self::get_SiteADM() . '/det_tiposutilizador';
    }

    static function pag_Turma() {
        return self::get_SiteADM() . '/turma';
    }

    static function pag_DetTurma() {
        return self::get_SiteADM() . '/det_turma';
    }

    static function pag_Acesso() {
        return self::get_SiteADM() . '/acesso';
    }

    static function pag_DetAcesso() {
        return self::get_SiteADM() . '/det_acesso';
    }

}

?>