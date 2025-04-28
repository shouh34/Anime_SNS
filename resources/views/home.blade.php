<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background: #f0f2f5;
      min-height: 100vh;
      padding-top: 70px; /* ヘッダー分の余白 */
    }

    .login-container {
      max-width: 1000px;
      margin: auto;
      width: 100%;
    }

    .left-panel {
      padding: 40px;
    }

    .left-panel h1 {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .left-panel p {
      font-size: 16px;
      color: #555;
    }

    .login-card {
      background: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      margin-bottom: 20px;
    }

    .login-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 25px;
    }

    .col-md-6{
      margin-top:200px;

    }

    .fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1s ease, transform 1s ease;
  }

  .fade-in.show {
    opacity: 1;
    transform: translateY(0);
  }
  .btn-primary {
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
  background-color: #0056b3;
  transform: scale(1.05);
 
}

img#logo_img{
text-align: left;


    
}
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const fadeElements = document.querySelectorAll('.fade-in');
      fadeElements.forEach(el => el.classList.add('show'));
    });
  </script>
</head>
<body>
  <!-- ✅ ナビゲーションバー -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <img src="{{ asset('images/logos.png') }}" alt="アイコン" id="logo_img" width="450" height="130" class="float-start">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">ホーム</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">機能紹介</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">お問い合わせ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('Newregister') }}">新規登録</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 👇ログインフォーム本体 -->
  <div class="login-container row">
    <!-- 左側 -->
    <div class="col-md-6 left-panel fade-in">
      <h1>ようこそ！</h1>
      <p>このSNSでは、画像をアップロードしたり、コメントを通じて気軽に交流したりできます。</p>
      <p>楽しくコンテンツをシェアして、つながりを広げましょう！</p>
      <p>まずは、メールアドレスとパスワードを入力してログインしてください。</p>
    </div>

    <!-- 右側 -->
    <div class="col-md-6">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-card">
          <div class="login-title text-center">ログイン</div>

          <label for="t1" class="form-label">メールアドレス</label>
          <input type="email" name="Email" id="t1" class="form-control" placeholder="example@mail.com" required>

          <label for="password" class="form-label">パスワード</label>
          <input type="password" class="form-control" name="password">

          <button type="submit" class="btn btn-primary w-100">ログイン</button>
          <br>
          <label>
            <input type="checkbox" name="remember"> 次回から自動ログイン
        </label>
    
          <br>
          <a href="{{ route('Newregister') }}">新規登録</a>

          @error('email')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        </div>
      </form>
    </div>
  </div>
</body>
</html>
