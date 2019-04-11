<?php

namespace Map;

use \Saleschart;
use \SaleschartQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'saleschart' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SaleschartTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SaleschartTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'saleschart';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Saleschart';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Saleschart';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 33;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 33;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'saleschart.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'saleschart.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'saleschart.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'saleschart.time';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'saleschart.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'saleschart.shiptoid';

    /**
     * the column name for the lastsaledate field
     */
    const COL_LASTSALEDATE = 'saleschart.lastsaledate';

    /**
     * the column name for the salesmtd field
     */
    const COL_SALESMTD = 'saleschart.salesmtd';

    /**
     * the column name for the salesmth1 field
     */
    const COL_SALESMTH1 = 'saleschart.salesmth1';

    /**
     * the column name for the salesmth2 field
     */
    const COL_SALESMTH2 = 'saleschart.salesmth2';

    /**
     * the column name for the salesmth3 field
     */
    const COL_SALESMTH3 = 'saleschart.salesmth3';

    /**
     * the column name for the salesmth4 field
     */
    const COL_SALESMTH4 = 'saleschart.salesmth4';

    /**
     * the column name for the salesmth5 field
     */
    const COL_SALESMTH5 = 'saleschart.salesmth5';

    /**
     * the column name for the salesmth6 field
     */
    const COL_SALESMTH6 = 'saleschart.salesmth6';

    /**
     * the column name for the salesmth7 field
     */
    const COL_SALESMTH7 = 'saleschart.salesmth7';

    /**
     * the column name for the salesmth8 field
     */
    const COL_SALESMTH8 = 'saleschart.salesmth8';

    /**
     * the column name for the salesmth9 field
     */
    const COL_SALESMTH9 = 'saleschart.salesmth9';

    /**
     * the column name for the salesmth10 field
     */
    const COL_SALESMTH10 = 'saleschart.salesmth10';

    /**
     * the column name for the salesmth11 field
     */
    const COL_SALESMTH11 = 'saleschart.salesmth11';

    /**
     * the column name for the salesmth12 field
     */
    const COL_SALESMTH12 = 'saleschart.salesmth12';

    /**
     * the column name for the salesmth13 field
     */
    const COL_SALESMTH13 = 'saleschart.salesmth13';

    /**
     * the column name for the salesmth14 field
     */
    const COL_SALESMTH14 = 'saleschart.salesmth14';

    /**
     * the column name for the salesmth15 field
     */
    const COL_SALESMTH15 = 'saleschart.salesmth15';

    /**
     * the column name for the salesmth16 field
     */
    const COL_SALESMTH16 = 'saleschart.salesmth16';

    /**
     * the column name for the salesmth17 field
     */
    const COL_SALESMTH17 = 'saleschart.salesmth17';

    /**
     * the column name for the salesmth18 field
     */
    const COL_SALESMTH18 = 'saleschart.salesmth18';

    /**
     * the column name for the salesmth19 field
     */
    const COL_SALESMTH19 = 'saleschart.salesmth19';

    /**
     * the column name for the salesmth20 field
     */
    const COL_SALESMTH20 = 'saleschart.salesmth20';

    /**
     * the column name for the salesmth21 field
     */
    const COL_SALESMTH21 = 'saleschart.salesmth21';

    /**
     * the column name for the salesmth22 field
     */
    const COL_SALESMTH22 = 'saleschart.salesmth22';

    /**
     * the column name for the salesmth23 field
     */
    const COL_SALESMTH23 = 'saleschart.salesmth23';

    /**
     * the column name for the salesmth24 field
     */
    const COL_SALESMTH24 = 'saleschart.salesmth24';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'saleschart.dummy';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Custid', 'Shiptoid', 'Lastsaledate', 'Salesmtd', 'Salesmth1', 'Salesmth2', 'Salesmth3', 'Salesmth4', 'Salesmth5', 'Salesmth6', 'Salesmth7', 'Salesmth8', 'Salesmth9', 'Salesmth10', 'Salesmth11', 'Salesmth12', 'Salesmth13', 'Salesmth14', 'Salesmth15', 'Salesmth16', 'Salesmth17', 'Salesmth18', 'Salesmth19', 'Salesmth20', 'Salesmth21', 'Salesmth22', 'Salesmth23', 'Salesmth24', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'shiptoid', 'lastsaledate', 'salesmtd', 'salesmth1', 'salesmth2', 'salesmth3', 'salesmth4', 'salesmth5', 'salesmth6', 'salesmth7', 'salesmth8', 'salesmth9', 'salesmth10', 'salesmth11', 'salesmth12', 'salesmth13', 'salesmth14', 'salesmth15', 'salesmth16', 'salesmth17', 'salesmth18', 'salesmth19', 'salesmth20', 'salesmth21', 'salesmth22', 'salesmth23', 'salesmth24', 'dummy', ),
        self::TYPE_COLNAME       => array(SaleschartTableMap::COL_SESSIONID, SaleschartTableMap::COL_RECNO, SaleschartTableMap::COL_DATE, SaleschartTableMap::COL_TIME, SaleschartTableMap::COL_CUSTID, SaleschartTableMap::COL_SHIPTOID, SaleschartTableMap::COL_LASTSALEDATE, SaleschartTableMap::COL_SALESMTD, SaleschartTableMap::COL_SALESMTH1, SaleschartTableMap::COL_SALESMTH2, SaleschartTableMap::COL_SALESMTH3, SaleschartTableMap::COL_SALESMTH4, SaleschartTableMap::COL_SALESMTH5, SaleschartTableMap::COL_SALESMTH6, SaleschartTableMap::COL_SALESMTH7, SaleschartTableMap::COL_SALESMTH8, SaleschartTableMap::COL_SALESMTH9, SaleschartTableMap::COL_SALESMTH10, SaleschartTableMap::COL_SALESMTH11, SaleschartTableMap::COL_SALESMTH12, SaleschartTableMap::COL_SALESMTH13, SaleschartTableMap::COL_SALESMTH14, SaleschartTableMap::COL_SALESMTH15, SaleschartTableMap::COL_SALESMTH16, SaleschartTableMap::COL_SALESMTH17, SaleschartTableMap::COL_SALESMTH18, SaleschartTableMap::COL_SALESMTH19, SaleschartTableMap::COL_SALESMTH20, SaleschartTableMap::COL_SALESMTH21, SaleschartTableMap::COL_SALESMTH22, SaleschartTableMap::COL_SALESMTH23, SaleschartTableMap::COL_SALESMTH24, SaleschartTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'shiptoid', 'lastsaledate', 'salesmtd', 'salesmth1', 'salesmth2', 'salesmth3', 'salesmth4', 'salesmth5', 'salesmth6', 'salesmth7', 'salesmth8', 'salesmth9', 'salesmth10', 'salesmth11', 'salesmth12', 'salesmth13', 'salesmth14', 'salesmth15', 'salesmth16', 'salesmth17', 'salesmth18', 'salesmth19', 'salesmth20', 'salesmth21', 'salesmth22', 'salesmth23', 'salesmth24', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Custid' => 4, 'Shiptoid' => 5, 'Lastsaledate' => 6, 'Salesmtd' => 7, 'Salesmth1' => 8, 'Salesmth2' => 9, 'Salesmth3' => 10, 'Salesmth4' => 11, 'Salesmth5' => 12, 'Salesmth6' => 13, 'Salesmth7' => 14, 'Salesmth8' => 15, 'Salesmth9' => 16, 'Salesmth10' => 17, 'Salesmth11' => 18, 'Salesmth12' => 19, 'Salesmth13' => 20, 'Salesmth14' => 21, 'Salesmth15' => 22, 'Salesmth16' => 23, 'Salesmth17' => 24, 'Salesmth18' => 25, 'Salesmth19' => 26, 'Salesmth20' => 27, 'Salesmth21' => 28, 'Salesmth22' => 29, 'Salesmth23' => 30, 'Salesmth24' => 31, 'Dummy' => 32, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'lastsaledate' => 6, 'salesmtd' => 7, 'salesmth1' => 8, 'salesmth2' => 9, 'salesmth3' => 10, 'salesmth4' => 11, 'salesmth5' => 12, 'salesmth6' => 13, 'salesmth7' => 14, 'salesmth8' => 15, 'salesmth9' => 16, 'salesmth10' => 17, 'salesmth11' => 18, 'salesmth12' => 19, 'salesmth13' => 20, 'salesmth14' => 21, 'salesmth15' => 22, 'salesmth16' => 23, 'salesmth17' => 24, 'salesmth18' => 25, 'salesmth19' => 26, 'salesmth20' => 27, 'salesmth21' => 28, 'salesmth22' => 29, 'salesmth23' => 30, 'salesmth24' => 31, 'dummy' => 32, ),
        self::TYPE_COLNAME       => array(SaleschartTableMap::COL_SESSIONID => 0, SaleschartTableMap::COL_RECNO => 1, SaleschartTableMap::COL_DATE => 2, SaleschartTableMap::COL_TIME => 3, SaleschartTableMap::COL_CUSTID => 4, SaleschartTableMap::COL_SHIPTOID => 5, SaleschartTableMap::COL_LASTSALEDATE => 6, SaleschartTableMap::COL_SALESMTD => 7, SaleschartTableMap::COL_SALESMTH1 => 8, SaleschartTableMap::COL_SALESMTH2 => 9, SaleschartTableMap::COL_SALESMTH3 => 10, SaleschartTableMap::COL_SALESMTH4 => 11, SaleschartTableMap::COL_SALESMTH5 => 12, SaleschartTableMap::COL_SALESMTH6 => 13, SaleschartTableMap::COL_SALESMTH7 => 14, SaleschartTableMap::COL_SALESMTH8 => 15, SaleschartTableMap::COL_SALESMTH9 => 16, SaleschartTableMap::COL_SALESMTH10 => 17, SaleschartTableMap::COL_SALESMTH11 => 18, SaleschartTableMap::COL_SALESMTH12 => 19, SaleschartTableMap::COL_SALESMTH13 => 20, SaleschartTableMap::COL_SALESMTH14 => 21, SaleschartTableMap::COL_SALESMTH15 => 22, SaleschartTableMap::COL_SALESMTH16 => 23, SaleschartTableMap::COL_SALESMTH17 => 24, SaleschartTableMap::COL_SALESMTH18 => 25, SaleschartTableMap::COL_SALESMTH19 => 26, SaleschartTableMap::COL_SALESMTH20 => 27, SaleschartTableMap::COL_SALESMTH21 => 28, SaleschartTableMap::COL_SALESMTH22 => 29, SaleschartTableMap::COL_SALESMTH23 => 30, SaleschartTableMap::COL_SALESMTH24 => 31, SaleschartTableMap::COL_DUMMY => 32, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'lastsaledate' => 6, 'salesmtd' => 7, 'salesmth1' => 8, 'salesmth2' => 9, 'salesmth3' => 10, 'salesmth4' => 11, 'salesmth5' => 12, 'salesmth6' => 13, 'salesmth7' => 14, 'salesmth8' => 15, 'salesmth9' => 16, 'salesmth10' => 17, 'salesmth11' => 18, 'salesmth12' => 19, 'salesmth13' => 20, 'salesmth14' => 21, 'salesmth15' => 22, 'salesmth16' => 23, 'salesmth17' => 24, 'salesmth18' => 25, 'salesmth19' => 26, 'salesmth20' => 27, 'salesmth21' => 28, 'salesmth22' => 29, 'salesmth23' => 30, 'salesmth24' => 31, 'dummy' => 32, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('saleschart');
        $this->setPhpName('Saleschart');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Saleschart');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, '');
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 10, 0);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, null);
        $this->addColumn('lastsaledate', 'Lastsaledate', 'VARCHAR', false, 10, null);
        $this->addColumn('salesmtd', 'Salesmtd', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth1', 'Salesmth1', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth2', 'Salesmth2', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth3', 'Salesmth3', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth4', 'Salesmth4', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth5', 'Salesmth5', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth6', 'Salesmth6', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth7', 'Salesmth7', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth8', 'Salesmth8', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth9', 'Salesmth9', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth10', 'Salesmth10', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth11', 'Salesmth11', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth12', 'Salesmth12', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth13', 'Salesmth13', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth14', 'Salesmth14', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth15', 'Salesmth15', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth16', 'Salesmth16', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth17', 'Salesmth17', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth18', 'Salesmth18', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth19', 'Salesmth19', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth20', 'Salesmth20', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth21', 'Salesmth21', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth22', 'Salesmth22', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth23', 'Salesmth23', 'DECIMAL', false, 8, null);
        $this->addColumn('salesmth24', 'Salesmth24', 'DECIMAL', false, 8, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Saleschart $obj A \Saleschart object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Saleschart object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Saleschart) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Saleschart object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SaleschartTableMap::CLASS_DEFAULT : SaleschartTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Saleschart object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SaleschartTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SaleschartTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SaleschartTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SaleschartTableMap::OM_CLASS;
            /** @var Saleschart $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SaleschartTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SaleschartTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SaleschartTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Saleschart $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SaleschartTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SaleschartTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(SaleschartTableMap::COL_RECNO);
            $criteria->addSelectColumn(SaleschartTableMap::COL_DATE);
            $criteria->addSelectColumn(SaleschartTableMap::COL_TIME);
            $criteria->addSelectColumn(SaleschartTableMap::COL_CUSTID);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(SaleschartTableMap::COL_LASTSALEDATE);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTD);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH1);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH2);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH3);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH4);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH5);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH6);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH7);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH8);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH9);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH10);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH11);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH12);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH13);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH14);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH15);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH16);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH17);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH18);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH19);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH20);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH21);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH22);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH23);
            $criteria->addSelectColumn(SaleschartTableMap::COL_SALESMTH24);
            $criteria->addSelectColumn(SaleschartTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.lastsaledate');
            $criteria->addSelectColumn($alias . '.salesmtd');
            $criteria->addSelectColumn($alias . '.salesmth1');
            $criteria->addSelectColumn($alias . '.salesmth2');
            $criteria->addSelectColumn($alias . '.salesmth3');
            $criteria->addSelectColumn($alias . '.salesmth4');
            $criteria->addSelectColumn($alias . '.salesmth5');
            $criteria->addSelectColumn($alias . '.salesmth6');
            $criteria->addSelectColumn($alias . '.salesmth7');
            $criteria->addSelectColumn($alias . '.salesmth8');
            $criteria->addSelectColumn($alias . '.salesmth9');
            $criteria->addSelectColumn($alias . '.salesmth10');
            $criteria->addSelectColumn($alias . '.salesmth11');
            $criteria->addSelectColumn($alias . '.salesmth12');
            $criteria->addSelectColumn($alias . '.salesmth13');
            $criteria->addSelectColumn($alias . '.salesmth14');
            $criteria->addSelectColumn($alias . '.salesmth15');
            $criteria->addSelectColumn($alias . '.salesmth16');
            $criteria->addSelectColumn($alias . '.salesmth17');
            $criteria->addSelectColumn($alias . '.salesmth18');
            $criteria->addSelectColumn($alias . '.salesmth19');
            $criteria->addSelectColumn($alias . '.salesmth20');
            $criteria->addSelectColumn($alias . '.salesmth21');
            $criteria->addSelectColumn($alias . '.salesmth22');
            $criteria->addSelectColumn($alias . '.salesmth23');
            $criteria->addSelectColumn($alias . '.salesmth24');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SaleschartTableMap::DATABASE_NAME)->getTable(SaleschartTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SaleschartTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SaleschartTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SaleschartTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Saleschart or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Saleschart object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SaleschartTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Saleschart) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SaleschartTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(SaleschartTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(SaleschartTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = SaleschartQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SaleschartTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SaleschartTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the saleschart table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SaleschartQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Saleschart or Criteria object.
     *
     * @param mixed               $criteria Criteria or Saleschart object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SaleschartTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Saleschart object
        }


        // Set the correct dbName
        $query = SaleschartQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SaleschartTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SaleschartTableMap::buildTableMap();
