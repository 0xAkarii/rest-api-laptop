<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaptopResource extends JsonResource
{
    // Definisikan properti
    public $status;
    public $message;
    public $resource;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->status = true;
        $this->message = 'Data retrieved successfully';
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource,
        ];
    }
}
