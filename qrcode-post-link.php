<?php
/**
 * Plugin Name: QR Code Post Link
 * Plugin URI: https://robertbiswas.com
 * Description: It generates a QR Code of post link and add after content.
 * Author: Robert Biswas
 * Version: 1.0.0
 * 
 */

class Qrcode_Post_Link{
	public function __construct(){
		add_action("init", array( $this,"initialize") );
	}

	public function initialize(){
		add_filter("the_content", array( $this,"qrcpl_generate_qrcode") );
	}

	public function qrcpl_generate_qrcode($content){
		$currnet_post_link = get_permalink();
		$qrcode_image = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . $currnet_post_link;
		return $content . "<p><img src={$qrcode_image}</p>";

	}
}

new Qrcode_Post_Link();