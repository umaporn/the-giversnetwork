<?php
/**
 * Challenge Comment Model
 */

namespace App\Models;

use App\Libraries\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ChallengeComment extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [];

    /** @var string Table name */
    protected $table = 'challenge_comment';

    /**
     * Get challenge comment model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo Challenge comment model relationship
     */
    public function challenge()
    {
        return $this->belongsTo( 'App\Models\Challenge', 'fk_challenge_id' );
    }

    /**
     * Get user model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo User model relationship
     */
    public function users()
    {
        return $this->belongsTo( 'App\Models\Users', 'fk_user_id' );
    }

    /**
     * Get challenge comment.
     *
     * @param Request $request
     * @param Challenge   $challenge
     *
     * @return LengthAwarePaginator
     */
    public function getChallengeComment( Request $request, Challenge $challenge )
    {
        $builder = $this->with( [ 'users' ] )
                        ->where( [ 'fk_challenge_id' => $challenge->id, 'status' => 'public' ] )
                        ->orderBy( 'id', 'desc' );

        $data = Search::search( $builder, 'challenge_comment', $request, [] );

        return $this->transformChallengeComment( $data );
    }

    /**
     * Transform challenge comment information.
     *
     * @param $challengeComment
     *
     * @return mixed
     */
    private function transformChallengeComment( $challengeComment )
    {
        foreach( $challengeComment as $list ){
            $list->setAttribute( 'public_date',
                                 date( 'd', strtotime( $list->public_date ) ) . ' ' .
                                 date( 'F', strtotime( $list->public_date ) ) . ' ' .
                                 date( 'Y', strtotime( $list->public_date ) )
            );
        }

        return $challengeComment;
    }
}
