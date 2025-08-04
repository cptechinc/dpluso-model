<?php

namespace Base;

use \Login as ChildLogin;
use \LoginQuery as ChildLoginQuery;
use \Exception;
use \PDO;
use Map\LoginTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `login` table.
 *
 * @method     ChildLoginQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildLoginQuery orderByRecordno($order = Criteria::ASC) Order by the recordno column
 * @method     ChildLoginQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildLoginQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildLoginQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildLoginQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildLoginQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildLoginQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ChildLoginQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ChildLoginQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildLoginQuery orderBySt($order = Criteria::ASC) Order by the st column
 * @method     ChildLoginQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildLoginQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildLoginQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildLoginQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildLoginQuery orderByValidlogin($order = Criteria::ASC) Order by the validlogin column
 * @method     ChildLoginQuery orderByCconly($order = Criteria::ASC) Order by the cconly column
 * @method     ChildLoginQuery orderByErmes($order = Criteria::ASC) Order by the ermes column
 * @method     ChildLoginQuery orderByPasswd($order = Criteria::ASC) Order by the passwd column
 * @method     ChildLoginQuery orderByCbi($order = Criteria::ASC) Order by the cbi column
 * @method     ChildLoginQuery orderByMmn($order = Criteria::ASC) Order by the mmn column
 * @method     ChildLoginQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     ChildLoginQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildLoginQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method     ChildLoginQuery orderByVpromo($order = Criteria::ASC) Order by the vpromo column
 * @method     ChildLoginQuery orderByPromocode($order = Criteria::ASC) Order by the promocode column
 * @method     ChildLoginQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildLoginQuery groupBySessionid() Group by the sessionid column
 * @method     ChildLoginQuery groupByRecordno() Group by the recordno column
 * @method     ChildLoginQuery groupByDate() Group by the date column
 * @method     ChildLoginQuery groupByTime() Group by the time column
 * @method     ChildLoginQuery groupByCustid() Group by the custid column
 * @method     ChildLoginQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildLoginQuery groupByName() Group by the name column
 * @method     ChildLoginQuery groupByAddress1() Group by the address1 column
 * @method     ChildLoginQuery groupByAddress2() Group by the address2 column
 * @method     ChildLoginQuery groupByCity() Group by the city column
 * @method     ChildLoginQuery groupBySt() Group by the st column
 * @method     ChildLoginQuery groupByZip() Group by the zip column
 * @method     ChildLoginQuery groupByPhone() Group by the phone column
 * @method     ChildLoginQuery groupByEmail() Group by the email column
 * @method     ChildLoginQuery groupByContact() Group by the contact column
 * @method     ChildLoginQuery groupByValidlogin() Group by the validlogin column
 * @method     ChildLoginQuery groupByCconly() Group by the cconly column
 * @method     ChildLoginQuery groupByErmes() Group by the ermes column
 * @method     ChildLoginQuery groupByPasswd() Group by the passwd column
 * @method     ChildLoginQuery groupByCbi() Group by the cbi column
 * @method     ChildLoginQuery groupByMmn() Group by the mmn column
 * @method     ChildLoginQuery groupByCountry() Group by the country column
 * @method     ChildLoginQuery groupByType() Group by the type column
 * @method     ChildLoginQuery groupByAddress3() Group by the address3 column
 * @method     ChildLoginQuery groupByVpromo() Group by the vpromo column
 * @method     ChildLoginQuery groupByPromocode() Group by the promocode column
 * @method     ChildLoginQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildLoginQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLogin|null findOne(?ConnectionInterface $con = null) Return the first ChildLogin matching the query
 * @method     ChildLogin findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildLogin matching the query, or a new ChildLogin object populated from the query conditions when no match is found
 *
 * @method     ChildLogin|null findOneBySessionid(string $sessionid) Return the first ChildLogin filtered by the sessionid column
 * @method     ChildLogin|null findOneByRecordno(int $recordno) Return the first ChildLogin filtered by the recordno column
 * @method     ChildLogin|null findOneByDate(string $date) Return the first ChildLogin filtered by the date column
 * @method     ChildLogin|null findOneByTime(string $time) Return the first ChildLogin filtered by the time column
 * @method     ChildLogin|null findOneByCustid(string $custid) Return the first ChildLogin filtered by the custid column
 * @method     ChildLogin|null findOneByShiptoid(string $shiptoid) Return the first ChildLogin filtered by the shiptoid column
 * @method     ChildLogin|null findOneByName(string $name) Return the first ChildLogin filtered by the name column
 * @method     ChildLogin|null findOneByAddress1(string $address1) Return the first ChildLogin filtered by the address1 column
 * @method     ChildLogin|null findOneByAddress2(string $address2) Return the first ChildLogin filtered by the address2 column
 * @method     ChildLogin|null findOneByCity(string $city) Return the first ChildLogin filtered by the city column
 * @method     ChildLogin|null findOneBySt(string $st) Return the first ChildLogin filtered by the st column
 * @method     ChildLogin|null findOneByZip(string $zip) Return the first ChildLogin filtered by the zip column
 * @method     ChildLogin|null findOneByPhone(string $phone) Return the first ChildLogin filtered by the phone column
 * @method     ChildLogin|null findOneByEmail(string $email) Return the first ChildLogin filtered by the email column
 * @method     ChildLogin|null findOneByContact(string $contact) Return the first ChildLogin filtered by the contact column
 * @method     ChildLogin|null findOneByValidlogin(string $validlogin) Return the first ChildLogin filtered by the validlogin column
 * @method     ChildLogin|null findOneByCconly(string $cconly) Return the first ChildLogin filtered by the cconly column
 * @method     ChildLogin|null findOneByErmes(string $ermes) Return the first ChildLogin filtered by the ermes column
 * @method     ChildLogin|null findOneByPasswd(string $passwd) Return the first ChildLogin filtered by the passwd column
 * @method     ChildLogin|null findOneByCbi(string $cbi) Return the first ChildLogin filtered by the cbi column
 * @method     ChildLogin|null findOneByMmn(string $mmn) Return the first ChildLogin filtered by the mmn column
 * @method     ChildLogin|null findOneByCountry(string $country) Return the first ChildLogin filtered by the country column
 * @method     ChildLogin|null findOneByType(string $type) Return the first ChildLogin filtered by the type column
 * @method     ChildLogin|null findOneByAddress3(string $address3) Return the first ChildLogin filtered by the address3 column
 * @method     ChildLogin|null findOneByVpromo(string $vpromo) Return the first ChildLogin filtered by the vpromo column
 * @method     ChildLogin|null findOneByPromocode(string $promocode) Return the first ChildLogin filtered by the promocode column
 * @method     ChildLogin|null findOneByDummy(string $dummy) Return the first ChildLogin filtered by the dummy column
 *
 * @method     ChildLogin requirePk($key, ?ConnectionInterface $con = null) Return the ChildLogin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOne(?ConnectionInterface $con = null) Return the first ChildLogin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogin requireOneBySessionid(string $sessionid) Return the first ChildLogin filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByRecordno(int $recordno) Return the first ChildLogin filtered by the recordno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByDate(string $date) Return the first ChildLogin filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByTime(string $time) Return the first ChildLogin filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByCustid(string $custid) Return the first ChildLogin filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByShiptoid(string $shiptoid) Return the first ChildLogin filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByName(string $name) Return the first ChildLogin filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByAddress1(string $address1) Return the first ChildLogin filtered by the address1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByAddress2(string $address2) Return the first ChildLogin filtered by the address2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByCity(string $city) Return the first ChildLogin filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneBySt(string $st) Return the first ChildLogin filtered by the st column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByZip(string $zip) Return the first ChildLogin filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByPhone(string $phone) Return the first ChildLogin filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByEmail(string $email) Return the first ChildLogin filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByContact(string $contact) Return the first ChildLogin filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByValidlogin(string $validlogin) Return the first ChildLogin filtered by the validlogin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByCconly(string $cconly) Return the first ChildLogin filtered by the cconly column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByErmes(string $ermes) Return the first ChildLogin filtered by the ermes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByPasswd(string $passwd) Return the first ChildLogin filtered by the passwd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByCbi(string $cbi) Return the first ChildLogin filtered by the cbi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByMmn(string $mmn) Return the first ChildLogin filtered by the mmn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByCountry(string $country) Return the first ChildLogin filtered by the country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByType(string $type) Return the first ChildLogin filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByAddress3(string $address3) Return the first ChildLogin filtered by the address3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByVpromo(string $vpromo) Return the first ChildLogin filtered by the vpromo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByPromocode(string $promocode) Return the first ChildLogin filtered by the promocode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOneByDummy(string $dummy) Return the first ChildLogin filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogin[]|Collection find(?ConnectionInterface $con = null) Return ChildLogin objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildLogin> find(?ConnectionInterface $con = null) Return ChildLogin objects based on current ModelCriteria
 *
 * @method     ChildLogin[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildLogin objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildLogin> findBySessionid(string|array<string> $sessionid) Return ChildLogin objects filtered by the sessionid column
 * @method     ChildLogin[]|Collection findByRecordno(int|array<int> $recordno) Return ChildLogin objects filtered by the recordno column
 * @psalm-method Collection&\Traversable<ChildLogin> findByRecordno(int|array<int> $recordno) Return ChildLogin objects filtered by the recordno column
 * @method     ChildLogin[]|Collection findByDate(string|array<string> $date) Return ChildLogin objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildLogin> findByDate(string|array<string> $date) Return ChildLogin objects filtered by the date column
 * @method     ChildLogin[]|Collection findByTime(string|array<string> $time) Return ChildLogin objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildLogin> findByTime(string|array<string> $time) Return ChildLogin objects filtered by the time column
 * @method     ChildLogin[]|Collection findByCustid(string|array<string> $custid) Return ChildLogin objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildLogin> findByCustid(string|array<string> $custid) Return ChildLogin objects filtered by the custid column
 * @method     ChildLogin[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildLogin objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildLogin> findByShiptoid(string|array<string> $shiptoid) Return ChildLogin objects filtered by the shiptoid column
 * @method     ChildLogin[]|Collection findByName(string|array<string> $name) Return ChildLogin objects filtered by the name column
 * @psalm-method Collection&\Traversable<ChildLogin> findByName(string|array<string> $name) Return ChildLogin objects filtered by the name column
 * @method     ChildLogin[]|Collection findByAddress1(string|array<string> $address1) Return ChildLogin objects filtered by the address1 column
 * @psalm-method Collection&\Traversable<ChildLogin> findByAddress1(string|array<string> $address1) Return ChildLogin objects filtered by the address1 column
 * @method     ChildLogin[]|Collection findByAddress2(string|array<string> $address2) Return ChildLogin objects filtered by the address2 column
 * @psalm-method Collection&\Traversable<ChildLogin> findByAddress2(string|array<string> $address2) Return ChildLogin objects filtered by the address2 column
 * @method     ChildLogin[]|Collection findByCity(string|array<string> $city) Return ChildLogin objects filtered by the city column
 * @psalm-method Collection&\Traversable<ChildLogin> findByCity(string|array<string> $city) Return ChildLogin objects filtered by the city column
 * @method     ChildLogin[]|Collection findBySt(string|array<string> $st) Return ChildLogin objects filtered by the st column
 * @psalm-method Collection&\Traversable<ChildLogin> findBySt(string|array<string> $st) Return ChildLogin objects filtered by the st column
 * @method     ChildLogin[]|Collection findByZip(string|array<string> $zip) Return ChildLogin objects filtered by the zip column
 * @psalm-method Collection&\Traversable<ChildLogin> findByZip(string|array<string> $zip) Return ChildLogin objects filtered by the zip column
 * @method     ChildLogin[]|Collection findByPhone(string|array<string> $phone) Return ChildLogin objects filtered by the phone column
 * @psalm-method Collection&\Traversable<ChildLogin> findByPhone(string|array<string> $phone) Return ChildLogin objects filtered by the phone column
 * @method     ChildLogin[]|Collection findByEmail(string|array<string> $email) Return ChildLogin objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildLogin> findByEmail(string|array<string> $email) Return ChildLogin objects filtered by the email column
 * @method     ChildLogin[]|Collection findByContact(string|array<string> $contact) Return ChildLogin objects filtered by the contact column
 * @psalm-method Collection&\Traversable<ChildLogin> findByContact(string|array<string> $contact) Return ChildLogin objects filtered by the contact column
 * @method     ChildLogin[]|Collection findByValidlogin(string|array<string> $validlogin) Return ChildLogin objects filtered by the validlogin column
 * @psalm-method Collection&\Traversable<ChildLogin> findByValidlogin(string|array<string> $validlogin) Return ChildLogin objects filtered by the validlogin column
 * @method     ChildLogin[]|Collection findByCconly(string|array<string> $cconly) Return ChildLogin objects filtered by the cconly column
 * @psalm-method Collection&\Traversable<ChildLogin> findByCconly(string|array<string> $cconly) Return ChildLogin objects filtered by the cconly column
 * @method     ChildLogin[]|Collection findByErmes(string|array<string> $ermes) Return ChildLogin objects filtered by the ermes column
 * @psalm-method Collection&\Traversable<ChildLogin> findByErmes(string|array<string> $ermes) Return ChildLogin objects filtered by the ermes column
 * @method     ChildLogin[]|Collection findByPasswd(string|array<string> $passwd) Return ChildLogin objects filtered by the passwd column
 * @psalm-method Collection&\Traversable<ChildLogin> findByPasswd(string|array<string> $passwd) Return ChildLogin objects filtered by the passwd column
 * @method     ChildLogin[]|Collection findByCbi(string|array<string> $cbi) Return ChildLogin objects filtered by the cbi column
 * @psalm-method Collection&\Traversable<ChildLogin> findByCbi(string|array<string> $cbi) Return ChildLogin objects filtered by the cbi column
 * @method     ChildLogin[]|Collection findByMmn(string|array<string> $mmn) Return ChildLogin objects filtered by the mmn column
 * @psalm-method Collection&\Traversable<ChildLogin> findByMmn(string|array<string> $mmn) Return ChildLogin objects filtered by the mmn column
 * @method     ChildLogin[]|Collection findByCountry(string|array<string> $country) Return ChildLogin objects filtered by the country column
 * @psalm-method Collection&\Traversable<ChildLogin> findByCountry(string|array<string> $country) Return ChildLogin objects filtered by the country column
 * @method     ChildLogin[]|Collection findByType(string|array<string> $type) Return ChildLogin objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildLogin> findByType(string|array<string> $type) Return ChildLogin objects filtered by the type column
 * @method     ChildLogin[]|Collection findByAddress3(string|array<string> $address3) Return ChildLogin objects filtered by the address3 column
 * @psalm-method Collection&\Traversable<ChildLogin> findByAddress3(string|array<string> $address3) Return ChildLogin objects filtered by the address3 column
 * @method     ChildLogin[]|Collection findByVpromo(string|array<string> $vpromo) Return ChildLogin objects filtered by the vpromo column
 * @psalm-method Collection&\Traversable<ChildLogin> findByVpromo(string|array<string> $vpromo) Return ChildLogin objects filtered by the vpromo column
 * @method     ChildLogin[]|Collection findByPromocode(string|array<string> $promocode) Return ChildLogin objects filtered by the promocode column
 * @psalm-method Collection&\Traversable<ChildLogin> findByPromocode(string|array<string> $promocode) Return ChildLogin objects filtered by the promocode column
 * @method     ChildLogin[]|Collection findByDummy(string|array<string> $dummy) Return ChildLogin objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildLogin> findByDummy(string|array<string> $dummy) Return ChildLogin objects filtered by the dummy column
 *
 * @method     ChildLogin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildLogin> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class LoginQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Login', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildLoginQuery) {
            return $criteria;
        }
        $query = new ChildLoginQuery();
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
     * @return ChildLogin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLogin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recordno, date, time, custid, shiptoid, name, address1, address2, city, st, zip, phone, email, contact, validlogin, cconly, ermes, passwd, cbi, mmn, country, type, address3, vpromo, promocode, dummy FROM login WHERE sessionid = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLogin $obj */
            $obj = new ChildLogin();
            $obj->hydrate($row);
            LoginTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLogin|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $keys, Criteria::IN);

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

        $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $sessionid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the recordno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecordno(1234); // WHERE recordno = 1234
     * $query->filterByRecordno(array(12, 34)); // WHERE recordno IN (12, 34)
     * $query->filterByRecordno(array('min' => 12)); // WHERE recordno > 12
     * </code>
     *
     * @param mixed $recordno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRecordno($recordno = null, ?string $comparison = null)
    {
        if (is_array($recordno)) {
            $useMinMax = false;
            if (isset($recordno['min'])) {
                $this->addUsingAlias(LoginTableMap::COL_RECORDNO, $recordno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordno['max'])) {
                $this->addUsingAlias(LoginTableMap::COL_RECORDNO, $recordno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_RECORDNO, $recordno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE date LIKE '%fooValue%'
     * $query->filterByDate(['foo', 'bar']); // WHERE date IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $date The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDate($date = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_DATE, $date, $comparison);

        return $this;
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('fooValue');   // WHERE time = 'fooValue'
     * $query->filterByTime('%fooValue%', Criteria::LIKE); // WHERE time LIKE '%fooValue%'
     * $query->filterByTime(['foo', 'bar']); // WHERE time IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $time The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTime($time = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($time)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_CUSTID, $custid, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_SHIPTOID, $shiptoid, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_NAME, $name, $comparison);

        return $this;
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%', Criteria::LIKE); // WHERE address1 LIKE '%fooValue%'
     * $query->filterByAddress1(['foo', 'bar']); // WHERE address1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $address1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_ADDRESS1, $address1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%', Criteria::LIKE); // WHERE address2 LIKE '%fooValue%'
     * $query->filterByAddress2(['foo', 'bar']); // WHERE address2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $address2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_ADDRESS2, $address2, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_CITY, $city, $comparison);

        return $this;
    }

    /**
     * Filter the query on the st column
     *
     * Example usage:
     * <code>
     * $query->filterBySt('fooValue');   // WHERE st = 'fooValue'
     * $query->filterBySt('%fooValue%', Criteria::LIKE); // WHERE st LIKE '%fooValue%'
     * $query->filterBySt(['foo', 'bar']); // WHERE st IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $st The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySt($st = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($st)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_ST, $st, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_ZIP, $zip, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_PHONE, $phone, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_EMAIL, $email, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_CONTACT, $contact, $comparison);

        return $this;
    }

    /**
     * Filter the query on the validlogin column
     *
     * Example usage:
     * <code>
     * $query->filterByValidlogin('fooValue');   // WHERE validlogin = 'fooValue'
     * $query->filterByValidlogin('%fooValue%', Criteria::LIKE); // WHERE validlogin LIKE '%fooValue%'
     * $query->filterByValidlogin(['foo', 'bar']); // WHERE validlogin IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $validlogin The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByValidlogin($validlogin = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($validlogin)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_VALIDLOGIN, $validlogin, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cconly column
     *
     * Example usage:
     * <code>
     * $query->filterByCconly('fooValue');   // WHERE cconly = 'fooValue'
     * $query->filterByCconly('%fooValue%', Criteria::LIKE); // WHERE cconly LIKE '%fooValue%'
     * $query->filterByCconly(['foo', 'bar']); // WHERE cconly IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cconly The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCconly($cconly = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cconly)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_CCONLY, $cconly, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_ERMES, $ermes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the passwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPasswd('fooValue');   // WHERE passwd = 'fooValue'
     * $query->filterByPasswd('%fooValue%', Criteria::LIKE); // WHERE passwd LIKE '%fooValue%'
     * $query->filterByPasswd(['foo', 'bar']); // WHERE passwd IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $passwd The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPasswd($passwd = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passwd)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_PASSWD, $passwd, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cbi column
     *
     * Example usage:
     * <code>
     * $query->filterByCbi('fooValue');   // WHERE cbi = 'fooValue'
     * $query->filterByCbi('%fooValue%', Criteria::LIKE); // WHERE cbi LIKE '%fooValue%'
     * $query->filterByCbi(['foo', 'bar']); // WHERE cbi IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cbi The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCbi($cbi = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbi)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_CBI, $cbi, $comparison);

        return $this;
    }

    /**
     * Filter the query on the mmn column
     *
     * Example usage:
     * <code>
     * $query->filterByMmn('fooValue');   // WHERE mmn = 'fooValue'
     * $query->filterByMmn('%fooValue%', Criteria::LIKE); // WHERE mmn LIKE '%fooValue%'
     * $query->filterByMmn(['foo', 'bar']); // WHERE mmn IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $mmn The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMmn($mmn = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mmn)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_MMN, $mmn, $comparison);

        return $this;
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE country LIKE '%fooValue%'
     * $query->filterByCountry(['foo', 'bar']); // WHERE country IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $country The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCountry($country = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_COUNTRY, $country, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_TYPE, $type, $comparison);

        return $this;
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%', Criteria::LIKE); // WHERE address3 LIKE '%fooValue%'
     * $query->filterByAddress3(['foo', 'bar']); // WHERE address3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $address3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_ADDRESS3, $address3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vpromo column
     *
     * Example usage:
     * <code>
     * $query->filterByVpromo('fooValue');   // WHERE vpromo = 'fooValue'
     * $query->filterByVpromo('%fooValue%', Criteria::LIKE); // WHERE vpromo LIKE '%fooValue%'
     * $query->filterByVpromo(['foo', 'bar']); // WHERE vpromo IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vpromo The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVpromo($vpromo = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vpromo)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_VPROMO, $vpromo, $comparison);

        return $this;
    }

    /**
     * Filter the query on the promocode column
     *
     * Example usage:
     * <code>
     * $query->filterByPromocode('fooValue');   // WHERE promocode = 'fooValue'
     * $query->filterByPromocode('%fooValue%', Criteria::LIKE); // WHERE promocode LIKE '%fooValue%'
     * $query->filterByPromocode(['foo', 'bar']); // WHERE promocode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $promocode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPromocode($promocode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($promocode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LoginTableMap::COL_PROMOCODE, $promocode, $comparison);

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

        $this->addUsingAlias(LoginTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildLogin $login Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($login = null)
    {
        if ($login) {
            $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $login->getSessionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginTableMap::clearInstancePool();
            LoginTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
