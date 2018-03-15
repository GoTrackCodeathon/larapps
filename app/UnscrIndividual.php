<?php

namespace App;

use SimpleXMLElement;
use Illuminate\Database\Eloquent\Model;

class UnscrIndividual extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public static function createFromXML(SimpleXMLElement $xml)
    {
        $individuals = json_decode(json_encode($xml));

        foreach ($individuals->INDIVIDUAL as $individual) {
            try {
                $baseClass    = '\stdClass';

                $originScript = $individual->NAME_ORIGINAL_SCRIPT ?? null;

                if ($originScript instanceof $baseClass) {
                    $originScript = json_encode($originScript);
                }

                $nationality = isset($individual->NATIONALITY)
                    ? $individual->NATIONALITY->VALUE : null;

                if (!is_array($nationality) && !is_null($nationality)) {
                    $nationality = [$nationality];
                }

                $nationality = is_null($nationality) ? $nationality : json_encode($nationality);

                self::create([
                    'id'               => $individual->DATAID,
                    'name'             => $individual->FIRST_NAME ?? null,
                    'list_type'        => $individual->UN_LIST_TYPE ?? null,
                    'reference_number' => $individual->REFERENCE_NUMBER ?? null,
                    'listed_on'        => $individual->LISTED_ON ?? null,
                    'comments'         => $individual->COMMENTS1 ?? null,
                    'name_origin'      => $originScript,
                    'nationality'      => $nationality,
                    'date_of_birth'    => json_encode($individual->INDIVIDUAL_DATE_OF_BIRTH),
                    'place_of_birth'   => json_encode($individual->INDIVIDUAL_PLACE_OF_BIRTH),
                    'name_alias'       => json_encode($individual->INDIVIDUAL_ALIAS),
                    'documents'        => json_encode($individual->INDIVIDUAL_DOCUMENT),
                ]);
            } catch (\Exception $e) {
                dump($individual);
                throw $e;
            }
        }
    }

    public function getNameAliasAttribute($value)
    {
        $alias = $value === '{}' ? null : json_decode($value);

        $alias = !is_array($alias) && !is_null($alias) ? [$alias] : $alias;

        return array_filter(array_map(function ($item) {
            return $item->ALIAS_NAME;
        }, $alias), function ($item) {
            $baseClass = '\stdClass';
            return !$item instanceof $baseClass;
        });
    }

    public function getDateOfBirthAttribute($value)
    {
        return json_decode($value);
    }

    public function getNationalityAttribute($value)
    {
        return json_decode($value);
    }

    public function getPlaceOfBirthAttribute($value)
    {
        return json_decode($value);
    }

    public function getDocumentsAttribute($value)
    {
        $documents = $value === '{}' ? null : json_decode($value);

        return !is_array($documents) && !is_null($documents) ? [$documents] : $documents;
    }
}
