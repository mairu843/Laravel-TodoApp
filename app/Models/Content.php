<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    public function getCreatedAt()
    {
        return new Carbon($this->created_at);
    }
    public function getId()
    {
        return $this->id;
    }
}
