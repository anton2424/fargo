<?php


/**
 * Class Fargo_Related_Posts_Output
 *
 * This file does the author box for the Muscle Core Lite Framework
 *
 */

// @todo: make the order of the boxed changeable

if( !function_exists( 'Fargo_CallAuthorBoxClass' ) ) {
    /**
     *
     * Gets called only if the "display social media options" option is checked
     * in the back-end
     *
     * @since   1.0.0
     *
     */
    function Fargo_CallAuthorBoxClass()
    {
        $display_author_box = get_theme_mod( 'fargo_enable_author_box_blog_posts', 1 );

        if ( $display_author_box == 1 ) {
            // instantiate the class & load everything else
            Fargo_Author_Box_Output::getInstance();
        }
    }
    add_action('wp_loaded', 'Fargo_CallAuthorBoxClass');
}

if( !class_exists( 'Fargo_Author_Box_Output' ) ) {

    /**
     * Class Fargo_Author_Box_Output
     */
    class Fargo_Author_Box_Output {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;

        /**
         *
         */
        protected function __construct() {
            add_action( 'fargo_single_after_content', array( $this, 'output_author_box' ), 3 );
        }

        /**
         * Returns the *Singleton* instance of this class.
         *
         * @return Singleton The *Singleton* instance.
         */
        public static function getInstance()
        {
            if (null === static::$instance) {
                static::$instance = new static();
            }

            return static::$instance;
        }

        /**
         * Private clone method to prevent cloning of the instance of the
         * *Singleton* instance.
         *
         * @return void
         */
        private function __clone()
        {
        }

        /**
         * Private unserialize method to prevent unserializing of the *Singleton*
         * instance.
         *
         * @return void
         */
        private function __wakeup()
        {
        }

        /**
         * Simple function that renders the Author Box Mark-up HTML code
         *
         * @return string
         */
        function output_author_box() {
            $output = '';

            $output .= '<div class="blog-post-author clearfix">';
                $output .= get_avatar( get_the_author_meta( 'user_email' ), 98 );
                $output .= '<h4>'. esc_html( get_the_author() ) .'</h4>';
                $output .= ( get_the_author_meta( 'description' ) ) ? '<p>'. esc_html( get_the_author_meta( 'description' ) ) .'</p>' : '';
            $output .= '</div><!--/.blog-post-author.clearfix-->';

            echo $output;
        }
    }
}