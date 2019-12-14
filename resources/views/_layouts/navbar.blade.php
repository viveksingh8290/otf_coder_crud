    <header id="home">
        <div class="main-navigation">
            <div class="container">
                <div class="row">
                    <!-- logo-area-->
                    <div class="col-xl-2 col-lg-3 col-md-3">
                        <div class="logo-area">
                            <a href="{{ url('home') }}"><img src="{{ 'img/logo.png' }}" alt="enventer"></a>
                        </div>
                    </div>
                    <!-- mainmenu-area-->
                    <div class="col-xl-10 col-lg-9 col-md-9">
                        <div class="main-menu f-right">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a class="current" href="{{ url('home') }}">home</a>
                                    </li>
                                    <?php if(Auth::check() === false) { ?>
                                       <li>
                                        <a href="{{ url('login') }}">login</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('register') }}">register</a>
                                        </li>
                                    <?php } ?>                                    
                                    <!-- dropdown menu-area-->
                                    <?php if(Auth::check()) { ?>
                                       <li>
                                            <a href="#" onclick="return false">
                                            <?php echo strlen(Auth::user()->first_name) > 15 ? substr(Auth::user()->first_name, 0, 15).'..' : Auth::user()->first_name; ?>
                                             <i class="fas fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown">
                                                <li><a href="{{ url('my-profile') }}">My Profile</a></li>
                                                <li><a href="{{ url('users-list') }}">Users List</a></li>
                                                <?php
                                                if(Auth::user()->role == '1'){ ?>
                                                    <li><a href="#.">Admin Area</a></li>
                                                <?php } ?>                                               
                                                <li><a href="{{ url('logout') }}">Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php } ?>                                     
                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu-->
                        <div class="mobile-menu"></div>
                        <!--Search-->
                        <!-- <div class="search-box-area">
                            <div id="search" class="fade">
                                <a href="#" class="close-btn" id="close-search">
                                    <em class="fa fa-times"></em>
                                </a>
                                <input placeholder="what are you looking for?" id="searchbox" type="search" />
                            </div>
                            <div class="search-icon-area">
                                <a href='#search'>
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </header>