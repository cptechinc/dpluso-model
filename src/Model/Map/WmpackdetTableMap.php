<?php

namespace Map;

use \Wmpackdet;
use \WmpackdetQuery;
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
 * This class defines the structure of the 'wmpackdet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WmpackdetTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WmpackdetTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'wmpackdet';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Wmpackdet';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Wmpackdet';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'wmpackdet.sessionid';

    /**
     * the column name for the ordernbr field
     */
    const COL_ORDERNBR = 'wmpackdet.ordernbr';

    /**
     * the column name for the linenbr field
     */
    const COL_LINENBR = 'wmpackdet.linenbr';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'wmpackdet.itemid';

    /**
     * the column name for the lotserial field
     */
    const COL_LOTSERIAL = 'wmpackdet.lotserial';

    /**
     * the column name for the desc1 field
     */
    const COL_DESC1 = 'wmpackdet.desc1';

    /**
     * the column name for the desc2 field
     */
    const COL_DESC2 = 'wmpackdet.desc2';

    /**
     * the column name for the qty_toship field
     */
    const COL_QTY_TOSHIP = 'wmpackdet.qty_toship';

    /**
     * the column name for the qty_packed field
     */
    const COL_QTY_PACKED = 'wmpackdet.qty_packed';

    /**
     * the column name for the qty_remaining field
     */
    const COL_QTY_REMAINING = 'wmpackdet.qty_remaining';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'wmpackdet.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'wmpackdet.time';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Ordernbr', 'Linenbr', 'Itemid', 'Lotserial', 'Desc1', 'Desc2', 'QtyToship', 'QtyPacked', 'QtyRemaining', 'Date', 'Time', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'ordernbr', 'linenbr', 'itemid', 'lotserial', 'desc1', 'desc2', 'qtyToship', 'qtyPacked', 'qtyRemaining', 'date', 'time', ),
        self::TYPE_COLNAME       => array(WmpackdetTableMap::COL_SESSIONID, WmpackdetTableMap::COL_ORDERNBR, WmpackdetTableMap::COL_LINENBR, WmpackdetTableMap::COL_ITEMID, WmpackdetTableMap::COL_LOTSERIAL, WmpackdetTableMap::COL_DESC1, WmpackdetTableMap::COL_DESC2, WmpackdetTableMap::COL_QTY_TOSHIP, WmpackdetTableMap::COL_QTY_PACKED, WmpackdetTableMap::COL_QTY_REMAINING, WmpackdetTableMap::COL_DATE, WmpackdetTableMap::COL_TIME, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'ordernbr', 'linenbr', 'itemid', 'lotserial', 'desc1', 'desc2', 'qty_toship', 'qty_packed', 'qty_remaining', 'date', 'time', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Ordernbr' => 1, 'Linenbr' => 2, 'Itemid' => 3, 'Lotserial' => 4, 'Desc1' => 5, 'Desc2' => 6, 'QtyToship' => 7, 'QtyPacked' => 8, 'QtyRemaining' => 9, 'Date' => 10, 'Time' => 11, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'ordernbr' => 1, 'linenbr' => 2, 'itemid' => 3, 'lotserial' => 4, 'desc1' => 5, 'desc2' => 6, 'qtyToship' => 7, 'qtyPacked' => 8, 'qtyRemaining' => 9, 'date' => 10, 'time' => 11, ),
        self::TYPE_COLNAME       => array(WmpackdetTableMap::COL_SESSIONID => 0, WmpackdetTableMap::COL_ORDERNBR => 1, WmpackdetTableMap::COL_LINENBR => 2, WmpackdetTableMap::COL_ITEMID => 3, WmpackdetTableMap::COL_LOTSERIAL => 4, WmpackdetTableMap::COL_DESC1 => 5, WmpackdetTableMap::COL_DESC2 => 6, WmpackdetTableMap::COL_QTY_TOSHIP => 7, WmpackdetTableMap::COL_QTY_PACKED => 8, WmpackdetTableMap::COL_QTY_REMAINING => 9, WmpackdetTableMap::COL_DATE => 10, WmpackdetTableMap::COL_TIME => 11, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'ordernbr' => 1, 'linenbr' => 2, 'itemid' => 3, 'lotserial' => 4, 'desc1' => 5, 'desc2' => 6, 'qty_toship' => 7, 'qty_packed' => 8, 'qty_remaining' => 9, 'date' => 10, 'time' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('wmpackdet');
        $this->setPhpName('Wmpackdet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Wmpackdet');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('ordernbr', 'Ordernbr', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('linenbr', 'Linenbr', 'INTEGER', true, 8, null);
        $this->addPrimaryKey('itemid', 'Itemid', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('lotserial', 'Lotserial', 'VARCHAR', true, 45, null);
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 45, null);
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 45, null);
        $this->addColumn('qty_toship', 'QtyToship', 'INTEGER', false, null, null);
        $this->addColumn('qty_packed', 'QtyPacked', 'INTEGER', false, null, null);
        $this->addColumn('qty_remaining', 'QtyRemaining', 'INTEGER', false, null, null);
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
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Wmpackdet $obj A \Wmpackdet object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getOrdernbr() || is_scalar($obj->getOrdernbr()) || is_callable([$obj->getOrdernbr(), '__toString']) ? (string) $obj->getOrdernbr() : $obj->getOrdernbr()), (null === $obj->getLinenbr() || is_scalar($obj->getLinenbr()) || is_callable([$obj->getLinenbr(), '__toString']) ? (string) $obj->getLinenbr() : $obj->getLinenbr()), (null === $obj->getItemid() || is_scalar($obj->getItemid()) || is_callable([$obj->getItemid(), '__toString']) ? (string) $obj->getItemid() : $obj->getItemid()), (null === $obj->getLotserial() || is_scalar($obj->getLotserial()) || is_callable([$obj->getLotserial(), '__toString']) ? (string) $obj->getLotserial() : $obj->getLotserial())]);
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
     * @param mixed $value A \Wmpackdet object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Wmpackdet) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getOrdernbr() || is_scalar($value->getOrdernbr()) || is_callable([$value->getOrdernbr(), '__toString']) ? (string) $value->getOrdernbr() : $value->getOrdernbr()), (null === $value->getLinenbr() || is_scalar($value->getLinenbr()) || is_callable([$value->getLinenbr(), '__toString']) ? (string) $value->getLinenbr() : $value->getLinenbr()), (null === $value->getItemid() || is_scalar($value->getItemid()) || is_callable([$value->getItemid(), '__toString']) ? (string) $value->getItemid() : $value->getItemid()), (null === $value->getLotserial() || is_scalar($value->getLotserial()) || is_callable([$value->getLotserial(), '__toString']) ? (string) $value->getLotserial() : $value->getLotserial())]);

            } elseif (is_array($value) && count($value) === 5) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3]), (null === $value[4] || is_scalar($value[4]) || is_callable([$value[4], '__toString']) ? (string) $value[4] : $value[4])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Wmpackdet object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)])]);
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
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? WmpackdetTableMap::CLASS_DEFAULT : WmpackdetTableMap::OM_CLASS;
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
     * @return array           (Wmpackdet object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WmpackdetTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WmpackdetTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WmpackdetTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WmpackdetTableMap::OM_CLASS;
            /** @var Wmpackdet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WmpackdetTableMap::addInstanceToPool($obj, $key);
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
            $key = WmpackdetTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WmpackdetTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Wmpackdet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WmpackdetTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WmpackdetTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_ORDERNBR);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_LINENBR);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_ITEMID);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_LOTSERIAL);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_DESC1);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_DESC2);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_QTY_TOSHIP);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_QTY_PACKED);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_QTY_REMAINING);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_DATE);
            $criteria->addSelectColumn(WmpackdetTableMap::COL_TIME);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.ordernbr');
            $criteria->addSelectColumn($alias . '.linenbr');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.lotserial');
            $criteria->addSelectColumn($alias . '.desc1');
            $criteria->addSelectColumn($alias . '.desc2');
            $criteria->addSelectColumn($alias . '.qty_toship');
            $criteria->addSelectColumn($alias . '.qty_packed');
            $criteria->addSelectColumn($alias . '.qty_remaining');
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
        return Propel::getServiceContainer()->getDatabaseMap(WmpackdetTableMap::DATABASE_NAME)->getTable(WmpackdetTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WmpackdetTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WmpackdetTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WmpackdetTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Wmpackdet or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Wmpackdet object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WmpackdetTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Wmpackdet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WmpackdetTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(WmpackdetTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(WmpackdetTableMap::COL_ORDERNBR, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(WmpackdetTableMap::COL_LINENBR, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(WmpackdetTableMap::COL_ITEMID, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(WmpackdetTableMap::COL_LOTSERIAL, $value[4]));
                $criteria->addOr($criterion);
            }
        }

        $query = WmpackdetQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WmpackdetTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WmpackdetTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the wmpackdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WmpackdetQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Wmpackdet or Criteria object.
     *
     * @param mixed               $criteria Criteria or Wmpackdet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WmpackdetTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Wmpackdet object
        }


        // Set the correct dbName
        $query = WmpackdetQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WmpackdetTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WmpackdetTableMap::buildTableMap();
