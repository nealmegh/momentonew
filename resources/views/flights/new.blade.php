@extends('tour.tour-master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Hotel</div>
				<div class="panel-body">
                    @include('tour._form_tour')
				</div>
			</div>
		</div>
	</div>
</div>
@stop
