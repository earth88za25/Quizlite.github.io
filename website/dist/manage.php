<?php
require_once 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage</title>
    <link rel="stylesheet" href="../dist/css/design.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    <style>
      /* width */
      ::-webkit-scrollbar {
        width: 10px;
      }
      
      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1; 
      }
       
      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: rgb(51, 233, 172); 
      }
      
      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555; 
      }
      .tabcontent {
        display: none;
      }
      #quizall{
        display: block;
      }
      </style>
</head>
<body>
    <div class="flex items-center justify-between flex-wrap bg-teal-500 p-4">
        <div class="flex items-center flex-shrink-0 mr-5"> 
          <span class="font-semibold text-xl text-white tracking-tight font-extrabold">ManageQuiz</span>
        </div>
  </div>
  <div class="flex md:flex-row-reverse flex-warp mt-5 mr-12">
    <div class="" >
      <a href="" onClick="MyWindow=window.open('addquiz.php','MyWindow','width=600,height=300');" ><button class="bg-white text-gray-800 font-bold rounded border-b-2 border-blue-200 hover:border-blue-800 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
        <span class="mr-2">เพิ่ม<span>
        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
        </svg>
      </button></a>
    </div>
  </div>
  <script>
                  function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                      tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                      tablinks[i].className = tablinks[i].className.replace("active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                  }
                  </script>

                <div class="flex mb-4 mt-10">
                  <div class="w-1/4 bg-gray-500 h-12">
                    <div class="bg-white shadow w-64">
                    <ul class="list-reset">
                      <li >
                        <span onclick="openCity(event,'quizall')" class="tablinks block p-4 text-gray-800 font-bold border-gray-600 hover:border-purple-900 hover:bg-teal-500 border-r-4 cursor-pointer">ทั้งหมด</span>
                      </li>
                      <li >
                        <span  onclick="openCity(event,'comquiz')" class="tablinks block p-4 text-gray-800 font-bold border-gray-600 hover:border-purple-900 hover:bg-teal-500 border-r-4 cursor-pointer">คอมพิวเตอร์</span>
                      </li>
                      <li >
                        <span onclick="openCity(event,'sciquiz')" class="tablinks block p-4 text-gray-800 font-bold border-gray-600 hover:border-purple-900 hover:bg-teal-500 border-r-4 cursor-pointer">วิทยาสาสตร์</span>
                      </li>
                    </ul>
                  </div>
                  </div>
                  
                  <div class="w-full bg-gray-300 h-12 mr-8">
                    
                    <div id="quizall" class="tabcontent flex flex-col w-full h-screen overflow-scroll">
                  <?php
                    $quiz = "SELECT * FROM quiz ,quiztype WHERE id AND qtype=typeid";
                    $query = mysqli_query($conn,$quiz);
                    while($row = mysqli_fetch_array($query)){
                      $idquiz=$row['id'];
                      $status=$row['qenable'];
                      $qid=$row['qid'];
                      ?>
                    <div class="lg:flex shadow rounded-lg border  border-gray-400">
                      <div class="bg-teal-500 rounded-lg lg:w-2/12 py-4 block h-full shadow-inner">
                        <div class="text-center tracking-wide">
                          <div class="text-white font-bold text-4xl ">Quiz</div>
                          <div class="text-white font-normal text-2xl">Lite</div>
                        </div>
                      </div>
                      <div class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                        <div class="flex flex-row lg:justify-start justify-center">
                          <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                          <?php echo $row['typename']; ?>
                          </div>
                        </div>
                        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
                        <?php echo $row['quizname']?>
                        </div>
                        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2"><?php if ($row['qenable']==1){
                        echo ("<span class='text-green-700'>เปิด</span>");
                      }else{
                      echo ("<span class='text-red-700'>ปิด</span>");
                      }?> </div>
                        <?php
                        $sql = "SELECT count(id) AS total FROM questions WHERE qid = '$qid' ";
                        $result = mysqli_query($conn,$sql);
                        $values = mysqli_fetch_assoc($result);
                        $num_rows=$values['total'];
                        ?>
                      <div class="font-bold text-gray-800 text-xl text-center lg:text-left px-2"><?php echo $num_rows; ?> คำถาม</div>
      

                      </div>
                      <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                        <div class="m-3">
                      <a href="update.php?id=<?php echo $idquiz; ?>&status=<?php echo $status; ?>">
                        <button type="submit" name="update" class="bg-white text-gray-800 font-bold rounded border-b-2 border-yellow-500 hover:border-red-600 hover:bg-yellow-500 hover:text-red-800 shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เปิดปิด<span>
                      </button></a>
                    </div>
                    <div class="m-3">
                      <a href="" onClick="MyWindow=window.open('AddQuestions.php?qid=<?php echo $qid; ?>','MyWindow','width=600,height=600');">
                        <button type="submit" name="update" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-yellow-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เพิ่มคำถาม<span>
                      </button></a>
                    </div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                  </div>   

                  <!-- 1ฟอม -->
                  <div id="comquiz" class="tabcontent flex flex-col w-full h-screen overflow-scroll">
                  <?php
                    $quiz = "SELECT * FROM quiz,quiztype WHERE typeid='1' AND qtype='1'";
                    $query = mysqli_query($conn,$quiz);
                    while($row = mysqli_fetch_array($query)){

                  ?>
                    <div class="lg:flex shadow rounded-lg border  border-gray-400">
                      <div class="bg-teal-500 rounded-lg lg:w-2/12 py-4 block h-full shadow-inner">
                        <div class="text-center tracking-wide">
                          <div class="text-white font-bold text-4xl ">Quiz</div>
                          <div class="text-white font-normal text-2xl">Lite</div>
                        </div>
                      </div>
                      <div class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                        <div class="flex flex-row lg:justify-start justify-center">
                          <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                          <?php echo $row['typename']; ?>
                          </div>
                        </div>
                        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
                        <?php echo $row['quizname']?>
                        </div>
                        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2"><?php if ($row['qenable']==1){
                        echo ("<span class='text-green-700'>เปิด</span>");
                      }else{
                      echo ("<span class='text-red-700'>ปิด</span>");
                      }?> </div>
                        <?php
                        $sql = "SELECT count(id) AS total FROM questions WHERE qid = '$qid' ";
                        $result = mysqli_query($conn,$sql);
                        $values = mysqli_fetch_assoc($result);
                        $num_rows=$values['total'];
                        ?>
                      <div class="font-bold text-gray-800 text-xl text-center lg:text-left px-2"><?php echo $num_rows; ?> คำถาม</div>
      

                      </div>
                      <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                        <div class="m-3">
                      <a href="update.php?id=<?php echo $idquiz; ?>&status=<?php echo $status; ?>">
                        <button type="submit" name="update" class="bg-white text-gray-800 font-bold rounded border-b-2 border-yellow-500 hover:border-red-600 hover:bg-yellow-500 hover:text-red-800 shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เปิดปิด<span>
                      </button></a>
                    </div>
                    <div class="m-3">
                      <a href="" onClick="MyWindow=window.open('AddQuestions.php?qid=<?php echo $qid; ?>','MyWindow','width=600,height=600');">
                        <button type="submit" name="update" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-yellow-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เพิ่มคำถาม<span>
                      </button></a>
                    </div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                    
                  </div>   
                  <!-- 2ฟอม -->

                  <div id="sciquiz" class="tabcontent flex flex-col w-full h-screen overflow-scroll">
                  <?php
                    $quiz = "SELECT * FROM quiz,quiztype WHERE typeid='2' AND qtype='2'";
                    $query = mysqli_query($conn,$quiz);
                    while($row = mysqli_fetch_array($query)){

                  ?>
                    <div class="lg:flex shadow rounded-lg border  border-gray-400">
                      <div class="bg-teal-500 rounded-lg lg:w-2/12 py-4 block h-full shadow-inner">
                        <div class="text-center tracking-wide">
                          <div class="text-white font-bold text-4xl ">Quiz</div>
                          <div class="text-white font-normal text-2xl">Lite</div>
                        </div>
                      </div>
                      <div class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                        <div class="flex flex-row lg:justify-start justify-center">
                          <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                          <?php echo $row['typename']; ?>
                          </div>
                        </div>
                        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
                        <?php echo $row['quizname']?>
                        </div>
                
                        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2"><?php if ($row['qenable']==1){
                        echo ("<span class='text-green-700'>เปิด</span>");
                      }else{
                      echo ("<span class='text-red-700'>ปิด</span>");
                      }?> </div>
                        <?php
                        $sql = "SELECT count(id) AS total FROM questions WHERE qid = '$qid' ";
                        $result = mysqli_query($conn,$sql);
                        $values = mysqli_fetch_assoc($result);
                        $num_rows=$values['total'];
                        ?>
                      <div class="font-bold text-gray-800 text-xl text-center lg:text-left px-2"><?php echo $num_rows; ?> คำถาม</div>
      

                      </div>
                      <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                        <div class="m-3">
                      <a href="update.php?id=<?php echo $idquiz; ?>&status=<?php echo $status; ?>">
                        <button type="submit" name="update" class="bg-white text-gray-800 font-bold rounded border-b-2 border-yellow-500 hover:border-red-600 hover:bg-yellow-500 hover:text-red-800 shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เปิดปิด<span>
                      </button></a>
                    </div>
                    <div class="m-3">
                      <a href="" onClick="MyWindow=window.open('AddQuestions.php?qid=<?php echo $qid; ?>','MyWindow','width=600,height=600');">
                        <button type="submit" name="update" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-yellow-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เพิ่มคำถาม<span>
                      </button></a>
                    </div>
                      </div>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                    
                  </div>

</body>
</html>