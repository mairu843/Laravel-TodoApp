<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    // protected $guarded = array('id');

    protected $fillable = ['content'];

    public static $rules = array(
        'content' => 'required|max:20',
    );

    public function getData()
    {
        $txt = $this->content;
        return $txt;
    }
}
