<?php
/**
 * User: nightlinus
 * Date: 07.08.13
 * Time: 14:56
 */

namespace OracleDb\test;

class DbTest extends \PHPUnit_Framework_TestCase
{

    public static $dbParams;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$dbParams = new \stdClass();
        self::$dbParams->user = 'MTK_MAIN_UNIT';
        self::$dbParams->password = 'MTK_MAIN_UNIT';
        self::$dbParams->connection = 'ASRZ_TEST';
        require "../Db.php";
        require "../Statement.php";
        require "../Profiler.php";
        require "../Exception.php";
    }

    public function testGetClientVersion()
    {
        $params = self::$dbParams;
        $db = new \OracleDb\Db($params->user, $params->password, $params->connection);
        /** @noinspection PhpUndefinedFunctionInspection */
        $this->assertEquals(oci_client_version(), $db->getClientVersion(), 'Shoud be oracle client version.');
    }

    public function testGetServerVersion()
    {
        $params = self::$dbParams;
        $db = new \OracleDb\Db($params->user, $params->password, $params->connection);
        $this->assertNotNull($db->getServerVersion(), 'Shoud be oracle server version.');
    }

    public function testConnect()
    {
        $params = self::$dbParams;
        $db = new \OracleDb\Db($params->user, $params->password, $params->connection);
        $this->assertFalse(is_resource($db->getConnection()), 'Connection shoud be null before connection.');
        $db->connect();
        $this->assertTrue(is_resource($db->getConnection()), 'Connection shoud be resource after connection.');
    }
}
