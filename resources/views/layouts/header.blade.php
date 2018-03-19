<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
            <a class="navbar-brand" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Statistic
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <ul class="nav">
                    @foreach($info as $user_agent => $count)
                        <li>
                            <a href="javascript:void(0)">{{ $user_agent }}: <b>{{ $count }}</b></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('category.index') }}">Categories</a>
                </li>
                <li>
                    <a href="{{ route('post.index') }}">Posts</a>
                </li>
                <li>
                    <a href="{{ route('session.statistic') }}">Statistic</a>
                </li>
            </ul>
        </div>
    </div>
</nav>