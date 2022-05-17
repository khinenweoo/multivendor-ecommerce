<div class="myaccount-tab-menu nav" role="tablist">
    <a href="{{ route('user.dashboard') }}" class="{{\Request::is('user/dashboard')? 'active': ''}}"><i class="fa fa-dashboard"></i>Dashboard</a>
    <a href="{{ route('user.profile') }}"  class="{{\Request::is('user/profile')? 'active': ''}}"><i class="fa fa-user"></i> Account Details</a>
    <a href="{{ route('user.address') }}"  class="{{\Request::is('user/address')? 'active': ''}}"><i class="fa fa-user"></i> Address</a>
    <a href="{{ route('user.orders') }}" class="{{\Request::is('user/orders')? 'active': ''}}"><i class="fa fa-cart-arrow-down"></i> Orders</a>
    <a href="#payment-method"  class="{{\Request::is('user/payment')? 'active': ''}}"><i class="fa fa-credit-card"></i> Payment Method</a>
    <!-- <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a> -->
    <a href="{{ route('user.logout') }}"  onclick="event.preventDefault();
    document.getElementById('user-logout-form').submit();"><i class="icon-logout"></i> Logout</a>
    <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>