<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multipleuploads extends Model
{
    use HasFactory;
    protected $table = 'multiuploads';
    protected $primaryKey = 'id';
    protected $fillable = ['filename', 'created_at', 'updated_at'];
}
