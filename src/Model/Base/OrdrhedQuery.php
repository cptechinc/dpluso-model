<?php

namespace Base;

use \Ordrhed as ChildOrdrhed;
use \OrdrhedQuery as ChildOrdrhedQuery;
use \Exception;
use \PDO;
use Map\OrdrhedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ordrhed' table.
 *
 *
 *
 * @method     ChildOrdrhedQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildOrdrhedQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildOrdrhedQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrdrhedQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOrdrhedQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOrdrhedQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildOrdrhedQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildOrdrhedQuery orderByCustname($order = Criteria::ASC) Order by the custname column
 * @method     ChildOrdrhedQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildOrdrhedQuery orderByCustpo($order = Criteria::ASC) Order by the custpo column
 * @method     ChildOrdrhedQuery orderByCustref($order = Criteria::ASC) Order by the custref column
 * @method     ChildOrdrhedQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOrdrhedQuery orderByOrderdate($order = Criteria::ASC) Order by the orderdate column
 * @method     ChildOrdrhedQuery orderByCareof($order = Criteria::ASC) Order by the careof column
 * @method     ChildOrdrhedQuery orderByQuotdate($order = Criteria::ASC) Order by the quotdate column
 * @method     ChildOrdrhedQuery orderByInvdate($order = Criteria::ASC) Order by the invdate column
 * @method     ChildOrdrhedQuery orderByShipdate($order = Criteria::ASC) Order by the shipdate column
 * @method     ChildOrdrhedQuery orderByRevdate($order = Criteria::ASC) Order by the revdate column
 * @method     ChildOrdrhedQuery orderByExpdate($order = Criteria::ASC) Order by the expdate column
 * @method     ChildOrdrhedQuery orderByHasdocuments($order = Criteria::ASC) Order by the hasdocuments column
 * @method     ChildOrdrhedQuery orderByHastracking($order = Criteria::ASC) Order by the hastracking column
 * @method     ChildOrdrhedQuery orderBySubtotal($order = Criteria::ASC) Order by the subtotal column
 * @method     ChildOrdrhedQuery orderBySalestax($order = Criteria::ASC) Order by the salestax column
 * @method     ChildOrdrhedQuery orderByFreight($order = Criteria::ASC) Order by the freight column
 * @method     ChildOrdrhedQuery orderByMisccost($order = Criteria::ASC) Order by the misccost column
 * @method     ChildOrdrhedQuery orderByOrdertotal($order = Criteria::ASC) Order by the ordertotal column
 * @method     ChildOrdrhedQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildOrdrhedQuery orderByEditord($order = Criteria::ASC) Order by the editord column
 * @method     ChildOrdrhedQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildOrdrhedQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildOrdrhedQuery orderBySconame($order = Criteria::ASC) Order by the sconame column
 * @method     ChildOrdrhedQuery orderByShipname($order = Criteria::ASC) Order by the shipname column
 * @method     ChildOrdrhedQuery orderByShipaddress($order = Criteria::ASC) Order by the shipaddress column
 * @method     ChildOrdrhedQuery orderByShipaddress2($order = Criteria::ASC) Order by the shipaddress2 column
 * @method     ChildOrdrhedQuery orderByShipcity($order = Criteria::ASC) Order by the shipcity column
 * @method     ChildOrdrhedQuery orderByShipstate($order = Criteria::ASC) Order by the shipstate column
 * @method     ChildOrdrhedQuery orderByShipzip($order = Criteria::ASC) Order by the shipzip column
 * @method     ChildOrdrhedQuery orderByShipcountry($order = Criteria::ASC) Order by the shipcountry column
 * @method     ChildOrdrhedQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildOrdrhedQuery orderByPhintl($order = Criteria::ASC) Order by the phintl column
 * @method     ChildOrdrhedQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildOrdrhedQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildOrdrhedQuery orderByFaxnbr($order = Criteria::ASC) Order by the faxnbr column
 * @method     ChildOrdrhedQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildOrdrhedQuery orderByReleasenbr($order = Criteria::ASC) Order by the releasenbr column
 * @method     ChildOrdrhedQuery orderByShipviacd($order = Criteria::ASC) Order by the shipviacd column
 * @method     ChildOrdrhedQuery orderByShipviadesc($order = Criteria::ASC) Order by the shipviadesc column
 * @method     ChildOrdrhedQuery orderByPricecode($order = Criteria::ASC) Order by the pricecode column
 * @method     ChildOrdrhedQuery orderByPricecodedesc($order = Criteria::ASC) Order by the pricecodedesc column
 * @method     ChildOrdrhedQuery orderByPricedisp($order = Criteria::ASC) Order by the pricedisp column
 * @method     ChildOrdrhedQuery orderByTaxcode($order = Criteria::ASC) Order by the taxcode column
 * @method     ChildOrdrhedQuery orderByTaxcodedesc($order = Criteria::ASC) Order by the taxcodedesc column
 * @method     ChildOrdrhedQuery orderByTaxcodedisp($order = Criteria::ASC) Order by the taxcodedisp column
 * @method     ChildOrdrhedQuery orderByTermcode($order = Criteria::ASC) Order by the termcode column
 * @method     ChildOrdrhedQuery orderByTermtype($order = Criteria::ASC) Order by the termtype column
 * @method     ChildOrdrhedQuery orderByTermcodedesc($order = Criteria::ASC) Order by the termcodedesc column
 * @method     ChildOrdrhedQuery orderByRqstdate($order = Criteria::ASC) Order by the rqstdate column
 * @method     ChildOrdrhedQuery orderByShipcom($order = Criteria::ASC) Order by the shipcom column
 * @method     ChildOrdrhedQuery orderBySp1($order = Criteria::ASC) Order by the sp1 column
 * @method     ChildOrdrhedQuery orderBySp1name($order = Criteria::ASC) Order by the sp1name column
 * @method     ChildOrdrhedQuery orderBySp2($order = Criteria::ASC) Order by the sp2 column
 * @method     ChildOrdrhedQuery orderBySp2name($order = Criteria::ASC) Order by the sp2name column
 * @method     ChildOrdrhedQuery orderBySp2disp($order = Criteria::ASC) Order by the sp2disp column
 * @method     ChildOrdrhedQuery orderBySp3($order = Criteria::ASC) Order by the sp3 column
 * @method     ChildOrdrhedQuery orderBySp3name($order = Criteria::ASC) Order by the sp3name column
 * @method     ChildOrdrhedQuery orderBySp3disp($order = Criteria::ASC) Order by the sp3disp column
 * @method     ChildOrdrhedQuery orderByFob($order = Criteria::ASC) Order by the fob column
 * @method     ChildOrdrhedQuery orderByDeliverydesc($order = Criteria::ASC) Order by the deliverydesc column
 * @method     ChildOrdrhedQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildOrdrhedQuery orderByCardnumber($order = Criteria::ASC) Order by the cardnumber column
 * @method     ChildOrdrhedQuery orderByCardexpire($order = Criteria::ASC) Order by the cardexpire column
 * @method     ChildOrdrhedQuery orderByCardcode($order = Criteria::ASC) Order by the cardcode column
 * @method     ChildOrdrhedQuery orderByCardapproval($order = Criteria::ASC) Order by the cardapproval column
 * @method     ChildOrdrhedQuery orderByTotalcost($order = Criteria::ASC) Order by the totalcost column
 * @method     ChildOrdrhedQuery orderByTotaldiscount($order = Criteria::ASC) Order by the totaldiscount column
 * @method     ChildOrdrhedQuery orderByPaymenttype($order = Criteria::ASC) Order by the paymenttype column
 * @method     ChildOrdrhedQuery orderBySrcdatefrom($order = Criteria::ASC) Order by the srcdatefrom column
 * @method     ChildOrdrhedQuery orderBySrcdatethru($order = Criteria::ASC) Order by the srcdatethru column
 * @method     ChildOrdrhedQuery orderByBillname($order = Criteria::ASC) Order by the billname column
 * @method     ChildOrdrhedQuery orderByBilladdress($order = Criteria::ASC) Order by the billaddress column
 * @method     ChildOrdrhedQuery orderByBilladdress2($order = Criteria::ASC) Order by the billaddress2 column
 * @method     ChildOrdrhedQuery orderByBilladdress3($order = Criteria::ASC) Order by the billaddress3 column
 * @method     ChildOrdrhedQuery orderByBillcountry($order = Criteria::ASC) Order by the billcountry column
 * @method     ChildOrdrhedQuery orderByBillcity($order = Criteria::ASC) Order by the billcity column
 * @method     ChildOrdrhedQuery orderByBillstate($order = Criteria::ASC) Order by the billstate column
 * @method     ChildOrdrhedQuery orderByBillzip($order = Criteria::ASC) Order by the billzip column
 * @method     ChildOrdrhedQuery orderByPrntfmt($order = Criteria::ASC) Order by the prntfmt column
 * @method     ChildOrdrhedQuery orderByPrntfmtdisp($order = Criteria::ASC) Order by the prntfmtdisp column
 * @method     ChildOrdrhedQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildOrdrhedQuery groupBySessionid() Group by the sessionid column
 * @method     ChildOrdrhedQuery groupByRecno() Group by the recno column
 * @method     ChildOrdrhedQuery groupByDate() Group by the date column
 * @method     ChildOrdrhedQuery groupByTime() Group by the time column
 * @method     ChildOrdrhedQuery groupByType() Group by the type column
 * @method     ChildOrdrhedQuery groupByCustid() Group by the custid column
 * @method     ChildOrdrhedQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildOrdrhedQuery groupByCustname() Group by the custname column
 * @method     ChildOrdrhedQuery groupByOrderno() Group by the orderno column
 * @method     ChildOrdrhedQuery groupByCustpo() Group by the custpo column
 * @method     ChildOrdrhedQuery groupByCustref() Group by the custref column
 * @method     ChildOrdrhedQuery groupByStatus() Group by the status column
 * @method     ChildOrdrhedQuery groupByOrderdate() Group by the orderdate column
 * @method     ChildOrdrhedQuery groupByCareof() Group by the careof column
 * @method     ChildOrdrhedQuery groupByQuotdate() Group by the quotdate column
 * @method     ChildOrdrhedQuery groupByInvdate() Group by the invdate column
 * @method     ChildOrdrhedQuery groupByShipdate() Group by the shipdate column
 * @method     ChildOrdrhedQuery groupByRevdate() Group by the revdate column
 * @method     ChildOrdrhedQuery groupByExpdate() Group by the expdate column
 * @method     ChildOrdrhedQuery groupByHasdocuments() Group by the hasdocuments column
 * @method     ChildOrdrhedQuery groupByHastracking() Group by the hastracking column
 * @method     ChildOrdrhedQuery groupBySubtotal() Group by the subtotal column
 * @method     ChildOrdrhedQuery groupBySalestax() Group by the salestax column
 * @method     ChildOrdrhedQuery groupByFreight() Group by the freight column
 * @method     ChildOrdrhedQuery groupByMisccost() Group by the misccost column
 * @method     ChildOrdrhedQuery groupByOrdertotal() Group by the ordertotal column
 * @method     ChildOrdrhedQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildOrdrhedQuery groupByEditord() Group by the editord column
 * @method     ChildOrdrhedQuery groupByError() Group by the error column
 * @method     ChildOrdrhedQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildOrdrhedQuery groupBySconame() Group by the sconame column
 * @method     ChildOrdrhedQuery groupByShipname() Group by the shipname column
 * @method     ChildOrdrhedQuery groupByShipaddress() Group by the shipaddress column
 * @method     ChildOrdrhedQuery groupByShipaddress2() Group by the shipaddress2 column
 * @method     ChildOrdrhedQuery groupByShipcity() Group by the shipcity column
 * @method     ChildOrdrhedQuery groupByShipstate() Group by the shipstate column
 * @method     ChildOrdrhedQuery groupByShipzip() Group by the shipzip column
 * @method     ChildOrdrhedQuery groupByShipcountry() Group by the shipcountry column
 * @method     ChildOrdrhedQuery groupByContact() Group by the contact column
 * @method     ChildOrdrhedQuery groupByPhintl() Group by the phintl column
 * @method     ChildOrdrhedQuery groupByPhone() Group by the phone column
 * @method     ChildOrdrhedQuery groupByExtension() Group by the extension column
 * @method     ChildOrdrhedQuery groupByFaxnbr() Group by the faxnbr column
 * @method     ChildOrdrhedQuery groupByEmail() Group by the email column
 * @method     ChildOrdrhedQuery groupByReleasenbr() Group by the releasenbr column
 * @method     ChildOrdrhedQuery groupByShipviacd() Group by the shipviacd column
 * @method     ChildOrdrhedQuery groupByShipviadesc() Group by the shipviadesc column
 * @method     ChildOrdrhedQuery groupByPricecode() Group by the pricecode column
 * @method     ChildOrdrhedQuery groupByPricecodedesc() Group by the pricecodedesc column
 * @method     ChildOrdrhedQuery groupByPricedisp() Group by the pricedisp column
 * @method     ChildOrdrhedQuery groupByTaxcode() Group by the taxcode column
 * @method     ChildOrdrhedQuery groupByTaxcodedesc() Group by the taxcodedesc column
 * @method     ChildOrdrhedQuery groupByTaxcodedisp() Group by the taxcodedisp column
 * @method     ChildOrdrhedQuery groupByTermcode() Group by the termcode column
 * @method     ChildOrdrhedQuery groupByTermtype() Group by the termtype column
 * @method     ChildOrdrhedQuery groupByTermcodedesc() Group by the termcodedesc column
 * @method     ChildOrdrhedQuery groupByRqstdate() Group by the rqstdate column
 * @method     ChildOrdrhedQuery groupByShipcom() Group by the shipcom column
 * @method     ChildOrdrhedQuery groupBySp1() Group by the sp1 column
 * @method     ChildOrdrhedQuery groupBySp1name() Group by the sp1name column
 * @method     ChildOrdrhedQuery groupBySp2() Group by the sp2 column
 * @method     ChildOrdrhedQuery groupBySp2name() Group by the sp2name column
 * @method     ChildOrdrhedQuery groupBySp2disp() Group by the sp2disp column
 * @method     ChildOrdrhedQuery groupBySp3() Group by the sp3 column
 * @method     ChildOrdrhedQuery groupBySp3name() Group by the sp3name column
 * @method     ChildOrdrhedQuery groupBySp3disp() Group by the sp3disp column
 * @method     ChildOrdrhedQuery groupByFob() Group by the fob column
 * @method     ChildOrdrhedQuery groupByDeliverydesc() Group by the deliverydesc column
 * @method     ChildOrdrhedQuery groupByWhse() Group by the whse column
 * @method     ChildOrdrhedQuery groupByCardnumber() Group by the cardnumber column
 * @method     ChildOrdrhedQuery groupByCardexpire() Group by the cardexpire column
 * @method     ChildOrdrhedQuery groupByCardcode() Group by the cardcode column
 * @method     ChildOrdrhedQuery groupByCardapproval() Group by the cardapproval column
 * @method     ChildOrdrhedQuery groupByTotalcost() Group by the totalcost column
 * @method     ChildOrdrhedQuery groupByTotaldiscount() Group by the totaldiscount column
 * @method     ChildOrdrhedQuery groupByPaymenttype() Group by the paymenttype column
 * @method     ChildOrdrhedQuery groupBySrcdatefrom() Group by the srcdatefrom column
 * @method     ChildOrdrhedQuery groupBySrcdatethru() Group by the srcdatethru column
 * @method     ChildOrdrhedQuery groupByBillname() Group by the billname column
 * @method     ChildOrdrhedQuery groupByBilladdress() Group by the billaddress column
 * @method     ChildOrdrhedQuery groupByBilladdress2() Group by the billaddress2 column
 * @method     ChildOrdrhedQuery groupByBilladdress3() Group by the billaddress3 column
 * @method     ChildOrdrhedQuery groupByBillcountry() Group by the billcountry column
 * @method     ChildOrdrhedQuery groupByBillcity() Group by the billcity column
 * @method     ChildOrdrhedQuery groupByBillstate() Group by the billstate column
 * @method     ChildOrdrhedQuery groupByBillzip() Group by the billzip column
 * @method     ChildOrdrhedQuery groupByPrntfmt() Group by the prntfmt column
 * @method     ChildOrdrhedQuery groupByPrntfmtdisp() Group by the prntfmtdisp column
 * @method     ChildOrdrhedQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildOrdrhedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdrhedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdrhedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdrhedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdrhedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdrhedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrdrhed findOne(ConnectionInterface $con = null) Return the first ChildOrdrhed matching the query
 * @method     ChildOrdrhed findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrdrhed matching the query, or a new ChildOrdrhed object populated from the query conditions when no match is found
 *
 * @method     ChildOrdrhed findOneBySessionid(string $sessionid) Return the first ChildOrdrhed filtered by the sessionid column
 * @method     ChildOrdrhed findOneByRecno(int $recno) Return the first ChildOrdrhed filtered by the recno column
 * @method     ChildOrdrhed findOneByDate(int $date) Return the first ChildOrdrhed filtered by the date column
 * @method     ChildOrdrhed findOneByTime(int $time) Return the first ChildOrdrhed filtered by the time column
 * @method     ChildOrdrhed findOneByType(string $type) Return the first ChildOrdrhed filtered by the type column
 * @method     ChildOrdrhed findOneByCustid(string $custid) Return the first ChildOrdrhed filtered by the custid column
 * @method     ChildOrdrhed findOneByShiptoid(string $shiptoid) Return the first ChildOrdrhed filtered by the shiptoid column
 * @method     ChildOrdrhed findOneByCustname(string $custname) Return the first ChildOrdrhed filtered by the custname column
 * @method     ChildOrdrhed findOneByOrderno(string $orderno) Return the first ChildOrdrhed filtered by the orderno column
 * @method     ChildOrdrhed findOneByCustpo(string $custpo) Return the first ChildOrdrhed filtered by the custpo column
 * @method     ChildOrdrhed findOneByCustref(string $custref) Return the first ChildOrdrhed filtered by the custref column
 * @method     ChildOrdrhed findOneByStatus(string $status) Return the first ChildOrdrhed filtered by the status column
 * @method     ChildOrdrhed findOneByOrderdate(string $orderdate) Return the first ChildOrdrhed filtered by the orderdate column
 * @method     ChildOrdrhed findOneByCareof(string $careof) Return the first ChildOrdrhed filtered by the careof column
 * @method     ChildOrdrhed findOneByQuotdate(string $quotdate) Return the first ChildOrdrhed filtered by the quotdate column
 * @method     ChildOrdrhed findOneByInvdate(string $invdate) Return the first ChildOrdrhed filtered by the invdate column
 * @method     ChildOrdrhed findOneByShipdate(string $shipdate) Return the first ChildOrdrhed filtered by the shipdate column
 * @method     ChildOrdrhed findOneByRevdate(string $revdate) Return the first ChildOrdrhed filtered by the revdate column
 * @method     ChildOrdrhed findOneByExpdate(string $expdate) Return the first ChildOrdrhed filtered by the expdate column
 * @method     ChildOrdrhed findOneByHasdocuments(string $hasdocuments) Return the first ChildOrdrhed filtered by the hasdocuments column
 * @method     ChildOrdrhed findOneByHastracking(string $hastracking) Return the first ChildOrdrhed filtered by the hastracking column
 * @method     ChildOrdrhed findOneBySubtotal(string $subtotal) Return the first ChildOrdrhed filtered by the subtotal column
 * @method     ChildOrdrhed findOneBySalestax(string $salestax) Return the first ChildOrdrhed filtered by the salestax column
 * @method     ChildOrdrhed findOneByFreight(string $freight) Return the first ChildOrdrhed filtered by the freight column
 * @method     ChildOrdrhed findOneByMisccost(string $misccost) Return the first ChildOrdrhed filtered by the misccost column
 * @method     ChildOrdrhed findOneByOrdertotal(string $ordertotal) Return the first ChildOrdrhed filtered by the ordertotal column
 * @method     ChildOrdrhed findOneByHasnotes(string $hasnotes) Return the first ChildOrdrhed filtered by the hasnotes column
 * @method     ChildOrdrhed findOneByEditord(string $editord) Return the first ChildOrdrhed filtered by the editord column
 * @method     ChildOrdrhed findOneByError(string $error) Return the first ChildOrdrhed filtered by the error column
 * @method     ChildOrdrhed findOneByErrormsg(string $errormsg) Return the first ChildOrdrhed filtered by the errormsg column
 * @method     ChildOrdrhed findOneBySconame(string $sconame) Return the first ChildOrdrhed filtered by the sconame column
 * @method     ChildOrdrhed findOneByShipname(string $shipname) Return the first ChildOrdrhed filtered by the shipname column
 * @method     ChildOrdrhed findOneByShipaddress(string $shipaddress) Return the first ChildOrdrhed filtered by the shipaddress column
 * @method     ChildOrdrhed findOneByShipaddress2(string $shipaddress2) Return the first ChildOrdrhed filtered by the shipaddress2 column
 * @method     ChildOrdrhed findOneByShipcity(string $shipcity) Return the first ChildOrdrhed filtered by the shipcity column
 * @method     ChildOrdrhed findOneByShipstate(string $shipstate) Return the first ChildOrdrhed filtered by the shipstate column
 * @method     ChildOrdrhed findOneByShipzip(string $shipzip) Return the first ChildOrdrhed filtered by the shipzip column
 * @method     ChildOrdrhed findOneByShipcountry(string $shipcountry) Return the first ChildOrdrhed filtered by the shipcountry column
 * @method     ChildOrdrhed findOneByContact(string $contact) Return the first ChildOrdrhed filtered by the contact column
 * @method     ChildOrdrhed findOneByPhintl(string $phintl) Return the first ChildOrdrhed filtered by the phintl column
 * @method     ChildOrdrhed findOneByPhone(string $phone) Return the first ChildOrdrhed filtered by the phone column
 * @method     ChildOrdrhed findOneByExtension(string $extension) Return the first ChildOrdrhed filtered by the extension column
 * @method     ChildOrdrhed findOneByFaxnbr(string $faxnbr) Return the first ChildOrdrhed filtered by the faxnbr column
 * @method     ChildOrdrhed findOneByEmail(string $email) Return the first ChildOrdrhed filtered by the email column
 * @method     ChildOrdrhed findOneByReleasenbr(string $releasenbr) Return the first ChildOrdrhed filtered by the releasenbr column
 * @method     ChildOrdrhed findOneByShipviacd(string $shipviacd) Return the first ChildOrdrhed filtered by the shipviacd column
 * @method     ChildOrdrhed findOneByShipviadesc(string $shipviadesc) Return the first ChildOrdrhed filtered by the shipviadesc column
 * @method     ChildOrdrhed findOneByPricecode(string $pricecode) Return the first ChildOrdrhed filtered by the pricecode column
 * @method     ChildOrdrhed findOneByPricecodedesc(string $pricecodedesc) Return the first ChildOrdrhed filtered by the pricecodedesc column
 * @method     ChildOrdrhed findOneByPricedisp(string $pricedisp) Return the first ChildOrdrhed filtered by the pricedisp column
 * @method     ChildOrdrhed findOneByTaxcode(string $taxcode) Return the first ChildOrdrhed filtered by the taxcode column
 * @method     ChildOrdrhed findOneByTaxcodedesc(string $taxcodedesc) Return the first ChildOrdrhed filtered by the taxcodedesc column
 * @method     ChildOrdrhed findOneByTaxcodedisp(string $taxcodedisp) Return the first ChildOrdrhed filtered by the taxcodedisp column
 * @method     ChildOrdrhed findOneByTermcode(string $termcode) Return the first ChildOrdrhed filtered by the termcode column
 * @method     ChildOrdrhed findOneByTermtype(string $termtype) Return the first ChildOrdrhed filtered by the termtype column
 * @method     ChildOrdrhed findOneByTermcodedesc(string $termcodedesc) Return the first ChildOrdrhed filtered by the termcodedesc column
 * @method     ChildOrdrhed findOneByRqstdate(string $rqstdate) Return the first ChildOrdrhed filtered by the rqstdate column
 * @method     ChildOrdrhed findOneByShipcom(string $shipcom) Return the first ChildOrdrhed filtered by the shipcom column
 * @method     ChildOrdrhed findOneBySp1(string $sp1) Return the first ChildOrdrhed filtered by the sp1 column
 * @method     ChildOrdrhed findOneBySp1name(string $sp1name) Return the first ChildOrdrhed filtered by the sp1name column
 * @method     ChildOrdrhed findOneBySp2(string $sp2) Return the first ChildOrdrhed filtered by the sp2 column
 * @method     ChildOrdrhed findOneBySp2name(string $sp2name) Return the first ChildOrdrhed filtered by the sp2name column
 * @method     ChildOrdrhed findOneBySp2disp(string $sp2disp) Return the first ChildOrdrhed filtered by the sp2disp column
 * @method     ChildOrdrhed findOneBySp3(string $sp3) Return the first ChildOrdrhed filtered by the sp3 column
 * @method     ChildOrdrhed findOneBySp3name(string $sp3name) Return the first ChildOrdrhed filtered by the sp3name column
 * @method     ChildOrdrhed findOneBySp3disp(string $sp3disp) Return the first ChildOrdrhed filtered by the sp3disp column
 * @method     ChildOrdrhed findOneByFob(string $fob) Return the first ChildOrdrhed filtered by the fob column
 * @method     ChildOrdrhed findOneByDeliverydesc(string $deliverydesc) Return the first ChildOrdrhed filtered by the deliverydesc column
 * @method     ChildOrdrhed findOneByWhse(string $whse) Return the first ChildOrdrhed filtered by the whse column
 * @method     ChildOrdrhed findOneByCardnumber(string $cardnumber) Return the first ChildOrdrhed filtered by the cardnumber column
 * @method     ChildOrdrhed findOneByCardexpire(string $cardexpire) Return the first ChildOrdrhed filtered by the cardexpire column
 * @method     ChildOrdrhed findOneByCardcode(string $cardcode) Return the first ChildOrdrhed filtered by the cardcode column
 * @method     ChildOrdrhed findOneByCardapproval(string $cardapproval) Return the first ChildOrdrhed filtered by the cardapproval column
 * @method     ChildOrdrhed findOneByTotalcost(string $totalcost) Return the first ChildOrdrhed filtered by the totalcost column
 * @method     ChildOrdrhed findOneByTotaldiscount(string $totaldiscount) Return the first ChildOrdrhed filtered by the totaldiscount column
 * @method     ChildOrdrhed findOneByPaymenttype(string $paymenttype) Return the first ChildOrdrhed filtered by the paymenttype column
 * @method     ChildOrdrhed findOneBySrcdatefrom(string $srcdatefrom) Return the first ChildOrdrhed filtered by the srcdatefrom column
 * @method     ChildOrdrhed findOneBySrcdatethru(string $srcdatethru) Return the first ChildOrdrhed filtered by the srcdatethru column
 * @method     ChildOrdrhed findOneByBillname(string $billname) Return the first ChildOrdrhed filtered by the billname column
 * @method     ChildOrdrhed findOneByBilladdress(string $billaddress) Return the first ChildOrdrhed filtered by the billaddress column
 * @method     ChildOrdrhed findOneByBilladdress2(string $billaddress2) Return the first ChildOrdrhed filtered by the billaddress2 column
 * @method     ChildOrdrhed findOneByBilladdress3(string $billaddress3) Return the first ChildOrdrhed filtered by the billaddress3 column
 * @method     ChildOrdrhed findOneByBillcountry(string $billcountry) Return the first ChildOrdrhed filtered by the billcountry column
 * @method     ChildOrdrhed findOneByBillcity(string $billcity) Return the first ChildOrdrhed filtered by the billcity column
 * @method     ChildOrdrhed findOneByBillstate(string $billstate) Return the first ChildOrdrhed filtered by the billstate column
 * @method     ChildOrdrhed findOneByBillzip(string $billzip) Return the first ChildOrdrhed filtered by the billzip column
 * @method     ChildOrdrhed findOneByPrntfmt(string $prntfmt) Return the first ChildOrdrhed filtered by the prntfmt column
 * @method     ChildOrdrhed findOneByPrntfmtdisp(string $prntfmtdisp) Return the first ChildOrdrhed filtered by the prntfmtdisp column
 * @method     ChildOrdrhed findOneByDummy(string $dummy) Return the first ChildOrdrhed filtered by the dummy column *

 * @method     ChildOrdrhed requirePk($key, ConnectionInterface $con = null) Return the ChildOrdrhed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOne(ConnectionInterface $con = null) Return the first ChildOrdrhed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrhed requireOneBySessionid(string $sessionid) Return the first ChildOrdrhed filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByRecno(int $recno) Return the first ChildOrdrhed filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByDate(int $date) Return the first ChildOrdrhed filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTime(int $time) Return the first ChildOrdrhed filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByType(string $type) Return the first ChildOrdrhed filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCustid(string $custid) Return the first ChildOrdrhed filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShiptoid(string $shiptoid) Return the first ChildOrdrhed filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCustname(string $custname) Return the first ChildOrdrhed filtered by the custname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByOrderno(string $orderno) Return the first ChildOrdrhed filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCustpo(string $custpo) Return the first ChildOrdrhed filtered by the custpo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCustref(string $custref) Return the first ChildOrdrhed filtered by the custref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByStatus(string $status) Return the first ChildOrdrhed filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByOrderdate(string $orderdate) Return the first ChildOrdrhed filtered by the orderdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCareof(string $careof) Return the first ChildOrdrhed filtered by the careof column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByQuotdate(string $quotdate) Return the first ChildOrdrhed filtered by the quotdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByInvdate(string $invdate) Return the first ChildOrdrhed filtered by the invdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipdate(string $shipdate) Return the first ChildOrdrhed filtered by the shipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByRevdate(string $revdate) Return the first ChildOrdrhed filtered by the revdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByExpdate(string $expdate) Return the first ChildOrdrhed filtered by the expdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByHasdocuments(string $hasdocuments) Return the first ChildOrdrhed filtered by the hasdocuments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByHastracking(string $hastracking) Return the first ChildOrdrhed filtered by the hastracking column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySubtotal(string $subtotal) Return the first ChildOrdrhed filtered by the subtotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySalestax(string $salestax) Return the first ChildOrdrhed filtered by the salestax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByFreight(string $freight) Return the first ChildOrdrhed filtered by the freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByMisccost(string $misccost) Return the first ChildOrdrhed filtered by the misccost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByOrdertotal(string $ordertotal) Return the first ChildOrdrhed filtered by the ordertotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByHasnotes(string $hasnotes) Return the first ChildOrdrhed filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByEditord(string $editord) Return the first ChildOrdrhed filtered by the editord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByError(string $error) Return the first ChildOrdrhed filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByErrormsg(string $errormsg) Return the first ChildOrdrhed filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySconame(string $sconame) Return the first ChildOrdrhed filtered by the sconame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipname(string $shipname) Return the first ChildOrdrhed filtered by the shipname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipaddress(string $shipaddress) Return the first ChildOrdrhed filtered by the shipaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipaddress2(string $shipaddress2) Return the first ChildOrdrhed filtered by the shipaddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipcity(string $shipcity) Return the first ChildOrdrhed filtered by the shipcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipstate(string $shipstate) Return the first ChildOrdrhed filtered by the shipstate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipzip(string $shipzip) Return the first ChildOrdrhed filtered by the shipzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipcountry(string $shipcountry) Return the first ChildOrdrhed filtered by the shipcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByContact(string $contact) Return the first ChildOrdrhed filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPhintl(string $phintl) Return the first ChildOrdrhed filtered by the phintl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPhone(string $phone) Return the first ChildOrdrhed filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByExtension(string $extension) Return the first ChildOrdrhed filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByFaxnbr(string $faxnbr) Return the first ChildOrdrhed filtered by the faxnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByEmail(string $email) Return the first ChildOrdrhed filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByReleasenbr(string $releasenbr) Return the first ChildOrdrhed filtered by the releasenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipviacd(string $shipviacd) Return the first ChildOrdrhed filtered by the shipviacd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipviadesc(string $shipviadesc) Return the first ChildOrdrhed filtered by the shipviadesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPricecode(string $pricecode) Return the first ChildOrdrhed filtered by the pricecode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPricecodedesc(string $pricecodedesc) Return the first ChildOrdrhed filtered by the pricecodedesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPricedisp(string $pricedisp) Return the first ChildOrdrhed filtered by the pricedisp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTaxcode(string $taxcode) Return the first ChildOrdrhed filtered by the taxcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTaxcodedesc(string $taxcodedesc) Return the first ChildOrdrhed filtered by the taxcodedesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTaxcodedisp(string $taxcodedisp) Return the first ChildOrdrhed filtered by the taxcodedisp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTermcode(string $termcode) Return the first ChildOrdrhed filtered by the termcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTermtype(string $termtype) Return the first ChildOrdrhed filtered by the termtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTermcodedesc(string $termcodedesc) Return the first ChildOrdrhed filtered by the termcodedesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByRqstdate(string $rqstdate) Return the first ChildOrdrhed filtered by the rqstdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByShipcom(string $shipcom) Return the first ChildOrdrhed filtered by the shipcom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp1(string $sp1) Return the first ChildOrdrhed filtered by the sp1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp1name(string $sp1name) Return the first ChildOrdrhed filtered by the sp1name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp2(string $sp2) Return the first ChildOrdrhed filtered by the sp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp2name(string $sp2name) Return the first ChildOrdrhed filtered by the sp2name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp2disp(string $sp2disp) Return the first ChildOrdrhed filtered by the sp2disp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp3(string $sp3) Return the first ChildOrdrhed filtered by the sp3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp3name(string $sp3name) Return the first ChildOrdrhed filtered by the sp3name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySp3disp(string $sp3disp) Return the first ChildOrdrhed filtered by the sp3disp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByFob(string $fob) Return the first ChildOrdrhed filtered by the fob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByDeliverydesc(string $deliverydesc) Return the first ChildOrdrhed filtered by the deliverydesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByWhse(string $whse) Return the first ChildOrdrhed filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCardnumber(string $cardnumber) Return the first ChildOrdrhed filtered by the cardnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCardexpire(string $cardexpire) Return the first ChildOrdrhed filtered by the cardexpire column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCardcode(string $cardcode) Return the first ChildOrdrhed filtered by the cardcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByCardapproval(string $cardapproval) Return the first ChildOrdrhed filtered by the cardapproval column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTotalcost(string $totalcost) Return the first ChildOrdrhed filtered by the totalcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByTotaldiscount(string $totaldiscount) Return the first ChildOrdrhed filtered by the totaldiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPaymenttype(string $paymenttype) Return the first ChildOrdrhed filtered by the paymenttype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySrcdatefrom(string $srcdatefrom) Return the first ChildOrdrhed filtered by the srcdatefrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneBySrcdatethru(string $srcdatethru) Return the first ChildOrdrhed filtered by the srcdatethru column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBillname(string $billname) Return the first ChildOrdrhed filtered by the billname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBilladdress(string $billaddress) Return the first ChildOrdrhed filtered by the billaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBilladdress2(string $billaddress2) Return the first ChildOrdrhed filtered by the billaddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBilladdress3(string $billaddress3) Return the first ChildOrdrhed filtered by the billaddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBillcountry(string $billcountry) Return the first ChildOrdrhed filtered by the billcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBillcity(string $billcity) Return the first ChildOrdrhed filtered by the billcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBillstate(string $billstate) Return the first ChildOrdrhed filtered by the billstate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByBillzip(string $billzip) Return the first ChildOrdrhed filtered by the billzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPrntfmt(string $prntfmt) Return the first ChildOrdrhed filtered by the prntfmt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByPrntfmtdisp(string $prntfmtdisp) Return the first ChildOrdrhed filtered by the prntfmtdisp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOneByDummy(string $dummy) Return the first ChildOrdrhed filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrhed[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrdrhed objects based on current ModelCriteria
 * @method     ChildOrdrhed[]|ObjectCollection findBySessionid(string $sessionid) Return ChildOrdrhed objects filtered by the sessionid column
 * @method     ChildOrdrhed[]|ObjectCollection findByRecno(int $recno) Return ChildOrdrhed objects filtered by the recno column
 * @method     ChildOrdrhed[]|ObjectCollection findByDate(int $date) Return ChildOrdrhed objects filtered by the date column
 * @method     ChildOrdrhed[]|ObjectCollection findByTime(int $time) Return ChildOrdrhed objects filtered by the time column
 * @method     ChildOrdrhed[]|ObjectCollection findByType(string $type) Return ChildOrdrhed objects filtered by the type column
 * @method     ChildOrdrhed[]|ObjectCollection findByCustid(string $custid) Return ChildOrdrhed objects filtered by the custid column
 * @method     ChildOrdrhed[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildOrdrhed objects filtered by the shiptoid column
 * @method     ChildOrdrhed[]|ObjectCollection findByCustname(string $custname) Return ChildOrdrhed objects filtered by the custname column
 * @method     ChildOrdrhed[]|ObjectCollection findByOrderno(string $orderno) Return ChildOrdrhed objects filtered by the orderno column
 * @method     ChildOrdrhed[]|ObjectCollection findByCustpo(string $custpo) Return ChildOrdrhed objects filtered by the custpo column
 * @method     ChildOrdrhed[]|ObjectCollection findByCustref(string $custref) Return ChildOrdrhed objects filtered by the custref column
 * @method     ChildOrdrhed[]|ObjectCollection findByStatus(string $status) Return ChildOrdrhed objects filtered by the status column
 * @method     ChildOrdrhed[]|ObjectCollection findByOrderdate(string $orderdate) Return ChildOrdrhed objects filtered by the orderdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByCareof(string $careof) Return ChildOrdrhed objects filtered by the careof column
 * @method     ChildOrdrhed[]|ObjectCollection findByQuotdate(string $quotdate) Return ChildOrdrhed objects filtered by the quotdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByInvdate(string $invdate) Return ChildOrdrhed objects filtered by the invdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipdate(string $shipdate) Return ChildOrdrhed objects filtered by the shipdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByRevdate(string $revdate) Return ChildOrdrhed objects filtered by the revdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByExpdate(string $expdate) Return ChildOrdrhed objects filtered by the expdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByHasdocuments(string $hasdocuments) Return ChildOrdrhed objects filtered by the hasdocuments column
 * @method     ChildOrdrhed[]|ObjectCollection findByHastracking(string $hastracking) Return ChildOrdrhed objects filtered by the hastracking column
 * @method     ChildOrdrhed[]|ObjectCollection findBySubtotal(string $subtotal) Return ChildOrdrhed objects filtered by the subtotal column
 * @method     ChildOrdrhed[]|ObjectCollection findBySalestax(string $salestax) Return ChildOrdrhed objects filtered by the salestax column
 * @method     ChildOrdrhed[]|ObjectCollection findByFreight(string $freight) Return ChildOrdrhed objects filtered by the freight column
 * @method     ChildOrdrhed[]|ObjectCollection findByMisccost(string $misccost) Return ChildOrdrhed objects filtered by the misccost column
 * @method     ChildOrdrhed[]|ObjectCollection findByOrdertotal(string $ordertotal) Return ChildOrdrhed objects filtered by the ordertotal column
 * @method     ChildOrdrhed[]|ObjectCollection findByHasnotes(string $hasnotes) Return ChildOrdrhed objects filtered by the hasnotes column
 * @method     ChildOrdrhed[]|ObjectCollection findByEditord(string $editord) Return ChildOrdrhed objects filtered by the editord column
 * @method     ChildOrdrhed[]|ObjectCollection findByError(string $error) Return ChildOrdrhed objects filtered by the error column
 * @method     ChildOrdrhed[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildOrdrhed objects filtered by the errormsg column
 * @method     ChildOrdrhed[]|ObjectCollection findBySconame(string $sconame) Return ChildOrdrhed objects filtered by the sconame column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipname(string $shipname) Return ChildOrdrhed objects filtered by the shipname column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipaddress(string $shipaddress) Return ChildOrdrhed objects filtered by the shipaddress column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipaddress2(string $shipaddress2) Return ChildOrdrhed objects filtered by the shipaddress2 column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipcity(string $shipcity) Return ChildOrdrhed objects filtered by the shipcity column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipstate(string $shipstate) Return ChildOrdrhed objects filtered by the shipstate column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipzip(string $shipzip) Return ChildOrdrhed objects filtered by the shipzip column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipcountry(string $shipcountry) Return ChildOrdrhed objects filtered by the shipcountry column
 * @method     ChildOrdrhed[]|ObjectCollection findByContact(string $contact) Return ChildOrdrhed objects filtered by the contact column
 * @method     ChildOrdrhed[]|ObjectCollection findByPhintl(string $phintl) Return ChildOrdrhed objects filtered by the phintl column
 * @method     ChildOrdrhed[]|ObjectCollection findByPhone(string $phone) Return ChildOrdrhed objects filtered by the phone column
 * @method     ChildOrdrhed[]|ObjectCollection findByExtension(string $extension) Return ChildOrdrhed objects filtered by the extension column
 * @method     ChildOrdrhed[]|ObjectCollection findByFaxnbr(string $faxnbr) Return ChildOrdrhed objects filtered by the faxnbr column
 * @method     ChildOrdrhed[]|ObjectCollection findByEmail(string $email) Return ChildOrdrhed objects filtered by the email column
 * @method     ChildOrdrhed[]|ObjectCollection findByReleasenbr(string $releasenbr) Return ChildOrdrhed objects filtered by the releasenbr column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipviacd(string $shipviacd) Return ChildOrdrhed objects filtered by the shipviacd column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipviadesc(string $shipviadesc) Return ChildOrdrhed objects filtered by the shipviadesc column
 * @method     ChildOrdrhed[]|ObjectCollection findByPricecode(string $pricecode) Return ChildOrdrhed objects filtered by the pricecode column
 * @method     ChildOrdrhed[]|ObjectCollection findByPricecodedesc(string $pricecodedesc) Return ChildOrdrhed objects filtered by the pricecodedesc column
 * @method     ChildOrdrhed[]|ObjectCollection findByPricedisp(string $pricedisp) Return ChildOrdrhed objects filtered by the pricedisp column
 * @method     ChildOrdrhed[]|ObjectCollection findByTaxcode(string $taxcode) Return ChildOrdrhed objects filtered by the taxcode column
 * @method     ChildOrdrhed[]|ObjectCollection findByTaxcodedesc(string $taxcodedesc) Return ChildOrdrhed objects filtered by the taxcodedesc column
 * @method     ChildOrdrhed[]|ObjectCollection findByTaxcodedisp(string $taxcodedisp) Return ChildOrdrhed objects filtered by the taxcodedisp column
 * @method     ChildOrdrhed[]|ObjectCollection findByTermcode(string $termcode) Return ChildOrdrhed objects filtered by the termcode column
 * @method     ChildOrdrhed[]|ObjectCollection findByTermtype(string $termtype) Return ChildOrdrhed objects filtered by the termtype column
 * @method     ChildOrdrhed[]|ObjectCollection findByTermcodedesc(string $termcodedesc) Return ChildOrdrhed objects filtered by the termcodedesc column
 * @method     ChildOrdrhed[]|ObjectCollection findByRqstdate(string $rqstdate) Return ChildOrdrhed objects filtered by the rqstdate column
 * @method     ChildOrdrhed[]|ObjectCollection findByShipcom(string $shipcom) Return ChildOrdrhed objects filtered by the shipcom column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp1(string $sp1) Return ChildOrdrhed objects filtered by the sp1 column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp1name(string $sp1name) Return ChildOrdrhed objects filtered by the sp1name column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp2(string $sp2) Return ChildOrdrhed objects filtered by the sp2 column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp2name(string $sp2name) Return ChildOrdrhed objects filtered by the sp2name column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp2disp(string $sp2disp) Return ChildOrdrhed objects filtered by the sp2disp column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp3(string $sp3) Return ChildOrdrhed objects filtered by the sp3 column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp3name(string $sp3name) Return ChildOrdrhed objects filtered by the sp3name column
 * @method     ChildOrdrhed[]|ObjectCollection findBySp3disp(string $sp3disp) Return ChildOrdrhed objects filtered by the sp3disp column
 * @method     ChildOrdrhed[]|ObjectCollection findByFob(string $fob) Return ChildOrdrhed objects filtered by the fob column
 * @method     ChildOrdrhed[]|ObjectCollection findByDeliverydesc(string $deliverydesc) Return ChildOrdrhed objects filtered by the deliverydesc column
 * @method     ChildOrdrhed[]|ObjectCollection findByWhse(string $whse) Return ChildOrdrhed objects filtered by the whse column
 * @method     ChildOrdrhed[]|ObjectCollection findByCardnumber(string $cardnumber) Return ChildOrdrhed objects filtered by the cardnumber column
 * @method     ChildOrdrhed[]|ObjectCollection findByCardexpire(string $cardexpire) Return ChildOrdrhed objects filtered by the cardexpire column
 * @method     ChildOrdrhed[]|ObjectCollection findByCardcode(string $cardcode) Return ChildOrdrhed objects filtered by the cardcode column
 * @method     ChildOrdrhed[]|ObjectCollection findByCardapproval(string $cardapproval) Return ChildOrdrhed objects filtered by the cardapproval column
 * @method     ChildOrdrhed[]|ObjectCollection findByTotalcost(string $totalcost) Return ChildOrdrhed objects filtered by the totalcost column
 * @method     ChildOrdrhed[]|ObjectCollection findByTotaldiscount(string $totaldiscount) Return ChildOrdrhed objects filtered by the totaldiscount column
 * @method     ChildOrdrhed[]|ObjectCollection findByPaymenttype(string $paymenttype) Return ChildOrdrhed objects filtered by the paymenttype column
 * @method     ChildOrdrhed[]|ObjectCollection findBySrcdatefrom(string $srcdatefrom) Return ChildOrdrhed objects filtered by the srcdatefrom column
 * @method     ChildOrdrhed[]|ObjectCollection findBySrcdatethru(string $srcdatethru) Return ChildOrdrhed objects filtered by the srcdatethru column
 * @method     ChildOrdrhed[]|ObjectCollection findByBillname(string $billname) Return ChildOrdrhed objects filtered by the billname column
 * @method     ChildOrdrhed[]|ObjectCollection findByBilladdress(string $billaddress) Return ChildOrdrhed objects filtered by the billaddress column
 * @method     ChildOrdrhed[]|ObjectCollection findByBilladdress2(string $billaddress2) Return ChildOrdrhed objects filtered by the billaddress2 column
 * @method     ChildOrdrhed[]|ObjectCollection findByBilladdress3(string $billaddress3) Return ChildOrdrhed objects filtered by the billaddress3 column
 * @method     ChildOrdrhed[]|ObjectCollection findByBillcountry(string $billcountry) Return ChildOrdrhed objects filtered by the billcountry column
 * @method     ChildOrdrhed[]|ObjectCollection findByBillcity(string $billcity) Return ChildOrdrhed objects filtered by the billcity column
 * @method     ChildOrdrhed[]|ObjectCollection findByBillstate(string $billstate) Return ChildOrdrhed objects filtered by the billstate column
 * @method     ChildOrdrhed[]|ObjectCollection findByBillzip(string $billzip) Return ChildOrdrhed objects filtered by the billzip column
 * @method     ChildOrdrhed[]|ObjectCollection findByPrntfmt(string $prntfmt) Return ChildOrdrhed objects filtered by the prntfmt column
 * @method     ChildOrdrhed[]|ObjectCollection findByPrntfmtdisp(string $prntfmtdisp) Return ChildOrdrhed objects filtered by the prntfmtdisp column
 * @method     ChildOrdrhed[]|ObjectCollection findByDummy(string $dummy) Return ChildOrdrhed objects filtered by the dummy column
 * @method     ChildOrdrhed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdrhedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdrhedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Ordrhed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdrhedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdrhedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrdrhedQuery) {
            return $criteria;
        }
        $query = new ChildOrdrhedQuery();
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
     * @return ChildOrdrhed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdrhedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdrhedTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildOrdrhed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, type, custid, shiptoid, custname, orderno, custpo, custref, status, orderdate, careof, quotdate, invdate, shipdate, revdate, expdate, hasdocuments, hastracking, subtotal, salestax, freight, misccost, ordertotal, hasnotes, editord, error, errormsg, sconame, shipname, shipaddress, shipaddress2, shipcity, shipstate, shipzip, shipcountry, contact, phintl, phone, extension, faxnbr, email, releasenbr, shipviacd, shipviadesc, pricecode, pricecodedesc, pricedisp, taxcode, taxcodedesc, taxcodedisp, termcode, termtype, termcodedesc, rqstdate, shipcom, sp1, sp1name, sp2, sp2name, sp2disp, sp3, sp3name, sp3disp, fob, deliverydesc, whse, cardnumber, cardexpire, cardcode, cardapproval, totalcost, totaldiscount, paymenttype, srcdatefrom, srcdatethru, billname, billaddress, billaddress2, billaddress3, billcountry, billcity, billstate, billzip, prntfmt, prntfmtdisp, dummy FROM ordrhed WHERE sessionid = :p0 AND recno = :p1 AND orderno = :p2';
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
            /** @var ChildOrdrhed $obj */
            $obj = new ChildOrdrhed();
            $obj->hydrate($row);
            OrdrhedTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildOrdrhed|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OrdrhedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OrdrhedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(OrdrhedTableMap::COL_ORDERNO, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OrdrhedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OrdrhedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(OrdrhedTableMap::COL_ORDERNO, $key[2], Criteria::EQUAL);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the custname column
     *
     * Example usage:
     * <code>
     * $query->filterByCustname('fooValue');   // WHERE custname = 'fooValue'
     * $query->filterByCustname('%fooValue%', Criteria::LIKE); // WHERE custname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCustname($custname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CUSTNAME, $custname, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_ORDERNO, $orderno, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCustpo($custpo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custpo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CUSTPO, $custpo, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCustref($custref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CUSTREF, $custref, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the orderdate column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderdate('fooValue');   // WHERE orderdate = 'fooValue'
     * $query->filterByOrderdate('%fooValue%', Criteria::LIKE); // WHERE orderdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByOrderdate($orderdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_ORDERDATE, $orderdate, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCareof($careof = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($careof)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CAREOF, $careof, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByQuotdate($quotdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_QUOTDATE, $quotdate, $comparison);
    }

    /**
     * Filter the query on the invdate column
     *
     * Example usage:
     * <code>
     * $query->filterByInvdate('fooValue');   // WHERE invdate = 'fooValue'
     * $query->filterByInvdate('%fooValue%', Criteria::LIKE); // WHERE invdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByInvdate($invdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_INVDATE, $invdate, $comparison);
    }

    /**
     * Filter the query on the shipdate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipdate('fooValue');   // WHERE shipdate = 'fooValue'
     * $query->filterByShipdate('%fooValue%', Criteria::LIKE); // WHERE shipdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipdate($shipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPDATE, $shipdate, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByRevdate($revdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($revdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_REVDATE, $revdate, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByExpdate($expdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_EXPDATE, $expdate, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByHasdocuments($hasdocuments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasdocuments)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);
    }

    /**
     * Filter the query on the hastracking column
     *
     * Example usage:
     * <code>
     * $query->filterByHastracking('fooValue');   // WHERE hastracking = 'fooValue'
     * $query->filterByHastracking('%fooValue%', Criteria::LIKE); // WHERE hastracking LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hastracking The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByHastracking($hastracking = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hastracking)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_HASTRACKING, $hastracking, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, $comparison = null)
    {
        if (is_array($subtotal)) {
            $useMinMax = false;
            if (isset($subtotal['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_SUBTOTAL, $subtotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subtotal['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_SUBTOTAL, $subtotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SUBTOTAL, $subtotal, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySalestax($salestax = null, $comparison = null)
    {
        if (is_array($salestax)) {
            $useMinMax = false;
            if (isset($salestax['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_SALESTAX, $salestax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salestax['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_SALESTAX, $salestax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SALESTAX, $salestax, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByFreight($freight = null, $comparison = null)
    {
        if (is_array($freight)) {
            $useMinMax = false;
            if (isset($freight['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_FREIGHT, $freight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($freight['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_FREIGHT, $freight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_FREIGHT, $freight, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByMisccost($misccost = null, $comparison = null)
    {
        if (is_array($misccost)) {
            $useMinMax = false;
            if (isset($misccost['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_MISCCOST, $misccost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($misccost['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_MISCCOST, $misccost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_MISCCOST, $misccost, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByOrdertotal($ordertotal = null, $comparison = null)
    {
        if (is_array($ordertotal)) {
            $useMinMax = false;
            if (isset($ordertotal['min'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_ORDERTOTAL, $ordertotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ordertotal['max'])) {
                $this->addUsingAlias(OrdrhedTableMap::COL_ORDERTOTAL, $ordertotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_ORDERTOTAL, $ordertotal, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_HASNOTES, $hasnotes, $comparison);
    }

    /**
     * Filter the query on the editord column
     *
     * Example usage:
     * <code>
     * $query->filterByEditord('fooValue');   // WHERE editord = 'fooValue'
     * $query->filterByEditord('%fooValue%', Criteria::LIKE); // WHERE editord LIKE '%fooValue%'
     * </code>
     *
     * @param     string $editord The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByEditord($editord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_EDITORD, $editord, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_ERROR, $error, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_ERRORMSG, $errormsg, $comparison);
    }

    /**
     * Filter the query on the sconame column
     *
     * Example usage:
     * <code>
     * $query->filterBySconame('fooValue');   // WHERE sconame = 'fooValue'
     * $query->filterBySconame('%fooValue%', Criteria::LIKE); // WHERE sconame LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sconame The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySconame($sconame = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sconame)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SCONAME, $sconame, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipname($shipname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPNAME, $shipname, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipaddress($shipaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPADDRESS, $shipaddress, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipaddress2($shipaddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPADDRESS2, $shipaddress2, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipcity($shipcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPCITY, $shipcity, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipstate($shipstate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipstate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPSTATE, $shipstate, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipzip($shipzip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipzip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPZIP, $shipzip, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipcountry($shipcountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPCOUNTRY, $shipcountry, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the phintl column
     *
     * Example usage:
     * <code>
     * $query->filterByPhintl('fooValue');   // WHERE phintl = 'fooValue'
     * $query->filterByPhintl('%fooValue%', Criteria::LIKE); // WHERE phintl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phintl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPhintl($phintl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phintl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PHINTL, $phintl, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the extension column
     *
     * Example usage:
     * <code>
     * $query->filterByExtension('fooValue');   // WHERE extension = 'fooValue'
     * $query->filterByExtension('%fooValue%', Criteria::LIKE); // WHERE extension LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extension The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByExtension($extension = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extension)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_EXTENSION, $extension, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByFaxnbr($faxnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_FAXNBR, $faxnbr, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the releasenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByReleasenbr('fooValue');   // WHERE releasenbr = 'fooValue'
     * $query->filterByReleasenbr('%fooValue%', Criteria::LIKE); // WHERE releasenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $releasenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByReleasenbr($releasenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($releasenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_RELEASENBR, $releasenbr, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipviacd($shipviacd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviacd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPVIACD, $shipviacd, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipviadesc($shipviadesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviadesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPVIADESC, $shipviadesc, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPricecode($pricecode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricecode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PRICECODE, $pricecode, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPricecodedesc($pricecodedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricecodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PRICECODEDESC, $pricecodedesc, $comparison);
    }

    /**
     * Filter the query on the pricedisp column
     *
     * Example usage:
     * <code>
     * $query->filterByPricedisp('fooValue');   // WHERE pricedisp = 'fooValue'
     * $query->filterByPricedisp('%fooValue%', Criteria::LIKE); // WHERE pricedisp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pricedisp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPricedisp($pricedisp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricedisp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PRICEDISP, $pricedisp, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTaxcode($taxcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TAXCODE, $taxcode, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTaxcodedesc($taxcodedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TAXCODEDESC, $taxcodedesc, $comparison);
    }

    /**
     * Filter the query on the taxcodedisp column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcodedisp('fooValue');   // WHERE taxcodedisp = 'fooValue'
     * $query->filterByTaxcodedisp('%fooValue%', Criteria::LIKE); // WHERE taxcodedisp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $taxcodedisp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTaxcodedisp($taxcodedisp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodedisp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TAXCODEDISP, $taxcodedisp, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTermcode($termcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TERMCODE, $termcode, $comparison);
    }

    /**
     * Filter the query on the termtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTermtype('fooValue');   // WHERE termtype = 'fooValue'
     * $query->filterByTermtype('%fooValue%', Criteria::LIKE); // WHERE termtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTermtype($termtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TERMTYPE, $termtype, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTermcodedesc($termcodedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TERMCODEDESC, $termcodedesc, $comparison);
    }

    /**
     * Filter the query on the rqstdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRqstdate('fooValue');   // WHERE rqstdate = 'fooValue'
     * $query->filterByRqstdate('%fooValue%', Criteria::LIKE); // WHERE rqstdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rqstdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByRqstdate($rqstdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rqstdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_RQSTDATE, $rqstdate, $comparison);
    }

    /**
     * Filter the query on the shipcom column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcom('fooValue');   // WHERE shipcom = 'fooValue'
     * $query->filterByShipcom('%fooValue%', Criteria::LIKE); // WHERE shipcom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByShipcom($shipcom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SHIPCOM, $shipcom, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp1($sp1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP1, $sp1, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp1name($sp1name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP1NAME, $sp1name, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp2($sp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP2, $sp2, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp2name($sp2name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP2NAME, $sp2name, $comparison);
    }

    /**
     * Filter the query on the sp2disp column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2disp('fooValue');   // WHERE sp2disp = 'fooValue'
     * $query->filterBySp2disp('%fooValue%', Criteria::LIKE); // WHERE sp2disp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp2disp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp2disp($sp2disp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2disp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP2DISP, $sp2disp, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp3($sp3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP3, $sp3, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp3name($sp3name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP3NAME, $sp3name, $comparison);
    }

    /**
     * Filter the query on the sp3disp column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3disp('fooValue');   // WHERE sp3disp = 'fooValue'
     * $query->filterBySp3disp('%fooValue%', Criteria::LIKE); // WHERE sp3disp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp3disp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySp3disp($sp3disp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3disp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SP3DISP, $sp3disp, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByFob($fob = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fob)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_FOB, $fob, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByDeliverydesc($deliverydesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deliverydesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_DELIVERYDESC, $deliverydesc, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_WHSE, $whse, $comparison);
    }

    /**
     * Filter the query on the cardnumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCardnumber('fooValue');   // WHERE cardnumber = 'fooValue'
     * $query->filterByCardnumber('%fooValue%', Criteria::LIKE); // WHERE cardnumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardnumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCardnumber($cardnumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardnumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CARDNUMBER, $cardnumber, $comparison);
    }

    /**
     * Filter the query on the cardexpire column
     *
     * Example usage:
     * <code>
     * $query->filterByCardexpire('fooValue');   // WHERE cardexpire = 'fooValue'
     * $query->filterByCardexpire('%fooValue%', Criteria::LIKE); // WHERE cardexpire LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardexpire The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCardexpire($cardexpire = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardexpire)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CARDEXPIRE, $cardexpire, $comparison);
    }

    /**
     * Filter the query on the cardcode column
     *
     * Example usage:
     * <code>
     * $query->filterByCardcode('fooValue');   // WHERE cardcode = 'fooValue'
     * $query->filterByCardcode('%fooValue%', Criteria::LIKE); // WHERE cardcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCardcode($cardcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CARDCODE, $cardcode, $comparison);
    }

    /**
     * Filter the query on the cardapproval column
     *
     * Example usage:
     * <code>
     * $query->filterByCardapproval('fooValue');   // WHERE cardapproval = 'fooValue'
     * $query->filterByCardapproval('%fooValue%', Criteria::LIKE); // WHERE cardapproval LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardapproval The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByCardapproval($cardapproval = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardapproval)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_CARDAPPROVAL, $cardapproval, $comparison);
    }

    /**
     * Filter the query on the totalcost column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalcost('fooValue');   // WHERE totalcost = 'fooValue'
     * $query->filterByTotalcost('%fooValue%', Criteria::LIKE); // WHERE totalcost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totalcost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTotalcost($totalcost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalcost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TOTALCOST, $totalcost, $comparison);
    }

    /**
     * Filter the query on the totaldiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaldiscount('fooValue');   // WHERE totaldiscount = 'fooValue'
     * $query->filterByTotaldiscount('%fooValue%', Criteria::LIKE); // WHERE totaldiscount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totaldiscount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByTotaldiscount($totaldiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totaldiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_TOTALDISCOUNT, $totaldiscount, $comparison);
    }

    /**
     * Filter the query on the paymenttype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymenttype('fooValue');   // WHERE paymenttype = 'fooValue'
     * $query->filterByPaymenttype('%fooValue%', Criteria::LIKE); // WHERE paymenttype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymenttype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPaymenttype($paymenttype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymenttype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PAYMENTTYPE, $paymenttype, $comparison);
    }

    /**
     * Filter the query on the srcdatefrom column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcdatefrom('fooValue');   // WHERE srcdatefrom = 'fooValue'
     * $query->filterBySrcdatefrom('%fooValue%', Criteria::LIKE); // WHERE srcdatefrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $srcdatefrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySrcdatefrom($srcdatefrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcdatefrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SRCDATEFROM, $srcdatefrom, $comparison);
    }

    /**
     * Filter the query on the srcdatethru column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcdatethru('fooValue');   // WHERE srcdatethru = 'fooValue'
     * $query->filterBySrcdatethru('%fooValue%', Criteria::LIKE); // WHERE srcdatethru LIKE '%fooValue%'
     * </code>
     *
     * @param     string $srcdatethru The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterBySrcdatethru($srcdatethru = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcdatethru)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_SRCDATETHRU, $srcdatethru, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBillname($billname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLNAME, $billname, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBilladdress($billaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLADDRESS, $billaddress, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBilladdress2($billaddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLADDRESS2, $billaddress2, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBilladdress3($billaddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLADDRESS3, $billaddress3, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBillcountry($billcountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billcountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLCOUNTRY, $billcountry, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBillcity($billcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLCITY, $billcity, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBillstate($billstate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billstate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLSTATE, $billstate, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByBillzip($billzip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billzip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_BILLZIP, $billzip, $comparison);
    }

    /**
     * Filter the query on the prntfmt column
     *
     * Example usage:
     * <code>
     * $query->filterByPrntfmt('fooValue');   // WHERE prntfmt = 'fooValue'
     * $query->filterByPrntfmt('%fooValue%', Criteria::LIKE); // WHERE prntfmt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prntfmt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPrntfmt($prntfmt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prntfmt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PRNTFMT, $prntfmt, $comparison);
    }

    /**
     * Filter the query on the prntfmtdisp column
     *
     * Example usage:
     * <code>
     * $query->filterByPrntfmtdisp('fooValue');   // WHERE prntfmtdisp = 'fooValue'
     * $query->filterByPrntfmtdisp('%fooValue%', Criteria::LIKE); // WHERE prntfmtdisp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prntfmtdisp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByPrntfmtdisp($prntfmtdisp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prntfmtdisp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_PRNTFMTDISP, $prntfmtdisp, $comparison);
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
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrhedTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrdrhed $ordrhed Object to remove from the list of results
     *
     * @return $this|ChildOrdrhedQuery The current query, for fluid interface
     */
    public function prune($ordrhed = null)
    {
        if ($ordrhed) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OrdrhedTableMap::COL_SESSIONID), $ordrhed->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OrdrhedTableMap::COL_RECNO), $ordrhed->getRecno(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(OrdrhedTableMap::COL_ORDERNO), $ordrhed->getOrderno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ordrhed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrhedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdrhedTableMap::clearInstancePool();
            OrdrhedTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrhedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdrhedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdrhedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdrhedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrdrhedQuery
