 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div

         <!-- SidebarSearch Form -->
         {{--  --}}

         <!-- Sidebar Menu -->
         @if(Auth::user()->roll_id == '1')

         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('newsletter') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                          
                           {{ __('lang.Newsletter subscribers') }}

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                             {{ __('lang.Trainer') }}

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                           {{ __('lang.Sections') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('trainings') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                              {{ __('lang.Training Needs') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accreditation_bodies') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            {{ __('lang.Accrediting Bodies') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            {{ __('lang.Contact Us') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            {{ __('lang.Course Management') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('courses') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p> {{ __('lang.Courses') }}</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('lessons') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p> {{ __('lang.Asynchronous Lessons') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{ __('lang.Pages') }}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Concurrent Lesson Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('live_lessons') }}" class="nav-link">

                                <p>Simultaneous Lessons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('live_lesson_slots') }}" class="nav-link">

                                <p>Live Lesson Slots</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('tests')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Test
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('questions')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Questions
                        </p>
                    </a>
                </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('diploma')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p> {{ __('lang.programs and diploma') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tax')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Tax
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('coupon')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Coupon
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('account')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Accounts
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
         @elseif(Auth::user()->roll_id == '2')

         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                           Course Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tcourses') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tlessons') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Asynchronous Lessons</p>
                            </a>
                        </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Concurrent Lesson Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tlive_lessons') }}" class="nav-link">

                                <p>Simultaneous Lessons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tlive_lesson_slots') }}" class="nav-link">

                                <p>Live Lesson Slots</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('ttests')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Test
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tquestions')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Questions
                        </p>
                    </a>
                </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('tdiploma')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Programs and Diplomas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('taccount')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Accounts
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->roll_id == '3')

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                           Course Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ccourses') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('clessons') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Asynchronous Lessons</p>
                            </a>
                        </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Concurrent Lesson Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ctests')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Test
                        </p>
                    </a>
                </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('cdiploma')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Programs and Diplomas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('caccount')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Accounts
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->roll_id == '0')

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('strainings') }}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Training Needs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('saccount')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Account
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @endif
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
