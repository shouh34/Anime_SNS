<!-- resources/views/blogs/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

<div class="container py-5">
    <h1 class="mb-4 fw-bold border-bottom pb-2">📚 ブログ投稿一覧</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach($blogs as $blog)
        <div class="card mb-5 shadow-sm border-0">
            <div class="card-body d-flex flex-column" style="min-height: 300px;">

                {{-- タイトルと本文 --}}
                <div class="mb-3">
                    <h4 class="card-title text-primary fw-semibold">{{ $blog->Title }}</h4>
                    <p class="card-text">
                        {!! \Illuminate\Support\Str::limit(strip_tags($blog->Content), 80, '...') !!}
                    </p>
                </div>

                {{-- 画像 --}}


                {{-- 投稿日 & ボタン群 --}}
                <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-auto">
                    <small class="text-muted">📅 投稿日：{{ $blog->created_at->format('Y年m月d日') }}</small>
                    <div class="btn-group">
                        <a href="{{ route('Blog.main', ['id' => $blog->id]) }}" class="btn btn-sm btn-outline-secondary">本文を見る</a>
                        <a href="{{ route('Blog.ReEdit', ['id' => $blog->id]) }}" class="btn btn-sm btn-outline-primary">編集</a>
                        <a href="{{ route('Blog.Delete', ['id' => $blog->id]) }}" class="btn btn-sm btn-outline-danger">削除</a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
</div>

</body>
</html>
