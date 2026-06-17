<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BannerController;
use App\Models\Products;
use App\Models\Banner;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Menu;
use App\Http\Controllers\Admin\ContactController;
use App\Models\Contacts;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Http\Controllers\Admin\MarqueeController;
use App\Models\Marquee;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Models\AboutSection;
use App\Http\Controllers\Admin\OfferSectionController;
use App\Models\OfferSection;

Route::get('/', function () {

    $products = Products::get();

    $banner = Banner::first();

    $menus = Menu::where('status', 1)
                ->orderBy('position')
                ->get();

    $contacts = Contacts::first();

    $categories = Category::withCount('products')
                    ->where('is_active', 1)
                    ->orderBy('name')
                    ->get();

    $marquees = Marquee::where('status',1)->get();

    $about = AboutSection::first();

    $offer = OfferSection::where('status', 1)->first();

    return view('frontend.index', compact(
        'products',
        'banner',
        'menus',
        'contacts',
        'categories',
        'marquees',
        'about',
        'offer'
    ));
});

Route::get('/index', [HomePageController::class, 'index'])->name('index');
Route::get('/about', [AboutPageController::class, 'index'])->name('about');
Route::get('/products',[ProductsController::class, 'index'])->name('products');
Route::get('/products/create',[ProductsController::class, 'create'])->name('products.create');
Route::get('/products/main',[ProductsController::class, 'index'])->name('products.main');
Route::post('/store',[ProductsController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}',[ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}',[ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/destroy/{id}',[ProductsController::class, 'destroy'])->name('products.destroy');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit'); 
Route::delete('contacts/delete/{id}',[ContactController::class, 'destroy'])->name('contacts.delete');
Route::get('/hero-section', [HeroSectionController::class, 'index'])->name('hero-section.index');
Route::get('/hero-section/create', [HeroSectionController::class, 'create'])->name('hero-section.create');
Route::get('/hero-section/edit', [HeroSectionController::class, 'edit'])->name('hero-section.edit');
Route::post('/hero-section', [HeroSectionController::class, 'store'])->name('hero-section.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('admin')->group(function () {

    Route::resource('menu', MenuController::class);

    Route::resource('banners', BannerController::class);

    Route::resource('products', ProductController::class);

    Route::resource('contacts', ContactController::class);

    Route::resource('hero-section', HeroSectionController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('marquees', MarqueeController::class);

    Route::resource('admin/about', AboutSectionController::class);

    Route::resource('offer', OfferSectionController::class);

});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('menu', MenuController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('hero-section', HeroSectionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('marquees', MarqueeController::class);
});


require __DIR__.'/auth.php';
