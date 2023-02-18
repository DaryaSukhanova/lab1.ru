
<!DOCTYPE html>
<html lang="ru">

<head>
   <title><?= "Matrix"; ?></title>
   <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
   <meta name="viewport" content="width=devix ce-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>

   <h1>Матрица A</h1>
   <form  method="POST" action="">
      <div class="matrix">
         
         <input autocomplete="off"  step="any" type="number" name="element11" required>
         <input autocomplete="off"  step="any" type="number" name="element12" required>
         <input autocomplete="off"  step="any" type="number" name="element13" required>
         <input autocomplete="off"  step="any" type="number" name="element21" required>
         <input autocomplete="off"  step="any" type="number" name="element22" required>
         <input autocomplete="off"  step="any" type="number" name="element23" required>
         <input autocomplete="off"  step="any" type="number" name="element31" required>
         <input autocomplete="off"  step="any" type="number" name="element32" required>
         <input autocomplete="off"  step="any" type="number" name="element33" required>
  </div>
      <input type="submit" value="Вычислить определитель матрицы" class="button">
      <input type="submit" action="app.php" value="Вывести транспонированную матрицу" class="button" >
      <input type="reset" class="button">
   </form>

   <?php 

   $element11 = $_POST['element11'];
   $element12 = $_POST['element12'];
   $element13 = $_POST['element13'];
   $element21 = $_POST['element21'];
   $element22 = $_POST['element22'];
   $element23 = $_POST['element23'];
   $element31 = $_POST['element31'];
   $element32 = $_POST['element32'];
   $element33 = $_POST['element33'];
   
   $array =array(1 => array(1 => $element11, $element12, $element13), array(1 => $element21, $element22, $element23), array(1 => $element31, $element32, $element33));
   

   $transpArray = $newArray = $array;

   $res = $element11 * $element22 * $element33 + $element12 * $element23 * $element31 + $element13 * $element21 * $element32 - $element13 * $element22 * $element31 - $element11 * $element23 * $element32 - $element12 * $element21 * $element33;
   
   if (!empty($_POST)){
      // $content = "<div class='container'>
      //    <div class='res-matrix'>
      //    <div>".$element11."</div>
      //    <div>".$element12."</div>
      //    <div>".$element13."</div>
      //    <div>".$element21."</div>
      //    <div>".$element22."</div>
      //    <div>".$element23."</div>
      //    <div>".$element31."</div>
      //    <div>".$element32."</div>
      //    <div>".$element33."</div>
      //    </div>
      // </div>";
      
      ?>
      <div class="content">
            
         
         <div class="output-matrix">
            <span>A = </span>
            <div class="container">
            
               <div class="res-matrix">
                  <?php
                     for ($i = 1; $i<=3; $i++){
                        for ($j = 1; $j<=3; $j++){
                           echo "<div class='cell'>".$array[$i][$j]."</div>";
                        }
                     }
                  ?>
               </div>
            </div>  
            <div class="det-formula">
               <span>det A = </span>
               <div class="res-matrix">
                  <?php
                     for ($i = 1; $i<=3; $i++){
                        for ($j = 1; $j<=3; $j++){
                           echo "<div class='cell'>a".$i.$j."</div>";
                        }
                     }
                  ?> 
               </div>   
                  <span>
                     = a11·a22·a33 + a12·a23·a31 + a13·a21·a32 - a13·a22·a31 - a11·a23·a32 - a12·a21·a33
                  </span>          
            </div>
  
         </div>



      <?php
         for ($i = 1; $i<=3; $i++){
            for ($j = 1; $j<=3; $j++){
               if ($array[$i][$j] < 0){
                  $array[$i][$j] = '('.$array[$i][$j].')';
               }
            }
         }  
         
         $string1 = 'det A = ';
         $string2 =  $array[1][1].'·'.$array[2][2].'·'.$array[3][3].'+'.$array[1][2].'·'.$array[2][3].'·'.$array[3][1].'+'.$array[1][3].'·'.$array[2][1].'·'.$array[3][2].'−'.$array[1][3].'·'.$array[2][2].'·'.$array[3][1].'−'.$array[1][1].'·'.$array[2][3].'·'.$array[3][2].'−'.$array[1][2].'·'.$array[2][1].'·'.$array[3][3].'='.$res;

         $result = "<div class='string'> <span>".$string1."</span>".$content."<span>".$string2."</span></div>";
         echo $result;
         
         // for($i=0; $i < $count; $i++) {
         //    if ($array[$i] === ''){
         //       echo 'Поле не заполнено'.'<br/>';
         //       exit();
         //    } else{
         //       echo $array[$i].'<br/>';
         //    }
         //    // echo gettype($array[$i]);
            
         // }

         

      }
   ?>

         <div class="output-matrix">
            <?php
            if (!empty($_POST)){
               echo '<span>Транспонированная матрица</span>';
            }
            
            ?>
            <div class="container">
            
               <div class="res-matrix">
                  <?php

                     for ($i = 1; $i<=3; $i++){
                        for ($j = 1; $j<=3; $j++){
                           $transpArray[$i][$j] = $newArray[$j][$i];
                           echo "<div class='cell'>".$transpArray[$i][$j]."</div>";
                        }
                     }
                  ?>
               </div>
            </div>      
         </div>

      </div>

</body>

</html>
