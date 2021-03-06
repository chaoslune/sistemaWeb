<html>
<head>
<title>Captcha</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/captcha.css');?>">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	

	<script type="text/javascript">
	// Ajax post for refresh captcha image.

	$(document).ready(function() 
	{
		$("a.refresh").click(function() {
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url('refresh'); ?>",
		success: function(res){
		if (res){
			jQuery("div.image").html(res);
					}
				}
			});
		});
	});
	</script>
</head>
	
<body>

	<div class="main">
		<div id="content">
			<h2 id="form_head">Desaparecido</h2><br/>

			<?php
			$this->load->model('Captcha_model', 'captcha');
			$data = $this->captcha->getCaptcha();
			?>

			<?php foreach ($data as $l): ?>
				<img src="<?php echo('assets/upload/'.$l->foto);?>" height="150" width="250"/>			
			<?php endforeach ?>
			
	<hr>
	
				<div id="form_input">
					<?php
					// Form Open
					echo form_open();
					echo "<div class='image'>";
				
					// $image is the index of $data array. which will send by controller.
					echo $image;
					echo "</div>";

					// Calling for refresh captcha image.
					echo "<a href='#' class ='refresh'><img id = 'ref_symbol' src =".base_url()."assets/img/refresh_icon.png></a>";
					echo "<br>";
					echo "<br>";

					// Captcha word field.
					echo form_label('Captcha');
					
					$data_captcha = array(
					'name' => 'captcha',
					'class' => 'input_box',
					'color' => 'white',
					'placeholder' => '',
					'id' => 'captcha'
					);
					echo form_input($data_captcha);
					?>
				</div>

				<div id="form_button">
					<?php echo form_submit('submit', 'Entrar', "class='submit'"); ?>
				<br>
				<a href="<?= base_url('consulta/').$l->idPessoa?>" align="center"> Eu vi esta pessoa </a>
				</div>	
			
			<?php
			// Form Close
			echo form_close(); ?>
		</div>
	</div>
</body>
</html>