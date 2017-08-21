<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "/",
	    WEB_ROOT: "/",
	    JS_ROOT: "public/js/",
	    APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
	};
	</script>
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('menu/index');?>">后台菜单</a></li>
			<li><a href="<?php echo U('menu/add');?>">添加菜单</a></li>
			<li class="active"><a href="<?php echo U('menu/lists');?>">所有菜单</a></li>
		</ul>
		<form class="form-horizontal js-ajax-form" action="<?php echo U('Menu/listorders');?>" method="post">
			<div class="table-actions">
				<a class="btn btn-primary btn-small js-ajax-dialog-btn" href="<?php echo U('menu/restore_menu');?>" data-msg="您确定恢复已备份菜单吗？它将覆盖您已经更新的菜单！">恢复菜单</a>
				<a class="btn btn-primary btn-small js-ajax-dialog-btn" href="<?php echo U('menu/backup_menu');?>" data-msg="您确定备份菜单吗？">备份菜单</a>
				<a class="btn btn-primary btn-small js-ajax-dialog-btn" href="<?php echo U('menu/export_menu_lang');?>" data-msg="您确定生成菜单多语言包吗？请确保应用目录下Lang目录可写！">生成菜单多语言包</a>
				<a class="btn btn-warning btn-small" href="<?php echo U('menu/getactions');?>">导入新菜单</a>
			</div>
			<div class="alert alert-warning" style="margin: 0 0 5px 0;">
				 请在开发人员指导下进行以上操作！
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50">ID</th>
						<th>菜单英文名称</th>
						<th width="40">状态</th>
						<th width="80">管理操作</th>
					</tr>
				</thead>
				<?php if(is_array($menus)): foreach($menus as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?>:<?php echo ($vo["app"]); ?>/<?php echo ($vo["model"]); ?>/<?php echo ($vo["action"]); ?></td>
					<td>
					<?php if($vo['status'] == 1): ?>显示
					<?php else: ?> 
					隐藏<?php endif; ?>
					</td>
					<td>
						<a href="<?php echo U('menu/edit',array('id'=>$vo['id']));?>">修改</a> | 
						<a class="js-ajax-delete" href="<?php echo U('menu/delete',array('id'=>$vo['id']));?>">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="50">ID</th>
						<th>菜单英文名称</th>
						<th width="40">状态</th>
						<th width="80">管理操作</th>
					</tr>
				</tfoot>
			</table>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
</body>
</html>