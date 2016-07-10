@extends('tour.car-master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Hotel</div>
				<div class="panel-body">
                    @include('car._form_car')
				</div>
			</div>
		</div>
	</div>
</div>
@stop
