<?php
/**
 * Elgg widget wrapper
 *
 * @package Elgg
 * @subpackage Core
 */

$widgettypes = get_widget_types();

$widget = $vars['entity'];

if ($vars['entity'] instanceof ElggObject && $vars['entity']->getSubtype() == 'widget') {
	$handler = $vars['entity']->handler;
	$title = $widgettypes[$vars['entity']->handler]->name;
	if (!$title) {
		$title = $handler;
	}
} else {
	$handler = "error";
	$title = elgg_echo("error");
}

$title = "Widget Title";

$display_view = "widgets/$handler/view";

$can_edit = $widget->canEdit();

?>
<div class="widget draggable" id="widget_<?php echo $widget->guid; ?>">
	<div class="widget_title drag_handle">
		<h3><?php echo $title; ?></h3>
		<?php
		if ($can_edit) {
			echo elgg_view('widgets/controls', array('widget' => $widget));
		}
		?>
	</div>
	<?php
	if ($can_edit) {
		echo elgg_view('widgets/editwrapper', array('widget' => $widget));
	}
	?>
	<div class="widget_content">
		<?php echo elgg_view($display_view, $vars); ?>
		<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	</div>
</div>
