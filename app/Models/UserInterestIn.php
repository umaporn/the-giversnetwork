<?php
/**
 * User Interest In Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInterestIn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = ['fk_interest_in_id', 'fk_user_id'];

    /** @var string Table name */
    protected $table = 'users_interest_in';

}
