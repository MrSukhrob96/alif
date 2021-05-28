<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Email;
use App\Models\Phone;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name'
    ];

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function add($request)
    {
        $user = new self();
        $user->name = $request->name;
        $user->save();

        $user->emails()->create($request->only('email'));
        $user->phones()->create($request->only('phone'));
        
        return $user;
    }

    public function getOne($id)
    {
        return $this->find($id);
    }

}
