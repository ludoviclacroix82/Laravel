<form method="POST" action="/restaurant/create">
    @csrf
    <div class="container mt-5">
        <h2>Formulaire de Soumission</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/restaurant/create" method="POST">
            <!-- Nom -->
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="50" value="{{ old('name') }}">
            </div>

            <!-- Adresse -->
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" maxlength="80" value="{{ old('address') }}">
            </div>

            <!-- Code postal -->
            <div class="mb-3">
                <label for="zip_code" class="form-label">Code Postal</label>
                <input type="number" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
            </div>
            <!-- Code town -->
            <div class="mb-3">
                <label for="zip_code" class="form-label">Ville</label>
                <input type="text" class="form-control" id="town" name="town" value="{{ old('town') }}">
            </div>

            <!-- Pays -->
            <div class="mb-3">
                <label for="country" class="form-label">Pays</label>
                <input type="text" class="form-control" id="country" name="country" maxlength="80" value="{{ old('country') }}">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <!-- Évaluation -->
            <div class="mb-3">
                <label for="review" class="form-label">Évaluation</label>
                <input type="number" class="form-control" id="review" name="review" value="{{ old('review') }}">
            </div>

            <!-- Bouton d'envoi -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</form>