@component('mail::message')

# This is to inform you:
<strong>Mr./Mrs.</strong> {{ $data['name'] }} that you paid<br/>
<strong>Amount:</strong> {{ $data['amount'] }} pesos to<br/> 
<strong>Received By:</strong> {{ $data['receivedBy'] }}<br/><br/>
#Credit Status:<br/>

<strong>Total Paid:</strong> {{ $data['totalPaid'] }}<br/>
<strong>Remaining Payable:</strong> {{ $data['remainingPayable'] }}<br/>
<strong>Total Payable:</strong> {{ $data['totalPayable'] }}<br/>
<strong>Remaining Days:</strong> {{ $data['remainingDays'] }}<br/>
<strong>Days Paid:</strong> {{ $data['payCount'] }}<br/>

<strong>Message:</strong>

{{ $data['note'] }} 
@endcomponent
 