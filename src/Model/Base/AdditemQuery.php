<?php

namespace Base;

use \Additem as ChildAdditem;
use \AdditemQuery as ChildAdditemQuery;
use \Exception;
use \PDO;
use Map\AdditemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `additem` table.
 *
 * @method     ChildAdditemQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildAdditemQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildAdditemQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildAdditemQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildAdditemQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildAdditemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAdditemQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAdditemQuery orderByPriceqty1($order = Criteria::ASC) Order by the priceqty1 column
 * @method     ChildAdditemQuery orderByPriceqty2($order = Criteria::ASC) Order by the priceqty2 column
 * @method     ChildAdditemQuery orderByPriceqty3($order = Criteria::ASC) Order by the priceqty3 column
 * @method     ChildAdditemQuery orderByPriceqty4($order = Criteria::ASC) Order by the priceqty4 column
 * @method     ChildAdditemQuery orderByPriceqty5($order = Criteria::ASC) Order by the priceqty5 column
 * @method     ChildAdditemQuery orderByPriceqty6($order = Criteria::ASC) Order by the priceqty6 column
 * @method     ChildAdditemQuery orderByPriceprice1($order = Criteria::ASC) Order by the priceprice1 column
 * @method     ChildAdditemQuery orderByPriceprice2($order = Criteria::ASC) Order by the priceprice2 column
 * @method     ChildAdditemQuery orderByPriceprice3($order = Criteria::ASC) Order by the priceprice3 column
 * @method     ChildAdditemQuery orderByPriceprice4($order = Criteria::ASC) Order by the priceprice4 column
 * @method     ChildAdditemQuery orderByPriceprice5($order = Criteria::ASC) Order by the priceprice5 column
 * @method     ChildAdditemQuery orderByPriceprice6($order = Criteria::ASC) Order by the priceprice6 column
 * @method     ChildAdditemQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAdditemQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildAdditemQuery orderByName1($order = Criteria::ASC) Order by the name1 column
 * @method     ChildAdditemQuery orderByName2($order = Criteria::ASC) Order by the name2 column
 * @method     ChildAdditemQuery orderByShortdesc($order = Criteria::ASC) Order by the shortdesc column
 * @method     ChildAdditemQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildAdditemQuery orderByFamilyid($order = Criteria::ASC) Order by the familyid column
 * @method     ChildAdditemQuery orderByErmes($order = Criteria::ASC) Order by the ermes column
 * @method     ChildAdditemQuery orderBySpeca($order = Criteria::ASC) Order by the speca column
 * @method     ChildAdditemQuery orderBySpecb($order = Criteria::ASC) Order by the specb column
 * @method     ChildAdditemQuery orderBySpecc($order = Criteria::ASC) Order by the specc column
 * @method     ChildAdditemQuery orderBySpecd($order = Criteria::ASC) Order by the specd column
 * @method     ChildAdditemQuery orderBySpece($order = Criteria::ASC) Order by the spece column
 * @method     ChildAdditemQuery orderBySpecf($order = Criteria::ASC) Order by the specf column
 * @method     ChildAdditemQuery orderBySpecg($order = Criteria::ASC) Order by the specg column
 * @method     ChildAdditemQuery orderBySpech($order = Criteria::ASC) Order by the spech column
 * @method     ChildAdditemQuery orderByLongdesc($order = Criteria::ASC) Order by the longdesc column
 * @method     ChildAdditemQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildAdditemQuery orderByName3($order = Criteria::ASC) Order by the name3 column
 * @method     ChildAdditemQuery orderByName4($order = Criteria::ASC) Order by the name4 column
 * @method     ChildAdditemQuery orderByThumb($order = Criteria::ASC) Order by the thumb column
 * @method     ChildAdditemQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildAdditemQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildAdditemQuery orderByFamilydes($order = Criteria::ASC) Order by the familydes column
 * @method     ChildAdditemQuery orderByKeywords($order = Criteria::ASC) Order by the keywords column
 * @method     ChildAdditemQuery orderByVpn($order = Criteria::ASC) Order by the vpn column
 * @method     ChildAdditemQuery orderByUomdesc($order = Criteria::ASC) Order by the uomdesc column
 * @method     ChildAdditemQuery orderByVidinffg($order = Criteria::ASC) Order by the vidinffg column
 * @method     ChildAdditemQuery orderByVidinflk($order = Criteria::ASC) Order by the vidinflk column
 * @method     ChildAdditemQuery orderByAdditemflag($order = Criteria::ASC) Order by the additemflag column
 * @method     ChildAdditemQuery orderBySchemafam($order = Criteria::ASC) Order by the schemafam column
 * @method     ChildAdditemQuery orderByOrigitemid($order = Criteria::ASC) Order by the origitemid column
 * @method     ChildAdditemQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildAdditemQuery groupBySessionid() Group by the sessionid column
 * @method     ChildAdditemQuery groupByRecno() Group by the recno column
 * @method     ChildAdditemQuery groupByDate() Group by the date column
 * @method     ChildAdditemQuery groupByTime() Group by the time column
 * @method     ChildAdditemQuery groupByItemid() Group by the itemid column
 * @method     ChildAdditemQuery groupByPrice() Group by the price column
 * @method     ChildAdditemQuery groupByQty() Group by the qty column
 * @method     ChildAdditemQuery groupByPriceqty1() Group by the priceqty1 column
 * @method     ChildAdditemQuery groupByPriceqty2() Group by the priceqty2 column
 * @method     ChildAdditemQuery groupByPriceqty3() Group by the priceqty3 column
 * @method     ChildAdditemQuery groupByPriceqty4() Group by the priceqty4 column
 * @method     ChildAdditemQuery groupByPriceqty5() Group by the priceqty5 column
 * @method     ChildAdditemQuery groupByPriceqty6() Group by the priceqty6 column
 * @method     ChildAdditemQuery groupByPriceprice1() Group by the priceprice1 column
 * @method     ChildAdditemQuery groupByPriceprice2() Group by the priceprice2 column
 * @method     ChildAdditemQuery groupByPriceprice3() Group by the priceprice3 column
 * @method     ChildAdditemQuery groupByPriceprice4() Group by the priceprice4 column
 * @method     ChildAdditemQuery groupByPriceprice5() Group by the priceprice5 column
 * @method     ChildAdditemQuery groupByPriceprice6() Group by the priceprice6 column
 * @method     ChildAdditemQuery groupByUnit() Group by the unit column
 * @method     ChildAdditemQuery groupByListprice() Group by the listprice column
 * @method     ChildAdditemQuery groupByName1() Group by the name1 column
 * @method     ChildAdditemQuery groupByName2() Group by the name2 column
 * @method     ChildAdditemQuery groupByShortdesc() Group by the shortdesc column
 * @method     ChildAdditemQuery groupByImage() Group by the image column
 * @method     ChildAdditemQuery groupByFamilyid() Group by the familyid column
 * @method     ChildAdditemQuery groupByErmes() Group by the ermes column
 * @method     ChildAdditemQuery groupBySpeca() Group by the speca column
 * @method     ChildAdditemQuery groupBySpecb() Group by the specb column
 * @method     ChildAdditemQuery groupBySpecc() Group by the specc column
 * @method     ChildAdditemQuery groupBySpecd() Group by the specd column
 * @method     ChildAdditemQuery groupBySpece() Group by the spece column
 * @method     ChildAdditemQuery groupBySpecf() Group by the specf column
 * @method     ChildAdditemQuery groupBySpecg() Group by the specg column
 * @method     ChildAdditemQuery groupBySpech() Group by the spech column
 * @method     ChildAdditemQuery groupByLongdesc() Group by the longdesc column
 * @method     ChildAdditemQuery groupByOrderno() Group by the orderno column
 * @method     ChildAdditemQuery groupByName3() Group by the name3 column
 * @method     ChildAdditemQuery groupByName4() Group by the name4 column
 * @method     ChildAdditemQuery groupByThumb() Group by the thumb column
 * @method     ChildAdditemQuery groupByWidth() Group by the width column
 * @method     ChildAdditemQuery groupByHeight() Group by the height column
 * @method     ChildAdditemQuery groupByFamilydes() Group by the familydes column
 * @method     ChildAdditemQuery groupByKeywords() Group by the keywords column
 * @method     ChildAdditemQuery groupByVpn() Group by the vpn column
 * @method     ChildAdditemQuery groupByUomdesc() Group by the uomdesc column
 * @method     ChildAdditemQuery groupByVidinffg() Group by the vidinffg column
 * @method     ChildAdditemQuery groupByVidinflk() Group by the vidinflk column
 * @method     ChildAdditemQuery groupByAdditemflag() Group by the additemflag column
 * @method     ChildAdditemQuery groupBySchemafam() Group by the schemafam column
 * @method     ChildAdditemQuery groupByOrigitemid() Group by the origitemid column
 * @method     ChildAdditemQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildAdditemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdditemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdditemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdditemQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdditemQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdditemQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdditem|null findOne(?ConnectionInterface $con = null) Return the first ChildAdditem matching the query
 * @method     ChildAdditem findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildAdditem matching the query, or a new ChildAdditem object populated from the query conditions when no match is found
 *
 * @method     ChildAdditem|null findOneBySessionid(string $sessionid) Return the first ChildAdditem filtered by the sessionid column
 * @method     ChildAdditem|null findOneByRecno(int $recno) Return the first ChildAdditem filtered by the recno column
 * @method     ChildAdditem|null findOneByDate(int $date) Return the first ChildAdditem filtered by the date column
 * @method     ChildAdditem|null findOneByTime(int $time) Return the first ChildAdditem filtered by the time column
 * @method     ChildAdditem|null findOneByItemid(string $itemid) Return the first ChildAdditem filtered by the itemid column
 * @method     ChildAdditem|null findOneByPrice(string $price) Return the first ChildAdditem filtered by the price column
 * @method     ChildAdditem|null findOneByQty(int $qty) Return the first ChildAdditem filtered by the qty column
 * @method     ChildAdditem|null findOneByPriceqty1(int $priceqty1) Return the first ChildAdditem filtered by the priceqty1 column
 * @method     ChildAdditem|null findOneByPriceqty2(int $priceqty2) Return the first ChildAdditem filtered by the priceqty2 column
 * @method     ChildAdditem|null findOneByPriceqty3(int $priceqty3) Return the first ChildAdditem filtered by the priceqty3 column
 * @method     ChildAdditem|null findOneByPriceqty4(int $priceqty4) Return the first ChildAdditem filtered by the priceqty4 column
 * @method     ChildAdditem|null findOneByPriceqty5(int $priceqty5) Return the first ChildAdditem filtered by the priceqty5 column
 * @method     ChildAdditem|null findOneByPriceqty6(int $priceqty6) Return the first ChildAdditem filtered by the priceqty6 column
 * @method     ChildAdditem|null findOneByPriceprice1(string $priceprice1) Return the first ChildAdditem filtered by the priceprice1 column
 * @method     ChildAdditem|null findOneByPriceprice2(string $priceprice2) Return the first ChildAdditem filtered by the priceprice2 column
 * @method     ChildAdditem|null findOneByPriceprice3(string $priceprice3) Return the first ChildAdditem filtered by the priceprice3 column
 * @method     ChildAdditem|null findOneByPriceprice4(string $priceprice4) Return the first ChildAdditem filtered by the priceprice4 column
 * @method     ChildAdditem|null findOneByPriceprice5(string $priceprice5) Return the first ChildAdditem filtered by the priceprice5 column
 * @method     ChildAdditem|null findOneByPriceprice6(string $priceprice6) Return the first ChildAdditem filtered by the priceprice6 column
 * @method     ChildAdditem|null findOneByUnit(string $unit) Return the first ChildAdditem filtered by the unit column
 * @method     ChildAdditem|null findOneByListprice(string $listprice) Return the first ChildAdditem filtered by the listprice column
 * @method     ChildAdditem|null findOneByName1(string $name1) Return the first ChildAdditem filtered by the name1 column
 * @method     ChildAdditem|null findOneByName2(string $name2) Return the first ChildAdditem filtered by the name2 column
 * @method     ChildAdditem|null findOneByShortdesc(string $shortdesc) Return the first ChildAdditem filtered by the shortdesc column
 * @method     ChildAdditem|null findOneByImage(string $image) Return the first ChildAdditem filtered by the image column
 * @method     ChildAdditem|null findOneByFamilyid(string $familyid) Return the first ChildAdditem filtered by the familyid column
 * @method     ChildAdditem|null findOneByErmes(string $ermes) Return the first ChildAdditem filtered by the ermes column
 * @method     ChildAdditem|null findOneBySpeca(string $speca) Return the first ChildAdditem filtered by the speca column
 * @method     ChildAdditem|null findOneBySpecb(string $specb) Return the first ChildAdditem filtered by the specb column
 * @method     ChildAdditem|null findOneBySpecc(string $specc) Return the first ChildAdditem filtered by the specc column
 * @method     ChildAdditem|null findOneBySpecd(string $specd) Return the first ChildAdditem filtered by the specd column
 * @method     ChildAdditem|null findOneBySpece(string $spece) Return the first ChildAdditem filtered by the spece column
 * @method     ChildAdditem|null findOneBySpecf(string $specf) Return the first ChildAdditem filtered by the specf column
 * @method     ChildAdditem|null findOneBySpecg(string $specg) Return the first ChildAdditem filtered by the specg column
 * @method     ChildAdditem|null findOneBySpech(string $spech) Return the first ChildAdditem filtered by the spech column
 * @method     ChildAdditem|null findOneByLongdesc(string $longdesc) Return the first ChildAdditem filtered by the longdesc column
 * @method     ChildAdditem|null findOneByOrderno(string $orderno) Return the first ChildAdditem filtered by the orderno column
 * @method     ChildAdditem|null findOneByName3(string $name3) Return the first ChildAdditem filtered by the name3 column
 * @method     ChildAdditem|null findOneByName4(string $name4) Return the first ChildAdditem filtered by the name4 column
 * @method     ChildAdditem|null findOneByThumb(string $thumb) Return the first ChildAdditem filtered by the thumb column
 * @method     ChildAdditem|null findOneByWidth(string $width) Return the first ChildAdditem filtered by the width column
 * @method     ChildAdditem|null findOneByHeight(string $height) Return the first ChildAdditem filtered by the height column
 * @method     ChildAdditem|null findOneByFamilydes(string $familydes) Return the first ChildAdditem filtered by the familydes column
 * @method     ChildAdditem|null findOneByKeywords(string $keywords) Return the first ChildAdditem filtered by the keywords column
 * @method     ChildAdditem|null findOneByVpn(string $vpn) Return the first ChildAdditem filtered by the vpn column
 * @method     ChildAdditem|null findOneByUomdesc(string $uomdesc) Return the first ChildAdditem filtered by the uomdesc column
 * @method     ChildAdditem|null findOneByVidinffg(string $vidinffg) Return the first ChildAdditem filtered by the vidinffg column
 * @method     ChildAdditem|null findOneByVidinflk(string $vidinflk) Return the first ChildAdditem filtered by the vidinflk column
 * @method     ChildAdditem|null findOneByAdditemflag(string $additemflag) Return the first ChildAdditem filtered by the additemflag column
 * @method     ChildAdditem|null findOneBySchemafam(string $schemafam) Return the first ChildAdditem filtered by the schemafam column
 * @method     ChildAdditem|null findOneByOrigitemid(string $origitemid) Return the first ChildAdditem filtered by the origitemid column
 * @method     ChildAdditem|null findOneByDummy(string $dummy) Return the first ChildAdditem filtered by the dummy column
 *
 * @method     ChildAdditem requirePk($key, ?ConnectionInterface $con = null) Return the ChildAdditem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOne(?ConnectionInterface $con = null) Return the first ChildAdditem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdditem requireOneBySessionid(string $sessionid) Return the first ChildAdditem filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByRecno(int $recno) Return the first ChildAdditem filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByDate(int $date) Return the first ChildAdditem filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByTime(int $time) Return the first ChildAdditem filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByItemid(string $itemid) Return the first ChildAdditem filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPrice(string $price) Return the first ChildAdditem filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByQty(int $qty) Return the first ChildAdditem filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceqty1(int $priceqty1) Return the first ChildAdditem filtered by the priceqty1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceqty2(int $priceqty2) Return the first ChildAdditem filtered by the priceqty2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceqty3(int $priceqty3) Return the first ChildAdditem filtered by the priceqty3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceqty4(int $priceqty4) Return the first ChildAdditem filtered by the priceqty4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceqty5(int $priceqty5) Return the first ChildAdditem filtered by the priceqty5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceqty6(int $priceqty6) Return the first ChildAdditem filtered by the priceqty6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceprice1(string $priceprice1) Return the first ChildAdditem filtered by the priceprice1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceprice2(string $priceprice2) Return the first ChildAdditem filtered by the priceprice2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceprice3(string $priceprice3) Return the first ChildAdditem filtered by the priceprice3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceprice4(string $priceprice4) Return the first ChildAdditem filtered by the priceprice4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceprice5(string $priceprice5) Return the first ChildAdditem filtered by the priceprice5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByPriceprice6(string $priceprice6) Return the first ChildAdditem filtered by the priceprice6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByUnit(string $unit) Return the first ChildAdditem filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByListprice(string $listprice) Return the first ChildAdditem filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByName1(string $name1) Return the first ChildAdditem filtered by the name1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByName2(string $name2) Return the first ChildAdditem filtered by the name2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByShortdesc(string $shortdesc) Return the first ChildAdditem filtered by the shortdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByImage(string $image) Return the first ChildAdditem filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByFamilyid(string $familyid) Return the first ChildAdditem filtered by the familyid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByErmes(string $ermes) Return the first ChildAdditem filtered by the ermes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpeca(string $speca) Return the first ChildAdditem filtered by the speca column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpecb(string $specb) Return the first ChildAdditem filtered by the specb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpecc(string $specc) Return the first ChildAdditem filtered by the specc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpecd(string $specd) Return the first ChildAdditem filtered by the specd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpece(string $spece) Return the first ChildAdditem filtered by the spece column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpecf(string $specf) Return the first ChildAdditem filtered by the specf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpecg(string $specg) Return the first ChildAdditem filtered by the specg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySpech(string $spech) Return the first ChildAdditem filtered by the spech column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByLongdesc(string $longdesc) Return the first ChildAdditem filtered by the longdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByOrderno(string $orderno) Return the first ChildAdditem filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByName3(string $name3) Return the first ChildAdditem filtered by the name3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByName4(string $name4) Return the first ChildAdditem filtered by the name4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByThumb(string $thumb) Return the first ChildAdditem filtered by the thumb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByWidth(string $width) Return the first ChildAdditem filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByHeight(string $height) Return the first ChildAdditem filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByFamilydes(string $familydes) Return the first ChildAdditem filtered by the familydes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByKeywords(string $keywords) Return the first ChildAdditem filtered by the keywords column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByVpn(string $vpn) Return the first ChildAdditem filtered by the vpn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByUomdesc(string $uomdesc) Return the first ChildAdditem filtered by the uomdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByVidinffg(string $vidinffg) Return the first ChildAdditem filtered by the vidinffg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByVidinflk(string $vidinflk) Return the first ChildAdditem filtered by the vidinflk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByAdditemflag(string $additemflag) Return the first ChildAdditem filtered by the additemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneBySchemafam(string $schemafam) Return the first ChildAdditem filtered by the schemafam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByOrigitemid(string $origitemid) Return the first ChildAdditem filtered by the origitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdditem requireOneByDummy(string $dummy) Return the first ChildAdditem filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdditem[]|Collection find(?ConnectionInterface $con = null) Return ChildAdditem objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildAdditem> find(?ConnectionInterface $con = null) Return ChildAdditem objects based on current ModelCriteria
 *
 * @method     ChildAdditem[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildAdditem objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySessionid(string|array<string> $sessionid) Return ChildAdditem objects filtered by the sessionid column
 * @method     ChildAdditem[]|Collection findByRecno(int|array<int> $recno) Return ChildAdditem objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByRecno(int|array<int> $recno) Return ChildAdditem objects filtered by the recno column
 * @method     ChildAdditem[]|Collection findByDate(int|array<int> $date) Return ChildAdditem objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByDate(int|array<int> $date) Return ChildAdditem objects filtered by the date column
 * @method     ChildAdditem[]|Collection findByTime(int|array<int> $time) Return ChildAdditem objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByTime(int|array<int> $time) Return ChildAdditem objects filtered by the time column
 * @method     ChildAdditem[]|Collection findByItemid(string|array<string> $itemid) Return ChildAdditem objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByItemid(string|array<string> $itemid) Return ChildAdditem objects filtered by the itemid column
 * @method     ChildAdditem[]|Collection findByPrice(string|array<string> $price) Return ChildAdditem objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPrice(string|array<string> $price) Return ChildAdditem objects filtered by the price column
 * @method     ChildAdditem[]|Collection findByQty(int|array<int> $qty) Return ChildAdditem objects filtered by the qty column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByQty(int|array<int> $qty) Return ChildAdditem objects filtered by the qty column
 * @method     ChildAdditem[]|Collection findByPriceqty1(int|array<int> $priceqty1) Return ChildAdditem objects filtered by the priceqty1 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceqty1(int|array<int> $priceqty1) Return ChildAdditem objects filtered by the priceqty1 column
 * @method     ChildAdditem[]|Collection findByPriceqty2(int|array<int> $priceqty2) Return ChildAdditem objects filtered by the priceqty2 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceqty2(int|array<int> $priceqty2) Return ChildAdditem objects filtered by the priceqty2 column
 * @method     ChildAdditem[]|Collection findByPriceqty3(int|array<int> $priceqty3) Return ChildAdditem objects filtered by the priceqty3 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceqty3(int|array<int> $priceqty3) Return ChildAdditem objects filtered by the priceqty3 column
 * @method     ChildAdditem[]|Collection findByPriceqty4(int|array<int> $priceqty4) Return ChildAdditem objects filtered by the priceqty4 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceqty4(int|array<int> $priceqty4) Return ChildAdditem objects filtered by the priceqty4 column
 * @method     ChildAdditem[]|Collection findByPriceqty5(int|array<int> $priceqty5) Return ChildAdditem objects filtered by the priceqty5 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceqty5(int|array<int> $priceqty5) Return ChildAdditem objects filtered by the priceqty5 column
 * @method     ChildAdditem[]|Collection findByPriceqty6(int|array<int> $priceqty6) Return ChildAdditem objects filtered by the priceqty6 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceqty6(int|array<int> $priceqty6) Return ChildAdditem objects filtered by the priceqty6 column
 * @method     ChildAdditem[]|Collection findByPriceprice1(string|array<string> $priceprice1) Return ChildAdditem objects filtered by the priceprice1 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceprice1(string|array<string> $priceprice1) Return ChildAdditem objects filtered by the priceprice1 column
 * @method     ChildAdditem[]|Collection findByPriceprice2(string|array<string> $priceprice2) Return ChildAdditem objects filtered by the priceprice2 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceprice2(string|array<string> $priceprice2) Return ChildAdditem objects filtered by the priceprice2 column
 * @method     ChildAdditem[]|Collection findByPriceprice3(string|array<string> $priceprice3) Return ChildAdditem objects filtered by the priceprice3 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceprice3(string|array<string> $priceprice3) Return ChildAdditem objects filtered by the priceprice3 column
 * @method     ChildAdditem[]|Collection findByPriceprice4(string|array<string> $priceprice4) Return ChildAdditem objects filtered by the priceprice4 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceprice4(string|array<string> $priceprice4) Return ChildAdditem objects filtered by the priceprice4 column
 * @method     ChildAdditem[]|Collection findByPriceprice5(string|array<string> $priceprice5) Return ChildAdditem objects filtered by the priceprice5 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceprice5(string|array<string> $priceprice5) Return ChildAdditem objects filtered by the priceprice5 column
 * @method     ChildAdditem[]|Collection findByPriceprice6(string|array<string> $priceprice6) Return ChildAdditem objects filtered by the priceprice6 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByPriceprice6(string|array<string> $priceprice6) Return ChildAdditem objects filtered by the priceprice6 column
 * @method     ChildAdditem[]|Collection findByUnit(string|array<string> $unit) Return ChildAdditem objects filtered by the unit column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByUnit(string|array<string> $unit) Return ChildAdditem objects filtered by the unit column
 * @method     ChildAdditem[]|Collection findByListprice(string|array<string> $listprice) Return ChildAdditem objects filtered by the listprice column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByListprice(string|array<string> $listprice) Return ChildAdditem objects filtered by the listprice column
 * @method     ChildAdditem[]|Collection findByName1(string|array<string> $name1) Return ChildAdditem objects filtered by the name1 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByName1(string|array<string> $name1) Return ChildAdditem objects filtered by the name1 column
 * @method     ChildAdditem[]|Collection findByName2(string|array<string> $name2) Return ChildAdditem objects filtered by the name2 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByName2(string|array<string> $name2) Return ChildAdditem objects filtered by the name2 column
 * @method     ChildAdditem[]|Collection findByShortdesc(string|array<string> $shortdesc) Return ChildAdditem objects filtered by the shortdesc column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByShortdesc(string|array<string> $shortdesc) Return ChildAdditem objects filtered by the shortdesc column
 * @method     ChildAdditem[]|Collection findByImage(string|array<string> $image) Return ChildAdditem objects filtered by the image column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByImage(string|array<string> $image) Return ChildAdditem objects filtered by the image column
 * @method     ChildAdditem[]|Collection findByFamilyid(string|array<string> $familyid) Return ChildAdditem objects filtered by the familyid column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByFamilyid(string|array<string> $familyid) Return ChildAdditem objects filtered by the familyid column
 * @method     ChildAdditem[]|Collection findByErmes(string|array<string> $ermes) Return ChildAdditem objects filtered by the ermes column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByErmes(string|array<string> $ermes) Return ChildAdditem objects filtered by the ermes column
 * @method     ChildAdditem[]|Collection findBySpeca(string|array<string> $speca) Return ChildAdditem objects filtered by the speca column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpeca(string|array<string> $speca) Return ChildAdditem objects filtered by the speca column
 * @method     ChildAdditem[]|Collection findBySpecb(string|array<string> $specb) Return ChildAdditem objects filtered by the specb column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpecb(string|array<string> $specb) Return ChildAdditem objects filtered by the specb column
 * @method     ChildAdditem[]|Collection findBySpecc(string|array<string> $specc) Return ChildAdditem objects filtered by the specc column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpecc(string|array<string> $specc) Return ChildAdditem objects filtered by the specc column
 * @method     ChildAdditem[]|Collection findBySpecd(string|array<string> $specd) Return ChildAdditem objects filtered by the specd column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpecd(string|array<string> $specd) Return ChildAdditem objects filtered by the specd column
 * @method     ChildAdditem[]|Collection findBySpece(string|array<string> $spece) Return ChildAdditem objects filtered by the spece column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpece(string|array<string> $spece) Return ChildAdditem objects filtered by the spece column
 * @method     ChildAdditem[]|Collection findBySpecf(string|array<string> $specf) Return ChildAdditem objects filtered by the specf column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpecf(string|array<string> $specf) Return ChildAdditem objects filtered by the specf column
 * @method     ChildAdditem[]|Collection findBySpecg(string|array<string> $specg) Return ChildAdditem objects filtered by the specg column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpecg(string|array<string> $specg) Return ChildAdditem objects filtered by the specg column
 * @method     ChildAdditem[]|Collection findBySpech(string|array<string> $spech) Return ChildAdditem objects filtered by the spech column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySpech(string|array<string> $spech) Return ChildAdditem objects filtered by the spech column
 * @method     ChildAdditem[]|Collection findByLongdesc(string|array<string> $longdesc) Return ChildAdditem objects filtered by the longdesc column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByLongdesc(string|array<string> $longdesc) Return ChildAdditem objects filtered by the longdesc column
 * @method     ChildAdditem[]|Collection findByOrderno(string|array<string> $orderno) Return ChildAdditem objects filtered by the orderno column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByOrderno(string|array<string> $orderno) Return ChildAdditem objects filtered by the orderno column
 * @method     ChildAdditem[]|Collection findByName3(string|array<string> $name3) Return ChildAdditem objects filtered by the name3 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByName3(string|array<string> $name3) Return ChildAdditem objects filtered by the name3 column
 * @method     ChildAdditem[]|Collection findByName4(string|array<string> $name4) Return ChildAdditem objects filtered by the name4 column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByName4(string|array<string> $name4) Return ChildAdditem objects filtered by the name4 column
 * @method     ChildAdditem[]|Collection findByThumb(string|array<string> $thumb) Return ChildAdditem objects filtered by the thumb column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByThumb(string|array<string> $thumb) Return ChildAdditem objects filtered by the thumb column
 * @method     ChildAdditem[]|Collection findByWidth(string|array<string> $width) Return ChildAdditem objects filtered by the width column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByWidth(string|array<string> $width) Return ChildAdditem objects filtered by the width column
 * @method     ChildAdditem[]|Collection findByHeight(string|array<string> $height) Return ChildAdditem objects filtered by the height column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByHeight(string|array<string> $height) Return ChildAdditem objects filtered by the height column
 * @method     ChildAdditem[]|Collection findByFamilydes(string|array<string> $familydes) Return ChildAdditem objects filtered by the familydes column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByFamilydes(string|array<string> $familydes) Return ChildAdditem objects filtered by the familydes column
 * @method     ChildAdditem[]|Collection findByKeywords(string|array<string> $keywords) Return ChildAdditem objects filtered by the keywords column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByKeywords(string|array<string> $keywords) Return ChildAdditem objects filtered by the keywords column
 * @method     ChildAdditem[]|Collection findByVpn(string|array<string> $vpn) Return ChildAdditem objects filtered by the vpn column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByVpn(string|array<string> $vpn) Return ChildAdditem objects filtered by the vpn column
 * @method     ChildAdditem[]|Collection findByUomdesc(string|array<string> $uomdesc) Return ChildAdditem objects filtered by the uomdesc column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByUomdesc(string|array<string> $uomdesc) Return ChildAdditem objects filtered by the uomdesc column
 * @method     ChildAdditem[]|Collection findByVidinffg(string|array<string> $vidinffg) Return ChildAdditem objects filtered by the vidinffg column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByVidinffg(string|array<string> $vidinffg) Return ChildAdditem objects filtered by the vidinffg column
 * @method     ChildAdditem[]|Collection findByVidinflk(string|array<string> $vidinflk) Return ChildAdditem objects filtered by the vidinflk column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByVidinflk(string|array<string> $vidinflk) Return ChildAdditem objects filtered by the vidinflk column
 * @method     ChildAdditem[]|Collection findByAdditemflag(string|array<string> $additemflag) Return ChildAdditem objects filtered by the additemflag column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByAdditemflag(string|array<string> $additemflag) Return ChildAdditem objects filtered by the additemflag column
 * @method     ChildAdditem[]|Collection findBySchemafam(string|array<string> $schemafam) Return ChildAdditem objects filtered by the schemafam column
 * @psalm-method Collection&\Traversable<ChildAdditem> findBySchemafam(string|array<string> $schemafam) Return ChildAdditem objects filtered by the schemafam column
 * @method     ChildAdditem[]|Collection findByOrigitemid(string|array<string> $origitemid) Return ChildAdditem objects filtered by the origitemid column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByOrigitemid(string|array<string> $origitemid) Return ChildAdditem objects filtered by the origitemid column
 * @method     ChildAdditem[]|Collection findByDummy(string|array<string> $dummy) Return ChildAdditem objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildAdditem> findByDummy(string|array<string> $dummy) Return ChildAdditem objects filtered by the dummy column
 *
 * @method     ChildAdditem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildAdditem> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class AdditemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AdditemQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Additem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdditemQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdditemQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildAdditemQuery) {
            return $criteria;
        }
        $query = new ChildAdditemQuery();
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
     * @return ChildAdditem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdditemTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdditemTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildAdditem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, itemid, price, qty, priceqty1, priceqty2, priceqty3, priceqty4, priceqty5, priceqty6, priceprice1, priceprice2, priceprice3, priceprice4, priceprice5, priceprice6, unit, listprice, name1, name2, shortdesc, image, familyid, ermes, speca, specb, specc, specd, spece, specf, specg, spech, longdesc, orderno, name3, name4, thumb, width, height, familydes, keywords, vpn, uomdesc, vidinffg, vidinflk, additemflag, schemafam, origitemid, dummy FROM additem WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildAdditem $obj */
            $obj = new ChildAdditem();
            $obj->hydrate($row);
            AdditemTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildAdditem|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(AdditemTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AdditemTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(AdditemTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AdditemTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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

        $this->addUsingAlias(AdditemTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(AdditemTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_RECNO, $recno, $comparison);

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
                $this->addUsingAlias(AdditemTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(AdditemTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * $query->filterByItemid(['foo', 'bar']); // WHERE itemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice($price = null, ?string $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty(1234); // WHERE qty = 1234
     * $query->filterByQty(array(12, 34)); // WHERE qty IN (12, 34)
     * $query->filterByQty(array('min' => 12)); // WHERE qty > 12
     * </code>
     *
     * @param mixed $qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQty($qty = null, ?string $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_QTY, $qty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceqty1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty1(1234); // WHERE priceqty1 = 1234
     * $query->filterByPriceqty1(array(12, 34)); // WHERE priceqty1 IN (12, 34)
     * $query->filterByPriceqty1(array('min' => 12)); // WHERE priceqty1 > 12
     * </code>
     *
     * @param mixed $priceqty1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceqty1($priceqty1 = null, ?string $comparison = null)
    {
        if (is_array($priceqty1)) {
            $useMinMax = false;
            if (isset($priceqty1['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY1, $priceqty1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty1['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY1, $priceqty1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY1, $priceqty1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceqty2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty2(1234); // WHERE priceqty2 = 1234
     * $query->filterByPriceqty2(array(12, 34)); // WHERE priceqty2 IN (12, 34)
     * $query->filterByPriceqty2(array('min' => 12)); // WHERE priceqty2 > 12
     * </code>
     *
     * @param mixed $priceqty2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceqty2($priceqty2 = null, ?string $comparison = null)
    {
        if (is_array($priceqty2)) {
            $useMinMax = false;
            if (isset($priceqty2['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY2, $priceqty2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty2['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY2, $priceqty2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY2, $priceqty2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceqty3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty3(1234); // WHERE priceqty3 = 1234
     * $query->filterByPriceqty3(array(12, 34)); // WHERE priceqty3 IN (12, 34)
     * $query->filterByPriceqty3(array('min' => 12)); // WHERE priceqty3 > 12
     * </code>
     *
     * @param mixed $priceqty3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceqty3($priceqty3 = null, ?string $comparison = null)
    {
        if (is_array($priceqty3)) {
            $useMinMax = false;
            if (isset($priceqty3['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY3, $priceqty3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty3['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY3, $priceqty3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY3, $priceqty3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceqty4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty4(1234); // WHERE priceqty4 = 1234
     * $query->filterByPriceqty4(array(12, 34)); // WHERE priceqty4 IN (12, 34)
     * $query->filterByPriceqty4(array('min' => 12)); // WHERE priceqty4 > 12
     * </code>
     *
     * @param mixed $priceqty4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceqty4($priceqty4 = null, ?string $comparison = null)
    {
        if (is_array($priceqty4)) {
            $useMinMax = false;
            if (isset($priceqty4['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY4, $priceqty4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty4['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY4, $priceqty4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY4, $priceqty4, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceqty5 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty5(1234); // WHERE priceqty5 = 1234
     * $query->filterByPriceqty5(array(12, 34)); // WHERE priceqty5 IN (12, 34)
     * $query->filterByPriceqty5(array('min' => 12)); // WHERE priceqty5 > 12
     * </code>
     *
     * @param mixed $priceqty5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceqty5($priceqty5 = null, ?string $comparison = null)
    {
        if (is_array($priceqty5)) {
            $useMinMax = false;
            if (isset($priceqty5['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY5, $priceqty5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty5['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY5, $priceqty5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY5, $priceqty5, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceqty6 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceqty6(1234); // WHERE priceqty6 = 1234
     * $query->filterByPriceqty6(array(12, 34)); // WHERE priceqty6 IN (12, 34)
     * $query->filterByPriceqty6(array('min' => 12)); // WHERE priceqty6 > 12
     * </code>
     *
     * @param mixed $priceqty6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceqty6($priceqty6 = null, ?string $comparison = null)
    {
        if (is_array($priceqty6)) {
            $useMinMax = false;
            if (isset($priceqty6['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY6, $priceqty6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceqty6['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY6, $priceqty6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEQTY6, $priceqty6, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceprice1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice1(1234); // WHERE priceprice1 = 1234
     * $query->filterByPriceprice1(array(12, 34)); // WHERE priceprice1 IN (12, 34)
     * $query->filterByPriceprice1(array('min' => 12)); // WHERE priceprice1 > 12
     * </code>
     *
     * @param mixed $priceprice1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceprice1($priceprice1 = null, ?string $comparison = null)
    {
        if (is_array($priceprice1)) {
            $useMinMax = false;
            if (isset($priceprice1['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE1, $priceprice1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice1['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE1, $priceprice1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE1, $priceprice1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceprice2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice2(1234); // WHERE priceprice2 = 1234
     * $query->filterByPriceprice2(array(12, 34)); // WHERE priceprice2 IN (12, 34)
     * $query->filterByPriceprice2(array('min' => 12)); // WHERE priceprice2 > 12
     * </code>
     *
     * @param mixed $priceprice2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceprice2($priceprice2 = null, ?string $comparison = null)
    {
        if (is_array($priceprice2)) {
            $useMinMax = false;
            if (isset($priceprice2['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE2, $priceprice2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice2['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE2, $priceprice2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE2, $priceprice2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceprice3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice3(1234); // WHERE priceprice3 = 1234
     * $query->filterByPriceprice3(array(12, 34)); // WHERE priceprice3 IN (12, 34)
     * $query->filterByPriceprice3(array('min' => 12)); // WHERE priceprice3 > 12
     * </code>
     *
     * @param mixed $priceprice3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceprice3($priceprice3 = null, ?string $comparison = null)
    {
        if (is_array($priceprice3)) {
            $useMinMax = false;
            if (isset($priceprice3['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE3, $priceprice3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice3['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE3, $priceprice3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE3, $priceprice3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceprice4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice4(1234); // WHERE priceprice4 = 1234
     * $query->filterByPriceprice4(array(12, 34)); // WHERE priceprice4 IN (12, 34)
     * $query->filterByPriceprice4(array('min' => 12)); // WHERE priceprice4 > 12
     * </code>
     *
     * @param mixed $priceprice4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceprice4($priceprice4 = null, ?string $comparison = null)
    {
        if (is_array($priceprice4)) {
            $useMinMax = false;
            if (isset($priceprice4['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE4, $priceprice4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice4['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE4, $priceprice4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE4, $priceprice4, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceprice5 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice5(1234); // WHERE priceprice5 = 1234
     * $query->filterByPriceprice5(array(12, 34)); // WHERE priceprice5 IN (12, 34)
     * $query->filterByPriceprice5(array('min' => 12)); // WHERE priceprice5 > 12
     * </code>
     *
     * @param mixed $priceprice5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceprice5($priceprice5 = null, ?string $comparison = null)
    {
        if (is_array($priceprice5)) {
            $useMinMax = false;
            if (isset($priceprice5['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE5, $priceprice5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice5['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE5, $priceprice5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE5, $priceprice5, $comparison);

        return $this;
    }

    /**
     * Filter the query on the priceprice6 column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceprice6(1234); // WHERE priceprice6 = 1234
     * $query->filterByPriceprice6(array(12, 34)); // WHERE priceprice6 IN (12, 34)
     * $query->filterByPriceprice6(array('min' => 12)); // WHERE priceprice6 > 12
     * </code>
     *
     * @param mixed $priceprice6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceprice6($priceprice6 = null, ?string $comparison = null)
    {
        if (is_array($priceprice6)) {
            $useMinMax = false;
            if (isset($priceprice6['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE6, $priceprice6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceprice6['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE6, $priceprice6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_PRICEPRICE6, $priceprice6, $comparison);

        return $this;
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * $query->filterByUnit(['foo', 'bar']); // WHERE unit IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $unit The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUnit($unit = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_UNIT, $unit, $comparison);

        return $this;
    }

    /**
     * Filter the query on the listprice column
     *
     * Example usage:
     * <code>
     * $query->filterByListprice(1234); // WHERE listprice = 1234
     * $query->filterByListprice(array(12, 34)); // WHERE listprice IN (12, 34)
     * $query->filterByListprice(array('min' => 12)); // WHERE listprice > 12
     * </code>
     *
     * @param mixed $listprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByListprice($listprice = null, ?string $comparison = null)
    {
        if (is_array($listprice)) {
            $useMinMax = false;
            if (isset($listprice['min'])) {
                $this->addUsingAlias(AdditemTableMap::COL_LISTPRICE, $listprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($listprice['max'])) {
                $this->addUsingAlias(AdditemTableMap::COL_LISTPRICE, $listprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_LISTPRICE, $listprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name1 column
     *
     * Example usage:
     * <code>
     * $query->filterByName1('fooValue');   // WHERE name1 = 'fooValue'
     * $query->filterByName1('%fooValue%', Criteria::LIKE); // WHERE name1 LIKE '%fooValue%'
     * $query->filterByName1(['foo', 'bar']); // WHERE name1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName1($name1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_NAME1, $name1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name2 column
     *
     * Example usage:
     * <code>
     * $query->filterByName2('fooValue');   // WHERE name2 = 'fooValue'
     * $query->filterByName2('%fooValue%', Criteria::LIKE); // WHERE name2 LIKE '%fooValue%'
     * $query->filterByName2(['foo', 'bar']); // WHERE name2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName2($name2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_NAME2, $name2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shortdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByShortdesc('fooValue');   // WHERE shortdesc = 'fooValue'
     * $query->filterByShortdesc('%fooValue%', Criteria::LIKE); // WHERE shortdesc LIKE '%fooValue%'
     * $query->filterByShortdesc(['foo', 'bar']); // WHERE shortdesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shortdesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShortdesc($shortdesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortdesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SHORTDESC, $shortdesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * $query->filterByImage(['foo', 'bar']); // WHERE image IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $image The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByImage($image = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_IMAGE, $image, $comparison);

        return $this;
    }

    /**
     * Filter the query on the familyid column
     *
     * Example usage:
     * <code>
     * $query->filterByFamilyid('fooValue');   // WHERE familyid = 'fooValue'
     * $query->filterByFamilyid('%fooValue%', Criteria::LIKE); // WHERE familyid LIKE '%fooValue%'
     * $query->filterByFamilyid(['foo', 'bar']); // WHERE familyid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $familyid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFamilyid($familyid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familyid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_FAMILYID, $familyid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ermes column
     *
     * Example usage:
     * <code>
     * $query->filterByErmes('fooValue');   // WHERE ermes = 'fooValue'
     * $query->filterByErmes('%fooValue%', Criteria::LIKE); // WHERE ermes LIKE '%fooValue%'
     * $query->filterByErmes(['foo', 'bar']); // WHERE ermes IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ermes The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByErmes($ermes = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ermes)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_ERMES, $ermes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the speca column
     *
     * Example usage:
     * <code>
     * $query->filterBySpeca('fooValue');   // WHERE speca = 'fooValue'
     * $query->filterBySpeca('%fooValue%', Criteria::LIKE); // WHERE speca LIKE '%fooValue%'
     * $query->filterBySpeca(['foo', 'bar']); // WHERE speca IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $speca The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpeca($speca = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($speca)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECA, $speca, $comparison);

        return $this;
    }

    /**
     * Filter the query on the specb column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecb('fooValue');   // WHERE specb = 'fooValue'
     * $query->filterBySpecb('%fooValue%', Criteria::LIKE); // WHERE specb LIKE '%fooValue%'
     * $query->filterBySpecb(['foo', 'bar']); // WHERE specb IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $specb The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpecb($specb = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specb)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECB, $specb, $comparison);

        return $this;
    }

    /**
     * Filter the query on the specc column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecc('fooValue');   // WHERE specc = 'fooValue'
     * $query->filterBySpecc('%fooValue%', Criteria::LIKE); // WHERE specc LIKE '%fooValue%'
     * $query->filterBySpecc(['foo', 'bar']); // WHERE specc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $specc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpecc($specc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECC, $specc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the specd column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecd('fooValue');   // WHERE specd = 'fooValue'
     * $query->filterBySpecd('%fooValue%', Criteria::LIKE); // WHERE specd LIKE '%fooValue%'
     * $query->filterBySpecd(['foo', 'bar']); // WHERE specd IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $specd The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpecd($specd = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specd)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECD, $specd, $comparison);

        return $this;
    }

    /**
     * Filter the query on the spece column
     *
     * Example usage:
     * <code>
     * $query->filterBySpece('fooValue');   // WHERE spece = 'fooValue'
     * $query->filterBySpece('%fooValue%', Criteria::LIKE); // WHERE spece LIKE '%fooValue%'
     * $query->filterBySpece(['foo', 'bar']); // WHERE spece IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $spece The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpece($spece = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spece)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECE, $spece, $comparison);

        return $this;
    }

    /**
     * Filter the query on the specf column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecf('fooValue');   // WHERE specf = 'fooValue'
     * $query->filterBySpecf('%fooValue%', Criteria::LIKE); // WHERE specf LIKE '%fooValue%'
     * $query->filterBySpecf(['foo', 'bar']); // WHERE specf IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $specf The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpecf($specf = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specf)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECF, $specf, $comparison);

        return $this;
    }

    /**
     * Filter the query on the specg column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecg('fooValue');   // WHERE specg = 'fooValue'
     * $query->filterBySpecg('%fooValue%', Criteria::LIKE); // WHERE specg LIKE '%fooValue%'
     * $query->filterBySpecg(['foo', 'bar']); // WHERE specg IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $specg The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpecg($specg = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specg)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECG, $specg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the spech column
     *
     * Example usage:
     * <code>
     * $query->filterBySpech('fooValue');   // WHERE spech = 'fooValue'
     * $query->filterBySpech('%fooValue%', Criteria::LIKE); // WHERE spech LIKE '%fooValue%'
     * $query->filterBySpech(['foo', 'bar']); // WHERE spech IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $spech The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpech($spech = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spech)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SPECH, $spech, $comparison);

        return $this;
    }

    /**
     * Filter the query on the longdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByLongdesc('fooValue');   // WHERE longdesc = 'fooValue'
     * $query->filterByLongdesc('%fooValue%', Criteria::LIKE); // WHERE longdesc LIKE '%fooValue%'
     * $query->filterByLongdesc(['foo', 'bar']); // WHERE longdesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $longdesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLongdesc($longdesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longdesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_LONGDESC, $longdesc, $comparison);

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

        $this->addUsingAlias(AdditemTableMap::COL_ORDERNO, $orderno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name3 column
     *
     * Example usage:
     * <code>
     * $query->filterByName3('fooValue');   // WHERE name3 = 'fooValue'
     * $query->filterByName3('%fooValue%', Criteria::LIKE); // WHERE name3 LIKE '%fooValue%'
     * $query->filterByName3(['foo', 'bar']); // WHERE name3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName3($name3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_NAME3, $name3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name4 column
     *
     * Example usage:
     * <code>
     * $query->filterByName4('fooValue');   // WHERE name4 = 'fooValue'
     * $query->filterByName4('%fooValue%', Criteria::LIKE); // WHERE name4 LIKE '%fooValue%'
     * $query->filterByName4(['foo', 'bar']); // WHERE name4 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name4 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName4($name4 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name4)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_NAME4, $name4, $comparison);

        return $this;
    }

    /**
     * Filter the query on the thumb column
     *
     * Example usage:
     * <code>
     * $query->filterByThumb('fooValue');   // WHERE thumb = 'fooValue'
     * $query->filterByThumb('%fooValue%', Criteria::LIKE); // WHERE thumb LIKE '%fooValue%'
     * $query->filterByThumb(['foo', 'bar']); // WHERE thumb IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $thumb The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByThumb($thumb = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_THUMB, $thumb, $comparison);

        return $this;
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth('fooValue');   // WHERE width = 'fooValue'
     * $query->filterByWidth('%fooValue%', Criteria::LIKE); // WHERE width LIKE '%fooValue%'
     * $query->filterByWidth(['foo', 'bar']); // WHERE width IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $width The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByWidth($width = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($width)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_WIDTH, $width, $comparison);

        return $this;
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight('fooValue');   // WHERE height = 'fooValue'
     * $query->filterByHeight('%fooValue%', Criteria::LIKE); // WHERE height LIKE '%fooValue%'
     * $query->filterByHeight(['foo', 'bar']); // WHERE height IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $height The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHeight($height = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($height)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_HEIGHT, $height, $comparison);

        return $this;
    }

    /**
     * Filter the query on the familydes column
     *
     * Example usage:
     * <code>
     * $query->filterByFamilydes('fooValue');   // WHERE familydes = 'fooValue'
     * $query->filterByFamilydes('%fooValue%', Criteria::LIKE); // WHERE familydes LIKE '%fooValue%'
     * $query->filterByFamilydes(['foo', 'bar']); // WHERE familydes IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $familydes The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFamilydes($familydes = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($familydes)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_FAMILYDES, $familydes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the keywords column
     *
     * Example usage:
     * <code>
     * $query->filterByKeywords('fooValue');   // WHERE keywords = 'fooValue'
     * $query->filterByKeywords('%fooValue%', Criteria::LIKE); // WHERE keywords LIKE '%fooValue%'
     * $query->filterByKeywords(['foo', 'bar']); // WHERE keywords IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $keywords The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByKeywords($keywords = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keywords)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_KEYWORDS, $keywords, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vpn column
     *
     * Example usage:
     * <code>
     * $query->filterByVpn('fooValue');   // WHERE vpn = 'fooValue'
     * $query->filterByVpn('%fooValue%', Criteria::LIKE); // WHERE vpn LIKE '%fooValue%'
     * $query->filterByVpn(['foo', 'bar']); // WHERE vpn IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vpn The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVpn($vpn = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vpn)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_VPN, $vpn, $comparison);

        return $this;
    }

    /**
     * Filter the query on the uomdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByUomdesc('fooValue');   // WHERE uomdesc = 'fooValue'
     * $query->filterByUomdesc('%fooValue%', Criteria::LIKE); // WHERE uomdesc LIKE '%fooValue%'
     * $query->filterByUomdesc(['foo', 'bar']); // WHERE uomdesc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $uomdesc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUomdesc($uomdesc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomdesc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_UOMDESC, $uomdesc, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vidinffg column
     *
     * Example usage:
     * <code>
     * $query->filterByVidinffg('fooValue');   // WHERE vidinffg = 'fooValue'
     * $query->filterByVidinffg('%fooValue%', Criteria::LIKE); // WHERE vidinffg LIKE '%fooValue%'
     * $query->filterByVidinffg(['foo', 'bar']); // WHERE vidinffg IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vidinffg The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVidinffg($vidinffg = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinffg)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_VIDINFFG, $vidinffg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vidinflk column
     *
     * Example usage:
     * <code>
     * $query->filterByVidinflk('fooValue');   // WHERE vidinflk = 'fooValue'
     * $query->filterByVidinflk('%fooValue%', Criteria::LIKE); // WHERE vidinflk LIKE '%fooValue%'
     * $query->filterByVidinflk(['foo', 'bar']); // WHERE vidinflk IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vidinflk The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVidinflk($vidinflk = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinflk)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_VIDINFLK, $vidinflk, $comparison);

        return $this;
    }

    /**
     * Filter the query on the additemflag column
     *
     * Example usage:
     * <code>
     * $query->filterByAdditemflag('fooValue');   // WHERE additemflag = 'fooValue'
     * $query->filterByAdditemflag('%fooValue%', Criteria::LIKE); // WHERE additemflag LIKE '%fooValue%'
     * $query->filterByAdditemflag(['foo', 'bar']); // WHERE additemflag IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $additemflag The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAdditemflag($additemflag = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($additemflag)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_ADDITEMFLAG, $additemflag, $comparison);

        return $this;
    }

    /**
     * Filter the query on the schemafam column
     *
     * Example usage:
     * <code>
     * $query->filterBySchemafam('fooValue');   // WHERE schemafam = 'fooValue'
     * $query->filterBySchemafam('%fooValue%', Criteria::LIKE); // WHERE schemafam LIKE '%fooValue%'
     * $query->filterBySchemafam(['foo', 'bar']); // WHERE schemafam IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $schemafam The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySchemafam($schemafam = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($schemafam)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_SCHEMAFAM, $schemafam, $comparison);

        return $this;
    }

    /**
     * Filter the query on the origitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByOrigitemid('fooValue');   // WHERE origitemid = 'fooValue'
     * $query->filterByOrigitemid('%fooValue%', Criteria::LIKE); // WHERE origitemid LIKE '%fooValue%'
     * $query->filterByOrigitemid(['foo', 'bar']); // WHERE origitemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $origitemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrigitemid($origitemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($origitemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdditemTableMap::COL_ORIGITEMID, $origitemid, $comparison);

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

        $this->addUsingAlias(AdditemTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildAdditem $additem Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($additem = null)
    {
        if ($additem) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AdditemTableMap::COL_SESSIONID), $additem->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AdditemTableMap::COL_RECNO), $additem->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the additem table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdditemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdditemTableMap::clearInstancePool();
            AdditemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdditemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdditemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdditemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdditemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
