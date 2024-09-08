<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Admin;

// use App\Models\Admin\dashboard;
use APP\traits\media;
use App\Traits\UplodePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class AdminController extends Controller
{

    use UplodePhoto;



    // public function uploudephoto($image ,$folder)
    // {




    // $photoname = uniqid() . '.' . $image->extension() ;

    // $image->move(public_path("dist/img/$folder"),$photoname);

    // return    $photoname ;

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $data = Admin::all();

     return view('AdminBanal.admin',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminBanal.registeradmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

        if($request->image ){

            $photoname = $this->uploudephoto( $request->image, 'Admin image');
            $insert = Admin::create([

                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> $request->password,
                'phone'=> $request->phone,
                'status'=> $request->status,
                'gender'=> $request->gender,
                'image'=> $photoname,

            ]);
        }else{
            $insert = Admin::create([

                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
                'phone'=> $request->phone,
                'status'=> $request->status,
                'gender'=> $request->gender,


            ]);
        }

return redirect()->route('admin.index')->with('sucses','Add done');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        return view('AdminBanal.EditeAdmin',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        //
        // dd($admin);
        $oldanamephoto = DB::table('admins')->select('image')->where('id',$admin->id)->first()->image;
        $path = public_path("puplic/dist/img/Admin image/");
        if(file_exists($path.$oldanamephoto)){
            unlink($path.$oldanamephoto);
        }
        // dd($oldanamephoto );
        if($request->has('image')){
            $photoname = $this->uploudephoto( $request->image, 'Admin image');
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password) ;
            $admin->phone = $request->phone;
            $admin->status = $request->status;
            $admin->gender = $request->gender;
            $admin->image = $photoname;

            $admin->save();
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password =  Hash::make($request->password);
        $admin->phone = $request->phone;
        $admin->status = $request->status;
        $admin->gender = $request->gender;

        $admin->save();


    return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        $admin->delete();

        return redirect()->back();
    }
}
