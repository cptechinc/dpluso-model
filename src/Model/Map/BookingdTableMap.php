<?php

namespace Map;

use \Bookingd;
use \BookingdQuery;
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
 * This class defines the structure of the 'bookingd' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BookingdTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BookingdTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bookingd';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Bookingd';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Bookingd';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 18;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 18;

    /**
     * the column name for the bookdate field
     */
    const COL_BOOKDATE = 'bookingd.bookdate';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'bookingd.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'bookingd.shiptoid';

    /**
     * the column name for the salesorderbase field
     */
    const COL_SALESORDERBASE = 'bookingd.salesorderbase';

    /**
     * the column name for the origorderline field
     */
    const COL_ORIGORDERLINE = 'bookingd.origorderline';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'bookingd.itemid';

    /**
     * the column name for the salesordernbr field
     */
    const COL_SALESORDERNBR = 'bookingd.salesordernbr';

    /**
     * the column name for the salesperson1 field
     */
    const COL_SALESPERSON1 = 'bookingd.salesperson1';

    /**
     * the column name for the b4qty field
     */
    const COL_B4QTY = 'bookingd.b4qty';

    /**
     * the column name for the b4price field
     */
    const COL_B4PRICE = 'bookingd.b4price';

    /**
     * the column name for the b4uom field
     */
    const COL_B4UOM = 'bookingd.b4uom';

    /**
     * the column name for the afterqty field
     */
    const COL_AFTERQTY = 'bookingd.afterqty';

    /**
     * the column name for the afterprice field
     */
    const COL_AFTERPRICE = 'bookingd.afterprice';

    /**
     * the column name for the afteruom field
     */
    const COL_AFTERUOM = 'bookingd.afteruom';

    /**
     * the column name for the netamount field
     */
    const COL_NETAMOUNT = 'bookingd.netamount';

    /**
     * the column name for the createdate field
     */
    const COL_CREATEDATE = 'bookingd.createdate';

    /**
     * the column name for the createtime field
     */
    const COL_CREATETIME = 'bookingd.createtime';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'bookingd.dummy';

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
        self::TYPE_PHPNAME       => array('Bookdate', 'Custid', 'Shiptoid', 'Salesorderbase', 'Origorderline', 'Itemid', 'Salesordernbr', 'Salesperson1', 'B4qty', 'B4price', 'B4uom', 'Afterqty', 'Afterprice', 'Afteruom', 'Netamount', 'Createdate', 'Createtime', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('bookdate', 'custid', 'shiptoid', 'salesorderbase', 'origorderline', 'itemid', 'salesordernbr', 'salesperson1', 'b4qty', 'b4price', 'b4uom', 'afterqty', 'afterprice', 'afteruom', 'netamount', 'createdate', 'createtime', 'dummy', ),
        self::TYPE_COLNAME       => array(BookingdTableMap::COL_BOOKDATE, BookingdTableMap::COL_CUSTID, BookingdTableMap::COL_SHIPTOID, BookingdTableMap::COL_SALESORDERBASE, BookingdTableMap::COL_ORIGORDERLINE, BookingdTableMap::COL_ITEMID, BookingdTableMap::COL_SALESORDERNBR, BookingdTableMap::COL_SALESPERSON1, BookingdTableMap::COL_B4QTY, BookingdTableMap::COL_B4PRICE, BookingdTableMap::COL_B4UOM, BookingdTableMap::COL_AFTERQTY, BookingdTableMap::COL_AFTERPRICE, BookingdTableMap::COL_AFTERUOM, BookingdTableMap::COL_NETAMOUNT, BookingdTableMap::COL_CREATEDATE, BookingdTableMap::COL_CREATETIME, BookingdTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('bookdate', 'custid', 'shiptoid', 'salesorderbase', 'origorderline', 'itemid', 'salesordernbr', 'salesperson1', 'b4qty', 'b4price', 'b4uom', 'afterqty', 'afterprice', 'afteruom', 'netamount', 'createdate', 'createtime', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Bookdate' => 0, 'Custid' => 1, 'Shiptoid' => 2, 'Salesorderbase' => 3, 'Origorderline' => 4, 'Itemid' => 5, 'Salesordernbr' => 6, 'Salesperson1' => 7, 'B4qty' => 8, 'B4price' => 9, 'B4uom' => 10, 'Afterqty' => 11, 'Afterprice' => 12, 'Afteruom' => 13, 'Netamount' => 14, 'Createdate' => 15, 'Createtime' => 16, 'Dummy' => 17, ),
        self::TYPE_CAMELNAME     => array('bookdate' => 0, 'custid' => 1, 'shiptoid' => 2, 'salesorderbase' => 3, 'origorderline' => 4, 'itemid' => 5, 'salesordernbr' => 6, 'salesperson1' => 7, 'b4qty' => 8, 'b4price' => 9, 'b4uom' => 10, 'afterqty' => 11, 'afterprice' => 12, 'afteruom' => 13, 'netamount' => 14, 'createdate' => 15, 'createtime' => 16, 'dummy' => 17, ),
        self::TYPE_COLNAME       => array(BookingdTableMap::COL_BOOKDATE => 0, BookingdTableMap::COL_CUSTID => 1, BookingdTableMap::COL_SHIPTOID => 2, BookingdTableMap::COL_SALESORDERBASE => 3, BookingdTableMap::COL_ORIGORDERLINE => 4, BookingdTableMap::COL_ITEMID => 5, BookingdTableMap::COL_SALESORDERNBR => 6, BookingdTableMap::COL_SALESPERSON1 => 7, BookingdTableMap::COL_B4QTY => 8, BookingdTableMap::COL_B4PRICE => 9, BookingdTableMap::COL_B4UOM => 10, BookingdTableMap::COL_AFTERQTY => 11, BookingdTableMap::COL_AFTERPRICE => 12, BookingdTableMap::COL_AFTERUOM => 13, BookingdTableMap::COL_NETAMOUNT => 14, BookingdTableMap::COL_CREATEDATE => 15, BookingdTableMap::COL_CREATETIME => 16, BookingdTableMap::COL_DUMMY => 17, ),
        self::TYPE_FIELDNAME     => array('bookdate' => 0, 'custid' => 1, 'shiptoid' => 2, 'salesorderbase' => 3, 'origorderline' => 4, 'itemid' => 5, 'salesordernbr' => 6, 'salesperson1' => 7, 'b4qty' => 8, 'b4price' => 9, 'b4uom' => 10, 'afterqty' => 11, 'afterprice' => 12, 'afteruom' => 13, 'netamount' => 14, 'createdate' => 15, 'createtime' => 16, 'dummy' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $this->setName('bookingd');
        $this->setPhpName('Bookingd');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Bookingd');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('bookdate', 'Bookdate', 'VARCHAR', true, 8, null);
        $this->addPrimaryKey('custid', 'Custid', 'VARCHAR', true, 6, null);
        $this->addPrimaryKey('shiptoid', 'Shiptoid', 'VARCHAR', true, 6, null);
        $this->addPrimaryKey('salesorderbase', 'Salesorderbase', 'INTEGER', true, 8, null);
        $this->addPrimaryKey('origorderline', 'Origorderline', 'INTEGER', true, 4, null);
        $this->addPrimaryKey('itemid', 'Itemid', 'VARCHAR', true, 30, null);
        $this->addColumn('salesordernbr', 'Salesordernbr', 'INTEGER', true, 10, null);
        $this->addColumn('salesperson1', 'Salesperson1', 'VARCHAR', false, 6, null);
        $this->addColumn('b4qty', 'B4qty', 'DECIMAL', true, 9, 0);
        $this->addColumn('b4price', 'B4price', 'DECIMAL', true, 9, 0);
        $this->addColumn('b4uom', 'B4uom', 'VARCHAR', false, 4, null);
        $this->addColumn('afterqty', 'Afterqty', 'DECIMAL', true, 9, 0);
        $this->addColumn('afterprice', 'Afterprice', 'DECIMAL', true, 9, 0);
        $this->addColumn('afteruom', 'Afteruom', 'VARCHAR', false, 4, null);
        $this->addColumn('netamount', 'Netamount', 'DECIMAL', true, 9, 0);
        $this->addColumn('createdate', 'Createdate', 'VARCHAR', false, 8, null);
        $this->addColumn('createtime', 'Createtime', 'VARCHAR', false, 8, null);
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
     * @param \Bookingd $obj A \Bookingd object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getBookdate() || is_scalar($obj->getBookdate()) || is_callable([$obj->getBookdate(), '__toString']) ? (string) $obj->getBookdate() : $obj->getBookdate()), (null === $obj->getCustid() || is_scalar($obj->getCustid()) || is_callable([$obj->getCustid(), '__toString']) ? (string) $obj->getCustid() : $obj->getCustid()), (null === $obj->getShiptoid() || is_scalar($obj->getShiptoid()) || is_callable([$obj->getShiptoid(), '__toString']) ? (string) $obj->getShiptoid() : $obj->getShiptoid()), (null === $obj->getSalesorderbase() || is_scalar($obj->getSalesorderbase()) || is_callable([$obj->getSalesorderbase(), '__toString']) ? (string) $obj->getSalesorderbase() : $obj->getSalesorderbase()), (null === $obj->getOrigorderline() || is_scalar($obj->getOrigorderline()) || is_callable([$obj->getOrigorderline(), '__toString']) ? (string) $obj->getOrigorderline() : $obj->getOrigorderline()), (null === $obj->getItemid() || is_scalar($obj->getItemid()) || is_callable([$obj->getItemid(), '__toString']) ? (string) $obj->getItemid() : $obj->getItemid())]);
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
     * @param mixed $value A \Bookingd object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Bookingd) {
                $key = serialize([(null === $value->getBookdate() || is_scalar($value->getBookdate()) || is_callable([$value->getBookdate(), '__toString']) ? (string) $value->getBookdate() : $value->getBookdate()), (null === $value->getCustid() || is_scalar($value->getCustid()) || is_callable([$value->getCustid(), '__toString']) ? (string) $value->getCustid() : $value->getCustid()), (null === $value->getShiptoid() || is_scalar($value->getShiptoid()) || is_callable([$value->getShiptoid(), '__toString']) ? (string) $value->getShiptoid() : $value->getShiptoid()), (null === $value->getSalesorderbase() || is_scalar($value->getSalesorderbase()) || is_callable([$value->getSalesorderbase(), '__toString']) ? (string) $value->getSalesorderbase() : $value->getSalesorderbase()), (null === $value->getOrigorderline() || is_scalar($value->getOrigorderline()) || is_callable([$value->getOrigorderline(), '__toString']) ? (string) $value->getOrigorderline() : $value->getOrigorderline()), (null === $value->getItemid() || is_scalar($value->getItemid()) || is_callable([$value->getItemid(), '__toString']) ? (string) $value->getItemid() : $value->getItemid())]);

            } elseif (is_array($value) && count($value) === 6) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3]), (null === $value[4] || is_scalar($value[4]) || is_callable([$value[4], '__toString']) ? (string) $value[4] : $value[4]), (null === $value[5] || is_scalar($value[5]) || is_callable([$value[5], '__toString']) ? (string) $value[5] : $value[5])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Bookingd object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)
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
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('Salesorderbase', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('Origorderline', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? BookingdTableMap::CLASS_DEFAULT : BookingdTableMap::OM_CLASS;
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
     * @return array           (Bookingd object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BookingdTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookingdTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookingdTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookingdTableMap::OM_CLASS;
            /** @var Bookingd $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookingdTableMap::addInstanceToPool($obj, $key);
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
            $key = BookingdTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookingdTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Bookingd $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookingdTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BookingdTableMap::COL_BOOKDATE);
            $criteria->addSelectColumn(BookingdTableMap::COL_CUSTID);
            $criteria->addSelectColumn(BookingdTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(BookingdTableMap::COL_SALESORDERBASE);
            $criteria->addSelectColumn(BookingdTableMap::COL_ORIGORDERLINE);
            $criteria->addSelectColumn(BookingdTableMap::COL_ITEMID);
            $criteria->addSelectColumn(BookingdTableMap::COL_SALESORDERNBR);
            $criteria->addSelectColumn(BookingdTableMap::COL_SALESPERSON1);
            $criteria->addSelectColumn(BookingdTableMap::COL_B4QTY);
            $criteria->addSelectColumn(BookingdTableMap::COL_B4PRICE);
            $criteria->addSelectColumn(BookingdTableMap::COL_B4UOM);
            $criteria->addSelectColumn(BookingdTableMap::COL_AFTERQTY);
            $criteria->addSelectColumn(BookingdTableMap::COL_AFTERPRICE);
            $criteria->addSelectColumn(BookingdTableMap::COL_AFTERUOM);
            $criteria->addSelectColumn(BookingdTableMap::COL_NETAMOUNT);
            $criteria->addSelectColumn(BookingdTableMap::COL_CREATEDATE);
            $criteria->addSelectColumn(BookingdTableMap::COL_CREATETIME);
            $criteria->addSelectColumn(BookingdTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.bookdate');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.salesorderbase');
            $criteria->addSelectColumn($alias . '.origorderline');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.salesordernbr');
            $criteria->addSelectColumn($alias . '.salesperson1');
            $criteria->addSelectColumn($alias . '.b4qty');
            $criteria->addSelectColumn($alias . '.b4price');
            $criteria->addSelectColumn($alias . '.b4uom');
            $criteria->addSelectColumn($alias . '.afterqty');
            $criteria->addSelectColumn($alias . '.afterprice');
            $criteria->addSelectColumn($alias . '.afteruom');
            $criteria->addSelectColumn($alias . '.netamount');
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
        return Propel::getServiceContainer()->getDatabaseMap(BookingdTableMap::DATABASE_NAME)->getTable(BookingdTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BookingdTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BookingdTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BookingdTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Bookingd or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Bookingd object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingdTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Bookingd) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookingdTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(BookingdTableMap::COL_BOOKDATE, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(BookingdTableMap::COL_CUSTID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(BookingdTableMap::COL_SHIPTOID, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(BookingdTableMap::COL_SALESORDERBASE, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(BookingdTableMap::COL_ORIGORDERLINE, $value[4]));
                $criterion->addAnd($criteria->getNewCriterion(BookingdTableMap::COL_ITEMID, $value[5]));
                $criteria->addOr($criterion);
            }
        }

        $query = BookingdQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BookingdTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BookingdTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bookingd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BookingdQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Bookingd or Criteria object.
     *
     * @param mixed               $criteria Criteria or Bookingd object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingdTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Bookingd object
        }


        // Set the correct dbName
        $query = BookingdQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BookingdTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BookingdTableMap::buildTableMap();
