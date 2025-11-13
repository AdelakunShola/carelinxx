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
                    <i class="la la-users"></i>
                    <span class="nav-text">Caregiver Request</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.caregiver.requests') }}">All Request</a></li>
                </ul>
            </li>


            
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Payments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.user.payments') }}">All Payments</a></li>
                </ul>
            </li>
            
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
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



            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Contacts</span>
                </a>
                <ul aria-expanded="false">
                    
                    <li><a href="{{ route('admin.all.contacts') }}">All Contact</a></li>
                </ul>
            </li>


            
           
            <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                    
                </ul>
            </li>
        </ul>


        <div class="copyright">
            <p>webmotion Saas Admin © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by webmotion</p>
        </div>
    </div>
</div>