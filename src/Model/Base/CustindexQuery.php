<?php

namespace Base;

use \Custindex as ChildCustindex;
use \CustindexQuery as ChildCustindexQuery;
use \Exception;
use \PDO;
use Map\CustindexTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `custindex` table.
 *
 * @method     ChildCustindexQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCustindexQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCustindexQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCustindexQuery orderBySplogin1($order = Criteria::ASC) Order by the splogin1 column
 * @method     ChildCustindexQuery orderBySplogin2($order = Criteria::ASC) Order by the splogin2 column
 * @method     ChildCustindexQuery orderBySplogin3($order = Criteria::ASC) Order by the splogin3 column
 * @method     ChildCustindexQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCustindexQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildCustindexQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCustindexQuery orderByAddr1($order = Criteria::ASC) Order by the addr1 column
 * @method     ChildCustindexQuery orderByAddr2($order = Criteria::ASC) Order by the addr2 column
 * @method     ChildCustindexQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildCustindexQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildCustindexQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildCustindexQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildCustindexQuery orderByCellphone($order = Criteria::ASC) Order by the cellphone column
 * @method     ChildCustindexQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildCustindexQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method     ChildCustindexQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildCustindexQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCustindexQuery orderByTypecode($order = Criteria::ASC) Order by the typecode column
 * @method     ChildCustindexQuery orderByFaxnbr($order = Criteria::ASC) Order by the faxnbr column
 * @method     ChildCustindexQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildCustindexQuery orderByArcontact($order = Criteria::ASC) Order by the arcontact column
 * @method     ChildCustindexQuery orderByDunningcontact($order = Criteria::ASC) Order by the dunningcontact column
 * @method     ChildCustindexQuery orderByBuyingcontact($order = Criteria::ASC) Order by the buyingcontact column
 * @method     ChildCustindexQuery orderByCertcontact($order = Criteria::ASC) Order by the certcontact column
 * @method     ChildCustindexQuery orderByAckcontact($order = Criteria::ASC) Order by the ackcontact column
 * @method     ChildCustindexQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCustindexQuery groupByRecno() Group by the recno column
 * @method     ChildCustindexQuery groupByDate() Group by the date column
 * @method     ChildCustindexQuery groupByTime() Group by the time column
 * @method     ChildCustindexQuery groupBySplogin1() Group by the splogin1 column
 * @method     ChildCustindexQuery groupBySplogin2() Group by the splogin2 column
 * @method     ChildCustindexQuery groupBySplogin3() Group by the splogin3 column
 * @method     ChildCustindexQuery groupByCustid() Group by the custid column
 * @method     ChildCustindexQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildCustindexQuery groupByName() Group by the name column
 * @method     ChildCustindexQuery groupByAddr1() Group by the addr1 column
 * @method     ChildCustindexQuery groupByAddr2() Group by the addr2 column
 * @method     ChildCustindexQuery groupByCity() Group by the city column
 * @method     ChildCustindexQuery groupByState() Group by the state column
 * @method     ChildCustindexQuery groupByZip() Group by the zip column
 * @method     ChildCustindexQuery groupByPhone() Group by the phone column
 * @method     ChildCustindexQuery groupByCellphone() Group by the cellphone column
 * @method     ChildCustindexQuery groupByContact() Group by the contact column
 * @method     ChildCustindexQuery groupBySource() Group by the source column
 * @method     ChildCustindexQuery groupByExtension() Group by the extension column
 * @method     ChildCustindexQuery groupByEmail() Group by the email column
 * @method     ChildCustindexQuery groupByTypecode() Group by the typecode column
 * @method     ChildCustindexQuery groupByFaxnbr() Group by the faxnbr column
 * @method     ChildCustindexQuery groupByTitle() Group by the title column
 * @method     ChildCustindexQuery groupByArcontact() Group by the arcontact column
 * @method     ChildCustindexQuery groupByDunningcontact() Group by the dunningcontact column
 * @method     ChildCustindexQuery groupByBuyingcontact() Group by the buyingcontact column
 * @method     ChildCustindexQuery groupByCertcontact() Group by the certcontact column
 * @method     ChildCustindexQuery groupByAckcontact() Group by the ackcontact column
 * @method     ChildCustindexQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCustindexQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustindexQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustindexQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustindexQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustindexQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustindexQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustindex|null findOne(?ConnectionInterface $con = null) Return the first ChildCustindex matching the query
 * @method     ChildCustindex findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCustindex matching the query, or a new ChildCustindex object populated from the query conditions when no match is found
 *
 * @method     ChildCustindex|null findOneByRecno(int $recno) Return the first ChildCustindex filtered by the recno column
 * @method     ChildCustindex|null findOneByDate(int $date) Return the first ChildCustindex filtered by the date column
 * @method     ChildCustindex|null findOneByTime(int $time) Return the first ChildCustindex filtered by the time column
 * @method     ChildCustindex|null findOneBySplogin1(string $splogin1) Return the first ChildCustindex filtered by the splogin1 column
 * @method     ChildCustindex|null findOneBySplogin2(string $splogin2) Return the first ChildCustindex filtered by the splogin2 column
 * @method     ChildCustindex|null findOneBySplogin3(string $splogin3) Return the first ChildCustindex filtered by the splogin3 column
 * @method     ChildCustindex|null findOneByCustid(string $custid) Return the first ChildCustindex filtered by the custid column
 * @method     ChildCustindex|null findOneByShiptoid(string $shiptoid) Return the first ChildCustindex filtered by the shiptoid column
 * @method     ChildCustindex|null findOneByName(string $name) Return the first ChildCustindex filtered by the name column
 * @method     ChildCustindex|null findOneByAddr1(string $addr1) Return the first ChildCustindex filtered by the addr1 column
 * @method     ChildCustindex|null findOneByAddr2(string $addr2) Return the first ChildCustindex filtered by the addr2 column
 * @method     ChildCustindex|null findOneByCity(string $city) Return the first ChildCustindex filtered by the city column
 * @method     ChildCustindex|null findOneByState(string $state) Return the first ChildCustindex filtered by the state column
 * @method     ChildCustindex|null findOneByZip(string $zip) Return the first ChildCustindex filtered by the zip column
 * @method     ChildCustindex|null findOneByPhone(string $phone) Return the first ChildCustindex filtered by the phone column
 * @method     ChildCustindex|null findOneByCellphone(string $cellphone) Return the first ChildCustindex filtered by the cellphone column
 * @method     ChildCustindex|null findOneByContact(string $contact) Return the first ChildCustindex filtered by the contact column
 * @method     ChildCustindex|null findOneBySource(string $source) Return the first ChildCustindex filtered by the source column
 * @method     ChildCustindex|null findOneByExtension(string $extension) Return the first ChildCustindex filtered by the extension column
 * @method     ChildCustindex|null findOneByEmail(string $email) Return the first ChildCustindex filtered by the email column
 * @method     ChildCustindex|null findOneByTypecode(string $typecode) Return the first ChildCustindex filtered by the typecode column
 * @method     ChildCustindex|null findOneByFaxnbr(string $faxnbr) Return the first ChildCustindex filtered by the faxnbr column
 * @method     ChildCustindex|null findOneByTitle(string $title) Return the first ChildCustindex filtered by the title column
 * @method     ChildCustindex|null findOneByArcontact(string $arcontact) Return the first ChildCustindex filtered by the arcontact column
 * @method     ChildCustindex|null findOneByDunningcontact(string $dunningcontact) Return the first ChildCustindex filtered by the dunningcontact column
 * @method     ChildCustindex|null findOneByBuyingcontact(string $buyingcontact) Return the first ChildCustindex filtered by the buyingcontact column
 * @method     ChildCustindex|null findOneByCertcontact(string $certcontact) Return the first ChildCustindex filtered by the certcontact column
 * @method     ChildCustindex|null findOneByAckcontact(string $ackcontact) Return the first ChildCustindex filtered by the ackcontact column
 * @method     ChildCustindex|null findOneByDummy(string $dummy) Return the first ChildCustindex filtered by the dummy column
 *
 * @method     ChildCustindex requirePk($key, ?ConnectionInterface $con = null) Return the ChildCustindex by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOne(?ConnectionInterface $con = null) Return the first ChildCustindex matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustindex requireOneByRecno(int $recno) Return the first ChildCustindex filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByDate(int $date) Return the first ChildCustindex filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByTime(int $time) Return the first ChildCustindex filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneBySplogin1(string $splogin1) Return the first ChildCustindex filtered by the splogin1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneBySplogin2(string $splogin2) Return the first ChildCustindex filtered by the splogin2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneBySplogin3(string $splogin3) Return the first ChildCustindex filtered by the splogin3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByCustid(string $custid) Return the first ChildCustindex filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByShiptoid(string $shiptoid) Return the first ChildCustindex filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByName(string $name) Return the first ChildCustindex filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByAddr1(string $addr1) Return the first ChildCustindex filtered by the addr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByAddr2(string $addr2) Return the first ChildCustindex filtered by the addr2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByCity(string $city) Return the first ChildCustindex filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByState(string $state) Return the first ChildCustindex filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByZip(string $zip) Return the first ChildCustindex filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByPhone(string $phone) Return the first ChildCustindex filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByCellphone(string $cellphone) Return the first ChildCustindex filtered by the cellphone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByContact(string $contact) Return the first ChildCustindex filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneBySource(string $source) Return the first ChildCustindex filtered by the source column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByExtension(string $extension) Return the first ChildCustindex filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByEmail(string $email) Return the first ChildCustindex filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByTypecode(string $typecode) Return the first ChildCustindex filtered by the typecode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByFaxnbr(string $faxnbr) Return the first ChildCustindex filtered by the faxnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByTitle(string $title) Return the first ChildCustindex filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByArcontact(string $arcontact) Return the first ChildCustindex filtered by the arcontact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByDunningcontact(string $dunningcontact) Return the first ChildCustindex filtered by the dunningcontact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByBuyingcontact(string $buyingcontact) Return the first ChildCustindex filtered by the buyingcontact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByCertcontact(string $certcontact) Return the first ChildCustindex filtered by the certcontact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByAckcontact(string $ackcontact) Return the first ChildCustindex filtered by the ackcontact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustindex requireOneByDummy(string $dummy) Return the first ChildCustindex filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustindex[]|Collection find(?ConnectionInterface $con = null) Return ChildCustindex objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCustindex> find(?ConnectionInterface $con = null) Return ChildCustindex objects based on current ModelCriteria
 *
 * @method     ChildCustindex[]|Collection findByRecno(int|array<int> $recno) Return ChildCustindex objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByRecno(int|array<int> $recno) Return ChildCustindex objects filtered by the recno column
 * @method     ChildCustindex[]|Collection findByDate(int|array<int> $date) Return ChildCustindex objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByDate(int|array<int> $date) Return ChildCustindex objects filtered by the date column
 * @method     ChildCustindex[]|Collection findByTime(int|array<int> $time) Return ChildCustindex objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByTime(int|array<int> $time) Return ChildCustindex objects filtered by the time column
 * @method     ChildCustindex[]|Collection findBySplogin1(string|array<string> $splogin1) Return ChildCustindex objects filtered by the splogin1 column
 * @psalm-method Collection&\Traversable<ChildCustindex> findBySplogin1(string|array<string> $splogin1) Return ChildCustindex objects filtered by the splogin1 column
 * @method     ChildCustindex[]|Collection findBySplogin2(string|array<string> $splogin2) Return ChildCustindex objects filtered by the splogin2 column
 * @psalm-method Collection&\Traversable<ChildCustindex> findBySplogin2(string|array<string> $splogin2) Return ChildCustindex objects filtered by the splogin2 column
 * @method     ChildCustindex[]|Collection findBySplogin3(string|array<string> $splogin3) Return ChildCustindex objects filtered by the splogin3 column
 * @psalm-method Collection&\Traversable<ChildCustindex> findBySplogin3(string|array<string> $splogin3) Return ChildCustindex objects filtered by the splogin3 column
 * @method     ChildCustindex[]|Collection findByCustid(string|array<string> $custid) Return ChildCustindex objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByCustid(string|array<string> $custid) Return ChildCustindex objects filtered by the custid column
 * @method     ChildCustindex[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildCustindex objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByShiptoid(string|array<string> $shiptoid) Return ChildCustindex objects filtered by the shiptoid column
 * @method     ChildCustindex[]|Collection findByName(string|array<string> $name) Return ChildCustindex objects filtered by the name column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByName(string|array<string> $name) Return ChildCustindex objects filtered by the name column
 * @method     ChildCustindex[]|Collection findByAddr1(string|array<string> $addr1) Return ChildCustindex objects filtered by the addr1 column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByAddr1(string|array<string> $addr1) Return ChildCustindex objects filtered by the addr1 column
 * @method     ChildCustindex[]|Collection findByAddr2(string|array<string> $addr2) Return ChildCustindex objects filtered by the addr2 column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByAddr2(string|array<string> $addr2) Return ChildCustindex objects filtered by the addr2 column
 * @method     ChildCustindex[]|Collection findByCity(string|array<string> $city) Return ChildCustindex objects filtered by the city column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByCity(string|array<string> $city) Return ChildCustindex objects filtered by the city column
 * @method     ChildCustindex[]|Collection findByState(string|array<string> $state) Return ChildCustindex objects filtered by the state column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByState(string|array<string> $state) Return ChildCustindex objects filtered by the state column
 * @method     ChildCustindex[]|Collection findByZip(string|array<string> $zip) Return ChildCustindex objects filtered by the zip column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByZip(string|array<string> $zip) Return ChildCustindex objects filtered by the zip column
 * @method     ChildCustindex[]|Collection findByPhone(string|array<string> $phone) Return ChildCustindex objects filtered by the phone column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByPhone(string|array<string> $phone) Return ChildCustindex objects filtered by the phone column
 * @method     ChildCustindex[]|Collection findByCellphone(string|array<string> $cellphone) Return ChildCustindex objects filtered by the cellphone column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByCellphone(string|array<string> $cellphone) Return ChildCustindex objects filtered by the cellphone column
 * @method     ChildCustindex[]|Collection findByContact(string|array<string> $contact) Return ChildCustindex objects filtered by the contact column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByContact(string|array<string> $contact) Return ChildCustindex objects filtered by the contact column
 * @method     ChildCustindex[]|Collection findBySource(string|array<string> $source) Return ChildCustindex objects filtered by the source column
 * @psalm-method Collection&\Traversable<ChildCustindex> findBySource(string|array<string> $source) Return ChildCustindex objects filtered by the source column
 * @method     ChildCustindex[]|Collection findByExtension(string|array<string> $extension) Return ChildCustindex objects filtered by the extension column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByExtension(string|array<string> $extension) Return ChildCustindex objects filtered by the extension column
 * @method     ChildCustindex[]|Collection findByEmail(string|array<string> $email) Return ChildCustindex objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByEmail(string|array<string> $email) Return ChildCustindex objects filtered by the email column
 * @method     ChildCustindex[]|Collection findByTypecode(string|array<string> $typecode) Return ChildCustindex objects filtered by the typecode column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByTypecode(string|array<string> $typecode) Return ChildCustindex objects filtered by the typecode column
 * @method     ChildCustindex[]|Collection findByFaxnbr(string|array<string> $faxnbr) Return ChildCustindex objects filtered by the faxnbr column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByFaxnbr(string|array<string> $faxnbr) Return ChildCustindex objects filtered by the faxnbr column
 * @method     ChildCustindex[]|Collection findByTitle(string|array<string> $title) Return ChildCustindex objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByTitle(string|array<string> $title) Return ChildCustindex objects filtered by the title column
 * @method     ChildCustindex[]|Collection findByArcontact(string|array<string> $arcontact) Return ChildCustindex objects filtered by the arcontact column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByArcontact(string|array<string> $arcontact) Return ChildCustindex objects filtered by the arcontact column
 * @method     ChildCustindex[]|Collection findByDunningcontact(string|array<string> $dunningcontact) Return ChildCustindex objects filtered by the dunningcontact column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByDunningcontact(string|array<string> $dunningcontact) Return ChildCustindex objects filtered by the dunningcontact column
 * @method     ChildCustindex[]|Collection findByBuyingcontact(string|array<string> $buyingcontact) Return ChildCustindex objects filtered by the buyingcontact column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByBuyingcontact(string|array<string> $buyingcontact) Return ChildCustindex objects filtered by the buyingcontact column
 * @method     ChildCustindex[]|Collection findByCertcontact(string|array<string> $certcontact) Return ChildCustindex objects filtered by the certcontact column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByCertcontact(string|array<string> $certcontact) Return ChildCustindex objects filtered by the certcontact column
 * @method     ChildCustindex[]|Collection findByAckcontact(string|array<string> $ackcontact) Return ChildCustindex objects filtered by the ackcontact column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByAckcontact(string|array<string> $ackcontact) Return ChildCustindex objects filtered by the ackcontact column
 * @method     ChildCustindex[]|Collection findByDummy(string|array<string> $dummy) Return ChildCustindex objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildCustindex> findByDummy(string|array<string> $dummy) Return ChildCustindex objects filtered by the dummy column
 *
 * @method     ChildCustindex[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCustindex> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class CustindexQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustindexQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Custindex', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustindexQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustindexQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCustindexQuery) {
            return $criteria;
        }
        $query = new ChildCustindexQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCustindex|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustindexTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustindexTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCustindex A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT recno, date, time, splogin1, splogin2, splogin3, custid, shiptoid, name, addr1, addr2, city, state, zip, phone, cellphone, contact, source, extension, email, typecode, faxnbr, title, arcontact, dunningcontact, buyingcontact, certcontact, ackcontact, dummy FROM custindex WHERE recno = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCustindex $obj */
            $obj = new ChildCustindex();
            $obj->hydrate($row);
            CustindexTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCustindex|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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

        $this->addUsingAlias(CustindexTableMap::COL_RECNO, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(CustindexTableMap::COL_RECNO, $keys, Criteria::IN);

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
                $this->addUsingAlias(CustindexTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CustindexTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_RECNO, $recno, $comparison);

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
                $this->addUsingAlias(CustindexTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CustindexTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(CustindexTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CustindexTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the splogin1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySplogin1('fooValue');   // WHERE splogin1 = 'fooValue'
     * $query->filterBySplogin1('%fooValue%', Criteria::LIKE); // WHERE splogin1 LIKE '%fooValue%'
     * $query->filterBySplogin1(['foo', 'bar']); // WHERE splogin1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $splogin1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySplogin1($splogin1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($splogin1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_SPLOGIN1, $splogin1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the splogin2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySplogin2('fooValue');   // WHERE splogin2 = 'fooValue'
     * $query->filterBySplogin2('%fooValue%', Criteria::LIKE); // WHERE splogin2 LIKE '%fooValue%'
     * $query->filterBySplogin2(['foo', 'bar']); // WHERE splogin2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $splogin2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySplogin2($splogin2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($splogin2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_SPLOGIN2, $splogin2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the splogin3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySplogin3('fooValue');   // WHERE splogin3 = 'fooValue'
     * $query->filterBySplogin3('%fooValue%', Criteria::LIKE); // WHERE splogin3 LIKE '%fooValue%'
     * $query->filterBySplogin3(['foo', 'bar']); // WHERE splogin3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $splogin3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySplogin3($splogin3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($splogin3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_SPLOGIN3, $splogin3, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_CUSTID, $custid, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_SHIPTOID, $shiptoid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * $query->filterByName(['foo', 'bar']); // WHERE name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName($name = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_NAME, $name, $comparison);

        return $this;
    }

    /**
     * Filter the query on the addr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddr1('fooValue');   // WHERE addr1 = 'fooValue'
     * $query->filterByAddr1('%fooValue%', Criteria::LIKE); // WHERE addr1 LIKE '%fooValue%'
     * $query->filterByAddr1(['foo', 'bar']); // WHERE addr1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $addr1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAddr1($addr1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addr1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_ADDR1, $addr1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the addr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddr2('fooValue');   // WHERE addr2 = 'fooValue'
     * $query->filterByAddr2('%fooValue%', Criteria::LIKE); // WHERE addr2 LIKE '%fooValue%'
     * $query->filterByAddr2(['foo', 'bar']); // WHERE addr2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $addr2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAddr2($addr2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addr2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_ADDR2, $addr2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * $query->filterByCity(['foo', 'bar']); // WHERE city IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $city The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCity($city = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_CITY, $city, $comparison);

        return $this;
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * $query->filterByState(['foo', 'bar']); // WHERE state IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $state The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByState($state = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_STATE, $state, $comparison);

        return $this;
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * $query->filterByZip(['foo', 'bar']); // WHERE zip IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $zip The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByZip($zip = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_ZIP, $zip, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_PHONE, $phone, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cellphone column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphone('fooValue');   // WHERE cellphone = 'fooValue'
     * $query->filterByCellphone('%fooValue%', Criteria::LIKE); // WHERE cellphone LIKE '%fooValue%'
     * $query->filterByCellphone(['foo', 'bar']); // WHERE cellphone IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cellphone The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCellphone($cellphone = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphone)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_CELLPHONE, $cellphone, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_CONTACT, $contact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%', Criteria::LIKE); // WHERE source LIKE '%fooValue%'
     * $query->filterBySource(['foo', 'bar']); // WHERE source IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $source The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySource($source = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_SOURCE, $source, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_EXTENSION, $extension, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_EMAIL, $email, $comparison);

        return $this;
    }

    /**
     * Filter the query on the typecode column
     *
     * Example usage:
     * <code>
     * $query->filterByTypecode('fooValue');   // WHERE typecode = 'fooValue'
     * $query->filterByTypecode('%fooValue%', Criteria::LIKE); // WHERE typecode LIKE '%fooValue%'
     * $query->filterByTypecode(['foo', 'bar']); // WHERE typecode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $typecode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTypecode($typecode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typecode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_TYPECODE, $typecode, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_FAXNBR, $faxnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * $query->filterByTitle(['foo', 'bar']); // WHERE title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $title The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTitle($title = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the arcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByArcontact('fooValue');   // WHERE arcontact = 'fooValue'
     * $query->filterByArcontact('%fooValue%', Criteria::LIKE); // WHERE arcontact LIKE '%fooValue%'
     * $query->filterByArcontact(['foo', 'bar']); // WHERE arcontact IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $arcontact The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByArcontact($arcontact = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($arcontact)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_ARCONTACT, $arcontact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dunningcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByDunningcontact('fooValue');   // WHERE dunningcontact = 'fooValue'
     * $query->filterByDunningcontact('%fooValue%', Criteria::LIKE); // WHERE dunningcontact LIKE '%fooValue%'
     * $query->filterByDunningcontact(['foo', 'bar']); // WHERE dunningcontact IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $dunningcontact The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDunningcontact($dunningcontact = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dunningcontact)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_DUNNINGCONTACT, $dunningcontact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the buyingcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByBuyingcontact('fooValue');   // WHERE buyingcontact = 'fooValue'
     * $query->filterByBuyingcontact('%fooValue%', Criteria::LIKE); // WHERE buyingcontact LIKE '%fooValue%'
     * $query->filterByBuyingcontact(['foo', 'bar']); // WHERE buyingcontact IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $buyingcontact The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBuyingcontact($buyingcontact = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($buyingcontact)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_BUYINGCONTACT, $buyingcontact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the certcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByCertcontact('fooValue');   // WHERE certcontact = 'fooValue'
     * $query->filterByCertcontact('%fooValue%', Criteria::LIKE); // WHERE certcontact LIKE '%fooValue%'
     * $query->filterByCertcontact(['foo', 'bar']); // WHERE certcontact IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $certcontact The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCertcontact($certcontact = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($certcontact)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_CERTCONTACT, $certcontact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ackcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByAckcontact('fooValue');   // WHERE ackcontact = 'fooValue'
     * $query->filterByAckcontact('%fooValue%', Criteria::LIKE); // WHERE ackcontact LIKE '%fooValue%'
     * $query->filterByAckcontact(['foo', 'bar']); // WHERE ackcontact IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ackcontact The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAckcontact($ackcontact = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ackcontact)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustindexTableMap::COL_ACKCONTACT, $ackcontact, $comparison);

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

        $this->addUsingAlias(CustindexTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCustindex $custindex Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($custindex = null)
    {
        if ($custindex) {
            $this->addUsingAlias(CustindexTableMap::COL_RECNO, $custindex->getRecno(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the custindex table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustindexTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustindexTableMap::clearInstancePool();
            CustindexTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustindexTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustindexTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustindexTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustindexTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
