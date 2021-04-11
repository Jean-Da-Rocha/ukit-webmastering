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
     * Get all the hostings for the customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hostings()
    {
        return $this->hasMany(Hosting::class);
    }

    /**
     * Get all the projects for the customer.
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
