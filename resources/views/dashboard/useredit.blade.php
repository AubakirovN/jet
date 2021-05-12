@extends('dashboard.master')

@section('content')
<div class="main-panel" id="main-panel">

 <div class="panel-header panel-header-sm">
      </div>
      <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h2>Edit user</h2>
      </div>
      <div class="card-body">

        <form action="/dashboard/user-update/{{ $user->id }}" method="POST">
          {{ csrf_field() }}

          {{ method_field('PUT') }} 
          <div class="form-group">
            <label>User Name</label>
            <input type="name" class="form-control" name="username" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label> Select User Role</label>
            <select class="form-control" name="usertype">
              <option value="admin">Admin</option>
              <option value="user">User</option>
              <option value="">None</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Update</button>
          <a href="/dashboard/users" class="btn btn-danger">Cancel</a>
        </form>
      </div>
    </div>

  </div>
</div>
@stop