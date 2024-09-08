@extends('AdminBanal.layout.layout')

@section('titel','Contact')
@section('content')

<table class="table table-dark table-bordered table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>subject</th>
            <th>message</th>
            <th>email</th>
            <th>phone</th>
            <th>Delet</th>


        </tr>
    </thead>
@foreach ($data as $datas )

<tbody>
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$datas->name}}</td>
        <td>{{$datas->subject}}</td>
        <td>{{\Str::limit($datas->message,50)}}</td>
        <td>{{$datas->email}}</td>
        <td>{{$datas->phone}}</td>
        <td>
            <form  action="{{route('contact.destroy',$datas->id)}}" method="post">
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
                         are you sure delete this message  ?
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
