<?php
/**
 * Share Like Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShareLike extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_user_id', 'fk_share_id', 'count' ];

    /** @var string Table name */
    protected $table = 'share_like';

    /**
     * Get share like model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Share like model relationship
     */
    public function share()
    {
        return $this->belongsTo( 'App\Models\Share', 'fk_share_id' );
    }

    /**
     * Get user like content.
     *
     * @param Share $share Share model
     *
     * @return mixed
     */
    public function getIsShareLike( Share $share )
    {

        if( !empty( Auth::user()->id ) ){
            $result = $this->where( [ 'fk_user_id' => Auth::user()->id, 'fk_share_id' => $share->id ] )->get();

            return $result->isNotEmpty();
        }

    }
}
