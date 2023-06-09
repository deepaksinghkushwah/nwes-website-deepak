<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =['page_id','content','user_id'];
    public function page(){
        return $this->belongsTo(Page::class,"page_id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }


}
