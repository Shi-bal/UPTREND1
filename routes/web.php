    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;

    use App\Http\Controllers\AdminController;

    use App\Http\Controllers\CartController;

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/userpage', [HomeController::class, 'viewshoes']);

    Route::get('/checkout', [HomeController::class, 'viewcheckout']);

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::get('/redirect', [HomeController::class, 'redirect']);

    Route::get('/view_category', [AdminController::class, 'view_category']);

    Route::post('/add_category', [AdminController::class, 'add_category']);

    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

    Route::get('/view_product', [AdminController::class, 'view_product']);

    Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');

    Route::get('/show_product', [AdminController::class, 'show_product']);

    Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);  

    Route::get('/showcart', [HomeController::class, 'show_cart'])->name('home.showcart');

    Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove.showcart');


