<?php declare(strict_types=1);


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


interface IWidgetEvent {


	const BROADCAST_USER = 'user';
	const BROADCAST_GROUP = 'group';
	const BROADCAST_GLOBAL = 'global';


	/**
	 * WidgetEvent constructor.
	 *
	 * @param string $widgetId
	 */
	public function __construct(string $widgetId);


	/**
	 * @return int
	 */
	public function getId(): int;

	/**
	 * @param int $id
	 *
	 * @return $this
	 */
	public function setId(int $id): IWidgetEvent;


	/**
	 * @return string
	 */
	public function getWidgetId(): string;

	/**
	 * @param string $widgetId
	 *
	 * @return $this
	 */
	public function setWidgetId(string $widgetId): IWidgetEvent;


	/**
	 * @return string
	 */
	public function getBroadcast(): string;

	/**
	 * @return string
	 */
	public function getRecipient(): string;

	/**
	 * @param string $broadcast
	 * @param string $recipient
	 *
	 * @return $this
	 */
	public function setRecipient(string $broadcast, string $recipient = ''): IWidgetEvent;


	/**
	 * @return array
	 */
	public function getPayload(): array;

	/**
	 * @param array $payload
	 *
	 * @return $this
	 */
	public function setPayload(array $payload): IWidgetEvent;

	/**
	 * @return string
	 */
	public function getUniqueId(): string;

	/**
	 * @param string $uniqueId
	 *
	 * @return $this
	 */
	public function setUniqueId(string $uniqueId): IWidgetEvent;


	/**
	 * @return int
	 */
	public function getCreation(): int;

	/**
	 * @param int $creation
	 *
	 * @return $this
	 */
	public function setCreation(int $creation): IWidgetEvent;

}