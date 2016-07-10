<div class="container">
    <h1 class="logo navbar-brand">
        <a href="/" title="{{$settings->site_name}}">
            <img src="{{ asset('images/logo.png') }}" alt="{{$settings->site_name}}" />
        </a>
    </h1>

    <nav id="main-menu" role="navigation">
        <ul class="menu">
            <li class="menu-item-has-children">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('admin/booking') }}">Booking</a>
                <ul>
                    <li><a href="{{ url('admin/booking?filter=hotel') }}">Hotel Booking</a></li>
                    <li><a href="{{ url('admin/booking?filter=tour') }}">Tour Booking</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('admin/users') }}">Users</a>
                <ul>
                    <li><a href="{{ url('admin/users/profile') }}">Your Profile</a></li>
                    <li class="menu-item-has-children">
                        <a href="{{ url('admin/users?manage=admin-users') }}">Manage Admin</a>
                        <ul class="right">
                            <li><a href="{{ url('admin/users/create?role=admin') }}">Add Admins</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ url('admin/users?manage=agents') }}">Manage Agents</a>
                        <ul class="right">
                            <li><a href="{{ url('admin/users/create?role=agent') }}">Add Agents</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ url('admin/users?manage=customers') }}">Manage Customer</a>
                        <ul class="right">
                            <li><a href="{{ url('admin/users/create?role=customerrs') }}">Add Customers</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ url('admin/users/user-group') }}">User Groups</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('admin/agents') }}">Agents Hotel</a>
                {{--<ul>--}}
                    {{--<li><a href="#">Assign Hotel</a></li>--}}
                    {{--<li><a href="#">Manage Hotel</a></li>--}}
                    {{--<li><a href="#">Hotel Request</a></li>--}}
                {{--</ul>--}}
            </li>
            <li class="menu-item-has-children">
                <a href="#">Site</a>
                <ul>
                    <li><a href="{{ url('admin/site') }}">Global Setting</a></li>
                    <li><a href="/" target="_blank">Site Preview</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('admin/articles') }}">Content</a>
                <ul>
                    <li><a href="{{ url('admin/articles/create') }}">Create An Article</a></li>
                    <li><a href="{{ url('admin/articles') }}">Manage Articles</a></li>
                    <li><a href="{{ url('#') }}">Link Page With Menu</a></li>
                    <li><a href="{{ url('admin/articles?status=draft') }}">Publish Draft Page</a></li>
                </ul>
            </li>
            {{--<li class="menu-item-has-children">--}}
                {{--<a href="index.html">Menu</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Create A Menu Group</a></li>--}}
                    {{--<li><a href="#">Manage Menu Group (s)</a></li>--}}
                    {{--<li><a href="#">Create New Menu</a></li>--}}
                    {{--<li><a href="#">Manage Menu (s)</a></li>--}}
                    {{--<li><a href="#">Manage Draft Menu (s)</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            <li class="menu-item-has-children">
                <a href="#">Services</a>
                <ul>
                    <li><a href="{{ url('admin/hotels') }}">Hotel Management</a>
                        <ul class="left">
                            <li><a href="{{ url('admin/hotels/manage') }}">All Hotels</a></li>
                            <li><a href="{{ url('admin/hotels/category') }}">Hotel Types</a></li>
                            <li><a href="{{ url('admin/hotels/room-type') }}">Hotel Groups</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('admin/tours') }}">Tours Management</a>
                        <ul class="left">
                            <li><a href="{{ url('admin/tours/manage') }}">All Tours</a></li>
                            <li><a href="{{ url('admin/tours/type') }}">Tours Types</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('admin/cars') }}">Cars Management</a>
                        <ul class="left">
                            <li><a href="{{ url('admin/cars/manage') }}">All Cars</a></li>
                            <li><a href="{{ url('admin/cars/type') }}">Cars Types</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('admin/flights') }}">Flights Management</a>
                        <ul class="left">
                            <li><a href="{{ url('admin/flights/manage') }}">All Flights</a></li>
                            <li><a href="{{ url('admin/flights/type') }}">Flights Types</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('admin/billing') }}">Billing</a>
                <ul>
                    {{--<li><a href="#">Payment Gateway</a></li>--}}
                    <li><a href="#">Manage Invoices</a>
                        <ul class="sub-menu">
                            <li>
                                <ul>
                                    <li><a href="#">Paid</a></li>
                                    <li><a href="#">Unpaid</a></li>
                                    <li><a href="#">Cancelled</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--<li><a href="#">Supplementary Charges</a></li>--}}
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#">Reviews</a>
                <ul>
                    <li><a href="{{ url('admin/reviews') }}">All Reviews</a></li>
                    <li><a href="{{ url('admin/reviews/types') }}">Rating Types</a></li>
                </ul>
            </li>
            {{--<li class="menu-item-has-children">--}}
                {{--<a href="#">Setup</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Privilege Manager</a></li>--}}
                    {{--<li><a href="#">User Role Manager</a></li>--}}
                    {{--<li><a href="#">Template Manager</a></li>--}}
                    {{--<li><a href="#">Database Management</a></li>--}}
                    {{--<li><a href="#">Email Templates</a></li>--}}
                    {{--<li><a href="#">Country Management</a></li>--}}
                    {{--<li><a href="#">State Management</a></li>--}}
                    {{--<li><a href="#">City/Area Management</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="menu-item-has-children">--}}
                {{--<a href="#">Utility</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Allow/Deny(s)</a></li>--}}
                    {{--<li><a href="#">Refresh All Cache</a></li>--}}
                    {{--<li><a href="#">Logs</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </nav>
</div>