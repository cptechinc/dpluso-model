<?php

namespace Base;

use \Countries as ChildCountries;
use \CountriesQuery as ChildCountriesQuery;
use \Exception;
use Map\CountriesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'countries' table.
 *
 *
 *
 * @method     ChildCountriesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCountriesQuery orderByCcode($order = Criteria::ASC) Order by the ccode column
 * @method     ChildCountriesQuery orderByCallingCode($order = Criteria::ASC) Order by the calling_code column
 *
 * @method     ChildCountriesQuery groupByName() Group by the name column
 * @method     ChildCountriesQuery groupByCcode() Group by the ccode column
 * @method     ChildCountriesQuery groupByCallingCode() Group by the calling_code column
 *
 * @method     ChildCountriesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCountriesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCountriesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCountriesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCountriesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCountriesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCountries findOne(ConnectionInterface $con = null) Return the first ChildCountries matching the query
 * @method     ChildCountries findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCountries matching the query, or a new ChildCountries object populated from the query conditions when no match is found
 *
 * @method     ChildCountries findOneByName(string $name) Return the first ChildCountries filtered by the name column
 * @method     ChildCountries findOneByCcode(string $ccode) Return the first ChildCountries filtered by the ccode column
 * @method     ChildCountries findOneByCallingCode(string $calling_code) Return the first ChildCountries filtered by the calling_code column *

 * @method     ChildCountries requirePk($key, ConnectionInterface $con = null) Return the ChildCountries by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountries requireOne(ConnectionInterface $con = null) Return the first ChildCountries matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCountries requireOneByName(string $name) Return the first ChildCountries filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountries requireOneByCcode(string $ccode) Return the first ChildCountries filtered by the ccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCountries requireOneByCallingCode(string $calling_code) Return the first ChildCountries filtered by the calling_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCountries[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCountries objects based on current ModelCriteria
 * @method     ChildCountries[]|ObjectCollection findByName(string $name) Return ChildCountries objects filtered by the name column
 * @method     ChildCountries[]|ObjectCollection findByCcode(string $ccode) Return ChildCountries objects filtered by the ccode column
 * @method     ChildCountries[]|ObjectCollection findByCallingCode(string $calling_code) Return ChildCountries objects filtered by the calling_code column
 * @method     ChildCountries[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CountriesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CountriesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Countries', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCountriesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCountriesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCountriesQuery) {
            return $criteria;
        }
        $query = new ChildCountriesQuery();
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
     * @return ChildCountries|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Countries object has no primary key');
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
        throw new LogicException('The Countries object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCountriesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Countries object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCountriesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Countries object has no primary key');
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCountriesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CountriesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the ccode column
     *
     * Example usage:
     * <code>
     * $query->filterByCcode('fooValue');   // WHERE ccode = 'fooValue'
     * $query->filterByCcode('%fooValue%', Criteria::LIKE); // WHERE ccode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCountriesQuery The current query, for fluid interface
     */
    public function filterByCcode($ccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CountriesTableMap::COL_CCODE, $ccode, $comparison);
    }

    /**
     * Filter the query on the calling_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCallingCode('fooValue');   // WHERE calling_code = 'fooValue'
     * $query->filterByCallingCode('%fooValue%', Criteria::LIKE); // WHERE calling_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $callingCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCountriesQuery The current query, for fluid interface
     */
    public function filterByCallingCode($callingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($callingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CountriesTableMap::COL_CALLING_CODE, $callingCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCountries $countries Object to remove from the list of results
     *
     * @return $this|ChildCountriesQuery The current query, for fluid interface
     */
    public function prune($countries = null)
    {
        if ($countries) {
            throw new LogicException('Countries object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the countries table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CountriesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CountriesTableMap::clearInstancePool();
            CountriesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CountriesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CountriesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CountriesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CountriesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CountriesQuery
