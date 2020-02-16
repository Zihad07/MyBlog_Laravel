<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">User</li>

            <li class="nav-item">
                <a href="{{route('userDashboard')}}" class="nav-link {{Route::currentRouteName()=='userDashboard'?'active':''}}">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="{{route('userComments')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='userComments'?'active':''}}">
                    <i class="icon icon-book-open"></i> Comments
                </a>
            </li>

            @if(auth()->user()->author == true)
                <li class="nav-title">Author</li>
                <li class="nav-item nav-dropdown">
                    <a href="{{route('authorDashboard')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='authorDashboard'?'active':''}}">
                        <i class="icon icon-speedometer"></i> Dashboard
                    </a>
                    <a href="{{route('authorPosts')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='authorPosts'?'active':''}}">
                        <i class="icon icon-paper-clip"></i> Posts
                    </a>
                    <a href="{{route('authorComments')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='authorComments'?'active':''}}">
                        <i class="icon icon-book-open"></i> Comments
                    </a>
                </li>
            @endif
            @if(auth()->user()->admin == true)
                <li class="nav-title">Admin</li>
                <li class="nav-item nav-dropdown">
                    <a href="{{route('adminDashboard')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='adminDashboard'?'active':''}}">
                        <i class="icon icon-speedometer"></i> Dashboard
                    </a>
                    <a href="{{route('adminPosts')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='adminPosts'?'active':''}}">
                        <i class="icon icon-paper-clip"></i> Posts
                    </a>
                    <a href="{{route('adminComments')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='adminComments'?'active':''}}">
                        <i class="icon icon-book-open"></i> Comments
                    </a>

                    <a href="{{route('adminUsers')}}" class="nav-link nav-dropdown {{Route::currentRouteName()=='userUsers'?'active':''}}">
                        <i class="icon icon-user"></i> Users
                    </a>
                </li>
            @endif

        </ul>
    </nav>
</div>
