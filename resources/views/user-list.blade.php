@extends('layouts.app')
@section('content')

 <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" >
      <h3>User list</h3>
        <div class="card-body" style="width: 85%">
        <div class="col-12 row" style="margin-left:20px">
          <form class="forms-sample col-12 row"  action="{!! request()->url() !!}">
            <div class="form-group col-3">
            <label>Search by</label>
            <select name="filter" class="form-control" style="border:1px solid gray"  id='filter' >
              <option value="name">Name</option>
              <option value="username">Username</option>
              <option value="email">Email</option>
              <option value="mobile_no">Mobile Number</option>
              <option value="created_at">Created date</option>
              <option value="dob">DOB</option>
            </select>                    
            </div>
            <div class="form-group col-7">
            <label>Inputs</label>
            <input type="text" class="form-control" style="border:1px solid gray" id="search" name="search" value="">
            </div>    
            <div class="form-group col-2">            
                <button style="margin-top:30px" type="submit" class="btn btn-primary" >Search</button>
            </div>
          </form>
        </div>
          <a href="{{route('add-edit-user')}}" style="float:right"  type="button" class="btn btn-dark">Add User</a>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                  Name
                  </th>
                  <th>
                  Email ID
                  </th>
                  <th>
                  Mobile Number
                  </th>
                  <th>
                  Status
                  </th>
                  <th>
                   Action
                  </th>
                </tr>
              </thead>
              
              <tbody>
                @foreach($userdata as $data)
                <tr>
                <td>
                    {{$data->id}}
                  </td>
                  <td>
                    {{$data->name}}
                  </td>
                  <td>
                    {{$data->email}}
                  </td>
                  <td>
                    {{$data->mobile_no}}
                  </td>                          
                  <td>
                    @if($data->status == 0)
                    Inactive
                    @elseif($data->status == 1)
                    Active
                    @endif
                  </td>
                  <td>
                  <a href="{!! route('add-edit-user', $data->id) !!}" type="button" class="btn btn-success ">Edit</a>
                  <button type="button"  data-id="{{$data->id}}" class="btn btn-danger deleteUser">Delete</button>
                  <a href="{!! route('view-user', $data->id) !!}" type="button" class="btn btn-primary ">view</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr>
      </div>
    </div>

    <script>
$(document).ready(function() {

$('.deleteUser').click(function() {
    id = $(this).data('id');
    isDelete = confirm('Do you want to delete');
    if (isDelete) {
        $.ajax({
            url: "{!! url('delete-user') !!}/" + id,
            success: function(data) {
                if (data == 'success') {
                    alert('data deleted successfully');
                    window.location.reload();
                }
            }
        })
    }
})

$('#filter').change(function() {
    if ('dob' == $(this).val() || 'created_at' == $(this).val()) {
        $('#search').prop("type", "date");
    } else {
        $('#search').prop("type", "text");
    }
});
})
  </script>
@endsection
