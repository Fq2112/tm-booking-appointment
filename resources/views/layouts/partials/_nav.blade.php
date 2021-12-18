<ul class="one-page-menu menu-container" data-easing="easeInOutExpo" data-speed="700"
    data-offset="0">
    @if(request()->is('/'))
    <li class="menu-item current"><a class="menu-link" href="#" data-href="#wrapper">
            <div>Home</div>
        </a></li>
    <li class="menu-item"><a class="menu-link" href="#" data-href="#section-specialists">
            <div>Specialists</div>
        </a></li>
    <li class="menu-item"><a class="menu-link" href="#" data-href="#section-doctors">
            <div>Doctors</div>
        </a></li>
    @endif
    <li class="menu-item">
        <a class="button button-small button-circle button-blue"
           href="{{route('find-doctor')}}"><div><i class="icon-calendar-alt"></i>Booking</div>
        </a>
    </li>
    @auth
        <li class="menu-item sub-menu">
            <a class="button button-small button-circle button-green text-end" href="#">
                <div>
                    <img src="{{asset('images/avatar/'.rand(1,5).'.png')}}" alt="Ava" class="img-circle img-fluid me-1" width="22">
                    {{\Illuminate\Support\Str::words(Auth::user()->name,1,'')}}<i class="icon-angle-down1"></i>
                </div>
            </a>
            <ul class="sub-menu-container">
                <li class="menu-item">
                    <a class="menu-link" href="{{route('booking-list')}}">
                        <div><i class="icon-history me-2"></i>Booking List</div></a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link btn_signOut">
                        <div><i class="icon-sign-out-alt"></i>Sign Out</div>
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>
                </li>
            </ul>
        </li>
    @else
        <li class="menu-item">
            <a class="button button-small button-circle button-green text-end" href="#"
               data-bs-toggle="modal" data-bs-target="#loginModal"><div>Sign Up/In<i class="icon-sign-in-alt"></i></div>
            </a>
        </li>
    @endauth
</ul>
