<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 07/03/2018
 * Time: 12:43 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Aggregator extends Model
{

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_info_id' => 'integer',
        'fully_scraped' => 'integer',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Many to many relationship with artist model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function artists()
    {
        return $this->belongsToMany('App\Artist', 'aggregated_artists');
    }

    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }

    /**
     * Get the connection of the entity.
     *
     * @return string|null
     */
    public function getQueueableConnection()
    {
        // TODO: Implement getQueueableConnection() method.
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        // TODO: Implement resolveRouteBinding() method.
    }
}