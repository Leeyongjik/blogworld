<div class="span10">
	<div class="row">
		<div class="span8">
			<h3><?php echo $head ?></h3>
		</div>
		<div class="span3">
			<?php
				echo "<a href='/blogworld/public/menu/insert_form'><h3><i class='icon-pencil'></i> 作成</h3></a>";
			?>
		</div>
	</div>
	<div class="row">
		<div class="span10">
			<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>No</th>
			      <th>カテゴリ</th>
			      <th>Header</th>
			      <th>登録日時</th>
			      <th>Views</th>
			      <th>編集</th>
			      <th>削除</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php
			  	if (count($board_info) == 0)
			  	{
			  		echo "<tr>";
			      		echo "<td colspan='7'>登録されているコンテンツがございません。</td>";
			  	}
			  	else {
			  		for ($i = 0 ; $i < count( $board_info ) ; $i++) {
			  			$class_info = "";

			  			if ($i % 3 == 1){
			  				$class_info = "class='info'";
			  			}
			  			elseif($i % 4 == 1){
			  				$class_info = "class='success'";
			  			}
			  			elseif($i % 5 == 1){
			  				$class_info = "class='danger'";
			  			}
			  			elseif($i % 6 == 1){
			  				$class_info = "class='warning'";
			  			}
			  			elseif($i % 6 == 1){
			  				$class_info = "class='active'";
			  			}
			  			echo "<tr $class_info>";
			  			echo "<td>".$board_info[$i]['b_num']."</td>";
			  			echo "<td>".$board_info[$i]['f_name']."</td>";
			  			echo "<td>".$board_info[$i]['b_header']."</td>";
			  			echo "<td>".$board_info[$i]['b_date']."</td>";
			  			echo "<td>".$board_info[$i]['b_count']."</td>";
			  			echo "<td><a href='/blogworld/public/board/board_update_form?b_num=".$board_info[$i]['b_num']."'>編集</td>";
			  			echo "<td><a href='/blogworld/public/board/board_delete?b_num=".$board_info[$i]['b_num']."'>削除</td>";
			  			echo "</tr>";
			  		}
			  	}
			  ?>
			  </tbody>
			</table> 
		</div>
	</div>
</div>