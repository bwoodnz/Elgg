<?php
	/**
	 * Elgg activity plugin.
	 * 
	 * @package ElggActivity
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	$owner = page_owner_entity();
	$limit = get_input('limit', 20);
	$offset = get_input('offset');
	
	$title_txt = sprintf(elgg_echo('activity:person:friends'), $owner->name);
	$title = elgg_view_title($title_txt);
	
	$activity = activity_get_activity($limit, $offset, $type, $subtype, page_owner(), 'friend');
	if (count($activity)>0)
		$body = "";
	else
		$body = elgg_echo('activity:nofriendactivity');
	
	
	
	page_draw($title_txt, elgg_view_layout("two_column_left_sidebar", '', $title . $body));

?>