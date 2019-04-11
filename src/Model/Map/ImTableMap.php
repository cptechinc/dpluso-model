<?php

namespace Map;

use \Im;
use \ImQuery;
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
 * This class defines the structure of the 'im' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ImTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ImTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'im';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Im';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Im';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 53;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 53;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'im.sessionid';

    /**
     * the column name for the recordno field
     */
    const COL_RECORDNO = 'im.recordno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'im.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'im.time';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'im.itemid';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'im.price';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'im.qty';

    /**
     * the column name for the priceqty1 field
     */
    const COL_PRICEQTY1 = 'im.priceqty1';

    /**
     * the column name for the priceqty2 field
     */
    const COL_PRICEQTY2 = 'im.priceqty2';

    /**
     * the column name for the priceqty3 field
     */
    const COL_PRICEQTY3 = 'im.priceqty3';

    /**
     * the column name for the priceqty4 field
     */
    const COL_PRICEQTY4 = 'im.priceqty4';

    /**
     * the column name for the priceqty5 field
     */
    const COL_PRICEQTY5 = 'im.priceqty5';

    /**
     * the column name for the priceqty6 field
     */
    const COL_PRICEQTY6 = 'im.priceqty6';

    /**
     * the column name for the priceprice1 field
     */
    const COL_PRICEPRICE1 = 'im.priceprice1';

    /**
     * the column name for the priceprice2 field
     */
    const COL_PRICEPRICE2 = 'im.priceprice2';

    /**
     * the column name for the priceprice3 field
     */
    const COL_PRICEPRICE3 = 'im.priceprice3';

    /**
     * the column name for the priceprice4 field
     */
    const COL_PRICEPRICE4 = 'im.priceprice4';

    /**
     * the column name for the priceprice5 field
     */
    const COL_PRICEPRICE5 = 'im.priceprice5';

    /**
     * the column name for the priceprice6 field
     */
    const COL_PRICEPRICE6 = 'im.priceprice6';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'im.unit';

    /**
     * the column name for the listprice field
     */
    const COL_LISTPRICE = 'im.listprice';

    /**
     * the column name for the name1 field
     */
    const COL_NAME1 = 'im.name1';

    /**
     * the column name for the name2 field
     */
    const COL_NAME2 = 'im.name2';

    /**
     * the column name for the shortdesc field
     */
    const COL_SHORTDESC = 'im.shortdesc';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'im.image';

    /**
     * the column name for the familyid field
     */
    const COL_FAMILYID = 'im.familyid';

    /**
     * the column name for the ermes field
     */
    const COL_ERMES = 'im.ermes';

    /**
     * the column name for the speca field
     */
    const COL_SPECA = 'im.speca';

    /**
     * the column name for the specb field
     */
    const COL_SPECB = 'im.specb';

    /**
     * the column name for the specc field
     */
    const COL_SPECC = 'im.specc';

    /**
     * the column name for the specd field
     */
    const COL_SPECD = 'im.specd';

    /**
     * the column name for the spece field
     */
    const COL_SPECE = 'im.spece';

    /**
     * the column name for the specf field
     */
    const COL_SPECF = 'im.specf';

    /**
     * the column name for the specg field
     */
    const COL_SPECG = 'im.specg';

    /**
     * the column name for the spech field
     */
    const COL_SPECH = 'im.spech';

    /**
     * the column name for the longdesc field
     */
    const COL_LONGDESC = 'im.longdesc';

    /**
     * the column name for the orderno field
     */
    const COL_ORDERNO = 'im.orderno';

    /**
     * the column name for the name3 field
     */
    const COL_NAME3 = 'im.name3';

    /**
     * the column name for the name4 field
     */
    const COL_NAME4 = 'im.name4';

    /**
     * the column name for the thumb field
     */
    const COL_THUMB = 'im.thumb';

    /**
     * the column name for the width field
     */
    const COL_WIDTH = 'im.width';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'im.height';

    /**
     * the column name for the familydes field
     */
    const COL_FAMILYDES = 'im.familydes';

    /**
     * the column name for the keywords field
     */
    const COL_KEYWORDS = 'im.keywords';

    /**
     * the column name for the vpn field
     */
    const COL_VPN = 'im.vpn';

    /**
     * the column name for the uomdesc field
     */
    const COL_UOMDESC = 'im.uomdesc';

    /**
     * the column name for the vidinffg field
     */
    const COL_VIDINFFG = 'im.vidinffg';

    /**
     * the column name for the vidinflk field
     */
    const COL_VIDINFLK = 'im.vidinflk';

    /**
     * the column name for the additemflag field
     */
    const COL_ADDITEMFLAG = 'im.additemflag';

    /**
     * the column name for the schemafam field
     */
    const COL_SCHEMAFAM = 'im.schemafam';

    /**
     * the column name for the prop65 field
     */
    const COL_PROP65 = 'im.prop65';

    /**
     * the column name for the leadfree field
     */
    const COL_LEADFREE = 'im.leadfree';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'im.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recordno', 'Date', 'Time', 'Itemid', 'Price', 'Qty', 'Priceqty1', 'Priceqty2', 'Priceqty3', 'Priceqty4', 'Priceqty5', 'Priceqty6', 'Priceprice1', 'Priceprice2', 'Priceprice3', 'Priceprice4', 'Priceprice5', 'Priceprice6', 'Unit', 'Listprice', 'Name1', 'Name2', 'Shortdesc', 'Image', 'Familyid', 'Ermes', 'Speca', 'Specb', 'Specc', 'Specd', 'Spece', 'Specf', 'Specg', 'Spech', 'Longdesc', 'Orderno', 'Name3', 'Name4', 'Thumb', 'Width', 'Height', 'Familydes', 'Keywords', 'Vpn', 'Uomdesc', 'Vidinffg', 'Vidinflk', 'Additemflag', 'Schemafam', 'Prop65', 'Leadfree', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recordno', 'date', 'time', 'itemid', 'price', 'qty', 'priceqty1', 'priceqty2', 'priceqty3', 'priceqty4', 'priceqty5', 'priceqty6', 'priceprice1', 'priceprice2', 'priceprice3', 'priceprice4', 'priceprice5', 'priceprice6', 'unit', 'listprice', 'name1', 'name2', 'shortdesc', 'image', 'familyid', 'ermes', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'longdesc', 'orderno', 'name3', 'name4', 'thumb', 'width', 'height', 'familydes', 'keywords', 'vpn', 'uomdesc', 'vidinffg', 'vidinflk', 'additemflag', 'schemafam', 'prop65', 'leadfree', 'dummy', ),
        self::TYPE_COLNAME       => array(ImTableMap::COL_SESSIONID, ImTableMap::COL_RECORDNO, ImTableMap::COL_DATE, ImTableMap::COL_TIME, ImTableMap::COL_ITEMID, ImTableMap::COL_PRICE, ImTableMap::COL_QTY, ImTableMap::COL_PRICEQTY1, ImTableMap::COL_PRICEQTY2, ImTableMap::COL_PRICEQTY3, ImTableMap::COL_PRICEQTY4, ImTableMap::COL_PRICEQTY5, ImTableMap::COL_PRICEQTY6, ImTableMap::COL_PRICEPRICE1, ImTableMap::COL_PRICEPRICE2, ImTableMap::COL_PRICEPRICE3, ImTableMap::COL_PRICEPRICE4, ImTableMap::COL_PRICEPRICE5, ImTableMap::COL_PRICEPRICE6, ImTableMap::COL_UNIT, ImTableMap::COL_LISTPRICE, ImTableMap::COL_NAME1, ImTableMap::COL_NAME2, ImTableMap::COL_SHORTDESC, ImTableMap::COL_IMAGE, ImTableMap::COL_FAMILYID, ImTableMap::COL_ERMES, ImTableMap::COL_SPECA, ImTableMap::COL_SPECB, ImTableMap::COL_SPECC, ImTableMap::COL_SPECD, ImTableMap::COL_SPECE, ImTableMap::COL_SPECF, ImTableMap::COL_SPECG, ImTableMap::COL_SPECH, ImTableMap::COL_LONGDESC, ImTableMap::COL_ORDERNO, ImTableMap::COL_NAME3, ImTableMap::COL_NAME4, ImTableMap::COL_THUMB, ImTableMap::COL_WIDTH, ImTableMap::COL_HEIGHT, ImTableMap::COL_FAMILYDES, ImTableMap::COL_KEYWORDS, ImTableMap::COL_VPN, ImTableMap::COL_UOMDESC, ImTableMap::COL_VIDINFFG, ImTableMap::COL_VIDINFLK, ImTableMap::COL_ADDITEMFLAG, ImTableMap::COL_SCHEMAFAM, ImTableMap::COL_PROP65, ImTableMap::COL_LEADFREE, ImTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recordno', 'date', 'time', 'itemid', 'price', 'qty', 'priceqty1', 'priceqty2', 'priceqty3', 'priceqty4', 'priceqty5', 'priceqty6', 'priceprice1', 'priceprice2', 'priceprice3', 'priceprice4', 'priceprice5', 'priceprice6', 'unit', 'listprice', 'name1', 'name2', 'shortdesc', 'image', 'familyid', 'ermes', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'longdesc', 'orderno', 'name3', 'name4', 'thumb', 'width', 'height', 'familydes', 'keywords', 'vpn', 'uomdesc', 'vidinffg', 'vidinflk', 'additemflag', 'schemafam', 'prop65', 'leadfree', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recordno' => 1, 'Date' => 2, 'Time' => 3, 'Itemid' => 4, 'Price' => 5, 'Qty' => 6, 'Priceqty1' => 7, 'Priceqty2' => 8, 'Priceqty3' => 9, 'Priceqty4' => 10, 'Priceqty5' => 11, 'Priceqty6' => 12, 'Priceprice1' => 13, 'Priceprice2' => 14, 'Priceprice3' => 15, 'Priceprice4' => 16, 'Priceprice5' => 17, 'Priceprice6' => 18, 'Unit' => 19, 'Listprice' => 20, 'Name1' => 21, 'Name2' => 22, 'Shortdesc' => 23, 'Image' => 24, 'Familyid' => 25, 'Ermes' => 26, 'Speca' => 27, 'Specb' => 28, 'Specc' => 29, 'Specd' => 30, 'Spece' => 31, 'Specf' => 32, 'Specg' => 33, 'Spech' => 34, 'Longdesc' => 35, 'Orderno' => 36, 'Name3' => 37, 'Name4' => 38, 'Thumb' => 39, 'Width' => 40, 'Height' => 41, 'Familydes' => 42, 'Keywords' => 43, 'Vpn' => 44, 'Uomdesc' => 45, 'Vidinffg' => 46, 'Vidinflk' => 47, 'Additemflag' => 48, 'Schemafam' => 49, 'Prop65' => 50, 'Leadfree' => 51, 'Dummy' => 52, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recordno' => 1, 'date' => 2, 'time' => 3, 'itemid' => 4, 'price' => 5, 'qty' => 6, 'priceqty1' => 7, 'priceqty2' => 8, 'priceqty3' => 9, 'priceqty4' => 10, 'priceqty5' => 11, 'priceqty6' => 12, 'priceprice1' => 13, 'priceprice2' => 14, 'priceprice3' => 15, 'priceprice4' => 16, 'priceprice5' => 17, 'priceprice6' => 18, 'unit' => 19, 'listprice' => 20, 'name1' => 21, 'name2' => 22, 'shortdesc' => 23, 'image' => 24, 'familyid' => 25, 'ermes' => 26, 'speca' => 27, 'specb' => 28, 'specc' => 29, 'specd' => 30, 'spece' => 31, 'specf' => 32, 'specg' => 33, 'spech' => 34, 'longdesc' => 35, 'orderno' => 36, 'name3' => 37, 'name4' => 38, 'thumb' => 39, 'width' => 40, 'height' => 41, 'familydes' => 42, 'keywords' => 43, 'vpn' => 44, 'uomdesc' => 45, 'vidinffg' => 46, 'vidinflk' => 47, 'additemflag' => 48, 'schemafam' => 49, 'prop65' => 50, 'leadfree' => 51, 'dummy' => 52, ),
        self::TYPE_COLNAME       => array(ImTableMap::COL_SESSIONID => 0, ImTableMap::COL_RECORDNO => 1, ImTableMap::COL_DATE => 2, ImTableMap::COL_TIME => 3, ImTableMap::COL_ITEMID => 4, ImTableMap::COL_PRICE => 5, ImTableMap::COL_QTY => 6, ImTableMap::COL_PRICEQTY1 => 7, ImTableMap::COL_PRICEQTY2 => 8, ImTableMap::COL_PRICEQTY3 => 9, ImTableMap::COL_PRICEQTY4 => 10, ImTableMap::COL_PRICEQTY5 => 11, ImTableMap::COL_PRICEQTY6 => 12, ImTableMap::COL_PRICEPRICE1 => 13, ImTableMap::COL_PRICEPRICE2 => 14, ImTableMap::COL_PRICEPRICE3 => 15, ImTableMap::COL_PRICEPRICE4 => 16, ImTableMap::COL_PRICEPRICE5 => 17, ImTableMap::COL_PRICEPRICE6 => 18, ImTableMap::COL_UNIT => 19, ImTableMap::COL_LISTPRICE => 20, ImTableMap::COL_NAME1 => 21, ImTableMap::COL_NAME2 => 22, ImTableMap::COL_SHORTDESC => 23, ImTableMap::COL_IMAGE => 24, ImTableMap::COL_FAMILYID => 25, ImTableMap::COL_ERMES => 26, ImTableMap::COL_SPECA => 27, ImTableMap::COL_SPECB => 28, ImTableMap::COL_SPECC => 29, ImTableMap::COL_SPECD => 30, ImTableMap::COL_SPECE => 31, ImTableMap::COL_SPECF => 32, ImTableMap::COL_SPECG => 33, ImTableMap::COL_SPECH => 34, ImTableMap::COL_LONGDESC => 35, ImTableMap::COL_ORDERNO => 36, ImTableMap::COL_NAME3 => 37, ImTableMap::COL_NAME4 => 38, ImTableMap::COL_THUMB => 39, ImTableMap::COL_WIDTH => 40, ImTableMap::COL_HEIGHT => 41, ImTableMap::COL_FAMILYDES => 42, ImTableMap::COL_KEYWORDS => 43, ImTableMap::COL_VPN => 44, ImTableMap::COL_UOMDESC => 45, ImTableMap::COL_VIDINFFG => 46, ImTableMap::COL_VIDINFLK => 47, ImTableMap::COL_ADDITEMFLAG => 48, ImTableMap::COL_SCHEMAFAM => 49, ImTableMap::COL_PROP65 => 50, ImTableMap::COL_LEADFREE => 51, ImTableMap::COL_DUMMY => 52, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recordno' => 1, 'date' => 2, 'time' => 3, 'itemid' => 4, 'price' => 5, 'qty' => 6, 'priceqty1' => 7, 'priceqty2' => 8, 'priceqty3' => 9, 'priceqty4' => 10, 'priceqty5' => 11, 'priceqty6' => 12, 'priceprice1' => 13, 'priceprice2' => 14, 'priceprice3' => 15, 'priceprice4' => 16, 'priceprice5' => 17, 'priceprice6' => 18, 'unit' => 19, 'listprice' => 20, 'name1' => 21, 'name2' => 22, 'shortdesc' => 23, 'image' => 24, 'familyid' => 25, 'ermes' => 26, 'speca' => 27, 'specb' => 28, 'specc' => 29, 'specd' => 30, 'spece' => 31, 'specf' => 32, 'specg' => 33, 'spech' => 34, 'longdesc' => 35, 'orderno' => 36, 'name3' => 37, 'name4' => 38, 'thumb' => 39, 'width' => 40, 'height' => 41, 'familydes' => 42, 'keywords' => 43, 'vpn' => 44, 'uomdesc' => 45, 'vidinffg' => 46, 'vidinflk' => 47, 'additemflag' => 48, 'schemafam' => 49, 'prop65' => 50, 'leadfree' => 51, 'dummy' => 52, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, )
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
        $this->setName('im');
        $this->setPhpName('Im');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Im');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recordno', 'Recordno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 6, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty1', 'Priceqty1', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty2', 'Priceqty2', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty3', 'Priceqty3', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty4', 'Priceqty4', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty5', 'Priceqty5', 'INTEGER', false, 8, null);
        $this->addColumn('priceqty6', 'Priceqty6', 'INTEGER', false, 8, null);
        $this->addColumn('priceprice1', 'Priceprice1', 'DECIMAL', false, 6, null);
        $this->addColumn('priceprice2', 'Priceprice2', 'DECIMAL', false, 6, null);
        $this->addColumn('priceprice3', 'Priceprice3', 'DECIMAL', false, 6, null);
        $this->addColumn('priceprice4', 'Priceprice4', 'DECIMAL', false, 6, null);
        $this->addColumn('priceprice5', 'Priceprice5', 'DECIMAL', false, 6, null);
        $this->addColumn('priceprice6', 'Priceprice6', 'DECIMAL', false, 6, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', false, 4, null);
        $this->addColumn('listprice', 'Listprice', 'DECIMAL', false, 6, null);
        $this->addColumn('name1', 'Name1', 'VARCHAR', false, 35, null);
        $this->addColumn('name2', 'Name2', 'VARCHAR', false, 35, null);
        $this->addColumn('shortdesc', 'Shortdesc', 'LONGVARCHAR', false, null, null);
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
        $this->addColumn('orderno', 'Orderno', 'VARCHAR', false, 35, null);
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
        $this->addColumn('prop65', 'Prop65', 'VARCHAR', false, 1, null);
        $this->addColumn('leadfree', 'Leadfree', 'VARCHAR', false, 1, null);
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
     * @param \Im $obj A \Im object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecordno() || is_scalar($obj->getRecordno()) || is_callable([$obj->getRecordno(), '__toString']) ? (string) $obj->getRecordno() : $obj->getRecordno())]);
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
     * @param mixed $value A \Im object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Im) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecordno() || is_scalar($value->getRecordno()) || is_callable([$value->getRecordno(), '__toString']) ? (string) $value->getRecordno() : $value->getRecordno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Im object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ImTableMap::CLASS_DEFAULT : ImTableMap::OM_CLASS;
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
     * @return array           (Im object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ImTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ImTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ImTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ImTableMap::OM_CLASS;
            /** @var Im $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ImTableMap::addInstanceToPool($obj, $key);
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
            $key = ImTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ImTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Im $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ImTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ImTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(ImTableMap::COL_RECORDNO);
            $criteria->addSelectColumn(ImTableMap::COL_DATE);
            $criteria->addSelectColumn(ImTableMap::COL_TIME);
            $criteria->addSelectColumn(ImTableMap::COL_ITEMID);
            $criteria->addSelectColumn(ImTableMap::COL_PRICE);
            $criteria->addSelectColumn(ImTableMap::COL_QTY);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEQTY1);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEQTY2);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEQTY3);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEQTY4);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEQTY5);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEQTY6);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEPRICE1);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEPRICE2);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEPRICE3);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEPRICE4);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEPRICE5);
            $criteria->addSelectColumn(ImTableMap::COL_PRICEPRICE6);
            $criteria->addSelectColumn(ImTableMap::COL_UNIT);
            $criteria->addSelectColumn(ImTableMap::COL_LISTPRICE);
            $criteria->addSelectColumn(ImTableMap::COL_NAME1);
            $criteria->addSelectColumn(ImTableMap::COL_NAME2);
            $criteria->addSelectColumn(ImTableMap::COL_SHORTDESC);
            $criteria->addSelectColumn(ImTableMap::COL_IMAGE);
            $criteria->addSelectColumn(ImTableMap::COL_FAMILYID);
            $criteria->addSelectColumn(ImTableMap::COL_ERMES);
            $criteria->addSelectColumn(ImTableMap::COL_SPECA);
            $criteria->addSelectColumn(ImTableMap::COL_SPECB);
            $criteria->addSelectColumn(ImTableMap::COL_SPECC);
            $criteria->addSelectColumn(ImTableMap::COL_SPECD);
            $criteria->addSelectColumn(ImTableMap::COL_SPECE);
            $criteria->addSelectColumn(ImTableMap::COL_SPECF);
            $criteria->addSelectColumn(ImTableMap::COL_SPECG);
            $criteria->addSelectColumn(ImTableMap::COL_SPECH);
            $criteria->addSelectColumn(ImTableMap::COL_LONGDESC);
            $criteria->addSelectColumn(ImTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(ImTableMap::COL_NAME3);
            $criteria->addSelectColumn(ImTableMap::COL_NAME4);
            $criteria->addSelectColumn(ImTableMap::COL_THUMB);
            $criteria->addSelectColumn(ImTableMap::COL_WIDTH);
            $criteria->addSelectColumn(ImTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(ImTableMap::COL_FAMILYDES);
            $criteria->addSelectColumn(ImTableMap::COL_KEYWORDS);
            $criteria->addSelectColumn(ImTableMap::COL_VPN);
            $criteria->addSelectColumn(ImTableMap::COL_UOMDESC);
            $criteria->addSelectColumn(ImTableMap::COL_VIDINFFG);
            $criteria->addSelectColumn(ImTableMap::COL_VIDINFLK);
            $criteria->addSelectColumn(ImTableMap::COL_ADDITEMFLAG);
            $criteria->addSelectColumn(ImTableMap::COL_SCHEMAFAM);
            $criteria->addSelectColumn(ImTableMap::COL_PROP65);
            $criteria->addSelectColumn(ImTableMap::COL_LEADFREE);
            $criteria->addSelectColumn(ImTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recordno');
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
            $criteria->addSelectColumn($alias . '.prop65');
            $criteria->addSelectColumn($alias . '.leadfree');
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
        return Propel::getServiceContainer()->getDatabaseMap(ImTableMap::DATABASE_NAME)->getTable(ImTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ImTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ImTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ImTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Im or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Im object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ImTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Im) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ImTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ImTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ImTableMap::COL_RECORDNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = ImQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ImTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ImTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the im table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ImQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Im or Criteria object.
     *
     * @param mixed               $criteria Criteria or Im object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ImTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Im object
        }


        // Set the correct dbName
        $query = ImQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ImTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ImTableMap::buildTableMap();
