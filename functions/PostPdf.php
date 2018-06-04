<?php

/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 13/04/17
 * Time: 11:59 PM
 */
class PostPdf
{
    private $postId;

    function __construct()
    {
        $this->number = $number;
    }

    function getHtml()
    {
        global $wpdb;
	    $current_user = wp_get_current_user();
	    $id = $current_user->ID ;
	    $products = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts 
	inner join {$wpdb->prefix}wish ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}wish.post_id where {$wpdb->prefix}wish.user_id = {$id}", OBJECT );

        if (!$products) {
            return false;
        }
        return $this->generateHtml();
    }

    public function getName()
    {
        return $this->metaKey['post_name'] . '-' . $this->metaKey['numero_cerficado'] . '.pdf';
    }

    private function generateHtml()
    {
        $root = $_SERVER["DOCUMENT_ROOT"];


        $html = "";
        $html .= "<img width='700'  src='$root/wp-content/themes/provaccon/assets/img/h.svg' >";
        $html .= "<div style=\"width:700px;margin:auto\">
<h2 style='text-align:center'><b>CERTIFICACIÓN DE ANCLAJES PARA TRABAJOS EN ALTURAS</b></h2>

<p style='text-align:center'><b><u>INFORMACIÓN GENERAL DELSOLICITANTE</u></b>  </p>

<p style='text-transform: uppercase'><b>NOMBRE O RAZÓN SOCIAL: $name_certificate</b></p>

<p ><b><span >NÚMERO DE IDENTIFICACIÓN O NIT: $number_certificate</span></b></p>

<p ><b ><span lang=ES-CO>DIRECCIÓN: $address_certificate  &#160; &#160; MUNICIPIO: $town_certificate</b></p>

<p ><b><span lang=ES-CO>TELÉFONO: $tel_certificate <span> &#160; &#160; &#160;E-MAIL: $email_certificate </span></b></p>

<p style='text-align:center'><b><u>INFORMACIÓN DEL ANCLAJE</u></b></p>

<table border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none;'>
 <tr >
  <td width=160 valign=top style='width:160pt;border:double 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
		
  <p style='text-align:center'><b>TIPO DE ANCLAJE.</b></p>
  </td>
  <td width=160 valign=top style='width:160pt;border:double  1.5pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p  style='text-align:center'><b>ESPECIFICACIÓN.</b></p></td>
	 
  <td width=160 valign=top style='width:160pt;border:double  1.5pt;
  border-left:none;mso-border-left-alt:double  1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p style='text-align:center'><b>REGISTRO FOTOGRÁFICO.</b></p>
</td>
 </tr>
 <tr style='height:22.65pt'>
  <td width=147 valign=top style='width:147.1pt;border:double  1.5pt;
  border-top:none;mso-border-top-alt:double  1.5pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:22.65pt'>
  <p>  $anchorage_certificate </p>
  </td>
  <td width=147 rowspan=3 valign=top style='width:147.15pt;border-top:none;
  border-left:none;border-bottom:double  1.5pt;border-right:double  1.5pt;
  mso-border-top-alt:double  1.5pt;mso-border-left-alt:double  1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:22.65pt'>
  <p>$specification_certificate</p>
  </td>
  <td width=147 rowspan=3 valign=top style='width:147.15pt;border-top:none;
  border-left:none;border-bottom:double  1.5pt;border-right:double  1.5pt;
  mso-border-top-alt:double  1.5pt;mso-border-left-alt:double  1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:22.65pt'>
  <p style='text-align:center'><b><span style='color:#BFBFBF;'>
  <img  width='200px' src='".str_replace(site_url(), $root, get_the_post_thumbnail_url($this->postId))."' alt=''></span></b></p>
  </td>
 </tr>
 <tr>
  <td width=147 valign=top style='width:147.1pt;border:double  1.5pt;
  border-top:none;mso-border-top-alt:double  1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p style='text-align:center'><b><span >UBICACIÓN.</span></b></p>
  </td>
 </tr>
 <tr style='height:60.85pt'>
  <td width=147 valign=top style='width:147.1pt;border:double  1.5pt;
  border-top:none;mso-border-top-alt:double  1.5pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:60.85pt'>
  <p >$location_certificate</p>
  </td>
 </tr>
</table>

<p><b><span >NormasAplicables Vigentes:&nbsp;&nbsp;&nbsp; <span style='mso-tab-count:1'> </span>*
Resolución 1409 del 2012,&nbsp;&nbsp;&nbsp;<span style='mso-spacerun:yes'>&nbsp; </span>* Norma
UNE EN 795 de 2012</span></b></p>

<p style='text-align:center'><b>*
Norma UNE EN 795 del 2001.</b></p>

<p ><b>Prueba realizada:</b><span> Se aplica una fuerza de<span>&nbsp; </span>tensión de 1000 dN durante 180 segundos;
La fuerza no puede disminuir más del 5% de la carga aplicada / (<b>UNE EN 795 del 2012</b>).</span></p>
<p>&nbsp;</p>
<p align=center style='text-align:center'><b>RESULTADO DE LA PRUEBA
SOBRE EL ANCLAJE:</b></p>
<div>
<table border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:double  1.5pt;
 mso-yfti-tbllook:1184;'>
 <tr>
  <td width=88 valign=top style='width:88.25pt;border:double  1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p style='text-align:center'><b>ANCLAJE N°</b></p>
  </td>
  <td width=88 valign=top style='width:88.25pt;border:double windowtext 1.5pt;
  border-left:none;mso-border-left-alt:double windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p style='text-align:center'><b>Lectura Inicial:</b></p>
  </td>
  <td width=88 valign=top style='width:88.3pt;border:double windowtext 1.5pt;
  border-left:none;mso-border-left-alt:double windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=ES-CO>Lectura Final:<o:p></o:p></span></b></p>
  </td>
  <td width=88 valign=top style='width:88.3pt;border:double windowtext 1.5pt;
  border-left:none;mso-border-left-alt:double windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=ES-CO>Tiempo:<o:p></o:p></span></b></p>
  </td>
  <td width=88 valign=top style='width:88.3pt;border:double windowtext 1.5pt;
  border-left:none;mso-border-left-alt:double windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=ES-CO>Resultado:<o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=88 valign=top style='width:92pt;border:double windowtext 1.5pt;
  border-top:none;mso-border-top-alt:double windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p >$anchorage_number_certificate</p>
  </td>
  <td width=88 valign=top style='width:91pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:double windowtext 1.5pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:double windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
 <p >$reading_ini_certificate</p>
  </td>
  <td width=88 valign=top style='width:91pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:double windowtext 1.5pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:double windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
 <p >$reading_end_certificate</p>
  </td>
  <td width=88 valign=top style='width:91pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:double windowtext 1.5pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:double windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p >$time_certificate</p>
  </td>
  <td width=88 valign=top style='width:91pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:double windowtext 1.5pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:double windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p >$result_certificate</p>
  </td>
 </tr>
</table>

</div>
<p>&nbsp;</p>
<p ><b>ANCLAJEAPROBADO:</b></p>
<p ><b>$approved_certificate</b></p>



<p><b>Fecha de Certificación: $date_certificate &#160; &#160; Fecha de Expiración: $expiration_certificate</b></p>



<p style='text-align:justify'><b><u><span>Nota:</span></u></b><span> $note_certificate </span></p>
<p style='text-align: center'>&nbsp;
	<img width='200'  src='$root/wp-content/themes/provaccon/assets/img/firma.png' >
	</p>
<p style='text-align:center;margin: 6px;'><b>Ing. MIGUEL ÁNGEL BASTIDAS MUÑOZ</b></p>
<p style='text-align:center;margin: 6px'>WWW.PROVACCON.COM</p>
<p style='text-align:center;margin: 6px'>NIT: 900.821.892-0</p>
<p style='text-align:center;margin: 6px'>info@provaccon.com</p>

</div>

";

        return $html;

    }
}