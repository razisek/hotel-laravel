<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexCollection extends ResourceCollection
{
    public function __construct($resource, bool $success, ?string $message = null)
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
        $this->success = $success;
        $this->message = $message;
    }

    public function toArray($request)
    {
        return [
            'result' => $this->collection,
            'code' => 200,
            'success' => $this->success,
            'message' => $this->message,
        ];
    }
}
