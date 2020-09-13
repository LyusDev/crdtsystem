@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <h1>Create a Debtor</h1>

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
    <form method="post" action="/debtor/">
      {{csrf_field()}}
      <div class="form-group">
        <div class="row pl-3">
          <div>
            <label for="name">Fistname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="name" placeholder="Juan">
          </div>
          <div class="pl-2">
            <label for="name">Middlename</label>
            <input type="text" class="form-control" id="middlename" name="middlename" aria-describedby="name" placeholder="Dela">
          </div>
          <div class="pl-2">
            <label for="name">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="name" placeholder="Cruz">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com">
      </div>
      <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
      <div class="form-group">
        <label for="loan_amount">Loan Amount</label>
        <input type="number" class="form-control" id="loanAmount" name="loanAmount" placeholder="Loan Amount" v-model="loanAmount" @change="updateLoanAmount" :value="loanAmount">
      </div>
      <div class="form-group">
        <label for="interest">Interest Rate</label>
        <input type="number" class="form-control" id="interest" name="interest" placeholder="Interest Percentage" v-model="interest" @change="updateInterest" :value="interest" step="any">
      </div>
      <div class="form-group">
        <label for="Days">Days</label>
        <input type="text" class="form-control" id="days" name="days" placeholder="No. of Days" v-model="days" @change="updateTotalPerDayPay" :value="days">
      </div>
      <div class="form-group">
        <label for="perDayPay">Per Day Payable</label>
        <input type="text" class="form-control" id="perDayPay" name="perDayPay" placeholder="Per Day Payable" v-model="totalPerDayPay" @change="updateTotalDays" :value="totalPerDayPay">
      </div>
      <button class="btn btn-primary" id="button1" disabled="true">Submit</button>
      <script type="text/javascript">
        function oA() {
          document.getElementById('perDayPay').disabled = false;
        }

        function compute() {
          document.getElementById('button1').disabled = false;
        }
      </script>
      <a href="/credit/create">
        <input type="button" class="btn btn-danger" value="Close" />
      </a>
      <input type="reset" class="btn btn-secondary" value="Reset" v-on:click="reset">
    </form>
  </div>
  <div class="col-lg-6">
    <h1>Computation</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Interest</th>
          <th scope="col"></th>
          <th scope="col">Total Payable</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"></th>
          <td>@{{ loanAmount }}</td>
          <td></td>
          <td>@{{ loanAmount }}</td>
        </tr>
        <tr>
          <th scope="row">x</th>
          <td>@{{ interestDec }}</td>
          <th scope="row">+</th>
          <td>@{{totalInterest}}</td>
        </tr>
        <tr>
          <th scope="row">Total: </th>
          <td>@{{totalInterest}}</td>
          <th scope="row">Total:</th>
          <td>@{{totalPayable}}</td>
        </tr>
        <thead>
          <tr>
            <th scope="col">Per Day Payable</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
      <tbody>
        <tr>
          <th scope="row"></th>
          <td>@{{totalPayable}}</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">/</th>
          <td>@{{ days }}</td>
          <th scope="row"></th>
          <td></td>
        </tr>
        <tr>
          <th scope="row">Total: </th>
          <td>@{{ totalPerDayPay }}</td>
          <th scope="row"><input type="button" value="Compute All" class="btn btn-primary" onclick="compute()"></th>
          <td></td>
        </tr>

      </tbody>
    </table>
  </div>
  @endsection