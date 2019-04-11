<?php

namespace Map;

use \Catagory;
use \CatagoryQuery;
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
 * This class defines the structure of the 'catagory' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CatagoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CatagoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'catagory';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Catagory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Catagory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the catid field
     */
    const COL_CATID = 'catagory.catid';

    /**
     * the column name for the catdesc field
     */
    const COL_CATDESC = 'catagory.catdesc';

    /**
     * the column name for the displayOrder field
     */
    const COL_DISPLAYORDER = 'catagory.displayOrder';

    /**
     * the column name for the sub field
     */
    const COL_SUB = 'catagory.sub';

    /**
     * the column name for the parent field
     */
    const COL_PARENT = 'catagory.parent';

    /**
     * the column name for the cf field
     */
    const COL_CF = 'catagory.cf';

    /**
     * the column name for the pf field
     */
    const COL_PF = 'catagory.pf';

    /**
     * the column name for the cat1 field
     */
    const COL_CAT1 = 'catagory.cat1';

    /**
     * the column name for the fulcat field
     */
    const COL_FULCAT = 'catagory.fulcat';

    /**
     * the column name for the sdis field
     */
    const COL_SDIS = 'catagory.sdis';

    /**
     * the column name for the cata field
     */
    const COL_CATA = 'catagory.cata';

    /**
     * the column name for the catb field
     */
    const COL_CATB = 'catagory.catb';

    /**
     * the column name for the catc field
     */
    const COL_CATC = 'catagory.catc';

    /**
     * the column name for the catd field
     */
    const COL_CATD = 'catagory.catd';

    /**
     * the column name for the cate field
     */
    const COL_CATE = 'catagory.cate';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'catagory.image';

    /**
     * the column name for the shortdesc field
     */
    const COL_SHORTDESC = 'catagory.shortdesc';

    /**
     * the column name for the longdesc field
     */
    const COL_LONGDESC = 'catagory.longdesc';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'catagory.dummy';

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
        self::TYPE_PHPNAME       => array('Catid', 'Catdesc', 'Displayorder', 'Sub', 'Parent', 'Cf', 'Pf', 'Cat1', 'Fulcat', 'Sdis', 'Cata', 'Catb', 'Catc', 'Catd', 'Cate', 'Image', 'Shortdesc', 'Longdesc', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('catid', 'catdesc', 'displayorder', 'sub', 'parent', 'cf', 'pf', 'cat1', 'fulcat', 'sdis', 'cata', 'catb', 'catc', 'catd', 'cate', 'image', 'shortdesc', 'longdesc', 'dummy', ),
        self::TYPE_COLNAME       => array(CatagoryTableMap::COL_CATID, CatagoryTableMap::COL_CATDESC, CatagoryTableMap::COL_DISPLAYORDER, CatagoryTableMap::COL_SUB, CatagoryTableMap::COL_PARENT, CatagoryTableMap::COL_CF, CatagoryTableMap::COL_PF, CatagoryTableMap::COL_CAT1, CatagoryTableMap::COL_FULCAT, CatagoryTableMap::COL_SDIS, CatagoryTableMap::COL_CATA, CatagoryTableMap::COL_CATB, CatagoryTableMap::COL_CATC, CatagoryTableMap::COL_CATD, CatagoryTableMap::COL_CATE, CatagoryTableMap::COL_IMAGE, CatagoryTableMap::COL_SHORTDESC, CatagoryTableMap::COL_LONGDESC, CatagoryTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('catid', 'catdesc', 'displayOrder', 'sub', 'parent', 'cf', 'pf', 'cat1', 'fulcat', 'sdis', 'cata', 'catb', 'catc', 'catd', 'cate', 'image', 'shortdesc', 'longdesc', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Catid' => 0, 'Catdesc' => 1, 'Displayorder' => 2, 'Sub' => 3, 'Parent' => 4, 'Cf' => 5, 'Pf' => 6, 'Cat1' => 7, 'Fulcat' => 8, 'Sdis' => 9, 'Cata' => 10, 'Catb' => 11, 'Catc' => 12, 'Catd' => 13, 'Cate' => 14, 'Image' => 15, 'Shortdesc' => 16, 'Longdesc' => 17, 'Dummy' => 18, ),
        self::TYPE_CAMELNAME     => array('catid' => 0, 'catdesc' => 1, 'displayorder' => 2, 'sub' => 3, 'parent' => 4, 'cf' => 5, 'pf' => 6, 'cat1' => 7, 'fulcat' => 8, 'sdis' => 9, 'cata' => 10, 'catb' => 11, 'catc' => 12, 'catd' => 13, 'cate' => 14, 'image' => 15, 'shortdesc' => 16, 'longdesc' => 17, 'dummy' => 18, ),
        self::TYPE_COLNAME       => array(CatagoryTableMap::COL_CATID => 0, CatagoryTableMap::COL_CATDESC => 1, CatagoryTableMap::COL_DISPLAYORDER => 2, CatagoryTableMap::COL_SUB => 3, CatagoryTableMap::COL_PARENT => 4, CatagoryTableMap::COL_CF => 5, CatagoryTableMap::COL_PF => 6, CatagoryTableMap::COL_CAT1 => 7, CatagoryTableMap::COL_FULCAT => 8, CatagoryTableMap::COL_SDIS => 9, CatagoryTableMap::COL_CATA => 10, CatagoryTableMap::COL_CATB => 11, CatagoryTableMap::COL_CATC => 12, CatagoryTableMap::COL_CATD => 13, CatagoryTableMap::COL_CATE => 14, CatagoryTableMap::COL_IMAGE => 15, CatagoryTableMap::COL_SHORTDESC => 16, CatagoryTableMap::COL_LONGDESC => 17, CatagoryTableMap::COL_DUMMY => 18, ),
        self::TYPE_FIELDNAME     => array('catid' => 0, 'catdesc' => 1, 'displayOrder' => 2, 'sub' => 3, 'parent' => 4, 'cf' => 5, 'pf' => 6, 'cat1' => 7, 'fulcat' => 8, 'sdis' => 9, 'cata' => 10, 'catb' => 11, 'catc' => 12, 'catd' => 13, 'cate' => 14, 'image' => 15, 'shortdesc' => 16, 'longdesc' => 17, 'dummy' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('catagory');
        $this->setPhpName('Catagory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Catagory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('catid', 'Catid', 'VARCHAR', true, 12, null);
        $this->addColumn('catdesc', 'Catdesc', 'VARCHAR', false, 30, null);
        $this->addPrimaryKey('displayOrder', 'Displayorder', 'INTEGER', true, 10, 0);
        $this->addColumn('sub', 'Sub', 'VARCHAR', false, 35, null);
        $this->addColumn('parent', 'Parent', 'VARCHAR', false, 35, null);
        $this->addColumn('cf', 'Cf', 'VARCHAR', false, 1, null);
        $this->addColumn('pf', 'Pf', 'VARCHAR', false, 1, null);
        $this->addColumn('cat1', 'Cat1', 'VARCHAR', false, 1, null);
        $this->addColumn('fulcat', 'Fulcat', 'VARCHAR', false, 72, null);
        $this->addColumn('sdis', 'Sdis', 'VARCHAR', false, 1, null);
        $this->addColumn('cata', 'Cata', 'VARCHAR', false, 35, null);
        $this->addColumn('catb', 'Catb', 'VARCHAR', false, 35, null);
        $this->addColumn('catc', 'Catc', 'VARCHAR', false, 35, null);
        $this->addColumn('catd', 'Catd', 'VARCHAR', false, 35, null);
        $this->addColumn('cate', 'Cate', 'VARCHAR', false, 35, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 35, null);
        $this->addColumn('shortdesc', 'Shortdesc', 'VARCHAR', false, 1000, null);
        $this->addColumn('longdesc', 'Longdesc', 'LONGVARCHAR', false, null, null);
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
     * @param \Catagory $obj A \Catagory object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getCatid() || is_scalar($obj->getCatid()) || is_callable([$obj->getCatid(), '__toString']) ? (string) $obj->getCatid() : $obj->getCatid()), (null === $obj->getDisplayorder() || is_scalar($obj->getDisplayorder()) || is_callable([$obj->getDisplayorder(), '__toString']) ? (string) $obj->getDisplayorder() : $obj->getDisplayorder())]);
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
     * @param mixed $value A \Catagory object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Catagory) {
                $key = serialize([(null === $value->getCatid() || is_scalar($value->getCatid()) || is_callable([$value->getCatid(), '__toString']) ? (string) $value->getCatid() : $value->getCatid()), (null === $value->getDisplayorder() || is_scalar($value->getDisplayorder()) || is_callable([$value->getDisplayorder(), '__toString']) ? (string) $value->getDisplayorder() : $value->getDisplayorder())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Catagory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CatagoryTableMap::CLASS_DEFAULT : CatagoryTableMap::OM_CLASS;
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
     * @return array           (Catagory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CatagoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CatagoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CatagoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CatagoryTableMap::OM_CLASS;
            /** @var Catagory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CatagoryTableMap::addInstanceToPool($obj, $key);
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
            $key = CatagoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CatagoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Catagory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CatagoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATID);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATDESC);
            $criteria->addSelectColumn(CatagoryTableMap::COL_DISPLAYORDER);
            $criteria->addSelectColumn(CatagoryTableMap::COL_SUB);
            $criteria->addSelectColumn(CatagoryTableMap::COL_PARENT);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CF);
            $criteria->addSelectColumn(CatagoryTableMap::COL_PF);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CAT1);
            $criteria->addSelectColumn(CatagoryTableMap::COL_FULCAT);
            $criteria->addSelectColumn(CatagoryTableMap::COL_SDIS);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATA);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATB);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATC);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATD);
            $criteria->addSelectColumn(CatagoryTableMap::COL_CATE);
            $criteria->addSelectColumn(CatagoryTableMap::COL_IMAGE);
            $criteria->addSelectColumn(CatagoryTableMap::COL_SHORTDESC);
            $criteria->addSelectColumn(CatagoryTableMap::COL_LONGDESC);
            $criteria->addSelectColumn(CatagoryTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.catid');
            $criteria->addSelectColumn($alias . '.catdesc');
            $criteria->addSelectColumn($alias . '.displayOrder');
            $criteria->addSelectColumn($alias . '.sub');
            $criteria->addSelectColumn($alias . '.parent');
            $criteria->addSelectColumn($alias . '.cf');
            $criteria->addSelectColumn($alias . '.pf');
            $criteria->addSelectColumn($alias . '.cat1');
            $criteria->addSelectColumn($alias . '.fulcat');
            $criteria->addSelectColumn($alias . '.sdis');
            $criteria->addSelectColumn($alias . '.cata');
            $criteria->addSelectColumn($alias . '.catb');
            $criteria->addSelectColumn($alias . '.catc');
            $criteria->addSelectColumn($alias . '.catd');
            $criteria->addSelectColumn($alias . '.cate');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.shortdesc');
            $criteria->addSelectColumn($alias . '.longdesc');
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
        return Propel::getServiceContainer()->getDatabaseMap(CatagoryTableMap::DATABASE_NAME)->getTable(CatagoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CatagoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CatagoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CatagoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Catagory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Catagory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CatagoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Catagory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CatagoryTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CatagoryTableMap::COL_CATID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CatagoryTableMap::COL_DISPLAYORDER, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CatagoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CatagoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CatagoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the catagory table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CatagoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Catagory or Criteria object.
     *
     * @param mixed               $criteria Criteria or Catagory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CatagoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Catagory object
        }


        // Set the correct dbName
        $query = CatagoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CatagoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CatagoryTableMap::buildTableMap();
