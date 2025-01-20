<?php

declare(strict_types=1);

namespace App\Pets\Controller;

use App\Pets\Client\Client;
use App\Pets\DTO\PetDTO;
use App\Pets\Enum\Category;
use App\Pets\Enum\Status;
use App\Pets\Enum\Tag;
use App\Pets\Exception\ClientException;
use App\Pets\Request\CreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CreateController
{
    public function __construct(private readonly Client $client)
    {
    }

    public function __invoke(): View
    {
        $categories = Category::cases();
        $tags = Tag::cases();
        $statuses = Status::cases();

        return view('pet.create', compact('categories', 'tags', 'statuses'));
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $data = PetDTO::from($validated)->toArray();

        try {
            $response = $this->client->createPet($data);
        } catch (ClientException $exception) {
            return redirect()->route('app.pet.create')->with('success', $exception->getMessage());
        }

        return redirect()->route('app.pet.create')
            ->with('success', sprintf('Pet added successfully. Pet ID: %s', $response->id));
    }
}
