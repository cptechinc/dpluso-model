<?php

namespace Base;

use \Whseitemphysicalcount as ChildWhseitemphysicalcount;
use \WhseitemphysicalcountQuery as ChildWhseitemphysicalcountQuery;
use \Exception;
use \PDO;
use Map\WhseitemphysicalcountTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `whseitemphysicalcount` table.
 *
 * @method     ChildWhseitemphysicalcountQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWhseitemphysicalcountQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildWhseitemphysicalcountQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildWhseitemphysicalcountQuery orderByScan($order = Criteria::ASC) Order by the scan column
 * @method     ChildWhseitemphysicalcountQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildWhseitemphysicalcountQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildWhseitemphysicalcountQuery orderByLotserialref($order = Criteria::ASC) Order by the lotserialref column
 * @method     ChildWhseitemphysicalcountQuery orderByBin($order = Criteria::ASC) Order by the bin column
 * @method     ChildWhseitemphysicalcountQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildWhseitemphysicalcountQuery orderByProductiondate($order = Criteria::ASC) Order by the productiondate column
 * @method     ChildWhseitemphysicalcountQuery orderByComplete($order = Criteria::ASC) Order by the complete column
 * @method     ChildWhseitemphysicalcountQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildWhseitemphysicalcountQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildWhseitemphysicalcountQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildWhseitemphysicalcountQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildWhseitemphysicalcountQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWhseitemphysicalcountQuery groupByRecno() Group by the recno column
 * @method     ChildWhseitemphysicalcountQuery groupByItemid() Group by the itemid column
 * @method     ChildWhseitemphysicalcountQuery groupByScan() Group by the scan column
 * @method     ChildWhseitemphysicalcountQuery groupByType() Group by the type column
 * @method     ChildWhseitemphysicalcountQuery groupByLotserial() Group by the lotserial column
 * @method     ChildWhseitemphysicalcountQuery groupByLotserialref() Group by the lotserialref column
 * @method     ChildWhseitemphysicalcountQuery groupByBin() Group by the bin column
 * @method     ChildWhseitemphysicalcountQuery groupByQty() Group by the qty column
 * @method     ChildWhseitemphysicalcountQuery groupByProductiondate() Group by the productiondate column
 * @method     ChildWhseitemphysicalcountQuery groupByComplete() Group by the complete column
 * @method     ChildWhseitemphysicalcountQuery groupByStatus() Group by the status column
 * @method     ChildWhseitemphysicalcountQuery groupByDate() Group by the date column
 * @method     ChildWhseitemphysicalcountQuery groupByTime() Group by the time column
 * @method     ChildWhseitemphysicalcountQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildWhseitemphysicalcountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhseitemphysicalcountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhseitemphysicalcountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhseitemphysicalcountQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhseitemphysicalcountQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhseitemphysicalcountQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhseitemphysicalcount|null findOne(?ConnectionInterface $con = null) Return the first ChildWhseitemphysicalcount matching the query
 * @method     ChildWhseitemphysicalcount findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildWhseitemphysicalcount matching the query, or a new ChildWhseitemphysicalcount object populated from the query conditions when no match is found
 *
 * @method     ChildWhseitemphysicalcount|null findOneBySessionid(string $sessionid) Return the first ChildWhseitemphysicalcount filtered by the sessionid column
 * @method     ChildWhseitemphysicalcount|null findOneByRecno(int $recno) Return the first ChildWhseitemphysicalcount filtered by the recno column
 * @method     ChildWhseitemphysicalcount|null findOneByItemid(string $itemid) Return the first ChildWhseitemphysicalcount filtered by the itemid column
 * @method     ChildWhseitemphysicalcount|null findOneByScan(string $scan) Return the first ChildWhseitemphysicalcount filtered by the scan column
 * @method     ChildWhseitemphysicalcount|null findOneByType(string $type) Return the first ChildWhseitemphysicalcount filtered by the type column
 * @method     ChildWhseitemphysicalcount|null findOneByLotserial(string $lotserial) Return the first ChildWhseitemphysicalcount filtered by the lotserial column
 * @method     ChildWhseitemphysicalcount|null findOneByLotserialref(string $lotserialref) Return the first ChildWhseitemphysicalcount filtered by the lotserialref column
 * @method     ChildWhseitemphysicalcount|null findOneByBin(string $bin) Return the first ChildWhseitemphysicalcount filtered by the bin column
 * @method     ChildWhseitemphysicalcount|null findOneByQty(string $qty) Return the first ChildWhseitemphysicalcount filtered by the qty column
 * @method     ChildWhseitemphysicalcount|null findOneByProductiondate(int $productiondate) Return the first ChildWhseitemphysicalcount filtered by the productiondate column
 * @method     ChildWhseitemphysicalcount|null findOneByComplete(string $complete) Return the first ChildWhseitemphysicalcount filtered by the complete column
 * @method     ChildWhseitemphysicalcount|null findOneByStatus(string $status) Return the first ChildWhseitemphysicalcount filtered by the status column
 * @method     ChildWhseitemphysicalcount|null findOneByDate(int $date) Return the first ChildWhseitemphysicalcount filtered by the date column
 * @method     ChildWhseitemphysicalcount|null findOneByTime(int $time) Return the first ChildWhseitemphysicalcount filtered by the time column
 * @method     ChildWhseitemphysicalcount|null findOneByDummy(string $dummy) Return the first ChildWhseitemphysicalcount filtered by the dummy column
 *
 * @method     ChildWhseitemphysicalcount requirePk($key, ?ConnectionInterface $con = null) Return the ChildWhseitemphysicalcount by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOne(?ConnectionInterface $con = null) Return the first ChildWhseitemphysicalcount matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitemphysicalcount requireOneBySessionid(string $sessionid) Return the first ChildWhseitemphysicalcount filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByRecno(int $recno) Return the first ChildWhseitemphysicalcount filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByItemid(string $itemid) Return the first ChildWhseitemphysicalcount filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByScan(string $scan) Return the first ChildWhseitemphysicalcount filtered by the scan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByType(string $type) Return the first ChildWhseitemphysicalcount filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByLotserial(string $lotserial) Return the first ChildWhseitemphysicalcount filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByLotserialref(string $lotserialref) Return the first ChildWhseitemphysicalcount filtered by the lotserialref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByBin(string $bin) Return the first ChildWhseitemphysicalcount filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByQty(string $qty) Return the first ChildWhseitemphysicalcount filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByProductiondate(int $productiondate) Return the first ChildWhseitemphysicalcount filtered by the productiondate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByComplete(string $complete) Return the first ChildWhseitemphysicalcount filtered by the complete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByStatus(string $status) Return the first ChildWhseitemphysicalcount filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByDate(int $date) Return the first ChildWhseitemphysicalcount filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByTime(int $time) Return the first ChildWhseitemphysicalcount filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseitemphysicalcount requireOneByDummy(string $dummy) Return the first ChildWhseitemphysicalcount filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseitemphysicalcount[]|Collection find(?ConnectionInterface $con = null) Return ChildWhseitemphysicalcount objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> find(?ConnectionInterface $con = null) Return ChildWhseitemphysicalcount objects based on current ModelCriteria
 *
 * @method     ChildWhseitemphysicalcount[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildWhseitemphysicalcount objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findBySessionid(string|array<string> $sessionid) Return ChildWhseitemphysicalcount objects filtered by the sessionid column
 * @method     ChildWhseitemphysicalcount[]|Collection findByRecno(int|array<int> $recno) Return ChildWhseitemphysicalcount objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByRecno(int|array<int> $recno) Return ChildWhseitemphysicalcount objects filtered by the recno column
 * @method     ChildWhseitemphysicalcount[]|Collection findByItemid(string|array<string> $itemid) Return ChildWhseitemphysicalcount objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByItemid(string|array<string> $itemid) Return ChildWhseitemphysicalcount objects filtered by the itemid column
 * @method     ChildWhseitemphysicalcount[]|Collection findByScan(string|array<string> $scan) Return ChildWhseitemphysicalcount objects filtered by the scan column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByScan(string|array<string> $scan) Return ChildWhseitemphysicalcount objects filtered by the scan column
 * @method     ChildWhseitemphysicalcount[]|Collection findByType(string|array<string> $type) Return ChildWhseitemphysicalcount objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByType(string|array<string> $type) Return ChildWhseitemphysicalcount objects filtered by the type column
 * @method     ChildWhseitemphysicalcount[]|Collection findByLotserial(string|array<string> $lotserial) Return ChildWhseitemphysicalcount objects filtered by the lotserial column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByLotserial(string|array<string> $lotserial) Return ChildWhseitemphysicalcount objects filtered by the lotserial column
 * @method     ChildWhseitemphysicalcount[]|Collection findByLotserialref(string|array<string> $lotserialref) Return ChildWhseitemphysicalcount objects filtered by the lotserialref column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByLotserialref(string|array<string> $lotserialref) Return ChildWhseitemphysicalcount objects filtered by the lotserialref column
 * @method     ChildWhseitemphysicalcount[]|Collection findByBin(string|array<string> $bin) Return ChildWhseitemphysicalcount objects filtered by the bin column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByBin(string|array<string> $bin) Return ChildWhseitemphysicalcount objects filtered by the bin column
 * @method     ChildWhseitemphysicalcount[]|Collection findByQty(string|array<string> $qty) Return ChildWhseitemphysicalcount objects filtered by the qty column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByQty(string|array<string> $qty) Return ChildWhseitemphysicalcount objects filtered by the qty column
 * @method     ChildWhseitemphysicalcount[]|Collection findByProductiondate(int|array<int> $productiondate) Return ChildWhseitemphysicalcount objects filtered by the productiondate column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByProductiondate(int|array<int> $productiondate) Return ChildWhseitemphysicalcount objects filtered by the productiondate column
 * @method     ChildWhseitemphysicalcount[]|Collection findByComplete(string|array<string> $complete) Return ChildWhseitemphysicalcount objects filtered by the complete column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByComplete(string|array<string> $complete) Return ChildWhseitemphysicalcount objects filtered by the complete column
 * @method     ChildWhseitemphysicalcount[]|Collection findByStatus(string|array<string> $status) Return ChildWhseitemphysicalcount objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByStatus(string|array<string> $status) Return ChildWhseitemphysicalcount objects filtered by the status column
 * @method     ChildWhseitemphysicalcount[]|Collection findByDate(int|array<int> $date) Return ChildWhseitemphysicalcount objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByDate(int|array<int> $date) Return ChildWhseitemphysicalcount objects filtered by the date column
 * @method     ChildWhseitemphysicalcount[]|Collection findByTime(int|array<int> $time) Return ChildWhseitemphysicalcount objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByTime(int|array<int> $time) Return ChildWhseitemphysicalcount objects filtered by the time column
 * @method     ChildWhseitemphysicalcount[]|Collection findByDummy(string|array<string> $dummy) Return ChildWhseitemphysicalcount objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildWhseitemphysicalcount> findByDummy(string|array<string> $dummy) Return ChildWhseitemphysicalcount objects filtered by the dummy column
 *
 * @method     ChildWhseitemphysicalcount[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildWhseitemphysicalcount> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class WhseitemphysicalcountQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhseitemphysicalcountQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Whseitemphysicalcount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhseitemphysicalcountQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhseitemphysicalcountQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildWhseitemphysicalcountQuery) {
            return $criteria;
        }
        $query = new ChildWhseitemphysicalcountQuery();
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
     * @return ChildWhseitemphysicalcount|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhseitemphysicalcountTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildWhseitemphysicalcount A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, itemid, scan, type, lotserial, lotserialref, bin, qty, productiondate, complete, status, date, time, dummy FROM whseitemphysicalcount WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildWhseitemphysicalcount $obj */
            $obj = new ChildWhseitemphysicalcount();
            $obj->hydrate($row);
            WhseitemphysicalcountTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildWhseitemphysicalcount|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(WhseitemphysicalcountTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WhseitemphysicalcountTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_RECNO, $recno, $comparison);

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

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the scan column
     *
     * Example usage:
     * <code>
     * $query->filterByScan('fooValue');   // WHERE scan = 'fooValue'
     * $query->filterByScan('%fooValue%', Criteria::LIKE); // WHERE scan LIKE '%fooValue%'
     * $query->filterByScan(['foo', 'bar']); // WHERE scan IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $scan The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByScan($scan = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scan)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_SCAN, $scan, $comparison);

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

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TYPE, $type, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lotserial column
     *
     * Example usage:
     * <code>
     * $query->filterByLotserial('fooValue');   // WHERE lotserial = 'fooValue'
     * $query->filterByLotserial('%fooValue%', Criteria::LIKE); // WHERE lotserial LIKE '%fooValue%'
     * $query->filterByLotserial(['foo', 'bar']); // WHERE lotserial IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lotserial The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_LOTSERIAL, $lotserial, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lotserialref column
     *
     * Example usage:
     * <code>
     * $query->filterByLotserialref('fooValue');   // WHERE lotserialref = 'fooValue'
     * $query->filterByLotserialref('%fooValue%', Criteria::LIKE); // WHERE lotserialref LIKE '%fooValue%'
     * $query->filterByLotserialref(['foo', 'bar']); // WHERE lotserialref IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lotserialref The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLotserialref($lotserialref = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserialref)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_LOTSERIALREF, $lotserialref, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bin column
     *
     * Example usage:
     * <code>
     * $query->filterByBin('fooValue');   // WHERE bin = 'fooValue'
     * $query->filterByBin('%fooValue%', Criteria::LIKE); // WHERE bin LIKE '%fooValue%'
     * $query->filterByBin(['foo', 'bar']); // WHERE bin IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bin The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBin($bin = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bin)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_BIN, $bin, $comparison);

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
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_QTY, $qty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the productiondate column
     *
     * Example usage:
     * <code>
     * $query->filterByProductiondate(1234); // WHERE productiondate = 1234
     * $query->filterByProductiondate(array(12, 34)); // WHERE productiondate IN (12, 34)
     * $query->filterByProductiondate(array('min' => 12)); // WHERE productiondate > 12
     * </code>
     *
     * @param mixed $productiondate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByProductiondate($productiondate = null, ?string $comparison = null)
    {
        if (is_array($productiondate)) {
            $useMinMax = false;
            if (isset($productiondate['min'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_PRODUCTIONDATE, $productiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productiondate['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_PRODUCTIONDATE, $productiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_PRODUCTIONDATE, $productiondate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the complete column
     *
     * Example usage:
     * <code>
     * $query->filterByComplete('fooValue');   // WHERE complete = 'fooValue'
     * $query->filterByComplete('%fooValue%', Criteria::LIKE); // WHERE complete LIKE '%fooValue%'
     * $query->filterByComplete(['foo', 'bar']); // WHERE complete IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $complete The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByComplete($complete = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($complete)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_COMPLETE, $complete, $comparison);

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

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_STATUS, $status, $comparison);

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
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(WhseitemphysicalcountTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildWhseitemphysicalcount $whseitemphysicalcount Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($whseitemphysicalcount = null)
    {
        if ($whseitemphysicalcount) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WhseitemphysicalcountTableMap::COL_SESSIONID), $whseitemphysicalcount->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WhseitemphysicalcountTableMap::COL_RECNO), $whseitemphysicalcount->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whseitemphysicalcount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhseitemphysicalcountTableMap::clearInstancePool();
            WhseitemphysicalcountTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseitemphysicalcountTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhseitemphysicalcountTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhseitemphysicalcountTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhseitemphysicalcountTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
