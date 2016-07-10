<div class="travelo-box">
    <h4>Similar Listings</h4>
    <div class="image-box style14">
        @foreach($similar_hotels as $s_hotel)
            <article class="box">
                <figure>
                    <a href="#"><img src="/{{ $s_hotel->images[1]->path }}/thumbnail/{{ $s_hotel->images[1]->name }}" alt=""></a>
                </figure>
                <div class="details">
                    <h5 class="box-title"><a href="{{'/hotels/detail/'.$s_hotel->id}}">{{$s_hotel->name}}</a></h5>
                    <label class="price-wrapper">
                        <span class="price-per-unit">{{number_format($s_hotel->roomTypes()->min('price'), 2)}}</span>avg/night
                    </label>
                </div>
            </article>
        @endforeach
    </div>
</div>