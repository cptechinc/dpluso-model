<?php

namespace Base;

use \Itemstock as ChildItemstock;
use \ItemstockQuery as ChildItemstockQuery;
use \Exception;
use \PDO;
use Map\ItemstockTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'itemstock' table.
 *
 *
 *
 * @method     ChildItemstockQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildItemstockQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildItemstockQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildItemstockQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildItemstockQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildItemstockQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildItemstockQuery orderByOhhand($order = Criteria::ASC) Order by the ohhand column
 * @method     ChildItemstockQuery orderByCommitted($order = Criteria::ASC) Order by the committed column
 * @method     ChildItemstockQuery orderByOnorder($order = Criteria::ASC) Order by the onorder column
 * @method     ChildItemstockQuery orderByAvailable($order = Criteria::ASC) Order by the available column
 * @method     ChildItemstockQuery orderByEta($order = Criteria::ASC) Order by the eta column
 * @method     ChildItemstockQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildItemstockQuery groupBySessionid() Group by the sessionid column
 * @method     ChildItemstockQuery groupByRecno() Group by the recno column
 * @method     ChildItemstockQuery groupByDate() Group by the date column
 * @method     ChildItemstockQuery groupByTime() Group by the time column
 * @method     ChildItemstockQuery groupByItemid() Group by the itemid column
 * @method     ChildItemstockQuery groupByWhse() Group by the whse column
 * @method     ChildItemstockQuery groupByOhhand() Group by the ohhand column
 * @method     ChildItemstockQuery groupByCommitted() Group by the committed column
 * @method     ChildItemstockQuery groupByOnorder() Group by the onorder column
 * @method     ChildItemstockQuery groupByAvailable() Group by the available column
 * @method     ChildItemstockQuery groupByEta() Group by the eta column
 * @method     ChildItemstockQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildItemstockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemstockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemstockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemstockQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemstockQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemstockQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemstock findOne(ConnectionInterface $con = null) Return the first ChildItemstock matching the query
 * @method     ChildItemstock findOneOrCreate(ConnectionInterface $con = null) Return the first ChildItemstock matching the query, or a new ChildItemstock object populated from the query conditions when no match is found
 *
 * @method     ChildItemstock findOneBySessionid(string $sessionid) Return the first ChildItemstock filtered by the sessionid column
 * @method     ChildItemstock findOneByRecno(int $recno) Return the first ChildItemstock filtered by the recno column
 * @method     ChildItemstock findOneByDate(int $date) Return the first ChildItemstock filtered by the date column
 * @method     ChildItemstock findOneByTime(int $time) Return the first ChildItemstock filtered by the time column
 * @method     ChildItemstock findOneByItemid(string $itemid) Return the first ChildItemstock filtered by the itemid column
 * @method     ChildItemstock findOneByWhse(string $whse) Return the first ChildItemstock filtered by the whse column
 * @method     ChildItemstock findOneByOhhand(string $ohhand) Return the first ChildItemstock filtered by the ohhand column
 * @method     ChildItemstock findOneByCommitted(string $committed) Return the first ChildItemstock filtered by the committed column
 * @method     ChildItemstock findOneByOnorder(string $onorder) Return the first ChildItemstock filtered by the onorder column
 * @method     ChildItemstock findOneByAvailable(string $available) Return the first ChildItemstock filtered by the available column
 * @method     ChildItemstock findOneByEta(string $eta) Return the first ChildItemstock filtered by the eta column
 * @method     ChildItemstock findOneByDummy(string $dummy) Return the first ChildItemstock filtered by the dummy column *

 * @method     ChildItemstock requirePk($key, ConnectionInterface $con = null) Return the ChildItemstock by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOne(ConnectionInterface $con = null) Return the first ChildItemstock matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemstock requireOneBySessionid(string $sessionid) Return the first ChildItemstock filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByRecno(int $recno) Return the first ChildItemstock filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByDate(int $date) Return the first ChildItemstock filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByTime(int $time) Return the first ChildItemstock filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByItemid(string $itemid) Return the first ChildItemstock filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByWhse(string $whse) Return the first ChildItemstock filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByOhhand(string $ohhand) Return the first ChildItemstock filtered by the ohhand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByCommitted(string $committed) Return the first ChildItemstock filtered by the committed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByOnorder(string $onorder) Return the first ChildItemstock filtered by the onorder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByAvailable(string $available) Return the first ChildItemstock filtered by the available column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByEta(string $eta) Return the first ChildItemstock filtered by the eta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemstock requireOneByDummy(string $dummy) Return the first ChildItemstock filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemstock[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildItemstock objects based on current ModelCriteria
 * @method     ChildItemstock[]|ObjectCollection findBySessionid(string $sessionid) Return ChildItemstock objects filtered by the sessionid column
 * @method     ChildItemstock[]|ObjectCollection findByRecno(int $recno) Return ChildItemstock objects filtered by the recno column
 * @method     ChildItemstock[]|ObjectCollection findByDate(int $date) Return ChildItemstock objects filtered by the date column
 * @method     ChildItemstock[]|ObjectCollection findByTime(int $time) Return ChildItemstock objects filtered by the time column
 * @method     ChildItemstock[]|ObjectCollection findByItemid(string $itemid) Return ChildItemstock objects filtered by the itemid column
 * @method     ChildItemstock[]|ObjectCollection findByWhse(string $whse) Return ChildItemstock objects filtered by the whse column
 * @method     ChildItemstock[]|ObjectCollection findByOhhand(string $ohhand) Return ChildItemstock objects filtered by the ohhand column
 * @method     ChildItemstock[]|ObjectCollection findByCommitted(string $committed) Return ChildItemstock objects filtered by the committed column
 * @method     ChildItemstock[]|ObjectCollection findByOnorder(string $onorder) Return ChildItemstock objects filtered by the onorder column
 * @method     ChildItemstock[]|ObjectCollection findByAvailable(string $available) Return ChildItemstock objects filtered by the available column
 * @method     ChildItemstock[]|ObjectCollection findByEta(string $eta) Return ChildItemstock objects filtered by the eta column
 * @method     ChildItemstock[]|ObjectCollection findByDummy(string $dummy) Return ChildItemstock objects filtered by the dummy column
 * @method     ChildItemstock[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ItemstockQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemstockQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Itemstock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemstockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemstockQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildItemstockQuery) {
            return $criteria;
        }
        $query = new ChildItemstockQuery();
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
     * @return ChildItemstock|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemstockTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ItemstockTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildItemstock A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, itemid, whse, ohhand, committed, onorder, available, eta, dummy FROM itemstock WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildItemstock $obj */
            $obj = new ChildItemstock();
            $obj->hydrate($row);
            ItemstockTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildItemstock|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ItemstockTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ItemstockTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ItemstockTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ItemstockTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(ItemstockTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(ItemstockTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ItemstockTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ItemstockTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(ItemstockTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ItemstockTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_WHSE, $whse, $comparison);
    }

    /**
     * Filter the query on the ohhand column
     *
     * Example usage:
     * <code>
     * $query->filterByOhhand('fooValue');   // WHERE ohhand = 'fooValue'
     * $query->filterByOhhand('%fooValue%', Criteria::LIKE); // WHERE ohhand LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ohhand The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByOhhand($ohhand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ohhand)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_OHHAND, $ohhand, $comparison);
    }

    /**
     * Filter the query on the committed column
     *
     * Example usage:
     * <code>
     * $query->filterByCommitted('fooValue');   // WHERE committed = 'fooValue'
     * $query->filterByCommitted('%fooValue%', Criteria::LIKE); // WHERE committed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $committed The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByCommitted($committed = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($committed)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_COMMITTED, $committed, $comparison);
    }

    /**
     * Filter the query on the onorder column
     *
     * Example usage:
     * <code>
     * $query->filterByOnorder('fooValue');   // WHERE onorder = 'fooValue'
     * $query->filterByOnorder('%fooValue%', Criteria::LIKE); // WHERE onorder LIKE '%fooValue%'
     * </code>
     *
     * @param     string $onorder The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByOnorder($onorder = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($onorder)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_ONORDER, $onorder, $comparison);
    }

    /**
     * Filter the query on the available column
     *
     * Example usage:
     * <code>
     * $query->filterByAvailable('fooValue');   // WHERE available = 'fooValue'
     * $query->filterByAvailable('%fooValue%', Criteria::LIKE); // WHERE available LIKE '%fooValue%'
     * </code>
     *
     * @param     string $available The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByAvailable($available = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($available)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_AVAILABLE, $available, $comparison);
    }

    /**
     * Filter the query on the eta column
     *
     * Example usage:
     * <code>
     * $query->filterByEta('fooValue');   // WHERE eta = 'fooValue'
     * $query->filterByEta('%fooValue%', Criteria::LIKE); // WHERE eta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eta The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByEta($eta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eta)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_ETA, $eta, $comparison);
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
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemstockTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildItemstock $itemstock Object to remove from the list of results
     *
     * @return $this|ChildItemstockQuery The current query, for fluid interface
     */
    public function prune($itemstock = null)
    {
        if ($itemstock) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ItemstockTableMap::COL_SESSIONID), $itemstock->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ItemstockTableMap::COL_RECNO), $itemstock->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the itemstock table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemstockTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemstockTableMap::clearInstancePool();
            ItemstockTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemstockTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemstockTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemstockTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemstockTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ItemstockQuery
