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
    <script src="../src/jquery.js"></script>
    <title>Quizlite</title>
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
        <nav class="bg-teal-500 text-white Sans-serif flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
                <div class="mb-2 sm:mb-0 inner">
                  <a href="#" class="text-2xl no-underline text-grey-900 hover:text-blue-800 font-sans font-bold">QUIZLITE</a><br>
                  <span class="text-xs text-grey-800">The Best Website Quiz</span> 
                </div>

                <div class="sm:mb-0 self-center">
                  <div class="h-10" style="display: table-cell, vertical-align: middle;">
                    <a href="index.php" class="text-lg no-underline text-grey-900 hover:text-blue-800 ml-2">Home</a>
                    <a href="manage.php" class="text-lg no-underline text-grey-900 hover:text-blue-800 ml-2">Manage</a>
                  </div>
              
                </div>
              </nav>
              
              <header>
                <div class="flex-col">
                <div class="flex justify-center text-2xl sm:text-3xl text-secondary mb-2 text-center text-white"> ยินดีต้อนรับสู่เว็บ Quizlite Project</div>
                <div class="flex justify-center text-center text-2xl text-white">The Best Website Quiz by athiwat </div>

                <section class="bg-indigo-dark h-50 p-8">
                    <div class="flex justify-center container mx-auto py-1 px-16">
                      <input class="text-center w-1/3 h-auto px- rounded mb-2 focus:outline-none focus:shadow-outline text-xl px-8 shadow-lg" type="search" placeholder="ค้นหาQuiz">
                    </div>
                </section>
                </div>
                </header>
                <script>
                  function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                      tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                      tablinks[i].className = tablinks[i].className.replace(" active", "");
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
                    $quiz = "SELECT * FROM quiz,quiztype WHERE id AND qtype=typeid AND qenable ='1'";
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
                
                      </div>
                      <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                      
                        <div class="m-3">
                        <a href="quiz.php?quizid=<?=$quizid=$row['qid'];?>"><button class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เล่น</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                        </svg>
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
                    $quiz = "SELECT * FROM quiz,quiztype WHERE typeid='1' AND qtype='1' AND qenable ='1'";
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
                
                      </div>
                      <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                      
                        <div class="m-3">
                        <a href="quiz.php?quizid=<?=$quizid=$row['qid'];?>"><button class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เล่น</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                        </svg>
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
                    $quiz = "SELECT * FROM quiz,quiztype WHERE typeid='2' AND qtype='2' AND qenable ='1'";
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
                
                      </div>
                      <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                      
                        <div class="m-3">
                        <a href="#"><button class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                        <span class="mr-2">เล่น<span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                        </svg>
                      </button></a>
                    </div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                    
                  </div>   
                  <!-- 3ฟอม -->



                </div>
                </div>

</body>
</html>