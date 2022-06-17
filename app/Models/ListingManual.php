<?php

namespace App\Models;

class ListingManual {
    public static function all() {
        return [
                [
                'id' => 0,
                'title' => 'post one',
                'body' => 'body one'
                ],
                [
                'id' => 1,
                'title' => 'post one',
                'body' => 'body one'
            ]
                ];
    }

    //Single listing
    public static function find($id) {
        $listings = self::all();
        foreach($listings as $listing) {
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}