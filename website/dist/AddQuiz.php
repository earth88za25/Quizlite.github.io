<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/css/design.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    <title>AddQuiz</title>
</head>
<body>
<div class="flex"> 
<div class="flex-1 mx-auto px-10">
<?php
$sql = "SELECT * FROM quiz ORDER BY qid DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
$lastqid = $row['qid'];
} 
?>
<?php
if(isset($_POST['done'])){
    $quizname = $_POST['quizname'];
    $quiztype = $_POST['quiztype'];
    $qid = $lastqid+1;
    $addquiz = "INSERT INTO quiz (qid,quizname,qtype) VALUE ('$qid','$quizname','$quiztype')";
    $query = mysqli_query($conn,$addquiz);
}
?>
<form method="post" id="addquiz" target="_parent"> 
<div class="mt-10">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="addquiztitle">
        ชื่อ Quiz
      </label>
      <input name="quizname" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="addquiztitle" type="text" placeholder="TitleQuiz">  
</div>
<div class="flex-1">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="addquiztype">
        เลือก ชนิด Quiz
      </label>
    <select id="addquiztype" name="quiztype" class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
    <?php 
        $quiz = "SELECT * FROM quiz,quiztype WHERE qtype=typeid";
        $query = mysqli_query($conn,$quiz);
        while($row = mysqli_fetch_array($query)){
            $qtype=$row['qtype'];
      ?>
    <option value="<?php echo $qtype?>"><?php echo $qtype?>-<?php echo $row['typename'] ?></option>
    <?php }?>
  </select>
</div>
<div class="flex justify-center mt-5">
<input type="submit" name="done" target="_parent" value="ยืนยัน" class="bg-white text-gray-800 font-bold cursor-pointer rounded border-b-2 border-blue-200 hover:border-blue-800 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
</div>
</form>
  </div>
  </div>
</body>
</html>