<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * One To Many (Inverse) relation between Server and Hosting models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hosting()
    {
        return $this->belongsTo(Hosting::class);
    }
}
