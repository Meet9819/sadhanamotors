                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-right" id="header-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-left">
                     


 


<?php
$con=mysqli_connect("localhost","root","","sadhaye5_motor");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// Perform queries 
 
function get_menu_tree($parent_id) 
{
    global $con;
    $menu = "";
    $sqlquery = " SELECT * FROM menu where status='1' and parent_id='" .$parent_id . "' ";
    $res=mysqli_query($con,$sqlquery);
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
    { 

      


    

        $menu .= ' <li class="has-dropdown"> <a href="shop.php?q='.$row['menu_id'].'">'.$row['menu_name'].'</a> ';
                          
        $menu .=  ' <ul class="dropdown-menu">
                       '.get_menu_tree($row['menu_id']).'
                    </ul> ' ; 

        $menu .= ' </li> 




                        ';
        

    }
    
    return $menu;

}  


?>

<?php echo get_menu_tree(0);//start from root menus having parent id 0 ?>






                    </ul>
                 