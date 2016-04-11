<?php
class Controller_Board extends Controller_Template
{
	public $template = "main";
	public function action_list()
	{
		$data = array();
		$f_num          = Input::get('f_num');
		$b_num         = Input::get('b_num');
		$current_page = Input::get('current_page');
		$where_b_num = "";
		if ( empty($current_page) ) {
			$current_page = 1;
		}

		if ( empty($b_num) ) {
			$b_num = "";
		}
		else {

			$where_b_num = " and b_num = $b_num";
		}
		$limit_end   = 5;
		$limit_start  = $current_page * $limit_end - $limit_end;
		$start_page = @ceil( $current_page / $limit_end );
		$end_page  = ( $start_page * $limit_end );
		

		$folder_query = "SELECT * FROM folder_list where f_num = $f_num";
		$board_query = "SELECT * FROM board_list where f_num = $f_num $where_b_num order by b_num desc limit 0, 1";
		$board_list = "SELECT * FROM board_list where f_num = $f_num order by b_num desc limit $limit_start, $limit_end";
		$board_count = "SELECT count(*) as total FROM board_list where f_num = $f_num";

		if (!empty($b_num))
		{
			DB::query("update board_list set b_count= b_count+1 where b_num = $b_num")->execute();
		}

		$board_count = DB::query($board_count)->execute()->as_array();
		$max_page = @ceil( $board_count[0]['total'] / $limit_end );
		$data['max_page'] = $max_page;
		$data['f_num'] = $f_num;
		$data['folder'] = DB::query('SELECT * FROM folder_list order by f_group')->execute()->as_array();
		$data['board_folder'] = DB::query($folder_query)->execute()->as_array();
		$data['board'] = DB::query($board_query)->execute()->as_array();
		$data['board_list'] = DB::query($board_list)->execute()->as_array();

		$data['head'] = $data['board_folder'][0]['f_name'];
		$data['current_page'] = $current_page;
		$data['start_page'] = $start_page;
		$data['end_page'] = $end_page;

		$this->template->header  = View::forge ( 'header/header', $data );
		$this->template->content = View::forge ( 'content/board/search' , $data, false );
		$this->template->menu    = View::forge ( 'content/board/menu' , $data );
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_insert()
	{
		$data   = array();
		$f_num = Input::post('f_num');
		$b_header = Input::post('b_header');
		$b_body = Input::post('b_body');
		$data['head']  = 'Write';
		DB::query("set names utf8")->execute();
		$data['folder'] = DB::query("Insert into board_list(b_header, b_body, b_date, b_count, f_num) values('$b_header', '$b_body', now(), 0, $f_num)")->execute();

		Response::redirect("menu/board_list");
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_board_update_form()
	{
		$data   = array();
		$b_num = Input::get('b_num');
		$data['head']  = 'Update';
		$data['folder'] = DB::query('SELECT * FROM folder_list order by f_group')->execute()->as_array();
		$data['board'] = DB::query("SELECT * FROM board_list b, folder_list f where b.f_num = f.f_num and b_num=$b_num")->execute();
		$this->template->content = View::forge ( 'content/management/board_update_form' , $data, false );
		$this->template->menu    = View::forge ( 'content/management/menu' , $data );
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_board_delete()
	{
		$data   = array();
		$b_num = Input::get('b_num');
		$data['head']  = 'Update';
		DB::query("Delete from board_list where b_num=$b_num")->execute();
		Response::redirect("menu/board_list");
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_update()
	{
		$data   = array();
		$b_num = Input::post('b_num');
		$f_num = Input::post('f_num');
		$b_header = Input::post('b_header');
		$b_body = Input::post('b_body');
		$data['head']  = 'Write';
		$data['folder'] = DB::query("update board_list set b_header='$b_header', b_body='$b_body', f_num=$f_num where b_num=$b_num")->execute();

		Response::redirect("menu/board_list");
		//return Response::forge(Presenter::forge('main/index'));
	}
	public function action_404()
	{
		return Response::forge(Presenter::forge('main/404'), 404);
	}
}
	