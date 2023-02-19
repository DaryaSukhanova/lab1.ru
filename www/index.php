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
         <?php 
            for ($i = 1; $i<=9; $i++){
               echo("<input autocomplete='off'  step='any' type='number' name='element".$i."' required>");
            } 
         ?>
  </div>
      <input type="submit" value="Вычислить определитель матрицы" class="button">
      <input type="reset" class="button">
   </form>

   <?php 
   $element11 = is_numeric($_POST['element1']) ? $_POST['element1']: 0;
   $element12 = is_numeric($_POST['element2']) ? $_POST['element2']: 0;
   $element13 = is_numeric($_POST['element3']) ? $_POST['element3']: 0;
   $element21 = is_numeric($_POST['element4']) ? $_POST['element4']: 0;
   $element22 = is_numeric($_POST['element5']) ? $_POST['element5']: 0;
   $element23 = is_numeric($_POST['element6']) ? $_POST['element6']: 0;
   $element31 = is_numeric($_POST['element7']) ? $_POST['element7']: 0;
   $element32 = is_numeric($_POST['element8']) ? $_POST['element8']: 0;
   $element33 = is_numeric($_POST['element9']) ? $_POST['element9']: 0;
   
   $array =array(1 => array(1 => $element11, $element12, $element13), array(1 => $element21, $element22, $element23), array(1 => $element31, $element32, $element33));
   

   $transpArray = $newArray = $array;

   $res = $element11 * $element22 * $element33 + $element12 * $element23 * $element31 + $element13 * $element21 * $element32 - $element13 * $element22 * $element31 - $element11 * $element23 * $element32 - $element12 * $element21 * $element33;
   
   if (!empty($_POST)){

      
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
      }
   ?>

         <div class="output-matrix">

            <details>
               <summary>
                  <?php
                  if (!empty($_POST)){
                     ?>
                     Транспонированная матрица
                     <?php
                  }
                  ?>
                  
               </summary>
               <div class="container">
                  <div class="transp-matrix">
                     <div class="res-matrix">
                        <?php
                           if (!empty($_POST)){
                           for ($i = 1; $i<=3; $i++){
                              for ($j = 1; $j<=3; $j++){
                                 echo "<div class='cell'>a".$j.$i."</div>";
                              }
                           }
                        }
                        ?>                    
                     </div>
                     <span> = </span>
                     <div class="res-matrix">
                        <?php
                           if (!empty($_POST)){
                           for ($i = 1; $i<=3; $i++){
                              for ($j = 1; $j<=3; $j++){
                                 $transpArray[$i][$j] = $newArray[$j][$i];
                                 echo "<div class='cell'>".$transpArray[$i][$j]."</div>";
                              }
                           }
                        }
                        ?>
                     </div>                        
                  </div>
            
            </details>

            </div>      
         </div>

      </div>

</body>

</html>
