<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    protected $table = 'address';
    protected $guarded = [];
    public $timestamps = false;

    public static function regions()
    {
        return Address::select(DB::raw('MIN(id) AS id'), 'region_id', 'region')
                    ->groupBy('region_id', 'region')
                    ->orderBy('id', 'asc')
                    ->get();
    }

    public static function provinces($regionId = null)
    {
        if ($regionId) {
            return Address::select(DB::raw('MIN(id) as id'), 'province_id', 'province')
                        ->where('region_id', $regionId)
                        ->groupBy('province_id', 'province')
                        ->orderBy('id', 'asc')
                        ->get();
        }
        return [];
    }

    public static function cities($provinceId)
    {
        if ($provinceId) {
            return Address::select(DB::raw('MIN(id) as id'), 'city_id', 'city')
                        ->where('province_id', $provinceId)
                        ->groupBy('city_id', 'city')
                        ->orderBy('id', 'asc')
                        ->get();
        }
        return [];
    }

    public static function baranggays($cityId)
    {
        if ($cityId) {
            return Address::select(DB::raw('MIN(id) as id'), 'baranggay_id', 'baranggay', DB::raw('MIN(zipcode) as zipcode'))
                        ->where('city_id', $cityId)
                        ->groupBy('baranggay_id', 'baranggay')
                        ->orderBy('id', 'asc')
                        ->get();
        }
        return [];
    }
}
