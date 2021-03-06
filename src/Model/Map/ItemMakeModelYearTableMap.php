<?php

namespace Map;

use \ItemMakeModelYear;
use \ItemMakeModelYearQuery;
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
 * This class defines the structure of the 'item_make_model' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ItemMakeModelYearTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ItemMakeModelYearTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'item_make_model';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ItemMakeModelYear';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ItemMakeModelYear';

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
     * the column name for the id field
     */
    const COL_ID = 'item_make_model.id';

    /**
     * the column name for the catalog field
     */
    const COL_CATALOG = 'item_make_model.catalog';

    /**
     * the column name for the fromyear field
     */
    const COL_FROMYEAR = 'item_make_model.fromyear';

    /**
     * the column name for the throughyear field
     */
    const COL_THROUGHYEAR = 'item_make_model.throughyear';

    /**
     * the column name for the make field
     */
    const COL_MAKE = 'item_make_model.make';

    /**
     * the column name for the engine field
     */
    const COL_ENGINE = 'item_make_model.engine';

    /**
     * the column name for the model field
     */
    const COL_MODEL = 'item_make_model.model';

    /**
     * the column name for the submodel field
     */
    const COL_SUBMODEL = 'item_make_model.submodel';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'item_make_model.itemid';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'item_make_model.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'item_make_model.time';

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
        self::TYPE_PHPNAME       => array('Id', 'Catalog', 'Fromyear', 'Throughyear', 'Make', 'Engine', 'Model', 'Submodel', 'Itemid', 'Date', 'Time', ),
        self::TYPE_CAMELNAME     => array('id', 'catalog', 'fromyear', 'throughyear', 'make', 'engine', 'model', 'submodel', 'itemid', 'date', 'time', ),
        self::TYPE_COLNAME       => array(ItemMakeModelYearTableMap::COL_ID, ItemMakeModelYearTableMap::COL_CATALOG, ItemMakeModelYearTableMap::COL_FROMYEAR, ItemMakeModelYearTableMap::COL_THROUGHYEAR, ItemMakeModelYearTableMap::COL_MAKE, ItemMakeModelYearTableMap::COL_ENGINE, ItemMakeModelYearTableMap::COL_MODEL, ItemMakeModelYearTableMap::COL_SUBMODEL, ItemMakeModelYearTableMap::COL_ITEMID, ItemMakeModelYearTableMap::COL_DATE, ItemMakeModelYearTableMap::COL_TIME, ),
        self::TYPE_FIELDNAME     => array('id', 'catalog', 'fromyear', 'throughyear', 'make', 'engine', 'model', 'submodel', 'itemid', 'date', 'time', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Catalog' => 1, 'Fromyear' => 2, 'Throughyear' => 3, 'Make' => 4, 'Engine' => 5, 'Model' => 6, 'Submodel' => 7, 'Itemid' => 8, 'Date' => 9, 'Time' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'catalog' => 1, 'fromyear' => 2, 'throughyear' => 3, 'make' => 4, 'engine' => 5, 'model' => 6, 'submodel' => 7, 'itemid' => 8, 'date' => 9, 'time' => 10, ),
        self::TYPE_COLNAME       => array(ItemMakeModelYearTableMap::COL_ID => 0, ItemMakeModelYearTableMap::COL_CATALOG => 1, ItemMakeModelYearTableMap::COL_FROMYEAR => 2, ItemMakeModelYearTableMap::COL_THROUGHYEAR => 3, ItemMakeModelYearTableMap::COL_MAKE => 4, ItemMakeModelYearTableMap::COL_ENGINE => 5, ItemMakeModelYearTableMap::COL_MODEL => 6, ItemMakeModelYearTableMap::COL_SUBMODEL => 7, ItemMakeModelYearTableMap::COL_ITEMID => 8, ItemMakeModelYearTableMap::COL_DATE => 9, ItemMakeModelYearTableMap::COL_TIME => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'catalog' => 1, 'fromyear' => 2, 'throughyear' => 3, 'make' => 4, 'engine' => 5, 'model' => 6, 'submodel' => 7, 'itemid' => 8, 'date' => 9, 'time' => 10, ),
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
        $this->setName('item_make_model');
        $this->setPhpName('ItemMakeModelYear');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ItemMakeModelYear');
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
        return $withPrefix ? ItemMakeModelYearTableMap::CLASS_DEFAULT : ItemMakeModelYearTableMap::OM_CLASS;
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
     * @return array           (ItemMakeModelYear object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ItemMakeModelYearTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ItemMakeModelYearTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ItemMakeModelYearTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ItemMakeModelYearTableMap::OM_CLASS;
            /** @var ItemMakeModelYear $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ItemMakeModelYearTableMap::addInstanceToPool($obj, $key);
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
            $key = ItemMakeModelYearTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ItemMakeModelYearTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ItemMakeModelYear $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ItemMakeModelYearTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_ID);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_CATALOG);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_FROMYEAR);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_THROUGHYEAR);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_MAKE);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_ENGINE);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_MODEL);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_SUBMODEL);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_ITEMID);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_DATE);
            $criteria->addSelectColumn(ItemMakeModelYearTableMap::COL_TIME);
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
        return Propel::getServiceContainer()->getDatabaseMap(ItemMakeModelYearTableMap::DATABASE_NAME)->getTable(ItemMakeModelYearTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ItemMakeModelYearTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ItemMakeModelYearTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ItemMakeModelYearTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ItemMakeModelYear or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ItemMakeModelYear object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemMakeModelYearTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ItemMakeModelYear) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ItemMakeModelYearTableMap::DATABASE_NAME);
            $criteria->add(ItemMakeModelYearTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ItemMakeModelYearQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ItemMakeModelYearTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ItemMakeModelYearTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the item_make_model table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ItemMakeModelYearQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ItemMakeModelYear or Criteria object.
     *
     * @param mixed               $criteria Criteria or ItemMakeModelYear object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemMakeModelYearTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ItemMakeModelYear object
        }


        // Set the correct dbName
        $query = ItemMakeModelYearQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ItemMakeModelYearTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ItemMakeModelYearTableMap::buildTableMap();
