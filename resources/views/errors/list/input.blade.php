@if($errors->any())
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul class="list-unstyled alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
