<?php

namespace Map;

use \Additem;
use \AdditemQuery;
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
 * This class defines the structure of the 'additem' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class AdditemTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.AdditemTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'additem';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Additem';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Additem';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Additem';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 52;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 52;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'additem.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'additem.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'additem.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'additem.time';

    /**
     * the column name for the itemid field
     */
    public const COL_ITEMID = 'additem.itemid';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'additem.price';

    /**
     * the column name for the qty field
     */
    public const COL_QTY = 'additem.qty';

    /**
     * the column name for the priceqty1 field
     */
    public const COL_PRICEQTY1 = 'additem.priceqty1';

    /**
     * the column name for the priceqty2 field
     */
    public const COL_PRICEQTY2 = 'additem.priceqty2';

    /**
     * the column name for the priceqty3 field
     */
    public const COL_PRICEQTY3 = 'additem.priceqty3';

    /**
     * the column name for the priceqty4 field
     */
    public const COL_PRICEQTY4 = 'additem.priceqty4';

    /**
     * the column name for the priceqty5 field
     */
    public const COL_PRICEQTY5 = 'additem.priceqty5';

    /**
     * the column name for the priceqty6 field
     */
    public const COL_PRICEQTY6 = 'additem.priceqty6';

    /**
     * the column name for the priceprice1 field
     */
    public const COL_PRICEPRICE1 = 'additem.priceprice1';

    /**
     * the column name for the priceprice2 field
     */
    public const COL_PRICEPRICE2 = 'additem.priceprice2';

    /**
     * the column name for the priceprice3 field
     */
    public const COL_PRICEPRICE3 = 'additem.priceprice3';

    /**
     * the column name for the priceprice4 field
     */
    public const COL_PRICEPRICE4 = 'additem.priceprice4';

    /**
     * the column name for the priceprice5 field
     */
    public const COL_PRICEPRICE5 = 'additem.priceprice5';

    /**
     * the column name for the priceprice6 field
     */
    public const COL_PRICEPRICE6 = 'additem.priceprice6';

    /**
     * the column name for the unit field
     */
    public const COL_UNIT = 'additem.unit';

    /**
     * the column name for the listprice field
     */
    public const COL_LISTPRICE = 'additem.listprice';

    /**
     * the column name for the name1 field
     */
    public const COL_NAME1 = 'additem.name1';

    /**
     * the column name for the name2 field
     */
    public const COL_NAME2 = 'additem.name2';

    /**
     * the column name for the shortdesc field
     */
    public const COL_SHORTDESC = 'additem.shortdesc';

    /**
     * the column name for the image field
     */
    public const COL_IMAGE = 'additem.image';

    /**
     * the column name for the familyid field
     */
    public const COL_FAMILYID = 'additem.familyid';

    /**
     * the column name for the ermes field
     */
    public const COL_ERMES = 'additem.ermes';

    /**
     * the column name for the speca field
     */
    public const COL_SPECA = 'additem.speca';

    /**
     * the column name for the specb field
     */
    public const COL_SPECB = 'additem.specb';

    /**
     * the column name for the specc field
     */
    public const COL_SPECC = 'additem.specc';

    /**
     * the column name for the specd field
     */
    public const COL_SPECD = 'additem.specd';

    /**
     * the column name for the spece field
     */
    public const COL_SPECE = 'additem.spece';

    /**
     * the column name for the specf field
     */
    public const COL_SPECF = 'additem.specf';

    /**
     * the column name for the specg field
     */
    public const COL_SPECG = 'additem.specg';

    /**
     * the column name for the spech field
     */
    public const COL_SPECH = 'additem.spech';

    /**
     * the column name for the longdesc field
     */
    public const COL_LONGDESC = 'additem.longdesc';

    /**
     * the column name for the orderno field
     */
    public const COL_ORDERNO = 'additem.orderno';

    /**
     * the column name for the name3 field
     */
    public const COL_NAME3 = 'additem.name3';

    /**
     * the column name for the name4 field
     */
    public const COL_NAME4 = 'additem.name4';

    /**
     * the column name for the thumb field
     */
    public const COL_THUMB = 'additem.thumb';

    /**
     * the column name for the width field
     */
    public const COL_WIDTH = 'additem.width';

    /**
     * the column name for the height field
     */
    public const COL_HEIGHT = 'additem.height';

    /**
     * the column name for the familydes field
     */
    public const COL_FAMILYDES = 'additem.familydes';

    /**
     * the column name for the keywords field
     */
    public const COL_KEYWORDS = 'additem.keywords';

    /**
     * the column name for the vpn field
     */
    public const COL_VPN = 'additem.vpn';

    /**
     * the column name for the uomdesc field
     */
    public const COL_UOMDESC = 'additem.uomdesc';

    /**
     * the column name for the vidinffg field
     */
    public const COL_VIDINFFG = 'additem.vidinffg';

    /**
     * the column name for the vidinflk field
     */
    public const COL_VIDINFLK = 'additem.vidinflk';

    /**
     * the column name for the additemflag field
     */
    public const COL_ADDITEMFLAG = 'additem.additemflag';

    /**
     * the column name for the schemafam field
     */
    public const COL_SCHEMAFAM = 'additem.schemafam';

    /**
     * the column name for the origitemid field
     */
    public const COL_ORIGITEMID = 'additem.origitemid';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'additem.dummy';

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
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Itemid', 'Price', 'Qty', 'Priceqty1', 'Priceqty2', 'Priceqty3', 'Priceqty4', 'Priceqty5', 'Priceqty6', 'Priceprice1', 'Priceprice2', 'Priceprice3', 'Priceprice4', 'Priceprice5', 'Priceprice6', 'Unit', 'Listprice', 'Name1', 'Name2', 'Shortdesc', 'Image', 'Familyid', 'Ermes', 'Speca', 'Specb', 'Specc', 'Specd', 'Spece', 'Specf', 'Specg', 'Spech', 'Longdesc', 'Orderno', 'Name3', 'Name4', 'Thumb', 'Width', 'Height', 'Familydes', 'Keywords', 'Vpn', 'Uomdesc', 'Vidinffg', 'Vidinflk', 'Additemflag', 'Schemafam', 'Origitemid', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'itemid', 'price', 'qty', 'priceqty1', 'priceqty2', 'priceqty3', 'priceqty4', 'priceqty5', 'priceqty6', 'priceprice1', 'priceprice2', 'priceprice3', 'priceprice4', 'priceprice5', 'priceprice6', 'unit', 'listprice', 'name1', 'name2', 'shortdesc', 'image', 'familyid', 'ermes', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'longdesc', 'orderno', 'name3', 'name4', 'thumb', 'width', 'height', 'familydes', 'keywords', 'vpn', 'uomdesc', 'vidinffg', 'vidinflk', 'additemflag', 'schemafam', 'origitemid', 'dummy', ],
        self::TYPE_COLNAME       => [AdditemTableMap::COL_SESSIONID, AdditemTableMap::COL_RECNO, AdditemTableMap::COL_DATE, AdditemTableMap::COL_TIME, AdditemTableMap::COL_ITEMID, AdditemTableMap::COL_PRICE, AdditemTableMap::COL_QTY, AdditemTableMap::COL_PRICEQTY1, AdditemTableMap::COL_PRICEQTY2, AdditemTableMap::COL_PRICEQTY3, AdditemTableMap::COL_PRICEQTY4, AdditemTableMap::COL_PRICEQTY5, AdditemTableMap::COL_PRICEQTY6, AdditemTableMap::COL_PRICEPRICE1, AdditemTableMap::COL_PRICEPRICE2, AdditemTableMap::COL_PRICEPRICE3, AdditemTableMap::COL_PRICEPRICE4, AdditemTableMap::COL_PRICEPRICE5, AdditemTableMap::COL_PRICEPRICE6, AdditemTableMap::COL_UNIT, AdditemTableMap::COL_LISTPRICE, AdditemTableMap::COL_NAME1, AdditemTableMap::COL_NAME2, AdditemTableMap::COL_SHORTDESC, AdditemTableMap::COL_IMAGE, AdditemTableMap::COL_FAMILYID, AdditemTableMap::COL_ERMES, AdditemTableMap::COL_SPECA, AdditemTableMap::COL_SPECB, AdditemTableMap::COL_SPECC, AdditemTableMap::COL_SPECD, AdditemTableMap::COL_SPECE, AdditemTableMap::COL_SPECF, AdditemTableMap::COL_SPECG, AdditemTableMap::COL_SPECH, AdditemTableMap::COL_LONGDESC, AdditemTableMap::COL_ORDERNO, AdditemTableMap::COL_NAME3, AdditemTableMap::COL_NAME4, AdditemTableMap::COL_THUMB, AdditemTableMap::COL_WIDTH, AdditemTableMap::COL_HEIGHT, AdditemTableMap::COL_FAMILYDES, AdditemTableMap::COL_KEYWORDS, AdditemTableMap::COL_VPN, AdditemTableMap::COL_UOMDESC, AdditemTableMap::COL_VIDINFFG, AdditemTableMap::COL_VIDINFLK, AdditemTableMap::COL_ADDITEMFLAG, AdditemTableMap::COL_SCHEMAFAM, AdditemTableMap::COL_ORIGITEMID, AdditemTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'itemid', 'price', 'qty', 'priceqty1', 'priceqty2', 'priceqty3', 'priceqty4', 'priceqty5', 'priceqty6', 'priceprice1', 'priceprice2', 'priceprice3', 'priceprice4', 'priceprice5', 'priceprice6', 'unit', 'listprice', 'name1', 'name2', 'shortdesc', 'image', 'familyid', 'ermes', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'longdesc', 'orderno', 'name3', 'name4', 'thumb', 'width', 'height', 'familydes', 'keywords', 'vpn', 'uomdesc', 'vidinffg', 'vidinflk', 'additemflag', 'schemafam', 'origitemid', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, ]
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
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Itemid' => 4, 'Price' => 5, 'Qty' => 6, 'Priceqty1' => 7, 'Priceqty2' => 8, 'Priceqty3' => 9, 'Priceqty4' => 10, 'Priceqty5' => 11, 'Priceqty6' => 12, 'Priceprice1' => 13, 'Priceprice2' => 14, 'Priceprice3' => 15, 'Priceprice4' => 16, 'Priceprice5' => 17, 'Priceprice6' => 18, 'Unit' => 19, 'Listprice' => 20, 'Name1' => 21, 'Name2' => 22, 'Shortdesc' => 23, 'Image' => 24, 'Familyid' => 25, 'Ermes' => 26, 'Speca' => 27, 'Specb' => 28, 'Specc' => 29, 'Specd' => 30, 'Spece' => 31, 'Specf' => 32, 'Specg' => 33, 'Spech' => 34, 'Longdesc' => 35, 'Orderno' => 36, 'Name3' => 37, 'Name4' => 38, 'Thumb' => 39, 'Width' => 40, 'Height' => 41, 'Familydes' => 42, 'Keywords' => 43, 'Vpn' => 44, 'Uomdesc' => 45, 'Vidinffg' => 46, 'Vidinflk' => 47, 'Additemflag' => 48, 'Schemafam' => 49, 'Origitemid' => 50, 'Dummy' => 51, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'itemid' => 4, 'price' => 5, 'qty' => 6, 'priceqty1' => 7, 'priceqty2' => 8, 'priceqty3' => 9, 'priceqty4' => 10, 'priceqty5' => 11, 'priceqty6' => 12, 'priceprice1' => 13, 'priceprice2' => 14, 'priceprice3' => 15, 'priceprice4' => 16, 'priceprice5' => 17, 'priceprice6' => 18, 'unit' => 19, 'listprice' => 20, 'name1' => 21, 'name2' => 22, 'shortdesc' => 23, 'image' => 24, 'familyid' => 25, 'ermes' => 26, 'speca' => 27, 'specb' => 28, 'specc' => 29, 'specd' => 30, 'spece' => 31, 'specf' => 32, 'specg' => 33, 'spech' => 34, 'longdesc' => 35, 'orderno' => 36, 'name3' => 37, 'name4' => 38, 'thumb' => 39, 'width' => 40, 'height' => 41, 'familydes' => 42, 'keywords' => 43, 'vpn' => 44, 'uomdesc' => 45, 'vidinffg' => 46, 'vidinflk' => 47, 'additemflag' => 48, 'schemafam' => 49, 'origitemid' => 50, 'dummy' => 51, ],
        self::TYPE_COLNAME       => [AdditemTableMap::COL_SESSIONID => 0, AdditemTableMap::COL_RECNO => 1, AdditemTableMap::COL_DATE => 2, AdditemTableMap::COL_TIME => 3, AdditemTableMap::COL_ITEMID => 4, AdditemTableMap::COL_PRICE => 5, AdditemTableMap::COL_QTY => 6, AdditemTableMap::COL_PRICEQTY1 => 7, AdditemTableMap::COL_PRICEQTY2 => 8, AdditemTableMap::COL_PRICEQTY3 => 9, AdditemTableMap::COL_PRICEQTY4 => 10, AdditemTableMap::COL_PRICEQTY5 => 11, AdditemTableMap::COL_PRICEQTY6 => 12, AdditemTableMap::COL_PRICEPRICE1 => 13, AdditemTableMap::COL_PRICEPRICE2 => 14, AdditemTableMap::COL_PRICEPRICE3 => 15, AdditemTableMap::COL_PRICEPRICE4 => 16, AdditemTableMap::COL_PRICEPRICE5 => 17, AdditemTableMap::COL_PRICEPRICE6 => 18, AdditemTableMap::COL_UNIT => 19, AdditemTableMap::COL_LISTPRICE => 20, AdditemTableMap::COL_NAME1 => 21, AdditemTableMap::COL_NAME2 => 22, AdditemTableMap::COL_SHORTDESC => 23, AdditemTableMap::COL_IMAGE => 24, AdditemTableMap::COL_FAMILYID => 25, AdditemTableMap::COL_ERMES => 26, AdditemTableMap::COL_SPECA => 27, AdditemTableMap::COL_SPECB => 28, AdditemTableMap::COL_SPECC => 29, AdditemTableMap::COL_SPECD => 30, AdditemTableMap::COL_SPECE => 31, AdditemTableMap::COL_SPECF => 32, AdditemTableMap::COL_SPECG => 33, AdditemTableMap::COL_SPECH => 34, AdditemTableMap::COL_LONGDESC => 35, AdditemTableMap::COL_ORDERNO => 36, AdditemTableMap::COL_NAME3 => 37, AdditemTableMap::COL_NAME4 => 38, AdditemTableMap::COL_THUMB => 39, AdditemTableMap::COL_WIDTH => 40, AdditemTableMap::COL_HEIGHT => 41, AdditemTableMap::COL_FAMILYDES => 42, AdditemTableMap::COL_KEYWORDS => 43, AdditemTableMap::COL_VPN => 44, AdditemTableMap::COL_UOMDESC => 45, AdditemTableMap::COL_VIDINFFG => 46, AdditemTableMap::COL_VIDINFLK => 47, AdditemTableMap::COL_ADDITEMFLAG => 48, AdditemTableMap::COL_SCHEMAFAM => 49, AdditemTableMap::COL_ORIGITEMID => 50, AdditemTableMap::COL_DUMMY => 51, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'itemid' => 4, 'price' => 5, 'qty' => 6, 'priceqty1' => 7, 'priceqty2' => 8, 'priceqty3' => 9, 'priceqty4' => 10, 'priceqty5' => 11, 'priceqty6' => 12, 'priceprice1' => 13, 'priceprice2' => 14, 'priceprice3' => 15, 'priceprice4' => 16, 'priceprice5' => 17, 'priceprice6' => 18, 'unit' => 19, 'listprice' => 20, 'name1' => 21, 'name2' => 22, 'shortdesc' => 23, 'image' => 24, 'familyid' => 25, 'ermes' => 26, 'speca' => 27, 'specb' => 28, 'specc' => 29, 'specd' => 30, 'spece' => 31, 'specf' => 32, 'specg' => 33, 'spech' => 34, 'longdesc' => 35, 'orderno' => 36, 'name3' => 37, 'name4' => 38, 'thumb' => 39, 'width' => 40, 'height' => 41, 'familydes' => 42, 'keywords' => 43, 'vpn' => 44, 'uomdesc' => 45, 'vidinffg' => 46, 'vidinflk' => 47, 'additemflag' => 48, 'schemafam' => 49, 'origitemid' => 50, 'dummy' => 51, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Additem.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'additem.sessionid' => 'SESSIONID',
        'AdditemTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Additem.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'additem.recno' => 'RECNO',
        'AdditemTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Additem.Date' => 'DATE',
        'date' => 'DATE',
        'additem.date' => 'DATE',
        'AdditemTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Additem.Time' => 'TIME',
        'time' => 'TIME',
        'additem.time' => 'TIME',
        'AdditemTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Itemid' => 'ITEMID',
        'Additem.Itemid' => 'ITEMID',
        'itemid' => 'ITEMID',
        'additem.itemid' => 'ITEMID',
        'AdditemTableMap::COL_ITEMID' => 'ITEMID',
        'COL_ITEMID' => 'ITEMID',
        'Price' => 'PRICE',
        'Additem.Price' => 'PRICE',
        'price' => 'PRICE',
        'additem.price' => 'PRICE',
        'AdditemTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'Qty' => 'QTY',
        'Additem.Qty' => 'QTY',
        'qty' => 'QTY',
        'additem.qty' => 'QTY',
        'AdditemTableMap::COL_QTY' => 'QTY',
        'COL_QTY' => 'QTY',
        'Priceqty1' => 'PRICEQTY1',
        'Additem.Priceqty1' => 'PRICEQTY1',
        'priceqty1' => 'PRICEQTY1',
        'additem.priceqty1' => 'PRICEQTY1',
        'AdditemTableMap::COL_PRICEQTY1' => 'PRICEQTY1',
        'COL_PRICEQTY1' => 'PRICEQTY1',
        'Priceqty2' => 'PRICEQTY2',
        'Additem.Priceqty2' => 'PRICEQTY2',
        'priceqty2' => 'PRICEQTY2',
        'additem.priceqty2' => 'PRICEQTY2',
        'AdditemTableMap::COL_PRICEQTY2' => 'PRICEQTY2',
        'COL_PRICEQTY2' => 'PRICEQTY2',
        'Priceqty3' => 'PRICEQTY3',
        'Additem.Priceqty3' => 'PRICEQTY3',
        'priceqty3' => 'PRICEQTY3',
        'additem.priceqty3' => 'PRICEQTY3',
        'AdditemTableMap::COL_PRICEQTY3' => 'PRICEQTY3',
        'COL_PRICEQTY3' => 'PRICEQTY3',
        'Priceqty4' => 'PRICEQTY4',
        'Additem.Priceqty4' => 'PRICEQTY4',
        'priceqty4' => 'PRICEQTY4',
        'additem.priceqty4' => 'PRICEQTY4',
        'AdditemTableMap::COL_PRICEQTY4' => 'PRICEQTY4',
        'COL_PRICEQTY4' => 'PRICEQTY4',
        'Priceqty5' => 'PRICEQTY5',
        'Additem.Priceqty5' => 'PRICEQTY5',
        'priceqty5' => 'PRICEQTY5',
        'additem.priceqty5' => 'PRICEQTY5',
        'AdditemTableMap::COL_PRICEQTY5' => 'PRICEQTY5',
        'COL_PRICEQTY5' => 'PRICEQTY5',
        'Priceqty6' => 'PRICEQTY6',
        'Additem.Priceqty6' => 'PRICEQTY6',
        'priceqty6' => 'PRICEQTY6',
        'additem.priceqty6' => 'PRICEQTY6',
        'AdditemTableMap::COL_PRICEQTY6' => 'PRICEQTY6',
        'COL_PRICEQTY6' => 'PRICEQTY6',
        'Priceprice1' => 'PRICEPRICE1',
        'Additem.Priceprice1' => 'PRICEPRICE1',
        'priceprice1' => 'PRICEPRICE1',
        'additem.priceprice1' => 'PRICEPRICE1',
        'AdditemTableMap::COL_PRICEPRICE1' => 'PRICEPRICE1',
        'COL_PRICEPRICE1' => 'PRICEPRICE1',
        'Priceprice2' => 'PRICEPRICE2',
        'Additem.Priceprice2' => 'PRICEPRICE2',
        'priceprice2' => 'PRICEPRICE2',
        'additem.priceprice2' => 'PRICEPRICE2',
        'AdditemTableMap::COL_PRICEPRICE2' => 'PRICEPRICE2',
        'COL_PRICEPRICE2' => 'PRICEPRICE2',
        'Priceprice3' => 'PRICEPRICE3',
        'Additem.Priceprice3' => 'PRICEPRICE3',
        'priceprice3' => 'PRICEPRICE3',
        'additem.priceprice3' => 'PRICEPRICE3',
        'AdditemTableMap::COL_PRICEPRICE3' => 'PRICEPRICE3',
        'COL_PRICEPRICE3' => 'PRICEPRICE3',
        'Priceprice4' => 'PRICEPRICE4',
        'Additem.Priceprice4' => 'PRICEPRICE4',
        'priceprice4' => 'PRICEPRICE4',
        'additem.priceprice4' => 'PRICEPRICE4',
        'AdditemTableMap::COL_PRICEPRICE4' => 'PRICEPRICE4',
        'COL_PRICEPRICE4' => 'PRICEPRICE4',
        'Priceprice5' => 'PRICEPRICE5',
        'Additem.Priceprice5' => 'PRICEPRICE5',
        'priceprice5' => 'PRICEPRICE5',
        'additem.priceprice5' => 'PRICEPRICE5',
        'AdditemTableMap::COL_PRICEPRICE5' => 'PRICEPRICE5',
        'COL_PRICEPRICE5' => 'PRICEPRICE5',
        'Priceprice6' => 'PRICEPRICE6',
        'Additem.Priceprice6' => 'PRICEPRICE6',
        'priceprice6' => 'PRICEPRICE6',
        'additem.priceprice6' => 'PRICEPRICE6',
        'AdditemTableMap::COL_PRICEPRICE6' => 'PRICEPRICE6',
        'COL_PRICEPRICE6' => 'PRICEPRICE6',
        'Unit' => 'UNIT',
        'Additem.Unit' => 'UNIT',
        'unit' => 'UNIT',
        'additem.unit' => 'UNIT',
        'AdditemTableMap::COL_UNIT' => 'UNIT',
        'COL_UNIT' => 'UNIT',
        'Listprice' => 'LISTPRICE',
        'Additem.Listprice' => 'LISTPRICE',
        'listprice' => 'LISTPRICE',
        'additem.listprice' => 'LISTPRICE',
        'AdditemTableMap::COL_LISTPRICE' => 'LISTPRICE',
        'COL_LISTPRICE' => 'LISTPRICE',
        'Name1' => 'NAME1',
        'Additem.Name1' => 'NAME1',
        'name1' => 'NAME1',
        'additem.name1' => 'NAME1',
        'AdditemTableMap::COL_NAME1' => 'NAME1',
        'COL_NAME1' => 'NAME1',
        'Name2' => 'NAME2',
        'Additem.Name2' => 'NAME2',
        'name2' => 'NAME2',
        'additem.name2' => 'NAME2',
        'AdditemTableMap::COL_NAME2' => 'NAME2',
        'COL_NAME2' => 'NAME2',
        'Shortdesc' => 'SHORTDESC',
        'Additem.Shortdesc' => 'SHORTDESC',
        'shortdesc' => 'SHORTDESC',
        'additem.shortdesc' => 'SHORTDESC',
        'AdditemTableMap::COL_SHORTDESC' => 'SHORTDESC',
        'COL_SHORTDESC' => 'SHORTDESC',
        'Image' => 'IMAGE',
        'Additem.Image' => 'IMAGE',
        'image' => 'IMAGE',
        'additem.image' => 'IMAGE',
        'AdditemTableMap::COL_IMAGE' => 'IMAGE',
        'COL_IMAGE' => 'IMAGE',
        'Familyid' => 'FAMILYID',
        'Additem.Familyid' => 'FAMILYID',
        'familyid' => 'FAMILYID',
        'additem.familyid' => 'FAMILYID',
        'AdditemTableMap::COL_FAMILYID' => 'FAMILYID',
        'COL_FAMILYID' => 'FAMILYID',
        'Ermes' => 'ERMES',
        'Additem.Ermes' => 'ERMES',
        'ermes' => 'ERMES',
        'additem.ermes' => 'ERMES',
        'AdditemTableMap::COL_ERMES' => 'ERMES',
        'COL_ERMES' => 'ERMES',
        'Speca' => 'SPECA',
        'Additem.Speca' => 'SPECA',
        'speca' => 'SPECA',
        'additem.speca' => 'SPECA',
        'AdditemTableMap::COL_SPECA' => 'SPECA',
        'COL_SPECA' => 'SPECA',
        'Specb' => 'SPECB',
        'Additem.Specb' => 'SPECB',
        'specb' => 'SPECB',
        'additem.specb' => 'SPECB',
        'AdditemTableMap::COL_SPECB' => 'SPECB',
        'COL_SPECB' => 'SPECB',
        'Specc' => 'SPECC',
        'Additem.Specc' => 'SPECC',
        'specc' => 'SPECC',
        'additem.specc' => 'SPECC',
        'AdditemTableMap::COL_SPECC' => 'SPECC',
        'COL_SPECC' => 'SPECC',
        'Specd' => 'SPECD',
        'Additem.Specd' => 'SPECD',
        'specd' => 'SPECD',
        'additem.specd' => 'SPECD',
        'AdditemTableMap::COL_SPECD' => 'SPECD',
        'COL_SPECD' => 'SPECD',
        'Spece' => 'SPECE',
        'Additem.Spece' => 'SPECE',
        'spece' => 'SPECE',
        'additem.spece' => 'SPECE',
        'AdditemTableMap::COL_SPECE' => 'SPECE',
        'COL_SPECE' => 'SPECE',
        'Specf' => 'SPECF',
        'Additem.Specf' => 'SPECF',
        'specf' => 'SPECF',
        'additem.specf' => 'SPECF',
        'AdditemTableMap::COL_SPECF' => 'SPECF',
        'COL_SPECF' => 'SPECF',
        'Specg' => 'SPECG',
        'Additem.Specg' => 'SPECG',
        'specg' => 'SPECG',
        'additem.specg' => 'SPECG',
        'AdditemTableMap::COL_SPECG' => 'SPECG',
        'COL_SPECG' => 'SPECG',
        'Spech' => 'SPECH',
        'Additem.Spech' => 'SPECH',
        'spech' => 'SPECH',
        'additem.spech' => 'SPECH',
        'AdditemTableMap::COL_SPECH' => 'SPECH',
        'COL_SPECH' => 'SPECH',
        'Longdesc' => 'LONGDESC',
        'Additem.Longdesc' => 'LONGDESC',
        'longdesc' => 'LONGDESC',
        'additem.longdesc' => 'LONGDESC',
        'AdditemTableMap::COL_LONGDESC' => 'LONGDESC',
        'COL_LONGDESC' => 'LONGDESC',
        'Orderno' => 'ORDERNO',
        'Additem.Orderno' => 'ORDERNO',
        'orderno' => 'ORDERNO',
        'additem.orderno' => 'ORDERNO',
        'AdditemTableMap::COL_ORDERNO' => 'ORDERNO',
        'COL_ORDERNO' => 'ORDERNO',
        'Name3' => 'NAME3',
        'Additem.Name3' => 'NAME3',
        'name3' => 'NAME3',
        'additem.name3' => 'NAME3',
        'AdditemTableMap::COL_NAME3' => 'NAME3',
        'COL_NAME3' => 'NAME3',
        'Name4' => 'NAME4',
        'Additem.Name4' => 'NAME4',
        'name4' => 'NAME4',
        'additem.name4' => 'NAME4',
        'AdditemTableMap::COL_NAME4' => 'NAME4',
        'COL_NAME4' => 'NAME4',
        'Thumb' => 'THUMB',
        'Additem.Thumb' => 'THUMB',
        'thumb' => 'THUMB',
        'additem.thumb' => 'THUMB',
        'AdditemTableMap::COL_THUMB' => 'THUMB',
        'COL_THUMB' => 'THUMB',
        'Width' => 'WIDTH',
        'Additem.Width' => 'WIDTH',
        'width' => 'WIDTH',
        'additem.width' => 'WIDTH',
        'AdditemTableMap::COL_WIDTH' => 'WIDTH',
        'COL_WIDTH' => 'WIDTH',
        'Height' => 'HEIGHT',
        'Additem.Height' => 'HEIGHT',
        'height' => 'HEIGHT',
        'additem.height' => 'HEIGHT',
        'AdditemTableMap::COL_HEIGHT' => 'HEIGHT',
        'COL_HEIGHT' => 'HEIGHT',
        'Familydes' => 'FAMILYDES',
        'Additem.Familydes' => 'FAMILYDES',
        'familydes' => 'FAMILYDES',
        'additem.familydes' => 'FAMILYDES',
        'AdditemTableMap::COL_FAMILYDES' => 'FAMILYDES',
        'COL_FAMILYDES' => 'FAMILYDES',
        'Keywords' => 'KEYWORDS',
        'Additem.Keywords' => 'KEYWORDS',
        'keywords' => 'KEYWORDS',
        'additem.keywords' => 'KEYWORDS',
        'AdditemTableMap::COL_KEYWORDS' => 'KEYWORDS',
        'COL_KEYWORDS' => 'KEYWORDS',
        'Vpn' => 'VPN',
        'Additem.Vpn' => 'VPN',
        'vpn' => 'VPN',
        'additem.vpn' => 'VPN',
        'AdditemTableMap::COL_VPN' => 'VPN',
        'COL_VPN' => 'VPN',
        'Uomdesc' => 'UOMDESC',
        'Additem.Uomdesc' => 'UOMDESC',
        'uomdesc' => 'UOMDESC',
        'additem.uomdesc' => 'UOMDESC',
        'AdditemTableMap::COL_UOMDESC' => 'UOMDESC',
        'COL_UOMDESC' => 'UOMDESC',
        'Vidinffg' => 'VIDINFFG',
        'Additem.Vidinffg' => 'VIDINFFG',
        'vidinffg' => 'VIDINFFG',
        'additem.vidinffg' => 'VIDINFFG',
        'AdditemTableMap::COL_VIDINFFG' => 'VIDINFFG',
        'COL_VIDINFFG' => 'VIDINFFG',
        'Vidinflk' => 'VIDINFLK',
        'Additem.Vidinflk' => 'VIDINFLK',
        'vidinflk' => 'VIDINFLK',
        'additem.vidinflk' => 'VIDINFLK',
        'AdditemTableMap::COL_VIDINFLK' => 'VIDINFLK',
        'COL_VIDINFLK' => 'VIDINFLK',
        'Additemflag' => 'ADDITEMFLAG',
        'Additem.Additemflag' => 'ADDITEMFLAG',
        'additemflag' => 'ADDITEMFLAG',
        'additem.additemflag' => 'ADDITEMFLAG',
        'AdditemTableMap::COL_ADDITEMFLAG' => 'ADDITEMFLAG',
        'COL_ADDITEMFLAG' => 'ADDITEMFLAG',
        'Schemafam' => 'SCHEMAFAM',
        'Additem.Schemafam' => 'SCHEMAFAM',
        'schemafam' => 'SCHEMAFAM',
        'additem.schemafam' => 'SCHEMAFAM',
        'AdditemTableMap::COL_SCHEMAFAM' => 'SCHEMAFAM',
        'COL_SCHEMAFAM' => 'SCHEMAFAM',
        'Origitemid' => 'ORIGITEMID',
        'Additem.Origitemid' => 'ORIGITEMID',
        'origitemid' => 'ORIGITEMID',
        'additem.origitemid' => 'ORIGITEMID',
        'AdditemTableMap::COL_ORIGITEMID' => 'ORIGITEMID',
        'COL_ORIGITEMID' => 'ORIGITEMID',
        'Dummy' => 'DUMMY',
        'Additem.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'additem.dummy' => 'DUMMY',
        'AdditemTableMap::COL_DUMMY' => 'DUMMY',
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
        $this->setName('additem');
        $this->setPhpName('Additem');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Additem');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 8, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty1', 'Priceqty1', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty2', 'Priceqty2', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty3', 'Priceqty3', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty4', 'Priceqty4', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty5', 'Priceqty5', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty6', 'Priceqty6', 'INTEGER', false, 8, null);
        $this->addColumn('priceprice1', 'Priceprice1', 'DECIMAL', false, 8, null);
        $this->addColumn('priceprice2', 'Priceprice2', 'DECIMAL', false, 8, null);
        $this->addColumn('priceprice3', 'Priceprice3', 'DECIMAL', false, 8, null);
        $this->addColumn('priceprice4', 'Priceprice4', 'DECIMAL', false, 8, null);
        $this->addColumn('priceprice5', 'Priceprice5', 'DECIMAL', false, 8, null);
        $this->addColumn('priceprice6', 'Priceprice6', 'DECIMAL', false, 8, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', false, 4, null);
        $this->addColumn('listprice', 'Listprice', 'DECIMAL', false, 8, null);
        $this->addColumn('name1', 'Name1', 'VARCHAR', false, 35, null);
        $this->addColumn('name2', 'Name2', 'VARCHAR', false, 35, null);
        $this->addColumn('shortdesc', 'Shortdesc', 'VARCHAR', false, 1000, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 30, null);
        $this->addColumn('familyid', 'Familyid', 'VARCHAR', false, 35, null);
        $this->addColumn('ermes', 'Ermes', 'VARCHAR', false, 50, null);
        $this->addColumn('speca', 'Speca', 'VARCHAR', false, 200, null);
        $this->addColumn('specb', 'Specb', 'VARCHAR', false, 200, null);
        $this->addColumn('specc', 'Specc', 'VARCHAR', false, 200, null);
        $this->addColumn('specd', 'Specd', 'VARCHAR', false, 200, null);
        $this->addColumn('spece', 'Spece', 'VARCHAR', false, 200, null);
        $this->addColumn('specf', 'Specf', 'VARCHAR', false, 200, null);
        $this->addColumn('specg', 'Specg', 'VARCHAR', false, 200, null);
        $this->addColumn('spech', 'Spech', 'VARCHAR', false, 200, null);
        $this->addColumn('longdesc', 'Longdesc', 'LONGVARCHAR', false, null, null);
        $this->addColumn('orderno', 'Orderno', 'VARCHAR', false, 30, null);
        $this->addColumn('name3', 'Name3', 'VARCHAR', false, 35, null);
        $this->addColumn('name4', 'Name4', 'VARCHAR', false, 35, null);
        $this->addColumn('thumb', 'Thumb', 'VARCHAR', false, 35, null);
        $this->addColumn('width', 'Width', 'VARCHAR', false, 35, null);
        $this->addColumn('height', 'Height', 'VARCHAR', false, 35, null);
        $this->addColumn('familydes', 'Familydes', 'VARCHAR', false, 35, null);
        $this->addColumn('keywords', 'Keywords', 'VARCHAR', false, 200, null);
        $this->addColumn('vpn', 'Vpn', 'VARCHAR', false, 35, null);
        $this->addColumn('uomdesc', 'Uomdesc', 'VARCHAR', false, 20, null);
        $this->addColumn('vidinffg', 'Vidinffg', 'VARCHAR', false, 1, null);
        $this->addColumn('vidinflk', 'Vidinflk', 'VARCHAR', false, 200, null);
        $this->addColumn('additemflag', 'Additemflag', 'VARCHAR', false, 1, null);
        $this->addColumn('schemafam', 'Schemafam', 'VARCHAR', false, 20, null);
        $this->addColumn('origitemid', 'Origitemid', 'VARCHAR', false, 30, null);
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
     * @param \Additem $obj A \Additem object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Additem $obj, ?string $key = null): void
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
     * @param mixed $value A \Additem object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Additem) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Additem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? AdditemTableMap::CLASS_DEFAULT : AdditemTableMap::OM_CLASS;
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
     * @return array (Additem object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = AdditemTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AdditemTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AdditemTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AdditemTableMap::OM_CLASS;
            /** @var Additem $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AdditemTableMap::addInstanceToPool($obj, $key);
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
            $key = AdditemTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AdditemTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Additem $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AdditemTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AdditemTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(AdditemTableMap::COL_RECNO);
            $criteria->addSelectColumn(AdditemTableMap::COL_DATE);
            $criteria->addSelectColumn(AdditemTableMap::COL_TIME);
            $criteria->addSelectColumn(AdditemTableMap::COL_ITEMID);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICE);
            $criteria->addSelectColumn(AdditemTableMap::COL_QTY);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEQTY1);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEQTY2);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEQTY3);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEQTY4);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEQTY5);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEQTY6);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEPRICE1);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEPRICE2);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEPRICE3);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEPRICE4);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEPRICE5);
            $criteria->addSelectColumn(AdditemTableMap::COL_PRICEPRICE6);
            $criteria->addSelectColumn(AdditemTableMap::COL_UNIT);
            $criteria->addSelectColumn(AdditemTableMap::COL_LISTPRICE);
            $criteria->addSelectColumn(AdditemTableMap::COL_NAME1);
            $criteria->addSelectColumn(AdditemTableMap::COL_NAME2);
            $criteria->addSelectColumn(AdditemTableMap::COL_SHORTDESC);
            $criteria->addSelectColumn(AdditemTableMap::COL_IMAGE);
            $criteria->addSelectColumn(AdditemTableMap::COL_FAMILYID);
            $criteria->addSelectColumn(AdditemTableMap::COL_ERMES);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECA);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECB);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECC);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECD);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECE);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECF);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECG);
            $criteria->addSelectColumn(AdditemTableMap::COL_SPECH);
            $criteria->addSelectColumn(AdditemTableMap::COL_LONGDESC);
            $criteria->addSelectColumn(AdditemTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(AdditemTableMap::COL_NAME3);
            $criteria->addSelectColumn(AdditemTableMap::COL_NAME4);
            $criteria->addSelectColumn(AdditemTableMap::COL_THUMB);
            $criteria->addSelectColumn(AdditemTableMap::COL_WIDTH);
            $criteria->addSelectColumn(AdditemTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(AdditemTableMap::COL_FAMILYDES);
            $criteria->addSelectColumn(AdditemTableMap::COL_KEYWORDS);
            $criteria->addSelectColumn(AdditemTableMap::COL_VPN);
            $criteria->addSelectColumn(AdditemTableMap::COL_UOMDESC);
            $criteria->addSelectColumn(AdditemTableMap::COL_VIDINFFG);
            $criteria->addSelectColumn(AdditemTableMap::COL_VIDINFLK);
            $criteria->addSelectColumn(AdditemTableMap::COL_ADDITEMFLAG);
            $criteria->addSelectColumn(AdditemTableMap::COL_SCHEMAFAM);
            $criteria->addSelectColumn(AdditemTableMap::COL_ORIGITEMID);
            $criteria->addSelectColumn(AdditemTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.priceqty1');
            $criteria->addSelectColumn($alias . '.priceqty2');
            $criteria->addSelectColumn($alias . '.priceqty3');
            $criteria->addSelectColumn($alias . '.priceqty4');
            $criteria->addSelectColumn($alias . '.priceqty5');
            $criteria->addSelectColumn($alias . '.priceqty6');
            $criteria->addSelectColumn($alias . '.priceprice1');
            $criteria->addSelectColumn($alias . '.priceprice2');
            $criteria->addSelectColumn($alias . '.priceprice3');
            $criteria->addSelectColumn($alias . '.priceprice4');
            $criteria->addSelectColumn($alias . '.priceprice5');
            $criteria->addSelectColumn($alias . '.priceprice6');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.listprice');
            $criteria->addSelectColumn($alias . '.name1');
            $criteria->addSelectColumn($alias . '.name2');
            $criteria->addSelectColumn($alias . '.shortdesc');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.familyid');
            $criteria->addSelectColumn($alias . '.ermes');
            $criteria->addSelectColumn($alias . '.speca');
            $criteria->addSelectColumn($alias . '.specb');
            $criteria->addSelectColumn($alias . '.specc');
            $criteria->addSelectColumn($alias . '.specd');
            $criteria->addSelectColumn($alias . '.spece');
            $criteria->addSelectColumn($alias . '.specf');
            $criteria->addSelectColumn($alias . '.specg');
            $criteria->addSelectColumn($alias . '.spech');
            $criteria->addSelectColumn($alias . '.longdesc');
            $criteria->addSelectColumn($alias . '.orderno');
            $criteria->addSelectColumn($alias . '.name3');
            $criteria->addSelectColumn($alias . '.name4');
            $criteria->addSelectColumn($alias . '.thumb');
            $criteria->addSelectColumn($alias . '.width');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.familydes');
            $criteria->addSelectColumn($alias . '.keywords');
            $criteria->addSelectColumn($alias . '.vpn');
            $criteria->addSelectColumn($alias . '.uomdesc');
            $criteria->addSelectColumn($alias . '.vidinffg');
            $criteria->addSelectColumn($alias . '.vidinflk');
            $criteria->addSelectColumn($alias . '.additemflag');
            $criteria->addSelectColumn($alias . '.schemafam');
            $criteria->addSelectColumn($alias . '.origitemid');
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
            $criteria->removeSelectColumn(AdditemTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(AdditemTableMap::COL_RECNO);
            $criteria->removeSelectColumn(AdditemTableMap::COL_DATE);
            $criteria->removeSelectColumn(AdditemTableMap::COL_TIME);
            $criteria->removeSelectColumn(AdditemTableMap::COL_ITEMID);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICE);
            $criteria->removeSelectColumn(AdditemTableMap::COL_QTY);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEQTY1);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEQTY2);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEQTY3);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEQTY4);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEQTY5);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEQTY6);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEPRICE1);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEPRICE2);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEPRICE3);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEPRICE4);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEPRICE5);
            $criteria->removeSelectColumn(AdditemTableMap::COL_PRICEPRICE6);
            $criteria->removeSelectColumn(AdditemTableMap::COL_UNIT);
            $criteria->removeSelectColumn(AdditemTableMap::COL_LISTPRICE);
            $criteria->removeSelectColumn(AdditemTableMap::COL_NAME1);
            $criteria->removeSelectColumn(AdditemTableMap::COL_NAME2);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SHORTDESC);
            $criteria->removeSelectColumn(AdditemTableMap::COL_IMAGE);
            $criteria->removeSelectColumn(AdditemTableMap::COL_FAMILYID);
            $criteria->removeSelectColumn(AdditemTableMap::COL_ERMES);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECA);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECB);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECC);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECD);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECE);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECF);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECG);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SPECH);
            $criteria->removeSelectColumn(AdditemTableMap::COL_LONGDESC);
            $criteria->removeSelectColumn(AdditemTableMap::COL_ORDERNO);
            $criteria->removeSelectColumn(AdditemTableMap::COL_NAME3);
            $criteria->removeSelectColumn(AdditemTableMap::COL_NAME4);
            $criteria->removeSelectColumn(AdditemTableMap::COL_THUMB);
            $criteria->removeSelectColumn(AdditemTableMap::COL_WIDTH);
            $criteria->removeSelectColumn(AdditemTableMap::COL_HEIGHT);
            $criteria->removeSelectColumn(AdditemTableMap::COL_FAMILYDES);
            $criteria->removeSelectColumn(AdditemTableMap::COL_KEYWORDS);
            $criteria->removeSelectColumn(AdditemTableMap::COL_VPN);
            $criteria->removeSelectColumn(AdditemTableMap::COL_UOMDESC);
            $criteria->removeSelectColumn(AdditemTableMap::COL_VIDINFFG);
            $criteria->removeSelectColumn(AdditemTableMap::COL_VIDINFLK);
            $criteria->removeSelectColumn(AdditemTableMap::COL_ADDITEMFLAG);
            $criteria->removeSelectColumn(AdditemTableMap::COL_SCHEMAFAM);
            $criteria->removeSelectColumn(AdditemTableMap::COL_ORIGITEMID);
            $criteria->removeSelectColumn(AdditemTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.itemid');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.qty');
            $criteria->removeSelectColumn($alias . '.priceqty1');
            $criteria->removeSelectColumn($alias . '.priceqty2');
            $criteria->removeSelectColumn($alias . '.priceqty3');
            $criteria->removeSelectColumn($alias . '.priceqty4');
            $criteria->removeSelectColumn($alias . '.priceqty5');
            $criteria->removeSelectColumn($alias . '.priceqty6');
            $criteria->removeSelectColumn($alias . '.priceprice1');
            $criteria->removeSelectColumn($alias . '.priceprice2');
            $criteria->removeSelectColumn($alias . '.priceprice3');
            $criteria->removeSelectColumn($alias . '.priceprice4');
            $criteria->removeSelectColumn($alias . '.priceprice5');
            $criteria->removeSelectColumn($alias . '.priceprice6');
            $criteria->removeSelectColumn($alias . '.unit');
            $criteria->removeSelectColumn($alias . '.listprice');
            $criteria->removeSelectColumn($alias . '.name1');
            $criteria->removeSelectColumn($alias . '.name2');
            $criteria->removeSelectColumn($alias . '.shortdesc');
            $criteria->removeSelectColumn($alias . '.image');
            $criteria->removeSelectColumn($alias . '.familyid');
            $criteria->removeSelectColumn($alias . '.ermes');
            $criteria->removeSelectColumn($alias . '.speca');
            $criteria->removeSelectColumn($alias . '.specb');
            $criteria->removeSelectColumn($alias . '.specc');
            $criteria->removeSelectColumn($alias . '.specd');
            $criteria->removeSelectColumn($alias . '.spece');
            $criteria->removeSelectColumn($alias . '.specf');
            $criteria->removeSelectColumn($alias . '.specg');
            $criteria->removeSelectColumn($alias . '.spech');
            $criteria->removeSelectColumn($alias . '.longdesc');
            $criteria->removeSelectColumn($alias . '.orderno');
            $criteria->removeSelectColumn($alias . '.name3');
            $criteria->removeSelectColumn($alias . '.name4');
            $criteria->removeSelectColumn($alias . '.thumb');
            $criteria->removeSelectColumn($alias . '.width');
            $criteria->removeSelectColumn($alias . '.height');
            $criteria->removeSelectColumn($alias . '.familydes');
            $criteria->removeSelectColumn($alias . '.keywords');
            $criteria->removeSelectColumn($alias . '.vpn');
            $criteria->removeSelectColumn($alias . '.uomdesc');
            $criteria->removeSelectColumn($alias . '.vidinffg');
            $criteria->removeSelectColumn($alias . '.vidinflk');
            $criteria->removeSelectColumn($alias . '.additemflag');
            $criteria->removeSelectColumn($alias . '.schemafam');
            $criteria->removeSelectColumn($alias . '.origitemid');
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
        return Propel::getServiceContainer()->getDatabaseMap(AdditemTableMap::DATABASE_NAME)->getTable(AdditemTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Additem or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Additem object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AdditemTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Additem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AdditemTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AdditemTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AdditemTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = AdditemQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AdditemTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AdditemTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the additem table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return AdditemQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Additem or Criteria object.
     *
     * @param mixed $criteria Criteria or Additem object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdditemTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Additem object
        }


        // Set the correct dbName
        $query = AdditemQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
