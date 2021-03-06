<?php

namespace Map;

use \Whseitempick;
use \WhseitempickQuery;
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
 * This class defines the structure of the 'whseitempick' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WhseitempickTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WhseitempickTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'whseitempick';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Whseitempick';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Whseitempick';

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
    const COL_SESSIONID = 'whseitempick.sessionid';

    /**
     * the column name for the ordn field
     */
    const COL_ORDN = 'whseitempick.ordn';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'whseitempick.itemid';

    /**
     * the column name for the recordnumber field
     */
    const COL_RECORDNUMBER = 'whseitempick.recordnumber';

    /**
     * the column name for the linenbr field
     */
    const COL_LINENBR = 'whseitempick.linenbr';

    /**
     * the column name for the sublinenbr field
     */
    const COL_SUBLINENBR = 'whseitempick.sublinenbr';

    /**
     * the column name for the bin field
     */
    const COL_BIN = 'whseitempick.bin';

    /**
     * the column name for the palletnbr field
     */
    const COL_PALLETNBR = 'whseitempick.palletnbr';

    /**
     * the column name for the barcode field
     */
    const COL_BARCODE = 'whseitempick.barcode';

    /**
     * the column name for the lotserialref field
     */
    const COL_LOTSERIALREF = 'whseitempick.lotserialref';

    /**
     * the column name for the lotserial field
     */
    const COL_LOTSERIAL = 'whseitempick.lotserial';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'whseitempick.qty';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Ordn', 'Itemid', 'Recordnumber', 'Linenbr', 'Sublinenbr', 'Bin', 'Palletnbr', 'Barcode', 'Lotserialref', 'Lotserial', 'Qty', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'ordn', 'itemid', 'recordnumber', 'linenbr', 'sublinenbr', 'bin', 'palletnbr', 'barcode', 'lotserialref', 'lotserial', 'qty', ),
        self::TYPE_COLNAME       => array(WhseitempickTableMap::COL_SESSIONID, WhseitempickTableMap::COL_ORDN, WhseitempickTableMap::COL_ITEMID, WhseitempickTableMap::COL_RECORDNUMBER, WhseitempickTableMap::COL_LINENBR, WhseitempickTableMap::COL_SUBLINENBR, WhseitempickTableMap::COL_BIN, WhseitempickTableMap::COL_PALLETNBR, WhseitempickTableMap::COL_BARCODE, WhseitempickTableMap::COL_LOTSERIALREF, WhseitempickTableMap::COL_LOTSERIAL, WhseitempickTableMap::COL_QTY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'ordn', 'itemid', 'recordnumber', 'linenbr', 'sublinenbr', 'bin', 'palletnbr', 'barcode', 'lotserialref', 'lotserial', 'qty', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Ordn' => 1, 'Itemid' => 2, 'Recordnumber' => 3, 'Linenbr' => 4, 'Sublinenbr' => 5, 'Bin' => 6, 'Palletnbr' => 7, 'Barcode' => 8, 'Lotserialref' => 9, 'Lotserial' => 10, 'Qty' => 11, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'ordn' => 1, 'itemid' => 2, 'recordnumber' => 3, 'linenbr' => 4, 'sublinenbr' => 5, 'bin' => 6, 'palletnbr' => 7, 'barcode' => 8, 'lotserialref' => 9, 'lotserial' => 10, 'qty' => 11, ),
        self::TYPE_COLNAME       => array(WhseitempickTableMap::COL_SESSIONID => 0, WhseitempickTableMap::COL_ORDN => 1, WhseitempickTableMap::COL_ITEMID => 2, WhseitempickTableMap::COL_RECORDNUMBER => 3, WhseitempickTableMap::COL_LINENBR => 4, WhseitempickTableMap::COL_SUBLINENBR => 5, WhseitempickTableMap::COL_BIN => 6, WhseitempickTableMap::COL_PALLETNBR => 7, WhseitempickTableMap::COL_BARCODE => 8, WhseitempickTableMap::COL_LOTSERIALREF => 9, WhseitempickTableMap::COL_LOTSERIAL => 10, WhseitempickTableMap::COL_QTY => 11, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'ordn' => 1, 'itemid' => 2, 'recordnumber' => 3, 'linenbr' => 4, 'sublinenbr' => 5, 'bin' => 6, 'palletnbr' => 7, 'barcode' => 8, 'lotserialref' => 9, 'lotserial' => 10, 'qty' => 11, ),
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
        $this->setName('whseitempick');
        $this->setPhpName('Whseitempick');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Whseitempick');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('ordn', 'Ordn', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('itemid', 'Itemid', 'VARCHAR', true, 45, null);
        $this->addPrimaryKey('recordnumber', 'Recordnumber', 'INTEGER', true, null, null);
        $this->addColumn('linenbr', 'Linenbr', 'INTEGER', false, 4, null);
        $this->addColumn('sublinenbr', 'Sublinenbr', 'INTEGER', false, 4, null);
        $this->addColumn('bin', 'Bin', 'VARCHAR', false, 12, null);
        $this->addColumn('palletnbr', 'Palletnbr', 'INTEGER', false, 5, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', false, 45, null);
        $this->addColumn('lotserialref', 'Lotserialref', 'VARCHAR', false, 45, null);
        $this->addColumn('lotserial', 'Lotserial', 'VARCHAR', false, 45, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 13, null);
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
     * @param \Whseitempick $obj A \Whseitempick object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getOrdn() || is_scalar($obj->getOrdn()) || is_callable([$obj->getOrdn(), '__toString']) ? (string) $obj->getOrdn() : $obj->getOrdn()), (null === $obj->getItemid() || is_scalar($obj->getItemid()) || is_callable([$obj->getItemid(), '__toString']) ? (string) $obj->getItemid() : $obj->getItemid()), (null === $obj->getRecordnumber() || is_scalar($obj->getRecordnumber()) || is_callable([$obj->getRecordnumber(), '__toString']) ? (string) $obj->getRecordnumber() : $obj->getRecordnumber())]);
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
     * @param mixed $value A \Whseitempick object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Whseitempick) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getOrdn() || is_scalar($value->getOrdn()) || is_callable([$value->getOrdn(), '__toString']) ? (string) $value->getOrdn() : $value->getOrdn()), (null === $value->getItemid() || is_scalar($value->getItemid()) || is_callable([$value->getItemid(), '__toString']) ? (string) $value->getItemid() : $value->getItemid()), (null === $value->getRecordnumber() || is_scalar($value->getRecordnumber()) || is_callable([$value->getRecordnumber(), '__toString']) ? (string) $value->getRecordnumber() : $value->getRecordnumber())]);

            } elseif (is_array($value) && count($value) === 4) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Whseitempick object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Ordn', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('Recordnumber', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? WhseitempickTableMap::CLASS_DEFAULT : WhseitempickTableMap::OM_CLASS;
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
     * @return array           (Whseitempick object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WhseitempickTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WhseitempickTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WhseitempickTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WhseitempickTableMap::OM_CLASS;
            /** @var Whseitempick $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WhseitempickTableMap::addInstanceToPool($obj, $key);
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
            $key = WhseitempickTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WhseitempickTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Whseitempick $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WhseitempickTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WhseitempickTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_ORDN);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_ITEMID);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_RECORDNUMBER);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_LINENBR);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_SUBLINENBR);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_BIN);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_PALLETNBR);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_BARCODE);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_LOTSERIALREF);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_LOTSERIAL);
            $criteria->addSelectColumn(WhseitempickTableMap::COL_QTY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.ordn');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.recordnumber');
            $criteria->addSelectColumn($alias . '.linenbr');
            $criteria->addSelectColumn($alias . '.sublinenbr');
            $criteria->addSelectColumn($alias . '.bin');
            $criteria->addSelectColumn($alias . '.palletnbr');
            $criteria->addSelectColumn($alias . '.barcode');
            $criteria->addSelectColumn($alias . '.lotserialref');
            $criteria->addSelectColumn($alias . '.lotserial');
            $criteria->addSelectColumn($alias . '.qty');
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
        return Propel::getServiceContainer()->getDatabaseMap(WhseitempickTableMap::DATABASE_NAME)->getTable(WhseitempickTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WhseitempickTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WhseitempickTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WhseitempickTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Whseitempick or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Whseitempick object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitempickTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Whseitempick) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WhseitempickTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(WhseitempickTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(WhseitempickTableMap::COL_ORDN, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(WhseitempickTableMap::COL_ITEMID, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(WhseitempickTableMap::COL_RECORDNUMBER, $value[3]));
                $criteria->addOr($criterion);
            }
        }

        $query = WhseitempickQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WhseitempickTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WhseitempickTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the whseitempick table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WhseitempickQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Whseitempick or Criteria object.
     *
     * @param mixed               $criteria Criteria or Whseitempick object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitempickTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Whseitempick object
        }


        // Set the correct dbName
        $query = WhseitempickQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WhseitempickTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WhseitempickTableMap::buildTableMap();
