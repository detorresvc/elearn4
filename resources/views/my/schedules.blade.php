@extends('layouts.main')

@section('content')
	
	<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '{{ date('Y-m-d') }}',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: '{{ url("/my/schedule_list") }}',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			},
			eventClick: function(calEvent, jsEvent, view) {
				var t = new Date(calEvent.start);
				var start = t.toISOString();
				
				var t2 = new Date(calEvent.end);
				var end = t2.toISOString();
				alert('Event: ' + calEvent.title+" "+start+" "+end);
				

				// change the border color just for fun
				$(this).css('border-color', 'red');

			}
		});
		
		$('.datetimepicker').datetimepicker({
			mask:'9999/19/39 29:59',
			
			
			
		});
	});

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#script-warning {
		display: none;
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: red;
	}

	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 40px auto;
		padding: 0 10px;
	}

</style>
    <br><br><br>
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    @if (Session::has('errors'))

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach(Session::get('errors')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3 contenteditable="true" class="text-primary">Schedules</h3>
	<div class="row">
        <div class="col-md-6 bg-info">
			{!! Form::open(['url'=>'/my/schedules','role'=>'form']) !!}
            <div class="form-group">
                <label for="start_at">Start</label>
                {!! Form::text('start_at',null,['class'=>'form-control datetimepicker']) !!}
            </div>
			<div class="form-group">
                <label for="end_at">End</label>
                {!! Form::text('end_at',null,['class'=>'form-control datetimepicker']) !!}
            </div>
            <div class="form-group">
			{!! Form::submit('Save',['class'=>'btn btn-success']) !!}
            </div>
			{!! Form::close() !!}
		</div>
    </div>
    <div class="row">
        <div class="col-md-12">
			<div id='script-warning'>
				<code>php/get-events.php</code> must be running.
			</div>

			<div id='loading'>loading...</div>

			<div id='calendar'></div>
		</div>
    </div>
@endsection