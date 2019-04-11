<?php

namespace Map;

use \Pricing;
use \PricingQuery;
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
 * This class defines the structure of the 'pricing' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PricingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PricingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pricing';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Pricing';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Pricing';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 65;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 65;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'pricing.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'pricing.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'pricing.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'pricing.time';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'pricing.itemid';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'pricing.price';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'pricing.qty';

    /**
     * the column name for the priceqty1 field
     */
    const COL_PRICEQTY1 = 'pricing.priceqty1';

    /**
     * the column name for the priceqty2 field
     */
    const COL_PRICEQTY2 = 'pricing.priceqty2';

    /**
     * the column name for the priceqty3 field
     */
    const COL_PRICEQTY3 = 'pricing.priceqty3';

    /**
     * the column name for the priceqty4 field
     */
    const COL_PRICEQTY4 = 'pricing.priceqty4';

    /**
     * the column name for the priceqty5 field
     */
    const COL_PRICEQTY5 = 'pricing.priceqty5';

    /**
     * the column name for the priceqty6 field
     */
    const COL_PRICEQTY6 = 'pricing.priceqty6';

    /**
     * the column name for the priceprice1 field
     */
    const COL_PRICEPRICE1 = 'pricing.priceprice1';

    /**
     * the column name for the priceprice2 field
     */
    const COL_PRICEPRICE2 = 'pricing.priceprice2';

    /**
     * the column name for the priceprice3 field
     */
    const COL_PRICEPRICE3 = 'pricing.priceprice3';

    /**
     * the column name for the priceprice4 field
     */
    const COL_PRICEPRICE4 = 'pricing.priceprice4';

    /**
     * the column name for the priceprice5 field
     */
    const COL_PRICEPRICE5 = 'pricing.priceprice5';

    /**
     * the column name for the priceprice6 field
     */
    const COL_PRICEPRICE6 = 'pricing.priceprice6';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'pricing.unit';

    /**
     * the column name for the listprice field
     */
    const COL_LISTPRICE = 'pricing.listprice';

    /**
     * the column name for the name1 field
     */
    const COL_NAME1 = 'pricing.name1';

    /**
     * the column name for the name2 field
     */
    const COL_NAME2 = 'pricing.name2';

    /**
     * the column name for the shortdesc field
     */
    const COL_SHORTDESC = 'pricing.shortdesc';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'pricing.image';

    /**
     * the column name for the familyid field
     */
    const COL_FAMILYID = 'pricing.familyid';

    /**
     * the column name for the ermes field
     */
    const COL_ERMES = 'pricing.ermes';

    /**
     * the column name for the speca field
     */
    const COL_SPECA = 'pricing.speca';

    /**
     * the column name for the specb field
     */
    const COL_SPECB = 'pricing.specb';

    /**
     * the column name for the specc field
     */
    const COL_SPECC = 'pricing.specc';

    /**
     * the column name for the specd field
     */
    const COL_SPECD = 'pricing.specd';

    /**
     * the column name for the spece field
     */
    const COL_SPECE = 'pricing.spece';

    /**
     * the column name for the specf field
     */
    const COL_SPECF = 'pricing.specf';

    /**
     * the column name for the specg field
     */
    const COL_SPECG = 'pricing.specg';

    /**
     * the column name for the spech field
     */
    const COL_SPECH = 'pricing.spech';

    /**
     * the column name for the longdesc field
     */
    const COL_LONGDESC = 'pricing.longdesc';

    /**
     * the column name for the orderno field
     */
    const COL_ORDERNO = 'pricing.orderno';

    /**
     * the column name for the name3 field
     */
    const COL_NAME3 = 'pricing.name3';

    /**
     * the column name for the name4 field
     */
    const COL_NAME4 = 'pricing.name4';

    /**
     * the column name for the thumb field
     */
    const COL_THUMB = 'pricing.thumb';

    /**
     * the column name for the width field
     */
    const COL_WIDTH = 'pricing.width';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'pricing.height';

    /**
     * the column name for the familydes field
     */
    const COL_FAMILYDES = 'pricing.familydes';

    /**
     * the column name for the keywords field
     */
    const COL_KEYWORDS = 'pricing.keywords';

    /**
     * the column name for the vpn field
     */
    const COL_VPN = 'pricing.vpn';

    /**
     * the column name for the uomdesc field
     */
    const COL_UOMDESC = 'pricing.uomdesc';

    /**
     * the column name for the vidinffg field
     */
    const COL_VIDINFFG = 'pricing.vidinffg';

    /**
     * the column name for the vidinflk field
     */
    const COL_VIDINFLK = 'pricing.vidinflk';

    /**
     * the column name for the additemflag field
     */
    const COL_ADDITEMFLAG = 'pricing.additemflag';

    /**
     * the column name for the schemafam field
     */
    const COL_SCHEMAFAM = 'pricing.schemafam';

    /**
     * the column name for the origitemid field
     */
    const COL_ORIGITEMID = 'pricing.origitemid';

    /**
     * the column name for the techspecflg field
     */
    const COL_TECHSPECFLG = 'pricing.techspecflg';

    /**
     * the column name for the techspecname field
     */
    const COL_TECHSPECNAME = 'pricing.techspecname';

    /**
     * the column name for the cost field
     */
    const COL_COST = 'pricing.cost';

    /**
     * the column name for the prop65 field
     */
    const COL_PROP65 = 'pricing.prop65';

    /**
     * the column name for the leadfree field
     */
    const COL_LEADFREE = 'pricing.leadfree';

    /**
     * the column name for the extendesc field
     */
    const COL_EXTENDESC = 'pricing.extendesc';

    /**
     * the column name for the minprice field
     */
    const COL_MINPRICE = 'pricing.minprice';

    /**
     * the column name for the spcord field
     */
    const COL_SPCORD = 'pricing.spcord';

    /**
     * the column name for the vendorid field
     */
    const COL_VENDORID = 'pricing.vendorid';

    /**
     * the column name for the vendoritemid field
     */
    const COL_VENDORITEMID = 'pricing.vendoritemid';

    /**
     * the column name for the shipfromid field
     */
    const COL_SHIPFROMID = 'pricing.shipfromid';

    /**
     * the column name for the nsitemgroup field
     */
    const COL_NSITEMGROUP = 'pricing.nsitemgroup';

    /**
     * the column name for the itemtype field
     */
    const COL_ITEMTYPE = 'pricing.itemtype';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'pricing.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Itemid', 'Price', 'Qty', 'Priceqty1', 'Priceqty2', 'Priceqty3', 'Priceqty4', 'Priceqty5', 'Priceqty6', 'Priceprice1', 'Priceprice2', 'Priceprice3', 'Priceprice4', 'Priceprice5', 'Priceprice6', 'Unit', 'Listprice', 'Name1', 'Name2', 'Shortdesc', 'Image', 'Familyid', 'Ermes', 'Speca', 'Specb', 'Specc', 'Specd', 'Spece', 'Specf', 'Specg', 'Spech', 'Longdesc', 'Orderno', 'Name3', 'Name4', 'Thumb', 'Width', 'Height', 'Familydes', 'Keywords', 'Vpn', 'Uomdesc', 'Vidinffg', 'Vidinflk', 'Additemflag', 'Schemafam', 'Origitemid', 'Techspecflg', 'Techspecname', 'Cost', 'Prop65', 'Leadfree', 'Extendesc', 'Minprice', 'Spcord', 'Vendorid', 'Vendoritemid', 'Shipfromid', 'Nsitemgroup', 'Itemtype', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'itemid', 'price', 'qty', 'priceqty1', 'priceqty2', 'priceqty3', 'priceqty4', 'priceqty5', 'priceqty6', 'priceprice1', 'priceprice2', 'priceprice3', 'priceprice4', 'priceprice5', 'priceprice6', 'unit', 'listprice', 'name1', 'name2', 'shortdesc', 'image', 'familyid', 'ermes', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'longdesc', 'orderno', 'name3', 'name4', 'thumb', 'width', 'height', 'familydes', 'keywords', 'vpn', 'uomdesc', 'vidinffg', 'vidinflk', 'additemflag', 'schemafam', 'origitemid', 'techspecflg', 'techspecname', 'cost', 'prop65', 'leadfree', 'extendesc', 'minprice', 'spcord', 'vendorid', 'vendoritemid', 'shipfromid', 'nsitemgroup', 'itemtype', 'dummy', ),
        self::TYPE_COLNAME       => array(PricingTableMap::COL_SESSIONID, PricingTableMap::COL_RECNO, PricingTableMap::COL_DATE, PricingTableMap::COL_TIME, PricingTableMap::COL_ITEMID, PricingTableMap::COL_PRICE, PricingTableMap::COL_QTY, PricingTableMap::COL_PRICEQTY1, PricingTableMap::COL_PRICEQTY2, PricingTableMap::COL_PRICEQTY3, PricingTableMap::COL_PRICEQTY4, PricingTableMap::COL_PRICEQTY5, PricingTableMap::COL_PRICEQTY6, PricingTableMap::COL_PRICEPRICE1, PricingTableMap::COL_PRICEPRICE2, PricingTableMap::COL_PRICEPRICE3, PricingTableMap::COL_PRICEPRICE4, PricingTableMap::COL_PRICEPRICE5, PricingTableMap::COL_PRICEPRICE6, PricingTableMap::COL_UNIT, PricingTableMap::COL_LISTPRICE, PricingTableMap::COL_NAME1, PricingTableMap::COL_NAME2, PricingTableMap::COL_SHORTDESC, PricingTableMap::COL_IMAGE, PricingTableMap::COL_FAMILYID, PricingTableMap::COL_ERMES, PricingTableMap::COL_SPECA, PricingTableMap::COL_SPECB, PricingTableMap::COL_SPECC, PricingTableMap::COL_SPECD, PricingTableMap::COL_SPECE, PricingTableMap::COL_SPECF, PricingTableMap::COL_SPECG, PricingTableMap::COL_SPECH, PricingTableMap::COL_LONGDESC, PricingTableMap::COL_ORDERNO, PricingTableMap::COL_NAME3, PricingTableMap::COL_NAME4, PricingTableMap::COL_THUMB, PricingTableMap::COL_WIDTH, PricingTableMap::COL_HEIGHT, PricingTableMap::COL_FAMILYDES, PricingTableMap::COL_KEYWORDS, PricingTableMap::COL_VPN, PricingTableMap::COL_UOMDESC, PricingTableMap::COL_VIDINFFG, PricingTableMap::COL_VIDINFLK, PricingTableMap::COL_ADDITEMFLAG, PricingTableMap::COL_SCHEMAFAM, PricingTableMap::COL_ORIGITEMID, PricingTableMap::COL_TECHSPECFLG, PricingTableMap::COL_TECHSPECNAME, PricingTableMap::COL_COST, PricingTableMap::COL_PROP65, PricingTableMap::COL_LEADFREE, PricingTableMap::COL_EXTENDESC, PricingTableMap::COL_MINPRICE, PricingTableMap::COL_SPCORD, PricingTableMap::COL_VENDORID, PricingTableMap::COL_VENDORITEMID, PricingTableMap::COL_SHIPFROMID, PricingTableMap::COL_NSITEMGROUP, PricingTableMap::COL_ITEMTYPE, PricingTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'itemid', 'price', 'qty', 'priceqty1', 'priceqty2', 'priceqty3', 'priceqty4', 'priceqty5', 'priceqty6', 'priceprice1', 'priceprice2', 'priceprice3', 'priceprice4', 'priceprice5', 'priceprice6', 'unit', 'listprice', 'name1', 'name2', 'shortdesc', 'image', 'familyid', 'ermes', 'speca', 'specb', 'specc', 'specd', 'spece', 'specf', 'specg', 'spech', 'longdesc', 'orderno', 'name3', 'name4', 'thumb', 'width', 'height', 'familydes', 'keywords', 'vpn', 'uomdesc', 'vidinffg', 'vidinflk', 'additemflag', 'schemafam', 'origitemid', 'techspecflg', 'techspecname', 'cost', 'prop65', 'leadfree', 'extendesc', 'minprice', 'spcord', 'vendorid', 'vendoritemid', 'shipfromid', 'nsitemgroup', 'itemtype', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Itemid' => 4, 'Price' => 5, 'Qty' => 6, 'Priceqty1' => 7, 'Priceqty2' => 8, 'Priceqty3' => 9, 'Priceqty4' => 10, 'Priceqty5' => 11, 'Priceqty6' => 12, 'Priceprice1' => 13, 'Priceprice2' => 14, 'Priceprice3' => 15, 'Priceprice4' => 16, 'Priceprice5' => 17, 'Priceprice6' => 18, 'Unit' => 19, 'Listprice' => 20, 'Name1' => 21, 'Name2' => 22, 'Shortdesc' => 23, 'Image' => 24, 'Familyid' => 25, 'Ermes' => 26, 'Speca' => 27, 'Specb' => 28, 'Specc' => 29, 'Specd' => 30, 'Spece' => 31, 'Specf' => 32, 'Specg' => 33, 'Spech' => 34, 'Longdesc' => 35, 'Orderno' => 36, 'Name3' => 37, 'Name4' => 38, 'Thumb' => 39, 'Width' => 40, 'Height' => 41, 'Familydes' => 42, 'Keywords' => 43, 'Vpn' => 44, 'Uomdesc' => 45, 'Vidinffg' => 46, 'Vidinflk' => 47, 'Additemflag' => 48, 'Schemafam' => 49, 'Origitemid' => 50, 'Techspecflg' => 51, 'Techspecname' => 52, 'Cost' => 53, 'Prop65' => 54, 'Leadfree' => 55, 'Extendesc' => 56, 'Minprice' => 57, 'Spcord' => 58, 'Vendorid' => 59, 'Vendoritemid' => 60, 'Shipfromid' => 61, 'Nsitemgroup' => 62, 'Itemtype' => 63, 'Dummy' => 64, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'itemid' => 4, 'price' => 5, 'qty' => 6, 'priceqty1' => 7, 'priceqty2' => 8, 'priceqty3' => 9, 'priceqty4' => 10, 'priceqty5' => 11, 'priceqty6' => 12, 'priceprice1' => 13, 'priceprice2' => 14, 'priceprice3' => 15, 'priceprice4' => 16, 'priceprice5' => 17, 'priceprice6' => 18, 'unit' => 19, 'listprice' => 20, 'name1' => 21, 'name2' => 22, 'shortdesc' => 23, 'image' => 24, 'familyid' => 25, 'ermes' => 26, 'speca' => 27, 'specb' => 28, 'specc' => 29, 'specd' => 30, 'spece' => 31, 'specf' => 32, 'specg' => 33, 'spech' => 34, 'longdesc' => 35, 'orderno' => 36, 'name3' => 37, 'name4' => 38, 'thumb' => 39, 'width' => 40, 'height' => 41, 'familydes' => 42, 'keywords' => 43, 'vpn' => 44, 'uomdesc' => 45, 'vidinffg' => 46, 'vidinflk' => 47, 'additemflag' => 48, 'schemafam' => 49, 'origitemid' => 50, 'techspecflg' => 51, 'techspecname' => 52, 'cost' => 53, 'prop65' => 54, 'leadfree' => 55, 'extendesc' => 56, 'minprice' => 57, 'spcord' => 58, 'vendorid' => 59, 'vendoritemid' => 60, 'shipfromid' => 61, 'nsitemgroup' => 62, 'itemtype' => 63, 'dummy' => 64, ),
        self::TYPE_COLNAME       => array(PricingTableMap::COL_SESSIONID => 0, PricingTableMap::COL_RECNO => 1, PricingTableMap::COL_DATE => 2, PricingTableMap::COL_TIME => 3, PricingTableMap::COL_ITEMID => 4, PricingTableMap::COL_PRICE => 5, PricingTableMap::COL_QTY => 6, PricingTableMap::COL_PRICEQTY1 => 7, PricingTableMap::COL_PRICEQTY2 => 8, PricingTableMap::COL_PRICEQTY3 => 9, PricingTableMap::COL_PRICEQTY4 => 10, PricingTableMap::COL_PRICEQTY5 => 11, PricingTableMap::COL_PRICEQTY6 => 12, PricingTableMap::COL_PRICEPRICE1 => 13, PricingTableMap::COL_PRICEPRICE2 => 14, PricingTableMap::COL_PRICEPRICE3 => 15, PricingTableMap::COL_PRICEPRICE4 => 16, PricingTableMap::COL_PRICEPRICE5 => 17, PricingTableMap::COL_PRICEPRICE6 => 18, PricingTableMap::COL_UNIT => 19, PricingTableMap::COL_LISTPRICE => 20, PricingTableMap::COL_NAME1 => 21, PricingTableMap::COL_NAME2 => 22, PricingTableMap::COL_SHORTDESC => 23, PricingTableMap::COL_IMAGE => 24, PricingTableMap::COL_FAMILYID => 25, PricingTableMap::COL_ERMES => 26, PricingTableMap::COL_SPECA => 27, PricingTableMap::COL_SPECB => 28, PricingTableMap::COL_SPECC => 29, PricingTableMap::COL_SPECD => 30, PricingTableMap::COL_SPECE => 31, PricingTableMap::COL_SPECF => 32, PricingTableMap::COL_SPECG => 33, PricingTableMap::COL_SPECH => 34, PricingTableMap::COL_LONGDESC => 35, PricingTableMap::COL_ORDERNO => 36, PricingTableMap::COL_NAME3 => 37, PricingTableMap::COL_NAME4 => 38, PricingTableMap::COL_THUMB => 39, PricingTableMap::COL_WIDTH => 40, PricingTableMap::COL_HEIGHT => 41, PricingTableMap::COL_FAMILYDES => 42, PricingTableMap::COL_KEYWORDS => 43, PricingTableMap::COL_VPN => 44, PricingTableMap::COL_UOMDESC => 45, PricingTableMap::COL_VIDINFFG => 46, PricingTableMap::COL_VIDINFLK => 47, PricingTableMap::COL_ADDITEMFLAG => 48, PricingTableMap::COL_SCHEMAFAM => 49, PricingTableMap::COL_ORIGITEMID => 50, PricingTableMap::COL_TECHSPECFLG => 51, PricingTableMap::COL_TECHSPECNAME => 52, PricingTableMap::COL_COST => 53, PricingTableMap::COL_PROP65 => 54, PricingTableMap::COL_LEADFREE => 55, PricingTableMap::COL_EXTENDESC => 56, PricingTableMap::COL_MINPRICE => 57, PricingTableMap::COL_SPCORD => 58, PricingTableMap::COL_VENDORID => 59, PricingTableMap::COL_VENDORITEMID => 60, PricingTableMap::COL_SHIPFROMID => 61, PricingTableMap::COL_NSITEMGROUP => 62, PricingTableMap::COL_ITEMTYPE => 63, PricingTableMap::COL_DUMMY => 64, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'itemid' => 4, 'price' => 5, 'qty' => 6, 'priceqty1' => 7, 'priceqty2' => 8, 'priceqty3' => 9, 'priceqty4' => 10, 'priceqty5' => 11, 'priceqty6' => 12, 'priceprice1' => 13, 'priceprice2' => 14, 'priceprice3' => 15, 'priceprice4' => 16, 'priceprice5' => 17, 'priceprice6' => 18, 'unit' => 19, 'listprice' => 20, 'name1' => 21, 'name2' => 22, 'shortdesc' => 23, 'image' => 24, 'familyid' => 25, 'ermes' => 26, 'speca' => 27, 'specb' => 28, 'specc' => 29, 'specd' => 30, 'spece' => 31, 'specf' => 32, 'specg' => 33, 'spech' => 34, 'longdesc' => 35, 'orderno' => 36, 'name3' => 37, 'name4' => 38, 'thumb' => 39, 'width' => 40, 'height' => 41, 'familydes' => 42, 'keywords' => 43, 'vpn' => 44, 'uomdesc' => 45, 'vidinffg' => 46, 'vidinflk' => 47, 'additemflag' => 48, 'schemafam' => 49, 'origitemid' => 50, 'techspecflg' => 51, 'techspecname' => 52, 'cost' => 53, 'prop65' => 54, 'leadfree' => 55, 'extendesc' => 56, 'minprice' => 57, 'spcord' => 58, 'vendorid' => 59, 'vendoritemid' => 60, 'shipfromid' => 61, 'nsitemgroup' => 62, 'itemtype' => 63, 'dummy' => 64, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, )
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
        $this->setName('pricing');
        $this->setPhpName('Pricing');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Pricing');
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
        $this->addColumn('unit', 'Unit', 'VARCHAR', false, 25, null);
        $this->addColumn('listprice', 'Listprice', 'DECIMAL', false, 8, null);
        $this->addColumn('name1', 'Name1', 'VARCHAR', false, 70, null);
        $this->addColumn('name2', 'Name2', 'VARCHAR', false, 70, null);
        $this->addColumn('shortdesc', 'Shortdesc', 'VARCHAR', false, 1000, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 35, null);
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
        $this->addColumn('origitemid', 'Origitemid', 'VARCHAR', false, 30, null);
        $this->addColumn('techspecflg', 'Techspecflg', 'VARCHAR', false, 1, null);
        $this->addColumn('techspecname', 'Techspecname', 'VARCHAR', false, 50, null);
        $this->addColumn('cost', 'Cost', 'DECIMAL', false, 8, null);
        $this->addColumn('prop65', 'Prop65', 'VARCHAR', false, 1, null);
        $this->addColumn('leadfree', 'Leadfree', 'VARCHAR', false, 1, null);
        $this->addColumn('extendesc', 'Extendesc', 'VARCHAR', false, 1000, null);
        $this->addColumn('minprice', 'Minprice', 'DECIMAL', false, 8, null);
        $this->addColumn('spcord', 'Spcord', 'VARCHAR', false, 1, null);
        $this->addColumn('vendorid', 'Vendorid', 'VARCHAR', false, 6, null);
        $this->addColumn('vendoritemid', 'Vendoritemid', 'VARCHAR', false, 30, null);
        $this->addColumn('shipfromid', 'Shipfromid', 'VARCHAR', false, 6, null);
        $this->addColumn('nsitemgroup', 'Nsitemgroup', 'VARCHAR', false, 4, null);
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 1, null);
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
     * @param \Pricing $obj A \Pricing object.
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
     * @param mixed $value A \Pricing object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Pricing) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Pricing object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? PricingTableMap::CLASS_DEFAULT : PricingTableMap::OM_CLASS;
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
     * @return array           (Pricing object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PricingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PricingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PricingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PricingTableMap::OM_CLASS;
            /** @var Pricing $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PricingTableMap::addInstanceToPool($obj, $key);
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
            $key = PricingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PricingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Pricing $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PricingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PricingTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(PricingTableMap::COL_RECNO);
            $criteria->addSelectColumn(PricingTableMap::COL_DATE);
            $criteria->addSelectColumn(PricingTableMap::COL_TIME);
            $criteria->addSelectColumn(PricingTableMap::COL_ITEMID);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICE);
            $criteria->addSelectColumn(PricingTableMap::COL_QTY);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEQTY1);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEQTY2);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEQTY3);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEQTY4);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEQTY5);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEQTY6);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEPRICE1);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEPRICE2);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEPRICE3);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEPRICE4);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEPRICE5);
            $criteria->addSelectColumn(PricingTableMap::COL_PRICEPRICE6);
            $criteria->addSelectColumn(PricingTableMap::COL_UNIT);
            $criteria->addSelectColumn(PricingTableMap::COL_LISTPRICE);
            $criteria->addSelectColumn(PricingTableMap::COL_NAME1);
            $criteria->addSelectColumn(PricingTableMap::COL_NAME2);
            $criteria->addSelectColumn(PricingTableMap::COL_SHORTDESC);
            $criteria->addSelectColumn(PricingTableMap::COL_IMAGE);
            $criteria->addSelectColumn(PricingTableMap::COL_FAMILYID);
            $criteria->addSelectColumn(PricingTableMap::COL_ERMES);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECA);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECB);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECC);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECD);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECE);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECF);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECG);
            $criteria->addSelectColumn(PricingTableMap::COL_SPECH);
            $criteria->addSelectColumn(PricingTableMap::COL_LONGDESC);
            $criteria->addSelectColumn(PricingTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(PricingTableMap::COL_NAME3);
            $criteria->addSelectColumn(PricingTableMap::COL_NAME4);
            $criteria->addSelectColumn(PricingTableMap::COL_THUMB);
            $criteria->addSelectColumn(PricingTableMap::COL_WIDTH);
            $criteria->addSelectColumn(PricingTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(PricingTableMap::COL_FAMILYDES);
            $criteria->addSelectColumn(PricingTableMap::COL_KEYWORDS);
            $criteria->addSelectColumn(PricingTableMap::COL_VPN);
            $criteria->addSelectColumn(PricingTableMap::COL_UOMDESC);
            $criteria->addSelectColumn(PricingTableMap::COL_VIDINFFG);
            $criteria->addSelectColumn(PricingTableMap::COL_VIDINFLK);
            $criteria->addSelectColumn(PricingTableMap::COL_ADDITEMFLAG);
            $criteria->addSelectColumn(PricingTableMap::COL_SCHEMAFAM);
            $criteria->addSelectColumn(PricingTableMap::COL_ORIGITEMID);
            $criteria->addSelectColumn(PricingTableMap::COL_TECHSPECFLG);
            $criteria->addSelectColumn(PricingTableMap::COL_TECHSPECNAME);
            $criteria->addSelectColumn(PricingTableMap::COL_COST);
            $criteria->addSelectColumn(PricingTableMap::COL_PROP65);
            $criteria->addSelectColumn(PricingTableMap::COL_LEADFREE);
            $criteria->addSelectColumn(PricingTableMap::COL_EXTENDESC);
            $criteria->addSelectColumn(PricingTableMap::COL_MINPRICE);
            $criteria->addSelectColumn(PricingTableMap::COL_SPCORD);
            $criteria->addSelectColumn(PricingTableMap::COL_VENDORID);
            $criteria->addSelectColumn(PricingTableMap::COL_VENDORITEMID);
            $criteria->addSelectColumn(PricingTableMap::COL_SHIPFROMID);
            $criteria->addSelectColumn(PricingTableMap::COL_NSITEMGROUP);
            $criteria->addSelectColumn(PricingTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(PricingTableMap::COL_DUMMY);
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
            $criteria->addSelectColumn($alias . '.techspecflg');
            $criteria->addSelectColumn($alias . '.techspecname');
            $criteria->addSelectColumn($alias . '.cost');
            $criteria->addSelectColumn($alias . '.prop65');
            $criteria->addSelectColumn($alias . '.leadfree');
            $criteria->addSelectColumn($alias . '.extendesc');
            $criteria->addSelectColumn($alias . '.minprice');
            $criteria->addSelectColumn($alias . '.spcord');
            $criteria->addSelectColumn($alias . '.vendorid');
            $criteria->addSelectColumn($alias . '.vendoritemid');
            $criteria->addSelectColumn($alias . '.shipfromid');
            $criteria->addSelectColumn($alias . '.nsitemgroup');
            $criteria->addSelectColumn($alias . '.itemtype');
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
        return Propel::getServiceContainer()->getDatabaseMap(PricingTableMap::DATABASE_NAME)->getTable(PricingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PricingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PricingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PricingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Pricing or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Pricing object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PricingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Pricing) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PricingTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(PricingTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(PricingTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = PricingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PricingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PricingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pricing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PricingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Pricing or Criteria object.
     *
     * @param mixed               $criteria Criteria or Pricing object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PricingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Pricing object
        }


        // Set the correct dbName
        $query = PricingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PricingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PricingTableMap::buildTableMap();
