<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatogryRequest;
use App\Models\catogry;

class CatogryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catogrydata = catogry::all();

       return  view('AdminBanal.catogry.indxe',compact('catogrydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('AdminBanal.catogry.createcatogry');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatogryRequest $request)
    {
        //

        // dd($request->all());

        $data = catogry::create(
            [
              'name'=>  $request->catogry_name,
              'status'=>  $request->status
            ]
        );
        return redirect()->route('catogry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(catogry $catogry)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(catogry $catogry)
    {
        //
        // dd($catogry);
       return view('AdminBanal.catogry.updatecatogry',compact('catogry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatogryRequest $request, catogry $catogry)
    {
        $catogry->name = $request->catogry_name;

        $catogry->status = $request->status;
        $catogry->save();
        return redirect()->route('catogry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(catogry $catogry)
    {
        //
        $catogry->delete();

        return redirect()->back();

    }
}
