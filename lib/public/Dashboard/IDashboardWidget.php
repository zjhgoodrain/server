<?php


namespace OCP\Dashboard;


use OCP\Dashboard\Model\IWidgetRequest;
use OCP\Dashboard\Model\IWidgetSettings;

interface IDashboardWidget {

	/**
	 * @return string
	 */
	public function getId();


	/**
	 * @return string
	 */
	public function getName();


	/**
	 * @return string
	 */
	public function getDescription();


	/**
	 * @return array
	 */
	public function getTemplate();


	/**
	 * @param IWidgetSettings $settings
	 */
	public function loadWidget(IWidgetSettings $settings);


	/**
	 * @return array
	 */
	public function widgetSetup();


	/**
	 * @param IWidgetRequest $request
	 */
	public function requestWidget(IWidgetRequest $request);

}