<?php
# Backend Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\AgenciesController;
use App\Http\Controllers\Auth\AgencyAuthController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\Front\PropertiesController;
use App\Http\Controllers\Front\StatisticsController;
use App\Http\Controllers\Backend\BackendFaqController;
use App\Http\Controllers\Backend\BackendTagController;
use App\Http\Controllers\Backend\BackendFileController;
use App\Http\Controllers\Backend\BackendMenuController;
use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendTestController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendAdminController;
use App\Http\Controllers\Backend\BackendHelperController;
use App\Http\Controllers\Backend\BackendPluginController;
use App\Http\Controllers\Backend\BackendArticleController;
use App\Http\Controllers\Backend\BackendContactController;
use App\Http\Controllers\Backend\BackendProfileController;
use App\Http\Controllers\Backend\BackendSettingController;
use App\Http\Controllers\Backend\BackendSiteMapController;
use App\Http\Controllers\Backend\BackendCategoryController;


# Frontend Controllers
use App\Http\Controllers\Backend\BackendMenuLinkController;
use App\Http\Controllers\Backend\BackendTrafficsController;
use App\Http\Controllers\Backend\BackendUserRoleController;
use App\Http\Controllers\User\favoritePropertiesController;
use App\Http\Controllers\Backend\BackendPermissionController;
use App\Http\Controllers\Backend\BackendRedirectionController;
use App\Http\Controllers\Backend\BackendAnnouncementController;
use App\Http\Controllers\Backend\BackendContactReplyController;
use App\Http\Controllers\Backend\BackendNotificationsController;
use App\Http\Controllers\Backend\BackendArticleCommentController;
use App\Http\Controllers\Backend\BackendUserPermissionController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


//login agent routes
Route::get('user/login', [UserAuthController::class,'login'])->name('user-login');
Route::post('user/login-action', [UserAuthController::class,'loginAction'])->name('user-login-action');
Route::get('user/register', [UserAuthController::class,'register'])->name('agent-register');
Route::post('user/register-action', [UserAuthController::class,'registerAction'])->name('agent-register-action');
Route::get('user/logout', [UserAuthController::class,'logout'])->name('user-logout');

// Front routes 
Route::get('user', [UserController::class,'dashboard'])->middleware(['auth:front-user'])->name('front-user-dashboard');
Route::get('user/dashboard', [UserController::class,'dashboard'])->middleware(['auth:front-user'])->name('front-user-dashboard');
Route::get('user/account', [UserController::class,'account'])->middleware(['auth:front-user'])->name('front-user-account');
Route::post('user/account-action', [UserController::class,'account_action'])->middleware(['auth:front-user'])->name('front-user-account-action');

 // Front Fave property
 Route::get('user/favorite-properties', [favoritePropertiesController::class,'index'])->middleware(['auth:front-user'])->name('front-user-fav-properties');
 Route::get('fave-property', [favoritePropertiesController::class,'fav_property'])->name('fave-property');
 Route::get('fave-property-remove', [favoritePropertiesController::class,'remove_fave'])->name('remove-fave-property');

// properties reviews
Route::post('user/property-review', [UserController::class,'propertyReview'])->middleware(['auth:front-user'])->name('front-user-property-review');

// email agent
Route::post('user/agent-email', [UserController::class,'emailAgent'])->name('front-user-email-agent');

// email agent
Route::post('user/agency-email', [UserController::class,'emailAgency'])->name('front-user-email-agency');




Route::get('test', [FrontController::class,'test'])->name('test');

Route::get('/', [FrontController::class,'index'])->name('home');
Route::get('/index2', function(){return view('front.index2');})->name('index2');



Route::prefix('dashboard')->middleware(['auth','ActiveAccount','verified'])->name('user.')->group(function () {
    Route::get('/', [FrontendProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/support', [FrontendProfileController::class,'support'])->name('support');
    Route::get('/support/create-ticket', [FrontendProfileController::class,'create_ticket'])->name('create-ticket');
    Route::post('/support/create-ticket', [FrontendProfileController::class,'store_ticket'])->name('store-ticket');
    Route::get('/support/{ticket}', [FrontendProfileController::class,'ticket'])->name('ticket');
    Route::post('/support/{ticket}/reply', [FrontendProfileController::class,'reply_ticket'])->name('reply-ticket');
    Route::get('/notifications', [FrontendProfileController::class,'notifications'])->name('notifications');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/settings',[FrontendProfileController::class,'profile_edit'])->name('edit');
        Route::put('/update',[FrontendProfileController::class,'profile_update'])->name('update');
        Route::put('/update-password',[FrontendProfileController::class,'profile_update_password'])->name('update-password');
        Route::put('/update-email',[FrontendProfileController::class,'profile_update_email'])->name('update-email');
    });
});










Route::get('/login/google/redirect', [LoginController::class,'redirect_google']);
Route::get('/login/google/callback', [LoginController::class,'callback_google']);
Route::get('/login/facebook/redirect', [LoginController::class,'redirect_facebook']);
Route::get('/login/facebook/callback', [LoginController::class,'callback_facebook']);


Route::get('blocked',[BackendHelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[BackendHelperController::class,'robots']);
Route::get('manifest.json',[BackendHelperController::class,'manifest'])->name('manifest');
Route::get('sitemap.xml',[BackendSiteMapController::class,'sitemap']);
Route::get('sitemaps/links',[BackendSiteMapController::class,'custom_links']);
Route::get('sitemaps/{name}/{page}/sitemap.xml',[BackendSiteMapController::class,'viewer']);


Route::view('contact','front.pages.contact')->name('contact');
Route::get('page/{page}',[FrontController::class,'page'])->name('page.show');
Route::get('tag/{tag}',[FrontController::class,'tag'])->name('tag.show');
Route::get('category/{category}',[FrontController::class,'category'])->name('category.show');
Route::get('article/{article}',[FrontController::class,'article'])->name('article.show');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::post('contact',[FrontController::class,'contact_post'])->name('contact-post');
Route::post('comment',[FrontController::class,'comment_post'])->name('comment-post');
});