@extends('base')

@section('title', __('messages.pet.details.title'))

@section('content')
    <h2>{{ __('messages.pet.details.title') }}</h2>

    <form action="{{ route('app.pet.get.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="petId" class="form-label">{{ __('messages.pet.details.pet_id') }}</label>
            <input type="text" class="form-control @error('petId') is-invalid @enderror" id="petId" name="petId"
                   value="{{ old('petId') }}" required>
            @error('petId')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.action.find') }}</button>
    </form>

    @if (isset($pet))
        <h2 class="mt-5">{{ __('messages.pet.details.found') }}</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{{ __('messages.pet.details.id') }}</th>
                <th>{{ __('messages.pet.details.name') }}</th>
                <th>{{ __('messages.pet.details.category') }}</th>
                <th>{{ __('messages.pet.details.photo_urls') }}</th>
                <th>{{ __('messages.pet.details.tags') }}</th>
                <th>{{ __('messages.pet.details.status') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->name }}</td>
                <td>
                    @if($pet->category)
                        {{ __('messages.pet.details.id') }}: {{ $pet->category->id }}
                        {{ __('messages.pet.details.name') }}: {{ $pet->category->name }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <ul>
                        @foreach ($pet->photoUrls as $url)
                            <li>{{ $url }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @if($pet->tags)
                        <ul>

                            @foreach ($pet->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        -
                    @endif
                </td>
                <td>{{ $pet->status ?? '-' }}</td>
            </tr>
            </tbody>
        </table>
    @endif
@endsection
