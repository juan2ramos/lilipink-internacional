<?php

/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 13/04/17
 * Time: 11:59 PM
 */
class PostPdf{
	function getHtml() {
		global $wpdb;
		$current_user = wp_get_current_user();
		$id           = $current_user->ID;
		$products     = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts 
	inner join {$wpdb->prefix}wish ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}wish.post_id where {$wpdb->prefix}wish.user_id = {$id}", OBJECT );

		if ( ! $products ) {
			return false;
		}

		return $this->generateHtml( $products );
	}

	public function getName() {
		return 'pdf';
	}

	private function generateHtml( $products ) {
		$root = $_SERVER["DOCUMENT_ROOT"];

		$html = '


<div style=" position: fixed; top: 0; left: 0; width: 100%;height: 100%;z-index: -1">
<img width="100%" src="' . $root . '/wp-content/themes/lilipink/public/images/back_pdf.jpg" alt="">
</div>
<div style="background-color: #e6007e;
	text-align: right; position: relative; z-index: 2;
	padding: 15px 40px">
	<img width="180px" src="' . $root . '/wp-content/themes/lilipink/public/images/logo.png" alt="">
</div>
<h2 style="text-align: center; color: #777; font-family: "Helvetica Neue", Helvetica, "Segoe UI", Arial, sans-serif">Mi lista de deseos Lilipink</h2>
<table style="margin-top: 16px">
';
		$i    = 0;
		foreach ( $products as $product ) {
			$i++;
			if($i % 4 == 0)
				$html .="<tr>";
			$img = str_replace( site_url(), $root, get_the_post_thumbnail_url( $product->post_id ) );
			$html .= '<td style="display: inline-block; width: 25%;margin-bottom: 20px"> ';
			$html .= '<img width="150px"  style="padding-left:10px;" src="' . $img . '">';
			$html .= '<h4 style="margin: 4px 0 0;text-align: center;font-size: 12px; color: #777; font-family: "Helvetica Neue", Helvetica, "Segoe UI", Arial, sans-serif">' . $product->post_title . '</h4>';
			$html .= '<p style="font-weight:bold;font-size: 13px; margin: 0 ;text-align: center;color: #e6007e">' . get_post_field( 'valor', $product->post_id ) . '</p>';
			$html .= '</td>';

			if($i % 4 == 0)
				$html .="</tr>";

		}

		$html .= '
</table>
<div style="text-align: center;
		padding: 15px;
	max-width: 800px;
	margin: auto;
	font-size: 16px;
	line-height: 1.3;
	color: #555;
	position: fixed;
	bottom: 100px;
		left: calc(50% - 400px );">
	<p> C.C. Los Próceres, 16 calle 02-00 zona 10 Guatemala / C.C. Frutal Boulevard, El Frutal 14-00 Complejo Comercial El Frutal, Local 37, zona 5,Villa Nueva, Guatemala
		</p>
	<span>
	<img width="15px" src="' . $root . '/wp-content/themes/lilipink/public/images/face-pdf.png" alt="">
	lilipinkguatemala</span>
	<span>
	<img width="15px" src="' . $root . '/wp-content/themes/lilipink/public/images/inst-pdf.png" alt="">
	lilipinkgt</span>
</div>	';

		return $html;
	}
}