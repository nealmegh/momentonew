@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.users._left-menu')
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
@endsection