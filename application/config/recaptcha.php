<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Recaptcha configuration settings
 * 
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 * 
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */

$config['recaptcha_sitekey'] = 'YOUR_RECAPTCHA_SITE_KEY'; //ganti dengan site key yang didapat saat mendaftarkan website pada google recaptcha
$config['recaptcha_secretkey'] = 'YOUR_RECAPTCHA_SECRET_KEY'; //ganti dengan secret key yang didapat saat mendaftarkan website pada google recaptcha
$config['lang'] = "";