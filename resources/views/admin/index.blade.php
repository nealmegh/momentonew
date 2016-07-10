@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Admin Dashboard'])
@stop
@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
            <li class=""><a href="/admin/users"><i class="soap-icon-user circle"></i>Users</a></li>
            <li class=""><a href="/admin/site"><i class="soap-icon-businessbag circle"></i>Site</a></li>
            <li class=""><a href="/admin/articles"><i class="soap-icon-wishlist circle"></i>Content</a></li>
            <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Menu</a></li>
            <li class=""><a href="/admin/hotels"><i class="soap-icon-settings circle"></i>Services</a></li>
            <li class=""><a href="/admin/billing"><i class="soap-icon-businessbag circle"></i>Billing</a></li>
        </ul>
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                @include('common.template.dashboard')
            </div>
                <div id="profile" class="tab-pane fade">
                    @include('common.template.profile')
                </div>
                <div id="booking" class="tab-pane fade">
                    @include('common.template.booking', ['url'=>'admin/booking/detail'])
                </div>
                <div id="wishlist" class="tab-pane fade">
                    @include('common.template.wishlist')
                </div>
                <div id="travel-stories" class="tab-pane fade">
                    @include('common.template.travel')
                </div>
                <div id="settings" class="tab-pane fade">
                    @include('common.template.settings')
                </div>
                <div id="billing" class="tab-pane fade">

                </div>
        </div>
    </div>
@endsection