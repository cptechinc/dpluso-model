<?php

namespace Map;

use \Vmenu;
use \VmenuQuery;
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
 * This class defines the structure of the 'vmenu' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class VmenuTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.VmenuTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'vmenu';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Vmenu';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Vmenu';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'vmenu.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'vmenu.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'vmenu.date';

    /**
     * the column name for the cata field
     */
    const COL_CATA = 'vmenu.cata';

    /**
     * the column name for the catb field
     */
    const COL_CATB = 'vmenu.catb';

    /**
     * the column name for the catc field
     */
    const COL_CATC = 'vmenu.catc';

    /**
     * the column name for the catd field
     */
    const COL_CATD = 'vmenu.catd';

    /**
     * the column name for the cate field
     */
    const COL_CATE = 'vmenu.cate';

    /**
     * the column name for the catid field
     */
    const COL_CATID = 'vmenu.catid';

    /**
     * the column name for the dispord field
     */
    const COL_DISPORD = 'vmenu.dispord';

    /**
     * the column name for the cat1 field
     */
    const COL_CAT1 = 'vmenu.cat1';

    /**
     * the column name for the catdesc field
     */
    const COL_CATDESC = 'vmenu.catdesc';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Cata', 'Catb', 'Catc', 'Catd', 'Cate', 'Catid', 'Dispord', 'Cat1', 'Catdesc', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'cata', 'catb', 'catc', 'catd', 'cate', 'catid', 'dispord', 'cat1', 'catdesc', ),
        self::TYPE_COLNAME       => array(VmenuTableMap::COL_SESSIONID, VmenuTableMap::COL_RECNO, VmenuTableMap::COL_DATE, VmenuTableMap::COL_CATA, VmenuTableMap::COL_CATB, VmenuTableMap::COL_CATC, VmenuTableMap::COL_CATD, VmenuTableMap::COL_CATE, VmenuTableMap::COL_CATID, VmenuTableMap::COL_DISPORD, VmenuTableMap::COL_CAT1, VmenuTableMap::COL_CATDESC, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'cata', 'catb', 'catc', 'catd', 'cate', 'catid', 'dispord', 'cat1', 'catdesc', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Cata' => 3, 'Catb' => 4, 'Catc' => 5, 'Catd' => 6, 'Cate' => 7, 'Catid' => 8, 'Dispord' => 9, 'Cat1' => 10, 'Catdesc' => 11, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'cata' => 3, 'catb' => 4, 'catc' => 5, 'catd' => 6, 'cate' => 7, 'catid' => 8, 'dispord' => 9, 'cat1' => 10, 'catdesc' => 11, ),
        self::TYPE_COLNAME       => array(VmenuTableMap::COL_SESSIONID => 0, VmenuTableMap::COL_RECNO => 1, VmenuTableMap::COL_DATE => 2, VmenuTableMap::COL_CATA => 3, VmenuTableMap::COL_CATB => 4, VmenuTableMap::COL_CATC => 5, VmenuTableMap::COL_CATD => 6, VmenuTableMap::COL_CATE => 7, VmenuTableMap::COL_CATID => 8, VmenuTableMap::COL_DISPORD => 9, VmenuTableMap::COL_CAT1 => 10, VmenuTableMap::COL_CATDESC => 11, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'cata' => 3, 'catb' => 4, 'catc' => 5, 'catd' => 6, 'cate' => 7, 'catid' => 8, 'dispord' => 9, 'cat1' => 10, 'catdesc' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('vmenu');
        $this->setPhpName('Vmenu');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Vmenu');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, '');
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 35, null);
        $this->addColumn('date', 'Date', 'VARCHAR', false, 20, null);
        $this->addColumn('cata', 'Cata', 'VARCHAR', false, 35, null);
        $this->addColumn('catb', 'Catb', 'VARCHAR', false, 35, null);
        $this->addColumn('catc', 'Catc', 'VARCHAR', false, 35, null);
        $this->addColumn('catd', 'Catd', 'VARCHAR', false, 35, null);
        $this->addColumn('cate', 'Cate', 'VARCHAR', false, 35, null);
        $this->addColumn('catid', 'Catid', 'VARCHAR', false, 35, null);
        $this->addColumn('dispord', 'Dispord', 'INTEGER', false, 35, null);
        $this->addColumn('cat1', 'Cat1', 'VARCHAR', false, 2, null);
        $this->addColumn('catdesc', 'Catdesc', 'VARCHAR', false, 70, null);
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
     * @param \Vmenu $obj A \Vmenu object.
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
     * @param mixed $value A \Vmenu object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Vmenu) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Vmenu object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? VmenuTableMap::CLASS_DEFAULT : VmenuTableMap::OM_CLASS;
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
     * @return array           (Vmenu object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = VmenuTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VmenuTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VmenuTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VmenuTableMap::OM_CLASS;
            /** @var Vmenu $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VmenuTableMap::addInstanceToPool($obj, $key);
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
            $key = VmenuTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VmenuTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Vmenu $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VmenuTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(VmenuTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(VmenuTableMap::COL_RECNO);
            $criteria->addSelectColumn(VmenuTableMap::COL_DATE);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATA);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATB);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATC);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATD);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATE);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATID);
            $criteria->addSelectColumn(VmenuTableMap::COL_DISPORD);
            $criteria->addSelectColumn(VmenuTableMap::COL_CAT1);
            $criteria->addSelectColumn(VmenuTableMap::COL_CATDESC);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.cata');
            $criteria->addSelectColumn($alias . '.catb');
            $criteria->addSelectColumn($alias . '.catc');
            $criteria->addSelectColumn($alias . '.catd');
            $criteria->addSelectColumn($alias . '.cate');
            $criteria->addSelectColumn($alias . '.catid');
            $criteria->addSelectColumn($alias . '.dispord');
            $criteria->addSelectColumn($alias . '.cat1');
            $criteria->addSelectColumn($alias . '.catdesc');
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
        return Propel::getServiceContainer()->getDatabaseMap(VmenuTableMap::DATABASE_NAME)->getTable(VmenuTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(VmenuTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(VmenuTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new VmenuTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Vmenu or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Vmenu object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(VmenuTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Vmenu) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VmenuTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(VmenuTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(VmenuTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = VmenuQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VmenuTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VmenuTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the vmenu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return VmenuQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Vmenu or Criteria object.
     *
     * @param mixed               $criteria Criteria or Vmenu object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VmenuTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Vmenu object
        }

        if ($criteria->containsKey(VmenuTableMap::COL_RECNO) && $criteria->keyContainsValue(VmenuTableMap::COL_RECNO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VmenuTableMap::COL_RECNO.')');
        }


        // Set the correct dbName
        $query = VmenuQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // VmenuTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
VmenuTableMap::buildTableMap();
