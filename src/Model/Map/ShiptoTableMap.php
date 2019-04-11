<?php

namespace Map;

use \Shipto;
use \ShiptoQuery;
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
 * This class defines the structure of the 'shipto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ShiptoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ShiptoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'shipto';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Shipto';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Shipto';

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
    const COL_SESSIONID = 'shipto.sessionid';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'shipto.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'shipto.time';

    /**
     * the column name for the sconame field
     */
    const COL_SCONAME = 'shipto.sconame';

    /**
     * the column name for the sname field
     */
    const COL_SNAME = 'shipto.sname';

    /**
     * the column name for the saddress field
     */
    const COL_SADDRESS = 'shipto.saddress';

    /**
     * the column name for the saddress2 field
     */
    const COL_SADDRESS2 = 'shipto.saddress2';

    /**
     * the column name for the scity field
     */
    const COL_SCITY = 'shipto.scity';

    /**
     * the column name for the sst field
     */
    const COL_SST = 'shipto.sst';

    /**
     * the column name for the szip field
     */
    const COL_SZIP = 'shipto.szip';

    /**
     * the column name for the scountry field
     */
    const COL_SCOUNTRY = 'shipto.scountry';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'shipto.recno';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'shipto.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'shipto.shiptoid';

    /**
     * the column name for the saddress3 field
     */
    const COL_SADDRESS3 = 'shipto.saddress3';

    /**
     * the column name for the sphone field
     */
    const COL_SPHONE = 'shipto.sphone';

    /**
     * the column name for the ssalesrep field
     */
    const COL_SSALESREP = 'shipto.ssalesrep';

    /**
     * the column name for the ssalesrepname field
     */
    const COL_SSALESREPNAME = 'shipto.ssalesrepname';

    /**
     * the column name for the dateentered field
     */
    const COL_DATEENTERED = 'shipto.dateentered';

    /**
     * the column name for the lastsaledate field
     */
    const COL_LASTSALEDATE = 'shipto.lastsaledate';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'shipto.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Date', 'Time', 'Sconame', 'Sname', 'Saddress', 'Saddress2', 'Scity', 'Sst', 'Szip', 'Scountry', 'Recno', 'Custid', 'Shiptoid', 'Saddress3', 'Sphone', 'Ssalesrep', 'Ssalesrepname', 'Dateentered', 'Lastsaledate', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'date', 'time', 'sconame', 'sname', 'saddress', 'saddress2', 'scity', 'sst', 'szip', 'scountry', 'recno', 'custid', 'shiptoid', 'saddress3', 'sphone', 'ssalesrep', 'ssalesrepname', 'dateentered', 'lastsaledate', 'dummy', ),
        self::TYPE_COLNAME       => array(ShiptoTableMap::COL_SESSIONID, ShiptoTableMap::COL_DATE, ShiptoTableMap::COL_TIME, ShiptoTableMap::COL_SCONAME, ShiptoTableMap::COL_SNAME, ShiptoTableMap::COL_SADDRESS, ShiptoTableMap::COL_SADDRESS2, ShiptoTableMap::COL_SCITY, ShiptoTableMap::COL_SST, ShiptoTableMap::COL_SZIP, ShiptoTableMap::COL_SCOUNTRY, ShiptoTableMap::COL_RECNO, ShiptoTableMap::COL_CUSTID, ShiptoTableMap::COL_SHIPTOID, ShiptoTableMap::COL_SADDRESS3, ShiptoTableMap::COL_SPHONE, ShiptoTableMap::COL_SSALESREP, ShiptoTableMap::COL_SSALESREPNAME, ShiptoTableMap::COL_DATEENTERED, ShiptoTableMap::COL_LASTSALEDATE, ShiptoTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'date', 'time', 'sconame', 'sname', 'saddress', 'saddress2', 'scity', 'sst', 'szip', 'scountry', 'recno', 'custid', 'shiptoid', 'saddress3', 'sphone', 'ssalesrep', 'ssalesrepname', 'dateentered', 'lastsaledate', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Date' => 1, 'Time' => 2, 'Sconame' => 3, 'Sname' => 4, 'Saddress' => 5, 'Saddress2' => 6, 'Scity' => 7, 'Sst' => 8, 'Szip' => 9, 'Scountry' => 10, 'Recno' => 11, 'Custid' => 12, 'Shiptoid' => 13, 'Saddress3' => 14, 'Sphone' => 15, 'Ssalesrep' => 16, 'Ssalesrepname' => 17, 'Dateentered' => 18, 'Lastsaledate' => 19, 'Dummy' => 20, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'date' => 1, 'time' => 2, 'sconame' => 3, 'sname' => 4, 'saddress' => 5, 'saddress2' => 6, 'scity' => 7, 'sst' => 8, 'szip' => 9, 'scountry' => 10, 'recno' => 11, 'custid' => 12, 'shiptoid' => 13, 'saddress3' => 14, 'sphone' => 15, 'ssalesrep' => 16, 'ssalesrepname' => 17, 'dateentered' => 18, 'lastsaledate' => 19, 'dummy' => 20, ),
        self::TYPE_COLNAME       => array(ShiptoTableMap::COL_SESSIONID => 0, ShiptoTableMap::COL_DATE => 1, ShiptoTableMap::COL_TIME => 2, ShiptoTableMap::COL_SCONAME => 3, ShiptoTableMap::COL_SNAME => 4, ShiptoTableMap::COL_SADDRESS => 5, ShiptoTableMap::COL_SADDRESS2 => 6, ShiptoTableMap::COL_SCITY => 7, ShiptoTableMap::COL_SST => 8, ShiptoTableMap::COL_SZIP => 9, ShiptoTableMap::COL_SCOUNTRY => 10, ShiptoTableMap::COL_RECNO => 11, ShiptoTableMap::COL_CUSTID => 12, ShiptoTableMap::COL_SHIPTOID => 13, ShiptoTableMap::COL_SADDRESS3 => 14, ShiptoTableMap::COL_SPHONE => 15, ShiptoTableMap::COL_SSALESREP => 16, ShiptoTableMap::COL_SSALESREPNAME => 17, ShiptoTableMap::COL_DATEENTERED => 18, ShiptoTableMap::COL_LASTSALEDATE => 19, ShiptoTableMap::COL_DUMMY => 20, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'date' => 1, 'time' => 2, 'sconame' => 3, 'sname' => 4, 'saddress' => 5, 'saddress2' => 6, 'scity' => 7, 'sst' => 8, 'szip' => 9, 'scountry' => 10, 'recno' => 11, 'custid' => 12, 'shiptoid' => 13, 'saddress3' => 14, 'sphone' => 15, 'ssalesrep' => 16, 'ssalesrepname' => 17, 'dateentered' => 18, 'lastsaledate' => 19, 'dummy' => 20, ),
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
        $this->setName('shipto');
        $this->setPhpName('Shipto');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Shipto');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('sconame', 'Sconame', 'VARCHAR', false, 30, null);
        $this->addColumn('sname', 'Sname', 'VARCHAR', false, 30, null);
        $this->addColumn('saddress', 'Saddress', 'VARCHAR', false, 30, null);
        $this->addColumn('saddress2', 'Saddress2', 'VARCHAR', false, 30, null);
        $this->addColumn('scity', 'Scity', 'VARCHAR', false, 30, null);
        $this->addColumn('sst', 'Sst', 'VARCHAR', false, 30, null);
        $this->addColumn('szip', 'Szip', 'VARCHAR', false, 30, null);
        $this->addColumn('scountry', 'Scountry', 'VARCHAR', false, 30, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 10, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 30, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 30, null);
        $this->addColumn('saddress3', 'Saddress3', 'VARCHAR', false, 100, null);
        $this->addColumn('sphone', 'Sphone', 'VARCHAR', false, 30, null);
        $this->addColumn('ssalesrep', 'Ssalesrep', 'VARCHAR', false, 6, null);
        $this->addColumn('ssalesrepname', 'Ssalesrepname', 'VARCHAR', false, 30, null);
        $this->addColumn('dateentered', 'Dateentered', 'VARCHAR', false, 10, null);
        $this->addColumn('lastsaledate', 'Lastsaledate', 'VARCHAR', false, 10, null);
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
     * @param \Shipto $obj A \Shipto object.
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
     * @param mixed $value A \Shipto object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Shipto) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Shipto object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                ? 11 + $offset
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
        return $withPrefix ? ShiptoTableMap::CLASS_DEFAULT : ShiptoTableMap::OM_CLASS;
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
     * @return array           (Shipto object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ShiptoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ShiptoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ShiptoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ShiptoTableMap::OM_CLASS;
            /** @var Shipto $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ShiptoTableMap::addInstanceToPool($obj, $key);
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
            $key = ShiptoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ShiptoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Shipto $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ShiptoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ShiptoTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(ShiptoTableMap::COL_DATE);
            $criteria->addSelectColumn(ShiptoTableMap::COL_TIME);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SCONAME);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SNAME);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SADDRESS);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SADDRESS2);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SCITY);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SST);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SZIP);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SCOUNTRY);
            $criteria->addSelectColumn(ShiptoTableMap::COL_RECNO);
            $criteria->addSelectColumn(ShiptoTableMap::COL_CUSTID);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SADDRESS3);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SPHONE);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SSALESREP);
            $criteria->addSelectColumn(ShiptoTableMap::COL_SSALESREPNAME);
            $criteria->addSelectColumn(ShiptoTableMap::COL_DATEENTERED);
            $criteria->addSelectColumn(ShiptoTableMap::COL_LASTSALEDATE);
            $criteria->addSelectColumn(ShiptoTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.sconame');
            $criteria->addSelectColumn($alias . '.sname');
            $criteria->addSelectColumn($alias . '.saddress');
            $criteria->addSelectColumn($alias . '.saddress2');
            $criteria->addSelectColumn($alias . '.scity');
            $criteria->addSelectColumn($alias . '.sst');
            $criteria->addSelectColumn($alias . '.szip');
            $criteria->addSelectColumn($alias . '.scountry');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.saddress3');
            $criteria->addSelectColumn($alias . '.sphone');
            $criteria->addSelectColumn($alias . '.ssalesrep');
            $criteria->addSelectColumn($alias . '.ssalesrepname');
            $criteria->addSelectColumn($alias . '.dateentered');
            $criteria->addSelectColumn($alias . '.lastsaledate');
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
        return Propel::getServiceContainer()->getDatabaseMap(ShiptoTableMap::DATABASE_NAME)->getTable(ShiptoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ShiptoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ShiptoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ShiptoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Shipto or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Shipto object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ShiptoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Shipto) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ShiptoTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ShiptoTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ShiptoTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = ShiptoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ShiptoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ShiptoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the shipto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ShiptoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Shipto or Criteria object.
     *
     * @param mixed               $criteria Criteria or Shipto object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShiptoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Shipto object
        }


        // Set the correct dbName
        $query = ShiptoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ShiptoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ShiptoTableMap::buildTableMap();
