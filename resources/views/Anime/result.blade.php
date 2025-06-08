<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Lightbox2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Lightbox2 JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>

<div class="container mt-4">
    <h2 class="mb-4">{{ $year }}年{{ ucfirst($season) }}アニメ一覧</h2>

    <form action="{{ route('anime.seasonal') }}" method="GET" class="row g-3 mb-4">
        <div class="col-auto">
            <input type="number" name="year" class="form-control" value="{{ $year }}" placeholder="年（例：2024）">
        </div>
        <div class="col-auto">
            <select name="season" class="form-select">
                <option value="winter" @selected($season == 'winter')>冬</option>
                <option value="spring" @selected($season == 'spring')>春</option>
                <option value="summer" @selected($season == 'summer')>夏</option>
                <option value="fall" @selected($season == 'fall')>秋</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">表示</button>
        </div>
    </form>

    @if(count($results))
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($results as $anime)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ $anime['images']['jpg']['image_url'] }}" data-lightbox="anime-{{ $loop->index }}" data-title="{{ $anime['title'] }}">
                            <img src="{{ $anime['images']['jpg']['image_url'] }}" class="card-img-top" alt="{{ $anime['title'] }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center text-truncate" title="{{ $anime['title_japanese'] ?? $anime['title'] }}">
                                {{ $anime['title_japanese'] ?? $anime['title'] }}
                            </h5>
                            <div class="d-flex justify-content-between align-items-center">

                            <p class="card-text">

                               
                                <br>
                                <strong>話数:</strong> {{ $anime['episodes'] ?? '不明' }}<br>
                                <strong>タイプ:</strong> {{ $anime['type'] ?? '不明' }}

                            </p>
                            </div>
                            @if(isset($anime['trailer']['youtube_id']))
                                <a href="https://www.youtube.com/watch?v={{ $anime['trailer']['youtube_id'] }}" target="_blank" class="btn btn-sm btn-danger w-100">
                                    ▶ トレーラーを見る
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




        <!-- ページネーション -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            @if(optional($pagination)['has_previous_page'])
                <a href="{{ route('anime.seasonal', ['year' => $year, 'season' => $season, 'page' => $page - 1]) }}" class="btn btn-outline-secondary">
                    ← 前のページ
                </a>
            @else
                <div></div>
            @endif

            <span class="text-muted">ページ {{ $page }}</span>

            @if(optional($pagination)['has_next_page'])
                <a href="{{ route('anime.seasonal', ['year' => $year, 'season' => $season, 'page' => $page + 1]) }}" class="btn btn-outline-primary">
                    次のページ →
                </a>
            @else
                <div></div>
            @endif
        </div>
    @else
        <div class="alert alert-warning mt-4">アニメが見つかりませんでした。</div>
    @endif
</div>
