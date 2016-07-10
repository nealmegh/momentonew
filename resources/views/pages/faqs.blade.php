@extends('master')

@section('content')
    <section id="content">
        <div class="container">
            <div id="main" class="faqs style1">
                <div class="row">
                  
                    <div class="col-sm-8 col-md-9">
                        <h2>Some of the Frequently Asked Question About Momento</h2>
                        <div class="travelo-box question-list">
                            <div class="toggle-container">
                            <?php $count = count($articles); ?>
                              @if($count>0) 
                               @foreach($articles as $article)
                            
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#tgg2" class="collapsed">{!!$article->title!!} </a>
                                    </h4>
                                    <div id="tgg2" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-content">
                                           {!!$article->body!!}
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>





@stop