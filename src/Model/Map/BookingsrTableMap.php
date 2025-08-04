<?php

namespace Map;

use \Bookingsr;
use \BookingsrQuery;
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
 * This class defines the structure of the 'bookingr' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class BookingsrTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.BookingsrTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'bookingr';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Bookingsr';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Bookingsr';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Bookingsr';

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
     * the column name for the salesrep field
     */
    public const COL_SALESREP = 'bookingr.salesrep';

    /**
     * the column name for the bookdate field
     */
    public const COL_BOOKDATE = 'bookingr.bookdate';

    /**
     * the column name for the whse field
     */
    public const COL_WHSE = 'bookingr.whse';

    /**
     * the column name for the amount field
     */
    public const COL_AMOUNT = 'bookingr.amount';

    /**
     * the column name for the salesgroup field
     */
    public const COL_SALESGROUP = 'bookingr.salesgroup';

    /**
     * the column name for the dateupdated field
     */
    public const COL_DATEUPDATED = 'bookingr.dateupdated';

    /**
     * the column name for the timeupdated field
     */
    public const COL_TIMEUPDATED = 'bookingr.timeupdated';

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
        self::TYPE_PHPNAME       => ['Salesrep', 'Bookdate', 'Whse', 'Amount', 'Salesgroup', 'Dateupdated', 'Timeupdated', ],
        self::TYPE_CAMELNAME     => ['salesrep', 'bookdate', 'whse', 'amount', 'salesgroup', 'dateupdated', 'timeupdated', ],
        self::TYPE_COLNAME       => [BookingsrTableMap::COL_SALESREP, BookingsrTableMap::COL_BOOKDATE, BookingsrTableMap::COL_WHSE, BookingsrTableMap::COL_AMOUNT, BookingsrTableMap::COL_SALESGROUP, BookingsrTableMap::COL_DATEUPDATED, BookingsrTableMap::COL_TIMEUPDATED, ],
        self::TYPE_FIELDNAME     => ['salesrep', 'bookdate', 'whse', 'amount', 'salesgroup', 'dateupdated', 'timeupdated', ],
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
        self::TYPE_PHPNAME       => ['Salesrep' => 0, 'Bookdate' => 1, 'Whse' => 2, 'Amount' => 3, 'Salesgroup' => 4, 'Dateupdated' => 5, 'Timeupdated' => 6, ],
        self::TYPE_CAMELNAME     => ['salesrep' => 0, 'bookdate' => 1, 'whse' => 2, 'amount' => 3, 'salesgroup' => 4, 'dateupdated' => 5, 'timeupdated' => 6, ],
        self::TYPE_COLNAME       => [BookingsrTableMap::COL_SALESREP => 0, BookingsrTableMap::COL_BOOKDATE => 1, BookingsrTableMap::COL_WHSE => 2, BookingsrTableMap::COL_AMOUNT => 3, BookingsrTableMap::COL_SALESGROUP => 4, BookingsrTableMap::COL_DATEUPDATED => 5, BookingsrTableMap::COL_TIMEUPDATED => 6, ],
        self::TYPE_FIELDNAME     => ['salesrep' => 0, 'bookdate' => 1, 'whse' => 2, 'amount' => 3, 'salesgroup' => 4, 'dateupdated' => 5, 'timeupdated' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Salesrep' => 'SALESREP',
        'Bookingsr.Salesrep' => 'SALESREP',
        'salesrep' => 'SALESREP',
        'bookingsr.salesrep' => 'SALESREP',
        'BookingsrTableMap::COL_SALESREP' => 'SALESREP',
        'COL_SALESREP' => 'SALESREP',
        'bookingr.salesrep' => 'SALESREP',
        'Bookdate' => 'BOOKDATE',
        'Bookingsr.Bookdate' => 'BOOKDATE',
        'bookdate' => 'BOOKDATE',
        'bookingsr.bookdate' => 'BOOKDATE',
        'BookingsrTableMap::COL_BOOKDATE' => 'BOOKDATE',
        'COL_BOOKDATE' => 'BOOKDATE',
        'bookingr.bookdate' => 'BOOKDATE',
        'Whse' => 'WHSE',
        'Bookingsr.Whse' => 'WHSE',
        'whse' => 'WHSE',
        'bookingsr.whse' => 'WHSE',
        'BookingsrTableMap::COL_WHSE' => 'WHSE',
        'COL_WHSE' => 'WHSE',
        'bookingr.whse' => 'WHSE',
        'Amount' => 'AMOUNT',
        'Bookingsr.Amount' => 'AMOUNT',
        'amount' => 'AMOUNT',
        'bookingsr.amount' => 'AMOUNT',
        'BookingsrTableMap::COL_AMOUNT' => 'AMOUNT',
        'COL_AMOUNT' => 'AMOUNT',
        'bookingr.amount' => 'AMOUNT',
        'Salesgroup' => 'SALESGROUP',
        'Bookingsr.Salesgroup' => 'SALESGROUP',
        'salesgroup' => 'SALESGROUP',
        'bookingsr.salesgroup' => 'SALESGROUP',
        'BookingsrTableMap::COL_SALESGROUP' => 'SALESGROUP',
        'COL_SALESGROUP' => 'SALESGROUP',
        'bookingr.salesgroup' => 'SALESGROUP',
        'Dateupdated' => 'DATEUPDATED',
        'Bookingsr.Dateupdated' => 'DATEUPDATED',
        'dateupdated' => 'DATEUPDATED',
        'bookingsr.dateupdated' => 'DATEUPDATED',
        'BookingsrTableMap::COL_DATEUPDATED' => 'DATEUPDATED',
        'COL_DATEUPDATED' => 'DATEUPDATED',
        'bookingr.dateupdated' => 'DATEUPDATED',
        'Timeupdated' => 'TIMEUPDATED',
        'Bookingsr.Timeupdated' => 'TIMEUPDATED',
        'timeupdated' => 'TIMEUPDATED',
        'bookingsr.timeupdated' => 'TIMEUPDATED',
        'BookingsrTableMap::COL_TIMEUPDATED' => 'TIMEUPDATED',
        'COL_TIMEUPDATED' => 'TIMEUPDATED',
        'bookingr.timeupdated' => 'TIMEUPDATED',
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
        $this->setName('bookingr');
        $this->setPhpName('Bookingsr');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Bookingsr');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('salesrep', 'Salesrep', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('bookdate', 'Bookdate', 'INTEGER', true, 8, null);
        $this->addColumn('whse', 'Whse', 'VARCHAR', false, 45, null);
        $this->addColumn('amount', 'Amount', 'DECIMAL', false, 10, null);
        $this->addColumn('salesgroup', 'Salesgroup', 'VARCHAR', false, 6, null);
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
     * @param \Bookingsr $obj A \Bookingsr object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Bookingsr $obj, ?string $key = null): void
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSalesrep() || is_scalar($obj->getSalesrep()) || is_callable([$obj->getSalesrep(), '__toString']) ? (string) $obj->getSalesrep() : $obj->getSalesrep()), (null === $obj->getBookdate() || is_scalar($obj->getBookdate()) || is_callable([$obj->getBookdate(), '__toString']) ? (string) $obj->getBookdate() : $obj->getBookdate())]);
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
     * @param mixed $value A \Bookingsr object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Bookingsr) {
                $key = serialize([(null === $value->getSalesrep() || is_scalar($value->getSalesrep()) || is_callable([$value->getSalesrep(), '__toString']) ? (string) $value->getSalesrep() : $value->getSalesrep()), (null === $value->getBookdate() || is_scalar($value->getBookdate()) || is_callable([$value->getBookdate(), '__toString']) ? (string) $value->getBookdate() : $value->getBookdate())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Bookingsr object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Salesrep', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Bookdate', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? BookingsrTableMap::CLASS_DEFAULT : BookingsrTableMap::OM_CLASS;
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
     * @return array (Bookingsr object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = BookingsrTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookingsrTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookingsrTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookingsrTableMap::OM_CLASS;
            /** @var Bookingsr $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookingsrTableMap::addInstanceToPool($obj, $key);
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
            $key = BookingsrTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookingsrTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Bookingsr $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookingsrTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BookingsrTableMap::COL_SALESREP);
            $criteria->addSelectColumn(BookingsrTableMap::COL_BOOKDATE);
            $criteria->addSelectColumn(BookingsrTableMap::COL_WHSE);
            $criteria->addSelectColumn(BookingsrTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(BookingsrTableMap::COL_SALESGROUP);
            $criteria->addSelectColumn(BookingsrTableMap::COL_DATEUPDATED);
            $criteria->addSelectColumn(BookingsrTableMap::COL_TIMEUPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.salesrep');
            $criteria->addSelectColumn($alias . '.bookdate');
            $criteria->addSelectColumn($alias . '.whse');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.salesgroup');
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
            $criteria->removeSelectColumn(BookingsrTableMap::COL_SALESREP);
            $criteria->removeSelectColumn(BookingsrTableMap::COL_BOOKDATE);
            $criteria->removeSelectColumn(BookingsrTableMap::COL_WHSE);
            $criteria->removeSelectColumn(BookingsrTableMap::COL_AMOUNT);
            $criteria->removeSelectColumn(BookingsrTableMap::COL_SALESGROUP);
            $criteria->removeSelectColumn(BookingsrTableMap::COL_DATEUPDATED);
            $criteria->removeSelectColumn(BookingsrTableMap::COL_TIMEUPDATED);
        } else {
            $criteria->removeSelectColumn($alias . '.salesrep');
            $criteria->removeSelectColumn($alias . '.bookdate');
            $criteria->removeSelectColumn($alias . '.whse');
            $criteria->removeSelectColumn($alias . '.amount');
            $criteria->removeSelectColumn($alias . '.salesgroup');
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
        return Propel::getServiceContainer()->getDatabaseMap(BookingsrTableMap::DATABASE_NAME)->getTable(BookingsrTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Bookingsr or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Bookingsr object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsrTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Bookingsr) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookingsrTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(BookingsrTableMap::COL_SALESREP, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(BookingsrTableMap::COL_BOOKDATE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = BookingsrQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BookingsrTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BookingsrTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bookingr table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return BookingsrQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Bookingsr or Criteria object.
     *
     * @param mixed $criteria Criteria or Bookingsr object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsrTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Bookingsr object
        }


        // Set the correct dbName
        $query = BookingsrQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
