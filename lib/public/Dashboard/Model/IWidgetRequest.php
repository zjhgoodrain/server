<?php
/**
 * Nextcloud - Dashboard App
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2018, Maxence Lange <maxence@artificial-owl.com>
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


use OCP\Dashboard\IDashboardWidget;

interface IWidgetRequest {


	/**
	 * IWidgetRequest constructor.
	 *
	 * @param string $widgetId
	 */
	public function __construct($widgetId);


	/**
	 * @return string
	 */
	public function getWidgetId();

	/**
	 * @param string $widgetId
	 *
	 * @return $this;
	 */
	public function setWidgetId($widgetId);


	/**
	 * @return IDashboardWidget
	 */
	public function getWidget();

	/**
	 * @param IDashboardWidget $widget
	 *
	 * @return $this
	 */
	public function setWidget($widget);


	/**
	 * @return string
	 */
	public function getRequest();

	/**
	 * @param string $request
	 *
	 * @return $this
	 */
	public function setRequest($request);


	/**
	 * @return array
	 */
	public function getResult();

	/**
	 * @param array $result
	 *
	 * @return $this
	 */
	public function setResult($result);

	/**
	 * @param string $key
	 * @param string|array $result
	 *
	 * @return $this
	 */
	public function addResult($key, $result);

}