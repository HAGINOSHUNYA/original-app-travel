<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;//お気に入り
use Kyslik\ColumnSortable\Sortable;//ソート機能


class Schedule extends Model
{
    use HasFactory,  Sortable,Favoriteable;//ソート,お気に入り
    public function plan(){//プランとの紐づけ
        return $this->belongsTo(Plan::class);
    }

    public function user() {//ユーザーとの紐づけ
        return $this->belongsTo(User::class);
    }
    // ソート可能なカラムを定義
    public $sortable = ['start_day','start_time'];
}
