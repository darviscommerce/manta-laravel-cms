<?php

namespace Manta\LaravelCms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'locale',
        'company_id',
        'company',
        'address',
        'zipcode',
        'city',
        'phone_input',
        'phone',
        'email',
        'facebook',
        'instagram',
        'twitter'
    ];
}
