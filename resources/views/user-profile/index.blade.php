@extends('user-profile.layout.profile')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Admin Dashboard'])
@stop

@section('profile-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
            <li class=""><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Profile</a></li>
            <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Booking</a></li>
            <li class=""><a data-toggle="tab" href="#wishlist"><i class="soap-icon-wishlist circle"></i>Wishlist</a></li>
            <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Travel Stories</a></li>
            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Settings</a></li>
        </ul>
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                @include('admin.template.dashboard')
            </div>
            <div id="profile" class="tab-pane fade">
                @include('admin.template.profile')
            </div>
            <div id="booking" class="tab-pane fade">
                @include('admin.template.booking')
            </div>
            <div id="wishlist" class="tab-pane fade">
                @include('admin.template.wishlist')
            </div>
            <div id="travel-stories" class="tab-pane fade">
                @include('admin.template.travel')
            </div>
            <div id="settings" class="tab-pane fade">
                @include('admin.template.settings')
            </div>
            <div id="add-hotel" class="tab-pane fade">

            </div>
        </div>
    </div>
@endsection