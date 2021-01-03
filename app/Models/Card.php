<?php

namespace App\Models;

use Czim\Listify\Listify;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use Listify;
    public function __construct(array $attributes = array(), $exists = false)
    {
        parent::__construct($attributes, $exists);
        $this->initListify([
            'scope' => $this->card_list()
        ]);
    }
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cards';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'card_list_id', 'position'];

    // relation
    public function card_list()
    {
        return $this->belongsTo('App\Models\CardList');
    }
}
