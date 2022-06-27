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
    <title>수정하기</title>
</head>

<body>
    <h1 class="text-center mt-5">수정하기(Admin)</h1>
    <hr>
    <div class="container justify-content-center mt-2 mb-5">

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div>
                <img src="/images/{{ $project->thumbnail }}">
            </div>
            <div class="form-group m-2 p-2">
                <label for="Image">Upload Image</label>
                <input class="form-control" type="file" name="thumbnail">
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_title">Project Title</label>
                <input class="form-control" type="text" name="title" value="{{ $project->title }}">
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_description">Project Description</label>
                <textarea class="form-control" name="description" cols="30" rows="10" value="{{ $project->description }}"></textarea>
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_github_link">GitHub Link</label>
                <input class="form-control" type="text" name="github_link" value="{{ $project->github_link }}">
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_video_link">Youtube_Link</label>
                <input class="form-control" type="text" name="youtube_link" value="{{ $project->youtube_link }}">
            </div>

            <div class="form-group m-2 p-2">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_description">Skills</label>
                <textarea class="form-control" name="skills" cols="30" rows="10" value="{{ $project->skills }}"></textarea>
            </div>




            <button class="btn btn-success" type="submit" value="submit">수정 완료</button>

        </form>

    </div>


</body>

</html>
