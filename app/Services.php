<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    /**
     * @var string
     */
    protected $table = 'services';

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'type', 'user_id', 'link', 'description'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }
}
