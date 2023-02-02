<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BidData;

class Postingan extends Model
{
    use HasFactory;
    protected $table = 'postingans';
    protected $fillable = [
        'gambar',
        'winner',
        'status',
        'title',
        'subtitle',
        'location',
        'descandcond',
        'endauc',
        'start_price',
    ];

    public function bidData(){
        return $this -> hasMany(BidData::class,"postingan_id", "id");
    }
}
