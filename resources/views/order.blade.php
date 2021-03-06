


@extends('layouts.main')

@push('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


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
                            <h4 class="card-title ">All Order</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>
                                         id
                                    </th>
                                    <th>
                                        Item Name
                                    </th>
                                    <th>
                                        quantity
                                    </th>
                                    <th>
                                        price
                                    </th>


                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order )

                                        @foreach($details as $key=>$detail )
                                            @if($order->id==$detail->order->id)

                                                <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$detail->item->name}}</td>
                                            <td>{{$detail->qty}}</td>
                                            <td>{{$detail->total}}</td>
@endif

                                        </tr>
                                    @endforeach
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
