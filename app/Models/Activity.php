<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $fillable = [
        'id',
        'admin_id',
        'officer_id',
        'keterangan'
    ];

    public function user(){
        return $this -> hasOne(User::class, 'id', 'user_id');
    }
}
