<!DOCTYPE html>
<html>
<head>
    <title>Roboflow Upload</title>
</head>
<body>

<form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>

</body>
</html>