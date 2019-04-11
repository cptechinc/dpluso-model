<?php

namespace Map;

use \Unitofmeasure;
use \UnitofmeasureQuery;
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
 * This class defines the structure of the 'unitofmeasure' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UnitofmeasureTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UnitofmeasureTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'unitofmeasure';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Unitofmeasure';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Unitofmeasure';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the code field
     */
    const COL_CODE = 'unitofmeasure.code';

    /**
     * the column name for the desc field
     */
    const COL_DESC = 'unitofmeasure.desc';

    /**
     * the column name for the conversion field
     */
    const COL_CONVERSION = 'unitofmeasure.conversion';

    /**
     * the column name for the createdate field
     */
    const COL_CREATEDATE = 'unitofmeasure.createdate';

    /**
     * the column name for the createtime field
     */
    const COL_CREATETIME = 'unitofmeasure.createtime';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'unitofmeasure.dummy';

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
        self::TYPE_PHPNAME       => array('Code', 'Desc', 'Conversion', 'Createdate', 'Createtime', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('code', 'desc', 'conversion', 'createdate', 'createtime', 'dummy', ),
        self::TYPE_COLNAME       => array(UnitofmeasureTableMap::COL_CODE, UnitofmeasureTableMap::COL_DESC, UnitofmeasureTableMap::COL_CONVERSION, UnitofmeasureTableMap::COL_CREATEDATE, UnitofmeasureTableMap::COL_CREATETIME, UnitofmeasureTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('code', 'desc', 'conversion', 'createdate', 'createtime', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Code' => 0, 'Desc' => 1, 'Conversion' => 2, 'Createdate' => 3, 'Createtime' => 4, 'Dummy' => 5, ),
        self::TYPE_CAMELNAME     => array('code' => 0, 'desc' => 1, 'conversion' => 2, 'createdate' => 3, 'createtime' => 4, 'dummy' => 5, ),
        self::TYPE_COLNAME       => array(UnitofmeasureTableMap::COL_CODE => 0, UnitofmeasureTableMap::COL_DESC => 1, UnitofmeasureTableMap::COL_CONVERSION => 2, UnitofmeasureTableMap::COL_CREATEDATE => 3, UnitofmeasureTableMap::COL_CREATETIME => 4, UnitofmeasureTableMap::COL_DUMMY => 5, ),
        self::TYPE_FIELDNAME     => array('code' => 0, 'desc' => 1, 'conversion' => 2, 'createdate' => 3, 'createtime' => 4, 'dummy' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('unitofmeasure');
        $this->setPhpName('Unitofmeasure');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Unitofmeasure');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('code', 'Code', 'VARCHAR', true, 4, null);
        $this->addColumn('desc', 'Desc', 'VARCHAR', false, 20, null);
        $this->addColumn('conversion', 'Conversion', 'DECIMAL', false, 9, null);
        $this->addColumn('createdate', 'Createdate', 'INTEGER', false, 8, null);
        $this->addColumn('createtime', 'Createtime', 'INTEGER', false, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UnitofmeasureTableMap::CLASS_DEFAULT : UnitofmeasureTableMap::OM_CLASS;
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
     * @return array           (Unitofmeasure object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UnitofmeasureTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UnitofmeasureTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UnitofmeasureTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UnitofmeasureTableMap::OM_CLASS;
            /** @var Unitofmeasure $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UnitofmeasureTableMap::addInstanceToPool($obj, $key);
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
            $key = UnitofmeasureTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UnitofmeasureTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Unitofmeasure $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UnitofmeasureTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UnitofmeasureTableMap::COL_CODE);
            $criteria->addSelectColumn(UnitofmeasureTableMap::COL_DESC);
            $criteria->addSelectColumn(UnitofmeasureTableMap::COL_CONVERSION);
            $criteria->addSelectColumn(UnitofmeasureTableMap::COL_CREATEDATE);
            $criteria->addSelectColumn(UnitofmeasureTableMap::COL_CREATETIME);
            $criteria->addSelectColumn(UnitofmeasureTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.desc');
            $criteria->addSelectColumn($alias . '.conversion');
            $criteria->addSelectColumn($alias . '.createdate');
            $criteria->addSelectColumn($alias . '.createtime');
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
        return Propel::getServiceContainer()->getDatabaseMap(UnitofmeasureTableMap::DATABASE_NAME)->getTable(UnitofmeasureTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UnitofmeasureTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UnitofmeasureTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UnitofmeasureTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Unitofmeasure or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Unitofmeasure object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UnitofmeasureTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Unitofmeasure) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UnitofmeasureTableMap::DATABASE_NAME);
            $criteria->add(UnitofmeasureTableMap::COL_CODE, (array) $values, Criteria::IN);
        }

        $query = UnitofmeasureQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UnitofmeasureTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UnitofmeasureTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the unitofmeasure table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UnitofmeasureQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Unitofmeasure or Criteria object.
     *
     * @param mixed               $criteria Criteria or Unitofmeasure object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UnitofmeasureTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Unitofmeasure object
        }


        // Set the correct dbName
        $query = UnitofmeasureQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UnitofmeasureTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UnitofmeasureTableMap::buildTableMap();
