<!-- resources/views/blogs/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事ページ</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">
    <div class="container mt-5 mb-5">
        <div class="card shadow-sm" style="min-height: 600px;">

            <!-- タイトルを card-header に白背景で表示 -->
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">{{ $post->Title }}</h3>
            </div>

            <!-- 本文と画像を card-body に -->
            <div class="card-body d-flex flex-column justify-content-start" style="min-height: 500px;">
                <div class="card-text mb-4">
                    {!! $post->Content ?? '' !!}
                </div>

                {{-- いいねボタンを左下に固定 --}}
                <form method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger fw-bold" style="font-size: 1.3rem;">
                        ❤️ {{ $post->likes ?? 0 }}
                    </button>
                </form>
            </div>
        </div>

        {{-- 編集・削除ボタン --}}
        <div class="d-flex gap-3 mt-3">
            <a href="{{ route('Blog.ReEdit', ['id' => $post->id]) }}" class="btn btn-primary flex-fill">編集</a>
            <form method="POST" action="{{ route('Blog.Delete', ['id' => $post->id]) }}" onsubmit="return confirm('本当に削除しますか？');" class="flex-fill">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">削除</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
