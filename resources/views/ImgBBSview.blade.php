<html>
<head>
    <title>スレッド一覧画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        .container {
            max-width: 1100px;
        }

        h1.title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
        }

        table.table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td, th {
            vertical-align: middle;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="title">スレッド一覧</h1>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>スレッド名</th>
                    <th>スレッド作成者</th>
                    <th>スレッド作成日</th>
                    <th>スレッド更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ route('ImgBBS_post_view', ['id' => $user->id]) }}">
                                {{ $user->Thread }}
                            </a>
                        </td>
                        <td>{{ $user->Creater }}</td>
                        <td>{{ $user->created_at}}</td>
                        <td>{{ $user->updated_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>

</body>
</html>
