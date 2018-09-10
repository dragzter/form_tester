<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package form_tester
 */

get_header();

do_header_section();
do_cta_section();
do_services_section();
do_portfolio_section();
do_cta_2_section();
do_contact_section();

get_footer();