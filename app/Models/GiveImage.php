<?php
/**
 * Give Image Model
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiveImage extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'give_image';
}
