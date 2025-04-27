<html>
<head>
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
</head>
<body><!-- ナビゲーションバー -->
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ダッシュボード</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- ms-auto を追加して右寄せ -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">プロフィール</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anime.search') }}">アニメ検索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anime.seasonal') }}">季節アニメ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('DM') }}">DM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ImgBBS') }}">スレッド作成</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ImgBBS_view') }}">スレッド一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Settings') }}">設定</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">ログアウト</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    

<!-- ダッシュボードコンテンツ -->
<div class="container-fluid mt-4">
    <h2>ダッシュボード</h2>
    <p>ようこそ、{{ Auth::user()->name }}さん！</p>

    <!-- ダッシュボード内容 -->
    <div class="row">
        <div class="col-md-8">
            <!-- メインコンテンツ -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">メインコンテンツ</h5>
                    <p class="card-text">ここにメインのダッシュボード内容を表示します。</p>
                </div>
            </div>
        </div>

      
    </div>
</div>

    
</body>
</html>