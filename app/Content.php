<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Content extends Model
{
    //
    use Notifiable;
    public function getRouteKeyName(){
        return 'id';
    }
}
