<?php

use App\Models\newsSection;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('index');
$news_section = newsSection::withTrashed()->get();
foreach($news_section as $section){
    Route::get($section->slug.'/{news}', [App\Http\Controllers\HomepageController::class, 'viewNews'])->name($section->slug);
}

foreach($news_section as $section){
    Route::get($section->slug, [App\Http\Controllers\HomepageController::class, 'viewAllNews'])->name('news.'.$section->slug);
}
Route::get('about-us', [App\Http\Controllers\HomepageController::class, 'aboutUs'])->name('about-us');

Route::get('contact-us', [App\Http\Controllers\HomepageController::class, 'contactUs'])->name('contact-us');
Route::post('contact-submit', [App\Http\Controllers\HomepageController::class, 'contactSave'])->name('contact-submit');


Route::get('hit-count', [App\Http\Controllers\HomepageController::class, 'HitCount'])->name('hit-count');



Auth::routes();

Route::post('/editor/image_upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\HomeController::class, 'newsList'])->name('admin.news');
Route::get('/create-news', [App\Http\Controllers\HomeController::class, 'CreateNews'])->name('admin.create-news');
Route::post('/save-news', [App\Http\Controllers\HomeController::class, 'saveNews'])->name('admin.save-news');
Route::get('/create-news-section', [App\Http\Controllers\HomeController::class, 'CreateNewsSection'])->name('admin.create-news-section');
Route::post('/save-news-section', [App\Http\Controllers\HomeController::class, 'SaveNewsSection'])->name('admin.save-news-section');

Route::get('/section-edit/{id}', [App\Http\Controllers\HomeController::class, 'secEdit'])->name('admin.section-edit');
Route::get('/section-delete/{id}', [App\Http\Controllers\HomeController::class, 'secDelete'])->name('admin.section-delete');
Route::get('/section-publish/{id}', [App\Http\Controllers\HomeController::class, 'secPublish'])->name('admin.section-publish');
Route::get('/add-sub-category/{id}', [App\Http\Controllers\HomeController::class, 'CreateSubNewsSection'])->name('admin.add-sub-category');

Route::get('/news-edit/{id}', [App\Http\Controllers\HomeController::class, 'newsEdit'])->name('admin.news-edit');
Route::get('/news-delete/{id}', [App\Http\Controllers\HomeController::class, 'newsDelete'])->name('admin.news-delete');
Route::get('/news-publish/{id}', [App\Http\Controllers\HomeController::class, 'newsPublish'])->name('admin.news-publish');
Route::post('/settings-store', [App\Http\Controllers\HomeController::class, 'settingsStore'])->name('admin.settings-store');

Route::get('/advertisement', [App\Http\Controllers\HomeController::class, 'advertisement'])->name('admin.advertisement');
