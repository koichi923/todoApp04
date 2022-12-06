<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="offcanvas.css" rel="stylesheet">
    <title>todo</title>
</head>

<body class="bg-light">
    <div class="p-3 mb-2 bg-secondary text-white">
        <!-- <h1>todo</h1> -->
        <nav class="navbar navbar-expand-sm navbar-dark mt-3 mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">TODO</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/close')}}">Close一覧ページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/doc')}}">document</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/portfolio')}}">portfolio</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <main class="">
        <div class="">
            <div class="">
                <p class="">
                <h2>今日は何する？</h2>
                </p>
                <form action="/tasks" method="post" class="">
                    @csrf

                    <div class="mb-4">
                        <label class="">
                            <input class="" placeholder="洗濯物をする..." type="text" name="task_name" />
                            @error('task_name')
                            <div class="mt-3">
                                <p class="text-red-500">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                        </label>

                        <button type="submit" class="btn btn-primary">
                            追加する
                        </button>
                    </div>
                    <h5>プログラミングのコツ</h5>
                    <p>1.全体感をざっくり知る</p>
                    <p>2.ゴールを決める</p>
                    <p>3.成果物を作る</p>
                    <p>4.最後にまとめる</p>
                </form>
                {{-- 追記 --}}
                @if ($tasks->isNotEmpty())
                <div class="max-w-7xl mx-auto mt-20">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr class="mx-4">
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                            タスク一覧</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($tasks as $item)
                                    <tr>
                                        <td class="px-3 py-4 text-sm text-gray-500">
                                            <div>
                                                {{ $item->name }}
                                            </div>
                                        </td>
                                        <td class="p-0 text-right text-sm font-medium">
                                            <div class="flex justify-end">
                                                <div>
                                                    <form action="/tasks/{{ $item->id }}" method="post" class="inline-block text-gray-500 font-medium" role="menuitem" tabindex="-1">
                                                        @csrf
                                                        @method('PUT')

                                                        {{-- 追記 --}}
                                                        <input type="hidden" name="status" value="{{$item->status}}">
                                                        {{-- 追記 --}}

                                                        <button type="submit " class="btn btn-primary">
                                                            完了
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- <div>
                                                    <a href="/tasks/{{ $item->id }}/edit/" class="inline-block text-center py-4 w-20 underline underline-offset-2 text-sky-600 md:hover:bg-sky-100 transition-colors">編集</a>
                                                </div>
                                                <div>
                                                    <form action="/tasks/{{ $item->id }}" method="post" class="inline-block text-gray-500 font-medium" role="menuitem" tabindex="-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除</button>
                                                    </form>
                                                </div> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                {{-- 追記ここまで --}}
            </div>
        </div>
    </main>

</body>

</html>