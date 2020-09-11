

@extends('layouts.app')

@section('title','user')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header card-header-primary" >
                            <h4 class="card-title">User Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <span style="font-weight: bold;">Name: </span>{{ $user->name }}<br>
                                    <span style="font-weight: bold;">Email: </span>{{ $user->email }} <br>
                                    <span style="font-weight: bold;">Phone: </span>{{ $user->phone }}<br>
                                    <span style="font-weight: bold;">Address: </span>{{ $user->address }}<br>
                                    {{--<form method="post" action="{{route('user.store',$user->id)}}">--}}
                                        {{--@csrf--}}
                                        {{--@method('put')--}}

                                        {{--<span style="font-weight: bold;" >Roles:</span>--}}

                                        {{--<select class="form-control" name="role">--}}
                                            {{--@foreach($roles as $item)--}}
                                                {{--<option value="{{$item->id}}">{{$item->name}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}


                                        <a href="{{ route('user.index') }}" class="btn m-3 btn-danger">Back</a>
                                        {{--<button type="submit" class="btn btn-primary">Save</button>--}}
                                        <div class="clearfix"></div>
                                    {{--</form>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
