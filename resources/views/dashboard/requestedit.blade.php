@extends('dashboard.master')

@section('content')
<div class="main-panel" id="main-panel">

 <div class="panel-header panel-header-sm">
      </div>
      <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h2>Редактировать запрос на рейс</h2>
      </div>
      <div class="card-body">

        <form action="/dashboard/request-update/{{ $req->id }}" method="POST">
          {{ csrf_field() }}

          {{ method_field('PUT') }}
          <div class="col-md-6">
            <div class="form-group">
              <label>Откуда </label>
                <input type="name" class="form-control" name="departure_city" value="{{$req->departure_city}}" readonly>
            </div>
            <div class="form-group">
              <label>Дата вылета</label>
                <input type="name" class="form-control" name="departure_date" value="{{$req->departure_date}}" readonly>
            </div>
            <div class="form-group">
              <label>Куда </label>
                <input type="name" class="form-control" name="arrival_city" value="{{$req->arrival_city}}" readonly>
            </div>
            <div class="form-group">
              <label>Дата прилета </label>
                <input type="name" class="form-control" name="arrival_date" value="{{$req->arrival_date}}" readonly>
            </div>
            <div class="form-group">
              <label>Количество мест </label>
                <input type="name" class="form-control" name="count_place" value="{{$req->count_place}}" readonly>
            </div>
            <div class="form-group">
              <label>Клиент </label>
                <input type="name" class="form-control" name="user" value="{{$req->name }}" readonly>
                <input type="name" class="form-control" name="phone" value="{{$req->phone }}">
                <input type="name" class="form-control" name="email" value="{{$req->email }}">
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Комментарий</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="result_comment" rows="3"></textarea>
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
            <a href="/dashboard/requests" class="btn btn-primary">Отмена</a>
          </div> 
        </form>
        <div class="form-group">
          <form action="/dashboard/request-delete/{{ $req->id}}" method="post">
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