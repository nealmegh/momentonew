<div class="flexslider photo-gallery style1" id="post-slideshow1" data-sync="#post-carousel1">

    <div class="flex-viewport" style="overflow: hidden; position: relative;">
        <ul class="slides" style="width: 1400%; -webkit-transition-duration: 0.6s; transition-duration: 0.6s; -webkit-transform: translate3d(-1740px, 0px, 0px); transform: translate3d(-1740px, 0px, 0px);">
           <?php $count = 1 ?>
            @forelse($tour->images as $image)
                @if($count == 1)
                    <li class="flex-active-slide" aria-hidden="true" style="width: 870px; float: left; display: block;">
                        <img width="870" height="342" src="{{ asset($image->path.'/'.$image->name) }}" class="attachment-full" alt="1" draggable="false">
                    </li>
                @else
                    <li style="width: 870px; float: left; display: block;">
                        <img width="870" height="342" src="{{ asset($image->path.'/'.$image->name) }}" class="attachment-full" alt="1" draggable="false">
                    </li>
                @endif
                <?php $count++ ?>
               @empty
                   <li class="flex-active-slide" aria-hidden="true" style="width: 870px; float: left; display: block;">
                        <img width="870" height="342" src="{{ asset('images/no-image.png') }}" class="attachment-full" alt="1" draggable="false">
                   </li>
               @endforelse

        </ul>
    </div>
    <ol class="flex-control-nav flex-control-paging">

        @for($i=1; $i <= count($tour->images); $i++)
            @if($i == 1)
            <li><a class="flex-active">{{ $i }}</a></li>
            @else
                <li><a class="">{{ $i }}</a></li>
            @endif
        @endfor
    </ol>
    <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="#">Previous</a></li>
        <li><a class="flex-next" href="#">Next</a></li>
    </ul>
</div>

<div class="flexslider image-carousel style1" id="post-carousel1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#post-slideshow1">
    <div class="flex-viewport" style="overflow: hidden; position: relative;">

        <ul class="slides" style="width: 1000%; -webkit-transition-duration: 0s; transition-duration: 0s; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px);">
            <?php $count = 1 ?>

            @forelse($tour->images as $image)
                @if($count == 1)
                <li class="flex-active-slide" style="width: 70px; float: left; display: block;">
                    <img width="64" height="64" src="{{ asset($image->path.'/thumbnail/'.$image->name) }}" class="attachment-widget-thumb" alt="3" draggable="false">
                </li>
                @else
                <li style="width: 70px; float: left; display: block;">
                    <img width="64" height="64" src="{{ asset($image->path.'/thumbnail/'.$image->name) }}" class="attachment-widget-thumb" alt="3" draggable="false">
                </li>
                @endif
            @empty
                <li style="width: 70px; float: left; display: block;">
                    <img width="64" height="64" src="{{ asset('images/no-image.png') }}" class="attachment-widget-thumb" alt="3" draggable="false">
                </li>
            @endforelse
        </ul>
    </div>
    <ol class="flex-control-nav flex-control-paging"></ol>
    <ul class="flex-direction-nav">
        <li><a class="flex-prev flex-disabled" href="#" tabindex="-1">Previous</a></li>
        <li><a class="flex-next flex-disabled" href="#" tabindex="-1">Next</a></li>
    </ul>
</div>