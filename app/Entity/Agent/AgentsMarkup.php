<?php namespace App\Entity\Agent;

use Illuminate\Database\Eloquent\Model;

class AgentsMarkup extends Model {


    protected $fillable = [
        'agent_id',
        'markup',
        'commission'
    ];

    public function agent()
    {
        return $this->belongsTo('App\User', 'agent_id');
    }
}
