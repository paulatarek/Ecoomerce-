@extends('AdminBanal.layout.layout')

@section('titel','All Catogry')
@section('content')

<table class="table table-dark table-bordered table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>status</th>
            <th>operation</th>


        </tr>
    </thead>

    @foreach ($catogrydata as $catogrydatas)

    <tbody>
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$catogrydatas->name}}</td>
            <td>active</td>
            <td>
                <a class="btn btn-primary" href="{{route('catogry.edit',$catogrydatas->id)}}">Edite</a>
            </td>
            <td>
                <form  action="{{route('catogry.destroy',$catogrydatas->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$catogrydatas->id}}">
                        delete
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$catogrydatas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-dark">
                             are you sure delete this catogry {{$catogrydatas->name}} ?
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
