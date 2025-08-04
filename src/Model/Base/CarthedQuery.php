<?php

namespace Base;

use \Carthed as ChildCarthed;
use \CarthedQuery as ChildCarthedQuery;
use \Exception;
use \PDO;
use Map\CarthedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `carthed` table.
 *
 * @method     ChildCarthedQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCarthedQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCarthedQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCarthedQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCarthedQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCarthedQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildCarthedQuery orderByCustname($order = Criteria::ASC) Order by the custname column
 * @method     ChildCarthedQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildCarthedQuery orderByCustpo($order = Criteria::ASC) Order by the custpo column
 * @method     ChildCarthedQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildCarthedQuery orderByOrderdate($order = Criteria::ASC) Order by the orderdate column
 * @method     ChildCarthedQuery orderByInvdate($order = Criteria::ASC) Order by the invdate column
 * @method     ChildCarthedQuery orderByShipdate($order = Criteria::ASC) Order by the shipdate column
 * @method     ChildCarthedQuery orderByHasdocuments($order = Criteria::ASC) Order by the hasdocuments column
 * @method     ChildCarthedQuery orderByHastracking($order = Criteria::ASC) Order by the hastracking column
 * @method     ChildCarthedQuery orderBySubtotal($order = Criteria::ASC) Order by the subtotal column
 * @method     ChildCarthedQuery orderBySalestax($order = Criteria::ASC) Order by the salestax column
 * @method     ChildCarthedQuery orderByFreight($order = Criteria::ASC) Order by the freight column
 * @method     ChildCarthedQuery orderByMisccost($order = Criteria::ASC) Order by the misccost column
 * @method     ChildCarthedQuery orderByOrdertotal($order = Criteria::ASC) Order by the ordertotal column
 * @method     ChildCarthedQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildCarthedQuery orderByEditord($order = Criteria::ASC) Order by the editord column
 * @method     ChildCarthedQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildCarthedQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildCarthedQuery orderBySconame($order = Criteria::ASC) Order by the sconame column
 * @method     ChildCarthedQuery orderByShipname($order = Criteria::ASC) Order by the shipname column
 * @method     ChildCarthedQuery orderByShipaddress($order = Criteria::ASC) Order by the shipaddress column
 * @method     ChildCarthedQuery orderByShipaddress2($order = Criteria::ASC) Order by the shipaddress2 column
 * @method     ChildCarthedQuery orderByShipcity($order = Criteria::ASC) Order by the shipcity column
 * @method     ChildCarthedQuery orderByShipstate($order = Criteria::ASC) Order by the shipstate column
 * @method     ChildCarthedQuery orderByShipzip($order = Criteria::ASC) Order by the shipzip column
 * @method     ChildCarthedQuery orderByShipcountry($order = Criteria::ASC) Order by the shipcountry column
 * @method     ChildCarthedQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildCarthedQuery orderByPhintl($order = Criteria::ASC) Order by the phintl column
 * @method     ChildCarthedQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildCarthedQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildCarthedQuery orderByFaxnbr($order = Criteria::ASC) Order by the faxnbr column
 * @method     ChildCarthedQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCarthedQuery orderByReleasenbr($order = Criteria::ASC) Order by the releasenbr column
 * @method     ChildCarthedQuery orderByShipviacd($order = Criteria::ASC) Order by the shipviacd column
 * @method     ChildCarthedQuery orderByShipviadesc($order = Criteria::ASC) Order by the shipviadesc column
 * @method     ChildCarthedQuery orderByTermcode($order = Criteria::ASC) Order by the termcode column
 * @method     ChildCarthedQuery orderByTermtype($order = Criteria::ASC) Order by the termtype column
 * @method     ChildCarthedQuery orderByTermdesc($order = Criteria::ASC) Order by the termdesc column
 * @method     ChildCarthedQuery orderByRqstdate($order = Criteria::ASC) Order by the rqstdate column
 * @method     ChildCarthedQuery orderByShipcom($order = Criteria::ASC) Order by the shipcom column
 * @method     ChildCarthedQuery orderBySp1($order = Criteria::ASC) Order by the sp1 column
 * @method     ChildCarthedQuery orderBySp1name($order = Criteria::ASC) Order by the sp1name column
 * @method     ChildCarthedQuery orderByCardnumber($order = Criteria::ASC) Order by the cardnumber column
 * @method     ChildCarthedQuery orderByCardexpire($order = Criteria::ASC) Order by the cardexpire column
 * @method     ChildCarthedQuery orderByCardcode($order = Criteria::ASC) Order by the cardcode column
 * @method     ChildCarthedQuery orderByCardapproval($order = Criteria::ASC) Order by the cardapproval column
 * @method     ChildCarthedQuery orderByTotalcost($order = Criteria::ASC) Order by the totalcost column
 * @method     ChildCarthedQuery orderByTotaldiscount($order = Criteria::ASC) Order by the totaldiscount column
 * @method     ChildCarthedQuery orderByPaymenttype($order = Criteria::ASC) Order by the paymenttype column
 * @method     ChildCarthedQuery orderBySrcdatefrom($order = Criteria::ASC) Order by the srcdatefrom column
 * @method     ChildCarthedQuery orderBySrcdatethru($order = Criteria::ASC) Order by the srcdatethru column
 * @method     ChildCarthedQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCarthedQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCarthedQuery groupByRecno() Group by the recno column
 * @method     ChildCarthedQuery groupByDate() Group by the date column
 * @method     ChildCarthedQuery groupByTime() Group by the time column
 * @method     ChildCarthedQuery groupByCustid() Group by the custid column
 * @method     ChildCarthedQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildCarthedQuery groupByCustname() Group by the custname column
 * @method     ChildCarthedQuery groupByOrderno() Group by the orderno column
 * @method     ChildCarthedQuery groupByCustpo() Group by the custpo column
 * @method     ChildCarthedQuery groupByStatus() Group by the status column
 * @method     ChildCarthedQuery groupByOrderdate() Group by the orderdate column
 * @method     ChildCarthedQuery groupByInvdate() Group by the invdate column
 * @method     ChildCarthedQuery groupByShipdate() Group by the shipdate column
 * @method     ChildCarthedQuery groupByHasdocuments() Group by the hasdocuments column
 * @method     ChildCarthedQuery groupByHastracking() Group by the hastracking column
 * @method     ChildCarthedQuery groupBySubtotal() Group by the subtotal column
 * @method     ChildCarthedQuery groupBySalestax() Group by the salestax column
 * @method     ChildCarthedQuery groupByFreight() Group by the freight column
 * @method     ChildCarthedQuery groupByMisccost() Group by the misccost column
 * @method     ChildCarthedQuery groupByOrdertotal() Group by the ordertotal column
 * @method     ChildCarthedQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildCarthedQuery groupByEditord() Group by the editord column
 * @method     ChildCarthedQuery groupByError() Group by the error column
 * @method     ChildCarthedQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildCarthedQuery groupBySconame() Group by the sconame column
 * @method     ChildCarthedQuery groupByShipname() Group by the shipname column
 * @method     ChildCarthedQuery groupByShipaddress() Group by the shipaddress column
 * @method     ChildCarthedQuery groupByShipaddress2() Group by the shipaddress2 column
 * @method     ChildCarthedQuery groupByShipcity() Group by the shipcity column
 * @method     ChildCarthedQuery groupByShipstate() Group by the shipstate column
 * @method     ChildCarthedQuery groupByShipzip() Group by the shipzip column
 * @method     ChildCarthedQuery groupByShipcountry() Group by the shipcountry column
 * @method     ChildCarthedQuery groupByContact() Group by the contact column
 * @method     ChildCarthedQuery groupByPhintl() Group by the phintl column
 * @method     ChildCarthedQuery groupByPhone() Group by the phone column
 * @method     ChildCarthedQuery groupByExtension() Group by the extension column
 * @method     ChildCarthedQuery groupByFaxnbr() Group by the faxnbr column
 * @method     ChildCarthedQuery groupByEmail() Group by the email column
 * @method     ChildCarthedQuery groupByReleasenbr() Group by the releasenbr column
 * @method     ChildCarthedQuery groupByShipviacd() Group by the shipviacd column
 * @method     ChildCarthedQuery groupByShipviadesc() Group by the shipviadesc column
 * @method     ChildCarthedQuery groupByTermcode() Group by the termcode column
 * @method     ChildCarthedQuery groupByTermtype() Group by the termtype column
 * @method     ChildCarthedQuery groupByTermdesc() Group by the termdesc column
 * @method     ChildCarthedQuery groupByRqstdate() Group by the rqstdate column
 * @method     ChildCarthedQuery groupByShipcom() Group by the shipcom column
 * @method     ChildCarthedQuery groupBySp1() Group by the sp1 column
 * @method     ChildCarthedQuery groupBySp1name() Group by the sp1name column
 * @method     ChildCarthedQuery groupByCardnumber() Group by the cardnumber column
 * @method     ChildCarthedQuery groupByCardexpire() Group by the cardexpire column
 * @method     ChildCarthedQuery groupByCardcode() Group by the cardcode column
 * @method     ChildCarthedQuery groupByCardapproval() Group by the cardapproval column
 * @method     ChildCarthedQuery groupByTotalcost() Group by the totalcost column
 * @method     ChildCarthedQuery groupByTotaldiscount() Group by the totaldiscount column
 * @method     ChildCarthedQuery groupByPaymenttype() Group by the paymenttype column
 * @method     ChildCarthedQuery groupBySrcdatefrom() Group by the srcdatefrom column
 * @method     ChildCarthedQuery groupBySrcdatethru() Group by the srcdatethru column
 * @method     ChildCarthedQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCarthedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCarthedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCarthedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCarthedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCarthedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCarthedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCarthed|null findOne(?ConnectionInterface $con = null) Return the first ChildCarthed matching the query
 * @method     ChildCarthed findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCarthed matching the query, or a new ChildCarthed object populated from the query conditions when no match is found
 *
 * @method     ChildCarthed|null findOneBySessionid(string $sessionid) Return the first ChildCarthed filtered by the sessionid column
 * @method     ChildCarthed|null findOneByRecno(int $recno) Return the first ChildCarthed filtered by the recno column
 * @method     ChildCarthed|null findOneByDate(int $date) Return the first ChildCarthed filtered by the date column
 * @method     ChildCarthed|null findOneByTime(int $time) Return the first ChildCarthed filtered by the time column
 * @method     ChildCarthed|null findOneByCustid(string $custid) Return the first ChildCarthed filtered by the custid column
 * @method     ChildCarthed|null findOneByShiptoid(string $shiptoid) Return the first ChildCarthed filtered by the shiptoid column
 * @method     ChildCarthed|null findOneByCustname(string $custname) Return the first ChildCarthed filtered by the custname column
 * @method     ChildCarthed|null findOneByOrderno(string $orderno) Return the first ChildCarthed filtered by the orderno column
 * @method     ChildCarthed|null findOneByCustpo(string $custpo) Return the first ChildCarthed filtered by the custpo column
 * @method     ChildCarthed|null findOneByStatus(string $status) Return the first ChildCarthed filtered by the status column
 * @method     ChildCarthed|null findOneByOrderdate(string $orderdate) Return the first ChildCarthed filtered by the orderdate column
 * @method     ChildCarthed|null findOneByInvdate(string $invdate) Return the first ChildCarthed filtered by the invdate column
 * @method     ChildCarthed|null findOneByShipdate(string $shipdate) Return the first ChildCarthed filtered by the shipdate column
 * @method     ChildCarthed|null findOneByHasdocuments(string $hasdocuments) Return the first ChildCarthed filtered by the hasdocuments column
 * @method     ChildCarthed|null findOneByHastracking(string $hastracking) Return the first ChildCarthed filtered by the hastracking column
 * @method     ChildCarthed|null findOneBySubtotal(string $subtotal) Return the first ChildCarthed filtered by the subtotal column
 * @method     ChildCarthed|null findOneBySalestax(string $salestax) Return the first ChildCarthed filtered by the salestax column
 * @method     ChildCarthed|null findOneByFreight(string $freight) Return the first ChildCarthed filtered by the freight column
 * @method     ChildCarthed|null findOneByMisccost(string $misccost) Return the first ChildCarthed filtered by the misccost column
 * @method     ChildCarthed|null findOneByOrdertotal(string $ordertotal) Return the first ChildCarthed filtered by the ordertotal column
 * @method     ChildCarthed|null findOneByHasnotes(string $hasnotes) Return the first ChildCarthed filtered by the hasnotes column
 * @method     ChildCarthed|null findOneByEditord(string $editord) Return the first ChildCarthed filtered by the editord column
 * @method     ChildCarthed|null findOneByError(string $error) Return the first ChildCarthed filtered by the error column
 * @method     ChildCarthed|null findOneByErrormsg(string $errormsg) Return the first ChildCarthed filtered by the errormsg column
 * @method     ChildCarthed|null findOneBySconame(string $sconame) Return the first ChildCarthed filtered by the sconame column
 * @method     ChildCarthed|null findOneByShipname(string $shipname) Return the first ChildCarthed filtered by the shipname column
 * @method     ChildCarthed|null findOneByShipaddress(string $shipaddress) Return the first ChildCarthed filtered by the shipaddress column
 * @method     ChildCarthed|null findOneByShipaddress2(string $shipaddress2) Return the first ChildCarthed filtered by the shipaddress2 column
 * @method     ChildCarthed|null findOneByShipcity(string $shipcity) Return the first ChildCarthed filtered by the shipcity column
 * @method     ChildCarthed|null findOneByShipstate(string $shipstate) Return the first ChildCarthed filtered by the shipstate column
 * @method     ChildCarthed|null findOneByShipzip(string $shipzip) Return the first ChildCarthed filtered by the shipzip column
 * @method     ChildCarthed|null findOneByShipcountry(string $shipcountry) Return the first ChildCarthed filtered by the shipcountry column
 * @method     ChildCarthed|null findOneByContact(string $contact) Return the first ChildCarthed filtered by the contact column
 * @method     ChildCarthed|null findOneByPhintl(string $phintl) Return the first ChildCarthed filtered by the phintl column
 * @method     ChildCarthed|null findOneByPhone(string $phone) Return the first ChildCarthed filtered by the phone column
 * @method     ChildCarthed|null findOneByExtension(string $extension) Return the first ChildCarthed filtered by the extension column
 * @method     ChildCarthed|null findOneByFaxnbr(string $faxnbr) Return the first ChildCarthed filtered by the faxnbr column
 * @method     ChildCarthed|null findOneByEmail(string $email) Return the first ChildCarthed filtered by the email column
 * @method     ChildCarthed|null findOneByReleasenbr(string $releasenbr) Return the first ChildCarthed filtered by the releasenbr column
 * @method     ChildCarthed|null findOneByShipviacd(string $shipviacd) Return the first ChildCarthed filtered by the shipviacd column
 * @method     ChildCarthed|null findOneByShipviadesc(string $shipviadesc) Return the first ChildCarthed filtered by the shipviadesc column
 * @method     ChildCarthed|null findOneByTermcode(string $termcode) Return the first ChildCarthed filtered by the termcode column
 * @method     ChildCarthed|null findOneByTermtype(string $termtype) Return the first ChildCarthed filtered by the termtype column
 * @method     ChildCarthed|null findOneByTermdesc(string $termdesc) Return the first ChildCarthed filtered by the termdesc column
 * @method     ChildCarthed|null findOneByRqstdate(string $rqstdate) Return the first ChildCarthed filtered by the rqstdate column
 * @method     ChildCarthed|null findOneByShipcom(string $shipcom) Return the first ChildCarthed filtered by the shipcom column
 * @method     ChildCarthed|null findOneBySp1(string $sp1) Return the first ChildCarthed filtered by the sp1 column
 * @method     ChildCarthed|null findOneBySp1name(string $sp1name) Return the first ChildCarthed filtered by the sp1name column
 * @method     ChildCarthed|null findOneByCardnumber(string $cardnumber) Return the first ChildCarthed filtered by the cardnumber column
 * @method     ChildCarthed|null findOneByCardexpire(string $cardexpire) Return the first ChildCarthed filtered by the cardexpire column
 * @method     ChildCarthed|null findOneByCardcode(string $cardcode) Return the first ChildCarthed filtered by the cardcode column
 * @method     ChildCarthed|null findOneByCardapproval(string $cardapproval) Return the first ChildCarthed filtered by the cardapproval column
 * @method     ChildCarthed|null findOneByTotalcost(string $totalcost) Return the first ChildCarthed filtered by the totalcost column
 * @method     ChildCarthed|null findOneByTotaldiscount(string $totaldiscount) Return the first ChildCarthed filtered by the totaldiscount column
 * @method     ChildCarthed|null findOneByPaymenttype(string $paymenttype) Return the first ChildCarthed filtered by the paymenttype column
 * @method     ChildCarthed|null findOneBySrcdatefrom(string $srcdatefrom) Return the first ChildCarthed filtered by the srcdatefrom column
 * @method     ChildCarthed|null findOneBySrcdatethru(string $srcdatethru) Return the first ChildCarthed filtered by the srcdatethru column
 * @method     ChildCarthed|null findOneByDummy(string $dummy) Return the first ChildCarthed filtered by the dummy column
 *
 * @method     ChildCarthed requirePk($key, ?ConnectionInterface $con = null) Return the ChildCarthed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOne(?ConnectionInterface $con = null) Return the first ChildCarthed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCarthed requireOneBySessionid(string $sessionid) Return the first ChildCarthed filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByRecno(int $recno) Return the first ChildCarthed filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByDate(int $date) Return the first ChildCarthed filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTime(int $time) Return the first ChildCarthed filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCustid(string $custid) Return the first ChildCarthed filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShiptoid(string $shiptoid) Return the first ChildCarthed filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCustname(string $custname) Return the first ChildCarthed filtered by the custname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByOrderno(string $orderno) Return the first ChildCarthed filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCustpo(string $custpo) Return the first ChildCarthed filtered by the custpo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByStatus(string $status) Return the first ChildCarthed filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByOrderdate(string $orderdate) Return the first ChildCarthed filtered by the orderdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByInvdate(string $invdate) Return the first ChildCarthed filtered by the invdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipdate(string $shipdate) Return the first ChildCarthed filtered by the shipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByHasdocuments(string $hasdocuments) Return the first ChildCarthed filtered by the hasdocuments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByHastracking(string $hastracking) Return the first ChildCarthed filtered by the hastracking column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySubtotal(string $subtotal) Return the first ChildCarthed filtered by the subtotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySalestax(string $salestax) Return the first ChildCarthed filtered by the salestax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByFreight(string $freight) Return the first ChildCarthed filtered by the freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByMisccost(string $misccost) Return the first ChildCarthed filtered by the misccost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByOrdertotal(string $ordertotal) Return the first ChildCarthed filtered by the ordertotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByHasnotes(string $hasnotes) Return the first ChildCarthed filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByEditord(string $editord) Return the first ChildCarthed filtered by the editord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByError(string $error) Return the first ChildCarthed filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByErrormsg(string $errormsg) Return the first ChildCarthed filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySconame(string $sconame) Return the first ChildCarthed filtered by the sconame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipname(string $shipname) Return the first ChildCarthed filtered by the shipname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipaddress(string $shipaddress) Return the first ChildCarthed filtered by the shipaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipaddress2(string $shipaddress2) Return the first ChildCarthed filtered by the shipaddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipcity(string $shipcity) Return the first ChildCarthed filtered by the shipcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipstate(string $shipstate) Return the first ChildCarthed filtered by the shipstate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipzip(string $shipzip) Return the first ChildCarthed filtered by the shipzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipcountry(string $shipcountry) Return the first ChildCarthed filtered by the shipcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByContact(string $contact) Return the first ChildCarthed filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByPhintl(string $phintl) Return the first ChildCarthed filtered by the phintl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByPhone(string $phone) Return the first ChildCarthed filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByExtension(string $extension) Return the first ChildCarthed filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByFaxnbr(string $faxnbr) Return the first ChildCarthed filtered by the faxnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByEmail(string $email) Return the first ChildCarthed filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByReleasenbr(string $releasenbr) Return the first ChildCarthed filtered by the releasenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipviacd(string $shipviacd) Return the first ChildCarthed filtered by the shipviacd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipviadesc(string $shipviadesc) Return the first ChildCarthed filtered by the shipviadesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTermcode(string $termcode) Return the first ChildCarthed filtered by the termcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTermtype(string $termtype) Return the first ChildCarthed filtered by the termtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTermdesc(string $termdesc) Return the first ChildCarthed filtered by the termdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByRqstdate(string $rqstdate) Return the first ChildCarthed filtered by the rqstdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipcom(string $shipcom) Return the first ChildCarthed filtered by the shipcom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySp1(string $sp1) Return the first ChildCarthed filtered by the sp1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySp1name(string $sp1name) Return the first ChildCarthed filtered by the sp1name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardnumber(string $cardnumber) Return the first ChildCarthed filtered by the cardnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardexpire(string $cardexpire) Return the first ChildCarthed filtered by the cardexpire column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardcode(string $cardcode) Return the first ChildCarthed filtered by the cardcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardapproval(string $cardapproval) Return the first ChildCarthed filtered by the cardapproval column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTotalcost(string $totalcost) Return the first ChildCarthed filtered by the totalcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTotaldiscount(string $totaldiscount) Return the first ChildCarthed filtered by the totaldiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByPaymenttype(string $paymenttype) Return the first ChildCarthed filtered by the paymenttype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySrcdatefrom(string $srcdatefrom) Return the first ChildCarthed filtered by the srcdatefrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySrcdatethru(string $srcdatethru) Return the first ChildCarthed filtered by the srcdatethru column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByDummy(string $dummy) Return the first ChildCarthed filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCarthed[]|Collection find(?ConnectionInterface $con = null) Return ChildCarthed objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCarthed> find(?ConnectionInterface $con = null) Return ChildCarthed objects based on current ModelCriteria
 *
 * @method     ChildCarthed[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildCarthed objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySessionid(string|array<string> $sessionid) Return ChildCarthed objects filtered by the sessionid column
 * @method     ChildCarthed[]|Collection findByRecno(int|array<int> $recno) Return ChildCarthed objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByRecno(int|array<int> $recno) Return ChildCarthed objects filtered by the recno column
 * @method     ChildCarthed[]|Collection findByDate(int|array<int> $date) Return ChildCarthed objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByDate(int|array<int> $date) Return ChildCarthed objects filtered by the date column
 * @method     ChildCarthed[]|Collection findByTime(int|array<int> $time) Return ChildCarthed objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByTime(int|array<int> $time) Return ChildCarthed objects filtered by the time column
 * @method     ChildCarthed[]|Collection findByCustid(string|array<string> $custid) Return ChildCarthed objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCustid(string|array<string> $custid) Return ChildCarthed objects filtered by the custid column
 * @method     ChildCarthed[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildCarthed objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShiptoid(string|array<string> $shiptoid) Return ChildCarthed objects filtered by the shiptoid column
 * @method     ChildCarthed[]|Collection findByCustname(string|array<string> $custname) Return ChildCarthed objects filtered by the custname column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCustname(string|array<string> $custname) Return ChildCarthed objects filtered by the custname column
 * @method     ChildCarthed[]|Collection findByOrderno(string|array<string> $orderno) Return ChildCarthed objects filtered by the orderno column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByOrderno(string|array<string> $orderno) Return ChildCarthed objects filtered by the orderno column
 * @method     ChildCarthed[]|Collection findByCustpo(string|array<string> $custpo) Return ChildCarthed objects filtered by the custpo column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCustpo(string|array<string> $custpo) Return ChildCarthed objects filtered by the custpo column
 * @method     ChildCarthed[]|Collection findByStatus(string|array<string> $status) Return ChildCarthed objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByStatus(string|array<string> $status) Return ChildCarthed objects filtered by the status column
 * @method     ChildCarthed[]|Collection findByOrderdate(string|array<string> $orderdate) Return ChildCarthed objects filtered by the orderdate column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByOrderdate(string|array<string> $orderdate) Return ChildCarthed objects filtered by the orderdate column
 * @method     ChildCarthed[]|Collection findByInvdate(string|array<string> $invdate) Return ChildCarthed objects filtered by the invdate column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByInvdate(string|array<string> $invdate) Return ChildCarthed objects filtered by the invdate column
 * @method     ChildCarthed[]|Collection findByShipdate(string|array<string> $shipdate) Return ChildCarthed objects filtered by the shipdate column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipdate(string|array<string> $shipdate) Return ChildCarthed objects filtered by the shipdate column
 * @method     ChildCarthed[]|Collection findByHasdocuments(string|array<string> $hasdocuments) Return ChildCarthed objects filtered by the hasdocuments column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByHasdocuments(string|array<string> $hasdocuments) Return ChildCarthed objects filtered by the hasdocuments column
 * @method     ChildCarthed[]|Collection findByHastracking(string|array<string> $hastracking) Return ChildCarthed objects filtered by the hastracking column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByHastracking(string|array<string> $hastracking) Return ChildCarthed objects filtered by the hastracking column
 * @method     ChildCarthed[]|Collection findBySubtotal(string|array<string> $subtotal) Return ChildCarthed objects filtered by the subtotal column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySubtotal(string|array<string> $subtotal) Return ChildCarthed objects filtered by the subtotal column
 * @method     ChildCarthed[]|Collection findBySalestax(string|array<string> $salestax) Return ChildCarthed objects filtered by the salestax column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySalestax(string|array<string> $salestax) Return ChildCarthed objects filtered by the salestax column
 * @method     ChildCarthed[]|Collection findByFreight(string|array<string> $freight) Return ChildCarthed objects filtered by the freight column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByFreight(string|array<string> $freight) Return ChildCarthed objects filtered by the freight column
 * @method     ChildCarthed[]|Collection findByMisccost(string|array<string> $misccost) Return ChildCarthed objects filtered by the misccost column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByMisccost(string|array<string> $misccost) Return ChildCarthed objects filtered by the misccost column
 * @method     ChildCarthed[]|Collection findByOrdertotal(string|array<string> $ordertotal) Return ChildCarthed objects filtered by the ordertotal column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByOrdertotal(string|array<string> $ordertotal) Return ChildCarthed objects filtered by the ordertotal column
 * @method     ChildCarthed[]|Collection findByHasnotes(string|array<string> $hasnotes) Return ChildCarthed objects filtered by the hasnotes column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByHasnotes(string|array<string> $hasnotes) Return ChildCarthed objects filtered by the hasnotes column
 * @method     ChildCarthed[]|Collection findByEditord(string|array<string> $editord) Return ChildCarthed objects filtered by the editord column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByEditord(string|array<string> $editord) Return ChildCarthed objects filtered by the editord column
 * @method     ChildCarthed[]|Collection findByError(string|array<string> $error) Return ChildCarthed objects filtered by the error column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByError(string|array<string> $error) Return ChildCarthed objects filtered by the error column
 * @method     ChildCarthed[]|Collection findByErrormsg(string|array<string> $errormsg) Return ChildCarthed objects filtered by the errormsg column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByErrormsg(string|array<string> $errormsg) Return ChildCarthed objects filtered by the errormsg column
 * @method     ChildCarthed[]|Collection findBySconame(string|array<string> $sconame) Return ChildCarthed objects filtered by the sconame column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySconame(string|array<string> $sconame) Return ChildCarthed objects filtered by the sconame column
 * @method     ChildCarthed[]|Collection findByShipname(string|array<string> $shipname) Return ChildCarthed objects filtered by the shipname column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipname(string|array<string> $shipname) Return ChildCarthed objects filtered by the shipname column
 * @method     ChildCarthed[]|Collection findByShipaddress(string|array<string> $shipaddress) Return ChildCarthed objects filtered by the shipaddress column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipaddress(string|array<string> $shipaddress) Return ChildCarthed objects filtered by the shipaddress column
 * @method     ChildCarthed[]|Collection findByShipaddress2(string|array<string> $shipaddress2) Return ChildCarthed objects filtered by the shipaddress2 column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipaddress2(string|array<string> $shipaddress2) Return ChildCarthed objects filtered by the shipaddress2 column
 * @method     ChildCarthed[]|Collection findByShipcity(string|array<string> $shipcity) Return ChildCarthed objects filtered by the shipcity column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipcity(string|array<string> $shipcity) Return ChildCarthed objects filtered by the shipcity column
 * @method     ChildCarthed[]|Collection findByShipstate(string|array<string> $shipstate) Return ChildCarthed objects filtered by the shipstate column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipstate(string|array<string> $shipstate) Return ChildCarthed objects filtered by the shipstate column
 * @method     ChildCarthed[]|Collection findByShipzip(string|array<string> $shipzip) Return ChildCarthed objects filtered by the shipzip column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipzip(string|array<string> $shipzip) Return ChildCarthed objects filtered by the shipzip column
 * @method     ChildCarthed[]|Collection findByShipcountry(string|array<string> $shipcountry) Return ChildCarthed objects filtered by the shipcountry column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipcountry(string|array<string> $shipcountry) Return ChildCarthed objects filtered by the shipcountry column
 * @method     ChildCarthed[]|Collection findByContact(string|array<string> $contact) Return ChildCarthed objects filtered by the contact column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByContact(string|array<string> $contact) Return ChildCarthed objects filtered by the contact column
 * @method     ChildCarthed[]|Collection findByPhintl(string|array<string> $phintl) Return ChildCarthed objects filtered by the phintl column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByPhintl(string|array<string> $phintl) Return ChildCarthed objects filtered by the phintl column
 * @method     ChildCarthed[]|Collection findByPhone(string|array<string> $phone) Return ChildCarthed objects filtered by the phone column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByPhone(string|array<string> $phone) Return ChildCarthed objects filtered by the phone column
 * @method     ChildCarthed[]|Collection findByExtension(string|array<string> $extension) Return ChildCarthed objects filtered by the extension column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByExtension(string|array<string> $extension) Return ChildCarthed objects filtered by the extension column
 * @method     ChildCarthed[]|Collection findByFaxnbr(string|array<string> $faxnbr) Return ChildCarthed objects filtered by the faxnbr column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByFaxnbr(string|array<string> $faxnbr) Return ChildCarthed objects filtered by the faxnbr column
 * @method     ChildCarthed[]|Collection findByEmail(string|array<string> $email) Return ChildCarthed objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByEmail(string|array<string> $email) Return ChildCarthed objects filtered by the email column
 * @method     ChildCarthed[]|Collection findByReleasenbr(string|array<string> $releasenbr) Return ChildCarthed objects filtered by the releasenbr column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByReleasenbr(string|array<string> $releasenbr) Return ChildCarthed objects filtered by the releasenbr column
 * @method     ChildCarthed[]|Collection findByShipviacd(string|array<string> $shipviacd) Return ChildCarthed objects filtered by the shipviacd column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipviacd(string|array<string> $shipviacd) Return ChildCarthed objects filtered by the shipviacd column
 * @method     ChildCarthed[]|Collection findByShipviadesc(string|array<string> $shipviadesc) Return ChildCarthed objects filtered by the shipviadesc column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipviadesc(string|array<string> $shipviadesc) Return ChildCarthed objects filtered by the shipviadesc column
 * @method     ChildCarthed[]|Collection findByTermcode(string|array<string> $termcode) Return ChildCarthed objects filtered by the termcode column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByTermcode(string|array<string> $termcode) Return ChildCarthed objects filtered by the termcode column
 * @method     ChildCarthed[]|Collection findByTermtype(string|array<string> $termtype) Return ChildCarthed objects filtered by the termtype column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByTermtype(string|array<string> $termtype) Return ChildCarthed objects filtered by the termtype column
 * @method     ChildCarthed[]|Collection findByTermdesc(string|array<string> $termdesc) Return ChildCarthed objects filtered by the termdesc column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByTermdesc(string|array<string> $termdesc) Return ChildCarthed objects filtered by the termdesc column
 * @method     ChildCarthed[]|Collection findByRqstdate(string|array<string> $rqstdate) Return ChildCarthed objects filtered by the rqstdate column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByRqstdate(string|array<string> $rqstdate) Return ChildCarthed objects filtered by the rqstdate column
 * @method     ChildCarthed[]|Collection findByShipcom(string|array<string> $shipcom) Return ChildCarthed objects filtered by the shipcom column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByShipcom(string|array<string> $shipcom) Return ChildCarthed objects filtered by the shipcom column
 * @method     ChildCarthed[]|Collection findBySp1(string|array<string> $sp1) Return ChildCarthed objects filtered by the sp1 column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySp1(string|array<string> $sp1) Return ChildCarthed objects filtered by the sp1 column
 * @method     ChildCarthed[]|Collection findBySp1name(string|array<string> $sp1name) Return ChildCarthed objects filtered by the sp1name column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySp1name(string|array<string> $sp1name) Return ChildCarthed objects filtered by the sp1name column
 * @method     ChildCarthed[]|Collection findByCardnumber(string|array<string> $cardnumber) Return ChildCarthed objects filtered by the cardnumber column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCardnumber(string|array<string> $cardnumber) Return ChildCarthed objects filtered by the cardnumber column
 * @method     ChildCarthed[]|Collection findByCardexpire(string|array<string> $cardexpire) Return ChildCarthed objects filtered by the cardexpire column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCardexpire(string|array<string> $cardexpire) Return ChildCarthed objects filtered by the cardexpire column
 * @method     ChildCarthed[]|Collection findByCardcode(string|array<string> $cardcode) Return ChildCarthed objects filtered by the cardcode column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCardcode(string|array<string> $cardcode) Return ChildCarthed objects filtered by the cardcode column
 * @method     ChildCarthed[]|Collection findByCardapproval(string|array<string> $cardapproval) Return ChildCarthed objects filtered by the cardapproval column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByCardapproval(string|array<string> $cardapproval) Return ChildCarthed objects filtered by the cardapproval column
 * @method     ChildCarthed[]|Collection findByTotalcost(string|array<string> $totalcost) Return ChildCarthed objects filtered by the totalcost column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByTotalcost(string|array<string> $totalcost) Return ChildCarthed objects filtered by the totalcost column
 * @method     ChildCarthed[]|Collection findByTotaldiscount(string|array<string> $totaldiscount) Return ChildCarthed objects filtered by the totaldiscount column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByTotaldiscount(string|array<string> $totaldiscount) Return ChildCarthed objects filtered by the totaldiscount column
 * @method     ChildCarthed[]|Collection findByPaymenttype(string|array<string> $paymenttype) Return ChildCarthed objects filtered by the paymenttype column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByPaymenttype(string|array<string> $paymenttype) Return ChildCarthed objects filtered by the paymenttype column
 * @method     ChildCarthed[]|Collection findBySrcdatefrom(string|array<string> $srcdatefrom) Return ChildCarthed objects filtered by the srcdatefrom column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySrcdatefrom(string|array<string> $srcdatefrom) Return ChildCarthed objects filtered by the srcdatefrom column
 * @method     ChildCarthed[]|Collection findBySrcdatethru(string|array<string> $srcdatethru) Return ChildCarthed objects filtered by the srcdatethru column
 * @psalm-method Collection&\Traversable<ChildCarthed> findBySrcdatethru(string|array<string> $srcdatethru) Return ChildCarthed objects filtered by the srcdatethru column
 * @method     ChildCarthed[]|Collection findByDummy(string|array<string> $dummy) Return ChildCarthed objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildCarthed> findByDummy(string|array<string> $dummy) Return ChildCarthed objects filtered by the dummy column
 *
 * @method     ChildCarthed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCarthed> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class CarthedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CarthedQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Carthed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCarthedQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCarthedQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCarthedQuery) {
            return $criteria;
        }
        $query = new ChildCarthedQuery();
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
     * @return ChildCarthed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CarthedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CarthedTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCarthed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, custid, shiptoid, custname, orderno, custpo, status, orderdate, invdate, shipdate, hasdocuments, hastracking, subtotal, salestax, freight, misccost, ordertotal, hasnotes, editord, error, errormsg, sconame, shipname, shipaddress, shipaddress2, shipcity, shipstate, shipzip, shipcountry, contact, phintl, phone, extension, faxnbr, email, releasenbr, shipviacd, shipviadesc, termcode, termtype, termdesc, rqstdate, shipcom, sp1, sp1name, cardnumber, cardexpire, cardcode, cardapproval, totalcost, totaldiscount, paymenttype, srcdatefrom, srcdatethru, dummy FROM carthed WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildCarthed $obj */
            $obj = new ChildCarthed();
            $obj->hydrate($row);
            CarthedTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCarthed|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(CarthedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CarthedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(CarthedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CarthedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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

        $this->addUsingAlias(CarthedTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(CarthedTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CarthedTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_RECNO, $recno, $comparison);

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
                $this->addUsingAlias(CarthedTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CarthedTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(CarthedTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CarthedTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CUSTID, $custid, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPTOID, $shiptoid, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CUSTNAME, $custname, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_ORDERNO, $orderno, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CUSTPO, $custpo, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_STATUS, $status, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_ORDERDATE, $orderdate, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_INVDATE, $invdate, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPDATE, $shipdate, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_HASTRACKING, $hastracking, $comparison);

        return $this;
    }

    /**
     * Filter the query on the subtotal column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotal('fooValue');   // WHERE subtotal = 'fooValue'
     * $query->filterBySubtotal('%fooValue%', Criteria::LIKE); // WHERE subtotal LIKE '%fooValue%'
     * $query->filterBySubtotal(['foo', 'bar']); // WHERE subtotal IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $subtotal The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subtotal)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_SUBTOTAL, $subtotal, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salestax column
     *
     * Example usage:
     * <code>
     * $query->filterBySalestax('fooValue');   // WHERE salestax = 'fooValue'
     * $query->filterBySalestax('%fooValue%', Criteria::LIKE); // WHERE salestax LIKE '%fooValue%'
     * $query->filterBySalestax(['foo', 'bar']); // WHERE salestax IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salestax The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalestax($salestax = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salestax)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_SALESTAX, $salestax, $comparison);

        return $this;
    }

    /**
     * Filter the query on the freight column
     *
     * Example usage:
     * <code>
     * $query->filterByFreight('fooValue');   // WHERE freight = 'fooValue'
     * $query->filterByFreight('%fooValue%', Criteria::LIKE); // WHERE freight LIKE '%fooValue%'
     * $query->filterByFreight(['foo', 'bar']); // WHERE freight IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $freight The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFreight($freight = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freight)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_FREIGHT, $freight, $comparison);

        return $this;
    }

    /**
     * Filter the query on the misccost column
     *
     * Example usage:
     * <code>
     * $query->filterByMisccost('fooValue');   // WHERE misccost = 'fooValue'
     * $query->filterByMisccost('%fooValue%', Criteria::LIKE); // WHERE misccost LIKE '%fooValue%'
     * $query->filterByMisccost(['foo', 'bar']); // WHERE misccost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $misccost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMisccost($misccost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($misccost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_MISCCOST, $misccost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordertotal column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdertotal('fooValue');   // WHERE ordertotal = 'fooValue'
     * $query->filterByOrdertotal('%fooValue%', Criteria::LIKE); // WHERE ordertotal LIKE '%fooValue%'
     * $query->filterByOrdertotal(['foo', 'bar']); // WHERE ordertotal IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordertotal The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdertotal($ordertotal = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordertotal)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_ORDERTOTAL, $ordertotal, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_HASNOTES, $hasnotes, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_EDITORD, $editord, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_ERROR, $error, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_ERRORMSG, $errormsg, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SCONAME, $sconame, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPNAME, $shipname, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPADDRESS, $shipaddress, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPADDRESS2, $shipaddress2, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPCITY, $shipcity, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPSTATE, $shipstate, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPZIP, $shipzip, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPCOUNTRY, $shipcountry, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CONTACT, $contact, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_PHINTL, $phintl, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_PHONE, $phone, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_EXTENSION, $extension, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_FAXNBR, $faxnbr, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_EMAIL, $email, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_RELEASENBR, $releasenbr, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPVIACD, $shipviacd, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPVIADESC, $shipviadesc, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_TERMCODE, $termcode, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_TERMTYPE, $termtype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the termdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByTermdesc('fooValue');   // WHERE termdesc = 'fooValue'
     * $query->filterByTermdesc('%fooValue%', Criteria::LIKE); // WHERE termdesc LIKE '%fooValue%'
     * $query->filterByTermdesc(['foo', 'bar']); // WHERE termdesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $termdesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTermdesc($termdesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termdesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CarthedTableMap::COL_TERMDESC, $termdesc, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_RQSTDATE, $rqstdate, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SHIPCOM, $shipcom, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SP1, $sp1, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SP1NAME, $sp1name, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CARDNUMBER, $cardnumber, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CARDEXPIRE, $cardexpire, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CARDCODE, $cardcode, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_CARDAPPROVAL, $cardapproval, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_TOTALCOST, $totalcost, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_TOTALDISCOUNT, $totaldiscount, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_PAYMENTTYPE, $paymenttype, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SRCDATEFROM, $srcdatefrom, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_SRCDATETHRU, $srcdatethru, $comparison);

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

        $this->addUsingAlias(CarthedTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCarthed $carthed Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($carthed = null)
    {
        if ($carthed) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CarthedTableMap::COL_SESSIONID), $carthed->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CarthedTableMap::COL_RECNO), $carthed->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the carthed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarthedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CarthedTableMap::clearInstancePool();
            CarthedTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CarthedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CarthedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CarthedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CarthedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
