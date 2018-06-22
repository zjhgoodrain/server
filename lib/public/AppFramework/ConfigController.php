<?php

namespace OCP\AppFramework;

use OCP\AppFramework\Http\JSONResponse;
use OCP\IConfig;
use OCP\IRequest;
use OCP\IUserSession;

abstract class ConfigController extends Controller {

	/** @var IConfig */
	private $config;

	/** @var string */
	protected $uid;

	/** @var string[] */
	private $_keys;

	public function __construct(string $appName,
								IRequest $request,
								IConfig $config,
								IUserSession $userSession) {
		parent::__construct($appName, $request);

		$this->config = $config;
		$this->uid = $userSession->getUser()->getUID();
	}

	/**
	 * Function to register possible config keys
	 *
	 * @param string $key
	 */
	final protected function addConfig(string $key) {
		$this->_keys[$key] = true;
	}

	private function validateKey(string $key): bool {
		return array_key_exists($key, $this->_keys);
	}

	/**
	 * @param string $key
	 * @return JSONResponse
	 * @throws NotFoundException
	 */
	final public function get(string $key): JSONResponse {
		if (!$this->validateKey($key)) {
			throw new NotFoundException();
		}
	}

	/**
	 * @param string $key
	 * @param $value
	 * @return JSONResponse
	 * @throws NotFoundException
	 */
	final public function set(string $key, $value): JSONResponse {
		if (!$this->validateKey($key)) {
			throw new NotFoundException();
		}

		$fun = 'perSet'.$key;

		if (method_exists($this, $fun)) {
			$value = $this->$fun;
		}

		$this->setConfig($key, $value);
	}

	/**
	 * Delete a given key from the app config.
	 *
	 * @throws NotFoundException
	 */
	public function delete(string $key): JSONResponse {
		if (!$this->validateKey($key)) {
			throw new NotFoundException();
		}

		$this->config->deleteAppValue($this->appName, $key);

		return new JSONResponse([]);
	}

	/**
	 * Get the config value of a key for this app
	 *
	 * @param string $key
	 * @return string
	 * @throws NotFoundException If the key is not set (or null which we count as not set)
	 */
	protected function getConfig(string $key): string {
		$value = $this->config->getAppValue($this->appName, $key, null);

		if ($value === null) {
			throw new NotFoundException('Could not find key for app');
		}

		return $value;
	}

	/**
	 * Set a config value for this app
	 *
	 * @param string $key
	 * @param string $value
	 */
	protected function setConfig(string $key, string $value) {
		$this->config->setAppValue($this->appName, $key, $value);
	}
}
