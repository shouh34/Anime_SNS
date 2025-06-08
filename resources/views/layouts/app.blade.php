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


    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAccordion" aria-controls="navbarAccordion" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarAccordion">
                <ul class="navbar-nav ms-auto"> <!-- ms-autoで右寄せ -->
                    <li class="nav-item">
                        <form method="POST" action="{{ route('Profile.post') }}" class="row g-3 mb-4">
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
                            <li><a class="dropdown-item" href="{{ route('anime.searcher') }}">アニメ検索</a></li>
                        </ul>
                    </li>
    
                    

                       


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
アニメ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="searchDropdown">
                            <li><a class="dropdown-item" href="{{ route('anime.seasonal') }}">季節アニメ</a></li>
                                 <li><a class="dropdown-item" href="{{ route('Profile.info') }}">プロフィール</a></li>


                        </ul>
                    </li>

                                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
ブログ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="searchDropdown">
                            <li><a class="dropdown-item" href="{{ route('Blog.index') }}">記事一覧</a></li>
                            <li><a class="dropdown-item" href="{{ route('Blog.Edit') }}">投稿</a></li>

                        </ul>
                    </li>

                </li>

                    <li class="nav-item">
                        <a  class="nav-link dropdown-toggle" href="#"  id="threadDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('Settings') }}">設定</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">ログアウト</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    
</body>
</html>