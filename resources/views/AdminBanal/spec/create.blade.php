@extends('AdminBanal.layout.layout')

@section('titel','Create Catgry')

@section('content')

<form action="{{route('spec.store')}}" method="post" >
    @csrf
<div class="card-body">
  <div class="form-group">

                <label for="exampleInputEmail1">Spec Name </label>
                <input value="{{old('Spec')}}" type="text" name="Spec" class="form-control" id="exampleInputEmail1" placeholder="Spec Name">
                @error('Spec')
                <h6 class="text text-danger">{{$message}}</h6>
                @enderror
              </div>








        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

@endsection
