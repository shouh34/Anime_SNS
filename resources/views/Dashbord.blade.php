<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ダッシュボード</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lightbox2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">


  <style>
  html, body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    footer {
      background-color: #f1f1f1;
      padding: 1rem 0;
      text-align: center;
    }
  </style>
</head>
<body><!-- ナビバー -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AniConnect</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAccordion">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAccordion">
      <ul class="navbar-nav ms-auto align-items-center">

        <!-- 検索フォーム -->
        <li class="nav-item">
          <form method="POST" action="{{ route('Profile.post') }}" class="d-flex me-3">
            @csrf
            <input type="text" name="t1" class="form-control me-2" placeholder="検索したい内容を入力">
            <button type="submit" class="btn btn-primary">検索</button>
          </form>
        </li>

        <!-- 検索プルダウン -->
        <li class="nav-item dropdown me-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            検索
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">ユーザー検索</a></li>
            <li><a class="dropdown-item" href="{{ route('anime.searcher') }}">アニメ検索</a></li>
          </ul>
        </li>
     <li><a class="dropdown-item" href="{{ route('Profile.info') }}">プロフィール</a></li>


        <!-- アニメプルダウン -->
        <li class="nav-item dropdown me-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            アニメ
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('anime.seasonal') }}">季節アニメ</a></li>
          </ul>
        </li>

        <!-- ブログプルダウン -->
        <li class="nav-item dropdown me-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ブログ</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('Blog.index') }}">記事一覧</a></li>
            <li><a class="dropdown-item" href="{{ route('Blog.Edit') }}">投稿</a></li>
          </ul>
        </li>

        <!-- 設定 -->
        <li class="nav-item me-2">
          <a class="nav-link" href="{{ route('Settings') }}">設定</a>
        </li>

        <!-- ログアウト -->
        <li class="nav-item">
          <a class="nav-link text-danger" href="{{ route('logout') }}">ログアウト</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<!-- メインコンテンツ -->
<div class="container mt-5">
  <h1 class="mb-4">ダッシュボード</h1>

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h2 class="section-title">お知らせ</h2>
      <p>最新のお知らせやアップデート情報をここに表示します。</p>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <h2 class="section-title">アクティビティ</h2>
      <p>ユーザーの最近の活動や人気の投稿など。</p>
    </div>
  </div>
</div>

<!-- フッター -->
<footer class="bg-light text-center text-muted py-3 fixed-bottom shadow-sm">
  <div class="container">
    <small>&copy; 2025 AniConnect. All rights reserved.</small>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
