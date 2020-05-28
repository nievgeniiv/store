<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ControllerHome@actView')->name('home');
Route::get('/products', 'ControllerProduct@actList')->name('products');
Route::get('/products/getData', 'ControllerProduct@getData')->name('products-getData');
Route::get('/product/{product}', 'ControllerProduct@actView')->name('show');
Route::get('/review', 'ControllerReview@actView')->name('review');
Route::get('/contacts', 'ControllerContacts@actView')->name('contacts');
Route::get('/search', 'ControllerHome@actView')->name('search');

// Роуты для аутентифицированного пользователя
Route::get('/trash', 'ControllerHome@actView')->name('trash');
Route::get('/favorite', 'ControllerHome@actView')->name('favorite');
Route::get('/errorAccess', 'ControllerErrorAccess@actView')->name('error-access');

// Роуты админки
Route::get('/admin', 'ControllerAdminHome@actList')->name('admin');
Route::get('/admin/getData', 'ControllerAdminHome@getData')->name('admin-getData');
Route::get('/admin/users/{idUser}', 'ControllerAdminHome@actView')->name('admin-viewUser');
Route::get('/admin/product/create', 'ControllerAdminProduct@actCreate')->name('admin-create');
Route::post('/admin/product/create', 'ControllerAdminProduct@actSave')->name('admin-save');
Route::post('/admin/product/create/file', 'ControllerAdminProduct@actSaveFile')->name('admin-save-file');
Route::get('/admin/product/list', 'ControllerAdminProduct@actList')->name('admin-list');
Route::get('/admin/product/getData', 'ControllerAdminProduct@getData')->name('admin-list-getData');
Route::get('/admin/product/{product}/edit', 'ControllerAdminProduct@actView')->name('admin-edit');
Route::put('/admin/product/{product}/edit', 'ControllerAdminProduct@actUpdate')->name('admin-update');
Route::get('/admin/product/{product}/delete', 'ControllerAdminProduct@actDelete')->name('admin-delete');
Route::get('/admin/contacts', 'ControllerAdminContact@actEdit')->name('admin-contacts');
Route::post('/admin/contacts', 'ControllerAdminContact@actSave')->name('admin-contacts-save');

// Роуты аутентификации
Auth::routes();