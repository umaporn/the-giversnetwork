<?php
/**
 * Challenge Category Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'challenge_category';

    /**
     * Get challenge model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Challenge model relationship
     */
    public function challenge()
    {
        return $this->belongsTo( 'App\Models\Challenge', 'fk_category_id' );
    }
}
