<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postingan;

class BidData extends Model
{
    use HasFactory;

    protected $fillable = [
        'bid',
        'user_id',
        'postingan_id'
    ];

    protected $table = 'bid_data';

    public function postingans(){
        return $this -> belongsTo(Postingan::class);
    }

    public function user(){
        return $this -> belongsTo(User::class);
    }
}
