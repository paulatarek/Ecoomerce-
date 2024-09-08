@extends('AdminBanal.layout.layout')
@section('titel','Edite Product')

@section('content')

<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
    <div class="card-body">


        <div class="form-group">

            <label for="exampleInputEmail1">Nmae </label>
            <input value="{{$product->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            @error('name')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>


        <div class="form-group">

            <label for="exampleInputEmail1">Describtion </label>
            <input value="{{$product->desc}}" type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Describtion">
            @error('desc')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Price </label>
            <input value="{{$product->price}}" type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
            @error('price')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Quantity </label>
            <input value="{{$product->qty}}" type="number" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity">
            @error('qty')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

        <div class="form-group">
            <label for="exampleInputGender">status</label>
            <select name="status" class="form-control" namegender id="exampleInputGender">
                <option @selected(0 == $product->status ) value="0">Active</option>
                <option  @selected(1 == $product->status )  value="1">Inactive</option>
            </select>

      </div>
      <div class="form-group">
        <label for="exampleInputGender">Subcatogry</label>
        <select name="subcatogry_id" class="form-control" namegender id="exampleInputGender">
            @foreach ($subcatogry as $subcatogries )
            <option @selected($subcatogries->id == $product->subcatogry_id ) value="{{$subcatogries->id}}">{{$subcatogries->name}}</option>

            @endforeach
        </select>

  </div>
  <div class="form-group">
    <label for="exampleInputGender">Brand</label>
    <select name="brand_id" class="form-control" namegender id="exampleInputGender">
        @foreach ($brand as $brands )
        <option @selected($brands->id == $product->brand_id  ) value="{{$brands->id}}">{{$brands->name}}</option>

        @endforeach
    </select>

</div>
      <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <div class="input-group">
          <div class="custom-file">
            <input name="image[]" multiple  type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>

          </div>

        </div>
      </div>
      <div>
        @error('image')
        <h6 class="text text-danger">{{$message}}</h6>
        @enderror

        @error('image.*')
        <h6 class="text text-danger">{{$errors->first('image.*')}}</h6>
        @enderror
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
