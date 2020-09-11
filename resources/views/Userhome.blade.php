@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <img src =" {{asset('images/' . $user->image)}}" height="140" width="150" style="float: left; -webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%; margin-right: 30px;" />
                </div>
                <div class="col-md-9 col-md-offset-1">

                    <h2>{{$user->name}}'s profile</h2>

                    <form method="post" action="/home" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group bmd-label-floating">
                            <label   class="control-label">Update Profile Image</label>
                            <br>
                            <input type="file" name="avatar" class="control-label" accept="image">
                            <input type="submit" class="pull-right  btn btn-sm btn-primary" ></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
