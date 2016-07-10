<div class="sort-by-section clearfix">
    <h4 class="sort-by-title block-sm">Sort results by:</h4>
    <ul class="sort-bar clearfix block-sm">
        <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
        <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
        <li class="clearer visible-sms"></li>
        <li class="sort-by-rating "><a class="sort-by-container" href="#"><span>rating</span></a></li>
        <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
    </ul>

    <ul class="swap-tiles clearfix block-sm">
        <li class="swap-list @if(Session::get('view') == 'grid') active @endif">
            <a href="{{ URL::to('hotel/hotel-list-view') }}"><i class="soap-icon-list"></i></a>
        </li>
        <li class="swap-grid @if(Session::get('view') == 'list') active @endif">
            <a href="{{ URL::to('hotel/hotel-grid-view') }}"><i class="soap-icon-grid"></i></a>
        </li>
        <li class="swap-block @if(Session::get('view') == 'block') active @endif">
            <a href="{{ URL::to('hotel/hotel-block-view') }}"><i class="soap-icon-block"></i></a>
        </li>
    </ul>
</div>