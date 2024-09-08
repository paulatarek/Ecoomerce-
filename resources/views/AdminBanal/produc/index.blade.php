@extends('AdminBanal.layout.layout')
@section('titel','All Products')

@section('content')
<table class="table table-dark  table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>status</th>
            <th>price</th>
            <th>qty</th>
            <th>desc</th>
            <th>cod</th>
            <th>image</th>
            <th>brand</th>
            <th>operation</th>
            {{-- <th>operation</th> --}}
        </tr>
    </thead>
    @foreach ($data as $datas )
    <tbody>
        @php $image = explode('+',$datas->image); @endphp
        <tr>



            <td>{{$loop->iteration}}</td>


            <td>{{$datas->name}}</td>
            <td>{{$datas->status == 0 ? "Active" :'Inactive'}}</td>
            <td>{{$datas->price}}</td>
            <td>{{$datas->qty}}</td>
            <td>{{\Str::limit($datas->desc,50)}}</td>
            <td>{{$datas->code}}</td>

            <td> @foreach ($image as $images) <img style="width: 100px" src="{{asset("dist/img/product image/$images")}}" alt="">  @endforeach </td>

            <td>{{$datas->brand->name}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('product.edit',$datas->id)}}">Edite</a>
            </td>
            <td>
                <form  action="{{route('product.destroy',$datas->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$datas->id}}">
                        delete
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-dark">
                             are you sure delete this product {{$datas->name}} ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button   type="submit" class="btn btn-primary">Delete</button>
                              {{-- <a  class="btn btn-primary" href="{{route('crud.destroy',$product->id)}}">Save changes</a> --}}
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
            </td>

        </tr>
    </tbody>
    @endforeach

</table>
@endsection
