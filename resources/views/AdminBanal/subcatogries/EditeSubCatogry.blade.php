@extends('AdminBanal.layout.layout')
@section('titel','All Subcatogry')

@section('content')

<form action="{{route('subcatogry.update',$subcatogry->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('Put')
    <div class="card-body">


        <div class="form-group">

            <label for="exampleInputEmail1">Nmae </label>
            <input value="{{$subcatogry->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            @error('name')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>




      <div class="form-group">
        <label for="exampleInputGender">status</label>
        <select  name="status" class="form-control" namegender id="exampleInputGender">
            <option  {{$subcatogry->status == 0 ? "selected" : ''}}  value="0">Active</option>
            <option  {{$subcatogry->status == 1 ? "selected" : ''}}  value="1">Not Active</option>
        </select>

        <div class="form-group">
            <label for="exampleInputGender">catogry</label>
            <select name="catogry" class="form-control" namegender id="exampleInputGender">
                @foreach ( $data as $datas )
                <option {{$subcatogry->catogry_id == $datas->id ? "selected" : '' }}  value="{{$datas->id}}">{{$datas->name}}</option>

                @endforeach

            </select>

      </div>
      <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <div class="input-group">
          <div class="custom-file">
            <input name="image"  type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      </div>
    </div>

    <div>
      @error('image')
      <h6 class="text text-danger">{{$message}}</h6>
      @enderror
    </div>

  </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

@endsection
