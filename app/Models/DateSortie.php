<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateSortie extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_S', 'parent_id',
    ]; 
    /**
     * Get the parent that owns the dates.
     */
    public function Pere()
    {
        return $this->belongsTo(Pere::class);
    }
}

