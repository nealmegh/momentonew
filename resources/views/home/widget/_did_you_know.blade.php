<div class="container section">
    <h2>Find Our Best Hotels</h2>
    <div class="row image-box style10">

    @foreach($hotels as $key=>$hotel)
            <?php $image = $hotel->images()->where('type','=','gallery')->first() ;?>

            <div class="col-sms-6 col-sm-6 col-md-3">
            <article class="box">
                <figure class="animated fadeInDown" data-animation-type="fadeInDown" data-animation-duration="2">
                    <a href="{{ url('hotels/detail/'.$hotel->id) }}" title="" class="hover-effect">
                        @if( $image != null)
                        <img src="{{ asset($image->path.'/'.$image->name) }}" alt="" height="160" width="270">
                        @else
                        <img src="{{ asset('images/no-image.png') }}" alt="" height="160" width="270" >
                        @endif
                    </a>
                </figure>
                <div class="details">
                    <a href="{{ url('hotels/detail/'.$hotel->id) }}" class="button btn-mini">SEE DETAIL</a>
                    <h4 class="box-title">{{ substr( $hotel->title, 0, 15 ) }}..<small>{{ $hotel->city }}</small></h4>
                </div>
            </article>
            </div>
        @endforeach
    </div>
</div>