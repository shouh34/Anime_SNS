<html>
    <head>
        <title>プロフィール編集</title>
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
        <script>
            function validateForm() {

                

                alert("プロフィールを更新しました");

                return true;
            }
        </script>
    </head>
    <body>
        
        <form action="{{ route('profile.update', ['id' => $id]) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            
            @csrf
            @method('PUT')
            <div class="register-card">
              <div class="register-title">名前</div>
              
              <input type="text" name="name" value={{$name}} class="form-control" placeholder="名前を入れてください" required>
              <div class="register-title">メールアドレス</div>
              <input type="text" name="email" value={{$email}} class="form-control" placeholder="メールアドレス" required>
              <div class="register-title">コメント</div>
              <textarea name="comment" rows="5" cols="40" placeholder="コメントをしてください" class="form-control">{{$comment}}</textarea><br><br>
              <input type="file" name="profile_image" id="image" accept="image/*" required>
        
              <button type="submit" class="btn btn-primary w-100">プロフィール更新</button>
            </div>
          </form>
    </body>
</html>