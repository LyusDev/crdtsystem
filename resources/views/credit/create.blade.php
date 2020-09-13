@extends('layouts.app')

@section('content')
<h1>@{{ greetings }}</h1>
<div class="row">
<div class="col-lg-6">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Pay Credit:</th>     
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">    
      <p>{{\Session::get('success')}}</p>     
</div>
@endif
<form method="post" action="/credit">
  {{csrf_field()}}
  <div class="form-group row">
    <div class="col-lg-9">
    <label for="amount">Enter Amount:</label>
      <input type="text" class="form-control" id="amount" name="amount" aria-describedby="name" placeholder="Amount" v-model="selected">
    </div>
    <div class="col-lg-3">
    <label for="debtor_name">Or Choose Here:</label> 
      <select class="form-control" v-model="selected">
        @foreach($debtors as $debtor)
        <option value="{{ $debtor->perDayPay}}">{{ $debtor->firstname}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="name">Received By:</label>
    <select class="form-control" id="receivedBy" name="receivedBy">
      <option>chat</option>
      <option>yus</option>
    </select>
  </div>
  <div class="form-group">
    <label for="Days">Note:</label>
    <input type="text" class="form-control" id="note" name="note" placeholder="Note Something...">
  </div>
  <div class="form-group">
    <label for="name">Pay Credit for:</label>
    <select class="form-control" id="debtor_name" name="debtor_name">
      @foreach($debtors as $row)
      <option>{{ $row['firstname']}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button> 
  <a href="/credit/create">
      <input type="button" class="btn btn-danger" value="Close"/>
    </a> 
  </form>
  <br/>
         
</div>
<div class="col-lg-6">



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">You Currently have:</th>     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Total No. Debtors:</th>
      <td> {{ $debtors->count()}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Total Income Per Day:</th>
      <td>{{  $debtors->sum('perDayPay')}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Total Money Loans: </th>
      <td>{{$debtors->sum('loanAmount')}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Total Income: </th>
      <td>{{$debtors->sum('totalPayable')}}</td>
      <td></td>
      <td></td>
    </tr>
    </tbody>
    </table>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Debtors Information:</th>     
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Action</th>
      <th scope="col">Name</th>
      <th scope="col">Loan Amount</th>
      <th scope="col">Days</th>
      <th scope="col">Interest</th>
      <th scope="col">Total Payable</th>
      <th scope="col">ID</th>
    </tr>
  </thead>
  <tbody>
    @foreach($debtors as $row)
                <tr>
                    <td><a href="/credit/{{ $row->firstname }}"><input type="button" class="btn btn-success" value="view"></a></td>  
                  <td><a href="/credit/{{ $row->firstname }}">{{ $row->firstname }}</a></td>
                  <td>(₱){{ $row->loanAmount }}.00 pesos</td>
                  <td>{{ $row->days}} Day(s)</td>
                  <td>{{ $row->interest }}%</td>
                  <td>(₱){{ $row->totalPayable }}.00 pesos</td>
                  <td>{{ $row->id }}</a></td> 
                </tr>
    @endforeach
  </tbody>
</table>
</div>

</div>
@endsection
