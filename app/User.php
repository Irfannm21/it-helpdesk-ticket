<?php

namespace App;

use App\Models\Models\Organization\Position;
use App\Models\Product;
use App\Models\Traits\ResponseTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, ResponseTrait, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password','code',"position_id",'pc_id', 'printer_id', 'network_id',
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

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $this->password = Hash::make($request->password);
            $this->save();
            $this->commitSaved();
            if(request()->route()->getName() == 'client.store') {
                return redirect()->route('client.index')->with('message', 'Client added successfully!');
            } else {
                return redirect()->route('client.index')->with('message', 'Client Updated successfully!');
            }
        } catch (\Exception $e) {
            return $this->rollbackSaved($e);
        }
    }

    public function handleDestroy()
    {
        $this->beginTransaction();
        try {
            $this->delete();
            $this->commitDeleted();
            return redirect()->route('client.index')->with('message', 'Delete Client successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }


}
