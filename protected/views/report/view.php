<?php
/* @var $this ReportController */
/* @var $model Report */
$arr_pengirim = explode('@', $model->pengirim);
$pengirim = substr($arr_pengirim[0],0,-2).'**@******.***';

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Report', 'url'=>array('index')),
	array('label'=>'Create Report', 'url'=>array('create')),
);
?>
<br>
<div class="well media span7">
<h4><?php echo $model->judul; ?>
<br>
<small><?php echo date_format(date_create($model->dateposted),'D, d M Y - H:i:s').' oleh '.$pengirim;?></small>
</h4>
<img class="media-object pull-left img-polaroid" style="max-width: 200px" src="<?php echo ($model->image != '')? Yii::app()->baseUrl.'/'.$model->image: Yii::app()->baseUrl.'/public/empty.png';?>">
<p>
<?php
	echo $model->berita;
?>
</p>
<?php if($model->lokasi != ''):?>
	<br style="clear: both">
	<div id="map" class="img-rounded media-object pull-left" style="height: 300px; width: 400px">Memuat peta..</div>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script>
		window.onload = function(){

			var mapProperties = {
				center:new google.maps.LatLng(<?php echo str_replace(';',',',$model->lokasi); ?>),
				zoom:15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById("map"), mapProperties);

			var lokasi = new google.maps.LatLng(<?php echo str_replace(';',',',$model->lokasi); ?>);
			new google.maps.Marker({
				map: map,
				position: lokasi,
				title: "<?php echo $model->judul;?>"
			});
		}

	</script>
<?php endif; ?>
</div>