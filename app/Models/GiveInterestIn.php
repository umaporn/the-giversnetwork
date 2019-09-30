<?php
/**
 * Give Interest In Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class GiveInterestIn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_interest_in_id', 'fk_give_id' ];

    /** @var string Table name */
    protected $table = 'give_interest_in';

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
     * Get give interest in list.
     *
     * @param string $giveID Give's id
     *
     * @return Collection Give interest in list
     */
    public function getGiveInterestInList( string $giveID )
    {
        $interestInList = $this->with( [ 'interestIn' ] )->where( 'fk_give_id', $giveID )->get();
        $data           = $this->transformGiveInterestInList( $interestInList );

        return $data;
    }

    /**
     * Transform organization category information.
     *
     * @param Collection $interestInList A list of organization category list
     *
     * @return Collection A list of organization category
     */
    private function transformGiveInterestInList( Collection $interestInList )
    {
        foreach( $interestInList as $list ){
            $list->setAttribute( 'interest_title', Utility::getLanguageFields( 'title', $list->interestIn ) );
        }

        return $interestInList;
    }
}
