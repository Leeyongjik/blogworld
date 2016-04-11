<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="span4">&nbsp;</div>
                <div class="span3">&nbsp;</div>
                <div class="span3 offset2">
                <?php
                    if (count($board_list) != 0) {
                ?>
                        <button type="button" class="btn btn-link" id="list_button">リスト表示</button>
                <?php }
                    else {
                ?>
                    &nbsp;
                <?php  } ?>
                </div>
            </div>
            <div id="board_list" class="row" style="display:none;">
                <div class="span10">
                <?php
                    if (count($board_list) != 0) {
                ?>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>カテゴリ</th>
                      <th>Header</th>
                      <th>登録日時</th>
                      <th>Views</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                    for ( $i = 0; $i < count( $board_list ) ; $i++ ) {
                        echo "<tr>";
                        echo "<td>".$board_list[$i]['b_num']."</td>";
                        echo "<td>".$board_list[$i]['f_name']."</td>";
                        echo "<td><a href='/blogworld/public/board/list?f_num=".$board_list[$i]['f_num']."&b_num=".$board_list[$i]['b_num']."&current_page=".$current_page."'>".$board_list[$i]['b_header']."</a></td>";
                        echo "<td>".$board_list[$i]['b_date']."</td>";
                        echo "<td>".$board_list[$i]['b_count']."</td>";
                        echo "</tr>";
                    }
                }           
                ?>
                </tbody>
            </table>
            <?php
                for ( $i = $start_page; $i <= $max_page ; $i++ ) {
                    echo "<div class='pagination pagination-centered'>";
                    echo " <a href='/blogworld/public/board/list?f_num=".$board[0]['f_num']."&b_num=".$board[0]['b_num']."&current_page=".$i."'>".$i."</a> ";
                    echo "</div>";
                }
            ?>  
            </div>
        </div>
	<div class="row">
		<div class="col-lg-12">
			  <?php 
		                    echo "<h1 class='page-header'>"; 
		                    echo $board[0]['b_header'];
		                    echo "</h1>";
		            ?>
		</div>
	</div>
        <div class="row">
            <div class="col-lg-12">
            <?php
                if ( count( $board ) == 0 ) {
                    echo "";
                }
                else {
                    for ( $i = 0; $i < count( $board ) ; $i++ ) {
                        echo $board[$i]['b_body'];
                    }
                }	
            ?>
            <!--<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Hidden Menu</a>-->
            <?php #echo $start_page; ?>
            <?php #echo $end_page."<BR>"; ?>
             <?php #echo $current_page."<BR>"; ?>
             <?php #echo @ceil(1 / 10); ?>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->