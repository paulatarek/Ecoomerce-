<?php

namespace App\Http\Controllers;

use App\Models\catogry;
use Illuminate\Http\Request;
use App\Http\Requests\SubcatogryRequest;
use App\Models\subcategory;
use App\Traits\UplodePhoto;
use Illuminate\Support\Facades\DB;

class SubcatogriesController extends Controller
{
    use UplodePhoto ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $indexdata = subcategory::all();

        return view('AdminBanal.subcatogries.index',compact('indexdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = catogry::all();

        return view('AdminBanal.subcatogries.createsubcatogries',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcatogryRequest $request)
    {
        //

        $photoname = $this->imageupload( $request->image, 'Admin image');

        subcategory::create([
            'name'=>$request->name,
            'status'=>$request->status,
            'catogry_id'=>$request->catogry,
            'image'=>$photoname,
        ]);
        return redirect()->route('subcatogry.index');

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
    public function edit(subcategory $subcatogry)
    {
        //

        // dd( $subcatogry);

        $data = catogry::all();

        return view('AdminBanal.subcatogries.EditeSubCatogry',compact('subcatogry','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcatogryRequest $request,subcategory $subcatogry )
    {

        $oldphot =DB::table('subcategories')->select('image')->where('id',$subcatogry->id)->first()->image;

        $path = public_path("puplic/dist/img/Admin image/");
        if(file_exists($path.$oldphot ))
        {
            unlink($path.$oldphot );
        }

        if($request->has('image'))
        {
            $photoname = $this->uploudephoto( $request->image, 'Admin image');
            $subcatogry->name = $request->name;
            $subcatogry->status = $request->status;
            $subcatogry->catogry_id = $request->catogry;
            $subcatogry->image = $photoname;

            $subcatogry->save();
        }

        $subcatogry->name = $request->name;
        $subcatogry->status = $request->status;
        $subcatogry->catogry_id = $request->catogry;


        $subcatogry->save();

        return redirect()->route('subcatogry.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(subcategory $subcatogry)
    {
        $oldphot =DB::table('subcategories')->select('image')->where('id',$subcatogry->id)->first()->image;

        $path = public_path("puplic/dist/img/Admin image/");
        $delete =  $subcatogry->delete();

        if(file_exists($path.$oldphot ))
        {
            unlink($path.$oldphot );
        }


    }
}
