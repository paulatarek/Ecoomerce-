@extends('AdminBanal.layout.layout')
@section('titel','Create Product')

@section('content')

<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="card-body">


        <div class="form-group">

            <label for="exampleInputEmail1">Nmae </label>
            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            @error('name')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>


        <div class="form-group">

            <label for="exampleInputEmail1">Describtion </label>
            <input value="{{old('desc')}}" type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Describtion">
            @error('desc')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Size </label>
            <input value="{{old('size')}}" type="text" name="size" class="form-control" id="exampleInputEmail1" placeholder="Enter Size">
            @error('size')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Price </label>
            <input value="{{old('price')}}" type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
            @error('price')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Quantity </label>
            <input value="{{old('qty')}}" type="number" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity">
            @error('qty')
            <h6 class="text text-danger">{{$message}}</h6>
            @enderror
          </div>


          <div class="form-group">
            <label for="exampleInputGender">Offers</label>
            <select name="offer" class="form-control" namegender id="exampleInputGender">
                <option value="">None</option>
                @foreach ($offer as $offers )
                <option value="{{$offers->id}}">{{$offers->titel}}</option>
                @endforeach

            </select>

      </div>

        <div class="form-group">
            <label for="exampleInputGender">status</label>
            <select name="status" class="form-control" namegender id="exampleInputGender">
                <option @selected(0 == old('status')) value="0">Active</option>
                <option  @selected(1 == old('status'))  value="1">Inactive</option>
            </select>

      </div>

      <div class="form-group">
        <label for="exampleInputGender">Color</label>
        <select name="color" class="form-control" namegender id="exampleInputGender">
            <option @selected('Red' == old('color')) value="Red">Red</option>
            <option  @selected('Blue' == old('color'))  value="Blue">Blue</option>
            <option  @selected('Black' == old('color'))  value="Black">Black</option>
        </select>

  </div>


      <div class="form-group">
        <label for="exampleInputGender">Subcatogry</label>
        <select name="subcatogry_id" class="form-control" namegender id="exampleInputGender">
            @foreach ($subcatogry as $subcatogries )
            <option @selected($subcatogries->name == old('subcatogry_id')) value="{{$subcatogries->id}}">{{$subcatogries->name}}</option>

            @endforeach
        </select>

  </div>
  <div class="form-group">
    <label for="exampleInputGender">Brand</label>
    <select name="brand_id" class="form-control" namegender id="exampleInputGender">
        @foreach ($brand as $brands )
        <option @selected($brands->name == old('brand_id')) value="{{$brands->id}}">{{$brands->name}}</option>

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
