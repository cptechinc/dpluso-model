<?php

namespace Base;

use \Dplusfunctions as ChildDplusfunctions;
use \DplusfunctionsQuery as ChildDplusfunctionsQuery;
use \Exception;
use \PDO;
use Map\DplusfunctionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'dplusfunctions' table.
 *
 *
 *
 * @method     ChildDplusfunctionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDplusfunctionsQuery orderByMenu1($order = Criteria::ASC) Order by the menu1 column
 * @method     ChildDplusfunctionsQuery orderByMenu2($order = Criteria::ASC) Order by the menu2 column
 * @method     ChildDplusfunctionsQuery orderByProgram($order = Criteria::ASC) Order by the program column
 * @method     ChildDplusfunctionsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildDplusfunctionsQuery groupById() Group by the id column
 * @method     ChildDplusfunctionsQuery groupByMenu1() Group by the menu1 column
 * @method     ChildDplusfunctionsQuery groupByMenu2() Group by the menu2 column
 * @method     ChildDplusfunctionsQuery groupByProgram() Group by the program column
 * @method     ChildDplusfunctionsQuery groupByDescription() Group by the description column
 *
 * @method     ChildDplusfunctionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDplusfunctionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDplusfunctionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDplusfunctionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDplusfunctionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDplusfunctionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDplusfunctions findOne(ConnectionInterface $con = null) Return the first ChildDplusfunctions matching the query
 * @method     ChildDplusfunctions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDplusfunctions matching the query, or a new ChildDplusfunctions object populated from the query conditions when no match is found
 *
 * @method     ChildDplusfunctions findOneById(int $id) Return the first ChildDplusfunctions filtered by the id column
 * @method     ChildDplusfunctions findOneByMenu1(string $menu1) Return the first ChildDplusfunctions filtered by the menu1 column
 * @method     ChildDplusfunctions findOneByMenu2(string $menu2) Return the first ChildDplusfunctions filtered by the menu2 column
 * @method     ChildDplusfunctions findOneByProgram(string $program) Return the first ChildDplusfunctions filtered by the program column
 * @method     ChildDplusfunctions findOneByDescription(string $description) Return the first ChildDplusfunctions filtered by the description column *

 * @method     ChildDplusfunctions requirePk($key, ConnectionInterface $con = null) Return the ChildDplusfunctions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDplusfunctions requireOne(ConnectionInterface $con = null) Return the first ChildDplusfunctions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDplusfunctions requireOneById(int $id) Return the first ChildDplusfunctions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDplusfunctions requireOneByMenu1(string $menu1) Return the first ChildDplusfunctions filtered by the menu1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDplusfunctions requireOneByMenu2(string $menu2) Return the first ChildDplusfunctions filtered by the menu2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDplusfunctions requireOneByProgram(string $program) Return the first ChildDplusfunctions filtered by the program column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDplusfunctions requireOneByDescription(string $description) Return the first ChildDplusfunctions filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDplusfunctions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDplusfunctions objects based on current ModelCriteria
 * @method     ChildDplusfunctions[]|ObjectCollection findById(int $id) Return ChildDplusfunctions objects filtered by the id column
 * @method     ChildDplusfunctions[]|ObjectCollection findByMenu1(string $menu1) Return ChildDplusfunctions objects filtered by the menu1 column
 * @method     ChildDplusfunctions[]|ObjectCollection findByMenu2(string $menu2) Return ChildDplusfunctions objects filtered by the menu2 column
 * @method     ChildDplusfunctions[]|ObjectCollection findByProgram(string $program) Return ChildDplusfunctions objects filtered by the program column
 * @method     ChildDplusfunctions[]|ObjectCollection findByDescription(string $description) Return ChildDplusfunctions objects filtered by the description column
 * @method     ChildDplusfunctions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DplusfunctionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DplusfunctionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Dplusfunctions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDplusfunctionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDplusfunctionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDplusfunctionsQuery) {
            return $criteria;
        }
        $query = new ChildDplusfunctionsQuery();
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
     * @return ChildDplusfunctions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DplusfunctionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DplusfunctionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDplusfunctions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, menu1, menu2, program, description FROM dplusfunctions WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDplusfunctions $obj */
            $obj = new ChildDplusfunctions();
            $obj->hydrate($row);
            DplusfunctionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDplusfunctions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DplusfunctionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DplusfunctionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the menu1 column
     *
     * Example usage:
     * <code>
     * $query->filterByMenu1('fooValue');   // WHERE menu1 = 'fooValue'
     * $query->filterByMenu1('%fooValue%', Criteria::LIKE); // WHERE menu1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menu1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterByMenu1($menu1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menu1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_MENU1, $menu1, $comparison);
    }

    /**
     * Filter the query on the menu2 column
     *
     * Example usage:
     * <code>
     * $query->filterByMenu2('fooValue');   // WHERE menu2 = 'fooValue'
     * $query->filterByMenu2('%fooValue%', Criteria::LIKE); // WHERE menu2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menu2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterByMenu2($menu2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menu2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_MENU2, $menu2, $comparison);
    }

    /**
     * Filter the query on the program column
     *
     * Example usage:
     * <code>
     * $query->filterByProgram('fooValue');   // WHERE program = 'fooValue'
     * $query->filterByProgram('%fooValue%', Criteria::LIKE); // WHERE program LIKE '%fooValue%'
     * </code>
     *
     * @param     string $program The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterByProgram($program = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($program)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_PROGRAM, $program, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DplusfunctionsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDplusfunctions $dplusfunctions Object to remove from the list of results
     *
     * @return $this|ChildDplusfunctionsQuery The current query, for fluid interface
     */
    public function prune($dplusfunctions = null)
    {
        if ($dplusfunctions) {
            $this->addUsingAlias(DplusfunctionsTableMap::COL_ID, $dplusfunctions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the dplusfunctions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DplusfunctionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DplusfunctionsTableMap::clearInstancePool();
            DplusfunctionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DplusfunctionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DplusfunctionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DplusfunctionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DplusfunctionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DplusfunctionsQuery
