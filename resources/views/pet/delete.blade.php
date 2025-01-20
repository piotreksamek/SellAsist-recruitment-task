@extends('base')

@section('title', __('messages.pet.delete.title'))

@section('content')
    <h2>{{ __('messages.pet.delete.title') }}</h2>

    <form action="{{ route('app.pet.delete.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="petId" class="form-label">{{ __('messages.pet.delete.pet_id') }}</label>
            <input type="text" class="form-control @error('petId') is-invalid @enderror" id="petId" name="petId"
                   value="{{ old('petId') }}" required>
            @error('petId')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.action.delete') }}</button>
    </form>
@endsection
