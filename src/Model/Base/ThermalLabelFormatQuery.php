<?php

namespace Base;

use \ThermalLabelFormat as ChildThermalLabelFormat;
use \ThermalLabelFormatQuery as ChildThermalLabelFormatQuery;
use \Exception;
use \PDO;
use Map\ThermalLabelFormatTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'thermal_label_format' table.
 *
 *
 *
 * @method     ChildThermalLabelFormatQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildThermalLabelFormatQuery orderByDesc($order = Criteria::ASC) Order by the desc column
 * @method     ChildThermalLabelFormatQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildThermalLabelFormatQuery orderByLength($order = Criteria::ASC) Order by the length column
 *
 * @method     ChildThermalLabelFormatQuery groupById() Group by the id column
 * @method     ChildThermalLabelFormatQuery groupByDesc() Group by the desc column
 * @method     ChildThermalLabelFormatQuery groupByWidth() Group by the width column
 * @method     ChildThermalLabelFormatQuery groupByLength() Group by the length column
 *
 * @method     ChildThermalLabelFormatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildThermalLabelFormatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildThermalLabelFormatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildThermalLabelFormatQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildThermalLabelFormatQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildThermalLabelFormatQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildThermalLabelFormat findOne(ConnectionInterface $con = null) Return the first ChildThermalLabelFormat matching the query
 * @method     ChildThermalLabelFormat findOneOrCreate(ConnectionInterface $con = null) Return the first ChildThermalLabelFormat matching the query, or a new ChildThermalLabelFormat object populated from the query conditions when no match is found
 *
 * @method     ChildThermalLabelFormat findOneById(string $id) Return the first ChildThermalLabelFormat filtered by the id column
 * @method     ChildThermalLabelFormat findOneByDesc(string $desc) Return the first ChildThermalLabelFormat filtered by the desc column
 * @method     ChildThermalLabelFormat findOneByWidth(string $width) Return the first ChildThermalLabelFormat filtered by the width column
 * @method     ChildThermalLabelFormat findOneByLength(string $length) Return the first ChildThermalLabelFormat filtered by the length column *

 * @method     ChildThermalLabelFormat requirePk($key, ConnectionInterface $con = null) Return the ChildThermalLabelFormat by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildThermalLabelFormat requireOne(ConnectionInterface $con = null) Return the first ChildThermalLabelFormat matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildThermalLabelFormat requireOneById(string $id) Return the first ChildThermalLabelFormat filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildThermalLabelFormat requireOneByDesc(string $desc) Return the first ChildThermalLabelFormat filtered by the desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildThermalLabelFormat requireOneByWidth(string $width) Return the first ChildThermalLabelFormat filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildThermalLabelFormat requireOneByLength(string $length) Return the first ChildThermalLabelFormat filtered by the length column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildThermalLabelFormat[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildThermalLabelFormat objects based on current ModelCriteria
 * @method     ChildThermalLabelFormat[]|ObjectCollection findById(string $id) Return ChildThermalLabelFormat objects filtered by the id column
 * @method     ChildThermalLabelFormat[]|ObjectCollection findByDesc(string $desc) Return ChildThermalLabelFormat objects filtered by the desc column
 * @method     ChildThermalLabelFormat[]|ObjectCollection findByWidth(string $width) Return ChildThermalLabelFormat objects filtered by the width column
 * @method     ChildThermalLabelFormat[]|ObjectCollection findByLength(string $length) Return ChildThermalLabelFormat objects filtered by the length column
 * @method     ChildThermalLabelFormat[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ThermalLabelFormatQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ThermalLabelFormatQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\ThermalLabelFormat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildThermalLabelFormatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildThermalLabelFormatQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildThermalLabelFormatQuery) {
            return $criteria;
        }
        $query = new ChildThermalLabelFormatQuery();
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
     * @return ChildThermalLabelFormat|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ThermalLabelFormatTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ThermalLabelFormatTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildThermalLabelFormat A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, desc, width, length FROM thermal_label_format WHERE id = :p0';
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
            /** @var ChildThermalLabelFormat $obj */
            $obj = new ChildThermalLabelFormat();
            $obj->hydrate($row);
            ThermalLabelFormatTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildThermalLabelFormat|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ThermalLabelFormatTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ThermalLabelFormatTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThermalLabelFormatTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function filterByDesc($desc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThermalLabelFormatTableMap::COL_DESC, $desc, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(ThermalLabelFormatTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(ThermalLabelFormatTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThermalLabelFormatTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the length column
     *
     * Example usage:
     * <code>
     * $query->filterByLength(1234); // WHERE length = 1234
     * $query->filterByLength(array(12, 34)); // WHERE length IN (12, 34)
     * $query->filterByLength(array('min' => 12)); // WHERE length > 12
     * </code>
     *
     * @param     mixed $length The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function filterByLength($length = null, $comparison = null)
    {
        if (is_array($length)) {
            $useMinMax = false;
            if (isset($length['min'])) {
                $this->addUsingAlias(ThermalLabelFormatTableMap::COL_LENGTH, $length['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($length['max'])) {
                $this->addUsingAlias(ThermalLabelFormatTableMap::COL_LENGTH, $length['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThermalLabelFormatTableMap::COL_LENGTH, $length, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildThermalLabelFormat $thermalLabelFormat Object to remove from the list of results
     *
     * @return $this|ChildThermalLabelFormatQuery The current query, for fluid interface
     */
    public function prune($thermalLabelFormat = null)
    {
        if ($thermalLabelFormat) {
            $this->addUsingAlias(ThermalLabelFormatTableMap::COL_ID, $thermalLabelFormat->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the thermal_label_format table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ThermalLabelFormatTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ThermalLabelFormatTableMap::clearInstancePool();
            ThermalLabelFormatTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ThermalLabelFormatTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ThermalLabelFormatTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ThermalLabelFormatTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ThermalLabelFormatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ThermalLabelFormatQuery
