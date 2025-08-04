<?php

namespace Base;

use \Invsearch as ChildInvsearch;
use \InvsearchQuery as ChildInvsearchQuery;
use \Exception;
use \PDO;
use Map\InvsearchTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `invsearch` table.
 *
 * @method     ChildInvsearchQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildInvsearchQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildInvsearchQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildInvsearchQuery orderByXitemid($order = Criteria::ASC) Order by the xitemid column
 * @method     ChildInvsearchQuery orderByXorigin($order = Criteria::ASC) Order by the xorigin column
 * @method     ChildInvsearchQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildInvsearchQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildInvsearchQuery orderByLotreference($order = Criteria::ASC) Order by the lotreference column
 * @method     ChildInvsearchQuery orderByExpirationdate($order = Criteria::ASC) Order by the expirationdate column
 * @method     ChildInvsearchQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildInvsearchQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildInvsearchQuery orderByPrimebin($order = Criteria::ASC) Order by the primebin column
 * @method     ChildInvsearchQuery orderByBin($order = Criteria::ASC) Order by the bin column
 * @method     ChildInvsearchQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildInvsearchQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildInvsearchQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildInvsearchQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildInvsearchQuery groupBySessionid() Group by the sessionid column
 * @method     ChildInvsearchQuery groupByRecno() Group by the recno column
 * @method     ChildInvsearchQuery groupByItemid() Group by the itemid column
 * @method     ChildInvsearchQuery groupByXitemid() Group by the xitemid column
 * @method     ChildInvsearchQuery groupByXorigin() Group by the xorigin column
 * @method     ChildInvsearchQuery groupByItemtype() Group by the itemtype column
 * @method     ChildInvsearchQuery groupByLotserial() Group by the lotserial column
 * @method     ChildInvsearchQuery groupByLotreference() Group by the lotreference column
 * @method     ChildInvsearchQuery groupByExpirationdate() Group by the expirationdate column
 * @method     ChildInvsearchQuery groupByDesc1() Group by the desc1 column
 * @method     ChildInvsearchQuery groupByDesc2() Group by the desc2 column
 * @method     ChildInvsearchQuery groupByPrimebin() Group by the primebin column
 * @method     ChildInvsearchQuery groupByBin() Group by the bin column
 * @method     ChildInvsearchQuery groupByQty() Group by the qty column
 * @method     ChildInvsearchQuery groupByDate() Group by the date column
 * @method     ChildInvsearchQuery groupByTime() Group by the time column
 * @method     ChildInvsearchQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildInvsearchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInvsearchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInvsearchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInvsearchQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInvsearchQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInvsearchQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInvsearch|null findOne(?ConnectionInterface $con = null) Return the first ChildInvsearch matching the query
 * @method     ChildInvsearch findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildInvsearch matching the query, or a new ChildInvsearch object populated from the query conditions when no match is found
 *
 * @method     ChildInvsearch|null findOneBySessionid(string $sessionid) Return the first ChildInvsearch filtered by the sessionid column
 * @method     ChildInvsearch|null findOneByRecno(int $recno) Return the first ChildInvsearch filtered by the recno column
 * @method     ChildInvsearch|null findOneByItemid(string $itemid) Return the first ChildInvsearch filtered by the itemid column
 * @method     ChildInvsearch|null findOneByXitemid(string $xitemid) Return the first ChildInvsearch filtered by the xitemid column
 * @method     ChildInvsearch|null findOneByXorigin(string $xorigin) Return the first ChildInvsearch filtered by the xorigin column
 * @method     ChildInvsearch|null findOneByItemtype(string $itemtype) Return the first ChildInvsearch filtered by the itemtype column
 * @method     ChildInvsearch|null findOneByLotserial(string $lotserial) Return the first ChildInvsearch filtered by the lotserial column
 * @method     ChildInvsearch|null findOneByLotreference(string $lotreference) Return the first ChildInvsearch filtered by the lotreference column
 * @method     ChildInvsearch|null findOneByExpirationdate(int $expirationdate) Return the first ChildInvsearch filtered by the expirationdate column
 * @method     ChildInvsearch|null findOneByDesc1(string $desc1) Return the first ChildInvsearch filtered by the desc1 column
 * @method     ChildInvsearch|null findOneByDesc2(string $desc2) Return the first ChildInvsearch filtered by the desc2 column
 * @method     ChildInvsearch|null findOneByPrimebin(string $primebin) Return the first ChildInvsearch filtered by the primebin column
 * @method     ChildInvsearch|null findOneByBin(string $bin) Return the first ChildInvsearch filtered by the bin column
 * @method     ChildInvsearch|null findOneByQty(string $qty) Return the first ChildInvsearch filtered by the qty column
 * @method     ChildInvsearch|null findOneByDate(int $date) Return the first ChildInvsearch filtered by the date column
 * @method     ChildInvsearch|null findOneByTime(int $time) Return the first ChildInvsearch filtered by the time column
 * @method     ChildInvsearch|null findOneByDummy(string $dummy) Return the first ChildInvsearch filtered by the dummy column
 *
 * @method     ChildInvsearch requirePk($key, ?ConnectionInterface $con = null) Return the ChildInvsearch by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOne(?ConnectionInterface $con = null) Return the first ChildInvsearch matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvsearch requireOneBySessionid(string $sessionid) Return the first ChildInvsearch filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByRecno(int $recno) Return the first ChildInvsearch filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByItemid(string $itemid) Return the first ChildInvsearch filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByXitemid(string $xitemid) Return the first ChildInvsearch filtered by the xitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByXorigin(string $xorigin) Return the first ChildInvsearch filtered by the xorigin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByItemtype(string $itemtype) Return the first ChildInvsearch filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByLotserial(string $lotserial) Return the first ChildInvsearch filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByLotreference(string $lotreference) Return the first ChildInvsearch filtered by the lotreference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByExpirationdate(int $expirationdate) Return the first ChildInvsearch filtered by the expirationdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDesc1(string $desc1) Return the first ChildInvsearch filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDesc2(string $desc2) Return the first ChildInvsearch filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByPrimebin(string $primebin) Return the first ChildInvsearch filtered by the primebin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByBin(string $bin) Return the first ChildInvsearch filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByQty(string $qty) Return the first ChildInvsearch filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDate(int $date) Return the first ChildInvsearch filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByTime(int $time) Return the first ChildInvsearch filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDummy(string $dummy) Return the first ChildInvsearch filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvsearch[]|Collection find(?ConnectionInterface $con = null) Return ChildInvsearch objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildInvsearch> find(?ConnectionInterface $con = null) Return ChildInvsearch objects based on current ModelCriteria
 *
 * @method     ChildInvsearch[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildInvsearch objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findBySessionid(string|array<string> $sessionid) Return ChildInvsearch objects filtered by the sessionid column
 * @method     ChildInvsearch[]|Collection findByRecno(int|array<int> $recno) Return ChildInvsearch objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByRecno(int|array<int> $recno) Return ChildInvsearch objects filtered by the recno column
 * @method     ChildInvsearch[]|Collection findByItemid(string|array<string> $itemid) Return ChildInvsearch objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByItemid(string|array<string> $itemid) Return ChildInvsearch objects filtered by the itemid column
 * @method     ChildInvsearch[]|Collection findByXitemid(string|array<string> $xitemid) Return ChildInvsearch objects filtered by the xitemid column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByXitemid(string|array<string> $xitemid) Return ChildInvsearch objects filtered by the xitemid column
 * @method     ChildInvsearch[]|Collection findByXorigin(string|array<string> $xorigin) Return ChildInvsearch objects filtered by the xorigin column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByXorigin(string|array<string> $xorigin) Return ChildInvsearch objects filtered by the xorigin column
 * @method     ChildInvsearch[]|Collection findByItemtype(string|array<string> $itemtype) Return ChildInvsearch objects filtered by the itemtype column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByItemtype(string|array<string> $itemtype) Return ChildInvsearch objects filtered by the itemtype column
 * @method     ChildInvsearch[]|Collection findByLotserial(string|array<string> $lotserial) Return ChildInvsearch objects filtered by the lotserial column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByLotserial(string|array<string> $lotserial) Return ChildInvsearch objects filtered by the lotserial column
 * @method     ChildInvsearch[]|Collection findByLotreference(string|array<string> $lotreference) Return ChildInvsearch objects filtered by the lotreference column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByLotreference(string|array<string> $lotreference) Return ChildInvsearch objects filtered by the lotreference column
 * @method     ChildInvsearch[]|Collection findByExpirationdate(int|array<int> $expirationdate) Return ChildInvsearch objects filtered by the expirationdate column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByExpirationdate(int|array<int> $expirationdate) Return ChildInvsearch objects filtered by the expirationdate column
 * @method     ChildInvsearch[]|Collection findByDesc1(string|array<string> $desc1) Return ChildInvsearch objects filtered by the desc1 column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByDesc1(string|array<string> $desc1) Return ChildInvsearch objects filtered by the desc1 column
 * @method     ChildInvsearch[]|Collection findByDesc2(string|array<string> $desc2) Return ChildInvsearch objects filtered by the desc2 column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByDesc2(string|array<string> $desc2) Return ChildInvsearch objects filtered by the desc2 column
 * @method     ChildInvsearch[]|Collection findByPrimebin(string|array<string> $primebin) Return ChildInvsearch objects filtered by the primebin column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByPrimebin(string|array<string> $primebin) Return ChildInvsearch objects filtered by the primebin column
 * @method     ChildInvsearch[]|Collection findByBin(string|array<string> $bin) Return ChildInvsearch objects filtered by the bin column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByBin(string|array<string> $bin) Return ChildInvsearch objects filtered by the bin column
 * @method     ChildInvsearch[]|Collection findByQty(string|array<string> $qty) Return ChildInvsearch objects filtered by the qty column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByQty(string|array<string> $qty) Return ChildInvsearch objects filtered by the qty column
 * @method     ChildInvsearch[]|Collection findByDate(int|array<int> $date) Return ChildInvsearch objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByDate(int|array<int> $date) Return ChildInvsearch objects filtered by the date column
 * @method     ChildInvsearch[]|Collection findByTime(int|array<int> $time) Return ChildInvsearch objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByTime(int|array<int> $time) Return ChildInvsearch objects filtered by the time column
 * @method     ChildInvsearch[]|Collection findByDummy(string|array<string> $dummy) Return ChildInvsearch objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildInvsearch> findByDummy(string|array<string> $dummy) Return ChildInvsearch objects filtered by the dummy column
 *
 * @method     ChildInvsearch[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildInvsearch> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class InvsearchQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InvsearchQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Invsearch', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInvsearchQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInvsearchQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildInvsearchQuery) {
            return $criteria;
        }
        $query = new ChildInvsearchQuery();
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
     * @param array[$sessionid, $recno, $itemid] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInvsearch|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InvsearchTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InvsearchTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildInvsearch A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, itemid, xitemid, xorigin, itemtype, lotserial, lotreference, expirationdate, desc1, desc2, primebin, bin, qty, date, time, dummy FROM invsearch WHERE sessionid = :p0 AND recno = :p1 AND itemid = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInvsearch $obj */
            $obj = new ChildInvsearch();
            $obj->hydrate($row);
            InvsearchTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildInvsearch|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(InvsearchTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InvsearchTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(InvsearchTableMap::COL_ITEMID, $key[2], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(InvsearchTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InvsearchTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(InvsearchTableMap::COL_ITEMID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
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

        $this->addUsingAlias(InvsearchTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(InvsearchTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(InvsearchTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_RECNO, $recno, $comparison);

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

        $this->addUsingAlias(InvsearchTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the xitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByXitemid('fooValue');   // WHERE xitemid = 'fooValue'
     * $query->filterByXitemid('%fooValue%', Criteria::LIKE); // WHERE xitemid LIKE '%fooValue%'
     * $query->filterByXitemid(['foo', 'bar']); // WHERE xitemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $xitemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByXitemid($xitemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xitemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_XITEMID, $xitemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the xorigin column
     *
     * Example usage:
     * <code>
     * $query->filterByXorigin('fooValue');   // WHERE xorigin = 'fooValue'
     * $query->filterByXorigin('%fooValue%', Criteria::LIKE); // WHERE xorigin LIKE '%fooValue%'
     * $query->filterByXorigin(['foo', 'bar']); // WHERE xorigin IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $xorigin The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByXorigin($xorigin = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xorigin)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_XORIGIN, $xorigin, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemtype column
     *
     * Example usage:
     * <code>
     * $query->filterByItemtype('fooValue');   // WHERE itemtype = 'fooValue'
     * $query->filterByItemtype('%fooValue%', Criteria::LIKE); // WHERE itemtype LIKE '%fooValue%'
     * $query->filterByItemtype(['foo', 'bar']); // WHERE itemtype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemtype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_ITEMTYPE, $itemtype, $comparison);

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

        $this->addUsingAlias(InvsearchTableMap::COL_LOTSERIAL, $lotserial, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lotreference column
     *
     * Example usage:
     * <code>
     * $query->filterByLotreference('fooValue');   // WHERE lotreference = 'fooValue'
     * $query->filterByLotreference('%fooValue%', Criteria::LIKE); // WHERE lotreference LIKE '%fooValue%'
     * $query->filterByLotreference(['foo', 'bar']); // WHERE lotreference IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lotreference The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLotreference($lotreference = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotreference)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_LOTREFERENCE, $lotreference, $comparison);

        return $this;
    }

    /**
     * Filter the query on the expirationdate column
     *
     * Example usage:
     * <code>
     * $query->filterByExpirationdate(1234); // WHERE expirationdate = 1234
     * $query->filterByExpirationdate(array(12, 34)); // WHERE expirationdate IN (12, 34)
     * $query->filterByExpirationdate(array('min' => 12)); // WHERE expirationdate > 12
     * </code>
     *
     * @param mixed $expirationdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByExpirationdate($expirationdate = null, ?string $comparison = null)
    {
        if (is_array($expirationdate)) {
            $useMinMax = false;
            if (isset($expirationdate['min'])) {
                $this->addUsingAlias(InvsearchTableMap::COL_EXPIRATIONDATE, $expirationdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expirationdate['max'])) {
                $this->addUsingAlias(InvsearchTableMap::COL_EXPIRATIONDATE, $expirationdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_EXPIRATIONDATE, $expirationdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc1('fooValue');   // WHERE desc1 = 'fooValue'
     * $query->filterByDesc1('%fooValue%', Criteria::LIKE); // WHERE desc1 LIKE '%fooValue%'
     * $query->filterByDesc1(['foo', 'bar']); // WHERE desc1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_DESC1, $desc1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc2('fooValue');   // WHERE desc2 = 'fooValue'
     * $query->filterByDesc2('%fooValue%', Criteria::LIKE); // WHERE desc2 LIKE '%fooValue%'
     * $query->filterByDesc2(['foo', 'bar']); // WHERE desc2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_DESC2, $desc2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the primebin column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimebin('fooValue');   // WHERE primebin = 'fooValue'
     * $query->filterByPrimebin('%fooValue%', Criteria::LIKE); // WHERE primebin LIKE '%fooValue%'
     * $query->filterByPrimebin(['foo', 'bar']); // WHERE primebin IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $primebin The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimebin($primebin = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primebin)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_PRIMEBIN, $primebin, $comparison);

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

        $this->addUsingAlias(InvsearchTableMap::COL_BIN, $bin, $comparison);

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
                $this->addUsingAlias(InvsearchTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(InvsearchTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_QTY, $qty, $comparison);

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
                $this->addUsingAlias(InvsearchTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(InvsearchTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(InvsearchTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(InvsearchTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(InvsearchTableMap::COL_TIME, $time, $comparison);

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

        $this->addUsingAlias(InvsearchTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildInvsearch $invsearch Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($invsearch = null)
    {
        if ($invsearch) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InvsearchTableMap::COL_SESSIONID), $invsearch->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InvsearchTableMap::COL_RECNO), $invsearch->getRecno(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(InvsearchTableMap::COL_ITEMID), $invsearch->getItemid(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the invsearch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvsearchTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InvsearchTableMap::clearInstancePool();
            InvsearchTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InvsearchTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InvsearchTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InvsearchTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InvsearchTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
