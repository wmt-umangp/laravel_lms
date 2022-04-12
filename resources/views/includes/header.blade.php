<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('dashboard')}}">Library Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-5">
                    <li class="nav-item me-4">
                        <a class="nav-link {{(request()->is('dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link {{(request()->is('books*')) ? 'active' : '' }}" href="{{route('showbooks')}}">Book</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link {{ (request()->is('authors*')) ? 'active' : '' }}" href="{{route('showauthors')}}">Author</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-4">
                                <img src="{{Auth::user()->profile_img_path}}" id="myimage" alt="" class="img-responsive rounded-circle" width='50' height='50'>
                            </div>
                            <div class="col-8">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->fname }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('account')}}">Account</a></li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
