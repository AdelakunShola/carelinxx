<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
               
            </li>
          
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Jobs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.jobs') }}">All Jobs</a></li>
                    <li><a href="{{ route('add.job') }}">Add Jobs</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Applicants</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.applications') }}">All Applicants</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Payments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all_courses.html">All Payments</a></li>
                    <li><a href="add_courses.html">Edit Payment info</a></li>
                </ul>
            </li>
            
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all_library.html">All Users</a></li>
                </ul>
            </li>

             <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Payment Method</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.fees.payments') }}">All Payments Type</a></li>
                    <li><a href="{{ route('add.fees.payment') }}">Add Payment Type</a></li>
                </ul>
            </li>
           
            <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page_register.html">Register</a></li>
                    <li><a href="page_login.html">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="page_error_400.html">Error 400</a></li>
                            <li><a href="page_error_403.html">Error 403</a></li>
                            <li><a href="page_error_404.html">Error 404</a></li>
                            <li><a href="page_error_500.html">Error 500</a></li>
                            <li><a href="page_error_503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="page_lock_screen.html">Lock Screen</a></li>
                </ul>
            </li>
        </ul>


        <div class="copyright">
            <p>Edumin Saas Admin © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignLab</p>
        </div>
    </div>
</div>