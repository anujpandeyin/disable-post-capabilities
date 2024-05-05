<?php
/*
Plugin Name: Disable Post Capabilities for All User
Description: Disables post, category, and tag-related capabilities for All User.
Version: 1.0
Author: Anuj Pandey
*/

// Activation hook
register_activation_hook( __FILE__, 'disable_post_capabilities_activate' );

// Deactivation hook
register_deactivation_hook( __FILE__, 'disable_post_capabilities_deactivate' );

// Activation function
function disable_post_capabilities_activate() {
    $roles_to_modify = array('administrator', 'editor', 'author', 'contributor', 'subscriber');

    foreach ($roles_to_modify as $role_name) {
        $role = get_role($role_name);
        if ($role) {
            // Remove post-related capabilities
            $role->remove_cap('publish_posts');
            $role->remove_cap('edit_posts');
            $role->remove_cap('delete_posts');
            $role->remove_cap('edit_others_posts');
            $role->remove_cap('delete_others_posts');
            $role->remove_cap('read_private_posts');
            $role->remove_cap('edit_published_posts');
            $role->remove_cap('delete_published_posts');

            // Remove category and tag capabilities
            $role->remove_cap('manage_categories');
            $role->remove_cap('edit_categories');
            $role->remove_cap('delete_categories');
            $role->remove_cap('assign_categories');
            $role->remove_cap('manage_post_tags');
            $role->remove_cap('edit_post_tags');
            $role->remove_cap('delete_post_tags');
            $role->remove_cap('assign_post_tags');
        }
    }
}

// Deactivation function
function disable_post_capabilities_deactivate() {
    $roles_to_modify = array('administrator', 'editor', 'author', 'contributor', 'subscriber');

    foreach ($roles_to_modify as $role_name) {
        $role = get_role($role_name);
        if ($role) {
            // Restore post-related capabilities
            $role->add_cap('publish_posts');
            $role->add_cap('edit_posts');
            $role->add_cap('delete_posts');
            $role->add_cap('edit_others_posts');
            $role->add_cap('delete_others_posts');
            $role->add_cap('read_private_posts');
            $role->add_cap('edit_published_posts');
            $role->add_cap('delete_published_posts');

            // Restore category and tag capabilities
            $role->add_cap('manage_categories');
            $role->add_cap('edit_categories');
            $role->add_cap('delete_categories');
            $role->add_cap('assign_categories');
            $role->add_cap('manage_post_tags');
            $role->add_cap('edit_post_tags');
            $role->add_cap('delete_post_tags');
            $role->add_cap('assign_post_tags');
        }
    }
}

