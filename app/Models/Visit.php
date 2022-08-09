<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class visit extends Model
{
    use HasFactory;

      protected $fillable = [
        'requestor_id',
        'request_date',
        'visitor_list',
        'contact_number',
        'visit_date',
        'has_car',
        'code',
        'plates',
        'status',
        'qr_image'
    ];


    public function user()
    {
    	return $this->belongsTo(User::class,'requestor_id');
    }


}
