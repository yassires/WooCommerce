<?php

/**
 * Plugin Name: My Form Plugin
 */

// Enqueue Bootstrap CSS and JS
function prefix_enqueue()
{
    wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    wp_enqueue_style('prefix_bootstrap');

    wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    wp_enqueue_script('prefix_bootstrap');
}
add_action('wp_enqueue_scripts', 'prefix_enqueue');

// Create shortcode for form
function my_form_plugin()
{
    $content = '';
    $content .= '<h2>Contact Us</h2>';
    $content .= '<form method="post" action="">';
    $content .= '<label for="name_an">Name</label>';
    $content .= '<input type="text" name="name_an" class="form-data form-control" placeholder="Enter your name">';
    $content .= '<label for="email_an">Email</label>';
    $content .= '<input type="email" name="email_an" class="form-data form-control" placeholder="Enter your email">';
    $content .= '<label for="subject">Message Subject</label>';
    $content .= '<input type="text" name="subject" class="form-data form-control" placeholder="Enter the message subject">';
    $content .= '<label for="comments_an">Message</label>';
    $content .= '<textarea name="comments_an" class="form-data form-control" placeholder="Enter your commentsSSSS"></textarea>';
    $content .= '<input type="submit" name="submit_form" class="form-data form-control btn btn-primary" value="Send">';
    $content .= '</form>';
    return $content;
}
add_shortcode('my_form', 'my_form_plugin');

// Handle form submission
function example_form_capture()
{
    if (isset($_POST['name_an'], $_POST['email_an'], $_POST['subject'], $_POST['comments_an'])) {
        $name = sanitize_text_field($_POST['name_an']);
        $email = sanitize_email($_POST['email_an']);
        $subject = sanitize_text_field($_POST['subject']);
        $comments = esc_textarea($_POST['comments_an']);

        // Perform validation using regular expressions
        $valid = true;
        $regex = '/^[a-zA-Z ]*$/'; // Only letters and spaces
        if (!preg_match($regex, $name)) {
            $valid = false;
            $error_message = 'Name can only contain letters and spaces.';
        }
        $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (!preg_match($regex, $email)) {
            $valid = false;
            $error_message = 'Invalid email address.';
        }

        if ($valid) {
            // Add the form data to the WordPress database
            global $wpdb;
            $table_name = $wpdb->prefix . 'contact_table';
            $data = array(
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'comments' => $comments
            );
            $wpdb->insert($table_name, $data);

            // Redirect to the WordPress admin notification page
            wp_redirect(admin_url('admin.php?page=example_form_plugin'));
        } else {
            // Display error message
            echo '<div class="alert alert-danger">' . $error_message . '</div>';
        }
    }
}

add_action('init', 'example_form_capture');
