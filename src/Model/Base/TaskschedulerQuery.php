<?php

namespace Base;

use \Taskscheduler as ChildTaskscheduler;
use \TaskschedulerQuery as ChildTaskschedulerQuery;
use \Exception;
use \PDO;
use Map\TaskschedulerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `taskscheduler` table.
 *
 * @method     ChildTaskschedulerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTaskschedulerQuery orderByDatecreated($order = Criteria::ASC) Order by the datecreated column
 * @method     ChildTaskschedulerQuery orderByStartdate($order = Criteria::ASC) Order by the startdate column
 * @method     ChildTaskschedulerQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildTaskschedulerQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ChildTaskschedulerQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildTaskschedulerQuery orderByTasktype($order = Criteria::ASC) Order by the tasktype column
 * @method     ChildTaskschedulerQuery orderByRepeatlogic($order = Criteria::ASC) Order by the repeatlogic column
 * @method     ChildTaskschedulerQuery orderByCustomerlink($order = Criteria::ASC) Order by the customerlink column
 * @method     ChildTaskschedulerQuery orderByShiptolink($order = Criteria::ASC) Order by the shiptolink column
 * @method     ChildTaskschedulerQuery orderByContactlink($order = Criteria::ASC) Order by the contactlink column
 *
 * @method     ChildTaskschedulerQuery groupById() Group by the id column
 * @method     ChildTaskschedulerQuery groupByDatecreated() Group by the datecreated column
 * @method     ChildTaskschedulerQuery groupByStartdate() Group by the startdate column
 * @method     ChildTaskschedulerQuery groupByUser() Group by the user column
 * @method     ChildTaskschedulerQuery groupByActive() Group by the active column
 * @method     ChildTaskschedulerQuery groupByDescription() Group by the description column
 * @method     ChildTaskschedulerQuery groupByTasktype() Group by the tasktype column
 * @method     ChildTaskschedulerQuery groupByRepeatlogic() Group by the repeatlogic column
 * @method     ChildTaskschedulerQuery groupByCustomerlink() Group by the customerlink column
 * @method     ChildTaskschedulerQuery groupByShiptolink() Group by the shiptolink column
 * @method     ChildTaskschedulerQuery groupByContactlink() Group by the contactlink column
 *
 * @method     ChildTaskschedulerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTaskschedulerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTaskschedulerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTaskschedulerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTaskschedulerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTaskschedulerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTaskscheduler|null findOne(?ConnectionInterface $con = null) Return the first ChildTaskscheduler matching the query
 * @method     ChildTaskscheduler findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildTaskscheduler matching the query, or a new ChildTaskscheduler object populated from the query conditions when no match is found
 *
 * @method     ChildTaskscheduler|null findOneById(int $id) Return the first ChildTaskscheduler filtered by the id column
 * @method     ChildTaskscheduler|null findOneByDatecreated(string $datecreated) Return the first ChildTaskscheduler filtered by the datecreated column
 * @method     ChildTaskscheduler|null findOneByStartdate(string $startdate) Return the first ChildTaskscheduler filtered by the startdate column
 * @method     ChildTaskscheduler|null findOneByUser(string $user) Return the first ChildTaskscheduler filtered by the user column
 * @method     ChildTaskscheduler|null findOneByActive(string $active) Return the first ChildTaskscheduler filtered by the active column
 * @method     ChildTaskscheduler|null findOneByDescription(string $description) Return the first ChildTaskscheduler filtered by the description column
 * @method     ChildTaskscheduler|null findOneByTasktype(string $tasktype) Return the first ChildTaskscheduler filtered by the tasktype column
 * @method     ChildTaskscheduler|null findOneByRepeatlogic(string $repeatlogic) Return the first ChildTaskscheduler filtered by the repeatlogic column
 * @method     ChildTaskscheduler|null findOneByCustomerlink(string $customerlink) Return the first ChildTaskscheduler filtered by the customerlink column
 * @method     ChildTaskscheduler|null findOneByShiptolink(string $shiptolink) Return the first ChildTaskscheduler filtered by the shiptolink column
 * @method     ChildTaskscheduler|null findOneByContactlink(string $contactlink) Return the first ChildTaskscheduler filtered by the contactlink column
 *
 * @method     ChildTaskscheduler requirePk($key, ?ConnectionInterface $con = null) Return the ChildTaskscheduler by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOne(?ConnectionInterface $con = null) Return the first ChildTaskscheduler matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTaskscheduler requireOneById(int $id) Return the first ChildTaskscheduler filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByDatecreated(string $datecreated) Return the first ChildTaskscheduler filtered by the datecreated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByStartdate(string $startdate) Return the first ChildTaskscheduler filtered by the startdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByUser(string $user) Return the first ChildTaskscheduler filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByActive(string $active) Return the first ChildTaskscheduler filtered by the active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByDescription(string $description) Return the first ChildTaskscheduler filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByTasktype(string $tasktype) Return the first ChildTaskscheduler filtered by the tasktype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByRepeatlogic(string $repeatlogic) Return the first ChildTaskscheduler filtered by the repeatlogic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByCustomerlink(string $customerlink) Return the first ChildTaskscheduler filtered by the customerlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByShiptolink(string $shiptolink) Return the first ChildTaskscheduler filtered by the shiptolink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskscheduler requireOneByContactlink(string $contactlink) Return the first ChildTaskscheduler filtered by the contactlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTaskscheduler[]|Collection find(?ConnectionInterface $con = null) Return ChildTaskscheduler objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> find(?ConnectionInterface $con = null) Return ChildTaskscheduler objects based on current ModelCriteria
 *
 * @method     ChildTaskscheduler[]|Collection findById(int|array<int> $id) Return ChildTaskscheduler objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findById(int|array<int> $id) Return ChildTaskscheduler objects filtered by the id column
 * @method     ChildTaskscheduler[]|Collection findByDatecreated(string|array<string> $datecreated) Return ChildTaskscheduler objects filtered by the datecreated column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByDatecreated(string|array<string> $datecreated) Return ChildTaskscheduler objects filtered by the datecreated column
 * @method     ChildTaskscheduler[]|Collection findByStartdate(string|array<string> $startdate) Return ChildTaskscheduler objects filtered by the startdate column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByStartdate(string|array<string> $startdate) Return ChildTaskscheduler objects filtered by the startdate column
 * @method     ChildTaskscheduler[]|Collection findByUser(string|array<string> $user) Return ChildTaskscheduler objects filtered by the user column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByUser(string|array<string> $user) Return ChildTaskscheduler objects filtered by the user column
 * @method     ChildTaskscheduler[]|Collection findByActive(string|array<string> $active) Return ChildTaskscheduler objects filtered by the active column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByActive(string|array<string> $active) Return ChildTaskscheduler objects filtered by the active column
 * @method     ChildTaskscheduler[]|Collection findByDescription(string|array<string> $description) Return ChildTaskscheduler objects filtered by the description column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByDescription(string|array<string> $description) Return ChildTaskscheduler objects filtered by the description column
 * @method     ChildTaskscheduler[]|Collection findByTasktype(string|array<string> $tasktype) Return ChildTaskscheduler objects filtered by the tasktype column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByTasktype(string|array<string> $tasktype) Return ChildTaskscheduler objects filtered by the tasktype column
 * @method     ChildTaskscheduler[]|Collection findByRepeatlogic(string|array<string> $repeatlogic) Return ChildTaskscheduler objects filtered by the repeatlogic column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByRepeatlogic(string|array<string> $repeatlogic) Return ChildTaskscheduler objects filtered by the repeatlogic column
 * @method     ChildTaskscheduler[]|Collection findByCustomerlink(string|array<string> $customerlink) Return ChildTaskscheduler objects filtered by the customerlink column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByCustomerlink(string|array<string> $customerlink) Return ChildTaskscheduler objects filtered by the customerlink column
 * @method     ChildTaskscheduler[]|Collection findByShiptolink(string|array<string> $shiptolink) Return ChildTaskscheduler objects filtered by the shiptolink column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByShiptolink(string|array<string> $shiptolink) Return ChildTaskscheduler objects filtered by the shiptolink column
 * @method     ChildTaskscheduler[]|Collection findByContactlink(string|array<string> $contactlink) Return ChildTaskscheduler objects filtered by the contactlink column
 * @psalm-method Collection&\Traversable<ChildTaskscheduler> findByContactlink(string|array<string> $contactlink) Return ChildTaskscheduler objects filtered by the contactlink column
 *
 * @method     ChildTaskscheduler[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildTaskscheduler> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class TaskschedulerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TaskschedulerQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Taskscheduler', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTaskschedulerQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTaskschedulerQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildTaskschedulerQuery) {
            return $criteria;
        }
        $query = new ChildTaskschedulerQuery();
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
     * @return ChildTaskscheduler|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TaskschedulerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TaskschedulerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTaskscheduler A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, datecreated, startdate, user, active, description, tasktype, repeatlogic, customerlink, shiptolink, contactlink FROM taskscheduler WHERE id = :p0';
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
            /** @var ChildTaskscheduler $obj */
            $obj = new ChildTaskscheduler();
            $obj->hydrate($row);
            TaskschedulerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTaskscheduler|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(TaskschedulerTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(TaskschedulerTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
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
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TaskschedulerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TaskschedulerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the datecreated column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecreated('2011-03-14'); // WHERE datecreated = '2011-03-14'
     * $query->filterByDatecreated('now'); // WHERE datecreated = '2011-03-14'
     * $query->filterByDatecreated(array('max' => 'yesterday')); // WHERE datecreated > '2011-03-13'
     * </code>
     *
     * @param mixed $datecreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDatecreated($datecreated = null, ?string $comparison = null)
    {
        if (is_array($datecreated)) {
            $useMinMax = false;
            if (isset($datecreated['min'])) {
                $this->addUsingAlias(TaskschedulerTableMap::COL_DATECREATED, $datecreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecreated['max'])) {
                $this->addUsingAlias(TaskschedulerTableMap::COL_DATECREATED, $datecreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_DATECREATED, $datecreated, $comparison);

        return $this;
    }

    /**
     * Filter the query on the startdate column
     *
     * Example usage:
     * <code>
     * $query->filterByStartdate('2011-03-14'); // WHERE startdate = '2011-03-14'
     * $query->filterByStartdate('now'); // WHERE startdate = '2011-03-14'
     * $query->filterByStartdate(array('max' => 'yesterday')); // WHERE startdate > '2011-03-13'
     * </code>
     *
     * @param mixed $startdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStartdate($startdate = null, ?string $comparison = null)
    {
        if (is_array($startdate)) {
            $useMinMax = false;
            if (isset($startdate['min'])) {
                $this->addUsingAlias(TaskschedulerTableMap::COL_STARTDATE, $startdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startdate['max'])) {
                $this->addUsingAlias(TaskschedulerTableMap::COL_STARTDATE, $startdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_STARTDATE, $startdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
     * $query->filterByUser('%fooValue%', Criteria::LIKE); // WHERE user LIKE '%fooValue%'
     * $query->filterByUser(['foo', 'bar']); // WHERE user IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $user The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUser($user = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_USER, $user, $comparison);

        return $this;
    }

    /**
     * Filter the query on the active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive('fooValue');   // WHERE active = 'fooValue'
     * $query->filterByActive('%fooValue%', Criteria::LIKE); // WHERE active LIKE '%fooValue%'
     * $query->filterByActive(['foo', 'bar']); // WHERE active IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $active The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByActive($active = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($active)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_ACTIVE, $active, $comparison);

        return $this;
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * $query->filterByDescription(['foo', 'bar']); // WHERE description IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $description The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDescription($description = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_DESCRIPTION, $description, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tasktype column
     *
     * Example usage:
     * <code>
     * $query->filterByTasktype('fooValue');   // WHERE tasktype = 'fooValue'
     * $query->filterByTasktype('%fooValue%', Criteria::LIKE); // WHERE tasktype LIKE '%fooValue%'
     * $query->filterByTasktype(['foo', 'bar']); // WHERE tasktype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tasktype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTasktype($tasktype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tasktype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_TASKTYPE, $tasktype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the repeatlogic column
     *
     * Example usage:
     * <code>
     * $query->filterByRepeatlogic('fooValue');   // WHERE repeatlogic = 'fooValue'
     * $query->filterByRepeatlogic('%fooValue%', Criteria::LIKE); // WHERE repeatlogic LIKE '%fooValue%'
     * $query->filterByRepeatlogic(['foo', 'bar']); // WHERE repeatlogic IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $repeatlogic The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRepeatlogic($repeatlogic = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($repeatlogic)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_REPEATLOGIC, $repeatlogic, $comparison);

        return $this;
    }

    /**
     * Filter the query on the customerlink column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerlink('fooValue');   // WHERE customerlink = 'fooValue'
     * $query->filterByCustomerlink('%fooValue%', Criteria::LIKE); // WHERE customerlink LIKE '%fooValue%'
     * $query->filterByCustomerlink(['foo', 'bar']); // WHERE customerlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $customerlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustomerlink($customerlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_CUSTOMERLINK, $customerlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shiptolink column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptolink('fooValue');   // WHERE shiptolink = 'fooValue'
     * $query->filterByShiptolink('%fooValue%', Criteria::LIKE); // WHERE shiptolink LIKE '%fooValue%'
     * $query->filterByShiptolink(['foo', 'bar']); // WHERE shiptolink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shiptolink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShiptolink($shiptolink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptolink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_SHIPTOLINK, $shiptolink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the contactlink column
     *
     * Example usage:
     * <code>
     * $query->filterByContactlink('fooValue');   // WHERE contactlink = 'fooValue'
     * $query->filterByContactlink('%fooValue%', Criteria::LIKE); // WHERE contactlink LIKE '%fooValue%'
     * $query->filterByContactlink(['foo', 'bar']); // WHERE contactlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $contactlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByContactlink($contactlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TaskschedulerTableMap::COL_CONTACTLINK, $contactlink, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildTaskscheduler $taskscheduler Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($taskscheduler = null)
    {
        if ($taskscheduler) {
            $this->addUsingAlias(TaskschedulerTableMap::COL_ID, $taskscheduler->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the taskscheduler table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskschedulerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TaskschedulerTableMap::clearInstancePool();
            TaskschedulerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TaskschedulerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TaskschedulerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TaskschedulerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TaskschedulerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
