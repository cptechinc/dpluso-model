<?php

namespace Base;

use \Cartdet as ChildCartdet;
use \CartdetQuery as ChildCartdetQuery;
use \Exception;
use \PDO;
use Map\CartdetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cartdet' table.
 *
 *
 *
 * @method     ChildCartdetQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCartdetQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCartdetQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCartdetQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCartdetQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildCartdetQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildCartdetQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildCartdetQuery orderByCustitemid($order = Criteria::ASC) Order by the custitemid column
 * @method     ChildCartdetQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildCartdetQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildCartdetQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildCartdetQuery orderByTotalprice($order = Criteria::ASC) Order by the totalprice column
 * @method     ChildCartdetQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildCartdetQuery orderByQtyshipped($order = Criteria::ASC) Order by the qtyshipped column
 * @method     ChildCartdetQuery orderByQtybackord($order = Criteria::ASC) Order by the qtybackord column
 * @method     ChildCartdetQuery orderByRshipdate($order = Criteria::ASC) Order by the rshipdate column
 * @method     ChildCartdetQuery orderByHasdocuments($order = Criteria::ASC) Order by the hasdocuments column
 * @method     ChildCartdetQuery orderByQtyavail($order = Criteria::ASC) Order by the qtyavail column
 * @method     ChildCartdetQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildCartdetQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildCartdetQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildCartdetQuery orderByUom($order = Criteria::ASC) Order by the uom column
 * @method     ChildCartdetQuery orderBySpcord($order = Criteria::ASC) Order by the spcord column
 * @method     ChildCartdetQuery orderByKititemflag($order = Criteria::ASC) Order by the kititemflag column
 * @method     ChildCartdetQuery orderByPromocode($order = Criteria::ASC) Order by the promocode column
 * @method     ChildCartdetQuery orderByTaxcode($order = Criteria::ASC) Order by the taxcode column
 * @method     ChildCartdetQuery orderByTaxcodeperc($order = Criteria::ASC) Order by the taxcodeperc column
 * @method     ChildCartdetQuery orderByDiscpct($order = Criteria::ASC) Order by the discpct column
 * @method     ChildCartdetQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildCartdetQuery orderByUomconv($order = Criteria::ASC) Order by the uomconv column
 * @method     ChildCartdetQuery orderByCatlgid($order = Criteria::ASC) Order by the catlgid column
 * @method     ChildCartdetQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildCartdetQuery orderByMinprice($order = Criteria::ASC) Order by the minprice column
 * @method     ChildCartdetQuery orderByVendorid($order = Criteria::ASC) Order by the vendorid column
 * @method     ChildCartdetQuery orderByVendoritemid($order = Criteria::ASC) Order by the vendoritemid column
 * @method     ChildCartdetQuery orderByPonbr($order = Criteria::ASC) Order by the ponbr column
 * @method     ChildCartdetQuery orderByPoref($order = Criteria::ASC) Order by the poref column
 * @method     ChildCartdetQuery orderByNsitemgroup($order = Criteria::ASC) Order by the nsitemgroup column
 * @method     ChildCartdetQuery orderByShipfromid($order = Criteria::ASC) Order by the shipfromid column
 * @method     ChildCartdetQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildCartdetQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCartdetQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCartdetQuery groupByRecno() Group by the recno column
 * @method     ChildCartdetQuery groupByDate() Group by the date column
 * @method     ChildCartdetQuery groupByTime() Group by the time column
 * @method     ChildCartdetQuery groupByOrderno() Group by the orderno column
 * @method     ChildCartdetQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildCartdetQuery groupByItemid() Group by the itemid column
 * @method     ChildCartdetQuery groupByCustitemid() Group by the custitemid column
 * @method     ChildCartdetQuery groupByDesc1() Group by the desc1 column
 * @method     ChildCartdetQuery groupByDesc2() Group by the desc2 column
 * @method     ChildCartdetQuery groupByPrice() Group by the price column
 * @method     ChildCartdetQuery groupByTotalprice() Group by the totalprice column
 * @method     ChildCartdetQuery groupByQty() Group by the qty column
 * @method     ChildCartdetQuery groupByQtyshipped() Group by the qtyshipped column
 * @method     ChildCartdetQuery groupByQtybackord() Group by the qtybackord column
 * @method     ChildCartdetQuery groupByRshipdate() Group by the rshipdate column
 * @method     ChildCartdetQuery groupByHasdocuments() Group by the hasdocuments column
 * @method     ChildCartdetQuery groupByQtyavail() Group by the qtyavail column
 * @method     ChildCartdetQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildCartdetQuery groupByCost() Group by the cost column
 * @method     ChildCartdetQuery groupByWhse() Group by the whse column
 * @method     ChildCartdetQuery groupByUom() Group by the uom column
 * @method     ChildCartdetQuery groupBySpcord() Group by the spcord column
 * @method     ChildCartdetQuery groupByKititemflag() Group by the kititemflag column
 * @method     ChildCartdetQuery groupByPromocode() Group by the promocode column
 * @method     ChildCartdetQuery groupByTaxcode() Group by the taxcode column
 * @method     ChildCartdetQuery groupByTaxcodeperc() Group by the taxcodeperc column
 * @method     ChildCartdetQuery groupByDiscpct() Group by the discpct column
 * @method     ChildCartdetQuery groupByListprice() Group by the listprice column
 * @method     ChildCartdetQuery groupByUomconv() Group by the uomconv column
 * @method     ChildCartdetQuery groupByCatlgid() Group by the catlgid column
 * @method     ChildCartdetQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildCartdetQuery groupByMinprice() Group by the minprice column
 * @method     ChildCartdetQuery groupByVendorid() Group by the vendorid column
 * @method     ChildCartdetQuery groupByVendoritemid() Group by the vendoritemid column
 * @method     ChildCartdetQuery groupByPonbr() Group by the ponbr column
 * @method     ChildCartdetQuery groupByPoref() Group by the poref column
 * @method     ChildCartdetQuery groupByNsitemgroup() Group by the nsitemgroup column
 * @method     ChildCartdetQuery groupByShipfromid() Group by the shipfromid column
 * @method     ChildCartdetQuery groupByItemtype() Group by the itemtype column
 * @method     ChildCartdetQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCartdetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCartdetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCartdetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCartdetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCartdetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCartdetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCartdet findOne(ConnectionInterface $con = null) Return the first ChildCartdet matching the query
 * @method     ChildCartdet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCartdet matching the query, or a new ChildCartdet object populated from the query conditions when no match is found
 *
 * @method     ChildCartdet findOneBySessionid(string $sessionid) Return the first ChildCartdet filtered by the sessionid column
 * @method     ChildCartdet findOneByRecno(int $recno) Return the first ChildCartdet filtered by the recno column
 * @method     ChildCartdet findOneByDate(int $date) Return the first ChildCartdet filtered by the date column
 * @method     ChildCartdet findOneByTime(int $time) Return the first ChildCartdet filtered by the time column
 * @method     ChildCartdet findOneByOrderno(string $orderno) Return the first ChildCartdet filtered by the orderno column
 * @method     ChildCartdet findOneByLinenbr(string $linenbr) Return the first ChildCartdet filtered by the linenbr column
 * @method     ChildCartdet findOneByItemid(string $itemid) Return the first ChildCartdet filtered by the itemid column
 * @method     ChildCartdet findOneByCustitemid(string $custitemid) Return the first ChildCartdet filtered by the custitemid column
 * @method     ChildCartdet findOneByDesc1(string $desc1) Return the first ChildCartdet filtered by the desc1 column
 * @method     ChildCartdet findOneByDesc2(string $desc2) Return the first ChildCartdet filtered by the desc2 column
 * @method     ChildCartdet findOneByPrice(string $price) Return the first ChildCartdet filtered by the price column
 * @method     ChildCartdet findOneByTotalprice(string $totalprice) Return the first ChildCartdet filtered by the totalprice column
 * @method     ChildCartdet findOneByQty(string $qty) Return the first ChildCartdet filtered by the qty column
 * @method     ChildCartdet findOneByQtyshipped(string $qtyshipped) Return the first ChildCartdet filtered by the qtyshipped column
 * @method     ChildCartdet findOneByQtybackord(string $qtybackord) Return the first ChildCartdet filtered by the qtybackord column
 * @method     ChildCartdet findOneByRshipdate(string $rshipdate) Return the first ChildCartdet filtered by the rshipdate column
 * @method     ChildCartdet findOneByHasdocuments(string $hasdocuments) Return the first ChildCartdet filtered by the hasdocuments column
 * @method     ChildCartdet findOneByQtyavail(string $qtyavail) Return the first ChildCartdet filtered by the qtyavail column
 * @method     ChildCartdet findOneByHasnotes(string $hasnotes) Return the first ChildCartdet filtered by the hasnotes column
 * @method     ChildCartdet findOneByCost(string $cost) Return the first ChildCartdet filtered by the cost column
 * @method     ChildCartdet findOneByWhse(string $whse) Return the first ChildCartdet filtered by the whse column
 * @method     ChildCartdet findOneByUom(string $uom) Return the first ChildCartdet filtered by the uom column
 * @method     ChildCartdet findOneBySpcord(string $spcord) Return the first ChildCartdet filtered by the spcord column
 * @method     ChildCartdet findOneByKititemflag(string $kititemflag) Return the first ChildCartdet filtered by the kititemflag column
 * @method     ChildCartdet findOneByPromocode(string $promocode) Return the first ChildCartdet filtered by the promocode column
 * @method     ChildCartdet findOneByTaxcode(string $taxcode) Return the first ChildCartdet filtered by the taxcode column
 * @method     ChildCartdet findOneByTaxcodeperc(string $taxcodeperc) Return the first ChildCartdet filtered by the taxcodeperc column
 * @method     ChildCartdet findOneByDiscpct(string $discpct) Return the first ChildCartdet filtered by the discpct column
 * @method     ChildCartdet findOneByListprice(string $listprice) Return the first ChildCartdet filtered by the listprice column
 * @method     ChildCartdet findOneByUomconv(string $uomconv) Return the first ChildCartdet filtered by the uomconv column
 * @method     ChildCartdet findOneByCatlgid(string $catlgid) Return the first ChildCartdet filtered by the catlgid column
 * @method     ChildCartdet findOneByErrormsg(string $errormsg) Return the first ChildCartdet filtered by the errormsg column
 * @method     ChildCartdet findOneByMinprice(string $minprice) Return the first ChildCartdet filtered by the minprice column
 * @method     ChildCartdet findOneByVendorid(string $vendorid) Return the first ChildCartdet filtered by the vendorid column
 * @method     ChildCartdet findOneByVendoritemid(string $vendoritemid) Return the first ChildCartdet filtered by the vendoritemid column
 * @method     ChildCartdet findOneByPonbr(string $ponbr) Return the first ChildCartdet filtered by the ponbr column
 * @method     ChildCartdet findOneByPoref(string $poref) Return the first ChildCartdet filtered by the poref column
 * @method     ChildCartdet findOneByNsitemgroup(string $nsitemgroup) Return the first ChildCartdet filtered by the nsitemgroup column
 * @method     ChildCartdet findOneByShipfromid(string $shipfromid) Return the first ChildCartdet filtered by the shipfromid column
 * @method     ChildCartdet findOneByItemtype(string $itemtype) Return the first ChildCartdet filtered by the itemtype column
 * @method     ChildCartdet findOneByDummy(string $dummy) Return the first ChildCartdet filtered by the dummy column *

 * @method     ChildCartdet requirePk($key, ConnectionInterface $con = null) Return the ChildCartdet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOne(ConnectionInterface $con = null) Return the first ChildCartdet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCartdet requireOneBySessionid(string $sessionid) Return the first ChildCartdet filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByRecno(int $recno) Return the first ChildCartdet filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDate(int $date) Return the first ChildCartdet filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTime(int $time) Return the first ChildCartdet filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByOrderno(string $orderno) Return the first ChildCartdet filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByLinenbr(string $linenbr) Return the first ChildCartdet filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByItemid(string $itemid) Return the first ChildCartdet filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByCustitemid(string $custitemid) Return the first ChildCartdet filtered by the custitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDesc1(string $desc1) Return the first ChildCartdet filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDesc2(string $desc2) Return the first ChildCartdet filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPrice(string $price) Return the first ChildCartdet filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTotalprice(string $totalprice) Return the first ChildCartdet filtered by the totalprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQty(string $qty) Return the first ChildCartdet filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQtyshipped(string $qtyshipped) Return the first ChildCartdet filtered by the qtyshipped column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQtybackord(string $qtybackord) Return the first ChildCartdet filtered by the qtybackord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByRshipdate(string $rshipdate) Return the first ChildCartdet filtered by the rshipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByHasdocuments(string $hasdocuments) Return the first ChildCartdet filtered by the hasdocuments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQtyavail(string $qtyavail) Return the first ChildCartdet filtered by the qtyavail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByHasnotes(string $hasnotes) Return the first ChildCartdet filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByCost(string $cost) Return the first ChildCartdet filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByWhse(string $whse) Return the first ChildCartdet filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByUom(string $uom) Return the first ChildCartdet filtered by the uom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneBySpcord(string $spcord) Return the first ChildCartdet filtered by the spcord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByKititemflag(string $kititemflag) Return the first ChildCartdet filtered by the kititemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPromocode(string $promocode) Return the first ChildCartdet filtered by the promocode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTaxcode(string $taxcode) Return the first ChildCartdet filtered by the taxcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTaxcodeperc(string $taxcodeperc) Return the first ChildCartdet filtered by the taxcodeperc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDiscpct(string $discpct) Return the first ChildCartdet filtered by the discpct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByListprice(string $listprice) Return the first ChildCartdet filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByUomconv(string $uomconv) Return the first ChildCartdet filtered by the uomconv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByCatlgid(string $catlgid) Return the first ChildCartdet filtered by the catlgid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByErrormsg(string $errormsg) Return the first ChildCartdet filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByMinprice(string $minprice) Return the first ChildCartdet filtered by the minprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByVendorid(string $vendorid) Return the first ChildCartdet filtered by the vendorid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByVendoritemid(string $vendoritemid) Return the first ChildCartdet filtered by the vendoritemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPonbr(string $ponbr) Return the first ChildCartdet filtered by the ponbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPoref(string $poref) Return the first ChildCartdet filtered by the poref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByNsitemgroup(string $nsitemgroup) Return the first ChildCartdet filtered by the nsitemgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByShipfromid(string $shipfromid) Return the first ChildCartdet filtered by the shipfromid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByItemtype(string $itemtype) Return the first ChildCartdet filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDummy(string $dummy) Return the first ChildCartdet filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCartdet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCartdet objects based on current ModelCriteria
 * @method     ChildCartdet[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCartdet objects filtered by the sessionid column
 * @method     ChildCartdet[]|ObjectCollection findByRecno(int $recno) Return ChildCartdet objects filtered by the recno column
 * @method     ChildCartdet[]|ObjectCollection findByDate(int $date) Return ChildCartdet objects filtered by the date column
 * @method     ChildCartdet[]|ObjectCollection findByTime(int $time) Return ChildCartdet objects filtered by the time column
 * @method     ChildCartdet[]|ObjectCollection findByOrderno(string $orderno) Return ChildCartdet objects filtered by the orderno column
 * @method     ChildCartdet[]|ObjectCollection findByLinenbr(string $linenbr) Return ChildCartdet objects filtered by the linenbr column
 * @method     ChildCartdet[]|ObjectCollection findByItemid(string $itemid) Return ChildCartdet objects filtered by the itemid column
 * @method     ChildCartdet[]|ObjectCollection findByCustitemid(string $custitemid) Return ChildCartdet objects filtered by the custitemid column
 * @method     ChildCartdet[]|ObjectCollection findByDesc1(string $desc1) Return ChildCartdet objects filtered by the desc1 column
 * @method     ChildCartdet[]|ObjectCollection findByDesc2(string $desc2) Return ChildCartdet objects filtered by the desc2 column
 * @method     ChildCartdet[]|ObjectCollection findByPrice(string $price) Return ChildCartdet objects filtered by the price column
 * @method     ChildCartdet[]|ObjectCollection findByTotalprice(string $totalprice) Return ChildCartdet objects filtered by the totalprice column
 * @method     ChildCartdet[]|ObjectCollection findByQty(string $qty) Return ChildCartdet objects filtered by the qty column
 * @method     ChildCartdet[]|ObjectCollection findByQtyshipped(string $qtyshipped) Return ChildCartdet objects filtered by the qtyshipped column
 * @method     ChildCartdet[]|ObjectCollection findByQtybackord(string $qtybackord) Return ChildCartdet objects filtered by the qtybackord column
 * @method     ChildCartdet[]|ObjectCollection findByRshipdate(string $rshipdate) Return ChildCartdet objects filtered by the rshipdate column
 * @method     ChildCartdet[]|ObjectCollection findByHasdocuments(string $hasdocuments) Return ChildCartdet objects filtered by the hasdocuments column
 * @method     ChildCartdet[]|ObjectCollection findByQtyavail(string $qtyavail) Return ChildCartdet objects filtered by the qtyavail column
 * @method     ChildCartdet[]|ObjectCollection findByHasnotes(string $hasnotes) Return ChildCartdet objects filtered by the hasnotes column
 * @method     ChildCartdet[]|ObjectCollection findByCost(string $cost) Return ChildCartdet objects filtered by the cost column
 * @method     ChildCartdet[]|ObjectCollection findByWhse(string $whse) Return ChildCartdet objects filtered by the whse column
 * @method     ChildCartdet[]|ObjectCollection findByUom(string $uom) Return ChildCartdet objects filtered by the uom column
 * @method     ChildCartdet[]|ObjectCollection findBySpcord(string $spcord) Return ChildCartdet objects filtered by the spcord column
 * @method     ChildCartdet[]|ObjectCollection findByKititemflag(string $kititemflag) Return ChildCartdet objects filtered by the kititemflag column
 * @method     ChildCartdet[]|ObjectCollection findByPromocode(string $promocode) Return ChildCartdet objects filtered by the promocode column
 * @method     ChildCartdet[]|ObjectCollection findByTaxcode(string $taxcode) Return ChildCartdet objects filtered by the taxcode column
 * @method     ChildCartdet[]|ObjectCollection findByTaxcodeperc(string $taxcodeperc) Return ChildCartdet objects filtered by the taxcodeperc column
 * @method     ChildCartdet[]|ObjectCollection findByDiscpct(string $discpct) Return ChildCartdet objects filtered by the discpct column
 * @method     ChildCartdet[]|ObjectCollection findByListprice(string $listprice) Return ChildCartdet objects filtered by the listprice column
 * @method     ChildCartdet[]|ObjectCollection findByUomconv(string $uomconv) Return ChildCartdet objects filtered by the uomconv column
 * @method     ChildCartdet[]|ObjectCollection findByCatlgid(string $catlgid) Return ChildCartdet objects filtered by the catlgid column
 * @method     ChildCartdet[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildCartdet objects filtered by the errormsg column
 * @method     ChildCartdet[]|ObjectCollection findByMinprice(string $minprice) Return ChildCartdet objects filtered by the minprice column
 * @method     ChildCartdet[]|ObjectCollection findByVendorid(string $vendorid) Return ChildCartdet objects filtered by the vendorid column
 * @method     ChildCartdet[]|ObjectCollection findByVendoritemid(string $vendoritemid) Return ChildCartdet objects filtered by the vendoritemid column
 * @method     ChildCartdet[]|ObjectCollection findByPonbr(string $ponbr) Return ChildCartdet objects filtered by the ponbr column
 * @method     ChildCartdet[]|ObjectCollection findByPoref(string $poref) Return ChildCartdet objects filtered by the poref column
 * @method     ChildCartdet[]|ObjectCollection findByNsitemgroup(string $nsitemgroup) Return ChildCartdet objects filtered by the nsitemgroup column
 * @method     ChildCartdet[]|ObjectCollection findByShipfromid(string $shipfromid) Return ChildCartdet objects filtered by the shipfromid column
 * @method     ChildCartdet[]|ObjectCollection findByItemtype(string $itemtype) Return ChildCartdet objects filtered by the itemtype column
 * @method     ChildCartdet[]|ObjectCollection findByDummy(string $dummy) Return ChildCartdet objects filtered by the dummy column
 * @method     ChildCartdet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CartdetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CartdetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Cartdet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCartdetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCartdetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCartdetQuery) {
            return $criteria;
        }
        $query = new ChildCartdetQuery();
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
     * @param array[$sessionid, $recno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCartdet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CartdetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CartdetTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCartdet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, orderno, linenbr, itemid, custitemid, desc1, desc2, price, totalprice, qty, qtyshipped, qtybackord, rshipdate, hasdocuments, qtyavail, hasnotes, cost, whse, uom, spcord, kititemflag, promocode, taxcode, taxcodeperc, discpct, listprice, uomconv, catlgid, errormsg, minprice, vendorid, vendoritemid, ponbr, poref, nsitemgroup, shipfromid, itemtype, dummy FROM cartdet WHERE sessionid = :p0 AND recno = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCartdet $obj */
            $obj = new ChildCartdet();
            $obj->hydrate($row);
            CartdetTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCartdet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CartdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CartdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CartdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CartdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(CartdetTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CartdetTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CartdetTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CartdetTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CartdetTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CartdetTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_ORDERNO, $orderno, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($linenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_LINENBR, $linenbr, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByCustitemid($custitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_CUSTITEMID, $custitemid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_DESC1, $desc1, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_DESC2, $desc2, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($price)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByTotalprice($totalprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_TOTALPRICE, $totalprice, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qty)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByQtyshipped($qtyshipped = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtyshipped)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_QTYSHIPPED, $qtyshipped, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByQtybackord($qtybackord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtybackord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_QTYBACKORD, $qtybackord, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByRshipdate($rshipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rshipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_RSHIPDATE, $rshipdate, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByHasdocuments($hasdocuments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasdocuments)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByQtyavail($qtyavail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtyavail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_QTYAVAIL, $qtyavail, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_HASNOTES, $hasnotes, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_COST, $cost, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_WHSE, $whse, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByUom($uom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_UOM, $uom, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterBySpcord($spcord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spcord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_SPCORD, $spcord, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByKititemflag($kititemflag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kititemflag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_KITITEMFLAG, $kititemflag, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByPromocode($promocode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($promocode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_PROMOCODE, $promocode, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByTaxcode($taxcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_TAXCODE, $taxcode, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByTaxcodeperc($taxcodeperc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodeperc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_TAXCODEPERC, $taxcodeperc, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByDiscpct($discpct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discpct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_DISCPCT, $discpct, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByListprice($listprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($listprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_LISTPRICE, $listprice, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByUomconv($uomconv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomconv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_UOMCONV, $uomconv, $comparison);
    }

    /**
     * Filter the query on the catlgid column
     *
     * Example usage:
     * <code>
     * $query->filterByCatlgid('fooValue');   // WHERE catlgid = 'fooValue'
     * $query->filterByCatlgid('%fooValue%', Criteria::LIKE); // WHERE catlgid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $catlgid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByCatlgid($catlgid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catlgid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_CATLGID, $catlgid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_ERRORMSG, $errormsg, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByMinprice($minprice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($minprice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_MINPRICE, $minprice, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByVendorid($vendorid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_VENDORID, $vendorid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByVendoritemid($vendoritemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendoritemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_VENDORITEMID, $vendoritemid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByPonbr($ponbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ponbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_PONBR, $ponbr, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByPoref($poref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_POREF, $poref, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByNsitemgroup($nsitemgroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nsitemgroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_NSITEMGROUP, $nsitemgroup, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByShipfromid($shipfromid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipfromid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_SHIPFROMID, $shipfromid, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_ITEMTYPE, $itemtype, $comparison);
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
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartdetTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCartdet $cartdet Object to remove from the list of results
     *
     * @return $this|ChildCartdetQuery The current query, for fluid interface
     */
    public function prune($cartdet = null)
    {
        if ($cartdet) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CartdetTableMap::COL_SESSIONID), $cartdet->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CartdetTableMap::COL_RECNO), $cartdet->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cartdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CartdetTableMap::clearInstancePool();
            CartdetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CartdetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CartdetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CartdetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CartdetQuery
