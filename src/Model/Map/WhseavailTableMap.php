<?php

namespace Map;

use \Whseavail;
use \WhseavailQuery;
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
 * This class defines the structure of the 'whseavail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class WhseavailTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.WhseavailTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'whseavail';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Whseavail';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Whseavail';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Whseavail';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'whseavail.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'whseavail.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'whseavail.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'whseavail.time';

    /**
     * the column name for the whsecd field
     */
    public const COL_WHSECD = 'whseavail.whsecd';

    /**
     * the column name for the whsename field
     */
    public const COL_WHSENAME = 'whseavail.whsename';

    /**
     * the column name for the itemid field
     */
    public const COL_ITEMID = 'whseavail.itemid';

    /**
     * the column name for the itemavail field
     */
    public const COL_ITEMAVAIL = 'whseavail.itemavail';

    /**
     * the column name for the itemonord field
     */
    public const COL_ITEMONORD = 'whseavail.itemonord';

    /**
     * the column name for the itemetadt field
     */
    public const COL_ITEMETADT = 'whseavail.itemetadt';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'whseavail.dummy';

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
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Whsecd', 'Whsename', 'Itemid', 'Itemavail', 'Itemonord', 'Itemetadt', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'whsecd', 'whsename', 'itemid', 'itemavail', 'itemonord', 'itemetadt', 'dummy', ],
        self::TYPE_COLNAME       => [WhseavailTableMap::COL_SESSIONID, WhseavailTableMap::COL_RECNO, WhseavailTableMap::COL_DATE, WhseavailTableMap::COL_TIME, WhseavailTableMap::COL_WHSECD, WhseavailTableMap::COL_WHSENAME, WhseavailTableMap::COL_ITEMID, WhseavailTableMap::COL_ITEMAVAIL, WhseavailTableMap::COL_ITEMONORD, WhseavailTableMap::COL_ITEMETADT, WhseavailTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'whsecd', 'whsename', 'itemid', 'itemavail', 'itemonord', 'itemetadt', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
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
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Whsecd' => 4, 'Whsename' => 5, 'Itemid' => 6, 'Itemavail' => 7, 'Itemonord' => 8, 'Itemetadt' => 9, 'Dummy' => 10, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'whsecd' => 4, 'whsename' => 5, 'itemid' => 6, 'itemavail' => 7, 'itemonord' => 8, 'itemetadt' => 9, 'dummy' => 10, ],
        self::TYPE_COLNAME       => [WhseavailTableMap::COL_SESSIONID => 0, WhseavailTableMap::COL_RECNO => 1, WhseavailTableMap::COL_DATE => 2, WhseavailTableMap::COL_TIME => 3, WhseavailTableMap::COL_WHSECD => 4, WhseavailTableMap::COL_WHSENAME => 5, WhseavailTableMap::COL_ITEMID => 6, WhseavailTableMap::COL_ITEMAVAIL => 7, WhseavailTableMap::COL_ITEMONORD => 8, WhseavailTableMap::COL_ITEMETADT => 9, WhseavailTableMap::COL_DUMMY => 10, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'whsecd' => 4, 'whsename' => 5, 'itemid' => 6, 'itemavail' => 7, 'itemonord' => 8, 'itemetadt' => 9, 'dummy' => 10, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Whseavail.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'whseavail.sessionid' => 'SESSIONID',
        'WhseavailTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Whseavail.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'whseavail.recno' => 'RECNO',
        'WhseavailTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Whseavail.Date' => 'DATE',
        'date' => 'DATE',
        'whseavail.date' => 'DATE',
        'WhseavailTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Whseavail.Time' => 'TIME',
        'time' => 'TIME',
        'whseavail.time' => 'TIME',
        'WhseavailTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Whsecd' => 'WHSECD',
        'Whseavail.Whsecd' => 'WHSECD',
        'whsecd' => 'WHSECD',
        'whseavail.whsecd' => 'WHSECD',
        'WhseavailTableMap::COL_WHSECD' => 'WHSECD',
        'COL_WHSECD' => 'WHSECD',
        'Whsename' => 'WHSENAME',
        'Whseavail.Whsename' => 'WHSENAME',
        'whsename' => 'WHSENAME',
        'whseavail.whsename' => 'WHSENAME',
        'WhseavailTableMap::COL_WHSENAME' => 'WHSENAME',
        'COL_WHSENAME' => 'WHSENAME',
        'Itemid' => 'ITEMID',
        'Whseavail.Itemid' => 'ITEMID',
        'itemid' => 'ITEMID',
        'whseavail.itemid' => 'ITEMID',
        'WhseavailTableMap::COL_ITEMID' => 'ITEMID',
        'COL_ITEMID' => 'ITEMID',
        'Itemavail' => 'ITEMAVAIL',
        'Whseavail.Itemavail' => 'ITEMAVAIL',
        'itemavail' => 'ITEMAVAIL',
        'whseavail.itemavail' => 'ITEMAVAIL',
        'WhseavailTableMap::COL_ITEMAVAIL' => 'ITEMAVAIL',
        'COL_ITEMAVAIL' => 'ITEMAVAIL',
        'Itemonord' => 'ITEMONORD',
        'Whseavail.Itemonord' => 'ITEMONORD',
        'itemonord' => 'ITEMONORD',
        'whseavail.itemonord' => 'ITEMONORD',
        'WhseavailTableMap::COL_ITEMONORD' => 'ITEMONORD',
        'COL_ITEMONORD' => 'ITEMONORD',
        'Itemetadt' => 'ITEMETADT',
        'Whseavail.Itemetadt' => 'ITEMETADT',
        'itemetadt' => 'ITEMETADT',
        'whseavail.itemetadt' => 'ITEMETADT',
        'WhseavailTableMap::COL_ITEMETADT' => 'ITEMETADT',
        'COL_ITEMETADT' => 'ITEMETADT',
        'Dummy' => 'DUMMY',
        'Whseavail.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'whseavail.dummy' => 'DUMMY',
        'WhseavailTableMap::COL_DUMMY' => 'DUMMY',
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
        $this->setName('whseavail');
        $this->setPhpName('Whseavail');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Whseavail');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 30, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('whsecd', 'Whsecd', 'VARCHAR', false, 2, null);
        $this->addColumn('whsename', 'Whsename', 'VARCHAR', false, 30, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, null);
        $this->addColumn('itemavail', 'Itemavail', 'INTEGER', false, 8, null);
        $this->addColumn('itemonord', 'Itemonord', 'INTEGER', false, 8, null);
        $this->addColumn('itemetadt', 'Itemetadt', 'VARCHAR', false, 10, null);
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
     * @param \Whseavail $obj A \Whseavail object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Whseavail $obj, ?string $key = null): void
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
     * @param mixed $value A \Whseavail object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Whseavail) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Whseavail object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? WhseavailTableMap::CLASS_DEFAULT : WhseavailTableMap::OM_CLASS;
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
     * @return array (Whseavail object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = WhseavailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WhseavailTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WhseavailTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WhseavailTableMap::OM_CLASS;
            /** @var Whseavail $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WhseavailTableMap::addInstanceToPool($obj, $key);
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
            $key = WhseavailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WhseavailTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Whseavail $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WhseavailTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WhseavailTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(WhseavailTableMap::COL_RECNO);
            $criteria->addSelectColumn(WhseavailTableMap::COL_DATE);
            $criteria->addSelectColumn(WhseavailTableMap::COL_TIME);
            $criteria->addSelectColumn(WhseavailTableMap::COL_WHSECD);
            $criteria->addSelectColumn(WhseavailTableMap::COL_WHSENAME);
            $criteria->addSelectColumn(WhseavailTableMap::COL_ITEMID);
            $criteria->addSelectColumn(WhseavailTableMap::COL_ITEMAVAIL);
            $criteria->addSelectColumn(WhseavailTableMap::COL_ITEMONORD);
            $criteria->addSelectColumn(WhseavailTableMap::COL_ITEMETADT);
            $criteria->addSelectColumn(WhseavailTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.whsecd');
            $criteria->addSelectColumn($alias . '.whsename');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.itemavail');
            $criteria->addSelectColumn($alias . '.itemonord');
            $criteria->addSelectColumn($alias . '.itemetadt');
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
            $criteria->removeSelectColumn(WhseavailTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_RECNO);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_DATE);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_TIME);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_WHSECD);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_WHSENAME);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_ITEMID);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_ITEMAVAIL);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_ITEMONORD);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_ITEMETADT);
            $criteria->removeSelectColumn(WhseavailTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.whsecd');
            $criteria->removeSelectColumn($alias . '.whsename');
            $criteria->removeSelectColumn($alias . '.itemid');
            $criteria->removeSelectColumn($alias . '.itemavail');
            $criteria->removeSelectColumn($alias . '.itemonord');
            $criteria->removeSelectColumn($alias . '.itemetadt');
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
        return Propel::getServiceContainer()->getDatabaseMap(WhseavailTableMap::DATABASE_NAME)->getTable(WhseavailTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Whseavail or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Whseavail object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseavailTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Whseavail) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WhseavailTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(WhseavailTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(WhseavailTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = WhseavailQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WhseavailTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WhseavailTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the whseavail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return WhseavailQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Whseavail or Criteria object.
     *
     * @param mixed $criteria Criteria or Whseavail object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseavailTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Whseavail object
        }


        // Set the correct dbName
        $query = WhseavailQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
