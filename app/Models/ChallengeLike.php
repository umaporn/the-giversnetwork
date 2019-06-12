<?php
/**
 * Challenge Like Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChallengeLike extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_challenge_id', 'count' ];

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

    /**
     * Get user like content.
     *
     * @return mixed
     */
    public function getIsChallengeLike( Challenge $challenge )
    {

        if( !empty( Auth::user()->id ) ){
            $result = $this->where( [ 'fk_user_id' => Auth::user()->id, 'fk_challenge_id' => $challenge->id ] )->get();

            return $result->isNotEmpty();
        }

    }
}
