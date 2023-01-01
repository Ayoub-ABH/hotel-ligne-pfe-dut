<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use \TCG\Voyager\Models\User;

class Hotel extends Model
{
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
