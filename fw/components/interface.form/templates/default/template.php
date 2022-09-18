<?php
if (!defined('IN_FW')) {
    exit;
}
?>
<div class="my-5">
    <h2 class="text-center">Форма</h2>
    <form
        method="<?= $this->result['method'] ?>"
        action="<?= $this->result['action'] ?>"
            class="m-auto <?= $this->result['additional_class'] ?>"
    <?php foreach ($this->result['attr'] as $key => $param): ?>
        <?= $key ?>="<?= $param ?>"
    <?php endforeach; ?>
    >
    <?php foreach ($this->result['htmlElements'] as $elementHtml): ?>
        <div class="mb-3">
            <?= $elementHtml; ?>
        </div>
    <?php endforeach; ?>
    <input type="submit" class="btn btn-dark" value="Отправить">
    </form>
</div>
