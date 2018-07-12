<?php
/**
 * Nextcloud - Dashboard App
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author regio iT gesellschaft für informationstechnologie mbh
 * @copyright regio iT 2017
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCP\Dashboard\Model;


interface IWidgetSettings {


	/**
	 * IWidgetSettings constructor.
	 *
	 * @param $userId
	 * @param $widgetId
	 */
	public function __construct($widgetId, $userId);


	/**
	 * @return string
	 */
	public function getUserId();

	/**
	 * @param string $userId
	 *
	 * @return $this
	 */
	public function setUserId($userId);


	/**
	 * @return string
	 */
	public function getWidgetId();

	/**
	 * @param string $widgetId
	 *
	 * @return $this
	 */
	public function setWidgetId($widgetId);


	/**
	 * @return array
	 */
	public function getPosition();

	/**
	 * @param array $position
	 *
	 * @return $this
	 */
	public function setPosition($position);


	/**
	 * @return array
	 */
	public function getSettings();

	/**
	 * @param array $settings
	 *
	 * @return $this
	 */
	public function setSettings($settings);



	/**
	 * @return bool
	 */
	public function isEnabled();

	/**
	 * @param bool $enabled
	 *
	 * @return $this
	 */
	public function setEnabled($enabled);


}