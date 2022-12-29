<?php namespace Dimsog\Blog\Models;

use Model;
use System\Models\File;

/**
 * PostCard Model
 */
class PostCard extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dimsog_blog_post_cards';

    public $timestamps = false;

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => [File::class, 'delete' => true]
    ];
    public $attachMany = [];


    public function filterFields($fields)
    {
        $fields->text->hidden = true;
        $fields->code->hidden = true;
        $fields->image->hidden = true;

        switch ($fields->type->value) {
            case 'text':
                $fields->text->hidden = false;
                break;
            case 'code':
                $fields->code->hidden = false;
                break;
            case 'image':
                $fields->image->hidden = false;
                break;
        }
    }

    public function getTypeOptions(): array
    {
        return [
            'text' => 'Text',
            'code' => 'Code',
            'image' => 'Image'
        ];
    }
}
