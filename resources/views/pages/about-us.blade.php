@extends('master')

@section('content')

   <section id="content">
        <div class="container">
            <div id="main">
              <div class="large-block image-box style6">
              <?php $count = count($article);  $count1 = count($article1);  $count2 = count($article2);?>
              @if($count>0)
                    <article class="box">
                        <figure class="col-md-5">
                            <a href="#" title="" class="middle-block middle-block-auto-height" style="position: relative; height: 149px;"><img class="middle-item" src="{{$article->images->path}}/{{$article->images->name}}" alt="" width="476" height="318" style="position: absolute; top: 50%; margin-top: -163px; left: 50%; margin-left: -244px;"></a>
                        </figure>
                        
                        <div class="details col-md-offset-5">
                            
                            <p>{!!$article->body!!}</p>
                        </div>
                    </article>
                    @endif
                    @if($count1>0)
                    <article class="box">
                        <figure class="col-md-5 pull-right middle-block middle-block-auto-height" style="position: relative; height: 149px;">
                            <a href="#" title=""><img class="middle-item" src="{{$article1->images->path}}/{{$article1->images->name}}" alt="" width="476" height="318" style="position: absolute; top: 50%; margin-top: -163.5px; left: 50%; margin-left: -244px;"></a>
                        </figure>
                        <div class="details col-md-7">
                            
                            <p>{!!$article1->body!!}</p>
                        </div>
                    </article>
                    @endif
                   @if($count2>0)
                    <article class="box">
                        <figure class="col-md-5">
                            <a href="#" title="" class="middle-block middle-block-auto-height" style="position: relative; height: 149px;"><img class="middle-item" src="{{$article2->images->path}}/{{$article2->images->name}}" alt="" width="476" height="318" style="position: absolute; top: 50%; margin-top: -244px; left: 50%; margin-left: -244px;"></a>
                        </figure>
                        <div class="details col-md-offset-5">
                               <p>{!!$article2->body!!}</p>
                        </div>
                    </article>
                    @endif
                </div>


                

                <div class="large-block text-center">
                    <h2>Check our Investors Relations</h2>
                    <div class="investor-list row">
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="images/investor/1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="images/investor/2.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="images/investor/3.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="images/investor/4.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="images/investor/5.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="images/investor/6.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop