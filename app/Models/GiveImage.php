<?php
/**
 * Give Image Model
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiveImage extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_give_id', 'original', 'thumbnail', ];

    /** @var string Table name */
    protected $table = 'give_image';

    /**
     * Get give image model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Give image model relationship
     */
    public function give()
    {
        return $this->belongsTo( 'App\Models\Give', 'fk_give_id' );
    }
}
