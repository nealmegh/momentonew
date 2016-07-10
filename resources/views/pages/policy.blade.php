@extends('master')

@section('content')
    <section id="content">
        <div class="container">
            <div id="main">
                <div class="tab-container style1 travelo-policies">
                <?php $count = count($articles)?>
                @if($count>0)
                    <ul class="tabs full-width">
                    <?php $j = 0; ?>
                    @foreach($articles as $article)
                    @if($j == 0)
                        <li class="active"><a data-toggle="tab" href="#{!!$article->id!!}">{!!$article->title!!}</a></li>
                         <?php $j++; ?>
                         
                    @else
                    
                    <li class=""><a data-toggle="tab" href="#{!!$article->id!!}">{!!$article->title!!}</a></li>
                    
                    @endif
                        @endforeach
                                          
                    </ul>
                    <?php $i = 0; ?>
                    <div class="tab-content">
                    @foreach($articles as $article)
                    @if($i == 0)
                        <div id="{!!$article->id!!}" class="tab-pane fade active in">
                           {!!$article->body!!}
                           <?php $i++; ?>
                        </div>
                        @else
                        <div id="{!!$article->id!!}" class="tab-pane fade">
                           {!!$article->body!!}
                        </div>
                        @endif
                   @endforeach
                        
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@stop