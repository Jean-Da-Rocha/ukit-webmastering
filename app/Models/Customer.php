<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * One To Many (Inverse) relation between Customer and Hosting models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hostings()
    {
        return $this->hasMany(Hosting::class);
    }

    /**
     * One To Many relation between Customer and Project models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the customer's full address.
     *
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return "{$this->address} {$this->zip_code} {$this->city}";
    }
}
