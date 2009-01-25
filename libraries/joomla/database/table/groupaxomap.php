<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License, see LICENSE.php
 */

defined('_JEXEC') or die('Restricted access');

require_once dirname(__FILE__).DS.'_groupmap.php';

/**
 * Table object for Group to Asset map.
 *
 * @package		Joomla.Framework
 * @subpackage	Table
 */
class JTableGroupAxoMap extends JTable_GroupMap
{
	var $axo_id = null;

	/**
	 * @var	string The section type
	 * @protected
	 * @final
	 */
	var $_type = 'axo';
}
