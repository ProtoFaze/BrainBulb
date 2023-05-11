<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_unset();

echo <<<HTML
<script>alert('Logout Successfully');</script>
<script>window.location.href = '../views/mainpage.php'</script>;
HTML;
