


@extends('layouts.app')

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
                                        order id
                                    </th>
                                    <th>
                                        user name
                                    </th>
                                    <th>
                                        address
                                    </th>
                                    <th>
                                        phone
                                    </th>
                                    <th>
                                        Payment method
                                    </th>
                                    <th colspan="3">
                                        Order Detail

                                        {{--                                <td>--}}
                                        ==>>  Item Name
                                        {{--                                </td>--}}
                                        {{--                                <td>--}}
                                        ||  quantity
                                        {{--                                </td>--}}
                                        {{--                                <td>--}}
                                        || price
                                        {{--                                </td>--}}
                                    </th>
                                    {{--                                <th>--}}
                                    {{--                                    Item Name--}}
                                    {{--                                </th>--}}
                                    {{--                                <th>--}}
                                    {{--                                    quantity--}}
                                    {{--                                </th>--}}
                                    {{--                                <th>--}}
                                    {{--                                    price--}}
                                    {{--                                </th>--}}

                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=>$order )
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>@if($order->status == true)

                                                    <span class="label label-info">Delivery</span>
                                                @else
                                                    <span class="label label-danger ">credit card</span>
                                                @endif
                                            </td>
                                            {{--                                {{dd($orders)}}--}}
                                            @foreach($details as $key=>$detail )
                                                @if($order->id==$detail->order->id)

                                                    <td>
                                                        {{--                                    <td>{{$key + 1}}</td>--}}
                                                        {{--                                   {{$order->order->id}}--}}
                                                        {{$detail->item->name}}
                                                        || {{$detail->qty}}
                                                        || {{$detail->total}}



                                                    </td>
                                                @endif

                                            @endforeach
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
