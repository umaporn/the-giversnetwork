<?php
/**
 * Give Category Model
 */

namespace App\Models;

use App\Libraries\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GiveCategory extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'give_category';

    /**
     * Get a list of give category for displaying.
     *
     * @return Collection A list of give category for home page
     */
    public function getGiveCategoryList()
    {
        $query = $this->get();

        return $this->transformHomeGiveCategoryContent( $query );
    }

    /**
     * Transform give category information.
     *
     * @param Collection $homeGiveCategoryList A list of give
     *
     * @return Collection Home give list for display
     */
    private function transformHomeGiveCategoryContent( Collection $homeGiveCategoryList )
    {
        foreach( $homeGiveCategoryList as $list ){
            $list->setAttribute( 'title', Utility::getLanguageFields( 'title', $list ) );
        }

        return $homeGiveCategoryList;
    }
}
