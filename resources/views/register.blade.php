<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .register-card {
      background: white;
      padding: 100px 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 300%;
      max-width: 500px;
    }

    .form-control {
      margin-bottom: 20px;
    }

    .register-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: center;
    }
  </style>
</head>
<body>

  <form method="POST" action="{{ route('Newregister.post') }}">
    @csrf
    <div class="register-card">
      <div class="register-title">新規登録</div>

      <input type="text" name="name" class="form-control" placeholder="お名前" required>

      <input type="email" name="email" class="form-control" placeholder="メールアドレス" required>

      <input type="password" name="password" class="form-control" placeholder="パスワード" required>

      <input type="password" name="password_confirmation" class="form-control" placeholder="パスワード（確認）" required>

      <button type="submit" class="btn btn-success w-100">登録</button>
    </div>
  </form>

</body>
</html>
