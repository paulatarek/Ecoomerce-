<?php

namespace App\Http\Controllers\dashboard;
use App\Models\Spec;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\subcategory;
use App\Traits\UplodePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProductRequest;
use App\Models\Offer;

// use Illuminate\Contracts\Auth\Access\Gate;

// use App\Traits\uploadphoto;

class ProductController extends Controller
{
    use UplodePhoto;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->authorizeResource(Product::class);
    }

    public function index()
    {
    //  dd(Auth::guard('admin')->user());
        // $this->authorize('is_admin');

        //  Auth::guard('admin')->user()->can('is_admin');
        // Gate::authorize('is_admin');





        $data = Product::all();
        return view('AdminBanal.produc.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $subcatogry = subcategory::all();
        $brand = Brand::all();
        $offer = Offer::all();
        return view('AdminBanal.produc.createproduct',compact('subcatogry','brand','offer'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd( $request->all());
        $offer = Offer::find($request->offer);
        // dd($offer);
     foreach($request->image as $files)
    {
      $newphotoname =   md5(uniqid()) . '.' . $files->extension() ;
      $imgarr[] = $newphotoname;
      $files->move(public_path("dist/img/product image"),$newphotoname);
    }
// dd($request->all());
   $product =   Product::create([
        'name' => $request->name,
        'desc' => $request->desc,
        'price' => $request->price,
        'code' =>uniqid(),
        'qty' => $request->qty,
        'color' => $request->color,
        'size' => $request->size,
        'status' => $request->status,
        'subcatogry_id' => $request->subcatogry_id,
        'brand_id' => $request->brand_id,
        'image' => implode('+',$imgarr),
    ]);

    $spec1 = Spec::find(2);
    $spec2 = Spec::find(4);


 $product->specs()->attach([
    $spec1->id => ['value' => $request->color],
    $spec2->id => ['value' => $request->size],
 ]);


 if($request->offer)
 {

     $product->offers()->attach($request->offer,([
        'price_after_offer' =>  $request->price -  ( $offer['discount'] / $request->price * 100 )
     ]));
 }


    return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $subcatogry = subcategory::all();
        $brand = Brand::all();
       return view('AdminBanal.produc.editeproduct',compact('product','subcatogry','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {


        $oldphotoname =  DB::table('products')->select('image')->where('id',$product->id)->first();

        // $path = public_path("puplic/dist/img/product image/");
        // if(file_exists($path.$oldphotoname)){
        //     unlink($path.$oldphotoname);
        // }
        if($request->has('image'))
        {
            foreach($request->image as $files)
            {
              $newphotoname =   md5(uniqid()) . '.' . $files->extension() ;
              $imgarr[] = $newphotoname;
              $files->move(public_path("dist/img/product image"),$newphotoname);


            }
            $photoname =implode('+',$imgarr);
            $product->name = $request->name;
            $product->desc = $request->desc;
            $product->status = $request->status;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->subcatogry_id = $request->subcatogry_id;
            $product->brand_id = $request->brand_id;
            $product->image = $photoname;
            // $product->offer = $request->offer;
            $product->save();
        }

        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->subcatogry_id = $request->subcatogry_id;
        // $product->offer = $request->offer;
        $product->brand_id = $request->brand_id;

        $product->save();
        return redirect()->route('product.index');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
