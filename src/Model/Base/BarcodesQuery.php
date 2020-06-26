<?php

namespace Base;

use \Barcodes as ChildBarcodes;
use \BarcodesQuery as ChildBarcodesQuery;
use \Exception;
use \PDO;
use Map\BarcodesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'barcodes' table.
 *
 *
 *
 * @method     ChildBarcodesQuery orderByBarcodenbr($order = Criteria::ASC) Order by the barcodenbr column
 * @method     ChildBarcodesQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildBarcodesQuery orderByCustvend($order = Criteria::ASC) Order by the custvend column
 * @method     ChildBarcodesQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method     ChildBarcodesQuery orderByPrimary($order = Criteria::ASC) Order by the primary column
 * @method     ChildBarcodesQuery orderByUnitqty($order = Criteria::ASC) Order by the unitqty column
 * @method     ChildBarcodesQuery orderByUom($order = Criteria::ASC) Order by the uom column
 * @method     ChildBarcodesQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildBarcodesQuery groupByBarcodenbr() Group by the barcodenbr column
 * @method     ChildBarcodesQuery groupByItemid() Group by the itemid column
 * @method     ChildBarcodesQuery groupByCustvend() Group by the custvend column
 * @method     ChildBarcodesQuery groupBySource() Group by the source column
 * @method     ChildBarcodesQuery groupByPrimary() Group by the primary column
 * @method     ChildBarcodesQuery groupByUnitqty() Group by the unitqty column
 * @method     ChildBarcodesQuery groupByUom() Group by the uom column
 * @method     ChildBarcodesQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildBarcodesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBarcodesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBarcodesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBarcodesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBarcodesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBarcodesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBarcodes findOne(ConnectionInterface $con = null) Return the first ChildBarcodes matching the query
 * @method     ChildBarcodes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBarcodes matching the query, or a new ChildBarcodes object populated from the query conditions when no match is found
 *
 * @method     ChildBarcodes findOneByBarcodenbr(string $barcodenbr) Return the first ChildBarcodes filtered by the barcodenbr column
 * @method     ChildBarcodes findOneByItemid(string $itemid) Return the first ChildBarcodes filtered by the itemid column
 * @method     ChildBarcodes findOneByCustvend(string $custvend) Return the first ChildBarcodes filtered by the custvend column
 * @method     ChildBarcodes findOneBySource(string $source) Return the first ChildBarcodes filtered by the source column
 * @method     ChildBarcodes findOneByPrimary(string $primary) Return the first ChildBarcodes filtered by the primary column
 * @method     ChildBarcodes findOneByUnitqty(int $unitqty) Return the first ChildBarcodes filtered by the unitqty column
 * @method     ChildBarcodes findOneByUom(string $uom) Return the first ChildBarcodes filtered by the uom column
 * @method     ChildBarcodes findOneByDummy(string $dummy) Return the first ChildBarcodes filtered by the dummy column *

 * @method     ChildBarcodes requirePk($key, ConnectionInterface $con = null) Return the ChildBarcodes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOne(ConnectionInterface $con = null) Return the first ChildBarcodes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBarcodes requireOneByBarcodenbr(string $barcodenbr) Return the first ChildBarcodes filtered by the barcodenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneByItemid(string $itemid) Return the first ChildBarcodes filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneByCustvend(string $custvend) Return the first ChildBarcodes filtered by the custvend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneBySource(string $source) Return the first ChildBarcodes filtered by the source column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneByPrimary(string $primary) Return the first ChildBarcodes filtered by the primary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneByUnitqty(int $unitqty) Return the first ChildBarcodes filtered by the unitqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneByUom(string $uom) Return the first ChildBarcodes filtered by the uom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBarcodes requireOneByDummy(string $dummy) Return the first ChildBarcodes filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBarcodes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBarcodes objects based on current ModelCriteria
 * @method     ChildBarcodes[]|ObjectCollection findByBarcodenbr(string $barcodenbr) Return ChildBarcodes objects filtered by the barcodenbr column
 * @method     ChildBarcodes[]|ObjectCollection findByItemid(string $itemid) Return ChildBarcodes objects filtered by the itemid column
 * @method     ChildBarcodes[]|ObjectCollection findByCustvend(string $custvend) Return ChildBarcodes objects filtered by the custvend column
 * @method     ChildBarcodes[]|ObjectCollection findBySource(string $source) Return ChildBarcodes objects filtered by the source column
 * @method     ChildBarcodes[]|ObjectCollection findByPrimary(string $primary) Return ChildBarcodes objects filtered by the primary column
 * @method     ChildBarcodes[]|ObjectCollection findByUnitqty(int $unitqty) Return ChildBarcodes objects filtered by the unitqty column
 * @method     ChildBarcodes[]|ObjectCollection findByUom(string $uom) Return ChildBarcodes objects filtered by the uom column
 * @method     ChildBarcodes[]|ObjectCollection findByDummy(string $dummy) Return ChildBarcodes objects filtered by the dummy column
 * @method     ChildBarcodes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BarcodesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BarcodesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Barcodes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBarcodesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBarcodesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBarcodesQuery) {
            return $criteria;
        }
        $query = new ChildBarcodesQuery();
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
     * @param array[$barcodenbr, $itemid, $custvend] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBarcodes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BarcodesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BarcodesTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildBarcodes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT barcodenbr, itemid, custvend, source, primary, unitqty, uom, dummy FROM barcodes WHERE barcodenbr = :p0 AND itemid = :p1 AND custvend = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBarcodes $obj */
            $obj = new ChildBarcodes();
            $obj->hydrate($row);
            BarcodesTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildBarcodes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BarcodesTableMap::COL_BARCODENBR, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BarcodesTableMap::COL_ITEMID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(BarcodesTableMap::COL_CUSTVEND, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BarcodesTableMap::COL_BARCODENBR, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BarcodesTableMap::COL_ITEMID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(BarcodesTableMap::COL_CUSTVEND, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the barcodenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcodenbr('fooValue');   // WHERE barcodenbr = 'fooValue'
     * $query->filterByBarcodenbr('%fooValue%', Criteria::LIKE); // WHERE barcodenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barcodenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByBarcodenbr($barcodenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcodenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_BARCODENBR, $barcodenbr, $comparison);
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
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the custvend column
     *
     * Example usage:
     * <code>
     * $query->filterByCustvend('fooValue');   // WHERE custvend = 'fooValue'
     * $query->filterByCustvend('%fooValue%', Criteria::LIKE); // WHERE custvend LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custvend The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByCustvend($custvend = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custvend)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_CUSTVEND, $custvend, $comparison);
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%', Criteria::LIKE); // WHERE source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $source The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterBySource($source = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_SOURCE, $source, $comparison);
    }

    /**
     * Filter the query on the primary column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimary('fooValue');   // WHERE primary = 'fooValue'
     * $query->filterByPrimary('%fooValue%', Criteria::LIKE); // WHERE primary LIKE '%fooValue%'
     * </code>
     *
     * @param     string $primary The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByPrimary($primary = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primary)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_PRIMARY, $primary, $comparison);
    }

    /**
     * Filter the query on the unitqty column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitqty(1234); // WHERE unitqty = 1234
     * $query->filterByUnitqty(array(12, 34)); // WHERE unitqty IN (12, 34)
     * $query->filterByUnitqty(array('min' => 12)); // WHERE unitqty > 12
     * </code>
     *
     * @param     mixed $unitqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByUnitqty($unitqty = null, $comparison = null)
    {
        if (is_array($unitqty)) {
            $useMinMax = false;
            if (isset($unitqty['min'])) {
                $this->addUsingAlias(BarcodesTableMap::COL_UNITQTY, $unitqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitqty['max'])) {
                $this->addUsingAlias(BarcodesTableMap::COL_UNITQTY, $unitqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_UNITQTY, $unitqty, $comparison);
    }

    /**
     * Filter the query on the uom column
     *
     * Example usage:
     * <code>
     * $query->filterByUom('fooValue');   // WHERE uom = 'fooValue'
     * $query->filterByUom('%fooValue%', Criteria::LIKE); // WHERE uom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByUom($uom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_UOM, $uom, $comparison);
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
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BarcodesTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBarcodes $barcodes Object to remove from the list of results
     *
     * @return $this|ChildBarcodesQuery The current query, for fluid interface
     */
    public function prune($barcodes = null)
    {
        if ($barcodes) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BarcodesTableMap::COL_BARCODENBR), $barcodes->getBarcodenbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BarcodesTableMap::COL_ITEMID), $barcodes->getItemid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(BarcodesTableMap::COL_CUSTVEND), $barcodes->getCustvend(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the barcodes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BarcodesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BarcodesTableMap::clearInstancePool();
            BarcodesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BarcodesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BarcodesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BarcodesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BarcodesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BarcodesQuery
