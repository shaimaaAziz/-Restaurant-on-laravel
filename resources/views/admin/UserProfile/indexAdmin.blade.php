        @extends('layouts.app')
        @push('css')

        @endpush

        @section('content')

        <div class="content">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Admin Profile</h4>

              </div>
             <div class="card-body">
                 @foreach($admins as $item)

                         <dt>
                             Name
                         </dt>
                         <dd>
                             {{$item->name}}
                         </dd>

                         <dt >
                             Email
                         </dt>
                         <dd>
                             {{$item->email}}
                         </dd>
                         <dt>
                             Image
                         </dt>

                         <dd>
                             <img src =" {{asset('images/' . $item->image)}}" height="100" width="150"/>
                         </dd>
                     @endforeach




            <a href="{{route('dashboard.index')}}" class="btn btn-danger">Back</a>
            <a href="{{route('userProfile.edit',$item->id)}}" class="btn btn-primary">Edit</a>
             </div>
        </div>
        </div>
        </div>
        @endsection

        @push('scripts')

        @endpush
