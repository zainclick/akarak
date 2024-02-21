<?php
# Vendor Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Front\AgentsController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\AgenciesController;
use App\Http\Controllers\Front\PropertiesController;
use App\Http\Controllers\Front\StatisticsController;
use App\Http\Controllers\Front\PropertiesTypeController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // Front Properties Routes
        Route::get('properties', [PropertiesController::class,'index'])->name('front-properties');
        Route::get('properties/city/{slug}', [PropertiesController::class,'city'])->name('front-properties-citys');
        Route::get('properties/{slug}', [PropertiesController::class,'show'])->name('front-properties-show');
        Route::get('properties-search', [PropertiesController::class,'search'])->name('front-properties-search');
        Route::get('properties-searches', [PropertiesController::class,'searchFront'])->name('front-properties-search-index');

        Route::get('properties-type', [PropertiesTypeController::class,'index'])->name('front-properties-type');
        Route::get('properties-type/{slug}', [PropertiesTypeController::class,'type'])->name('front-properties-type-slug');

        // Front Agencies Routes
        Route::get('agencies', [AgenciesController::class,'index'])->name('front-agencies');
        Route::get('agencies/search', [AgenciesController::class,'searchAgency'])->name('front-agency-search');
        Route::get('agencies/{slug}', [AgenciesController::class,'show'])->name('front-agencies-show');
        
        // Front Agents Routes
        Route::get('agents', [AgentsController::class,'index'])->name('front-agents');
        Route::get('agents/search', [AgentsController::class,'searchAgent'])->name('front-agent-search');
        Route::get('agents/{slug}', [AgentsController::class,'show'])->name('front-agents-show');
        
        // Front Pricing Routes
        Route::get('plans', [PricingController::class,'index'])->name('front-pricing');
        Route::get('checkout/{slug}', [PricingController::class,'checkout'])->middleware(['auth:agency'])->name('front-pricing-checkout');
        Route::post('checkout-complete', [PricingController::class,'complete'])->middleware(['auth:agency'])->name('front-pricing-checkout-complete');
        Route::get('checkout/success/{agency}', [PricingController::class,'successPayment'])->middleware(['auth:agency'])->name('front-pricing-success-payment');

        Route::get('statistics', [StatisticsController::class,'index'])->name('front-statistics');

    

    });