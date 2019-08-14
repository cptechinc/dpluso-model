<?php

namespace Map;

use \PickSalesOrderDetail;
use \PickSalesOrderDetailQuery;
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
 * This class defines the structure of the 'wmpickdet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PickSalesOrderDetailTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PickSalesOrderDetailTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'wmpickdet';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PickSalesOrderDetail';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PickSalesOrderDetail';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 23;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 23;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'wmpickdet.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'wmpickdet.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'wmpickdet.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'wmpickdet.time';

    /**
     * the column name for the ordernbr field
     */
    const COL_ORDERNBR = 'wmpickdet.ordernbr';

    /**
     * the column name for the linenbr field
     */
    const COL_LINENBR = 'wmpickdet.linenbr';

    /**
     * the column name for the sublinenbr field
     */
    const COL_SUBLINENBR = 'wmpickdet.sublinenbr';

    /**
     * the column name for the itemnbr field
     */
    const COL_ITEMNBR = 'wmpickdet.itemnbr';

    /**
     * the column name for the itemdesc1 field
     */
    const COL_ITEMDESC1 = 'wmpickdet.itemdesc1';

    /**
     * the column name for the itemdesc2 field
     */
    const COL_ITEMDESC2 = 'wmpickdet.itemdesc2';

    /**
     * the column name for the qtyordered field
     */
    const COL_QTYORDERED = 'wmpickdet.qtyordered';

    /**
     * the column name for the qtypulled field
     */
    const COL_QTYPULLED = 'wmpickdet.qtypulled';

    /**
     * the column name for the qtyremaining field
     */
    const COL_QTYREMAINING = 'wmpickdet.qtyremaining';

    /**
     * the column name for the binnbr field
     */
    const COL_BINNBR = 'wmpickdet.binnbr';

    /**
     * the column name for the caseqty field
     */
    const COL_CASEQTY = 'wmpickdet.caseqty';

    /**
     * the column name for the innerpack field
     */
    const COL_INNERPACK = 'wmpickdet.innerpack';

    /**
     * the column name for the binqty field
     */
    const COL_BINQTY = 'wmpickdet.binqty';

    /**
     * the column name for the overbin1 field
     */
    const COL_OVERBIN1 = 'wmpickdet.overbin1';

    /**
     * the column name for the overbinqty1 field
     */
    const COL_OVERBINQTY1 = 'wmpickdet.overbinqty1';

    /**
     * the column name for the overbin2 field
     */
    const COL_OVERBIN2 = 'wmpickdet.overbin2';

    /**
     * the column name for the overbinqty2 field
     */
    const COL_OVERBINQTY2 = 'wmpickdet.overbinqty2';

    /**
     * the column name for the statusmsg field
     */
    const COL_STATUSMSG = 'wmpickdet.statusmsg';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'wmpickdet.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Ordernbr', 'Linenbr', 'Sublinenbr', 'Itemnbr', 'Itemdesc1', 'Itemdesc2', 'Qtyordered', 'Qtypulled', 'Qtyremaining', 'Binnbr', 'Caseqty', 'Innerpack', 'Binqty', 'Overbin1', 'Overbinqty1', 'Overbin2', 'Overbinqty2', 'Statusmsg', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'ordernbr', 'linenbr', 'sublinenbr', 'itemnbr', 'itemdesc1', 'itemdesc2', 'qtyordered', 'qtypulled', 'qtyremaining', 'binnbr', 'caseqty', 'innerpack', 'binqty', 'overbin1', 'overbinqty1', 'overbin2', 'overbinqty2', 'statusmsg', 'dummy', ),
        self::TYPE_COLNAME       => array(PickSalesOrderDetailTableMap::COL_SESSIONID, PickSalesOrderDetailTableMap::COL_RECNO, PickSalesOrderDetailTableMap::COL_DATE, PickSalesOrderDetailTableMap::COL_TIME, PickSalesOrderDetailTableMap::COL_ORDERNBR, PickSalesOrderDetailTableMap::COL_LINENBR, PickSalesOrderDetailTableMap::COL_SUBLINENBR, PickSalesOrderDetailTableMap::COL_ITEMNBR, PickSalesOrderDetailTableMap::COL_ITEMDESC1, PickSalesOrderDetailTableMap::COL_ITEMDESC2, PickSalesOrderDetailTableMap::COL_QTYORDERED, PickSalesOrderDetailTableMap::COL_QTYPULLED, PickSalesOrderDetailTableMap::COL_QTYREMAINING, PickSalesOrderDetailTableMap::COL_BINNBR, PickSalesOrderDetailTableMap::COL_CASEQTY, PickSalesOrderDetailTableMap::COL_INNERPACK, PickSalesOrderDetailTableMap::COL_BINQTY, PickSalesOrderDetailTableMap::COL_OVERBIN1, PickSalesOrderDetailTableMap::COL_OVERBINQTY1, PickSalesOrderDetailTableMap::COL_OVERBIN2, PickSalesOrderDetailTableMap::COL_OVERBINQTY2, PickSalesOrderDetailTableMap::COL_STATUSMSG, PickSalesOrderDetailTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'ordernbr', 'linenbr', 'sublinenbr', 'itemnbr', 'itemdesc1', 'itemdesc2', 'qtyordered', 'qtypulled', 'qtyremaining', 'binnbr', 'caseqty', 'innerpack', 'binqty', 'overbin1', 'overbinqty1', 'overbin2', 'overbinqty2', 'statusmsg', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Ordernbr' => 4, 'Linenbr' => 5, 'Sublinenbr' => 6, 'Itemnbr' => 7, 'Itemdesc1' => 8, 'Itemdesc2' => 9, 'Qtyordered' => 10, 'Qtypulled' => 11, 'Qtyremaining' => 12, 'Binnbr' => 13, 'Caseqty' => 14, 'Innerpack' => 15, 'Binqty' => 16, 'Overbin1' => 17, 'Overbinqty1' => 18, 'Overbin2' => 19, 'Overbinqty2' => 20, 'Statusmsg' => 21, 'Dummy' => 22, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'ordernbr' => 4, 'linenbr' => 5, 'sublinenbr' => 6, 'itemnbr' => 7, 'itemdesc1' => 8, 'itemdesc2' => 9, 'qtyordered' => 10, 'qtypulled' => 11, 'qtyremaining' => 12, 'binnbr' => 13, 'caseqty' => 14, 'innerpack' => 15, 'binqty' => 16, 'overbin1' => 17, 'overbinqty1' => 18, 'overbin2' => 19, 'overbinqty2' => 20, 'statusmsg' => 21, 'dummy' => 22, ),
        self::TYPE_COLNAME       => array(PickSalesOrderDetailTableMap::COL_SESSIONID => 0, PickSalesOrderDetailTableMap::COL_RECNO => 1, PickSalesOrderDetailTableMap::COL_DATE => 2, PickSalesOrderDetailTableMap::COL_TIME => 3, PickSalesOrderDetailTableMap::COL_ORDERNBR => 4, PickSalesOrderDetailTableMap::COL_LINENBR => 5, PickSalesOrderDetailTableMap::COL_SUBLINENBR => 6, PickSalesOrderDetailTableMap::COL_ITEMNBR => 7, PickSalesOrderDetailTableMap::COL_ITEMDESC1 => 8, PickSalesOrderDetailTableMap::COL_ITEMDESC2 => 9, PickSalesOrderDetailTableMap::COL_QTYORDERED => 10, PickSalesOrderDetailTableMap::COL_QTYPULLED => 11, PickSalesOrderDetailTableMap::COL_QTYREMAINING => 12, PickSalesOrderDetailTableMap::COL_BINNBR => 13, PickSalesOrderDetailTableMap::COL_CASEQTY => 14, PickSalesOrderDetailTableMap::COL_INNERPACK => 15, PickSalesOrderDetailTableMap::COL_BINQTY => 16, PickSalesOrderDetailTableMap::COL_OVERBIN1 => 17, PickSalesOrderDetailTableMap::COL_OVERBINQTY1 => 18, PickSalesOrderDetailTableMap::COL_OVERBIN2 => 19, PickSalesOrderDetailTableMap::COL_OVERBINQTY2 => 20, PickSalesOrderDetailTableMap::COL_STATUSMSG => 21, PickSalesOrderDetailTableMap::COL_DUMMY => 22, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'ordernbr' => 4, 'linenbr' => 5, 'sublinenbr' => 6, 'itemnbr' => 7, 'itemdesc1' => 8, 'itemdesc2' => 9, 'qtyordered' => 10, 'qtypulled' => 11, 'qtyremaining' => 12, 'binnbr' => 13, 'caseqty' => 14, 'innerpack' => 15, 'binqty' => 16, 'overbin1' => 17, 'overbinqty1' => 18, 'overbin2' => 19, 'overbinqty2' => 20, 'statusmsg' => 21, 'dummy' => 22, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
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
        $this->setName('wmpickdet');
        $this->setPhpName('PickSalesOrderDetail');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\PickSalesOrderDetail');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 30, '');
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, 0);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('ordernbr', 'Ordernbr', 'VARCHAR', false, 10, null);
        $this->addColumn('linenbr', 'Linenbr', 'INTEGER', true, 4, null);
        $this->addColumn('sublinenbr', 'Sublinenbr', 'INTEGER', true, 4, null);
        $this->addColumn('itemnbr', 'Itemnbr', 'VARCHAR', false, 30, null);
        $this->addColumn('itemdesc1', 'Itemdesc1', 'VARCHAR', false, 35, null);
        $this->addColumn('itemdesc2', 'Itemdesc2', 'VARCHAR', false, 35, null);
        $this->addColumn('qtyordered', 'Qtyordered', 'INTEGER', false, 12, null);
        $this->addColumn('qtypulled', 'Qtypulled', 'INTEGER', false, 12, null);
        $this->addColumn('qtyremaining', 'Qtyremaining', 'INTEGER', false, 12, null);
        $this->addColumn('binnbr', 'Binnbr', 'VARCHAR', false, 8, null);
        $this->addColumn('caseqty', 'Caseqty', 'INTEGER', true, 8, null);
        $this->addColumn('innerpack', 'Innerpack', 'INTEGER', true, 8, null);
        $this->addColumn('binqty', 'Binqty', 'INTEGER', false, 9, null);
        $this->addColumn('overbin1', 'Overbin1', 'VARCHAR', false, 8, null);
        $this->addColumn('overbinqty1', 'Overbinqty1', 'INTEGER', false, 9, null);
        $this->addColumn('overbin2', 'Overbin2', 'VARCHAR', false, 8, null);
        $this->addColumn('overbinqty2', 'Overbinqty2', 'INTEGER', false, 9, null);
        $this->addColumn('statusmsg', 'Statusmsg', 'VARCHAR', false, 50, null);
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
     * @param \PickSalesOrderDetail $obj A \PickSalesOrderDetail object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno())]);
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
     * @param mixed $value A \PickSalesOrderDetail object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \PickSalesOrderDetail) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \PickSalesOrderDetail object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)])]);
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
        return $withPrefix ? PickSalesOrderDetailTableMap::CLASS_DEFAULT : PickSalesOrderDetailTableMap::OM_CLASS;
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
     * @return array           (PickSalesOrderDetail object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PickSalesOrderDetailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PickSalesOrderDetailTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PickSalesOrderDetailTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PickSalesOrderDetailTableMap::OM_CLASS;
            /** @var PickSalesOrderDetail $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PickSalesOrderDetailTableMap::addInstanceToPool($obj, $key);
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
            $key = PickSalesOrderDetailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PickSalesOrderDetailTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PickSalesOrderDetail $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PickSalesOrderDetailTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_RECNO);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_DATE);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_TIME);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_ORDERNBR);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_LINENBR);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_SUBLINENBR);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_ITEMNBR);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_ITEMDESC1);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_ITEMDESC2);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_QTYORDERED);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_QTYPULLED);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_QTYREMAINING);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_BINNBR);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_CASEQTY);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_INNERPACK);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_BINQTY);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_OVERBIN1);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_OVERBINQTY1);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_OVERBIN2);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_OVERBINQTY2);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_STATUSMSG);
            $criteria->addSelectColumn(PickSalesOrderDetailTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.ordernbr');
            $criteria->addSelectColumn($alias . '.linenbr');
            $criteria->addSelectColumn($alias . '.sublinenbr');
            $criteria->addSelectColumn($alias . '.itemnbr');
            $criteria->addSelectColumn($alias . '.itemdesc1');
            $criteria->addSelectColumn($alias . '.itemdesc2');
            $criteria->addSelectColumn($alias . '.qtyordered');
            $criteria->addSelectColumn($alias . '.qtypulled');
            $criteria->addSelectColumn($alias . '.qtyremaining');
            $criteria->addSelectColumn($alias . '.binnbr');
            $criteria->addSelectColumn($alias . '.caseqty');
            $criteria->addSelectColumn($alias . '.innerpack');
            $criteria->addSelectColumn($alias . '.binqty');
            $criteria->addSelectColumn($alias . '.overbin1');
            $criteria->addSelectColumn($alias . '.overbinqty1');
            $criteria->addSelectColumn($alias . '.overbin2');
            $criteria->addSelectColumn($alias . '.overbinqty2');
            $criteria->addSelectColumn($alias . '.statusmsg');
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
        return Propel::getServiceContainer()->getDatabaseMap(PickSalesOrderDetailTableMap::DATABASE_NAME)->getTable(PickSalesOrderDetailTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PickSalesOrderDetailTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PickSalesOrderDetailTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PickSalesOrderDetailTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PickSalesOrderDetail or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PickSalesOrderDetail object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PickSalesOrderDetail) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PickSalesOrderDetailTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(PickSalesOrderDetailTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(PickSalesOrderDetailTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = PickSalesOrderDetailQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PickSalesOrderDetailTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PickSalesOrderDetailTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the wmpickdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PickSalesOrderDetailQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PickSalesOrderDetail or Criteria object.
     *
     * @param mixed               $criteria Criteria or PickSalesOrderDetail object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PickSalesOrderDetail object
        }


        // Set the correct dbName
        $query = PickSalesOrderDetailQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PickSalesOrderDetailTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PickSalesOrderDetailTableMap::buildTableMap();
