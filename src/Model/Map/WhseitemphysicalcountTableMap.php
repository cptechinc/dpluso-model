<?php

namespace Map;

use \Whseitemphysicalcount;
use \WhseitemphysicalcountQuery;
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
 * This class defines the structure of the 'whseitemphysicalcount' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WhseitemphysicalcountTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WhseitemphysicalcountTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'whseitemphysicalcount';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Whseitemphysicalcount';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Whseitemphysicalcount';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'whseitemphysicalcount.sessionid';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'whseitemphysicalcount.itemid';

    /**
     * the column name for the scan field
     */
    const COL_SCAN = 'whseitemphysicalcount.scan';

    /**
     * the column name for the lotserial field
     */
    const COL_LOTSERIAL = 'whseitemphysicalcount.lotserial';

    /**
     * the column name for the lotserialref field
     */
    const COL_LOTSERIALREF = 'whseitemphysicalcount.lotserialref';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'whseitemphysicalcount.qty';

    /**
     * the column name for the complete field
     */
    const COL_COMPLETE = 'whseitemphysicalcount.complete';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'whseitemphysicalcount.status';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'whseitemphysicalcount.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'whseitemphysicalcount.time';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'whseitemphysicalcount.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Itemid', 'Scan', 'Lotserial', 'Lotserialref', 'Qty', 'Complete', 'Status', 'Date', 'Time', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'itemid', 'scan', 'lotserial', 'lotserialref', 'qty', 'complete', 'status', 'date', 'time', 'dummy', ),
        self::TYPE_COLNAME       => array(WhseitemphysicalcountTableMap::COL_SESSIONID, WhseitemphysicalcountTableMap::COL_ITEMID, WhseitemphysicalcountTableMap::COL_SCAN, WhseitemphysicalcountTableMap::COL_LOTSERIAL, WhseitemphysicalcountTableMap::COL_LOTSERIALREF, WhseitemphysicalcountTableMap::COL_QTY, WhseitemphysicalcountTableMap::COL_COMPLETE, WhseitemphysicalcountTableMap::COL_STATUS, WhseitemphysicalcountTableMap::COL_DATE, WhseitemphysicalcountTableMap::COL_TIME, WhseitemphysicalcountTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'itemid', 'scan', 'lotserial', 'lotserialref', 'qty', 'complete', 'status', 'date', 'time', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Itemid' => 1, 'Scan' => 2, 'Lotserial' => 3, 'Lotserialref' => 4, 'Qty' => 5, 'Complete' => 6, 'Status' => 7, 'Date' => 8, 'Time' => 9, 'Dummy' => 10, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'itemid' => 1, 'scan' => 2, 'lotserial' => 3, 'lotserialref' => 4, 'qty' => 5, 'complete' => 6, 'status' => 7, 'date' => 8, 'time' => 9, 'dummy' => 10, ),
        self::TYPE_COLNAME       => array(WhseitemphysicalcountTableMap::COL_SESSIONID => 0, WhseitemphysicalcountTableMap::COL_ITEMID => 1, WhseitemphysicalcountTableMap::COL_SCAN => 2, WhseitemphysicalcountTableMap::COL_LOTSERIAL => 3, WhseitemphysicalcountTableMap::COL_LOTSERIALREF => 4, WhseitemphysicalcountTableMap::COL_QTY => 5, WhseitemphysicalcountTableMap::COL_COMPLETE => 6, WhseitemphysicalcountTableMap::COL_STATUS => 7, WhseitemphysicalcountTableMap::COL_DATE => 8, WhseitemphysicalcountTableMap::COL_TIME => 9, WhseitemphysicalcountTableMap::COL_DUMMY => 10, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'itemid' => 1, 'scan' => 2, 'lotserial' => 3, 'lotserialref' => 4, 'qty' => 5, 'complete' => 6, 'status' => 7, 'date' => 8, 'time' => 9, 'dummy' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('whseitemphysicalcount');
        $this->setPhpName('Whseitemphysicalcount');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Whseitemphysicalcount');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 45, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 45, null);
        $this->addColumn('scan', 'Scan', 'VARCHAR', false, 45, null);
        $this->addColumn('lotserial', 'Lotserial', 'VARCHAR', false, 45, null);
        $this->addColumn('lotserialref', 'Lotserialref', 'VARCHAR', false, 45, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, 8, null);
        $this->addColumn('complete', 'Complete', 'VARCHAR', false, 45, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 45, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? WhseitemphysicalcountTableMap::CLASS_DEFAULT : WhseitemphysicalcountTableMap::OM_CLASS;
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
     * @return array           (Whseitemphysicalcount object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WhseitemphysicalcountTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WhseitemphysicalcountTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WhseitemphysicalcountTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WhseitemphysicalcountTableMap::OM_CLASS;
            /** @var Whseitemphysicalcount $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WhseitemphysicalcountTableMap::addInstanceToPool($obj, $key);
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
            $key = WhseitemphysicalcountTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WhseitemphysicalcountTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Whseitemphysicalcount $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WhseitemphysicalcountTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_ITEMID);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_SCAN);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_LOTSERIAL);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_LOTSERIALREF);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_QTY);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_COMPLETE);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_STATUS);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_DATE);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_TIME);
            $criteria->addSelectColumn(WhseitemphysicalcountTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.scan');
            $criteria->addSelectColumn($alias . '.lotserial');
            $criteria->addSelectColumn($alias . '.lotserialref');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.complete');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
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
        return Propel::getServiceContainer()->getDatabaseMap(WhseitemphysicalcountTableMap::DATABASE_NAME)->getTable(WhseitemphysicalcountTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WhseitemphysicalcountTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WhseitemphysicalcountTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WhseitemphysicalcountTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Whseitemphysicalcount or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Whseitemphysicalcount object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Whseitemphysicalcount) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WhseitemphysicalcountTableMap::DATABASE_NAME);
            $criteria->add(WhseitemphysicalcountTableMap::COL_SESSIONID, (array) $values, Criteria::IN);
        }

        $query = WhseitemphysicalcountQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WhseitemphysicalcountTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WhseitemphysicalcountTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the whseitemphysicalcount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WhseitemphysicalcountQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Whseitemphysicalcount or Criteria object.
     *
     * @param mixed               $criteria Criteria or Whseitemphysicalcount object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Whseitemphysicalcount object
        }


        // Set the correct dbName
        $query = WhseitemphysicalcountQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WhseitemphysicalcountTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WhseitemphysicalcountTableMap::buildTableMap();
