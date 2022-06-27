<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <title>Index</title>
</head>

<body>
    <h1 class="text-center mt-5">Index(Admin)</h1>
    <hr>

    <div class="container mt-5 p-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">제목</th>
                    <th scope="col">카테고리</th>
                    <th scope="col">설명</th>
                    <th scope="col">이미지</th>
                    <th scope="col">Github Link</th>
                    <th scope="col">YouTube Link</th>
                    <th scope="col">Skills</th>
                    <th scope="col">작성일</th>
                    <th scope="col">수정일</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>

                        <td scope="row">{{ $project->title }}</td>
                        <td scope="row">{{ $project->category->name }}</td>
                        <td scope="row">{{ $project->description }}</td>
                        <td>

                            <img style="height:150px; width:200px;" src="/images/{{ $project->project_thumbnail }}">

                        </td>

                        <td scope="row">{{ $project->github_link }}</td>
                        <td scope="row">{{ $project->youtube_link }}</td>
                        <td scope="row">{{ $project->skills }}</td>
                        <td>{{ $project->created_at->diffForHumans() }}</td>
                        <td>{{ $project->updated_at->diffForHumans() }}</td>
                        {{-- <td>
                            <a class="btn btn-primary"
                                href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                            <div>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </div>
                        </td> --}}




                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <a class="btn btn-success" href="{{ route('main.pdf') }}">Download PDF</a> --}}

    </div>



</body>

</html>
