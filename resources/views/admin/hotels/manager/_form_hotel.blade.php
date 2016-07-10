<form action="{{ route('admin_new_hotel_manager_path') }}" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="form-group">
        <label for="manager_name" class="control-label col-md-2">Name : </label>
        <div class="col-md-10">
            <input type="text" name="name" id="manager_name" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label for="manager_email" class="control-label col-md-2">Email : </label>
        <div class="col-md-10">
            <input type="text" name="email" id="manager_email" class="form-control"/>
            <span class="help-block">
                * important because this address will be use for accessing manager portal
            </span>
        </div>
    </div>
    <div class="form-group">
        <label for="manager_password" class="control-label col-md-2">Password : </label>
        <div class="col-md-10">
            <input type="password" name="password" id="manager_password" class="form-control"/>
            <span class="help-block">
                * password will be emailed to the recipient
            </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button class="btn btn-primary" type="submit">Create Manager</button>
        </div>
    </div>
</form>
