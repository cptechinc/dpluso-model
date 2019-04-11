<?php

namespace Map;

use \Wmpickhed;
use \WmpickhedQuery;
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
 * This class defines the structure of the 'wmpickhed' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WmpickhedTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WmpickhedTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'wmpickhed';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Wmpickhed';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Wmpickhed';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the ordernbr field
     */
    const COL_ORDERNBR = 'wmpickhed.ordernbr';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'wmpickhed.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'wmpickhed.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'wmpickhed.time';

    /**
     * the column name for the customerid field
     */
    const COL_CUSTOMERID = 'wmpickhed.customerid';

    /**
     * the column name for the customername field
     */
    const COL_CUSTOMERNAME = 'wmpickhed.customername';

    /**
     * the column name for the statusmsg field
     */
    const COL_STATUSMSG = 'wmpickhed.statusmsg';

    /**
     * the column name for the lastpalletnbr field
     */
    const COL_LASTPALLETNBR = 'wmpickhed.lastpalletnbr';

    /**
     * the column name for the function field
     */
    const COL_FUNCTION = 'wmpickhed.function';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'wmpickhed.dummy';

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
        self::TYPE_PHPNAME       => array('Ordernbr', 'Recno', 'Date', 'Time', 'Customerid', 'Customername', 'Statusmsg', 'Lastpalletnbr', 'Function', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('ordernbr', 'recno', 'date', 'time', 'customerid', 'customername', 'statusmsg', 'lastpalletnbr', 'function', 'dummy', ),
        self::TYPE_COLNAME       => array(WmpickhedTableMap::COL_ORDERNBR, WmpickhedTableMap::COL_RECNO, WmpickhedTableMap::COL_DATE, WmpickhedTableMap::COL_TIME, WmpickhedTableMap::COL_CUSTOMERID, WmpickhedTableMap::COL_CUSTOMERNAME, WmpickhedTableMap::COL_STATUSMSG, WmpickhedTableMap::COL_LASTPALLETNBR, WmpickhedTableMap::COL_FUNCTION, WmpickhedTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('ordernbr', 'recno', 'date', 'time', 'customerid', 'customername', 'statusmsg', 'lastpalletnbr', 'function', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Ordernbr' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Customerid' => 4, 'Customername' => 5, 'Statusmsg' => 6, 'Lastpalletnbr' => 7, 'Function' => 8, 'Dummy' => 9, ),
        self::TYPE_CAMELNAME     => array('ordernbr' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'customerid' => 4, 'customername' => 5, 'statusmsg' => 6, 'lastpalletnbr' => 7, 'function' => 8, 'dummy' => 9, ),
        self::TYPE_COLNAME       => array(WmpickhedTableMap::COL_ORDERNBR => 0, WmpickhedTableMap::COL_RECNO => 1, WmpickhedTableMap::COL_DATE => 2, WmpickhedTableMap::COL_TIME => 3, WmpickhedTableMap::COL_CUSTOMERID => 4, WmpickhedTableMap::COL_CUSTOMERNAME => 5, WmpickhedTableMap::COL_STATUSMSG => 6, WmpickhedTableMap::COL_LASTPALLETNBR => 7, WmpickhedTableMap::COL_FUNCTION => 8, WmpickhedTableMap::COL_DUMMY => 9, ),
        self::TYPE_FIELDNAME     => array('ordernbr' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'customerid' => 4, 'customername' => 5, 'statusmsg' => 6, 'lastpalletnbr' => 7, 'function' => 8, 'dummy' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('wmpickhed');
        $this->setPhpName('Wmpickhed');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Wmpickhed');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ordernbr', 'Ordernbr', 'VARCHAR', true, 10, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('customerid', 'Customerid', 'VARCHAR', false, 6, null);
        $this->addColumn('customername', 'Customername', 'VARCHAR', false, 30, null);
        $this->addColumn('statusmsg', 'Statusmsg', 'VARCHAR', false, 50, null);
        $this->addColumn('lastpalletnbr', 'Lastpalletnbr', 'INTEGER', false, 4, null);
        $this->addColumn('function', 'Function', 'VARCHAR', false, 12, null);
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
     * @param \Wmpickhed $obj A \Wmpickhed object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getOrdernbr() || is_scalar($obj->getOrdernbr()) || is_callable([$obj->getOrdernbr(), '__toString']) ? (string) $obj->getOrdernbr() : $obj->getOrdernbr()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno())]);
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
     * @param mixed $value A \Wmpickhed object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Wmpickhed) {
                $key = serialize([(null === $value->getOrdernbr() || is_scalar($value->getOrdernbr()) || is_callable([$value->getOrdernbr(), '__toString']) ? (string) $value->getOrdernbr() : $value->getOrdernbr()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Wmpickhed object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? WmpickhedTableMap::CLASS_DEFAULT : WmpickhedTableMap::OM_CLASS;
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
     * @return array           (Wmpickhed object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WmpickhedTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WmpickhedTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WmpickhedTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WmpickhedTableMap::OM_CLASS;
            /** @var Wmpickhed $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WmpickhedTableMap::addInstanceToPool($obj, $key);
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
            $key = WmpickhedTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WmpickhedTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Wmpickhed $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WmpickhedTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WmpickhedTableMap::COL_ORDERNBR);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_RECNO);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_DATE);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_TIME);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_CUSTOMERID);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_CUSTOMERNAME);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_STATUSMSG);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_LASTPALLETNBR);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_FUNCTION);
            $criteria->addSelectColumn(WmpickhedTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.ordernbr');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.customerid');
            $criteria->addSelectColumn($alias . '.customername');
            $criteria->addSelectColumn($alias . '.statusmsg');
            $criteria->addSelectColumn($alias . '.lastpalletnbr');
            $criteria->addSelectColumn($alias . '.function');
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
        return Propel::getServiceContainer()->getDatabaseMap(WmpickhedTableMap::DATABASE_NAME)->getTable(WmpickhedTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WmpickhedTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WmpickhedTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WmpickhedTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Wmpickhed or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Wmpickhed object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WmpickhedTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Wmpickhed) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WmpickhedTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(WmpickhedTableMap::COL_ORDERNBR, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(WmpickhedTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = WmpickhedQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WmpickhedTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WmpickhedTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the wmpickhed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WmpickhedQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Wmpickhed or Criteria object.
     *
     * @param mixed               $criteria Criteria or Wmpickhed object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WmpickhedTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Wmpickhed object
        }


        // Set the correct dbName
        $query = WmpickhedQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WmpickhedTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WmpickhedTableMap::buildTableMap();
