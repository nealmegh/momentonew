<h1 class="no-margin skin-color">Hi {{ Auth::user()->first_name }}, Welcome to Momento</h1>
<p>All your trips booking with us will appear here and you’ll be able to manage everything!</p>
<br>
<div class="row block">
    @include('common.widget.total-product-counter')
</div>