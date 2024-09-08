@extends('AdminBanal.layout.layout');

@section('titel','All Brands')

@section('content')

<table class="table table-dark  table-hover">
    <thead>
        <th >id</th>
        <th >name</th>
        <th >status</th>
        <th >operation</th>
    </thead>
    @foreach ($data as $datas )
    <tbody>
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->name}}</td>
            <td>{{$datas->status == 0 ? 'Active' :'Not Active'}}</td>
            <td style=" display: flex;
            justify-content: space-around;">
                <a class="btn btn-primary" href="{{route('brand.edit',$datas->id)}}">Edite</a>

                <form  action="{{route('brand.destroy',$datas->id)}}" method="post">
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
                             are you sure delete this brand {{$datas->name}} ?
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
