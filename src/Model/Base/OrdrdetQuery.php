<?php

namespace Base;

use \Ordrdet as ChildOrdrdet;
use \OrdrdetQuery as ChildOrdrdetQuery;
use \Exception;
use \PDO;
use Map\OrdrdetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ordrdet' table.
 *
 *
 *
 * @method     ChildOrdrdetQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildOrdrdetQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildOrdrdetQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrdrdetQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOrdrdetQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOrdrdetQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildOrdrdetQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildOrdrdetQuery orderBySublinenbr($order = Criteria::ASC) Order by the sublinenbr column
 * @method     ChildOrdrdetQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildOrdrdetQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildOrdrdetQuery orderByCustitemid($order = Criteria::ASC) Order by the custitemid column
 * @method     ChildOrdrdetQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildOrdrdetQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildOrdrdetQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOrdrdetQuery orderByTotalprice($order = Criteria::ASC) Order by the totalprice column
 * @method     ChildOrdrdetQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildOrdrdetQuery orderByQtyshipped($order = Criteria::ASC) Order by the qtyshipped column
 * @method     ChildOrdrdetQuery orderByQtybackord($order = Criteria::ASC) Order by the qtybackord column
 * @method     ChildOrdrdetQuery orderByRshipdate($order = Criteria::ASC) Order by the rshipdate column
 * @method     ChildOrdrdetQuery orderByHasdocuments($order = Criteria::ASC) Order by the hasdocuments column
 * @method     ChildOrdrdetQuery orderByQtyavail($order = Criteria::ASC) Order by the qtyavail column
 * @method     ChildOrdrdetQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildOrdrdetQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildOrdrdetQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildOrdrdetQuery orderByUom($order = Criteria::ASC) Order by the uom column
 * @method     ChildOrdrdetQuery orderBySpcord($order = Criteria::ASC) Order by the spcord column
 * @method     ChildOrdrdetQuery orderByKititemflag($order = Criteria::ASC) Order by the kititemflag column
 * @method     ChildOrdrdetQuery orderByPromocode($order = Criteria::ASC) Order by the promocode column
 * @method     ChildOrdrdetQuery orderByTaxcode($order = Criteria::ASC) Order by the taxcode column
 * @method     ChildOrdrdetQuery orderByTaxcodeperc($order = Criteria::ASC) Order by the taxcodeperc column
 * @method     ChildOrdrdetQuery orderByDiscpct($order = Criteria::ASC) Order by the discpct column
 * @method     ChildOrdrdetQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildOrdrdetQuery orderByUomconv($order = Criteria::ASC) Order by the uomconv column
 * @method     ChildOrdrdetQuery orderByVendorid($order = Criteria::ASC) Order by the vendorid column
 * @method     ChildOrdrdetQuery orderByVendoritemid($order = Criteria::ASC) Order by the vendoritemid column
 * @method     ChildOrdrdetQuery orderByMfgid($order = Criteria::ASC) Order by the mfgid column
 * @method     ChildOrdrdetQuery orderByMfgitemid($order = Criteria::ASC) Order by the mfgitemid column
 * @method     ChildOrdrdetQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOrdrdetQuery orderByLostreason($order = Criteria::ASC) Order by the lostreason column
 * @method     ChildOrdrdetQuery orderByLostdate($order = Criteria::ASC) Order by the lostdate column
 * @method     ChildOrdrdetQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildOrdrdetQuery orderByLeaddays($order = Criteria::ASC) Order by the leaddays column
 * @method     ChildOrdrdetQuery orderByOrdrtotalcost($order = Criteria::ASC) Order by the ordrtotalcost column
 * @method     ChildOrdrdetQuery orderByCostuom($order = Criteria::ASC) Order by the costuom column
 * @method     ChildOrdrdetQuery orderByStancost($order = Criteria::ASC) Order by the stancost column
 * @method     ChildOrdrdetQuery orderByQuotind($order = Criteria::ASC) Order by the quotind column
 * @method     ChildOrdrdetQuery orderByQuotqty($order = Criteria::ASC) Order by the quotqty column
 * @method     ChildOrdrdetQuery orderByQuotprice($order = Criteria::ASC) Order by the quotprice column
 * @method     ChildOrdrdetQuery orderByQuotcost($order = Criteria::ASC) Order by the quotcost column
 * @method     ChildOrdrdetQuery orderByQuotmkupmarg($order = Criteria::ASC) Order by the quotmkupmarg column
 * @method     ChildOrdrdetQuery orderByQuotdiscpct($order = Criteria::ASC) Order by the quotdiscpct column
 * @method     ChildOrdrdetQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildOrdrdetQuery orderByMinprice($order = Criteria::ASC) Order by the minprice column
 * @method     ChildOrdrdetQuery orderByPonbr($order = Criteria::ASC) Order by the ponbr column
 * @method     ChildOrdrdetQuery orderByPoref($order = Criteria::ASC) Order by the poref column
 * @method     ChildOrdrdetQuery orderByNsitemgroup($order = Criteria::ASC) Order by the nsitemgroup column
 * @method     ChildOrdrdetQuery orderByShipfromid($order = Criteria::ASC) Order by the shipfromid column
 * @method     ChildOrdrdetQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildOrdrdetQuery orderByCanbackorder($order = Criteria::ASC) Order by the canbackorder column
 * @method     ChildOrdrdetQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildOrdrdetQuery groupBySessionid() Group by the sessionid column
 * @method     ChildOrdrdetQuery groupByRecno() Group by the recno column
 * @method     ChildOrdrdetQuery groupByDate() Group by the date column
 * @method     ChildOrdrdetQuery groupByTime() Group by the time column
 * @method     ChildOrdrdetQuery groupByType() Group by the type column
 * @method     ChildOrdrdetQuery groupByOrderno() Group by the orderno column
 * @method     ChildOrdrdetQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildOrdrdetQuery groupBySublinenbr() Group by the sublinenbr column
 * @method     ChildOrdrdetQuery groupByItemid() Group by the itemid column
 * @method     ChildOrdrdetQuery groupByCustid() Group by the custid column
 * @method     ChildOrdrdetQuery groupByCustitemid() Group by the custitemid column
 * @method     ChildOrdrdetQuery groupByDesc1() Group by the desc1 column
 * @method     ChildOrdrdetQuery groupByDesc2() Group by the desc2 column
 * @method     ChildOrdrdetQuery groupByPrice() Group by the price column
 * @method     ChildOrdrdetQuery groupByTotalprice() Group by the totalprice column
 * @method     ChildOrdrdetQuery groupByQty() Group by the qty column
 * @method     ChildOrdrdetQuery groupByQtyshipped() Group by the qtyshipped column
 * @method     ChildOrdrdetQuery groupByQtybackord() Group by the qtybackord column
 * @method     ChildOrdrdetQuery groupByRshipdate() Group by the rshipdate column
 * @method     ChildOrdrdetQuery groupByHasdocuments() Group by the hasdocuments column
 * @method     ChildOrdrdetQuery groupByQtyavail() Group by the qtyavail column
 * @method     ChildOrdrdetQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildOrdrdetQuery groupByCost() Group by the cost column
 * @method     ChildOrdrdetQuery groupByWhse() Group by the whse column
 * @method     ChildOrdrdetQuery groupByUom() Group by the uom column
 * @method     ChildOrdrdetQuery groupBySpcord() Group by the spcord column
 * @method     ChildOrdrdetQuery groupByKititemflag() Group by the kititemflag column
 * @method     ChildOrdrdetQuery groupByPromocode() Group by the promocode column
 * @method     ChildOrdrdetQuery groupByTaxcode() Group by the taxcode column
 * @method     ChildOrdrdetQuery groupByTaxcodeperc() Group by the taxcodeperc column
 * @method     ChildOrdrdetQuery groupByDiscpct() Group by the discpct column
 * @method     ChildOrdrdetQuery groupByListprice() Group by the listprice column
 * @method     ChildOrdrdetQuery groupByUomconv() Group by the uomconv column
 * @method     ChildOrdrdetQuery groupByVendorid() Group by the vendorid column
 * @method     ChildOrdrdetQuery groupByVendoritemid() Group by the vendoritemid column
 * @method     ChildOrdrdetQuery groupByMfgid() Group by the mfgid column
 * @method     ChildOrdrdetQuery groupByMfgitemid() Group by the mfgitemid column
 * @method     ChildOrdrdetQuery groupByStatus() Group by the status column
 * @method     ChildOrdrdetQuery groupByLostreason() Group by the lostreason column
 * @method     ChildOrdrdetQuery groupByLostdate() Group by the lostdate column
 * @method     ChildOrdrdetQuery groupByNotes() Group by the notes column
 * @method     ChildOrdrdetQuery groupByLeaddays() Group by the leaddays column
 * @method     ChildOrdrdetQuery groupByOrdrtotalcost() Group by the ordrtotalcost column
 * @method     ChildOrdrdetQuery groupByCostuom() Group by the costuom column
 * @method     ChildOrdrdetQuery groupByStancost() Group by the stancost column
 * @method     ChildOrdrdetQuery groupByQuotind() Group by the quotind column
 * @method     ChildOrdrdetQuery groupByQuotqty() Group by the quotqty column
 * @method     ChildOrdrdetQuery groupByQuotprice() Group by the quotprice column
 * @method     ChildOrdrdetQuery groupByQuotcost() Group by the quotcost column
 * @method     ChildOrdrdetQuery groupByQuotmkupmarg() Group by the quotmkupmarg column
 * @method     ChildOrdrdetQuery groupByQuotdiscpct() Group by the quotdiscpct column
 * @method     ChildOrdrdetQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildOrdrdetQuery groupByMinprice() Group by the minprice column
 * @method     ChildOrdrdetQuery groupByPonbr() Group by the ponbr column
 * @method     ChildOrdrdetQuery groupByPoref() Group by the poref column
 * @method     ChildOrdrdetQuery groupByNsitemgroup() Group by the nsitemgroup column
 * @method     ChildOrdrdetQuery groupByShipfromid() Group by the shipfromid column
 * @method     ChildOrdrdetQuery groupByItemtype() Group by the itemtype column
 * @method     ChildOrdrdetQuery groupByCanbackorder() Group by the canbackorder column
 * @method     ChildOrdrdetQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildOrdrdetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdrdetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdrdetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdrdetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdrdetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdrdetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrdrdet findOne(ConnectionInterface $con = null) Return the first ChildOrdrdet matching the query
 * @method     ChildOrdrdet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrdrdet matching the query, or a new ChildOrdrdet object populated from the query conditions when no match is found
 *
 * @method     ChildOrdrdet findOneBySessionid(string $sessionid) Return the first ChildOrdrdet filtered by the sessionid column
 * @method     ChildOrdrdet findOneByRecno(int $recno) Return the first ChildOrdrdet filtered by the recno column
 * @method     ChildOrdrdet findOneByDate(int $date) Return the first ChildOrdrdet filtered by the date column
 * @method     ChildOrdrdet findOneByTime(int $time) Return the first ChildOrdrdet filtered by the time column
 * @method     ChildOrdrdet findOneByType(string $type) Return the first ChildOrdrdet filtered by the type column
 * @method     ChildOrdrdet findOneByOrderno(string $orderno) Return the first ChildOrdrdet filtered by the orderno column
 * @method     ChildOrdrdet findOneByLinenbr(string $linenbr) Return the first ChildOrdrdet filtered by the linenbr column
 * @method     ChildOrdrdet findOneBySublinenbr(string $sublinenbr) Return the first ChildOrdrdet filtered by the sublinenbr column
 * @method     ChildOrdrdet findOneByItemid(string $itemid) Return the first ChildOrdrdet filtered by the itemid column
 * @method     ChildOrdrdet findOneByCustid(string $custid) Return the first ChildOrdrdet filtered by the custid column
 * @method     ChildOrdrdet findOneByCustitemid(string $custitemid) Return the first ChildOrdrdet filtered by the custitemid column
 * @method     ChildOrdrdet findOneByDesc1(string $desc1) Return the first ChildOrdrdet filtered by the desc1 column
 * @method     ChildOrdrdet findOneByDesc2(string $desc2) Return the first ChildOrdrdet filtered by the desc2 column
 * @method     ChildOrdrdet findOneByPrice(string $price) Return the first ChildOrdrdet filtered by the price column
 * @method     ChildOrdrdet findOneByTotalprice(string $totalprice) Return the first ChildOrdrdet filtered by the totalprice column
 * @method     ChildOrdrdet findOneByQty(string $qty) Return the first ChildOrdrdet filtered by the qty column
 * @method     ChildOrdrdet findOneByQtyshipped(string $qtyshipped) Return the first ChildOrdrdet filtered by the qtyshipped column
 * @method     ChildOrdrdet findOneByQtybackord(string $qtybackord) Return the first ChildOrdrdet filtered by the qtybackord column
 * @method     ChildOrdrdet findOneByRshipdate(string $rshipdate) Return the first ChildOrdrdet filtered by the rshipdate column
 * @method     ChildOrdrdet findOneByHasdocuments(string $hasdocuments) Return the first ChildOrdrdet filtered by the hasdocuments column
 * @method     ChildOrdrdet findOneByQtyavail(string $qtyavail) Return the first ChildOrdrdet filtered by the qtyavail column
 * @method     ChildOrdrdet findOneByHasnotes(string $hasnotes) Return the first ChildOrdrdet filtered by the hasnotes column
 * @method     ChildOrdrdet findOneByCost(string $cost) Return the first ChildOrdrdet filtered by the cost column
 * @method     ChildOrdrdet findOneByWhse(string $whse) Return the first ChildOrdrdet filtered by the whse column
 * @method     ChildOrdrdet findOneByUom(string $uom) Return the first ChildOrdrdet filtered by the uom column
 * @method     ChildOrdrdet findOneBySpcord(string $spcord) Return the first ChildOrdrdet filtered by the spcord column
 * @method     ChildOrdrdet findOneByKititemflag(string $kititemflag) Return the first ChildOrdrdet filtered by the kititemflag column
 * @method     ChildOrdrdet findOneByPromocode(string $promocode) Return the first ChildOrdrdet filtered by the promocode column
 * @method     ChildOrdrdet findOneByTaxcode(string $taxcode) Return the first ChildOrdrdet filtered by the taxcode column
 * @method     ChildOrdrdet findOneByTaxcodeperc(string $taxcodeperc) Return the first ChildOrdrdet filtered by the taxcodeperc column
 * @method     ChildOrdrdet findOneByDiscpct(string $discpct) Return the first ChildOrdrdet filtered by the discpct column
 * @method     ChildOrdrdet findOneByListprice(string $listprice) Return the first ChildOrdrdet filtered by the listprice column
 * @method     ChildOrdrdet findOneByUomconv(string $uomconv) Return the first ChildOrdrdet filtered by the uomconv column
 * @method     ChildOrdrdet findOneByVendorid(string $vendorid) Return the first ChildOrdrdet filtered by the vendorid column
 * @method     ChildOrdrdet findOneByVendoritemid(string $vendoritemid) Return the first ChildOrdrdet filtered by the vendoritemid column
 * @method     ChildOrdrdet findOneByMfgid(string $mfgid) Return the first ChildOrdrdet filtered by the mfgid column
 * @method     ChildOrdrdet findOneByMfgitemid(string $mfgitemid) Return the first ChildOrdrdet filtered by the mfgitemid column
 * @method     ChildOrdrdet findOneByStatus(string $status) Return the first ChildOrdrdet filtered by the status column
 * @method     ChildOrdrdet findOneByLostreason(string $lostreason) Return the first ChildOrdrdet filtered by the lostreason column
 * @method     ChildOrdrdet findOneByLostdate(string $lostdate) Return the first ChildOrdrdet filtered by the lostdate column
 * @method     ChildOrdrdet findOneByNotes(string $notes) Return the first ChildOrdrdet filtered by the notes column
 * @method     ChildOrdrdet findOneByLeaddays(int $leaddays) Return the first ChildOrdrdet filtered by the leaddays column
 * @method     ChildOrdrdet findOneByOrdrtotalcost(string $ordrtotalcost) Return the first ChildOrdrdet filtered by the ordrtotalcost column
 * @method     ChildOrdrdet findOneByCostuom(string $costuom) Return the first ChildOrdrdet filtered by the costuom column
 * @method     ChildOrdrdet findOneByStancost(string $stancost) Return the first ChildOrdrdet filtered by the stancost column
 * @method     ChildOrdrdet findOneByQuotind(string $quotind) Return the first ChildOrdrdet filtered by the quotind column
 * @method     ChildOrdrdet findOneByQuotqty(int $quotqty) Return the first ChildOrdrdet filtered by the quotqty column
 * @method     ChildOrdrdet findOneByQuotprice(string $quotprice) Return the first ChildOrdrdet filtered by the quotprice column
 * @method     ChildOrdrdet findOneByQuotcost(string $quotcost) Return the first ChildOrdrdet filtered by the quotcost column
 * @method     ChildOrdrdet findOneByQuotmkupmarg(string $quotmkupmarg) Return the first ChildOrdrdet filtered by the quotmkupmarg column
 * @method     ChildOrdrdet findOneByQuotdiscpct(string $quotdiscpct) Return the first ChildOrdrdet filtered by the quotdiscpct column
 * @method     ChildOrdrdet findOneByErrormsg(string $errormsg) Return the first ChildOrdrdet filtered by the errormsg column
 * @method     ChildOrdrdet findOneByMinprice(string $minprice) Return the first ChildOrdrdet filtered by the minprice column
 * @method     ChildOrdrdet findOneByPonbr(string $ponbr) Return the first ChildOrdrdet filtered by the ponbr column
 * @method     ChildOrdrdet findOneByPoref(string $poref) Return the first ChildOrdrdet filtered by the poref column
 * @method     ChildOrdrdet findOneByNsitemgroup(string $nsitemgroup) Return the first ChildOrdrdet filtered by the nsitemgroup column
 * @method     ChildOrdrdet findOneByShipfromid(string $shipfromid) Return the first ChildOrdrdet filtered by the shipfromid column
 * @method     ChildOrdrdet findOneByItemtype(string $itemtype) Return the first ChildOrdrdet filtered by the itemtype column
 * @method     ChildOrdrdet findOneByCanbackorder(string $canbackorder) Return the first ChildOrdrdet filtered by the canbackorder column
 * @method     ChildOrdrdet findOneByDummy(string $dummy) Return the first ChildOrdrdet filtered by the dummy column *

 * @method     ChildOrdrdet requirePk($key, ConnectionInterface $con = null) Return the ChildOrdrdet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOne(ConnectionInterface $con = null) Return the first ChildOrdrdet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrdet requireOneBySessionid(string $sessionid) Return the first ChildOrdrdet filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByRecno(int $recno) Return the first ChildOrdrdet filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByDate(int $date) Return the first ChildOrdrdet filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByTime(int $time) Return the first ChildOrdrdet filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByType(string $type) Return the first ChildOrdrdet filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByOrderno(string $orderno) Return the first ChildOrdrdet filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByLinenbr(string $linenbr) Return the first ChildOrdrdet filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneBySublinenbr(string $sublinenbr) Return the first ChildOrdrdet filtered by the sublinenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByItemid(string $itemid) Return the first ChildOrdrdet filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByCustid(string $custid) Return the first ChildOrdrdet filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByCustitemid(string $custitemid) Return the first ChildOrdrdet filtered by the custitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByDesc1(string $desc1) Return the first ChildOrdrdet filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByDesc2(string $desc2) Return the first ChildOrdrdet filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByPrice(string $price) Return the first ChildOrdrdet filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByTotalprice(string $totalprice) Return the first ChildOrdrdet filtered by the totalprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQty(string $qty) Return the first ChildOrdrdet filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQtyshipped(string $qtyshipped) Return the first ChildOrdrdet filtered by the qtyshipped column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQtybackord(string $qtybackord) Return the first ChildOrdrdet filtered by the qtybackord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByRshipdate(string $rshipdate) Return the first ChildOrdrdet filtered by the rshipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByHasdocuments(string $hasdocuments) Return the first ChildOrdrdet filtered by the hasdocuments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQtyavail(string $qtyavail) Return the first ChildOrdrdet filtered by the qtyavail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByHasnotes(string $hasnotes) Return the first ChildOrdrdet filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByCost(string $cost) Return the first ChildOrdrdet filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByWhse(string $whse) Return the first ChildOrdrdet filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByUom(string $uom) Return the first ChildOrdrdet filtered by the uom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneBySpcord(string $spcord) Return the first ChildOrdrdet filtered by the spcord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByKititemflag(string $kititemflag) Return the first ChildOrdrdet filtered by the kititemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByPromocode(string $promocode) Return the first ChildOrdrdet filtered by the promocode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByTaxcode(string $taxcode) Return the first ChildOrdrdet filtered by the taxcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByTaxcodeperc(string $taxcodeperc) Return the first ChildOrdrdet filtered by the taxcodeperc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByDiscpct(string $discpct) Return the first ChildOrdrdet filtered by the discpct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByListprice(string $listprice) Return the first ChildOrdrdet filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByUomconv(string $uomconv) Return the first ChildOrdrdet filtered by the uomconv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByVendorid(string $vendorid) Return the first ChildOrdrdet filtered by the vendorid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByVendoritemid(string $vendoritemid) Return the first ChildOrdrdet filtered by the vendoritemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByMfgid(string $mfgid) Return the first ChildOrdrdet filtered by the mfgid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByMfgitemid(string $mfgitemid) Return the first ChildOrdrdet filtered by the mfgitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByStatus(string $status) Return the first ChildOrdrdet filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByLostreason(string $lostreason) Return the first ChildOrdrdet filtered by the lostreason column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByLostdate(string $lostdate) Return the first ChildOrdrdet filtered by the lostdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByNotes(string $notes) Return the first ChildOrdrdet filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByLeaddays(int $leaddays) Return the first ChildOrdrdet filtered by the leaddays column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByOrdrtotalcost(string $ordrtotalcost) Return the first ChildOrdrdet filtered by the ordrtotalcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByCostuom(string $costuom) Return the first ChildOrdrdet filtered by the costuom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByStancost(string $stancost) Return the first ChildOrdrdet filtered by the stancost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQuotind(string $quotind) Return the first ChildOrdrdet filtered by the quotind column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQuotqty(int $quotqty) Return the first ChildOrdrdet filtered by the quotqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQuotprice(string $quotprice) Return the first ChildOrdrdet filtered by the quotprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQuotcost(string $quotcost) Return the first ChildOrdrdet filtered by the quotcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQuotmkupmarg(string $quotmkupmarg) Return the first ChildOrdrdet filtered by the quotmkupmarg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByQuotdiscpct(string $quotdiscpct) Return the first ChildOrdrdet filtered by the quotdiscpct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByErrormsg(string $errormsg) Return the first ChildOrdrdet filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByMinprice(string $minprice) Return the first ChildOrdrdet filtered by the minprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByPonbr(string $ponbr) Return the first ChildOrdrdet filtered by the ponbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByPoref(string $poref) Return the first ChildOrdrdet filtered by the poref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByNsitemgroup(string $nsitemgroup) Return the first ChildOrdrdet filtered by the nsitemgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByShipfromid(string $shipfromid) Return the first ChildOrdrdet filtered by the shipfromid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByItemtype(string $itemtype) Return the first ChildOrdrdet filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByCanbackorder(string $canbackorder) Return the first ChildOrdrdet filtered by the canbackorder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrdet requireOneByDummy(string $dummy) Return the first ChildOrdrdet filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrdet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrdrdet objects based on current ModelCriteria
 * @method     ChildOrdrdet[]|ObjectCollection findBySessionid(string $sessionid) Return ChildOrdrdet objects filtered by the sessionid column
 * @method     ChildOrdrdet[]|ObjectCollection findByRecno(int $recno) Return ChildOrdrdet objects filtered by the recno column
 * @method     ChildOrdrdet[]|ObjectCollection findByDate(int $date) Return ChildOrdrdet objects filtered by the date column
 * @method     ChildOrdrdet[]|ObjectCollection findByTime(int $time) Return ChildOrdrdet objects filtered by the time column
 * @method     ChildOrdrdet[]|ObjectCollection findByType(string $type) Return ChildOrdrdet objects filtered by the type column
 * @method     ChildOrdrdet[]|ObjectCollection findByOrderno(string $orderno) Return ChildOrdrdet objects filtered by the orderno column
 * @method     ChildOrdrdet[]|ObjectCollection findByLinenbr(string $linenbr) Return ChildOrdrdet objects filtered by the linenbr column
 * @method     ChildOrdrdet[]|ObjectCollection findBySublinenbr(string $sublinenbr) Return ChildOrdrdet objects filtered by the sublinenbr column
 * @method     ChildOrdrdet[]|ObjectCollection findByItemid(string $itemid) Return ChildOrdrdet objects filtered by the itemid column
 * @method     ChildOrdrdet[]|ObjectCollection findByCustid(string $custid) Return ChildOrdrdet objects filtered by the custid column
 * @method     ChildOrdrdet[]|ObjectCollection findByCustitemid(string $custitemid) Return ChildOrdrdet objects filtered by the custitemid column
 * @method     ChildOrdrdet[]|ObjectCollection findByDesc1(string $desc1) Return ChildOrdrdet objects filtered by the desc1 column
 * @method     ChildOrdrdet[]|ObjectCollection findByDesc2(string $desc2) Return ChildOrdrdet objects filtered by the desc2 column
 * @method     ChildOrdrdet[]|ObjectCollection findByPrice(string $price) Return ChildOrdrdet objects filtered by the price column
 * @method     ChildOrdrdet[]|ObjectCollection findByTotalprice(string $totalprice) Return ChildOrdrdet objects filtered by the totalprice column
 * @method     ChildOrdrdet[]|ObjectCollection findByQty(string $qty) Return ChildOrdrdet objects filtered by the qty column
 * @method     ChildOrdrdet[]|ObjectCollection findByQtyshipped(string $qtyshipped) Return ChildOrdrdet objects filtered by the qtyshipped column
 * @method     ChildOrdrdet[]|ObjectCollection findByQtybackord(string $qtybackord) Return ChildOrdrdet objects filtered by the qtybackord column
 * @method     ChildOrdrdet[]|ObjectCollection findByRshipdate(string $rshipdate) Return ChildOrdrdet objects filtered by the rshipdate column
 * @method     ChildOrdrdet[]|ObjectCollection findByHasdocuments(string $hasdocuments) Return ChildOrdrdet objects filtered by the hasdocuments column
 * @method     ChildOrdrdet[]|ObjectCollection findByQtyavail(string $qtyavail) Return ChildOrdrdet objects filtered by the qtyavail column
 * @method     ChildOrdrdet[]|ObjectCollection findByHasnotes(string $hasnotes) Return ChildOrdrdet objects filtered by the hasnotes column
 * @method     ChildOrdrdet[]|ObjectCollection findByCost(string $cost) Return ChildOrdrdet objects filtered by the cost column
 * @method     ChildOrdrdet[]|ObjectCollection findByWhse(string $whse) Return ChildOrdrdet objects filtered by the whse column
 * @method     ChildOrdrdet[]|ObjectCollection findByUom(string $uom) Return ChildOrdrdet objects filtered by the uom column
 * @method     ChildOrdrdet[]|ObjectCollection findBySpcord(string $spcord) Return ChildOrdrdet objects filtered by the spcord column
 * @method     ChildOrdrdet[]|ObjectCollection findByKititemflag(string $kititemflag) Return ChildOrdrdet objects filtered by the kititemflag column
 * @method     ChildOrdrdet[]|ObjectCollection findByPromocode(string $promocode) Return ChildOrdrdet objects filtered by the promocode column
 * @method     ChildOrdrdet[]|ObjectCollection findByTaxcode(string $taxcode) Return ChildOrdrdet objects filtered by the taxcode column
 * @method     ChildOrdrdet[]|ObjectCollection findByTaxcodeperc(string $taxcodeperc) Return ChildOrdrdet objects filtered by the taxcodeperc column
 * @method     ChildOrdrdet[]|ObjectCollection findByDiscpct(string $discpct) Return ChildOrdrdet objects filtered by the discpct column
 * @method     ChildOrdrdet[]|ObjectCollection findByListprice(string $listprice) Return ChildOrdrdet objects filtered by the listprice column
 * @method     ChildOrdrdet[]|ObjectCollection findByUomconv(string $uomconv) Return ChildOrdrdet objects filtered by the uomconv column
 * @method     ChildOrdrdet[]|ObjectCollection findByVendorid(string $vendorid) Return ChildOrdrdet objects filtered by the vendorid column
 * @method     ChildOrdrdet[]|ObjectCollection findByVendoritemid(string $vendoritemid) Return ChildOrdrdet objects filtered by the vendoritemid column
 * @method     ChildOrdrdet[]|ObjectCollection findByMfgid(string $mfgid) Return ChildOrdrdet objects filtered by the mfgid column
 * @method     ChildOrdrdet[]|ObjectCollection findByMfgitemid(string $mfgitemid) Return ChildOrdrdet objects filtered by the mfgitemid column
 * @method     ChildOrdrdet[]|ObjectCollection findByStatus(string $status) Return ChildOrdrdet objects filtered by the status column
 * @method     ChildOrdrdet[]|ObjectCollection findByLostreason(string $lostreason) Return ChildOrdrdet objects filtered by the lostreason column
 * @method     ChildOrdrdet[]|ObjectCollection findByLostdate(string $lostdate) Return ChildOrdrdet objects filtered by the lostdate column
 * @method     ChildOrdrdet[]|ObjectCollection findByNotes(string $notes) Return ChildOrdrdet objects filtered by the notes column
 * @method     ChildOrdrdet[]|ObjectCollection findByLeaddays(int $leaddays) Return ChildOrdrdet objects filtered by the leaddays column
 * @method     ChildOrdrdet[]|ObjectCollection findByOrdrtotalcost(string $ordrtotalcost) Return ChildOrdrdet objects filtered by the ordrtotalcost column
 * @method     ChildOrdrdet[]|ObjectCollection findByCostuom(string $costuom) Return ChildOrdrdet objects filtered by the costuom column
 * @method     ChildOrdrdet[]|ObjectCollection findByStancost(string $stancost) Return ChildOrdrdet objects filtered by the stancost column
 * @method     ChildOrdrdet[]|ObjectCollection findByQuotind(string $quotind) Return ChildOrdrdet objects filtered by the quotind column
 * @method     ChildOrdrdet[]|ObjectCollection findByQuotqty(int $quotqty) Return ChildOrdrdet objects filtered by the quotqty column
 * @method     ChildOrdrdet[]|ObjectCollection findByQuotprice(string $quotprice) Return ChildOrdrdet objects filtered by the quotprice column
 * @method     ChildOrdrdet[]|ObjectCollection findByQuotcost(string $quotcost) Return ChildOrdrdet objects filtered by the quotcost column
 * @method     ChildOrdrdet[]|ObjectCollection findByQuotmkupmarg(string $quotmkupmarg) Return ChildOrdrdet objects filtered by the quotmkupmarg column
 * @method     ChildOrdrdet[]|ObjectCollection findByQuotdiscpct(string $quotdiscpct) Return ChildOrdrdet objects filtered by the quotdiscpct column
 * @method     ChildOrdrdet[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildOrdrdet objects filtered by the errormsg column
 * @method     ChildOrdrdet[]|ObjectCollection findByMinprice(string $minprice) Return ChildOrdrdet objects filtered by the minprice column
 * @method     ChildOrdrdet[]|ObjectCollection findByPonbr(string $ponbr) Return ChildOrdrdet objects filtered by the ponbr column
 * @method     ChildOrdrdet[]|ObjectCollection findByPoref(string $poref) Return ChildOrdrdet objects filtered by the poref column
 * @method     ChildOrdrdet[]|ObjectCollection findByNsitemgroup(string $nsitemgroup) Return ChildOrdrdet objects filtered by the nsitemgroup column
 * @method     ChildOrdrdet[]|ObjectCollection findByShipfromid(string $shipfromid) Return ChildOrdrdet objects filtered by the shipfromid column
 * @method     ChildOrdrdet[]|ObjectCollection findByItemtype(string $itemtype) Return ChildOrdrdet objects filtered by the itemtype column
 * @method     ChildOrdrdet[]|ObjectCollection findByCanbackorder(string $canbackorder) Return ChildOrdrdet objects filtered by the canbackorder column
 * @method     ChildOrdrdet[]|ObjectCollection findByDummy(string $dummy) Return ChildOrdrdet objects filtered by the dummy column
 * @method     ChildOrdrdet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdrdetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdrdetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Ordrdet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdrdetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdrdetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrdrdetQuery) {
            return $criteria;
        }
        $query = new ChildOrdrdetQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$sessionid, $recno, $orderno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOrdrdet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdrdetTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildOrdrdet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, type, orderno, linenbr, sublinenbr, itemid, custid, custitemid, desc1, desc2, price, totalprice, qty, qtyshipped, qtybackord, rshipdate, hasdocuments, qtyavail, hasnotes, cost, whse, uom, spcord, kititemflag, promocode, taxcode, taxcodeperc, discpct, listprice, uomconv, vendorid, vendoritemid, mfgid, mfgitemid, status, lostreason, lostdate, notes, leaddays, ordrtotalcost, costuom, stancost, quotind, quotqty, quotprice, quotcost, quotmkupmarg, quotdiscpct, errormsg, minprice, ponbr, poref, nsitemgroup, shipfromid, itemtype, canbackorder, dummy FROM ordrdet WHERE sessionid = :p0 AND recno = :p1 AND orderno = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOrdrdet $obj */
            $obj = new ChildOrdrdet();
            $obj->hydrate($row);
            OrdrdetTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildOrdrdet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OrdrdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OrdrdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(OrdrdetTableMap::COL_ORDERNO, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OrdrdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OrdrdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(OrdrdetTableMap::COL_ORDERNO, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
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
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the recno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecno(1234); // WHERE recno = 1234
     * $query->filterByRecno(array(12, 34)); // WHERE recno IN (12, 34)
     * $query->filterByRecno(array('min' => 12)); // WHERE recno > 12
     * </code>
     *
     * @param     mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_RECNO, $recno, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno('fooValue');   // WHERE orderno = 'fooValue'
     * $query->filterByOrderno('%fooValue%', Criteria::LIKE); // WHERE orderno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_ORDERNO, $orderno, $comparison);
    }

    /**
     * Filter the query on the linenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLinenbr('fooValue');   // WHERE linenbr = 'fooValue'
     * $query->filterByLinenbr('%fooValue%', Criteria::LIKE); // WHERE linenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $linenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($linenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_LINENBR, $linenbr, $comparison);
    }

    /**
     * Filter the query on the sublinenbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySublinenbr('fooValue');   // WHERE sublinenbr = 'fooValue'
     * $query->filterBySublinenbr('%fooValue%', Criteria::LIKE); // WHERE sublinenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sublinenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterBySublinenbr($sublinenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sublinenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_SUBLINENBR, $sublinenbr, $comparison);
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the custitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustitemid('fooValue');   // WHERE custitemid = 'fooValue'
     * $query->filterByCustitemid('%fooValue%', Criteria::LIKE); // WHERE custitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByCustitemid($custitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_CUSTITEMID, $custitemid, $comparison);
    }

    /**
     * Filter the query on the desc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc1('fooValue');   // WHERE desc1 = 'fooValue'
     * $query->filterByDesc1('%fooValue%', Criteria::LIKE); // WHERE desc1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_DESC1, $desc1, $comparison);
    }

    /**
     * Filter the query on the desc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc2('fooValue');   // WHERE desc2 = 'fooValue'
     * $query->filterByDesc2('%fooValue%', Criteria::LIKE); // WHERE desc2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_DESC2, $desc2, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice('fooValue');   // WHERE price = 'fooValue'
     * $query->filterByPrice('%fooValue%', Criteria::LIKE); // WHERE price LIKE '%fooValue%'
     * </code>
     *
     * @param     string $price The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($price)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the totalprice column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalprice('fooValue');   // WHERE totalprice = 'fooValue'
     * $query->filterByTotalprice('%fooValue%', Criteria::LIKE); // WHERE totalprice LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totalprice The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByTotalprice($totalprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_TOTALPRICE, $totalprice, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty('fooValue');   // WHERE qty = 'fooValue'
     * $query->filterByQty('%fooValue%', Criteria::LIKE); // WHERE qty LIKE '%fooValue%'
     * </code>
     *
     * @param     string $qty The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qty)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the qtyshipped column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyshipped('fooValue');   // WHERE qtyshipped = 'fooValue'
     * $query->filterByQtyshipped('%fooValue%', Criteria::LIKE); // WHERE qtyshipped LIKE '%fooValue%'
     * </code>
     *
     * @param     string $qtyshipped The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQtyshipped($qtyshipped = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtyshipped)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QTYSHIPPED, $qtyshipped, $comparison);
    }

    /**
     * Filter the query on the qtybackord column
     *
     * Example usage:
     * <code>
     * $query->filterByQtybackord('fooValue');   // WHERE qtybackord = 'fooValue'
     * $query->filterByQtybackord('%fooValue%', Criteria::LIKE); // WHERE qtybackord LIKE '%fooValue%'
     * </code>
     *
     * @param     string $qtybackord The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQtybackord($qtybackord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtybackord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QTYBACKORD, $qtybackord, $comparison);
    }

    /**
     * Filter the query on the rshipdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRshipdate('fooValue');   // WHERE rshipdate = 'fooValue'
     * $query->filterByRshipdate('%fooValue%', Criteria::LIKE); // WHERE rshipdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rshipdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByRshipdate($rshipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rshipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_RSHIPDATE, $rshipdate, $comparison);
    }

    /**
     * Filter the query on the hasdocuments column
     *
     * Example usage:
     * <code>
     * $query->filterByHasdocuments('fooValue');   // WHERE hasdocuments = 'fooValue'
     * $query->filterByHasdocuments('%fooValue%', Criteria::LIKE); // WHERE hasdocuments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasdocuments The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByHasdocuments($hasdocuments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasdocuments)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);
    }

    /**
     * Filter the query on the qtyavail column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyavail('fooValue');   // WHERE qtyavail = 'fooValue'
     * $query->filterByQtyavail('%fooValue%', Criteria::LIKE); // WHERE qtyavail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $qtyavail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQtyavail($qtyavail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtyavail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QTYAVAIL, $qtyavail, $comparison);
    }

    /**
     * Filter the query on the hasnotes column
     *
     * Example usage:
     * <code>
     * $query->filterByHasnotes('fooValue');   // WHERE hasnotes = 'fooValue'
     * $query->filterByHasnotes('%fooValue%', Criteria::LIKE); // WHERE hasnotes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasnotes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_HASNOTES, $hasnotes, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost('fooValue');   // WHERE cost = 'fooValue'
     * $query->filterByCost('%fooValue%', Criteria::LIKE); // WHERE cost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_WHSE, $whse, $comparison);
    }

    /**
     * Filter the query on the uom column
     *
     * Example usage:
     * <code>
     * $query->filterByUom('fooValue');   // WHERE uom = 'fooValue'
     * $query->filterByUom('%fooValue%', Criteria::LIKE); // WHERE uom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByUom($uom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_UOM, $uom, $comparison);
    }

    /**
     * Filter the query on the spcord column
     *
     * Example usage:
     * <code>
     * $query->filterBySpcord('fooValue');   // WHERE spcord = 'fooValue'
     * $query->filterBySpcord('%fooValue%', Criteria::LIKE); // WHERE spcord LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spcord The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterBySpcord($spcord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spcord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_SPCORD, $spcord, $comparison);
    }

    /**
     * Filter the query on the kititemflag column
     *
     * Example usage:
     * <code>
     * $query->filterByKititemflag('fooValue');   // WHERE kititemflag = 'fooValue'
     * $query->filterByKititemflag('%fooValue%', Criteria::LIKE); // WHERE kititemflag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kititemflag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByKititemflag($kititemflag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kititemflag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_KITITEMFLAG, $kititemflag, $comparison);
    }

    /**
     * Filter the query on the promocode column
     *
     * Example usage:
     * <code>
     * $query->filterByPromocode('fooValue');   // WHERE promocode = 'fooValue'
     * $query->filterByPromocode('%fooValue%', Criteria::LIKE); // WHERE promocode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $promocode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByPromocode($promocode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($promocode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_PROMOCODE, $promocode, $comparison);
    }

    /**
     * Filter the query on the taxcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcode('fooValue');   // WHERE taxcode = 'fooValue'
     * $query->filterByTaxcode('%fooValue%', Criteria::LIKE); // WHERE taxcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $taxcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByTaxcode($taxcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_TAXCODE, $taxcode, $comparison);
    }

    /**
     * Filter the query on the taxcodeperc column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcodeperc('fooValue');   // WHERE taxcodeperc = 'fooValue'
     * $query->filterByTaxcodeperc('%fooValue%', Criteria::LIKE); // WHERE taxcodeperc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $taxcodeperc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByTaxcodeperc($taxcodeperc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodeperc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_TAXCODEPERC, $taxcodeperc, $comparison);
    }

    /**
     * Filter the query on the discpct column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscpct('fooValue');   // WHERE discpct = 'fooValue'
     * $query->filterByDiscpct('%fooValue%', Criteria::LIKE); // WHERE discpct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $discpct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByDiscpct($discpct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discpct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_DISCPCT, $discpct, $comparison);
    }

    /**
     * Filter the query on the listprice column
     *
     * Example usage:
     * <code>
     * $query->filterByListprice('fooValue');   // WHERE listprice = 'fooValue'
     * $query->filterByListprice('%fooValue%', Criteria::LIKE); // WHERE listprice LIKE '%fooValue%'
     * </code>
     *
     * @param     string $listprice The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByListprice($listprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($listprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_LISTPRICE, $listprice, $comparison);
    }

    /**
     * Filter the query on the uomconv column
     *
     * Example usage:
     * <code>
     * $query->filterByUomconv('fooValue');   // WHERE uomconv = 'fooValue'
     * $query->filterByUomconv('%fooValue%', Criteria::LIKE); // WHERE uomconv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uomconv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByUomconv($uomconv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomconv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_UOMCONV, $uomconv, $comparison);
    }

    /**
     * Filter the query on the vendorid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorid('fooValue');   // WHERE vendorid = 'fooValue'
     * $query->filterByVendorid('%fooValue%', Criteria::LIKE); // WHERE vendorid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendorid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByVendorid($vendorid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_VENDORID, $vendorid, $comparison);
    }

    /**
     * Filter the query on the vendoritemid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendoritemid('fooValue');   // WHERE vendoritemid = 'fooValue'
     * $query->filterByVendoritemid('%fooValue%', Criteria::LIKE); // WHERE vendoritemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendoritemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByVendoritemid($vendoritemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendoritemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_VENDORITEMID, $vendoritemid, $comparison);
    }

    /**
     * Filter the query on the mfgid column
     *
     * Example usage:
     * <code>
     * $query->filterByMfgid('fooValue');   // WHERE mfgid = 'fooValue'
     * $query->filterByMfgid('%fooValue%', Criteria::LIKE); // WHERE mfgid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mfgid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByMfgid($mfgid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mfgid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_MFGID, $mfgid, $comparison);
    }

    /**
     * Filter the query on the mfgitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByMfgitemid('fooValue');   // WHERE mfgitemid = 'fooValue'
     * $query->filterByMfgitemid('%fooValue%', Criteria::LIKE); // WHERE mfgitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mfgitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByMfgitemid($mfgitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mfgitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_MFGITEMID, $mfgitemid, $comparison);
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
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the lostreason column
     *
     * Example usage:
     * <code>
     * $query->filterByLostreason('fooValue');   // WHERE lostreason = 'fooValue'
     * $query->filterByLostreason('%fooValue%', Criteria::LIKE); // WHERE lostreason LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lostreason The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByLostreason($lostreason = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lostreason)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_LOSTREASON, $lostreason, $comparison);
    }

    /**
     * Filter the query on the lostdate column
     *
     * Example usage:
     * <code>
     * $query->filterByLostdate('fooValue');   // WHERE lostdate = 'fooValue'
     * $query->filterByLostdate('%fooValue%', Criteria::LIKE); // WHERE lostdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lostdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByLostdate($lostdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lostdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_LOSTDATE, $lostdate, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%', Criteria::LIKE); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the leaddays column
     *
     * Example usage:
     * <code>
     * $query->filterByLeaddays(1234); // WHERE leaddays = 1234
     * $query->filterByLeaddays(array(12, 34)); // WHERE leaddays IN (12, 34)
     * $query->filterByLeaddays(array('min' => 12)); // WHERE leaddays > 12
     * </code>
     *
     * @param     mixed $leaddays The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByLeaddays($leaddays = null, $comparison = null)
    {
        if (is_array($leaddays)) {
            $useMinMax = false;
            if (isset($leaddays['min'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_LEADDAYS, $leaddays['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($leaddays['max'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_LEADDAYS, $leaddays['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_LEADDAYS, $leaddays, $comparison);
    }

    /**
     * Filter the query on the ordrtotalcost column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdrtotalcost('fooValue');   // WHERE ordrtotalcost = 'fooValue'
     * $query->filterByOrdrtotalcost('%fooValue%', Criteria::LIKE); // WHERE ordrtotalcost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ordrtotalcost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByOrdrtotalcost($ordrtotalcost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordrtotalcost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_ORDRTOTALCOST, $ordrtotalcost, $comparison);
    }

    /**
     * Filter the query on the costuom column
     *
     * Example usage:
     * <code>
     * $query->filterByCostuom('fooValue');   // WHERE costuom = 'fooValue'
     * $query->filterByCostuom('%fooValue%', Criteria::LIKE); // WHERE costuom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $costuom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByCostuom($costuom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($costuom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_COSTUOM, $costuom, $comparison);
    }

    /**
     * Filter the query on the stancost column
     *
     * Example usage:
     * <code>
     * $query->filterByStancost('fooValue');   // WHERE stancost = 'fooValue'
     * $query->filterByStancost('%fooValue%', Criteria::LIKE); // WHERE stancost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $stancost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByStancost($stancost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($stancost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_STANCOST, $stancost, $comparison);
    }

    /**
     * Filter the query on the quotind column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotind('fooValue');   // WHERE quotind = 'fooValue'
     * $query->filterByQuotind('%fooValue%', Criteria::LIKE); // WHERE quotind LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotind The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQuotind($quotind = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotind)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QUOTIND, $quotind, $comparison);
    }

    /**
     * Filter the query on the quotqty column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotqty(1234); // WHERE quotqty = 1234
     * $query->filterByQuotqty(array(12, 34)); // WHERE quotqty IN (12, 34)
     * $query->filterByQuotqty(array('min' => 12)); // WHERE quotqty > 12
     * </code>
     *
     * @param     mixed $quotqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQuotqty($quotqty = null, $comparison = null)
    {
        if (is_array($quotqty)) {
            $useMinMax = false;
            if (isset($quotqty['min'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_QUOTQTY, $quotqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotqty['max'])) {
                $this->addUsingAlias(OrdrdetTableMap::COL_QUOTQTY, $quotqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QUOTQTY, $quotqty, $comparison);
    }

    /**
     * Filter the query on the quotprice column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotprice('fooValue');   // WHERE quotprice = 'fooValue'
     * $query->filterByQuotprice('%fooValue%', Criteria::LIKE); // WHERE quotprice LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotprice The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQuotprice($quotprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QUOTPRICE, $quotprice, $comparison);
    }

    /**
     * Filter the query on the quotcost column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotcost('fooValue');   // WHERE quotcost = 'fooValue'
     * $query->filterByQuotcost('%fooValue%', Criteria::LIKE); // WHERE quotcost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotcost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQuotcost($quotcost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotcost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QUOTCOST, $quotcost, $comparison);
    }

    /**
     * Filter the query on the quotmkupmarg column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotmkupmarg('fooValue');   // WHERE quotmkupmarg = 'fooValue'
     * $query->filterByQuotmkupmarg('%fooValue%', Criteria::LIKE); // WHERE quotmkupmarg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotmkupmarg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQuotmkupmarg($quotmkupmarg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotmkupmarg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QUOTMKUPMARG, $quotmkupmarg, $comparison);
    }

    /**
     * Filter the query on the quotdiscpct column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotdiscpct('fooValue');   // WHERE quotdiscpct = 'fooValue'
     * $query->filterByQuotdiscpct('%fooValue%', Criteria::LIKE); // WHERE quotdiscpct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotdiscpct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByQuotdiscpct($quotdiscpct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotdiscpct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_QUOTDISCPCT, $quotdiscpct, $comparison);
    }

    /**
     * Filter the query on the errormsg column
     *
     * Example usage:
     * <code>
     * $query->filterByErrormsg('fooValue');   // WHERE errormsg = 'fooValue'
     * $query->filterByErrormsg('%fooValue%', Criteria::LIKE); // WHERE errormsg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errormsg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_ERRORMSG, $errormsg, $comparison);
    }

    /**
     * Filter the query on the minprice column
     *
     * Example usage:
     * <code>
     * $query->filterByMinprice('fooValue');   // WHERE minprice = 'fooValue'
     * $query->filterByMinprice('%fooValue%', Criteria::LIKE); // WHERE minprice LIKE '%fooValue%'
     * </code>
     *
     * @param     string $minprice The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByMinprice($minprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($minprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_MINPRICE, $minprice, $comparison);
    }

    /**
     * Filter the query on the ponbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPonbr('fooValue');   // WHERE ponbr = 'fooValue'
     * $query->filterByPonbr('%fooValue%', Criteria::LIKE); // WHERE ponbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ponbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByPonbr($ponbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ponbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_PONBR, $ponbr, $comparison);
    }

    /**
     * Filter the query on the poref column
     *
     * Example usage:
     * <code>
     * $query->filterByPoref('fooValue');   // WHERE poref = 'fooValue'
     * $query->filterByPoref('%fooValue%', Criteria::LIKE); // WHERE poref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $poref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByPoref($poref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_POREF, $poref, $comparison);
    }

    /**
     * Filter the query on the nsitemgroup column
     *
     * Example usage:
     * <code>
     * $query->filterByNsitemgroup('fooValue');   // WHERE nsitemgroup = 'fooValue'
     * $query->filterByNsitemgroup('%fooValue%', Criteria::LIKE); // WHERE nsitemgroup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nsitemgroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByNsitemgroup($nsitemgroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nsitemgroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_NSITEMGROUP, $nsitemgroup, $comparison);
    }

    /**
     * Filter the query on the shipfromid column
     *
     * Example usage:
     * <code>
     * $query->filterByShipfromid('fooValue');   // WHERE shipfromid = 'fooValue'
     * $query->filterByShipfromid('%fooValue%', Criteria::LIKE); // WHERE shipfromid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipfromid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByShipfromid($shipfromid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipfromid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_SHIPFROMID, $shipfromid, $comparison);
    }

    /**
     * Filter the query on the itemtype column
     *
     * Example usage:
     * <code>
     * $query->filterByItemtype('fooValue');   // WHERE itemtype = 'fooValue'
     * $query->filterByItemtype('%fooValue%', Criteria::LIKE); // WHERE itemtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_ITEMTYPE, $itemtype, $comparison);
    }

    /**
     * Filter the query on the canbackorder column
     *
     * Example usage:
     * <code>
     * $query->filterByCanbackorder('fooValue');   // WHERE canbackorder = 'fooValue'
     * $query->filterByCanbackorder('%fooValue%', Criteria::LIKE); // WHERE canbackorder LIKE '%fooValue%'
     * </code>
     *
     * @param     string $canbackorder The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByCanbackorder($canbackorder = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($canbackorder)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_CANBACKORDER, $canbackorder, $comparison);
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
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrdetTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrdrdet $ordrdet Object to remove from the list of results
     *
     * @return $this|ChildOrdrdetQuery The current query, for fluid interface
     */
    public function prune($ordrdet = null)
    {
        if ($ordrdet) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OrdrdetTableMap::COL_SESSIONID), $ordrdet->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OrdrdetTableMap::COL_RECNO), $ordrdet->getRecno(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(OrdrdetTableMap::COL_ORDERNO), $ordrdet->getOrderno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ordrdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdrdetTableMap::clearInstancePool();
            OrdrdetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdrdetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdrdetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdrdetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrdrdetQuery
