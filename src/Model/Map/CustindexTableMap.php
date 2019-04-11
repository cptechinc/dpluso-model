<?php

namespace Map;

use \Custindex;
use \CustindexQuery;
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
 * This class defines the structure of the 'custindex' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CustindexTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CustindexTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'custindex';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Custindex';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Custindex';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 29;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 29;

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'custindex.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'custindex.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'custindex.time';

    /**
     * the column name for the splogin1 field
     */
    const COL_SPLOGIN1 = 'custindex.splogin1';

    /**
     * the column name for the splogin2 field
     */
    const COL_SPLOGIN2 = 'custindex.splogin2';

    /**
     * the column name for the splogin3 field
     */
    const COL_SPLOGIN3 = 'custindex.splogin3';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'custindex.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'custindex.shiptoid';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'custindex.name';

    /**
     * the column name for the addr1 field
     */
    const COL_ADDR1 = 'custindex.addr1';

    /**
     * the column name for the addr2 field
     */
    const COL_ADDR2 = 'custindex.addr2';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'custindex.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'custindex.state';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'custindex.zip';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'custindex.phone';

    /**
     * the column name for the cellphone field
     */
    const COL_CELLPHONE = 'custindex.cellphone';

    /**
     * the column name for the contact field
     */
    const COL_CONTACT = 'custindex.contact';

    /**
     * the column name for the source field
     */
    const COL_SOURCE = 'custindex.source';

    /**
     * the column name for the extension field
     */
    const COL_EXTENSION = 'custindex.extension';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'custindex.email';

    /**
     * the column name for the typecode field
     */
    const COL_TYPECODE = 'custindex.typecode';

    /**
     * the column name for the faxnbr field
     */
    const COL_FAXNBR = 'custindex.faxnbr';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'custindex.title';

    /**
     * the column name for the arcontact field
     */
    const COL_ARCONTACT = 'custindex.arcontact';

    /**
     * the column name for the dunningcontact field
     */
    const COL_DUNNINGCONTACT = 'custindex.dunningcontact';

    /**
     * the column name for the buyingcontact field
     */
    const COL_BUYINGCONTACT = 'custindex.buyingcontact';

    /**
     * the column name for the certcontact field
     */
    const COL_CERTCONTACT = 'custindex.certcontact';

    /**
     * the column name for the ackcontact field
     */
    const COL_ACKCONTACT = 'custindex.ackcontact';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'custindex.dummy';

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
        self::TYPE_PHPNAME       => array('Recno', 'Date', 'Time', 'Splogin1', 'Splogin2', 'Splogin3', 'Custid', 'Shiptoid', 'Name', 'Addr1', 'Addr2', 'City', 'State', 'Zip', 'Phone', 'Cellphone', 'Contact', 'Source', 'Extension', 'Email', 'Typecode', 'Faxnbr', 'Title', 'Arcontact', 'Dunningcontact', 'Buyingcontact', 'Certcontact', 'Ackcontact', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('recno', 'date', 'time', 'splogin1', 'splogin2', 'splogin3', 'custid', 'shiptoid', 'name', 'addr1', 'addr2', 'city', 'state', 'zip', 'phone', 'cellphone', 'contact', 'source', 'extension', 'email', 'typecode', 'faxnbr', 'title', 'arcontact', 'dunningcontact', 'buyingcontact', 'certcontact', 'ackcontact', 'dummy', ),
        self::TYPE_COLNAME       => array(CustindexTableMap::COL_RECNO, CustindexTableMap::COL_DATE, CustindexTableMap::COL_TIME, CustindexTableMap::COL_SPLOGIN1, CustindexTableMap::COL_SPLOGIN2, CustindexTableMap::COL_SPLOGIN3, CustindexTableMap::COL_CUSTID, CustindexTableMap::COL_SHIPTOID, CustindexTableMap::COL_NAME, CustindexTableMap::COL_ADDR1, CustindexTableMap::COL_ADDR2, CustindexTableMap::COL_CITY, CustindexTableMap::COL_STATE, CustindexTableMap::COL_ZIP, CustindexTableMap::COL_PHONE, CustindexTableMap::COL_CELLPHONE, CustindexTableMap::COL_CONTACT, CustindexTableMap::COL_SOURCE, CustindexTableMap::COL_EXTENSION, CustindexTableMap::COL_EMAIL, CustindexTableMap::COL_TYPECODE, CustindexTableMap::COL_FAXNBR, CustindexTableMap::COL_TITLE, CustindexTableMap::COL_ARCONTACT, CustindexTableMap::COL_DUNNINGCONTACT, CustindexTableMap::COL_BUYINGCONTACT, CustindexTableMap::COL_CERTCONTACT, CustindexTableMap::COL_ACKCONTACT, CustindexTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('recno', 'date', 'time', 'splogin1', 'splogin2', 'splogin3', 'custid', 'shiptoid', 'name', 'addr1', 'addr2', 'city', 'state', 'zip', 'phone', 'cellphone', 'contact', 'source', 'extension', 'email', 'typecode', 'faxnbr', 'title', 'arcontact', 'dunningcontact', 'buyingcontact', 'certcontact', 'ackcontact', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Recno' => 0, 'Date' => 1, 'Time' => 2, 'Splogin1' => 3, 'Splogin2' => 4, 'Splogin3' => 5, 'Custid' => 6, 'Shiptoid' => 7, 'Name' => 8, 'Addr1' => 9, 'Addr2' => 10, 'City' => 11, 'State' => 12, 'Zip' => 13, 'Phone' => 14, 'Cellphone' => 15, 'Contact' => 16, 'Source' => 17, 'Extension' => 18, 'Email' => 19, 'Typecode' => 20, 'Faxnbr' => 21, 'Title' => 22, 'Arcontact' => 23, 'Dunningcontact' => 24, 'Buyingcontact' => 25, 'Certcontact' => 26, 'Ackcontact' => 27, 'Dummy' => 28, ),
        self::TYPE_CAMELNAME     => array('recno' => 0, 'date' => 1, 'time' => 2, 'splogin1' => 3, 'splogin2' => 4, 'splogin3' => 5, 'custid' => 6, 'shiptoid' => 7, 'name' => 8, 'addr1' => 9, 'addr2' => 10, 'city' => 11, 'state' => 12, 'zip' => 13, 'phone' => 14, 'cellphone' => 15, 'contact' => 16, 'source' => 17, 'extension' => 18, 'email' => 19, 'typecode' => 20, 'faxnbr' => 21, 'title' => 22, 'arcontact' => 23, 'dunningcontact' => 24, 'buyingcontact' => 25, 'certcontact' => 26, 'ackcontact' => 27, 'dummy' => 28, ),
        self::TYPE_COLNAME       => array(CustindexTableMap::COL_RECNO => 0, CustindexTableMap::COL_DATE => 1, CustindexTableMap::COL_TIME => 2, CustindexTableMap::COL_SPLOGIN1 => 3, CustindexTableMap::COL_SPLOGIN2 => 4, CustindexTableMap::COL_SPLOGIN3 => 5, CustindexTableMap::COL_CUSTID => 6, CustindexTableMap::COL_SHIPTOID => 7, CustindexTableMap::COL_NAME => 8, CustindexTableMap::COL_ADDR1 => 9, CustindexTableMap::COL_ADDR2 => 10, CustindexTableMap::COL_CITY => 11, CustindexTableMap::COL_STATE => 12, CustindexTableMap::COL_ZIP => 13, CustindexTableMap::COL_PHONE => 14, CustindexTableMap::COL_CELLPHONE => 15, CustindexTableMap::COL_CONTACT => 16, CustindexTableMap::COL_SOURCE => 17, CustindexTableMap::COL_EXTENSION => 18, CustindexTableMap::COL_EMAIL => 19, CustindexTableMap::COL_TYPECODE => 20, CustindexTableMap::COL_FAXNBR => 21, CustindexTableMap::COL_TITLE => 22, CustindexTableMap::COL_ARCONTACT => 23, CustindexTableMap::COL_DUNNINGCONTACT => 24, CustindexTableMap::COL_BUYINGCONTACT => 25, CustindexTableMap::COL_CERTCONTACT => 26, CustindexTableMap::COL_ACKCONTACT => 27, CustindexTableMap::COL_DUMMY => 28, ),
        self::TYPE_FIELDNAME     => array('recno' => 0, 'date' => 1, 'time' => 2, 'splogin1' => 3, 'splogin2' => 4, 'splogin3' => 5, 'custid' => 6, 'shiptoid' => 7, 'name' => 8, 'addr1' => 9, 'addr2' => 10, 'city' => 11, 'state' => 12, 'zip' => 13, 'phone' => 14, 'cellphone' => 15, 'contact' => 16, 'source' => 17, 'extension' => 18, 'email' => 19, 'typecode' => 20, 'faxnbr' => 21, 'title' => 22, 'arcontact' => 23, 'dunningcontact' => 24, 'buyingcontact' => 25, 'certcontact' => 26, 'ackcontact' => 27, 'dummy' => 28, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
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
        $this->setName('custindex');
        $this->setPhpName('Custindex');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Custindex');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 10, null);
        $this->addColumn('date', 'Date', 'INTEGER', true, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', true, 8, null);
        $this->addColumn('splogin1', 'Splogin1', 'VARCHAR', true, 12, null);
        $this->addColumn('splogin2', 'Splogin2', 'VARCHAR', true, 12, null);
        $this->addColumn('splogin3', 'Splogin3', 'VARCHAR', true, 12, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', true, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', true, 6, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 30, null);
        $this->addColumn('addr1', 'Addr1', 'VARCHAR', true, 30, null);
        $this->addColumn('addr2', 'Addr2', 'VARCHAR', true, 30, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 30, null);
        $this->addColumn('state', 'State', 'VARCHAR', true, 2, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', true, 10, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 20, null);
        $this->addColumn('cellphone', 'Cellphone', 'VARCHAR', true, 20, null);
        $this->addColumn('contact', 'Contact', 'VARCHAR', true, 35, null);
        $this->addColumn('source', 'Source', 'VARCHAR', true, 2, null);
        $this->addColumn('extension', 'Extension', 'VARCHAR', true, 7, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 50, null);
        $this->addColumn('typecode', 'Typecode', 'VARCHAR', true, 45, null);
        $this->addColumn('faxnbr', 'Faxnbr', 'VARCHAR', true, 20, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 45, null);
        $this->addColumn('arcontact', 'Arcontact', 'VARCHAR', true, 1, null);
        $this->addColumn('dunningcontact', 'Dunningcontact', 'VARCHAR', true, 1, null);
        $this->addColumn('buyingcontact', 'Buyingcontact', 'VARCHAR', true, 1, null);
        $this->addColumn('certcontact', 'Certcontact', 'VARCHAR', true, 1, null);
        $this->addColumn('ackcontact', 'Ackcontact', 'VARCHAR', true, 1, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', true, 1, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CustindexTableMap::CLASS_DEFAULT : CustindexTableMap::OM_CLASS;
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
     * @return array           (Custindex object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CustindexTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CustindexTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CustindexTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CustindexTableMap::OM_CLASS;
            /** @var Custindex $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CustindexTableMap::addInstanceToPool($obj, $key);
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
            $key = CustindexTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CustindexTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Custindex $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CustindexTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CustindexTableMap::COL_RECNO);
            $criteria->addSelectColumn(CustindexTableMap::COL_DATE);
            $criteria->addSelectColumn(CustindexTableMap::COL_TIME);
            $criteria->addSelectColumn(CustindexTableMap::COL_SPLOGIN1);
            $criteria->addSelectColumn(CustindexTableMap::COL_SPLOGIN2);
            $criteria->addSelectColumn(CustindexTableMap::COL_SPLOGIN3);
            $criteria->addSelectColumn(CustindexTableMap::COL_CUSTID);
            $criteria->addSelectColumn(CustindexTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(CustindexTableMap::COL_NAME);
            $criteria->addSelectColumn(CustindexTableMap::COL_ADDR1);
            $criteria->addSelectColumn(CustindexTableMap::COL_ADDR2);
            $criteria->addSelectColumn(CustindexTableMap::COL_CITY);
            $criteria->addSelectColumn(CustindexTableMap::COL_STATE);
            $criteria->addSelectColumn(CustindexTableMap::COL_ZIP);
            $criteria->addSelectColumn(CustindexTableMap::COL_PHONE);
            $criteria->addSelectColumn(CustindexTableMap::COL_CELLPHONE);
            $criteria->addSelectColumn(CustindexTableMap::COL_CONTACT);
            $criteria->addSelectColumn(CustindexTableMap::COL_SOURCE);
            $criteria->addSelectColumn(CustindexTableMap::COL_EXTENSION);
            $criteria->addSelectColumn(CustindexTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CustindexTableMap::COL_TYPECODE);
            $criteria->addSelectColumn(CustindexTableMap::COL_FAXNBR);
            $criteria->addSelectColumn(CustindexTableMap::COL_TITLE);
            $criteria->addSelectColumn(CustindexTableMap::COL_ARCONTACT);
            $criteria->addSelectColumn(CustindexTableMap::COL_DUNNINGCONTACT);
            $criteria->addSelectColumn(CustindexTableMap::COL_BUYINGCONTACT);
            $criteria->addSelectColumn(CustindexTableMap::COL_CERTCONTACT);
            $criteria->addSelectColumn(CustindexTableMap::COL_ACKCONTACT);
            $criteria->addSelectColumn(CustindexTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.splogin1');
            $criteria->addSelectColumn($alias . '.splogin2');
            $criteria->addSelectColumn($alias . '.splogin3');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.addr1');
            $criteria->addSelectColumn($alias . '.addr2');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.cellphone');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.source');
            $criteria->addSelectColumn($alias . '.extension');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.typecode');
            $criteria->addSelectColumn($alias . '.faxnbr');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.arcontact');
            $criteria->addSelectColumn($alias . '.dunningcontact');
            $criteria->addSelectColumn($alias . '.buyingcontact');
            $criteria->addSelectColumn($alias . '.certcontact');
            $criteria->addSelectColumn($alias . '.ackcontact');
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
        return Propel::getServiceContainer()->getDatabaseMap(CustindexTableMap::DATABASE_NAME)->getTable(CustindexTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CustindexTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CustindexTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CustindexTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Custindex or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Custindex object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustindexTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Custindex) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CustindexTableMap::DATABASE_NAME);
            $criteria->add(CustindexTableMap::COL_RECNO, (array) $values, Criteria::IN);
        }

        $query = CustindexQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CustindexTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CustindexTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the custindex table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CustindexQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Custindex or Criteria object.
     *
     * @param mixed               $criteria Criteria or Custindex object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustindexTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Custindex object
        }


        // Set the correct dbName
        $query = CustindexQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CustindexTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CustindexTableMap::buildTableMap();
