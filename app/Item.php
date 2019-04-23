<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Item
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use Sortable;

    protected $fillable = ['name','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public $sortable = ['id','name', 'category_id'];
}
