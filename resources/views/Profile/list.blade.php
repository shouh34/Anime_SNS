
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- コンテンツ --}}
<div class="container py-5">
    <h2 class="mb-4 fw-bold">検索結果</h2>

    @if($users->isEmpty())
        <p class="text-muted">該当するユーザーはいませんでした。</p>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($users as $user)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('images/icon.png') }}" class="card-img-top" alt="のプロフィール画像">

                            <h5 class="card-title"><a href="{{ route('Profile.info', ['id' => $user->id]) }}">{{ $user->name }}</a></h5>
                            <p class="card-text text-muted">
                                Email: {{$user->Email}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

