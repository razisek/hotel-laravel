<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotFoundResource extends JsonResource
{
    public function __construct(?string $message = null)
    {
        $this->message = $message;
    }

    public function toArray($request)
    {
        return [
            'result' => null,
            'success' => false,
            'code' => 404,
            'message' => $this->message,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(404);
    }
}
