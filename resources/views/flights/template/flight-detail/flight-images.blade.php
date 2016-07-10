<ul class="tabs">
    <li class="active"><a data-toggle="tab" href="#photo-tab">photo</a></li>
    {{--<li><a data-toggle="tab" href="#calendar-tab">calendar</a></li>--}}
    <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#">BEFORE YOU FLY</a></li>
</ul>
<div class="tab-content">
    <div id="photo-tab" class="tab-pane fade in active">
        <div class="featured-image image-container">
            <img src="{{ url($gallery->path.'/'.$gallery->name) }}" alt="">
        </div>
    </div>

</div>