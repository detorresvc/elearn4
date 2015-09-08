@extends('layouts.main')

@section('content')
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

    <h3 contenteditable="true" class="text-primary">Transaction List</h3>
    <div class="row">
        <div class="col-md-12">
		<table class="table table-striped">
			<thead>
			  <tr>
				<th>Payment ID</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Status</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			@foreach($transactions as $transaction )
			  <tr>
				<td>{{ $transaction->payment_id }}</td>
				<td>{{ $transaction->created_at }}</td>
				<td>{{ $transaction->updated_at }}</td>
				<td>{{ $transaction->state }}</td>
				<td>{!! HTML::link('receipt/'.$transaction->hash,'View Details') !!}</td>
			  </tr>
			  @endforeach
			</tbody>
		  </table>
		</div>
    </div>
@endsection