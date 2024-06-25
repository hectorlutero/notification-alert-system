<?php
/*
Plugin Name: Notification Alert System
Description: A custom notification alert system for WordPress.
Version: 1.0
Author: Hector Siman
*/

function nas_start_session()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'nas_start_session');

function nas_enqueue_scripts()
{
    wp_enqueue_style('nas-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('nas-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'nas_enqueue_scripts');

function nas_set_notification($message, $type = 'success')
{
    try {
        if (!session_id()) {
            session_start();
        }
        $_SESSION['nas_notification'] = array('message' => $message, 'type' => $type);
    } catch (Exception $e) {
        wp_die($e->getMessage());
    }
}

function nas_display_notification()
{
    if (!session_id()) {
        session_start();
    }

    $notificationType = array();
    if (isset($_SESSION['nas_notification'])) {

        switch ($_SESSION['nas_notification']['type']) {
            case 'success':
                $notificationType = array('border-green-500', 'text-green-700', 'bg-green-100');
                break;
            case 'warning':
                $notificationType = array('border-yellow-500', 'text-yellow-700', 'bg-yellow-100');
                break;
            case 'error':
                $notificationType = array('border-red-500', 'text-red-700', 'bg-red-100');
                break;
            case 'info':
                $notificationType = array('border-blue-500', 'text-blue-700', 'bg-blue-100');
                break;
            default:
                $notificationType = array('border-green-500', 'text-green-700', 'bg-green-100');
                break;
        }
    }

    if (isset($_SESSION['nas_notification'])) {
        $notification = $_SESSION['nas_notification'];
?>
        <div class="nas-alert-container">
            <div class="nas-alert hidden border-t-4 <?= $notificationType[0] . ' ' . $notificationType[1] . ' ' . $notificationType[2] ?>">
                <?= esc_html($notification['message']); ?>
                <span class="close">&times;</span>
            </div>
        </div>
<?php
        unset($_SESSION['nas_notification']);
    }
}
add_action('wp_footer', 'nas_display_notification');
