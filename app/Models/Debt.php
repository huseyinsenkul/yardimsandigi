<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $table = 'debts';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getPayments()
    {
        return $this->hasMany(Payment::class, 'debt_id', 'id');
    }
}
