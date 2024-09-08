<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontDesign\vv;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\SubcatogriesController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\CatogryController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\FrontDesign\RegisterController;
use App\Http\Controllers\FrontDesign\ViewDesignController;
use App\Http\Controllers\dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\SpecController;
use App\Http\Controllers\FrontDesgin\AboutUsController;
use App\Http\Controllers\FrontDesidn\CuponController;
use App\Http\Controllers\FrontDesign\AddToCartController;
use App\Http\Controllers\FrontDesign\CheckOutController;
use App\Http\Controllers\FrontDesign\ContactUsController;
use App\Http\Controllers\FrontDesign\CuponCodeController;
use App\Http\Controllers\FrontDesign\DesignLoginController;
use App\Http\Controllers\FrontDesign\DetailsProductController;
use App\Http\Controllers\FrontDesign\NavController;
use App\Http\Controllers\FrontDesign\OrderSuccsessController;
use App\Http\Controllers\FrontDesign\PaymentController;
use App\Http\Controllers\FrontDesign\ShopGridsController;
use App\Http\Controllers\FrontDesign\ShowCartController;
use App\Http\Controllers\FrontDesign\StripeController;
use App\Http\Controllers\FrontDesign\ViewCartController;
use App\Http\Controllers\FrontDesign\WishlistController;

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





Route::get('/', function () {
    return view('AdminBanal.layout.layout');
});


                            // dashpoard route//

Route::group(['prefix'=>'daspoard'],function(){
route::group(['middleware'=>'adminlogin'],function(){

    Route::resource('admin', DashboardAdminController::class);
    Route::resource('catogry', CatogryController::class);
    Route::resource('subcatogry', SubcatogriesController::class);
    Route::resource('brand', BrandController::class);
    route::resource('product',ProductController::class);
    route::resource('spec',SpecController::class);
    route::resource('contact',ContactController::class);

});

    route::get('login/admin',[AuthAdminController::class,'index'])->name('admin');
    route::post('login/cheak',[AuthAdminController::class,'cheak'])->name('admin.cheak');
    route::get('logout/cheak',[AuthAdminController::class,'logout'])->name('admin.logout');
});


                                 // Front routes//


 route::group(['prefix'=>'design'],function(){
route::get('view',ViewDesignController::class)->name('home');

route::get('shopgird',ShopGridsController::class)->name('shopgride');


route::get('about_us',[AboutUsController::class,'index'])->name('about_us');
route::get('order/{session_id}',[OrderSuccsessController::class,'index'])->name('order');


                                // contact DESIGN ROUTE //
route::get('contact_us',[ContactUsController::class,'index'])->name('contact_us');
route::post('contact_us/create',[ContactUsController::class,'store'])->name('contact_us.store');

                                 // Wishlist ROUTE //
route::post("wishlist",[WishlistController::class,'store'])->name('wishlist.store');
route::get("wishlist/show",[WishlistController::class,'show'])->name('wishlist.show')->middleware('AuthFrontEnd');

                                 // register DESIGN ROUTE //
 route::post('register',[RegisterController::class,'store'])->name('register.store');
route::get('register/create',[RegisterController::class,'create'])->name('create');

                                // LOGIN DESIGN ROUTE //
route::get('login',[DesignLoginController::class,'index'])->name('login');
route::post('login/cheak',[DesignLoginController::class,'cheak'])->name('login.cheak');
route::get('login/cheak',[DesignLoginController::class,'logout'])->name('logout.cheak');
route::get('detailsproduct/{id}',[DetailsProductController::class,'detailsproduct'])->name('detailsproduct');

                                 // ADD TO CARD ROUTE //

Route::group(['prefix'=>'cart'],function(){

    route::post('add_to_cart',[AddToCartController::class,'addtocart'])->name('addtocart');
    route::post("delelt_item",[AddToCartController::class,'delete_item'])->name('delete_item');
    route::get('showcart',[ShowCartController::class,'showcart'])->name('showcart');

});


                                  // Check Out ROUTE //


route::get('checkout',[CheckOutController::class,'create'])->name('checkout');
route::post('checkout/create',[CheckOutController::class,'store'])->name('checkout.create');


// route::get('orders/{order}/payment',[PaymentController::class,'create'])->name('payment.create');
// route::post('orders/{order}/PaymentIntents',[PaymentController::class,'create'])->name('payment.PaymentIntents');
// route::get('orders/{order}/paystripe',[PaymentController::class,'confirm'])
// ->name('stripe.return');

                                 // PYMENT  ROUTE //
route::get('stripe/{order}',[StripeController::class,'pay'])->name('stripe');
route::get('stripe/show',[StripeController::class,'show'])->name('stripe.show');
route::get('stripe/success',[StripeController::class,'show'])->name('stripe.sucssess');


// route::post('cupon',[CuponController::class ,'index'])->name('cupon');

                                  // CUPONE  ROUTE //
Route::post('cupon/code',[CuponCodeController::class,'index'])->name('cupon.code');




 });

