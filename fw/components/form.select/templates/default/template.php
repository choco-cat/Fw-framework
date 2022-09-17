<?php
if (!defined('IN_FW')) {
    exit;
}
?>
<label for="<?=$this->result['name']?>" class="form-label"><?=$this->result['title']?></label>
<select
        class="form-select <?=$this->result['additional_class']?>"
        id="<?=$this->result['name']?>"
>

    <?php foreach ($this->result['options'] as $option): ?>
    <option
        class="form-select <?=$option['additional_class']?>"
        <?php foreach ($option['attr'] as $key => $param): ?>
            <?=$key?>="<?=$param?>"
        <?php endforeach; ?>
        <?=$option['selected'] ? 'selected' : ''?>
    >
        <?=$option['title']?>
    </option>
    <?php endforeach; ?>
</select>
