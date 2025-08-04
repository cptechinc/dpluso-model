<?php

namespace Map;

use \Bookingc;
use \BookingcQuery;
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
 * This class defines the structure of the 'bookingc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class BookingcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.BookingcTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'bookingc';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Bookingc';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Bookingc';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Bookingc';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the custid field
     */
    public const COL_CUSTID = 'bookingc.custid';

    /**
     * the column name for the shiptoid field
     */
    public const COL_SHIPTOID = 'bookingc.shiptoid';

    /**
     * the column name for the bookdate field
     */
    public const COL_BOOKDATE = 'bookingc.bookdate';

    /**
     * the column name for the salesrep field
     */
    public const COL_SALESREP = 'bookingc.salesrep';

    /**
     * the column name for the amount field
     */
    public const COL_AMOUNT = 'bookingc.amount';

    /**
     * the column name for the dateupdated field
     */
    public const COL_DATEUPDATED = 'bookingc.dateupdated';

    /**
     * the column name for the timeupdated field
     */
    public const COL_TIMEUPDATED = 'bookingc.timeupdated';

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
        self::TYPE_PHPNAME       => ['Custid', 'Shiptoid', 'Bookdate', 'Salesrep', 'Amount', 'Dateupdated', 'Timeupdated', ],
        self::TYPE_CAMELNAME     => ['custid', 'shiptoid', 'bookdate', 'salesrep', 'amount', 'dateupdated', 'timeupdated', ],
        self::TYPE_COLNAME       => [BookingcTableMap::COL_CUSTID, BookingcTableMap::COL_SHIPTOID, BookingcTableMap::COL_BOOKDATE, BookingcTableMap::COL_SALESREP, BookingcTableMap::COL_AMOUNT, BookingcTableMap::COL_DATEUPDATED, BookingcTableMap::COL_TIMEUPDATED, ],
        self::TYPE_FIELDNAME     => ['custid', 'shiptoid', 'bookdate', 'salesrep', 'amount', 'dateupdated', 'timeupdated', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
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
        self::TYPE_PHPNAME       => ['Custid' => 0, 'Shiptoid' => 1, 'Bookdate' => 2, 'Salesrep' => 3, 'Amount' => 4, 'Dateupdated' => 5, 'Timeupdated' => 6, ],
        self::TYPE_CAMELNAME     => ['custid' => 0, 'shiptoid' => 1, 'bookdate' => 2, 'salesrep' => 3, 'amount' => 4, 'dateupdated' => 5, 'timeupdated' => 6, ],
        self::TYPE_COLNAME       => [BookingcTableMap::COL_CUSTID => 0, BookingcTableMap::COL_SHIPTOID => 1, BookingcTableMap::COL_BOOKDATE => 2, BookingcTableMap::COL_SALESREP => 3, BookingcTableMap::COL_AMOUNT => 4, BookingcTableMap::COL_DATEUPDATED => 5, BookingcTableMap::COL_TIMEUPDATED => 6, ],
        self::TYPE_FIELDNAME     => ['custid' => 0, 'shiptoid' => 1, 'bookdate' => 2, 'salesrep' => 3, 'amount' => 4, 'dateupdated' => 5, 'timeupdated' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Custid' => 'CUSTID',
        'Bookingc.Custid' => 'CUSTID',
        'custid' => 'CUSTID',
        'bookingc.custid' => 'CUSTID',
        'BookingcTableMap::COL_CUSTID' => 'CUSTID',
        'COL_CUSTID' => 'CUSTID',
        'Shiptoid' => 'SHIPTOID',
        'Bookingc.Shiptoid' => 'SHIPTOID',
        'shiptoid' => 'SHIPTOID',
        'bookingc.shiptoid' => 'SHIPTOID',
        'BookingcTableMap::COL_SHIPTOID' => 'SHIPTOID',
        'COL_SHIPTOID' => 'SHIPTOID',
        'Bookdate' => 'BOOKDATE',
        'Bookingc.Bookdate' => 'BOOKDATE',
        'bookdate' => 'BOOKDATE',
        'bookingc.bookdate' => 'BOOKDATE',
        'BookingcTableMap::COL_BOOKDATE' => 'BOOKDATE',
        'COL_BOOKDATE' => 'BOOKDATE',
        'Salesrep' => 'SALESREP',
        'Bookingc.Salesrep' => 'SALESREP',
        'salesrep' => 'SALESREP',
        'bookingc.salesrep' => 'SALESREP',
        'BookingcTableMap::COL_SALESREP' => 'SALESREP',
        'COL_SALESREP' => 'SALESREP',
        'Amount' => 'AMOUNT',
        'Bookingc.Amount' => 'AMOUNT',
        'amount' => 'AMOUNT',
        'bookingc.amount' => 'AMOUNT',
        'BookingcTableMap::COL_AMOUNT' => 'AMOUNT',
        'COL_AMOUNT' => 'AMOUNT',
        'Dateupdated' => 'DATEUPDATED',
        'Bookingc.Dateupdated' => 'DATEUPDATED',
        'dateupdated' => 'DATEUPDATED',
        'bookingc.dateupdated' => 'DATEUPDATED',
        'BookingcTableMap::COL_DATEUPDATED' => 'DATEUPDATED',
        'COL_DATEUPDATED' => 'DATEUPDATED',
        'Timeupdated' => 'TIMEUPDATED',
        'Bookingc.Timeupdated' => 'TIMEUPDATED',
        'timeupdated' => 'TIMEUPDATED',
        'bookingc.timeupdated' => 'TIMEUPDATED',
        'BookingcTableMap::COL_TIMEUPDATED' => 'TIMEUPDATED',
        'COL_TIMEUPDATED' => 'TIMEUPDATED',
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
        $this->setName('bookingc');
        $this->setPhpName('Bookingc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Bookingc');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('custid', 'Custid', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('shiptoid', 'Shiptoid', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('bookdate', 'Bookdate', 'INTEGER', true, 8, null);
        $this->addPrimaryKey('salesrep', 'Salesrep', 'VARCHAR', true, 45, null);
        $this->addColumn('amount', 'Amount', 'DECIMAL', false, 10, null);
        $this->addColumn('dateupdated', 'Dateupdated', 'INTEGER', false, 8, null);
        $this->addColumn('timeupdated', 'Timeupdated', 'VARCHAR', false, 8, null);
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
     * @param \Bookingc $obj A \Bookingc object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Bookingc $obj, ?string $key = null): void
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getCustid() || is_scalar($obj->getCustid()) || is_callable([$obj->getCustid(), '__toString']) ? (string) $obj->getCustid() : $obj->getCustid()), (null === $obj->getShiptoid() || is_scalar($obj->getShiptoid()) || is_callable([$obj->getShiptoid(), '__toString']) ? (string) $obj->getShiptoid() : $obj->getShiptoid()), (null === $obj->getBookdate() || is_scalar($obj->getBookdate()) || is_callable([$obj->getBookdate(), '__toString']) ? (string) $obj->getBookdate() : $obj->getBookdate()), (null === $obj->getSalesrep() || is_scalar($obj->getSalesrep()) || is_callable([$obj->getSalesrep(), '__toString']) ? (string) $obj->getSalesrep() : $obj->getSalesrep())]);
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
     * @param mixed $value A \Bookingc object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Bookingc) {
                $key = serialize([(null === $value->getCustid() || is_scalar($value->getCustid()) || is_callable([$value->getCustid(), '__toString']) ? (string) $value->getCustid() : $value->getCustid()), (null === $value->getShiptoid() || is_scalar($value->getShiptoid()) || is_callable([$value->getShiptoid(), '__toString']) ? (string) $value->getShiptoid() : $value->getShiptoid()), (null === $value->getBookdate() || is_scalar($value->getBookdate()) || is_callable([$value->getBookdate(), '__toString']) ? (string) $value->getBookdate() : $value->getBookdate()), (null === $value->getSalesrep() || is_scalar($value->getSalesrep()) || is_callable([$value->getSalesrep(), '__toString']) ? (string) $value->getSalesrep() : $value->getSalesrep())]);

            } elseif (is_array($value) && count($value) === 4) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Bookingc object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? BookingcTableMap::CLASS_DEFAULT : BookingcTableMap::OM_CLASS;
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
     * @return array (Bookingc object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = BookingcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookingcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookingcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookingcTableMap::OM_CLASS;
            /** @var Bookingc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookingcTableMap::addInstanceToPool($obj, $key);
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
            $key = BookingcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookingcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Bookingc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookingcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BookingcTableMap::COL_CUSTID);
            $criteria->addSelectColumn(BookingcTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(BookingcTableMap::COL_BOOKDATE);
            $criteria->addSelectColumn(BookingcTableMap::COL_SALESREP);
            $criteria->addSelectColumn(BookingcTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(BookingcTableMap::COL_DATEUPDATED);
            $criteria->addSelectColumn(BookingcTableMap::COL_TIMEUPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.bookdate');
            $criteria->addSelectColumn($alias . '.salesrep');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.dateupdated');
            $criteria->addSelectColumn($alias . '.timeupdated');
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
            $criteria->removeSelectColumn(BookingcTableMap::COL_CUSTID);
            $criteria->removeSelectColumn(BookingcTableMap::COL_SHIPTOID);
            $criteria->removeSelectColumn(BookingcTableMap::COL_BOOKDATE);
            $criteria->removeSelectColumn(BookingcTableMap::COL_SALESREP);
            $criteria->removeSelectColumn(BookingcTableMap::COL_AMOUNT);
            $criteria->removeSelectColumn(BookingcTableMap::COL_DATEUPDATED);
            $criteria->removeSelectColumn(BookingcTableMap::COL_TIMEUPDATED);
        } else {
            $criteria->removeSelectColumn($alias . '.custid');
            $criteria->removeSelectColumn($alias . '.shiptoid');
            $criteria->removeSelectColumn($alias . '.bookdate');
            $criteria->removeSelectColumn($alias . '.salesrep');
            $criteria->removeSelectColumn($alias . '.amount');
            $criteria->removeSelectColumn($alias . '.dateupdated');
            $criteria->removeSelectColumn($alias . '.timeupdated');
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
        return Propel::getServiceContainer()->getDatabaseMap(BookingcTableMap::DATABASE_NAME)->getTable(BookingcTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Bookingc or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Bookingc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Bookingc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookingcTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(BookingcTableMap::COL_CUSTID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(BookingcTableMap::COL_SHIPTOID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(BookingcTableMap::COL_BOOKDATE, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(BookingcTableMap::COL_SALESREP, $value[3]));
                $criteria->addOr($criterion);
            }
        }

        $query = BookingcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BookingcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BookingcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bookingc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return BookingcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Bookingc or Criteria object.
     *
     * @param mixed $criteria Criteria or Bookingc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Bookingc object
        }


        // Set the correct dbName
        $query = BookingcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
