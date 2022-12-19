<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function __construct($resource, bool $status, ?string $message = null)
    {
        parent::__construct($resource);

        $this->status = $status;
        $this->message = $message;
    }

    public function toArray($request)
    {
        return [
            'result' => $this->resource,
            'success' => $this->status,
            'code' => 200,
            'message' => $this->message,
        ];
    }
}
