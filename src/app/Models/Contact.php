<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

    const GENDERS = [
        self::GENDER_MALE => '男性',
        self::GENDER_FEMALE => '女性',
        self::GENDER_OTHER => 'その他',
    ];


    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
