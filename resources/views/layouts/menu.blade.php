<div id="mainMenu">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('public/index.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Menu</p>

        </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="header">&nbsp;</li>-->
        <!-- <li><a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard text-green"></i> <span>Dashboard</span></a></li> -->


        @if (auth::user()->hasPermissionTo('show_user') || auth::user()->hasPermissionTo('show_merchant') || auth::user()->hasPermissionTo('show_admin') || auth::user()->hasPermissionTo('show_role'))

        <li class="treeview">

            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>Home Page</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @permission('show_user')
                <li><a href="{{ route('services.service.index') }}"><i class="fa fa-circle-o"></i>Services</a></li>

                @endpermission
                @permission('show_user')
                <li><a href="{{ route('testimonials.testimonial.index') }}"><i class="fa fa-circle-o"></i>Testimonials</a></li>

                @endpermission
                @permission('show_role')
                <li><a href="{{ route('previous_works.previous_work.index') }}"><i class="fa fa-circle-o"></i>Previous Works</a></li>
                @endpermission



            </ul>
        </li>
        @endif
        @if (auth::user()->hasPermissionTo('show_user') || auth::user()->hasPermissionTo('show_merchant') || auth::user()->hasPermissionTo('show_admin') || auth::user()->hasPermissionTo('show_role'))

        <li class="treeview">

            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>About Page</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @permission('show_user')
                <li><a href="{{ route('abouts.about.index') }}"><i class="fa fa-circle-o"></i>About</a></li>

                @endpermission
                @permission('show_user')
                <li><a href="{{ route('teams.team.index') }}"><i class="fa fa-circle-o"></i>Teams</a></li>

                @endpermission



            </ul>
        </li>
        @endif

        @if (auth::user()->hasPermissionTo('show_user') || auth::user()->hasPermissionTo('show_merchant') || auth::user()->hasPermissionTo('show_admin') || auth::user()->hasPermissionTo('show_role'))

        <li class="treeview">

            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>Commons</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">

                @permission('show_user')
                <li><a href="{{ route('contacts.contact.index') }}"><i class="fa fa-circle-o"></i>Contact</a></li>

                @endpermission

                @permission('show_user')
                <li><a href="{{ route('home_sliders.home_slider.index') }}"><i class="fa fa-circle-o"></i>Sliders</a></li>

                @endpermission

              
                @permission('show_user')
                <li><a href="{{ route('offers.offer.index') }}"><i class="fa fa-circle-o"></i>Offers</a></li>

                @endpermission



                @permission('show_user')
                <li><a href="{{ route('galleries.gallery.index') }}"><i class="fa fa-circle-o"></i>Galleries</a></li>

                @endpermission
                @permission('show_role')
                <li><a href="{{ route('partners.partner.index') }}"><i class="fa fa-circle-o"></i> Partners</a></li>
                @endpermission



            </ul>
        </li>
        @endif

        @if (auth::user()->hasPermissionTo('show_user') || auth::user()->hasPermissionTo('show_merchant') || auth::user()->hasPermissionTo('show_admin') || auth::user()->hasPermissionTo('show_role'))

        <li class="treeview">

            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>User Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">

                @permission('show_user')
                <li><a href="{{ url('/setting/users') }}"><i class="fa fa-circle-o"></i> Manage Users</a></li>

                @endpermission
                @permission('show_role')
                <li><a href="{{ route('setting.role.index') }}"><i class="fa fa-circle-o"></i>Role</a></li>
                @endpermission



            </ul>
        </li>
        @endif


        <li class="header">PROFILE SETTING</li>

        <li><a href="{{ url('/profile/user-profile') }}"><i class="fa fa-user text-green"></i> <span>Profile</span></a></li>
        <li><a href="{{ url('/profile/change-password') }}"><i class="fa fa-key text-green"></i> <span>Change Password</span></a></li>

    </ul>
</div>