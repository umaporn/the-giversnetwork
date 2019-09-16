<?php
/**
 * Share Image Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareImage extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_share_id', 'original', 'thumbnail' ];

    /** @var string Table name */
    protected $table = 'share_image';

    /**
     * Get share image model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Share image model relationship
     */
    public function share()
    {
        return $this->belongsTo( 'App\Models\Share', 'fk_share_id' );
    }
}
