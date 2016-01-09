<nav class="navbar navbar-default navbar-static-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-i9t" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">I9T</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-i9t">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li><a href="{{ route('home') }}">Timeline</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->getNameOrStudentID() }}&nbsp;&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-child"></i>&nbsp;&nbsp;Profile</a></li>
                            <li><a href="#"><i class="fa fa-pencil"></i>&nbsp;Write a post</a></li>
                            <li><a href="#"><i class="fa fa-cogs"></i>&nbsp;Settings</a></li>
                            <li role="serarator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;My Posts</a></li>
                            <li><a href="#"><i class="fa fa-edit"></i>&nbsp;&nbsp;Manage Posts</a></li>
                        </ul>
                    </li>
                    <li><p class="navbar-btn"><a href="{{ route('auth.signout') }}" class="btn btn-primary">Sign out</a>&nbsp;&nbsp;&nbsp;</p></li>
                @else
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><p class="navbar-btn"><a href="{{ route('auth.signin') }}" class="btn btn-primary">Sign in</a>&nbsp;&nbsp;&nbsp;</p></li>
                    <li><p class="navbar-btn"><a href="{{ route('auth.signup') }}" class="btn btn-primary">Sign up</a>&nbsp;&nbsp;&nbsp;</p></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
