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
                <h4 class="card-title"> Заявки на бронь</h4>
                <div class="card-body">
                  <div class="form-group">
                      <label><strong>Статус рейса :</strong></label>
                      <select id='reserve-status' class="form-control" style="width: 200px">
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
                  <table class="table table-bordered data-table" id="reservations">
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
                        Count Place
                      </th>
                      <th>
                        Comment
                      </th>
                      <th>
                        Flight ID
                      </th>
                      <th>
                        Departure City
                      </th>
                      <th>
                        Arriaval City 
                      </th>
                      <th>
                        Departure Date
                      </th>
                      <th>
                        Flight Duration
                      </th>
                      <th>
                        Plane Model
                      </th>
                      <th width="100px">
                        Status
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