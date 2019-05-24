<?php
/**
 * Challenge Comment Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeComment extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'challenge_comment';

    /**
     * Get challenge comment model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Challenge comment model relationship
     */
    public function challenge()
    {
        return $this->belongsTo( 'App\Models\Challenge', 'fk_challenge_id' );
    }
}
