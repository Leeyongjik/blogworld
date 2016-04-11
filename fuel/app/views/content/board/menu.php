<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="#"><i class="icon-th-list"></i>My Menu</a></li>
       <?php
              if (count($folder) != 0){
	              for( $i = 0 ; $i < count( $folder ) ; $i++ ) {
	                     echo "<li><a href='/blogworld/public/board/list?f_num=";
	                     echo $folder[$i]['f_num'];
	                     echo "'>";
	                     echo $folder[$i]['f_name'];
	                     echo "</a></li>";
	              }
              }
       ?>
    </ul>
</div>
<!-- /#sidebar-wrapper -->