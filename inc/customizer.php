<?php

function mc_theme_customize_register($wp_customize)
{
    $wp_customize->add_section('office_details', array(
        'title' => __('Office details', 'mc_theme'),
    ));


    # Office - long name
    $wp_customize->add_setting('office_long_name', array(
        'description' => __("A legal, but unique office name", 'mc_theme'),
        'default' => get_theme_mod('office_short_name', 'Ministerstwo Cyfryzacji')
    ));

    $wp_customize->add_control('office_long_name', array(
        'section' => 'office_details',
        'description' => __("A legal long name eg. with city name", 'mc_theme'),
        'label' => __('Full name', 'mc_theme'),
    ));

    # Office - short name
    $wp_customize->add_setting('office_short_name', array(
        'description' => __("A legal, but unique office name", 'mc_theme'),
        'default' => get_theme_mod('office_short_name', 'Ministerstwo Cyfryzacji')
    ));

    $wp_customize->add_control('office_short_name', array(
        'section' => 'office_details',
        'description' => __("A legal long name eg. with city name", 'mc_theme'),
        'label' => __('Short name', 'mc_theme'),
    ));

    # Office - genitive form

    $wp_customize->add_setting('office_short_name_genitive', array(
        'default' => get_theme_mod('office_short_name_genitive', 'Ministerstwa')
    ));

    $wp_customize->add_control('office_short_name_genitive', array(
        'section' => 'office_details',
        'description' => __("A legal office genre in genitive form", 'mc_theme'),
        'label' => __('Genitive name', 'mc_theme'),
    ));

    # Office - URL

    $wp_customize->add_setting('office_url', array(
        'default' => get_theme_mod('office_url', 'https://www.gov.pl/cyfryzacja')
    ));

    $wp_customize->add_control('office_url', array(
        'section' => 'office_details',
        'description' => __("URL of main website of office", 'mc_theme'),
        'label' => __('Main site URL', 'mc_theme'),
    ));

    # Office - BIP
    $wp_customize->add_setting('office_bip_url', array(
        'default' => get_theme_mod('office_bip_url', 'http://mc.bip.gov.pl/')
    ));

    $wp_customize->add_control('office_bip_url', array(
        'section' => 'office_details',
        'description' => __("URL of Public Information Bulletin of office", 'mc_theme'),
        'label' => __('BIP site URL', 'mc_theme'),
    ));

    $wp_customize->add_setting('contact_section_img', array(
        'default' => get_theme_mod('contact_section_img', '')
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'contact_section_img',
        array(
            'label' => __('Upload a contact section background', 'mc_theme'),
            'description' => __("The image should have 366x311 dimensions and the background color is #e3e3e3.", 'mc_theme'),
            'section' => 'office_details',
            # Try 'section'=>'sidebar-widgets-contact-section' on Worpdress 5.0.
            # See https://make.xwp.co/2017/02/08/adding-meta-fields-to-a-widget-sidebar-section-in-the-customizer/
            'settings' => 'contact_section_img',
        )
    ));
}

add_action('customize_register', 'mc_theme_customize_register');


function mc_theme_customize_css()
{
    if (get_theme_mod('contact_section_img', '') !== '') {
        ?>
        <style type="text/css">
            @media only screen and (min-width: 992px) {
                .contact-section {
                    background-image: url("<?php echo esc_url(get_theme_mod('contact_section_img')); ?>");
                }
            }
        </style>
        <?php
    };
}

add_action('wp_head', 'mc_theme_customize_css');
