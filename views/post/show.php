<h1>Show Action</h1>

<?php debug($cats); ?>
<?php foreach ($cats as $cat) {
		
} ?>

<button class="btn btn-success" id="btn">Нажми...</button>

<?php 
//$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);

$js = <<<JS
	$('#btn').on('click', function(){
		$.ajax({
			url: 'index.php?r=post/index',
			data: {test: 123},
			type: 'POST',
			success: function(res){
				console.log(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});
JS;

$this->registerJs($js);

 ?>