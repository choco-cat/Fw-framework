<?php
if (!defined('IN_FW')) {
    exit;
}
?>
<label for="<?=$this->result['name']?>" class="form-label"><?=$this->result['title']?></label>
<input
        type="<?=$this->result['type']?>"
        class="form-<?=$this->result['type'] === 'checkbox' ? 'form-check-input' : 'control' ?>"
        id="<?=$this->result['name']?>"
        placeholder="<?=$this->result['default'] ?? ''?>"
/>
