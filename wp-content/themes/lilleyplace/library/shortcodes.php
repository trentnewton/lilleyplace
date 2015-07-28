<?php

function row_sc( $atts, $content = null ) {
    return '<div class="row">'.do_shortcode($content).'</div>';
}
add_shortcode( 'row', 'row_sc' );

function small_12_sc( $atts, $content = null ) {
    return '<div class="columns small-12">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_12', 'small_12_sc' );

function small_12_medium_6_sc( $atts, $content = null ) {
    return '<div class="columns small-12 medium-6">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_12_medium_6', 'small_12_medium_6_sc' );

function small_10_medium_11_mar_b_30_sc( $atts, $content = null ) {
    return '<div class="columns small-10 medium-11 mar-b-30">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_10_medium_11_mar_b_30', 'small_10_medium_11_mar_b_30_sc' );

function small_12_mar_b_30_sc( $atts, $content = null ) {
    return '<div class="columns small-12 mar-b-30">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_12_mar_b_30', 'small_12_mar_b_30_sc' );

function small_2_medium_1_sc( $atts, $content = null ) {
    return '<div class="columns small-2 medium-1">'.do_shortcode($content).'</div>';
}
add_shortcode( 'small_2_medium_1', 'small_2_medium_1_sc' );

function h4_subheader_sc( $atts, $content = null ) {
    return '<h4 class="subheader">'.do_shortcode($content).'</h4>';
}
add_shortcode( 'h4_subheader', 'h4_subheader_sc' );

function p_small_sc( $atts, $content = null ) {
    return '<p class="small">'.do_shortcode($content).'</p>';
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
add_shortcode( 'td', 'tr_sd' );

?>
