<?php
   require('connect.php');
   //phan trang
    $sotin1trang=4;
   if (isset($_GET['trang']))
   {
     $trang=$_GET['trang'];
     settype($trang,"int");
   }
   else {$trang=1;}
   if(isset($_POST['tukhoa']))
   {
       $tim=$_POST['tukhoa'];
   }
    $a=$_POST['tukhoa'];
    $mail='@gmail.com';
    $tim_email=strpos($a, '@gmail');
    $tim_diachi=strpos($a, '&nbsp;');

  if(ctype_digit($a) && strlen($a)<10)  {$sql="SELECT * FROM  customer WHERE id_cus like '$a' ";}
  elseif(ctype_digit($a) && strlen($a)>=10) {$sql="SELECT * FROM  customer WHERE phone ='$a' ";}
  elseif($tim_email>0){$sql="SELECT * FROM  customer WHERE email='$a' ";}
  elseif($tim_diachi>0){$sql="SELECT * FROM  customer WHERE diachi like'%$a%' ";}
  else 
    {$sql="SELECT * FROM  customer WHERE lastname or firstname or username like '%$a%' ";}
   $danhsach=mysqli_query($con,$sql);
   $tongsotin=mysqli_num_rows($danhsach);
   $from=($trang-1)*$sotin1trang;
   $stt=$from+1;
   if($tongsotin>0)
   {
      //$stt=1;
      while ($row = mysqli_fetch_array($danhsach)) 
       {
           ?>
           <tr>
               <td><?php echo $stt ?></td>
               <td><?php echo $row['id_cus'] ?></td>
               <td><?php echo $row['lastname'] ?></td>
               <td><?php echo $row['firstname'] ?></td>
               <td><?php echo $row['username'] ?></td>
               <td><?php echo $row['email'] ?></td>
               <td><?php echo $row['phone'] ?></td>
               <td><?php echo $row['address'] ?></td>
               <td><?php echo $row['clocked'] ? "Khóa" : "Cho phép" ?></td>
               <td>
                      <!--BUTTON SỬA-->
                      <a href="#"  data-role="update" class="sua" id="<?php echo $row['id_cus'] ?>" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">create</i>
                      </a>
                      <!--BUTTON XÓA-->
                       <a href="#" class="xoa" id="<?php echo $row['id_cus'] ?>">
                         <i class="material-icons">clear</i>
                      </a>
                    </td>
           </tr>

           <?php
           $stt++;
       }
   }

   

?>
