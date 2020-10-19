<html>
<head>
<title>REST_FORM</title>
</head>
<body>
<form action="/bookmarks" method="POST">
{{ csrf_field() }}
TITLE:<input type="text" name="title"><br>
NUMBER:<input type="text" name="number"><br>
<input type="submit" value="send">
</form>
</body>
</html>