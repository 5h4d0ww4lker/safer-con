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
        @permission('show_category' || 'show_brand' || 'show_sub_category' || 'show_pay_rates')
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
                @permission('show_pay_rate')
                <li><a href="{{ route('landing_pages.landing_page.index') }}"><i class="fa fa-circle-o"></i> Manage Home</a></li>
                @endpermission
                @permission('show_pay_rate')
                <li><a href="{{ route('contacts.contact.index') }}"><i class="fa fa-circle-o"></i> Contacts</a></li>
                @endpermission
            </ul>
        </li>

        @endpermission
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
        @permission('show_credit' || 'show_transaction' || 'show_sub_category')
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
                @permission('show_credit')

                @endpermission
                @permission('show_credit')
                <li><a href="{{ route('credit_requests.credit_request.index') }}"><i class="fa fa-circle-o"></i> Credit Requests</a></li>
                @endpermission
                @permission('show_credit')
                <li><a href="{{ route('banks.bank.index') }}"><i class="fa fa-circle-o"></i> Banks</a></li>
                @endpermission
                <li><a href="{{ route('credit_requests.credit_request.my_requests') }}"><i class="fa fa-circle-o"></i>My Requests </a></li>
                <li><a href="{{ route('my_credit_info') }}"><i class="fa fa-circle-o"></i> My credit Info</a></li>
                @permission('show_transaction')
                <li><a href="{{ route('transactions.transaction.index') }}"><i class="fa fa-circle-o"></i> Manage Transactions</a></li>
                @endpermission


            </ul>
        </li>
        @endpermission

        @permission('show_user' || 'show_role')

        <li class="treeview">

            <a href="#">
                <i class="fa fa-cog text-green"></i> <span>User Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @permission('show_user')
                <li><a href="{{ url('/setting/super_admins') }}"><i class="fa fa-circle-o"></i> Manage Admins</a></li>

                @endpermission
                @permission('show_user')
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


        @endpermission
        <li class="header">PROFILE SETTING</li>

        <li><a href="{{ url('/profile/user-profile') }}"><i class="fa fa-user text-green"></i> <span>Profile</span></a></li>
        <li><a href="{{ url('/profile/change-password') }}"><i class="fa fa-key text-green"></i> <span>Change Password</span></a></li>

    </ul>
</div>