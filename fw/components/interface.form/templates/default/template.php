<?php
if (!defined('IN_FW')) {
    exit;
}
?>
<div class="my-5">
<h2 class="text-center">Форма</h2>
<form class="m-auto <?=$this->result['additional_class']?>">
    <?php foreach ($this->result['htmlElements'] as $elementHtml): ?>
        <div class="mb-3">
            <?=$elementHtml;?>
        </div>
    <?php endforeach; ?>
    <input type="submit" class="btn btn-dark" value="Отправить">
</form>
</div>
