<?php

namespace Map;

use \Taskscheduler;
use \TaskschedulerQuery;
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
 * This class defines the structure of the 'taskscheduler' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class TaskschedulerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.TaskschedulerTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'taskscheduler';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Taskscheduler';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Taskscheduler';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Taskscheduler';

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
     * the column name for the id field
     */
    public const COL_ID = 'taskscheduler.id';

    /**
     * the column name for the datecreated field
     */
    public const COL_DATECREATED = 'taskscheduler.datecreated';

    /**
     * the column name for the startdate field
     */
    public const COL_STARTDATE = 'taskscheduler.startdate';

    /**
     * the column name for the user field
     */
    public const COL_USER = 'taskscheduler.user';

    /**
     * the column name for the active field
     */
    public const COL_ACTIVE = 'taskscheduler.active';

    /**
     * the column name for the description field
     */
    public const COL_DESCRIPTION = 'taskscheduler.description';

    /**
     * the column name for the tasktype field
     */
    public const COL_TASKTYPE = 'taskscheduler.tasktype';

    /**
     * the column name for the repeatlogic field
     */
    public const COL_REPEATLOGIC = 'taskscheduler.repeatlogic';

    /**
     * the column name for the customerlink field
     */
    public const COL_CUSTOMERLINK = 'taskscheduler.customerlink';

    /**
     * the column name for the shiptolink field
     */
    public const COL_SHIPTOLINK = 'taskscheduler.shiptolink';

    /**
     * the column name for the contactlink field
     */
    public const COL_CONTACTLINK = 'taskscheduler.contactlink';

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
        self::TYPE_PHPNAME       => ['Id', 'Datecreated', 'Startdate', 'User', 'Active', 'Description', 'Tasktype', 'Repeatlogic', 'Customerlink', 'Shiptolink', 'Contactlink', ],
        self::TYPE_CAMELNAME     => ['id', 'datecreated', 'startdate', 'user', 'active', 'description', 'tasktype', 'repeatlogic', 'customerlink', 'shiptolink', 'contactlink', ],
        self::TYPE_COLNAME       => [TaskschedulerTableMap::COL_ID, TaskschedulerTableMap::COL_DATECREATED, TaskschedulerTableMap::COL_STARTDATE, TaskschedulerTableMap::COL_USER, TaskschedulerTableMap::COL_ACTIVE, TaskschedulerTableMap::COL_DESCRIPTION, TaskschedulerTableMap::COL_TASKTYPE, TaskschedulerTableMap::COL_REPEATLOGIC, TaskschedulerTableMap::COL_CUSTOMERLINK, TaskschedulerTableMap::COL_SHIPTOLINK, TaskschedulerTableMap::COL_CONTACTLINK, ],
        self::TYPE_FIELDNAME     => ['id', 'datecreated', 'startdate', 'user', 'active', 'description', 'tasktype', 'repeatlogic', 'customerlink', 'shiptolink', 'contactlink', ],
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'Datecreated' => 1, 'Startdate' => 2, 'User' => 3, 'Active' => 4, 'Description' => 5, 'Tasktype' => 6, 'Repeatlogic' => 7, 'Customerlink' => 8, 'Shiptolink' => 9, 'Contactlink' => 10, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'datecreated' => 1, 'startdate' => 2, 'user' => 3, 'active' => 4, 'description' => 5, 'tasktype' => 6, 'repeatlogic' => 7, 'customerlink' => 8, 'shiptolink' => 9, 'contactlink' => 10, ],
        self::TYPE_COLNAME       => [TaskschedulerTableMap::COL_ID => 0, TaskschedulerTableMap::COL_DATECREATED => 1, TaskschedulerTableMap::COL_STARTDATE => 2, TaskschedulerTableMap::COL_USER => 3, TaskschedulerTableMap::COL_ACTIVE => 4, TaskschedulerTableMap::COL_DESCRIPTION => 5, TaskschedulerTableMap::COL_TASKTYPE => 6, TaskschedulerTableMap::COL_REPEATLOGIC => 7, TaskschedulerTableMap::COL_CUSTOMERLINK => 8, TaskschedulerTableMap::COL_SHIPTOLINK => 9, TaskschedulerTableMap::COL_CONTACTLINK => 10, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'datecreated' => 1, 'startdate' => 2, 'user' => 3, 'active' => 4, 'description' => 5, 'tasktype' => 6, 'repeatlogic' => 7, 'customerlink' => 8, 'shiptolink' => 9, 'contactlink' => 10, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Taskscheduler.Id' => 'ID',
        'id' => 'ID',
        'taskscheduler.id' => 'ID',
        'TaskschedulerTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Datecreated' => 'DATECREATED',
        'Taskscheduler.Datecreated' => 'DATECREATED',
        'datecreated' => 'DATECREATED',
        'taskscheduler.datecreated' => 'DATECREATED',
        'TaskschedulerTableMap::COL_DATECREATED' => 'DATECREATED',
        'COL_DATECREATED' => 'DATECREATED',
        'Startdate' => 'STARTDATE',
        'Taskscheduler.Startdate' => 'STARTDATE',
        'startdate' => 'STARTDATE',
        'taskscheduler.startdate' => 'STARTDATE',
        'TaskschedulerTableMap::COL_STARTDATE' => 'STARTDATE',
        'COL_STARTDATE' => 'STARTDATE',
        'User' => 'USER',
        'Taskscheduler.User' => 'USER',
        'user' => 'USER',
        'taskscheduler.user' => 'USER',
        'TaskschedulerTableMap::COL_USER' => 'USER',
        'COL_USER' => 'USER',
        'Active' => 'ACTIVE',
        'Taskscheduler.Active' => 'ACTIVE',
        'active' => 'ACTIVE',
        'taskscheduler.active' => 'ACTIVE',
        'TaskschedulerTableMap::COL_ACTIVE' => 'ACTIVE',
        'COL_ACTIVE' => 'ACTIVE',
        'Description' => 'DESCRIPTION',
        'Taskscheduler.Description' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'taskscheduler.description' => 'DESCRIPTION',
        'TaskschedulerTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
        'COL_DESCRIPTION' => 'DESCRIPTION',
        'Tasktype' => 'TASKTYPE',
        'Taskscheduler.Tasktype' => 'TASKTYPE',
        'tasktype' => 'TASKTYPE',
        'taskscheduler.tasktype' => 'TASKTYPE',
        'TaskschedulerTableMap::COL_TASKTYPE' => 'TASKTYPE',
        'COL_TASKTYPE' => 'TASKTYPE',
        'Repeatlogic' => 'REPEATLOGIC',
        'Taskscheduler.Repeatlogic' => 'REPEATLOGIC',
        'repeatlogic' => 'REPEATLOGIC',
        'taskscheduler.repeatlogic' => 'REPEATLOGIC',
        'TaskschedulerTableMap::COL_REPEATLOGIC' => 'REPEATLOGIC',
        'COL_REPEATLOGIC' => 'REPEATLOGIC',
        'Customerlink' => 'CUSTOMERLINK',
        'Taskscheduler.Customerlink' => 'CUSTOMERLINK',
        'customerlink' => 'CUSTOMERLINK',
        'taskscheduler.customerlink' => 'CUSTOMERLINK',
        'TaskschedulerTableMap::COL_CUSTOMERLINK' => 'CUSTOMERLINK',
        'COL_CUSTOMERLINK' => 'CUSTOMERLINK',
        'Shiptolink' => 'SHIPTOLINK',
        'Taskscheduler.Shiptolink' => 'SHIPTOLINK',
        'shiptolink' => 'SHIPTOLINK',
        'taskscheduler.shiptolink' => 'SHIPTOLINK',
        'TaskschedulerTableMap::COL_SHIPTOLINK' => 'SHIPTOLINK',
        'COL_SHIPTOLINK' => 'SHIPTOLINK',
        'Contactlink' => 'CONTACTLINK',
        'Taskscheduler.Contactlink' => 'CONTACTLINK',
        'contactlink' => 'CONTACTLINK',
        'taskscheduler.contactlink' => 'CONTACTLINK',
        'TaskschedulerTableMap::COL_CONTACTLINK' => 'CONTACTLINK',
        'COL_CONTACTLINK' => 'CONTACTLINK',
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
        $this->setName('taskscheduler');
        $this->setPhpName('Taskscheduler');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Taskscheduler');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('datecreated', 'Datecreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('startdate', 'Startdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('user', 'User', 'VARCHAR', false, 45, null);
        $this->addColumn('active', 'Active', 'VARCHAR', false, 1, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('tasktype', 'Tasktype', 'VARCHAR', false, 10, null);
        $this->addColumn('repeatlogic', 'Repeatlogic', 'LONGVARCHAR', false, null, null);
        $this->addColumn('customerlink', 'Customerlink', 'VARCHAR', false, 45, null);
        $this->addColumn('shiptolink', 'Shiptolink', 'VARCHAR', false, 45, null);
        $this->addColumn('contactlink', 'Contactlink', 'VARCHAR', false, 45, null);
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
        return $withPrefix ? TaskschedulerTableMap::CLASS_DEFAULT : TaskschedulerTableMap::OM_CLASS;
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
     * @return array (Taskscheduler object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = TaskschedulerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TaskschedulerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TaskschedulerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TaskschedulerTableMap::OM_CLASS;
            /** @var Taskscheduler $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TaskschedulerTableMap::addInstanceToPool($obj, $key);
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
            $key = TaskschedulerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TaskschedulerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Taskscheduler $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TaskschedulerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_ID);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_DATECREATED);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_STARTDATE);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_USER);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_ACTIVE);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_TASKTYPE);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_REPEATLOGIC);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_CUSTOMERLINK);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_SHIPTOLINK);
            $criteria->addSelectColumn(TaskschedulerTableMap::COL_CONTACTLINK);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.datecreated');
            $criteria->addSelectColumn($alias . '.startdate');
            $criteria->addSelectColumn($alias . '.user');
            $criteria->addSelectColumn($alias . '.active');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.tasktype');
            $criteria->addSelectColumn($alias . '.repeatlogic');
            $criteria->addSelectColumn($alias . '.customerlink');
            $criteria->addSelectColumn($alias . '.shiptolink');
            $criteria->addSelectColumn($alias . '.contactlink');
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
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_ID);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_DATECREATED);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_STARTDATE);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_USER);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_ACTIVE);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_DESCRIPTION);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_TASKTYPE);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_REPEATLOGIC);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_CUSTOMERLINK);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_SHIPTOLINK);
            $criteria->removeSelectColumn(TaskschedulerTableMap::COL_CONTACTLINK);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.datecreated');
            $criteria->removeSelectColumn($alias . '.startdate');
            $criteria->removeSelectColumn($alias . '.user');
            $criteria->removeSelectColumn($alias . '.active');
            $criteria->removeSelectColumn($alias . '.description');
            $criteria->removeSelectColumn($alias . '.tasktype');
            $criteria->removeSelectColumn($alias . '.repeatlogic');
            $criteria->removeSelectColumn($alias . '.customerlink');
            $criteria->removeSelectColumn($alias . '.shiptolink');
            $criteria->removeSelectColumn($alias . '.contactlink');
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
        return Propel::getServiceContainer()->getDatabaseMap(TaskschedulerTableMap::DATABASE_NAME)->getTable(TaskschedulerTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Taskscheduler or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Taskscheduler object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TaskschedulerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Taskscheduler) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TaskschedulerTableMap::DATABASE_NAME);
            $criteria->add(TaskschedulerTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TaskschedulerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TaskschedulerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TaskschedulerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the taskscheduler table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return TaskschedulerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Taskscheduler or Criteria object.
     *
     * @param mixed $criteria Criteria or Taskscheduler object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskschedulerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Taskscheduler object
        }

        if ($criteria->containsKey(TaskschedulerTableMap::COL_ID) && $criteria->keyContainsValue(TaskschedulerTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TaskschedulerTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TaskschedulerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
