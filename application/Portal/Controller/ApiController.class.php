<?php
namespace Portal\Controller;
use Think\Controller;

class ApiController extends Controller{
	
	public function _initialize() {

	}
	
	// 接口
	public function index(){
		var_dump(sp_sql_posts_paged());
	}
}