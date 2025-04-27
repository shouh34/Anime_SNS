<style>
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

    body {
            background-color: #e9ecef; /* 少し落ち着いた薄いグレー */
        }
        .profile-details {
    font-family: sans-serif;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

.comment-section {
    margin-top: 10px;
}

.comment-box {
    background-color: #f9f9f9;
    border-left: 4px solid #007BFF;
    padding: 10px;
    margin-top: 5px;
    white-space: pre-wrap; /* 改行を反映 */
    word-wrap: break-word;
}

</style>

<div class="profile-container">

    <div class="profile-details">

        <div class="profile-header">
            <div class="profile-name">
                <img src="{{ asset('images/icon.png') }}" id="im1" alt="アイコン" width="150" height="150" class="rounded-circle me-3">
    
            </div>
        </div>
    
        <p><label>ID:{{$id}}</label></p>
        <p><label>名前:{{$name}}</label></p>
        <p><label>メールアドレス:{{$email}}</label></p>
        <p><label>登録日:{{$createdate}}</label> </p>
        <p><label>更新日:{{$updatedate}}</label> </p>
        <p><label>投稿数:{{$count}}</label> </p>
        <div class="comment-section">
            <label>コメント:</label>
            <div class="comment-box">{{$comment}}</div>
        </div>
        <a href="{{ route('profile_Edit') }}" class="edit-button">プロフィールを編集</a>

    </div>

</div>
