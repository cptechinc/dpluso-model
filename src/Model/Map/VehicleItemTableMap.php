<?php

namespace Map;

use \VehicleItem;
use \VehicleItemQuery;
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
 * This class defines the structure of the 'vehicle_catalog' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class VehicleItemTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.VehicleItemTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'vehicle_catalog';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\VehicleItem';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'VehicleItem';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id field
     */
    const COL_ID = 'vehicle_catalog.id';

    /**
     * the column name for the catalog field
     */
    const COL_CATALOG = 'vehicle_catalog.catalog';

    /**
     * the column name for the fromyear field
     */
    const COL_FROMYEAR = 'vehicle_catalog.fromyear';

    /**
     * the column name for the throughyear field
     */
    const COL_THROUGHYEAR = 'vehicle_catalog.throughyear';

    /**
     * the column name for the make field
     */
    const COL_MAKE = 'vehicle_catalog.make';

    /**
     * the column name for the engine field
     */
    const COL_ENGINE = 'vehicle_catalog.engine';

    /**
     * the column name for the model field
     */
    const COL_MODEL = 'vehicle_catalog.model';

    /**
     * the column name for the submodel field
     */
    const COL_SUBMODEL = 'vehicle_catalog.submodel';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'vehicle_catalog.itemid';

    /**
     * the column name for the application field
     */
    const COL_APPLICATION = 'vehicle_catalog.application';

    /**
     * the column name for the notes field
     */
    const COL_NOTES = 'vehicle_catalog.notes';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'vehicle_catalog.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'vehicle_catalog.time';

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
        self::TYPE_PHPNAME       => array('Id', 'Catalog', 'Fromyear', 'Throughyear', 'Make', 'Engine', 'Model', 'Submodel', 'Itemid', 'Application', 'notes', 'Date', 'Time', ),
        self::TYPE_CAMELNAME     => array('id', 'catalog', 'fromyear', 'throughyear', 'make', 'engine', 'model', 'submodel', 'itemid', 'application', 'notes', 'date', 'time', ),
        self::TYPE_COLNAME       => array(VehicleItemTableMap::COL_ID, VehicleItemTableMap::COL_CATALOG, VehicleItemTableMap::COL_FROMYEAR, VehicleItemTableMap::COL_THROUGHYEAR, VehicleItemTableMap::COL_MAKE, VehicleItemTableMap::COL_ENGINE, VehicleItemTableMap::COL_MODEL, VehicleItemTableMap::COL_SUBMODEL, VehicleItemTableMap::COL_ITEMID, VehicleItemTableMap::COL_APPLICATION, VehicleItemTableMap::COL_NOTES, VehicleItemTableMap::COL_DATE, VehicleItemTableMap::COL_TIME, ),
        self::TYPE_FIELDNAME     => array('id', 'catalog', 'fromyear', 'throughyear', 'make', 'engine', 'model', 'submodel', 'itemid', 'application', 'notes', 'date', 'time', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Catalog' => 1, 'Fromyear' => 2, 'Throughyear' => 3, 'Make' => 4, 'Engine' => 5, 'Model' => 6, 'Submodel' => 7, 'Itemid' => 8, 'Application' => 9, 'notes' => 10, 'Date' => 11, 'Time' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'catalog' => 1, 'fromyear' => 2, 'throughyear' => 3, 'make' => 4, 'engine' => 5, 'model' => 6, 'submodel' => 7, 'itemid' => 8, 'application' => 9, 'notes' => 10, 'date' => 11, 'time' => 12, ),
        self::TYPE_COLNAME       => array(VehicleItemTableMap::COL_ID => 0, VehicleItemTableMap::COL_CATALOG => 1, VehicleItemTableMap::COL_FROMYEAR => 2, VehicleItemTableMap::COL_THROUGHYEAR => 3, VehicleItemTableMap::COL_MAKE => 4, VehicleItemTableMap::COL_ENGINE => 5, VehicleItemTableMap::COL_MODEL => 6, VehicleItemTableMap::COL_SUBMODEL => 7, VehicleItemTableMap::COL_ITEMID => 8, VehicleItemTableMap::COL_APPLICATION => 9, VehicleItemTableMap::COL_NOTES => 10, VehicleItemTableMap::COL_DATE => 11, VehicleItemTableMap::COL_TIME => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'catalog' => 1, 'fromyear' => 2, 'throughyear' => 3, 'make' => 4, 'engine' => 5, 'model' => 6, 'submodel' => 7, 'itemid' => 8, 'application' => 9, 'notes' => 10, 'date' => 11, 'time' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('vehicle_catalog');
        $this->setPhpName('VehicleItem');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\VehicleItem');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 11, null);
        $this->addColumn('catalog', 'Catalog', 'VARCHAR', false, 10, null);
        $this->addColumn('fromyear', 'Fromyear', 'INTEGER', false, 4, null);
        $this->addColumn('throughyear', 'Throughyear', 'INTEGER', false, 4, null);
        $this->addColumn('make', 'Make', 'VARCHAR', false, 45, null);
        $this->addColumn('engine', 'Engine', 'INTEGER', false, 11, null);
        $this->addColumn('model', 'Model', 'VARCHAR', false, 45, null);
        $this->addColumn('submodel', 'Submodel', 'VARCHAR', false, 45, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 45, null);
        $this->addColumn('application', 'Application', 'VARCHAR', false, 45, null);
        $this->addColumn('notes', 'notes', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? VehicleItemTableMap::CLASS_DEFAULT : VehicleItemTableMap::OM_CLASS;
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
     * @return array           (VehicleItem object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = VehicleItemTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VehicleItemTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VehicleItemTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VehicleItemTableMap::OM_CLASS;
            /** @var VehicleItem $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VehicleItemTableMap::addInstanceToPool($obj, $key);
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
            $key = VehicleItemTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VehicleItemTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var VehicleItem $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VehicleItemTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(VehicleItemTableMap::COL_ID);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_CATALOG);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_FROMYEAR);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_THROUGHYEAR);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_MAKE);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_ENGINE);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_MODEL);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_SUBMODEL);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_ITEMID);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_APPLICATION);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_NOTES);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_DATE);
            $criteria->addSelectColumn(VehicleItemTableMap::COL_TIME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.catalog');
            $criteria->addSelectColumn($alias . '.fromyear');
            $criteria->addSelectColumn($alias . '.throughyear');
            $criteria->addSelectColumn($alias . '.make');
            $criteria->addSelectColumn($alias . '.engine');
            $criteria->addSelectColumn($alias . '.model');
            $criteria->addSelectColumn($alias . '.submodel');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.application');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
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
        return Propel::getServiceContainer()->getDatabaseMap(VehicleItemTableMap::DATABASE_NAME)->getTable(VehicleItemTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(VehicleItemTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(VehicleItemTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new VehicleItemTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a VehicleItem or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or VehicleItem object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(VehicleItemTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \VehicleItem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VehicleItemTableMap::DATABASE_NAME);
            $criteria->add(VehicleItemTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = VehicleItemQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VehicleItemTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VehicleItemTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the vehicle_catalog table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return VehicleItemQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a VehicleItem or Criteria object.
     *
     * @param mixed               $criteria Criteria or VehicleItem object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VehicleItemTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from VehicleItem object
        }


        // Set the correct dbName
        $query = VehicleItemQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // VehicleItemTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
VehicleItemTableMap::buildTableMap();
