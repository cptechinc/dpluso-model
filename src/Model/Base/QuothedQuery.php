<?php

namespace Base;

use \Quothed as ChildQuothed;
use \QuothedQuery as ChildQuothedQuery;
use \Exception;
use \PDO;
use Map\QuothedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'quothed' table.
 *
 *
 *
 * @method     ChildQuothedQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildQuothedQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildQuothedQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildQuothedQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildQuothedQuery orderByQuotnbr($order = Criteria::ASC) Order by the quotnbr column
 * @method     ChildQuothedQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildQuothedQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildQuothedQuery orderByBillname($order = Criteria::ASC) Order by the billname column
 * @method     ChildQuothedQuery orderByBilladdress($order = Criteria::ASC) Order by the billaddress column
 * @method     ChildQuothedQuery orderByBilladdress2($order = Criteria::ASC) Order by the billaddress2 column
 * @method     ChildQuothedQuery orderByBilladdress3($order = Criteria::ASC) Order by the billaddress3 column
 * @method     ChildQuothedQuery orderByBillcountry($order = Criteria::ASC) Order by the billcountry column
 * @method     ChildQuothedQuery orderByBillcity($order = Criteria::ASC) Order by the billcity column
 * @method     ChildQuothedQuery orderByBillstate($order = Criteria::ASC) Order by the billstate column
 * @method     ChildQuothedQuery orderByBillzip($order = Criteria::ASC) Order by the billzip column
 * @method     ChildQuothedQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildQuothedQuery orderByShipname($order = Criteria::ASC) Order by the shipname column
 * @method     ChildQuothedQuery orderByShipaddress($order = Criteria::ASC) Order by the shipaddress column
 * @method     ChildQuothedQuery orderByShipaddress2($order = Criteria::ASC) Order by the shipaddress2 column
 * @method     ChildQuothedQuery orderByShipaddress3($order = Criteria::ASC) Order by the shipaddress3 column
 * @method     ChildQuothedQuery orderByShipcountry($order = Criteria::ASC) Order by the shipcountry column
 * @method     ChildQuothedQuery orderByShipcity($order = Criteria::ASC) Order by the shipcity column
 * @method     ChildQuothedQuery orderByShipstate($order = Criteria::ASC) Order by the shipstate column
 * @method     ChildQuothedQuery orderByShipzip($order = Criteria::ASC) Order by the shipzip column
 * @method     ChildQuothedQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildQuothedQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildQuothedQuery orderByFaxnbr($order = Criteria::ASC) Order by the faxnbr column
 * @method     ChildQuothedQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildQuothedQuery orderByCareof($order = Criteria::ASC) Order by the careof column
 * @method     ChildQuothedQuery orderByQuotdate($order = Criteria::ASC) Order by the quotdate column
 * @method     ChildQuothedQuery orderByRevdate($order = Criteria::ASC) Order by the revdate column
 * @method     ChildQuothedQuery orderByExpdate($order = Criteria::ASC) Order by the expdate column
 * @method     ChildQuothedQuery orderByPricecode($order = Criteria::ASC) Order by the pricecode column
 * @method     ChildQuothedQuery orderByPricecodedesc($order = Criteria::ASC) Order by the pricecodedesc column
 * @method     ChildQuothedQuery orderByTaxcode($order = Criteria::ASC) Order by the taxcode column
 * @method     ChildQuothedQuery orderByTaxcodedesc($order = Criteria::ASC) Order by the taxcodedesc column
 * @method     ChildQuothedQuery orderByTermcode($order = Criteria::ASC) Order by the termcode column
 * @method     ChildQuothedQuery orderByTermcodedesc($order = Criteria::ASC) Order by the termcodedesc column
 * @method     ChildQuothedQuery orderByShipviacd($order = Criteria::ASC) Order by the shipviacd column
 * @method     ChildQuothedQuery orderByShipviadesc($order = Criteria::ASC) Order by the shipviadesc column
 * @method     ChildQuothedQuery orderBySp1($order = Criteria::ASC) Order by the sp1 column
 * @method     ChildQuothedQuery orderBySp1pct($order = Criteria::ASC) Order by the sp1pct column
 * @method     ChildQuothedQuery orderBySp1name($order = Criteria::ASC) Order by the sp1name column
 * @method     ChildQuothedQuery orderBySp2($order = Criteria::ASC) Order by the sp2 column
 * @method     ChildQuothedQuery orderBySp2pct($order = Criteria::ASC) Order by the sp2pct column
 * @method     ChildQuothedQuery orderBySp2name($order = Criteria::ASC) Order by the sp2name column
 * @method     ChildQuothedQuery orderBySp3($order = Criteria::ASC) Order by the sp3 column
 * @method     ChildQuothedQuery orderBySp3pct($order = Criteria::ASC) Order by the sp3pct column
 * @method     ChildQuothedQuery orderBySp3name($order = Criteria::ASC) Order by the sp3name column
 * @method     ChildQuothedQuery orderByFob($order = Criteria::ASC) Order by the fob column
 * @method     ChildQuothedQuery orderByDeliverydesc($order = Criteria::ASC) Order by the deliverydesc column
 * @method     ChildQuothedQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildQuothedQuery orderByCustpo($order = Criteria::ASC) Order by the custpo column
 * @method     ChildQuothedQuery orderByCustref($order = Criteria::ASC) Order by the custref column
 * @method     ChildQuothedQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildQuothedQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildQuothedQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildQuothedQuery orderBySubtotal($order = Criteria::ASC) Order by the subtotal column
 * @method     ChildQuothedQuery orderBySalestax($order = Criteria::ASC) Order by the salestax column
 * @method     ChildQuothedQuery orderByFreight($order = Criteria::ASC) Order by the freight column
 * @method     ChildQuothedQuery orderByMisccost($order = Criteria::ASC) Order by the misccost column
 * @method     ChildQuothedQuery orderByOrdertotal($order = Criteria::ASC) Order by the ordertotal column
 * @method     ChildQuothedQuery orderByCostTotal($order = Criteria::ASC) Order by the cost_total column
 * @method     ChildQuothedQuery orderByMarginAmt($order = Criteria::ASC) Order by the margin_amt column
 * @method     ChildQuothedQuery orderByMarginPct($order = Criteria::ASC) Order by the margin_pct column
 * @method     ChildQuothedQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildQuothedQuery groupBySessionid() Group by the sessionid column
 * @method     ChildQuothedQuery groupByRecno() Group by the recno column
 * @method     ChildQuothedQuery groupByDate() Group by the date column
 * @method     ChildQuothedQuery groupByTime() Group by the time column
 * @method     ChildQuothedQuery groupByQuotnbr() Group by the quotnbr column
 * @method     ChildQuothedQuery groupByStatus() Group by the status column
 * @method     ChildQuothedQuery groupByCustid() Group by the custid column
 * @method     ChildQuothedQuery groupByBillname() Group by the billname column
 * @method     ChildQuothedQuery groupByBilladdress() Group by the billaddress column
 * @method     ChildQuothedQuery groupByBilladdress2() Group by the billaddress2 column
 * @method     ChildQuothedQuery groupByBilladdress3() Group by the billaddress3 column
 * @method     ChildQuothedQuery groupByBillcountry() Group by the billcountry column
 * @method     ChildQuothedQuery groupByBillcity() Group by the billcity column
 * @method     ChildQuothedQuery groupByBillstate() Group by the billstate column
 * @method     ChildQuothedQuery groupByBillzip() Group by the billzip column
 * @method     ChildQuothedQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildQuothedQuery groupByShipname() Group by the shipname column
 * @method     ChildQuothedQuery groupByShipaddress() Group by the shipaddress column
 * @method     ChildQuothedQuery groupByShipaddress2() Group by the shipaddress2 column
 * @method     ChildQuothedQuery groupByShipaddress3() Group by the shipaddress3 column
 * @method     ChildQuothedQuery groupByShipcountry() Group by the shipcountry column
 * @method     ChildQuothedQuery groupByShipcity() Group by the shipcity column
 * @method     ChildQuothedQuery groupByShipstate() Group by the shipstate column
 * @method     ChildQuothedQuery groupByShipzip() Group by the shipzip column
 * @method     ChildQuothedQuery groupByContact() Group by the contact column
 * @method     ChildQuothedQuery groupByPhone() Group by the phone column
 * @method     ChildQuothedQuery groupByFaxnbr() Group by the faxnbr column
 * @method     ChildQuothedQuery groupByEmail() Group by the email column
 * @method     ChildQuothedQuery groupByCareof() Group by the careof column
 * @method     ChildQuothedQuery groupByQuotdate() Group by the quotdate column
 * @method     ChildQuothedQuery groupByRevdate() Group by the revdate column
 * @method     ChildQuothedQuery groupByExpdate() Group by the expdate column
 * @method     ChildQuothedQuery groupByPricecode() Group by the pricecode column
 * @method     ChildQuothedQuery groupByPricecodedesc() Group by the pricecodedesc column
 * @method     ChildQuothedQuery groupByTaxcode() Group by the taxcode column
 * @method     ChildQuothedQuery groupByTaxcodedesc() Group by the taxcodedesc column
 * @method     ChildQuothedQuery groupByTermcode() Group by the termcode column
 * @method     ChildQuothedQuery groupByTermcodedesc() Group by the termcodedesc column
 * @method     ChildQuothedQuery groupByShipviacd() Group by the shipviacd column
 * @method     ChildQuothedQuery groupByShipviadesc() Group by the shipviadesc column
 * @method     ChildQuothedQuery groupBySp1() Group by the sp1 column
 * @method     ChildQuothedQuery groupBySp1pct() Group by the sp1pct column
 * @method     ChildQuothedQuery groupBySp1name() Group by the sp1name column
 * @method     ChildQuothedQuery groupBySp2() Group by the sp2 column
 * @method     ChildQuothedQuery groupBySp2pct() Group by the sp2pct column
 * @method     ChildQuothedQuery groupBySp2name() Group by the sp2name column
 * @method     ChildQuothedQuery groupBySp3() Group by the sp3 column
 * @method     ChildQuothedQuery groupBySp3pct() Group by the sp3pct column
 * @method     ChildQuothedQuery groupBySp3name() Group by the sp3name column
 * @method     ChildQuothedQuery groupByFob() Group by the fob column
 * @method     ChildQuothedQuery groupByDeliverydesc() Group by the deliverydesc column
 * @method     ChildQuothedQuery groupByWhse() Group by the whse column
 * @method     ChildQuothedQuery groupByCustpo() Group by the custpo column
 * @method     ChildQuothedQuery groupByCustref() Group by the custref column
 * @method     ChildQuothedQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildQuothedQuery groupByError() Group by the error column
 * @method     ChildQuothedQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildQuothedQuery groupBySubtotal() Group by the subtotal column
 * @method     ChildQuothedQuery groupBySalestax() Group by the salestax column
 * @method     ChildQuothedQuery groupByFreight() Group by the freight column
 * @method     ChildQuothedQuery groupByMisccost() Group by the misccost column
 * @method     ChildQuothedQuery groupByOrdertotal() Group by the ordertotal column
 * @method     ChildQuothedQuery groupByCostTotal() Group by the cost_total column
 * @method     ChildQuothedQuery groupByMarginAmt() Group by the margin_amt column
 * @method     ChildQuothedQuery groupByMarginPct() Group by the margin_pct column
 * @method     ChildQuothedQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildQuothedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQuothedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQuothedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQuothedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQuothedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQuothedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQuothed findOne(ConnectionInterface $con = null) Return the first ChildQuothed matching the query
 * @method     ChildQuothed findOneOrCreate(ConnectionInterface $con = null) Return the first ChildQuothed matching the query, or a new ChildQuothed object populated from the query conditions when no match is found
 *
 * @method     ChildQuothed findOneBySessionid(string $sessionid) Return the first ChildQuothed filtered by the sessionid column
 * @method     ChildQuothed findOneByRecno(int $recno) Return the first ChildQuothed filtered by the recno column
 * @method     ChildQuothed findOneByDate(int $date) Return the first ChildQuothed filtered by the date column
 * @method     ChildQuothed findOneByTime(int $time) Return the first ChildQuothed filtered by the time column
 * @method     ChildQuothed findOneByQuotnbr(string $quotnbr) Return the first ChildQuothed filtered by the quotnbr column
 * @method     ChildQuothed findOneByStatus(string $status) Return the first ChildQuothed filtered by the status column
 * @method     ChildQuothed findOneByCustid(string $custid) Return the first ChildQuothed filtered by the custid column
 * @method     ChildQuothed findOneByBillname(string $billname) Return the first ChildQuothed filtered by the billname column
 * @method     ChildQuothed findOneByBilladdress(string $billaddress) Return the first ChildQuothed filtered by the billaddress column
 * @method     ChildQuothed findOneByBilladdress2(string $billaddress2) Return the first ChildQuothed filtered by the billaddress2 column
 * @method     ChildQuothed findOneByBilladdress3(string $billaddress3) Return the first ChildQuothed filtered by the billaddress3 column
 * @method     ChildQuothed findOneByBillcountry(string $billcountry) Return the first ChildQuothed filtered by the billcountry column
 * @method     ChildQuothed findOneByBillcity(string $billcity) Return the first ChildQuothed filtered by the billcity column
 * @method     ChildQuothed findOneByBillstate(string $billstate) Return the first ChildQuothed filtered by the billstate column
 * @method     ChildQuothed findOneByBillzip(string $billzip) Return the first ChildQuothed filtered by the billzip column
 * @method     ChildQuothed findOneByShiptoid(string $shiptoid) Return the first ChildQuothed filtered by the shiptoid column
 * @method     ChildQuothed findOneByShipname(string $shipname) Return the first ChildQuothed filtered by the shipname column
 * @method     ChildQuothed findOneByShipaddress(string $shipaddress) Return the first ChildQuothed filtered by the shipaddress column
 * @method     ChildQuothed findOneByShipaddress2(string $shipaddress2) Return the first ChildQuothed filtered by the shipaddress2 column
 * @method     ChildQuothed findOneByShipaddress3(string $shipaddress3) Return the first ChildQuothed filtered by the shipaddress3 column
 * @method     ChildQuothed findOneByShipcountry(string $shipcountry) Return the first ChildQuothed filtered by the shipcountry column
 * @method     ChildQuothed findOneByShipcity(string $shipcity) Return the first ChildQuothed filtered by the shipcity column
 * @method     ChildQuothed findOneByShipstate(string $shipstate) Return the first ChildQuothed filtered by the shipstate column
 * @method     ChildQuothed findOneByShipzip(string $shipzip) Return the first ChildQuothed filtered by the shipzip column
 * @method     ChildQuothed findOneByContact(string $contact) Return the first ChildQuothed filtered by the contact column
 * @method     ChildQuothed findOneByPhone(string $phone) Return the first ChildQuothed filtered by the phone column
 * @method     ChildQuothed findOneByFaxnbr(string $faxnbr) Return the first ChildQuothed filtered by the faxnbr column
 * @method     ChildQuothed findOneByEmail(string $email) Return the first ChildQuothed filtered by the email column
 * @method     ChildQuothed findOneByCareof(string $careof) Return the first ChildQuothed filtered by the careof column
 * @method     ChildQuothed findOneByQuotdate(string $quotdate) Return the first ChildQuothed filtered by the quotdate column
 * @method     ChildQuothed findOneByRevdate(string $revdate) Return the first ChildQuothed filtered by the revdate column
 * @method     ChildQuothed findOneByExpdate(string $expdate) Return the first ChildQuothed filtered by the expdate column
 * @method     ChildQuothed findOneByPricecode(string $pricecode) Return the first ChildQuothed filtered by the pricecode column
 * @method     ChildQuothed findOneByPricecodedesc(string $pricecodedesc) Return the first ChildQuothed filtered by the pricecodedesc column
 * @method     ChildQuothed findOneByTaxcode(string $taxcode) Return the first ChildQuothed filtered by the taxcode column
 * @method     ChildQuothed findOneByTaxcodedesc(string $taxcodedesc) Return the first ChildQuothed filtered by the taxcodedesc column
 * @method     ChildQuothed findOneByTermcode(string $termcode) Return the first ChildQuothed filtered by the termcode column
 * @method     ChildQuothed findOneByTermcodedesc(string $termcodedesc) Return the first ChildQuothed filtered by the termcodedesc column
 * @method     ChildQuothed findOneByShipviacd(string $shipviacd) Return the first ChildQuothed filtered by the shipviacd column
 * @method     ChildQuothed findOneByShipviadesc(string $shipviadesc) Return the first ChildQuothed filtered by the shipviadesc column
 * @method     ChildQuothed findOneBySp1(string $sp1) Return the first ChildQuothed filtered by the sp1 column
 * @method     ChildQuothed findOneBySp1pct(string $sp1pct) Return the first ChildQuothed filtered by the sp1pct column
 * @method     ChildQuothed findOneBySp1name(string $sp1name) Return the first ChildQuothed filtered by the sp1name column
 * @method     ChildQuothed findOneBySp2(string $sp2) Return the first ChildQuothed filtered by the sp2 column
 * @method     ChildQuothed findOneBySp2pct(string $sp2pct) Return the first ChildQuothed filtered by the sp2pct column
 * @method     ChildQuothed findOneBySp2name(string $sp2name) Return the first ChildQuothed filtered by the sp2name column
 * @method     ChildQuothed findOneBySp3(string $sp3) Return the first ChildQuothed filtered by the sp3 column
 * @method     ChildQuothed findOneBySp3pct(string $sp3pct) Return the first ChildQuothed filtered by the sp3pct column
 * @method     ChildQuothed findOneBySp3name(string $sp3name) Return the first ChildQuothed filtered by the sp3name column
 * @method     ChildQuothed findOneByFob(string $fob) Return the first ChildQuothed filtered by the fob column
 * @method     ChildQuothed findOneByDeliverydesc(string $deliverydesc) Return the first ChildQuothed filtered by the deliverydesc column
 * @method     ChildQuothed findOneByWhse(string $whse) Return the first ChildQuothed filtered by the whse column
 * @method     ChildQuothed findOneByCustpo(string $custpo) Return the first ChildQuothed filtered by the custpo column
 * @method     ChildQuothed findOneByCustref(string $custref) Return the first ChildQuothed filtered by the custref column
 * @method     ChildQuothed findOneByHasnotes(string $hasnotes) Return the first ChildQuothed filtered by the hasnotes column
 * @method     ChildQuothed findOneByError(string $error) Return the first ChildQuothed filtered by the error column
 * @method     ChildQuothed findOneByErrormsg(string $errormsg) Return the first ChildQuothed filtered by the errormsg column
 * @method     ChildQuothed findOneBySubtotal(string $subtotal) Return the first ChildQuothed filtered by the subtotal column
 * @method     ChildQuothed findOneBySalestax(string $salestax) Return the first ChildQuothed filtered by the salestax column
 * @method     ChildQuothed findOneByFreight(string $freight) Return the first ChildQuothed filtered by the freight column
 * @method     ChildQuothed findOneByMisccost(string $misccost) Return the first ChildQuothed filtered by the misccost column
 * @method     ChildQuothed findOneByOrdertotal(string $ordertotal) Return the first ChildQuothed filtered by the ordertotal column
 * @method     ChildQuothed findOneByCostTotal(string $cost_total) Return the first ChildQuothed filtered by the cost_total column
 * @method     ChildQuothed findOneByMarginAmt(string $margin_amt) Return the first ChildQuothed filtered by the margin_amt column
 * @method     ChildQuothed findOneByMarginPct(string $margin_pct) Return the first ChildQuothed filtered by the margin_pct column
 * @method     ChildQuothed findOneByDummy(string $dummy) Return the first ChildQuothed filtered by the dummy column *

 * @method     ChildQuothed requirePk($key, ConnectionInterface $con = null) Return the ChildQuothed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOne(ConnectionInterface $con = null) Return the first ChildQuothed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuothed requireOneBySessionid(string $sessionid) Return the first ChildQuothed filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByRecno(int $recno) Return the first ChildQuothed filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByDate(int $date) Return the first ChildQuothed filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByTime(int $time) Return the first ChildQuothed filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByQuotnbr(string $quotnbr) Return the first ChildQuothed filtered by the quotnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByStatus(string $status) Return the first ChildQuothed filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByCustid(string $custid) Return the first ChildQuothed filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBillname(string $billname) Return the first ChildQuothed filtered by the billname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBilladdress(string $billaddress) Return the first ChildQuothed filtered by the billaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBilladdress2(string $billaddress2) Return the first ChildQuothed filtered by the billaddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBilladdress3(string $billaddress3) Return the first ChildQuothed filtered by the billaddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBillcountry(string $billcountry) Return the first ChildQuothed filtered by the billcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBillcity(string $billcity) Return the first ChildQuothed filtered by the billcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBillstate(string $billstate) Return the first ChildQuothed filtered by the billstate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByBillzip(string $billzip) Return the first ChildQuothed filtered by the billzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShiptoid(string $shiptoid) Return the first ChildQuothed filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipname(string $shipname) Return the first ChildQuothed filtered by the shipname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipaddress(string $shipaddress) Return the first ChildQuothed filtered by the shipaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipaddress2(string $shipaddress2) Return the first ChildQuothed filtered by the shipaddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipaddress3(string $shipaddress3) Return the first ChildQuothed filtered by the shipaddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipcountry(string $shipcountry) Return the first ChildQuothed filtered by the shipcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipcity(string $shipcity) Return the first ChildQuothed filtered by the shipcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipstate(string $shipstate) Return the first ChildQuothed filtered by the shipstate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipzip(string $shipzip) Return the first ChildQuothed filtered by the shipzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByContact(string $contact) Return the first ChildQuothed filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByPhone(string $phone) Return the first ChildQuothed filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByFaxnbr(string $faxnbr) Return the first ChildQuothed filtered by the faxnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByEmail(string $email) Return the first ChildQuothed filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByCareof(string $careof) Return the first ChildQuothed filtered by the careof column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByQuotdate(string $quotdate) Return the first ChildQuothed filtered by the quotdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByRevdate(string $revdate) Return the first ChildQuothed filtered by the revdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByExpdate(string $expdate) Return the first ChildQuothed filtered by the expdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByPricecode(string $pricecode) Return the first ChildQuothed filtered by the pricecode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByPricecodedesc(string $pricecodedesc) Return the first ChildQuothed filtered by the pricecodedesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByTaxcode(string $taxcode) Return the first ChildQuothed filtered by the taxcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByTaxcodedesc(string $taxcodedesc) Return the first ChildQuothed filtered by the taxcodedesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByTermcode(string $termcode) Return the first ChildQuothed filtered by the termcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByTermcodedesc(string $termcodedesc) Return the first ChildQuothed filtered by the termcodedesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipviacd(string $shipviacd) Return the first ChildQuothed filtered by the shipviacd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByShipviadesc(string $shipviadesc) Return the first ChildQuothed filtered by the shipviadesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp1(string $sp1) Return the first ChildQuothed filtered by the sp1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp1pct(string $sp1pct) Return the first ChildQuothed filtered by the sp1pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp1name(string $sp1name) Return the first ChildQuothed filtered by the sp1name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp2(string $sp2) Return the first ChildQuothed filtered by the sp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp2pct(string $sp2pct) Return the first ChildQuothed filtered by the sp2pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp2name(string $sp2name) Return the first ChildQuothed filtered by the sp2name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp3(string $sp3) Return the first ChildQuothed filtered by the sp3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp3pct(string $sp3pct) Return the first ChildQuothed filtered by the sp3pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySp3name(string $sp3name) Return the first ChildQuothed filtered by the sp3name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByFob(string $fob) Return the first ChildQuothed filtered by the fob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByDeliverydesc(string $deliverydesc) Return the first ChildQuothed filtered by the deliverydesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByWhse(string $whse) Return the first ChildQuothed filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByCustpo(string $custpo) Return the first ChildQuothed filtered by the custpo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByCustref(string $custref) Return the first ChildQuothed filtered by the custref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByHasnotes(string $hasnotes) Return the first ChildQuothed filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByError(string $error) Return the first ChildQuothed filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByErrormsg(string $errormsg) Return the first ChildQuothed filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySubtotal(string $subtotal) Return the first ChildQuothed filtered by the subtotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneBySalestax(string $salestax) Return the first ChildQuothed filtered by the salestax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByFreight(string $freight) Return the first ChildQuothed filtered by the freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByMisccost(string $misccost) Return the first ChildQuothed filtered by the misccost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByOrdertotal(string $ordertotal) Return the first ChildQuothed filtered by the ordertotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByCostTotal(string $cost_total) Return the first ChildQuothed filtered by the cost_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByMarginAmt(string $margin_amt) Return the first ChildQuothed filtered by the margin_amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByMarginPct(string $margin_pct) Return the first ChildQuothed filtered by the margin_pct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuothed requireOneByDummy(string $dummy) Return the first ChildQuothed filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuothed[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildQuothed objects based on current ModelCriteria
 * @method     ChildQuothed[]|ObjectCollection findBySessionid(string $sessionid) Return ChildQuothed objects filtered by the sessionid column
 * @method     ChildQuothed[]|ObjectCollection findByRecno(int $recno) Return ChildQuothed objects filtered by the recno column
 * @method     ChildQuothed[]|ObjectCollection findByDate(int $date) Return ChildQuothed objects filtered by the date column
 * @method     ChildQuothed[]|ObjectCollection findByTime(int $time) Return ChildQuothed objects filtered by the time column
 * @method     ChildQuothed[]|ObjectCollection findByQuotnbr(string $quotnbr) Return ChildQuothed objects filtered by the quotnbr column
 * @method     ChildQuothed[]|ObjectCollection findByStatus(string $status) Return ChildQuothed objects filtered by the status column
 * @method     ChildQuothed[]|ObjectCollection findByCustid(string $custid) Return ChildQuothed objects filtered by the custid column
 * @method     ChildQuothed[]|ObjectCollection findByBillname(string $billname) Return ChildQuothed objects filtered by the billname column
 * @method     ChildQuothed[]|ObjectCollection findByBilladdress(string $billaddress) Return ChildQuothed objects filtered by the billaddress column
 * @method     ChildQuothed[]|ObjectCollection findByBilladdress2(string $billaddress2) Return ChildQuothed objects filtered by the billaddress2 column
 * @method     ChildQuothed[]|ObjectCollection findByBilladdress3(string $billaddress3) Return ChildQuothed objects filtered by the billaddress3 column
 * @method     ChildQuothed[]|ObjectCollection findByBillcountry(string $billcountry) Return ChildQuothed objects filtered by the billcountry column
 * @method     ChildQuothed[]|ObjectCollection findByBillcity(string $billcity) Return ChildQuothed objects filtered by the billcity column
 * @method     ChildQuothed[]|ObjectCollection findByBillstate(string $billstate) Return ChildQuothed objects filtered by the billstate column
 * @method     ChildQuothed[]|ObjectCollection findByBillzip(string $billzip) Return ChildQuothed objects filtered by the billzip column
 * @method     ChildQuothed[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildQuothed objects filtered by the shiptoid column
 * @method     ChildQuothed[]|ObjectCollection findByShipname(string $shipname) Return ChildQuothed objects filtered by the shipname column
 * @method     ChildQuothed[]|ObjectCollection findByShipaddress(string $shipaddress) Return ChildQuothed objects filtered by the shipaddress column
 * @method     ChildQuothed[]|ObjectCollection findByShipaddress2(string $shipaddress2) Return ChildQuothed objects filtered by the shipaddress2 column
 * @method     ChildQuothed[]|ObjectCollection findByShipaddress3(string $shipaddress3) Return ChildQuothed objects filtered by the shipaddress3 column
 * @method     ChildQuothed[]|ObjectCollection findByShipcountry(string $shipcountry) Return ChildQuothed objects filtered by the shipcountry column
 * @method     ChildQuothed[]|ObjectCollection findByShipcity(string $shipcity) Return ChildQuothed objects filtered by the shipcity column
 * @method     ChildQuothed[]|ObjectCollection findByShipstate(string $shipstate) Return ChildQuothed objects filtered by the shipstate column
 * @method     ChildQuothed[]|ObjectCollection findByShipzip(string $shipzip) Return ChildQuothed objects filtered by the shipzip column
 * @method     ChildQuothed[]|ObjectCollection findByContact(string $contact) Return ChildQuothed objects filtered by the contact column
 * @method     ChildQuothed[]|ObjectCollection findByPhone(string $phone) Return ChildQuothed objects filtered by the phone column
 * @method     ChildQuothed[]|ObjectCollection findByFaxnbr(string $faxnbr) Return ChildQuothed objects filtered by the faxnbr column
 * @method     ChildQuothed[]|ObjectCollection findByEmail(string $email) Return ChildQuothed objects filtered by the email column
 * @method     ChildQuothed[]|ObjectCollection findByCareof(string $careof) Return ChildQuothed objects filtered by the careof column
 * @method     ChildQuothed[]|ObjectCollection findByQuotdate(string $quotdate) Return ChildQuothed objects filtered by the quotdate column
 * @method     ChildQuothed[]|ObjectCollection findByRevdate(string $revdate) Return ChildQuothed objects filtered by the revdate column
 * @method     ChildQuothed[]|ObjectCollection findByExpdate(string $expdate) Return ChildQuothed objects filtered by the expdate column
 * @method     ChildQuothed[]|ObjectCollection findByPricecode(string $pricecode) Return ChildQuothed objects filtered by the pricecode column
 * @method     ChildQuothed[]|ObjectCollection findByPricecodedesc(string $pricecodedesc) Return ChildQuothed objects filtered by the pricecodedesc column
 * @method     ChildQuothed[]|ObjectCollection findByTaxcode(string $taxcode) Return ChildQuothed objects filtered by the taxcode column
 * @method     ChildQuothed[]|ObjectCollection findByTaxcodedesc(string $taxcodedesc) Return ChildQuothed objects filtered by the taxcodedesc column
 * @method     ChildQuothed[]|ObjectCollection findByTermcode(string $termcode) Return ChildQuothed objects filtered by the termcode column
 * @method     ChildQuothed[]|ObjectCollection findByTermcodedesc(string $termcodedesc) Return ChildQuothed objects filtered by the termcodedesc column
 * @method     ChildQuothed[]|ObjectCollection findByShipviacd(string $shipviacd) Return ChildQuothed objects filtered by the shipviacd column
 * @method     ChildQuothed[]|ObjectCollection findByShipviadesc(string $shipviadesc) Return ChildQuothed objects filtered by the shipviadesc column
 * @method     ChildQuothed[]|ObjectCollection findBySp1(string $sp1) Return ChildQuothed objects filtered by the sp1 column
 * @method     ChildQuothed[]|ObjectCollection findBySp1pct(string $sp1pct) Return ChildQuothed objects filtered by the sp1pct column
 * @method     ChildQuothed[]|ObjectCollection findBySp1name(string $sp1name) Return ChildQuothed objects filtered by the sp1name column
 * @method     ChildQuothed[]|ObjectCollection findBySp2(string $sp2) Return ChildQuothed objects filtered by the sp2 column
 * @method     ChildQuothed[]|ObjectCollection findBySp2pct(string $sp2pct) Return ChildQuothed objects filtered by the sp2pct column
 * @method     ChildQuothed[]|ObjectCollection findBySp2name(string $sp2name) Return ChildQuothed objects filtered by the sp2name column
 * @method     ChildQuothed[]|ObjectCollection findBySp3(string $sp3) Return ChildQuothed objects filtered by the sp3 column
 * @method     ChildQuothed[]|ObjectCollection findBySp3pct(string $sp3pct) Return ChildQuothed objects filtered by the sp3pct column
 * @method     ChildQuothed[]|ObjectCollection findBySp3name(string $sp3name) Return ChildQuothed objects filtered by the sp3name column
 * @method     ChildQuothed[]|ObjectCollection findByFob(string $fob) Return ChildQuothed objects filtered by the fob column
 * @method     ChildQuothed[]|ObjectCollection findByDeliverydesc(string $deliverydesc) Return ChildQuothed objects filtered by the deliverydesc column
 * @method     ChildQuothed[]|ObjectCollection findByWhse(string $whse) Return ChildQuothed objects filtered by the whse column
 * @method     ChildQuothed[]|ObjectCollection findByCustpo(string $custpo) Return ChildQuothed objects filtered by the custpo column
 * @method     ChildQuothed[]|ObjectCollection findByCustref(string $custref) Return ChildQuothed objects filtered by the custref column
 * @method     ChildQuothed[]|ObjectCollection findByHasnotes(string $hasnotes) Return ChildQuothed objects filtered by the hasnotes column
 * @method     ChildQuothed[]|ObjectCollection findByError(string $error) Return ChildQuothed objects filtered by the error column
 * @method     ChildQuothed[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildQuothed objects filtered by the errormsg column
 * @method     ChildQuothed[]|ObjectCollection findBySubtotal(string $subtotal) Return ChildQuothed objects filtered by the subtotal column
 * @method     ChildQuothed[]|ObjectCollection findBySalestax(string $salestax) Return ChildQuothed objects filtered by the salestax column
 * @method     ChildQuothed[]|ObjectCollection findByFreight(string $freight) Return ChildQuothed objects filtered by the freight column
 * @method     ChildQuothed[]|ObjectCollection findByMisccost(string $misccost) Return ChildQuothed objects filtered by the misccost column
 * @method     ChildQuothed[]|ObjectCollection findByOrdertotal(string $ordertotal) Return ChildQuothed objects filtered by the ordertotal column
 * @method     ChildQuothed[]|ObjectCollection findByCostTotal(string $cost_total) Return ChildQuothed objects filtered by the cost_total column
 * @method     ChildQuothed[]|ObjectCollection findByMarginAmt(string $margin_amt) Return ChildQuothed objects filtered by the margin_amt column
 * @method     ChildQuothed[]|ObjectCollection findByMarginPct(string $margin_pct) Return ChildQuothed objects filtered by the margin_pct column
 * @method     ChildQuothed[]|ObjectCollection findByDummy(string $dummy) Return ChildQuothed objects filtered by the dummy column
 * @method     ChildQuothed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class QuothedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\QuothedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Quothed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQuothedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQuothedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildQuothedQuery) {
            return $criteria;
        }
        $query = new ChildQuothedQuery();
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
     * @return ChildQuothed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuothedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QuothedTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildQuothed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, quotnbr, status, custid, billname, billaddress, billaddress2, billaddress3, billcountry, billcity, billstate, billzip, shiptoid, shipname, shipaddress, shipaddress2, shipaddress3, shipcountry, shipcity, shipstate, shipzip, contact, phone, faxnbr, email, careof, quotdate, revdate, expdate, pricecode, pricecodedesc, taxcode, taxcodedesc, termcode, termcodedesc, shipviacd, shipviadesc, sp1, sp1pct, sp1name, sp2, sp2pct, sp2name, sp3, sp3pct, sp3name, fob, deliverydesc, whse, custpo, custref, hasnotes, error, errormsg, subtotal, salestax, freight, misccost, ordertotal, cost_total, margin_amt, margin_pct, dummy FROM quothed WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildQuothed $obj */
            $obj = new ChildQuothed();
            $obj->hydrate($row);
            QuothedTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildQuothed|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(QuothedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(QuothedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(QuothedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(QuothedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the quotnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotnbr('fooValue');   // WHERE quotnbr = 'fooValue'
     * $query->filterByQuotnbr('%fooValue%', Criteria::LIKE); // WHERE quotnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByQuotnbr($quotnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_QUOTNBR, $quotnbr, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the billname column
     *
     * Example usage:
     * <code>
     * $query->filterByBillname('fooValue');   // WHERE billname = 'fooValue'
     * $query->filterByBillname('%fooValue%', Criteria::LIKE); // WHERE billname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBillname($billname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLNAME, $billname, $comparison);
    }

    /**
     * Filter the query on the billaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByBilladdress('fooValue');   // WHERE billaddress = 'fooValue'
     * $query->filterByBilladdress('%fooValue%', Criteria::LIKE); // WHERE billaddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billaddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBilladdress($billaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLADDRESS, $billaddress, $comparison);
    }

    /**
     * Filter the query on the billaddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByBilladdress2('fooValue');   // WHERE billaddress2 = 'fooValue'
     * $query->filterByBilladdress2('%fooValue%', Criteria::LIKE); // WHERE billaddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billaddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBilladdress2($billaddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLADDRESS2, $billaddress2, $comparison);
    }

    /**
     * Filter the query on the billaddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterByBilladdress3('fooValue');   // WHERE billaddress3 = 'fooValue'
     * $query->filterByBilladdress3('%fooValue%', Criteria::LIKE); // WHERE billaddress3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billaddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBilladdress3($billaddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLADDRESS3, $billaddress3, $comparison);
    }

    /**
     * Filter the query on the billcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByBillcountry('fooValue');   // WHERE billcountry = 'fooValue'
     * $query->filterByBillcountry('%fooValue%', Criteria::LIKE); // WHERE billcountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billcountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBillcountry($billcountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billcountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLCOUNTRY, $billcountry, $comparison);
    }

    /**
     * Filter the query on the billcity column
     *
     * Example usage:
     * <code>
     * $query->filterByBillcity('fooValue');   // WHERE billcity = 'fooValue'
     * $query->filterByBillcity('%fooValue%', Criteria::LIKE); // WHERE billcity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billcity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBillcity($billcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLCITY, $billcity, $comparison);
    }

    /**
     * Filter the query on the billstate column
     *
     * Example usage:
     * <code>
     * $query->filterByBillstate('fooValue');   // WHERE billstate = 'fooValue'
     * $query->filterByBillstate('%fooValue%', Criteria::LIKE); // WHERE billstate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billstate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBillstate($billstate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billstate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLSTATE, $billstate, $comparison);
    }

    /**
     * Filter the query on the billzip column
     *
     * Example usage:
     * <code>
     * $query->filterByBillzip('fooValue');   // WHERE billzip = 'fooValue'
     * $query->filterByBillzip('%fooValue%', Criteria::LIKE); // WHERE billzip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billzip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByBillzip($billzip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billzip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_BILLZIP, $billzip, $comparison);
    }

    /**
     * Filter the query on the shiptoid column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoid('fooValue');   // WHERE shiptoid = 'fooValue'
     * $query->filterByShiptoid('%fooValue%', Criteria::LIKE); // WHERE shiptoid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the shipname column
     *
     * Example usage:
     * <code>
     * $query->filterByShipname('fooValue');   // WHERE shipname = 'fooValue'
     * $query->filterByShipname('%fooValue%', Criteria::LIKE); // WHERE shipname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipname($shipname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPNAME, $shipname, $comparison);
    }

    /**
     * Filter the query on the shipaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress('fooValue');   // WHERE shipaddress = 'fooValue'
     * $query->filterByShipaddress('%fooValue%', Criteria::LIKE); // WHERE shipaddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipaddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipaddress($shipaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPADDRESS, $shipaddress, $comparison);
    }

    /**
     * Filter the query on the shipaddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress2('fooValue');   // WHERE shipaddress2 = 'fooValue'
     * $query->filterByShipaddress2('%fooValue%', Criteria::LIKE); // WHERE shipaddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipaddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipaddress2($shipaddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPADDRESS2, $shipaddress2, $comparison);
    }

    /**
     * Filter the query on the shipaddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress3('fooValue');   // WHERE shipaddress3 = 'fooValue'
     * $query->filterByShipaddress3('%fooValue%', Criteria::LIKE); // WHERE shipaddress3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipaddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipaddress3($shipaddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPADDRESS3, $shipaddress3, $comparison);
    }

    /**
     * Filter the query on the shipcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcountry('fooValue');   // WHERE shipcountry = 'fooValue'
     * $query->filterByShipcountry('%fooValue%', Criteria::LIKE); // WHERE shipcountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipcountry($shipcountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPCOUNTRY, $shipcountry, $comparison);
    }

    /**
     * Filter the query on the shipcity column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcity('fooValue');   // WHERE shipcity = 'fooValue'
     * $query->filterByShipcity('%fooValue%', Criteria::LIKE); // WHERE shipcity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipcity($shipcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPCITY, $shipcity, $comparison);
    }

    /**
     * Filter the query on the shipstate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipstate('fooValue');   // WHERE shipstate = 'fooValue'
     * $query->filterByShipstate('%fooValue%', Criteria::LIKE); // WHERE shipstate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipstate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipstate($shipstate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipstate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPSTATE, $shipstate, $comparison);
    }

    /**
     * Filter the query on the shipzip column
     *
     * Example usage:
     * <code>
     * $query->filterByShipzip('fooValue');   // WHERE shipzip = 'fooValue'
     * $query->filterByShipzip('%fooValue%', Criteria::LIKE); // WHERE shipzip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipzip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipzip($shipzip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipzip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPZIP, $shipzip, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%', Criteria::LIKE); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the faxnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxnbr('fooValue');   // WHERE faxnbr = 'fooValue'
     * $query->filterByFaxnbr('%fooValue%', Criteria::LIKE); // WHERE faxnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByFaxnbr($faxnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_FAXNBR, $faxnbr, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the careof column
     *
     * Example usage:
     * <code>
     * $query->filterByCareof('fooValue');   // WHERE careof = 'fooValue'
     * $query->filterByCareof('%fooValue%', Criteria::LIKE); // WHERE careof LIKE '%fooValue%'
     * </code>
     *
     * @param     string $careof The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByCareof($careof = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($careof)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_CAREOF, $careof, $comparison);
    }

    /**
     * Filter the query on the quotdate column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotdate('fooValue');   // WHERE quotdate = 'fooValue'
     * $query->filterByQuotdate('%fooValue%', Criteria::LIKE); // WHERE quotdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByQuotdate($quotdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_QUOTDATE, $quotdate, $comparison);
    }

    /**
     * Filter the query on the revdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRevdate('fooValue');   // WHERE revdate = 'fooValue'
     * $query->filterByRevdate('%fooValue%', Criteria::LIKE); // WHERE revdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $revdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByRevdate($revdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($revdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_REVDATE, $revdate, $comparison);
    }

    /**
     * Filter the query on the expdate column
     *
     * Example usage:
     * <code>
     * $query->filterByExpdate('fooValue');   // WHERE expdate = 'fooValue'
     * $query->filterByExpdate('%fooValue%', Criteria::LIKE); // WHERE expdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByExpdate($expdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_EXPDATE, $expdate, $comparison);
    }

    /**
     * Filter the query on the pricecode column
     *
     * Example usage:
     * <code>
     * $query->filterByPricecode('fooValue');   // WHERE pricecode = 'fooValue'
     * $query->filterByPricecode('%fooValue%', Criteria::LIKE); // WHERE pricecode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pricecode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByPricecode($pricecode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricecode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_PRICECODE, $pricecode, $comparison);
    }

    /**
     * Filter the query on the pricecodedesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPricecodedesc('fooValue');   // WHERE pricecodedesc = 'fooValue'
     * $query->filterByPricecodedesc('%fooValue%', Criteria::LIKE); // WHERE pricecodedesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pricecodedesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByPricecodedesc($pricecodedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricecodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_PRICECODEDESC, $pricecodedesc, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByTaxcode($taxcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_TAXCODE, $taxcode, $comparison);
    }

    /**
     * Filter the query on the taxcodedesc column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcodedesc('fooValue');   // WHERE taxcodedesc = 'fooValue'
     * $query->filterByTaxcodedesc('%fooValue%', Criteria::LIKE); // WHERE taxcodedesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $taxcodedesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByTaxcodedesc($taxcodedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_TAXCODEDESC, $taxcodedesc, $comparison);
    }

    /**
     * Filter the query on the termcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTermcode('fooValue');   // WHERE termcode = 'fooValue'
     * $query->filterByTermcode('%fooValue%', Criteria::LIKE); // WHERE termcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByTermcode($termcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_TERMCODE, $termcode, $comparison);
    }

    /**
     * Filter the query on the termcodedesc column
     *
     * Example usage:
     * <code>
     * $query->filterByTermcodedesc('fooValue');   // WHERE termcodedesc = 'fooValue'
     * $query->filterByTermcodedesc('%fooValue%', Criteria::LIKE); // WHERE termcodedesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termcodedesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByTermcodedesc($termcodedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_TERMCODEDESC, $termcodedesc, $comparison);
    }

    /**
     * Filter the query on the shipviacd column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviacd('fooValue');   // WHERE shipviacd = 'fooValue'
     * $query->filterByShipviacd('%fooValue%', Criteria::LIKE); // WHERE shipviacd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipviacd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipviacd($shipviacd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviacd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPVIACD, $shipviacd, $comparison);
    }

    /**
     * Filter the query on the shipviadesc column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviadesc('fooValue');   // WHERE shipviadesc = 'fooValue'
     * $query->filterByShipviadesc('%fooValue%', Criteria::LIKE); // WHERE shipviadesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipviadesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByShipviadesc($shipviadesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviadesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SHIPVIADESC, $shipviadesc, $comparison);
    }

    /**
     * Filter the query on the sp1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1('fooValue');   // WHERE sp1 = 'fooValue'
     * $query->filterBySp1('%fooValue%', Criteria::LIKE); // WHERE sp1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp1($sp1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP1, $sp1, $comparison);
    }

    /**
     * Filter the query on the sp1pct column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1pct('fooValue');   // WHERE sp1pct = 'fooValue'
     * $query->filterBySp1pct('%fooValue%', Criteria::LIKE); // WHERE sp1pct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp1pct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp1pct($sp1pct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1pct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP1PCT, $sp1pct, $comparison);
    }

    /**
     * Filter the query on the sp1name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1name('fooValue');   // WHERE sp1name = 'fooValue'
     * $query->filterBySp1name('%fooValue%', Criteria::LIKE); // WHERE sp1name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp1name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp1name($sp1name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP1NAME, $sp1name, $comparison);
    }

    /**
     * Filter the query on the sp2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2('fooValue');   // WHERE sp2 = 'fooValue'
     * $query->filterBySp2('%fooValue%', Criteria::LIKE); // WHERE sp2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp2($sp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP2, $sp2, $comparison);
    }

    /**
     * Filter the query on the sp2pct column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2pct('fooValue');   // WHERE sp2pct = 'fooValue'
     * $query->filterBySp2pct('%fooValue%', Criteria::LIKE); // WHERE sp2pct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp2pct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp2pct($sp2pct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2pct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP2PCT, $sp2pct, $comparison);
    }

    /**
     * Filter the query on the sp2name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2name('fooValue');   // WHERE sp2name = 'fooValue'
     * $query->filterBySp2name('%fooValue%', Criteria::LIKE); // WHERE sp2name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp2name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp2name($sp2name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP2NAME, $sp2name, $comparison);
    }

    /**
     * Filter the query on the sp3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3('fooValue');   // WHERE sp3 = 'fooValue'
     * $query->filterBySp3('%fooValue%', Criteria::LIKE); // WHERE sp3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp3($sp3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP3, $sp3, $comparison);
    }

    /**
     * Filter the query on the sp3pct column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3pct('fooValue');   // WHERE sp3pct = 'fooValue'
     * $query->filterBySp3pct('%fooValue%', Criteria::LIKE); // WHERE sp3pct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp3pct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp3pct($sp3pct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3pct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP3PCT, $sp3pct, $comparison);
    }

    /**
     * Filter the query on the sp3name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3name('fooValue');   // WHERE sp3name = 'fooValue'
     * $query->filterBySp3name('%fooValue%', Criteria::LIKE); // WHERE sp3name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp3name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySp3name($sp3name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SP3NAME, $sp3name, $comparison);
    }

    /**
     * Filter the query on the fob column
     *
     * Example usage:
     * <code>
     * $query->filterByFob('fooValue');   // WHERE fob = 'fooValue'
     * $query->filterByFob('%fooValue%', Criteria::LIKE); // WHERE fob LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fob The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByFob($fob = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fob)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_FOB, $fob, $comparison);
    }

    /**
     * Filter the query on the deliverydesc column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliverydesc('fooValue');   // WHERE deliverydesc = 'fooValue'
     * $query->filterByDeliverydesc('%fooValue%', Criteria::LIKE); // WHERE deliverydesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $deliverydesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByDeliverydesc($deliverydesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deliverydesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_DELIVERYDESC, $deliverydesc, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_WHSE, $whse, $comparison);
    }

    /**
     * Filter the query on the custpo column
     *
     * Example usage:
     * <code>
     * $query->filterByCustpo('fooValue');   // WHERE custpo = 'fooValue'
     * $query->filterByCustpo('%fooValue%', Criteria::LIKE); // WHERE custpo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custpo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByCustpo($custpo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custpo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_CUSTPO, $custpo, $comparison);
    }

    /**
     * Filter the query on the custref column
     *
     * Example usage:
     * <code>
     * $query->filterByCustref('fooValue');   // WHERE custref = 'fooValue'
     * $query->filterByCustref('%fooValue%', Criteria::LIKE); // WHERE custref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByCustref($custref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_CUSTREF, $custref, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_HASNOTES, $hasnotes, $comparison);
    }

    /**
     * Filter the query on the error column
     *
     * Example usage:
     * <code>
     * $query->filterByError('fooValue');   // WHERE error = 'fooValue'
     * $query->filterByError('%fooValue%', Criteria::LIKE); // WHERE error LIKE '%fooValue%'
     * </code>
     *
     * @param     string $error The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_ERROR, $error, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_ERRORMSG, $errormsg, $comparison);
    }

    /**
     * Filter the query on the subtotal column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotal(1234); // WHERE subtotal = 1234
     * $query->filterBySubtotal(array(12, 34)); // WHERE subtotal IN (12, 34)
     * $query->filterBySubtotal(array('min' => 12)); // WHERE subtotal > 12
     * </code>
     *
     * @param     mixed $subtotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, $comparison = null)
    {
        if (is_array($subtotal)) {
            $useMinMax = false;
            if (isset($subtotal['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_SUBTOTAL, $subtotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subtotal['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_SUBTOTAL, $subtotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SUBTOTAL, $subtotal, $comparison);
    }

    /**
     * Filter the query on the salestax column
     *
     * Example usage:
     * <code>
     * $query->filterBySalestax(1234); // WHERE salestax = 1234
     * $query->filterBySalestax(array(12, 34)); // WHERE salestax IN (12, 34)
     * $query->filterBySalestax(array('min' => 12)); // WHERE salestax > 12
     * </code>
     *
     * @param     mixed $salestax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterBySalestax($salestax = null, $comparison = null)
    {
        if (is_array($salestax)) {
            $useMinMax = false;
            if (isset($salestax['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_SALESTAX, $salestax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salestax['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_SALESTAX, $salestax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_SALESTAX, $salestax, $comparison);
    }

    /**
     * Filter the query on the freight column
     *
     * Example usage:
     * <code>
     * $query->filterByFreight(1234); // WHERE freight = 1234
     * $query->filterByFreight(array(12, 34)); // WHERE freight IN (12, 34)
     * $query->filterByFreight(array('min' => 12)); // WHERE freight > 12
     * </code>
     *
     * @param     mixed $freight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByFreight($freight = null, $comparison = null)
    {
        if (is_array($freight)) {
            $useMinMax = false;
            if (isset($freight['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_FREIGHT, $freight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($freight['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_FREIGHT, $freight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_FREIGHT, $freight, $comparison);
    }

    /**
     * Filter the query on the misccost column
     *
     * Example usage:
     * <code>
     * $query->filterByMisccost(1234); // WHERE misccost = 1234
     * $query->filterByMisccost(array(12, 34)); // WHERE misccost IN (12, 34)
     * $query->filterByMisccost(array('min' => 12)); // WHERE misccost > 12
     * </code>
     *
     * @param     mixed $misccost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByMisccost($misccost = null, $comparison = null)
    {
        if (is_array($misccost)) {
            $useMinMax = false;
            if (isset($misccost['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_MISCCOST, $misccost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($misccost['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_MISCCOST, $misccost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_MISCCOST, $misccost, $comparison);
    }

    /**
     * Filter the query on the ordertotal column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdertotal(1234); // WHERE ordertotal = 1234
     * $query->filterByOrdertotal(array(12, 34)); // WHERE ordertotal IN (12, 34)
     * $query->filterByOrdertotal(array('min' => 12)); // WHERE ordertotal > 12
     * </code>
     *
     * @param     mixed $ordertotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByOrdertotal($ordertotal = null, $comparison = null)
    {
        if (is_array($ordertotal)) {
            $useMinMax = false;
            if (isset($ordertotal['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_ORDERTOTAL, $ordertotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ordertotal['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_ORDERTOTAL, $ordertotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_ORDERTOTAL, $ordertotal, $comparison);
    }

    /**
     * Filter the query on the cost_total column
     *
     * Example usage:
     * <code>
     * $query->filterByCostTotal(1234); // WHERE cost_total = 1234
     * $query->filterByCostTotal(array(12, 34)); // WHERE cost_total IN (12, 34)
     * $query->filterByCostTotal(array('min' => 12)); // WHERE cost_total > 12
     * </code>
     *
     * @param     mixed $costTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByCostTotal($costTotal = null, $comparison = null)
    {
        if (is_array($costTotal)) {
            $useMinMax = false;
            if (isset($costTotal['min'])) {
                $this->addUsingAlias(QuothedTableMap::COL_COST_TOTAL, $costTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costTotal['max'])) {
                $this->addUsingAlias(QuothedTableMap::COL_COST_TOTAL, $costTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_COST_TOTAL, $costTotal, $comparison);
    }

    /**
     * Filter the query on the margin_amt column
     *
     * Example usage:
     * <code>
     * $query->filterByMarginAmt('fooValue');   // WHERE margin_amt = 'fooValue'
     * $query->filterByMarginAmt('%fooValue%', Criteria::LIKE); // WHERE margin_amt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marginAmt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByMarginAmt($marginAmt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marginAmt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_MARGIN_AMT, $marginAmt, $comparison);
    }

    /**
     * Filter the query on the margin_pct column
     *
     * Example usage:
     * <code>
     * $query->filterByMarginPct('fooValue');   // WHERE margin_pct = 'fooValue'
     * $query->filterByMarginPct('%fooValue%', Criteria::LIKE); // WHERE margin_pct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marginPct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByMarginPct($marginPct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marginPct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_MARGIN_PCT, $marginPct, $comparison);
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
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuothedTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildQuothed $quothed Object to remove from the list of results
     *
     * @return $this|ChildQuothedQuery The current query, for fluid interface
     */
    public function prune($quothed = null)
    {
        if ($quothed) {
            $this->addCond('pruneCond0', $this->getAliasedColName(QuothedTableMap::COL_SESSIONID), $quothed->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(QuothedTableMap::COL_RECNO), $quothed->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the quothed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuothedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QuothedTableMap::clearInstancePool();
            QuothedTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(QuothedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QuothedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QuothedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QuothedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // QuothedQuery
