<?php

namespace App\Models;

use App\Models\User;
use App\Models\AttachFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function copy()
    {
        return $this->hasMany('App\Models\CopyUser');
    }
    public function attachfiles()
    {
        return $this->belongsTo(AttachFile::class);
    }
}
