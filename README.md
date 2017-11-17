# WP User Groups Shortcode

Adds a shortcode for [WP User Groups Plugin](https://es.wordpress.org/plugins/wp-user-groups/)

## How to

Add `[wp_user_groups_list group="group-slug"]` to any of your posts/pages.

## For developers

The default loaded template is located at `user-template.php` but you can use another one with the following code:

```PHP
add_filter( 'wp_user_groups_list_template_file', function( $template ) {
    return // Your new template here
})
```
