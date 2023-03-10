<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    CategoriaProdutoController,
    UserController,
    EmailController,
    PostController,
    CatPostController,
    ConfigController,
    MenuController,
    NewsletterController,
    ParceiroController,
    ProdutoController,
    SitemapController,
    SlideController,
    WhatsappController
};
use App\Http\Controllers\Web\RssFeedController;
use App\Http\Controllers\Web\SendEmailController;
use App\Http\Controllers\Web\SendWhatsappController;
use App\Http\Controllers\Web\WebController;

Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    /** Página Inicial */
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::match(['post', 'get'], '/fetchCity', [WebController::class, 'fetchCity'])->name('fetchCity');

    //**************************** Emails ********************************************/
    Route::match(['post', 'get'], '/avaliacao', [WebController::class, 'avaliacaoCliente'])->name('avaliacao');
    Route::get('/avaliacaoSend', [SendEmailController::class, 'avaliacaoSend'])->name('avaliacaoSend');
    Route::get('/atendimento', [WebController::class, 'atendimento'])->name('atendimento');
    Route::get('/sendEmail', [SendEmailController::class, 'sendEmail'])->name('sendEmail');
    Route::get('/sendNewsletter', [SendEmailController::class, 'sendNewsletter'])->name('sendNewsletter');
    Route::get('/acomodacaoSend', [SendEmailController::class, 'acomodacaoSend'])->name('acomodacaoSend');

    Route::get('/sendWhatsApp', [SendWhatsappController::class, 'sendWhatsapp'])->name('sendWhatsapp');
    
    //****************************** Blog ***********************************************/
    Route::get('/blog/artigo/{slug}', [WebController::class, 'artigo'])->name('blog.artigo');
    Route::get('/blog/categoria/{slug}', [WebController::class, 'categoria'])->name('blog.categoria');
    Route::get('/blog', [WebController::class, 'artigos'])->name('blog.artigos');
    Route::match(['post', 'get'], '/blog/pesquisar', [WebController::class, 'searchBlog'])->name('blog.searchBlog');

    //*************************************** Acomodações *******************************************/
    Route::get('/acomodacoes', [WebController::class, 'acomodacoes'])->name('acomodacoes');
    Route::get('/acomodacao/{slug}', [WebController::class, 'acomodacao'])->name('acomodacao');
    Route::match(['post', 'get'], '/reservar', [WebController::class, 'reservar'])->name('reservar');

    //*************************************** Páginas *******************************************/
    Route::get('/pagina/{slug}', [WebController::class, 'pagina'])->name('pagina');
    Route::get('/noticia/{slug}', [WebController::class, 'noticia'])->name('noticia');
    Route::get('/noticias', [WebController::class, 'noticias'])->name('noticias');
    Route::get('/noticias/categoria/{slug}', [WebController::class, 'categoria'])->name('noticia.categoria');
   
    //*************************************** Galerias *******************************************/
    Route::get('/galeria/{slug}', [WebController::class, 'galeria'])->name('galeria');
    Route::get('/galerias', [WebController::class, 'galerias'])->name('galerias');
    
    //** Pesquisa */
    Route::match(['post', 'get'], '/pesquisa', [WebController::class, 'pesquisa'])->name('pesquisa');
    Route::match(['post', 'get'], '/zapchat', [WebController::class, 'zapchat'])->name('zapchat');

    /** FEED */
    Route::get('feed', [RssFeedController::class, 'feed'])->name('feed');
    Route::get('/politica-de-privacidade', [WebController::class, 'politica'])->name('politica');
    Route::get('/sitemap', [WebController::class, 'sitemap'])->name('sitemap');

});

Route::prefix('admin')->middleware('auth')->group( function(){

    //******************************* Newsletter *********************************************/
    Route::match(['post', 'get'], 'listas/padrao', [NewsletterController::class, 'padraoMark'])->name('listas.padrao');
    Route::get('listas/set-status', [NewsletterController::class, 'listaSetStatus'])->name('listas.listaSetStatus');
    Route::get('listas/delete', [NewsletterController::class, 'listaDelete'])->name('listas.delete');
    Route::delete('listas/deleteon', [NewsletterController::class, 'listaDeleteon'])->name('listas.deleteon');
    Route::put('listas/{id}', [NewsletterController::class, 'listasUpdate'])->name('listas.update');
    Route::get('listas/{id}/editar', [NewsletterController::class, 'listasEdit'])->name('listas.edit');
    Route::get('listas/cadastrar', [NewsletterController::class, 'listasCreate'])->name('listas.create');
    Route::post('listas/store', [NewsletterController::class, 'listasStore'])->name('listas.store');
    Route::get('listas', [NewsletterController::class, 'listas'])->name('listas');

    Route::put('listas/email/{id}', [NewsletterController::class, 'newsletterUpdate'])->name('listas.newsletter.update');
    Route::get('listas/email/{id}/edit', [NewsletterController::class, 'newsletterEdit'])->name('listas.newsletter.edit');
    Route::get('listas/email/delete', [NewsletterController::class, 'emailDelete'])->name('listas.newsletter.delete');
    Route::delete('listas/email/deleteon', [NewsletterController::class, 'emailDeleteon'])->name('listas.newsletter.deleteon');
    Route::get('listas/email/cadastrar', [NewsletterController::class, 'newsletterCreate'])->name('lista.newsletter.create');
    Route::post('listas/email/store', [NewsletterController::class, 'newsletterStore'])->name('listas.newsletter.store');
    Route::get('listas/emails/categoria/{categoria}', [NewsletterController::class, 'newsletters'])->name('lista.newsletters');

    //******************************* WhatsApp *********************************************/
    Route::match(['post', 'get'], 'whatsapp/padrao', [WhatsappController::class, 'padraoMark'])->name('lista.whatsapp.padrao');
    Route::get('whatsapp/listas/set-status', [WhatsappController::class, 'listaSetStatus'])->name('lista.whatsapp.SetStatus');
    Route::get('whatsapp/listas/delete', [WhatsappController::class, 'listaDelete'])->name('lista.whatsapp.delete');
    Route::delete('whatsapp/listas/deleteon', [WhatsappController::class, 'listaDeleteon'])->name('lista.whatsapp.deleteon');
    Route::put('whatsapp/listas/{id}', [WhatsappController::class, 'listaUpdate'])->name('lista.whatsapp.update');
    Route::get('whatsapp/listas/{id}/editar', [WhatsappController::class, 'listaEdit'])->name('lista.whatsapp.edit');
    Route::get('whatsapp/listas/cadastrar', [WhatsappController::class, 'listaCreate'])->name('lista.whatsapp.create');
    Route::post('whatsapp/listas/store', [WhatsappController::class, 'listaStore'])->name('lista.whatsapp.store');
    Route::get('whatsapp/listas', [WhatsappController::class, 'listas'])->name('listas.whatsapp');

    Route::put('whatsapp/numero/{id}', [WhatsappController::class, 'numeroUpdate'])->name('lista.numero.update');
    Route::get('whatsapp/set-status', [WhatsappController::class, 'numeroSetStatus'])->name('lista.numero.SetStatus');
    Route::get('whatsapp/numero/{id}/edit', [WhatsappController::class, 'numeroEdit'])->name('lista.numero.edit');
    Route::get('whatsapp/numero/delete', [WhatsappController::class, 'numeroDelete'])->name('lista.numero.delete');
    Route::delete('whatsapp/numero/deleteon', [WhatsappController::class, 'numeroDeleteon'])->name('lista.numero.deleteon');
    Route::get('whatsapp/numero/cadastrar', [WhatsappController::class, 'numeroCreate'])->name('lista.numero.create');
    Route::post('whatsapp/numero/store', [WhatsappController::class, 'numeroStore'])->name('lista.numero.store');
    Route::get('whatsapp/numeros/categoria/{categoria}', [WhatsappController::class, 'numeros'])->name('lista.numeros');

    //******************* Slides ************************************************/
    Route::get('slides/set-status', [SlideController::class, 'slideSetStatus'])->name('slides.slideSetStatus');
    Route::get('slides/delete', [SlideController::class, 'delete'])->name('slides.delete');
    Route::delete('slides/deleteon', [SlideController::class, 'deleteon'])->name('slides.deleteon');
    Route::put('slides/{slide}', [SlideController::class, 'update'])->name('slides.update');
    Route::get('slides/{slide}/edit', [SlideController::class, 'edit'])->name('slides.edit');
    Route::get('slides/create', [SlideController::class, 'create'])->name('slides.create');
    Route::post('slides/store', [SlideController::class, 'store'])->name('slides.store');
    Route::get('slides', [SlideController::class, 'index'])->name('slides.index');

    //******************** Parceiros *********************************************/
    Route::match(['post', 'get'], 'parceiros/fetchCity', [ParceiroController::class, 'fetchCity'])->name('parceiros.fetchCity');
    Route::get('parceiros/set-status', [ParceiroController::class, 'parceiroSetStatus'])->name('parceiros.parceiroSetStatus');
    Route::post('parceiros/image-set-cover', [ParceiroController::class, 'imageSetCover'])->name('parceiros.imageSetCover');
    Route::delete('parceiros/image-remove', [ParceiroController::class, 'imageRemove'])->name('parceiros.imageRemove');
    Route::delete('parceiros/deleteon', [ParceiroController::class, 'deleteon'])->name('parceiros.deleteon');
    Route::get('parceiros/delete', [ParceiroController::class, 'delete'])->name('parceiros.delete');
    Route::put('parceiros/{id}', [ParceiroController::class, 'update'])->name('parceiros.update');
    Route::get('parceiros/{id}/edit', [ParceiroController::class, 'edit'])->name('parceiros.edit');
    Route::get('parceiros/create', [ParceiroController::class, 'create'])->name('parceiros.create');
    Route::post('parceiros/store', [ParceiroController::class, 'store'])->name('parceiros.store');
    Route::get('parceiros', [ParceiroController::class, 'index'])->name('parceiros.index');

    //******************** Sitemap *********************************************/
    Route::get('gerarxml', [SitemapController::class, 'gerarxml'])->name('admin.gerarxml');

    //******************** Configurações ***************************************/
    Route::match(['post', 'get'], 'configuracoes/fetchCity', [ConfigController::class, 'fetchCity'])->name('configuracoes.fetchCity');
    Route::put('configuracoes/{config}', [ConfigController::class, 'update'])->name('configuracoes.update');
    Route::get('configuracoes', [ConfigController::class, 'editar'])->name('configuracoes.editar');

    //********************* Categorias para Posts *******************************/
    Route::get('categorias/delete', [CatPostController::class, 'delete'])->name('categorias.delete');
    Route::delete('categorias/deleteon', [CatPostController::class, 'deleteon'])->name('categorias.deleteon');
    Route::put('categorias/posts/{id}', [CatPostController::class, 'update'])->name('categorias.update');
    Route::get('categorias/{id}/edit', [CatPostController::class, 'edit'])->name('categorias.edit');
    Route::match(['post', 'get'],'posts/categorias/create/{catpai}', [CatPostController::class, 'create'])->name('categorias.create');
    Route::post('posts/categorias/store', [CatPostController::class, 'store'])->name('categorias.store');
    Route::get('posts/categorias', [CatPostController::class, 'index'])->name('categorias.index');

    //********************** Blog ************************************************/
    Route::get('posts/set-status', [PostController::class, 'postSetStatus'])->name('posts.postSetStatus');
    Route::get('posts/set-menu', [PostController::class, 'postSetMenu'])->name('posts.postSetMenu');
    Route::get('posts/delete', [PostController::class, 'delete'])->name('posts.delete');
    Route::delete('posts/deleteon', [PostController::class, 'deleteon'])->name('posts.deleteon');
    Route::post('posts/image-set-cover', [PostController::class, 'imageSetCover'])->name('posts.imageSetCover');
    Route::delete('posts/image-remove', [PostController::class, 'imageRemove'])->name('posts.imageRemove');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::post('posts/categoriaList', [PostController::class, 'categoriaList'])->name('posts.categoriaList');
    Route::get('posts/artigos', [PostController::class, 'index'])->name('posts.artigos');
    Route::get('posts/noticias', [PostController::class, 'index'])->name('posts.noticias');
    Route::get('posts/paginas', [PostController::class, 'index'])->name('posts.paginas');

    //*********************** Email **********************************************/
    Route::get('email/suporte', [EmailController::class, 'suporte'])->name('email.suporte');
    Route::match(['post', 'get'], 'email/enviar-email', [EmailController::class, 'send'])->name('email.send');
    Route::post('email/sendEmail', [EmailController::class, 'sendEmail'])->name('email.sendEmail');
    Route::match(['post', 'get'], 'email/success', [EmailController::class, 'success'])->name('email.success');

    //*********************** Usuários *******************************************/
    Route::match(['get', 'post'], 'usuarios/pesquisa', [UserController::class, 'search'])->name('users.search');
    Route::match(['post', 'get'], 'usuarios/fetchCity', [UserController::class, 'fetchCity'])->name('users.fetchCity');
    Route::delete('usuarios/deleteon', [UserController::class, 'deleteon'])->name('users.deleteon');
    Route::get('usuarios/set-status', [UserController::class, 'userSetStatus'])->name('users.userSetStatus');
    Route::get('usuarios/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('usuarios/time', [UserController::class, 'team'])->name('users.team');
    Route::get('usuarios/view/{id}', [UserController::class, 'show'])->name('users.view');
    Route::put('usuarios/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('usuarios/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('usuarios/create', [UserController::class, 'create'])->name('users.create');
    Route::post('usuarios/store', [UserController::class, 'store'])->name('users.store');
    Route::get('usuarios', [UserController::class, 'index'])->name('users.index');
   
    //****************************** Menu *******************************************/
    Route::get('menus/set-status', [MenuController::class, 'menuSetStatus'])->name('menus.menuSetStatus');
    Route::delete('menus/deleteon', [MenuController::class, 'deleteon'])->name('menus.deleteon');
    Route::get('menus/delete', [MenuController::class, 'delete'])->name('menus.delete');
    Route::put('menus/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::get('menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('menus/store', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

    //****************************** Cardápio *******************************************/
    Route::get('cardapio/categorias', [CategoriaProdutoController::class, 'categorias'])->name('cardapio.categorias');
    Route::get('cardapio/categorias/create', [CategoriaProdutoController::class, 'create'])->name('cardapio.categorias.create');
    Route::post('cardapio/categorias/store', [CategoriaProdutoController::class, 'store'])->name('cardapio.categorias.store');
    Route::put('cardapio/categorias/{id}', [CategoriaProdutoController::class, 'update'])->name('cardapio.categorias.update');
    Route::get('cardapio/categorias/{id}/edit', [CategoriaProdutoController::class, 'edit'])->name('cardapio.categorias.edit');
    Route::get('cardapio/categorias/set-status', [CategoriaProdutoController::class, 'setStatus'])->name('cardapio.categorias.setStatus');
    Route::delete('cardapio/categorias/deleteon', [CategoriaProdutoController::class, 'deleteon'])->name('cardapio.categorias.deleteon');
    Route::get('cardapio/categorias/delete', [CategoriaProdutoController::class, 'delete'])->name('cardapio.categorias.delete');
    Route::get('cardapio/set-status', [CardapioController::class, 'setStatus'])->name('cardapio.setStatus');
    Route::delete('cardapio/deleteon', [CardapioController::class, 'deleteon'])->name('cardapio.deleteon');
    Route::get('cardapio/delete', [CardapioController::class, 'delete'])->name('cardapio.delete');
    Route::put('cardapio/{id}', [CardapioController::class, 'update'])->name('cardapio.update');
    Route::get('cardapio/{id}/edit', [CardapioController::class, 'edit'])->name('cardapio.edit');
    Route::get('cardapio/create', [CardapioController::class, 'create'])->name('cardapio.create');
    Route::post('cardapio/store', [CardapioController::class, 'store'])->name('cardapio.store');
    Route::get('/cardapio', [ProdutoController::class, 'index'])->name('cardapio.index');

    //******************** Sitemap *********************************************/
    Route::get('gerarxml', [SitemapController::class, 'gerarxml'])->name('gerarxml');

    Route::get('/', [AdminController::class, 'home'])->name('home');
});


Auth::routes();
