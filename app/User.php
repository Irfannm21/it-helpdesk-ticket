<?php

namespace App;

use App\Models\Models\Organization\Position;
use App\Models\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password','pc_id', 'printer_id', 'network_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }

    public function pc()
    {
        return $this->belongsTo(Product::class,'pc_id');
    }

    public function printer()
    {
        return $this->belongsTo(Product::class,'printer_id');
    }

    public function network()
    {
        return $this->belongsTo(Product::class,'network_id');
    }

    public function getFullNameAttribute()
    {
        if (is_null($this->username)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->username}";
    }


}
