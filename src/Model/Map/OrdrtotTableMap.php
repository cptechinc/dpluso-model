<?php

namespace Map;

use \Ordrtot;
use \OrdrtotQuery;
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
 * This class defines the structure of the 'ordrtot' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrdrtotTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.OrdrtotTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'ordrtot';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Ordrtot';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ordrtot';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ordrtot';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'ordrtot.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'ordrtot.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'ordrtot.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'ordrtot.time';

    /**
     * the column name for the type field
     */
    public const COL_TYPE = 'ordrtot.type';

    /**
     * the column name for the custid field
     */
    public const COL_CUSTID = 'ordrtot.custid';

    /**
     * the column name for the shiptoid field
     */
    public const COL_SHIPTOID = 'ordrtot.shiptoid';

    /**
     * the column name for the saleordnbr field
     */
    public const COL_SALEORDNBR = 'ordrtot.saleordnbr';

    /**
     * the column name for the saleordamt field
     */
    public const COL_SALEORDAMT = 'ordrtot.saleordamt';

    /**
     * the column name for the openinvnbr field
     */
    public const COL_OPENINVNBR = 'ordrtot.openinvnbr';

    /**
     * the column name for the openinvamt field
     */
    public const COL_OPENINVAMT = 'ordrtot.openinvamt';

    /**
     * the column name for the quotesbr field
     */
    public const COL_QUOTESBR = 'ordrtot.quotesbr';

    /**
     * the column name for the quotesmt field
     */
    public const COL_QUOTESMT = 'ordrtot.quotesmt';

    /**
     * the column name for the monthtodatenbr field
     */
    public const COL_MONTHTODATENBR = 'ordrtot.monthtodatenbr';

    /**
     * the column name for the monthtodateamt field
     */
    public const COL_MONTHTODATEAMT = 'ordrtot.monthtodateamt';

    /**
     * the column name for the yeartodatenbr field
     */
    public const COL_YEARTODATENBR = 'ordrtot.yeartodatenbr';

    /**
     * the column name for the yeartodateamt field
     */
    public const COL_YEARTODATEAMT = 'ordrtot.yeartodateamt';

    /**
     * the column name for the last12nbr field
     */
    public const COL_LAST12NBR = 'ordrtot.last12nbr';

    /**
     * the column name for the last12amt field
     */
    public const COL_LAST12AMT = 'ordrtot.last12amt';

    /**
     * the column name for the prevyearnbr field
     */
    public const COL_PREVYEARNBR = 'ordrtot.prevyearnbr';

    /**
     * the column name for the prevyearamt field
     */
    public const COL_PREVYEARAMT = 'ordrtot.prevyearamt';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'ordrtot.dummy';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Type', 'Custid', 'Shiptoid', 'Saleordnbr', 'Saleordamt', 'Openinvnbr', 'Openinvamt', 'Quotesbr', 'Quotesmt', 'Monthtodatenbr', 'Monthtodateamt', 'Yeartodatenbr', 'Yeartodateamt', 'Last12nbr', 'Last12amt', 'Prevyearnbr', 'Prevyearamt', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'type', 'custid', 'shiptoid', 'saleordnbr', 'saleordamt', 'openinvnbr', 'openinvamt', 'quotesbr', 'quotesmt', 'monthtodatenbr', 'monthtodateamt', 'yeartodatenbr', 'yeartodateamt', 'last12nbr', 'last12amt', 'prevyearnbr', 'prevyearamt', 'dummy', ],
        self::TYPE_COLNAME       => [OrdrtotTableMap::COL_SESSIONID, OrdrtotTableMap::COL_RECNO, OrdrtotTableMap::COL_DATE, OrdrtotTableMap::COL_TIME, OrdrtotTableMap::COL_TYPE, OrdrtotTableMap::COL_CUSTID, OrdrtotTableMap::COL_SHIPTOID, OrdrtotTableMap::COL_SALEORDNBR, OrdrtotTableMap::COL_SALEORDAMT, OrdrtotTableMap::COL_OPENINVNBR, OrdrtotTableMap::COL_OPENINVAMT, OrdrtotTableMap::COL_QUOTESBR, OrdrtotTableMap::COL_QUOTESMT, OrdrtotTableMap::COL_MONTHTODATENBR, OrdrtotTableMap::COL_MONTHTODATEAMT, OrdrtotTableMap::COL_YEARTODATENBR, OrdrtotTableMap::COL_YEARTODATEAMT, OrdrtotTableMap::COL_LAST12NBR, OrdrtotTableMap::COL_LAST12AMT, OrdrtotTableMap::COL_PREVYEARNBR, OrdrtotTableMap::COL_PREVYEARAMT, OrdrtotTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'type', 'custid', 'shiptoid', 'saleordnbr', 'saleordamt', 'openinvnbr', 'openinvamt', 'quotesbr', 'quotesmt', 'monthtodatenbr', 'monthtodateamt', 'yeartodatenbr', 'yeartodateamt', 'last12nbr', 'last12amt', 'prevyearnbr', 'prevyearamt', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Type' => 4, 'Custid' => 5, 'Shiptoid' => 6, 'Saleordnbr' => 7, 'Saleordamt' => 8, 'Openinvnbr' => 9, 'Openinvamt' => 10, 'Quotesbr' => 11, 'Quotesmt' => 12, 'Monthtodatenbr' => 13, 'Monthtodateamt' => 14, 'Yeartodatenbr' => 15, 'Yeartodateamt' => 16, 'Last12nbr' => 17, 'Last12amt' => 18, 'Prevyearnbr' => 19, 'Prevyearamt' => 20, 'Dummy' => 21, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'type' => 4, 'custid' => 5, 'shiptoid' => 6, 'saleordnbr' => 7, 'saleordamt' => 8, 'openinvnbr' => 9, 'openinvamt' => 10, 'quotesbr' => 11, 'quotesmt' => 12, 'monthtodatenbr' => 13, 'monthtodateamt' => 14, 'yeartodatenbr' => 15, 'yeartodateamt' => 16, 'last12nbr' => 17, 'last12amt' => 18, 'prevyearnbr' => 19, 'prevyearamt' => 20, 'dummy' => 21, ],
        self::TYPE_COLNAME       => [OrdrtotTableMap::COL_SESSIONID => 0, OrdrtotTableMap::COL_RECNO => 1, OrdrtotTableMap::COL_DATE => 2, OrdrtotTableMap::COL_TIME => 3, OrdrtotTableMap::COL_TYPE => 4, OrdrtotTableMap::COL_CUSTID => 5, OrdrtotTableMap::COL_SHIPTOID => 6, OrdrtotTableMap::COL_SALEORDNBR => 7, OrdrtotTableMap::COL_SALEORDAMT => 8, OrdrtotTableMap::COL_OPENINVNBR => 9, OrdrtotTableMap::COL_OPENINVAMT => 10, OrdrtotTableMap::COL_QUOTESBR => 11, OrdrtotTableMap::COL_QUOTESMT => 12, OrdrtotTableMap::COL_MONTHTODATENBR => 13, OrdrtotTableMap::COL_MONTHTODATEAMT => 14, OrdrtotTableMap::COL_YEARTODATENBR => 15, OrdrtotTableMap::COL_YEARTODATEAMT => 16, OrdrtotTableMap::COL_LAST12NBR => 17, OrdrtotTableMap::COL_LAST12AMT => 18, OrdrtotTableMap::COL_PREVYEARNBR => 19, OrdrtotTableMap::COL_PREVYEARAMT => 20, OrdrtotTableMap::COL_DUMMY => 21, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'type' => 4, 'custid' => 5, 'shiptoid' => 6, 'saleordnbr' => 7, 'saleordamt' => 8, 'openinvnbr' => 9, 'openinvamt' => 10, 'quotesbr' => 11, 'quotesmt' => 12, 'monthtodatenbr' => 13, 'monthtodateamt' => 14, 'yeartodatenbr' => 15, 'yeartodateamt' => 16, 'last12nbr' => 17, 'last12amt' => 18, 'prevyearnbr' => 19, 'prevyearamt' => 20, 'dummy' => 21, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Ordrtot.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'ordrtot.sessionid' => 'SESSIONID',
        'OrdrtotTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Ordrtot.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'ordrtot.recno' => 'RECNO',
        'OrdrtotTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Ordrtot.Date' => 'DATE',
        'date' => 'DATE',
        'ordrtot.date' => 'DATE',
        'OrdrtotTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Ordrtot.Time' => 'TIME',
        'time' => 'TIME',
        'ordrtot.time' => 'TIME',
        'OrdrtotTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Type' => 'TYPE',
        'Ordrtot.Type' => 'TYPE',
        'type' => 'TYPE',
        'ordrtot.type' => 'TYPE',
        'OrdrtotTableMap::COL_TYPE' => 'TYPE',
        'COL_TYPE' => 'TYPE',
        'Custid' => 'CUSTID',
        'Ordrtot.Custid' => 'CUSTID',
        'custid' => 'CUSTID',
        'ordrtot.custid' => 'CUSTID',
        'OrdrtotTableMap::COL_CUSTID' => 'CUSTID',
        'COL_CUSTID' => 'CUSTID',
        'Shiptoid' => 'SHIPTOID',
        'Ordrtot.Shiptoid' => 'SHIPTOID',
        'shiptoid' => 'SHIPTOID',
        'ordrtot.shiptoid' => 'SHIPTOID',
        'OrdrtotTableMap::COL_SHIPTOID' => 'SHIPTOID',
        'COL_SHIPTOID' => 'SHIPTOID',
        'Saleordnbr' => 'SALEORDNBR',
        'Ordrtot.Saleordnbr' => 'SALEORDNBR',
        'saleordnbr' => 'SALEORDNBR',
        'ordrtot.saleordnbr' => 'SALEORDNBR',
        'OrdrtotTableMap::COL_SALEORDNBR' => 'SALEORDNBR',
        'COL_SALEORDNBR' => 'SALEORDNBR',
        'Saleordamt' => 'SALEORDAMT',
        'Ordrtot.Saleordamt' => 'SALEORDAMT',
        'saleordamt' => 'SALEORDAMT',
        'ordrtot.saleordamt' => 'SALEORDAMT',
        'OrdrtotTableMap::COL_SALEORDAMT' => 'SALEORDAMT',
        'COL_SALEORDAMT' => 'SALEORDAMT',
        'Openinvnbr' => 'OPENINVNBR',
        'Ordrtot.Openinvnbr' => 'OPENINVNBR',
        'openinvnbr' => 'OPENINVNBR',
        'ordrtot.openinvnbr' => 'OPENINVNBR',
        'OrdrtotTableMap::COL_OPENINVNBR' => 'OPENINVNBR',
        'COL_OPENINVNBR' => 'OPENINVNBR',
        'Openinvamt' => 'OPENINVAMT',
        'Ordrtot.Openinvamt' => 'OPENINVAMT',
        'openinvamt' => 'OPENINVAMT',
        'ordrtot.openinvamt' => 'OPENINVAMT',
        'OrdrtotTableMap::COL_OPENINVAMT' => 'OPENINVAMT',
        'COL_OPENINVAMT' => 'OPENINVAMT',
        'Quotesbr' => 'QUOTESBR',
        'Ordrtot.Quotesbr' => 'QUOTESBR',
        'quotesbr' => 'QUOTESBR',
        'ordrtot.quotesbr' => 'QUOTESBR',
        'OrdrtotTableMap::COL_QUOTESBR' => 'QUOTESBR',
        'COL_QUOTESBR' => 'QUOTESBR',
        'Quotesmt' => 'QUOTESMT',
        'Ordrtot.Quotesmt' => 'QUOTESMT',
        'quotesmt' => 'QUOTESMT',
        'ordrtot.quotesmt' => 'QUOTESMT',
        'OrdrtotTableMap::COL_QUOTESMT' => 'QUOTESMT',
        'COL_QUOTESMT' => 'QUOTESMT',
        'Monthtodatenbr' => 'MONTHTODATENBR',
        'Ordrtot.Monthtodatenbr' => 'MONTHTODATENBR',
        'monthtodatenbr' => 'MONTHTODATENBR',
        'ordrtot.monthtodatenbr' => 'MONTHTODATENBR',
        'OrdrtotTableMap::COL_MONTHTODATENBR' => 'MONTHTODATENBR',
        'COL_MONTHTODATENBR' => 'MONTHTODATENBR',
        'Monthtodateamt' => 'MONTHTODATEAMT',
        'Ordrtot.Monthtodateamt' => 'MONTHTODATEAMT',
        'monthtodateamt' => 'MONTHTODATEAMT',
        'ordrtot.monthtodateamt' => 'MONTHTODATEAMT',
        'OrdrtotTableMap::COL_MONTHTODATEAMT' => 'MONTHTODATEAMT',
        'COL_MONTHTODATEAMT' => 'MONTHTODATEAMT',
        'Yeartodatenbr' => 'YEARTODATENBR',
        'Ordrtot.Yeartodatenbr' => 'YEARTODATENBR',
        'yeartodatenbr' => 'YEARTODATENBR',
        'ordrtot.yeartodatenbr' => 'YEARTODATENBR',
        'OrdrtotTableMap::COL_YEARTODATENBR' => 'YEARTODATENBR',
        'COL_YEARTODATENBR' => 'YEARTODATENBR',
        'Yeartodateamt' => 'YEARTODATEAMT',
        'Ordrtot.Yeartodateamt' => 'YEARTODATEAMT',
        'yeartodateamt' => 'YEARTODATEAMT',
        'ordrtot.yeartodateamt' => 'YEARTODATEAMT',
        'OrdrtotTableMap::COL_YEARTODATEAMT' => 'YEARTODATEAMT',
        'COL_YEARTODATEAMT' => 'YEARTODATEAMT',
        'Last12nbr' => 'LAST12NBR',
        'Ordrtot.Last12nbr' => 'LAST12NBR',
        'last12nbr' => 'LAST12NBR',
        'ordrtot.last12nbr' => 'LAST12NBR',
        'OrdrtotTableMap::COL_LAST12NBR' => 'LAST12NBR',
        'COL_LAST12NBR' => 'LAST12NBR',
        'Last12amt' => 'LAST12AMT',
        'Ordrtot.Last12amt' => 'LAST12AMT',
        'last12amt' => 'LAST12AMT',
        'ordrtot.last12amt' => 'LAST12AMT',
        'OrdrtotTableMap::COL_LAST12AMT' => 'LAST12AMT',
        'COL_LAST12AMT' => 'LAST12AMT',
        'Prevyearnbr' => 'PREVYEARNBR',
        'Ordrtot.Prevyearnbr' => 'PREVYEARNBR',
        'prevyearnbr' => 'PREVYEARNBR',
        'ordrtot.prevyearnbr' => 'PREVYEARNBR',
        'OrdrtotTableMap::COL_PREVYEARNBR' => 'PREVYEARNBR',
        'COL_PREVYEARNBR' => 'PREVYEARNBR',
        'Prevyearamt' => 'PREVYEARAMT',
        'Ordrtot.Prevyearamt' => 'PREVYEARAMT',
        'prevyearamt' => 'PREVYEARAMT',
        'ordrtot.prevyearamt' => 'PREVYEARAMT',
        'OrdrtotTableMap::COL_PREVYEARAMT' => 'PREVYEARAMT',
        'COL_PREVYEARAMT' => 'PREVYEARAMT',
        'Dummy' => 'DUMMY',
        'Ordrtot.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'ordrtot.dummy' => 'DUMMY',
        'OrdrtotTableMap::COL_DUMMY' => 'DUMMY',
        'COL_DUMMY' => 'DUMMY',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('ordrtot');
        $this->setPhpName('Ordrtot');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ordrtot');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 6, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, null);
        $this->addColumn('saleordnbr', 'Saleordnbr', 'INTEGER', false, 8, null);
        $this->addColumn('saleordamt', 'Saleordamt', 'DECIMAL', false, 10, null);
        $this->addColumn('openinvnbr', 'Openinvnbr', 'INTEGER', false, 8, null);
        $this->addColumn('openinvamt', 'Openinvamt', 'DECIMAL', false, 10, null);
        $this->addColumn('quotesbr', 'Quotesbr', 'INTEGER', false, 8, null);
        $this->addColumn('quotesmt', 'Quotesmt', 'DECIMAL', false, 10, null);
        $this->addColumn('monthtodatenbr', 'Monthtodatenbr', 'INTEGER', false, 8, null);
        $this->addColumn('monthtodateamt', 'Monthtodateamt', 'DECIMAL', false, 10, null);
        $this->addColumn('yeartodatenbr', 'Yeartodatenbr', 'INTEGER', false, 8, null);
        $this->addColumn('yeartodateamt', 'Yeartodateamt', 'DECIMAL', false, 10, null);
        $this->addColumn('last12nbr', 'Last12nbr', 'INTEGER', false, 8, null);
        $this->addColumn('last12amt', 'Last12amt', 'DECIMAL', false, 10, null);
        $this->addColumn('prevyearnbr', 'Prevyearnbr', 'INTEGER', false, 8, null);
        $this->addColumn('prevyearamt', 'Prevyearamt', 'DECIMAL', false, 10, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Ordrtot $obj A \Ordrtot object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Ordrtot $obj, ?string $key = null): void
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
     * @param mixed $value A \Ordrtot object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Ordrtot) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Ordrtot object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
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
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
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
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? OrdrtotTableMap::CLASS_DEFAULT : OrdrtotTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Ordrtot object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrdrtotTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrdrtotTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrdrtotTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrdrtotTableMap::OM_CLASS;
            /** @var Ordrtot $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrdrtotTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OrdrtotTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrdrtotTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Ordrtot $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrdrtotTableMap::addInstanceToPool($obj, $key);
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
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OrdrtotTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_RECNO);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_DATE);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_TIME);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_TYPE);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_CUSTID);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_SALEORDNBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_SALEORDAMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_OPENINVNBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_OPENINVAMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_QUOTESBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_QUOTESMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_MONTHTODATENBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_MONTHTODATEAMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_YEARTODATENBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_YEARTODATEAMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_LAST12NBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_LAST12AMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_PREVYEARNBR);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_PREVYEARAMT);
            $criteria->addSelectColumn(OrdrtotTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.saleordnbr');
            $criteria->addSelectColumn($alias . '.saleordamt');
            $criteria->addSelectColumn($alias . '.openinvnbr');
            $criteria->addSelectColumn($alias . '.openinvamt');
            $criteria->addSelectColumn($alias . '.quotesbr');
            $criteria->addSelectColumn($alias . '.quotesmt');
            $criteria->addSelectColumn($alias . '.monthtodatenbr');
            $criteria->addSelectColumn($alias . '.monthtodateamt');
            $criteria->addSelectColumn($alias . '.yeartodatenbr');
            $criteria->addSelectColumn($alias . '.yeartodateamt');
            $criteria->addSelectColumn($alias . '.last12nbr');
            $criteria->addSelectColumn($alias . '.last12amt');
            $criteria->addSelectColumn($alias . '.prevyearnbr');
            $criteria->addSelectColumn($alias . '.prevyearamt');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_RECNO);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_DATE);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_TIME);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_TYPE);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_CUSTID);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_SHIPTOID);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_SALEORDNBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_SALEORDAMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_OPENINVNBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_OPENINVAMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_QUOTESBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_QUOTESMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_MONTHTODATENBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_MONTHTODATEAMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_YEARTODATENBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_YEARTODATEAMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_LAST12NBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_LAST12AMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_PREVYEARNBR);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_PREVYEARAMT);
            $criteria->removeSelectColumn(OrdrtotTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.type');
            $criteria->removeSelectColumn($alias . '.custid');
            $criteria->removeSelectColumn($alias . '.shiptoid');
            $criteria->removeSelectColumn($alias . '.saleordnbr');
            $criteria->removeSelectColumn($alias . '.saleordamt');
            $criteria->removeSelectColumn($alias . '.openinvnbr');
            $criteria->removeSelectColumn($alias . '.openinvamt');
            $criteria->removeSelectColumn($alias . '.quotesbr');
            $criteria->removeSelectColumn($alias . '.quotesmt');
            $criteria->removeSelectColumn($alias . '.monthtodatenbr');
            $criteria->removeSelectColumn($alias . '.monthtodateamt');
            $criteria->removeSelectColumn($alias . '.yeartodatenbr');
            $criteria->removeSelectColumn($alias . '.yeartodateamt');
            $criteria->removeSelectColumn($alias . '.last12nbr');
            $criteria->removeSelectColumn($alias . '.last12amt');
            $criteria->removeSelectColumn($alias . '.prevyearnbr');
            $criteria->removeSelectColumn($alias . '.prevyearamt');
            $criteria->removeSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(OrdrtotTableMap::DATABASE_NAME)->getTable(OrdrtotTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Ordrtot or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Ordrtot object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrtotTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ordrtot) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrdrtotTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(OrdrtotTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(OrdrtotTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = OrdrtotQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrdrtotTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrdrtotTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ordrtot table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrdrtotQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Ordrtot or Criteria object.
     *
     * @param mixed $criteria Criteria or Ordrtot object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrtotTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Ordrtot object
        }


        // Set the correct dbName
        $query = OrdrtotQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
