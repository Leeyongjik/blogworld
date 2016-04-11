<?php



class Controller_Main extends Controller_Template
{
	public $template = "main";
	public function action_index()
	{
		$current_page = Input::get('current_page');
		if ( empty($current_page) ) {
			$current_page = 1;
		}
		$limit_end   = 5;
		$limit_start  = $current_page * $limit_end - $limit_end;
		$start_page = @ceil( $current_page / $limit_end );
		$end_page  = ( $start_page * $limit_end );
		$board_query = "SELECT * FROM board_list b, folder_list f where b.f_num = f.f_num order by b.b_num desc limit 0, 1";
		$board_list = "SELECT * FROM board_list b, folder_list f where b.f_num = f.f_num order by b.b_num desc limit $limit_start, $limit_end";
		$board_count = "SELECT count(*) as total FROM board_list";

		$board_count = DB::query($board_count)->execute()->as_array();
		$max_page = @ceil( $board_count[0]['total'] / $limit_end );
		
		$data = array();
		$data['max_page'] = $max_page;
		$data['folder'] = DB::query('SELECT * FROM folder_list order by f_group')->execute()->as_array();
		$data['board'] = DB::query($board_query)->execute()->as_array();
		$data['board_list'] = DB::query($board_list)->execute()->as_array();
		$data['head'] = $data['board'][0]['f_name'];
		$data['current_page'] = $current_page;
		$data['start_page'] = $start_page;
		$data['end_page'] = $end_page;

		$this->template->content = View::forge ( 'content/board/list' , $data, false );
		$this->template->menu    = View::forge ( 'content/board/menu' , $data );
		//return Response::forge(Presenter::forge('main/index'));
	}

	public function action_404()
	{
		return Response::forge(Presenter::forge('main/404'), 404);
	}
}