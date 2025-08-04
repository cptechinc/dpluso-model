<?php

namespace Base;

use \Country as ChildCountry;
use \CountryQuery as ChildCountryQuery;
use \Exception;
use \PDO;
use Map\CountryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `country` table.
 *
 * @method     ChildCountryQuery orderByIso($order = Criteria::ASC) Order by the iso column
 * @method     ChildCountryQuery orderByIso2($order = Criteria::ASC) Order by the iso2 column
 * @method     ChildCountryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCountryQuery orderByNicename($order = Criteria::ASC) Order by the nicename column
 * @method     ChildCountryQuery orderByNumcode($order = Criteria::ASC) Order by the numcode column
 * @method     ChildCountryQuery orderByPhonecode($order = Criteria::ASC) Order by the phonecode column
 *
 * @method     ChildCountryQuery groupByIso() Group by the iso column
 * @method     ChildCountryQuery groupByIso2() Group by the iso2 column
 * @method     ChildCountryQuery groupByName() Group by the name column
 * @method     ChildCountryQuery groupByNicename() Group by the nicename column
 * @method     ChildCountryQuery groupByNumcode() Group by the numcode column
 * @method     ChildCountryQuery groupByPhonecode() Group by the phonecode column
 *
 * @method     ChildCountryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCountryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCountryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCountryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCountryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCountryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCountry|null findOne(?ConnectionInterface $con = null) Return the first ChildCountry matching the query
 * @method     ChildCountry findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCountry matching the query, or a new ChildCountry object populated from the query conditions when no match is found
 *
 * @method     ChildCountry|null findOneByIso(string $iso) Return the first ChildCountry filtered by the iso column
 * @method     ChildCountry|null findOneByIso2(string $iso2) Return the first ChildCountry filtered by the iso2 column
 * @method     ChildCountry|null findOneByName(string $name) Return the first ChildCountry filtered by the name column
 * @method     ChildCountry|null findOneByNicename(string $nicename) Return the first ChildCountry filtered by the nicename column
 * @method     ChildCountry|null findOneByNumcode(int $numcode) Return the first ChildCountry filtered by the numcode column
 * @method     ChildCountry|null findOneByPhonecode(int $phonecode) Return the first ChildCountry filtered by the phonecode column
 *
 * @method     ChildCountry requirePk($key, ?ConnectionInterface $con = null) Return the ChildCountry by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountry requireOne(?ConnectionInterface $con = null) Return the first ChildCountry matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCountry requireOneByIso(string $iso) Return the first ChildCountry filtered by the iso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountry requireOneByIso2(string $iso2) Return the first ChildCountry filtered by the iso2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountry requireOneByName(string $name) Return the first ChildCountry filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountry requireOneByNicename(string $nicename) Return the first ChildCountry filtered by the nicename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountry requireOneByNumcode(int $numcode) Return the first ChildCountry filtered by the numcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountry requireOneByPhonecode(int $phonecode) Return the first ChildCountry filtered by the phonecode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCountry[]|Collection find(?ConnectionInterface $con = null) Return ChildCountry objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCountry> find(?ConnectionInterface $con = null) Return ChildCountry objects based on current ModelCriteria
 *
 * @method     ChildCountry[]|Collection findByIso(string|array<string> $iso) Return ChildCountry objects filtered by the iso column
 * @psalm-method Collection&\Traversable<ChildCountry> findByIso(string|array<string> $iso) Return ChildCountry objects filtered by the iso column
 * @method     ChildCountry[]|Collection findByIso2(string|array<string> $iso2) Return ChildCountry objects filtered by the iso2 column
 * @psalm-method Collection&\Traversable<ChildCountry> findByIso2(string|array<string> $iso2) Return ChildCountry objects filtered by the iso2 column
 * @method     ChildCountry[]|Collection findByName(string|array<string> $name) Return ChildCountry objects filtered by the name column
 * @psalm-method Collection&\Traversable<ChildCountry> findByName(string|array<string> $name) Return ChildCountry objects filtered by the name column
 * @method     ChildCountry[]|Collection findByNicename(string|array<string> $nicename) Return ChildCountry objects filtered by the nicename column
 * @psalm-method Collection&\Traversable<ChildCountry> findByNicename(string|array<string> $nicename) Return ChildCountry objects filtered by the nicename column
 * @method     ChildCountry[]|Collection findByNumcode(int|array<int> $numcode) Return ChildCountry objects filtered by the numcode column
 * @psalm-method Collection&\Traversable<ChildCountry> findByNumcode(int|array<int> $numcode) Return ChildCountry objects filtered by the numcode column
 * @method     ChildCountry[]|Collection findByPhonecode(int|array<int> $phonecode) Return ChildCountry objects filtered by the phonecode column
 * @psalm-method Collection&\Traversable<ChildCountry> findByPhonecode(int|array<int> $phonecode) Return ChildCountry objects filtered by the phonecode column
 *
 * @method     ChildCountry[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCountry> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class CountryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CountryQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Country', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCountryQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCountryQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCountryQuery) {
            return $criteria;
        }
        $query = new ChildCountryQuery();
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
     * @return ChildCountry|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CountryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CountryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCountry A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT iso, iso2, name, nicename, numcode, phonecode FROM country WHERE iso = :p0';
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
            /** @var ChildCountry $obj */
            $obj = new ChildCountry();
            $obj->hydrate($row);
            CountryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCountry|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(CountryTableMap::COL_ISO, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(CountryTableMap::COL_ISO, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the iso column
     *
     * Example usage:
     * <code>
     * $query->filterByIso('fooValue');   // WHERE iso = 'fooValue'
     * $query->filterByIso('%fooValue%', Criteria::LIKE); // WHERE iso LIKE '%fooValue%'
     * $query->filterByIso(['foo', 'bar']); // WHERE iso IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $iso The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIso($iso = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iso)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CountryTableMap::COL_ISO, $iso, $comparison);

        return $this;
    }

    /**
     * Filter the query on the iso2 column
     *
     * Example usage:
     * <code>
     * $query->filterByIso2('fooValue');   // WHERE iso2 = 'fooValue'
     * $query->filterByIso2('%fooValue%', Criteria::LIKE); // WHERE iso2 LIKE '%fooValue%'
     * $query->filterByIso2(['foo', 'bar']); // WHERE iso2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $iso2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIso2($iso2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iso2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CountryTableMap::COL_ISO2, $iso2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * $query->filterByName(['foo', 'bar']); // WHERE name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName($name = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CountryTableMap::COL_NAME, $name, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nicename column
     *
     * Example usage:
     * <code>
     * $query->filterByNicename('fooValue');   // WHERE nicename = 'fooValue'
     * $query->filterByNicename('%fooValue%', Criteria::LIKE); // WHERE nicename LIKE '%fooValue%'
     * $query->filterByNicename(['foo', 'bar']); // WHERE nicename IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nicename The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNicename($nicename = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nicename)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CountryTableMap::COL_NICENAME, $nicename, $comparison);

        return $this;
    }

    /**
     * Filter the query on the numcode column
     *
     * Example usage:
     * <code>
     * $query->filterByNumcode(1234); // WHERE numcode = 1234
     * $query->filterByNumcode(array(12, 34)); // WHERE numcode IN (12, 34)
     * $query->filterByNumcode(array('min' => 12)); // WHERE numcode > 12
     * </code>
     *
     * @param mixed $numcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNumcode($numcode = null, ?string $comparison = null)
    {
        if (is_array($numcode)) {
            $useMinMax = false;
            if (isset($numcode['min'])) {
                $this->addUsingAlias(CountryTableMap::COL_NUMCODE, $numcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numcode['max'])) {
                $this->addUsingAlias(CountryTableMap::COL_NUMCODE, $numcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CountryTableMap::COL_NUMCODE, $numcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the phonecode column
     *
     * Example usage:
     * <code>
     * $query->filterByPhonecode(1234); // WHERE phonecode = 1234
     * $query->filterByPhonecode(array(12, 34)); // WHERE phonecode IN (12, 34)
     * $query->filterByPhonecode(array('min' => 12)); // WHERE phonecode > 12
     * </code>
     *
     * @param mixed $phonecode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPhonecode($phonecode = null, ?string $comparison = null)
    {
        if (is_array($phonecode)) {
            $useMinMax = false;
            if (isset($phonecode['min'])) {
                $this->addUsingAlias(CountryTableMap::COL_PHONECODE, $phonecode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phonecode['max'])) {
                $this->addUsingAlias(CountryTableMap::COL_PHONECODE, $phonecode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CountryTableMap::COL_PHONECODE, $phonecode, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCountry $country Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($country = null)
    {
        if ($country) {
            $this->addUsingAlias(CountryTableMap::COL_ISO, $country->getIso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the country table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CountryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CountryTableMap::clearInstancePool();
            CountryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CountryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CountryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CountryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CountryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
