<?php

use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ApiBenefitController;
use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiClientController;
use App\Http\Controllers\api\ApiCompanyController;
use App\Http\Controllers\api\ApiMenuRolController;
use App\Http\Controllers\api\ApiPlanController;
use App\Http\Controllers\api\ApiReasonController;
use App\Http\Controllers\api\ApiServiceController;
use App\Http\Controllers\api\ApiUserAdministrationCompanyController;
use App\Http\Controllers\api\ApiUserController;
use App\Http\Controllers\api\RoleController;
use Illuminate\Support\Facades\Route;


Route::post('/auth/register', [ApiAuthController::class, 'createUser']);
Route::post('/auth/login', [ApiAuthController::class, 'loginUser']);

Route::get('plan_home', [ApiPlanController::class, 'index']);
Route::get('service_home', [ApiServiceController::class, 'index']);
Route::get('reason_home', [ApiReasonController::class, 'index']);
Route::get('client_home', [ApiClientController::class, 'index']);


Route::prefix('admin')->middleware('auth:sanctum')->group(function () {


    Route::get('data/menu', [ApiMenuRolController::class, 'getMenu']);

    Route::post('/auth/logout', [ApiAuthController::class, 'logoutUser'])->middleware('can:auth.logout');
    Route::post('/auth/refresh', [ApiAuthController::class, 'refresh'])->middleware('can:auth.refresh');
    Route::get('/auth/user', [ApiAuthController::class, 'getUserData'])->middleware('can:auth.me');
    Route::apiResource('administration_user',  ApiUserAdministrationCompanyController::class)->middleware('can:admin.usercompanies');
    Route::apiResource('role',  RoleController::class)->middleware('can:admin.roles');
    Route::apiResource('users',  ApiUserController::class)->middleware('can:admin.users');

    Route::apiResource('categories', ApiCategoryController::class)->middleware('can:admin.categories');
    Route::apiResource('companies', ApiCompanyController::class)->middleware('can:admin.companies');
    Route::apiResource('benefits', ApiBenefitController::class)->middleware('can:admin.benefits');
    Route::apiResource('plans', ApiPlanController::class)->middleware('can:admin.plans');
    Route::apiResource('services', ApiServiceController::class)->middleware('can:admin.services');
    Route::apiResource('reasons', ApiReasonController::class)->middleware('can:admin.reasons');
    Route::apiResource('clients', ApiClientController::class)->middleware('can:admin.clients');
});
