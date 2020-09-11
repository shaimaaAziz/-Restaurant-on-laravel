



@extends('layouts.app')
@push('css')

@endpush


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)

                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span><b> Danger - </b> {{ $error }}</span>
                            </div>
                        @endforeach
                </div>
                @endif

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Admin Profile</h4>

                    </div>
                    <div class="card-body">
                        <form  method="post" action="{{route('userProfile.update',$admin->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$admin->name}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$admin->email}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Password</label>
                                    <input type="text" class="form-control" name="password" value="">
                                </div>
                            </div>
                           <br> <div class="col-md-12">

                                    <label class="control-label">Image</label>
                                    <input type="file" name="featured_image" accept="image">

                                </div><br>

                            <a href="{{route('userProfile.index')}}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection

@push('scripts')

@endpush
