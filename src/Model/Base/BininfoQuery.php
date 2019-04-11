<?php

namespace Base;

use \Bininfo as ChildBininfo;
use \BininfoQuery as ChildBininfoQuery;
use \Exception;
use \PDO;
use Map\BininfoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bininfo' table.
 *
 *
 *
 * @method     ChildBininfoQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildBininfoQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildBininfoQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBininfoQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildBininfoQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildBininfoQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildBininfoQuery orderByLotserial($order = Criteria::ASC) Order by the lotserial column
 * @method     ChildBininfoQuery orderByBin($order = Criteria::ASC) Order by the bin column
 * @method     ChildBininfoQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildBininfoQuery orderByLotref($order = Criteria::ASC) Order by the lotref column
 * @method     ChildBininfoQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildBininfoQuery groupBySessionid() Group by the sessionid column
 * @method     ChildBininfoQuery groupByRecno() Group by the recno column
 * @method     ChildBininfoQuery groupByDate() Group by the date column
 * @method     ChildBininfoQuery groupByTime() Group by the time column
 * @method     ChildBininfoQuery groupByItemid() Group by the itemid column
 * @method     ChildBininfoQuery groupByWhse() Group by the whse column
 * @method     ChildBininfoQuery groupByLotserial() Group by the lotserial column
 * @method     ChildBininfoQuery groupByBin() Group by the bin column
 * @method     ChildBininfoQuery groupByQty() Group by the qty column
 * @method     ChildBininfoQuery groupByLotref() Group by the lotref column
 * @method     ChildBininfoQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildBininfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBininfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBininfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBininfoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBininfoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBininfoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBininfo findOne(ConnectionInterface $con = null) Return the first ChildBininfo matching the query
 * @method     ChildBininfo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBininfo matching the query, or a new ChildBininfo object populated from the query conditions when no match is found
 *
 * @method     ChildBininfo findOneBySessionid(string $sessionid) Return the first ChildBininfo filtered by the sessionid column
 * @method     ChildBininfo findOneByRecno(int $recno) Return the first ChildBininfo filtered by the recno column
 * @method     ChildBininfo findOneByDate(int $date) Return the first ChildBininfo filtered by the date column
 * @method     ChildBininfo findOneByTime(int $time) Return the first ChildBininfo filtered by the time column
 * @method     ChildBininfo findOneByItemid(string $itemid) Return the first ChildBininfo filtered by the itemid column
 * @method     ChildBininfo findOneByWhse(string $whse) Return the first ChildBininfo filtered by the whse column
 * @method     ChildBininfo findOneByLotserial(string $lotserial) Return the first ChildBininfo filtered by the lotserial column
 * @method     ChildBininfo findOneByBin(string $bin) Return the first ChildBininfo filtered by the bin column
 * @method     ChildBininfo findOneByQty(string $qty) Return the first ChildBininfo filtered by the qty column
 * @method     ChildBininfo findOneByLotref(string $lotref) Return the first ChildBininfo filtered by the lotref column
 * @method     ChildBininfo findOneByDummy(string $dummy) Return the first ChildBininfo filtered by the dummy column *

 * @method     ChildBininfo requirePk($key, ConnectionInterface $con = null) Return the ChildBininfo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOne(ConnectionInterface $con = null) Return the first ChildBininfo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBininfo requireOneBySessionid(string $sessionid) Return the first ChildBininfo filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByRecno(int $recno) Return the first ChildBininfo filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByDate(int $date) Return the first ChildBininfo filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByTime(int $time) Return the first ChildBininfo filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByItemid(string $itemid) Return the first ChildBininfo filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByWhse(string $whse) Return the first ChildBininfo filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByLotserial(string $lotserial) Return the first ChildBininfo filtered by the lotserial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByBin(string $bin) Return the first ChildBininfo filtered by the bin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByQty(string $qty) Return the first ChildBininfo filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByLotref(string $lotref) Return the first ChildBininfo filtered by the lotref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBininfo requireOneByDummy(string $dummy) Return the first ChildBininfo filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBininfo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBininfo objects based on current ModelCriteria
 * @method     ChildBininfo[]|ObjectCollection findBySessionid(string $sessionid) Return ChildBininfo objects filtered by the sessionid column
 * @method     ChildBininfo[]|ObjectCollection findByRecno(int $recno) Return ChildBininfo objects filtered by the recno column
 * @method     ChildBininfo[]|ObjectCollection findByDate(int $date) Return ChildBininfo objects filtered by the date column
 * @method     ChildBininfo[]|ObjectCollection findByTime(int $time) Return ChildBininfo objects filtered by the time column
 * @method     ChildBininfo[]|ObjectCollection findByItemid(string $itemid) Return ChildBininfo objects filtered by the itemid column
 * @method     ChildBininfo[]|ObjectCollection findByWhse(string $whse) Return ChildBininfo objects filtered by the whse column
 * @method     ChildBininfo[]|ObjectCollection findByLotserial(string $lotserial) Return ChildBininfo objects filtered by the lotserial column
 * @method     ChildBininfo[]|ObjectCollection findByBin(string $bin) Return ChildBininfo objects filtered by the bin column
 * @method     ChildBininfo[]|ObjectCollection findByQty(string $qty) Return ChildBininfo objects filtered by the qty column
 * @method     ChildBininfo[]|ObjectCollection findByLotref(string $lotref) Return ChildBininfo objects filtered by the lotref column
 * @method     ChildBininfo[]|ObjectCollection findByDummy(string $dummy) Return ChildBininfo objects filtered by the dummy column
 * @method     ChildBininfo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BininfoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BininfoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Bininfo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBininfoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBininfoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBininfoQuery) {
            return $criteria;
        }
        $query = new ChildBininfoQuery();
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
     * @return ChildBininfo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BininfoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BininfoTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildBininfo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, itemid, whse, lotserial, bin, qty, lotref, dummy FROM bininfo WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildBininfo $obj */
            $obj = new ChildBininfo();
            $obj->hydrate($row);
            BininfoTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildBininfo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BininfoTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BininfoTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BininfoTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BininfoTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(BininfoTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(BininfoTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BininfoTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BininfoTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(BininfoTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(BininfoTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_WHSE, $whse, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByLotserial($lotserial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotserial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_LOTSERIAL, $lotserial, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByBin($bin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_BIN, $bin, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty('fooValue');   // WHERE qty = 'fooValue'
     * $query->filterByQty('%fooValue%', Criteria::LIKE); // WHERE qty LIKE '%fooValue%'
     * </code>
     *
     * @param     string $qty The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qty)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the lotref column
     *
     * Example usage:
     * <code>
     * $query->filterByLotref('fooValue');   // WHERE lotref = 'fooValue'
     * $query->filterByLotref('%fooValue%', Criteria::LIKE); // WHERE lotref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lotref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByLotref($lotref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lotref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_LOTREF, $lotref, $comparison);
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
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BininfoTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBininfo $bininfo Object to remove from the list of results
     *
     * @return $this|ChildBininfoQuery The current query, for fluid interface
     */
    public function prune($bininfo = null)
    {
        if ($bininfo) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BininfoTableMap::COL_SESSIONID), $bininfo->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BininfoTableMap::COL_RECNO), $bininfo->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bininfo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BininfoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BininfoTableMap::clearInstancePool();
            BininfoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BininfoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BininfoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BininfoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BininfoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BininfoQuery
