<html>
    <head>
        <title>スレッド画面</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.css" integrity="sha512-DKdRaC0QGJ/kjx0U0TtJNCamKnN4l+wsMdION3GG0WVK6hIoJ1UPHRHeXNiGsXdrmq19JJxgIubb/Z7Og2qJww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

       <style>

body {
            background-color: #e9ecef; /* 少し落ち着いた薄いグレー */
        }
.profile-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        font-family: sans-serif;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;
    }

    .profile-name {
        font-size: 24px;
        font-weight: bold;
    }

    .profile-details {
        line-height: 1.8;
    }

    .profile-details label {
        font-weight: bold;
        margin-right: 10px;
    }

    .edit-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #3490dc;
        color: white;
        text-decoration: none;
        border-radius: 6px;
    }

    .edit-button:hover {
        background-color: #2779bd;
    }

    textarea.form-control{
        width:600px;
        height:200px;
        margin: auto;


    }
    .threadname{
        margin-left:200px;


    }


    button{
        width:200px;
    }

    <style>
    .card {
        border-radius: 10px;
    }

    .card-body {
        padding: 1.25rem;
        background-color: #fff;
    }

    .card-title {
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        line-height: 1.5;
    }

    .text-muted {
        font-size: 0.85rem;
    }


    img#im1{
        width:100px;
        height:100px;



    }
</style>
<script>
    function handleReplyClick(replyNo) {
        // ここに好きな処理を書く！
        alert('Reply ボタンが押されました。reply_no: ' + replyNo);
    
        // true を返すとリンク先へ遷移、false なら遷移をキャンセル
   
    }
    </script>
    </head>
    <body>
        <div class="container my-4">
            <h2 class="text-center text-primary border-bottom pb-2">
                {{ $imgbbsfind->Thread }}
            </h2>
        </div>

<br><br>

<form method="POST" action="{{ route('ImgBBS.post.comment', ['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
            <textarea name="comment" rows="5" cols="40" placeholder="コメントをしてください" class="form-control"></textarea><br><br>
            <div class="d-grid justify-content-center">
                <button type="submit" class="btn btn-primary w-10">投稿</button>
                <input type="file" name="image">
            </div>
          </form>
    
@foreach ($imgbbs as $bbsdata)

<div class="profile-container">

    <div class="card mb-3 shadow-sm p-3">
        <div class="d-flex">
            <img src="{{ asset('images/icon.png') }}" id="im1" alt="アイコン" width="60" height="60" class="rounded-circle me-3">
    
            <div class="flex-grow-1">
                <h5 class="card-title mb-2 text-primary">名前：{{ $bbsdata->Name }}</h5>
                <p class="card-text">{{ $bbsdata->Comment }}</p>
              
            </div>
            <div class="text-muted small text-end">
                Post Date：{{ $bbsdata->Comment_data }}
            </div>
        </div>
    </div>
    

    @if ($bbsdata->image== null)
   
      @else
      <a href="{{ asset('storage/images/' . $bbsdata->image) }}" data-lightbox="cat" data-title="かわいい猫">
        <img src="{{ asset('storage/images/' . $bbsdata->image) }}" alt="プロフィール画像" width="150">
    </a>
  
      @endif


    



    <div class="like">
       
    <a href="{{ route('Reply.add', ['id' => $id]) }}" class="btn btn-primary" onclick="return handleReplyClick();">Reply {{$bbsdata->reply_no}}</a>
    <a href="{{ route('Good.add', ['id' => $id]) }}" class="btn btn-danger" onclick="return handleReplyClick();">いいね {{$bbsdata->Good_no}}</a>

    </div>
</div>
@endforeach


<div class="d-flex justify-content-center">
    {{ $imgbbs->links('pagination::bootstrap-4') }}
</div>
    </body>
</html>