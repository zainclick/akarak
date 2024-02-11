<?php
# Vendor Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\AgencyAuthController;
use App\Http\Controllers\Auth\VendorAuthController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\Vendor\VendorFaqController;
use App\Http\Controllers\Vendor\VendorTagController;
use App\Http\Controllers\Vendor\VendorFileController;
use App\Http\Controllers\Vendor\VendorMenuController;
use App\Http\Controllers\Vendor\VendorPageController;
use App\Http\Controllers\Vendor\VendorRoleController;
use App\Http\Controllers\Vendor\VendorTestController;
use App\Http\Controllers\Vendor\VendorUserController;
use App\Http\Controllers\Agency\AgencyAdminController;
use App\Http\Controllers\Vendor\VendorAdminController;
use App\Http\Controllers\Vendor\VendorHelperController;
use App\Http\Controllers\Vendor\VendorPluginController;
use App\Http\Controllers\Vendor\VendorArticleController;
use App\Http\Controllers\Vendor\VendorContactController;
use App\Http\Controllers\Vendor\VendorProfileController;
use App\Http\Controllers\Vendor\VendorSettingController;
use App\Http\Controllers\Vendor\VendorSiteMapController;
use App\Http\Controllers\Agency\AgenciesAgentsController;
use App\Http\Controllers\Backend\BackendAgentsController;
use App\Http\Controllers\Vendor\VendorCategoryController;
use App\Http\Controllers\Vendor\VendorMenuLinkController;
use App\Http\Controllers\Vendor\VendorTrafficsController;


# Frontend Controllers
use App\Http\Controllers\Vendor\VendorUserRoleController;
use App\Http\Controllers\Agency\AgencyPropertiesController;
use App\Http\Controllers\Vendor\VendorPermissionController;
use App\Http\Controllers\Vendor\VendorRedirectionController;
use App\Http\Controllers\Vendor\VendorAnnouncementController;
use App\Http\Controllers\Vendor\VendorContactReplyController;
use App\Http\Controllers\Agency\AgencySubscriptionsController;
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



//login agency routes
Route::get('agency/login', [AgencyAuthController::class,'login'])->name('agency-login');
Route::post('agency/login-action', [AgencyAuthController::class,'loginAction'])->name('agency-login-action');
Route::get('agency/register', [AgencyAuthController::class,'register'])->name('agency-register');
Route::post('agency/register-action', [AgencyAuthController::class,'registerAction'])->name('agency-register-action');
Route::get('agency/logout', [AgencyAuthController::class,'logout'])->name('agency-logout');

// agency agents routes
Route::get('agency/agents', [AgenciesAgentsController::class,'index'])->middleware(['auth:agency'])->name('agency-agents');
Route::get('agency/agents/create', [AgenciesAgentsController::class,'create'])->middleware(['auth:agency'])->name('agency-agents-create');
Route::post('agency/agents/store', [AgenciesAgentsController::class,'store'])->middleware(['auth:agency'])->name('agency-agents-store');
Route::get('agency/agents/edit/{id}', [AgenciesAgentsController::class,'edit'])->middleware(['auth:agency'])->name('agency-agents-edit');
Route::put('agency/agents/update/{id}',[AgenciesAgentsController::class,'update'])->middleware(['auth:agency'])->name('agency-agents-update');
Route::get('agency/agents/{id}', [AgenciesAgentsController::class,'show'])->middleware(['auth:agency'])->name('agency-agents-show');
Route::post('agency/agents/delete',[AgenciesAgentsController::class,'delete'])->name('agency-agents-delete');
Route::get('agency/agents-pending', [AgenciesAgentsController::class,'pending'])->middleware(['auth:agency'])->name('agency-agents-pending');
Route::get('agency/agents-blocked/{slug}', [AgenciesAgentsController::class,'blocked'])->middleware(['auth:agency'])->name('agency-agents-blocked');


Route::get('agency/properties', [AgencyPropertiesController::class,'index'])->middleware(['auth:agency'])->name('agency-properties');
Route::get('agency/properties/create', [AgencyPropertiesController::class,'create'])->middleware(['auth:agency'])->name('agency-properties-create');
Route::get('agency/properties-pending', [AgencyPropertiesController::class,'propertisPending'])->middleware(['auth:agency'])->name('agency-properties-pending');
Route::get('agency/properties-features', [AgencyPropertiesController::class,'propertisFeatures'])->middleware(['auth:agency'])->name('agency-properties-features');

// Subscriptios Routes
Route::get('agency/subscriptions', [AgencySubscriptionsController::class,'index'])->middleware(['auth:agency'])->name('agency-subscriptions');
Route::get('agency/subscriptions/{slug}', [AgencySubscriptionsController::class,'show'])->middleware(['auth:agency'])->name('agency-subscriptions-show');
Route::get('agency/subscription/cancel', [AgencySubscriptionsController::class,'cancelSubscription'])->middleware(['auth:agency'])->name('agency-subscription-cancel');



#Route::get('/test',[VendorTestController::class,'test']);

Route::prefix('agency')->middleware(['auth:agency'])->name('agency.')->group(function () {

    Route::get('dashboard',[AgencyAdminController::class,'index'])->name('index');
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
            Route::get('/',[VendorSettingController::class,'index'])->name('index');
            Route::put('/update',[VendorSettingController::class,'update'])->name('update');
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