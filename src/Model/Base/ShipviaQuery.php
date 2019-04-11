<?php

namespace Base;

use \Shipvia as ChildShipvia;
use \ShipviaQuery as ChildShipviaQuery;
use \Exception;
use \PDO;
use Map\ShipviaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'shipvia' table.
 *
 *
 *
 * @method     ChildShipviaQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildShipviaQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildShipviaQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildShipviaQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildShipviaQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildShipviaQuery orderByVia($order = Criteria::ASC) Order by the via column
 * @method     ChildShipviaQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildShipviaQuery groupBySessionid() Group by the sessionid column
 * @method     ChildShipviaQuery groupByRecno() Group by the recno column
 * @method     ChildShipviaQuery groupByDate() Group by the date column
 * @method     ChildShipviaQuery groupByTime() Group by the time column
 * @method     ChildShipviaQuery groupByCode() Group by the code column
 * @method     ChildShipviaQuery groupByVia() Group by the via column
 * @method     ChildShipviaQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildShipviaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildShipviaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildShipviaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildShipviaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildShipviaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildShipviaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildShipvia findOne(ConnectionInterface $con = null) Return the first ChildShipvia matching the query
 * @method     ChildShipvia findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShipvia matching the query, or a new ChildShipvia object populated from the query conditions when no match is found
 *
 * @method     ChildShipvia findOneBySessionid(string $sessionid) Return the first ChildShipvia filtered by the sessionid column
 * @method     ChildShipvia findOneByRecno(int $recno) Return the first ChildShipvia filtered by the recno column
 * @method     ChildShipvia findOneByDate(string $date) Return the first ChildShipvia filtered by the date column
 * @method     ChildShipvia findOneByTime(string $time) Return the first ChildShipvia filtered by the time column
 * @method     ChildShipvia findOneByCode(string $code) Return the first ChildShipvia filtered by the code column
 * @method     ChildShipvia findOneByVia(string $via) Return the first ChildShipvia filtered by the via column
 * @method     ChildShipvia findOneByDummy(string $dummy) Return the first ChildShipvia filtered by the dummy column *

 * @method     ChildShipvia requirePk($key, ConnectionInterface $con = null) Return the ChildShipvia by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOne(ConnectionInterface $con = null) Return the first ChildShipvia matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipvia requireOneBySessionid(string $sessionid) Return the first ChildShipvia filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOneByRecno(int $recno) Return the first ChildShipvia filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOneByDate(string $date) Return the first ChildShipvia filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOneByTime(string $time) Return the first ChildShipvia filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOneByCode(string $code) Return the first ChildShipvia filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOneByVia(string $via) Return the first ChildShipvia filtered by the via column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipvia requireOneByDummy(string $dummy) Return the first ChildShipvia filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipvia[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShipvia objects based on current ModelCriteria
 * @method     ChildShipvia[]|ObjectCollection findBySessionid(string $sessionid) Return ChildShipvia objects filtered by the sessionid column
 * @method     ChildShipvia[]|ObjectCollection findByRecno(int $recno) Return ChildShipvia objects filtered by the recno column
 * @method     ChildShipvia[]|ObjectCollection findByDate(string $date) Return ChildShipvia objects filtered by the date column
 * @method     ChildShipvia[]|ObjectCollection findByTime(string $time) Return ChildShipvia objects filtered by the time column
 * @method     ChildShipvia[]|ObjectCollection findByCode(string $code) Return ChildShipvia objects filtered by the code column
 * @method     ChildShipvia[]|ObjectCollection findByVia(string $via) Return ChildShipvia objects filtered by the via column
 * @method     ChildShipvia[]|ObjectCollection findByDummy(string $dummy) Return ChildShipvia objects filtered by the dummy column
 * @method     ChildShipvia[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ShipviaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ShipviaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Shipvia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildShipviaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildShipviaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildShipviaQuery) {
            return $criteria;
        }
        $query = new ChildShipviaQuery();
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
     * @return ChildShipvia|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ShipviaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ShipviaTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildShipvia A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, code, via, dummy FROM shipvia WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildShipvia $obj */
            $obj = new ChildShipvia();
            $obj->hydrate($row);
            ShipviaTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildShipvia|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ShipviaTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ShipviaTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ShipviaTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ShipviaTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(ShipviaTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(ShipviaTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_RECNO, $recno, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $date The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('fooValue');   // WHERE time = 'fooValue'
     * $query->filterByTime('%fooValue%', Criteria::LIKE); // WHERE time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $time The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($time)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the via column
     *
     * Example usage:
     * <code>
     * $query->filterByVia('fooValue');   // WHERE via = 'fooValue'
     * $query->filterByVia('%fooValue%', Criteria::LIKE); // WHERE via LIKE '%fooValue%'
     * </code>
     *
     * @param     string $via The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByVia($via = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($via)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_VIA, $via, $comparison);
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
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipviaTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildShipvia $shipvia Object to remove from the list of results
     *
     * @return $this|ChildShipviaQuery The current query, for fluid interface
     */
    public function prune($shipvia = null)
    {
        if ($shipvia) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ShipviaTableMap::COL_SESSIONID), $shipvia->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ShipviaTableMap::COL_RECNO), $shipvia->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the shipvia table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShipviaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShipviaTableMap::clearInstancePool();
            ShipviaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ShipviaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ShipviaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ShipviaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ShipviaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ShipviaQuery
