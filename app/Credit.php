<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
     protected $fillable = ['amount', 'receivedBy', 'note', 'debtor_name'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}





