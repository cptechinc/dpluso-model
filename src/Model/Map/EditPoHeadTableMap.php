<?php

namespace Map;

use \EditPoHead;
use \EditPoHeadQuery;
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
 * This class defines the structure of the 'edit_po_head' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EditPoHeadTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EditPoHeadTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'edit_po_head';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EditPoHead';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EditPoHead';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 58;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 58;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'edit_po_head.sessionid';

    /**
     * the column name for the PohdNbr field
     */
    const COL_POHDNBR = 'edit_po_head.PohdNbr';

    /**
     * the column name for the PohdStat field
     */
    const COL_POHDSTAT = 'edit_po_head.PohdStat';

    /**
     * the column name for the PohdRef field
     */
    const COL_POHDREF = 'edit_po_head.PohdRef';

    /**
     * the column name for the ApveVendId field
     */
    const COL_APVEVENDID = 'edit_po_head.ApveVendId';

    /**
     * the column name for the ApfmShipId field
     */
    const COL_APFMSHIPID = 'edit_po_head.ApfmShipId';

    /**
     * the column name for the PohdToName field
     */
    const COL_POHDTONAME = 'edit_po_head.PohdToName';

    /**
     * the column name for the PohdToAdr1 field
     */
    const COL_POHDTOADR1 = 'edit_po_head.PohdToAdr1';

    /**
     * the column name for the PohdToAdr2 field
     */
    const COL_POHDTOADR2 = 'edit_po_head.PohdToAdr2';

    /**
     * the column name for the PohdToAdr3 field
     */
    const COL_POHDTOADR3 = 'edit_po_head.PohdToAdr3';

    /**
     * the column name for the PohdToCtry field
     */
    const COL_POHDTOCTRY = 'edit_po_head.PohdToCtry';

    /**
     * the column name for the PohdToCity field
     */
    const COL_POHDTOCITY = 'edit_po_head.PohdToCity';

    /**
     * the column name for the PohdToStat field
     */
    const COL_POHDTOSTAT = 'edit_po_head.PohdToStat';

    /**
     * the column name for the PohdToZipCode field
     */
    const COL_POHDTOZIPCODE = 'edit_po_head.PohdToZipCode';

    /**
     * the column name for the PohdPtName field
     */
    const COL_POHDPTNAME = 'edit_po_head.PohdPtName';

    /**
     * the column name for the PohdPtAdr1 field
     */
    const COL_POHDPTADR1 = 'edit_po_head.PohdPtAdr1';

    /**
     * the column name for the PohdPtAdr2 field
     */
    const COL_POHDPTADR2 = 'edit_po_head.PohdPtAdr2';

    /**
     * the column name for the PohdPtAdr3 field
     */
    const COL_POHDPTADR3 = 'edit_po_head.PohdPtAdr3';

    /**
     * the column name for the PohdPtCtry field
     */
    const COL_POHDPTCTRY = 'edit_po_head.PohdPtCtry';

    /**
     * the column name for the PohdPtCity field
     */
    const COL_POHDPTCITY = 'edit_po_head.PohdPtCity';

    /**
     * the column name for the PohdPtStat field
     */
    const COL_POHDPTSTAT = 'edit_po_head.PohdPtStat';

    /**
     * the column name for the PohdPtZipCode field
     */
    const COL_POHDPTZIPCODE = 'edit_po_head.PohdPtZipCode';

    /**
     * the column name for the PohdCont field
     */
    const COL_POHDCONT = 'edit_po_head.PohdCont';

    /**
     * the column name for the PohdOrdrDate field
     */
    const COL_POHDORDRDATE = 'edit_po_head.PohdOrdrDate';

    /**
     * the column name for the AptmTermCode field
     */
    const COL_APTMTERMCODE = 'edit_po_head.AptmTermCode';

    /**
     * the column name for the ArtbSviaCode field
     */
    const COL_ARTBSVIACODE = 'edit_po_head.ArtbSviaCode';

    /**
     * the column name for the PohdOldFob field
     */
    const COL_POHDOLDFOB = 'edit_po_head.PohdOldFob';

    /**
     * the column name for the AptbBuyrCode field
     */
    const COL_APTBBUYRCODE = 'edit_po_head.AptbBuyrCode';

    /**
     * the column name for the PohdColPpd field
     */
    const COL_POHDCOLPPD = 'edit_po_head.PohdColPpd';

    /**
     * the column name for the PohdTeleIntl field
     */
    const COL_POHDTELEINTL = 'edit_po_head.PohdTeleIntl';

    /**
     * the column name for the PohdTeleNbr field
     */
    const COL_POHDTELENBR = 'edit_po_head.PohdTeleNbr';

    /**
     * the column name for the PohdTeleExt field
     */
    const COL_POHDTELEEXT = 'edit_po_head.PohdTeleExt';

    /**
     * the column name for the PohdFaxIntl field
     */
    const COL_POHDFAXINTL = 'edit_po_head.PohdFaxIntl';

    /**
     * the column name for the PohdFaxNbr field
     */
    const COL_POHDFAXNBR = 'edit_po_head.PohdFaxNbr';

    /**
     * the column name for the PohdRCnt field
     */
    const COL_POHDRCNT = 'edit_po_head.PohdRCnt';

    /**
     * the column name for the PohdTaxExem field
     */
    const COL_POHDTAXEXEM = 'edit_po_head.PohdTaxExem';

    /**
     * the column name for the PohdExchCtry field
     */
    const COL_POHDEXCHCTRY = 'edit_po_head.PohdExchCtry';

    /**
     * the column name for the PohdExchRate field
     */
    const COL_POHDEXCHRATE = 'edit_po_head.PohdExchRate';

    /**
     * the column name for the PohdExptDate field
     */
    const COL_POHDEXPTDATE = 'edit_po_head.PohdExptDate';

    /**
     * the column name for the PohdCancDate field
     */
    const COL_POHDCANCDATE = 'edit_po_head.PohdCancDate';

    /**
     * the column name for the PohdICnt field
     */
    const COL_POHDICNT = 'edit_po_head.PohdICnt';

    /**
     * the column name for the PohdFob field
     */
    const COL_POHDFOB = 'edit_po_head.PohdFob';

    /**
     * the column name for the PohdPickQueue field
     */
    const COL_POHDPICKQUEUE = 'edit_po_head.PohdPickQueue';

    /**
     * the column name for the PohdPackedBy field
     */
    const COL_POHDPACKEDBY = 'edit_po_head.PohdPackedBy';

    /**
     * the column name for the PohdPackDate field
     */
    const COL_POHDPACKDATE = 'edit_po_head.PohdPackDate';

    /**
     * the column name for the PohdPackTime field
     */
    const COL_POHDPACKTIME = 'edit_po_head.PohdPackTime';

    /**
     * the column name for the PohdLandCost field
     */
    const COL_POHDLANDCOST = 'edit_po_head.PohdLandCost';

    /**
     * the column name for the PohdEdiPoDate field
     */
    const COL_POHDEDIPODATE = 'edit_po_head.PohdEdiPoDate';

    /**
     * the column name for the PohdFutureBuy field
     */
    const COL_POHDFUTUREBUY = 'edit_po_head.PohdFutureBuy';

    /**
     * the column name for the PohdEmailAddr field
     */
    const COL_POHDEMAILADDR = 'edit_po_head.PohdEmailAddr';

    /**
     * the column name for the PohdShipDate field
     */
    const COL_POHDSHIPDATE = 'edit_po_head.PohdShipDate';

    /**
     * the column name for the PohdAckDate field
     */
    const COL_POHDACKDATE = 'edit_po_head.PohdAckDate';

    /**
     * the column name for the PohdReleaseNbr field
     */
    const COL_POHDRELEASENBR = 'edit_po_head.PohdReleaseNbr';

    /**
     * the column name for the PohdReturnsPo field
     */
    const COL_POHDRETURNSPO = 'edit_po_head.PohdReturnsPo';

    /**
     * the column name for the DateUpdtd field
     */
    const COL_DATEUPDTD = 'edit_po_head.DateUpdtd';

    /**
     * the column name for the TimeUpdtd field
     */
    const COL_TIMEUPDTD = 'edit_po_head.TimeUpdtd';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'edit_po_head.status';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'edit_po_head.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Pohdnbr', 'Pohdstat', 'Pohdref', 'Apvevendid', 'Apfmshipid', 'Pohdtoname', 'Pohdtoadr1', 'Pohdtoadr2', 'Pohdtoadr3', 'Pohdtoctry', 'Pohdtocity', 'Pohdtostat', 'Pohdtozipcode', 'Pohdptname', 'Pohdptadr1', 'Pohdptadr2', 'Pohdptadr3', 'Pohdptctry', 'Pohdptcity', 'Pohdptstat', 'Pohdptzipcode', 'Pohdcont', 'Pohdordrdate', 'Aptmtermcode', 'Artbsviacode', 'Pohdoldfob', 'Aptbbuyrcode', 'Pohdcolppd', 'Pohdteleintl', 'Pohdtelenbr', 'Pohdteleext', 'Pohdfaxintl', 'Pohdfaxnbr', 'Pohdrcnt', 'Pohdtaxexem', 'Pohdexchctry', 'Pohdexchrate', 'Pohdexptdate', 'Pohdcancdate', 'Pohdicnt', 'Pohdfob', 'Pohdpickqueue', 'Pohdpackedby', 'Pohdpackdate', 'Pohdpacktime', 'Pohdlandcost', 'Pohdedipodate', 'Pohdfuturebuy', 'Pohdemailaddr', 'Pohdshipdate', 'Pohdackdate', 'Pohdreleasenbr', 'Pohdreturnspo', 'Dateupdtd', 'Timeupdtd', 'Status', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'pohdnbr', 'pohdstat', 'pohdref', 'apvevendid', 'apfmshipid', 'pohdtoname', 'pohdtoadr1', 'pohdtoadr2', 'pohdtoadr3', 'pohdtoctry', 'pohdtocity', 'pohdtostat', 'pohdtozipcode', 'pohdptname', 'pohdptadr1', 'pohdptadr2', 'pohdptadr3', 'pohdptctry', 'pohdptcity', 'pohdptstat', 'pohdptzipcode', 'pohdcont', 'pohdordrdate', 'aptmtermcode', 'artbsviacode', 'pohdoldfob', 'aptbbuyrcode', 'pohdcolppd', 'pohdteleintl', 'pohdtelenbr', 'pohdteleext', 'pohdfaxintl', 'pohdfaxnbr', 'pohdrcnt', 'pohdtaxexem', 'pohdexchctry', 'pohdexchrate', 'pohdexptdate', 'pohdcancdate', 'pohdicnt', 'pohdfob', 'pohdpickqueue', 'pohdpackedby', 'pohdpackdate', 'pohdpacktime', 'pohdlandcost', 'pohdedipodate', 'pohdfuturebuy', 'pohdemailaddr', 'pohdshipdate', 'pohdackdate', 'pohdreleasenbr', 'pohdreturnspo', 'dateupdtd', 'timeupdtd', 'status', 'dummy', ),
        self::TYPE_COLNAME       => array(EditPoHeadTableMap::COL_SESSIONID, EditPoHeadTableMap::COL_POHDNBR, EditPoHeadTableMap::COL_POHDSTAT, EditPoHeadTableMap::COL_POHDREF, EditPoHeadTableMap::COL_APVEVENDID, EditPoHeadTableMap::COL_APFMSHIPID, EditPoHeadTableMap::COL_POHDTONAME, EditPoHeadTableMap::COL_POHDTOADR1, EditPoHeadTableMap::COL_POHDTOADR2, EditPoHeadTableMap::COL_POHDTOADR3, EditPoHeadTableMap::COL_POHDTOCTRY, EditPoHeadTableMap::COL_POHDTOCITY, EditPoHeadTableMap::COL_POHDTOSTAT, EditPoHeadTableMap::COL_POHDTOZIPCODE, EditPoHeadTableMap::COL_POHDPTNAME, EditPoHeadTableMap::COL_POHDPTADR1, EditPoHeadTableMap::COL_POHDPTADR2, EditPoHeadTableMap::COL_POHDPTADR3, EditPoHeadTableMap::COL_POHDPTCTRY, EditPoHeadTableMap::COL_POHDPTCITY, EditPoHeadTableMap::COL_POHDPTSTAT, EditPoHeadTableMap::COL_POHDPTZIPCODE, EditPoHeadTableMap::COL_POHDCONT, EditPoHeadTableMap::COL_POHDORDRDATE, EditPoHeadTableMap::COL_APTMTERMCODE, EditPoHeadTableMap::COL_ARTBSVIACODE, EditPoHeadTableMap::COL_POHDOLDFOB, EditPoHeadTableMap::COL_APTBBUYRCODE, EditPoHeadTableMap::COL_POHDCOLPPD, EditPoHeadTableMap::COL_POHDTELEINTL, EditPoHeadTableMap::COL_POHDTELENBR, EditPoHeadTableMap::COL_POHDTELEEXT, EditPoHeadTableMap::COL_POHDFAXINTL, EditPoHeadTableMap::COL_POHDFAXNBR, EditPoHeadTableMap::COL_POHDRCNT, EditPoHeadTableMap::COL_POHDTAXEXEM, EditPoHeadTableMap::COL_POHDEXCHCTRY, EditPoHeadTableMap::COL_POHDEXCHRATE, EditPoHeadTableMap::COL_POHDEXPTDATE, EditPoHeadTableMap::COL_POHDCANCDATE, EditPoHeadTableMap::COL_POHDICNT, EditPoHeadTableMap::COL_POHDFOB, EditPoHeadTableMap::COL_POHDPICKQUEUE, EditPoHeadTableMap::COL_POHDPACKEDBY, EditPoHeadTableMap::COL_POHDPACKDATE, EditPoHeadTableMap::COL_POHDPACKTIME, EditPoHeadTableMap::COL_POHDLANDCOST, EditPoHeadTableMap::COL_POHDEDIPODATE, EditPoHeadTableMap::COL_POHDFUTUREBUY, EditPoHeadTableMap::COL_POHDEMAILADDR, EditPoHeadTableMap::COL_POHDSHIPDATE, EditPoHeadTableMap::COL_POHDACKDATE, EditPoHeadTableMap::COL_POHDRELEASENBR, EditPoHeadTableMap::COL_POHDRETURNSPO, EditPoHeadTableMap::COL_DATEUPDTD, EditPoHeadTableMap::COL_TIMEUPDTD, EditPoHeadTableMap::COL_STATUS, EditPoHeadTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'PohdNbr', 'PohdStat', 'PohdRef', 'ApveVendId', 'ApfmShipId', 'PohdToName', 'PohdToAdr1', 'PohdToAdr2', 'PohdToAdr3', 'PohdToCtry', 'PohdToCity', 'PohdToStat', 'PohdToZipCode', 'PohdPtName', 'PohdPtAdr1', 'PohdPtAdr2', 'PohdPtAdr3', 'PohdPtCtry', 'PohdPtCity', 'PohdPtStat', 'PohdPtZipCode', 'PohdCont', 'PohdOrdrDate', 'AptmTermCode', 'ArtbSviaCode', 'PohdOldFob', 'AptbBuyrCode', 'PohdColPpd', 'PohdTeleIntl', 'PohdTeleNbr', 'PohdTeleExt', 'PohdFaxIntl', 'PohdFaxNbr', 'PohdRCnt', 'PohdTaxExem', 'PohdExchCtry', 'PohdExchRate', 'PohdExptDate', 'PohdCancDate', 'PohdICnt', 'PohdFob', 'PohdPickQueue', 'PohdPackedBy', 'PohdPackDate', 'PohdPackTime', 'PohdLandCost', 'PohdEdiPoDate', 'PohdFutureBuy', 'PohdEmailAddr', 'PohdShipDate', 'PohdAckDate', 'PohdReleaseNbr', 'PohdReturnsPo', 'DateUpdtd', 'TimeUpdtd', 'status', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Pohdnbr' => 1, 'Pohdstat' => 2, 'Pohdref' => 3, 'Apvevendid' => 4, 'Apfmshipid' => 5, 'Pohdtoname' => 6, 'Pohdtoadr1' => 7, 'Pohdtoadr2' => 8, 'Pohdtoadr3' => 9, 'Pohdtoctry' => 10, 'Pohdtocity' => 11, 'Pohdtostat' => 12, 'Pohdtozipcode' => 13, 'Pohdptname' => 14, 'Pohdptadr1' => 15, 'Pohdptadr2' => 16, 'Pohdptadr3' => 17, 'Pohdptctry' => 18, 'Pohdptcity' => 19, 'Pohdptstat' => 20, 'Pohdptzipcode' => 21, 'Pohdcont' => 22, 'Pohdordrdate' => 23, 'Aptmtermcode' => 24, 'Artbsviacode' => 25, 'Pohdoldfob' => 26, 'Aptbbuyrcode' => 27, 'Pohdcolppd' => 28, 'Pohdteleintl' => 29, 'Pohdtelenbr' => 30, 'Pohdteleext' => 31, 'Pohdfaxintl' => 32, 'Pohdfaxnbr' => 33, 'Pohdrcnt' => 34, 'Pohdtaxexem' => 35, 'Pohdexchctry' => 36, 'Pohdexchrate' => 37, 'Pohdexptdate' => 38, 'Pohdcancdate' => 39, 'Pohdicnt' => 40, 'Pohdfob' => 41, 'Pohdpickqueue' => 42, 'Pohdpackedby' => 43, 'Pohdpackdate' => 44, 'Pohdpacktime' => 45, 'Pohdlandcost' => 46, 'Pohdedipodate' => 47, 'Pohdfuturebuy' => 48, 'Pohdemailaddr' => 49, 'Pohdshipdate' => 50, 'Pohdackdate' => 51, 'Pohdreleasenbr' => 52, 'Pohdreturnspo' => 53, 'Dateupdtd' => 54, 'Timeupdtd' => 55, 'Status' => 56, 'Dummy' => 57, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'pohdnbr' => 1, 'pohdstat' => 2, 'pohdref' => 3, 'apvevendid' => 4, 'apfmshipid' => 5, 'pohdtoname' => 6, 'pohdtoadr1' => 7, 'pohdtoadr2' => 8, 'pohdtoadr3' => 9, 'pohdtoctry' => 10, 'pohdtocity' => 11, 'pohdtostat' => 12, 'pohdtozipcode' => 13, 'pohdptname' => 14, 'pohdptadr1' => 15, 'pohdptadr2' => 16, 'pohdptadr3' => 17, 'pohdptctry' => 18, 'pohdptcity' => 19, 'pohdptstat' => 20, 'pohdptzipcode' => 21, 'pohdcont' => 22, 'pohdordrdate' => 23, 'aptmtermcode' => 24, 'artbsviacode' => 25, 'pohdoldfob' => 26, 'aptbbuyrcode' => 27, 'pohdcolppd' => 28, 'pohdteleintl' => 29, 'pohdtelenbr' => 30, 'pohdteleext' => 31, 'pohdfaxintl' => 32, 'pohdfaxnbr' => 33, 'pohdrcnt' => 34, 'pohdtaxexem' => 35, 'pohdexchctry' => 36, 'pohdexchrate' => 37, 'pohdexptdate' => 38, 'pohdcancdate' => 39, 'pohdicnt' => 40, 'pohdfob' => 41, 'pohdpickqueue' => 42, 'pohdpackedby' => 43, 'pohdpackdate' => 44, 'pohdpacktime' => 45, 'pohdlandcost' => 46, 'pohdedipodate' => 47, 'pohdfuturebuy' => 48, 'pohdemailaddr' => 49, 'pohdshipdate' => 50, 'pohdackdate' => 51, 'pohdreleasenbr' => 52, 'pohdreturnspo' => 53, 'dateupdtd' => 54, 'timeupdtd' => 55, 'status' => 56, 'dummy' => 57, ),
        self::TYPE_COLNAME       => array(EditPoHeadTableMap::COL_SESSIONID => 0, EditPoHeadTableMap::COL_POHDNBR => 1, EditPoHeadTableMap::COL_POHDSTAT => 2, EditPoHeadTableMap::COL_POHDREF => 3, EditPoHeadTableMap::COL_APVEVENDID => 4, EditPoHeadTableMap::COL_APFMSHIPID => 5, EditPoHeadTableMap::COL_POHDTONAME => 6, EditPoHeadTableMap::COL_POHDTOADR1 => 7, EditPoHeadTableMap::COL_POHDTOADR2 => 8, EditPoHeadTableMap::COL_POHDTOADR3 => 9, EditPoHeadTableMap::COL_POHDTOCTRY => 10, EditPoHeadTableMap::COL_POHDTOCITY => 11, EditPoHeadTableMap::COL_POHDTOSTAT => 12, EditPoHeadTableMap::COL_POHDTOZIPCODE => 13, EditPoHeadTableMap::COL_POHDPTNAME => 14, EditPoHeadTableMap::COL_POHDPTADR1 => 15, EditPoHeadTableMap::COL_POHDPTADR2 => 16, EditPoHeadTableMap::COL_POHDPTADR3 => 17, EditPoHeadTableMap::COL_POHDPTCTRY => 18, EditPoHeadTableMap::COL_POHDPTCITY => 19, EditPoHeadTableMap::COL_POHDPTSTAT => 20, EditPoHeadTableMap::COL_POHDPTZIPCODE => 21, EditPoHeadTableMap::COL_POHDCONT => 22, EditPoHeadTableMap::COL_POHDORDRDATE => 23, EditPoHeadTableMap::COL_APTMTERMCODE => 24, EditPoHeadTableMap::COL_ARTBSVIACODE => 25, EditPoHeadTableMap::COL_POHDOLDFOB => 26, EditPoHeadTableMap::COL_APTBBUYRCODE => 27, EditPoHeadTableMap::COL_POHDCOLPPD => 28, EditPoHeadTableMap::COL_POHDTELEINTL => 29, EditPoHeadTableMap::COL_POHDTELENBR => 30, EditPoHeadTableMap::COL_POHDTELEEXT => 31, EditPoHeadTableMap::COL_POHDFAXINTL => 32, EditPoHeadTableMap::COL_POHDFAXNBR => 33, EditPoHeadTableMap::COL_POHDRCNT => 34, EditPoHeadTableMap::COL_POHDTAXEXEM => 35, EditPoHeadTableMap::COL_POHDEXCHCTRY => 36, EditPoHeadTableMap::COL_POHDEXCHRATE => 37, EditPoHeadTableMap::COL_POHDEXPTDATE => 38, EditPoHeadTableMap::COL_POHDCANCDATE => 39, EditPoHeadTableMap::COL_POHDICNT => 40, EditPoHeadTableMap::COL_POHDFOB => 41, EditPoHeadTableMap::COL_POHDPICKQUEUE => 42, EditPoHeadTableMap::COL_POHDPACKEDBY => 43, EditPoHeadTableMap::COL_POHDPACKDATE => 44, EditPoHeadTableMap::COL_POHDPACKTIME => 45, EditPoHeadTableMap::COL_POHDLANDCOST => 46, EditPoHeadTableMap::COL_POHDEDIPODATE => 47, EditPoHeadTableMap::COL_POHDFUTUREBUY => 48, EditPoHeadTableMap::COL_POHDEMAILADDR => 49, EditPoHeadTableMap::COL_POHDSHIPDATE => 50, EditPoHeadTableMap::COL_POHDACKDATE => 51, EditPoHeadTableMap::COL_POHDRELEASENBR => 52, EditPoHeadTableMap::COL_POHDRETURNSPO => 53, EditPoHeadTableMap::COL_DATEUPDTD => 54, EditPoHeadTableMap::COL_TIMEUPDTD => 55, EditPoHeadTableMap::COL_STATUS => 56, EditPoHeadTableMap::COL_DUMMY => 57, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'PohdNbr' => 1, 'PohdStat' => 2, 'PohdRef' => 3, 'ApveVendId' => 4, 'ApfmShipId' => 5, 'PohdToName' => 6, 'PohdToAdr1' => 7, 'PohdToAdr2' => 8, 'PohdToAdr3' => 9, 'PohdToCtry' => 10, 'PohdToCity' => 11, 'PohdToStat' => 12, 'PohdToZipCode' => 13, 'PohdPtName' => 14, 'PohdPtAdr1' => 15, 'PohdPtAdr2' => 16, 'PohdPtAdr3' => 17, 'PohdPtCtry' => 18, 'PohdPtCity' => 19, 'PohdPtStat' => 20, 'PohdPtZipCode' => 21, 'PohdCont' => 22, 'PohdOrdrDate' => 23, 'AptmTermCode' => 24, 'ArtbSviaCode' => 25, 'PohdOldFob' => 26, 'AptbBuyrCode' => 27, 'PohdColPpd' => 28, 'PohdTeleIntl' => 29, 'PohdTeleNbr' => 30, 'PohdTeleExt' => 31, 'PohdFaxIntl' => 32, 'PohdFaxNbr' => 33, 'PohdRCnt' => 34, 'PohdTaxExem' => 35, 'PohdExchCtry' => 36, 'PohdExchRate' => 37, 'PohdExptDate' => 38, 'PohdCancDate' => 39, 'PohdICnt' => 40, 'PohdFob' => 41, 'PohdPickQueue' => 42, 'PohdPackedBy' => 43, 'PohdPackDate' => 44, 'PohdPackTime' => 45, 'PohdLandCost' => 46, 'PohdEdiPoDate' => 47, 'PohdFutureBuy' => 48, 'PohdEmailAddr' => 49, 'PohdShipDate' => 50, 'PohdAckDate' => 51, 'PohdReleaseNbr' => 52, 'PohdReturnsPo' => 53, 'DateUpdtd' => 54, 'TimeUpdtd' => 55, 'status' => 56, 'dummy' => 57, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, )
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
        $this->setName('edit_po_head');
        $this->setPhpName('EditPoHead');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EditPoHead');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('PohdNbr', 'Pohdnbr', 'VARCHAR', true, 8, '');
        $this->addColumn('PohdStat', 'Pohdstat', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdRef', 'Pohdref', 'VARCHAR', false, 15, null);
        $this->addColumn('ApveVendId', 'Apvevendid', 'VARCHAR', false, 6, null);
        $this->addColumn('ApfmShipId', 'Apfmshipid', 'VARCHAR', false, 6, null);
        $this->addColumn('PohdToName', 'Pohdtoname', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdToAdr1', 'Pohdtoadr1', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdToAdr2', 'Pohdtoadr2', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdToAdr3', 'Pohdtoadr3', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdToCtry', 'Pohdtoctry', 'VARCHAR', false, 4, null);
        $this->addColumn('PohdToCity', 'Pohdtocity', 'VARCHAR', false, 16, null);
        $this->addColumn('PohdToStat', 'Pohdtostat', 'VARCHAR', false, 2, null);
        $this->addColumn('PohdToZipCode', 'Pohdtozipcode', 'VARCHAR', false, 10, null);
        $this->addColumn('PohdPtName', 'Pohdptname', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdPtAdr1', 'Pohdptadr1', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdPtAdr2', 'Pohdptadr2', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdPtAdr3', 'Pohdptadr3', 'VARCHAR', false, 30, null);
        $this->addColumn('PohdPtCtry', 'Pohdptctry', 'VARCHAR', false, 4, null);
        $this->addColumn('PohdPtCity', 'Pohdptcity', 'VARCHAR', false, 16, null);
        $this->addColumn('PohdPtStat', 'Pohdptstat', 'VARCHAR', false, 2, null);
        $this->addColumn('PohdPtZipCode', 'Pohdptzipcode', 'VARCHAR', false, 10, null);
        $this->addColumn('PohdCont', 'Pohdcont', 'VARCHAR', false, 20, null);
        $this->addColumn('PohdOrdrDate', 'Pohdordrdate', 'VARCHAR', false, 8, null);
        $this->addColumn('AptmTermCode', 'Aptmtermcode', 'VARCHAR', false, 4, null);
        $this->addColumn('ArtbSviaCode', 'Artbsviacode', 'VARCHAR', false, 4, null);
        $this->addColumn('PohdOldFob', 'Pohdoldfob', 'VARCHAR', false, 1, null);
        $this->addColumn('AptbBuyrCode', 'Aptbbuyrcode', 'VARCHAR', false, 6, null);
        $this->addColumn('PohdColPpd', 'Pohdcolppd', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdTeleIntl', 'Pohdteleintl', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdTeleNbr', 'Pohdtelenbr', 'VARCHAR', false, 22, null);
        $this->addColumn('PohdTeleExt', 'Pohdteleext', 'VARCHAR', false, 7, null);
        $this->addColumn('PohdFaxIntl', 'Pohdfaxintl', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdFaxNbr', 'Pohdfaxnbr', 'VARCHAR', false, 22, null);
        $this->addColumn('PohdRCnt', 'Pohdrcnt', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdTaxExem', 'Pohdtaxexem', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdExchCtry', 'Pohdexchctry', 'VARCHAR', false, 4, null);
        $this->addColumn('PohdExchRate', 'Pohdexchrate', 'DECIMAL', false, 20, null);
        $this->addColumn('PohdExptDate', 'Pohdexptdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdCancDate', 'Pohdcancdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdICnt', 'Pohdicnt', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdFob', 'Pohdfob', 'VARCHAR', false, 20, null);
        $this->addColumn('PohdPickQueue', 'Pohdpickqueue', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdPackedBy', 'Pohdpackedby', 'VARCHAR', false, 12, null);
        $this->addColumn('PohdPackDate', 'Pohdpackdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdPackTime', 'Pohdpacktime', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdLandCost', 'Pohdlandcost', 'DECIMAL', false, 20, null);
        $this->addColumn('PohdEdiPoDate', 'Pohdedipodate', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdFutureBuy', 'Pohdfuturebuy', 'VARCHAR', false, 1, null);
        $this->addColumn('PohdEmailAddr', 'Pohdemailaddr', 'VARCHAR', false, 50, null);
        $this->addColumn('PohdShipDate', 'Pohdshipdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdAckDate', 'Pohdackdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PohdReleaseNbr', 'Pohdreleasenbr', 'INTEGER', false, 4, null);
        $this->addColumn('PohdReturnsPo', 'Pohdreturnspo', 'VARCHAR', false, 1, null);
        $this->addColumn('DateUpdtd', 'Dateupdtd', 'VARCHAR', false, 8, null);
        $this->addColumn('TimeUpdtd', 'Timeupdtd', 'VARCHAR', false, 8, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 50, null);
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
     * @param \EditPoHead $obj A \EditPoHead object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getPohdnbr() || is_scalar($obj->getPohdnbr()) || is_callable([$obj->getPohdnbr(), '__toString']) ? (string) $obj->getPohdnbr() : $obj->getPohdnbr())]);
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
     * @param mixed $value A \EditPoHead object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \EditPoHead) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getPohdnbr() || is_scalar($value->getPohdnbr()) || is_callable([$value->getPohdnbr(), '__toString']) ? (string) $value->getPohdnbr() : $value->getPohdnbr())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \EditPoHead object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)])]);
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
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EditPoHeadTableMap::CLASS_DEFAULT : EditPoHeadTableMap::OM_CLASS;
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
     * @return array           (EditPoHead object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EditPoHeadTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EditPoHeadTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EditPoHeadTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EditPoHeadTableMap::OM_CLASS;
            /** @var EditPoHead $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EditPoHeadTableMap::addInstanceToPool($obj, $key);
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
            $key = EditPoHeadTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EditPoHeadTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EditPoHead $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EditPoHeadTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDNBR);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDSTAT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDREF);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_APVEVENDID);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_APFMSHIPID);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTONAME);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOADR1);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOADR2);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOADR3);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOCTRY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOCITY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOSTAT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTOZIPCODE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTNAME);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTADR1);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTADR2);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTADR3);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTCTRY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTCITY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTSTAT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPTZIPCODE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDCONT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDORDRDATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_APTMTERMCODE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_ARTBSVIACODE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDOLDFOB);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_APTBBUYRCODE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDCOLPPD);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTELEINTL);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTELENBR);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTELEEXT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDFAXINTL);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDFAXNBR);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDRCNT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDTAXEXEM);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDEXCHCTRY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDEXCHRATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDEXPTDATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDCANCDATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDICNT);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDFOB);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPICKQUEUE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPACKEDBY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPACKDATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDPACKTIME);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDLANDCOST);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDEDIPODATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDFUTUREBUY);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDEMAILADDR);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDSHIPDATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDACKDATE);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDRELEASENBR);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_POHDRETURNSPO);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_DATEUPDTD);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_TIMEUPDTD);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_STATUS);
            $criteria->addSelectColumn(EditPoHeadTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.PohdNbr');
            $criteria->addSelectColumn($alias . '.PohdStat');
            $criteria->addSelectColumn($alias . '.PohdRef');
            $criteria->addSelectColumn($alias . '.ApveVendId');
            $criteria->addSelectColumn($alias . '.ApfmShipId');
            $criteria->addSelectColumn($alias . '.PohdToName');
            $criteria->addSelectColumn($alias . '.PohdToAdr1');
            $criteria->addSelectColumn($alias . '.PohdToAdr2');
            $criteria->addSelectColumn($alias . '.PohdToAdr3');
            $criteria->addSelectColumn($alias . '.PohdToCtry');
            $criteria->addSelectColumn($alias . '.PohdToCity');
            $criteria->addSelectColumn($alias . '.PohdToStat');
            $criteria->addSelectColumn($alias . '.PohdToZipCode');
            $criteria->addSelectColumn($alias . '.PohdPtName');
            $criteria->addSelectColumn($alias . '.PohdPtAdr1');
            $criteria->addSelectColumn($alias . '.PohdPtAdr2');
            $criteria->addSelectColumn($alias . '.PohdPtAdr3');
            $criteria->addSelectColumn($alias . '.PohdPtCtry');
            $criteria->addSelectColumn($alias . '.PohdPtCity');
            $criteria->addSelectColumn($alias . '.PohdPtStat');
            $criteria->addSelectColumn($alias . '.PohdPtZipCode');
            $criteria->addSelectColumn($alias . '.PohdCont');
            $criteria->addSelectColumn($alias . '.PohdOrdrDate');
            $criteria->addSelectColumn($alias . '.AptmTermCode');
            $criteria->addSelectColumn($alias . '.ArtbSviaCode');
            $criteria->addSelectColumn($alias . '.PohdOldFob');
            $criteria->addSelectColumn($alias . '.AptbBuyrCode');
            $criteria->addSelectColumn($alias . '.PohdColPpd');
            $criteria->addSelectColumn($alias . '.PohdTeleIntl');
            $criteria->addSelectColumn($alias . '.PohdTeleNbr');
            $criteria->addSelectColumn($alias . '.PohdTeleExt');
            $criteria->addSelectColumn($alias . '.PohdFaxIntl');
            $criteria->addSelectColumn($alias . '.PohdFaxNbr');
            $criteria->addSelectColumn($alias . '.PohdRCnt');
            $criteria->addSelectColumn($alias . '.PohdTaxExem');
            $criteria->addSelectColumn($alias . '.PohdExchCtry');
            $criteria->addSelectColumn($alias . '.PohdExchRate');
            $criteria->addSelectColumn($alias . '.PohdExptDate');
            $criteria->addSelectColumn($alias . '.PohdCancDate');
            $criteria->addSelectColumn($alias . '.PohdICnt');
            $criteria->addSelectColumn($alias . '.PohdFob');
            $criteria->addSelectColumn($alias . '.PohdPickQueue');
            $criteria->addSelectColumn($alias . '.PohdPackedBy');
            $criteria->addSelectColumn($alias . '.PohdPackDate');
            $criteria->addSelectColumn($alias . '.PohdPackTime');
            $criteria->addSelectColumn($alias . '.PohdLandCost');
            $criteria->addSelectColumn($alias . '.PohdEdiPoDate');
            $criteria->addSelectColumn($alias . '.PohdFutureBuy');
            $criteria->addSelectColumn($alias . '.PohdEmailAddr');
            $criteria->addSelectColumn($alias . '.PohdShipDate');
            $criteria->addSelectColumn($alias . '.PohdAckDate');
            $criteria->addSelectColumn($alias . '.PohdReleaseNbr');
            $criteria->addSelectColumn($alias . '.PohdReturnsPo');
            $criteria->addSelectColumn($alias . '.DateUpdtd');
            $criteria->addSelectColumn($alias . '.TimeUpdtd');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(EditPoHeadTableMap::DATABASE_NAME)->getTable(EditPoHeadTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EditPoHeadTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EditPoHeadTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EditPoHeadTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EditPoHead or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EditPoHead object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EditPoHead) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EditPoHeadTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(EditPoHeadTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(EditPoHeadTableMap::COL_POHDNBR, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = EditPoHeadQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EditPoHeadTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EditPoHeadTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the edit_po_head table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EditPoHeadQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EditPoHead or Criteria object.
     *
     * @param mixed               $criteria Criteria or EditPoHead object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EditPoHead object
        }


        // Set the correct dbName
        $query = EditPoHeadQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EditPoHeadTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EditPoHeadTableMap::buildTableMap();
