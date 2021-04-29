<!DOCTYPE html>

<html>

<head>

    <title></title>

</head>

<body>

    <ul>
        @foreach ($tasks as $task)
        <li> 
           <a href="/tasks/{{ $task->id }}">
                {{ $task->body }} </li>
           </a>
        </li>
        @endforeach
        <br>


    </ul>
</body>

</html> 