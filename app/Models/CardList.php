<?php

namespace App\Models;

use Czim\Listify\Listify;
use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    use Listify;
    public function __construct(array $attributes = array(), $exists = false)
    {
        parent::__construct($attributes, $exists);
        $this->initListify([
            'scope' => $this->user()
        ]);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'card_lists';

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
    protected $fillable = ['name', 'position'];

    // relation
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cards()
    {
        return $this->hasMany('App\Models\Card')->orderBy('position', 'asc');
    }
}
