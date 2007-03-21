<?php
/**
* @package client
* @subpackage utils
*/

// Call USVN_Client_SVNUtilsTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "USVN_Client_SVNUtilsTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'www/USVN/autoload.php';

/**
 * Test class for USVN_Client_SVNUtils.
 * Generated by PHPUnit_Util_Skeleton on 2007-03-10 at 17:59:54.
 */
class USVN_Client_SVNUtilsTest extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("USVN_Client_SVNUtilsTest");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    public function setUp()
    {
        $this->clean();
        USVN_Client_SVNUtils::createSvnDirectoryStruct("tests/tmp/testrepository");
        @mkdir('tests/tmp/fakerepository');
    }

    public function tearDown()
    {
        $this->clean();
    }

    private function clean()
    {
		USVN_DirectoryUtils::removeDirectory('tests/tmp/testrepository');
		USVN_DirectoryUtils::removeDirectory('tests/tmp/fakerepository');
    }

    public function test_isSVNRepository()
    {
        $this->assertTrue(USVN_Client_SVNUtils::isSVNRepository('tests/tmp/testrepository'));
        $this->assertFalse(USVN_Client_SVNUtils::isSVNRepository('tests/tmp/fakerepository'));
    }

	public function test_changedFiles()
	{
        $this->assertEquals(array(array("U", "tutu")), USVN_Client_SVNUtils::changedFiles("U tutu\n"));
        $this->assertEquals(array(array("U", "tutu"), array("U", "tata")), USVN_Client_SVNUtils::changedFiles("U tutu\nU tata\n"));
        $this->assertEquals(array(array("U", "tutu"), array("U", "U")), USVN_Client_SVNUtils::changedFiles("U tutu\nU U\n"));
        $this->assertEquals(array(array("U", "tutu"), array("U", "hello world"), array("U", "toto")), USVN_Client_SVNUtils::changedFiles("U tutu\nU hello world\nU toto\n"));
	}

	public function test_createSvnDirectoryStruct()
	{
		USVN_Client_SVNUtils::createSvnDirectoryStruct('tests/tmp/svndirectorystruct');
		 $this->assertTrue(file_exists('tests/tmp/svndirectorystruct'));
		 $this->assertTrue(file_exists('tests/tmp/svndirectorystruct/hooks'));
	}
}

// Call USVN_Client_SVNUtilsTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "USVN_Client_SVNUtilsTest::main") {
    USVN_Client_SVNUtilsTest::main();
}
?>
