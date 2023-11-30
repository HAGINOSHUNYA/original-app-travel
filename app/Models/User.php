<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;//メール送信
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\CustomVerifyEmail;//認証メールとユーザーを紐づける
use App\Notifications\CustomResetPassword;//pwリセットメールとユーザーを紐づける
use Overtrue\LaravelFavorite\Traits\Favoriter;//お気に入り


class User extends Authenticatable implements MustVerifyEmail//メール送信


{
    use HasApiTokens, HasFactory, Notifiable, Favoriter;//お気に入り

    public function sendEmailVerificationNotification()
    {//認証メールとユーザーを紐づける
        $this->notify(new CustomVerifyEmail());
    }

    public function sendPasswordResetNotification($token)
     {//pwリセットメールとユーザーを紐づける
        $this->notify(new CustomResetPassword($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [//アカウント情報保存
        'name',
        'email',
        'password',
        'postal_code',
        'address',
        'comment'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plans(){//プランテーブルとのリレーション
        return $this->hasMany(Plan::class);
    }
    public function schedules() {//スケジュールとのリレーション
        return $this->hasMany(Schedule::class);
    }  
}
