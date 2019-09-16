<?php
/**
 * User Interest In Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserInterestIn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_interest_in_id', 'fk_user_id' ];

    /** @var string Table name */
    protected $table = 'users_interest_in';

    /**
     * Get interest in model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Interest in model relationship
     */
    public function interestIn()
    {
        return $this->belongsTo( 'App\Models\InterestIn', 'fk_interest_in_id' );
    }

    /**
     * Get user interest in list.
     *
     * @param string $userID User's id
     *
     * @return Collection Users interest in list
     */
    public function getUserInterestInList( string $userID )
    {
        $interestInList = $this->with( [ 'interestIn' ] )->where( 'fk_user_id', $userID )->get();
        $data           = $this->transformUserInterestInList( $interestInList );

        return $data;
    }

    /**
     * Transform organization category information.
     *
     * @param Collection $interestInList A list of organization category list
     *
     * @return Collection A list of organization category
     */
    private function transformUserInterestInList( Collection $interestInList )
    {
        foreach( $interestInList as $list ){
            $list->setAttribute( 'interest_title', Utility::getLanguageFields( 'title', $list->interestIn ) );
        }

        return $interestInList;
    }
}
