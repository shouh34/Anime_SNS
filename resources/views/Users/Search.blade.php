<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    table.table{
        width:1000px;
        margin:auto;
    }


    .main{
        width:1000px;
        margin:auto;

    }

    .tb{
        width:800px;
        margin:0 auto;


    }


</style>


<h2>ユーザー検索</h2>

<div class="main">
<input type="text" id="search" placeholder="名前で検索" class="form-control">
</div>
<div class="tb">
<table class="table">
    <thead>
        <tr>
            <th>名前</th>
            <th>メールアドレス</th>
        </tr>
    </thead>
    <tbody id="userTable">
        @foreach ($users as $user)
            <tr class="user-row" hidden>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<script>
    const searchInput = document.getElementById("search");
    const tableRows = document.querySelectorAll("#userTable tr");

    // 初期表示で全行を表示
    document.addEventListener("DOMContentLoaded", function () {
        tableRows.forEach(row => row.removeAttribute('hidden'));
    });

    searchInput.addEventListener("input", function () {
        const keyword = this.value.toLowerCase();

        tableRows.forEach(row => {
            const name = row.cells[0].textContent.toLowerCase();
            const email = row.cells[1].textContent.toLowerCase();

            if (name.includes(keyword) || email.includes(keyword)) {
                row.removeAttribute('hidden'); // 検索キーワードに合った行は表示
            } else {
                row.setAttribute('hidden', true); // 合わない行は非表示
            }
        });
    });
</script>
