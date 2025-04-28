<html>
<head>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

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
<style>
p#Username{
font-size: 30px;



}
.dropdown-menu {
    transform: translateY(10px);
    opacity: 0;
    transition: all 0.3s ease;
}
.dropdown-menu.show {
    transform: translateY(0);
    opacity: 1;
}
</style>
</head>
<body>


    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAccordion" aria-controls="navbarAccordion" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarAccordion">
                <ul class="navbar-nav ms-auto"> <!-- ms-autoで右寄せ -->
                    <li class="nav-item">
                        <form method="POST" action="{{ route('anime.search') }}" class="row g-3 mb-4">
                            @csrf
                            <div class="col-md-8">
                                <input type="text" name="t1" size="50" class="form-control" placeholder="検索したい内容を入力してください">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">検索</button>
                            </div>
                        </form>
                    </li>
    
                    <!-- ここが検索のドロップダウン -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            検索
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="searchDropdown">
                            <li><a class="dropdown-item" href=>ユーザー検索</a></li>
                            <li><a class="dropdown-item" href="{{ route('anime.search') }}">アニメ検索</a></li>
                        </ul>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anime.seasonal') }}">季節アニメ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('DM') }}">DM</a>
                    </li>




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="threadDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            スレッド
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="threadDropdown">
                            <li><a class="dropdown-item" href="{{ route('ImgBBS') }}">スレッド作成</a></li>
                            <li><a class="dropdown-item" href="{{ route('ImgBBS_view') }}">スレッド一覧</a></li>
                        </ul>
                    </li>
                    



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

    <!-- ダッシュボード内容 -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p id="Username" class="alert  text-center">
                ようこそ、{{ Auth::user()->name }}さん！
            </p>            <!-- メインコンテンツ -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">通知一覧</h5>
                    <p class="card-text">
                        ・2025-04-27 アニメ検索で
                        <br>
                        <div id="moreContent" class="collapse">
                            <div class="card card-body mt-3">
                                ここにもっと詳しい内容が表示されます。
                            </div>
                        </div>
                        <a href="#moreContent" data-bs-toggle="collapse" class="btn btn-primary">もっと見る</a>

                    </p>
                </div>
            </div>
            <br>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">検索内容の履歴</h5>
                    <p class="card-text">
                        ここにメインのダッシュボード内容を表示します。
                        <div id="moreContent2" class="collapse">
                          
                                ここにもっと詳しい内容が表示されます。
                          
                        </div>
                        <a href="#moreContent2" data-bs-toggle="collapse" class="btn btn-primary">もっと見る</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>