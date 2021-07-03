<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>{{ $title }}</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Parent Id</th>
                <th>Status</th>
                <th>Created AT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->parent_id }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>