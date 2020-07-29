<?php

namespace Base;

use \EditPoHead as ChildEditPoHead;
use \EditPoHeadQuery as ChildEditPoHeadQuery;
use \Exception;
use \PDO;
use Map\EditPoHeadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'edit_po_head' table.
 *
 *
 *
 * @method     ChildEditPoHeadQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildEditPoHeadQuery orderByPohdnbr($order = Criteria::ASC) Order by the PohdNbr column
 * @method     ChildEditPoHeadQuery orderByPohdstat($order = Criteria::ASC) Order by the PohdStat column
 * @method     ChildEditPoHeadQuery orderByPohdref($order = Criteria::ASC) Order by the PohdRef column
 * @method     ChildEditPoHeadQuery orderByApvevendid($order = Criteria::ASC) Order by the ApveVendId column
 * @method     ChildEditPoHeadQuery orderByApfmshipid($order = Criteria::ASC) Order by the ApfmShipId column
 * @method     ChildEditPoHeadQuery orderByPohdtoname($order = Criteria::ASC) Order by the PohdToName column
 * @method     ChildEditPoHeadQuery orderByPohdtoadr1($order = Criteria::ASC) Order by the PohdToAdr1 column
 * @method     ChildEditPoHeadQuery orderByPohdtoadr2($order = Criteria::ASC) Order by the PohdToAdr2 column
 * @method     ChildEditPoHeadQuery orderByPohdtoadr3($order = Criteria::ASC) Order by the PohdToAdr3 column
 * @method     ChildEditPoHeadQuery orderByPohdtoctry($order = Criteria::ASC) Order by the PohdToCtry column
 * @method     ChildEditPoHeadQuery orderByPohdtocity($order = Criteria::ASC) Order by the PohdToCity column
 * @method     ChildEditPoHeadQuery orderByPohdtostat($order = Criteria::ASC) Order by the PohdToStat column
 * @method     ChildEditPoHeadQuery orderByPohdtozipcode($order = Criteria::ASC) Order by the PohdToZipCode column
 * @method     ChildEditPoHeadQuery orderByPohdptname($order = Criteria::ASC) Order by the PohdPtName column
 * @method     ChildEditPoHeadQuery orderByPohdptadr1($order = Criteria::ASC) Order by the PohdPtAdr1 column
 * @method     ChildEditPoHeadQuery orderByPohdptadr2($order = Criteria::ASC) Order by the PohdPtAdr2 column
 * @method     ChildEditPoHeadQuery orderByPohdptadr3($order = Criteria::ASC) Order by the PohdPtAdr3 column
 * @method     ChildEditPoHeadQuery orderByPohdptctry($order = Criteria::ASC) Order by the PohdPtCtry column
 * @method     ChildEditPoHeadQuery orderByPohdptcity($order = Criteria::ASC) Order by the PohdPtCity column
 * @method     ChildEditPoHeadQuery orderByPohdptstat($order = Criteria::ASC) Order by the PohdPtStat column
 * @method     ChildEditPoHeadQuery orderByPohdptzipcode($order = Criteria::ASC) Order by the PohdPtZipCode column
 * @method     ChildEditPoHeadQuery orderByPohdcont($order = Criteria::ASC) Order by the PohdCont column
 * @method     ChildEditPoHeadQuery orderByPohdordrdate($order = Criteria::ASC) Order by the PohdOrdrDate column
 * @method     ChildEditPoHeadQuery orderByAptmtermcode($order = Criteria::ASC) Order by the AptmTermCode column
 * @method     ChildEditPoHeadQuery orderByArtbsviacode($order = Criteria::ASC) Order by the ArtbSviaCode column
 * @method     ChildEditPoHeadQuery orderByPohdoldfob($order = Criteria::ASC) Order by the PohdOldFob column
 * @method     ChildEditPoHeadQuery orderByAptbbuyrcode($order = Criteria::ASC) Order by the AptbBuyrCode column
 * @method     ChildEditPoHeadQuery orderByPohdcolppd($order = Criteria::ASC) Order by the PohdColPpd column
 * @method     ChildEditPoHeadQuery orderByPohdteleintl($order = Criteria::ASC) Order by the PohdTeleIntl column
 * @method     ChildEditPoHeadQuery orderByPohdtelenbr($order = Criteria::ASC) Order by the PohdTeleNbr column
 * @method     ChildEditPoHeadQuery orderByPohdteleext($order = Criteria::ASC) Order by the PohdTeleExt column
 * @method     ChildEditPoHeadQuery orderByPohdfaxintl($order = Criteria::ASC) Order by the PohdFaxIntl column
 * @method     ChildEditPoHeadQuery orderByPohdfaxnbr($order = Criteria::ASC) Order by the PohdFaxNbr column
 * @method     ChildEditPoHeadQuery orderByPohdrcnt($order = Criteria::ASC) Order by the PohdRCnt column
 * @method     ChildEditPoHeadQuery orderByPohdtaxexem($order = Criteria::ASC) Order by the PohdTaxExem column
 * @method     ChildEditPoHeadQuery orderByPohdexchctry($order = Criteria::ASC) Order by the PohdExchCtry column
 * @method     ChildEditPoHeadQuery orderByPohdexchrate($order = Criteria::ASC) Order by the PohdExchRate column
 * @method     ChildEditPoHeadQuery orderByPohdexptdate($order = Criteria::ASC) Order by the PohdExptDate column
 * @method     ChildEditPoHeadQuery orderByPohdcancdate($order = Criteria::ASC) Order by the PohdCancDate column
 * @method     ChildEditPoHeadQuery orderByPohdicnt($order = Criteria::ASC) Order by the PohdICnt column
 * @method     ChildEditPoHeadQuery orderByPohdfob($order = Criteria::ASC) Order by the PohdFob column
 * @method     ChildEditPoHeadQuery orderByPohdpickqueue($order = Criteria::ASC) Order by the PohdPickQueue column
 * @method     ChildEditPoHeadQuery orderByPohdpackedby($order = Criteria::ASC) Order by the PohdPackedBy column
 * @method     ChildEditPoHeadQuery orderByPohdpackdate($order = Criteria::ASC) Order by the PohdPackDate column
 * @method     ChildEditPoHeadQuery orderByPohdpacktime($order = Criteria::ASC) Order by the PohdPackTime column
 * @method     ChildEditPoHeadQuery orderByPohdlandcost($order = Criteria::ASC) Order by the PohdLandCost column
 * @method     ChildEditPoHeadQuery orderByPohdedipodate($order = Criteria::ASC) Order by the PohdEdiPoDate column
 * @method     ChildEditPoHeadQuery orderByPohdfuturebuy($order = Criteria::ASC) Order by the PohdFutureBuy column
 * @method     ChildEditPoHeadQuery orderByPohdemailaddr($order = Criteria::ASC) Order by the PohdEmailAddr column
 * @method     ChildEditPoHeadQuery orderByPohdshipdate($order = Criteria::ASC) Order by the PohdShipDate column
 * @method     ChildEditPoHeadQuery orderByPohdackdate($order = Criteria::ASC) Order by the PohdAckDate column
 * @method     ChildEditPoHeadQuery orderByPohdreleasenbr($order = Criteria::ASC) Order by the PohdReleaseNbr column
 * @method     ChildEditPoHeadQuery orderByPohdreturnspo($order = Criteria::ASC) Order by the PohdReturnsPo column
 * @method     ChildEditPoHeadQuery orderByDateupdtd($order = Criteria::ASC) Order by the DateUpdtd column
 * @method     ChildEditPoHeadQuery orderByTimeupdtd($order = Criteria::ASC) Order by the TimeUpdtd column
 * @method     ChildEditPoHeadQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEditPoHeadQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildEditPoHeadQuery groupBySessionid() Group by the sessionid column
 * @method     ChildEditPoHeadQuery groupByPohdnbr() Group by the PohdNbr column
 * @method     ChildEditPoHeadQuery groupByPohdstat() Group by the PohdStat column
 * @method     ChildEditPoHeadQuery groupByPohdref() Group by the PohdRef column
 * @method     ChildEditPoHeadQuery groupByApvevendid() Group by the ApveVendId column
 * @method     ChildEditPoHeadQuery groupByApfmshipid() Group by the ApfmShipId column
 * @method     ChildEditPoHeadQuery groupByPohdtoname() Group by the PohdToName column
 * @method     ChildEditPoHeadQuery groupByPohdtoadr1() Group by the PohdToAdr1 column
 * @method     ChildEditPoHeadQuery groupByPohdtoadr2() Group by the PohdToAdr2 column
 * @method     ChildEditPoHeadQuery groupByPohdtoadr3() Group by the PohdToAdr3 column
 * @method     ChildEditPoHeadQuery groupByPohdtoctry() Group by the PohdToCtry column
 * @method     ChildEditPoHeadQuery groupByPohdtocity() Group by the PohdToCity column
 * @method     ChildEditPoHeadQuery groupByPohdtostat() Group by the PohdToStat column
 * @method     ChildEditPoHeadQuery groupByPohdtozipcode() Group by the PohdToZipCode column
 * @method     ChildEditPoHeadQuery groupByPohdptname() Group by the PohdPtName column
 * @method     ChildEditPoHeadQuery groupByPohdptadr1() Group by the PohdPtAdr1 column
 * @method     ChildEditPoHeadQuery groupByPohdptadr2() Group by the PohdPtAdr2 column
 * @method     ChildEditPoHeadQuery groupByPohdptadr3() Group by the PohdPtAdr3 column
 * @method     ChildEditPoHeadQuery groupByPohdptctry() Group by the PohdPtCtry column
 * @method     ChildEditPoHeadQuery groupByPohdptcity() Group by the PohdPtCity column
 * @method     ChildEditPoHeadQuery groupByPohdptstat() Group by the PohdPtStat column
 * @method     ChildEditPoHeadQuery groupByPohdptzipcode() Group by the PohdPtZipCode column
 * @method     ChildEditPoHeadQuery groupByPohdcont() Group by the PohdCont column
 * @method     ChildEditPoHeadQuery groupByPohdordrdate() Group by the PohdOrdrDate column
 * @method     ChildEditPoHeadQuery groupByAptmtermcode() Group by the AptmTermCode column
 * @method     ChildEditPoHeadQuery groupByArtbsviacode() Group by the ArtbSviaCode column
 * @method     ChildEditPoHeadQuery groupByPohdoldfob() Group by the PohdOldFob column
 * @method     ChildEditPoHeadQuery groupByAptbbuyrcode() Group by the AptbBuyrCode column
 * @method     ChildEditPoHeadQuery groupByPohdcolppd() Group by the PohdColPpd column
 * @method     ChildEditPoHeadQuery groupByPohdteleintl() Group by the PohdTeleIntl column
 * @method     ChildEditPoHeadQuery groupByPohdtelenbr() Group by the PohdTeleNbr column
 * @method     ChildEditPoHeadQuery groupByPohdteleext() Group by the PohdTeleExt column
 * @method     ChildEditPoHeadQuery groupByPohdfaxintl() Group by the PohdFaxIntl column
 * @method     ChildEditPoHeadQuery groupByPohdfaxnbr() Group by the PohdFaxNbr column
 * @method     ChildEditPoHeadQuery groupByPohdrcnt() Group by the PohdRCnt column
 * @method     ChildEditPoHeadQuery groupByPohdtaxexem() Group by the PohdTaxExem column
 * @method     ChildEditPoHeadQuery groupByPohdexchctry() Group by the PohdExchCtry column
 * @method     ChildEditPoHeadQuery groupByPohdexchrate() Group by the PohdExchRate column
 * @method     ChildEditPoHeadQuery groupByPohdexptdate() Group by the PohdExptDate column
 * @method     ChildEditPoHeadQuery groupByPohdcancdate() Group by the PohdCancDate column
 * @method     ChildEditPoHeadQuery groupByPohdicnt() Group by the PohdICnt column
 * @method     ChildEditPoHeadQuery groupByPohdfob() Group by the PohdFob column
 * @method     ChildEditPoHeadQuery groupByPohdpickqueue() Group by the PohdPickQueue column
 * @method     ChildEditPoHeadQuery groupByPohdpackedby() Group by the PohdPackedBy column
 * @method     ChildEditPoHeadQuery groupByPohdpackdate() Group by the PohdPackDate column
 * @method     ChildEditPoHeadQuery groupByPohdpacktime() Group by the PohdPackTime column
 * @method     ChildEditPoHeadQuery groupByPohdlandcost() Group by the PohdLandCost column
 * @method     ChildEditPoHeadQuery groupByPohdedipodate() Group by the PohdEdiPoDate column
 * @method     ChildEditPoHeadQuery groupByPohdfuturebuy() Group by the PohdFutureBuy column
 * @method     ChildEditPoHeadQuery groupByPohdemailaddr() Group by the PohdEmailAddr column
 * @method     ChildEditPoHeadQuery groupByPohdshipdate() Group by the PohdShipDate column
 * @method     ChildEditPoHeadQuery groupByPohdackdate() Group by the PohdAckDate column
 * @method     ChildEditPoHeadQuery groupByPohdreleasenbr() Group by the PohdReleaseNbr column
 * @method     ChildEditPoHeadQuery groupByPohdreturnspo() Group by the PohdReturnsPo column
 * @method     ChildEditPoHeadQuery groupByDateupdtd() Group by the DateUpdtd column
 * @method     ChildEditPoHeadQuery groupByTimeupdtd() Group by the TimeUpdtd column
 * @method     ChildEditPoHeadQuery groupByStatus() Group by the status column
 * @method     ChildEditPoHeadQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildEditPoHeadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEditPoHeadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEditPoHeadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEditPoHeadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEditPoHeadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEditPoHeadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEditPoHead findOne(ConnectionInterface $con = null) Return the first ChildEditPoHead matching the query
 * @method     ChildEditPoHead findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEditPoHead matching the query, or a new ChildEditPoHead object populated from the query conditions when no match is found
 *
 * @method     ChildEditPoHead findOneBySessionid(string $sessionid) Return the first ChildEditPoHead filtered by the sessionid column
 * @method     ChildEditPoHead findOneByPohdnbr(string $PohdNbr) Return the first ChildEditPoHead filtered by the PohdNbr column
 * @method     ChildEditPoHead findOneByPohdstat(string $PohdStat) Return the first ChildEditPoHead filtered by the PohdStat column
 * @method     ChildEditPoHead findOneByPohdref(string $PohdRef) Return the first ChildEditPoHead filtered by the PohdRef column
 * @method     ChildEditPoHead findOneByApvevendid(string $ApveVendId) Return the first ChildEditPoHead filtered by the ApveVendId column
 * @method     ChildEditPoHead findOneByApfmshipid(string $ApfmShipId) Return the first ChildEditPoHead filtered by the ApfmShipId column
 * @method     ChildEditPoHead findOneByPohdtoname(string $PohdToName) Return the first ChildEditPoHead filtered by the PohdToName column
 * @method     ChildEditPoHead findOneByPohdtoadr1(string $PohdToAdr1) Return the first ChildEditPoHead filtered by the PohdToAdr1 column
 * @method     ChildEditPoHead findOneByPohdtoadr2(string $PohdToAdr2) Return the first ChildEditPoHead filtered by the PohdToAdr2 column
 * @method     ChildEditPoHead findOneByPohdtoadr3(string $PohdToAdr3) Return the first ChildEditPoHead filtered by the PohdToAdr3 column
 * @method     ChildEditPoHead findOneByPohdtoctry(string $PohdToCtry) Return the first ChildEditPoHead filtered by the PohdToCtry column
 * @method     ChildEditPoHead findOneByPohdtocity(string $PohdToCity) Return the first ChildEditPoHead filtered by the PohdToCity column
 * @method     ChildEditPoHead findOneByPohdtostat(string $PohdToStat) Return the first ChildEditPoHead filtered by the PohdToStat column
 * @method     ChildEditPoHead findOneByPohdtozipcode(string $PohdToZipCode) Return the first ChildEditPoHead filtered by the PohdToZipCode column
 * @method     ChildEditPoHead findOneByPohdptname(string $PohdPtName) Return the first ChildEditPoHead filtered by the PohdPtName column
 * @method     ChildEditPoHead findOneByPohdptadr1(string $PohdPtAdr1) Return the first ChildEditPoHead filtered by the PohdPtAdr1 column
 * @method     ChildEditPoHead findOneByPohdptadr2(string $PohdPtAdr2) Return the first ChildEditPoHead filtered by the PohdPtAdr2 column
 * @method     ChildEditPoHead findOneByPohdptadr3(string $PohdPtAdr3) Return the first ChildEditPoHead filtered by the PohdPtAdr3 column
 * @method     ChildEditPoHead findOneByPohdptctry(string $PohdPtCtry) Return the first ChildEditPoHead filtered by the PohdPtCtry column
 * @method     ChildEditPoHead findOneByPohdptcity(string $PohdPtCity) Return the first ChildEditPoHead filtered by the PohdPtCity column
 * @method     ChildEditPoHead findOneByPohdptstat(string $PohdPtStat) Return the first ChildEditPoHead filtered by the PohdPtStat column
 * @method     ChildEditPoHead findOneByPohdptzipcode(string $PohdPtZipCode) Return the first ChildEditPoHead filtered by the PohdPtZipCode column
 * @method     ChildEditPoHead findOneByPohdcont(string $PohdCont) Return the first ChildEditPoHead filtered by the PohdCont column
 * @method     ChildEditPoHead findOneByPohdordrdate(string $PohdOrdrDate) Return the first ChildEditPoHead filtered by the PohdOrdrDate column
 * @method     ChildEditPoHead findOneByAptmtermcode(string $AptmTermCode) Return the first ChildEditPoHead filtered by the AptmTermCode column
 * @method     ChildEditPoHead findOneByArtbsviacode(string $ArtbSviaCode) Return the first ChildEditPoHead filtered by the ArtbSviaCode column
 * @method     ChildEditPoHead findOneByPohdoldfob(string $PohdOldFob) Return the first ChildEditPoHead filtered by the PohdOldFob column
 * @method     ChildEditPoHead findOneByAptbbuyrcode(string $AptbBuyrCode) Return the first ChildEditPoHead filtered by the AptbBuyrCode column
 * @method     ChildEditPoHead findOneByPohdcolppd(string $PohdColPpd) Return the first ChildEditPoHead filtered by the PohdColPpd column
 * @method     ChildEditPoHead findOneByPohdteleintl(string $PohdTeleIntl) Return the first ChildEditPoHead filtered by the PohdTeleIntl column
 * @method     ChildEditPoHead findOneByPohdtelenbr(string $PohdTeleNbr) Return the first ChildEditPoHead filtered by the PohdTeleNbr column
 * @method     ChildEditPoHead findOneByPohdteleext(string $PohdTeleExt) Return the first ChildEditPoHead filtered by the PohdTeleExt column
 * @method     ChildEditPoHead findOneByPohdfaxintl(string $PohdFaxIntl) Return the first ChildEditPoHead filtered by the PohdFaxIntl column
 * @method     ChildEditPoHead findOneByPohdfaxnbr(string $PohdFaxNbr) Return the first ChildEditPoHead filtered by the PohdFaxNbr column
 * @method     ChildEditPoHead findOneByPohdrcnt(string $PohdRCnt) Return the first ChildEditPoHead filtered by the PohdRCnt column
 * @method     ChildEditPoHead findOneByPohdtaxexem(string $PohdTaxExem) Return the first ChildEditPoHead filtered by the PohdTaxExem column
 * @method     ChildEditPoHead findOneByPohdexchctry(string $PohdExchCtry) Return the first ChildEditPoHead filtered by the PohdExchCtry column
 * @method     ChildEditPoHead findOneByPohdexchrate(string $PohdExchRate) Return the first ChildEditPoHead filtered by the PohdExchRate column
 * @method     ChildEditPoHead findOneByPohdexptdate(string $PohdExptDate) Return the first ChildEditPoHead filtered by the PohdExptDate column
 * @method     ChildEditPoHead findOneByPohdcancdate(string $PohdCancDate) Return the first ChildEditPoHead filtered by the PohdCancDate column
 * @method     ChildEditPoHead findOneByPohdicnt(string $PohdICnt) Return the first ChildEditPoHead filtered by the PohdICnt column
 * @method     ChildEditPoHead findOneByPohdfob(string $PohdFob) Return the first ChildEditPoHead filtered by the PohdFob column
 * @method     ChildEditPoHead findOneByPohdpickqueue(string $PohdPickQueue) Return the first ChildEditPoHead filtered by the PohdPickQueue column
 * @method     ChildEditPoHead findOneByPohdpackedby(string $PohdPackedBy) Return the first ChildEditPoHead filtered by the PohdPackedBy column
 * @method     ChildEditPoHead findOneByPohdpackdate(string $PohdPackDate) Return the first ChildEditPoHead filtered by the PohdPackDate column
 * @method     ChildEditPoHead findOneByPohdpacktime(string $PohdPackTime) Return the first ChildEditPoHead filtered by the PohdPackTime column
 * @method     ChildEditPoHead findOneByPohdlandcost(string $PohdLandCost) Return the first ChildEditPoHead filtered by the PohdLandCost column
 * @method     ChildEditPoHead findOneByPohdedipodate(string $PohdEdiPoDate) Return the first ChildEditPoHead filtered by the PohdEdiPoDate column
 * @method     ChildEditPoHead findOneByPohdfuturebuy(string $PohdFutureBuy) Return the first ChildEditPoHead filtered by the PohdFutureBuy column
 * @method     ChildEditPoHead findOneByPohdemailaddr(string $PohdEmailAddr) Return the first ChildEditPoHead filtered by the PohdEmailAddr column
 * @method     ChildEditPoHead findOneByPohdshipdate(string $PohdShipDate) Return the first ChildEditPoHead filtered by the PohdShipDate column
 * @method     ChildEditPoHead findOneByPohdackdate(string $PohdAckDate) Return the first ChildEditPoHead filtered by the PohdAckDate column
 * @method     ChildEditPoHead findOneByPohdreleasenbr(int $PohdReleaseNbr) Return the first ChildEditPoHead filtered by the PohdReleaseNbr column
 * @method     ChildEditPoHead findOneByPohdreturnspo(string $PohdReturnsPo) Return the first ChildEditPoHead filtered by the PohdReturnsPo column
 * @method     ChildEditPoHead findOneByDateupdtd(string $DateUpdtd) Return the first ChildEditPoHead filtered by the DateUpdtd column
 * @method     ChildEditPoHead findOneByTimeupdtd(string $TimeUpdtd) Return the first ChildEditPoHead filtered by the TimeUpdtd column
 * @method     ChildEditPoHead findOneByStatus(string $status) Return the first ChildEditPoHead filtered by the status column
 * @method     ChildEditPoHead findOneByDummy(string $dummy) Return the first ChildEditPoHead filtered by the dummy column *

 * @method     ChildEditPoHead requirePk($key, ConnectionInterface $con = null) Return the ChildEditPoHead by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOne(ConnectionInterface $con = null) Return the first ChildEditPoHead matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEditPoHead requireOneBySessionid(string $sessionid) Return the first ChildEditPoHead filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdnbr(string $PohdNbr) Return the first ChildEditPoHead filtered by the PohdNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdstat(string $PohdStat) Return the first ChildEditPoHead filtered by the PohdStat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdref(string $PohdRef) Return the first ChildEditPoHead filtered by the PohdRef column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByApvevendid(string $ApveVendId) Return the first ChildEditPoHead filtered by the ApveVendId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByApfmshipid(string $ApfmShipId) Return the first ChildEditPoHead filtered by the ApfmShipId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtoname(string $PohdToName) Return the first ChildEditPoHead filtered by the PohdToName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtoadr1(string $PohdToAdr1) Return the first ChildEditPoHead filtered by the PohdToAdr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtoadr2(string $PohdToAdr2) Return the first ChildEditPoHead filtered by the PohdToAdr2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtoadr3(string $PohdToAdr3) Return the first ChildEditPoHead filtered by the PohdToAdr3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtoctry(string $PohdToCtry) Return the first ChildEditPoHead filtered by the PohdToCtry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtocity(string $PohdToCity) Return the first ChildEditPoHead filtered by the PohdToCity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtostat(string $PohdToStat) Return the first ChildEditPoHead filtered by the PohdToStat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtozipcode(string $PohdToZipCode) Return the first ChildEditPoHead filtered by the PohdToZipCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptname(string $PohdPtName) Return the first ChildEditPoHead filtered by the PohdPtName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptadr1(string $PohdPtAdr1) Return the first ChildEditPoHead filtered by the PohdPtAdr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptadr2(string $PohdPtAdr2) Return the first ChildEditPoHead filtered by the PohdPtAdr2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptadr3(string $PohdPtAdr3) Return the first ChildEditPoHead filtered by the PohdPtAdr3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptctry(string $PohdPtCtry) Return the first ChildEditPoHead filtered by the PohdPtCtry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptcity(string $PohdPtCity) Return the first ChildEditPoHead filtered by the PohdPtCity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptstat(string $PohdPtStat) Return the first ChildEditPoHead filtered by the PohdPtStat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdptzipcode(string $PohdPtZipCode) Return the first ChildEditPoHead filtered by the PohdPtZipCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdcont(string $PohdCont) Return the first ChildEditPoHead filtered by the PohdCont column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdordrdate(string $PohdOrdrDate) Return the first ChildEditPoHead filtered by the PohdOrdrDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByAptmtermcode(string $AptmTermCode) Return the first ChildEditPoHead filtered by the AptmTermCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByArtbsviacode(string $ArtbSviaCode) Return the first ChildEditPoHead filtered by the ArtbSviaCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdoldfob(string $PohdOldFob) Return the first ChildEditPoHead filtered by the PohdOldFob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByAptbbuyrcode(string $AptbBuyrCode) Return the first ChildEditPoHead filtered by the AptbBuyrCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdcolppd(string $PohdColPpd) Return the first ChildEditPoHead filtered by the PohdColPpd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdteleintl(string $PohdTeleIntl) Return the first ChildEditPoHead filtered by the PohdTeleIntl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtelenbr(string $PohdTeleNbr) Return the first ChildEditPoHead filtered by the PohdTeleNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdteleext(string $PohdTeleExt) Return the first ChildEditPoHead filtered by the PohdTeleExt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdfaxintl(string $PohdFaxIntl) Return the first ChildEditPoHead filtered by the PohdFaxIntl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdfaxnbr(string $PohdFaxNbr) Return the first ChildEditPoHead filtered by the PohdFaxNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdrcnt(string $PohdRCnt) Return the first ChildEditPoHead filtered by the PohdRCnt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdtaxexem(string $PohdTaxExem) Return the first ChildEditPoHead filtered by the PohdTaxExem column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdexchctry(string $PohdExchCtry) Return the first ChildEditPoHead filtered by the PohdExchCtry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdexchrate(string $PohdExchRate) Return the first ChildEditPoHead filtered by the PohdExchRate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdexptdate(string $PohdExptDate) Return the first ChildEditPoHead filtered by the PohdExptDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdcancdate(string $PohdCancDate) Return the first ChildEditPoHead filtered by the PohdCancDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdicnt(string $PohdICnt) Return the first ChildEditPoHead filtered by the PohdICnt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdfob(string $PohdFob) Return the first ChildEditPoHead filtered by the PohdFob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdpickqueue(string $PohdPickQueue) Return the first ChildEditPoHead filtered by the PohdPickQueue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdpackedby(string $PohdPackedBy) Return the first ChildEditPoHead filtered by the PohdPackedBy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdpackdate(string $PohdPackDate) Return the first ChildEditPoHead filtered by the PohdPackDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdpacktime(string $PohdPackTime) Return the first ChildEditPoHead filtered by the PohdPackTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdlandcost(string $PohdLandCost) Return the first ChildEditPoHead filtered by the PohdLandCost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdedipodate(string $PohdEdiPoDate) Return the first ChildEditPoHead filtered by the PohdEdiPoDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdfuturebuy(string $PohdFutureBuy) Return the first ChildEditPoHead filtered by the PohdFutureBuy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdemailaddr(string $PohdEmailAddr) Return the first ChildEditPoHead filtered by the PohdEmailAddr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdshipdate(string $PohdShipDate) Return the first ChildEditPoHead filtered by the PohdShipDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdackdate(string $PohdAckDate) Return the first ChildEditPoHead filtered by the PohdAckDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdreleasenbr(int $PohdReleaseNbr) Return the first ChildEditPoHead filtered by the PohdReleaseNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByPohdreturnspo(string $PohdReturnsPo) Return the first ChildEditPoHead filtered by the PohdReturnsPo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByDateupdtd(string $DateUpdtd) Return the first ChildEditPoHead filtered by the DateUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByTimeupdtd(string $TimeUpdtd) Return the first ChildEditPoHead filtered by the TimeUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByStatus(string $status) Return the first ChildEditPoHead filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOneByDummy(string $dummy) Return the first ChildEditPoHead filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEditPoHead[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEditPoHead objects based on current ModelCriteria
 * @method     ChildEditPoHead[]|ObjectCollection findBySessionid(string $sessionid) Return ChildEditPoHead objects filtered by the sessionid column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdnbr(string $PohdNbr) Return ChildEditPoHead objects filtered by the PohdNbr column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdstat(string $PohdStat) Return ChildEditPoHead objects filtered by the PohdStat column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdref(string $PohdRef) Return ChildEditPoHead objects filtered by the PohdRef column
 * @method     ChildEditPoHead[]|ObjectCollection findByApvevendid(string $ApveVendId) Return ChildEditPoHead objects filtered by the ApveVendId column
 * @method     ChildEditPoHead[]|ObjectCollection findByApfmshipid(string $ApfmShipId) Return ChildEditPoHead objects filtered by the ApfmShipId column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtoname(string $PohdToName) Return ChildEditPoHead objects filtered by the PohdToName column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtoadr1(string $PohdToAdr1) Return ChildEditPoHead objects filtered by the PohdToAdr1 column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtoadr2(string $PohdToAdr2) Return ChildEditPoHead objects filtered by the PohdToAdr2 column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtoadr3(string $PohdToAdr3) Return ChildEditPoHead objects filtered by the PohdToAdr3 column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtoctry(string $PohdToCtry) Return ChildEditPoHead objects filtered by the PohdToCtry column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtocity(string $PohdToCity) Return ChildEditPoHead objects filtered by the PohdToCity column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtostat(string $PohdToStat) Return ChildEditPoHead objects filtered by the PohdToStat column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtozipcode(string $PohdToZipCode) Return ChildEditPoHead objects filtered by the PohdToZipCode column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptname(string $PohdPtName) Return ChildEditPoHead objects filtered by the PohdPtName column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptadr1(string $PohdPtAdr1) Return ChildEditPoHead objects filtered by the PohdPtAdr1 column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptadr2(string $PohdPtAdr2) Return ChildEditPoHead objects filtered by the PohdPtAdr2 column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptadr3(string $PohdPtAdr3) Return ChildEditPoHead objects filtered by the PohdPtAdr3 column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptctry(string $PohdPtCtry) Return ChildEditPoHead objects filtered by the PohdPtCtry column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptcity(string $PohdPtCity) Return ChildEditPoHead objects filtered by the PohdPtCity column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptstat(string $PohdPtStat) Return ChildEditPoHead objects filtered by the PohdPtStat column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdptzipcode(string $PohdPtZipCode) Return ChildEditPoHead objects filtered by the PohdPtZipCode column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdcont(string $PohdCont) Return ChildEditPoHead objects filtered by the PohdCont column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdordrdate(string $PohdOrdrDate) Return ChildEditPoHead objects filtered by the PohdOrdrDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByAptmtermcode(string $AptmTermCode) Return ChildEditPoHead objects filtered by the AptmTermCode column
 * @method     ChildEditPoHead[]|ObjectCollection findByArtbsviacode(string $ArtbSviaCode) Return ChildEditPoHead objects filtered by the ArtbSviaCode column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdoldfob(string $PohdOldFob) Return ChildEditPoHead objects filtered by the PohdOldFob column
 * @method     ChildEditPoHead[]|ObjectCollection findByAptbbuyrcode(string $AptbBuyrCode) Return ChildEditPoHead objects filtered by the AptbBuyrCode column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdcolppd(string $PohdColPpd) Return ChildEditPoHead objects filtered by the PohdColPpd column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdteleintl(string $PohdTeleIntl) Return ChildEditPoHead objects filtered by the PohdTeleIntl column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtelenbr(string $PohdTeleNbr) Return ChildEditPoHead objects filtered by the PohdTeleNbr column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdteleext(string $PohdTeleExt) Return ChildEditPoHead objects filtered by the PohdTeleExt column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdfaxintl(string $PohdFaxIntl) Return ChildEditPoHead objects filtered by the PohdFaxIntl column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdfaxnbr(string $PohdFaxNbr) Return ChildEditPoHead objects filtered by the PohdFaxNbr column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdrcnt(string $PohdRCnt) Return ChildEditPoHead objects filtered by the PohdRCnt column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdtaxexem(string $PohdTaxExem) Return ChildEditPoHead objects filtered by the PohdTaxExem column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdexchctry(string $PohdExchCtry) Return ChildEditPoHead objects filtered by the PohdExchCtry column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdexchrate(string $PohdExchRate) Return ChildEditPoHead objects filtered by the PohdExchRate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdexptdate(string $PohdExptDate) Return ChildEditPoHead objects filtered by the PohdExptDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdcancdate(string $PohdCancDate) Return ChildEditPoHead objects filtered by the PohdCancDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdicnt(string $PohdICnt) Return ChildEditPoHead objects filtered by the PohdICnt column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdfob(string $PohdFob) Return ChildEditPoHead objects filtered by the PohdFob column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdpickqueue(string $PohdPickQueue) Return ChildEditPoHead objects filtered by the PohdPickQueue column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdpackedby(string $PohdPackedBy) Return ChildEditPoHead objects filtered by the PohdPackedBy column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdpackdate(string $PohdPackDate) Return ChildEditPoHead objects filtered by the PohdPackDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdpacktime(string $PohdPackTime) Return ChildEditPoHead objects filtered by the PohdPackTime column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdlandcost(string $PohdLandCost) Return ChildEditPoHead objects filtered by the PohdLandCost column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdedipodate(string $PohdEdiPoDate) Return ChildEditPoHead objects filtered by the PohdEdiPoDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdfuturebuy(string $PohdFutureBuy) Return ChildEditPoHead objects filtered by the PohdFutureBuy column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdemailaddr(string $PohdEmailAddr) Return ChildEditPoHead objects filtered by the PohdEmailAddr column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdshipdate(string $PohdShipDate) Return ChildEditPoHead objects filtered by the PohdShipDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdackdate(string $PohdAckDate) Return ChildEditPoHead objects filtered by the PohdAckDate column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdreleasenbr(int $PohdReleaseNbr) Return ChildEditPoHead objects filtered by the PohdReleaseNbr column
 * @method     ChildEditPoHead[]|ObjectCollection findByPohdreturnspo(string $PohdReturnsPo) Return ChildEditPoHead objects filtered by the PohdReturnsPo column
 * @method     ChildEditPoHead[]|ObjectCollection findByDateupdtd(string $DateUpdtd) Return ChildEditPoHead objects filtered by the DateUpdtd column
 * @method     ChildEditPoHead[]|ObjectCollection findByTimeupdtd(string $TimeUpdtd) Return ChildEditPoHead objects filtered by the TimeUpdtd column
 * @method     ChildEditPoHead[]|ObjectCollection findByStatus(string $status) Return ChildEditPoHead objects filtered by the status column
 * @method     ChildEditPoHead[]|ObjectCollection findByDummy(string $dummy) Return ChildEditPoHead objects filtered by the dummy column
 * @method     ChildEditPoHead[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EditPoHeadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EditPoHeadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\EditPoHead', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEditPoHeadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEditPoHeadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEditPoHeadQuery) {
            return $criteria;
        }
        $query = new ChildEditPoHeadQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$sessionid, $PohdNbr] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEditPoHead|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EditPoHeadTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEditPoHead A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, PohdNbr, PohdStat, PohdRef, ApveVendId, ApfmShipId, PohdToName, PohdToAdr1, PohdToAdr2, PohdToAdr3, PohdToCtry, PohdToCity, PohdToStat, PohdToZipCode, PohdPtName, PohdPtAdr1, PohdPtAdr2, PohdPtAdr3, PohdPtCtry, PohdPtCity, PohdPtStat, PohdPtZipCode, PohdCont, PohdOrdrDate, AptmTermCode, ArtbSviaCode, PohdOldFob, AptbBuyrCode, PohdColPpd, PohdTeleIntl, PohdTeleNbr, PohdTeleExt, PohdFaxIntl, PohdFaxNbr, PohdRCnt, PohdTaxExem, PohdExchCtry, PohdExchRate, PohdExptDate, PohdCancDate, PohdICnt, PohdFob, PohdPickQueue, PohdPackedBy, PohdPackDate, PohdPackTime, PohdLandCost, PohdEdiPoDate, PohdFutureBuy, PohdEmailAddr, PohdShipDate, PohdAckDate, PohdReleaseNbr, PohdReturnsPo, DateUpdtd, TimeUpdtd, status, dummy FROM edit_po_head WHERE sessionid = :p0 AND PohdNbr = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEditPoHead $obj */
            $obj = new ChildEditPoHead();
            $obj->hydrate($row);
            EditPoHeadTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildEditPoHead|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EditPoHeadTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDNBR, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EditPoHeadTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EditPoHeadTableMap::COL_POHDNBR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sessionid column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionid('fooValue');   // WHERE sessionid = 'fooValue'
     * $query->filterBySessionid('%fooValue%', Criteria::LIKE); // WHERE sessionid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the PohdNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdnbr('fooValue');   // WHERE PohdNbr = 'fooValue'
     * $query->filterByPohdnbr('%fooValue%', Criteria::LIKE); // WHERE PohdNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdnbr($pohdnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDNBR, $pohdnbr, $comparison);
    }

    /**
     * Filter the query on the PohdStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdstat('fooValue');   // WHERE PohdStat = 'fooValue'
     * $query->filterByPohdstat('%fooValue%', Criteria::LIKE); // WHERE PohdStat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdstat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdstat($pohdstat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdstat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDSTAT, $pohdstat, $comparison);
    }

    /**
     * Filter the query on the PohdRef column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdref('fooValue');   // WHERE PohdRef = 'fooValue'
     * $query->filterByPohdref('%fooValue%', Criteria::LIKE); // WHERE PohdRef LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdref($pohdref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDREF, $pohdref, $comparison);
    }

    /**
     * Filter the query on the ApveVendId column
     *
     * Example usage:
     * <code>
     * $query->filterByApvevendid('fooValue');   // WHERE ApveVendId = 'fooValue'
     * $query->filterByApvevendid('%fooValue%', Criteria::LIKE); // WHERE ApveVendId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apvevendid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByApvevendid($apvevendid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apvevendid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_APVEVENDID, $apvevendid, $comparison);
    }

    /**
     * Filter the query on the ApfmShipId column
     *
     * Example usage:
     * <code>
     * $query->filterByApfmshipid('fooValue');   // WHERE ApfmShipId = 'fooValue'
     * $query->filterByApfmshipid('%fooValue%', Criteria::LIKE); // WHERE ApfmShipId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apfmshipid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByApfmshipid($apfmshipid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apfmshipid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_APFMSHIPID, $apfmshipid, $comparison);
    }

    /**
     * Filter the query on the PohdToName column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoname('fooValue');   // WHERE PohdToName = 'fooValue'
     * $query->filterByPohdtoname('%fooValue%', Criteria::LIKE); // WHERE PohdToName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtoname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtoname($pohdtoname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTONAME, $pohdtoname, $comparison);
    }

    /**
     * Filter the query on the PohdToAdr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoadr1('fooValue');   // WHERE PohdToAdr1 = 'fooValue'
     * $query->filterByPohdtoadr1('%fooValue%', Criteria::LIKE); // WHERE PohdToAdr1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtoadr1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtoadr1($pohdtoadr1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoadr1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOADR1, $pohdtoadr1, $comparison);
    }

    /**
     * Filter the query on the PohdToAdr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoadr2('fooValue');   // WHERE PohdToAdr2 = 'fooValue'
     * $query->filterByPohdtoadr2('%fooValue%', Criteria::LIKE); // WHERE PohdToAdr2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtoadr2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtoadr2($pohdtoadr2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoadr2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOADR2, $pohdtoadr2, $comparison);
    }

    /**
     * Filter the query on the PohdToAdr3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoadr3('fooValue');   // WHERE PohdToAdr3 = 'fooValue'
     * $query->filterByPohdtoadr3('%fooValue%', Criteria::LIKE); // WHERE PohdToAdr3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtoadr3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtoadr3($pohdtoadr3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoadr3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOADR3, $pohdtoadr3, $comparison);
    }

    /**
     * Filter the query on the PohdToCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoctry('fooValue');   // WHERE PohdToCtry = 'fooValue'
     * $query->filterByPohdtoctry('%fooValue%', Criteria::LIKE); // WHERE PohdToCtry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtoctry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtoctry($pohdtoctry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoctry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOCTRY, $pohdtoctry, $comparison);
    }

    /**
     * Filter the query on the PohdToCity column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtocity('fooValue');   // WHERE PohdToCity = 'fooValue'
     * $query->filterByPohdtocity('%fooValue%', Criteria::LIKE); // WHERE PohdToCity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtocity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtocity($pohdtocity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtocity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOCITY, $pohdtocity, $comparison);
    }

    /**
     * Filter the query on the PohdToStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtostat('fooValue');   // WHERE PohdToStat = 'fooValue'
     * $query->filterByPohdtostat('%fooValue%', Criteria::LIKE); // WHERE PohdToStat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtostat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtostat($pohdtostat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtostat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOSTAT, $pohdtostat, $comparison);
    }

    /**
     * Filter the query on the PohdToZipCode column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtozipcode('fooValue');   // WHERE PohdToZipCode = 'fooValue'
     * $query->filterByPohdtozipcode('%fooValue%', Criteria::LIKE); // WHERE PohdToZipCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtozipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtozipcode($pohdtozipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtozipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOZIPCODE, $pohdtozipcode, $comparison);
    }

    /**
     * Filter the query on the PohdPtName column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptname('fooValue');   // WHERE PohdPtName = 'fooValue'
     * $query->filterByPohdptname('%fooValue%', Criteria::LIKE); // WHERE PohdPtName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptname($pohdptname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTNAME, $pohdptname, $comparison);
    }

    /**
     * Filter the query on the PohdPtAdr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptadr1('fooValue');   // WHERE PohdPtAdr1 = 'fooValue'
     * $query->filterByPohdptadr1('%fooValue%', Criteria::LIKE); // WHERE PohdPtAdr1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptadr1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptadr1($pohdptadr1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptadr1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTADR1, $pohdptadr1, $comparison);
    }

    /**
     * Filter the query on the PohdPtAdr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptadr2('fooValue');   // WHERE PohdPtAdr2 = 'fooValue'
     * $query->filterByPohdptadr2('%fooValue%', Criteria::LIKE); // WHERE PohdPtAdr2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptadr2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptadr2($pohdptadr2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptadr2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTADR2, $pohdptadr2, $comparison);
    }

    /**
     * Filter the query on the PohdPtAdr3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptadr3('fooValue');   // WHERE PohdPtAdr3 = 'fooValue'
     * $query->filterByPohdptadr3('%fooValue%', Criteria::LIKE); // WHERE PohdPtAdr3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptadr3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptadr3($pohdptadr3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptadr3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTADR3, $pohdptadr3, $comparison);
    }

    /**
     * Filter the query on the PohdPtCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptctry('fooValue');   // WHERE PohdPtCtry = 'fooValue'
     * $query->filterByPohdptctry('%fooValue%', Criteria::LIKE); // WHERE PohdPtCtry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptctry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptctry($pohdptctry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptctry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTCTRY, $pohdptctry, $comparison);
    }

    /**
     * Filter the query on the PohdPtCity column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptcity('fooValue');   // WHERE PohdPtCity = 'fooValue'
     * $query->filterByPohdptcity('%fooValue%', Criteria::LIKE); // WHERE PohdPtCity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptcity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptcity($pohdptcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTCITY, $pohdptcity, $comparison);
    }

    /**
     * Filter the query on the PohdPtStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptstat('fooValue');   // WHERE PohdPtStat = 'fooValue'
     * $query->filterByPohdptstat('%fooValue%', Criteria::LIKE); // WHERE PohdPtStat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptstat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptstat($pohdptstat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptstat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTSTAT, $pohdptstat, $comparison);
    }

    /**
     * Filter the query on the PohdPtZipCode column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptzipcode('fooValue');   // WHERE PohdPtZipCode = 'fooValue'
     * $query->filterByPohdptzipcode('%fooValue%', Criteria::LIKE); // WHERE PohdPtZipCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdptzipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdptzipcode($pohdptzipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptzipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTZIPCODE, $pohdptzipcode, $comparison);
    }

    /**
     * Filter the query on the PohdCont column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdcont('fooValue');   // WHERE PohdCont = 'fooValue'
     * $query->filterByPohdcont('%fooValue%', Criteria::LIKE); // WHERE PohdCont LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdcont The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdcont($pohdcont = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdcont)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDCONT, $pohdcont, $comparison);
    }

    /**
     * Filter the query on the PohdOrdrDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdordrdate('fooValue');   // WHERE PohdOrdrDate = 'fooValue'
     * $query->filterByPohdordrdate('%fooValue%', Criteria::LIKE); // WHERE PohdOrdrDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdordrdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdordrdate($pohdordrdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdordrdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDORDRDATE, $pohdordrdate, $comparison);
    }

    /**
     * Filter the query on the AptmTermCode column
     *
     * Example usage:
     * <code>
     * $query->filterByAptmtermcode('fooValue');   // WHERE AptmTermCode = 'fooValue'
     * $query->filterByAptmtermcode('%fooValue%', Criteria::LIKE); // WHERE AptmTermCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aptmtermcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByAptmtermcode($aptmtermcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aptmtermcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_APTMTERMCODE, $aptmtermcode, $comparison);
    }

    /**
     * Filter the query on the ArtbSviaCode column
     *
     * Example usage:
     * <code>
     * $query->filterByArtbsviacode('fooValue');   // WHERE ArtbSviaCode = 'fooValue'
     * $query->filterByArtbsviacode('%fooValue%', Criteria::LIKE); // WHERE ArtbSviaCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artbsviacode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByArtbsviacode($artbsviacode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artbsviacode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_ARTBSVIACODE, $artbsviacode, $comparison);
    }

    /**
     * Filter the query on the PohdOldFob column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdoldfob('fooValue');   // WHERE PohdOldFob = 'fooValue'
     * $query->filterByPohdoldfob('%fooValue%', Criteria::LIKE); // WHERE PohdOldFob LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdoldfob The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdoldfob($pohdoldfob = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdoldfob)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDOLDFOB, $pohdoldfob, $comparison);
    }

    /**
     * Filter the query on the AptbBuyrCode column
     *
     * Example usage:
     * <code>
     * $query->filterByAptbbuyrcode('fooValue');   // WHERE AptbBuyrCode = 'fooValue'
     * $query->filterByAptbbuyrcode('%fooValue%', Criteria::LIKE); // WHERE AptbBuyrCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aptbbuyrcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByAptbbuyrcode($aptbbuyrcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aptbbuyrcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_APTBBUYRCODE, $aptbbuyrcode, $comparison);
    }

    /**
     * Filter the query on the PohdColPpd column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdcolppd('fooValue');   // WHERE PohdColPpd = 'fooValue'
     * $query->filterByPohdcolppd('%fooValue%', Criteria::LIKE); // WHERE PohdColPpd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdcolppd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdcolppd($pohdcolppd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdcolppd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDCOLPPD, $pohdcolppd, $comparison);
    }

    /**
     * Filter the query on the PohdTeleIntl column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdteleintl('fooValue');   // WHERE PohdTeleIntl = 'fooValue'
     * $query->filterByPohdteleintl('%fooValue%', Criteria::LIKE); // WHERE PohdTeleIntl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdteleintl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdteleintl($pohdteleintl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdteleintl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTELEINTL, $pohdteleintl, $comparison);
    }

    /**
     * Filter the query on the PohdTeleNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtelenbr('fooValue');   // WHERE PohdTeleNbr = 'fooValue'
     * $query->filterByPohdtelenbr('%fooValue%', Criteria::LIKE); // WHERE PohdTeleNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtelenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtelenbr($pohdtelenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtelenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTELENBR, $pohdtelenbr, $comparison);
    }

    /**
     * Filter the query on the PohdTeleExt column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdteleext('fooValue');   // WHERE PohdTeleExt = 'fooValue'
     * $query->filterByPohdteleext('%fooValue%', Criteria::LIKE); // WHERE PohdTeleExt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdteleext The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdteleext($pohdteleext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdteleext)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTELEEXT, $pohdteleext, $comparison);
    }

    /**
     * Filter the query on the PohdFaxIntl column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfaxintl('fooValue');   // WHERE PohdFaxIntl = 'fooValue'
     * $query->filterByPohdfaxintl('%fooValue%', Criteria::LIKE); // WHERE PohdFaxIntl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdfaxintl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdfaxintl($pohdfaxintl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfaxintl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFAXINTL, $pohdfaxintl, $comparison);
    }

    /**
     * Filter the query on the PohdFaxNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfaxnbr('fooValue');   // WHERE PohdFaxNbr = 'fooValue'
     * $query->filterByPohdfaxnbr('%fooValue%', Criteria::LIKE); // WHERE PohdFaxNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdfaxnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdfaxnbr($pohdfaxnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfaxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFAXNBR, $pohdfaxnbr, $comparison);
    }

    /**
     * Filter the query on the PohdRCnt column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdrcnt('fooValue');   // WHERE PohdRCnt = 'fooValue'
     * $query->filterByPohdrcnt('%fooValue%', Criteria::LIKE); // WHERE PohdRCnt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdrcnt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdrcnt($pohdrcnt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdrcnt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRCNT, $pohdrcnt, $comparison);
    }

    /**
     * Filter the query on the PohdTaxExem column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtaxexem('fooValue');   // WHERE PohdTaxExem = 'fooValue'
     * $query->filterByPohdtaxexem('%fooValue%', Criteria::LIKE); // WHERE PohdTaxExem LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdtaxexem The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdtaxexem($pohdtaxexem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtaxexem)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTAXEXEM, $pohdtaxexem, $comparison);
    }

    /**
     * Filter the query on the PohdExchCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdexchctry('fooValue');   // WHERE PohdExchCtry = 'fooValue'
     * $query->filterByPohdexchctry('%fooValue%', Criteria::LIKE); // WHERE PohdExchCtry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdexchctry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdexchctry($pohdexchctry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdexchctry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXCHCTRY, $pohdexchctry, $comparison);
    }

    /**
     * Filter the query on the PohdExchRate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdexchrate(1234); // WHERE PohdExchRate = 1234
     * $query->filterByPohdexchrate(array(12, 34)); // WHERE PohdExchRate IN (12, 34)
     * $query->filterByPohdexchrate(array('min' => 12)); // WHERE PohdExchRate > 12
     * </code>
     *
     * @param     mixed $pohdexchrate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdexchrate($pohdexchrate = null, $comparison = null)
    {
        if (is_array($pohdexchrate)) {
            $useMinMax = false;
            if (isset($pohdexchrate['min'])) {
                $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXCHRATE, $pohdexchrate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pohdexchrate['max'])) {
                $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXCHRATE, $pohdexchrate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXCHRATE, $pohdexchrate, $comparison);
    }

    /**
     * Filter the query on the PohdExptDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdexptdate('fooValue');   // WHERE PohdExptDate = 'fooValue'
     * $query->filterByPohdexptdate('%fooValue%', Criteria::LIKE); // WHERE PohdExptDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdexptdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdexptdate($pohdexptdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdexptdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXPTDATE, $pohdexptdate, $comparison);
    }

    /**
     * Filter the query on the PohdCancDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdcancdate('fooValue');   // WHERE PohdCancDate = 'fooValue'
     * $query->filterByPohdcancdate('%fooValue%', Criteria::LIKE); // WHERE PohdCancDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdcancdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdcancdate($pohdcancdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdcancdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDCANCDATE, $pohdcancdate, $comparison);
    }

    /**
     * Filter the query on the PohdICnt column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdicnt('fooValue');   // WHERE PohdICnt = 'fooValue'
     * $query->filterByPohdicnt('%fooValue%', Criteria::LIKE); // WHERE PohdICnt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdicnt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdicnt($pohdicnt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdicnt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDICNT, $pohdicnt, $comparison);
    }

    /**
     * Filter the query on the PohdFob column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfob('fooValue');   // WHERE PohdFob = 'fooValue'
     * $query->filterByPohdfob('%fooValue%', Criteria::LIKE); // WHERE PohdFob LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdfob The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdfob($pohdfob = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfob)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFOB, $pohdfob, $comparison);
    }

    /**
     * Filter the query on the PohdPickQueue column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpickqueue('fooValue');   // WHERE PohdPickQueue = 'fooValue'
     * $query->filterByPohdpickqueue('%fooValue%', Criteria::LIKE); // WHERE PohdPickQueue LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdpickqueue The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdpickqueue($pohdpickqueue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpickqueue)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPICKQUEUE, $pohdpickqueue, $comparison);
    }

    /**
     * Filter the query on the PohdPackedBy column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpackedby('fooValue');   // WHERE PohdPackedBy = 'fooValue'
     * $query->filterByPohdpackedby('%fooValue%', Criteria::LIKE); // WHERE PohdPackedBy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdpackedby The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdpackedby($pohdpackedby = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpackedby)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPACKEDBY, $pohdpackedby, $comparison);
    }

    /**
     * Filter the query on the PohdPackDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpackdate('fooValue');   // WHERE PohdPackDate = 'fooValue'
     * $query->filterByPohdpackdate('%fooValue%', Criteria::LIKE); // WHERE PohdPackDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdpackdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdpackdate($pohdpackdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpackdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPACKDATE, $pohdpackdate, $comparison);
    }

    /**
     * Filter the query on the PohdPackTime column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpacktime('fooValue');   // WHERE PohdPackTime = 'fooValue'
     * $query->filterByPohdpacktime('%fooValue%', Criteria::LIKE); // WHERE PohdPackTime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdpacktime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdpacktime($pohdpacktime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpacktime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPACKTIME, $pohdpacktime, $comparison);
    }

    /**
     * Filter the query on the PohdLandCost column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdlandcost(1234); // WHERE PohdLandCost = 1234
     * $query->filterByPohdlandcost(array(12, 34)); // WHERE PohdLandCost IN (12, 34)
     * $query->filterByPohdlandcost(array('min' => 12)); // WHERE PohdLandCost > 12
     * </code>
     *
     * @param     mixed $pohdlandcost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdlandcost($pohdlandcost = null, $comparison = null)
    {
        if (is_array($pohdlandcost)) {
            $useMinMax = false;
            if (isset($pohdlandcost['min'])) {
                $this->addUsingAlias(EditPoHeadTableMap::COL_POHDLANDCOST, $pohdlandcost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pohdlandcost['max'])) {
                $this->addUsingAlias(EditPoHeadTableMap::COL_POHDLANDCOST, $pohdlandcost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDLANDCOST, $pohdlandcost, $comparison);
    }

    /**
     * Filter the query on the PohdEdiPoDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdedipodate('fooValue');   // WHERE PohdEdiPoDate = 'fooValue'
     * $query->filterByPohdedipodate('%fooValue%', Criteria::LIKE); // WHERE PohdEdiPoDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdedipodate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdedipodate($pohdedipodate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdedipodate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEDIPODATE, $pohdedipodate, $comparison);
    }

    /**
     * Filter the query on the PohdFutureBuy column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfuturebuy('fooValue');   // WHERE PohdFutureBuy = 'fooValue'
     * $query->filterByPohdfuturebuy('%fooValue%', Criteria::LIKE); // WHERE PohdFutureBuy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdfuturebuy The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdfuturebuy($pohdfuturebuy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfuturebuy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFUTUREBUY, $pohdfuturebuy, $comparison);
    }

    /**
     * Filter the query on the PohdEmailAddr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdemailaddr('fooValue');   // WHERE PohdEmailAddr = 'fooValue'
     * $query->filterByPohdemailaddr('%fooValue%', Criteria::LIKE); // WHERE PohdEmailAddr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdemailaddr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdemailaddr($pohdemailaddr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdemailaddr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEMAILADDR, $pohdemailaddr, $comparison);
    }

    /**
     * Filter the query on the PohdShipDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdshipdate('fooValue');   // WHERE PohdShipDate = 'fooValue'
     * $query->filterByPohdshipdate('%fooValue%', Criteria::LIKE); // WHERE PohdShipDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdshipdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdshipdate($pohdshipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdshipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDSHIPDATE, $pohdshipdate, $comparison);
    }

    /**
     * Filter the query on the PohdAckDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdackdate('fooValue');   // WHERE PohdAckDate = 'fooValue'
     * $query->filterByPohdackdate('%fooValue%', Criteria::LIKE); // WHERE PohdAckDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdackdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdackdate($pohdackdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdackdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDACKDATE, $pohdackdate, $comparison);
    }

    /**
     * Filter the query on the PohdReleaseNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdreleasenbr(1234); // WHERE PohdReleaseNbr = 1234
     * $query->filterByPohdreleasenbr(array(12, 34)); // WHERE PohdReleaseNbr IN (12, 34)
     * $query->filterByPohdreleasenbr(array('min' => 12)); // WHERE PohdReleaseNbr > 12
     * </code>
     *
     * @param     mixed $pohdreleasenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdreleasenbr($pohdreleasenbr = null, $comparison = null)
    {
        if (is_array($pohdreleasenbr)) {
            $useMinMax = false;
            if (isset($pohdreleasenbr['min'])) {
                $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRELEASENBR, $pohdreleasenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pohdreleasenbr['max'])) {
                $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRELEASENBR, $pohdreleasenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRELEASENBR, $pohdreleasenbr, $comparison);
    }

    /**
     * Filter the query on the PohdReturnsPo column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdreturnspo('fooValue');   // WHERE PohdReturnsPo = 'fooValue'
     * $query->filterByPohdreturnspo('%fooValue%', Criteria::LIKE); // WHERE PohdReturnsPo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdreturnspo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByPohdreturnspo($pohdreturnspo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdreturnspo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRETURNSPO, $pohdreturnspo, $comparison);
    }

    /**
     * Filter the query on the DateUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByDateupdtd('fooValue');   // WHERE DateUpdtd = 'fooValue'
     * $query->filterByDateupdtd('%fooValue%', Criteria::LIKE); // WHERE DateUpdtd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateupdtd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByDateupdtd($dateupdtd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateupdtd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_DATEUPDTD, $dateupdtd, $comparison);
    }

    /**
     * Filter the query on the TimeUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeupdtd('fooValue');   // WHERE TimeUpdtd = 'fooValue'
     * $query->filterByTimeupdtd('%fooValue%', Criteria::LIKE); // WHERE TimeUpdtd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timeupdtd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByTimeupdtd($timeupdtd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeupdtd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_TIMEUPDTD, $timeupdtd, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dummy The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoHeadTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEditPoHead $editPoHead Object to remove from the list of results
     *
     * @return $this|ChildEditPoHeadQuery The current query, for fluid interface
     */
    public function prune($editPoHead = null)
    {
        if ($editPoHead) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EditPoHeadTableMap::COL_SESSIONID), $editPoHead->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EditPoHeadTableMap::COL_POHDNBR), $editPoHead->getPohdnbr(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the edit_po_head table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EditPoHeadTableMap::clearInstancePool();
            EditPoHeadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EditPoHeadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EditPoHeadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EditPoHeadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EditPoHeadQuery
