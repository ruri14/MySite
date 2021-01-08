<!DOCTYPE html>
<html>

<head>
	<script>
		// ポップアップ機能
		$(function() {
			$(".pop").click(function(e) {
				e.preventDefault();
				var id = $(this).attr("href");
				$(id).fadeIn();
				$(".popup_bg").fadeIn();
			});
			$(".popup_bg,.close_btn").click(function() {
				$(".popup_wrapper:visible").fadeOut();
				$(".popup_bg").fadeOut();
			});
		});
</script>
</head>

<body>
<?php
	//画像のキャプチャ
	$c20200920 = 'チャコ';
	$c20201004 = 'かわいいGIFが描きたかった';
	$c20201218 = 'チャコ ~winter version~';
	$c20201220 = 'チャコ2';
	



	ini_set('display_errors',1);
	
	$dirs = array('1','2','3','4');
	foreach($dirs as $dir){
		?>
		<div class="popup_bg"></div>
		<div class="box">
		<?php
		foreach(glob('img/'.$dir.'/{*.gif,*.png,*.jpg,*.jpeg,*.GIF,*.PNG,*.JPG,*.JPEG}',GLOB_BRACE) as $file){    //directory/{*.拡張子}
			if(is_file($file)){ 
				$file_date = str_replace('img/'.$dir.'/', '', $file);
				$file_id = str_replace('.jpg','',$file_date);
				$file_id = str_replace('.png','',$file_id);
				$file_id = str_replace('.GIF','',$file_id);
				$file_info = getimagesize($file);
				$file_width = $file_info[0];
				$file_height = $file_info[1];
				?>

				<!-- サムネ要素 -->
				<div class="image">
					<a href=<?php echo '#'.$file_id; ?> class="pop">
						<img src=<?php echo $file; ?>>
						<div class="caption">
							<p><?php echo $file_date; ?></p>
						</div>
					</a>
				</div>

				<!-- popupで出てくる要素 -->
				<div id=<?php echo $file_id; ?> class="popup_wrapper">
					<div class="popup_wrapper_inner">
						<?php
							if($file_width > $file_height){
								echo "<img src={$file} id='popup_image_500'>";
							} elseif($file_width == $file_height){
								echo "<img src={$file} id='popup_image_400'>";
							}else{
								echo "<img src={$file} id='popup_image_300'>";
							}
							?>
							<p class='caption'>
								<?php echo substr($file_id,0,4).'.'.substr($file_id,4,2).'.'.substr($file_id,6,2) ?>
								<?php echo ${"c".$file_id} ?>
							</p>
							<div class="close_btn">×</div>
					</div>
				</div>
			<?php
			}
		}
	?>
	</div>
	<?php
	}
?>

</html>