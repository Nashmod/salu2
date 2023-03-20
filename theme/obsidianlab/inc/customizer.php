<?php

function mytheme_customize_register($wp_customize)
{
    //All our sections, settings, and controls will be added 

    // Theme Options Panel
    $wp_customize->add_panel(
        'obsidianlab_theme_options',
        array(
            'priority'       => 25,
            'title'            => __('Obsidianlab Theme Options', 'obsidianlab'),
            'description'      => __('Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'nd_dosth'),
        )
    );

    // Text Options Section Inside Theme
    $wp_customize->add_section(
        'obsidianlab_theme_options',
        array(
            'title'         => __('Text Options', 'obsidianlab'),
            'priority'      => 1,
            'panel'         => 'obsidianlab_theme_options'
        )
    );

    $wp_customize->add_section(
        'obsidian_lab_footer_options',
        array(
            'title'         => __('Footer', 'obsidianlab'),
            'priority'      => 1,
            'panel'         => 'obsidianlab_theme_options'
        )
    );


    // Setting for Copyright text.
    $wp_customize->add_setting(
        'obsidianlab_copyright_text',
        array(
            'default'           => __('All rights reserved ', 'obsidianlab'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );

    // Control for Copyright text
    $wp_customize->add_control(
        'obsidianlab_copyright_text',
        array(
            'type'        => 'text',
            'priority'    => 10,
            'section'     => 'obsidian_lab_footer_options',
            'label'       => 'Copyright text',
            'description' => 'Text put here will be outputted in the footer',
        )
    );

    $wp_customize->add_setting('header_textcolor', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'      => __('Header Color', 'obsidianlab'),
        'section'    => 'obsidianlab_theme_options',
        'settings'   => 'header_textcolor',
    )));

    //COLORS

    $wp_customize->add_setting(
        'obsidianlab_primary_color', //give it an ID
        array(
            'default' => '#333333', // Give it a default
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'obsidianlab_primary_color', //give it an ID
            array(
                'label'      => __('Primary Color', 'obsidianlab'), //set the label to appear in the Customizer
                'section'    => 'colors', //select the section for it to appear under  
                'settings'   => 'obsidianlab_primary_color' //pick the setting it applies to
            )
        )
    );

    $wp_customize->add_setting(
        'obsidianlab_secondary_color', //give it an ID
        array(
            'default' => '#333333', // Give it a default
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'obsidianlab_secondary_color', //give it an ID
            array(
                'label'      => __('Secondary Color', 'obsidianlab'), //set the label to appear in the Customizer
                'section'    => 'colors', //select the section for it to appear under  
                'settings'   => 'obsidianlab_secondary_color' //pick the setting it applies to
            )
        )
    );

    $wp_customize->add_setting(
        'obsidianlab_accent_color', //give it an ID
        array(
            'default' => '#333333', // Give it a default
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'obsidianlab_accent_color', //give it an ID
            array(
                'label'      => __('Accent Color', 'obsidianlab'), //set the label to appear in the Customizer
                'section'    => 'colors', //select the section for it to appear under  
                'settings'   => 'obsidianlab_accent_color' //pick the setting it applies to
            )
        )
    );

    // Add Settings logo dark mode
    $wp_customize->add_setting('logo_dark', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));
    // Add Controls logo dark mode
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_dark_control', array(
        'label'             => __('Logo Dark Mode', 'obsidianlab'),
        'priority'          => 8,
        'section'           => 'title_tagline',
        'settings'          => 'logo_dark',
    )));
}
add_action('customize_register', 'mytheme_customize_register');
