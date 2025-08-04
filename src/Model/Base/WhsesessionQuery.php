<?php

namespace Base;

use \Whsesession as ChildWhsesession;
use \WhsesessionQuery as ChildWhsesessionQuery;
use \Exception;
use \PDO;
use Map\WhsesessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `whsesession` table.
 *
 * @method     ChildWhsesessionQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWhsesessionQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildWhsesessionQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildWhsesessionQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildWhsesessionQuery orderByLoginid($order = Criteria::ASC) Order by the loginid column
 * @method     ChildWhsesessionQuery orderByWhseid($order = Criteria::ASC) Order by the whseid column
 * @method     ChildWhsesessionQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildWhsesessionQuery orderByBinnbr($order = Criteria::ASC) Order by the binnbr column
 * @method     ChildWhsesessionQuery orderByPalletnbr($order = Criteria::ASC) Order by the palletnbr column
 * @method     ChildWhsesessionQuery orderByCartonnbr($order = Criteria::ASC) Order by the cartonnbr column
 * @method     ChildWhsesessionQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildWhsesessionQuery orderByFunction($order = Criteria::ASC) Order by the function column
 * @method     ChildWhsesessionQuery orderByPromptfunction($order = Criteria::ASC) Order by the promptfunction column
 * @method     ChildWhsesessionQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildWhsesessionQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWhsesessionQuery groupByRecno() Group by the recno column
 * @method     ChildWhsesessionQuery groupByDate() Group by the date column
 * @method     ChildWhsesessionQuery groupByTime() Group by the time column
 * @method     ChildWhsesessionQuery groupByLoginid() Group by the loginid column
 * @method     ChildWhsesessionQuery groupByWhseid() Group by the whseid column
 * @method     ChildWhsesessionQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildWhsesessionQuery groupByBinnbr() Group by the binnbr column
 * @method     ChildWhsesessionQuery groupByPalletnbr() Group by the palletnbr column
 * @method     ChildWhsesessionQuery groupByCartonnbr() Group by the cartonnbr column
 * @method     ChildWhsesessionQuery groupByStatus() Group by the status column
 * @method     ChildWhsesessionQuery groupByFunction() Group by the function column
 * @method     ChildWhsesessionQuery groupByPromptfunction() Group by the promptfunction column
 * @method     ChildWhsesessionQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildWhsesessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhsesessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhsesessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhsesessionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhsesessionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhsesessionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhsesession|null findOne(?ConnectionInterface $con = null) Return the first ChildWhsesession matching the query
 * @method     ChildWhsesession findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildWhsesession matching the query, or a new ChildWhsesession object populated from the query conditions when no match is found
 *
 * @method     ChildWhsesession|null findOneBySessionid(string $sessionid) Return the first ChildWhsesession filtered by the sessionid column
 * @method     ChildWhsesession|null findOneByRecno(int $recno) Return the first ChildWhsesession filtered by the recno column
 * @method     ChildWhsesession|null findOneByDate(int $date) Return the first ChildWhsesession filtered by the date column
 * @method     ChildWhsesession|null findOneByTime(int $time) Return the first ChildWhsesession filtered by the time column
 * @method     ChildWhsesession|null findOneByLoginid(string $loginid) Return the first ChildWhsesession filtered by the loginid column
 * @method     ChildWhsesession|null findOneByWhseid(string $whseid) Return the first ChildWhsesession filtered by the whseid column
 * @method     ChildWhsesession|null findOneByOrdernbr(string $ordernbr) Return the first ChildWhsesession filtered by the ordernbr column
 * @method     ChildWhsesession|null findOneByBinnbr(string $binnbr) Return the first ChildWhsesession filtered by the binnbr column
 * @method     ChildWhsesession|null findOneByPalletnbr(int $palletnbr) Return the first ChildWhsesession filtered by the palletnbr column
 * @method     ChildWhsesession|null findOneByCartonnbr(int $cartonnbr) Return the first ChildWhsesession filtered by the cartonnbr column
 * @method     ChildWhsesession|null findOneByStatus(string $status) Return the first ChildWhsesession filtered by the status column
 * @method     ChildWhsesession|null findOneByFunction(string $function) Return the first ChildWhsesession filtered by the function column
 * @method     ChildWhsesession|null findOneByPromptfunction(string $promptfunction) Return the first ChildWhsesession filtered by the promptfunction column
 * @method     ChildWhsesession|null findOneByDummy(string $dummy) Return the first ChildWhsesession filtered by the dummy column
 *
 * @method     ChildWhsesession requirePk($key, ?ConnectionInterface $con = null) Return the ChildWhsesession by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOne(?ConnectionInterface $con = null) Return the first ChildWhsesession matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhsesession requireOneBySessionid(string $sessionid) Return the first ChildWhsesession filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByRecno(int $recno) Return the first ChildWhsesession filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByDate(int $date) Return the first ChildWhsesession filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByTime(int $time) Return the first ChildWhsesession filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByLoginid(string $loginid) Return the first ChildWhsesession filtered by the loginid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByWhseid(string $whseid) Return the first ChildWhsesession filtered by the whseid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByOrdernbr(string $ordernbr) Return the first ChildWhsesession filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByBinnbr(string $binnbr) Return the first ChildWhsesession filtered by the binnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByPalletnbr(int $palletnbr) Return the first ChildWhsesession filtered by the palletnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByCartonnbr(int $cartonnbr) Return the first ChildWhsesession filtered by the cartonnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByStatus(string $status) Return the first ChildWhsesession filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByFunction(string $function) Return the first ChildWhsesession filtered by the function column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByPromptfunction(string $promptfunction) Return the first ChildWhsesession filtered by the promptfunction column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhsesession requireOneByDummy(string $dummy) Return the first ChildWhsesession filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhsesession[]|Collection find(?ConnectionInterface $con = null) Return ChildWhsesession objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildWhsesession> find(?ConnectionInterface $con = null) Return ChildWhsesession objects based on current ModelCriteria
 *
 * @method     ChildWhsesession[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildWhsesession objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findBySessionid(string|array<string> $sessionid) Return ChildWhsesession objects filtered by the sessionid column
 * @method     ChildWhsesession[]|Collection findByRecno(int|array<int> $recno) Return ChildWhsesession objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByRecno(int|array<int> $recno) Return ChildWhsesession objects filtered by the recno column
 * @method     ChildWhsesession[]|Collection findByDate(int|array<int> $date) Return ChildWhsesession objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByDate(int|array<int> $date) Return ChildWhsesession objects filtered by the date column
 * @method     ChildWhsesession[]|Collection findByTime(int|array<int> $time) Return ChildWhsesession objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByTime(int|array<int> $time) Return ChildWhsesession objects filtered by the time column
 * @method     ChildWhsesession[]|Collection findByLoginid(string|array<string> $loginid) Return ChildWhsesession objects filtered by the loginid column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByLoginid(string|array<string> $loginid) Return ChildWhsesession objects filtered by the loginid column
 * @method     ChildWhsesession[]|Collection findByWhseid(string|array<string> $whseid) Return ChildWhsesession objects filtered by the whseid column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByWhseid(string|array<string> $whseid) Return ChildWhsesession objects filtered by the whseid column
 * @method     ChildWhsesession[]|Collection findByOrdernbr(string|array<string> $ordernbr) Return ChildWhsesession objects filtered by the ordernbr column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByOrdernbr(string|array<string> $ordernbr) Return ChildWhsesession objects filtered by the ordernbr column
 * @method     ChildWhsesession[]|Collection findByBinnbr(string|array<string> $binnbr) Return ChildWhsesession objects filtered by the binnbr column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByBinnbr(string|array<string> $binnbr) Return ChildWhsesession objects filtered by the binnbr column
 * @method     ChildWhsesession[]|Collection findByPalletnbr(int|array<int> $palletnbr) Return ChildWhsesession objects filtered by the palletnbr column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByPalletnbr(int|array<int> $palletnbr) Return ChildWhsesession objects filtered by the palletnbr column
 * @method     ChildWhsesession[]|Collection findByCartonnbr(int|array<int> $cartonnbr) Return ChildWhsesession objects filtered by the cartonnbr column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByCartonnbr(int|array<int> $cartonnbr) Return ChildWhsesession objects filtered by the cartonnbr column
 * @method     ChildWhsesession[]|Collection findByStatus(string|array<string> $status) Return ChildWhsesession objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByStatus(string|array<string> $status) Return ChildWhsesession objects filtered by the status column
 * @method     ChildWhsesession[]|Collection findByFunction(string|array<string> $function) Return ChildWhsesession objects filtered by the function column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByFunction(string|array<string> $function) Return ChildWhsesession objects filtered by the function column
 * @method     ChildWhsesession[]|Collection findByPromptfunction(string|array<string> $promptfunction) Return ChildWhsesession objects filtered by the promptfunction column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByPromptfunction(string|array<string> $promptfunction) Return ChildWhsesession objects filtered by the promptfunction column
 * @method     ChildWhsesession[]|Collection findByDummy(string|array<string> $dummy) Return ChildWhsesession objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildWhsesession> findByDummy(string|array<string> $dummy) Return ChildWhsesession objects filtered by the dummy column
 *
 * @method     ChildWhsesession[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildWhsesession> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class WhsesessionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhsesessionQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Whsesession', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhsesessionQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhsesessionQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildWhsesessionQuery) {
            return $criteria;
        }
        $query = new ChildWhsesessionQuery();
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
     * @return ChildWhsesession|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhsesessionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhsesessionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildWhsesession A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, loginid, whseid, ordernbr, binnbr, palletnbr, cartonnbr, status, function, promptfunction, dummy FROM whsesession WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildWhsesession $obj */
            $obj = new ChildWhsesession();
            $obj->hydrate($row);
            WhsesessionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildWhsesession|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(WhsesessionTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WhsesessionTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(WhsesessionTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WhsesessionTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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

        $this->addUsingAlias(WhsesessionTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(WhsesessionTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_RECNO, $recno, $comparison);

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
                $this->addUsingAlias(WhsesessionTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(WhsesessionTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(WhsesessionTableMap::COL_LOGINID, $loginid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the whseid column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseid('fooValue');   // WHERE whseid = 'fooValue'
     * $query->filterByWhseid('%fooValue%', Criteria::LIKE); // WHERE whseid LIKE '%fooValue%'
     * $query->filterByWhseid(['foo', 'bar']); // WHERE whseid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $whseid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByWhseid($whseid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_WHSEID, $whseid, $comparison);

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

        $this->addUsingAlias(WhsesessionTableMap::COL_ORDERNBR, $ordernbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the binnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByBinnbr('fooValue');   // WHERE binnbr = 'fooValue'
     * $query->filterByBinnbr('%fooValue%', Criteria::LIKE); // WHERE binnbr LIKE '%fooValue%'
     * $query->filterByBinnbr(['foo', 'bar']); // WHERE binnbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $binnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBinnbr($binnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_BINNBR, $binnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the palletnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPalletnbr(1234); // WHERE palletnbr = 1234
     * $query->filterByPalletnbr(array(12, 34)); // WHERE palletnbr IN (12, 34)
     * $query->filterByPalletnbr(array('min' => 12)); // WHERE palletnbr > 12
     * </code>
     *
     * @param mixed $palletnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPalletnbr($palletnbr = null, ?string $comparison = null)
    {
        if (is_array($palletnbr)) {
            $useMinMax = false;
            if (isset($palletnbr['min'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_PALLETNBR, $palletnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($palletnbr['max'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_PALLETNBR, $palletnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_PALLETNBR, $palletnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cartonnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByCartonnbr(1234); // WHERE cartonnbr = 1234
     * $query->filterByCartonnbr(array(12, 34)); // WHERE cartonnbr IN (12, 34)
     * $query->filterByCartonnbr(array('min' => 12)); // WHERE cartonnbr > 12
     * </code>
     *
     * @param mixed $cartonnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCartonnbr($cartonnbr = null, ?string $comparison = null)
    {
        if (is_array($cartonnbr)) {
            $useMinMax = false;
            if (isset($cartonnbr['min'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_CARTONNBR, $cartonnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cartonnbr['max'])) {
                $this->addUsingAlias(WhsesessionTableMap::COL_CARTONNBR, $cartonnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_CARTONNBR, $cartonnbr, $comparison);

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

        $this->addUsingAlias(WhsesessionTableMap::COL_STATUS, $status, $comparison);

        return $this;
    }

    /**
     * Filter the query on the function column
     *
     * Example usage:
     * <code>
     * $query->filterByFunction('fooValue');   // WHERE function = 'fooValue'
     * $query->filterByFunction('%fooValue%', Criteria::LIKE); // WHERE function LIKE '%fooValue%'
     * $query->filterByFunction(['foo', 'bar']); // WHERE function IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $function The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFunction($function = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($function)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_FUNCTION, $function, $comparison);

        return $this;
    }

    /**
     * Filter the query on the promptfunction column
     *
     * Example usage:
     * <code>
     * $query->filterByPromptfunction('fooValue');   // WHERE promptfunction = 'fooValue'
     * $query->filterByPromptfunction('%fooValue%', Criteria::LIKE); // WHERE promptfunction LIKE '%fooValue%'
     * $query->filterByPromptfunction(['foo', 'bar']); // WHERE promptfunction IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $promptfunction The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPromptfunction($promptfunction = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($promptfunction)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhsesessionTableMap::COL_PROMPTFUNCTION, $promptfunction, $comparison);

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

        $this->addUsingAlias(WhsesessionTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildWhsesession $whsesession Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($whsesession = null)
    {
        if ($whsesession) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WhsesessionTableMap::COL_SESSIONID), $whsesession->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WhsesessionTableMap::COL_RECNO), $whsesession->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whsesession table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhsesessionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhsesessionTableMap::clearInstancePool();
            WhsesessionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhsesessionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhsesessionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhsesessionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhsesessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
