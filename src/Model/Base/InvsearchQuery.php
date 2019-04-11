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
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'invsearch' table.
 *
 *
 *
 * @method     ChildInvsearchQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildInvsearchQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildInvsearchQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildInvsearchQuery orderByXitemid($order = Criteria::ASC) Order by the xitemid column
 * @method     ChildInvsearchQuery orderByXorigin($order = Criteria::ASC) Order by the xorigin column
 * @method     ChildInvsearchQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildInvsearchQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
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
 * @method     ChildInvsearch findOne(ConnectionInterface $con = null) Return the first ChildInvsearch matching the query
 * @method     ChildInvsearch findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInvsearch matching the query, or a new ChildInvsearch object populated from the query conditions when no match is found
 *
 * @method     ChildInvsearch findOneBySessionid(string $sessionid) Return the first ChildInvsearch filtered by the sessionid column
 * @method     ChildInvsearch findOneByRecno(int $recno) Return the first ChildInvsearch filtered by the recno column
 * @method     ChildInvsearch findOneByItemid(string $itemid) Return the first ChildInvsearch filtered by the itemid column
 * @method     ChildInvsearch findOneByXitemid(string $xitemid) Return the first ChildInvsearch filtered by the xitemid column
 * @method     ChildInvsearch findOneByXorigin(string $xorigin) Return the first ChildInvsearch filtered by the xorigin column
 * @method     ChildInvsearch findOneByItemtype(string $itemtype) Return the first ChildInvsearch filtered by the itemtype column
 * @method     ChildInvsearch findOneByLotserial(string $lotserial) Return the first ChildInvsearch filtered by the lotserial column
 * @method     ChildInvsearch findOneByDesc1(string $desc1) Return the first ChildInvsearch filtered by the desc1 column
 * @method     ChildInvsearch findOneByDesc2(string $desc2) Return the first ChildInvsearch filtered by the desc2 column
 * @method     ChildInvsearch findOneByPrimebin(string $primebin) Return the first ChildInvsearch filtered by the primebin column
 * @method     ChildInvsearch findOneByBin(string $bin) Return the first ChildInvsearch filtered by the bin column
 * @method     ChildInvsearch findOneByQty(int $qty) Return the first ChildInvsearch filtered by the qty column
 * @method     ChildInvsearch findOneByDate(int $date) Return the first ChildInvsearch filtered by the date column
 * @method     ChildInvsearch findOneByTime(int $time) Return the first ChildInvsearch filtered by the time column
 * @method     ChildInvsearch findOneByDummy(string $dummy) Return the first ChildInvsearch filtered by the dummy column *

 * @method     ChildInvsearch requirePk($key, ConnectionInterface $con = null) Return the ChildInvsearch by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOne(ConnectionInterface $con = null) Return the first ChildInvsearch matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvsearch requireOneBySessionid(string $sessionid) Return the first ChildInvsearch filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByRecno(int $recno) Return the first ChildInvsearch filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByItemid(string $itemid) Return the first ChildInvsearch filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByXitemid(string $xitemid) Return the first ChildInvsearch filtered by the xitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByXorigin(string $xorigin) Return the first ChildInvsearch filtered by the xorigin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByItemtype(string $itemtype) Return the first ChildInvsearch filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByLotserial(string $lotserial) Return the first ChildInvsearch filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDesc1(string $desc1) Return the first ChildInvsearch filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDesc2(string $desc2) Return the first ChildInvsearch filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByPrimebin(string $primebin) Return the first ChildInvsearch filtered by the primebin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByBin(string $bin) Return the first ChildInvsearch filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByQty(int $qty) Return the first ChildInvsearch filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDate(int $date) Return the first ChildInvsearch filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByTime(int $time) Return the first ChildInvsearch filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvsearch requireOneByDummy(string $dummy) Return the first ChildInvsearch filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvsearch[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInvsearch objects based on current ModelCriteria
 * @method     ChildInvsearch[]|ObjectCollection findBySessionid(string $sessionid) Return ChildInvsearch objects filtered by the sessionid column
 * @method     ChildInvsearch[]|ObjectCollection findByRecno(int $recno) Return ChildInvsearch objects filtered by the recno column
 * @method     ChildInvsearch[]|ObjectCollection findByItemid(string $itemid) Return ChildInvsearch objects filtered by the itemid column
 * @method     ChildInvsearch[]|ObjectCollection findByXitemid(string $xitemid) Return ChildInvsearch objects filtered by the xitemid column
 * @method     ChildInvsearch[]|ObjectCollection findByXorigin(string $xorigin) Return ChildInvsearch objects filtered by the xorigin column
 * @method     ChildInvsearch[]|ObjectCollection findByItemtype(string $itemtype) Return ChildInvsearch objects filtered by the itemtype column
 * @method     ChildInvsearch[]|ObjectCollection findByLotserial(string $lotserial) Return ChildInvsearch objects filtered by the lotserial column
 * @method     ChildInvsearch[]|ObjectCollection findByDesc1(string $desc1) Return ChildInvsearch objects filtered by the desc1 column
 * @method     ChildInvsearch[]|ObjectCollection findByDesc2(string $desc2) Return ChildInvsearch objects filtered by the desc2 column
 * @method     ChildInvsearch[]|ObjectCollection findByPrimebin(string $primebin) Return ChildInvsearch objects filtered by the primebin column
 * @method     ChildInvsearch[]|ObjectCollection findByBin(string $bin) Return ChildInvsearch objects filtered by the bin column
 * @method     ChildInvsearch[]|ObjectCollection findByQty(int $qty) Return ChildInvsearch objects filtered by the qty column
 * @method     ChildInvsearch[]|ObjectCollection findByDate(int $date) Return ChildInvsearch objects filtered by the date column
 * @method     ChildInvsearch[]|ObjectCollection findByTime(int $time) Return ChildInvsearch objects filtered by the time column
 * @method     ChildInvsearch[]|ObjectCollection findByDummy(string $dummy) Return ChildInvsearch objects filtered by the dummy column
 * @method     ChildInvsearch[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InvsearchQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InvsearchQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Invsearch', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInvsearchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInvsearchQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
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
    public function findPk($key, ConnectionInterface $con = null)
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
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInvsearch A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, itemid, xitemid, xorigin, itemtype, lotserial, desc1, desc2, primebin, bin, qty, date, time, dummy FROM invsearch WHERE sessionid = :p0 AND recno = :p1 AND itemid = :p2';
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
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
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
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
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
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
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
     * </code>
     *
     * @param     string $sessionid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
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

        return $this->addUsingAlias(InvsearchTableMap::COL_RECNO, $recno, $comparison);
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the xitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByXitemid('fooValue');   // WHERE xitemid = 'fooValue'
     * $query->filterByXitemid('%fooValue%', Criteria::LIKE); // WHERE xitemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xitemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByXitemid($xitemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xitemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_XITEMID, $xitemid, $comparison);
    }

    /**
     * Filter the query on the xorigin column
     *
     * Example usage:
     * <code>
     * $query->filterByXorigin('fooValue');   // WHERE xorigin = 'fooValue'
     * $query->filterByXorigin('%fooValue%', Criteria::LIKE); // WHERE xorigin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xorigin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByXorigin($xorigin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xorigin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_XORIGIN, $xorigin, $comparison);
    }

    /**
     * Filter the query on the itemtype column
     *
     * Example usage:
     * <code>
     * $query->filterByItemtype('fooValue');   // WHERE itemtype = 'fooValue'
     * $query->filterByItemtype('%fooValue%', Criteria::LIKE); // WHERE itemtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_ITEMTYPE, $itemtype, $comparison);
    }

    /**
     * Filter the query on the lotserial column
     *
     * Example usage:
     * <code>
     * $query->filterByLotserial('fooValue');   // WHERE lotserial = 'fooValue'
     * $query->filterByLotserial('%fooValue%', Criteria::LIKE); // WHERE lotserial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lotserial The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_LOTSERIAL, $lotserial, $comparison);
    }

    /**
     * Filter the query on the desc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc1('fooValue');   // WHERE desc1 = 'fooValue'
     * $query->filterByDesc1('%fooValue%', Criteria::LIKE); // WHERE desc1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_DESC1, $desc1, $comparison);
    }

    /**
     * Filter the query on the desc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc2('fooValue');   // WHERE desc2 = 'fooValue'
     * $query->filterByDesc2('%fooValue%', Criteria::LIKE); // WHERE desc2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_DESC2, $desc2, $comparison);
    }

    /**
     * Filter the query on the primebin column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimebin('fooValue');   // WHERE primebin = 'fooValue'
     * $query->filterByPrimebin('%fooValue%', Criteria::LIKE); // WHERE primebin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $primebin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByPrimebin($primebin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primebin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_PRIMEBIN, $primebin, $comparison);
    }

    /**
     * Filter the query on the bin column
     *
     * Example usage:
     * <code>
     * $query->filterByBin('fooValue');   // WHERE bin = 'fooValue'
     * $query->filterByBin('%fooValue%', Criteria::LIKE); // WHERE bin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByBin($bin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_BIN, $bin, $comparison);
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
     * @param     mixed $qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
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

        return $this->addUsingAlias(InvsearchTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
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

        return $this->addUsingAlias(InvsearchTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
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

        return $this->addUsingAlias(InvsearchTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvsearchTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInvsearch $invsearch Object to remove from the list of results
     *
     * @return $this|ChildInvsearchQuery The current query, for fluid interface
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
    public function doDeleteAll(ConnectionInterface $con = null)
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
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
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

} // InvsearchQuery
