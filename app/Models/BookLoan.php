<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'member_code',
        'book_code',
        'qty',
        'borrow_date',
        'returned'
    ];

    public function member(){
        return $this->belongsTo(Member::class, 'member_code', 'code');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'book_code', 'code');
    }
}
