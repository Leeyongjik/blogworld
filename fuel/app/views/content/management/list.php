<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="span8">
                <h3>メニュー管理モード</h3>
            </div>
            <div class="span3">
            &nbsp;
            </div>
        </div>
        <div class="row">
            <form action="/blogworld/public/menu/insert" method="post">
                <div class="input-append">
                    <input class="span9" id="appendedInputButton" name="folder_name" type="text">
                    <button class="btn" type="submit">生成</button>
                </div>
            </form>
            <?php
            if ( count( $folder ) == 0 ) {
                echo "<li>メニューを追加してください</li>";
            }
            else {
            ?>
            <form action="/blogworld/public/menu/folder_update" class="row" method="post">
                <select id='update_folder' name='update_folder' class='span2' onchage>
                <?php
                    for ( $i = 0; $i < count( $folder ) ; $i++ ) {
                        $selected = "";
                        if($i == 0) {
                            $selected = "selected";
                        }
                        echo "<option $selected value='".$folder[$i]['f_num']."'>".$folder[$i]['f_name']."</option>";
                    }
                ?>
                </select>
                <div class="control-group">
                    <label class="control-label" for="folder_name">更新するフォルダー名</label>
                    <div class="controls">
                        <input type="text" id="folder_name" name="folder_name" placeholder="フォルダー名" value="">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">更新</button>
                        <button type="button" class="btn" id="folder_delete">削除</button>
                    </div>
                </div>
            </form>
            <form id="folder_delete_form" action="/blogworld/public/menu/folder_delete" method="post">
                <input type="hidden" id="delete_f_num" name="f_num" value="">
            </form>
        <?php } ?>
        </div>
    </div>
</div>
<script type="text/javascript">
var folder_name = $('#update_folder option:selected').text();
$('#folder_name').val(folder_name);
$('#update_folder').change(function(){
    var folder_name = $('#update_folder option:selected').text();
    $('#folder_name').val(folder_name);
    

});

$( "#folder_delete" ).click(function() {
    
     var f_num = $('#update_folder option:selected').val();
     $('#delete_f_num').val(f_num);
     $('#folder_delete_form').submit();        
});
</script>