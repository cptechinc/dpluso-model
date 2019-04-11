<?php

namespace Map;

use \Doccntl;
use \DoccntlQuery;
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
 * This class defines the structure of the 'doccntl' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DoccntlTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DoccntlTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'doccntl';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Doccntl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Doccntl';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the folder field
     */
    const COL_FOLDER = 'doccntl.folder';

    /**
     * the column name for the desc field
     */
    const COL_DESC = 'doccntl.desc';

    /**
     * the column name for the directory field
     */
    const COL_DIRECTORY = 'doccntl.directory';

    /**
     * the column name for the tag field
     */
    const COL_TAG = 'doccntl.tag';

    /**
     * the column name for the field1title field
     */
    const COL_FIELD1TITLE = 'doccntl.field1title';

    /**
     * the column name for the field2title field
     */
    const COL_FIELD2TITLE = 'doccntl.field2title';

    /**
     * the column name for the field3title field
     */
    const COL_FIELD3TITLE = 'doccntl.field3title';

    /**
     * the column name for the datecreated field
     */
    const COL_DATECREATED = 'doccntl.datecreated';

    /**
     * the column name for the timecreated field
     */
    const COL_TIMECREATED = 'doccntl.timecreated';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'doccntl.dummy';

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
        self::TYPE_PHPNAME       => array('Folder', 'Desc', 'Directory', 'Tag', 'Field1title', 'Field2title', 'Field3title', 'Datecreated', 'Timecreated', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('folder', 'desc', 'directory', 'tag', 'field1title', 'field2title', 'field3title', 'datecreated', 'timecreated', 'dummy', ),
        self::TYPE_COLNAME       => array(DoccntlTableMap::COL_FOLDER, DoccntlTableMap::COL_DESC, DoccntlTableMap::COL_DIRECTORY, DoccntlTableMap::COL_TAG, DoccntlTableMap::COL_FIELD1TITLE, DoccntlTableMap::COL_FIELD2TITLE, DoccntlTableMap::COL_FIELD3TITLE, DoccntlTableMap::COL_DATECREATED, DoccntlTableMap::COL_TIMECREATED, DoccntlTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('folder', 'desc', 'directory', 'tag', 'field1title', 'field2title', 'field3title', 'datecreated', 'timecreated', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Folder' => 0, 'Desc' => 1, 'Directory' => 2, 'Tag' => 3, 'Field1title' => 4, 'Field2title' => 5, 'Field3title' => 6, 'Datecreated' => 7, 'Timecreated' => 8, 'Dummy' => 9, ),
        self::TYPE_CAMELNAME     => array('folder' => 0, 'desc' => 1, 'directory' => 2, 'tag' => 3, 'field1title' => 4, 'field2title' => 5, 'field3title' => 6, 'datecreated' => 7, 'timecreated' => 8, 'dummy' => 9, ),
        self::TYPE_COLNAME       => array(DoccntlTableMap::COL_FOLDER => 0, DoccntlTableMap::COL_DESC => 1, DoccntlTableMap::COL_DIRECTORY => 2, DoccntlTableMap::COL_TAG => 3, DoccntlTableMap::COL_FIELD1TITLE => 4, DoccntlTableMap::COL_FIELD2TITLE => 5, DoccntlTableMap::COL_FIELD3TITLE => 6, DoccntlTableMap::COL_DATECREATED => 7, DoccntlTableMap::COL_TIMECREATED => 8, DoccntlTableMap::COL_DUMMY => 9, ),
        self::TYPE_FIELDNAME     => array('folder' => 0, 'desc' => 1, 'directory' => 2, 'tag' => 3, 'field1title' => 4, 'field2title' => 5, 'field3title' => 6, 'datecreated' => 7, 'timecreated' => 8, 'dummy' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('doccntl');
        $this->setPhpName('Doccntl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Doccntl');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('folder', 'Folder', 'VARCHAR', true, 8, '');
        $this->addColumn('desc', 'Desc', 'VARCHAR', false, 40, null);
        $this->addColumn('directory', 'Directory', 'VARCHAR', false, 50, null);
        $this->addColumn('tag', 'Tag', 'VARCHAR', false, 2, null);
        $this->addColumn('field1title', 'Field1title', 'VARCHAR', false, 45, null);
        $this->addColumn('field2title', 'Field2title', 'VARCHAR', false, 45, null);
        $this->addColumn('field3title', 'Field3title', 'VARCHAR', false, 45, null);
        $this->addColumn('datecreated', 'Datecreated', 'VARCHAR', false, 8, null);
        $this->addColumn('timecreated', 'Timecreated', 'VARCHAR', false, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Folder', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DoccntlTableMap::CLASS_DEFAULT : DoccntlTableMap::OM_CLASS;
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
     * @return array           (Doccntl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DoccntlTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DoccntlTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DoccntlTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DoccntlTableMap::OM_CLASS;
            /** @var Doccntl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DoccntlTableMap::addInstanceToPool($obj, $key);
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
            $key = DoccntlTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DoccntlTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Doccntl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DoccntlTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DoccntlTableMap::COL_FOLDER);
            $criteria->addSelectColumn(DoccntlTableMap::COL_DESC);
            $criteria->addSelectColumn(DoccntlTableMap::COL_DIRECTORY);
            $criteria->addSelectColumn(DoccntlTableMap::COL_TAG);
            $criteria->addSelectColumn(DoccntlTableMap::COL_FIELD1TITLE);
            $criteria->addSelectColumn(DoccntlTableMap::COL_FIELD2TITLE);
            $criteria->addSelectColumn(DoccntlTableMap::COL_FIELD3TITLE);
            $criteria->addSelectColumn(DoccntlTableMap::COL_DATECREATED);
            $criteria->addSelectColumn(DoccntlTableMap::COL_TIMECREATED);
            $criteria->addSelectColumn(DoccntlTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.folder');
            $criteria->addSelectColumn($alias . '.desc');
            $criteria->addSelectColumn($alias . '.directory');
            $criteria->addSelectColumn($alias . '.tag');
            $criteria->addSelectColumn($alias . '.field1title');
            $criteria->addSelectColumn($alias . '.field2title');
            $criteria->addSelectColumn($alias . '.field3title');
            $criteria->addSelectColumn($alias . '.datecreated');
            $criteria->addSelectColumn($alias . '.timecreated');
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
        return Propel::getServiceContainer()->getDatabaseMap(DoccntlTableMap::DATABASE_NAME)->getTable(DoccntlTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DoccntlTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DoccntlTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DoccntlTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Doccntl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Doccntl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DoccntlTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Doccntl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DoccntlTableMap::DATABASE_NAME);
            $criteria->add(DoccntlTableMap::COL_FOLDER, (array) $values, Criteria::IN);
        }

        $query = DoccntlQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DoccntlTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DoccntlTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the doccntl table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DoccntlQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Doccntl or Criteria object.
     *
     * @param mixed               $criteria Criteria or Doccntl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DoccntlTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Doccntl object
        }


        // Set the correct dbName
        $query = DoccntlQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DoccntlTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DoccntlTableMap::buildTableMap();
