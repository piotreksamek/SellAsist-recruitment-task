@extends('base')

@section('title', __('messages.pet.create.title'))

@section('content')
    <h2>{{ __('messages.pet.create.title') }}</h2>

    <form action="{{ route('app.pet.create.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('messages.pet.create.form.category') }}</label>
            <select id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">{{ __('messages.pet.create.form.select_category') }}</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->value }}" {{ old('category') == $category->value ? 'selected' : '' }}>
                        {{ __('messages.pet.create.form.' . strtolower($category->name)) }}
                    </option>
                @endforeach
            </select>
            @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('messages.pet.create.form.name') }}*</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                   value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photoUrls" class="form-label">{{ __('messages.pet.create.form.photo_url') }}*</label>
            <div id="photoUrlsContainer">
                <div class="input-group mb-2">
                    <input type="text" class="form-control @error('photoUrls') is-invalid @enderror" name="photoUrls[]"
                           value="{{ old('photoUrls.0') }}" required>
                    <button type="button" class="btn btn-outline-secondary add-photo-url">+</button>
                </div>
            </div>
            @error('photoUrls')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">{{ __('messages.pet.create.form.tags') }}</label>
            <input type="hidden" name="tags" value="">
            <select id="tags" name="tags[]" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->value }}" {{ in_array($tag->value, old('tags', [])) ? 'selected' : '' }}>
                        {{ __('messages.pet.create.form.' . strtolower($tag->name)) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">{{ __('messages.pet.create.form.status') }}</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">{{ __('messages.pet.create.form.select_status') }}</option>
                @foreach ($statuses as $status)
                    }}
                    <option value="{{$status->value}}">{{ __('messages.pet.create.form.' . $status->value) }}</option>
                @endforeach
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.action.save') }}</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('photoUrlsContainer');

            container.addEventListener('click', function (e) {
                if (e.target.classList.contains('add-photo-url')) {
                    e.preventDefault();

                    const newInputGroup = document.createElement('div');
                    newInputGroup.classList.add('input-group', 'mb-2');
                    newInputGroup.innerHTML = `
                    <input type="text" class="form-control" name="photoUrls[]" value="">
                    <button type="button" class="btn btn-outline-danger remove-photo-url">-</button>
                `;
                    container.appendChild(newInputGroup);
                }

                if (e.target.classList.contains('remove-photo-url')) {
                    e.preventDefault();
                    const inputGroup = e.target.closest('.input-group');
                    if (inputGroup) {
                        inputGroup.remove();
                    }
                }
            });
        });
    </script>
@endsection
