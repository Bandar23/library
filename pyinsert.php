
<html>
<head>
<body>
<style>
input[type=text]{
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[id=con]{
  width: 20%;
  height:20%;

}


</style>
<center>
<h1> إضافة مقالة جديدة  </h1>

<div>
<form method="POST" action="pegepy.php">
<label>  عنوان المقالة </label><br>
<input type="text" name="name" value=""   placeholder="  اسم المقالة  "> <br><br>
<label> المحتوى </label><br><br>
<input id="con" type="text" name="content" value=""><br><br>
<label> كاتب المقالة </label><br><br>
<input type="text" name="author" value="" placeholder="  اسم المحتوى  "><br><br>
<label>  صورة </label><br><br>
<input type="text" name="pic" value="" placeholder="  أضف صورة للمحتوى " ><br><br>
<input type="submit" name="Save " value=" Save">
</form>
</div>
</center>







</body>
</html>