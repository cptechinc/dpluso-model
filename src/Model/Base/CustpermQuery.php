<?php

namespace Base;

use \Custperm as ChildCustperm;
use \CustpermQuery as ChildCustpermQuery;
use \Exception;
use \PDO;
use Map\CustpermTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `custperm` table.
 *
 * @method     ChildCustpermQuery orderByLoginid($order = Criteria::ASC) Order by the loginid column
 * @method     ChildCustpermQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCustpermQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildCustpermQuery orderBySalesper1($order = Criteria::ASC) Order by the salesper1 column
 * @method     ChildCustpermQuery orderByRestrictaccess($order = Criteria::ASC) Order by the restrictaccess column
 * @method     ChildCustpermQuery orderByAmountsold($order = Criteria::ASC) Order by the amountsold column
 * @method     ChildCustpermQuery orderByTimesold($order = Criteria::ASC) Order by the timesold column
 * @method     ChildCustpermQuery orderByLastsaledate($order = Criteria::ASC) Order by the lastsaledate column
 * @method     ChildCustpermQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCustpermQuery groupByLoginid() Group by the loginid column
 * @method     ChildCustpermQuery groupByCustid() Group by the custid column
 * @method     ChildCustpermQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildCustpermQuery groupBySalesper1() Group by the salesper1 column
 * @method     ChildCustpermQuery groupByRestrictaccess() Group by the restrictaccess column
 * @method     ChildCustpermQuery groupByAmountsold() Group by the amountsold column
 * @method     ChildCustpermQuery groupByTimesold() Group by the timesold column
 * @method     ChildCustpermQuery groupByLastsaledate() Group by the lastsaledate column
 * @method     ChildCustpermQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCustpermQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustpermQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustpermQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustpermQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustpermQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustpermQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustperm|null findOne(?ConnectionInterface $con = null) Return the first ChildCustperm matching the query
 * @method     ChildCustperm findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCustperm matching the query, or a new ChildCustperm object populated from the query conditions when no match is found
 *
 * @method     ChildCustperm|null findOneByLoginid(string $loginid) Return the first ChildCustperm filtered by the loginid column
 * @method     ChildCustperm|null findOneByCustid(string $custid) Return the first ChildCustperm filtered by the custid column
 * @method     ChildCustperm|null findOneByShiptoid(string $shiptoid) Return the first ChildCustperm filtered by the shiptoid column
 * @method     ChildCustperm|null findOneBySalesper1(string $salesper1) Return the first ChildCustperm filtered by the salesper1 column
 * @method     ChildCustperm|null findOneByRestrictaccess(string $restrictaccess) Return the first ChildCustperm filtered by the restrictaccess column
 * @method     ChildCustperm|null findOneByAmountsold(string $amountsold) Return the first ChildCustperm filtered by the amountsold column
 * @method     ChildCustperm|null findOneByTimesold(int $timesold) Return the first ChildCustperm filtered by the timesold column
 * @method     ChildCustperm|null findOneByLastsaledate(int $lastsaledate) Return the first ChildCustperm filtered by the lastsaledate column
 * @method     ChildCustperm|null findOneByDummy(string $dummy) Return the first ChildCustperm filtered by the dummy column
 *
 * @method     ChildCustperm requirePk($key, ?ConnectionInterface $con = null) Return the ChildCustperm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOne(?ConnectionInterface $con = null) Return the first ChildCustperm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustperm requireOneByLoginid(string $loginid) Return the first ChildCustperm filtered by the loginid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByCustid(string $custid) Return the first ChildCustperm filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByShiptoid(string $shiptoid) Return the first ChildCustperm filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneBySalesper1(string $salesper1) Return the first ChildCustperm filtered by the salesper1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByRestrictaccess(string $restrictaccess) Return the first ChildCustperm filtered by the restrictaccess column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByAmountsold(string $amountsold) Return the first ChildCustperm filtered by the amountsold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByTimesold(int $timesold) Return the first ChildCustperm filtered by the timesold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByLastsaledate(int $lastsaledate) Return the first ChildCustperm filtered by the lastsaledate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustperm requireOneByDummy(string $dummy) Return the first ChildCustperm filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustperm[]|Collection find(?ConnectionInterface $con = null) Return ChildCustperm objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCustperm> find(?ConnectionInterface $con = null) Return ChildCustperm objects based on current ModelCriteria
 *
 * @method     ChildCustperm[]|Collection findByLoginid(string|array<string> $loginid) Return ChildCustperm objects filtered by the loginid column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByLoginid(string|array<string> $loginid) Return ChildCustperm objects filtered by the loginid column
 * @method     ChildCustperm[]|Collection findByCustid(string|array<string> $custid) Return ChildCustperm objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByCustid(string|array<string> $custid) Return ChildCustperm objects filtered by the custid column
 * @method     ChildCustperm[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildCustperm objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByShiptoid(string|array<string> $shiptoid) Return ChildCustperm objects filtered by the shiptoid column
 * @method     ChildCustperm[]|Collection findBySalesper1(string|array<string> $salesper1) Return ChildCustperm objects filtered by the salesper1 column
 * @psalm-method Collection&\Traversable<ChildCustperm> findBySalesper1(string|array<string> $salesper1) Return ChildCustperm objects filtered by the salesper1 column
 * @method     ChildCustperm[]|Collection findByRestrictaccess(string|array<string> $restrictaccess) Return ChildCustperm objects filtered by the restrictaccess column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByRestrictaccess(string|array<string> $restrictaccess) Return ChildCustperm objects filtered by the restrictaccess column
 * @method     ChildCustperm[]|Collection findByAmountsold(string|array<string> $amountsold) Return ChildCustperm objects filtered by the amountsold column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByAmountsold(string|array<string> $amountsold) Return ChildCustperm objects filtered by the amountsold column
 * @method     ChildCustperm[]|Collection findByTimesold(int|array<int> $timesold) Return ChildCustperm objects filtered by the timesold column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByTimesold(int|array<int> $timesold) Return ChildCustperm objects filtered by the timesold column
 * @method     ChildCustperm[]|Collection findByLastsaledate(int|array<int> $lastsaledate) Return ChildCustperm objects filtered by the lastsaledate column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByLastsaledate(int|array<int> $lastsaledate) Return ChildCustperm objects filtered by the lastsaledate column
 * @method     ChildCustperm[]|Collection findByDummy(string|array<string> $dummy) Return ChildCustperm objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildCustperm> findByDummy(string|array<string> $dummy) Return ChildCustperm objects filtered by the dummy column
 *
 * @method     ChildCustperm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCustperm> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class CustpermQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustpermQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Custperm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustpermQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustpermQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCustpermQuery) {
            return $criteria;
        }
        $query = new ChildCustpermQuery();
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
     * @param array[$loginid, $custid, $shiptoid] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCustperm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustpermTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustpermTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildCustperm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT loginid, custid, shiptoid, salesper1, restrictaccess, amountsold, timesold, lastsaledate, dummy FROM custperm WHERE loginid = :p0 AND custid = :p1 AND shiptoid = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCustperm $obj */
            $obj = new ChildCustperm();
            $obj->hydrate($row);
            CustpermTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildCustperm|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(CustpermTableMap::COL_LOGINID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustpermTableMap::COL_CUSTID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(CustpermTableMap::COL_SHIPTOID, $key[2], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(CustpermTableMap::COL_LOGINID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustpermTableMap::COL_CUSTID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(CustpermTableMap::COL_SHIPTOID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the loginid column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginid('fooValue');   // WHERE loginid = 'fooValue'
     * $query->filterByLoginid('%fooValue%', Criteria::LIKE); // WHERE loginid LIKE '%fooValue%'
     * $query->filterByLoginid(['foo', 'bar']); // WHERE loginid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $loginid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLoginid($loginid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpermTableMap::COL_LOGINID, $loginid, $comparison);

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

        $this->addUsingAlias(CustpermTableMap::COL_CUSTID, $custid, $comparison);

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

        $this->addUsingAlias(CustpermTableMap::COL_SHIPTOID, $shiptoid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salesper1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesper1('fooValue');   // WHERE salesper1 = 'fooValue'
     * $query->filterBySalesper1('%fooValue%', Criteria::LIKE); // WHERE salesper1 LIKE '%fooValue%'
     * $query->filterBySalesper1(['foo', 'bar']); // WHERE salesper1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salesper1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalesper1($salesper1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesper1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpermTableMap::COL_SALESPER1, $salesper1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the restrictaccess column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictaccess('fooValue');   // WHERE restrictaccess = 'fooValue'
     * $query->filterByRestrictaccess('%fooValue%', Criteria::LIKE); // WHERE restrictaccess LIKE '%fooValue%'
     * $query->filterByRestrictaccess(['foo', 'bar']); // WHERE restrictaccess IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $restrictaccess The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRestrictaccess($restrictaccess = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($restrictaccess)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpermTableMap::COL_RESTRICTACCESS, $restrictaccess, $comparison);

        return $this;
    }

    /**
     * Filter the query on the amountsold column
     *
     * Example usage:
     * <code>
     * $query->filterByAmountsold(1234); // WHERE amountsold = 1234
     * $query->filterByAmountsold(array(12, 34)); // WHERE amountsold IN (12, 34)
     * $query->filterByAmountsold(array('min' => 12)); // WHERE amountsold > 12
     * </code>
     *
     * @param mixed $amountsold The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAmountsold($amountsold = null, ?string $comparison = null)
    {
        if (is_array($amountsold)) {
            $useMinMax = false;
            if (isset($amountsold['min'])) {
                $this->addUsingAlias(CustpermTableMap::COL_AMOUNTSOLD, $amountsold['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountsold['max'])) {
                $this->addUsingAlias(CustpermTableMap::COL_AMOUNTSOLD, $amountsold['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpermTableMap::COL_AMOUNTSOLD, $amountsold, $comparison);

        return $this;
    }

    /**
     * Filter the query on the timesold column
     *
     * Example usage:
     * <code>
     * $query->filterByTimesold(1234); // WHERE timesold = 1234
     * $query->filterByTimesold(array(12, 34)); // WHERE timesold IN (12, 34)
     * $query->filterByTimesold(array('min' => 12)); // WHERE timesold > 12
     * </code>
     *
     * @param mixed $timesold The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTimesold($timesold = null, ?string $comparison = null)
    {
        if (is_array($timesold)) {
            $useMinMax = false;
            if (isset($timesold['min'])) {
                $this->addUsingAlias(CustpermTableMap::COL_TIMESOLD, $timesold['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timesold['max'])) {
                $this->addUsingAlias(CustpermTableMap::COL_TIMESOLD, $timesold['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpermTableMap::COL_TIMESOLD, $timesold, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lastsaledate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastsaledate(1234); // WHERE lastsaledate = 1234
     * $query->filterByLastsaledate(array(12, 34)); // WHERE lastsaledate IN (12, 34)
     * $query->filterByLastsaledate(array('min' => 12)); // WHERE lastsaledate > 12
     * </code>
     *
     * @param mixed $lastsaledate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastsaledate($lastsaledate = null, ?string $comparison = null)
    {
        if (is_array($lastsaledate)) {
            $useMinMax = false;
            if (isset($lastsaledate['min'])) {
                $this->addUsingAlias(CustpermTableMap::COL_LASTSALEDATE, $lastsaledate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastsaledate['max'])) {
                $this->addUsingAlias(CustpermTableMap::COL_LASTSALEDATE, $lastsaledate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpermTableMap::COL_LASTSALEDATE, $lastsaledate, $comparison);

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

        $this->addUsingAlias(CustpermTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCustperm $custperm Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($custperm = null)
    {
        if ($custperm) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustpermTableMap::COL_LOGINID), $custperm->getLoginid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustpermTableMap::COL_CUSTID), $custperm->getCustid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(CustpermTableMap::COL_SHIPTOID), $custperm->getShiptoid(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the custperm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustpermTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustpermTableMap::clearInstancePool();
            CustpermTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustpermTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustpermTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustpermTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustpermTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
