<?php
namespace Portal\Controller;
use Think\Controller;

class ApiController extends Controller{
	
	public function _initialize() {

	}
	
	// 接口
	public function index(){
		$data=sp_sql_posts_paged("field:post_title,post_excerpt,post_date,smeta;limit:0,8;order:post_date desc,listorder desc;")['posts'];
		foreach ($data as $k => $v) {
			$data[$k]['smeta']=json_decode($v['smeta'],true)['thumb'];
		}
		echo json_encode($data);
	}
}