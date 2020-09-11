<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
           <a class="navbar-brand" href="#pablo">Hello  Admin</a>  {{--  {{ Auth::user()->name }}--}}
        </div>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('logout') }}"  class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="material-icons">person</i><span>Logout</span>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                        @csrf
                    </form>


                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
