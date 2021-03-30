

<?php
 
include('db.php');


$perpage = 6;
if(isset($_GET['page']) & !empty($_GET['page'])){
  $curpage = $_GET['page'];
}else{
  $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;

$PageSql = "SELECT * FROM `products` ORDER BY id desc";

$pageres = mysqli_query($con, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$ReadSql = "SELECT * FROM `products` ORDER BY id desc LIMIT $start, $perpage ";

$res = mysqli_query($con, $ReadSql);


while($row = mysqli_fetch_assoc($res))
{

echo ''.$row['productcode'].' <Br>

';}?>

                    
















                        <ul style="padding:10px;"  class="pagination">
                            <?php if($curpage != $startpage){ ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">First</span>
                                    </a>
                                </li>
                                <?php } ?>
                                    <?php if($curpage >= 2){ ?>


      <li style="display: inline;" class="page-item">
            <a style="margin-left: 0;" class="page-link" href="?page=<?php echo $previouspage ?>">
                  <?php echo $previouspage ?>
             </a>
      </li>
  

   <?php } ?>


     <li style="display:inline;background-color: #dc0003;border-color: #dc0003;padding:10px;" class="page-item active">
           <a  style="margin-left: 0;color:white" class="page-link" href="?page=<?php echo $curpage ?>">
          <?php echo $curpage ?>
            </a>
       </li>
                                          

          <?php if($curpage != $endpage){ ?>

       <li style="display: inline;" class="page-item">
              <a  style="margin-left: 0;"  class="page-link" href="?page=<?php echo $nextpage ?>">
                   <?php echo $nextpage ?>
               </a>
       </li>
                                              

       <li style=" display: inline;" class="page-item">
              <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                       <span class="sr-only">Last</span>
               </a>
       </li>
                                             

    <?php } ?>
                        </ul>
                   
