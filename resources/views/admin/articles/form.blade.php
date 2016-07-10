<div class="col-md-8">
    <div class="row form-group">
        {!! form::label('title','Title:') !!}
        {!! form::text('title', null, ['class'=>'input-text full-width']) !!}
    </div>
    <div class="row form-group">
        {!! form::label('category_id','Category:') !!}
        <div class="selector">
            {!! form::select('category_id', ['story'=>'Story', 'page'=>'Page', 'news'=>'News', 'guide'=>'Travel Guide', 'uncategorised' => 'Uncategorised', 'faq' => 'FAQ', 'policy'=> 'Policy'], null,['class'=>'input-text full-width']) !!}
        </div>
    </div>
    <div class="row form-group">
        {!! form::label('body','Body:') !!}
        {!! form::textarea('body', null, ['class'=>'input-text full-width textarea']) !!}
    </div>
    <div class="row form-group">
        {!! form::label('published_at','Publied At:') !!}
        {!! form::input('date','published_at', date('Y-m-d'), ['class'=>'input-text full-width']) !!}
    </div>
    <div class="row form-group no-float">
        <h4 class="title">Do you have photos ? <small>(Optional)</small> </h4>
        <div class="fileinput full-width" style="line-height: 34px;">
            <input type="file" name="files" class="input-text" data-placeholder="select image/s">
            <input type="text" class="custom-fileinput input-text" placeholder="select image/s">
        </div>

        @if(isset($article))
            @if($image = $article->images)
                <img src="/{{ $image->path.'/'.$image->name }}" width="200">
            @else
                Something Wrong!
            @endif
        @endif
    </div>
    <div class="row form-group">
        {!! form::label('status','Status:') !!}
        <div class="selector">
            {!! form::select('status', ['2'=>'Draft', '1'=>'Published', '0'=>'Unpublished'], '1',['class'=>'input-text full-width']) !!}
            <span class="custom-select">Published</span>
        </div>
    </div>
    <div class="row form-group">
        <button type="submit" class="btn-medium col-sms-6 col-sm-12">{{ $SubmitButtonText }}</button>
    </div>
</div>