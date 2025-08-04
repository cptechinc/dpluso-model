<?php

namespace Map;

use \Whsesession;
use \WhsesessionQuery;
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
 * This class defines the structure of the 'whsesession' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class WhsesessionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.WhsesessionTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'whsesession';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Whsesession';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Whsesession';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Whsesession';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'whsesession.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'whsesession.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'whsesession.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'whsesession.time';

    /**
     * the column name for the loginid field
     */
    public const COL_LOGINID = 'whsesession.loginid';

    /**
     * the column name for the whseid field
     */
    public const COL_WHSEID = 'whsesession.whseid';

    /**
     * the column name for the ordernbr field
     */
    public const COL_ORDERNBR = 'whsesession.ordernbr';

    /**
     * the column name for the binnbr field
     */
    public const COL_BINNBR = 'whsesession.binnbr';

    /**
     * the column name for the palletnbr field
     */
    public const COL_PALLETNBR = 'whsesession.palletnbr';

    /**
     * the column name for the cartonnbr field
     */
    public const COL_CARTONNBR = 'whsesession.cartonnbr';

    /**
     * the column name for the status field
     */
    public const COL_STATUS = 'whsesession.status';

    /**
     * the column name for the function field
     */
    public const COL_FUNCTION = 'whsesession.function';

    /**
     * the column name for the promptfunction field
     */
    public const COL_PROMPTFUNCTION = 'whsesession.promptfunction';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'whsesession.dummy';

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
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Loginid', 'Whseid', 'Ordernbr', 'Binnbr', 'Palletnbr', 'Cartonnbr', 'Status', 'Function', 'Promptfunction', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'loginid', 'whseid', 'ordernbr', 'binnbr', 'palletnbr', 'cartonnbr', 'status', 'function', 'promptfunction', 'dummy', ],
        self::TYPE_COLNAME       => [WhsesessionTableMap::COL_SESSIONID, WhsesessionTableMap::COL_RECNO, WhsesessionTableMap::COL_DATE, WhsesessionTableMap::COL_TIME, WhsesessionTableMap::COL_LOGINID, WhsesessionTableMap::COL_WHSEID, WhsesessionTableMap::COL_ORDERNBR, WhsesessionTableMap::COL_BINNBR, WhsesessionTableMap::COL_PALLETNBR, WhsesessionTableMap::COL_CARTONNBR, WhsesessionTableMap::COL_STATUS, WhsesessionTableMap::COL_FUNCTION, WhsesessionTableMap::COL_PROMPTFUNCTION, WhsesessionTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'loginid', 'whseid', 'ordernbr', 'binnbr', 'palletnbr', 'cartonnbr', 'status', 'function', 'promptfunction', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, ]
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
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Loginid' => 4, 'Whseid' => 5, 'Ordernbr' => 6, 'Binnbr' => 7, 'Palletnbr' => 8, 'Cartonnbr' => 9, 'Status' => 10, 'Function' => 11, 'Promptfunction' => 12, 'Dummy' => 13, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'loginid' => 4, 'whseid' => 5, 'ordernbr' => 6, 'binnbr' => 7, 'palletnbr' => 8, 'cartonnbr' => 9, 'status' => 10, 'function' => 11, 'promptfunction' => 12, 'dummy' => 13, ],
        self::TYPE_COLNAME       => [WhsesessionTableMap::COL_SESSIONID => 0, WhsesessionTableMap::COL_RECNO => 1, WhsesessionTableMap::COL_DATE => 2, WhsesessionTableMap::COL_TIME => 3, WhsesessionTableMap::COL_LOGINID => 4, WhsesessionTableMap::COL_WHSEID => 5, WhsesessionTableMap::COL_ORDERNBR => 6, WhsesessionTableMap::COL_BINNBR => 7, WhsesessionTableMap::COL_PALLETNBR => 8, WhsesessionTableMap::COL_CARTONNBR => 9, WhsesessionTableMap::COL_STATUS => 10, WhsesessionTableMap::COL_FUNCTION => 11, WhsesessionTableMap::COL_PROMPTFUNCTION => 12, WhsesessionTableMap::COL_DUMMY => 13, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'loginid' => 4, 'whseid' => 5, 'ordernbr' => 6, 'binnbr' => 7, 'palletnbr' => 8, 'cartonnbr' => 9, 'status' => 10, 'function' => 11, 'promptfunction' => 12, 'dummy' => 13, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Whsesession.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'whsesession.sessionid' => 'SESSIONID',
        'WhsesessionTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Whsesession.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'whsesession.recno' => 'RECNO',
        'WhsesessionTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Whsesession.Date' => 'DATE',
        'date' => 'DATE',
        'whsesession.date' => 'DATE',
        'WhsesessionTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Whsesession.Time' => 'TIME',
        'time' => 'TIME',
        'whsesession.time' => 'TIME',
        'WhsesessionTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Loginid' => 'LOGINID',
        'Whsesession.Loginid' => 'LOGINID',
        'loginid' => 'LOGINID',
        'whsesession.loginid' => 'LOGINID',
        'WhsesessionTableMap::COL_LOGINID' => 'LOGINID',
        'COL_LOGINID' => 'LOGINID',
        'Whseid' => 'WHSEID',
        'Whsesession.Whseid' => 'WHSEID',
        'whseid' => 'WHSEID',
        'whsesession.whseid' => 'WHSEID',
        'WhsesessionTableMap::COL_WHSEID' => 'WHSEID',
        'COL_WHSEID' => 'WHSEID',
        'Ordernbr' => 'ORDERNBR',
        'Whsesession.Ordernbr' => 'ORDERNBR',
        'ordernbr' => 'ORDERNBR',
        'whsesession.ordernbr' => 'ORDERNBR',
        'WhsesessionTableMap::COL_ORDERNBR' => 'ORDERNBR',
        'COL_ORDERNBR' => 'ORDERNBR',
        'Binnbr' => 'BINNBR',
        'Whsesession.Binnbr' => 'BINNBR',
        'binnbr' => 'BINNBR',
        'whsesession.binnbr' => 'BINNBR',
        'WhsesessionTableMap::COL_BINNBR' => 'BINNBR',
        'COL_BINNBR' => 'BINNBR',
        'Palletnbr' => 'PALLETNBR',
        'Whsesession.Palletnbr' => 'PALLETNBR',
        'palletnbr' => 'PALLETNBR',
        'whsesession.palletnbr' => 'PALLETNBR',
        'WhsesessionTableMap::COL_PALLETNBR' => 'PALLETNBR',
        'COL_PALLETNBR' => 'PALLETNBR',
        'Cartonnbr' => 'CARTONNBR',
        'Whsesession.Cartonnbr' => 'CARTONNBR',
        'cartonnbr' => 'CARTONNBR',
        'whsesession.cartonnbr' => 'CARTONNBR',
        'WhsesessionTableMap::COL_CARTONNBR' => 'CARTONNBR',
        'COL_CARTONNBR' => 'CARTONNBR',
        'Status' => 'STATUS',
        'Whsesession.Status' => 'STATUS',
        'status' => 'STATUS',
        'whsesession.status' => 'STATUS',
        'WhsesessionTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
        'Function' => 'FUNCTION',
        'Whsesession.Function' => 'FUNCTION',
        'function' => 'FUNCTION',
        'whsesession.function' => 'FUNCTION',
        'WhsesessionTableMap::COL_FUNCTION' => 'FUNCTION',
        'COL_FUNCTION' => 'FUNCTION',
        'Promptfunction' => 'PROMPTFUNCTION',
        'Whsesession.Promptfunction' => 'PROMPTFUNCTION',
        'promptfunction' => 'PROMPTFUNCTION',
        'whsesession.promptfunction' => 'PROMPTFUNCTION',
        'WhsesessionTableMap::COL_PROMPTFUNCTION' => 'PROMPTFUNCTION',
        'COL_PROMPTFUNCTION' => 'PROMPTFUNCTION',
        'Dummy' => 'DUMMY',
        'Whsesession.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'whsesession.dummy' => 'DUMMY',
        'WhsesessionTableMap::COL_DUMMY' => 'DUMMY',
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
        $this->setName('whsesession');
        $this->setPhpName('Whsesession');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Whsesession');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 30, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('loginid', 'Loginid', 'VARCHAR', false, 12, null);
        $this->addColumn('whseid', 'Whseid', 'VARCHAR', false, 2, null);
        $this->addColumn('ordernbr', 'Ordernbr', 'VARCHAR', false, 10, null);
        $this->addColumn('binnbr', 'Binnbr', 'VARCHAR', false, 8, null);
        $this->addColumn('palletnbr', 'Palletnbr', 'INTEGER', false, 4, null);
        $this->addColumn('cartonnbr', 'Cartonnbr', 'INTEGER', false, 4, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 40, null);
        $this->addColumn('function', 'Function', 'VARCHAR', false, 12, null);
        $this->addColumn('promptfunction', 'Promptfunction', 'VARCHAR', false, 1, null);
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
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Whsesession $obj A \Whsesession object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Whsesession $obj, ?string $key = null): void
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
     * @param mixed $value A \Whsesession object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Whsesession) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Whsesession object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
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
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? WhsesessionTableMap::CLASS_DEFAULT : WhsesessionTableMap::OM_CLASS;
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
     * @return array (Whsesession object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = WhsesessionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WhsesessionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WhsesessionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WhsesessionTableMap::OM_CLASS;
            /** @var Whsesession $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WhsesessionTableMap::addInstanceToPool($obj, $key);
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
            $key = WhsesessionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WhsesessionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Whsesession $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WhsesessionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WhsesessionTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_RECNO);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_DATE);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_TIME);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_LOGINID);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_WHSEID);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_ORDERNBR);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_BINNBR);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_PALLETNBR);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_CARTONNBR);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_STATUS);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_FUNCTION);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_PROMPTFUNCTION);
            $criteria->addSelectColumn(WhsesessionTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.loginid');
            $criteria->addSelectColumn($alias . '.whseid');
            $criteria->addSelectColumn($alias . '.ordernbr');
            $criteria->addSelectColumn($alias . '.binnbr');
            $criteria->addSelectColumn($alias . '.palletnbr');
            $criteria->addSelectColumn($alias . '.cartonnbr');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.function');
            $criteria->addSelectColumn($alias . '.promptfunction');
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
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_RECNO);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_DATE);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_TIME);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_LOGINID);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_WHSEID);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_ORDERNBR);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_BINNBR);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_PALLETNBR);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_CARTONNBR);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_STATUS);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_FUNCTION);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_PROMPTFUNCTION);
            $criteria->removeSelectColumn(WhsesessionTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.loginid');
            $criteria->removeSelectColumn($alias . '.whseid');
            $criteria->removeSelectColumn($alias . '.ordernbr');
            $criteria->removeSelectColumn($alias . '.binnbr');
            $criteria->removeSelectColumn($alias . '.palletnbr');
            $criteria->removeSelectColumn($alias . '.cartonnbr');
            $criteria->removeSelectColumn($alias . '.status');
            $criteria->removeSelectColumn($alias . '.function');
            $criteria->removeSelectColumn($alias . '.promptfunction');
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
        return Propel::getServiceContainer()->getDatabaseMap(WhsesessionTableMap::DATABASE_NAME)->getTable(WhsesessionTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Whsesession or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Whsesession object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WhsesessionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Whsesession) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WhsesessionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(WhsesessionTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(WhsesessionTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = WhsesessionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WhsesessionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WhsesessionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the whsesession table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return WhsesessionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Whsesession or Criteria object.
     *
     * @param mixed $criteria Criteria or Whsesession object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhsesessionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Whsesession object
        }


        // Set the correct dbName
        $query = WhsesessionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
