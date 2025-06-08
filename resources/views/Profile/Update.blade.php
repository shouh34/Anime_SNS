    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- または PATCH --}}
    

    <button type="submit" class="btn btn-primary">プロフィール更新</button>
</form>