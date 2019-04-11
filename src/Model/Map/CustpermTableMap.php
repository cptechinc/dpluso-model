<?php

namespace Map;

use \Custperm;
use \CustpermQuery;
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
 * This class defines the structure of the 'custperm' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CustpermTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CustpermTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'custperm';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Custperm';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Custperm';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the loginid field
     */
    const COL_LOGINID = 'custperm.loginid';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'custperm.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'custperm.shiptoid';

    /**
     * the column name for the salesper1 field
     */
    const COL_SALESPER1 = 'custperm.salesper1';

    /**
     * the column name for the restrictaccess field
     */
    const COL_RESTRICTACCESS = 'custperm.restrictaccess';

    /**
     * the column name for the amountsold field
     */
    const COL_AMOUNTSOLD = 'custperm.amountsold';

    /**
     * the column name for the timesold field
     */
    const COL_TIMESOLD = 'custperm.timesold';

    /**
     * the column name for the lastsaledate field
     */
    const COL_LASTSALEDATE = 'custperm.lastsaledate';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'custperm.dummy';

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
        self::TYPE_PHPNAME       => array('Loginid', 'Custid', 'Shiptoid', 'Salesper1', 'Restrictaccess', 'Amountsold', 'Timesold', 'Lastsaledate', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('loginid', 'custid', 'shiptoid', 'salesper1', 'restrictaccess', 'amountsold', 'timesold', 'lastsaledate', 'dummy', ),
        self::TYPE_COLNAME       => array(CustpermTableMap::COL_LOGINID, CustpermTableMap::COL_CUSTID, CustpermTableMap::COL_SHIPTOID, CustpermTableMap::COL_SALESPER1, CustpermTableMap::COL_RESTRICTACCESS, CustpermTableMap::COL_AMOUNTSOLD, CustpermTableMap::COL_TIMESOLD, CustpermTableMap::COL_LASTSALEDATE, CustpermTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('loginid', 'custid', 'shiptoid', 'salesper1', 'restrictaccess', 'amountsold', 'timesold', 'lastsaledate', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Loginid' => 0, 'Custid' => 1, 'Shiptoid' => 2, 'Salesper1' => 3, 'Restrictaccess' => 4, 'Amountsold' => 5, 'Timesold' => 6, 'Lastsaledate' => 7, 'Dummy' => 8, ),
        self::TYPE_CAMELNAME     => array('loginid' => 0, 'custid' => 1, 'shiptoid' => 2, 'salesper1' => 3, 'restrictaccess' => 4, 'amountsold' => 5, 'timesold' => 6, 'lastsaledate' => 7, 'dummy' => 8, ),
        self::TYPE_COLNAME       => array(CustpermTableMap::COL_LOGINID => 0, CustpermTableMap::COL_CUSTID => 1, CustpermTableMap::COL_SHIPTOID => 2, CustpermTableMap::COL_SALESPER1 => 3, CustpermTableMap::COL_RESTRICTACCESS => 4, CustpermTableMap::COL_AMOUNTSOLD => 5, CustpermTableMap::COL_TIMESOLD => 6, CustpermTableMap::COL_LASTSALEDATE => 7, CustpermTableMap::COL_DUMMY => 8, ),
        self::TYPE_FIELDNAME     => array('loginid' => 0, 'custid' => 1, 'shiptoid' => 2, 'salesper1' => 3, 'restrictaccess' => 4, 'amountsold' => 5, 'timesold' => 6, 'lastsaledate' => 7, 'dummy' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('custperm');
        $this->setPhpName('Custperm');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Custperm');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('loginid', 'Loginid', 'VARCHAR', true, 12, '');
        $this->addPrimaryKey('custid', 'Custid', 'VARCHAR', true, 6, '');
        $this->addPrimaryKey('shiptoid', 'Shiptoid', 'VARCHAR', true, 6, '');
        $this->addColumn('salesper1', 'Salesper1', 'VARCHAR', false, 6, null);
        $this->addColumn('restrictaccess', 'Restrictaccess', 'VARCHAR', false, 1, null);
        $this->addColumn('amountsold', 'Amountsold', 'DECIMAL', false, 10, null);
        $this->addColumn('timesold', 'Timesold', 'INTEGER', false, null, null);
        $this->addColumn('lastsaledate', 'Lastsaledate', 'INTEGER', false, 8, null);
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
     * @param \Custperm $obj A \Custperm object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getLoginid() || is_scalar($obj->getLoginid()) || is_callable([$obj->getLoginid(), '__toString']) ? (string) $obj->getLoginid() : $obj->getLoginid()), (null === $obj->getCustid() || is_scalar($obj->getCustid()) || is_callable([$obj->getCustid(), '__toString']) ? (string) $obj->getCustid() : $obj->getCustid()), (null === $obj->getShiptoid() || is_scalar($obj->getShiptoid()) || is_callable([$obj->getShiptoid(), '__toString']) ? (string) $obj->getShiptoid() : $obj->getShiptoid())]);
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
     * @param mixed $value A \Custperm object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Custperm) {
                $key = serialize([(null === $value->getLoginid() || is_scalar($value->getLoginid()) || is_callable([$value->getLoginid(), '__toString']) ? (string) $value->getLoginid() : $value->getLoginid()), (null === $value->getCustid() || is_scalar($value->getCustid()) || is_callable([$value->getCustid(), '__toString']) ? (string) $value->getCustid() : $value->getCustid()), (null === $value->getShiptoid() || is_scalar($value->getShiptoid()) || is_callable([$value->getShiptoid(), '__toString']) ? (string) $value->getShiptoid() : $value->getShiptoid())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Custperm object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CustpermTableMap::CLASS_DEFAULT : CustpermTableMap::OM_CLASS;
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
     * @return array           (Custperm object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CustpermTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CustpermTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CustpermTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CustpermTableMap::OM_CLASS;
            /** @var Custperm $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CustpermTableMap::addInstanceToPool($obj, $key);
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
            $key = CustpermTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CustpermTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Custperm $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CustpermTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CustpermTableMap::COL_LOGINID);
            $criteria->addSelectColumn(CustpermTableMap::COL_CUSTID);
            $criteria->addSelectColumn(CustpermTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(CustpermTableMap::COL_SALESPER1);
            $criteria->addSelectColumn(CustpermTableMap::COL_RESTRICTACCESS);
            $criteria->addSelectColumn(CustpermTableMap::COL_AMOUNTSOLD);
            $criteria->addSelectColumn(CustpermTableMap::COL_TIMESOLD);
            $criteria->addSelectColumn(CustpermTableMap::COL_LASTSALEDATE);
            $criteria->addSelectColumn(CustpermTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.loginid');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.salesper1');
            $criteria->addSelectColumn($alias . '.restrictaccess');
            $criteria->addSelectColumn($alias . '.amountsold');
            $criteria->addSelectColumn($alias . '.timesold');
            $criteria->addSelectColumn($alias . '.lastsaledate');
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
        return Propel::getServiceContainer()->getDatabaseMap(CustpermTableMap::DATABASE_NAME)->getTable(CustpermTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CustpermTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CustpermTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CustpermTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Custperm or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Custperm object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustpermTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Custperm) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CustpermTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CustpermTableMap::COL_LOGINID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CustpermTableMap::COL_CUSTID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(CustpermTableMap::COL_SHIPTOID, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = CustpermQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CustpermTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CustpermTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the custperm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CustpermQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Custperm or Criteria object.
     *
     * @param mixed               $criteria Criteria or Custperm object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustpermTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Custperm object
        }


        // Set the correct dbName
        $query = CustpermQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CustpermTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CustpermTableMap::buildTableMap();
