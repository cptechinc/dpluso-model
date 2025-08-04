<?php

namespace Base;

use \Logperm as ChildLogperm;
use \LogpermQuery as ChildLogpermQuery;
use \Exception;
use \PDO;
use Map\LogpermTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `logperm` table.
 *
 * @method     ChildLogpermQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildLogpermQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildLogpermQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildLogpermQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildLogpermQuery orderByLoginid($order = Criteria::ASC) Order by the loginid column
 * @method     ChildLogpermQuery orderByLoginname($order = Criteria::ASC) Order by the loginname column
 * @method     ChildLogpermQuery orderBySalespersonid($order = Criteria::ASC) Order by the salespersonid column
 * @method     ChildLogpermQuery orderBySalespername($order = Criteria::ASC) Order by the salespername column
 * @method     ChildLogpermQuery orderByValidlogin($order = Criteria::ASC) Order by the validlogin column
 * @method     ChildLogpermQuery orderByRestrictcustomers($order = Criteria::ASC) Order by the restrictcustomers column
 * @method     ChildLogpermQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildLogpermQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildLogpermQuery orderByRestrictaccess($order = Criteria::ASC) Order by the restrictaccess column
 * @method     ChildLogpermQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildLogpermQuery groupBySessionid() Group by the sessionid column
 * @method     ChildLogpermQuery groupByRecno() Group by the recno column
 * @method     ChildLogpermQuery groupByDate() Group by the date column
 * @method     ChildLogpermQuery groupByTime() Group by the time column
 * @method     ChildLogpermQuery groupByLoginid() Group by the loginid column
 * @method     ChildLogpermQuery groupByLoginname() Group by the loginname column
 * @method     ChildLogpermQuery groupBySalespersonid() Group by the salespersonid column
 * @method     ChildLogpermQuery groupBySalespername() Group by the salespername column
 * @method     ChildLogpermQuery groupByValidlogin() Group by the validlogin column
 * @method     ChildLogpermQuery groupByRestrictcustomers() Group by the restrictcustomers column
 * @method     ChildLogpermQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildLogpermQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildLogpermQuery groupByRestrictaccess() Group by the restrictaccess column
 * @method     ChildLogpermQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildLogpermQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLogpermQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLogpermQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLogpermQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLogpermQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLogpermQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLogperm|null findOne(?ConnectionInterface $con = null) Return the first ChildLogperm matching the query
 * @method     ChildLogperm findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildLogperm matching the query, or a new ChildLogperm object populated from the query conditions when no match is found
 *
 * @method     ChildLogperm|null findOneBySessionid(string $sessionid) Return the first ChildLogperm filtered by the sessionid column
 * @method     ChildLogperm|null findOneByRecno(int $recno) Return the first ChildLogperm filtered by the recno column
 * @method     ChildLogperm|null findOneByDate(int $date) Return the first ChildLogperm filtered by the date column
 * @method     ChildLogperm|null findOneByTime(int $time) Return the first ChildLogperm filtered by the time column
 * @method     ChildLogperm|null findOneByLoginid(string $loginid) Return the first ChildLogperm filtered by the loginid column
 * @method     ChildLogperm|null findOneByLoginname(string $loginname) Return the first ChildLogperm filtered by the loginname column
 * @method     ChildLogperm|null findOneBySalespersonid(string $salespersonid) Return the first ChildLogperm filtered by the salespersonid column
 * @method     ChildLogperm|null findOneBySalespername(string $salespername) Return the first ChildLogperm filtered by the salespername column
 * @method     ChildLogperm|null findOneByValidlogin(string $validlogin) Return the first ChildLogperm filtered by the validlogin column
 * @method     ChildLogperm|null findOneByRestrictcustomers(string $restrictcustomers) Return the first ChildLogperm filtered by the restrictcustomers column
 * @method     ChildLogperm|null findOneByErrormsg(string $errormsg) Return the first ChildLogperm filtered by the errormsg column
 * @method     ChildLogperm|null findOneByOrdernbr(string $ordernbr) Return the first ChildLogperm filtered by the ordernbr column
 * @method     ChildLogperm|null findOneByRestrictaccess(string $restrictaccess) Return the first ChildLogperm filtered by the restrictaccess column
 * @method     ChildLogperm|null findOneByDummy(string $dummy) Return the first ChildLogperm filtered by the dummy column
 *
 * @method     ChildLogperm requirePk($key, ?ConnectionInterface $con = null) Return the ChildLogperm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOne(?ConnectionInterface $con = null) Return the first ChildLogperm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogperm requireOneBySessionid(string $sessionid) Return the first ChildLogperm filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByRecno(int $recno) Return the first ChildLogperm filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByDate(int $date) Return the first ChildLogperm filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByTime(int $time) Return the first ChildLogperm filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByLoginid(string $loginid) Return the first ChildLogperm filtered by the loginid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByLoginname(string $loginname) Return the first ChildLogperm filtered by the loginname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneBySalespersonid(string $salespersonid) Return the first ChildLogperm filtered by the salespersonid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneBySalespername(string $salespername) Return the first ChildLogperm filtered by the salespername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByValidlogin(string $validlogin) Return the first ChildLogperm filtered by the validlogin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByRestrictcustomers(string $restrictcustomers) Return the first ChildLogperm filtered by the restrictcustomers column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByErrormsg(string $errormsg) Return the first ChildLogperm filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByOrdernbr(string $ordernbr) Return the first ChildLogperm filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByRestrictaccess(string $restrictaccess) Return the first ChildLogperm filtered by the restrictaccess column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogperm requireOneByDummy(string $dummy) Return the first ChildLogperm filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogperm[]|Collection find(?ConnectionInterface $con = null) Return ChildLogperm objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildLogperm> find(?ConnectionInterface $con = null) Return ChildLogperm objects based on current ModelCriteria
 *
 * @method     ChildLogperm[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildLogperm objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildLogperm> findBySessionid(string|array<string> $sessionid) Return ChildLogperm objects filtered by the sessionid column
 * @method     ChildLogperm[]|Collection findByRecno(int|array<int> $recno) Return ChildLogperm objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByRecno(int|array<int> $recno) Return ChildLogperm objects filtered by the recno column
 * @method     ChildLogperm[]|Collection findByDate(int|array<int> $date) Return ChildLogperm objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByDate(int|array<int> $date) Return ChildLogperm objects filtered by the date column
 * @method     ChildLogperm[]|Collection findByTime(int|array<int> $time) Return ChildLogperm objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByTime(int|array<int> $time) Return ChildLogperm objects filtered by the time column
 * @method     ChildLogperm[]|Collection findByLoginid(string|array<string> $loginid) Return ChildLogperm objects filtered by the loginid column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByLoginid(string|array<string> $loginid) Return ChildLogperm objects filtered by the loginid column
 * @method     ChildLogperm[]|Collection findByLoginname(string|array<string> $loginname) Return ChildLogperm objects filtered by the loginname column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByLoginname(string|array<string> $loginname) Return ChildLogperm objects filtered by the loginname column
 * @method     ChildLogperm[]|Collection findBySalespersonid(string|array<string> $salespersonid) Return ChildLogperm objects filtered by the salespersonid column
 * @psalm-method Collection&\Traversable<ChildLogperm> findBySalespersonid(string|array<string> $salespersonid) Return ChildLogperm objects filtered by the salespersonid column
 * @method     ChildLogperm[]|Collection findBySalespername(string|array<string> $salespername) Return ChildLogperm objects filtered by the salespername column
 * @psalm-method Collection&\Traversable<ChildLogperm> findBySalespername(string|array<string> $salespername) Return ChildLogperm objects filtered by the salespername column
 * @method     ChildLogperm[]|Collection findByValidlogin(string|array<string> $validlogin) Return ChildLogperm objects filtered by the validlogin column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByValidlogin(string|array<string> $validlogin) Return ChildLogperm objects filtered by the validlogin column
 * @method     ChildLogperm[]|Collection findByRestrictcustomers(string|array<string> $restrictcustomers) Return ChildLogperm objects filtered by the restrictcustomers column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByRestrictcustomers(string|array<string> $restrictcustomers) Return ChildLogperm objects filtered by the restrictcustomers column
 * @method     ChildLogperm[]|Collection findByErrormsg(string|array<string> $errormsg) Return ChildLogperm objects filtered by the errormsg column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByErrormsg(string|array<string> $errormsg) Return ChildLogperm objects filtered by the errormsg column
 * @method     ChildLogperm[]|Collection findByOrdernbr(string|array<string> $ordernbr) Return ChildLogperm objects filtered by the ordernbr column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByOrdernbr(string|array<string> $ordernbr) Return ChildLogperm objects filtered by the ordernbr column
 * @method     ChildLogperm[]|Collection findByRestrictaccess(string|array<string> $restrictaccess) Return ChildLogperm objects filtered by the restrictaccess column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByRestrictaccess(string|array<string> $restrictaccess) Return ChildLogperm objects filtered by the restrictaccess column
 * @method     ChildLogperm[]|Collection findByDummy(string|array<string> $dummy) Return ChildLogperm objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildLogperm> findByDummy(string|array<string> $dummy) Return ChildLogperm objects filtered by the dummy column
 *
 * @method     ChildLogperm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildLogperm> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class LogpermQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LogpermQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Logperm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLogpermQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLogpermQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildLogpermQuery) {
            return $criteria;
        }
        $query = new ChildLogpermQuery();
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
     * @return ChildLogperm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LogpermTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LogpermTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildLogperm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, loginid, loginname, salespersonid, salespername, validlogin, restrictcustomers, errormsg, ordernbr, restrictaccess, dummy FROM logperm WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildLogperm $obj */
            $obj = new ChildLogperm();
            $obj->hydrate($row);
            LogpermTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildLogperm|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(LogpermTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(LogpermTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(LogpermTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(LogpermTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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

        $this->addUsingAlias(LogpermTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(LogpermTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(LogpermTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_RECNO, $recno, $comparison);

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
                $this->addUsingAlias(LogpermTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(LogpermTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(LogpermTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(LogpermTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(LogpermTableMap::COL_LOGINID, $loginid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the loginname column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginname('fooValue');   // WHERE loginname = 'fooValue'
     * $query->filterByLoginname('%fooValue%', Criteria::LIKE); // WHERE loginname LIKE '%fooValue%'
     * $query->filterByLoginname(['foo', 'bar']); // WHERE loginname IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $loginname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLoginname($loginname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_LOGINNAME, $loginname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salespersonid column
     *
     * Example usage:
     * <code>
     * $query->filterBySalespersonid('fooValue');   // WHERE salespersonid = 'fooValue'
     * $query->filterBySalespersonid('%fooValue%', Criteria::LIKE); // WHERE salespersonid LIKE '%fooValue%'
     * $query->filterBySalespersonid(['foo', 'bar']); // WHERE salespersonid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salespersonid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalespersonid($salespersonid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salespersonid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_SALESPERSONID, $salespersonid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salespername column
     *
     * Example usage:
     * <code>
     * $query->filterBySalespername('fooValue');   // WHERE salespername = 'fooValue'
     * $query->filterBySalespername('%fooValue%', Criteria::LIKE); // WHERE salespername LIKE '%fooValue%'
     * $query->filterBySalespername(['foo', 'bar']); // WHERE salespername IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salespername The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalespername($salespername = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salespername)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_SALESPERNAME, $salespername, $comparison);

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

        $this->addUsingAlias(LogpermTableMap::COL_VALIDLOGIN, $validlogin, $comparison);

        return $this;
    }

    /**
     * Filter the query on the restrictcustomers column
     *
     * Example usage:
     * <code>
     * $query->filterByRestrictcustomers('fooValue');   // WHERE restrictcustomers = 'fooValue'
     * $query->filterByRestrictcustomers('%fooValue%', Criteria::LIKE); // WHERE restrictcustomers LIKE '%fooValue%'
     * $query->filterByRestrictcustomers(['foo', 'bar']); // WHERE restrictcustomers IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $restrictcustomers The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRestrictcustomers($restrictcustomers = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($restrictcustomers)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_RESTRICTCUSTOMERS, $restrictcustomers, $comparison);

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

        $this->addUsingAlias(LogpermTableMap::COL_ERRORMSG, $errormsg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordernbr column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdernbr('fooValue');   // WHERE ordernbr = 'fooValue'
     * $query->filterByOrdernbr('%fooValue%', Criteria::LIKE); // WHERE ordernbr LIKE '%fooValue%'
     * $query->filterByOrdernbr(['foo', 'bar']); // WHERE ordernbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordernbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdernbr($ordernbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordernbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(LogpermTableMap::COL_ORDERNBR, $ordernbr, $comparison);

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

        $this->addUsingAlias(LogpermTableMap::COL_RESTRICTACCESS, $restrictaccess, $comparison);

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

        $this->addUsingAlias(LogpermTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildLogperm $logperm Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($logperm = null)
    {
        if ($logperm) {
            $this->addCond('pruneCond0', $this->getAliasedColName(LogpermTableMap::COL_SESSIONID), $logperm->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(LogpermTableMap::COL_RECNO), $logperm->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the logperm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LogpermTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LogpermTableMap::clearInstancePool();
            LogpermTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LogpermTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LogpermTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LogpermTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LogpermTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
