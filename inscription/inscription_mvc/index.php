
<?php
if (isset($_SESSION)) {
    session_destroy();
}
require('Vue/vue_inscription.php');
