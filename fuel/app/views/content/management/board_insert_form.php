
<div class="span10">
	<div class="row">
		<div class="span8">
			<?php echo "<h3>$head</h3>"; ?>
		</div>
	</div>
	<div class="row">
		<div class="span10">
		<?php
			if (count($folder) == 0)
			{
				echo "Folderから登録してください。";
			}
			else
			{
		?>
			<form action="/blogworld/public/board/insert" method="post">
				<select name="f_num">
					<?php
					for( $i = 0 ; $i < count( $folder ) ; $i++ ) {
						echo "<option value='";
						echo $folder[$i]['f_num'];
						echo "'>";
						echo $folder[$i]['f_name'];
						echo "</option>";
					}	
					?>
				</select>
				<input class="input-xxlarge" type="text" name="b_header" placeholder="Input Subject">
				<?php
					if(!Package::loaded('CKEditor')) {
						Package::load('CKEditor');			
					}
					echo ckeditor('b_body', '');
				?>
				<br>
				<button class="btn btn-success" type="submit">作成</button>
			</form>
		<?php  } ?>
		</div>
	</div>
</div>