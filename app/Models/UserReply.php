<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Massage;

class UserReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postingan_id',
        'receipent_name',
        'postal_code',
        'phone_number',
        'address',
        'desc'
    ];

    protected $table = 'user_replies';

    public function user(){
        return $this -> hasOne(User::class, 'user_id', 'id');
    }

    public function inbox(){
        return $this -> hasOne(Massage::class, 'inbox_id', 'id');
    }

    public function bidData(){
        return $this -> hasMany(BidData::class,"postingan_id", "id");
    }
}
