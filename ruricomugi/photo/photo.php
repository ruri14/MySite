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
	$c20130922 = '城山公園';
	$c20140417 = '松本城';
	$c20140608 = '王ヶ頭ホテル';
	$c20140608_1 = '美ヶ原高原';
	$c20160417 = '信州大学附属中央図書館';
	$c20160417_1 = '信州大学松本キャンパス';
	$c20160214 = 'happy valentine';
	$c20160407 = '雨と桜';
	$c20160518 = '商店の猫';
	$c20160601 = '近所の子犬';
	$c20161231 = 'カフェ納め';
	$c20170412 = '東京工業大学大岡山キャンパス';
	$c20170506 = '小さいリキュール';
	$c20170601 = 'ケーキ屋さん';
	$c20171207 = '東京工業大学本館前';
	$c20171225 = '珈琲とケーキとカレー';
	$c20180714 = '上高地から';
	$c20190519 = '悪夢の始まり';
	$c20190525 = 'いい写真';
	$c20200105 = '渋谷スカイ';
	



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