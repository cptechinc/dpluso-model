<?php

namespace Base;

use \Doccntl as ChildDoccntl;
use \DoccntlQuery as ChildDoccntlQuery;
use \Exception;
use \PDO;
use Map\DoccntlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'doccntl' table.
 *
 *
 *
 * @method     ChildDoccntlQuery orderByFolder($order = Criteria::ASC) Order by the folder column
 * @method     ChildDoccntlQuery orderByDesc($order = Criteria::ASC) Order by the desc column
 * @method     ChildDoccntlQuery orderByDirectory($order = Criteria::ASC) Order by the directory column
 * @method     ChildDoccntlQuery orderByTag($order = Criteria::ASC) Order by the tag column
 * @method     ChildDoccntlQuery orderByField1title($order = Criteria::ASC) Order by the field1title column
 * @method     ChildDoccntlQuery orderByField2title($order = Criteria::ASC) Order by the field2title column
 * @method     ChildDoccntlQuery orderByField3title($order = Criteria::ASC) Order by the field3title column
 * @method     ChildDoccntlQuery orderByDatecreated($order = Criteria::ASC) Order by the datecreated column
 * @method     ChildDoccntlQuery orderByTimecreated($order = Criteria::ASC) Order by the timecreated column
 * @method     ChildDoccntlQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildDoccntlQuery groupByFolder() Group by the folder column
 * @method     ChildDoccntlQuery groupByDesc() Group by the desc column
 * @method     ChildDoccntlQuery groupByDirectory() Group by the directory column
 * @method     ChildDoccntlQuery groupByTag() Group by the tag column
 * @method     ChildDoccntlQuery groupByField1title() Group by the field1title column
 * @method     ChildDoccntlQuery groupByField2title() Group by the field2title column
 * @method     ChildDoccntlQuery groupByField3title() Group by the field3title column
 * @method     ChildDoccntlQuery groupByDatecreated() Group by the datecreated column
 * @method     ChildDoccntlQuery groupByTimecreated() Group by the timecreated column
 * @method     ChildDoccntlQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildDoccntlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDoccntlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDoccntlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDoccntlQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDoccntlQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDoccntlQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDoccntl findOne(ConnectionInterface $con = null) Return the first ChildDoccntl matching the query
 * @method     ChildDoccntl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDoccntl matching the query, or a new ChildDoccntl object populated from the query conditions when no match is found
 *
 * @method     ChildDoccntl findOneByFolder(string $folder) Return the first ChildDoccntl filtered by the folder column
 * @method     ChildDoccntl findOneByDesc(string $desc) Return the first ChildDoccntl filtered by the desc column
 * @method     ChildDoccntl findOneByDirectory(string $directory) Return the first ChildDoccntl filtered by the directory column
 * @method     ChildDoccntl findOneByTag(string $tag) Return the first ChildDoccntl filtered by the tag column
 * @method     ChildDoccntl findOneByField1title(string $field1title) Return the first ChildDoccntl filtered by the field1title column
 * @method     ChildDoccntl findOneByField2title(string $field2title) Return the first ChildDoccntl filtered by the field2title column
 * @method     ChildDoccntl findOneByField3title(string $field3title) Return the first ChildDoccntl filtered by the field3title column
 * @method     ChildDoccntl findOneByDatecreated(string $datecreated) Return the first ChildDoccntl filtered by the datecreated column
 * @method     ChildDoccntl findOneByTimecreated(string $timecreated) Return the first ChildDoccntl filtered by the timecreated column
 * @method     ChildDoccntl findOneByDummy(string $dummy) Return the first ChildDoccntl filtered by the dummy column *

 * @method     ChildDoccntl requirePk($key, ConnectionInterface $con = null) Return the ChildDoccntl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOne(ConnectionInterface $con = null) Return the first ChildDoccntl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDoccntl requireOneByFolder(string $folder) Return the first ChildDoccntl filtered by the folder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByDesc(string $desc) Return the first ChildDoccntl filtered by the desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByDirectory(string $directory) Return the first ChildDoccntl filtered by the directory column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByTag(string $tag) Return the first ChildDoccntl filtered by the tag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByField1title(string $field1title) Return the first ChildDoccntl filtered by the field1title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByField2title(string $field2title) Return the first ChildDoccntl filtered by the field2title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByField3title(string $field3title) Return the first ChildDoccntl filtered by the field3title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByDatecreated(string $datecreated) Return the first ChildDoccntl filtered by the datecreated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByTimecreated(string $timecreated) Return the first ChildDoccntl filtered by the timecreated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDoccntl requireOneByDummy(string $dummy) Return the first ChildDoccntl filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDoccntl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDoccntl objects based on current ModelCriteria
 * @method     ChildDoccntl[]|ObjectCollection findByFolder(string $folder) Return ChildDoccntl objects filtered by the folder column
 * @method     ChildDoccntl[]|ObjectCollection findByDesc(string $desc) Return ChildDoccntl objects filtered by the desc column
 * @method     ChildDoccntl[]|ObjectCollection findByDirectory(string $directory) Return ChildDoccntl objects filtered by the directory column
 * @method     ChildDoccntl[]|ObjectCollection findByTag(string $tag) Return ChildDoccntl objects filtered by the tag column
 * @method     ChildDoccntl[]|ObjectCollection findByField1title(string $field1title) Return ChildDoccntl objects filtered by the field1title column
 * @method     ChildDoccntl[]|ObjectCollection findByField2title(string $field2title) Return ChildDoccntl objects filtered by the field2title column
 * @method     ChildDoccntl[]|ObjectCollection findByField3title(string $field3title) Return ChildDoccntl objects filtered by the field3title column
 * @method     ChildDoccntl[]|ObjectCollection findByDatecreated(string $datecreated) Return ChildDoccntl objects filtered by the datecreated column
 * @method     ChildDoccntl[]|ObjectCollection findByTimecreated(string $timecreated) Return ChildDoccntl objects filtered by the timecreated column
 * @method     ChildDoccntl[]|ObjectCollection findByDummy(string $dummy) Return ChildDoccntl objects filtered by the dummy column
 * @method     ChildDoccntl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DoccntlQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DoccntlQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Doccntl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDoccntlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDoccntlQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDoccntlQuery) {
            return $criteria;
        }
        $query = new ChildDoccntlQuery();
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
     * @return ChildDoccntl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DoccntlTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DoccntlTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDoccntl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT folder, desc, directory, tag, field1title, field2title, field3title, datecreated, timecreated, dummy FROM doccntl WHERE folder = :p0';
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
            /** @var ChildDoccntl $obj */
            $obj = new ChildDoccntl();
            $obj->hydrate($row);
            DoccntlTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDoccntl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DoccntlTableMap::COL_FOLDER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DoccntlTableMap::COL_FOLDER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the folder column
     *
     * Example usage:
     * <code>
     * $query->filterByFolder('fooValue');   // WHERE folder = 'fooValue'
     * $query->filterByFolder('%fooValue%', Criteria::LIKE); // WHERE folder LIKE '%fooValue%'
     * </code>
     *
     * @param     string $folder The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByFolder($folder = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($folder)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_FOLDER, $folder, $comparison);
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
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByDesc($desc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_DESC, $desc, $comparison);
    }

    /**
     * Filter the query on the directory column
     *
     * Example usage:
     * <code>
     * $query->filterByDirectory('fooValue');   // WHERE directory = 'fooValue'
     * $query->filterByDirectory('%fooValue%', Criteria::LIKE); // WHERE directory LIKE '%fooValue%'
     * </code>
     *
     * @param     string $directory The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByDirectory($directory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($directory)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_DIRECTORY, $directory, $comparison);
    }

    /**
     * Filter the query on the tag column
     *
     * Example usage:
     * <code>
     * $query->filterByTag('fooValue');   // WHERE tag = 'fooValue'
     * $query->filterByTag('%fooValue%', Criteria::LIKE); // WHERE tag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByTag($tag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_TAG, $tag, $comparison);
    }

    /**
     * Filter the query on the field1title column
     *
     * Example usage:
     * <code>
     * $query->filterByField1title('fooValue');   // WHERE field1title = 'fooValue'
     * $query->filterByField1title('%fooValue%', Criteria::LIKE); // WHERE field1title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $field1title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByField1title($field1title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($field1title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_FIELD1TITLE, $field1title, $comparison);
    }

    /**
     * Filter the query on the field2title column
     *
     * Example usage:
     * <code>
     * $query->filterByField2title('fooValue');   // WHERE field2title = 'fooValue'
     * $query->filterByField2title('%fooValue%', Criteria::LIKE); // WHERE field2title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $field2title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByField2title($field2title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($field2title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_FIELD2TITLE, $field2title, $comparison);
    }

    /**
     * Filter the query on the field3title column
     *
     * Example usage:
     * <code>
     * $query->filterByField3title('fooValue');   // WHERE field3title = 'fooValue'
     * $query->filterByField3title('%fooValue%', Criteria::LIKE); // WHERE field3title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $field3title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByField3title($field3title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($field3title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_FIELD3TITLE, $field3title, $comparison);
    }

    /**
     * Filter the query on the datecreated column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecreated('fooValue');   // WHERE datecreated = 'fooValue'
     * $query->filterByDatecreated('%fooValue%', Criteria::LIKE); // WHERE datecreated LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datecreated The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByDatecreated($datecreated = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datecreated)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_DATECREATED, $datecreated, $comparison);
    }

    /**
     * Filter the query on the timecreated column
     *
     * Example usage:
     * <code>
     * $query->filterByTimecreated('fooValue');   // WHERE timecreated = 'fooValue'
     * $query->filterByTimecreated('%fooValue%', Criteria::LIKE); // WHERE timecreated LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timecreated The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByTimecreated($timecreated = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timecreated)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_TIMECREATED, $timecreated, $comparison);
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
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DoccntlTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDoccntl $doccntl Object to remove from the list of results
     *
     * @return $this|ChildDoccntlQuery The current query, for fluid interface
     */
    public function prune($doccntl = null)
    {
        if ($doccntl) {
            $this->addUsingAlias(DoccntlTableMap::COL_FOLDER, $doccntl->getFolder(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the doccntl table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DoccntlTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DoccntlTableMap::clearInstancePool();
            DoccntlTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DoccntlTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DoccntlTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DoccntlTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DoccntlTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DoccntlQuery
