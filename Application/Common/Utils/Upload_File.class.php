<?php
namespace Application\Common\Utils;

/**
 * 文件上传
 * 
 */
class Upload_File {
    /**
     * $file:   页面文件的name
     */
    public static function todo($file){
        // var_dump($_FILES);die;
    	// && in_array($extension, $allowedExts))
        if ($_FILES[$file]["size"]>0) {
			// 允许上传的图片后缀
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES[$file]["name"]);
			$extension = end($temp);     // 获取文件后缀名


			$randname=date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".".$extension; 
			if ($_FILES[$file]["error"] > 0) {
				echo "错误：: " . $_FILES[$file]["error"] . "<br>";
			}
			else {
				// 判断当期目录下的 upload 目录是否存在该文件
				// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
				if (file_exists(PUBLIC_PATH . "//upload/" . $_FILES[$file]["name"])) {
					echo $_FILES[$file]["name"] . " 文件已经存在。 ";
				} else {
					// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
					move_uploaded_file($_FILES[$file]["tmp_name"], PUBLIC_PATH . "//upload/" . $randname);
					// echo "文件存储在: " . "upload/" . $_FILES[$file]["name"];
					return $randname;
				}
			}
		} else {
			// return "非法的文件格式";
			// return 1; // 非法文件格式
			
            return false;
        }

    }
}
