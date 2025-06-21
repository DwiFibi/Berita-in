    <!-- ====== start navbar-container ====== -->
    <div class="navbar-container">
        <div class="container">


            <!-- ====== start navbar ====== -->
            <nav class="navbar navbar-expand-lg navbar-light style-6">
                <div class="container p-0">
                    <div class="mob-nav-toggles d-flex align-items-center justify-content-between">
                        <a href="/" class="logo-brand my-4"
                            style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                            <img src="{{ asset('img/logoBeritain.png') }}" alt="Logo" style="height: 40px;">
                            <span style="font-size: 20px; font-weight: bold; color: #ea3f3f;">Berita'in</span>
                        </a>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-shrink-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}#trending">Trending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}#featured">Featured</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}#latest">Latest</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}#authors">Authors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                    Categories
                                </a>
                            </li>

                        </ul>
                        <div class="side-navbar">
                            <div class="row text-lg-end align-items-center">
                                <div class="col-3 ps-0">
                                    <div class="sub-darkLight me-3">
                                        <div class="darkLight-btn">
                                            <span class="icon active" id="light-icon">
                                                <span class="material-symbols-outlined">light_mode</span>
                                            </span>
                                            <span class="icon" id="dark-icon">
                                                <span class="material-symbols-outlined">dark_mode</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Search Placeholder -->
                        <div class="search-placeholder">
                            <form action="" method="GET">
                                <input type="text" name="q" class="form-control form-control-sm"
                                    placeholder="Cari Berita...">
                            </form>
                        </div>
                    </div>
            </nav>

            <!-- ====== start nav-search ====== -->
            <div class="nav-search-style2">
                <div class="row justify-content-center align-items-center gx-lg-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <h5> you can search by category <br> or news title </h5>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="form">
                            <span class="color-777 fst-italic text-capitalize mb-2 fsz-13px">Enter Keyword</span>
                            <div class="form-group">
                                <span class="icon">
                                    <i class="la la-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Elon Musk ... ">
                                <button type="submit">search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ====== end nav-search ====== -->

        </div>
    </div>
