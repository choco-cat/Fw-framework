<?php
use Fw\Core\Page;

if (!defined('IN_FW')) {
    exit;
}
$page = Page::getInstance();
?>

</div>
</main>
<footer>
    <div class="container-fluid bg-dark">
        <div class="container py-3 text-center text-light">
            <?php $page->showProperty('site_copyright'); ?>
        </div>
    </div>
</footer>
</html>
