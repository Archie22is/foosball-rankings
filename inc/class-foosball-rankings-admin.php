<?php

class FoosBall_Rankings_Admin {

    public function __construct()
    {
        if ( ! class_exists('CMB_Meta_Box'))
            require_once( plugin_dir_path( __FILE__ ) . '/Custom-Meta-Boxes/custom-meta-boxes.php' );

        add_action( 'init', array( $this, 'post_type_setup' ) );
        add_filter( 'cmb_meta_boxes', array( $this, 'field_setup' ) );
    }

    public function post_type_setup()
    {
        $labels = array(
            'name'               => 'Foosball Rankings',
            'singular_name'      => 'Foosball Ranking',
            'add_new'            => 'Add New Foosball Ranking',
            'add_new_item'       => 'Add New Foosball Ranking',
            'edit_item'          => 'Edit Foosball Ranking',
            'new_item'           => 'New Foosball Ranking',
            'all_items'          => 'All Foosball Rankings',
            'view_item'          => 'View Foosball Ranking',
            'search_items'       => 'Search Foosball Rankings',
            'not_found'          => 'No Foosball Rankings found',
            'not_found_in_trash' => 'No Foosball Rankings found in Trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Foosball Rankings'
        );

        $args = array(
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'menu_icon'			 => 'dashicons-awards',
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'foosball-rankings' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title' )
        );

        register_post_type( 'foosball-rankings', $args );
    }

    public function metabox_init()
    {
        if ( ! class_exists('cmb_Meta_Box')) {
            include plugin_dir_path( __FILE__ ) . '/metabox/init.php';
        }
    }

    public function field_setup( $meta_boxes )
    {
        $prefix = 'foosball_ranking_'; // Prefix for all fields
        $fields = array(

            // team members details
            array(
                'name' => 'Player #01 Gravatar Email Address',
                'desc' => 'Enter the email address of player #01 to use a gravatar image',
                'id' => $prefix . 'email1',
                'type' => 'text'
            ),
            array(
                'name' => 'Name of player1',
                'desc' => 'eg. Tom, Robert, etc',
                'id' => $prefix . 'name1',
                'type' => 'text'
            ),
            array(
                'name' => 'Player #02 Gravatar Email Address',
                'desc' => 'Enter the email address of player #02 to use a gravatar image',
                'id' => $prefix . 'email2',
                'type' => 'text'
            ),
            array(
                'name' => 'Name of player2',
                'desc' => 'eg. Tom, Robert, etc',
                'id' => $prefix . 'name2',
                'type' => 'text'
            ),

            // match details
            array(
                'name' => 'Won',
                'desc' => 'eg. 10, 30, etc',
                'id' => $prefix . 'won',
                'type' => 'text'
            ),
            array(
                'name' => 'Drew',
                'desc' => 'eg. 10, 30, etc',
                'id' => $prefix . 'drew',
                'type' => 'text'
            ),
            array(
                'name' => 'Lost',
                'desc' => 'eg. 10, 30, etc',
                'id' => $prefix . 'lost',
                'type' => 'text'
            ),

        );

        // build cpt
        $meta_boxes[] = array(
            'title' => 'Foosball Rankings Details',
            'pages' => 'foosball-rankings',
            'fields' => $fields
        );

        return $meta_boxes;
    }
}

$BS_Testimonials_Admin = new FoosBall_Rankings_Admin();