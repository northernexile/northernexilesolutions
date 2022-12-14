<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $page_id
 * @property int $content_id
 */
class PageContent extends Model
{
    use HasFactory;

    /** @var string  */
    public $table = 'page_content';

    /**
     * @var string[]
     */
    protected $fillable = [
        'page_id',
        'content_id'
    ];

    /**
     * @return BelongsTo
     */
    public function page() :BelongsTo
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function content() :BelongsTo
    {
        return $this->belongsTo(Content::class,'content_id','id');
    }
}
