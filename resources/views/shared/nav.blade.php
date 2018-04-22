<!-- nav start-->
<nav id="nav">
    <div id="navLogo" class="navLogo" style="display: none">
        <a oncopy="event.returnValue=false;" ondragstart="window.event.returnValue=false"
           oncontextmenu="window.event.returnValue=false" onselectstart="event.returnValue=false">ITS Service</a>
    </div>
    <div id="navDetails" class="headerDetails" style="display: none">
        <a class="headerFeedback" href="{{url('/register') }}"><span  class="register">Register</span></a>
        @if(Session::has('email'))
        <a class="headerLogin" href="{{url('/logout') }}"><span class="login">Logout</span></a>
        @else
        <a class="headerLogin" href="{{url('/login') }}"><span class="login">Login</span></a>
        @endif
    </div>
    <ul id="navList" class="navItemList">
        <li id="navItem1" class="navUnselected"><a href="{{ url('/') }}">HOME PAGE</a></li>
        <li id="navItem2" class="navUnselected"><a href="{{ url('/form') }}">SUBMIT TICKETS</a></li>

        @if(Session::get('admin')==1)
        <li id="navItem3" class="navUnselected"><a href="{{url('/manage') }}">MANAGE</a></li>
        @else
        <li id="navItem3" class="navUnselected"><a href="{{url('/view') }}">VIEW</a></li>
        @endif
    </ul>
</nav>
<!-- nav end-->