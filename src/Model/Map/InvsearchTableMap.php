<?php

namespace Map;

use \Invsearch;
use \InvsearchQuery;
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
 * This class defines the structure of the 'invsearch' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InvsearchTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InvsearchTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'invsearch';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Invsearch';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Invsearch';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'invsearch.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'invsearch.recno';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'invsearch.itemid';

    /**
     * the column name for the xitemid field
     */
    const COL_XITEMID = 'invsearch.xitemid';

    /**
     * the column name for the xorigin field
     */
    const COL_XORIGIN = 'invsearch.xorigin';

    /**
     * the column name for the itemtype field
     */
    const COL_ITEMTYPE = 'invsearch.itemtype';

    /**
     * the column name for the lotserial field
     */
    const COL_LOTSERIAL = 'invsearch.lotserial';

    /**
     * the column name for the desc1 field
     */
    const COL_DESC1 = 'invsearch.desc1';

    /**
     * the column name for the desc2 field
     */
    const COL_DESC2 = 'invsearch.desc2';

    /**
     * the column name for the primebin field
     */
    const COL_PRIMEBIN = 'invsearch.primebin';

    /**
     * the column name for the bin field
     */
    const COL_BIN = 'invsearch.bin';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'invsearch.qty';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'invsearch.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'invsearch.time';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'invsearch.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Itemid', 'Xitemid', 'Xorigin', 'Itemtype', 'Lotserial', 'Desc1', 'Desc2', 'Primebin', 'Bin', 'Qty', 'Date', 'Time', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'itemid', 'xitemid', 'xorigin', 'itemtype', 'lotserial', 'desc1', 'desc2', 'primebin', 'bin', 'qty', 'date', 'time', 'dummy', ),
        self::TYPE_COLNAME       => array(InvsearchTableMap::COL_SESSIONID, InvsearchTableMap::COL_RECNO, InvsearchTableMap::COL_ITEMID, InvsearchTableMap::COL_XITEMID, InvsearchTableMap::COL_XORIGIN, InvsearchTableMap::COL_ITEMTYPE, InvsearchTableMap::COL_LOTSERIAL, InvsearchTableMap::COL_DESC1, InvsearchTableMap::COL_DESC2, InvsearchTableMap::COL_PRIMEBIN, InvsearchTableMap::COL_BIN, InvsearchTableMap::COL_QTY, InvsearchTableMap::COL_DATE, InvsearchTableMap::COL_TIME, InvsearchTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'itemid', 'xitemid', 'xorigin', 'itemtype', 'lotserial', 'desc1', 'desc2', 'primebin', 'bin', 'qty', 'date', 'time', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Itemid' => 2, 'Xitemid' => 3, 'Xorigin' => 4, 'Itemtype' => 5, 'Lotserial' => 6, 'Desc1' => 7, 'Desc2' => 8, 'Primebin' => 9, 'Bin' => 10, 'Qty' => 11, 'Date' => 12, 'Time' => 13, 'Dummy' => 14, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'itemid' => 2, 'xitemid' => 3, 'xorigin' => 4, 'itemtype' => 5, 'lotserial' => 6, 'desc1' => 7, 'desc2' => 8, 'primebin' => 9, 'bin' => 10, 'qty' => 11, 'date' => 12, 'time' => 13, 'dummy' => 14, ),
        self::TYPE_COLNAME       => array(InvsearchTableMap::COL_SESSIONID => 0, InvsearchTableMap::COL_RECNO => 1, InvsearchTableMap::COL_ITEMID => 2, InvsearchTableMap::COL_XITEMID => 3, InvsearchTableMap::COL_XORIGIN => 4, InvsearchTableMap::COL_ITEMTYPE => 5, InvsearchTableMap::COL_LOTSERIAL => 6, InvsearchTableMap::COL_DESC1 => 7, InvsearchTableMap::COL_DESC2 => 8, InvsearchTableMap::COL_PRIMEBIN => 9, InvsearchTableMap::COL_BIN => 10, InvsearchTableMap::COL_QTY => 11, InvsearchTableMap::COL_DATE => 12, InvsearchTableMap::COL_TIME => 13, InvsearchTableMap::COL_DUMMY => 14, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'itemid' => 2, 'xitemid' => 3, 'xorigin' => 4, 'itemtype' => 5, 'lotserial' => 6, 'desc1' => 7, 'desc2' => 8, 'primebin' => 9, 'bin' => 10, 'qty' => 11, 'date' => 12, 'time' => 13, 'dummy' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('invsearch');
        $this->setPhpName('Invsearch');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Invsearch');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 45, '');
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 5, 0);
        $this->addPrimaryKey('itemid', 'Itemid', 'VARCHAR', true, 45, '');
        $this->addColumn('xitemid', 'Xitemid', 'VARCHAR', false, 45, null);
        $this->addColumn('xorigin', 'Xorigin', 'VARCHAR', false, 45, null);
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 45, null);
        $this->addColumn('lotserial', 'Lotserial', 'VARCHAR', false, 45, null);
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 45, null);
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 45, null);
        $this->addColumn('primebin', 'Primebin', 'VARCHAR', false, 8, null);
        $this->addColumn('bin', 'Bin', 'VARCHAR', false, 8, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, 8, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
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
     * @param \Invsearch $obj A \Invsearch object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno()), (null === $obj->getItemid() || is_scalar($obj->getItemid()) || is_callable([$obj->getItemid(), '__toString']) ? (string) $obj->getItemid() : $obj->getItemid())]);
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
     * @param mixed $value A \Invsearch object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Invsearch) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno()), (null === $value->getItemid() || is_scalar($value->getItemid()) || is_callable([$value->getItemid(), '__toString']) ? (string) $value->getItemid() : $value->getItemid())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Invsearch object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)])]);
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
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InvsearchTableMap::CLASS_DEFAULT : InvsearchTableMap::OM_CLASS;
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
     * @return array           (Invsearch object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InvsearchTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InvsearchTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InvsearchTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InvsearchTableMap::OM_CLASS;
            /** @var Invsearch $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InvsearchTableMap::addInstanceToPool($obj, $key);
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
            $key = InvsearchTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InvsearchTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Invsearch $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InvsearchTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InvsearchTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(InvsearchTableMap::COL_RECNO);
            $criteria->addSelectColumn(InvsearchTableMap::COL_ITEMID);
            $criteria->addSelectColumn(InvsearchTableMap::COL_XITEMID);
            $criteria->addSelectColumn(InvsearchTableMap::COL_XORIGIN);
            $criteria->addSelectColumn(InvsearchTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(InvsearchTableMap::COL_LOTSERIAL);
            $criteria->addSelectColumn(InvsearchTableMap::COL_DESC1);
            $criteria->addSelectColumn(InvsearchTableMap::COL_DESC2);
            $criteria->addSelectColumn(InvsearchTableMap::COL_PRIMEBIN);
            $criteria->addSelectColumn(InvsearchTableMap::COL_BIN);
            $criteria->addSelectColumn(InvsearchTableMap::COL_QTY);
            $criteria->addSelectColumn(InvsearchTableMap::COL_DATE);
            $criteria->addSelectColumn(InvsearchTableMap::COL_TIME);
            $criteria->addSelectColumn(InvsearchTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.xitemid');
            $criteria->addSelectColumn($alias . '.xorigin');
            $criteria->addSelectColumn($alias . '.itemtype');
            $criteria->addSelectColumn($alias . '.lotserial');
            $criteria->addSelectColumn($alias . '.desc1');
            $criteria->addSelectColumn($alias . '.desc2');
            $criteria->addSelectColumn($alias . '.primebin');
            $criteria->addSelectColumn($alias . '.bin');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
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
        return Propel::getServiceContainer()->getDatabaseMap(InvsearchTableMap::DATABASE_NAME)->getTable(InvsearchTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InvsearchTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InvsearchTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InvsearchTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Invsearch or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Invsearch object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InvsearchTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Invsearch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InvsearchTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(InvsearchTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(InvsearchTableMap::COL_RECNO, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(InvsearchTableMap::COL_ITEMID, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = InvsearchQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InvsearchTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InvsearchTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the invsearch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InvsearchQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Invsearch or Criteria object.
     *
     * @param mixed               $criteria Criteria or Invsearch object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvsearchTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Invsearch object
        }


        // Set the correct dbName
        $query = InvsearchQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InvsearchTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InvsearchTableMap::buildTableMap();
