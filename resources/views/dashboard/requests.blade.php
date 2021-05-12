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
                <h4 class="card-title"> Управление заявками</h4>
                <div class="card-body">
                  <div class="form-group">
                      <label><strong>Статус заявки :</strong></label>
                      <select id='request-status' class="form-control" style="width: 200px">
                          <option value="">--Все--</option>
                          <option value="new">Новый</option>
                          <option value="confirm">Потвержден</option>
                          <option value="reject">Отклонен</option>
                      </select>
                  </div>
              </div>
                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered data-table" id="requests-table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Названия
                      </th>
                      <th>
                        Телефон
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Откуда
                      </th>
                      <th>
                        Куда
                      </th>
                      <th>
                        Дата вылета
                      </th>
                      <th>
                        Дата возвращения
                      </th>
                      <th>
                        Кол. мест
                      </th>
                      <th>
                        Комментарий
                      </th>
                      <th width="100px">
                        Статус
                      </th>
                     
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
@stop