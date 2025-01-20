<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('app.index') }}">Petstore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.pet.create') }}">{{ __('messages.navbar.create') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.pet.get') }}">{{ __('messages.navbar.get') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.pet.update') }}">{{ __('messages.navbar.update') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.pet.delete') }}">{{ __('messages.navbar.delete') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
