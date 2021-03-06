<?php

namespace Klikskola\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{

    /**
     * Upload the series image passed in the request
     * 
    */
    public function uploadSeriesImage() 
    {
        $uploadedImage = $this->image;

        $this->fileName = str_slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();

        $uploadedImage->storePubliclyAs(
            'public/series',  $this->fileName
        );

        return $this;
    }
}
