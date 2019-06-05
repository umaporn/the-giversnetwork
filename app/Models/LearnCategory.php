<?php
/**
 * LearnCategory Model
 */

namespace App\Models;

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
     * @return \Illuminate\Database\Eloquent\Relations\hasMany Learn model relationship
     */
    public function learn()
    {
        return $this->hasMany( 'App\Models\Learn', 'fk_category_id' );
    }


}
