<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Hotel;

class Location extends Model
{
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
