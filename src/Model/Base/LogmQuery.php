<?php

namespace Base;

use \Logm as ChildLogm;
use \LogmQuery as ChildLogmQuery;
use \Exception;
use \PDO;
use Map\LogmTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'logm' table.
 *
 *
 *
 * @method     ChildLogmQuery orderByLoginid($order = Criteria::ASC) Order by the loginid column
 * @method     ChildLogmQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildLogmQuery orderByWhseid($order = Criteria::ASC) Order by the whseid column
 * @method     ChildLogmQuery orderByRole($order = Criteria::ASC) Order by the role column
 * @method     ChildLogmQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildLogmQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildLogmQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildLogmQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildLogmQuery orderByRoleid($order = Criteria::ASC) Order by the roleid column
 * @method     ChildLogmQuery orderByRolename($order = Criteria::ASC) Order by the rolename column
 * @method     ChildLogmQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildLogmQuery groupByLoginid() Group by the loginid column
 * @method     ChildLogmQuery groupByName() Group by the name column
 * @method     ChildLogmQuery groupByWhseid() Group by the whseid column
 * @method     ChildLogmQuery groupByRole() Group by the role column
 * @method     ChildLogmQuery groupByCompany() Group by the company column
 * @method     ChildLogmQuery groupByFax() Group by the fax column
 * @method     ChildLogmQuery groupByPhone() Group by the phone column
 * @method     ChildLogmQuery groupByEmail() Group by the email column
 * @method     ChildLogmQuery groupByRoleid() Group by the roleid column
 * @method     ChildLogmQuery groupByRolename() Group by the rolename column
 * @method     ChildLogmQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildLogmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLogmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLogmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLogmQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLogmQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLogmQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLogm findOne(ConnectionInterface $con = null) Return the first ChildLogm matching the query
 * @method     ChildLogm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLogm matching the query, or a new ChildLogm object populated from the query conditions when no match is found
 *
 * @method     ChildLogm findOneByLoginid(string $loginid) Return the first ChildLogm filtered by the loginid column
 * @method     ChildLogm findOneByName(string $name) Return the first ChildLogm filtered by the name column
 * @method     ChildLogm findOneByWhseid(string $whseid) Return the first ChildLogm filtered by the whseid column
 * @method     ChildLogm findOneByRole(string $role) Return the first ChildLogm filtered by the role column
 * @method     ChildLogm findOneByCompany(string $company) Return the first ChildLogm filtered by the company column
 * @method     ChildLogm findOneByFax(string $fax) Return the first ChildLogm filtered by the fax column
 * @method     ChildLogm findOneByPhone(string $phone) Return the first ChildLogm filtered by the phone column
 * @method     ChildLogm findOneByEmail(string $email) Return the first ChildLogm filtered by the email column
 * @method     ChildLogm findOneByRoleid(string $roleid) Return the first ChildLogm filtered by the roleid column
 * @method     ChildLogm findOneByRolename(string $rolename) Return the first ChildLogm filtered by the rolename column
 * @method     ChildLogm findOneByDummy(string $dummy) Return the first ChildLogm filtered by the dummy column *

 * @method     ChildLogm requirePk($key, ConnectionInterface $con = null) Return the ChildLogm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOne(ConnectionInterface $con = null) Return the first ChildLogm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogm requireOneByLoginid(string $loginid) Return the first ChildLogm filtered by the loginid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByName(string $name) Return the first ChildLogm filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByWhseid(string $whseid) Return the first ChildLogm filtered by the whseid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByRole(string $role) Return the first ChildLogm filtered by the role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByCompany(string $company) Return the first ChildLogm filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByFax(string $fax) Return the first ChildLogm filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByPhone(string $phone) Return the first ChildLogm filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByEmail(string $email) Return the first ChildLogm filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByRoleid(string $roleid) Return the first ChildLogm filtered by the roleid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByRolename(string $rolename) Return the first ChildLogm filtered by the rolename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogm requireOneByDummy(string $dummy) Return the first ChildLogm filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLogm objects based on current ModelCriteria
 * @method     ChildLogm[]|ObjectCollection findByLoginid(string $loginid) Return ChildLogm objects filtered by the loginid column
 * @method     ChildLogm[]|ObjectCollection findByName(string $name) Return ChildLogm objects filtered by the name column
 * @method     ChildLogm[]|ObjectCollection findByWhseid(string $whseid) Return ChildLogm objects filtered by the whseid column
 * @method     ChildLogm[]|ObjectCollection findByRole(string $role) Return ChildLogm objects filtered by the role column
 * @method     ChildLogm[]|ObjectCollection findByCompany(string $company) Return ChildLogm objects filtered by the company column
 * @method     ChildLogm[]|ObjectCollection findByFax(string $fax) Return ChildLogm objects filtered by the fax column
 * @method     ChildLogm[]|ObjectCollection findByPhone(string $phone) Return ChildLogm objects filtered by the phone column
 * @method     ChildLogm[]|ObjectCollection findByEmail(string $email) Return ChildLogm objects filtered by the email column
 * @method     ChildLogm[]|ObjectCollection findByRoleid(string $roleid) Return ChildLogm objects filtered by the roleid column
 * @method     ChildLogm[]|ObjectCollection findByRolename(string $rolename) Return ChildLogm objects filtered by the rolename column
 * @method     ChildLogm[]|ObjectCollection findByDummy(string $dummy) Return ChildLogm objects filtered by the dummy column
 * @method     ChildLogm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LogmQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LogmQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Logm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLogmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLogmQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLogmQuery) {
            return $criteria;
        }
        $query = new ChildLogmQuery();
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
     * @return ChildLogm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LogmTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LogmTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLogm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT loginid, name, whseid, role, company, fax, phone, email, roleid, rolename, dummy FROM logm WHERE loginid = :p0';
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
            /** @var ChildLogm $obj */
            $obj = new ChildLogm();
            $obj->hydrate($row);
            LogmTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLogm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LogmTableMap::COL_LOGINID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LogmTableMap::COL_LOGINID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the loginid column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginid('fooValue');   // WHERE loginid = 'fooValue'
     * $query->filterByLoginid('%fooValue%', Criteria::LIKE); // WHERE loginid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $loginid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByLoginid($loginid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_LOGINID, $loginid, $comparison);
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
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the whseid column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseid('fooValue');   // WHERE whseid = 'fooValue'
     * $query->filterByWhseid('%fooValue%', Criteria::LIKE); // WHERE whseid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByWhseid($whseid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_WHSEID, $whseid, $comparison);
    }

    /**
     * Filter the query on the role column
     *
     * Example usage:
     * <code>
     * $query->filterByRole('fooValue');   // WHERE role = 'fooValue'
     * $query->filterByRole('%fooValue%', Criteria::LIKE); // WHERE role LIKE '%fooValue%'
     * </code>
     *
     * @param     string $role The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByRole($role = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($role)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_ROLE, $role, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%', Criteria::LIKE); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the roleid column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleid('fooValue');   // WHERE roleid = 'fooValue'
     * $query->filterByRoleid('%fooValue%', Criteria::LIKE); // WHERE roleid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $roleid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByRoleid($roleid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($roleid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_ROLEID, $roleid, $comparison);
    }

    /**
     * Filter the query on the rolename column
     *
     * Example usage:
     * <code>
     * $query->filterByRolename('fooValue');   // WHERE rolename = 'fooValue'
     * $query->filterByRolename('%fooValue%', Criteria::LIKE); // WHERE rolename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rolename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByRolename($rolename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rolename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_ROLENAME, $rolename, $comparison);
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
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogmTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLogm $logm Object to remove from the list of results
     *
     * @return $this|ChildLogmQuery The current query, for fluid interface
     */
    public function prune($logm = null)
    {
        if ($logm) {
            $this->addUsingAlias(LogmTableMap::COL_LOGINID, $logm->getLoginid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the logm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LogmTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LogmTableMap::clearInstancePool();
            LogmTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LogmTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LogmTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LogmTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LogmTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LogmQuery
