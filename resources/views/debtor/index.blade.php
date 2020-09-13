@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Middlename</th>
      <th scope="col">Lastname</th>
      <th scope="col">Loan Amount</th>
      <th scope="col">No. of Days</th>
      <th scope="col">Interest</th>
      <th scope="col">Per Day Payable</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($debtors as $row)
    <tr>
      <td>{{$row->firstname}}</td>
      <td>{{$row->middlename}}</td>
      <td>{{$row->lastname}}</td>
      <td>{{$row->loanAmount}}</td>
      <td>{{$row->days}}</td>
      <td>{{$row->interest}}</td>
      <td>{{$row->perDayPay}}</td>
      <td>{{$row->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
