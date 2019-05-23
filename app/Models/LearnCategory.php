<?php
/**
 * LearnCategory Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LearnCategory extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'learn_category';

    /**
     * Get learn model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Learn model relationship
     */
    public function share()
    {
        return $this->belongsTo( 'App\Models\Learn', 'fk_category_id' );
    }
}
