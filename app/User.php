<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable ;

    protected $fillable = [
        'url_name',
        'email',
        'password',
    ];
    /**
     * 配列には含めない属性
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 同じユーザーかどうか
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function equals(User $user): bool
    {
        return $this->id === $user->id;
    }

}
