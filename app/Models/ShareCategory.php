<?php
/**
 * Share Category Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareCategory extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'share_category';

    /**
     * Get share model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Share model relationship
     */
    public function share()
    {
        return $this->belongsTo( 'App\Models\Share', 'fk_category_id' );
    }
}
