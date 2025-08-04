<?php

namespace Map;

use \Login;
use \LoginQuery;
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
 * This class defines the structure of the 'login' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class LoginTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.LoginTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'login';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Login';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Login';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Login';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 27;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 27;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'login.sessionid';

    /**
     * the column name for the recordno field
     */
    public const COL_RECORDNO = 'login.recordno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'login.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'login.time';

    /**
     * the column name for the custid field
     */
    public const COL_CUSTID = 'login.custid';

    /**
     * the column name for the shiptoid field
     */
    public const COL_SHIPTOID = 'login.shiptoid';

    /**
     * the column name for the name field
     */
    public const COL_NAME = 'login.name';

    /**
     * the column name for the address1 field
     */
    public const COL_ADDRESS1 = 'login.address1';

    /**
     * the column name for the address2 field
     */
    public const COL_ADDRESS2 = 'login.address2';

    /**
     * the column name for the city field
     */
    public const COL_CITY = 'login.city';

    /**
     * the column name for the st field
     */
    public const COL_ST = 'login.st';

    /**
     * the column name for the zip field
     */
    public const COL_ZIP = 'login.zip';

    /**
     * the column name for the phone field
     */
    public const COL_PHONE = 'login.phone';

    /**
     * the column name for the email field
     */
    public const COL_EMAIL = 'login.email';

    /**
     * the column name for the contact field
     */
    public const COL_CONTACT = 'login.contact';

    /**
     * the column name for the validlogin field
     */
    public const COL_VALIDLOGIN = 'login.validlogin';

    /**
     * the column name for the cconly field
     */
    public const COL_CCONLY = 'login.cconly';

    /**
     * the column name for the ermes field
     */
    public const COL_ERMES = 'login.ermes';

    /**
     * the column name for the passwd field
     */
    public const COL_PASSWD = 'login.passwd';

    /**
     * the column name for the cbi field
     */
    public const COL_CBI = 'login.cbi';

    /**
     * the column name for the mmn field
     */
    public const COL_MMN = 'login.mmn';

    /**
     * the column name for the country field
     */
    public const COL_COUNTRY = 'login.country';

    /**
     * the column name for the type field
     */
    public const COL_TYPE = 'login.type';

    /**
     * the column name for the address3 field
     */
    public const COL_ADDRESS3 = 'login.address3';

    /**
     * the column name for the vpromo field
     */
    public const COL_VPROMO = 'login.vpromo';

    /**
     * the column name for the promocode field
     */
    public const COL_PROMOCODE = 'login.promocode';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'login.dummy';

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
        self::TYPE_PHPNAME       => ['Sessionid', 'Recordno', 'Date', 'Time', 'Custid', 'Shiptoid', 'Name', 'Address1', 'Address2', 'City', 'St', 'Zip', 'Phone', 'Email', 'Contact', 'Validlogin', 'Cconly', 'Ermes', 'Passwd', 'Cbi', 'Mmn', 'Country', 'Type', 'Address3', 'Vpromo', 'Promocode', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recordno', 'date', 'time', 'custid', 'shiptoid', 'name', 'address1', 'address2', 'city', 'st', 'zip', 'phone', 'email', 'contact', 'validlogin', 'cconly', 'ermes', 'passwd', 'cbi', 'mmn', 'country', 'type', 'address3', 'vpromo', 'promocode', 'dummy', ],
        self::TYPE_COLNAME       => [LoginTableMap::COL_SESSIONID, LoginTableMap::COL_RECORDNO, LoginTableMap::COL_DATE, LoginTableMap::COL_TIME, LoginTableMap::COL_CUSTID, LoginTableMap::COL_SHIPTOID, LoginTableMap::COL_NAME, LoginTableMap::COL_ADDRESS1, LoginTableMap::COL_ADDRESS2, LoginTableMap::COL_CITY, LoginTableMap::COL_ST, LoginTableMap::COL_ZIP, LoginTableMap::COL_PHONE, LoginTableMap::COL_EMAIL, LoginTableMap::COL_CONTACT, LoginTableMap::COL_VALIDLOGIN, LoginTableMap::COL_CCONLY, LoginTableMap::COL_ERMES, LoginTableMap::COL_PASSWD, LoginTableMap::COL_CBI, LoginTableMap::COL_MMN, LoginTableMap::COL_COUNTRY, LoginTableMap::COL_TYPE, LoginTableMap::COL_ADDRESS3, LoginTableMap::COL_VPROMO, LoginTableMap::COL_PROMOCODE, LoginTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recordno', 'date', 'time', 'custid', 'shiptoid', 'name', 'address1', 'address2', 'city', 'st', 'zip', 'phone', 'email', 'contact', 'validlogin', 'cconly', 'ermes', 'passwd', 'cbi', 'mmn', 'country', 'type', 'address3', 'vpromo', 'promocode', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, ]
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
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recordno' => 1, 'Date' => 2, 'Time' => 3, 'Custid' => 4, 'Shiptoid' => 5, 'Name' => 6, 'Address1' => 7, 'Address2' => 8, 'City' => 9, 'St' => 10, 'Zip' => 11, 'Phone' => 12, 'Email' => 13, 'Contact' => 14, 'Validlogin' => 15, 'Cconly' => 16, 'Ermes' => 17, 'Passwd' => 18, 'Cbi' => 19, 'Mmn' => 20, 'Country' => 21, 'Type' => 22, 'Address3' => 23, 'Vpromo' => 24, 'Promocode' => 25, 'Dummy' => 26, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recordno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'name' => 6, 'address1' => 7, 'address2' => 8, 'city' => 9, 'st' => 10, 'zip' => 11, 'phone' => 12, 'email' => 13, 'contact' => 14, 'validlogin' => 15, 'cconly' => 16, 'ermes' => 17, 'passwd' => 18, 'cbi' => 19, 'mmn' => 20, 'country' => 21, 'type' => 22, 'address3' => 23, 'vpromo' => 24, 'promocode' => 25, 'dummy' => 26, ],
        self::TYPE_COLNAME       => [LoginTableMap::COL_SESSIONID => 0, LoginTableMap::COL_RECORDNO => 1, LoginTableMap::COL_DATE => 2, LoginTableMap::COL_TIME => 3, LoginTableMap::COL_CUSTID => 4, LoginTableMap::COL_SHIPTOID => 5, LoginTableMap::COL_NAME => 6, LoginTableMap::COL_ADDRESS1 => 7, LoginTableMap::COL_ADDRESS2 => 8, LoginTableMap::COL_CITY => 9, LoginTableMap::COL_ST => 10, LoginTableMap::COL_ZIP => 11, LoginTableMap::COL_PHONE => 12, LoginTableMap::COL_EMAIL => 13, LoginTableMap::COL_CONTACT => 14, LoginTableMap::COL_VALIDLOGIN => 15, LoginTableMap::COL_CCONLY => 16, LoginTableMap::COL_ERMES => 17, LoginTableMap::COL_PASSWD => 18, LoginTableMap::COL_CBI => 19, LoginTableMap::COL_MMN => 20, LoginTableMap::COL_COUNTRY => 21, LoginTableMap::COL_TYPE => 22, LoginTableMap::COL_ADDRESS3 => 23, LoginTableMap::COL_VPROMO => 24, LoginTableMap::COL_PROMOCODE => 25, LoginTableMap::COL_DUMMY => 26, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recordno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'name' => 6, 'address1' => 7, 'address2' => 8, 'city' => 9, 'st' => 10, 'zip' => 11, 'phone' => 12, 'email' => 13, 'contact' => 14, 'validlogin' => 15, 'cconly' => 16, 'ermes' => 17, 'passwd' => 18, 'cbi' => 19, 'mmn' => 20, 'country' => 21, 'type' => 22, 'address3' => 23, 'vpromo' => 24, 'promocode' => 25, 'dummy' => 26, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Login.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'login.sessionid' => 'SESSIONID',
        'LoginTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recordno' => 'RECORDNO',
        'Login.Recordno' => 'RECORDNO',
        'recordno' => 'RECORDNO',
        'login.recordno' => 'RECORDNO',
        'LoginTableMap::COL_RECORDNO' => 'RECORDNO',
        'COL_RECORDNO' => 'RECORDNO',
        'Date' => 'DATE',
        'Login.Date' => 'DATE',
        'date' => 'DATE',
        'login.date' => 'DATE',
        'LoginTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Login.Time' => 'TIME',
        'time' => 'TIME',
        'login.time' => 'TIME',
        'LoginTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Custid' => 'CUSTID',
        'Login.Custid' => 'CUSTID',
        'custid' => 'CUSTID',
        'login.custid' => 'CUSTID',
        'LoginTableMap::COL_CUSTID' => 'CUSTID',
        'COL_CUSTID' => 'CUSTID',
        'Shiptoid' => 'SHIPTOID',
        'Login.Shiptoid' => 'SHIPTOID',
        'shiptoid' => 'SHIPTOID',
        'login.shiptoid' => 'SHIPTOID',
        'LoginTableMap::COL_SHIPTOID' => 'SHIPTOID',
        'COL_SHIPTOID' => 'SHIPTOID',
        'Name' => 'NAME',
        'Login.Name' => 'NAME',
        'name' => 'NAME',
        'login.name' => 'NAME',
        'LoginTableMap::COL_NAME' => 'NAME',
        'COL_NAME' => 'NAME',
        'Address1' => 'ADDRESS1',
        'Login.Address1' => 'ADDRESS1',
        'address1' => 'ADDRESS1',
        'login.address1' => 'ADDRESS1',
        'LoginTableMap::COL_ADDRESS1' => 'ADDRESS1',
        'COL_ADDRESS1' => 'ADDRESS1',
        'Address2' => 'ADDRESS2',
        'Login.Address2' => 'ADDRESS2',
        'address2' => 'ADDRESS2',
        'login.address2' => 'ADDRESS2',
        'LoginTableMap::COL_ADDRESS2' => 'ADDRESS2',
        'COL_ADDRESS2' => 'ADDRESS2',
        'City' => 'CITY',
        'Login.City' => 'CITY',
        'city' => 'CITY',
        'login.city' => 'CITY',
        'LoginTableMap::COL_CITY' => 'CITY',
        'COL_CITY' => 'CITY',
        'St' => 'ST',
        'Login.St' => 'ST',
        'st' => 'ST',
        'login.st' => 'ST',
        'LoginTableMap::COL_ST' => 'ST',
        'COL_ST' => 'ST',
        'Zip' => 'ZIP',
        'Login.Zip' => 'ZIP',
        'zip' => 'ZIP',
        'login.zip' => 'ZIP',
        'LoginTableMap::COL_ZIP' => 'ZIP',
        'COL_ZIP' => 'ZIP',
        'Phone' => 'PHONE',
        'Login.Phone' => 'PHONE',
        'phone' => 'PHONE',
        'login.phone' => 'PHONE',
        'LoginTableMap::COL_PHONE' => 'PHONE',
        'COL_PHONE' => 'PHONE',
        'Email' => 'EMAIL',
        'Login.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'login.email' => 'EMAIL',
        'LoginTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Contact' => 'CONTACT',
        'Login.Contact' => 'CONTACT',
        'contact' => 'CONTACT',
        'login.contact' => 'CONTACT',
        'LoginTableMap::COL_CONTACT' => 'CONTACT',
        'COL_CONTACT' => 'CONTACT',
        'Validlogin' => 'VALIDLOGIN',
        'Login.Validlogin' => 'VALIDLOGIN',
        'validlogin' => 'VALIDLOGIN',
        'login.validlogin' => 'VALIDLOGIN',
        'LoginTableMap::COL_VALIDLOGIN' => 'VALIDLOGIN',
        'COL_VALIDLOGIN' => 'VALIDLOGIN',
        'Cconly' => 'CCONLY',
        'Login.Cconly' => 'CCONLY',
        'cconly' => 'CCONLY',
        'login.cconly' => 'CCONLY',
        'LoginTableMap::COL_CCONLY' => 'CCONLY',
        'COL_CCONLY' => 'CCONLY',
        'Ermes' => 'ERMES',
        'Login.Ermes' => 'ERMES',
        'ermes' => 'ERMES',
        'login.ermes' => 'ERMES',
        'LoginTableMap::COL_ERMES' => 'ERMES',
        'COL_ERMES' => 'ERMES',
        'Passwd' => 'PASSWD',
        'Login.Passwd' => 'PASSWD',
        'passwd' => 'PASSWD',
        'login.passwd' => 'PASSWD',
        'LoginTableMap::COL_PASSWD' => 'PASSWD',
        'COL_PASSWD' => 'PASSWD',
        'Cbi' => 'CBI',
        'Login.Cbi' => 'CBI',
        'cbi' => 'CBI',
        'login.cbi' => 'CBI',
        'LoginTableMap::COL_CBI' => 'CBI',
        'COL_CBI' => 'CBI',
        'Mmn' => 'MMN',
        'Login.Mmn' => 'MMN',
        'mmn' => 'MMN',
        'login.mmn' => 'MMN',
        'LoginTableMap::COL_MMN' => 'MMN',
        'COL_MMN' => 'MMN',
        'Country' => 'COUNTRY',
        'Login.Country' => 'COUNTRY',
        'country' => 'COUNTRY',
        'login.country' => 'COUNTRY',
        'LoginTableMap::COL_COUNTRY' => 'COUNTRY',
        'COL_COUNTRY' => 'COUNTRY',
        'Type' => 'TYPE',
        'Login.Type' => 'TYPE',
        'type' => 'TYPE',
        'login.type' => 'TYPE',
        'LoginTableMap::COL_TYPE' => 'TYPE',
        'COL_TYPE' => 'TYPE',
        'Address3' => 'ADDRESS3',
        'Login.Address3' => 'ADDRESS3',
        'address3' => 'ADDRESS3',
        'login.address3' => 'ADDRESS3',
        'LoginTableMap::COL_ADDRESS3' => 'ADDRESS3',
        'COL_ADDRESS3' => 'ADDRESS3',
        'Vpromo' => 'VPROMO',
        'Login.Vpromo' => 'VPROMO',
        'vpromo' => 'VPROMO',
        'login.vpromo' => 'VPROMO',
        'LoginTableMap::COL_VPROMO' => 'VPROMO',
        'COL_VPROMO' => 'VPROMO',
        'Promocode' => 'PROMOCODE',
        'Login.Promocode' => 'PROMOCODE',
        'promocode' => 'PROMOCODE',
        'login.promocode' => 'PROMOCODE',
        'LoginTableMap::COL_PROMOCODE' => 'PROMOCODE',
        'COL_PROMOCODE' => 'PROMOCODE',
        'Dummy' => 'DUMMY',
        'Login.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'login.dummy' => 'DUMMY',
        'LoginTableMap::COL_DUMMY' => 'DUMMY',
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
        $this->setName('login');
        $this->setPhpName('Login');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Login');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, '0');
        $this->addColumn('recordno', 'Recordno', 'INTEGER', false, null, 0);
        $this->addColumn('date', 'Date', 'VARCHAR', false, 20, null);
        $this->addColumn('time', 'Time', 'VARCHAR', false, 8, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 30, null);
        $this->addColumn('address1', 'Address1', 'VARCHAR', false, 30, null);
        $this->addColumn('address2', 'Address2', 'VARCHAR', false, 30, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 16, null);
        $this->addColumn('st', 'St', 'CHAR', false, 2, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', false, 10, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('contact', 'Contact', 'VARCHAR', false, 20, null);
        $this->addColumn('validlogin', 'Validlogin', 'CHAR', false, null, null);
        $this->addColumn('cconly', 'Cconly', 'CHAR', false, null, null);
        $this->addColumn('ermes', 'Ermes', 'VARCHAR', false, 50, null);
        $this->addColumn('passwd', 'Passwd', 'VARCHAR', false, 20, null);
        $this->addColumn('cbi', 'Cbi', 'VARCHAR', false, 50, null);
        $this->addColumn('mmn', 'Mmn', 'VARCHAR', false, 50, null);
        $this->addColumn('country', 'Country', 'VARCHAR', false, 35, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 1, null);
        $this->addColumn('address3', 'Address3', 'VARCHAR', false, 30, null);
        $this->addColumn('vpromo', 'Vpromo', 'VARCHAR', false, 1, null);
        $this->addColumn('promocode', 'Promocode', 'VARCHAR', false, 30, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)
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
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? LoginTableMap::CLASS_DEFAULT : LoginTableMap::OM_CLASS;
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
     * @return array (Login object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = LoginTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = LoginTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + LoginTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LoginTableMap::OM_CLASS;
            /** @var Login $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            LoginTableMap::addInstanceToPool($obj, $key);
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
            $key = LoginTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = LoginTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Login $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LoginTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(LoginTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(LoginTableMap::COL_RECORDNO);
            $criteria->addSelectColumn(LoginTableMap::COL_DATE);
            $criteria->addSelectColumn(LoginTableMap::COL_TIME);
            $criteria->addSelectColumn(LoginTableMap::COL_CUSTID);
            $criteria->addSelectColumn(LoginTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(LoginTableMap::COL_NAME);
            $criteria->addSelectColumn(LoginTableMap::COL_ADDRESS1);
            $criteria->addSelectColumn(LoginTableMap::COL_ADDRESS2);
            $criteria->addSelectColumn(LoginTableMap::COL_CITY);
            $criteria->addSelectColumn(LoginTableMap::COL_ST);
            $criteria->addSelectColumn(LoginTableMap::COL_ZIP);
            $criteria->addSelectColumn(LoginTableMap::COL_PHONE);
            $criteria->addSelectColumn(LoginTableMap::COL_EMAIL);
            $criteria->addSelectColumn(LoginTableMap::COL_CONTACT);
            $criteria->addSelectColumn(LoginTableMap::COL_VALIDLOGIN);
            $criteria->addSelectColumn(LoginTableMap::COL_CCONLY);
            $criteria->addSelectColumn(LoginTableMap::COL_ERMES);
            $criteria->addSelectColumn(LoginTableMap::COL_PASSWD);
            $criteria->addSelectColumn(LoginTableMap::COL_CBI);
            $criteria->addSelectColumn(LoginTableMap::COL_MMN);
            $criteria->addSelectColumn(LoginTableMap::COL_COUNTRY);
            $criteria->addSelectColumn(LoginTableMap::COL_TYPE);
            $criteria->addSelectColumn(LoginTableMap::COL_ADDRESS3);
            $criteria->addSelectColumn(LoginTableMap::COL_VPROMO);
            $criteria->addSelectColumn(LoginTableMap::COL_PROMOCODE);
            $criteria->addSelectColumn(LoginTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recordno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.address1');
            $criteria->addSelectColumn($alias . '.address2');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.st');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.validlogin');
            $criteria->addSelectColumn($alias . '.cconly');
            $criteria->addSelectColumn($alias . '.ermes');
            $criteria->addSelectColumn($alias . '.passwd');
            $criteria->addSelectColumn($alias . '.cbi');
            $criteria->addSelectColumn($alias . '.mmn');
            $criteria->addSelectColumn($alias . '.country');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.address3');
            $criteria->addSelectColumn($alias . '.vpromo');
            $criteria->addSelectColumn($alias . '.promocode');
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
            $criteria->removeSelectColumn(LoginTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(LoginTableMap::COL_RECORDNO);
            $criteria->removeSelectColumn(LoginTableMap::COL_DATE);
            $criteria->removeSelectColumn(LoginTableMap::COL_TIME);
            $criteria->removeSelectColumn(LoginTableMap::COL_CUSTID);
            $criteria->removeSelectColumn(LoginTableMap::COL_SHIPTOID);
            $criteria->removeSelectColumn(LoginTableMap::COL_NAME);
            $criteria->removeSelectColumn(LoginTableMap::COL_ADDRESS1);
            $criteria->removeSelectColumn(LoginTableMap::COL_ADDRESS2);
            $criteria->removeSelectColumn(LoginTableMap::COL_CITY);
            $criteria->removeSelectColumn(LoginTableMap::COL_ST);
            $criteria->removeSelectColumn(LoginTableMap::COL_ZIP);
            $criteria->removeSelectColumn(LoginTableMap::COL_PHONE);
            $criteria->removeSelectColumn(LoginTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(LoginTableMap::COL_CONTACT);
            $criteria->removeSelectColumn(LoginTableMap::COL_VALIDLOGIN);
            $criteria->removeSelectColumn(LoginTableMap::COL_CCONLY);
            $criteria->removeSelectColumn(LoginTableMap::COL_ERMES);
            $criteria->removeSelectColumn(LoginTableMap::COL_PASSWD);
            $criteria->removeSelectColumn(LoginTableMap::COL_CBI);
            $criteria->removeSelectColumn(LoginTableMap::COL_MMN);
            $criteria->removeSelectColumn(LoginTableMap::COL_COUNTRY);
            $criteria->removeSelectColumn(LoginTableMap::COL_TYPE);
            $criteria->removeSelectColumn(LoginTableMap::COL_ADDRESS3);
            $criteria->removeSelectColumn(LoginTableMap::COL_VPROMO);
            $criteria->removeSelectColumn(LoginTableMap::COL_PROMOCODE);
            $criteria->removeSelectColumn(LoginTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recordno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.custid');
            $criteria->removeSelectColumn($alias . '.shiptoid');
            $criteria->removeSelectColumn($alias . '.name');
            $criteria->removeSelectColumn($alias . '.address1');
            $criteria->removeSelectColumn($alias . '.address2');
            $criteria->removeSelectColumn($alias . '.city');
            $criteria->removeSelectColumn($alias . '.st');
            $criteria->removeSelectColumn($alias . '.zip');
            $criteria->removeSelectColumn($alias . '.phone');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.contact');
            $criteria->removeSelectColumn($alias . '.validlogin');
            $criteria->removeSelectColumn($alias . '.cconly');
            $criteria->removeSelectColumn($alias . '.ermes');
            $criteria->removeSelectColumn($alias . '.passwd');
            $criteria->removeSelectColumn($alias . '.cbi');
            $criteria->removeSelectColumn($alias . '.mmn');
            $criteria->removeSelectColumn($alias . '.country');
            $criteria->removeSelectColumn($alias . '.type');
            $criteria->removeSelectColumn($alias . '.address3');
            $criteria->removeSelectColumn($alias . '.vpromo');
            $criteria->removeSelectColumn($alias . '.promocode');
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
        return Propel::getServiceContainer()->getDatabaseMap(LoginTableMap::DATABASE_NAME)->getTable(LoginTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Login or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Login object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Login) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LoginTableMap::DATABASE_NAME);
            $criteria->add(LoginTableMap::COL_SESSIONID, (array) $values, Criteria::IN);
        }

        $query = LoginQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            LoginTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                LoginTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the login table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return LoginQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Login or Criteria object.
     *
     * @param mixed $criteria Criteria or Login object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Login object
        }


        // Set the correct dbName
        $query = LoginQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
