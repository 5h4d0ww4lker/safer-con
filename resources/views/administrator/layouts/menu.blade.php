<div id="mainMenu">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('public/index.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Atlantic Bolerplate</p>

        </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        
        @permission('setting')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>User Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            @permission('manage-user')

                <li><a href="{{ url('/setting/super_admins') }}"><i class="fa fa-circle-o"></i>User</a></li>

                @endpermission
                @permission('manage-role')
                <li><a href="{{ route('setting.role.index') }}"><i class="fa fa-circle-o"></i>Role</a></li>
                @endpermission

                @permission('manage-member')
                <li><a href="{{ url('/members') }}"><i class="fa fa-circle-o"></i>Members</a></li>
                @endpermission
               
            </ul>
        </li>
        @endpermission





       

       

        <li class="header">PROFILE SETTING</li>
        <li><a href="{{ url('/profile/user-profile') }}"><i class="fa fa-user text-green"></i> <span>Profile</span></a></li>
        <li><a href="{{ url('/profile/change-password') }}"><i class="fa fa-key text-green"></i> <span>Change Password</span></a></li>

    </ul>
</div>