<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>展示</title>
    <script rel="script" src="js/jquery-3.1.0.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .content {
            width: 350px;
            margin: auto;
            padding: 3px 3px 2px;
            border: 5px #3f434c solid;
            border-radius: 6px;
        }
        a {
            display: block;
            width: 100%;
            margin: 0 5px;
            font-size: 14px;
            color: #555;
            text-decoration: none;
        }
        dt {
            padding-left: 10px;
            color: #333;
            line-height: 30px;
            height: 30px;
            background: #09f;
            margin-bottom: 1px;
            font-weight: bold;
            cursor: pointer;
        }
        dd {
            display: none;
            line-height: 25px;
            height: 25px;
            background: #0cf;
            margin-bottom: 1px;
            list-style: none;
        }
        dt:hover, dd:hover {
            margin: 0;
            border: 1px #000 solid;
        }
    </style>
    <script>
        //列表展开与收回
        $(function () {
            $('dt').click(function () {
                if ($(this).siblings().is(':hidden')) {
                    $(this).parents().siblings().children('dd').slideUp();
                    $(this).siblings('dd').slideDown();
                } else {
                    $(this).siblings('dd').slideUp();
                }
            })
        })
    </script>
</head>
<body>
<header></header>
<div class="content">
<!--读取目录文件生成列表-->
<?php
	function filesinfo($hostdir){
		$folders = scandir($hostdir);
        foreach ($folders as $folder){
            if (explode('-', $folder)[1] == true){
                $files = scandir($folder);
                $filenames = array();
                foreach ($files as $file){
                    if (explode('.', $file)[1] == 'html'){
                        	$filenames[] = $file;
                        }
                }
                echo "    <dl>\n        <dt>" . $folder . "（" . count($filenames)."）</dt>\n";
                $count = 0;
                foreach ($filenames as $filename){
                    $name = explode('.', $filename);
                    $count ++;
                    	echo "        <dd><a href=\"" . $folder . "/" . $filename."\" target=\"_blank\">" . $count . ")" . $name[0] . "</a></dd>\n";
                    }
                echo "    </dl>\n";
            }
    	}
    }
	filesinfo(getcwd());
?>
</div>
<footer></footer>
</body>
</html>