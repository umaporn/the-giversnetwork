<?php
/**
 * Interest In Model
 */
namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class InterestIn extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'interest_in';

    /**
     * Get interest in model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany Interest in model relationship
     */
    public function ShareInterestIn()
    {
        return $this->hasMany( 'App\Models\ShareInterestIn', 'fk_interest_in_id' );
    }

    /**
     * Get interest in model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany Interest in model relationship
     */
    public function GiveInterestIn()
    {
        return $this->hasMany( 'App\Models\GiveInterestIn', 'fk_interest_in_id' );
    }

    /**
     * Get interest in model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany Interest in model relationship
     */
    public function LearnInterestIn()
    {
        return $this->hasMany( 'App\Models\LearnInterestIn', 'fk_interest_in_id' );
    }

    /**
     * Get interest in list.
     */
    public function getInterestInList()
    {
        $interestList = $this->get();
        $data         = $this->transformInterestInList( $interestList );

        return $data;
    }

    /**
     * Transform interest in information.
     *
     * @param Collection $interestList A list of interest in list
     *
     * @return Collection A list of interest in
     */
    private function transformInterestInList( Collection $interestList )
    {
        foreach( $interestList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
        }

        return $interestList;
    }
}
