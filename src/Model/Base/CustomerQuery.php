<?php

namespace Base;

use \Customer as ChildCustomer;
use \CustomerQuery as ChildCustomerQuery;
use \Exception;
use \PDO;
use Map\CustomerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'customer' table.
 *
 *
 *
 * @method     ChildCustomerQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCustomerQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCustomerQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCustomerQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCustomerQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCustomerQuery orderByCustname($order = Criteria::ASC) Order by the custname column
 * @method     ChildCustomerQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildCustomerQuery orderByCaddress2($order = Criteria::ASC) Order by the caddress2 column
 * @method     ChildCustomerQuery orderByCaddress3($order = Criteria::ASC) Order by the caddress3 column
 * @method     ChildCustomerQuery orderByCcity($order = Criteria::ASC) Order by the ccity column
 * @method     ChildCustomerQuery orderByCst($order = Criteria::ASC) Order by the cst column
 * @method     ChildCustomerQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildCustomerQuery orderByCcountry($order = Criteria::ASC) Order by the ccountry column
 * @method     ChildCustomerQuery orderByCphone($order = Criteria::ASC) Order by the cphone column
 * @method     ChildCustomerQuery orderByCsalesrep($order = Criteria::ASC) Order by the csalesrep column
 * @method     ChildCustomerQuery orderByCsalesrepname($order = Criteria::ASC) Order by the csalesrepname column
 * @method     ChildCustomerQuery orderByCtype($order = Criteria::ASC) Order by the ctype column
 * @method     ChildCustomerQuery orderByNbrshipto($order = Criteria::ASC) Order by the nbrshipto column
 * @method     ChildCustomerQuery orderByDateentered($order = Criteria::ASC) Order by the dateentered column
 * @method     ChildCustomerQuery orderByLastsaledate($order = Criteria::ASC) Order by the lastsaledate column
 * @method     ChildCustomerQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildCustomerQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCustomerQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCustomerQuery groupByRecno() Group by the recno column
 * @method     ChildCustomerQuery groupByDate() Group by the date column
 * @method     ChildCustomerQuery groupByTime() Group by the time column
 * @method     ChildCustomerQuery groupByCustid() Group by the custid column
 * @method     ChildCustomerQuery groupByCustname() Group by the custname column
 * @method     ChildCustomerQuery groupByCaddress() Group by the caddress column
 * @method     ChildCustomerQuery groupByCaddress2() Group by the caddress2 column
 * @method     ChildCustomerQuery groupByCaddress3() Group by the caddress3 column
 * @method     ChildCustomerQuery groupByCcity() Group by the ccity column
 * @method     ChildCustomerQuery groupByCst() Group by the cst column
 * @method     ChildCustomerQuery groupByCzip() Group by the czip column
 * @method     ChildCustomerQuery groupByCcountry() Group by the ccountry column
 * @method     ChildCustomerQuery groupByCphone() Group by the cphone column
 * @method     ChildCustomerQuery groupByCsalesrep() Group by the csalesrep column
 * @method     ChildCustomerQuery groupByCsalesrepname() Group by the csalesrepname column
 * @method     ChildCustomerQuery groupByCtype() Group by the ctype column
 * @method     ChildCustomerQuery groupByNbrshipto() Group by the nbrshipto column
 * @method     ChildCustomerQuery groupByDateentered() Group by the dateentered column
 * @method     ChildCustomerQuery groupByLastsaledate() Group by the lastsaledate column
 * @method     ChildCustomerQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildCustomerQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustomerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustomerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustomerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustomer findOne(ConnectionInterface $con = null) Return the first ChildCustomer matching the query
 * @method     ChildCustomer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustomer matching the query, or a new ChildCustomer object populated from the query conditions when no match is found
 *
 * @method     ChildCustomer findOneBySessionid(string $sessionid) Return the first ChildCustomer filtered by the sessionid column
 * @method     ChildCustomer findOneByRecno(int $recno) Return the first ChildCustomer filtered by the recno column
 * @method     ChildCustomer findOneByDate(int $date) Return the first ChildCustomer filtered by the date column
 * @method     ChildCustomer findOneByTime(int $time) Return the first ChildCustomer filtered by the time column
 * @method     ChildCustomer findOneByCustid(string $custid) Return the first ChildCustomer filtered by the custid column
 * @method     ChildCustomer findOneByCustname(string $custname) Return the first ChildCustomer filtered by the custname column
 * @method     ChildCustomer findOneByCaddress(string $caddress) Return the first ChildCustomer filtered by the caddress column
 * @method     ChildCustomer findOneByCaddress2(string $caddress2) Return the first ChildCustomer filtered by the caddress2 column
 * @method     ChildCustomer findOneByCaddress3(string $caddress3) Return the first ChildCustomer filtered by the caddress3 column
 * @method     ChildCustomer findOneByCcity(string $ccity) Return the first ChildCustomer filtered by the ccity column
 * @method     ChildCustomer findOneByCst(string $cst) Return the first ChildCustomer filtered by the cst column
 * @method     ChildCustomer findOneByCzip(string $czip) Return the first ChildCustomer filtered by the czip column
 * @method     ChildCustomer findOneByCcountry(string $ccountry) Return the first ChildCustomer filtered by the ccountry column
 * @method     ChildCustomer findOneByCphone(string $cphone) Return the first ChildCustomer filtered by the cphone column
 * @method     ChildCustomer findOneByCsalesrep(string $csalesrep) Return the first ChildCustomer filtered by the csalesrep column
 * @method     ChildCustomer findOneByCsalesrepname(string $csalesrepname) Return the first ChildCustomer filtered by the csalesrepname column
 * @method     ChildCustomer findOneByCtype(string $ctype) Return the first ChildCustomer filtered by the ctype column
 * @method     ChildCustomer findOneByNbrshipto(int $nbrshipto) Return the first ChildCustomer filtered by the nbrshipto column
 * @method     ChildCustomer findOneByDateentered(string $dateentered) Return the first ChildCustomer filtered by the dateentered column
 * @method     ChildCustomer findOneByLastsaledate(string $lastsaledate) Return the first ChildCustomer filtered by the lastsaledate column
 * @method     ChildCustomer findOneByErrormsg(string $errormsg) Return the first ChildCustomer filtered by the errormsg column
 * @method     ChildCustomer findOneByDummy(string $dummy) Return the first ChildCustomer filtered by the dummy column *

 * @method     ChildCustomer requirePk($key, ConnectionInterface $con = null) Return the ChildCustomer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOne(ConnectionInterface $con = null) Return the first ChildCustomer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustomer requireOneBySessionid(string $sessionid) Return the first ChildCustomer filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByRecno(int $recno) Return the first ChildCustomer filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByDate(int $date) Return the first ChildCustomer filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByTime(int $time) Return the first ChildCustomer filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCustid(string $custid) Return the first ChildCustomer filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCustname(string $custname) Return the first ChildCustomer filtered by the custname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCaddress(string $caddress) Return the first ChildCustomer filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCaddress2(string $caddress2) Return the first ChildCustomer filtered by the caddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCaddress3(string $caddress3) Return the first ChildCustomer filtered by the caddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCcity(string $ccity) Return the first ChildCustomer filtered by the ccity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCst(string $cst) Return the first ChildCustomer filtered by the cst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCzip(string $czip) Return the first ChildCustomer filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCcountry(string $ccountry) Return the first ChildCustomer filtered by the ccountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCphone(string $cphone) Return the first ChildCustomer filtered by the cphone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCsalesrep(string $csalesrep) Return the first ChildCustomer filtered by the csalesrep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCsalesrepname(string $csalesrepname) Return the first ChildCustomer filtered by the csalesrepname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByCtype(string $ctype) Return the first ChildCustomer filtered by the ctype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByNbrshipto(int $nbrshipto) Return the first ChildCustomer filtered by the nbrshipto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByDateentered(string $dateentered) Return the first ChildCustomer filtered by the dateentered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByLastsaledate(string $lastsaledate) Return the first ChildCustomer filtered by the lastsaledate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByErrormsg(string $errormsg) Return the first ChildCustomer filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomer requireOneByDummy(string $dummy) Return the first ChildCustomer filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustomer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCustomer objects based on current ModelCriteria
 * @method     ChildCustomer[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCustomer objects filtered by the sessionid column
 * @method     ChildCustomer[]|ObjectCollection findByRecno(int $recno) Return ChildCustomer objects filtered by the recno column
 * @method     ChildCustomer[]|ObjectCollection findByDate(int $date) Return ChildCustomer objects filtered by the date column
 * @method     ChildCustomer[]|ObjectCollection findByTime(int $time) Return ChildCustomer objects filtered by the time column
 * @method     ChildCustomer[]|ObjectCollection findByCustid(string $custid) Return ChildCustomer objects filtered by the custid column
 * @method     ChildCustomer[]|ObjectCollection findByCustname(string $custname) Return ChildCustomer objects filtered by the custname column
 * @method     ChildCustomer[]|ObjectCollection findByCaddress(string $caddress) Return ChildCustomer objects filtered by the caddress column
 * @method     ChildCustomer[]|ObjectCollection findByCaddress2(string $caddress2) Return ChildCustomer objects filtered by the caddress2 column
 * @method     ChildCustomer[]|ObjectCollection findByCaddress3(string $caddress3) Return ChildCustomer objects filtered by the caddress3 column
 * @method     ChildCustomer[]|ObjectCollection findByCcity(string $ccity) Return ChildCustomer objects filtered by the ccity column
 * @method     ChildCustomer[]|ObjectCollection findByCst(string $cst) Return ChildCustomer objects filtered by the cst column
 * @method     ChildCustomer[]|ObjectCollection findByCzip(string $czip) Return ChildCustomer objects filtered by the czip column
 * @method     ChildCustomer[]|ObjectCollection findByCcountry(string $ccountry) Return ChildCustomer objects filtered by the ccountry column
 * @method     ChildCustomer[]|ObjectCollection findByCphone(string $cphone) Return ChildCustomer objects filtered by the cphone column
 * @method     ChildCustomer[]|ObjectCollection findByCsalesrep(string $csalesrep) Return ChildCustomer objects filtered by the csalesrep column
 * @method     ChildCustomer[]|ObjectCollection findByCsalesrepname(string $csalesrepname) Return ChildCustomer objects filtered by the csalesrepname column
 * @method     ChildCustomer[]|ObjectCollection findByCtype(string $ctype) Return ChildCustomer objects filtered by the ctype column
 * @method     ChildCustomer[]|ObjectCollection findByNbrshipto(int $nbrshipto) Return ChildCustomer objects filtered by the nbrshipto column
 * @method     ChildCustomer[]|ObjectCollection findByDateentered(string $dateentered) Return ChildCustomer objects filtered by the dateentered column
 * @method     ChildCustomer[]|ObjectCollection findByLastsaledate(string $lastsaledate) Return ChildCustomer objects filtered by the lastsaledate column
 * @method     ChildCustomer[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildCustomer objects filtered by the errormsg column
 * @method     ChildCustomer[]|ObjectCollection findByDummy(string $dummy) Return ChildCustomer objects filtered by the dummy column
 * @method     ChildCustomer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CustomerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustomerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Customer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustomerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCustomerQuery) {
            return $criteria;
        }
        $query = new ChildCustomerQuery();
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
     * @return ChildCustomer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustomerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustomerTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCustomer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, custid, custname, caddress, caddress2, caddress3, ccity, cst, czip, ccountry, cphone, csalesrep, csalesrepname, ctype, nbrshipto, dateentered, lastsaledate, errormsg, dummy FROM customer WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildCustomer $obj */
            $obj = new ChildCustomer();
            $obj->hydrate($row);
            CustomerTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCustomer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustomerTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustomerTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustomerTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustomerTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCustname($custname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CUSTNAME, $custname, $comparison);
    }

    /**
     * Filter the query on the caddress column
     *
     * Example usage:
     * <code>
     * $query->filterByCaddress('fooValue');   // WHERE caddress = 'fooValue'
     * $query->filterByCaddress('%fooValue%', Criteria::LIKE); // WHERE caddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $caddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CADDRESS, $caddress, $comparison);
    }

    /**
     * Filter the query on the caddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCaddress2('fooValue');   // WHERE caddress2 = 'fooValue'
     * $query->filterByCaddress2('%fooValue%', Criteria::LIKE); // WHERE caddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $caddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCaddress2($caddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CADDRESS2, $caddress2, $comparison);
    }

    /**
     * Filter the query on the caddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCaddress3('fooValue');   // WHERE caddress3 = 'fooValue'
     * $query->filterByCaddress3('%fooValue%', Criteria::LIKE); // WHERE caddress3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $caddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCaddress3($caddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CADDRESS3, $caddress3, $comparison);
    }

    /**
     * Filter the query on the ccity column
     *
     * Example usage:
     * <code>
     * $query->filterByCcity('fooValue');   // WHERE ccity = 'fooValue'
     * $query->filterByCcity('%fooValue%', Criteria::LIKE); // WHERE ccity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCcity($ccity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CCITY, $ccity, $comparison);
    }

    /**
     * Filter the query on the cst column
     *
     * Example usage:
     * <code>
     * $query->filterByCst('fooValue');   // WHERE cst = 'fooValue'
     * $query->filterByCst('%fooValue%', Criteria::LIKE); // WHERE cst LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cst The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCst($cst = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cst)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CST, $cst, $comparison);
    }

    /**
     * Filter the query on the czip column
     *
     * Example usage:
     * <code>
     * $query->filterByCzip('fooValue');   // WHERE czip = 'fooValue'
     * $query->filterByCzip('%fooValue%', Criteria::LIKE); // WHERE czip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $czip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CZIP, $czip, $comparison);
    }

    /**
     * Filter the query on the ccountry column
     *
     * Example usage:
     * <code>
     * $query->filterByCcountry('fooValue');   // WHERE ccountry = 'fooValue'
     * $query->filterByCcountry('%fooValue%', Criteria::LIKE); // WHERE ccountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCcountry($ccountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CCOUNTRY, $ccountry, $comparison);
    }

    /**
     * Filter the query on the cphone column
     *
     * Example usage:
     * <code>
     * $query->filterByCphone('fooValue');   // WHERE cphone = 'fooValue'
     * $query->filterByCphone('%fooValue%', Criteria::LIKE); // WHERE cphone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cphone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCphone($cphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cphone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CPHONE, $cphone, $comparison);
    }

    /**
     * Filter the query on the csalesrep column
     *
     * Example usage:
     * <code>
     * $query->filterByCsalesrep('fooValue');   // WHERE csalesrep = 'fooValue'
     * $query->filterByCsalesrep('%fooValue%', Criteria::LIKE); // WHERE csalesrep LIKE '%fooValue%'
     * </code>
     *
     * @param     string $csalesrep The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCsalesrep($csalesrep = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csalesrep)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CSALESREP, $csalesrep, $comparison);
    }

    /**
     * Filter the query on the csalesrepname column
     *
     * Example usage:
     * <code>
     * $query->filterByCsalesrepname('fooValue');   // WHERE csalesrepname = 'fooValue'
     * $query->filterByCsalesrepname('%fooValue%', Criteria::LIKE); // WHERE csalesrepname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $csalesrepname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCsalesrepname($csalesrepname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csalesrepname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CSALESREPNAME, $csalesrepname, $comparison);
    }

    /**
     * Filter the query on the ctype column
     *
     * Example usage:
     * <code>
     * $query->filterByCtype('fooValue');   // WHERE ctype = 'fooValue'
     * $query->filterByCtype('%fooValue%', Criteria::LIKE); // WHERE ctype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ctype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByCtype($ctype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ctype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_CTYPE, $ctype, $comparison);
    }

    /**
     * Filter the query on the nbrshipto column
     *
     * Example usage:
     * <code>
     * $query->filterByNbrshipto(1234); // WHERE nbrshipto = 1234
     * $query->filterByNbrshipto(array(12, 34)); // WHERE nbrshipto IN (12, 34)
     * $query->filterByNbrshipto(array('min' => 12)); // WHERE nbrshipto > 12
     * </code>
     *
     * @param     mixed $nbrshipto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByNbrshipto($nbrshipto = null, $comparison = null)
    {
        if (is_array($nbrshipto)) {
            $useMinMax = false;
            if (isset($nbrshipto['min'])) {
                $this->addUsingAlias(CustomerTableMap::COL_NBRSHIPTO, $nbrshipto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nbrshipto['max'])) {
                $this->addUsingAlias(CustomerTableMap::COL_NBRSHIPTO, $nbrshipto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_NBRSHIPTO, $nbrshipto, $comparison);
    }

    /**
     * Filter the query on the dateentered column
     *
     * Example usage:
     * <code>
     * $query->filterByDateentered('fooValue');   // WHERE dateentered = 'fooValue'
     * $query->filterByDateentered('%fooValue%', Criteria::LIKE); // WHERE dateentered LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateentered The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByDateentered($dateentered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateentered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_DATEENTERED, $dateentered, $comparison);
    }

    /**
     * Filter the query on the lastsaledate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastsaledate('fooValue');   // WHERE lastsaledate = 'fooValue'
     * $query->filterByLastsaledate('%fooValue%', Criteria::LIKE); // WHERE lastsaledate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastsaledate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByLastsaledate($lastsaledate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastsaledate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_LASTSALEDATE, $lastsaledate, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_ERRORMSG, $errormsg, $comparison);
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
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustomer $customer Object to remove from the list of results
     *
     * @return $this|ChildCustomerQuery The current query, for fluid interface
     */
    public function prune($customer = null)
    {
        if ($customer) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustomerTableMap::COL_SESSIONID), $customer->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustomerTableMap::COL_RECNO), $customer->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustomerTableMap::clearInstancePool();
            CustomerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustomerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustomerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustomerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CustomerQuery
