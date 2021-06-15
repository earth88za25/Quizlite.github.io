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
    <title>QUIZLITE</title>
    <script src="../src/jquery.js"></script>

    <script type="text/javascript">
	function timeout()
	{
		var hours=Math.floor(timeLeft/3600);
		var minute=Math.floor(timeLeft/60);
		var second=timeLeft%60;
		var hrs=checktime(hours);
		var mint=checktime(minute);
		var sec=checktime(second);
		if(timeLeft<=0)
		{
      clearTimeout(timerID);
      document.getElementById("quiz").submit();
		}
		else
		{
			document.getElementById("time").innerHTML=hrs+":"+mint+":"+sec;
		}
		timeLeft--;
		var timerID= setTimeout(function(){timeout()},1000);
	}
	function checktime(msg)
	{
		if(msg<10)
		{
			msg="0"+msg;
		}
		return msg;
	}
  </script>
  
  <script type="text/javascript">
      var timeLeft=1200;
  </script>
</head>

<body class="blackground" onload="timeout()">
        <div class="flex items-center justify-between flex-wrap bg-teal-500 p-4">
              <div class="flex items-center flex-shrink-0 mr-5"> 
                <span class="font-semibold text-xl text-white tracking-tight font-extrabold">QUIZLITE</span>
              </div>
              <div id="time" class="font-extrabold text-white">timeout</div>
        </div>
<div class="flex">
<div class="flex-1">
<?php
$quizid=$_GET['quizid'];
$sql = "SELECT count(id) AS total FROM questions WHERE qid = '$quizid' ";
$result = mysqli_query($conn,$sql);
$values = mysqli_fetch_assoc($result);
$num_rows=$values['total'];
?>

<?php
  for($i = 1 ; $i < $num_rows+1; $i++){
  $questions = "SELECT * FROM questions WHERE qid='$quizid'  AND eid = '$i'";
  $query = mysqli_query($conn,$questions);
  $count = 0 ;
  while($row = mysqli_fetch_array($query)){
    $count = $count+$i;
  ?>
  <form id="quiz" action="check.php" method="POST" target="POPUPW"
    onsubmit="POPUPW = window.open('about:blank','POPUPW','width=600,height=400',);">
          <!--QuizBox-->
          <div id="<?php echo ("quizno"),$i ?>" class="QuizForm flex justify-start items-center flex-wrap mt-20">
            <div class="flex flex-col w-4/5 h-full bg-white overflow-hidden border border-gray-400 shadow-custom"> 
            
              <div class="flex flex-row">
                <div class="px-4 py-2 font-black w-40 bg-teal-500 text-white text-center border-b-4 border-r-4 border-teal-700">คำถามที่: <span id="questionNo"> </span> <?php echo $i ?> / <?php echo $num_rows ?> <span id="scoreCard"> </span> </div>
                <div class=""> </div>
              <div class="border-b border-gray-400"></div>
              </div>

              <div class="flex flex-row h-full px-4 py-4 float-left">
                

                <!--ช่องไส่รูป-->
                <!--<div class="w-56 h-56 overflow-hidden shadow-2xl"> 
                  <img class="w-56 h-full" src="../src/imgs/mirai.jpg">
                </div>-->

                <div class="w-4/5" id="questionBox">
                <!--ช่องไส่ข้อความ-->
                <?php echo $row['question']?>
                </div>
              </div>


              <!--ช่องไส่คำตอบ-->
              <div class="border-b border-gray-400"></div>

              <div class="w-full px-4 py-3">
              <?php
              $options = "SELECT * FROM options WHERE qid ='$quizid' AND eid ='$i'";
              $query = mysqli_query($conn,$options);
              
              while($row = mysqli_fetch_array($query)){

                ?>
                <label class="mr-1">
                  <div class="rounded py-2 px-4 border shadow-2xl hover:border-gray-600 hover:bg-blue-400  w-full flex items-center cursor-pointer">
                  <input type="radio" name="quizcheck[<?php echo $row ['eid'] ?>]" value="<?php echo $row ['oid'] ?>">
                  <span class="px-2" id="op1"> <?php echo $row['options']?> </span>
                  </div>
                </label>
                <?php
          }
          ?>
              </div>
            </div>
          </div>
        <?php
    }
  }
?>
      </form>
      </div>
      <div class="flex flex-col mt-20 justify-end">    
      <button id="Btnnext" onclick="plusSlides(1)" class="border border-teal-500 bg-teal-500 text-white block rounded-sm font-bold py-4 px-6 ml-2 flex items-center">
                      ข้อถัดไป
                      <svg class="h-5 w-5 ml-2 fill-current" clasversion="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                      <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0
                          l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0
                          c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z"/>
                      </svg>
                  </button>

                  <input type="submit" name="submit" form="quiz" value="ตรวจคำตอบ" class="border border-orange-400 bg-orange-600 text-white block rounded-sm font-bold py-4 px-6 ml-2 flex items-center mt-1">
                  </div>
      </div>
    </div>
    
<script src="../dist/quiz.js"></script>

</body>
</html>