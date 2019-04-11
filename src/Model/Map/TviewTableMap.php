<?php

namespace Map;

use \Tview;
use \TviewQuery;
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
 * This class defines the structure of the 'tview' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TviewTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TviewTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tview';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tview';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tview';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'tview.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'tview.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'tview.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'tview.time';

    /**
     * the column name for the c1 field
     */
    const COL_C1 = 'tview.c1';

    /**
     * the column name for the c2 field
     */
    const COL_C2 = 'tview.c2';

    /**
     * the column name for the c3 field
     */
    const COL_C3 = 'tview.c3';

    /**
     * the column name for the c4 field
     */
    const COL_C4 = 'tview.c4';

    /**
     * the column name for the c5 field
     */
    const COL_C5 = 'tview.c5';

    /**
     * the column name for the c6 field
     */
    const COL_C6 = 'tview.c6';

    /**
     * the column name for the c7 field
     */
    const COL_C7 = 'tview.c7';

    /**
     * the column name for the c8 field
     */
    const COL_C8 = 'tview.c8';

    /**
     * the column name for the c9 field
     */
    const COL_C9 = 'tview.c9';

    /**
     * the column name for the c10 field
     */
    const COL_C10 = 'tview.c10';

    /**
     * the column name for the famid field
     */
    const COL_FAMID = 'tview.famid';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'tview.itemid';

    /**
     * the column name for the picid field
     */
    const COL_PICID = 'tview.picid';

    /**
     * the column name for the vidinffg field
     */
    const COL_VIDINFFG = 'tview.vidinffg';

    /**
     * the column name for the vidinflk field
     */
    const COL_VIDINFLK = 'tview.vidinflk';

    /**
     * the column name for the message field
     */
    const COL_MESSAGE = 'tview.message';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'tview.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'Famid', 'Itemid', 'Picid', 'Vidinffg', 'Vidinflk', 'Message', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'famid', 'itemid', 'picid', 'vidinffg', 'vidinflk', 'message', 'dummy', ),
        self::TYPE_COLNAME       => array(TviewTableMap::COL_SESSIONID, TviewTableMap::COL_RECNO, TviewTableMap::COL_DATE, TviewTableMap::COL_TIME, TviewTableMap::COL_C1, TviewTableMap::COL_C2, TviewTableMap::COL_C3, TviewTableMap::COL_C4, TviewTableMap::COL_C5, TviewTableMap::COL_C6, TviewTableMap::COL_C7, TviewTableMap::COL_C8, TviewTableMap::COL_C9, TviewTableMap::COL_C10, TviewTableMap::COL_FAMID, TviewTableMap::COL_ITEMID, TviewTableMap::COL_PICID, TviewTableMap::COL_VIDINFFG, TviewTableMap::COL_VIDINFLK, TviewTableMap::COL_MESSAGE, TviewTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'famid', 'itemid', 'picid', 'vidinffg', 'vidinflk', 'message', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'C1' => 4, 'C2' => 5, 'C3' => 6, 'C4' => 7, 'C5' => 8, 'C6' => 9, 'C7' => 10, 'C8' => 11, 'C9' => 12, 'C10' => 13, 'Famid' => 14, 'Itemid' => 15, 'Picid' => 16, 'Vidinffg' => 17, 'Vidinflk' => 18, 'Message' => 19, 'Dummy' => 20, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'c1' => 4, 'c2' => 5, 'c3' => 6, 'c4' => 7, 'c5' => 8, 'c6' => 9, 'c7' => 10, 'c8' => 11, 'c9' => 12, 'c10' => 13, 'famid' => 14, 'itemid' => 15, 'picid' => 16, 'vidinffg' => 17, 'vidinflk' => 18, 'message' => 19, 'dummy' => 20, ),
        self::TYPE_COLNAME       => array(TviewTableMap::COL_SESSIONID => 0, TviewTableMap::COL_RECNO => 1, TviewTableMap::COL_DATE => 2, TviewTableMap::COL_TIME => 3, TviewTableMap::COL_C1 => 4, TviewTableMap::COL_C2 => 5, TviewTableMap::COL_C3 => 6, TviewTableMap::COL_C4 => 7, TviewTableMap::COL_C5 => 8, TviewTableMap::COL_C6 => 9, TviewTableMap::COL_C7 => 10, TviewTableMap::COL_C8 => 11, TviewTableMap::COL_C9 => 12, TviewTableMap::COL_C10 => 13, TviewTableMap::COL_FAMID => 14, TviewTableMap::COL_ITEMID => 15, TviewTableMap::COL_PICID => 16, TviewTableMap::COL_VIDINFFG => 17, TviewTableMap::COL_VIDINFLK => 18, TviewTableMap::COL_MESSAGE => 19, TviewTableMap::COL_DUMMY => 20, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'c1' => 4, 'c2' => 5, 'c3' => 6, 'c4' => 7, 'c5' => 8, 'c6' => 9, 'c7' => 10, 'c8' => 11, 'c9' => 12, 'c10' => 13, 'famid' => 14, 'itemid' => 15, 'picid' => 16, 'vidinffg' => 17, 'vidinflk' => 18, 'message' => 19, 'dummy' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $this->setName('tview');
        $this->setPhpName('Tview');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tview');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, '');
        $this->addPrimaryKey('recno', 'Recno', 'VARCHAR', true, 35, '');
        $this->addColumn('date', 'Date', 'VARCHAR', false, 35, null);
        $this->addColumn('time', 'Time', 'VARCHAR', false, 35, null);
        $this->addColumn('c1', 'C1', 'VARCHAR', false, 100, null);
        $this->addColumn('c2', 'C2', 'VARCHAR', false, 100, null);
        $this->addColumn('c3', 'C3', 'VARCHAR', false, 100, null);
        $this->addColumn('c4', 'C4', 'VARCHAR', false, 100, null);
        $this->addColumn('c5', 'C5', 'VARCHAR', false, 100, null);
        $this->addColumn('c6', 'C6', 'VARCHAR', false, 100, null);
        $this->addColumn('c7', 'C7', 'VARCHAR', false, 100, null);
        $this->addColumn('c8', 'C8', 'VARCHAR', false, 100, null);
        $this->addColumn('c9', 'C9', 'VARCHAR', false, 100, null);
        $this->addColumn('c10', 'C10', 'VARCHAR', false, 100, null);
        $this->addColumn('famid', 'Famid', 'VARCHAR', false, 35, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 35, null);
        $this->addColumn('picid', 'Picid', 'VARCHAR', false, 35, null);
        $this->addColumn('vidinffg', 'Vidinffg', 'VARCHAR', false, 1, null);
        $this->addColumn('vidinflk', 'Vidinflk', 'VARCHAR', false, 200, null);
        $this->addColumn('message', 'Message', 'VARCHAR', false, 35, null);
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
     * @param \Tview $obj A \Tview object.
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
     * @param mixed $value A \Tview object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Tview) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Tview object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        $pks[] = (string) $row[
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
        return $withPrefix ? TviewTableMap::CLASS_DEFAULT : TviewTableMap::OM_CLASS;
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
     * @return array           (Tview object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TviewTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TviewTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TviewTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TviewTableMap::OM_CLASS;
            /** @var Tview $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TviewTableMap::addInstanceToPool($obj, $key);
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
            $key = TviewTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TviewTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tview $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TviewTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TviewTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(TviewTableMap::COL_RECNO);
            $criteria->addSelectColumn(TviewTableMap::COL_DATE);
            $criteria->addSelectColumn(TviewTableMap::COL_TIME);
            $criteria->addSelectColumn(TviewTableMap::COL_C1);
            $criteria->addSelectColumn(TviewTableMap::COL_C2);
            $criteria->addSelectColumn(TviewTableMap::COL_C3);
            $criteria->addSelectColumn(TviewTableMap::COL_C4);
            $criteria->addSelectColumn(TviewTableMap::COL_C5);
            $criteria->addSelectColumn(TviewTableMap::COL_C6);
            $criteria->addSelectColumn(TviewTableMap::COL_C7);
            $criteria->addSelectColumn(TviewTableMap::COL_C8);
            $criteria->addSelectColumn(TviewTableMap::COL_C9);
            $criteria->addSelectColumn(TviewTableMap::COL_C10);
            $criteria->addSelectColumn(TviewTableMap::COL_FAMID);
            $criteria->addSelectColumn(TviewTableMap::COL_ITEMID);
            $criteria->addSelectColumn(TviewTableMap::COL_PICID);
            $criteria->addSelectColumn(TviewTableMap::COL_VIDINFFG);
            $criteria->addSelectColumn(TviewTableMap::COL_VIDINFLK);
            $criteria->addSelectColumn(TviewTableMap::COL_MESSAGE);
            $criteria->addSelectColumn(TviewTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.c1');
            $criteria->addSelectColumn($alias . '.c2');
            $criteria->addSelectColumn($alias . '.c3');
            $criteria->addSelectColumn($alias . '.c4');
            $criteria->addSelectColumn($alias . '.c5');
            $criteria->addSelectColumn($alias . '.c6');
            $criteria->addSelectColumn($alias . '.c7');
            $criteria->addSelectColumn($alias . '.c8');
            $criteria->addSelectColumn($alias . '.c9');
            $criteria->addSelectColumn($alias . '.c10');
            $criteria->addSelectColumn($alias . '.famid');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.picid');
            $criteria->addSelectColumn($alias . '.vidinffg');
            $criteria->addSelectColumn($alias . '.vidinflk');
            $criteria->addSelectColumn($alias . '.message');
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
        return Propel::getServiceContainer()->getDatabaseMap(TviewTableMap::DATABASE_NAME)->getTable(TviewTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TviewTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TviewTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TviewTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tview or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tview object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TviewTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tview) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TviewTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(TviewTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(TviewTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = TviewQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TviewTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TviewTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tview table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TviewQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tview or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tview object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TviewTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tview object
        }


        // Set the correct dbName
        $query = TviewQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TviewTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TviewTableMap::buildTableMap();
