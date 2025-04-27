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
    <form method="GET" action="{{ route('anime.search') }}" class="row g-3 mb-4">
        <div class="col-md-8">
            <input type="text" name="q" class="form-control" value="{{ old('q', $query) }}" placeholder="アニメ名を入力">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">検索</button>
        </div>
    </form>
    
    @if(isset($query) && $query && count($results))
        <h5 class="mb-3">「{{ $query }}」の検索結果:</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($results as $anime)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $anime['images']['jpg']['image_url'] }}" class="card-img-top" data-lightbox="anime" data-title={{$anime['title_japanese'] ?? $anime['title']}} alt="{{ $anime['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $anime['title_japanese'] ?? $anime['title'] }}</h5>
                            <p class="card-text">
                                {{ Str::limit($anime['synopsis'], 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif(isset($query))
        <div class="alert alert-warning">「{{ $query }}」に一致するアニメは見つかりませんでした。</div>
    @endif
    