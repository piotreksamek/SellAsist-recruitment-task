<?php

declare(strict_types=1);

namespace App\Pets\Controller;

use App\Pets\Client\Client;
use App\Pets\DTO\PetDTO;
use App\Pets\Enum\Category;
use App\Pets\Enum\Status;
use App\Pets\Enum\Tag;
use App\Pets\Exception\ClientException;
use App\Pets\Request\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UpdateController
{
    public function __construct(private readonly Client $client)
    {
    }

    public function __invoke(Request $request): View
    {
        $categories = Category::cases();
        $tags = Tag::cases();
        $statuses = Status::cases();

        return view('pet.update', compact('categories', 'tags', 'statuses'));
    }

    public function store(UpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $data = PetDTO::from($validated)->toArray();

        try {
            $this->client->updatePet($data);
        } catch (ClientException $exception) {
            return redirect()->route('app.pet.update')->with('warning', $exception->getMessage());
        }

        return redirect()->route('app.pet.update')->with('success', 'Pet has been updated.');
    }
}
