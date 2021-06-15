<?php
require_once 'database.php';
?>
<?php
            if(isset($_POST['submit'])){;
                if(!empty($_POST['quizcheck'])) {
                $checked_count = count($_POST['quizcheck']);
                /*echo $checked_count;*/

                $ebits = ini_get('error_reporting');
                error_reporting($ebits ^ E_NOTICE);
                
                $result = 0;
                $i = 1;
                $selected = $_POST['quizcheck'];
                /*print_r($selected); */
                $q = "SELECT * FROM questions WHERE qid = '1' ";
                $query = mysqli_query($conn,$q);
                    while($rows = mysqli_fetch_array($query)){
                        /*print_r($rows['ans']);*/
                        ($checked = $rows['ans'] == $selected[$i]);
                        if($checked){
                            $result++;
                        }
                        $i++;
                    }
                }
        }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container bg-grey-lightest mx-auto h-screen shadow rounded pb-4 bg-cover" style="color:#606F7B;background-color: rgb(165, 182, 198); background-image:url('https://68.media.tumblr.com/f6a4004f3092b0d664daeabb95d5d195/tumblr_oduyciOJNb1uhjffgo1_500.gif');">
        <div class="mt-2 p-4 border-b border-grey-light  text-center">
          <span class="text-4xl font-thin">คุณทำคะแนนได้</span>
        </div>
        <div class="text-center text-xl text-grey-light p-4">
          <span></span>
          <span></span>
        </div>
        <div class="flex justify-center">
          <div class="text-center p-2">
              <div class="text-lg text-grey-light">

                  <span class="text-center text-5xl text-white mx-6  font-thin"><?php echo $result; ?> คะแนน</span>

                </div>
              <div class="flex justify-center text-grey-light tracking-wide mt-10">
              <button id="Btnnext" class="border border-teal-500 bg-teal-500 text-white block rounded-sm font-bold py-4 px-6 ml-2 flex items-center">
                      กลับหน้าแรก
                  </button>
              </div>
            </div>
        </div>
      </div>
</body>
</html>