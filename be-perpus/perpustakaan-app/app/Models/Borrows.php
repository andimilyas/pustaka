<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'borrows';
    protected $fillable = [
        'load_date',
        'borrow_date',
        'book_id',
        'user_id',
    ];

    public function book()
    {
        return $this->belongsTo(Books::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    } 
}
