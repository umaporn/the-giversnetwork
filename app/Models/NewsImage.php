<?php
/**
 * News Image Model
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    /** @var array A list of fields which are able to update in this model */
    protected $fillable = [ 'fk_news_id', 'original', 'thumbnail', 'alt_english', 'alt_thai' ];

    /** @var string Table name */
    protected $table = 'news_image';

    /** @var boolean Indicates if this model should be timestamped */
    public $timestamps = false;

    /**
     * Get News model relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo News model relationship
     */
    public function news()
    {
        return $this->belongsTo( 'App\Models\News', 'fk_news_id' );
    }

}
