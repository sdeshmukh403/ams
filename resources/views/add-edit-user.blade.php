@extends('layouts.app')
@section('content')
          <div class="col-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <a href="{{route('user-list')}}" style="float:right"  type="button" class="btn btn-dark">Back to user list</a>

                <h4 class="card-title">Add User</h4>

                <form class="forms-sample" method="post" action="{!! route('store-user') !!}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" value="{!! $userdata->name !!}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control" name="username" value="{!! $userdata->username !!}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Email ID</label>
                    <input type="text" class="form-control" name="email" value="{!! $userdata->email !!}">
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{!! $userdata->password !!}">
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputName1">Confirm Password</label>
                    <input type="password" class="form-control" id="cnfm_password" name="cnfm_password" value="{!! $userdata->password !!}">
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputName1">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_no" value="{!! $userdata->mobile_no !!}">
                  </div>
                  <div class="form-group">
                    <label>User profile Image</label>
                    <div class="input-group col-xs-12">
                      <input type="file" name="profile_image" class="form-control">
                    </div>
                  </div>  
                  <img src="{{asset('/public/images/'.$userdata->profile_image)}}" height="200px" width="200px">                
                  <div class="form-group">
                    <label for="exampleInputName1">DOB</label>
                    <input type="date" class="form-control" name="dob" value="{!! $userdata->dob !!}">
                  </div>                  
                  <div class="form-group">
                    <label for="exampleTextarea1">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="4">{!! $userdata->address !!}</textarea>
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputName1">City</label>
                    <input type="text" class="form-control" name="city" value="{!! $userdata->city !!}">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputName1">State</label>
                    <input type="text" class="form-control" name="state" value="{!! $userdata->state !!}">
                  </div>                 
                  <div class="form-group">
                    <label for="exampleInputName1">Country</label>
                    <input type="text" class="form-control" name="country" value="{!! $userdata->country !!}">
                  </div>
                  <input type="hidden" name="id" value="{!! $userdata->id !!}">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
<script>
$(document).ready(function() {
    $(document).off('click');
    $("form").submit(function() {
        if ($('#password').val() != $('#cnfm_password').val()) {
            alert("Password and Confirm password must be same");
            return false;
        }
    });
})
</script>
@endsection          

