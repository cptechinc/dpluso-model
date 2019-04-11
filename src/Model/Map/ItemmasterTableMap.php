<?php

namespace Map;

use \Itemmaster;
use \ItemmasterQuery;
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
 * This class defines the structure of the 'itemmaster' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ItemmasterTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ItemmasterTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'itemmaster';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Itemmaster';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Itemmaster';

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
     * the column name for the itemid field
     */
    const COL_ITEMID = 'itemmaster.itemid';

    /**
     * the column name for the name1 field
     */
    const COL_NAME1 = 'itemmaster.name1';

    /**
     * the column name for the name2 field
     */
    const COL_NAME2 = 'itemmaster.name2';

    /**
     * the column name for the shortdesc field
     */
    const COL_SHORTDESC = 'itemmaster.shortdesc';

    /**
     * the column name for the familyid field
     */
    const COL_FAMILYID = 'itemmaster.familyid';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'itemmaster.image';

    /**
     * the column name for the catagory field
     */
    const COL_CATAGORY = 'itemmaster.catagory';

    /**
     * the column name for the tview field
     */
    const COL_TVIEW = 'itemmaster.tview';

    /**
     * the column name for the itemgroup field
     */
    const COL_ITEMGROUP = 'itemmaster.itemgroup';

    /**
     * the column name for the itemtype field
     */
    const COL_ITEMTYPE = 'itemmaster.itemtype';

    /**
     * the column name for the innerpackqty field
     */
    const COL_INNERPACKQTY = 'itemmaster.innerpackqty';

    /**
     * the column name for the outerpackqty field
     */
    const COL_OUTERPACKQTY = 'itemmaster.outerpackqty';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'itemmaster.dummy';

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
        self::TYPE_PHPNAME       => array('Itemid', 'Name1', 'Name2', 'Shortdesc', 'Familyid', 'Image', 'Catagory', 'Tview', 'Itemgroup', 'Itemtype', 'Innerpackqty', 'Outerpackqty', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('itemid', 'name1', 'name2', 'shortdesc', 'familyid', 'image', 'catagory', 'tview', 'itemgroup', 'itemtype', 'innerpackqty', 'outerpackqty', 'dummy', ),
        self::TYPE_COLNAME       => array(ItemmasterTableMap::COL_ITEMID, ItemmasterTableMap::COL_NAME1, ItemmasterTableMap::COL_NAME2, ItemmasterTableMap::COL_SHORTDESC, ItemmasterTableMap::COL_FAMILYID, ItemmasterTableMap::COL_IMAGE, ItemmasterTableMap::COL_CATAGORY, ItemmasterTableMap::COL_TVIEW, ItemmasterTableMap::COL_ITEMGROUP, ItemmasterTableMap::COL_ITEMTYPE, ItemmasterTableMap::COL_INNERPACKQTY, ItemmasterTableMap::COL_OUTERPACKQTY, ItemmasterTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('itemid', 'name1', 'name2', 'shortdesc', 'familyid', 'image', 'catagory', 'tview', 'itemgroup', 'itemtype', 'innerpackqty', 'outerpackqty', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Itemid' => 0, 'Name1' => 1, 'Name2' => 2, 'Shortdesc' => 3, 'Familyid' => 4, 'Image' => 5, 'Catagory' => 6, 'Tview' => 7, 'Itemgroup' => 8, 'Itemtype' => 9, 'Innerpackqty' => 10, 'Outerpackqty' => 11, 'Dummy' => 12, ),
        self::TYPE_CAMELNAME     => array('itemid' => 0, 'name1' => 1, 'name2' => 2, 'shortdesc' => 3, 'familyid' => 4, 'image' => 5, 'catagory' => 6, 'tview' => 7, 'itemgroup' => 8, 'itemtype' => 9, 'innerpackqty' => 10, 'outerpackqty' => 11, 'dummy' => 12, ),
        self::TYPE_COLNAME       => array(ItemmasterTableMap::COL_ITEMID => 0, ItemmasterTableMap::COL_NAME1 => 1, ItemmasterTableMap::COL_NAME2 => 2, ItemmasterTableMap::COL_SHORTDESC => 3, ItemmasterTableMap::COL_FAMILYID => 4, ItemmasterTableMap::COL_IMAGE => 5, ItemmasterTableMap::COL_CATAGORY => 6, ItemmasterTableMap::COL_TVIEW => 7, ItemmasterTableMap::COL_ITEMGROUP => 8, ItemmasterTableMap::COL_ITEMTYPE => 9, ItemmasterTableMap::COL_INNERPACKQTY => 10, ItemmasterTableMap::COL_OUTERPACKQTY => 11, ItemmasterTableMap::COL_DUMMY => 12, ),
        self::TYPE_FIELDNAME     => array('itemid' => 0, 'name1' => 1, 'name2' => 2, 'shortdesc' => 3, 'familyid' => 4, 'image' => 5, 'catagory' => 6, 'tview' => 7, 'itemgroup' => 8, 'itemtype' => 9, 'innerpackqty' => 10, 'outerpackqty' => 11, 'dummy' => 12, ),
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
        $this->setName('itemmaster');
        $this->setPhpName('Itemmaster');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Itemmaster');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('itemid', 'Itemid', 'VARCHAR', true, 30, '');
        $this->addColumn('name1', 'Name1', 'VARCHAR', false, 35, null);
        $this->addColumn('name2', 'Name2', 'VARCHAR', false, 35, null);
        $this->addColumn('shortdesc', 'Shortdesc', 'VARCHAR', false, 1000, null);
        $this->addColumn('familyid', 'Familyid', 'VARCHAR', false, 30, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 30, null);
        $this->addColumn('catagory', 'Catagory', 'VARCHAR', false, 30, null);
        $this->addColumn('tview', 'Tview', 'VARCHAR', false, 100, null);
        $this->addColumn('itemgroup', 'Itemgroup', 'VARCHAR', false, 6, null);
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 1, null);
        $this->addColumn('innerpackqty', 'Innerpackqty', 'VARCHAR', false, 5, null);
        $this->addColumn('outerpackqty', 'Outerpackqty', 'VARCHAR', false, 5, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ItemmasterTableMap::CLASS_DEFAULT : ItemmasterTableMap::OM_CLASS;
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
     * @return array           (Itemmaster object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ItemmasterTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ItemmasterTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ItemmasterTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ItemmasterTableMap::OM_CLASS;
            /** @var Itemmaster $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ItemmasterTableMap::addInstanceToPool($obj, $key);
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
            $key = ItemmasterTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ItemmasterTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Itemmaster $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ItemmasterTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ItemmasterTableMap::COL_ITEMID);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_NAME1);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_NAME2);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_SHORTDESC);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_FAMILYID);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_IMAGE);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_CATAGORY);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_TVIEW);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_ITEMGROUP);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_INNERPACKQTY);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_OUTERPACKQTY);
            $criteria->addSelectColumn(ItemmasterTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.name1');
            $criteria->addSelectColumn($alias . '.name2');
            $criteria->addSelectColumn($alias . '.shortdesc');
            $criteria->addSelectColumn($alias . '.familyid');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.catagory');
            $criteria->addSelectColumn($alias . '.tview');
            $criteria->addSelectColumn($alias . '.itemgroup');
            $criteria->addSelectColumn($alias . '.itemtype');
            $criteria->addSelectColumn($alias . '.innerpackqty');
            $criteria->addSelectColumn($alias . '.outerpackqty');
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
        return Propel::getServiceContainer()->getDatabaseMap(ItemmasterTableMap::DATABASE_NAME)->getTable(ItemmasterTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ItemmasterTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ItemmasterTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ItemmasterTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Itemmaster or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Itemmaster object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemmasterTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Itemmaster) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ItemmasterTableMap::DATABASE_NAME);
            $criteria->add(ItemmasterTableMap::COL_ITEMID, (array) $values, Criteria::IN);
        }

        $query = ItemmasterQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ItemmasterTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ItemmasterTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the itemmaster table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ItemmasterQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Itemmaster or Criteria object.
     *
     * @param mixed               $criteria Criteria or Itemmaster object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemmasterTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Itemmaster object
        }


        // Set the correct dbName
        $query = ItemmasterQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ItemmasterTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ItemmasterTableMap::buildTableMap();
