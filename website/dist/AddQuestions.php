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
$qid = $_GET['qid'];
$quiztitle = "SELECT * FROM quiz WHERE qid='$qid'";
$result = mysqli_query($conn,$quiztitle);
while($row = mysqli_fetch_array($result)){
$quizname = $row['quizname'];
}

?>
<?php
$x = "SELECT count(id) AS total FROM questions WHERE qid = '$qid' ";
$result = mysqli_query($conn,$x);
while($row = mysqli_fetch_array($result)){
$lasteid = $row['total'];
}
?>

<?php
if(isset($_POST['done'])){
    $questions = $_POST['questions'];
    $ans = $_POST['ans'];
    $lastexid = $lasteid + 1 ; 
    $addquiz = "INSERT INTO questions (qid,eid,question,ans) VALUE ('$qid','$lastexid','$questions','$ans') ";
    $query = mysqli_query($conn,$addquiz);
    for($i = 1 ;  $i<=count($_POST['quizoption']); $i++){
      $oid = $i;
      $options= ($_POST['quizoption'][$i]);
      $addoptions = "INSERT INTO options (qid,eid,oid,options) VALUE ('$qid','$lastexid','$oid','$options') ";
      $query = mysqli_query($conn,$addoptions);
    }
}
?>

<form method="post" id="addquiz" target="_parent"> 
<div class="mt-10">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="addquiztitle">
        คำถาม หัวข้อ <?php echo $quizname ?>
      </label>
      <textarea  name="questions" class="appearance-none block w-full h-32 bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="addquestion" type="text" placeholder="เพิ่มคำถาม">  </textarea>
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="addquiztitle">
        คำตอบ
      </label>
      <input name="quizoption[1]" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="1 เพิ่มคำตอบ">
      <input name="quizoption[2]" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="2 เพิ่มคำตอบ">
      <input name="quizoption[3]" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="3 เพิ่มคำตอบ">
      <input name="quizoption[4]" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="4 เพิ่มคำตอบ">
</div>
<div class="flex-1">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="addquiztype">
        เลือก ข้อถูก
      </label>
    <select id="addquiztype" name="ans" class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
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