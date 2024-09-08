@extends('AdminBanal.layout.layout')

@section('titel','Create Brand')

@section('content')

<form action="{{route('brand.update',$Brand->id)}}" method="post" >
    @csrf
    @method('put')
<div class="card-body">
  <div class="form-group">

                <label for="exampleInputEmail1">Brand Name </label>
                <input value="{{$Brand->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Brand Name">
                @error('name')
                <h6 class="text text-danger">{{$message}}</h6>
                @enderror
              </div>



          <div class="form-group">
            <label for="exampleInputGender">Status</label>
            <select  name="Status" class="form-control" namegender id="exampleInputGender">
                <option {{$Brand->status == 0 ? "selected" : ''}} value="0">Active</option>
                <option {{$Brand->status == 1 ? "selected" : ''}} value="1">None Active</option>
            </select>




        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

@endsection
