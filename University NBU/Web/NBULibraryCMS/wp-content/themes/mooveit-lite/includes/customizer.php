<?php

/**
 *	Customizer
 */
function mooveit_lite_customizer( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';

	$bloginfo_version = get_bloginfo( 'version' );

	/**
	 *	Mooveit Lite Note
	 */
	class mooveit_lite_note extends WP_Customize_Control {
        public function render_content() {
            echo __( 'This feature is available in the <a href="'. esc_url( __( 'https://themeisle.com/themes/mooveit/', 'mooveit_lite' ) ) .'" title="premium version" target="_blank">premium version</a>.', 'mooveit_lite' );
        }
    }

    if ( $bloginfo_version >= 4.0 ) {

    	/**
		 *	General Panel
		 */
		$wp_customize->add_panel( 'mooveit_lite_general_panel', array(
			'priority'          => 200,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'General', 'mooveit_lite' ),
			'description'       => __( 'General settings.', 'mooveit_lite' ),
		) );

			/**
			 *	Header Section
			 */
			$wp_customize->add_section( 'mooveit_lite_general_header_section', array(
				'priority'          => 1,
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '',
				'title'             => __( 'Header', 'mooveit_lite' ),
				'description'       => __( 'Settings for header.', 'mooveit_lite' ),
				'panel'             => 'mooveit_lite_general_panel',
			) );

    } else {

    	/**
		 *	Header Section
		 */
		$wp_customize->add_section( 'mooveit_lite_general_header_section', array(
			'priority'          => 1,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Header', 'mooveit_lite' ),
			'description'       => __( 'Settings for header.', 'mooveit_lite' )
		) );

    }

			// Title
			$wp_customize->add_setting( 'mooveit_lite_general_header_title', array(
				'default'           => __( 'Call us now', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_general_header_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_general_header_section',
				'settings'  => 'mooveit_lite_general_header_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Telephone number
			$wp_customize->add_setting( 'mooveit_lite_general_header_telephonenumber', array(
				'default'           => __( '+1 234 546 545', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_general_header_telephonenumber', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_general_header_section',
				'settings'  => 'mooveit_lite_general_header_telephonenumber',
				'label'     => __( 'Telephone number:', 'mooveit_lite' ),
				'type'      => 'text'
			 ) );

		// Socials Link Section
		$wp_customize->add_section( 'mooveit_lite_general_socialslink_section', array(
			'priority'          => 2,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Socials Link', 'mooveit_lite' ),
			'description'       => __( 'Settings for socials link.', 'mooveit_lite' ),
			'panel'             => 'mooveit_lite_general_panel',
		) );

			// Facebook link
			$wp_customize->add_setting( 'mooveit_lite_general_socialslink_facebooklink', array(
				'default'           => __( 'http://www.facebook.com', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'mooveit_lite_general_socialslink_facebooklink', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_general_socialslink_section',
				'settings'  => 'mooveit_lite_general_socialslink_facebooklink',
				'label'     => __( 'Facebook link:', 'mooveit_lite' ),
				'type'      => 'text'
			 ) );

			// Twitter link
			$wp_customize->add_setting( 'mooveit_lite_general_socialslink_twitterlink', array(
				'default'           => __( 'http://www.twitter.com', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'mooveit_lite_general_socialslink_twitterlink', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_general_socialslink_section',
				'settings'  => 'mooveit_lite_general_socialslink_twitterlink',
				'label'     => __( 'Twitter link:', 'mooveit_lite' ),
				'type'      => 'text'
			 ) );

			// YouTube link
			$wp_customize->add_setting( 'mooveit_lite_general_socialslink_youtubelink', array(
				'default'           => __( 'http://www.youtube.com', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'mooveit_lite_general_socialslink_youtubelink', array(
				'priority'  => 3,
				'section'   => 'mooveit_lite_general_socialslink_section',
				'settings'  => 'mooveit_lite_general_socialslink_youtubelink',
				'label'     => __( 'YouTube link:', 'mooveit_lite' ),
				'type'      => 'text'
			 ) );

			// Google+ link
			$wp_customize->add_setting( 'mooveit_lite_general_socialslink_googlepluslink', array(
				'default'           => __( 'http://www.google.com', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'mooveit_lite_general_socialslink_googlepluslink', array(
				'priority'  => 4,
				'section'   => 'mooveit_lite_general_socialslink_section',
				'settings'  => 'mooveit_lite_general_socialslink_googlepluslink',
				'label'     => __( 'Google+ link:', 'mooveit_lite' ),
				'type'      => 'text'
			 ) );

		/**
		 *	Footer Section
		 */
		$wp_customize->add_section( 'mooveit_lite_general_footer_section', array(
			'priority'          => 3,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Footer', 'mooveit_lite' ),
			'description'       => __( 'Settings for footer.', 'mooveit_lite' ),
			'panel'             => 'mooveit_lite_general_panel',
		) );

			// Copyright
			$wp_customize->add_setting( 'mooveit_lite_general_subheader_copyright', array(
                'default'           => __( 'Copyright '.get_bloginfo('name'), 'mooveit_lite' ),
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_textarea',
            ) );
            $wp_customize->add_control( 'mooveit_lite_general_subheader_copyright', array(
                'type'          => 'textarea',
                'priority'      => 2,
                'section'       => 'mooveit_lite_general_footer_section',
                'label'         => __( 'Copyright:', 'mooveit_lite' )
            ) );

    if ( $bloginfo_version >= 4.0 ) {

    	/**
	     *	Frontpage Panel
	     */
		$wp_customize->add_panel( 'mooveit_lite_frontpage_panel', array(
			'priority'          => 250,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Frontpage', 'mooveit_lite' ),
			'description'       => __( 'Settings for frontpage.', 'mooveit_lite' ),
		) );

			/**
			 *	Subheader Section
			 */
			$wp_customize->add_section( 'mooveit_lite_frontpage_subheader_section', array(
				'priority'          => 1,
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '',
				'title'             => __( 'Subheader', 'mooveit_lite' ),
				'description'       => __( 'Settings for subheader.', 'mooveit_lite' ),
				'panel'             => 'mooveit_lite_frontpage_panel',
			) );

    } else {

    	/**
		 *	Subheader Section
		 */
		$wp_customize->add_section( 'mooveit_lite_frontpage_subheader_section', array(
			'priority'          => 1,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Subheader', 'mooveit_lite' ),
			'description'       => __( 'Settings for subheader.', 'mooveit_lite' ),
		) );

    }

			// Article title
			$wp_customize->add_setting( 'mooveit_lite_frontpage_subheader_articletitle', array(
				'default'           => __( 'Finibus Bonorum et Malorum', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_subheader_articletitle', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_frontpage_subheader_section',
				'settings'  => 'mooveit_lite_frontpage_subheader_articletitle',
				'label'     => __( 'Article title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Article entry
			$wp_customize->add_setting( 'mooveit_lite_frontpage_subheader_articleentry', array(
				'default'           => __( 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_textarea',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_subheader_articleentry', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_frontpage_subheader_section',
				'settings'  => 'mooveit_lite_frontpage_subheader_articleentry',
				'label'     => __( 'Article entry:', 'mooveit_lite' ),
				'type'      => 'textarea'
			) );

			// Button link
			$wp_customize->add_setting( 'mooveit_lite_frontpage_subheader_articlebuttonlink', array(
				'default'           => __( '#', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_subheader_articlebuttonlink', array(
				'priority'  => 3,
				'section'   => 'mooveit_lite_frontpage_subheader_section',
				'settings'  => 'mooveit_lite_frontpage_subheader_articlebuttonlink',
				'label'     => __( 'Button link:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

		// Features Box Section
		$wp_customize->add_section( 'mooveit_lite_frontpage_featuresbox_section', array(
			'priority'          => 2,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Features Box', 'mooveit_lite' ),
			'description'       => __( 'Settings for features box.', 'mooveit_lite' ),
			'panel'             => 'mooveit_lite_frontpage_panel',
		) );

			// Title
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_title', array(
				'default'           => __( 'Our services', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Box 1 - Title
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_box1title', array(
				'default'           => __( 'Professional services', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_box1title', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_box1title',
				'label'     => __( 'Box 1 - Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Box 1 - Entry
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_box1entry', array(
				'default'           => __( 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete.', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_textarea',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_box1entry', array(
				'priority'  => 3,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_box1entry',
				'label'     => __( 'Box 1 - Entry:', 'mooveit_lite' ),
				'type'      => 'textarea'
			) );

			// Box 2 - Title
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_box2title', array(
				'default'           => __( 'Lowest price', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_box2title', array(
				'priority'  => 4,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_box2title',
				'label'     => __( 'Box 2 - Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Box 2 - Entry
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_box2entry', array(
				'default'           => __( 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_textarea',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_box2entry', array(
				'priority'  => 5,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_box2entry',
				'label'     => __( 'Box 2 - Entry:', 'mooveit_lite' ),
				'type'      => 'textarea'
			) );

			// Box 3 - Title
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_box3title', array(
				'default'           => __( 'Free estimate', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_box3title', array(
				'priority'  => 6,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_box3title',
				'label'     => __( 'Box 3 - Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Box 3 - Entry
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuresbox_box3entry', array(
				'default'           => __( 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_textarea',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuresbox_box3entry', array(
				'priority'  => 7,
				'section'   => 'mooveit_lite_frontpage_featuresbox_section',
				'settings'  => 'mooveit_lite_frontpage_featuresbox_box3entry',
				'label'     => __( 'Box 3 - Entry:', 'mooveit_lite' ),
				'type'      => 'textarea'
			) );

		/**
		 *	Featured Article Section
		 */
		$wp_customize->add_section( 'mooveit_lite_frontpage_featuredarticle_section', array(
			'priority'          => 3,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Featured Article', 'mooveit_lite' ),
			'description'       => __( 'Settings for featured article.', 'mooveit_lite' ),
			'panel'             => 'mooveit_lite_frontpage_panel',
		) );

			// Title
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuredarticle_title', array(
				'default'           => __( 'About our services', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuredarticle_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_frontpage_featuredarticle_section',
				'settings'  => 'mooveit_lite_frontpage_featuredarticle_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuredarticle_entry', array(
				'default'           => __( '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p> <p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection.</p>', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_featuredarticle_entry', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_frontpage_featuredarticle_section',
				'settings'  => 'mooveit_lite_frontpage_featuredarticle_entry',
				'label'     => __( 'Entry:', 'mooveit_lite' ),
				'type'      => 'textarea'
			) );

			// Image
			$wp_customize->add_setting( 'mooveit_lite_frontpage_featuredarticle_image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mooveit_lite_frontpage_featuredarticle_image', array(
                'priority'  => 3,
                'label'     => __( 'Image:', 'mooveit_lite' ),
                'section'   => 'mooveit_lite_frontpage_featuredarticle_section',
                'settings'  => 'mooveit_lite_frontpage_featuredarticle_image',
            ) ) );

        /**
         *	Latest News Section
         */
        $wp_customize->add_section( 'mooveit_lite_frontpage_latestnews_section', array(
			'priority'          => 4,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Latest News', 'mooveit_lite' ),
			'description'       => __( 'Settings for latest news.', 'mooveit_lite' ),
			'panel'             => 'mooveit_lite_frontpage_panel',
		) );

			// Title
        	$wp_customize->add_setting( 'mooveit_lite_frontpage_latestnews_title', array(
				'default'           => __( 'Latest News', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_latestnews_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_frontpage_latestnews_section',
				'settings'  => 'mooveit_lite_frontpage_latestnews_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Hide
			$wp_customize->add_setting( 'mooveit_lite_frontpage_latestnews_hide', array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_frontpage_latestnews_hide', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_frontpage_latestnews_section',
				'settings'  => 'mooveit_lite_frontpage_latestnews_hide',
				'label'     => __( 'Hide this section?', 'mooveit_lite' ),
				'type'      => 'checkbox'
			) );

	if ( $bloginfo_version >= 4.0 ) {

		/**
		 *	Contact Page Section
		 */
		$wp_customize->add_panel( 'mooveit_lite_contactpage_panel', array(
			'priority'          => 300,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Contact Page', 'mooveit_lite' ),
			'description'       => __( 'Settings for contact page.', 'mooveit_lite' ),
		) );

			/**
			 *	Map Section
			 */
			$wp_customize->add_section( 'mooveit_lite_contactpage_map_section', array(
				'priority'          => 1,
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '',
				'title'             => __( 'Map', 'mooveit_lite' ),
				'description'       => __( 'Settings for map.', 'mooveit_lite' ),
				'panel'             => 'mooveit_lite_contactpage_panel',
			) );

	} else {

		/**
		 *	Map Section
		 */
		$wp_customize->add_section( 'mooveit_lite_contactpage_map_section', array(
			'priority'          => 1,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Map', 'mooveit_lite' ),
			'description'       => __( 'Settings for map.', 'mooveit_lite' ),
		) );

	}

			// Title
			$wp_customize->add_setting( 'mooveit_lite_contactpage_map_title', array(
				'default'           => __( 'Map', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_contactpage_map_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_contactpage_map_section',
				'settings'  => 'mooveit_lite_contactpage_map_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Code
			$wp_customize->add_setting( 'mooveit_lite_contactpage_map_code', array(
				'sanitize_callback'	=> 'esc_textarea'
			) );
			$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mooveit_lite_contactpage_map_code', array(
			            'label' 	=> __( 'Code:', 'mooveit_lite' ),
			            'section' 	=> 'mooveit_lite_contactpage_map_section',
			            'settings' 	=> 'mooveit_lite_contactpage_map_code',
			            'priority' 	=> 2
			        )
			    )
			);

		// Contact Info Section
		$wp_customize->add_section( 'mooveit_lite_contactpage_contactinfo_section', array(
			'priority'          => 2,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Contact Info', 'mooveit_lite' ),
			'description'       => __( 'Settings for contact info.', 'mooveit_lite' ),
			'panel'             => 'mooveit_lite_contactpage_panel',
		) );

			// Title
			$wp_customize->add_setting( 'mooveit_lite_contactpage_contactinfo_title', array(
				'default'           => __( 'Get in touch', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_contactpage_contactinfo_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_contactpage_contactinfo_section',
				'settings'  => 'mooveit_lite_contactpage_contactinfo_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Address
			$wp_customize->add_setting( 'mooveit_lite_contactpage_contactinfo_address', array(
				'default'			=> 'USA<br /> New York<br /> New Street, no 5, 999888',
				'sanitize_callback'	=> 'esc_textarea'
			) );
			$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mooveit_lite_contactpage_contactinfo_address', array(
			            'label' 	=> __( 'Address:', 'mooveit_lite' ),
			            'section' 	=> 'mooveit_lite_contactpage_contactinfo_section',
			            'settings' 	=> 'mooveit_lite_contactpage_contactinfo_address',
			            'priority' 	=> 2
			        )
			    )
			);

			// Entry
			$wp_customize->add_setting( 'mooveit_lite_contactpage_contactinfo_entry', array(
				'default'           => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_textarea',
			) );
			$wp_customize->add_control( 'mooveit_lite_contactpage_contactinfo_entry', array(
				'priority'  => 3,
				'section'   => 'mooveit_lite_contactpage_contactinfo_section',
				'settings'  => 'mooveit_lite_contactpage_contactinfo_entry',
				'label'     => __( 'Entry:', 'mooveit_lite' ),
				'type'      => 'textarea'
			) );

			// Telephone
			$wp_customize->add_setting( 'mooveit_lite_contactpage_contactinfo_telephone', array(
				'default'           => __( '+1 342 434 234', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_contactpage_contactinfo_telephone', array(
				'priority'  => 4,
				'section'   => 'mooveit_lite_contactpage_contactinfo_section',
				'settings'  => 'mooveit_lite_contactpage_contactinfo_telephone',
				'label'     => __( 'Telephone:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// E-mail
			$wp_customize->add_setting( 'mooveit_lite_contactpage_contactinfo_email', array(
				'default'			=> 'contact@yourwebsite.com',
				'type'				=> 'theme_mod',
				'capability'		=> 'edit_theme_options',
				'transport'			=> '',
				'sanitize_callback'	=> 'sanitize_email',
			) );

			$wp_customize->add_control( 'mooveit_lite_contactpage_contactinfo_email', array(
			    'type'		=> 'email',
			    'priority'	=> 5,
			    'section'	=> 'mooveit_lite_contactpage_contactinfo_section',
			    'label'		=> __( 'E-mail', 'mooveit_lite' ),
			) );

		/**
		 *	Testimonials Page Section
		 */
		$wp_customize->add_section( 'mooveit_lite_testimonialspage_section', array(
			'priority'          => 350,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Testimonials Page', 'mooveit_lite' ),
			'description'       => __( 'Settings for testimonials page.', 'mooveit_lite' ),
		) );

			// Note
	        $wp_customize->add_setting( 'mooveit_lite_testimonialspage_note', array(
	            'sanitize_callback' =>  'mooveit_lite_sanitize_callback_text'
	        ) );
	        $wp_customize->add_control( new mooveit_lite_note ( $wp_customize,'mooveit_lite_testimonialspage_note', array(
	            'section'  => 'mooveit_lite_testimonialspage_section'
	        ) ) );

	    /**
	     *	Plans Page
	     */
	    $wp_customize->add_section( 'mooveit_lite_planspage_section', array(
			'priority'          => 400,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Plans Page', 'mooveit_lite' ),
			'description'       => __( 'Settings for plans page.', 'mooveit_lite' ),
		) );

			// Note
	    	$wp_customize->add_setting( 'mooveit_lite_planspage_note', array(
	            'sanitize_callback' =>  'mooveit_lite_sanitize_callback_text'
	        ) );
	        $wp_customize->add_control( new mooveit_lite_note ( $wp_customize,'mooveit_lite_planspage_note', array(
	            'section'  => 'mooveit_lite_planspage_section'
	        ) ) );

	    /**
	     *	404 Section
	     */
	    $wp_customize->add_section( 'mooveit_lite_404_section', array(
			'priority'          => 450,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( '404', 'mooveit_lite' ),
			'description'       => __( 'Settings for 404.', 'mooveit_lite' ),
		) );

	    	// Title
			$wp_customize->add_setting( 'mooveit_lite_404_title', array(
				'default'           => __( 'Error', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_404_title', array(
				'priority'  => 1,
				'section'   => 'mooveit_lite_404_section',
				'settings'  => 'mooveit_lite_404_title',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Subtitle
			$wp_customize->add_setting( 'mooveit_lite_404_subtitle', array(
				'default'           => __( 'The page you were looking for was not found.', 'mooveit_lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'mooveit_lite_sanitize_callback_text',
			) );
			$wp_customize->add_control( 'mooveit_lite_404_subtitle', array(
				'priority'  => 2,
				'section'   => 'mooveit_lite_404_section',
				'settings'  => 'mooveit_lite_404_subtitle',
				'label'     => __( 'Title:', 'mooveit_lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'mooveit_lite_404_entry', array(
                'default'           => __( 'The page you are looking for does not exist, I can take you to the <a href="'. esc_url( home_url() ) .'" title="'. __( 'home page', 'mooveit_lite' ) .'">home page</a>.', 'mooveit_lite' ),
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_textarea',
            ) );
            $wp_customize->add_control( 'mooveit_lite_404_entry', array(
                'type'          => 'textarea',
                'priority'      => 3,
                'section'       => 'mooveit_lite_404_section',
                'settings'      => 'mooveit_lite_404_entry',
                'label'         => __( 'Entry:', 'mooveit_lite' )
            ) );

}
add_action( 'customize_register', 'mooveit_lite_customizer' );

/**
 *	Sanitize Callback: Text
 */
function mooveit_lite_sanitize_callback_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

if( class_exists( 'WP_Customize_Control' ) ):
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	    public function render_content() { ?>

	        <label>
	        	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        	<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>

	        <?php
	    }
	}
endif;

/**
 *	Registers
 */
function mooveit_lite_registers() {
	wp_register_script( 'mooveit_lite_customizer_script', get_template_directory_uri() . '/js/mooveit_lite_customizer.js', array("jquery"), '20120206', true  );
	wp_enqueue_script( 'mooveit_lite_customizer_script' );
	wp_localize_script( 'mooveit_lite_customizer_script', 'mooveit_lite_buttons', array(
		'doc'			=> __( 'Documentation', 'mooveit_lite' ),
		'pro'			=> __( 'View PRO Version', 'mooveit_lite' )
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'mooveit_lite_registers' );

?>