<?php

namespace Map;

use \Custcontact;
use \CustcontactQuery;
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
 * This class defines the structure of the 'custcontact' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CustcontactTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CustcontactTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'custcontact';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Custcontact';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Custcontact';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'custcontact.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'custcontact.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'custcontact.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'custcontact.time';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'custcontact.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'custcontact.shiptoid';

    /**
     * the column name for the contactid field
     */
    const COL_CONTACTID = 'custcontact.contactid';

    /**
     * the column name for the phtype field
     */
    const COL_PHTYPE = 'custcontact.phtype';

    /**
     * the column name for the phseq field
     */
    const COL_PHSEQ = 'custcontact.phseq';

    /**
     * the column name for the phintl field
     */
    const COL_PHINTL = 'custcontact.phintl';

    /**
     * the column name for the officephone field
     */
    const COL_OFFICEPHONE = 'custcontact.officephone';

    /**
     * the column name for the extension field
     */
    const COL_EXTENSION = 'custcontact.extension';

    /**
     * the column name for the cellphone field
     */
    const COL_CELLPHONE = 'custcontact.cellphone';

    /**
     * the column name for the faxnumber field
     */
    const COL_FAXNUMBER = 'custcontact.faxnumber';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'custcontact.title';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'custcontact.email';

    /**
     * the column name for the webaddress field
     */
    const COL_WEBADDRESS = 'custcontact.webaddress';

    /**
     * the column name for the lastcontact field
     */
    const COL_LASTCONTACT = 'custcontact.lastcontact';

    /**
     * the column name for the followupdate field
     */
    const COL_FOLLOWUPDATE = 'custcontact.followupdate';

    /**
     * the column name for the errormsg field
     */
    const COL_ERRORMSG = 'custcontact.errormsg';

    /**
     * the column name for the shptoname field
     */
    const COL_SHPTONAME = 'custcontact.shptoname';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'custcontact.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Custid', 'Shiptoid', 'Contactid', 'Phtype', 'Phseq', 'Phintl', 'Officephone', 'Extension', 'Cellphone', 'Faxnumber', 'Title', 'Email', 'Webaddress', 'Lastcontact', 'Followupdate', 'Errormsg', 'Shptoname', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'shiptoid', 'contactid', 'phtype', 'phseq', 'phintl', 'officephone', 'extension', 'cellphone', 'faxnumber', 'title', 'email', 'webaddress', 'lastcontact', 'followupdate', 'errormsg', 'shptoname', 'dummy', ),
        self::TYPE_COLNAME       => array(CustcontactTableMap::COL_SESSIONID, CustcontactTableMap::COL_RECNO, CustcontactTableMap::COL_DATE, CustcontactTableMap::COL_TIME, CustcontactTableMap::COL_CUSTID, CustcontactTableMap::COL_SHIPTOID, CustcontactTableMap::COL_CONTACTID, CustcontactTableMap::COL_PHTYPE, CustcontactTableMap::COL_PHSEQ, CustcontactTableMap::COL_PHINTL, CustcontactTableMap::COL_OFFICEPHONE, CustcontactTableMap::COL_EXTENSION, CustcontactTableMap::COL_CELLPHONE, CustcontactTableMap::COL_FAXNUMBER, CustcontactTableMap::COL_TITLE, CustcontactTableMap::COL_EMAIL, CustcontactTableMap::COL_WEBADDRESS, CustcontactTableMap::COL_LASTCONTACT, CustcontactTableMap::COL_FOLLOWUPDATE, CustcontactTableMap::COL_ERRORMSG, CustcontactTableMap::COL_SHPTONAME, CustcontactTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'shiptoid', 'contactid', 'phtype', 'phseq', 'phintl', 'officephone', 'extension', 'cellphone', 'faxnumber', 'title', 'email', 'webaddress', 'lastcontact', 'followupdate', 'errormsg', 'shptoname', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Custid' => 4, 'Shiptoid' => 5, 'Contactid' => 6, 'Phtype' => 7, 'Phseq' => 8, 'Phintl' => 9, 'Officephone' => 10, 'Extension' => 11, 'Cellphone' => 12, 'Faxnumber' => 13, 'Title' => 14, 'Email' => 15, 'Webaddress' => 16, 'Lastcontact' => 17, 'Followupdate' => 18, 'Errormsg' => 19, 'Shptoname' => 20, 'Dummy' => 21, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'contactid' => 6, 'phtype' => 7, 'phseq' => 8, 'phintl' => 9, 'officephone' => 10, 'extension' => 11, 'cellphone' => 12, 'faxnumber' => 13, 'title' => 14, 'email' => 15, 'webaddress' => 16, 'lastcontact' => 17, 'followupdate' => 18, 'errormsg' => 19, 'shptoname' => 20, 'dummy' => 21, ),
        self::TYPE_COLNAME       => array(CustcontactTableMap::COL_SESSIONID => 0, CustcontactTableMap::COL_RECNO => 1, CustcontactTableMap::COL_DATE => 2, CustcontactTableMap::COL_TIME => 3, CustcontactTableMap::COL_CUSTID => 4, CustcontactTableMap::COL_SHIPTOID => 5, CustcontactTableMap::COL_CONTACTID => 6, CustcontactTableMap::COL_PHTYPE => 7, CustcontactTableMap::COL_PHSEQ => 8, CustcontactTableMap::COL_PHINTL => 9, CustcontactTableMap::COL_OFFICEPHONE => 10, CustcontactTableMap::COL_EXTENSION => 11, CustcontactTableMap::COL_CELLPHONE => 12, CustcontactTableMap::COL_FAXNUMBER => 13, CustcontactTableMap::COL_TITLE => 14, CustcontactTableMap::COL_EMAIL => 15, CustcontactTableMap::COL_WEBADDRESS => 16, CustcontactTableMap::COL_LASTCONTACT => 17, CustcontactTableMap::COL_FOLLOWUPDATE => 18, CustcontactTableMap::COL_ERRORMSG => 19, CustcontactTableMap::COL_SHPTONAME => 20, CustcontactTableMap::COL_DUMMY => 21, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'contactid' => 6, 'phtype' => 7, 'phseq' => 8, 'phintl' => 9, 'officephone' => 10, 'extension' => 11, 'cellphone' => 12, 'faxnumber' => 13, 'title' => 14, 'email' => 15, 'webaddress' => 16, 'lastcontact' => 17, 'followupdate' => 18, 'errormsg' => 19, 'shptoname' => 20, 'dummy' => 21, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $this->setName('custcontact');
        $this->setPhpName('Custcontact');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Custcontact');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 10, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, null);
        $this->addColumn('contactid', 'Contactid', 'VARCHAR', false, 35, null);
        $this->addColumn('phtype', 'Phtype', 'VARCHAR', false, 2, null);
        $this->addColumn('phseq', 'Phseq', 'VARCHAR', false, 1, null);
        $this->addColumn('phintl', 'Phintl', 'VARCHAR', false, 1, null);
        $this->addColumn('officephone', 'Officephone', 'VARCHAR', false, 25, null);
        $this->addColumn('extension', 'Extension', 'VARCHAR', false, 7, null);
        $this->addColumn('cellphone', 'Cellphone', 'VARCHAR', false, 25, null);
        $this->addColumn('faxnumber', 'Faxnumber', 'VARCHAR', false, 25, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('webaddress', 'Webaddress', 'VARCHAR', false, 50, null);
        $this->addColumn('lastcontact', 'Lastcontact', 'VARCHAR', false, 10, null);
        $this->addColumn('followupdate', 'Followupdate', 'VARCHAR', false, 10, null);
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 30, null);
        $this->addColumn('shptoname', 'Shptoname', 'VARCHAR', false, 40, null);
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
     * @param \Custcontact $obj A \Custcontact object.
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
     * @param mixed $value A \Custcontact object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Custcontact) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Custcontact object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? CustcontactTableMap::CLASS_DEFAULT : CustcontactTableMap::OM_CLASS;
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
     * @return array           (Custcontact object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CustcontactTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CustcontactTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CustcontactTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CustcontactTableMap::OM_CLASS;
            /** @var Custcontact $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CustcontactTableMap::addInstanceToPool($obj, $key);
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
            $key = CustcontactTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CustcontactTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Custcontact $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CustcontactTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CustcontactTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(CustcontactTableMap::COL_RECNO);
            $criteria->addSelectColumn(CustcontactTableMap::COL_DATE);
            $criteria->addSelectColumn(CustcontactTableMap::COL_TIME);
            $criteria->addSelectColumn(CustcontactTableMap::COL_CUSTID);
            $criteria->addSelectColumn(CustcontactTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(CustcontactTableMap::COL_CONTACTID);
            $criteria->addSelectColumn(CustcontactTableMap::COL_PHTYPE);
            $criteria->addSelectColumn(CustcontactTableMap::COL_PHSEQ);
            $criteria->addSelectColumn(CustcontactTableMap::COL_PHINTL);
            $criteria->addSelectColumn(CustcontactTableMap::COL_OFFICEPHONE);
            $criteria->addSelectColumn(CustcontactTableMap::COL_EXTENSION);
            $criteria->addSelectColumn(CustcontactTableMap::COL_CELLPHONE);
            $criteria->addSelectColumn(CustcontactTableMap::COL_FAXNUMBER);
            $criteria->addSelectColumn(CustcontactTableMap::COL_TITLE);
            $criteria->addSelectColumn(CustcontactTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CustcontactTableMap::COL_WEBADDRESS);
            $criteria->addSelectColumn(CustcontactTableMap::COL_LASTCONTACT);
            $criteria->addSelectColumn(CustcontactTableMap::COL_FOLLOWUPDATE);
            $criteria->addSelectColumn(CustcontactTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(CustcontactTableMap::COL_SHPTONAME);
            $criteria->addSelectColumn(CustcontactTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.contactid');
            $criteria->addSelectColumn($alias . '.phtype');
            $criteria->addSelectColumn($alias . '.phseq');
            $criteria->addSelectColumn($alias . '.phintl');
            $criteria->addSelectColumn($alias . '.officephone');
            $criteria->addSelectColumn($alias . '.extension');
            $criteria->addSelectColumn($alias . '.cellphone');
            $criteria->addSelectColumn($alias . '.faxnumber');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.webaddress');
            $criteria->addSelectColumn($alias . '.lastcontact');
            $criteria->addSelectColumn($alias . '.followupdate');
            $criteria->addSelectColumn($alias . '.errormsg');
            $criteria->addSelectColumn($alias . '.shptoname');
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
        return Propel::getServiceContainer()->getDatabaseMap(CustcontactTableMap::DATABASE_NAME)->getTable(CustcontactTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CustcontactTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CustcontactTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CustcontactTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Custcontact or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Custcontact object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustcontactTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Custcontact) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CustcontactTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CustcontactTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CustcontactTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CustcontactQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CustcontactTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CustcontactTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the custcontact table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CustcontactQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Custcontact or Criteria object.
     *
     * @param mixed               $criteria Criteria or Custcontact object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustcontactTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Custcontact object
        }


        // Set the correct dbName
        $query = CustcontactQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CustcontactTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CustcontactTableMap::buildTableMap();
