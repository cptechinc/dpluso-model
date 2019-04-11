<?php

namespace Map;

use \Vendors;
use \VendorsQuery;
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
 * This class defines the structure of the 'vendors' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class VendorsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.VendorsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'vendors';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Vendors';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Vendors';

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
     * the column name for the vendid field
     */
    const COL_VENDID = 'vendors.vendid';

    /**
     * the column name for the shipfrom field
     */
    const COL_SHIPFROM = 'vendors.shipfrom';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'vendors.name';

    /**
     * the column name for the address1 field
     */
    const COL_ADDRESS1 = 'vendors.address1';

    /**
     * the column name for the address2 field
     */
    const COL_ADDRESS2 = 'vendors.address2';

    /**
     * the column name for the address3 field
     */
    const COL_ADDRESS3 = 'vendors.address3';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'vendors.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'vendors.state';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'vendors.zip';

    /**
     * the column name for the country field
     */
    const COL_COUNTRY = 'vendors.country';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'vendors.phone';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'vendors.fax';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'vendors.email';

    /**
     * the column name for the createtime field
     */
    const COL_CREATETIME = 'vendors.createtime';

    /**
     * the column name for the createdate field
     */
    const COL_CREATEDATE = 'vendors.createdate';

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
        self::TYPE_PHPNAME       => array('Vendid', 'Shipfrom', 'Name', 'Address1', 'Address2', 'Address3', 'City', 'State', 'Zip', 'Country', 'Phone', 'Fax', 'Email', 'Createtime', 'Createdate', ),
        self::TYPE_CAMELNAME     => array('vendid', 'shipfrom', 'name', 'address1', 'address2', 'address3', 'city', 'state', 'zip', 'country', 'phone', 'fax', 'email', 'createtime', 'createdate', ),
        self::TYPE_COLNAME       => array(VendorsTableMap::COL_VENDID, VendorsTableMap::COL_SHIPFROM, VendorsTableMap::COL_NAME, VendorsTableMap::COL_ADDRESS1, VendorsTableMap::COL_ADDRESS2, VendorsTableMap::COL_ADDRESS3, VendorsTableMap::COL_CITY, VendorsTableMap::COL_STATE, VendorsTableMap::COL_ZIP, VendorsTableMap::COL_COUNTRY, VendorsTableMap::COL_PHONE, VendorsTableMap::COL_FAX, VendorsTableMap::COL_EMAIL, VendorsTableMap::COL_CREATETIME, VendorsTableMap::COL_CREATEDATE, ),
        self::TYPE_FIELDNAME     => array('vendid', 'shipfrom', 'name', 'address1', 'address2', 'address3', 'city', 'state', 'zip', 'country', 'phone', 'fax', 'email', 'createtime', 'createdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Vendid' => 0, 'Shipfrom' => 1, 'Name' => 2, 'Address1' => 3, 'Address2' => 4, 'Address3' => 5, 'City' => 6, 'State' => 7, 'Zip' => 8, 'Country' => 9, 'Phone' => 10, 'Fax' => 11, 'Email' => 12, 'Createtime' => 13, 'Createdate' => 14, ),
        self::TYPE_CAMELNAME     => array('vendid' => 0, 'shipfrom' => 1, 'name' => 2, 'address1' => 3, 'address2' => 4, 'address3' => 5, 'city' => 6, 'state' => 7, 'zip' => 8, 'country' => 9, 'phone' => 10, 'fax' => 11, 'email' => 12, 'createtime' => 13, 'createdate' => 14, ),
        self::TYPE_COLNAME       => array(VendorsTableMap::COL_VENDID => 0, VendorsTableMap::COL_SHIPFROM => 1, VendorsTableMap::COL_NAME => 2, VendorsTableMap::COL_ADDRESS1 => 3, VendorsTableMap::COL_ADDRESS2 => 4, VendorsTableMap::COL_ADDRESS3 => 5, VendorsTableMap::COL_CITY => 6, VendorsTableMap::COL_STATE => 7, VendorsTableMap::COL_ZIP => 8, VendorsTableMap::COL_COUNTRY => 9, VendorsTableMap::COL_PHONE => 10, VendorsTableMap::COL_FAX => 11, VendorsTableMap::COL_EMAIL => 12, VendorsTableMap::COL_CREATETIME => 13, VendorsTableMap::COL_CREATEDATE => 14, ),
        self::TYPE_FIELDNAME     => array('vendid' => 0, 'shipfrom' => 1, 'name' => 2, 'address1' => 3, 'address2' => 4, 'address3' => 5, 'city' => 6, 'state' => 7, 'zip' => 8, 'country' => 9, 'phone' => 10, 'fax' => 11, 'email' => 12, 'createtime' => 13, 'createdate' => 14, ),
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
        $this->setName('vendors');
        $this->setPhpName('Vendors');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Vendors');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('vendid', 'Vendid', 'VARCHAR', true, 25, null);
        $this->addPrimaryKey('shipfrom', 'Shipfrom', 'VARCHAR', true, 45, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 45, null);
        $this->addColumn('address1', 'Address1', 'VARCHAR', true, 45, null);
        $this->addColumn('address2', 'Address2', 'VARCHAR', true, 45, null);
        $this->addColumn('address3', 'Address3', 'VARCHAR', true, 45, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 45, null);
        $this->addColumn('state', 'State', 'VARCHAR', true, 4, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', true, 12, null);
        $this->addColumn('country', 'Country', 'VARCHAR', true, 45, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 45, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 45, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 45, null);
        $this->addColumn('createtime', 'Createtime', 'INTEGER', false, 8, null);
        $this->addColumn('createdate', 'Createdate', 'INTEGER', false, 8, null);
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
     * @param \Vendors $obj A \Vendors object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getVendid() || is_scalar($obj->getVendid()) || is_callable([$obj->getVendid(), '__toString']) ? (string) $obj->getVendid() : $obj->getVendid()), (null === $obj->getShipfrom() || is_scalar($obj->getShipfrom()) || is_callable([$obj->getShipfrom(), '__toString']) ? (string) $obj->getShipfrom() : $obj->getShipfrom())]);
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
     * @param mixed $value A \Vendors object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Vendors) {
                $key = serialize([(null === $value->getVendid() || is_scalar($value->getVendid()) || is_callable([$value->getVendid(), '__toString']) ? (string) $value->getVendid() : $value->getVendid()), (null === $value->getShipfrom() || is_scalar($value->getShipfrom()) || is_callable([$value->getShipfrom(), '__toString']) ? (string) $value->getShipfrom() : $value->getShipfrom())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Vendors object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Vendid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Shipfrom', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? VendorsTableMap::CLASS_DEFAULT : VendorsTableMap::OM_CLASS;
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
     * @return array           (Vendors object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = VendorsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VendorsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VendorsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VendorsTableMap::OM_CLASS;
            /** @var Vendors $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VendorsTableMap::addInstanceToPool($obj, $key);
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
            $key = VendorsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VendorsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Vendors $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VendorsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(VendorsTableMap::COL_VENDID);
            $criteria->addSelectColumn(VendorsTableMap::COL_SHIPFROM);
            $criteria->addSelectColumn(VendorsTableMap::COL_NAME);
            $criteria->addSelectColumn(VendorsTableMap::COL_ADDRESS1);
            $criteria->addSelectColumn(VendorsTableMap::COL_ADDRESS2);
            $criteria->addSelectColumn(VendorsTableMap::COL_ADDRESS3);
            $criteria->addSelectColumn(VendorsTableMap::COL_CITY);
            $criteria->addSelectColumn(VendorsTableMap::COL_STATE);
            $criteria->addSelectColumn(VendorsTableMap::COL_ZIP);
            $criteria->addSelectColumn(VendorsTableMap::COL_COUNTRY);
            $criteria->addSelectColumn(VendorsTableMap::COL_PHONE);
            $criteria->addSelectColumn(VendorsTableMap::COL_FAX);
            $criteria->addSelectColumn(VendorsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(VendorsTableMap::COL_CREATETIME);
            $criteria->addSelectColumn(VendorsTableMap::COL_CREATEDATE);
        } else {
            $criteria->addSelectColumn($alias . '.vendid');
            $criteria->addSelectColumn($alias . '.shipfrom');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.address1');
            $criteria->addSelectColumn($alias . '.address2');
            $criteria->addSelectColumn($alias . '.address3');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.country');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.createtime');
            $criteria->addSelectColumn($alias . '.createdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(VendorsTableMap::DATABASE_NAME)->getTable(VendorsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(VendorsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(VendorsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new VendorsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Vendors or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Vendors object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(VendorsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Vendors) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VendorsTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(VendorsTableMap::COL_VENDID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(VendorsTableMap::COL_SHIPFROM, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = VendorsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VendorsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VendorsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the vendors table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return VendorsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Vendors or Criteria object.
     *
     * @param mixed               $criteria Criteria or Vendors object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VendorsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Vendors object
        }


        // Set the correct dbName
        $query = VendorsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // VendorsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
VendorsTableMap::buildTableMap();
