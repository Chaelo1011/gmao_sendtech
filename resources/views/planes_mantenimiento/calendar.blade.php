@extends('layouts.app')

@section('extra-resources')
<link href="{{asset('fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link rel="stylesheet" href="{{asset('css/calendarStyle.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-6">
                        <h4>Planes de mantenimiento</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-danger imprimir"><i class="bi bi-printer"></i> Imprimir</button>
                        <a href="{{ route('plan_mantenimiento.index') }}" class="btn btn-info"><i class="bi bi-arrow-left"></i> Regresar</a>
                        <a href="{{ route('plan_mantenimiento.create') }}" class="btn btn-primary">Registrar nuevo plan</a>
                    </div>
                </div>

                <div class="card-body">
                   <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <script src='{{asset("fullcalendar/packages/core/main.js")}}'></script>
    <script src='{{asset("fullcalendar/packages/interaction/main.js")}}'></script>
    <script src='{{asset("fullcalendar/packages/daygrid/main.js")}}'></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        /* $.ajax({
            url: '/plan_mantenimiento/getAll',
            success: function(response) {
                response.forEach(responses => {
                    console.log(responses);
                });
            },
            error: function() {
                alert('Error');
            }
        }); */
        /* var datess;
        function getDates() {
            $.getJSON('/plan_mantenimiento/getAll', function(data){
                $.each(data, function(index){
                    datess = '{title: "Plan #'+data[index].id+'", start: "'+data[index].fecha+'"},';
                    return datess;
                })
            }).fail(function(data) {
                console.log('error');
            });
        } */

        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid' ],
        defaultDate: '{{date("Y-m-d")}}',
        eventLimit: true, // allow "more" link when too many events
        events: [
            {!!$rows!!}
        ]
        });

        calendar.render();
    });
  </script>
@endsection
