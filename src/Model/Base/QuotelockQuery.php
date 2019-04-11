<?php

namespace Base;

use \Quotelock as ChildQuotelock;
use \QuotelockQuery as ChildQuotelockQuery;
use \Exception;
use \PDO;
use Map\QuotelockTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'quotelock' table.
 *
 *
 *
 * @method     ChildQuotelockQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildQuotelockQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildQuotelockQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildQuotelockQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildQuotelockQuery orderByQuotenbr($order = Criteria::ASC) Order by the quotenbr column
 * @method     ChildQuotelockQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildQuotelockQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildQuotelockQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildQuotelockQuery groupBySessionid() Group by the sessionid column
 * @method     ChildQuotelockQuery groupByRecno() Group by the recno column
 * @method     ChildQuotelockQuery groupByDate() Group by the date column
 * @method     ChildQuotelockQuery groupByTime() Group by the time column
 * @method     ChildQuotelockQuery groupByQuotenbr() Group by the quotenbr column
 * @method     ChildQuotelockQuery groupByUserid() Group by the userid column
 * @method     ChildQuotelockQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildQuotelockQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildQuotelockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQuotelockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQuotelockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQuotelockQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQuotelockQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQuotelockQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQuotelock findOne(ConnectionInterface $con = null) Return the first ChildQuotelock matching the query
 * @method     ChildQuotelock findOneOrCreate(ConnectionInterface $con = null) Return the first ChildQuotelock matching the query, or a new ChildQuotelock object populated from the query conditions when no match is found
 *
 * @method     ChildQuotelock findOneBySessionid(string $sessionid) Return the first ChildQuotelock filtered by the sessionid column
 * @method     ChildQuotelock findOneByRecno(int $recno) Return the first ChildQuotelock filtered by the recno column
 * @method     ChildQuotelock findOneByDate(int $date) Return the first ChildQuotelock filtered by the date column
 * @method     ChildQuotelock findOneByTime(int $time) Return the first ChildQuotelock filtered by the time column
 * @method     ChildQuotelock findOneByQuotenbr(string $quotenbr) Return the first ChildQuotelock filtered by the quotenbr column
 * @method     ChildQuotelock findOneByUserid(string $userid) Return the first ChildQuotelock filtered by the userid column
 * @method     ChildQuotelock findOneByErrormsg(string $errormsg) Return the first ChildQuotelock filtered by the errormsg column
 * @method     ChildQuotelock findOneByDummy(string $dummy) Return the first ChildQuotelock filtered by the dummy column *

 * @method     ChildQuotelock requirePk($key, ConnectionInterface $con = null) Return the ChildQuotelock by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOne(ConnectionInterface $con = null) Return the first ChildQuotelock matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuotelock requireOneBySessionid(string $sessionid) Return the first ChildQuotelock filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByRecno(int $recno) Return the first ChildQuotelock filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByDate(int $date) Return the first ChildQuotelock filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByTime(int $time) Return the first ChildQuotelock filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByQuotenbr(string $quotenbr) Return the first ChildQuotelock filtered by the quotenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByUserid(string $userid) Return the first ChildQuotelock filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByErrormsg(string $errormsg) Return the first ChildQuotelock filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotelock requireOneByDummy(string $dummy) Return the first ChildQuotelock filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuotelock[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildQuotelock objects based on current ModelCriteria
 * @method     ChildQuotelock[]|ObjectCollection findBySessionid(string $sessionid) Return ChildQuotelock objects filtered by the sessionid column
 * @method     ChildQuotelock[]|ObjectCollection findByRecno(int $recno) Return ChildQuotelock objects filtered by the recno column
 * @method     ChildQuotelock[]|ObjectCollection findByDate(int $date) Return ChildQuotelock objects filtered by the date column
 * @method     ChildQuotelock[]|ObjectCollection findByTime(int $time) Return ChildQuotelock objects filtered by the time column
 * @method     ChildQuotelock[]|ObjectCollection findByQuotenbr(string $quotenbr) Return ChildQuotelock objects filtered by the quotenbr column
 * @method     ChildQuotelock[]|ObjectCollection findByUserid(string $userid) Return ChildQuotelock objects filtered by the userid column
 * @method     ChildQuotelock[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildQuotelock objects filtered by the errormsg column
 * @method     ChildQuotelock[]|ObjectCollection findByDummy(string $dummy) Return ChildQuotelock objects filtered by the dummy column
 * @method     ChildQuotelock[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class QuotelockQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\QuotelockQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Quotelock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQuotelockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQuotelockQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildQuotelockQuery) {
            return $criteria;
        }
        $query = new ChildQuotelockQuery();
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
     * @return ChildQuotelock|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuotelockTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QuotelockTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildQuotelock A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, quotenbr, userid, errormsg, dummy FROM quotelock WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildQuotelock $obj */
            $obj = new ChildQuotelock();
            $obj->hydrate($row);
            QuotelockTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildQuotelock|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(QuotelockTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(QuotelockTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(QuotelockTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(QuotelockTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(QuotelockTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(QuotelockTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(QuotelockTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(QuotelockTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(QuotelockTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(QuotelockTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the quotenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotenbr('fooValue');   // WHERE quotenbr = 'fooValue'
     * $query->filterByQuotenbr('%fooValue%', Criteria::LIKE); // WHERE quotenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByQuotenbr($quotenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_QUOTENBR, $quotenbr, $comparison);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid('fooValue');   // WHERE userid = 'fooValue'
     * $query->filterByUserid('%fooValue%', Criteria::LIKE); // WHERE userid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_USERID, $userid, $comparison);
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_ERRORMSG, $errormsg, $comparison);
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
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotelockTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildQuotelock $quotelock Object to remove from the list of results
     *
     * @return $this|ChildQuotelockQuery The current query, for fluid interface
     */
    public function prune($quotelock = null)
    {
        if ($quotelock) {
            $this->addCond('pruneCond0', $this->getAliasedColName(QuotelockTableMap::COL_SESSIONID), $quotelock->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(QuotelockTableMap::COL_RECNO), $quotelock->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the quotelock table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotelockTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QuotelockTableMap::clearInstancePool();
            QuotelockTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(QuotelockTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QuotelockTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QuotelockTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QuotelockTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // QuotelockQuery
