@extends('AdminBanal.layout.layout')

@section('titel','All Admins')

@section('content')

<table class="table table-dark  table-hover">

    <div class="text text-center text-primary">
        @if (session()->get('sucses') !=null )
        <h1>{{session()->get('sucses')}}</h1>
        @endif

    </div>
<thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>status</th>
        <th>gender</th>
        <th>image</th>
        <th>operation</th>
    </tr>
</thead>
    @foreach ($data as $datas )
    <tbody>
        <tr>
            <td>{{$loop->iteration }}</td>
            <td>{{$datas->name}}</td>
            <td>{{$datas->email}}</td>
            <td>{{$datas->phone}}</td>
            <td>{{$datas->status == 0 ? 'admin' :"user"}}</td>
            <td>{{$datas->gender == 0 ? "male" :'female'}}</td>
            {{-- <td><img style="width: 100px;height'100px'" src='{{asset("dist/img/Admin image/$request->image}}")}}' alt=""></td> --}}
            <td><img style="width: 100px;height:100px" src=' @if ($datas->image == null)
                {{asset('dist/img/Admin image/images.png')}}
                @else
                {{asset("dist/img/Admin image/$datas->image")}}
            @endif    '></td>

            <td style="display: flex">
                <a class="btn btn-primary" href="{{route('admin.edit',$datas->id)}}">Edit</a>

                <form  action="{{route('admin.destroy',$datas->id)}}" method="post">
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
                             are you sure delete this admin {{$datas->name}} ?
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
