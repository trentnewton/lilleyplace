<?php

function row_sc( $atts, $content = null ) {
    return '<div class="row">'.do_shortcode($content).'</div>';
}
add_shortcode( 'row', 'row_sc' );

function small_12_sc( $atts, $content = null ) {
    return '<div class="column">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_12', 'small_12_sc' );

function medium_6_sc( $atts, $content = null ) {
    return '<div class="columns medium-6">'.do_shortcode($content).'</div>';
}
add_shortcode( 'medium_6', 'medium_6_sc' );

function medium_6_mar_t_30_sc( $atts, $content = null ) {
    return '<div class="columns medium-6 mar-t-30">'.do_shortcode($content).'</div>';
}
add_shortcode( 'medium_6_mar_t_30', 'medium_6_mar_t_30_sc' );

function small_10_medium_11_mar_b_30_sc( $atts, $content = null ) {
    return '<div class="columns small-10 medium-11 mar-b-30">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_10_medium_11_mar_b_30', 'small_10_medium_11_mar_b_30_sc' );

function small_12_mar_b_30_sc( $atts, $content = null ) {
    return '<div class="columns mar-b-30">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_12_mar_b_30', 'small_12_mar_b_30_sc' );

function small_2_medium_1_sc( $atts, $content = null ) {
    return '<div class="columns small-2 medium-1">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_2_medium_1', 'small_2_medium_1_sc' );

function p_subheader_lead_sc( $atts, $content = null ) {
    return '<p class="subheader lead">'.do_shortcode($content).'</p>';
}
add_shortcode( 'p_subheader_lead', 'p_subheader_lead_sc' );

function p_small_sc( $atts, $content = null ) {
    return '<p role="note" class="small">'.do_shortcode($content).'</p>';
}
add_shortcode( 'p_small', 'p_small_sc' );

function dropcap_sc( $atts, $content = null ) {
    return '<span class="tt-dropcap-round">'.do_shortcode($content).'</span>';
}
add_shortcode( 'dropcap', 'dropcap_sc' );

function contentbox_sc( $atts, $content = null ) {
    return '<div class="tt-contentbox">'.do_shortcode($content).'</div>';
}
add_shortcode( 'contentbox', 'contentbox_sc' );

function contentbox_title_sc( $atts, $content = null ) {
    return '<div class="tt-contentbox-title tt-cb-title-lime-green">'.do_shortcode($content).'</div>';
}
add_shortcode( 'contentbox_title', 'contentbox_title_sc' );

function contentbox_content_sc( $atts, $content = null ) {
    return '<div class="tt-contentbox-content">'.do_shortcode($content).'</div>';
}
add_shortcode( 'contentbox_content', 'contentbox_content_sc' );

function figure_sc( $atts, $content = null ) {
    return '<figure>'.do_shortcode($content).'</figure>';
}
add_shortcode( 'figure', 'figure_sc' );

function table_sc( $atts, $content = null ) {
    return '<table>'.do_shortcode($content).'</table>';
}
add_shortcode( 'table', 'table_sc' );

function caption_sc( $atts, $content = null ) {
    return '<caption>'.do_shortcode($content).'</caption>';
}
add_shortcode( 'caption', 'caption_sc' );

function thead_sc( $atts, $content = null ) {
    return '<thead>'.do_shortcode($content).'</thead>';
}
add_shortcode( 'thead', 'thead_sc' );

function th_sc( $atts, $content = null ) {
    return '<th>'.do_shortcode($content).'</th>';
}
add_shortcode( 'th', 'th_sc' );

function tbody_sc( $atts, $content = null ) {
    return '<tbody>'.do_shortcode($content).'</thead>';
}
add_shortcode( 'tbody', 'tbody_sc' );

function tr_sc( $atts, $content = null ) {
    return '<tr>'.do_shortcode($content).'</tr>';
}
add_shortcode( 'tr', 'tr_sc' );

function td_sc( $atts, $content = null ) {
    return '<td>'.do_shortcode($content).'</td>';
}
add_shortcode( 'td', 'tr_sc' );

function website_shortcode( $atts ) {
   extract(shortcode_atts(array(
       'key' => '',
   ), $atts));
   return get_bloginfo($key);
}
add_shortcode('website', 'website_shortcode');

function email_shortcode( $atts ) {
   extract(shortcode_atts(array(
       'key' => '',
   ), $atts));
   return antispambot(get_option('admin_email'));
}
add_shortcode('email', 'email_shortcode');

function tel_shortcode( $atts , $content = null ) {
  return '<a href="tel:' . rawurlencode( $content ) . '">' . $content . '</a>';
}
add_shortcode( 'tel', 'tel_shortcode' );

?>
