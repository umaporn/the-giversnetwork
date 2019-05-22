<?php
/**
 * Share Like Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareLike extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

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
}
