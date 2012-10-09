<?php
/**
 * @package    Joomla.UnitTest
 *
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */


/**
 * Test class for JArchiveTar.
 * Generated by PHPUnit on 2011-10-26 at 19:34:30.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Archive
 *
 * @since       11.1
 */
class JArchiveTarTest extends PHPUnit_Framework_TestCase
{
	protected static $outputPath;

	/**
	 * @var JArchiveTar
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		self::$outputPath = __DIR__ . '/output';

		if (!is_dir(self::$outputPath))
		{
			mkdir(self::$outputPath, 0777);
		}

		$this->object = new JArchiveTar;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return void
	 */
	protected function tearDown()
	{
	}

	/**
	 * Tests the extract Method.
	 *
	 * @group   JArchive
	 * @return  void
	 *
	 * @covers  JArchiveTar::extract
	 * @covers  JArchiveTar::_getTarInfo
	 */
	public function testExtract()
	{
		if (!JArchiveTar::isSupported())
		{
			$this->markTestSkipped('Tar files can not be extracted.');
			return;
		}

		$this->object->extract(__DIR__ . '/logo.tar', self::$outputPath);
		$this->assertTrue(is_file(self::$outputPath . '/logo-tar.png'));

		if (is_file(self::$outputPath . '/logo-tar.png'))
		{
			unlink(self::$outputPath . '/logo-tar.png');
		}
	}

	/**
	 * Tests the isSupported Method.
	 *
	 * @group   JArchive
	 * @return  void
	 *
	 * @covers  JArchiveTar::isSupported
	 */
	public function testIsSupported()
	{
		$this->assertTrue(
			JArchiveTar::isSupported()
		);
	}
}
