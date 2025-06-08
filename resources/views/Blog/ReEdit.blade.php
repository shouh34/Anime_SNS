<!-- resources/views/posts/create.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ブログ投稿</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- CSRF Token for JS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            background-color: #f7f9fc; /* 明るめ背景 */
            color: #333;
        }
        .form-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .form-title {
            color: #2c3e50;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        label {
            font-weight: 600;
            color: #444;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="form-card mx-auto" style="max-width: 720px;">
            <h1 class="mb-4 form-title">ブログ投稿フォーム</h1>

 <form action="{{ route('Blog.ReEdit.post', ['id' => $post->id]) }}" method="POST">
                    @csrf

                <!-- タイトル -->
                <div class="mb-3">
                    <label for="title" class="form-label">タイトル</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <!-- 画像 -->
                <div class="mb-3">
                    <label for="image" class="form-label">画像</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <!-- 本文 -->
                <div class="mb-3">
                    <label for="body" class="form-label">本文</label>
                    <textarea name="body" id="editor"></textarea>
                </div>

                <!-- 投稿ボタン -->
                <button type="submit" class="btn btn-primary">投稿</button>
            </form>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('upload.image') }}?_token=' + csrfToken
                },
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', 'code', 'codeBlock', '|',
                        'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'imageUpload', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo'
                    ]
                },
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                },
                language: 'ja'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
