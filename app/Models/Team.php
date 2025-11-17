<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // Guard the id, allow mass assignment for everything else
    protected $guarded = [];
}
