@extends('AdminBanal.layout.layout')

@section('content')

<form action="{{route('admin.update',$admin->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
        <div class="card-body">


            <div class="form-group">

                <label for="exampleInputEmail1">Nmae </label>
                <input value="{{$admin->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                @error('name')
                <h6 class="text text-danger">{{$message}}</h6>
                @enderror
              </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="{{$admin->email}}" type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            @error('email')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            @error('password')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input value="{{$admin->phone}}" type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone">
            @error('phone')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputGender">gender</label>
            <select  name="gender" class="form-control" namegender id="exampleInputGender">
                <option  {{$admin->gender == 0 ? 'selected' : ''}} value="0">male</option>
                <option  {{$admin->gender == 1 ? 'selected' : ''}} value="1">female</option>
            </select>

            <div class="form-group">
                <label for="exampleInputGender">status</label>
                <select name="status" class="form-control" namegender id="exampleInputGender">
                    <option {{$admin->status == 0 ? 'selected' : ''}} value="0">Admin</option>
                    <option {{$admin->status == 1 ? 'selected' : ''}}  value="1">User</option>
                </select>

          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input name="image"  type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                @error('image')
                <h6 class="text text-danger">{{$message}}</h6>
                @enderror
              </div>

            </div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

@endsection


