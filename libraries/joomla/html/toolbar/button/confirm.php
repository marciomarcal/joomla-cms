<?php
/**
* @version		$Id:confirm.php 6961 2007-03-15 16:06:53Z tcp $
* @package		Joomla.Framework
* @subpackage	HTML
* @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
* @license		GNU General Public License, see LICENSE.php
*/

// No direct access
defined('JPATH_BASE') or die();

/**
 * Renders a standard button with a confirm dialog
 *
 * @package 	Joomla.Framework
 * @subpackage	HTML
 * @since		1.5
 */
class JButtonConfirm extends JButton
{
	/**
	 * Button type
	 *
	 * @access	protected
	 * @var		string
	 */
	protected $_name = 'Confirm';

	public function fetchButton($type='Confirm', $msg='', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		$text	= JText::_($text);
		$msg	= JText::_($msg, true);
		$class	= $this->fetchIconClass($name);
		$doTask	= $this->_getCommand($msg, $name, $task, $list, $hideMenu);

		$html	= "<a href=\"#\" onclick=\"$doTask\" class=\"toolbar\">\n";
		$html .= "<span class=\"$class\" title=\"$text\">\n";
		$html .= "</span>\n";
		$html	.= "$text\n";
		$html	.= "</a>\n";

		return $html;
	}

	/**
	 * Get the button CSS Id
	 *
	 * @access	public
	 * @return	string	Button CSS Id
	 * @since	1.5
	 */
	public function fetchId($type='Confirm', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		return $this->_parent->getName().'-'.$name;
	}

	/**
	 * Get the JavaScript command for the button
	 *
	 * @access	private
	 * @param	object	$definition	Button definition
	 * @return	string	JavaScript command string
	 * @since	1.5
	 */
	protected function _getCommand($msg, $name, $task, $list, $hide)
	{
		$todo	 = JString::strtolower(JText::_($name));
		$message = JText::sprintf('Please make a selection from the list to', $todo);
		$message = addslashes($message);

		if ($hide) {
			if ($list) {
				$cmd = "javascript:if(document.adminForm.boxchecked.value==0){alert('$message');}else{hideMainMenu();if(confirm('$msg')){submitbutton('$task');}}";
			} else {
				$cmd = "javascript:hideMainMenu();if(confirm('$msg')){submitbutton('$task');}";
			}
		} else {
			if ($list) {
				$cmd = "javascript:if(document.adminForm.boxchecked.value==0){alert('$message');}else{if(confirm('$msg')){submitbutton('$task');}}";
			} else {
				$cmd = "javascript:if(confirm('$msg')){submitbutton('$task');}";
			}
		}

		return $cmd;
	}
}
