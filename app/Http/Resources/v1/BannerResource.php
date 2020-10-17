<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class BannerResource extends JsonResource
{
    public function toArray( $request )
    {

        if ( $this->resource instanceof Collection ) {
            return BannerResource::collection($this->resource);
        }

        $result = [
            'id'         => $this->id,
            'name'       => $this->name,
            'image'      => $this->image(),
        ];
        return $result;
    }

    private function image()
    {
        if (!blank($this->getMedia('banners'))) {
            return asset($this->getFirstMediaUrl('banners'));
        }
        return asset( 'assets/img/default/banner.png');
    }
}