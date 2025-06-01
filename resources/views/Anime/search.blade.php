<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Lightbox2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Lightbox CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">

<!-- Lightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>

<!-- Lightbox2 JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>
<div class="container mt-4">
    <h2 class="mb-4">アニメ検索</h2>
    <form method="POST" action="{{ route('anime.post') }}" class="row g-3 mb-4">
        @csrf
        <div class="col-md-8">
            <input type="text" name="q" class="form-control" placeholder="アニメ名を入力">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">検索</button>
        </div>
    </form>
    @foreach($results as $anime)
    <div class="anime-card">
        <h3>{{ $anime['title'] }}</h3>
        <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}">
        <p>{{ $anime['synopsis'] }}</p>
    </div>
@endforeach