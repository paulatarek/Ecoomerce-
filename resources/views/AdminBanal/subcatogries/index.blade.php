@extends('AdminBanal.layout.layout')
@section('titel','Subcatogries')

@section('content')

<table class="table table-dark table-hovered">
    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>status</td>
            <td>image</td>
            <td>catogry</td>
            <td>operation</td>
        </tr>
    </thead>
   @foreach ($indexdata as $indexdatas )
   <tbody>
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$indexdatas->name}}</td>
        <td class="text text-primary">{{$indexdatas->status == 0 ? "active" :'noneactive'}}</td>
        <td><img width="100px;height:100px" src="{{asset("/dist/img/Admin image/$indexdatas->image")}}" alt=""></td>
        <td>{{$indexdatas->catogry->name}}</td>
        <td style="display:flex;">
            <a class="btn btn-primary" href="{{route('subcatogry.edit',$indexdatas->id)}}">Edite</a>
            <form  action="{{route('subcatogry.destroy',$indexdatas->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$indexdatas->id}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$indexdatas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-dark">
                         are you sure delete this subcatogry {{$indexdatas->name}} ?
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
