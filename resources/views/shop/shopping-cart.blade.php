

@extends('layouts.main')

@push('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
    @if(Session::has('cart'))

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
                                <h4 class="card-title ">Cart</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            item
                                        </th>
                                        <th>
                                            quantity
                                        </th>
                                        <th>
                                            price
                                        </th>
                                        <th>
                                            modify
                                        </th>


                                        </thead>
                                        <tbody>
                                        @foreach($products as $key=>$product)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$product['item']['name']}}</td>
                                                {{--                                    <td>{{$order->order->user_id}}</td>--}}
                                                <td>{{$product['qty']}}</td>
                                                <td>{{$product['price']}}</td>
                                                {{--                                            <td>{{$order->total}}</td>--}}
                                                <td> <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('product.reduceByOne',['id'=>$product['item']['id']])}}">Reduce by 1</a> </li>
                                                            <li><a href="{{route('product.remove',['id'=>$product['item']['id']])}}">Delete</a> </li>

                                                        </ul>


                                                    </div></td>



                                            {{--                                        </tr>--}}























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
        <div class="row">
            <div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Tolal:{{$totalPrice}}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">

                <button type="button" class="btn btn-info btn-sm" ><a href="{{ route('checkout') }}"><i class="material-icons">Order By credit card</i>
                    </a> </button>


                    <form id="status-form" action="{{ route('ProductController.status') }}" style="display: none;" method="POST">
                        @csrf
                    </form>
                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you sure? You want to order this?')){
                            event.preventDefault();
                            document.getElementById('status-form').submit();
                            }else {
                            event.preventDefault();
                            }"><i class="material-icons">Order Now</i></button>
{{--                </a>--}}


            </div>
        </div>

    @else
        <div class="row">
            <div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No item in cart!</h2>
            </div>
        </div>
    @endif
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
