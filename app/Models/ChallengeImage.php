<?php
/**
 * Challenge Image Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeImage extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'challenge_image';

    /**
     * Get challenge image model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Challenge image model relationship
     */
    public function challenge()
    {
        return $this->belongsTo( 'App\Models\Challenge', 'fk_challenge_id' );
    }
}
