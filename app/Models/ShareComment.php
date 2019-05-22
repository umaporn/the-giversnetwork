<?php
/**
 * Share Comment Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
