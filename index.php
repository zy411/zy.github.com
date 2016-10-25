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
        //标签展开与收回
        $(function () {
            $('dt').click(function () {
//                console.log($(this).siblings().is(':hidden'));
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
        <?php
			function filesinfo($hostdir){
				$foldernames = array_values(array_diff(scandir($hostdir),array('..','.','js','css','images','test','index.php','新建文本文档.txt')));
                foreach ($foldernames as $foldername){
                    $count = 0;
                    $filenames = array_values(array_diff(scandir($foldername),array('..','.','js','css','images')));
                    echo "<dl>";
                    echo "<dt>".$foldername."（".count($filenames)."）</dt>";
                        foreach ($filenames as $filename) {
                            $url= "<dd><a href=\"".$foldername."/".$filename."\">".basename($filename,'.html')."</a></dd>";
                            echo $url;
                        }
                    echo "</dl>";
                    //print_r($foldernames[$count]);
                    //print_r($filenames);
                    $count ++;
					}
            	}
			filesinfo(getcwd());
        ?>      
</div>
<footer></footer>
</body>
</html>