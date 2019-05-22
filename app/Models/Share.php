<?php
/**
 * Share Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = ['fk_user_id', 'fk_category_id', 'title_thai', 'title_english',
            'description_thai', 'description_english', 'file_path', 'view', 'status', ];

    /** @var string Table name */
    protected $table = 'share';

}
