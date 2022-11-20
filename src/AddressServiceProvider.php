<?php

namespace Wooturk;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class AddressServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Route::get('/address/country', [CountryController::class, 'index'])->name('country-index');
		Route::get('/address/countries', [CountryController::class, 'list'])->name('country-list');
		Route::get('/address/country/{id}', [CountryController::class, 'get'])->name('country-get');

		Route::get('/address/city', [CityController::class, 'index'])->name('city-index');
		Route::get('/address/cities/{country_id}', [CityController::class, 'list'])->name('city-list');
		Route::get('/address/city/{id}', [CityController::class, 'get'])->name('city-get');

		Route::get('/address/district', [DistrictController::class, 'index'])->name('district-index');
		Route::get('/address/districts/{city_id}', [DistrictController::class, 'list'])->name('district-list');
		Route::get('/address/district/{id}', [DistrictController::class, 'get'])->name('district-get');

		Route::group(['middleware' => ['auth:sanctum','wooturk.gateway']], function(){
			Route::post('/address/country', [CountryController::class, 'post'])->name('country-create');
			Route::put('/address/country/{id}', [CountryController::class, 'put'])->name('country-update');
			Route::delete('/address/country/{id}', [CountryController::class, 'delete'])->name('country-delete');

			Route::post('/address/city', [CityController::class, 'post'])->name('city-create');
			Route::put('/address/city/{id}', [CityController::class, 'put'])->name('city-update');
			Route::delete('/address/city/{id}', [CityController::class, 'delete'])->name('city-delete');

			Route::post('/address/district', [DistrictController::class, 'post'])->name('district-create');
			Route::put('/address/district/{id}', [DistrictController::class, 'put'])->name('district-update');
			Route::delete('/address/district/{id}', [DistrictController::class, 'delete'])->name('district-delete');
		});
	}
}
