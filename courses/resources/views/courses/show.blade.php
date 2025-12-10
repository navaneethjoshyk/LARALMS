<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Course</title>
</head>
<body>
    <h1>Course Details</h1>

    <p><strong>Code:</strong> {{ $course->code }}</p>
    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Credits:</strong> {{ $course->credits }}</p>

    <p>
        <a href="{{ route('courses.edit', $course) }}">Edit</a> |
        <a href="{{ route('courses.index') }}">Back to list</a>
    </p>
</body>
</html>
