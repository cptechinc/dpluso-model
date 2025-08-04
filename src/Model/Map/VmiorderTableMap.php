<?php

namespace Map;

use \VmiOrder;
use \VmiOrderQuery;
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
 * This class defines the structure of the 'vmiorder' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class VmiOrderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.VmiOrderTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'vmiorder';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'VmiOrder';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\VmiOrder';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'VmiOrder';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'vmiorder.id';

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'vmiorder.sessionid';

    /**
     * the column name for the userid field
     */
    public const COL_USERID = 'vmiorder.userid';

    /**
     * the column name for the custid field
     */
    public const COL_CUSTID = 'vmiorder.custid';

    /**
     * the column name for the shiptoid field
     */
    public const COL_SHIPTOID = 'vmiorder.shiptoid';

    /**
     * the column name for the cell field
     */
    public const COL_CELL = 'vmiorder.cell';

    /**
     * the column name for the itemid field
     */
    public const COL_ITEMID = 'vmiorder.itemid';

    /**
     * the column name for the custitemid field
     */
    public const COL_CUSTITEMID = 'vmiorder.custitemid';

    /**
     * the column name for the cases field
     */
    public const COL_CASES = 'vmiorder.cases';

    /**
     * the column name for the qty field
     */
    public const COL_QTY = 'vmiorder.qty';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'vmiorder.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'vmiorder.time';

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
        self::TYPE_PHPNAME       => ['Id', 'Sessionid', 'Userid', 'Custid', 'Shiptoid', 'Cell', 'Itemid', 'Custitemid', 'Cases', 'Qty', 'Date', 'Time', ],
        self::TYPE_CAMELNAME     => ['id', 'sessionid', 'userid', 'custid', 'shiptoid', 'cell', 'itemid', 'custitemid', 'cases', 'qty', 'date', 'time', ],
        self::TYPE_COLNAME       => [VmiOrderTableMap::COL_ID, VmiOrderTableMap::COL_SESSIONID, VmiOrderTableMap::COL_USERID, VmiOrderTableMap::COL_CUSTID, VmiOrderTableMap::COL_SHIPTOID, VmiOrderTableMap::COL_CELL, VmiOrderTableMap::COL_ITEMID, VmiOrderTableMap::COL_CUSTITEMID, VmiOrderTableMap::COL_CASES, VmiOrderTableMap::COL_QTY, VmiOrderTableMap::COL_DATE, VmiOrderTableMap::COL_TIME, ],
        self::TYPE_FIELDNAME     => ['id', 'sessionid', 'userid', 'custid', 'shiptoid', 'cell', 'itemid', 'custitemid', 'cases', 'qty', 'date', 'time', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'Sessionid' => 1, 'Userid' => 2, 'Custid' => 3, 'Shiptoid' => 4, 'Cell' => 5, 'Itemid' => 6, 'Custitemid' => 7, 'Cases' => 8, 'Qty' => 9, 'Date' => 10, 'Time' => 11, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'sessionid' => 1, 'userid' => 2, 'custid' => 3, 'shiptoid' => 4, 'cell' => 5, 'itemid' => 6, 'custitemid' => 7, 'cases' => 8, 'qty' => 9, 'date' => 10, 'time' => 11, ],
        self::TYPE_COLNAME       => [VmiOrderTableMap::COL_ID => 0, VmiOrderTableMap::COL_SESSIONID => 1, VmiOrderTableMap::COL_USERID => 2, VmiOrderTableMap::COL_CUSTID => 3, VmiOrderTableMap::COL_SHIPTOID => 4, VmiOrderTableMap::COL_CELL => 5, VmiOrderTableMap::COL_ITEMID => 6, VmiOrderTableMap::COL_CUSTITEMID => 7, VmiOrderTableMap::COL_CASES => 8, VmiOrderTableMap::COL_QTY => 9, VmiOrderTableMap::COL_DATE => 10, VmiOrderTableMap::COL_TIME => 11, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'sessionid' => 1, 'userid' => 2, 'custid' => 3, 'shiptoid' => 4, 'cell' => 5, 'itemid' => 6, 'custitemid' => 7, 'cases' => 8, 'qty' => 9, 'date' => 10, 'time' => 11, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'VmiOrder.Id' => 'ID',
        'id' => 'ID',
        'vmiOrder.id' => 'ID',
        'VmiOrderTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'vmiorder.id' => 'ID',
        'Sessionid' => 'SESSIONID',
        'VmiOrder.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'vmiOrder.sessionid' => 'SESSIONID',
        'VmiOrderTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'vmiorder.sessionid' => 'SESSIONID',
        'Userid' => 'USERID',
        'VmiOrder.Userid' => 'USERID',
        'userid' => 'USERID',
        'vmiOrder.userid' => 'USERID',
        'VmiOrderTableMap::COL_USERID' => 'USERID',
        'COL_USERID' => 'USERID',
        'vmiorder.userid' => 'USERID',
        'Custid' => 'CUSTID',
        'VmiOrder.Custid' => 'CUSTID',
        'custid' => 'CUSTID',
        'vmiOrder.custid' => 'CUSTID',
        'VmiOrderTableMap::COL_CUSTID' => 'CUSTID',
        'COL_CUSTID' => 'CUSTID',
        'vmiorder.custid' => 'CUSTID',
        'Shiptoid' => 'SHIPTOID',
        'VmiOrder.Shiptoid' => 'SHIPTOID',
        'shiptoid' => 'SHIPTOID',
        'vmiOrder.shiptoid' => 'SHIPTOID',
        'VmiOrderTableMap::COL_SHIPTOID' => 'SHIPTOID',
        'COL_SHIPTOID' => 'SHIPTOID',
        'vmiorder.shiptoid' => 'SHIPTOID',
        'Cell' => 'CELL',
        'VmiOrder.Cell' => 'CELL',
        'cell' => 'CELL',
        'vmiOrder.cell' => 'CELL',
        'VmiOrderTableMap::COL_CELL' => 'CELL',
        'COL_CELL' => 'CELL',
        'vmiorder.cell' => 'CELL',
        'Itemid' => 'ITEMID',
        'VmiOrder.Itemid' => 'ITEMID',
        'itemid' => 'ITEMID',
        'vmiOrder.itemid' => 'ITEMID',
        'VmiOrderTableMap::COL_ITEMID' => 'ITEMID',
        'COL_ITEMID' => 'ITEMID',
        'vmiorder.itemid' => 'ITEMID',
        'Custitemid' => 'CUSTITEMID',
        'VmiOrder.Custitemid' => 'CUSTITEMID',
        'custitemid' => 'CUSTITEMID',
        'vmiOrder.custitemid' => 'CUSTITEMID',
        'VmiOrderTableMap::COL_CUSTITEMID' => 'CUSTITEMID',
        'COL_CUSTITEMID' => 'CUSTITEMID',
        'vmiorder.custitemid' => 'CUSTITEMID',
        'Cases' => 'CASES',
        'VmiOrder.Cases' => 'CASES',
        'cases' => 'CASES',
        'vmiOrder.cases' => 'CASES',
        'VmiOrderTableMap::COL_CASES' => 'CASES',
        'COL_CASES' => 'CASES',
        'vmiorder.cases' => 'CASES',
        'Qty' => 'QTY',
        'VmiOrder.Qty' => 'QTY',
        'qty' => 'QTY',
        'vmiOrder.qty' => 'QTY',
        'VmiOrderTableMap::COL_QTY' => 'QTY',
        'COL_QTY' => 'QTY',
        'vmiorder.qty' => 'QTY',
        'Date' => 'DATE',
        'VmiOrder.Date' => 'DATE',
        'date' => 'DATE',
        'vmiOrder.date' => 'DATE',
        'VmiOrderTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'vmiorder.date' => 'DATE',
        'Time' => 'TIME',
        'VmiOrder.Time' => 'TIME',
        'time' => 'TIME',
        'vmiOrder.time' => 'TIME',
        'VmiOrderTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'vmiorder.time' => 'TIME',
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
        $this->setName('vmiorder');
        $this->setPhpName('VmiOrder');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\VmiOrder');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('sessionid', 'Sessionid', 'VARCHAR', false, 50, null);
        $this->addColumn('userid', 'Userid', 'VARCHAR', false, 12, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, null);
        $this->addColumn('cell', 'Cell', 'VARCHAR', false, 8, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, null);
        $this->addColumn('custitemid', 'Custitemid', 'VARCHAR', false, 30, null);
        $this->addColumn('cases', 'Cases', 'INTEGER', false, null, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? VmiOrderTableMap::CLASS_DEFAULT : VmiOrderTableMap::OM_CLASS;
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
     * @return array (VmiOrder object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = VmiOrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VmiOrderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VmiOrderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VmiOrderTableMap::OM_CLASS;
            /** @var VmiOrder $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VmiOrderTableMap::addInstanceToPool($obj, $key);
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
            $key = VmiOrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VmiOrderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var VmiOrder $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VmiOrderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(VmiOrderTableMap::COL_ID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_USERID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_CUSTID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_CELL);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_ITEMID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_CUSTITEMID);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_CASES);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_QTY);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_DATE);
            $criteria->addSelectColumn(VmiOrderTableMap::COL_TIME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.userid');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.cell');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.custitemid');
            $criteria->addSelectColumn($alias . '.cases');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
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
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_ID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_USERID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_CUSTID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_SHIPTOID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_CELL);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_ITEMID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_CUSTITEMID);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_CASES);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_QTY);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_DATE);
            $criteria->removeSelectColumn(VmiOrderTableMap::COL_TIME);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.userid');
            $criteria->removeSelectColumn($alias . '.custid');
            $criteria->removeSelectColumn($alias . '.shiptoid');
            $criteria->removeSelectColumn($alias . '.cell');
            $criteria->removeSelectColumn($alias . '.itemid');
            $criteria->removeSelectColumn($alias . '.custitemid');
            $criteria->removeSelectColumn($alias . '.cases');
            $criteria->removeSelectColumn($alias . '.qty');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
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
        return Propel::getServiceContainer()->getDatabaseMap(VmiOrderTableMap::DATABASE_NAME)->getTable(VmiOrderTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a VmiOrder or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or VmiOrder object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(VmiOrderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \VmiOrder) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VmiOrderTableMap::DATABASE_NAME);
            $criteria->add(VmiOrderTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = VmiOrderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VmiOrderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VmiOrderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the vmiorder table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return VmiOrderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a VmiOrder or Criteria object.
     *
     * @param mixed $criteria Criteria or VmiOrder object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VmiOrderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from VmiOrder object
        }

        if ($criteria->containsKey(VmiOrderTableMap::COL_ID) && $criteria->keyContainsValue(VmiOrderTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VmiOrderTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = VmiOrderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
