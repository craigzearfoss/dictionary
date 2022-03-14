<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Plurality extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the LangEs's for the Plurality.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function langEs()
    {
        return $this->hasMany('\App\Models\Es');
    }

    /**
     * Returns the options for a select list.
     *
     * @return array
     */
    public static function selectOptions($labelField = 'name')
    {
        $data = [];
        foreach (collect(self::all()->toArray())->sortBy('name') as $row) {
            $data[$row['id']] = $row[$labelField];
        };

        return $data;
    }
}
