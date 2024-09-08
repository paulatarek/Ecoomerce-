@extends('AdminBanal.layout.layout')

@section('titel','Create Catgry')

@section('content')

<form action="{{route('catogry.store')}}" method="post" >
    @csrf
<div class="card-body">
  <div class="form-group">

                <label for="exampleInputEmail1">Catogry Name </label>
                <input value="{{old('catogry_name')}}" type="text" name="catogry_name" class="form-control" id="exampleInputEmail1" placeholder="Catogry Name">
                @error('catogry_name')
                <h6 class="text text-danger">{{$message}}</h6>
                @enderror
              </div>



          <div class="form-group">
            <label for="exampleInputGender">Status</label>
            <select  name="Status" class="form-control" namegender id="exampleInputGender">
                <option value="0">Active</option>
                <option value="1">None Active</option>
            </select>




        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

@endsection
