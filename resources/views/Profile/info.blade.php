<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<div class="container py-5">
    
  <div class="card mx-auto shadow" style="max-width: 500px;">



            @if (!empty($user->icon))
            <img src="{{ asset('storage/' . $user->profile_image) }}" class="card-img-top" alt="{{ $user->name }} のプロフィール画像">
            @else
            <img src="{{ asset('images/icon.png') }}" class="card-img-top">
            @endif
            
            <h5 class="card-title">{{ $post->name }}</h5>
            
        <strong>プロフィール：</strong> 
          {!! $post->comment ?? '' !!}
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <strong>Email：</strong> {{ $post->Email }}
        
      </li>
      <li class="list-group-item">
        <strong>登録日：</strong> {{ $post->created_at->format('Y年m月d日 H:i') }}
      </li>
      <li class="list-group-item">
        <strong>更新日：</strong> {{ $post->updated_at->format('Y年m月d日 H:i') }}
      </li>
      <li class="list-group-item">
        <a href="{{ route('Profile.Edit',$id=$post->id) }}" class="btn btn-primary w-100">本文を見る</a>

      </li>
    </ul>
  </div>
</div>
