<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PetApiService
{
    protected $baseUrl = 'https://petstore.swagger.io/v2';

    public function getAllPets()
    {
        return Http::withHeaders([
            'Cache-Control' => 'no-cache',
            'Pragma' => 'no-cache',
        ])->get("https://petstore.swagger.io/v2/pet/findByStatus", [
            'status' => 'available',
        ])->json();
    }

    public function getPet($id)
    {
        try {
            $response = Http::get("https://petstore.swagger.io/v2/pet/{$id}");
            \Log::info("Odpowiedź GET /pet/{$id}: " . $response->body());

            if ($response->ok()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            \Log::error("Błąd przy getPet($id): " . $e->getMessage());
        }

        return null;
    }


    public function createPet($data)
    {
        $response = Http::post("{$this->baseUrl}/pet", $this->transformData($data));

        return $response->successful() ? $response->json() : null;
    }

    public function updatePet($data)
    {
        $response = Http::put("{$this->baseUrl}/pet", $this->transformData($data));

        return $response->successful() ? $response->json() : null;
    }

    public function deletePet($id)
    {
        $response = Http::delete("{$this->baseUrl}/pet/{$id}");

        return $response->successful();
    }

    protected function transformData($data)
    {
        return [
            'id' => $data['id'] ?? rand(1000000, 9999999),
            'name' => $data['name'],
            'status' => $data['status'],
            'category' => [
                'id' => 0,
                'name' => $data['category'] ?? 'brak',
            ],
            'photoUrls' => [
                $data['photo_url'] ?? 'https://placekitten.com/200/200'
            ],
            'tags' => array_map(fn($tag) => ['id' => 0, 'name' => $tag], explode(',', $data['tags'] ?? '')),
        ];
    }
}
