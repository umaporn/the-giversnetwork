<?php
/**
 * Share Interest In Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ShareInterestIn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_interest_in_id', 'fk_share_id' ];

    /** @var string Table name */
    protected $table = 'share_interest_in';

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
     * Get share interest in list.
     *
     * @param string $shareID Share's id
     *
     * @return Collection Share interest in list
     */
    public function getShareInterestInList( string $shareID )
    {
        $interestInList = $this->with( [ 'interestIn' ] )->where( 'fk_share_id', $shareID )->get();
        $data           = $this->transformShareInterestInList( $interestInList );

        return $data;
    }

    /**
     * Transform organization category information.
     *
     * @param Collection $interestInList A list of organization category list
     *
     * @return Collection A list of organization category
     */
    private function transformShareInterestInList( Collection $interestInList )
    {
        foreach( $interestInList as $list ){
            $list->setAttribute( 'interest_title', Utility::getLanguageFields( 'title', $list->interestIn ) );
        }

        return $interestInList;
    }
}
