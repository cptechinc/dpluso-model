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
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `ordrhed` table.
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
 * @method     ChildOrdrhed|null findOne(?ConnectionInterface $con = null) Return the first ChildOrdrhed matching the query
 * @method     ChildOrdrhed findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrdrhed matching the query, or a new ChildOrdrhed object populated from the query conditions when no match is found
 *
 * @method     ChildOrdrhed|null findOneBySessionid(string $sessionid) Return the first ChildOrdrhed filtered by the sessionid column
 * @method     ChildOrdrhed|null findOneByRecno(int $recno) Return the first ChildOrdrhed filtered by the recno column
 * @method     ChildOrdrhed|null findOneByDate(int $date) Return the first ChildOrdrhed filtered by the date column
 * @method     ChildOrdrhed|null findOneByTime(int $time) Return the first ChildOrdrhed filtered by the time column
 * @method     ChildOrdrhed|null findOneByType(string $type) Return the first ChildOrdrhed filtered by the type column
 * @method     ChildOrdrhed|null findOneByCustid(string $custid) Return the first ChildOrdrhed filtered by the custid column
 * @method     ChildOrdrhed|null findOneByShiptoid(string $shiptoid) Return the first ChildOrdrhed filtered by the shiptoid column
 * @method     ChildOrdrhed|null findOneByCustname(string $custname) Return the first ChildOrdrhed filtered by the custname column
 * @method     ChildOrdrhed|null findOneByOrderno(string $orderno) Return the first ChildOrdrhed filtered by the orderno column
 * @method     ChildOrdrhed|null findOneByCustpo(string $custpo) Return the first ChildOrdrhed filtered by the custpo column
 * @method     ChildOrdrhed|null findOneByCustref(string $custref) Return the first ChildOrdrhed filtered by the custref column
 * @method     ChildOrdrhed|null findOneByStatus(string $status) Return the first ChildOrdrhed filtered by the status column
 * @method     ChildOrdrhed|null findOneByOrderdate(string $orderdate) Return the first ChildOrdrhed filtered by the orderdate column
 * @method     ChildOrdrhed|null findOneByCareof(string $careof) Return the first ChildOrdrhed filtered by the careof column
 * @method     ChildOrdrhed|null findOneByQuotdate(string $quotdate) Return the first ChildOrdrhed filtered by the quotdate column
 * @method     ChildOrdrhed|null findOneByInvdate(string $invdate) Return the first ChildOrdrhed filtered by the invdate column
 * @method     ChildOrdrhed|null findOneByShipdate(string $shipdate) Return the first ChildOrdrhed filtered by the shipdate column
 * @method     ChildOrdrhed|null findOneByRevdate(string $revdate) Return the first ChildOrdrhed filtered by the revdate column
 * @method     ChildOrdrhed|null findOneByExpdate(string $expdate) Return the first ChildOrdrhed filtered by the expdate column
 * @method     ChildOrdrhed|null findOneByHasdocuments(string $hasdocuments) Return the first ChildOrdrhed filtered by the hasdocuments column
 * @method     ChildOrdrhed|null findOneByHastracking(string $hastracking) Return the first ChildOrdrhed filtered by the hastracking column
 * @method     ChildOrdrhed|null findOneBySubtotal(string $subtotal) Return the first ChildOrdrhed filtered by the subtotal column
 * @method     ChildOrdrhed|null findOneBySalestax(string $salestax) Return the first ChildOrdrhed filtered by the salestax column
 * @method     ChildOrdrhed|null findOneByFreight(string $freight) Return the first ChildOrdrhed filtered by the freight column
 * @method     ChildOrdrhed|null findOneByMisccost(string $misccost) Return the first ChildOrdrhed filtered by the misccost column
 * @method     ChildOrdrhed|null findOneByOrdertotal(string $ordertotal) Return the first ChildOrdrhed filtered by the ordertotal column
 * @method     ChildOrdrhed|null findOneByHasnotes(string $hasnotes) Return the first ChildOrdrhed filtered by the hasnotes column
 * @method     ChildOrdrhed|null findOneByEditord(string $editord) Return the first ChildOrdrhed filtered by the editord column
 * @method     ChildOrdrhed|null findOneByError(string $error) Return the first ChildOrdrhed filtered by the error column
 * @method     ChildOrdrhed|null findOneByErrormsg(string $errormsg) Return the first ChildOrdrhed filtered by the errormsg column
 * @method     ChildOrdrhed|null findOneBySconame(string $sconame) Return the first ChildOrdrhed filtered by the sconame column
 * @method     ChildOrdrhed|null findOneByShipname(string $shipname) Return the first ChildOrdrhed filtered by the shipname column
 * @method     ChildOrdrhed|null findOneByShipaddress(string $shipaddress) Return the first ChildOrdrhed filtered by the shipaddress column
 * @method     ChildOrdrhed|null findOneByShipaddress2(string $shipaddress2) Return the first ChildOrdrhed filtered by the shipaddress2 column
 * @method     ChildOrdrhed|null findOneByShipcity(string $shipcity) Return the first ChildOrdrhed filtered by the shipcity column
 * @method     ChildOrdrhed|null findOneByShipstate(string $shipstate) Return the first ChildOrdrhed filtered by the shipstate column
 * @method     ChildOrdrhed|null findOneByShipzip(string $shipzip) Return the first ChildOrdrhed filtered by the shipzip column
 * @method     ChildOrdrhed|null findOneByShipcountry(string $shipcountry) Return the first ChildOrdrhed filtered by the shipcountry column
 * @method     ChildOrdrhed|null findOneByContact(string $contact) Return the first ChildOrdrhed filtered by the contact column
 * @method     ChildOrdrhed|null findOneByPhintl(string $phintl) Return the first ChildOrdrhed filtered by the phintl column
 * @method     ChildOrdrhed|null findOneByPhone(string $phone) Return the first ChildOrdrhed filtered by the phone column
 * @method     ChildOrdrhed|null findOneByExtension(string $extension) Return the first ChildOrdrhed filtered by the extension column
 * @method     ChildOrdrhed|null findOneByFaxnbr(string $faxnbr) Return the first ChildOrdrhed filtered by the faxnbr column
 * @method     ChildOrdrhed|null findOneByEmail(string $email) Return the first ChildOrdrhed filtered by the email column
 * @method     ChildOrdrhed|null findOneByReleasenbr(string $releasenbr) Return the first ChildOrdrhed filtered by the releasenbr column
 * @method     ChildOrdrhed|null findOneByShipviacd(string $shipviacd) Return the first ChildOrdrhed filtered by the shipviacd column
 * @method     ChildOrdrhed|null findOneByShipviadesc(string $shipviadesc) Return the first ChildOrdrhed filtered by the shipviadesc column
 * @method     ChildOrdrhed|null findOneByPricecode(string $pricecode) Return the first ChildOrdrhed filtered by the pricecode column
 * @method     ChildOrdrhed|null findOneByPricecodedesc(string $pricecodedesc) Return the first ChildOrdrhed filtered by the pricecodedesc column
 * @method     ChildOrdrhed|null findOneByPricedisp(string $pricedisp) Return the first ChildOrdrhed filtered by the pricedisp column
 * @method     ChildOrdrhed|null findOneByTaxcode(string $taxcode) Return the first ChildOrdrhed filtered by the taxcode column
 * @method     ChildOrdrhed|null findOneByTaxcodedesc(string $taxcodedesc) Return the first ChildOrdrhed filtered by the taxcodedesc column
 * @method     ChildOrdrhed|null findOneByTaxcodedisp(string $taxcodedisp) Return the first ChildOrdrhed filtered by the taxcodedisp column
 * @method     ChildOrdrhed|null findOneByTermcode(string $termcode) Return the first ChildOrdrhed filtered by the termcode column
 * @method     ChildOrdrhed|null findOneByTermtype(string $termtype) Return the first ChildOrdrhed filtered by the termtype column
 * @method     ChildOrdrhed|null findOneByTermcodedesc(string $termcodedesc) Return the first ChildOrdrhed filtered by the termcodedesc column
 * @method     ChildOrdrhed|null findOneByRqstdate(string $rqstdate) Return the first ChildOrdrhed filtered by the rqstdate column
 * @method     ChildOrdrhed|null findOneByShipcom(string $shipcom) Return the first ChildOrdrhed filtered by the shipcom column
 * @method     ChildOrdrhed|null findOneBySp1(string $sp1) Return the first ChildOrdrhed filtered by the sp1 column
 * @method     ChildOrdrhed|null findOneBySp1name(string $sp1name) Return the first ChildOrdrhed filtered by the sp1name column
 * @method     ChildOrdrhed|null findOneBySp2(string $sp2) Return the first ChildOrdrhed filtered by the sp2 column
 * @method     ChildOrdrhed|null findOneBySp2name(string $sp2name) Return the first ChildOrdrhed filtered by the sp2name column
 * @method     ChildOrdrhed|null findOneBySp2disp(string $sp2disp) Return the first ChildOrdrhed filtered by the sp2disp column
 * @method     ChildOrdrhed|null findOneBySp3(string $sp3) Return the first ChildOrdrhed filtered by the sp3 column
 * @method     ChildOrdrhed|null findOneBySp3name(string $sp3name) Return the first ChildOrdrhed filtered by the sp3name column
 * @method     ChildOrdrhed|null findOneBySp3disp(string $sp3disp) Return the first ChildOrdrhed filtered by the sp3disp column
 * @method     ChildOrdrhed|null findOneByFob(string $fob) Return the first ChildOrdrhed filtered by the fob column
 * @method     ChildOrdrhed|null findOneByDeliverydesc(string $deliverydesc) Return the first ChildOrdrhed filtered by the deliverydesc column
 * @method     ChildOrdrhed|null findOneByWhse(string $whse) Return the first ChildOrdrhed filtered by the whse column
 * @method     ChildOrdrhed|null findOneByCardnumber(string $cardnumber) Return the first ChildOrdrhed filtered by the cardnumber column
 * @method     ChildOrdrhed|null findOneByCardexpire(string $cardexpire) Return the first ChildOrdrhed filtered by the cardexpire column
 * @method     ChildOrdrhed|null findOneByCardcode(string $cardcode) Return the first ChildOrdrhed filtered by the cardcode column
 * @method     ChildOrdrhed|null findOneByCardapproval(string $cardapproval) Return the first ChildOrdrhed filtered by the cardapproval column
 * @method     ChildOrdrhed|null findOneByTotalcost(string $totalcost) Return the first ChildOrdrhed filtered by the totalcost column
 * @method     ChildOrdrhed|null findOneByTotaldiscount(string $totaldiscount) Return the first ChildOrdrhed filtered by the totaldiscount column
 * @method     ChildOrdrhed|null findOneByPaymenttype(string $paymenttype) Return the first ChildOrdrhed filtered by the paymenttype column
 * @method     ChildOrdrhed|null findOneBySrcdatefrom(string $srcdatefrom) Return the first ChildOrdrhed filtered by the srcdatefrom column
 * @method     ChildOrdrhed|null findOneBySrcdatethru(string $srcdatethru) Return the first ChildOrdrhed filtered by the srcdatethru column
 * @method     ChildOrdrhed|null findOneByBillname(string $billname) Return the first ChildOrdrhed filtered by the billname column
 * @method     ChildOrdrhed|null findOneByBilladdress(string $billaddress) Return the first ChildOrdrhed filtered by the billaddress column
 * @method     ChildOrdrhed|null findOneByBilladdress2(string $billaddress2) Return the first ChildOrdrhed filtered by the billaddress2 column
 * @method     ChildOrdrhed|null findOneByBilladdress3(string $billaddress3) Return the first ChildOrdrhed filtered by the billaddress3 column
 * @method     ChildOrdrhed|null findOneByBillcountry(string $billcountry) Return the first ChildOrdrhed filtered by the billcountry column
 * @method     ChildOrdrhed|null findOneByBillcity(string $billcity) Return the first ChildOrdrhed filtered by the billcity column
 * @method     ChildOrdrhed|null findOneByBillstate(string $billstate) Return the first ChildOrdrhed filtered by the billstate column
 * @method     ChildOrdrhed|null findOneByBillzip(string $billzip) Return the first ChildOrdrhed filtered by the billzip column
 * @method     ChildOrdrhed|null findOneByPrntfmt(string $prntfmt) Return the first ChildOrdrhed filtered by the prntfmt column
 * @method     ChildOrdrhed|null findOneByPrntfmtdisp(string $prntfmtdisp) Return the first ChildOrdrhed filtered by the prntfmtdisp column
 * @method     ChildOrdrhed|null findOneByDummy(string $dummy) Return the first ChildOrdrhed filtered by the dummy column
 *
 * @method     ChildOrdrhed requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrdrhed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrhed requireOne(?ConnectionInterface $con = null) Return the first ChildOrdrhed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
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
 * @method     ChildOrdrhed[]|Collection find(?ConnectionInterface $con = null) Return ChildOrdrhed objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrdrhed> find(?ConnectionInterface $con = null) Return ChildOrdrhed objects based on current ModelCriteria
 *
 * @method     ChildOrdrhed[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildOrdrhed objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySessionid(string|array<string> $sessionid) Return ChildOrdrhed objects filtered by the sessionid column
 * @method     ChildOrdrhed[]|Collection findByRecno(int|array<int> $recno) Return ChildOrdrhed objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByRecno(int|array<int> $recno) Return ChildOrdrhed objects filtered by the recno column
 * @method     ChildOrdrhed[]|Collection findByDate(int|array<int> $date) Return ChildOrdrhed objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByDate(int|array<int> $date) Return ChildOrdrhed objects filtered by the date column
 * @method     ChildOrdrhed[]|Collection findByTime(int|array<int> $time) Return ChildOrdrhed objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTime(int|array<int> $time) Return ChildOrdrhed objects filtered by the time column
 * @method     ChildOrdrhed[]|Collection findByType(string|array<string> $type) Return ChildOrdrhed objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByType(string|array<string> $type) Return ChildOrdrhed objects filtered by the type column
 * @method     ChildOrdrhed[]|Collection findByCustid(string|array<string> $custid) Return ChildOrdrhed objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCustid(string|array<string> $custid) Return ChildOrdrhed objects filtered by the custid column
 * @method     ChildOrdrhed[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildOrdrhed objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShiptoid(string|array<string> $shiptoid) Return ChildOrdrhed objects filtered by the shiptoid column
 * @method     ChildOrdrhed[]|Collection findByCustname(string|array<string> $custname) Return ChildOrdrhed objects filtered by the custname column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCustname(string|array<string> $custname) Return ChildOrdrhed objects filtered by the custname column
 * @method     ChildOrdrhed[]|Collection findByOrderno(string|array<string> $orderno) Return ChildOrdrhed objects filtered by the orderno column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByOrderno(string|array<string> $orderno) Return ChildOrdrhed objects filtered by the orderno column
 * @method     ChildOrdrhed[]|Collection findByCustpo(string|array<string> $custpo) Return ChildOrdrhed objects filtered by the custpo column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCustpo(string|array<string> $custpo) Return ChildOrdrhed objects filtered by the custpo column
 * @method     ChildOrdrhed[]|Collection findByCustref(string|array<string> $custref) Return ChildOrdrhed objects filtered by the custref column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCustref(string|array<string> $custref) Return ChildOrdrhed objects filtered by the custref column
 * @method     ChildOrdrhed[]|Collection findByStatus(string|array<string> $status) Return ChildOrdrhed objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByStatus(string|array<string> $status) Return ChildOrdrhed objects filtered by the status column
 * @method     ChildOrdrhed[]|Collection findByOrderdate(string|array<string> $orderdate) Return ChildOrdrhed objects filtered by the orderdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByOrderdate(string|array<string> $orderdate) Return ChildOrdrhed objects filtered by the orderdate column
 * @method     ChildOrdrhed[]|Collection findByCareof(string|array<string> $careof) Return ChildOrdrhed objects filtered by the careof column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCareof(string|array<string> $careof) Return ChildOrdrhed objects filtered by the careof column
 * @method     ChildOrdrhed[]|Collection findByQuotdate(string|array<string> $quotdate) Return ChildOrdrhed objects filtered by the quotdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByQuotdate(string|array<string> $quotdate) Return ChildOrdrhed objects filtered by the quotdate column
 * @method     ChildOrdrhed[]|Collection findByInvdate(string|array<string> $invdate) Return ChildOrdrhed objects filtered by the invdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByInvdate(string|array<string> $invdate) Return ChildOrdrhed objects filtered by the invdate column
 * @method     ChildOrdrhed[]|Collection findByShipdate(string|array<string> $shipdate) Return ChildOrdrhed objects filtered by the shipdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipdate(string|array<string> $shipdate) Return ChildOrdrhed objects filtered by the shipdate column
 * @method     ChildOrdrhed[]|Collection findByRevdate(string|array<string> $revdate) Return ChildOrdrhed objects filtered by the revdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByRevdate(string|array<string> $revdate) Return ChildOrdrhed objects filtered by the revdate column
 * @method     ChildOrdrhed[]|Collection findByExpdate(string|array<string> $expdate) Return ChildOrdrhed objects filtered by the expdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByExpdate(string|array<string> $expdate) Return ChildOrdrhed objects filtered by the expdate column
 * @method     ChildOrdrhed[]|Collection findByHasdocuments(string|array<string> $hasdocuments) Return ChildOrdrhed objects filtered by the hasdocuments column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByHasdocuments(string|array<string> $hasdocuments) Return ChildOrdrhed objects filtered by the hasdocuments column
 * @method     ChildOrdrhed[]|Collection findByHastracking(string|array<string> $hastracking) Return ChildOrdrhed objects filtered by the hastracking column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByHastracking(string|array<string> $hastracking) Return ChildOrdrhed objects filtered by the hastracking column
 * @method     ChildOrdrhed[]|Collection findBySubtotal(string|array<string> $subtotal) Return ChildOrdrhed objects filtered by the subtotal column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySubtotal(string|array<string> $subtotal) Return ChildOrdrhed objects filtered by the subtotal column
 * @method     ChildOrdrhed[]|Collection findBySalestax(string|array<string> $salestax) Return ChildOrdrhed objects filtered by the salestax column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySalestax(string|array<string> $salestax) Return ChildOrdrhed objects filtered by the salestax column
 * @method     ChildOrdrhed[]|Collection findByFreight(string|array<string> $freight) Return ChildOrdrhed objects filtered by the freight column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByFreight(string|array<string> $freight) Return ChildOrdrhed objects filtered by the freight column
 * @method     ChildOrdrhed[]|Collection findByMisccost(string|array<string> $misccost) Return ChildOrdrhed objects filtered by the misccost column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByMisccost(string|array<string> $misccost) Return ChildOrdrhed objects filtered by the misccost column
 * @method     ChildOrdrhed[]|Collection findByOrdertotal(string|array<string> $ordertotal) Return ChildOrdrhed objects filtered by the ordertotal column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByOrdertotal(string|array<string> $ordertotal) Return ChildOrdrhed objects filtered by the ordertotal column
 * @method     ChildOrdrhed[]|Collection findByHasnotes(string|array<string> $hasnotes) Return ChildOrdrhed objects filtered by the hasnotes column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByHasnotes(string|array<string> $hasnotes) Return ChildOrdrhed objects filtered by the hasnotes column
 * @method     ChildOrdrhed[]|Collection findByEditord(string|array<string> $editord) Return ChildOrdrhed objects filtered by the editord column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByEditord(string|array<string> $editord) Return ChildOrdrhed objects filtered by the editord column
 * @method     ChildOrdrhed[]|Collection findByError(string|array<string> $error) Return ChildOrdrhed objects filtered by the error column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByError(string|array<string> $error) Return ChildOrdrhed objects filtered by the error column
 * @method     ChildOrdrhed[]|Collection findByErrormsg(string|array<string> $errormsg) Return ChildOrdrhed objects filtered by the errormsg column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByErrormsg(string|array<string> $errormsg) Return ChildOrdrhed objects filtered by the errormsg column
 * @method     ChildOrdrhed[]|Collection findBySconame(string|array<string> $sconame) Return ChildOrdrhed objects filtered by the sconame column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySconame(string|array<string> $sconame) Return ChildOrdrhed objects filtered by the sconame column
 * @method     ChildOrdrhed[]|Collection findByShipname(string|array<string> $shipname) Return ChildOrdrhed objects filtered by the shipname column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipname(string|array<string> $shipname) Return ChildOrdrhed objects filtered by the shipname column
 * @method     ChildOrdrhed[]|Collection findByShipaddress(string|array<string> $shipaddress) Return ChildOrdrhed objects filtered by the shipaddress column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipaddress(string|array<string> $shipaddress) Return ChildOrdrhed objects filtered by the shipaddress column
 * @method     ChildOrdrhed[]|Collection findByShipaddress2(string|array<string> $shipaddress2) Return ChildOrdrhed objects filtered by the shipaddress2 column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipaddress2(string|array<string> $shipaddress2) Return ChildOrdrhed objects filtered by the shipaddress2 column
 * @method     ChildOrdrhed[]|Collection findByShipcity(string|array<string> $shipcity) Return ChildOrdrhed objects filtered by the shipcity column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipcity(string|array<string> $shipcity) Return ChildOrdrhed objects filtered by the shipcity column
 * @method     ChildOrdrhed[]|Collection findByShipstate(string|array<string> $shipstate) Return ChildOrdrhed objects filtered by the shipstate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipstate(string|array<string> $shipstate) Return ChildOrdrhed objects filtered by the shipstate column
 * @method     ChildOrdrhed[]|Collection findByShipzip(string|array<string> $shipzip) Return ChildOrdrhed objects filtered by the shipzip column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipzip(string|array<string> $shipzip) Return ChildOrdrhed objects filtered by the shipzip column
 * @method     ChildOrdrhed[]|Collection findByShipcountry(string|array<string> $shipcountry) Return ChildOrdrhed objects filtered by the shipcountry column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipcountry(string|array<string> $shipcountry) Return ChildOrdrhed objects filtered by the shipcountry column
 * @method     ChildOrdrhed[]|Collection findByContact(string|array<string> $contact) Return ChildOrdrhed objects filtered by the contact column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByContact(string|array<string> $contact) Return ChildOrdrhed objects filtered by the contact column
 * @method     ChildOrdrhed[]|Collection findByPhintl(string|array<string> $phintl) Return ChildOrdrhed objects filtered by the phintl column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPhintl(string|array<string> $phintl) Return ChildOrdrhed objects filtered by the phintl column
 * @method     ChildOrdrhed[]|Collection findByPhone(string|array<string> $phone) Return ChildOrdrhed objects filtered by the phone column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPhone(string|array<string> $phone) Return ChildOrdrhed objects filtered by the phone column
 * @method     ChildOrdrhed[]|Collection findByExtension(string|array<string> $extension) Return ChildOrdrhed objects filtered by the extension column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByExtension(string|array<string> $extension) Return ChildOrdrhed objects filtered by the extension column
 * @method     ChildOrdrhed[]|Collection findByFaxnbr(string|array<string> $faxnbr) Return ChildOrdrhed objects filtered by the faxnbr column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByFaxnbr(string|array<string> $faxnbr) Return ChildOrdrhed objects filtered by the faxnbr column
 * @method     ChildOrdrhed[]|Collection findByEmail(string|array<string> $email) Return ChildOrdrhed objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByEmail(string|array<string> $email) Return ChildOrdrhed objects filtered by the email column
 * @method     ChildOrdrhed[]|Collection findByReleasenbr(string|array<string> $releasenbr) Return ChildOrdrhed objects filtered by the releasenbr column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByReleasenbr(string|array<string> $releasenbr) Return ChildOrdrhed objects filtered by the releasenbr column
 * @method     ChildOrdrhed[]|Collection findByShipviacd(string|array<string> $shipviacd) Return ChildOrdrhed objects filtered by the shipviacd column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipviacd(string|array<string> $shipviacd) Return ChildOrdrhed objects filtered by the shipviacd column
 * @method     ChildOrdrhed[]|Collection findByShipviadesc(string|array<string> $shipviadesc) Return ChildOrdrhed objects filtered by the shipviadesc column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipviadesc(string|array<string> $shipviadesc) Return ChildOrdrhed objects filtered by the shipviadesc column
 * @method     ChildOrdrhed[]|Collection findByPricecode(string|array<string> $pricecode) Return ChildOrdrhed objects filtered by the pricecode column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPricecode(string|array<string> $pricecode) Return ChildOrdrhed objects filtered by the pricecode column
 * @method     ChildOrdrhed[]|Collection findByPricecodedesc(string|array<string> $pricecodedesc) Return ChildOrdrhed objects filtered by the pricecodedesc column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPricecodedesc(string|array<string> $pricecodedesc) Return ChildOrdrhed objects filtered by the pricecodedesc column
 * @method     ChildOrdrhed[]|Collection findByPricedisp(string|array<string> $pricedisp) Return ChildOrdrhed objects filtered by the pricedisp column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPricedisp(string|array<string> $pricedisp) Return ChildOrdrhed objects filtered by the pricedisp column
 * @method     ChildOrdrhed[]|Collection findByTaxcode(string|array<string> $taxcode) Return ChildOrdrhed objects filtered by the taxcode column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTaxcode(string|array<string> $taxcode) Return ChildOrdrhed objects filtered by the taxcode column
 * @method     ChildOrdrhed[]|Collection findByTaxcodedesc(string|array<string> $taxcodedesc) Return ChildOrdrhed objects filtered by the taxcodedesc column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTaxcodedesc(string|array<string> $taxcodedesc) Return ChildOrdrhed objects filtered by the taxcodedesc column
 * @method     ChildOrdrhed[]|Collection findByTaxcodedisp(string|array<string> $taxcodedisp) Return ChildOrdrhed objects filtered by the taxcodedisp column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTaxcodedisp(string|array<string> $taxcodedisp) Return ChildOrdrhed objects filtered by the taxcodedisp column
 * @method     ChildOrdrhed[]|Collection findByTermcode(string|array<string> $termcode) Return ChildOrdrhed objects filtered by the termcode column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTermcode(string|array<string> $termcode) Return ChildOrdrhed objects filtered by the termcode column
 * @method     ChildOrdrhed[]|Collection findByTermtype(string|array<string> $termtype) Return ChildOrdrhed objects filtered by the termtype column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTermtype(string|array<string> $termtype) Return ChildOrdrhed objects filtered by the termtype column
 * @method     ChildOrdrhed[]|Collection findByTermcodedesc(string|array<string> $termcodedesc) Return ChildOrdrhed objects filtered by the termcodedesc column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTermcodedesc(string|array<string> $termcodedesc) Return ChildOrdrhed objects filtered by the termcodedesc column
 * @method     ChildOrdrhed[]|Collection findByRqstdate(string|array<string> $rqstdate) Return ChildOrdrhed objects filtered by the rqstdate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByRqstdate(string|array<string> $rqstdate) Return ChildOrdrhed objects filtered by the rqstdate column
 * @method     ChildOrdrhed[]|Collection findByShipcom(string|array<string> $shipcom) Return ChildOrdrhed objects filtered by the shipcom column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByShipcom(string|array<string> $shipcom) Return ChildOrdrhed objects filtered by the shipcom column
 * @method     ChildOrdrhed[]|Collection findBySp1(string|array<string> $sp1) Return ChildOrdrhed objects filtered by the sp1 column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp1(string|array<string> $sp1) Return ChildOrdrhed objects filtered by the sp1 column
 * @method     ChildOrdrhed[]|Collection findBySp1name(string|array<string> $sp1name) Return ChildOrdrhed objects filtered by the sp1name column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp1name(string|array<string> $sp1name) Return ChildOrdrhed objects filtered by the sp1name column
 * @method     ChildOrdrhed[]|Collection findBySp2(string|array<string> $sp2) Return ChildOrdrhed objects filtered by the sp2 column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp2(string|array<string> $sp2) Return ChildOrdrhed objects filtered by the sp2 column
 * @method     ChildOrdrhed[]|Collection findBySp2name(string|array<string> $sp2name) Return ChildOrdrhed objects filtered by the sp2name column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp2name(string|array<string> $sp2name) Return ChildOrdrhed objects filtered by the sp2name column
 * @method     ChildOrdrhed[]|Collection findBySp2disp(string|array<string> $sp2disp) Return ChildOrdrhed objects filtered by the sp2disp column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp2disp(string|array<string> $sp2disp) Return ChildOrdrhed objects filtered by the sp2disp column
 * @method     ChildOrdrhed[]|Collection findBySp3(string|array<string> $sp3) Return ChildOrdrhed objects filtered by the sp3 column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp3(string|array<string> $sp3) Return ChildOrdrhed objects filtered by the sp3 column
 * @method     ChildOrdrhed[]|Collection findBySp3name(string|array<string> $sp3name) Return ChildOrdrhed objects filtered by the sp3name column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp3name(string|array<string> $sp3name) Return ChildOrdrhed objects filtered by the sp3name column
 * @method     ChildOrdrhed[]|Collection findBySp3disp(string|array<string> $sp3disp) Return ChildOrdrhed objects filtered by the sp3disp column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySp3disp(string|array<string> $sp3disp) Return ChildOrdrhed objects filtered by the sp3disp column
 * @method     ChildOrdrhed[]|Collection findByFob(string|array<string> $fob) Return ChildOrdrhed objects filtered by the fob column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByFob(string|array<string> $fob) Return ChildOrdrhed objects filtered by the fob column
 * @method     ChildOrdrhed[]|Collection findByDeliverydesc(string|array<string> $deliverydesc) Return ChildOrdrhed objects filtered by the deliverydesc column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByDeliverydesc(string|array<string> $deliverydesc) Return ChildOrdrhed objects filtered by the deliverydesc column
 * @method     ChildOrdrhed[]|Collection findByWhse(string|array<string> $whse) Return ChildOrdrhed objects filtered by the whse column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByWhse(string|array<string> $whse) Return ChildOrdrhed objects filtered by the whse column
 * @method     ChildOrdrhed[]|Collection findByCardnumber(string|array<string> $cardnumber) Return ChildOrdrhed objects filtered by the cardnumber column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCardnumber(string|array<string> $cardnumber) Return ChildOrdrhed objects filtered by the cardnumber column
 * @method     ChildOrdrhed[]|Collection findByCardexpire(string|array<string> $cardexpire) Return ChildOrdrhed objects filtered by the cardexpire column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCardexpire(string|array<string> $cardexpire) Return ChildOrdrhed objects filtered by the cardexpire column
 * @method     ChildOrdrhed[]|Collection findByCardcode(string|array<string> $cardcode) Return ChildOrdrhed objects filtered by the cardcode column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCardcode(string|array<string> $cardcode) Return ChildOrdrhed objects filtered by the cardcode column
 * @method     ChildOrdrhed[]|Collection findByCardapproval(string|array<string> $cardapproval) Return ChildOrdrhed objects filtered by the cardapproval column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByCardapproval(string|array<string> $cardapproval) Return ChildOrdrhed objects filtered by the cardapproval column
 * @method     ChildOrdrhed[]|Collection findByTotalcost(string|array<string> $totalcost) Return ChildOrdrhed objects filtered by the totalcost column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTotalcost(string|array<string> $totalcost) Return ChildOrdrhed objects filtered by the totalcost column
 * @method     ChildOrdrhed[]|Collection findByTotaldiscount(string|array<string> $totaldiscount) Return ChildOrdrhed objects filtered by the totaldiscount column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByTotaldiscount(string|array<string> $totaldiscount) Return ChildOrdrhed objects filtered by the totaldiscount column
 * @method     ChildOrdrhed[]|Collection findByPaymenttype(string|array<string> $paymenttype) Return ChildOrdrhed objects filtered by the paymenttype column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPaymenttype(string|array<string> $paymenttype) Return ChildOrdrhed objects filtered by the paymenttype column
 * @method     ChildOrdrhed[]|Collection findBySrcdatefrom(string|array<string> $srcdatefrom) Return ChildOrdrhed objects filtered by the srcdatefrom column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySrcdatefrom(string|array<string> $srcdatefrom) Return ChildOrdrhed objects filtered by the srcdatefrom column
 * @method     ChildOrdrhed[]|Collection findBySrcdatethru(string|array<string> $srcdatethru) Return ChildOrdrhed objects filtered by the srcdatethru column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findBySrcdatethru(string|array<string> $srcdatethru) Return ChildOrdrhed objects filtered by the srcdatethru column
 * @method     ChildOrdrhed[]|Collection findByBillname(string|array<string> $billname) Return ChildOrdrhed objects filtered by the billname column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBillname(string|array<string> $billname) Return ChildOrdrhed objects filtered by the billname column
 * @method     ChildOrdrhed[]|Collection findByBilladdress(string|array<string> $billaddress) Return ChildOrdrhed objects filtered by the billaddress column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBilladdress(string|array<string> $billaddress) Return ChildOrdrhed objects filtered by the billaddress column
 * @method     ChildOrdrhed[]|Collection findByBilladdress2(string|array<string> $billaddress2) Return ChildOrdrhed objects filtered by the billaddress2 column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBilladdress2(string|array<string> $billaddress2) Return ChildOrdrhed objects filtered by the billaddress2 column
 * @method     ChildOrdrhed[]|Collection findByBilladdress3(string|array<string> $billaddress3) Return ChildOrdrhed objects filtered by the billaddress3 column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBilladdress3(string|array<string> $billaddress3) Return ChildOrdrhed objects filtered by the billaddress3 column
 * @method     ChildOrdrhed[]|Collection findByBillcountry(string|array<string> $billcountry) Return ChildOrdrhed objects filtered by the billcountry column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBillcountry(string|array<string> $billcountry) Return ChildOrdrhed objects filtered by the billcountry column
 * @method     ChildOrdrhed[]|Collection findByBillcity(string|array<string> $billcity) Return ChildOrdrhed objects filtered by the billcity column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBillcity(string|array<string> $billcity) Return ChildOrdrhed objects filtered by the billcity column
 * @method     ChildOrdrhed[]|Collection findByBillstate(string|array<string> $billstate) Return ChildOrdrhed objects filtered by the billstate column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBillstate(string|array<string> $billstate) Return ChildOrdrhed objects filtered by the billstate column
 * @method     ChildOrdrhed[]|Collection findByBillzip(string|array<string> $billzip) Return ChildOrdrhed objects filtered by the billzip column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByBillzip(string|array<string> $billzip) Return ChildOrdrhed objects filtered by the billzip column
 * @method     ChildOrdrhed[]|Collection findByPrntfmt(string|array<string> $prntfmt) Return ChildOrdrhed objects filtered by the prntfmt column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPrntfmt(string|array<string> $prntfmt) Return ChildOrdrhed objects filtered by the prntfmt column
 * @method     ChildOrdrhed[]|Collection findByPrntfmtdisp(string|array<string> $prntfmtdisp) Return ChildOrdrhed objects filtered by the prntfmtdisp column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByPrntfmtdisp(string|array<string> $prntfmtdisp) Return ChildOrdrhed objects filtered by the prntfmtdisp column
 * @method     ChildOrdrhed[]|Collection findByDummy(string|array<string> $dummy) Return ChildOrdrhed objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildOrdrhed> findByDummy(string|array<string> $dummy) Return ChildOrdrhed objects filtered by the dummy column
 *
 * @method     ChildOrdrhed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrdrhed> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrdrhedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdrhedQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Ordrhed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdrhedQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdrhedQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
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
    public function findPk($key, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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
        $this->addUsingAlias(OrdrhedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OrdrhedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(OrdrhedTableMap::COL_ORDERNO, $key[2], Criteria::EQUAL);

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

        $this->addUsingAlias(OrdrhedTableMap::COL_SESSIONID, $sessionid, $comparison);

        return $this;
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
     * @param mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRecno($recno = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_RECNO, $recno, $comparison);

        return $this;
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
     * @param mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDate($date = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_DATE, $date, $comparison);

        return $this;
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
     * @param mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTime($time = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * $query->filterByType(['foo', 'bar']); // WHERE type IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $type The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByType($type = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TYPE, $type, $comparison);

        return $this;
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * $query->filterByCustid(['foo', 'bar']); // WHERE custid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $custid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustid($custid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CUSTID, $custid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shiptoid column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoid('fooValue');   // WHERE shiptoid = 'fooValue'
     * $query->filterByShiptoid('%fooValue%', Criteria::LIKE); // WHERE shiptoid LIKE '%fooValue%'
     * $query->filterByShiptoid(['foo', 'bar']); // WHERE shiptoid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shiptoid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPTOID, $shiptoid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the custname column
     *
     * Example usage:
     * <code>
     * $query->filterByCustname('fooValue');   // WHERE custname = 'fooValue'
     * $query->filterByCustname('%fooValue%', Criteria::LIKE); // WHERE custname LIKE '%fooValue%'
     * $query->filterByCustname(['foo', 'bar']); // WHERE custname IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $custname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustname($custname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CUSTNAME, $custname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno('fooValue');   // WHERE orderno = 'fooValue'
     * $query->filterByOrderno('%fooValue%', Criteria::LIKE); // WHERE orderno LIKE '%fooValue%'
     * $query->filterByOrderno(['foo', 'bar']); // WHERE orderno IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $orderno The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_ORDERNO, $orderno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the custpo column
     *
     * Example usage:
     * <code>
     * $query->filterByCustpo('fooValue');   // WHERE custpo = 'fooValue'
     * $query->filterByCustpo('%fooValue%', Criteria::LIKE); // WHERE custpo LIKE '%fooValue%'
     * $query->filterByCustpo(['foo', 'bar']); // WHERE custpo IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $custpo The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustpo($custpo = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custpo)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CUSTPO, $custpo, $comparison);

        return $this;
    }

    /**
     * Filter the query on the custref column
     *
     * Example usage:
     * <code>
     * $query->filterByCustref('fooValue');   // WHERE custref = 'fooValue'
     * $query->filterByCustref('%fooValue%', Criteria::LIKE); // WHERE custref LIKE '%fooValue%'
     * $query->filterByCustref(['foo', 'bar']); // WHERE custref IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $custref The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustref($custref = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custref)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CUSTREF, $custref, $comparison);

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

        $this->addUsingAlias(OrdrhedTableMap::COL_STATUS, $status, $comparison);

        return $this;
    }

    /**
     * Filter the query on the orderdate column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderdate('fooValue');   // WHERE orderdate = 'fooValue'
     * $query->filterByOrderdate('%fooValue%', Criteria::LIKE); // WHERE orderdate LIKE '%fooValue%'
     * $query->filterByOrderdate(['foo', 'bar']); // WHERE orderdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $orderdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrderdate($orderdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_ORDERDATE, $orderdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the careof column
     *
     * Example usage:
     * <code>
     * $query->filterByCareof('fooValue');   // WHERE careof = 'fooValue'
     * $query->filterByCareof('%fooValue%', Criteria::LIKE); // WHERE careof LIKE '%fooValue%'
     * $query->filterByCareof(['foo', 'bar']); // WHERE careof IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $careof The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCareof($careof = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($careof)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CAREOF, $careof, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotdate column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotdate('fooValue');   // WHERE quotdate = 'fooValue'
     * $query->filterByQuotdate('%fooValue%', Criteria::LIKE); // WHERE quotdate LIKE '%fooValue%'
     * $query->filterByQuotdate(['foo', 'bar']); // WHERE quotdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotdate($quotdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_QUOTDATE, $quotdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the invdate column
     *
     * Example usage:
     * <code>
     * $query->filterByInvdate('fooValue');   // WHERE invdate = 'fooValue'
     * $query->filterByInvdate('%fooValue%', Criteria::LIKE); // WHERE invdate LIKE '%fooValue%'
     * $query->filterByInvdate(['foo', 'bar']); // WHERE invdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $invdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByInvdate($invdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_INVDATE, $invdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipdate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipdate('fooValue');   // WHERE shipdate = 'fooValue'
     * $query->filterByShipdate('%fooValue%', Criteria::LIKE); // WHERE shipdate LIKE '%fooValue%'
     * $query->filterByShipdate(['foo', 'bar']); // WHERE shipdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipdate($shipdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPDATE, $shipdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the revdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRevdate('fooValue');   // WHERE revdate = 'fooValue'
     * $query->filterByRevdate('%fooValue%', Criteria::LIKE); // WHERE revdate LIKE '%fooValue%'
     * $query->filterByRevdate(['foo', 'bar']); // WHERE revdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $revdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRevdate($revdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($revdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_REVDATE, $revdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the expdate column
     *
     * Example usage:
     * <code>
     * $query->filterByExpdate('fooValue');   // WHERE expdate = 'fooValue'
     * $query->filterByExpdate('%fooValue%', Criteria::LIKE); // WHERE expdate LIKE '%fooValue%'
     * $query->filterByExpdate(['foo', 'bar']); // WHERE expdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $expdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByExpdate($expdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_EXPDATE, $expdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the hasdocuments column
     *
     * Example usage:
     * <code>
     * $query->filterByHasdocuments('fooValue');   // WHERE hasdocuments = 'fooValue'
     * $query->filterByHasdocuments('%fooValue%', Criteria::LIKE); // WHERE hasdocuments LIKE '%fooValue%'
     * $query->filterByHasdocuments(['foo', 'bar']); // WHERE hasdocuments IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $hasdocuments The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHasdocuments($hasdocuments = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasdocuments)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);

        return $this;
    }

    /**
     * Filter the query on the hastracking column
     *
     * Example usage:
     * <code>
     * $query->filterByHastracking('fooValue');   // WHERE hastracking = 'fooValue'
     * $query->filterByHastracking('%fooValue%', Criteria::LIKE); // WHERE hastracking LIKE '%fooValue%'
     * $query->filterByHastracking(['foo', 'bar']); // WHERE hastracking IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $hastracking The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHastracking($hastracking = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hastracking)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_HASTRACKING, $hastracking, $comparison);

        return $this;
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
     * @param mixed $subtotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_SUBTOTAL, $subtotal, $comparison);

        return $this;
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
     * @param mixed $salestax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalestax($salestax = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_SALESTAX, $salestax, $comparison);

        return $this;
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
     * @param mixed $freight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFreight($freight = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_FREIGHT, $freight, $comparison);

        return $this;
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
     * @param mixed $misccost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMisccost($misccost = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_MISCCOST, $misccost, $comparison);

        return $this;
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
     * @param mixed $ordertotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdertotal($ordertotal = null, ?string $comparison = null)
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

        $this->addUsingAlias(OrdrhedTableMap::COL_ORDERTOTAL, $ordertotal, $comparison);

        return $this;
    }

    /**
     * Filter the query on the hasnotes column
     *
     * Example usage:
     * <code>
     * $query->filterByHasnotes('fooValue');   // WHERE hasnotes = 'fooValue'
     * $query->filterByHasnotes('%fooValue%', Criteria::LIKE); // WHERE hasnotes LIKE '%fooValue%'
     * $query->filterByHasnotes(['foo', 'bar']); // WHERE hasnotes IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $hasnotes The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_HASNOTES, $hasnotes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the editord column
     *
     * Example usage:
     * <code>
     * $query->filterByEditord('fooValue');   // WHERE editord = 'fooValue'
     * $query->filterByEditord('%fooValue%', Criteria::LIKE); // WHERE editord LIKE '%fooValue%'
     * $query->filterByEditord(['foo', 'bar']); // WHERE editord IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $editord The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEditord($editord = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editord)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_EDITORD, $editord, $comparison);

        return $this;
    }

    /**
     * Filter the query on the error column
     *
     * Example usage:
     * <code>
     * $query->filterByError('fooValue');   // WHERE error = 'fooValue'
     * $query->filterByError('%fooValue%', Criteria::LIKE); // WHERE error LIKE '%fooValue%'
     * $query->filterByError(['foo', 'bar']); // WHERE error IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $error The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByError($error = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_ERROR, $error, $comparison);

        return $this;
    }

    /**
     * Filter the query on the errormsg column
     *
     * Example usage:
     * <code>
     * $query->filterByErrormsg('fooValue');   // WHERE errormsg = 'fooValue'
     * $query->filterByErrormsg('%fooValue%', Criteria::LIKE); // WHERE errormsg LIKE '%fooValue%'
     * $query->filterByErrormsg(['foo', 'bar']); // WHERE errormsg IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $errormsg The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_ERRORMSG, $errormsg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sconame column
     *
     * Example usage:
     * <code>
     * $query->filterBySconame('fooValue');   // WHERE sconame = 'fooValue'
     * $query->filterBySconame('%fooValue%', Criteria::LIKE); // WHERE sconame LIKE '%fooValue%'
     * $query->filterBySconame(['foo', 'bar']); // WHERE sconame IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sconame The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySconame($sconame = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sconame)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SCONAME, $sconame, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipname column
     *
     * Example usage:
     * <code>
     * $query->filterByShipname('fooValue');   // WHERE shipname = 'fooValue'
     * $query->filterByShipname('%fooValue%', Criteria::LIKE); // WHERE shipname LIKE '%fooValue%'
     * $query->filterByShipname(['foo', 'bar']); // WHERE shipname IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipname($shipname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPNAME, $shipname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress('fooValue');   // WHERE shipaddress = 'fooValue'
     * $query->filterByShipaddress('%fooValue%', Criteria::LIKE); // WHERE shipaddress LIKE '%fooValue%'
     * $query->filterByShipaddress(['foo', 'bar']); // WHERE shipaddress IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipaddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipaddress($shipaddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPADDRESS, $shipaddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipaddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress2('fooValue');   // WHERE shipaddress2 = 'fooValue'
     * $query->filterByShipaddress2('%fooValue%', Criteria::LIKE); // WHERE shipaddress2 LIKE '%fooValue%'
     * $query->filterByShipaddress2(['foo', 'bar']); // WHERE shipaddress2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipaddress2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipaddress2($shipaddress2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPADDRESS2, $shipaddress2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipcity column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcity('fooValue');   // WHERE shipcity = 'fooValue'
     * $query->filterByShipcity('%fooValue%', Criteria::LIKE); // WHERE shipcity LIKE '%fooValue%'
     * $query->filterByShipcity(['foo', 'bar']); // WHERE shipcity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipcity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipcity($shipcity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPCITY, $shipcity, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipstate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipstate('fooValue');   // WHERE shipstate = 'fooValue'
     * $query->filterByShipstate('%fooValue%', Criteria::LIKE); // WHERE shipstate LIKE '%fooValue%'
     * $query->filterByShipstate(['foo', 'bar']); // WHERE shipstate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipstate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipstate($shipstate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipstate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPSTATE, $shipstate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipzip column
     *
     * Example usage:
     * <code>
     * $query->filterByShipzip('fooValue');   // WHERE shipzip = 'fooValue'
     * $query->filterByShipzip('%fooValue%', Criteria::LIKE); // WHERE shipzip LIKE '%fooValue%'
     * $query->filterByShipzip(['foo', 'bar']); // WHERE shipzip IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipzip The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipzip($shipzip = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipzip)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPZIP, $shipzip, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcountry('fooValue');   // WHERE shipcountry = 'fooValue'
     * $query->filterByShipcountry('%fooValue%', Criteria::LIKE); // WHERE shipcountry LIKE '%fooValue%'
     * $query->filterByShipcountry(['foo', 'bar']); // WHERE shipcountry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipcountry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipcountry($shipcountry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcountry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPCOUNTRY, $shipcountry, $comparison);

        return $this;
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%', Criteria::LIKE); // WHERE contact LIKE '%fooValue%'
     * $query->filterByContact(['foo', 'bar']); // WHERE contact IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $contact The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByContact($contact = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CONTACT, $contact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the phintl column
     *
     * Example usage:
     * <code>
     * $query->filterByPhintl('fooValue');   // WHERE phintl = 'fooValue'
     * $query->filterByPhintl('%fooValue%', Criteria::LIKE); // WHERE phintl LIKE '%fooValue%'
     * $query->filterByPhintl(['foo', 'bar']); // WHERE phintl IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $phintl The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPhintl($phintl = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phintl)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PHINTL, $phintl, $comparison);

        return $this;
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * $query->filterByPhone(['foo', 'bar']); // WHERE phone IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $phone The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPhone($phone = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PHONE, $phone, $comparison);

        return $this;
    }

    /**
     * Filter the query on the extension column
     *
     * Example usage:
     * <code>
     * $query->filterByExtension('fooValue');   // WHERE extension = 'fooValue'
     * $query->filterByExtension('%fooValue%', Criteria::LIKE); // WHERE extension LIKE '%fooValue%'
     * $query->filterByExtension(['foo', 'bar']); // WHERE extension IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $extension The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByExtension($extension = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extension)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_EXTENSION, $extension, $comparison);

        return $this;
    }

    /**
     * Filter the query on the faxnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxnbr('fooValue');   // WHERE faxnbr = 'fooValue'
     * $query->filterByFaxnbr('%fooValue%', Criteria::LIKE); // WHERE faxnbr LIKE '%fooValue%'
     * $query->filterByFaxnbr(['foo', 'bar']); // WHERE faxnbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $faxnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFaxnbr($faxnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_FAXNBR, $faxnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * $query->filterByEmail(['foo', 'bar']); // WHERE email IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $email The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEmail($email = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_EMAIL, $email, $comparison);

        return $this;
    }

    /**
     * Filter the query on the releasenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByReleasenbr('fooValue');   // WHERE releasenbr = 'fooValue'
     * $query->filterByReleasenbr('%fooValue%', Criteria::LIKE); // WHERE releasenbr LIKE '%fooValue%'
     * $query->filterByReleasenbr(['foo', 'bar']); // WHERE releasenbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $releasenbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByReleasenbr($releasenbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($releasenbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_RELEASENBR, $releasenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipviacd column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviacd('fooValue');   // WHERE shipviacd = 'fooValue'
     * $query->filterByShipviacd('%fooValue%', Criteria::LIKE); // WHERE shipviacd LIKE '%fooValue%'
     * $query->filterByShipviacd(['foo', 'bar']); // WHERE shipviacd IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipviacd The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipviacd($shipviacd = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviacd)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPVIACD, $shipviacd, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipviadesc column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviadesc('fooValue');   // WHERE shipviadesc = 'fooValue'
     * $query->filterByShipviadesc('%fooValue%', Criteria::LIKE); // WHERE shipviadesc LIKE '%fooValue%'
     * $query->filterByShipviadesc(['foo', 'bar']); // WHERE shipviadesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipviadesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipviadesc($shipviadesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviadesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPVIADESC, $shipviadesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the pricecode column
     *
     * Example usage:
     * <code>
     * $query->filterByPricecode('fooValue');   // WHERE pricecode = 'fooValue'
     * $query->filterByPricecode('%fooValue%', Criteria::LIKE); // WHERE pricecode LIKE '%fooValue%'
     * $query->filterByPricecode(['foo', 'bar']); // WHERE pricecode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pricecode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPricecode($pricecode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricecode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PRICECODE, $pricecode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the pricecodedesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPricecodedesc('fooValue');   // WHERE pricecodedesc = 'fooValue'
     * $query->filterByPricecodedesc('%fooValue%', Criteria::LIKE); // WHERE pricecodedesc LIKE '%fooValue%'
     * $query->filterByPricecodedesc(['foo', 'bar']); // WHERE pricecodedesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pricecodedesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPricecodedesc($pricecodedesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricecodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PRICECODEDESC, $pricecodedesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the pricedisp column
     *
     * Example usage:
     * <code>
     * $query->filterByPricedisp('fooValue');   // WHERE pricedisp = 'fooValue'
     * $query->filterByPricedisp('%fooValue%', Criteria::LIKE); // WHERE pricedisp LIKE '%fooValue%'
     * $query->filterByPricedisp(['foo', 'bar']); // WHERE pricedisp IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pricedisp The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPricedisp($pricedisp = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pricedisp)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PRICEDISP, $pricedisp, $comparison);

        return $this;
    }

    /**
     * Filter the query on the taxcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcode('fooValue');   // WHERE taxcode = 'fooValue'
     * $query->filterByTaxcode('%fooValue%', Criteria::LIKE); // WHERE taxcode LIKE '%fooValue%'
     * $query->filterByTaxcode(['foo', 'bar']); // WHERE taxcode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $taxcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTaxcode($taxcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TAXCODE, $taxcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the taxcodedesc column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcodedesc('fooValue');   // WHERE taxcodedesc = 'fooValue'
     * $query->filterByTaxcodedesc('%fooValue%', Criteria::LIKE); // WHERE taxcodedesc LIKE '%fooValue%'
     * $query->filterByTaxcodedesc(['foo', 'bar']); // WHERE taxcodedesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $taxcodedesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTaxcodedesc($taxcodedesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TAXCODEDESC, $taxcodedesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the taxcodedisp column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcodedisp('fooValue');   // WHERE taxcodedisp = 'fooValue'
     * $query->filterByTaxcodedisp('%fooValue%', Criteria::LIKE); // WHERE taxcodedisp LIKE '%fooValue%'
     * $query->filterByTaxcodedisp(['foo', 'bar']); // WHERE taxcodedisp IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $taxcodedisp The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTaxcodedisp($taxcodedisp = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodedisp)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TAXCODEDISP, $taxcodedisp, $comparison);

        return $this;
    }

    /**
     * Filter the query on the termcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTermcode('fooValue');   // WHERE termcode = 'fooValue'
     * $query->filterByTermcode('%fooValue%', Criteria::LIKE); // WHERE termcode LIKE '%fooValue%'
     * $query->filterByTermcode(['foo', 'bar']); // WHERE termcode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $termcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTermcode($termcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TERMCODE, $termcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the termtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTermtype('fooValue');   // WHERE termtype = 'fooValue'
     * $query->filterByTermtype('%fooValue%', Criteria::LIKE); // WHERE termtype LIKE '%fooValue%'
     * $query->filterByTermtype(['foo', 'bar']); // WHERE termtype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $termtype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTermtype($termtype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termtype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TERMTYPE, $termtype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the termcodedesc column
     *
     * Example usage:
     * <code>
     * $query->filterByTermcodedesc('fooValue');   // WHERE termcodedesc = 'fooValue'
     * $query->filterByTermcodedesc('%fooValue%', Criteria::LIKE); // WHERE termcodedesc LIKE '%fooValue%'
     * $query->filterByTermcodedesc(['foo', 'bar']); // WHERE termcodedesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $termcodedesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTermcodedesc($termcodedesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcodedesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TERMCODEDESC, $termcodedesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the rqstdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRqstdate('fooValue');   // WHERE rqstdate = 'fooValue'
     * $query->filterByRqstdate('%fooValue%', Criteria::LIKE); // WHERE rqstdate LIKE '%fooValue%'
     * $query->filterByRqstdate(['foo', 'bar']); // WHERE rqstdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $rqstdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRqstdate($rqstdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rqstdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_RQSTDATE, $rqstdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipcom column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcom('fooValue');   // WHERE shipcom = 'fooValue'
     * $query->filterByShipcom('%fooValue%', Criteria::LIKE); // WHERE shipcom LIKE '%fooValue%'
     * $query->filterByShipcom(['foo', 'bar']); // WHERE shipcom IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipcom The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipcom($shipcom = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcom)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SHIPCOM, $shipcom, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1('fooValue');   // WHERE sp1 = 'fooValue'
     * $query->filterBySp1('%fooValue%', Criteria::LIKE); // WHERE sp1 LIKE '%fooValue%'
     * $query->filterBySp1(['foo', 'bar']); // WHERE sp1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp1($sp1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP1, $sp1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp1name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1name('fooValue');   // WHERE sp1name = 'fooValue'
     * $query->filterBySp1name('%fooValue%', Criteria::LIKE); // WHERE sp1name LIKE '%fooValue%'
     * $query->filterBySp1name(['foo', 'bar']); // WHERE sp1name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp1name The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp1name($sp1name = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1name)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP1NAME, $sp1name, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2('fooValue');   // WHERE sp2 = 'fooValue'
     * $query->filterBySp2('%fooValue%', Criteria::LIKE); // WHERE sp2 LIKE '%fooValue%'
     * $query->filterBySp2(['foo', 'bar']); // WHERE sp2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp2($sp2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP2, $sp2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp2name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2name('fooValue');   // WHERE sp2name = 'fooValue'
     * $query->filterBySp2name('%fooValue%', Criteria::LIKE); // WHERE sp2name LIKE '%fooValue%'
     * $query->filterBySp2name(['foo', 'bar']); // WHERE sp2name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp2name The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp2name($sp2name = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2name)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP2NAME, $sp2name, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp2disp column
     *
     * Example usage:
     * <code>
     * $query->filterBySp2disp('fooValue');   // WHERE sp2disp = 'fooValue'
     * $query->filterBySp2disp('%fooValue%', Criteria::LIKE); // WHERE sp2disp LIKE '%fooValue%'
     * $query->filterBySp2disp(['foo', 'bar']); // WHERE sp2disp IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp2disp The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp2disp($sp2disp = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp2disp)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP2DISP, $sp2disp, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3('fooValue');   // WHERE sp3 = 'fooValue'
     * $query->filterBySp3('%fooValue%', Criteria::LIKE); // WHERE sp3 LIKE '%fooValue%'
     * $query->filterBySp3(['foo', 'bar']); // WHERE sp3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp3($sp3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP3, $sp3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp3name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3name('fooValue');   // WHERE sp3name = 'fooValue'
     * $query->filterBySp3name('%fooValue%', Criteria::LIKE); // WHERE sp3name LIKE '%fooValue%'
     * $query->filterBySp3name(['foo', 'bar']); // WHERE sp3name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp3name The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp3name($sp3name = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3name)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP3NAME, $sp3name, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sp3disp column
     *
     * Example usage:
     * <code>
     * $query->filterBySp3disp('fooValue');   // WHERE sp3disp = 'fooValue'
     * $query->filterBySp3disp('%fooValue%', Criteria::LIKE); // WHERE sp3disp LIKE '%fooValue%'
     * $query->filterBySp3disp(['foo', 'bar']); // WHERE sp3disp IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sp3disp The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySp3disp($sp3disp = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp3disp)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SP3DISP, $sp3disp, $comparison);

        return $this;
    }

    /**
     * Filter the query on the fob column
     *
     * Example usage:
     * <code>
     * $query->filterByFob('fooValue');   // WHERE fob = 'fooValue'
     * $query->filterByFob('%fooValue%', Criteria::LIKE); // WHERE fob LIKE '%fooValue%'
     * $query->filterByFob(['foo', 'bar']); // WHERE fob IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $fob The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFob($fob = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fob)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_FOB, $fob, $comparison);

        return $this;
    }

    /**
     * Filter the query on the deliverydesc column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliverydesc('fooValue');   // WHERE deliverydesc = 'fooValue'
     * $query->filterByDeliverydesc('%fooValue%', Criteria::LIKE); // WHERE deliverydesc LIKE '%fooValue%'
     * $query->filterByDeliverydesc(['foo', 'bar']); // WHERE deliverydesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $deliverydesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDeliverydesc($deliverydesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deliverydesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_DELIVERYDESC, $deliverydesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * $query->filterByWhse(['foo', 'bar']); // WHERE whse IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $whse The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByWhse($whse = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_WHSE, $whse, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cardnumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCardnumber('fooValue');   // WHERE cardnumber = 'fooValue'
     * $query->filterByCardnumber('%fooValue%', Criteria::LIKE); // WHERE cardnumber LIKE '%fooValue%'
     * $query->filterByCardnumber(['foo', 'bar']); // WHERE cardnumber IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cardnumber The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCardnumber($cardnumber = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardnumber)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CARDNUMBER, $cardnumber, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cardexpire column
     *
     * Example usage:
     * <code>
     * $query->filterByCardexpire('fooValue');   // WHERE cardexpire = 'fooValue'
     * $query->filterByCardexpire('%fooValue%', Criteria::LIKE); // WHERE cardexpire LIKE '%fooValue%'
     * $query->filterByCardexpire(['foo', 'bar']); // WHERE cardexpire IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cardexpire The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCardexpire($cardexpire = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardexpire)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CARDEXPIRE, $cardexpire, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cardcode column
     *
     * Example usage:
     * <code>
     * $query->filterByCardcode('fooValue');   // WHERE cardcode = 'fooValue'
     * $query->filterByCardcode('%fooValue%', Criteria::LIKE); // WHERE cardcode LIKE '%fooValue%'
     * $query->filterByCardcode(['foo', 'bar']); // WHERE cardcode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cardcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCardcode($cardcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CARDCODE, $cardcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cardapproval column
     *
     * Example usage:
     * <code>
     * $query->filterByCardapproval('fooValue');   // WHERE cardapproval = 'fooValue'
     * $query->filterByCardapproval('%fooValue%', Criteria::LIKE); // WHERE cardapproval LIKE '%fooValue%'
     * $query->filterByCardapproval(['foo', 'bar']); // WHERE cardapproval IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cardapproval The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCardapproval($cardapproval = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardapproval)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_CARDAPPROVAL, $cardapproval, $comparison);

        return $this;
    }

    /**
     * Filter the query on the totalcost column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalcost('fooValue');   // WHERE totalcost = 'fooValue'
     * $query->filterByTotalcost('%fooValue%', Criteria::LIKE); // WHERE totalcost LIKE '%fooValue%'
     * $query->filterByTotalcost(['foo', 'bar']); // WHERE totalcost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $totalcost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTotalcost($totalcost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalcost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TOTALCOST, $totalcost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the totaldiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaldiscount('fooValue');   // WHERE totaldiscount = 'fooValue'
     * $query->filterByTotaldiscount('%fooValue%', Criteria::LIKE); // WHERE totaldiscount LIKE '%fooValue%'
     * $query->filterByTotaldiscount(['foo', 'bar']); // WHERE totaldiscount IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $totaldiscount The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTotaldiscount($totaldiscount = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totaldiscount)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_TOTALDISCOUNT, $totaldiscount, $comparison);

        return $this;
    }

    /**
     * Filter the query on the paymenttype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymenttype('fooValue');   // WHERE paymenttype = 'fooValue'
     * $query->filterByPaymenttype('%fooValue%', Criteria::LIKE); // WHERE paymenttype LIKE '%fooValue%'
     * $query->filterByPaymenttype(['foo', 'bar']); // WHERE paymenttype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $paymenttype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPaymenttype($paymenttype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymenttype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PAYMENTTYPE, $paymenttype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the srcdatefrom column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcdatefrom('fooValue');   // WHERE srcdatefrom = 'fooValue'
     * $query->filterBySrcdatefrom('%fooValue%', Criteria::LIKE); // WHERE srcdatefrom LIKE '%fooValue%'
     * $query->filterBySrcdatefrom(['foo', 'bar']); // WHERE srcdatefrom IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $srcdatefrom The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySrcdatefrom($srcdatefrom = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcdatefrom)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SRCDATEFROM, $srcdatefrom, $comparison);

        return $this;
    }

    /**
     * Filter the query on the srcdatethru column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcdatethru('fooValue');   // WHERE srcdatethru = 'fooValue'
     * $query->filterBySrcdatethru('%fooValue%', Criteria::LIKE); // WHERE srcdatethru LIKE '%fooValue%'
     * $query->filterBySrcdatethru(['foo', 'bar']); // WHERE srcdatethru IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $srcdatethru The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySrcdatethru($srcdatethru = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcdatethru)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_SRCDATETHRU, $srcdatethru, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billname column
     *
     * Example usage:
     * <code>
     * $query->filterByBillname('fooValue');   // WHERE billname = 'fooValue'
     * $query->filterByBillname('%fooValue%', Criteria::LIKE); // WHERE billname LIKE '%fooValue%'
     * $query->filterByBillname(['foo', 'bar']); // WHERE billname IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBillname($billname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLNAME, $billname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByBilladdress('fooValue');   // WHERE billaddress = 'fooValue'
     * $query->filterByBilladdress('%fooValue%', Criteria::LIKE); // WHERE billaddress LIKE '%fooValue%'
     * $query->filterByBilladdress(['foo', 'bar']); // WHERE billaddress IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billaddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBilladdress($billaddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLADDRESS, $billaddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billaddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByBilladdress2('fooValue');   // WHERE billaddress2 = 'fooValue'
     * $query->filterByBilladdress2('%fooValue%', Criteria::LIKE); // WHERE billaddress2 LIKE '%fooValue%'
     * $query->filterByBilladdress2(['foo', 'bar']); // WHERE billaddress2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billaddress2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBilladdress2($billaddress2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLADDRESS2, $billaddress2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billaddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterByBilladdress3('fooValue');   // WHERE billaddress3 = 'fooValue'
     * $query->filterByBilladdress3('%fooValue%', Criteria::LIKE); // WHERE billaddress3 LIKE '%fooValue%'
     * $query->filterByBilladdress3(['foo', 'bar']); // WHERE billaddress3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billaddress3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBilladdress3($billaddress3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billaddress3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLADDRESS3, $billaddress3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByBillcountry('fooValue');   // WHERE billcountry = 'fooValue'
     * $query->filterByBillcountry('%fooValue%', Criteria::LIKE); // WHERE billcountry LIKE '%fooValue%'
     * $query->filterByBillcountry(['foo', 'bar']); // WHERE billcountry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billcountry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBillcountry($billcountry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billcountry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLCOUNTRY, $billcountry, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billcity column
     *
     * Example usage:
     * <code>
     * $query->filterByBillcity('fooValue');   // WHERE billcity = 'fooValue'
     * $query->filterByBillcity('%fooValue%', Criteria::LIKE); // WHERE billcity LIKE '%fooValue%'
     * $query->filterByBillcity(['foo', 'bar']); // WHERE billcity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billcity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBillcity($billcity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billcity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLCITY, $billcity, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billstate column
     *
     * Example usage:
     * <code>
     * $query->filterByBillstate('fooValue');   // WHERE billstate = 'fooValue'
     * $query->filterByBillstate('%fooValue%', Criteria::LIKE); // WHERE billstate LIKE '%fooValue%'
     * $query->filterByBillstate(['foo', 'bar']); // WHERE billstate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billstate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBillstate($billstate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billstate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLSTATE, $billstate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the billzip column
     *
     * Example usage:
     * <code>
     * $query->filterByBillzip('fooValue');   // WHERE billzip = 'fooValue'
     * $query->filterByBillzip('%fooValue%', Criteria::LIKE); // WHERE billzip LIKE '%fooValue%'
     * $query->filterByBillzip(['foo', 'bar']); // WHERE billzip IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $billzip The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBillzip($billzip = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billzip)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_BILLZIP, $billzip, $comparison);

        return $this;
    }

    /**
     * Filter the query on the prntfmt column
     *
     * Example usage:
     * <code>
     * $query->filterByPrntfmt('fooValue');   // WHERE prntfmt = 'fooValue'
     * $query->filterByPrntfmt('%fooValue%', Criteria::LIKE); // WHERE prntfmt LIKE '%fooValue%'
     * $query->filterByPrntfmt(['foo', 'bar']); // WHERE prntfmt IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $prntfmt The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrntfmt($prntfmt = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prntfmt)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PRNTFMT, $prntfmt, $comparison);

        return $this;
    }

    /**
     * Filter the query on the prntfmtdisp column
     *
     * Example usage:
     * <code>
     * $query->filterByPrntfmtdisp('fooValue');   // WHERE prntfmtdisp = 'fooValue'
     * $query->filterByPrntfmtdisp('%fooValue%', Criteria::LIKE); // WHERE prntfmtdisp LIKE '%fooValue%'
     * $query->filterByPrntfmtdisp(['foo', 'bar']); // WHERE prntfmtdisp IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $prntfmtdisp The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrntfmtdisp($prntfmtdisp = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prntfmtdisp)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdrhedTableMap::COL_PRNTFMTDISP, $prntfmtdisp, $comparison);

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

        $this->addUsingAlias(OrdrhedTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildOrdrhed $ordrhed Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
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
    public function doDeleteAll(?ConnectionInterface $con = null): int
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
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
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

}
