<?php

class Presenter_Main_Index extends Presenter
{
	public function view()
	{
		$this->name = $this->request()->param('name', 'TEST');
	}
}
