<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tx()
    {
        return $this->hasMany(App\FiuReport::class, 'acc_number', 'account');
    }

    public function rx()
    {
        return $this->hasMany(App\FiuReport::class, 'destination_acc', 'account');
    }
}
