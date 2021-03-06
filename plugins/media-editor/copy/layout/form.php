<?php
defined('_JEXEC') or die;

$filePath = $displayData['filePath'];
$toFile = $displayData['toFile'];
?>
<h1><?php echo JText::_('PLG_MEDIA-EDITOR_COPY_FORM_TITLE'); ?> "<?php echo basename($filePath); ?>"</h1>

<div class="control-group">
	<label class="control-label" for="fromFile"><?php echo JText::_('PLG_MEDIA-EDITOR_COPY_FIELD_FROMFILE_LABEL'); ?></label>
	<div class="controls">
		<input type="text" value="<?php echo basename($filePath); ?>" readonly="readonly">
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="inputEmail"><?php echo JText::_('PLG_MEDIA-EDITOR_COPY_FIELD_TOFILE_LABEL'); ?></label>
	<div class="controls">
		<input type="text" name="toFile" id="toFile" value="<?php echo $toFile ?>" placeholder="<?php echo JText::_('PLG_MEDIA-EDITOR_COPY_FIELD_TOFILE_PLACEHOLDER'); ?>">
	</div>
</div>

<input type="submit" name="<?php echo JText::_('PLG_MEDIA-EDITOR_COPY_FIELD_SUBMIT'); ?>" />
<input type="hidden" name="fromFile" value="<?php echo $filePath ?>" />
