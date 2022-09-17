<?php
if (!defined('IN_FW')) {
    exit;
}
?>
<label for="<?=$this->result['name']?>" class="form-label"><?=$this->result['title']?></label>
<input
        type="<?=$this->result['type']?>"
        class="<?=$this->result['additional_class'] ?? '' ?>"
        id="<?=$this->result['name']?>"
        placeholder="<?=$this->result['default'] ?? ''?>"
/>
