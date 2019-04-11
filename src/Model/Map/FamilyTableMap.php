<?php

namespace Map;

use \Family;
use \FamilyQuery;
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
 * This class defines the structure of the 'family' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FamilyTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FamilyTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'family';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Family';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Family';

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
     * the column name for the famID field
     */
    const COL_FAMID = 'family.famID';

    /**
     * the column name for the name1 field
     */
    const COL_NAME1 = 'family.name1';

    /**
     * the column name for the name2 field
     */
    const COL_NAME2 = 'family.name2';

    /**
     * the column name for the name3 field
     */
    const COL_NAME3 = 'family.name3';

    /**
     * the column name for the longdesc field
     */
    const COL_LONGDESC = 'family.longdesc';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'family.image';

    /**
     * the column name for the speca field
     */
    const COL_SPECA = 'family.speca';

    /**
     * the column name for the specb field
     */
    const COL_SPECB = 'family.specb';

    /**
     * the column name for the specc field
     */
    const COL_SPECC = 'family.specc';

    /**
     * the column name for the specd field
     */
    const COL_SPECD = 'family.specd';

    /**
     * the column name for the spece field
     */
    const COL_SPECE = 'family.spece';

    /**
     * the column name for the specf field
     */
    const COL_SPECF = 'family.specf';

    /**
     * the column name for the specg field
     */
    const COL_SPECG = 'family.specg';

    /**
     * the column name for the spech field
     */
    const COL_SPECH = 'family.spech';

    /**
     * the column name for the shortdesc field
     */
    const COL_SHORTDESC = 'family.shortdesc';

    /**
     * the column name for the catid field
     */
    const COL_CATID = 'family.catid';

    /**
     * the column name for the tview field
     */
    const COL_TVIEW = 'family.tview';

    /**
     * the column name for the ftype field
     */
    const COL_FTYPE = 'family.ftype';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'family.dummy';

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
        self::TYPE_PHPNAME       => array('Famid', 'Name1', 'Name2', 'Name3', 'Longdesc', 'Image', 'Speca', 'Specb', 'Specc', 'Specd', 'Spece', 'Specf', 'Specg', 'Spech', 'Shortdesc', 'Catid', 'Tview', 'Ftype', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('famid', 'name1', 'name2', 'name3', 'longdesc', 'image', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'shortdesc', 'catid', 'tview', 'ftype', 'dummy', ),
        self::TYPE_COLNAME       => array(FamilyTableMap::COL_FAMID, FamilyTableMap::COL_NAME1, FamilyTableMap::COL_NAME2, FamilyTableMap::COL_NAME3, FamilyTableMap::COL_LONGDESC, FamilyTableMap::COL_IMAGE, FamilyTableMap::COL_SPECA, FamilyTableMap::COL_SPECB, FamilyTableMap::COL_SPECC, FamilyTableMap::COL_SPECD, FamilyTableMap::COL_SPECE, FamilyTableMap::COL_SPECF, FamilyTableMap::COL_SPECG, FamilyTableMap::COL_SPECH, FamilyTableMap::COL_SHORTDESC, FamilyTableMap::COL_CATID, FamilyTableMap::COL_TVIEW, FamilyTableMap::COL_FTYPE, FamilyTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('famID', 'name1', 'name2', 'name3', 'longdesc', 'image', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'shortdesc', 'catid', 'tview', 'ftype', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Famid' => 0, 'Name1' => 1, 'Name2' => 2, 'Name3' => 3, 'Longdesc' => 4, 'Image' => 5, 'Speca' => 6, 'Specb' => 7, 'Specc' => 8, 'Specd' => 9, 'Spece' => 10, 'Specf' => 11, 'Specg' => 12, 'Spech' => 13, 'Shortdesc' => 14, 'Catid' => 15, 'Tview' => 16, 'Ftype' => 17, 'Dummy' => 18, ),
        self::TYPE_CAMELNAME     => array('famid' => 0, 'name1' => 1, 'name2' => 2, 'name3' => 3, 'longdesc' => 4, 'image' => 5, 'speca' => 6, 'specb' => 7, 'specc' => 8, 'specd' => 9, 'spece' => 10, 'specf' => 11, 'specg' => 12, 'spech' => 13, 'shortdesc' => 14, 'catid' => 15, 'tview' => 16, 'ftype' => 17, 'dummy' => 18, ),
        self::TYPE_COLNAME       => array(FamilyTableMap::COL_FAMID => 0, FamilyTableMap::COL_NAME1 => 1, FamilyTableMap::COL_NAME2 => 2, FamilyTableMap::COL_NAME3 => 3, FamilyTableMap::COL_LONGDESC => 4, FamilyTableMap::COL_IMAGE => 5, FamilyTableMap::COL_SPECA => 6, FamilyTableMap::COL_SPECB => 7, FamilyTableMap::COL_SPECC => 8, FamilyTableMap::COL_SPECD => 9, FamilyTableMap::COL_SPECE => 10, FamilyTableMap::COL_SPECF => 11, FamilyTableMap::COL_SPECG => 12, FamilyTableMap::COL_SPECH => 13, FamilyTableMap::COL_SHORTDESC => 14, FamilyTableMap::COL_CATID => 15, FamilyTableMap::COL_TVIEW => 16, FamilyTableMap::COL_FTYPE => 17, FamilyTableMap::COL_DUMMY => 18, ),
        self::TYPE_FIELDNAME     => array('famID' => 0, 'name1' => 1, 'name2' => 2, 'name3' => 3, 'longdesc' => 4, 'image' => 5, 'speca' => 6, 'specb' => 7, 'specc' => 8, 'specd' => 9, 'spece' => 10, 'specf' => 11, 'specg' => 12, 'spech' => 13, 'shortdesc' => 14, 'catid' => 15, 'tview' => 16, 'ftype' => 17, 'dummy' => 18, ),
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
        $this->setName('family');
        $this->setPhpName('Family');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Family');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('famID', 'Famid', 'VARCHAR', true, 30, '');
        $this->addColumn('name1', 'Name1', 'VARCHAR', false, 35, null);
        $this->addColumn('name2', 'Name2', 'VARCHAR', false, 35, null);
        $this->addColumn('name3', 'Name3', 'VARCHAR', false, 35, null);
        $this->addColumn('longdesc', 'Longdesc', 'LONGVARCHAR', false, null, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 200, null);
        $this->addColumn('speca', 'Speca', 'VARCHAR', false, 200, null);
        $this->addColumn('specb', 'Specb', 'VARCHAR', false, 200, null);
        $this->addColumn('specc', 'Specc', 'VARCHAR', false, 200, null);
        $this->addColumn('specd', 'Specd', 'VARCHAR', false, 200, null);
        $this->addColumn('spece', 'Spece', 'VARCHAR', false, 200, null);
        $this->addColumn('specf', 'Specf', 'VARCHAR', false, 200, null);
        $this->addColumn('specg', 'Specg', 'VARCHAR', false, 200, null);
        $this->addColumn('spech', 'Spech', 'VARCHAR', false, 200, null);
        $this->addColumn('shortdesc', 'Shortdesc', 'LONGVARCHAR', false, null, null);
        $this->addColumn('catid', 'Catid', 'VARCHAR', true, 12, null);
        $this->addColumn('tview', 'Tview', 'VARCHAR', false, 1, null);
        $this->addColumn('ftype', 'Ftype', 'VARCHAR', false, 1, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? FamilyTableMap::CLASS_DEFAULT : FamilyTableMap::OM_CLASS;
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
     * @return array           (Family object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FamilyTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FamilyTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FamilyTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FamilyTableMap::OM_CLASS;
            /** @var Family $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FamilyTableMap::addInstanceToPool($obj, $key);
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
            $key = FamilyTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FamilyTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Family $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FamilyTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FamilyTableMap::COL_FAMID);
            $criteria->addSelectColumn(FamilyTableMap::COL_NAME1);
            $criteria->addSelectColumn(FamilyTableMap::COL_NAME2);
            $criteria->addSelectColumn(FamilyTableMap::COL_NAME3);
            $criteria->addSelectColumn(FamilyTableMap::COL_LONGDESC);
            $criteria->addSelectColumn(FamilyTableMap::COL_IMAGE);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECA);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECB);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECC);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECD);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECE);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECF);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECG);
            $criteria->addSelectColumn(FamilyTableMap::COL_SPECH);
            $criteria->addSelectColumn(FamilyTableMap::COL_SHORTDESC);
            $criteria->addSelectColumn(FamilyTableMap::COL_CATID);
            $criteria->addSelectColumn(FamilyTableMap::COL_TVIEW);
            $criteria->addSelectColumn(FamilyTableMap::COL_FTYPE);
            $criteria->addSelectColumn(FamilyTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.famID');
            $criteria->addSelectColumn($alias . '.name1');
            $criteria->addSelectColumn($alias . '.name2');
            $criteria->addSelectColumn($alias . '.name3');
            $criteria->addSelectColumn($alias . '.longdesc');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.speca');
            $criteria->addSelectColumn($alias . '.specb');
            $criteria->addSelectColumn($alias . '.specc');
            $criteria->addSelectColumn($alias . '.specd');
            $criteria->addSelectColumn($alias . '.spece');
            $criteria->addSelectColumn($alias . '.specf');
            $criteria->addSelectColumn($alias . '.specg');
            $criteria->addSelectColumn($alias . '.spech');
            $criteria->addSelectColumn($alias . '.shortdesc');
            $criteria->addSelectColumn($alias . '.catid');
            $criteria->addSelectColumn($alias . '.tview');
            $criteria->addSelectColumn($alias . '.ftype');
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
        return Propel::getServiceContainer()->getDatabaseMap(FamilyTableMap::DATABASE_NAME)->getTable(FamilyTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FamilyTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FamilyTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FamilyTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Family or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Family object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FamilyTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Family) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FamilyTableMap::DATABASE_NAME);
            $criteria->add(FamilyTableMap::COL_FAMID, (array) $values, Criteria::IN);
        }

        $query = FamilyQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FamilyTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FamilyTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the family table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FamilyQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Family or Criteria object.
     *
     * @param mixed               $criteria Criteria or Family object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilyTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Family object
        }


        // Set the correct dbName
        $query = FamilyQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FamilyTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FamilyTableMap::buildTableMap();
