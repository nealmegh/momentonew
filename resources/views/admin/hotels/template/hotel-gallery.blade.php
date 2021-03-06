@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Gallery Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.hotels.template._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Hotel Gallery!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                @include('flash::message')
                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>Hotel Gallery</h2>

                        @include('admin.widget.file-upload')

                        {!! Form::open(['url'=>'admin/hotels/gallery', 'id'=>'fileupload', 'files'=>'true']) !!}
                        {!! form::hidden('hotel_id', $hotel->id) !!}
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="row fileupload-buttonbar">
                            <div class="col-lg-7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancel upload</span>
                                </button>

                                <!-- <input type="checkbox" class="toggle">
                                  The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="col-lg-5 fileupload-progress fade">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                        {!! Form::close() !!}


                        <div class="block">
                            <h1>Gallery</h1>
                            <div class=""  data-item-width="170" data-item-margin="30">

                                <div class="flex-viewport" >
                                    <ul class="slides" >
                                        @foreach($images as $image)
                                        <li style="width: 170px; float: left; display: block;">
                                            <a href="#" class="hover-effect">
                                                <img src="{{ asset($image->path.'/'.$image->name) }}" alt="" draggable="false">
                                                <p class="caption">La Degue Island</p>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.gallery.destroy', $image->id], 'class' => 'gallery-thumb']) !!}
                                                <button
                                                        class="btn-mini red"
                                                        type="submit"
                                                        data-toggle="modal"
                                                        data-target="#confirmDelete"
                                                        data-title="Delete {{ $image->name }} Image"
                                                        data-message="Are you sure you want to delete this {{ $image->name }} Image?"
                                                        >
                                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                                </button>
                                                {{--<button type="submit" class="btn-mini red"--}}
                                                {!! Form::close() !!}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            @include('common.delete-confirm')
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
