<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'revenues';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function getUser()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
