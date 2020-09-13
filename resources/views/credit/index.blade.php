@extends('layouts.app')

@section('content')
<div class="col-12 d-flex">
<div class="col-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://www.jaantaproperties.com/wp-content/uploads/2017/12/Emptyprofile.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Total Paid Credit:</li>
    <li class="list-group-item">Total Credit to pay:</li>
    <li class="list-group-item">Remaining Days:</li>
  </ul>
  <div class="card-body">
    <input type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" value="Pay Credit"/>
    <input type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal1" value="Calendar"/>
  </div>
</div>
</div>
<div class="col-8">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Received by</th>
      <th scope="col">Note</th>
      <th scope="col">Debtor</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user->credits as $credit)
                <tr>  
                  <td>{{ $user->created_at }}</td>                
                  <td>(₱){{ $credit->amount }}.00 pesos</td>
                  <td>{{ $credit->receivedBy }}</td>
                  <td>{{ $credit->note }}</td>
                  <td>{{ $credit->debtor_name }}</td>
                </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
@endsection