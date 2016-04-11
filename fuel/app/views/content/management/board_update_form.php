<?php
	$content = $board[0]['b_body'];
	$content = str_replace("&lt;","<",$content);
	$content = str_replace("&gt;",">",$content);
	$content = str_replace("&quot;",'"',$content);
	$content = str_replace("&amp;",'&',$content);
?>
<div class="span10">
	<div class="row">
		<div class="span8">
			<?php echo "<h3>$head</h3>"; ?>
		</div>
	</div>
	<div class="row">
		<div class="span10">
			<form action="/blogworld/public/board/update" method="post">
				<?php echo "<input type='hidden' name='b_num' value='".$board[0]['b_num']."'>"; ?>
				<select name="f_num">
					<?php
					for( $i = 0 ; $i < count( $folder ) ; $i++ ) {
						$selected = "";
						if ($board[0]['f_num'] == $folder[$i]['f_num']) {
							$selected = "selected";
						}
						echo "<option $selected value='";
						echo $folder[$i]['f_num'];
						echo "'>";
						echo $folder[$i]['f_name'];
						echo "</option>";
					}	
					?>
				</select>
				<?php
					echo "<input class='input-xxlarge' type='text' name='b_header' placeholder='Input Subject' value='".$board[0]['b_header']."'>";
					if(!Package::loaded('CKEditor')) {
						Package::load('CKEditor');			
					}
					echo ckeditor('b_body', $content);
				?>
				<br>
				<button class="btn btn-success" type="submit">作成</button>
			</form>
		</div>
	</div>
</div>