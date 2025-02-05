<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainSite\HomeController;
use App\Http\Controllers\MainSite\AboutController;
use App\Http\Controllers\MainSite\CareerController;
use App\Http\Controllers\MainSite\ContactController;
use App\Http\Controllers\MainSite\FindCarerController;
use App\Http\Controllers\MainSite\HelpAndAdviceController;
use App\Http\Controllers\MainSite\PrivacyPolicyController;
use App\Http\Controllers\MainSite\TermsConditionsController;


Route::get('/', [HomeController::class, 'index'])->name('mainsite.home');
Route::get('/contact', [ContactController::class, 'index'])->name('mainsite.contact');
Route::get('/about', [AboutController::class, 'index'])->name('mainsite.about');
Route::get('/find-carer', [FindCarerController::class, 'index'])->name('mainsite.findcarer');
Route::get('/help-and-advice', [HelpAndAdviceController::class, 'index'])->name('mainsite.helpandadvice');
Route::get('/career', [CareerController::class, 'index'])->name('mainsite.career');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('mainsite.privacy');
Route::get('/terms-condition-carer', [TermsConditionsController::class, 'carerTerms'])->name('mainsite.terms.carer');
Route::get('/terms-condition-service-user', [TermsConditionsController::class, 'serviceUserTerms'])->name('mainsite.terms.serviceuser');


