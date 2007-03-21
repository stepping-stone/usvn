<?php
// Call USVN_Client_UninstallTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "USVN_Client_UninstallTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'www/USVN/autoload.php';

/**
 * Test class for USVN_Client_Uninstall.
 * Generated by PHPUnit_Util_Skeleton on 2007-03-10 at 18:25:06.
 */
class USVN_Client_UninstallTest extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("USVN_Client_UninstallTest");
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
        USVN_DirectoryUtils::removeDirectory("tests/tmp/testrepository");
        USVN_DirectoryUtils::removeDirectory('tests/tmp/fakerepository');
    }

    public function test_notSvnRepository()
    {
        try {
            new USVN_Client_Uninstall('tests/tmp/fakerepository');
        }
        catch (Exception $e) {
            return;
        }
        $this->fail();
    }

    public function test_uninstallHook()
    {
        $install = new USVN_Client_Install('tests/tmp/testrepository', 'http://bidon', 'user', 'pass');
        $unistall = new USVN_Client_Uninstall('tests/tmp/testrepository');
        $this->assertFalse(file_exists('tests/tmp/testrepository/hooks/start-commit'));
        $this->assertFalse(file_exists('tests/tmp/testrepository/usvn'));
    }
}

// Call USVN_Client_UninstallTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "USVN_Client_UninstallTest::main") {
    USVN_Client_UninstallTest::main();
}
?>
