<div class="travelo-box">
    <h5 class="box-title">Search Stories</h5>
    <div class="with-icon full-width">
    {!! Form::open() !!}
        <input type="text" name="title" class="input-text full-width" placeholder="story name or category">
        <button class="icon green-bg white-color"><i class="soap-icon-search"></i></button>
    {!! Form::close() !!}
    </div>
</div>
@include('common.widget.need-help')
@include('common.widget.why-us')