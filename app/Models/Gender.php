<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Gender extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev',
        'description'
    ];

    /**
     * Get the LangEs's for the Gender.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gender()
    {
        return $this->hasMany('\App\Models\LangEs');
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
