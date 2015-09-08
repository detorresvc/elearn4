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

    <h3 contenteditable="true" class="text-primary">Payment Details</h3>
    <div class="row">

            <div class="col-md-8">
                <div class="thumbnail">
					<table>
						<tr>
							<td class="caption" width="30%">Payment id</td>
							<td>{{ $payment->id }}</td>
						</tr>
						@foreach($payment->getTransactions() as $transaction)

						<tr>
							<td class="caption">Invoice Number</td>
							<td >{{ $transaction->getInvoiceNumber() }}</td>
						</tr>
						<tr>
							<td class="caption">Description</td>
							<td>{{ $transaction->getDescription() }}</td>
						</tr>
						<tr>
							<td class="caption">Currency/Amount</td>
							<td>{{ $transaction->getAmount()->getCurrency()." ".$transaction->getAmount()->getTotal() }}</td>
						</tr>
						<tr>
							<td class="caption">Invoice Number</td>
							<td>{{ $transaction->getInvoiceNumber() }}</td>
						</tr>
						@endforeach
					</table>
                    
                </div>
            </div>

    </div>
@endsection