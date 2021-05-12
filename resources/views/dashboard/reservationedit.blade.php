@extends('dashboard.master')

@section('content')
<div class="main-panel" id="main-panel">

 <div class="panel-header panel-header-sm">
      </div>
      <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h2>Edit reservation</h2>
      </div>
      <div class="card-body">

        <form action="/dashboard/reservation-update/{{ $reserve->id }}" method="POST">
          {{ csrf_field() }}

          {{ method_field('PUT') }}
          <div class="col-md-6">
            <div class="form-group">
              <label> Рейс </label>
                <input type="name" class="form-control" name="flight_id" value="{{$reserve->flight_id}}" readonly>
            </div>
            <div class="form-group">
              <label>Клиент </label>
                <input type="name" class="form-control" name="user" value="{{$reserve->user->name }}" readonly>
            </div>
            <div class="form-group">
              <label> Изменить статус</label>
              <select class="form-control" name="status">
                <option value="new">Новый</option>
                <option value="confirm">Утвердить</option>
                <option value="reject">Отклонить</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Обновить</button>
            <a href="/dashboard/reservations" class="btn btn-primary">Отмена</a>
          </div> 
        </form>
        <div class="form-group">
          <form action="/dashboard/reservations-delete/{{ $reserve->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">УДАЛИТЬ</button>
            
          </form>
        </div>
        
      </div>
    </div>

  </div>
</div>
@stop