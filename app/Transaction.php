<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['country','status'];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
