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
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login' table.
 *
 *
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
 * @method     ChildLogin findOne(ConnectionInterface $con = null) Return the first ChildLogin matching the query
 * @method     ChildLogin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLogin matching the query, or a new ChildLogin object populated from the query conditions when no match is found
 *
 * @method     ChildLogin findOneBySessionid(string $sessionid) Return the first ChildLogin filtered by the sessionid column
 * @method     ChildLogin findOneByRecordno(int $recordno) Return the first ChildLogin filtered by the recordno column
 * @method     ChildLogin findOneByDate(string $date) Return the first ChildLogin filtered by the date column
 * @method     ChildLogin findOneByTime(string $time) Return the first ChildLogin filtered by the time column
 * @method     ChildLogin findOneByCustid(string $custid) Return the first ChildLogin filtered by the custid column
 * @method     ChildLogin findOneByShiptoid(string $shiptoid) Return the first ChildLogin filtered by the shiptoid column
 * @method     ChildLogin findOneByName(string $name) Return the first ChildLogin filtered by the name column
 * @method     ChildLogin findOneByAddress1(string $address1) Return the first ChildLogin filtered by the address1 column
 * @method     ChildLogin findOneByAddress2(string $address2) Return the first ChildLogin filtered by the address2 column
 * @method     ChildLogin findOneByCity(string $city) Return the first ChildLogin filtered by the city column
 * @method     ChildLogin findOneBySt(string $st) Return the first ChildLogin filtered by the st column
 * @method     ChildLogin findOneByZip(string $zip) Return the first ChildLogin filtered by the zip column
 * @method     ChildLogin findOneByPhone(string $phone) Return the first ChildLogin filtered by the phone column
 * @method     ChildLogin findOneByEmail(string $email) Return the first ChildLogin filtered by the email column
 * @method     ChildLogin findOneByContact(string $contact) Return the first ChildLogin filtered by the contact column
 * @method     ChildLogin findOneByValidlogin(string $validlogin) Return the first ChildLogin filtered by the validlogin column
 * @method     ChildLogin findOneByCconly(string $cconly) Return the first ChildLogin filtered by the cconly column
 * @method     ChildLogin findOneByErmes(string $ermes) Return the first ChildLogin filtered by the ermes column
 * @method     ChildLogin findOneByPasswd(string $passwd) Return the first ChildLogin filtered by the passwd column
 * @method     ChildLogin findOneByCbi(string $cbi) Return the first ChildLogin filtered by the cbi column
 * @method     ChildLogin findOneByMmn(string $mmn) Return the first ChildLogin filtered by the mmn column
 * @method     ChildLogin findOneByCountry(string $country) Return the first ChildLogin filtered by the country column
 * @method     ChildLogin findOneByType(string $type) Return the first ChildLogin filtered by the type column
 * @method     ChildLogin findOneByAddress3(string $address3) Return the first ChildLogin filtered by the address3 column
 * @method     ChildLogin findOneByVpromo(string $vpromo) Return the first ChildLogin filtered by the vpromo column
 * @method     ChildLogin findOneByPromocode(string $promocode) Return the first ChildLogin filtered by the promocode column
 * @method     ChildLogin findOneByDummy(string $dummy) Return the first ChildLogin filtered by the dummy column *

 * @method     ChildLogin requirePk($key, ConnectionInterface $con = null) Return the ChildLogin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogin requireOne(ConnectionInterface $con = null) Return the first ChildLogin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
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
 * @method     ChildLogin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLogin objects based on current ModelCriteria
 * @method     ChildLogin[]|ObjectCollection findBySessionid(string $sessionid) Return ChildLogin objects filtered by the sessionid column
 * @method     ChildLogin[]|ObjectCollection findByRecordno(int $recordno) Return ChildLogin objects filtered by the recordno column
 * @method     ChildLogin[]|ObjectCollection findByDate(string $date) Return ChildLogin objects filtered by the date column
 * @method     ChildLogin[]|ObjectCollection findByTime(string $time) Return ChildLogin objects filtered by the time column
 * @method     ChildLogin[]|ObjectCollection findByCustid(string $custid) Return ChildLogin objects filtered by the custid column
 * @method     ChildLogin[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildLogin objects filtered by the shiptoid column
 * @method     ChildLogin[]|ObjectCollection findByName(string $name) Return ChildLogin objects filtered by the name column
 * @method     ChildLogin[]|ObjectCollection findByAddress1(string $address1) Return ChildLogin objects filtered by the address1 column
 * @method     ChildLogin[]|ObjectCollection findByAddress2(string $address2) Return ChildLogin objects filtered by the address2 column
 * @method     ChildLogin[]|ObjectCollection findByCity(string $city) Return ChildLogin objects filtered by the city column
 * @method     ChildLogin[]|ObjectCollection findBySt(string $st) Return ChildLogin objects filtered by the st column
 * @method     ChildLogin[]|ObjectCollection findByZip(string $zip) Return ChildLogin objects filtered by the zip column
 * @method     ChildLogin[]|ObjectCollection findByPhone(string $phone) Return ChildLogin objects filtered by the phone column
 * @method     ChildLogin[]|ObjectCollection findByEmail(string $email) Return ChildLogin objects filtered by the email column
 * @method     ChildLogin[]|ObjectCollection findByContact(string $contact) Return ChildLogin objects filtered by the contact column
 * @method     ChildLogin[]|ObjectCollection findByValidlogin(string $validlogin) Return ChildLogin objects filtered by the validlogin column
 * @method     ChildLogin[]|ObjectCollection findByCconly(string $cconly) Return ChildLogin objects filtered by the cconly column
 * @method     ChildLogin[]|ObjectCollection findByErmes(string $ermes) Return ChildLogin objects filtered by the ermes column
 * @method     ChildLogin[]|ObjectCollection findByPasswd(string $passwd) Return ChildLogin objects filtered by the passwd column
 * @method     ChildLogin[]|ObjectCollection findByCbi(string $cbi) Return ChildLogin objects filtered by the cbi column
 * @method     ChildLogin[]|ObjectCollection findByMmn(string $mmn) Return ChildLogin objects filtered by the mmn column
 * @method     ChildLogin[]|ObjectCollection findByCountry(string $country) Return ChildLogin objects filtered by the country column
 * @method     ChildLogin[]|ObjectCollection findByType(string $type) Return ChildLogin objects filtered by the type column
 * @method     ChildLogin[]|ObjectCollection findByAddress3(string $address3) Return ChildLogin objects filtered by the address3 column
 * @method     ChildLogin[]|ObjectCollection findByVpromo(string $vpromo) Return ChildLogin objects filtered by the vpromo column
 * @method     ChildLogin[]|ObjectCollection findByPromocode(string $promocode) Return ChildLogin objects filtered by the promocode column
 * @method     ChildLogin[]|ObjectCollection findByDummy(string $dummy) Return ChildLogin objects filtered by the dummy column
 * @method     ChildLogin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Login', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
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
    public function findPk($key, ConnectionInterface $con = null)
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
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
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
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $keys, Criteria::IN);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @param     mixed $recordno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByRecordno($recordno = null, $comparison = null)
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

        return $this->addUsingAlias(LoginTableMap::COL_RECORDNO, $recordno, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $date The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('fooValue');   // WHERE time = 'fooValue'
     * $query->filterByTime('%fooValue%', Criteria::LIKE); // WHERE time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $time The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($time)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%', Criteria::LIKE); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%', Criteria::LIKE); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the st column
     *
     * Example usage:
     * <code>
     * $query->filterBySt('fooValue');   // WHERE st = 'fooValue'
     * $query->filterBySt('%fooValue%', Criteria::LIKE); // WHERE st LIKE '%fooValue%'
     * </code>
     *
     * @param     string $st The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterBySt($st = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($st)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_ST, $st, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_ZIP, $zip, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_PHONE, $phone, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the validlogin column
     *
     * Example usage:
     * <code>
     * $query->filterByValidlogin('fooValue');   // WHERE validlogin = 'fooValue'
     * $query->filterByValidlogin('%fooValue%', Criteria::LIKE); // WHERE validlogin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $validlogin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByValidlogin($validlogin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($validlogin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_VALIDLOGIN, $validlogin, $comparison);
    }

    /**
     * Filter the query on the cconly column
     *
     * Example usage:
     * <code>
     * $query->filterByCconly('fooValue');   // WHERE cconly = 'fooValue'
     * $query->filterByCconly('%fooValue%', Criteria::LIKE); // WHERE cconly LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cconly The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByCconly($cconly = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cconly)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_CCONLY, $cconly, $comparison);
    }

    /**
     * Filter the query on the ermes column
     *
     * Example usage:
     * <code>
     * $query->filterByErmes('fooValue');   // WHERE ermes = 'fooValue'
     * $query->filterByErmes('%fooValue%', Criteria::LIKE); // WHERE ermes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ermes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByErmes($ermes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ermes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_ERMES, $ermes, $comparison);
    }

    /**
     * Filter the query on the passwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPasswd('fooValue');   // WHERE passwd = 'fooValue'
     * $query->filterByPasswd('%fooValue%', Criteria::LIKE); // WHERE passwd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $passwd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPasswd($passwd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passwd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_PASSWD, $passwd, $comparison);
    }

    /**
     * Filter the query on the cbi column
     *
     * Example usage:
     * <code>
     * $query->filterByCbi('fooValue');   // WHERE cbi = 'fooValue'
     * $query->filterByCbi('%fooValue%', Criteria::LIKE); // WHERE cbi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cbi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByCbi($cbi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_CBI, $cbi, $comparison);
    }

    /**
     * Filter the query on the mmn column
     *
     * Example usage:
     * <code>
     * $query->filterByMmn('fooValue');   // WHERE mmn = 'fooValue'
     * $query->filterByMmn('%fooValue%', Criteria::LIKE); // WHERE mmn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mmn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByMmn($mmn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mmn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_MMN, $mmn, $comparison);
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_COUNTRY, $country, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%', Criteria::LIKE); // WHERE address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_ADDRESS3, $address3, $comparison);
    }

    /**
     * Filter the query on the vpromo column
     *
     * Example usage:
     * <code>
     * $query->filterByVpromo('fooValue');   // WHERE vpromo = 'fooValue'
     * $query->filterByVpromo('%fooValue%', Criteria::LIKE); // WHERE vpromo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vpromo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByVpromo($vpromo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vpromo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_VPROMO, $vpromo, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByPromocode($promocode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($promocode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_PROMOCODE, $promocode, $comparison);
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
     * @return $this|ChildLoginQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLogin $login Object to remove from the list of results
     *
     * @return $this|ChildLoginQuery The current query, for fluid interface
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
    public function doDeleteAll(ConnectionInterface $con = null)
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
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
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

} // LoginQuery
