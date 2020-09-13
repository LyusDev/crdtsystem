@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-3">
    <div class="card" style="width: 18rem;">

      <div class="card-body">
        <h5 class="card-title">{{ $firstname }}</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Total Paid Credit: {{ $totalPaid }}</li>

        <li class="list-group-item">Total Credit to pay:(₱){{ $totalPayable }}.00 pesos</li>
        <li class="list-group-item">Remaining Payable:(₱){{ $remainingPayable }}.00 pesos</li>
        <li class="list-group-item">Remaining Days: {{ $remainingDays }} Day(s)</li>
        <li class="list-group-item">Per Day Payable:(₱){{ $debtors->sum('perDayPay') }}</li>

      </ul>

    </div>
  </div>
  <br />
  <div class="col-lg-7">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Amount</th>
          <th scope="col">Received by</th>
          <th scope="col">Note</th>
        </tr>
      </thead>
      <tbody>
        @foreach($credits as $row)
        <tr>
          <td>{{ $row->created_at }}</td>
          <td>(₱){{ $row->amount }}.00 pesos</td>
          <td>{{ $row->receivedBy }}</td>
          <td>@ {{ $row->note }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection