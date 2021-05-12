@extends('dashboard.master')

@section('content')
<div class="main-panel" id="main-panel">

 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registrited Users</h4>
                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Role
                      </th>
                      <th>
                        EDIT
                      </th>
                      <th>
                        DELETE
                      </th>
                    </thead>
                    <tbody>
                    @if(isset($users))
                     @foreach($users as $user)
                      <tr>
                      	<td>
                          {{ $user->id }}
                        </td>
                        <td>
                          {{ $user->name }}
                        </td>
                        <td>
                          {{ $user->phone }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          {{ $user->usertype }}
                        </td>
                        <td>
                          <a href="/dashboard/user/{{ $user->id}}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <form action="/dashboard/user-delete/{{ $user->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                            
                          </form>
                          
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
@stop