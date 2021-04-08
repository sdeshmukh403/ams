@extends('layouts.app')
@section('content')
          <div class="col-10 grid-margin stretch-card">
            <div class="card">           

              <div class="card-body">
                <h4 class="card-title">View User</h4>
                <form class="forms-sample" method="post" action="{!! route('store-user') !!}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" value="{!! $userdata->name !!}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control" name="username" value="{!! $userdata->username !!}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Email ID</label>
                    <input type="text" class="form-control" name="email" value="{!! $userdata->email !!}" disabled>
                  </div>                  
               
                  <div class="form-group">
                    <label for="exampleInputName1">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_no" value="{!! $userdata->mobile_no !!}" disabled>
                  </div>
                  <img src="{{asset('/public/images/'.$userdata->profile_image)}}" height="200px" width="200px">                
                  <div class="form-group">
                    <label for="exampleInputName1">DOB</label>
                    <input type="date" class="form-control" name="dob" value="{!! $userdata->dob !!}" disabled>
                  </div>                  
                  <div class="form-group">
                    <label for="exampleTextarea1">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="4" disabled>{!! $userdata->address !!}</textarea>
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputName1">City</label>
                    <input type="text" class="form-control" name="city" value="{!! $userdata->city !!}" disabled>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputName1">State</label>
                    <input type="text" class="form-control" name="state" value="{!! $userdata->state !!}" disabled>
                  </div>                 
                  <div class="form-group">
                    <label for="exampleInputName1">Country</label>
                    <input type="text" class="form-control" name="country" value="{!! $userdata->country !!}" disabled>
                  </div>
                </form>
              </div>
            </div>
          </div>
@endsection
        