<?php

namespace Map;

use \Logm;
use \LogmQuery;
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
 * This class defines the structure of the 'logm' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class LogmTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.LogmTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'logm';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Logm';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Logm';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the loginid field
     */
    const COL_LOGINID = 'logm.loginid';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'logm.name';

    /**
     * the column name for the whseid field
     */
    const COL_WHSEID = 'logm.whseid';

    /**
     * the column name for the role field
     */
    const COL_ROLE = 'logm.role';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'logm.company';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'logm.fax';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'logm.phone';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'logm.email';

    /**
     * the column name for the roleid field
     */
    const COL_ROLEID = 'logm.roleid';

    /**
     * the column name for the rolename field
     */
    const COL_ROLENAME = 'logm.rolename';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'logm.dummy';

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
        self::TYPE_PHPNAME       => array('Loginid', 'Name', 'Whseid', 'Role', 'Company', 'Fax', 'Phone', 'Email', 'Roleid', 'Rolename', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('loginid', 'name', 'whseid', 'role', 'company', 'fax', 'phone', 'email', 'roleid', 'rolename', 'dummy', ),
        self::TYPE_COLNAME       => array(LogmTableMap::COL_LOGINID, LogmTableMap::COL_NAME, LogmTableMap::COL_WHSEID, LogmTableMap::COL_ROLE, LogmTableMap::COL_COMPANY, LogmTableMap::COL_FAX, LogmTableMap::COL_PHONE, LogmTableMap::COL_EMAIL, LogmTableMap::COL_ROLEID, LogmTableMap::COL_ROLENAME, LogmTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('loginid', 'name', 'whseid', 'role', 'company', 'fax', 'phone', 'email', 'roleid', 'rolename', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Loginid' => 0, 'Name' => 1, 'Whseid' => 2, 'Role' => 3, 'Company' => 4, 'Fax' => 5, 'Phone' => 6, 'Email' => 7, 'Roleid' => 8, 'Rolename' => 9, 'Dummy' => 10, ),
        self::TYPE_CAMELNAME     => array('loginid' => 0, 'name' => 1, 'whseid' => 2, 'role' => 3, 'company' => 4, 'fax' => 5, 'phone' => 6, 'email' => 7, 'roleid' => 8, 'rolename' => 9, 'dummy' => 10, ),
        self::TYPE_COLNAME       => array(LogmTableMap::COL_LOGINID => 0, LogmTableMap::COL_NAME => 1, LogmTableMap::COL_WHSEID => 2, LogmTableMap::COL_ROLE => 3, LogmTableMap::COL_COMPANY => 4, LogmTableMap::COL_FAX => 5, LogmTableMap::COL_PHONE => 6, LogmTableMap::COL_EMAIL => 7, LogmTableMap::COL_ROLEID => 8, LogmTableMap::COL_ROLENAME => 9, LogmTableMap::COL_DUMMY => 10, ),
        self::TYPE_FIELDNAME     => array('loginid' => 0, 'name' => 1, 'whseid' => 2, 'role' => 3, 'company' => 4, 'fax' => 5, 'phone' => 6, 'email' => 7, 'roleid' => 8, 'rolename' => 9, 'dummy' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('logm');
        $this->setPhpName('Logm');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Logm');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('loginid', 'Loginid', 'VARCHAR', true, 30, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 45, null);
        $this->addColumn('whseid', 'Whseid', 'VARCHAR', false, 45, null);
        $this->addColumn('role', 'Role', 'VARCHAR', false, 45, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 45, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', false, 12, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 12, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 45, null);
        $this->addColumn('roleid', 'Roleid', 'VARCHAR', false, 45, null);
        $this->addColumn('rolename', 'Rolename', 'VARCHAR', false, 45, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)
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
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? LogmTableMap::CLASS_DEFAULT : LogmTableMap::OM_CLASS;
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
     * @return array           (Logm object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = LogmTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = LogmTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + LogmTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LogmTableMap::OM_CLASS;
            /** @var Logm $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            LogmTableMap::addInstanceToPool($obj, $key);
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
            $key = LogmTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = LogmTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Logm $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LogmTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(LogmTableMap::COL_LOGINID);
            $criteria->addSelectColumn(LogmTableMap::COL_NAME);
            $criteria->addSelectColumn(LogmTableMap::COL_WHSEID);
            $criteria->addSelectColumn(LogmTableMap::COL_ROLE);
            $criteria->addSelectColumn(LogmTableMap::COL_COMPANY);
            $criteria->addSelectColumn(LogmTableMap::COL_FAX);
            $criteria->addSelectColumn(LogmTableMap::COL_PHONE);
            $criteria->addSelectColumn(LogmTableMap::COL_EMAIL);
            $criteria->addSelectColumn(LogmTableMap::COL_ROLEID);
            $criteria->addSelectColumn(LogmTableMap::COL_ROLENAME);
            $criteria->addSelectColumn(LogmTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.loginid');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.whseid');
            $criteria->addSelectColumn($alias . '.role');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.roleid');
            $criteria->addSelectColumn($alias . '.rolename');
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
        return Propel::getServiceContainer()->getDatabaseMap(LogmTableMap::DATABASE_NAME)->getTable(LogmTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(LogmTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(LogmTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new LogmTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Logm or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Logm object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(LogmTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Logm) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LogmTableMap::DATABASE_NAME);
            $criteria->add(LogmTableMap::COL_LOGINID, (array) $values, Criteria::IN);
        }

        $query = LogmQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            LogmTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                LogmTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the logm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return LogmQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Logm or Criteria object.
     *
     * @param mixed               $criteria Criteria or Logm object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LogmTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Logm object
        }


        // Set the correct dbName
        $query = LogmQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // LogmTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
LogmTableMap::buildTableMap();
