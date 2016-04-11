<?php

namespace Model;

class FolderDao extends Model  {
	public static function get_folder_list() { 
 		return DB::query('SELECT * FROM folder_list order by group')->execute()->as_array();
 	}
}
?>