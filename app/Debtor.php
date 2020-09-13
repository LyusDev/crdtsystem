<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    protected $fillable = ['firstname', 'middlename', 'lastname', 'loanAmount', 'days', 'interest', 'perDayPay','totalPayable', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
