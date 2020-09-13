<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Credit;
use App\Debtor;

use App\Mail\ContactFormMail;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $credit = Credit::all()->toArray();

        return view('credit.index', compact('credit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $debtors = Debtor::all();
        $credits = Credit::all();

        return view('credit.create', compact('debtors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'receivedBy' => '',
            'note' => '',
            'debtor_name' => 'required'
        ]);

        $credit = new Credit([
            'amount' => $request->get('amount'),
            'receivedBy' => $request->get('receivedBy'),
            'note' => $request->get('note'),
            'debtor_name' => $request->get('debtor_name')
        ]);
       

        
        $userEmail = Debtor::select('email')->where('firstname', $request->get('debtor_name'))->get();

       
        $credit->save();    

        $credits = Credit::select('*')->where('debtor_name', $request->get('debtor_name'))->get();

        $debtors = Debtor::select('*')->where('firstname', $request->get('debtor_name'))->get();

        

        $totalPayable = $debtors->sum('interest') / 100 * $debtors->sum('loanAmount') + $debtors->sum('loanAmount');

        $totalPaid = $credits->sum('amount');

        $remainingPayable = $totalPayable - $totalPaid;

        $payCount = $totalPaid / $debtors->sum('perDayPay');

        $days = $totalPayable / $debtors->sum('perDayPay');
        
        $remainingDays = $days - $payCount;

        $data = [
            'name' => $credit['debtor_name'],
            'amount' => $credit['amount'],
            'receivedBy' => $credit['receivedBy'],
            'note' => $credit['note'],
            'totalPaid' => $totalPaid,
            'remainingPayable' => $remainingPayable,
            'remainingDays' => $remainingDays,
            'payCount' => $payCount,
            'totalPayable' => $totalPayable

        ];
               
        Mail::to($userEmail)->send(new ContactFormMail($data));

        return redirect('/credit/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($firstname)
    {
        $credits = Credit::select('*')->where('debtor_name', $firstname)->get();

        $debtors = Debtor::select('*')->where('firstname', $firstname)->get();

        

        $totalPayable = $debtors->sum('interest') / 100 * $debtors->sum('loanAmount') + $debtors->sum('loanAmount');

        $totalPaid = $credits->sum('amount');

        $remainingPayable = $totalPayable - $totalPaid;

        $payCount = $totalPaid / $debtors->sum('perDayPay');

        $days = $totalPayable / $debtors->sum('perDayPay');
        
        $remainingDays = $days - $payCount;
       
        return view('credit.show', compact('credits', 'debtors', 'totalPaid', 'remainingPayable', 'totalPayable', 'days', 'firstname','remainingDays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
