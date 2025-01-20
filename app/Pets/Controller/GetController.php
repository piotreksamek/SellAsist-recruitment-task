<?php

declare(strict_types=1);

namespace App\Pets\Controller;

use App\Pets\Client\Client;
use App\Pets\Exception\ClientException;
use App\Pets\Request\GetRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetController
{
    public function __construct(private readonly Client $client)
    {
    }

    public function __invoke(Request $request): View
    {
        return view('pet.get', [
            'pet' => $request->session()->get('pet'),
        ]);
    }

    public function store(GetRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $response = $this->client->getPetById((int) $validated['petId']);
        } catch (ClientException $exception) {
            return redirect()->route('app.pet.get')->with('warning', $exception->getMessage());
        }

        return redirect()
            ->route('app.pet.get')
            ->with('pet', $response)
            ->with('success', 'Pet found');
    }
}
