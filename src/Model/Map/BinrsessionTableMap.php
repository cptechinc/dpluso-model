<?php

namespace Map;

use \Binrsession;
use \BinrsessionQuery;
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
 * This class defines the structure of the 'binrsession' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class BinrsessionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.BinrsessionTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'binrsession';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Binrsession';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Binrsession';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Binrsession';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'binrsession.sessionid';

    /**
     * the column name for the loginid field
     */
    public const COL_LOGINID = 'binrsession.loginid';

    /**
     * the column name for the whseid field
     */
    public const COL_WHSEID = 'binrsession.whseid';

    /**
     * the column name for the itemid field
     */
    public const COL_ITEMID = 'binrsession.itemid';

    /**
     * the column name for the itemtype field
     */
    public const COL_ITEMTYPE = 'binrsession.itemtype';

    /**
     * the column name for the lotserial field
     */
    public const COL_LOTSERIAL = 'binrsession.lotserial';

    /**
     * the column name for the frombin field
     */
    public const COL_FROMBIN = 'binrsession.frombin';

    /**
     * the column name for the frombinqty field
     */
    public const COL_FROMBINQTY = 'binrsession.frombinqty';

    /**
     * the column name for the tobin field
     */
    public const COL_TOBIN = 'binrsession.tobin';

    /**
     * the column name for the tobinqty field
     */
    public const COL_TOBINQTY = 'binrsession.tobinqty';

    /**
     * the column name for the function field
     */
    public const COL_FUNCTION = 'binrsession.function';

    /**
     * the column name for the status field
     */
    public const COL_STATUS = 'binrsession.status';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'binrsession.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'binrsession.time';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'binrsession.dummy';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Sessionid', 'Loginid', 'Whseid', 'Itemid', 'Itemtype', 'Lotserial', 'Frombin', 'Frombinqty', 'Tobin', 'Tobinqty', 'Function', 'Status', 'Date', 'Time', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'loginid', 'whseid', 'itemid', 'itemtype', 'lotserial', 'frombin', 'frombinqty', 'tobin', 'tobinqty', 'function', 'status', 'date', 'time', 'dummy', ],
        self::TYPE_COLNAME       => [BinrsessionTableMap::COL_SESSIONID, BinrsessionTableMap::COL_LOGINID, BinrsessionTableMap::COL_WHSEID, BinrsessionTableMap::COL_ITEMID, BinrsessionTableMap::COL_ITEMTYPE, BinrsessionTableMap::COL_LOTSERIAL, BinrsessionTableMap::COL_FROMBIN, BinrsessionTableMap::COL_FROMBINQTY, BinrsessionTableMap::COL_TOBIN, BinrsessionTableMap::COL_TOBINQTY, BinrsessionTableMap::COL_FUNCTION, BinrsessionTableMap::COL_STATUS, BinrsessionTableMap::COL_DATE, BinrsessionTableMap::COL_TIME, BinrsessionTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'loginid', 'whseid', 'itemid', 'itemtype', 'lotserial', 'frombin', 'frombinqty', 'tobin', 'tobinqty', 'function', 'status', 'date', 'time', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Loginid' => 1, 'Whseid' => 2, 'Itemid' => 3, 'Itemtype' => 4, 'Lotserial' => 5, 'Frombin' => 6, 'Frombinqty' => 7, 'Tobin' => 8, 'Tobinqty' => 9, 'Function' => 10, 'Status' => 11, 'Date' => 12, 'Time' => 13, 'Dummy' => 14, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'loginid' => 1, 'whseid' => 2, 'itemid' => 3, 'itemtype' => 4, 'lotserial' => 5, 'frombin' => 6, 'frombinqty' => 7, 'tobin' => 8, 'tobinqty' => 9, 'function' => 10, 'status' => 11, 'date' => 12, 'time' => 13, 'dummy' => 14, ],
        self::TYPE_COLNAME       => [BinrsessionTableMap::COL_SESSIONID => 0, BinrsessionTableMap::COL_LOGINID => 1, BinrsessionTableMap::COL_WHSEID => 2, BinrsessionTableMap::COL_ITEMID => 3, BinrsessionTableMap::COL_ITEMTYPE => 4, BinrsessionTableMap::COL_LOTSERIAL => 5, BinrsessionTableMap::COL_FROMBIN => 6, BinrsessionTableMap::COL_FROMBINQTY => 7, BinrsessionTableMap::COL_TOBIN => 8, BinrsessionTableMap::COL_TOBINQTY => 9, BinrsessionTableMap::COL_FUNCTION => 10, BinrsessionTableMap::COL_STATUS => 11, BinrsessionTableMap::COL_DATE => 12, BinrsessionTableMap::COL_TIME => 13, BinrsessionTableMap::COL_DUMMY => 14, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'loginid' => 1, 'whseid' => 2, 'itemid' => 3, 'itemtype' => 4, 'lotserial' => 5, 'frombin' => 6, 'frombinqty' => 7, 'tobin' => 8, 'tobinqty' => 9, 'function' => 10, 'status' => 11, 'date' => 12, 'time' => 13, 'dummy' => 14, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Binrsession.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'binrsession.sessionid' => 'SESSIONID',
        'BinrsessionTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Loginid' => 'LOGINID',
        'Binrsession.Loginid' => 'LOGINID',
        'loginid' => 'LOGINID',
        'binrsession.loginid' => 'LOGINID',
        'BinrsessionTableMap::COL_LOGINID' => 'LOGINID',
        'COL_LOGINID' => 'LOGINID',
        'Whseid' => 'WHSEID',
        'Binrsession.Whseid' => 'WHSEID',
        'whseid' => 'WHSEID',
        'binrsession.whseid' => 'WHSEID',
        'BinrsessionTableMap::COL_WHSEID' => 'WHSEID',
        'COL_WHSEID' => 'WHSEID',
        'Itemid' => 'ITEMID',
        'Binrsession.Itemid' => 'ITEMID',
        'itemid' => 'ITEMID',
        'binrsession.itemid' => 'ITEMID',
        'BinrsessionTableMap::COL_ITEMID' => 'ITEMID',
        'COL_ITEMID' => 'ITEMID',
        'Itemtype' => 'ITEMTYPE',
        'Binrsession.Itemtype' => 'ITEMTYPE',
        'itemtype' => 'ITEMTYPE',
        'binrsession.itemtype' => 'ITEMTYPE',
        'BinrsessionTableMap::COL_ITEMTYPE' => 'ITEMTYPE',
        'COL_ITEMTYPE' => 'ITEMTYPE',
        'Lotserial' => 'LOTSERIAL',
        'Binrsession.Lotserial' => 'LOTSERIAL',
        'lotserial' => 'LOTSERIAL',
        'binrsession.lotserial' => 'LOTSERIAL',
        'BinrsessionTableMap::COL_LOTSERIAL' => 'LOTSERIAL',
        'COL_LOTSERIAL' => 'LOTSERIAL',
        'Frombin' => 'FROMBIN',
        'Binrsession.Frombin' => 'FROMBIN',
        'frombin' => 'FROMBIN',
        'binrsession.frombin' => 'FROMBIN',
        'BinrsessionTableMap::COL_FROMBIN' => 'FROMBIN',
        'COL_FROMBIN' => 'FROMBIN',
        'Frombinqty' => 'FROMBINQTY',
        'Binrsession.Frombinqty' => 'FROMBINQTY',
        'frombinqty' => 'FROMBINQTY',
        'binrsession.frombinqty' => 'FROMBINQTY',
        'BinrsessionTableMap::COL_FROMBINQTY' => 'FROMBINQTY',
        'COL_FROMBINQTY' => 'FROMBINQTY',
        'Tobin' => 'TOBIN',
        'Binrsession.Tobin' => 'TOBIN',
        'tobin' => 'TOBIN',
        'binrsession.tobin' => 'TOBIN',
        'BinrsessionTableMap::COL_TOBIN' => 'TOBIN',
        'COL_TOBIN' => 'TOBIN',
        'Tobinqty' => 'TOBINQTY',
        'Binrsession.Tobinqty' => 'TOBINQTY',
        'tobinqty' => 'TOBINQTY',
        'binrsession.tobinqty' => 'TOBINQTY',
        'BinrsessionTableMap::COL_TOBINQTY' => 'TOBINQTY',
        'COL_TOBINQTY' => 'TOBINQTY',
        'Function' => 'FUNCTION',
        'Binrsession.Function' => 'FUNCTION',
        'function' => 'FUNCTION',
        'binrsession.function' => 'FUNCTION',
        'BinrsessionTableMap::COL_FUNCTION' => 'FUNCTION',
        'COL_FUNCTION' => 'FUNCTION',
        'Status' => 'STATUS',
        'Binrsession.Status' => 'STATUS',
        'status' => 'STATUS',
        'binrsession.status' => 'STATUS',
        'BinrsessionTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
        'Date' => 'DATE',
        'Binrsession.Date' => 'DATE',
        'date' => 'DATE',
        'binrsession.date' => 'DATE',
        'BinrsessionTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Binrsession.Time' => 'TIME',
        'time' => 'TIME',
        'binrsession.time' => 'TIME',
        'BinrsessionTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Dummy' => 'DUMMY',
        'Binrsession.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'binrsession.dummy' => 'DUMMY',
        'BinrsessionTableMap::COL_DUMMY' => 'DUMMY',
        'COL_DUMMY' => 'DUMMY',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('binrsession');
        $this->setPhpName('Binrsession');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Binrsession');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 45, null);
        $this->addColumn('loginid', 'Loginid', 'VARCHAR', false, 45, null);
        $this->addColumn('whseid', 'Whseid', 'VARCHAR', false, 2, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, null);
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 1, null);
        $this->addColumn('lotserial', 'Lotserial', 'VARCHAR', false, 45, null);
        $this->addColumn('frombin', 'Frombin', 'VARCHAR', false, 12, null);
        $this->addColumn('frombinqty', 'Frombinqty', 'INTEGER', false, null, null);
        $this->addColumn('tobin', 'Tobin', 'VARCHAR', false, 12, null);
        $this->addColumn('tobinqty', 'Tobinqty', 'INTEGER', false, null, null);
        $this->addColumn('function', 'Function', 'VARCHAR', false, 45, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 50, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
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
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
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
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? BinrsessionTableMap::CLASS_DEFAULT : BinrsessionTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Binrsession object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = BinrsessionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BinrsessionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BinrsessionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BinrsessionTableMap::OM_CLASS;
            /** @var Binrsession $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BinrsessionTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = BinrsessionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BinrsessionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Binrsession $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BinrsessionTableMap::addInstanceToPool($obj, $key);
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
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BinrsessionTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_LOGINID);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_WHSEID);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_ITEMID);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_LOTSERIAL);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_FROMBIN);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_FROMBINQTY);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_TOBIN);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_TOBINQTY);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_FUNCTION);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_STATUS);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_DATE);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_TIME);
            $criteria->addSelectColumn(BinrsessionTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.loginid');
            $criteria->addSelectColumn($alias . '.whseid');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.itemtype');
            $criteria->addSelectColumn($alias . '.lotserial');
            $criteria->addSelectColumn($alias . '.frombin');
            $criteria->addSelectColumn($alias . '.frombinqty');
            $criteria->addSelectColumn($alias . '.tobin');
            $criteria->addSelectColumn($alias . '.tobinqty');
            $criteria->addSelectColumn($alias . '.function');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_LOGINID);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_WHSEID);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_ITEMID);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_ITEMTYPE);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_LOTSERIAL);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_FROMBIN);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_FROMBINQTY);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_TOBIN);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_TOBINQTY);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_FUNCTION);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_STATUS);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_DATE);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_TIME);
            $criteria->removeSelectColumn(BinrsessionTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.loginid');
            $criteria->removeSelectColumn($alias . '.whseid');
            $criteria->removeSelectColumn($alias . '.itemid');
            $criteria->removeSelectColumn($alias . '.itemtype');
            $criteria->removeSelectColumn($alias . '.lotserial');
            $criteria->removeSelectColumn($alias . '.frombin');
            $criteria->removeSelectColumn($alias . '.frombinqty');
            $criteria->removeSelectColumn($alias . '.tobin');
            $criteria->removeSelectColumn($alias . '.tobinqty');
            $criteria->removeSelectColumn($alias . '.function');
            $criteria->removeSelectColumn($alias . '.status');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(BinrsessionTableMap::DATABASE_NAME)->getTable(BinrsessionTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Binrsession or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Binrsession object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Binrsession) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BinrsessionTableMap::DATABASE_NAME);
            $criteria->add(BinrsessionTableMap::COL_SESSIONID, (array) $values, Criteria::IN);
        }

        $query = BinrsessionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BinrsessionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BinrsessionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the binrsession table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return BinrsessionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Binrsession or Criteria object.
     *
     * @param mixed $criteria Criteria or Binrsession object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Binrsession object
        }


        // Set the correct dbName
        $query = BinrsessionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
