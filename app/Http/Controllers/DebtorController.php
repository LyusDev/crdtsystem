<?php

namespace App\Http\Controllers;
use App\Debtor;
use Illuminate\Http\Request;
class DebtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $debtors = Debtor::all();
        return view('debtor.index',compact('debtors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('debtor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'firstname' => 'required',
            'middlename' => '',
            'lastname' => '',
            'loanAmount' => 'required',
            'days' => 'required',
            'interest' => 'required',
            'perDayPay' => 'required',
            'email' => 'required'
        ]);

        $debtor = new Debtor([
            'firstname' => $request->get('firstname'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'loanAmount' => $request->get('loanAmount'),
            'days' => $request->get('days'),
            'interest' => $request->get('interest'),
            'perDayPay' => $request->get('perDayPay'),
            'totalPayable' => ($request->get('interest')/100) * $request->get('loanAmount') + $request->get('loanAmount'),
            'email' => $request->get('email'),
        ]);
        
        $debtor->save();
        
        return redirect('/credit/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
