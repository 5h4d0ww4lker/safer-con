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
        <li><a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard text-green"></i> <span>Dashboard</span></a></li>
        @if (auth::user()->hasPermissionTo('show_category') || auth::user()->hasPermissionTo('show_sub_category') || auth::user()->hasPermissionTo('show_brand') || auth::user()->hasPermissionTo('show_pay_rate')|| auth::user()->hasPermissionTo('show_home')|| auth::user()->hasPermissionTo('show_contact'))

        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>Setting</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @permission('show_category')
                <li><a href="{{ route('categories.category.index') }}"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
                @endpermission
                @permission('show_sub_category')
                <li><a href="{{ route('sub_categories.sub_category.index') }}"><i class="fa fa-circle-o"></i> Manage Sub Categories</a></li>
                @endpermission

                @permission('show_brand')
                <li><a href="{{ route('brands.brand.index') }}"><i class="fa fa-circle-o"></i> Manage Brands</a></li>
                @endpermission
                @permission('show_pay_rate')
                <li><a href="{{ route('pay_rates.pay_rate.index') }}"><i class="fa fa-circle-o"></i> Manage Pay Rates</a></li>
                @endpermission
                @permission('show_home')
                <li><a href="{{ route('landing_pages.landing_page.index') }}"><i class="fa fa-circle-o"></i> Manage Home</a></li>
                @endpermission
                @permission('show_contact')
                <li><a href="{{ route('contacts.contact.index') }}"><i class="fa fa-circle-o"></i> Contacts</a></li>
                @endpermission
            </ul>
        </li>



        @endif
        @permission('show_item' || 'show_item_detail' || 'show_order')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>Product Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @permission('show_item')
                <li><a href="{{ route('items.item.index') }}"><i class="fa fa-circle-o"></i> Manage Items</a></li>
                @endpermission
                @permission('show_item_detail')
                <li><a href="{{ route('item_details.item_detail.index') }}"><i class="fa fa-circle-o"></i> Item Details</a></li>
                @endpermission
                @permission('show_order')

                <li><a href="{{ route('orders.order.index') }}"><i class="fa fa-circle-o"></i> Manage Orders</a></li>

                @endpermission
            </ul>
        </li>
        @endpermission
        @if (auth::user()->hasPermissionTo('show_credit') || auth::user()->hasPermissionTo('show_credit_request') || auth::user()->hasPermissionTo('show_bank') || auth::user()->hasPermissionTo('show_transaction'))

        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>Financials</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">

                @permission('show_credit')
                <li><a href="{{ route('credits.credit.index') }}"><i class="fa fa-circle-o"></i> Manage Credits</a></li>
                @endpermission

                @permission('show_credit_request')
                <li><a href="{{ route('credit_requests.credit_request.index') }}"><i class="fa fa-circle-o"></i> Credit Requests</a></li>
                @endpermission
                @permission('show_bank')
                <li><a href="{{ route('banks.bank.index') }}"><i class="fa fa-circle-o"></i> Banks</a></li>
                @endpermission
                <li><a href="{{ route('credit_requests.credit_request.my_requests') }}"><i class="fa fa-circle-o"></i>My Requests </a></li>
                <li><a href="{{ route('my_credit_info') }}"><i class="fa fa-circle-o"></i> My credit Info</a></li>
                @permission('show_transaction')
                <li><a href="{{ route('transactions.transaction.index') }}"><i class="fa fa-circle-o"></i> Manage Transactions</a></li>
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
                @permission('show_admin')
                <li><a href="{{ url('/setting/super_admins') }}"><i class="fa fa-circle-o"></i> Manage Admins</a></li>

                @endpermission
                @permission('show_merchant')
                <li><a href="{{ url('/setting/merchants') }}"><i class="fa fa-circle-o"></i> Manage Merchants</a></li>

                @endpermission
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