<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aaa</title>
</head>
<body>
<form method="POST" action="{{ route('todos.update',['todo' => $todo]) }}">
    @method('PATCH')
        @csrf
        <div class="md-form">
            <input class="form-control col-8 mr-5" name="todo" type="text">
            <input class="mr-5" name="deadline" type="date">
        </div>
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>
</body>
</html>

