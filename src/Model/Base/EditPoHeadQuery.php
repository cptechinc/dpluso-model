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
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `edit_po_head` table.
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
 * @method     ChildEditPoHead|null findOne(?ConnectionInterface $con = null) Return the first ChildEditPoHead matching the query
 * @method     ChildEditPoHead findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildEditPoHead matching the query, or a new ChildEditPoHead object populated from the query conditions when no match is found
 *
 * @method     ChildEditPoHead|null findOneBySessionid(string $sessionid) Return the first ChildEditPoHead filtered by the sessionid column
 * @method     ChildEditPoHead|null findOneByPohdnbr(string $PohdNbr) Return the first ChildEditPoHead filtered by the PohdNbr column
 * @method     ChildEditPoHead|null findOneByPohdstat(string $PohdStat) Return the first ChildEditPoHead filtered by the PohdStat column
 * @method     ChildEditPoHead|null findOneByPohdref(string $PohdRef) Return the first ChildEditPoHead filtered by the PohdRef column
 * @method     ChildEditPoHead|null findOneByApvevendid(string $ApveVendId) Return the first ChildEditPoHead filtered by the ApveVendId column
 * @method     ChildEditPoHead|null findOneByApfmshipid(string $ApfmShipId) Return the first ChildEditPoHead filtered by the ApfmShipId column
 * @method     ChildEditPoHead|null findOneByPohdtoname(string $PohdToName) Return the first ChildEditPoHead filtered by the PohdToName column
 * @method     ChildEditPoHead|null findOneByPohdtoadr1(string $PohdToAdr1) Return the first ChildEditPoHead filtered by the PohdToAdr1 column
 * @method     ChildEditPoHead|null findOneByPohdtoadr2(string $PohdToAdr2) Return the first ChildEditPoHead filtered by the PohdToAdr2 column
 * @method     ChildEditPoHead|null findOneByPohdtoadr3(string $PohdToAdr3) Return the first ChildEditPoHead filtered by the PohdToAdr3 column
 * @method     ChildEditPoHead|null findOneByPohdtoctry(string $PohdToCtry) Return the first ChildEditPoHead filtered by the PohdToCtry column
 * @method     ChildEditPoHead|null findOneByPohdtocity(string $PohdToCity) Return the first ChildEditPoHead filtered by the PohdToCity column
 * @method     ChildEditPoHead|null findOneByPohdtostat(string $PohdToStat) Return the first ChildEditPoHead filtered by the PohdToStat column
 * @method     ChildEditPoHead|null findOneByPohdtozipcode(string $PohdToZipCode) Return the first ChildEditPoHead filtered by the PohdToZipCode column
 * @method     ChildEditPoHead|null findOneByPohdptname(string $PohdPtName) Return the first ChildEditPoHead filtered by the PohdPtName column
 * @method     ChildEditPoHead|null findOneByPohdptadr1(string $PohdPtAdr1) Return the first ChildEditPoHead filtered by the PohdPtAdr1 column
 * @method     ChildEditPoHead|null findOneByPohdptadr2(string $PohdPtAdr2) Return the first ChildEditPoHead filtered by the PohdPtAdr2 column
 * @method     ChildEditPoHead|null findOneByPohdptadr3(string $PohdPtAdr3) Return the first ChildEditPoHead filtered by the PohdPtAdr3 column
 * @method     ChildEditPoHead|null findOneByPohdptctry(string $PohdPtCtry) Return the first ChildEditPoHead filtered by the PohdPtCtry column
 * @method     ChildEditPoHead|null findOneByPohdptcity(string $PohdPtCity) Return the first ChildEditPoHead filtered by the PohdPtCity column
 * @method     ChildEditPoHead|null findOneByPohdptstat(string $PohdPtStat) Return the first ChildEditPoHead filtered by the PohdPtStat column
 * @method     ChildEditPoHead|null findOneByPohdptzipcode(string $PohdPtZipCode) Return the first ChildEditPoHead filtered by the PohdPtZipCode column
 * @method     ChildEditPoHead|null findOneByPohdcont(string $PohdCont) Return the first ChildEditPoHead filtered by the PohdCont column
 * @method     ChildEditPoHead|null findOneByPohdordrdate(string $PohdOrdrDate) Return the first ChildEditPoHead filtered by the PohdOrdrDate column
 * @method     ChildEditPoHead|null findOneByAptmtermcode(string $AptmTermCode) Return the first ChildEditPoHead filtered by the AptmTermCode column
 * @method     ChildEditPoHead|null findOneByArtbsviacode(string $ArtbSviaCode) Return the first ChildEditPoHead filtered by the ArtbSviaCode column
 * @method     ChildEditPoHead|null findOneByPohdoldfob(string $PohdOldFob) Return the first ChildEditPoHead filtered by the PohdOldFob column
 * @method     ChildEditPoHead|null findOneByAptbbuyrcode(string $AptbBuyrCode) Return the first ChildEditPoHead filtered by the AptbBuyrCode column
 * @method     ChildEditPoHead|null findOneByPohdcolppd(string $PohdColPpd) Return the first ChildEditPoHead filtered by the PohdColPpd column
 * @method     ChildEditPoHead|null findOneByPohdteleintl(string $PohdTeleIntl) Return the first ChildEditPoHead filtered by the PohdTeleIntl column
 * @method     ChildEditPoHead|null findOneByPohdtelenbr(string $PohdTeleNbr) Return the first ChildEditPoHead filtered by the PohdTeleNbr column
 * @method     ChildEditPoHead|null findOneByPohdteleext(string $PohdTeleExt) Return the first ChildEditPoHead filtered by the PohdTeleExt column
 * @method     ChildEditPoHead|null findOneByPohdfaxintl(string $PohdFaxIntl) Return the first ChildEditPoHead filtered by the PohdFaxIntl column
 * @method     ChildEditPoHead|null findOneByPohdfaxnbr(string $PohdFaxNbr) Return the first ChildEditPoHead filtered by the PohdFaxNbr column
 * @method     ChildEditPoHead|null findOneByPohdrcnt(string $PohdRCnt) Return the first ChildEditPoHead filtered by the PohdRCnt column
 * @method     ChildEditPoHead|null findOneByPohdtaxexem(string $PohdTaxExem) Return the first ChildEditPoHead filtered by the PohdTaxExem column
 * @method     ChildEditPoHead|null findOneByPohdexchctry(string $PohdExchCtry) Return the first ChildEditPoHead filtered by the PohdExchCtry column
 * @method     ChildEditPoHead|null findOneByPohdexchrate(string $PohdExchRate) Return the first ChildEditPoHead filtered by the PohdExchRate column
 * @method     ChildEditPoHead|null findOneByPohdexptdate(string $PohdExptDate) Return the first ChildEditPoHead filtered by the PohdExptDate column
 * @method     ChildEditPoHead|null findOneByPohdcancdate(string $PohdCancDate) Return the first ChildEditPoHead filtered by the PohdCancDate column
 * @method     ChildEditPoHead|null findOneByPohdicnt(string $PohdICnt) Return the first ChildEditPoHead filtered by the PohdICnt column
 * @method     ChildEditPoHead|null findOneByPohdfob(string $PohdFob) Return the first ChildEditPoHead filtered by the PohdFob column
 * @method     ChildEditPoHead|null findOneByPohdpickqueue(string $PohdPickQueue) Return the first ChildEditPoHead filtered by the PohdPickQueue column
 * @method     ChildEditPoHead|null findOneByPohdpackedby(string $PohdPackedBy) Return the first ChildEditPoHead filtered by the PohdPackedBy column
 * @method     ChildEditPoHead|null findOneByPohdpackdate(string $PohdPackDate) Return the first ChildEditPoHead filtered by the PohdPackDate column
 * @method     ChildEditPoHead|null findOneByPohdpacktime(string $PohdPackTime) Return the first ChildEditPoHead filtered by the PohdPackTime column
 * @method     ChildEditPoHead|null findOneByPohdlandcost(string $PohdLandCost) Return the first ChildEditPoHead filtered by the PohdLandCost column
 * @method     ChildEditPoHead|null findOneByPohdedipodate(string $PohdEdiPoDate) Return the first ChildEditPoHead filtered by the PohdEdiPoDate column
 * @method     ChildEditPoHead|null findOneByPohdfuturebuy(string $PohdFutureBuy) Return the first ChildEditPoHead filtered by the PohdFutureBuy column
 * @method     ChildEditPoHead|null findOneByPohdemailaddr(string $PohdEmailAddr) Return the first ChildEditPoHead filtered by the PohdEmailAddr column
 * @method     ChildEditPoHead|null findOneByPohdshipdate(string $PohdShipDate) Return the first ChildEditPoHead filtered by the PohdShipDate column
 * @method     ChildEditPoHead|null findOneByPohdackdate(string $PohdAckDate) Return the first ChildEditPoHead filtered by the PohdAckDate column
 * @method     ChildEditPoHead|null findOneByPohdreleasenbr(int $PohdReleaseNbr) Return the first ChildEditPoHead filtered by the PohdReleaseNbr column
 * @method     ChildEditPoHead|null findOneByPohdreturnspo(string $PohdReturnsPo) Return the first ChildEditPoHead filtered by the PohdReturnsPo column
 * @method     ChildEditPoHead|null findOneByDateupdtd(string $DateUpdtd) Return the first ChildEditPoHead filtered by the DateUpdtd column
 * @method     ChildEditPoHead|null findOneByTimeupdtd(string $TimeUpdtd) Return the first ChildEditPoHead filtered by the TimeUpdtd column
 * @method     ChildEditPoHead|null findOneByStatus(string $status) Return the first ChildEditPoHead filtered by the status column
 * @method     ChildEditPoHead|null findOneByDummy(string $dummy) Return the first ChildEditPoHead filtered by the dummy column
 *
 * @method     ChildEditPoHead requirePk($key, ?ConnectionInterface $con = null) Return the ChildEditPoHead by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoHead requireOne(?ConnectionInterface $con = null) Return the first ChildEditPoHead matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
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
 * @method     ChildEditPoHead[]|Collection find(?ConnectionInterface $con = null) Return ChildEditPoHead objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildEditPoHead> find(?ConnectionInterface $con = null) Return ChildEditPoHead objects based on current ModelCriteria
 *
 * @method     ChildEditPoHead[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildEditPoHead objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findBySessionid(string|array<string> $sessionid) Return ChildEditPoHead objects filtered by the sessionid column
 * @method     ChildEditPoHead[]|Collection findByPohdnbr(string|array<string> $PohdNbr) Return ChildEditPoHead objects filtered by the PohdNbr column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdnbr(string|array<string> $PohdNbr) Return ChildEditPoHead objects filtered by the PohdNbr column
 * @method     ChildEditPoHead[]|Collection findByPohdstat(string|array<string> $PohdStat) Return ChildEditPoHead objects filtered by the PohdStat column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdstat(string|array<string> $PohdStat) Return ChildEditPoHead objects filtered by the PohdStat column
 * @method     ChildEditPoHead[]|Collection findByPohdref(string|array<string> $PohdRef) Return ChildEditPoHead objects filtered by the PohdRef column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdref(string|array<string> $PohdRef) Return ChildEditPoHead objects filtered by the PohdRef column
 * @method     ChildEditPoHead[]|Collection findByApvevendid(string|array<string> $ApveVendId) Return ChildEditPoHead objects filtered by the ApveVendId column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByApvevendid(string|array<string> $ApveVendId) Return ChildEditPoHead objects filtered by the ApveVendId column
 * @method     ChildEditPoHead[]|Collection findByApfmshipid(string|array<string> $ApfmShipId) Return ChildEditPoHead objects filtered by the ApfmShipId column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByApfmshipid(string|array<string> $ApfmShipId) Return ChildEditPoHead objects filtered by the ApfmShipId column
 * @method     ChildEditPoHead[]|Collection findByPohdtoname(string|array<string> $PohdToName) Return ChildEditPoHead objects filtered by the PohdToName column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtoname(string|array<string> $PohdToName) Return ChildEditPoHead objects filtered by the PohdToName column
 * @method     ChildEditPoHead[]|Collection findByPohdtoadr1(string|array<string> $PohdToAdr1) Return ChildEditPoHead objects filtered by the PohdToAdr1 column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtoadr1(string|array<string> $PohdToAdr1) Return ChildEditPoHead objects filtered by the PohdToAdr1 column
 * @method     ChildEditPoHead[]|Collection findByPohdtoadr2(string|array<string> $PohdToAdr2) Return ChildEditPoHead objects filtered by the PohdToAdr2 column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtoadr2(string|array<string> $PohdToAdr2) Return ChildEditPoHead objects filtered by the PohdToAdr2 column
 * @method     ChildEditPoHead[]|Collection findByPohdtoadr3(string|array<string> $PohdToAdr3) Return ChildEditPoHead objects filtered by the PohdToAdr3 column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtoadr3(string|array<string> $PohdToAdr3) Return ChildEditPoHead objects filtered by the PohdToAdr3 column
 * @method     ChildEditPoHead[]|Collection findByPohdtoctry(string|array<string> $PohdToCtry) Return ChildEditPoHead objects filtered by the PohdToCtry column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtoctry(string|array<string> $PohdToCtry) Return ChildEditPoHead objects filtered by the PohdToCtry column
 * @method     ChildEditPoHead[]|Collection findByPohdtocity(string|array<string> $PohdToCity) Return ChildEditPoHead objects filtered by the PohdToCity column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtocity(string|array<string> $PohdToCity) Return ChildEditPoHead objects filtered by the PohdToCity column
 * @method     ChildEditPoHead[]|Collection findByPohdtostat(string|array<string> $PohdToStat) Return ChildEditPoHead objects filtered by the PohdToStat column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtostat(string|array<string> $PohdToStat) Return ChildEditPoHead objects filtered by the PohdToStat column
 * @method     ChildEditPoHead[]|Collection findByPohdtozipcode(string|array<string> $PohdToZipCode) Return ChildEditPoHead objects filtered by the PohdToZipCode column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtozipcode(string|array<string> $PohdToZipCode) Return ChildEditPoHead objects filtered by the PohdToZipCode column
 * @method     ChildEditPoHead[]|Collection findByPohdptname(string|array<string> $PohdPtName) Return ChildEditPoHead objects filtered by the PohdPtName column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptname(string|array<string> $PohdPtName) Return ChildEditPoHead objects filtered by the PohdPtName column
 * @method     ChildEditPoHead[]|Collection findByPohdptadr1(string|array<string> $PohdPtAdr1) Return ChildEditPoHead objects filtered by the PohdPtAdr1 column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptadr1(string|array<string> $PohdPtAdr1) Return ChildEditPoHead objects filtered by the PohdPtAdr1 column
 * @method     ChildEditPoHead[]|Collection findByPohdptadr2(string|array<string> $PohdPtAdr2) Return ChildEditPoHead objects filtered by the PohdPtAdr2 column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptadr2(string|array<string> $PohdPtAdr2) Return ChildEditPoHead objects filtered by the PohdPtAdr2 column
 * @method     ChildEditPoHead[]|Collection findByPohdptadr3(string|array<string> $PohdPtAdr3) Return ChildEditPoHead objects filtered by the PohdPtAdr3 column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptadr3(string|array<string> $PohdPtAdr3) Return ChildEditPoHead objects filtered by the PohdPtAdr3 column
 * @method     ChildEditPoHead[]|Collection findByPohdptctry(string|array<string> $PohdPtCtry) Return ChildEditPoHead objects filtered by the PohdPtCtry column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptctry(string|array<string> $PohdPtCtry) Return ChildEditPoHead objects filtered by the PohdPtCtry column
 * @method     ChildEditPoHead[]|Collection findByPohdptcity(string|array<string> $PohdPtCity) Return ChildEditPoHead objects filtered by the PohdPtCity column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptcity(string|array<string> $PohdPtCity) Return ChildEditPoHead objects filtered by the PohdPtCity column
 * @method     ChildEditPoHead[]|Collection findByPohdptstat(string|array<string> $PohdPtStat) Return ChildEditPoHead objects filtered by the PohdPtStat column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptstat(string|array<string> $PohdPtStat) Return ChildEditPoHead objects filtered by the PohdPtStat column
 * @method     ChildEditPoHead[]|Collection findByPohdptzipcode(string|array<string> $PohdPtZipCode) Return ChildEditPoHead objects filtered by the PohdPtZipCode column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdptzipcode(string|array<string> $PohdPtZipCode) Return ChildEditPoHead objects filtered by the PohdPtZipCode column
 * @method     ChildEditPoHead[]|Collection findByPohdcont(string|array<string> $PohdCont) Return ChildEditPoHead objects filtered by the PohdCont column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdcont(string|array<string> $PohdCont) Return ChildEditPoHead objects filtered by the PohdCont column
 * @method     ChildEditPoHead[]|Collection findByPohdordrdate(string|array<string> $PohdOrdrDate) Return ChildEditPoHead objects filtered by the PohdOrdrDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdordrdate(string|array<string> $PohdOrdrDate) Return ChildEditPoHead objects filtered by the PohdOrdrDate column
 * @method     ChildEditPoHead[]|Collection findByAptmtermcode(string|array<string> $AptmTermCode) Return ChildEditPoHead objects filtered by the AptmTermCode column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByAptmtermcode(string|array<string> $AptmTermCode) Return ChildEditPoHead objects filtered by the AptmTermCode column
 * @method     ChildEditPoHead[]|Collection findByArtbsviacode(string|array<string> $ArtbSviaCode) Return ChildEditPoHead objects filtered by the ArtbSviaCode column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByArtbsviacode(string|array<string> $ArtbSviaCode) Return ChildEditPoHead objects filtered by the ArtbSviaCode column
 * @method     ChildEditPoHead[]|Collection findByPohdoldfob(string|array<string> $PohdOldFob) Return ChildEditPoHead objects filtered by the PohdOldFob column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdoldfob(string|array<string> $PohdOldFob) Return ChildEditPoHead objects filtered by the PohdOldFob column
 * @method     ChildEditPoHead[]|Collection findByAptbbuyrcode(string|array<string> $AptbBuyrCode) Return ChildEditPoHead objects filtered by the AptbBuyrCode column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByAptbbuyrcode(string|array<string> $AptbBuyrCode) Return ChildEditPoHead objects filtered by the AptbBuyrCode column
 * @method     ChildEditPoHead[]|Collection findByPohdcolppd(string|array<string> $PohdColPpd) Return ChildEditPoHead objects filtered by the PohdColPpd column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdcolppd(string|array<string> $PohdColPpd) Return ChildEditPoHead objects filtered by the PohdColPpd column
 * @method     ChildEditPoHead[]|Collection findByPohdteleintl(string|array<string> $PohdTeleIntl) Return ChildEditPoHead objects filtered by the PohdTeleIntl column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdteleintl(string|array<string> $PohdTeleIntl) Return ChildEditPoHead objects filtered by the PohdTeleIntl column
 * @method     ChildEditPoHead[]|Collection findByPohdtelenbr(string|array<string> $PohdTeleNbr) Return ChildEditPoHead objects filtered by the PohdTeleNbr column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtelenbr(string|array<string> $PohdTeleNbr) Return ChildEditPoHead objects filtered by the PohdTeleNbr column
 * @method     ChildEditPoHead[]|Collection findByPohdteleext(string|array<string> $PohdTeleExt) Return ChildEditPoHead objects filtered by the PohdTeleExt column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdteleext(string|array<string> $PohdTeleExt) Return ChildEditPoHead objects filtered by the PohdTeleExt column
 * @method     ChildEditPoHead[]|Collection findByPohdfaxintl(string|array<string> $PohdFaxIntl) Return ChildEditPoHead objects filtered by the PohdFaxIntl column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdfaxintl(string|array<string> $PohdFaxIntl) Return ChildEditPoHead objects filtered by the PohdFaxIntl column
 * @method     ChildEditPoHead[]|Collection findByPohdfaxnbr(string|array<string> $PohdFaxNbr) Return ChildEditPoHead objects filtered by the PohdFaxNbr column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdfaxnbr(string|array<string> $PohdFaxNbr) Return ChildEditPoHead objects filtered by the PohdFaxNbr column
 * @method     ChildEditPoHead[]|Collection findByPohdrcnt(string|array<string> $PohdRCnt) Return ChildEditPoHead objects filtered by the PohdRCnt column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdrcnt(string|array<string> $PohdRCnt) Return ChildEditPoHead objects filtered by the PohdRCnt column
 * @method     ChildEditPoHead[]|Collection findByPohdtaxexem(string|array<string> $PohdTaxExem) Return ChildEditPoHead objects filtered by the PohdTaxExem column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdtaxexem(string|array<string> $PohdTaxExem) Return ChildEditPoHead objects filtered by the PohdTaxExem column
 * @method     ChildEditPoHead[]|Collection findByPohdexchctry(string|array<string> $PohdExchCtry) Return ChildEditPoHead objects filtered by the PohdExchCtry column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdexchctry(string|array<string> $PohdExchCtry) Return ChildEditPoHead objects filtered by the PohdExchCtry column
 * @method     ChildEditPoHead[]|Collection findByPohdexchrate(string|array<string> $PohdExchRate) Return ChildEditPoHead objects filtered by the PohdExchRate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdexchrate(string|array<string> $PohdExchRate) Return ChildEditPoHead objects filtered by the PohdExchRate column
 * @method     ChildEditPoHead[]|Collection findByPohdexptdate(string|array<string> $PohdExptDate) Return ChildEditPoHead objects filtered by the PohdExptDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdexptdate(string|array<string> $PohdExptDate) Return ChildEditPoHead objects filtered by the PohdExptDate column
 * @method     ChildEditPoHead[]|Collection findByPohdcancdate(string|array<string> $PohdCancDate) Return ChildEditPoHead objects filtered by the PohdCancDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdcancdate(string|array<string> $PohdCancDate) Return ChildEditPoHead objects filtered by the PohdCancDate column
 * @method     ChildEditPoHead[]|Collection findByPohdicnt(string|array<string> $PohdICnt) Return ChildEditPoHead objects filtered by the PohdICnt column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdicnt(string|array<string> $PohdICnt) Return ChildEditPoHead objects filtered by the PohdICnt column
 * @method     ChildEditPoHead[]|Collection findByPohdfob(string|array<string> $PohdFob) Return ChildEditPoHead objects filtered by the PohdFob column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdfob(string|array<string> $PohdFob) Return ChildEditPoHead objects filtered by the PohdFob column
 * @method     ChildEditPoHead[]|Collection findByPohdpickqueue(string|array<string> $PohdPickQueue) Return ChildEditPoHead objects filtered by the PohdPickQueue column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdpickqueue(string|array<string> $PohdPickQueue) Return ChildEditPoHead objects filtered by the PohdPickQueue column
 * @method     ChildEditPoHead[]|Collection findByPohdpackedby(string|array<string> $PohdPackedBy) Return ChildEditPoHead objects filtered by the PohdPackedBy column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdpackedby(string|array<string> $PohdPackedBy) Return ChildEditPoHead objects filtered by the PohdPackedBy column
 * @method     ChildEditPoHead[]|Collection findByPohdpackdate(string|array<string> $PohdPackDate) Return ChildEditPoHead objects filtered by the PohdPackDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdpackdate(string|array<string> $PohdPackDate) Return ChildEditPoHead objects filtered by the PohdPackDate column
 * @method     ChildEditPoHead[]|Collection findByPohdpacktime(string|array<string> $PohdPackTime) Return ChildEditPoHead objects filtered by the PohdPackTime column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdpacktime(string|array<string> $PohdPackTime) Return ChildEditPoHead objects filtered by the PohdPackTime column
 * @method     ChildEditPoHead[]|Collection findByPohdlandcost(string|array<string> $PohdLandCost) Return ChildEditPoHead objects filtered by the PohdLandCost column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdlandcost(string|array<string> $PohdLandCost) Return ChildEditPoHead objects filtered by the PohdLandCost column
 * @method     ChildEditPoHead[]|Collection findByPohdedipodate(string|array<string> $PohdEdiPoDate) Return ChildEditPoHead objects filtered by the PohdEdiPoDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdedipodate(string|array<string> $PohdEdiPoDate) Return ChildEditPoHead objects filtered by the PohdEdiPoDate column
 * @method     ChildEditPoHead[]|Collection findByPohdfuturebuy(string|array<string> $PohdFutureBuy) Return ChildEditPoHead objects filtered by the PohdFutureBuy column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdfuturebuy(string|array<string> $PohdFutureBuy) Return ChildEditPoHead objects filtered by the PohdFutureBuy column
 * @method     ChildEditPoHead[]|Collection findByPohdemailaddr(string|array<string> $PohdEmailAddr) Return ChildEditPoHead objects filtered by the PohdEmailAddr column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdemailaddr(string|array<string> $PohdEmailAddr) Return ChildEditPoHead objects filtered by the PohdEmailAddr column
 * @method     ChildEditPoHead[]|Collection findByPohdshipdate(string|array<string> $PohdShipDate) Return ChildEditPoHead objects filtered by the PohdShipDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdshipdate(string|array<string> $PohdShipDate) Return ChildEditPoHead objects filtered by the PohdShipDate column
 * @method     ChildEditPoHead[]|Collection findByPohdackdate(string|array<string> $PohdAckDate) Return ChildEditPoHead objects filtered by the PohdAckDate column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdackdate(string|array<string> $PohdAckDate) Return ChildEditPoHead objects filtered by the PohdAckDate column
 * @method     ChildEditPoHead[]|Collection findByPohdreleasenbr(int|array<int> $PohdReleaseNbr) Return ChildEditPoHead objects filtered by the PohdReleaseNbr column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdreleasenbr(int|array<int> $PohdReleaseNbr) Return ChildEditPoHead objects filtered by the PohdReleaseNbr column
 * @method     ChildEditPoHead[]|Collection findByPohdreturnspo(string|array<string> $PohdReturnsPo) Return ChildEditPoHead objects filtered by the PohdReturnsPo column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByPohdreturnspo(string|array<string> $PohdReturnsPo) Return ChildEditPoHead objects filtered by the PohdReturnsPo column
 * @method     ChildEditPoHead[]|Collection findByDateupdtd(string|array<string> $DateUpdtd) Return ChildEditPoHead objects filtered by the DateUpdtd column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByDateupdtd(string|array<string> $DateUpdtd) Return ChildEditPoHead objects filtered by the DateUpdtd column
 * @method     ChildEditPoHead[]|Collection findByTimeupdtd(string|array<string> $TimeUpdtd) Return ChildEditPoHead objects filtered by the TimeUpdtd column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByTimeupdtd(string|array<string> $TimeUpdtd) Return ChildEditPoHead objects filtered by the TimeUpdtd column
 * @method     ChildEditPoHead[]|Collection findByStatus(string|array<string> $status) Return ChildEditPoHead objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByStatus(string|array<string> $status) Return ChildEditPoHead objects filtered by the status column
 * @method     ChildEditPoHead[]|Collection findByDummy(string|array<string> $dummy) Return ChildEditPoHead objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildEditPoHead> findByDummy(string|array<string> $dummy) Return ChildEditPoHead objects filtered by the dummy column
 *
 * @method     ChildEditPoHead[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildEditPoHead> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class EditPoHeadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EditPoHeadQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\EditPoHead', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEditPoHeadQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEditPoHeadQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
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
    public function findPk($key, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
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
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            $this->add(null, '1<>1', Criteria::CUSTOM);

            return $this;
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
     * $query->filterBySessionid(['foo', 'bar']); // WHERE sessionid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sessionid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_SESSIONID, $sessionid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdnbr('fooValue');   // WHERE PohdNbr = 'fooValue'
     * $query->filterByPohdnbr('%fooValue%', Criteria::LIKE); // WHERE PohdNbr LIKE '%fooValue%'
     * $query->filterByPohdnbr(['foo', 'bar']); // WHERE PohdNbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdnbr($pohdnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDNBR, $pohdnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdstat('fooValue');   // WHERE PohdStat = 'fooValue'
     * $query->filterByPohdstat('%fooValue%', Criteria::LIKE); // WHERE PohdStat LIKE '%fooValue%'
     * $query->filterByPohdstat(['foo', 'bar']); // WHERE PohdStat IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdstat The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdstat($pohdstat = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdstat)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDSTAT, $pohdstat, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdRef column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdref('fooValue');   // WHERE PohdRef = 'fooValue'
     * $query->filterByPohdref('%fooValue%', Criteria::LIKE); // WHERE PohdRef LIKE '%fooValue%'
     * $query->filterByPohdref(['foo', 'bar']); // WHERE PohdRef IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdref The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdref($pohdref = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdref)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDREF, $pohdref, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ApveVendId column
     *
     * Example usage:
     * <code>
     * $query->filterByApvevendid('fooValue');   // WHERE ApveVendId = 'fooValue'
     * $query->filterByApvevendid('%fooValue%', Criteria::LIKE); // WHERE ApveVendId LIKE '%fooValue%'
     * $query->filterByApvevendid(['foo', 'bar']); // WHERE ApveVendId IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $apvevendid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByApvevendid($apvevendid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apvevendid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_APVEVENDID, $apvevendid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ApfmShipId column
     *
     * Example usage:
     * <code>
     * $query->filterByApfmshipid('fooValue');   // WHERE ApfmShipId = 'fooValue'
     * $query->filterByApfmshipid('%fooValue%', Criteria::LIKE); // WHERE ApfmShipId LIKE '%fooValue%'
     * $query->filterByApfmshipid(['foo', 'bar']); // WHERE ApfmShipId IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $apfmshipid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByApfmshipid($apfmshipid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apfmshipid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_APFMSHIPID, $apfmshipid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToName column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoname('fooValue');   // WHERE PohdToName = 'fooValue'
     * $query->filterByPohdtoname('%fooValue%', Criteria::LIKE); // WHERE PohdToName LIKE '%fooValue%'
     * $query->filterByPohdtoname(['foo', 'bar']); // WHERE PohdToName IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtoname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtoname($pohdtoname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTONAME, $pohdtoname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToAdr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoadr1('fooValue');   // WHERE PohdToAdr1 = 'fooValue'
     * $query->filterByPohdtoadr1('%fooValue%', Criteria::LIKE); // WHERE PohdToAdr1 LIKE '%fooValue%'
     * $query->filterByPohdtoadr1(['foo', 'bar']); // WHERE PohdToAdr1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtoadr1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtoadr1($pohdtoadr1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoadr1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOADR1, $pohdtoadr1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToAdr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoadr2('fooValue');   // WHERE PohdToAdr2 = 'fooValue'
     * $query->filterByPohdtoadr2('%fooValue%', Criteria::LIKE); // WHERE PohdToAdr2 LIKE '%fooValue%'
     * $query->filterByPohdtoadr2(['foo', 'bar']); // WHERE PohdToAdr2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtoadr2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtoadr2($pohdtoadr2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoadr2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOADR2, $pohdtoadr2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToAdr3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoadr3('fooValue');   // WHERE PohdToAdr3 = 'fooValue'
     * $query->filterByPohdtoadr3('%fooValue%', Criteria::LIKE); // WHERE PohdToAdr3 LIKE '%fooValue%'
     * $query->filterByPohdtoadr3(['foo', 'bar']); // WHERE PohdToAdr3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtoadr3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtoadr3($pohdtoadr3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoadr3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOADR3, $pohdtoadr3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtoctry('fooValue');   // WHERE PohdToCtry = 'fooValue'
     * $query->filterByPohdtoctry('%fooValue%', Criteria::LIKE); // WHERE PohdToCtry LIKE '%fooValue%'
     * $query->filterByPohdtoctry(['foo', 'bar']); // WHERE PohdToCtry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtoctry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtoctry($pohdtoctry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtoctry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOCTRY, $pohdtoctry, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToCity column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtocity('fooValue');   // WHERE PohdToCity = 'fooValue'
     * $query->filterByPohdtocity('%fooValue%', Criteria::LIKE); // WHERE PohdToCity LIKE '%fooValue%'
     * $query->filterByPohdtocity(['foo', 'bar']); // WHERE PohdToCity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtocity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtocity($pohdtocity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtocity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOCITY, $pohdtocity, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtostat('fooValue');   // WHERE PohdToStat = 'fooValue'
     * $query->filterByPohdtostat('%fooValue%', Criteria::LIKE); // WHERE PohdToStat LIKE '%fooValue%'
     * $query->filterByPohdtostat(['foo', 'bar']); // WHERE PohdToStat IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtostat The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtostat($pohdtostat = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtostat)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOSTAT, $pohdtostat, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdToZipCode column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtozipcode('fooValue');   // WHERE PohdToZipCode = 'fooValue'
     * $query->filterByPohdtozipcode('%fooValue%', Criteria::LIKE); // WHERE PohdToZipCode LIKE '%fooValue%'
     * $query->filterByPohdtozipcode(['foo', 'bar']); // WHERE PohdToZipCode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtozipcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtozipcode($pohdtozipcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtozipcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTOZIPCODE, $pohdtozipcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtName column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptname('fooValue');   // WHERE PohdPtName = 'fooValue'
     * $query->filterByPohdptname('%fooValue%', Criteria::LIKE); // WHERE PohdPtName LIKE '%fooValue%'
     * $query->filterByPohdptname(['foo', 'bar']); // WHERE PohdPtName IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptname($pohdptname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTNAME, $pohdptname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtAdr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptadr1('fooValue');   // WHERE PohdPtAdr1 = 'fooValue'
     * $query->filterByPohdptadr1('%fooValue%', Criteria::LIKE); // WHERE PohdPtAdr1 LIKE '%fooValue%'
     * $query->filterByPohdptadr1(['foo', 'bar']); // WHERE PohdPtAdr1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptadr1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptadr1($pohdptadr1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptadr1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTADR1, $pohdptadr1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtAdr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptadr2('fooValue');   // WHERE PohdPtAdr2 = 'fooValue'
     * $query->filterByPohdptadr2('%fooValue%', Criteria::LIKE); // WHERE PohdPtAdr2 LIKE '%fooValue%'
     * $query->filterByPohdptadr2(['foo', 'bar']); // WHERE PohdPtAdr2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptadr2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptadr2($pohdptadr2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptadr2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTADR2, $pohdptadr2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtAdr3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptadr3('fooValue');   // WHERE PohdPtAdr3 = 'fooValue'
     * $query->filterByPohdptadr3('%fooValue%', Criteria::LIKE); // WHERE PohdPtAdr3 LIKE '%fooValue%'
     * $query->filterByPohdptadr3(['foo', 'bar']); // WHERE PohdPtAdr3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptadr3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptadr3($pohdptadr3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptadr3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTADR3, $pohdptadr3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptctry('fooValue');   // WHERE PohdPtCtry = 'fooValue'
     * $query->filterByPohdptctry('%fooValue%', Criteria::LIKE); // WHERE PohdPtCtry LIKE '%fooValue%'
     * $query->filterByPohdptctry(['foo', 'bar']); // WHERE PohdPtCtry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptctry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptctry($pohdptctry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptctry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTCTRY, $pohdptctry, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtCity column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptcity('fooValue');   // WHERE PohdPtCity = 'fooValue'
     * $query->filterByPohdptcity('%fooValue%', Criteria::LIKE); // WHERE PohdPtCity LIKE '%fooValue%'
     * $query->filterByPohdptcity(['foo', 'bar']); // WHERE PohdPtCity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptcity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptcity($pohdptcity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptcity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTCITY, $pohdptcity, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptstat('fooValue');   // WHERE PohdPtStat = 'fooValue'
     * $query->filterByPohdptstat('%fooValue%', Criteria::LIKE); // WHERE PohdPtStat LIKE '%fooValue%'
     * $query->filterByPohdptstat(['foo', 'bar']); // WHERE PohdPtStat IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptstat The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptstat($pohdptstat = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptstat)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTSTAT, $pohdptstat, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPtZipCode column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdptzipcode('fooValue');   // WHERE PohdPtZipCode = 'fooValue'
     * $query->filterByPohdptzipcode('%fooValue%', Criteria::LIKE); // WHERE PohdPtZipCode LIKE '%fooValue%'
     * $query->filterByPohdptzipcode(['foo', 'bar']); // WHERE PohdPtZipCode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdptzipcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdptzipcode($pohdptzipcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdptzipcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPTZIPCODE, $pohdptzipcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdCont column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdcont('fooValue');   // WHERE PohdCont = 'fooValue'
     * $query->filterByPohdcont('%fooValue%', Criteria::LIKE); // WHERE PohdCont LIKE '%fooValue%'
     * $query->filterByPohdcont(['foo', 'bar']); // WHERE PohdCont IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdcont The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdcont($pohdcont = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdcont)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDCONT, $pohdcont, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdOrdrDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdordrdate('fooValue');   // WHERE PohdOrdrDate = 'fooValue'
     * $query->filterByPohdordrdate('%fooValue%', Criteria::LIKE); // WHERE PohdOrdrDate LIKE '%fooValue%'
     * $query->filterByPohdordrdate(['foo', 'bar']); // WHERE PohdOrdrDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdordrdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdordrdate($pohdordrdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdordrdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDORDRDATE, $pohdordrdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the AptmTermCode column
     *
     * Example usage:
     * <code>
     * $query->filterByAptmtermcode('fooValue');   // WHERE AptmTermCode = 'fooValue'
     * $query->filterByAptmtermcode('%fooValue%', Criteria::LIKE); // WHERE AptmTermCode LIKE '%fooValue%'
     * $query->filterByAptmtermcode(['foo', 'bar']); // WHERE AptmTermCode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $aptmtermcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAptmtermcode($aptmtermcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aptmtermcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_APTMTERMCODE, $aptmtermcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ArtbSviaCode column
     *
     * Example usage:
     * <code>
     * $query->filterByArtbsviacode('fooValue');   // WHERE ArtbSviaCode = 'fooValue'
     * $query->filterByArtbsviacode('%fooValue%', Criteria::LIKE); // WHERE ArtbSviaCode LIKE '%fooValue%'
     * $query->filterByArtbsviacode(['foo', 'bar']); // WHERE ArtbSviaCode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $artbsviacode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByArtbsviacode($artbsviacode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artbsviacode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_ARTBSVIACODE, $artbsviacode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdOldFob column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdoldfob('fooValue');   // WHERE PohdOldFob = 'fooValue'
     * $query->filterByPohdoldfob('%fooValue%', Criteria::LIKE); // WHERE PohdOldFob LIKE '%fooValue%'
     * $query->filterByPohdoldfob(['foo', 'bar']); // WHERE PohdOldFob IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdoldfob The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdoldfob($pohdoldfob = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdoldfob)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDOLDFOB, $pohdoldfob, $comparison);

        return $this;
    }

    /**
     * Filter the query on the AptbBuyrCode column
     *
     * Example usage:
     * <code>
     * $query->filterByAptbbuyrcode('fooValue');   // WHERE AptbBuyrCode = 'fooValue'
     * $query->filterByAptbbuyrcode('%fooValue%', Criteria::LIKE); // WHERE AptbBuyrCode LIKE '%fooValue%'
     * $query->filterByAptbbuyrcode(['foo', 'bar']); // WHERE AptbBuyrCode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $aptbbuyrcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAptbbuyrcode($aptbbuyrcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aptbbuyrcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_APTBBUYRCODE, $aptbbuyrcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdColPpd column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdcolppd('fooValue');   // WHERE PohdColPpd = 'fooValue'
     * $query->filterByPohdcolppd('%fooValue%', Criteria::LIKE); // WHERE PohdColPpd LIKE '%fooValue%'
     * $query->filterByPohdcolppd(['foo', 'bar']); // WHERE PohdColPpd IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdcolppd The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdcolppd($pohdcolppd = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdcolppd)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDCOLPPD, $pohdcolppd, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdTeleIntl column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdteleintl('fooValue');   // WHERE PohdTeleIntl = 'fooValue'
     * $query->filterByPohdteleintl('%fooValue%', Criteria::LIKE); // WHERE PohdTeleIntl LIKE '%fooValue%'
     * $query->filterByPohdteleintl(['foo', 'bar']); // WHERE PohdTeleIntl IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdteleintl The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdteleintl($pohdteleintl = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdteleintl)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTELEINTL, $pohdteleintl, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdTeleNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtelenbr('fooValue');   // WHERE PohdTeleNbr = 'fooValue'
     * $query->filterByPohdtelenbr('%fooValue%', Criteria::LIKE); // WHERE PohdTeleNbr LIKE '%fooValue%'
     * $query->filterByPohdtelenbr(['foo', 'bar']); // WHERE PohdTeleNbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtelenbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtelenbr($pohdtelenbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtelenbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTELENBR, $pohdtelenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdTeleExt column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdteleext('fooValue');   // WHERE PohdTeleExt = 'fooValue'
     * $query->filterByPohdteleext('%fooValue%', Criteria::LIKE); // WHERE PohdTeleExt LIKE '%fooValue%'
     * $query->filterByPohdteleext(['foo', 'bar']); // WHERE PohdTeleExt IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdteleext The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdteleext($pohdteleext = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdteleext)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTELEEXT, $pohdteleext, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdFaxIntl column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfaxintl('fooValue');   // WHERE PohdFaxIntl = 'fooValue'
     * $query->filterByPohdfaxintl('%fooValue%', Criteria::LIKE); // WHERE PohdFaxIntl LIKE '%fooValue%'
     * $query->filterByPohdfaxintl(['foo', 'bar']); // WHERE PohdFaxIntl IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdfaxintl The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdfaxintl($pohdfaxintl = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfaxintl)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFAXINTL, $pohdfaxintl, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdFaxNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfaxnbr('fooValue');   // WHERE PohdFaxNbr = 'fooValue'
     * $query->filterByPohdfaxnbr('%fooValue%', Criteria::LIKE); // WHERE PohdFaxNbr LIKE '%fooValue%'
     * $query->filterByPohdfaxnbr(['foo', 'bar']); // WHERE PohdFaxNbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdfaxnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdfaxnbr($pohdfaxnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfaxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFAXNBR, $pohdfaxnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdRCnt column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdrcnt('fooValue');   // WHERE PohdRCnt = 'fooValue'
     * $query->filterByPohdrcnt('%fooValue%', Criteria::LIKE); // WHERE PohdRCnt LIKE '%fooValue%'
     * $query->filterByPohdrcnt(['foo', 'bar']); // WHERE PohdRCnt IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdrcnt The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdrcnt($pohdrcnt = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdrcnt)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRCNT, $pohdrcnt, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdTaxExem column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdtaxexem('fooValue');   // WHERE PohdTaxExem = 'fooValue'
     * $query->filterByPohdtaxexem('%fooValue%', Criteria::LIKE); // WHERE PohdTaxExem LIKE '%fooValue%'
     * $query->filterByPohdtaxexem(['foo', 'bar']); // WHERE PohdTaxExem IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdtaxexem The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdtaxexem($pohdtaxexem = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdtaxexem)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDTAXEXEM, $pohdtaxexem, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdExchCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdexchctry('fooValue');   // WHERE PohdExchCtry = 'fooValue'
     * $query->filterByPohdexchctry('%fooValue%', Criteria::LIKE); // WHERE PohdExchCtry LIKE '%fooValue%'
     * $query->filterByPohdexchctry(['foo', 'bar']); // WHERE PohdExchCtry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdexchctry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdexchctry($pohdexchctry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdexchctry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXCHCTRY, $pohdexchctry, $comparison);

        return $this;
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
     * @param mixed $pohdexchrate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdexchrate($pohdexchrate = null, ?string $comparison = null)
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

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXCHRATE, $pohdexchrate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdExptDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdexptdate('fooValue');   // WHERE PohdExptDate = 'fooValue'
     * $query->filterByPohdexptdate('%fooValue%', Criteria::LIKE); // WHERE PohdExptDate LIKE '%fooValue%'
     * $query->filterByPohdexptdate(['foo', 'bar']); // WHERE PohdExptDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdexptdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdexptdate($pohdexptdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdexptdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEXPTDATE, $pohdexptdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdCancDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdcancdate('fooValue');   // WHERE PohdCancDate = 'fooValue'
     * $query->filterByPohdcancdate('%fooValue%', Criteria::LIKE); // WHERE PohdCancDate LIKE '%fooValue%'
     * $query->filterByPohdcancdate(['foo', 'bar']); // WHERE PohdCancDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdcancdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdcancdate($pohdcancdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdcancdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDCANCDATE, $pohdcancdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdICnt column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdicnt('fooValue');   // WHERE PohdICnt = 'fooValue'
     * $query->filterByPohdicnt('%fooValue%', Criteria::LIKE); // WHERE PohdICnt LIKE '%fooValue%'
     * $query->filterByPohdicnt(['foo', 'bar']); // WHERE PohdICnt IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdicnt The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdicnt($pohdicnt = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdicnt)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDICNT, $pohdicnt, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdFob column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfob('fooValue');   // WHERE PohdFob = 'fooValue'
     * $query->filterByPohdfob('%fooValue%', Criteria::LIKE); // WHERE PohdFob LIKE '%fooValue%'
     * $query->filterByPohdfob(['foo', 'bar']); // WHERE PohdFob IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdfob The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdfob($pohdfob = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfob)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFOB, $pohdfob, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPickQueue column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpickqueue('fooValue');   // WHERE PohdPickQueue = 'fooValue'
     * $query->filterByPohdpickqueue('%fooValue%', Criteria::LIKE); // WHERE PohdPickQueue LIKE '%fooValue%'
     * $query->filterByPohdpickqueue(['foo', 'bar']); // WHERE PohdPickQueue IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdpickqueue The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdpickqueue($pohdpickqueue = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpickqueue)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPICKQUEUE, $pohdpickqueue, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPackedBy column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpackedby('fooValue');   // WHERE PohdPackedBy = 'fooValue'
     * $query->filterByPohdpackedby('%fooValue%', Criteria::LIKE); // WHERE PohdPackedBy LIKE '%fooValue%'
     * $query->filterByPohdpackedby(['foo', 'bar']); // WHERE PohdPackedBy IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdpackedby The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdpackedby($pohdpackedby = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpackedby)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPACKEDBY, $pohdpackedby, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPackDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpackdate('fooValue');   // WHERE PohdPackDate = 'fooValue'
     * $query->filterByPohdpackdate('%fooValue%', Criteria::LIKE); // WHERE PohdPackDate LIKE '%fooValue%'
     * $query->filterByPohdpackdate(['foo', 'bar']); // WHERE PohdPackDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdpackdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdpackdate($pohdpackdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpackdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPACKDATE, $pohdpackdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdPackTime column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdpacktime('fooValue');   // WHERE PohdPackTime = 'fooValue'
     * $query->filterByPohdpacktime('%fooValue%', Criteria::LIKE); // WHERE PohdPackTime LIKE '%fooValue%'
     * $query->filterByPohdpacktime(['foo', 'bar']); // WHERE PohdPackTime IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdpacktime The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdpacktime($pohdpacktime = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdpacktime)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDPACKTIME, $pohdpacktime, $comparison);

        return $this;
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
     * @param mixed $pohdlandcost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdlandcost($pohdlandcost = null, ?string $comparison = null)
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

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDLANDCOST, $pohdlandcost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdEdiPoDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdedipodate('fooValue');   // WHERE PohdEdiPoDate = 'fooValue'
     * $query->filterByPohdedipodate('%fooValue%', Criteria::LIKE); // WHERE PohdEdiPoDate LIKE '%fooValue%'
     * $query->filterByPohdedipodate(['foo', 'bar']); // WHERE PohdEdiPoDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdedipodate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdedipodate($pohdedipodate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdedipodate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEDIPODATE, $pohdedipodate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdFutureBuy column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdfuturebuy('fooValue');   // WHERE PohdFutureBuy = 'fooValue'
     * $query->filterByPohdfuturebuy('%fooValue%', Criteria::LIKE); // WHERE PohdFutureBuy LIKE '%fooValue%'
     * $query->filterByPohdfuturebuy(['foo', 'bar']); // WHERE PohdFutureBuy IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdfuturebuy The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdfuturebuy($pohdfuturebuy = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdfuturebuy)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDFUTUREBUY, $pohdfuturebuy, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdEmailAddr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdemailaddr('fooValue');   // WHERE PohdEmailAddr = 'fooValue'
     * $query->filterByPohdemailaddr('%fooValue%', Criteria::LIKE); // WHERE PohdEmailAddr LIKE '%fooValue%'
     * $query->filterByPohdemailaddr(['foo', 'bar']); // WHERE PohdEmailAddr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdemailaddr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdemailaddr($pohdemailaddr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdemailaddr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDEMAILADDR, $pohdemailaddr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdShipDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdshipdate('fooValue');   // WHERE PohdShipDate = 'fooValue'
     * $query->filterByPohdshipdate('%fooValue%', Criteria::LIKE); // WHERE PohdShipDate LIKE '%fooValue%'
     * $query->filterByPohdshipdate(['foo', 'bar']); // WHERE PohdShipDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdshipdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdshipdate($pohdshipdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdshipdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDSHIPDATE, $pohdshipdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdAckDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdackdate('fooValue');   // WHERE PohdAckDate = 'fooValue'
     * $query->filterByPohdackdate('%fooValue%', Criteria::LIKE); // WHERE PohdAckDate LIKE '%fooValue%'
     * $query->filterByPohdackdate(['foo', 'bar']); // WHERE PohdAckDate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdackdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdackdate($pohdackdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdackdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDACKDATE, $pohdackdate, $comparison);

        return $this;
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
     * @param mixed $pohdreleasenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdreleasenbr($pohdreleasenbr = null, ?string $comparison = null)
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

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRELEASENBR, $pohdreleasenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the PohdReturnsPo column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdreturnspo('fooValue');   // WHERE PohdReturnsPo = 'fooValue'
     * $query->filterByPohdreturnspo('%fooValue%', Criteria::LIKE); // WHERE PohdReturnsPo LIKE '%fooValue%'
     * $query->filterByPohdreturnspo(['foo', 'bar']); // WHERE PohdReturnsPo IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pohdreturnspo The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPohdreturnspo($pohdreturnspo = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdreturnspo)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_POHDRETURNSPO, $pohdreturnspo, $comparison);

        return $this;
    }

    /**
     * Filter the query on the DateUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByDateupdtd('fooValue');   // WHERE DateUpdtd = 'fooValue'
     * $query->filterByDateupdtd('%fooValue%', Criteria::LIKE); // WHERE DateUpdtd LIKE '%fooValue%'
     * $query->filterByDateupdtd(['foo', 'bar']); // WHERE DateUpdtd IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $dateupdtd The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDateupdtd($dateupdtd = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateupdtd)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_DATEUPDTD, $dateupdtd, $comparison);

        return $this;
    }

    /**
     * Filter the query on the TimeUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeupdtd('fooValue');   // WHERE TimeUpdtd = 'fooValue'
     * $query->filterByTimeupdtd('%fooValue%', Criteria::LIKE); // WHERE TimeUpdtd LIKE '%fooValue%'
     * $query->filterByTimeupdtd(['foo', 'bar']); // WHERE TimeUpdtd IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $timeupdtd The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTimeupdtd($timeupdtd = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeupdtd)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_TIMEUPDTD, $timeupdtd, $comparison);

        return $this;
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * $query->filterByStatus(['foo', 'bar']); // WHERE status IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $status The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStatus($status = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_STATUS, $status, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * $query->filterByDummy(['foo', 'bar']); // WHERE dummy IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $dummy The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(EditPoHeadTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildEditPoHead $editPoHead Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
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
    public function doDeleteAll(?ConnectionInterface $con = null): int
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
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
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

}
