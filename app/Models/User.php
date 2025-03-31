<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'avatar',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAvatarAttribute()
    {
        if (!empty($this->attributes['avatar']) && Storage::disk('public')->exists($this->attributes['avatar'])) {
            return asset('storage/' . $this->attributes['avatar']);
        }
    
        $nameParts = explode(' ', trim($this->name)); 
        $initials = strtoupper(substr($nameParts[0], 0, 1)); 
        if (count($nameParts) > 1) {
            $initials .= strtoupper(substr($nameParts[1], 0, 1)); 
        }
    
        $hash = md5($this->name); 
        $backgroundColor = '#' . substr($hash, 0, 6); 
    
        return Avatar::create($initials)
            ->setDimension(128, 128)
            ->setFontSize(64)
            ->setBackground($backgroundColor) 
            ->setForeground('#fff') 
            ->toBase64();
    }    
}
