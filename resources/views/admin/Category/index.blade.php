


@extends('layouts.app')

@push('css')

   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{route('Category.create')}}" class="btn btn-info">Add new Category</a>

                    @if(session('successMsg'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('successMsg')}}</span>
                    </div>
                    @endif

                    @if(session('existsMsg'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('existsMsg')}}</span>
                        </div>
                    @endif



                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Categroy</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($Categorios as $key=>$Category )
                                        <tr>
                                            <td>{{$key + 1}}</td>

                                            <td>{{$Category->name}}</td>
                                            <td>{{$Category->description}}</td>
                                            <td>{{$Category->created_at}}</td>
                                            <td>{{$Category->updated_at}}</td>
                                            <td><a href=" {{route('Category.edit',$Category->id)}}"
                                                   class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>


                                                <form id="delete-form-{{ $Category->id }}" action="{{ route('Category.destroy',$Category->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $Category->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>


                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection

@push('scripts')
  <script>
      $(document).ready(function() {
          $('#table1').DataTable();
      } );

  </script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    @endpush
