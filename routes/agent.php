<?php
# Vendor Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\AgentAuthController;
use App\Http\Controllers\Auth\AgencyAuthController;
use App\Http\Controllers\Auth\VendorAuthController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\Agent\AgentAdminController;
use App\Http\Controllers\Vendor\VendorFaqController;
use App\Http\Controllers\Vendor\VendorTagController;
use App\Http\Controllers\Vendor\VendorFileController;
use App\Http\Controllers\Vendor\VendorMenuController;
use App\Http\Controllers\Vendor\VendorPageController;
use App\Http\Controllers\Vendor\VendorRoleController;
use App\Http\Controllers\Vendor\VendorTestController;
use App\Http\Controllers\Vendor\VendorUserController;
use App\Http\Controllers\Agency\AgencyAdminController;
use App\Http\Controllers\Agent\AgentSettingController;
use App\Http\Controllers\Vendor\VendorAdminController;
use App\Http\Controllers\Vendor\VendorHelperController;
use App\Http\Controllers\Vendor\VendorPluginController;
use App\Http\Controllers\Vendor\VendorArticleController;
use App\Http\Controllers\Vendor\VendorContactController;
use App\Http\Controllers\Vendor\VendorProfileController;
use App\Http\Controllers\Vendor\VendorSettingController;
use App\Http\Controllers\Vendor\VendorSiteMapController;
use App\Http\Controllers\Agency\AgenciesAgentsController;
use App\Http\Controllers\Agent\AgentPropertiesController;


# Frontend Controllers
use App\Http\Controllers\Backend\BackendAgentsController;
use App\Http\Controllers\Vendor\VendorCategoryController;
use App\Http\Controllers\Vendor\VendorMenuLinkController;
use App\Http\Controllers\Vendor\VendorTrafficsController;
use App\Http\Controllers\Vendor\VendorUserRoleController;
use App\Http\Controllers\Vendor\VendorPermissionController;
use App\Http\Controllers\Vendor\VendorRedirectionController;
use App\Http\Controllers\Vendor\VendorAnnouncementController;
use App\Http\Controllers\Vendor\VendorContactReplyController;
use App\Http\Controllers\Vendor\VendorNotificationsController;
use App\Http\Controllers\Vendor\VendorArticleCommentController;
use App\Http\Controllers\Vendor\VendorUserPermissionController;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::get('/', [FrontController::class,'index'])->name('home');
Route::get('/index2', function(){return view('front.index2');})->name('index2');



//login agent routes
Route::get('agent/login', [AgentAuthController::class,'login'])->name('agent-login');
Route::post('agent/login-action', [AgentAuthController::class,'loginAction'])->name('agent-login-action');
Route::get('agent/register', [AgentAuthController::class,'register'])->name('agent-register');
Route::post('agent/register-action', [AgentAuthController::class,'registerAction'])->name('agent-register-action');
Route::get('agent/logout', [AgentAuthController::class,'logout'])->name('agent-logout');

// agent admin routes
Route::get('agent/properties', [AgentPropertiesController::class,'index'])->middleware(['auth:agent'])->name('agent-properties');
Route::get('agent/properties/create', [AgentPropertiesController::class,'create'])->middleware(['auth:agent'])->name('agent-properties-create');
Route::post('agent/properties/store', [AgentPropertiesController::class,'store'])->middleware(['auth:agent'])->name('agent-proeprties-store');
Route::get('agent/properties/edit/{id}', [AgentPropertiesController::class,'edit'])->middleware(['auth:agent'])->name('agent-properties-edit');
Route::get('agent/properties/{id}', [AgentPropertiesController::class,'show'])->middleware(['auth:agent'])->name('proeprty-show');
Route::get('agent/properties/images/{id}', [AgentPropertiesController::class,'images'])->middleware(['auth:agent'])->name('agent-properties-images');




#Route::get('/test',[VendorTestController::class,'test']);

Route::prefix('agent')->middleware(['auth:agent'])->name('agent.')->group(function () {
    Route::get('/',[AgentAdminController::class,'index'])->name('index-dashboard');
    Route::get('dashboard',[AgentAdminController::class,'index'])->name('index');
        Route::resource('announcements',VendorAnnouncementController::class);
        Route::resource('files',VendorFileController::class);
        Route::post('contacts/resolve',[VendorContactController::class,'resolve'])->name('contacts.resolve');
        Route::resource('contacts',VendorContactController::class);
        Route::resource('menus',VendorMenuController::class);
        Route::resource('articles',VendorArticleController::class);
        Route::post('article-comments/change_status',[VendorArticleCommentController::class,'change_status'])->name('article-comments.change_status');
        Route::resource('article-comments',VendorArticleCommentController::class);
        Route::resource('pages',VendorPageController::class);
        Route::resource('tags',VendorTagController::class);
        Route::resource('contact-replies',VendorContactReplyController::class);
        Route::post('faqs/order',[VendorFaqController::class,'order'])->name('faqs.order');
        Route::resource('faqs',VendorFaqController::class);
        Route::post('menu-links/get-type',[VendorMenuLinkController::class,'getType'])->name('menu-links.get-type');
        Route::post('menu-links/order',[VendorMenuLinkController::class,'order'])->name('menu-links.order');
        Route::resource('menu-links',VendorMenuLinkController::class);
        Route::resource('categories',VendorCategoryController::class);
        Route::resource('redirections',VendorRedirectionController::class);
        Route::get('traffics',[VendorTrafficsController::class,'index'])->name('traffics.index');
        Route::get('traffics/logs',[VendorTrafficsController::class,'logs'])->name('traffics.logs');
        Route::get('error-reports',[VendorTrafficsController::class,'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}',[VendorTrafficsController::class,'error_report'])->name('traffics.error-report');
        
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/',[AgentSettingController::class,'index'])->name('index');
            Route::put('/update',[AgentSettingController::class,'update'])->name('update');
        });

    Route::prefix('upload')->name('upload.')->group(function(){
        Route::post('/image',[VendorHelperController::class,'upload_image'])->name('image');
        Route::post('/file',[VendorHelperController::class,'upload_file'])->name('file');
        Route::post('/remove-file',[VendorHelperController::class,'remove_files'])->name('remove-file');
    });

    Route::prefix('plugins')->name('plugins.')->group(function(){
        Route::get('/',[VendorPluginController::class,'index'])->name('index');
        Route::get('/create',[VendorPluginController::class,'create'])->name('create');
        Route::post('/create',[VendorPluginController::class,'store'])->name('store');
        Route::post('/{plugin}/activate',[VendorPluginController::class,'activate'])->name('activate');
        Route::post('/{plugin}/deactivate',[VendorPluginController::class,'deactivate'])->name('deactivate');
        Route::post('/{plugin}/delete',[VendorPluginController::class,'delete'])->name('delete');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[VendorProfileController::class,'index'])->name('index');
        Route::get('/edit',[VendorProfileController::class,'edit'])->name('edit');
        Route::put('/update',[VendorProfileController::class,'update'])->name('update');
        Route::put('/update-password',[VendorProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-email',[VendorProfileController::class,'update_email'])->name('update-email');
    });

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[VendorNotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[VendorNotificationsController::class,'ajax'])->name('ajax');
        Route::post('/see',[VendorNotificationsController::class,'see'])->name('see');
        Route::get('/create',[VendorNotificationsController::class,'create'])->name('create');
        Route::post('/create',[VendorNotificationsController::class,'store'])->name('store');
    });

});

Route::get('/login/google/redirect', [LoginController::class,'redirect_google']);
Route::get('/login/google/callback', [LoginController::class,'callback_google']);
Route::get('/login/facebook/redirect', [LoginController::class,'redirect_facebook']);
Route::get('/login/facebook/callback', [LoginController::class,'callback_facebook']);


Route::get('blocked',[VendorHelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[VendorHelperController::class,'robots']);
Route::get('manifest.json',[VendorHelperController::class,'manifest'])->name('manifest');
Route::get('sitemap.xml',[VendorSiteMapController::class,'sitemap']);
Route::get('sitemaps/links',[VendorSiteMapController::class,'custom_links']);
Route::get('sitemaps/{name}/{page}/sitemap.xml',[VendorSiteMapController::class,'viewer']);


Route::view('contact','front.pages.contact')->name('contact');
Route::get('page/{page}',[FrontController::class,'page'])->name('page.show');
Route::get('tag/{tag}',[FrontController::class,'tag'])->name('tag.show');
Route::get('category/{category}',[FrontController::class,'category'])->name('category.show');
Route::get('article/{article}',[FrontController::class,'article'])->name('article.show');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::post('contact',[FrontController::class,'contact_post'])->name('contact-post');
Route::post('comment',[FrontController::class,'comment_post'])->name('comment-post');


});