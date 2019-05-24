<?php
/**
 * Challenge Like Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeLike extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'challenge_like';

    /**
     * Get challenge like model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Challenge like model relationship
     */
    public function challenge()
    {
        return $this->belongsTo( 'App\Models\Challenge', 'fk_challenge_id' );
    }
}
