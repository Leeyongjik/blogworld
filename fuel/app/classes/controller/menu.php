<?php

class Controller_Menu extends Controller_Template
{
	public $template = "main";
	public function action_list()
	{
		$data = array();		
		$data['folder'] = DB::query('SELECT * FROM folder_list order by f_num desc')->execute()->as_array();

		$this->template->content = View::forge ( 'content/management/list' , $data );
		$this->template->menu    = View::forge ( 'content/management/menu' , $data );
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_insert()
	{
		$data = array();
		$f_name      = Input::post('folder_name');
		$max_group = DB::query('SELECT max(f_group) AS f_group FROM folder_list')->execute()->as_array();

		if ( count ( $max_group ) == 0 ) {
			$max_group = 1;
		}
		else {
			$max_group = $max_group[0]['f_group'] + 1;
		}

		$query   = "insert into folder_list(f_name ,f_level,f_group) values('$f_name', '1', '$max_group')";
		DB::query($query)->execute();

		Response::redirect('menu/list');
	}
	public function action_insert_form()
	{
		$data   = array();
		$data['head']  = 'Write';
		$data['folder'] = DB::query('SELECT * FROM folder_list order by f_group')->execute()->as_array();

		$this->template->content = View::forge ( 'content/management/board_insert_form' , $data );
		$this->template->menu    = View::forge ( 'content/management/menu' , $data );
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_board_list()
	{
		$data = array();
		$data['head'] = 'Board List';
		$data['board_info'] = DB::query("SELECT * FROM board_list b, folder_list f where b.f_num = f.f_num order by b_num desc")->execute()->as_array();
		$this->template->content = View::forge ( 'content/management/board_list' , $data );
		$this->template->menu    = View::forge ( 'content/management/menu' , $data );
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_folder_update()
	{
		$data = array();
		$f_num  = Input::post('update_folder');
		$f_name = Input::post('folder_name');

		$data['head'] = 'Board List';
		$query = "update folder_list set f_name='".$f_name."' where f_num='".$f_num."'";
		DB::query($query)->execute();
 
		Response::redirect('menu/list');
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_folder_delete()
	{
		$data = array();
		$f_num  = Input::post('f_num');

		$data['head'] = 'Board List';
		$query = "delete from folder_list where f_num='".$f_num."'";
		DB::query($query)->execute();

		$query = "delete from board_list where f_num='".$f_num."'";
 		DB::query($query)->execute();
		Response::redirect('menu/list');
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_404()
	{
		return Response::forge(Presenter::forge('main/404'), 404);
	}
}
	