<!DOCTYPE html>
<html>
<head>
  <title>Confirmation Email</title>
</head>
<body>

<form action="sendmail" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
  <h1>Chào mừng bạn tham gia cộng đồng từ thiện Nguyện Ước Xanh - HCM</h1>

  <br>
  <br>
</form>

</body>
</html>