


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
                            <h4 class="card-title ">Add new Category</h4>

                        </div>
                        <div class="card-body">
                            <form  method="post" action="{{route('Category.store')}}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">Description</label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                </div>
                                <a href="{{route('Category.index')}}" class="btn btn-danger">Back</a>
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
