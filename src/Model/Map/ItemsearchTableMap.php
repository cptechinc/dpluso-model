<?php

namespace Map;

use \Itemsearch;
use \ItemsearchQuery;
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
 * This class defines the structure of the 'itemsearch' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ItemsearchTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ItemsearchTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'itemsearch';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Itemsearch';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Itemsearch';

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
     * the column name for the recno field
     */
    const COL_RECNO = 'itemsearch.recno';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'itemsearch.itemid';

    /**
     * the column name for the origintype field
     */
    const COL_ORIGINTYPE = 'itemsearch.origintype';

    /**
     * the column name for the originid field
     */
    const COL_ORIGINID = 'itemsearch.originid';

    /**
     * the column name for the refitemid field
     */
    const COL_REFITEMID = 'itemsearch.refitemid';

    /**
     * the column name for the desc1 field
     */
    const COL_DESC1 = 'itemsearch.desc1';

    /**
     * the column name for the desc2 field
     */
    const COL_DESC2 = 'itemsearch.desc2';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'itemsearch.image';

    /**
     * the column name for the qty_percase field
     */
    const COL_QTY_PERCASE = 'itemsearch.qty_percase';

    /**
     * the column name for the create_date field
     */
    const COL_CREATE_DATE = 'itemsearch.create_date';

    /**
     * the column name for the create_time field
     */
    const COL_CREATE_TIME = 'itemsearch.create_time';

    /**
     * the column name for the itemstatus field
     */
    const COL_ITEMSTATUS = 'itemsearch.itemstatus';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'itemsearch.dummy';

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
        self::TYPE_PHPNAME       => array('Recno', 'Itemid', 'Origintype', 'Originid', 'Refitemid', 'Desc1', 'Desc2', 'Image', 'QtyPercase', 'CreateDate', 'CreateTime', 'Itemstatus', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('recno', 'itemid', 'origintype', 'originid', 'refitemid', 'desc1', 'desc2', 'image', 'qtyPercase', 'createDate', 'createTime', 'itemstatus', 'dummy', ),
        self::TYPE_COLNAME       => array(ItemsearchTableMap::COL_RECNO, ItemsearchTableMap::COL_ITEMID, ItemsearchTableMap::COL_ORIGINTYPE, ItemsearchTableMap::COL_ORIGINID, ItemsearchTableMap::COL_REFITEMID, ItemsearchTableMap::COL_DESC1, ItemsearchTableMap::COL_DESC2, ItemsearchTableMap::COL_IMAGE, ItemsearchTableMap::COL_QTY_PERCASE, ItemsearchTableMap::COL_CREATE_DATE, ItemsearchTableMap::COL_CREATE_TIME, ItemsearchTableMap::COL_ITEMSTATUS, ItemsearchTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('recno', 'itemid', 'origintype', 'originid', 'refitemid', 'desc1', 'desc2', 'image', 'qty_percase', 'create_date', 'create_time', 'itemstatus', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Recno' => 0, 'Itemid' => 1, 'Origintype' => 2, 'Originid' => 3, 'Refitemid' => 4, 'Desc1' => 5, 'Desc2' => 6, 'Image' => 7, 'QtyPercase' => 8, 'CreateDate' => 9, 'CreateTime' => 10, 'Itemstatus' => 11, 'Dummy' => 12, ),
        self::TYPE_CAMELNAME     => array('recno' => 0, 'itemid' => 1, 'origintype' => 2, 'originid' => 3, 'refitemid' => 4, 'desc1' => 5, 'desc2' => 6, 'image' => 7, 'qtyPercase' => 8, 'createDate' => 9, 'createTime' => 10, 'itemstatus' => 11, 'dummy' => 12, ),
        self::TYPE_COLNAME       => array(ItemsearchTableMap::COL_RECNO => 0, ItemsearchTableMap::COL_ITEMID => 1, ItemsearchTableMap::COL_ORIGINTYPE => 2, ItemsearchTableMap::COL_ORIGINID => 3, ItemsearchTableMap::COL_REFITEMID => 4, ItemsearchTableMap::COL_DESC1 => 5, ItemsearchTableMap::COL_DESC2 => 6, ItemsearchTableMap::COL_IMAGE => 7, ItemsearchTableMap::COL_QTY_PERCASE => 8, ItemsearchTableMap::COL_CREATE_DATE => 9, ItemsearchTableMap::COL_CREATE_TIME => 10, ItemsearchTableMap::COL_ITEMSTATUS => 11, ItemsearchTableMap::COL_DUMMY => 12, ),
        self::TYPE_FIELDNAME     => array('recno' => 0, 'itemid' => 1, 'origintype' => 2, 'originid' => 3, 'refitemid' => 4, 'desc1' => 5, 'desc2' => 6, 'image' => 7, 'qty_percase' => 8, 'create_date' => 9, 'create_time' => 10, 'itemstatus' => 11, 'dummy' => 12, ),
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
        $this->setName('itemsearch');
        $this->setPhpName('Itemsearch');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Itemsearch');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('recno', 'Recno', 'INTEGER', false, null, null);
        $this->addPrimaryKey('itemid', 'Itemid', 'VARCHAR', true, 30, '');
        $this->addPrimaryKey('origintype', 'Origintype', 'VARCHAR', true, 1, '');
        $this->addPrimaryKey('originid', 'Originid', 'VARCHAR', true, 6, '');
        $this->addPrimaryKey('refitemid', 'Refitemid', 'VARCHAR', true, 30, '');
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 35, null);
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 35, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 50, null);
        $this->addColumn('qty_percase', 'QtyPercase', 'INTEGER', false, 5, null);
        $this->addColumn('create_date', 'CreateDate', 'VARCHAR', false, 8, null);
        $this->addColumn('create_time', 'CreateTime', 'VARCHAR', false, 8, null);
        $this->addColumn('itemstatus', 'Itemstatus', 'VARCHAR', false, 1, null);
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
     * @param \Itemsearch $obj A \Itemsearch object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getItemid() || is_scalar($obj->getItemid()) || is_callable([$obj->getItemid(), '__toString']) ? (string) $obj->getItemid() : $obj->getItemid()), (null === $obj->getOrigintype() || is_scalar($obj->getOrigintype()) || is_callable([$obj->getOrigintype(), '__toString']) ? (string) $obj->getOrigintype() : $obj->getOrigintype()), (null === $obj->getOriginid() || is_scalar($obj->getOriginid()) || is_callable([$obj->getOriginid(), '__toString']) ? (string) $obj->getOriginid() : $obj->getOriginid()), (null === $obj->getRefitemid() || is_scalar($obj->getRefitemid()) || is_callable([$obj->getRefitemid(), '__toString']) ? (string) $obj->getRefitemid() : $obj->getRefitemid())]);
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
     * @param mixed $value A \Itemsearch object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Itemsearch) {
                $key = serialize([(null === $value->getItemid() || is_scalar($value->getItemid()) || is_callable([$value->getItemid(), '__toString']) ? (string) $value->getItemid() : $value->getItemid()), (null === $value->getOrigintype() || is_scalar($value->getOrigintype()) || is_callable([$value->getOrigintype(), '__toString']) ? (string) $value->getOrigintype() : $value->getOrigintype()), (null === $value->getOriginid() || is_scalar($value->getOriginid()) || is_callable([$value->getOriginid(), '__toString']) ? (string) $value->getOriginid() : $value->getOriginid()), (null === $value->getRefitemid() || is_scalar($value->getRefitemid()) || is_callable([$value->getRefitemid(), '__toString']) ? (string) $value->getRefitemid() : $value->getRefitemid())]);

            } elseif (is_array($value) && count($value) === 4) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Itemsearch object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                ? 1 + $offset
                : self::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ItemsearchTableMap::CLASS_DEFAULT : ItemsearchTableMap::OM_CLASS;
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
     * @return array           (Itemsearch object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ItemsearchTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ItemsearchTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ItemsearchTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ItemsearchTableMap::OM_CLASS;
            /** @var Itemsearch $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ItemsearchTableMap::addInstanceToPool($obj, $key);
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
            $key = ItemsearchTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ItemsearchTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Itemsearch $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ItemsearchTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ItemsearchTableMap::COL_RECNO);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_ITEMID);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_ORIGINTYPE);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_ORIGINID);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_REFITEMID);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_DESC1);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_DESC2);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_IMAGE);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_QTY_PERCASE);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_CREATE_DATE);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_CREATE_TIME);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_ITEMSTATUS);
            $criteria->addSelectColumn(ItemsearchTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.origintype');
            $criteria->addSelectColumn($alias . '.originid');
            $criteria->addSelectColumn($alias . '.refitemid');
            $criteria->addSelectColumn($alias . '.desc1');
            $criteria->addSelectColumn($alias . '.desc2');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.qty_percase');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.create_time');
            $criteria->addSelectColumn($alias . '.itemstatus');
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
        return Propel::getServiceContainer()->getDatabaseMap(ItemsearchTableMap::DATABASE_NAME)->getTable(ItemsearchTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ItemsearchTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ItemsearchTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ItemsearchTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Itemsearch or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Itemsearch object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Itemsearch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ItemsearchTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ItemsearchTableMap::COL_ITEMID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ItemsearchTableMap::COL_ORIGINTYPE, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(ItemsearchTableMap::COL_ORIGINID, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(ItemsearchTableMap::COL_REFITEMID, $value[3]));
                $criteria->addOr($criterion);
            }
        }

        $query = ItemsearchQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ItemsearchTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ItemsearchTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the itemsearch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ItemsearchQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Itemsearch or Criteria object.
     *
     * @param mixed               $criteria Criteria or Itemsearch object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Itemsearch object
        }


        // Set the correct dbName
        $query = ItemsearchQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ItemsearchTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ItemsearchTableMap::buildTableMap();
