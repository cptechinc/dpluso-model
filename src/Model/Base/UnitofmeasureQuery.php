<?php

namespace Base;

use \Unitofmeasure as ChildUnitofmeasure;
use \UnitofmeasureQuery as ChildUnitofmeasureQuery;
use \Exception;
use \PDO;
use Map\UnitofmeasureTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'unitofmeasure' table.
 *
 *
 *
 * @method     ChildUnitofmeasureQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildUnitofmeasureQuery orderByDesc($order = Criteria::ASC) Order by the desc column
 * @method     ChildUnitofmeasureQuery orderByConversion($order = Criteria::ASC) Order by the conversion column
 * @method     ChildUnitofmeasureQuery orderByCreatedate($order = Criteria::ASC) Order by the createdate column
 * @method     ChildUnitofmeasureQuery orderByCreatetime($order = Criteria::ASC) Order by the createtime column
 * @method     ChildUnitofmeasureQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildUnitofmeasureQuery groupByCode() Group by the code column
 * @method     ChildUnitofmeasureQuery groupByDesc() Group by the desc column
 * @method     ChildUnitofmeasureQuery groupByConversion() Group by the conversion column
 * @method     ChildUnitofmeasureQuery groupByCreatedate() Group by the createdate column
 * @method     ChildUnitofmeasureQuery groupByCreatetime() Group by the createtime column
 * @method     ChildUnitofmeasureQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildUnitofmeasureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUnitofmeasureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUnitofmeasureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUnitofmeasureQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUnitofmeasureQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUnitofmeasureQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUnitofmeasure findOne(ConnectionInterface $con = null) Return the first ChildUnitofmeasure matching the query
 * @method     ChildUnitofmeasure findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUnitofmeasure matching the query, or a new ChildUnitofmeasure object populated from the query conditions when no match is found
 *
 * @method     ChildUnitofmeasure findOneByCode(string $code) Return the first ChildUnitofmeasure filtered by the code column
 * @method     ChildUnitofmeasure findOneByDesc(string $desc) Return the first ChildUnitofmeasure filtered by the desc column
 * @method     ChildUnitofmeasure findOneByConversion(string $conversion) Return the first ChildUnitofmeasure filtered by the conversion column
 * @method     ChildUnitofmeasure findOneByCreatedate(int $createdate) Return the first ChildUnitofmeasure filtered by the createdate column
 * @method     ChildUnitofmeasure findOneByCreatetime(int $createtime) Return the first ChildUnitofmeasure filtered by the createtime column
 * @method     ChildUnitofmeasure findOneByDummy(string $dummy) Return the first ChildUnitofmeasure filtered by the dummy column *

 * @method     ChildUnitofmeasure requirePk($key, ConnectionInterface $con = null) Return the ChildUnitofmeasure by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnitofmeasure requireOne(ConnectionInterface $con = null) Return the first ChildUnitofmeasure matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUnitofmeasure requireOneByCode(string $code) Return the first ChildUnitofmeasure filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnitofmeasure requireOneByDesc(string $desc) Return the first ChildUnitofmeasure filtered by the desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnitofmeasure requireOneByConversion(string $conversion) Return the first ChildUnitofmeasure filtered by the conversion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnitofmeasure requireOneByCreatedate(int $createdate) Return the first ChildUnitofmeasure filtered by the createdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnitofmeasure requireOneByCreatetime(int $createtime) Return the first ChildUnitofmeasure filtered by the createtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnitofmeasure requireOneByDummy(string $dummy) Return the first ChildUnitofmeasure filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUnitofmeasure[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUnitofmeasure objects based on current ModelCriteria
 * @method     ChildUnitofmeasure[]|ObjectCollection findByCode(string $code) Return ChildUnitofmeasure objects filtered by the code column
 * @method     ChildUnitofmeasure[]|ObjectCollection findByDesc(string $desc) Return ChildUnitofmeasure objects filtered by the desc column
 * @method     ChildUnitofmeasure[]|ObjectCollection findByConversion(string $conversion) Return ChildUnitofmeasure objects filtered by the conversion column
 * @method     ChildUnitofmeasure[]|ObjectCollection findByCreatedate(int $createdate) Return ChildUnitofmeasure objects filtered by the createdate column
 * @method     ChildUnitofmeasure[]|ObjectCollection findByCreatetime(int $createtime) Return ChildUnitofmeasure objects filtered by the createtime column
 * @method     ChildUnitofmeasure[]|ObjectCollection findByDummy(string $dummy) Return ChildUnitofmeasure objects filtered by the dummy column
 * @method     ChildUnitofmeasure[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UnitofmeasureQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UnitofmeasureQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Unitofmeasure', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUnitofmeasureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUnitofmeasureQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUnitofmeasureQuery) {
            return $criteria;
        }
        $query = new ChildUnitofmeasureQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUnitofmeasure|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UnitofmeasureTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UnitofmeasureTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUnitofmeasure A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT code, desc, conversion, createdate, createtime, dummy FROM unitofmeasure WHERE code = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUnitofmeasure $obj */
            $obj = new ChildUnitofmeasure();
            $obj->hydrate($row);
            UnitofmeasureTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUnitofmeasure|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_CODE, $keys, Criteria::IN);
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
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the desc column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc('fooValue');   // WHERE desc = 'fooValue'
     * $query->filterByDesc('%fooValue%', Criteria::LIKE); // WHERE desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByDesc($desc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_DESC, $desc, $comparison);
    }

    /**
     * Filter the query on the conversion column
     *
     * Example usage:
     * <code>
     * $query->filterByConversion(1234); // WHERE conversion = 1234
     * $query->filterByConversion(array(12, 34)); // WHERE conversion IN (12, 34)
     * $query->filterByConversion(array('min' => 12)); // WHERE conversion > 12
     * </code>
     *
     * @param     mixed $conversion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByConversion($conversion = null, $comparison = null)
    {
        if (is_array($conversion)) {
            $useMinMax = false;
            if (isset($conversion['min'])) {
                $this->addUsingAlias(UnitofmeasureTableMap::COL_CONVERSION, $conversion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($conversion['max'])) {
                $this->addUsingAlias(UnitofmeasureTableMap::COL_CONVERSION, $conversion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_CONVERSION, $conversion, $comparison);
    }

    /**
     * Filter the query on the createdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedate(1234); // WHERE createdate = 1234
     * $query->filterByCreatedate(array(12, 34)); // WHERE createdate IN (12, 34)
     * $query->filterByCreatedate(array('min' => 12)); // WHERE createdate > 12
     * </code>
     *
     * @param     mixed $createdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByCreatedate($createdate = null, $comparison = null)
    {
        if (is_array($createdate)) {
            $useMinMax = false;
            if (isset($createdate['min'])) {
                $this->addUsingAlias(UnitofmeasureTableMap::COL_CREATEDATE, $createdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdate['max'])) {
                $this->addUsingAlias(UnitofmeasureTableMap::COL_CREATEDATE, $createdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_CREATEDATE, $createdate, $comparison);
    }

    /**
     * Filter the query on the createtime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatetime(1234); // WHERE createtime = 1234
     * $query->filterByCreatetime(array(12, 34)); // WHERE createtime IN (12, 34)
     * $query->filterByCreatetime(array('min' => 12)); // WHERE createtime > 12
     * </code>
     *
     * @param     mixed $createtime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByCreatetime($createtime = null, $comparison = null)
    {
        if (is_array($createtime)) {
            $useMinMax = false;
            if (isset($createtime['min'])) {
                $this->addUsingAlias(UnitofmeasureTableMap::COL_CREATETIME, $createtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createtime['max'])) {
                $this->addUsingAlias(UnitofmeasureTableMap::COL_CREATETIME, $createtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_CREATETIME, $createtime, $comparison);
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
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitofmeasureTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUnitofmeasure $unitofmeasure Object to remove from the list of results
     *
     * @return $this|ChildUnitofmeasureQuery The current query, for fluid interface
     */
    public function prune($unitofmeasure = null)
    {
        if ($unitofmeasure) {
            $this->addUsingAlias(UnitofmeasureTableMap::COL_CODE, $unitofmeasure->getCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the unitofmeasure table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UnitofmeasureTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UnitofmeasureTableMap::clearInstancePool();
            UnitofmeasureTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UnitofmeasureTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UnitofmeasureTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UnitofmeasureTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UnitofmeasureTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UnitofmeasureQuery
