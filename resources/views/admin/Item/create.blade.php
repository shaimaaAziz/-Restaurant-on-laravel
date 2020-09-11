


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
                        <h4 class="card-title ">Add new Item</h4>

                    </div>
                    <div class="card-body">
                        <form  method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Category</label>

                                    <select class="form-control" name="category">
                                        @foreach($Categorios as $Category)
                                            <option value="{{$Category->id}}">{{$Category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Price</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br >
                                    <label class="control-label">Image</label>
                                    <input type="file" name="featured_image" accept="image">
                                <br>
                            </div>
                            <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
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
