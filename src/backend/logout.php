<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}unset($_SESSION['user_id']);

echo <<<HTML
<script>window.location.href = '../views/mainpage.php'</script>;
HTML;
