<?php

declare(strict_types=1);

namespace App\Pets\Client;

use App\Pets\DTO\PetResponseDTO;
use App\Pets\Exception\ClientException;
use Illuminate\Support\Facades\Http;
use Exception;

class Client
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('sellasist.petstore_api_url', 'https://petstore.swagger.io/v2');
    }

    public function getPetById(int $id): PetResponseDTO
    {
        try {
            $response = Http::get(sprintf('%s%s%s', $this->apiUrl, '/pet/', $id));
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientException('Pet not found');
        }

        return PetResponseDTO::from($response->json());
    }

    public function createPet(array $data): PetResponseDTO
    {
        try {
            $response = Http::post(sprintf('%s%s', $this->apiUrl, '/pet'), $data);
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientException('Pet not found');
        }

        return PetResponseDTO::from($response->json());
    }

    public function updatePet(array $data): void
    {
        try {
            $response = Http::post(sprintf('%s%s', $this->apiUrl, '/pet'), $data);
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage());
        }

        if ($response->getStatusCode() === 404) {
            throw new ClientException('Pet not found');
        }

        if ($response->getStatusCode() === 405) {
            throw new ClientException('Did not pass validation');
        }
    }

    public function deletePet(int $id): void
    {
        try {
            $response = Http::delete(sprintf('%s%s%s', $this->apiUrl, '/pet/', $id));
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientException('Pet not found');
        }
    }
}
