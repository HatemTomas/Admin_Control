<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * @var string
     */
    protected $table = 'clients';

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status', 'phone', 'contract_start_date', 'contract_end_date'
    ];

    public function services()
    {
        return $this->hasMany(Services::class, 'user_id');
    }
}
