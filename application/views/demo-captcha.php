<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Demo Google Recaptcha di Codeigniter</title>

	<style type="text/css">
		.container {
			padding: 10px;
		}
		.error {
			color: #a94442;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Form Register</h1>
		<hr>
		<?php echo form_open('demo_captcha/index');?>
		<p>
			Nama <br>
			<input type="text" name="name" value="<?php echo set_value('name'); ?>"/> <br>
			<?php echo form_error('name'); ?>
		</p>
		<p>
			Email <br>
			<input type="email" name="email" value="<?php echo set_value('email'); ?>" /> <br>
			<?php echo form_error('email'); ?>
		</p>
		<p>
			Captcha <br>
			<?php echo $recaptcha_html;?> <br>
			<?php echo form_error('g-recaptcha-response');?>
		</p>
		<p>
			<button type="submit">Daftar</button>
		</p>
		<?php echo form_close();?>
	</div>
</body>
</html>
