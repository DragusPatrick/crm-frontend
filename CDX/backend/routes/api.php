<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 404);
    }

    $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
});

Route::apiResources(['contacts' => 'API\ContactController']);
Route::apiResources(['customers' => 'API\CustomerController']);
Route::apiResources(['products' => 'API\ProductController']);
Route::resource('/invoices', 'API\InvoiceController');
Route::apiResources(['projects' => 'API\ProjectController']);
Route::apiResources(['quotes' => 'API\QuoteController']);
Route::apiResources(['payments' => 'API\PaymentController']);

Route::get('/products', 'ProductController@search');
Route::get('/customer/{id}/projects', 'API\CustomerController@getCustomerProjects');
Route::get('/customer/{id}/payments', 'API\CustomerController@getCustomerPayments');
