<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.DM_Content{
width:1000px;
margin:auto;


}

</style>


<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h4 mb-4">ダイレクトメッセージ送信</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('DM.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="recipient_id" class="form-label">宛先ユーザーID</label>
                    <input type="text" name="recipient_id" id="recipient_id"
                           class="form-control"
                           value="{{ old('recipient_id') }}" required>
                    @error('recipient_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">メッセージ内容</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="DM_Content">
@foreach ($messages as $message)
    <div class="mb-3 border-bottom pb-2">
        <p><strong>宛先ID:</strong> {{ $message->recipient_id }}</p>
        <p><strong>内容:</strong> {{ $message->body }}</p>
        <p class="text-muted small">{{ $message->created_at->format('Y/m/d H:i') }}</p>
    </div>
@endforeach

</div>


