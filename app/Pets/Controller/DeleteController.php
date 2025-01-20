<?php

declare(strict_types=1);

namespace App\Pets\Controller;

use App\Pets\Client\Client;
use App\Pets\Exception\ClientException;
use App\Pets\Request\DeleteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeleteController
{
    public function __construct(private readonly Client $client)
    {
    }

    public function __invoke(Request $request): View
    {
        return view('pet.delete');
    }

    public function store(DeleteRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $this->client->deletePet((int) $validated['petId']);
        } catch (ClientException $exception) {
            return redirect()->route('app.pet.delete')->with('warning', $exception->getMessage());
        }

        return redirect()->route('app.pet.delete')->with('success', 'Pet deleted.');
    }
}
