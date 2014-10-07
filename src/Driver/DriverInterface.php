<?php
/**
 * Date: 07.10.14
 * Time: 18:56
 *
 * @category
 * @package  OracleDb
 * @author   nightlinus <m.a.ogarkov@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version
 * @link
 */
namespace nightlinus\OracleDb\Driver;


/**
 * Class OCIDriver
 *
 * @package nightlinus\OracleDb\Driver
 */
interface DriverInterface
{
    /**
     * @param resource $handle
     * @param string   $name
     * @param mixed    $variable
     * @param int      $tableLength
     * @param int      $itemLength
     * @param int      $type
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function bindArray($handle, $name, $variable, $tableLength, $itemLength = -1, $type = SQLT_AFC);

    /**
     * @param resource   $handle
     * @param int|string $column
     * @param mixed      $variable
     * @param int        $type
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function bindColumn($handle, $column, $variable, $type = SQLT_CHR);

    /**
     * @param resource $handle
     * @param string   $name
     * @param mixed    $variable
     * @param int      $length
     * @param int      $type
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function bindValue($handle, $name, $variable, $length = -1, $type = SQLT_CHR);

    /**
     * @param resource $handle
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function commit($handle);

    /**
     * @param int    $connectionType
     * @param string $user
     * @param string $password
     * @param string $connectionString
     * @param string $charSet
     * @param int    $sessionMode
     *
     * @return resource
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function connect($connectionType, $user, $password, $connectionString, $charSet, $sessionMode);

    /**
     * @param resource $handle
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function disconnect($handle);

    /**
     * @param resource $handle
     * @param int      $mode
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function execute($handle, $mode);

    /**
     * @param resource $handle
     * @param int      $skip
     * @param int      $maxrows
     * @param int      $mode
     *
     * @return array
     */
    public function fetchAll($handle, $skip, $maxrows, $mode);

    /**
     * @param resource $handle
     * @param int      $mode
     *
     * @return array
     */
    public function fetchArray($handle, $mode);

    /**
     * @param resource $handle
     *
     * @return object
     */
    public function fetchObject($handle);

    /**
     * @param resource $handle
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function free(&$handle);

    /**
     * @param resource $handle
     *
     * @return int
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getAffectedRowsNumber($handle);

    /**
     * @return string
     */
    public function getClientVersion();

    /**
     * @param resource $handle
     *
     * @return array
     */
    public function getError($handle = null);

    /**
     * @param resource   $handle statement resource
     * @param int|string $index  1 based index or name
     *
     * @return string
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldName($handle, $index);

    /**
     * @param resource $handle statement resource
     *
     * @return int
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldNumber($handle);

    /**
     * @param resource   $handle statement resource
     * @param int|string $index  1 based index or name
     *
     * @return int
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldPrecision($handle, $index);

    /**
     * @param resource   $handle statement resource
     * @param int|string $index  1 based index or name
     *
     * @return int
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldScale($handle, $index);

    /**
     * @param resource   $handle statement resource
     * @param int|string $index  1 based index or name
     *
     * @return int
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldSize($handle, $index);

    /**
     * @param resource   $handle statement resource
     * @param int|string $index  1 based index or name
     *
     * @return string
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldType($handle, $index);

    /**
     * @param resource   $handle statement resource
     * @param int|string $index  1 based index or name
     *
     * @return string
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getFieldTypeRaw($handle, $index);

    /**
     * @param resource $handle
     *
     * @return string
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getServerVersion($handle);

    /**
     * @param resource $handle
     *
     * @return string
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function getStatementType($handle);

    /**
     * @param resource $handle
     *
     * @return resource
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function newCursor($handle);

    /**
     * @param resource $handle
     * @param string   $query
     *
     * @return resource
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function parse($handle, $query);

    /**
     * @param $variable
     *
     * @return string
     */
    public function quote($variable);

    /**
     * Rollback changes within session
     *
     * @param resource $handle
     *
     * @throws \nightlinus\OracleDb\Driver\Exception
     * @return $this
     */
    public function rollback($handle);

    /**
     * @param resource $handle
     * @param int      $size
     *
     * @return $this
     * @throws \nightlinus\OracleDb\Driver\Exception
     */
    public function setPrefcth($handle, $size);
}
