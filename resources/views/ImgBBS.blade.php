<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>画像投稿</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>


.register-card{
    width:600px;
    margin:auto;
    margin-top:200px;
    max-width: 800px;
    margin: 50px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-family: sans-serif;
}

  </style>
</head>
<body>

  <form method="POST" action="{{ route('ImgBBS') }}" enctype="multipart/form-data">
    @csrf
    <div class="register-card">
      <div class="register-title">新規スレッド</div>

      <input type="text" name="Thredname" class="form-control" placeholder="スレッド名" required>
<br>
<div class="register-title">作成者</div>

      <input type="text" name="Creater" class="form-control" placeholder="作成者" required>
<br>
<textarea name="comment" rows="5" cols="40" placeholder="コメントをしてください" class="form-control"></textarea><br><br>


<input type="file" name="image">
<br><br>
      <button type="submit" class="btn btn-success w-100">登録</button>
    </div>
  </form>

</body>
</html>
