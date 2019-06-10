<?php
/**
 * Share Comment Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ShareComment extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'share_comment';

    /**
     * Get share comment model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Share comment model relationship
     */
    public function share()
    {
        return $this->belongsTo( 'App\Models\Share', 'fk_share_id' );
    }

    /**
     * Get user model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo User model relationship
     */
    public function users()
    {
        return $this->belongsTo( 'App\Models\Users', 'fk_user_id' );
    }

    /**
     * Get share comment.
     *
     * @param Share $share
     *
     * @return LengthAwarePaginator
     */
    public function getShareComment( Share $share )
    {
        $data = $this->with( [ 'users' ] )->where( [ 'fk_share_id' => $share->id ] )->get();

        return $this->transformShareComment( $data );
    }

    private function transformShareComment( $shareComment )
    {
        foreach( $shareComment as $list ){
            $list->setAttribute( 'public_date',
                                 date( 'd', strtotime( $list->public_date ) ) . ' ' .
                                 date( 'F', strtotime( $list->public_date ) ) . ' ' .
                                 date( 'Y', strtotime( $list->public_date ) )
            );

        }

        return $shareComment;
    }
}
