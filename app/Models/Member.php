<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'name',
        'penalized',
        'penalty_date'
    ];

    public function book_loans(){
        return $this->hasMany(BookLoan::class, 'member_code', 'code');
    }
}
