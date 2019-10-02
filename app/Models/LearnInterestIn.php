<?php
/**
 * Learn Interest In Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class LearnInterestIn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_interest_in_id', 'fk_learn_id' ];

    /** @var string Table name */
    protected $table = 'learn_interest_in';

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
     * Get learn interest in list.
     *
     * @param string $learnID Learn's id
     *
     * @return Collection Learn interest in list
     */
    public function getLearnInterestInList( string $learnID )
    {
        $interestInList = $this->with( [ 'interestIn' ] )->where( 'fk_learn_id', $learnID )->get();
        $data           = $this->transformLearnInterestInList( $interestInList );

        return $data;
    }

    /**
     * Transform organization category information.
     *
     * @param Collection $interestInList A list of organization category list
     *
     * @return Collection A list of organization category
     */
    private function transformLearnInterestInList( Collection $interestInList )
    {
        foreach( $interestInList as $list ){
            $list->setAttribute( 'interest_title', Utility::getLanguageFields( 'title', $list->interestIn ) );
        }

        return $interestInList;
    }
}
