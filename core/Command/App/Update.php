<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Klaus Herberth <klaus@jsxc.org>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Core\Command\App;

use OC\Installer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Update extends Command {

	protected function configure() {
		$this
			->setName('app:update')
			->setDescription('update an app')
			->addArgument(
				'app-id',
				InputArgument::OPTIONAL,
				'update the specified app'
			)
			->addOption(
				'all',
				null,
				InputOption::VALUE_NONE,
				'update all updatable apps'
			)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$singleAppId = $input->getArgument('app-id');

		if ($singleAppId) {
			$apps = array($singleAppId);
			if (!\OC_App::getAppPath($singleAppId)) {
				$output->writeln($singleAppId . ' not installed');
			return 1;
                }

		} else if ($input->getOption('all')) {
			$apps = \OC_App::getAllApps();
		} else {
			$output->writeln("<error>Please specify an app to update or \"--all\" to update all updatable apps\"</error>");
			return 1;
		}


		$return = 0;
		/** @var Installer $installer */
		$installer = \OC::$server->query(Installer::class);
		foreach ($apps as $appId) {
			$newVersion = $installer->isUpdateAvailable($appId);
			if($newVersion) {
				$output->writeln($appId . ' new version available: ' . $newVersion);

				try {
					$result = $installer->updateAppstoreApp($appId);
				} catch(\Exception $e) {
					$output->writeln('Error: ' . $e->getMessage());
					$return = 1;
				}

				if($result === false) {
					$output->writeln($appId . ' couldn\'t be updated');
					$return = 1;
				}
				else if($result === true) {
					$output->writeln($appId . ' updated');
				}
			}
		}

		return $return;
	}
}

