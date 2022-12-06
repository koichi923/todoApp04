<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="offcanvas.css" rel="stylesheet">
  <title>close一覧</title>
</head>

<body class="bg-light">
  <div class="p-3 mb-2 bg-secondary text-white">
    <h1>close</h1>
  </div>
  <div>
    <p><a href="{{url('/tasks')}}">トップページ</a></p>
  </div>
  <div class="max-w-7xl mx-auto mt-20">
    <div class="inline-block min-w-full py-2 align-middle">
      <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
            <tr class="mx-4">
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                タスク一覧
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
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $tasks->links() !!}
</body>

</html>