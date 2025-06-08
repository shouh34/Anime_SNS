<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4">プロフィールを編集</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

<!-- 名前 -->
<div class="mb-3">
    <label for="name" class="form-label">名前</label>
    <input type="text" name="name" id="name" value="{{ $post->name }}" class="form-control">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<!-- メール -->
<div class="mb-3">
    <label for="email" class="form-label">メールアドレス</label>
    <input type="text" name="email" id="email" value="{{ $post->Email}}" class="form-control">
    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
</div>

                <!-- コメント -->
                <div class="mb-3">
                    <label for="story" class="form-label">コメント</label>
                    <textarea id="story" name="comment" rows="5" class="form-control">{{ old('story', $post->story ?? '') }}</textarea>
                    @error('story') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">更新</button>
            </form>

        </div>
    </div>
</div>

<!-- CKEditor の初期化 -->
<script>
    ClassicEditor
        .create(document.querySelector('#story'))
        .catch(error => {
            console.error(error);
        });
</script>
