<!-- header start -->
<header>
    <div class="headerDetails">
        <a class="headerFeedback" href="{{url('/register') }}"><span class="register">Register</span></a>
        @if(Session::has('email'))
        <a class="headerLogin" href="{{url('/logout') }}"><span class="login">Logout</span></a>
        @else
        <a class="headerLogin" href="{{url('/login') }}"><span class="login">Login</span></a>
        @endif
    </div>
    <div class="largeLogo">
        <p oncopy="event.returnValue=false;" ondragstart="window.event.returnValue=false"
           oncontextmenu="window.event.returnValue=false" onselectstart="event.returnValue=false">ITS Service</p>
    </div>
    @include("shared.nav")
</header>
<!-- header end -->