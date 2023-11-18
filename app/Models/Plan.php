<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//ソート機能

class Plan extends Model
{
    use HasFactory,Sortable;//モデルファクトリ,ソート;

    public function user(){//ユーザーとの紐づけ
        return $this->belongsTo(User::class);
    }
    public function schedule(){//スケジュールの紐づけ
        return $this->hasMany(Schedule::class);
    }
}
