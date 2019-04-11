<?php

namespace Base;

use \WhseTbl as ChildWhseTbl;
use \WhseTblQuery as ChildWhseTblQuery;
use \Exception;
use \PDO;
use Map\WhseTblTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'whse_tbl' table.
 *
 *
 *
 * @method     ChildWhseTblQuery orderByWhseid($order = Criteria::ASC) Order by the whseid column
 * @method     ChildWhseTblQuery orderByWhsename($order = Criteria::ASC) Order by the whsename column
 * @method     ChildWhseTblQuery orderByWhseadr1($order = Criteria::ASC) Order by the whseadr1 column
 * @method     ChildWhseTblQuery orderByWhseadr2($order = Criteria::ASC) Order by the whseadr2 column
 * @method     ChildWhseTblQuery orderByWhsecity($order = Criteria::ASC) Order by the whsecity column
 * @method     ChildWhseTblQuery orderByWhsestat($order = Criteria::ASC) Order by the whsestat column
 * @method     ChildWhseTblQuery orderByWhsezipcode($order = Criteria::ASC) Order by the whsezipcode column
 * @method     ChildWhseTblQuery orderByWhsectry($order = Criteria::ASC) Order by the whsectry column
 * @method     ChildWhseTblQuery orderByWhseusehandheld($order = Criteria::ASC) Order by the whseusehandheld column
 * @method     ChildWhseTblQuery orderByWhsecashcust($order = Criteria::ASC) Order by the whsecashcust column
 * @method     ChildWhseTblQuery orderByWhsepickdtl($order = Criteria::ASC) Order by the whsepickdtl column
 * @method     ChildWhseTblQuery orderByWhseprodbin($order = Criteria::ASC) Order by the whseprodbin column
 * @method     ChildWhseTblQuery orderByWhsephone($order = Criteria::ASC) Order by the whsephone column
 * @method     ChildWhseTblQuery orderByWhsephoneext($order = Criteria::ASC) Order by the whsephoneext column
 * @method     ChildWhseTblQuery orderByWhsefax($order = Criteria::ASC) Order by the whsefax column
 * @method     ChildWhseTblQuery orderByWhseemailadr($order = Criteria::ASC) Order by the whseemailadr column
 * @method     ChildWhseTblQuery orderByWhseqcrgabin($order = Criteria::ASC) Order by the whseqcrgabin column
 * @method     ChildWhseTblQuery orderByWhserfprinter1($order = Criteria::ASC) Order by the whserfprinter1 column
 * @method     ChildWhseTblQuery orderByWhserfprinter2($order = Criteria::ASC) Order by the whserfprinter2 column
 * @method     ChildWhseTblQuery orderByWhserfprinter3($order = Criteria::ASC) Order by the whserfprinter3 column
 * @method     ChildWhseTblQuery orderByWhserfprinter4($order = Criteria::ASC) Order by the whserfprinter4 column
 * @method     ChildWhseTblQuery orderByWhserfprinter5($order = Criteria::ASC) Order by the whserfprinter5 column
 * @method     ChildWhseTblQuery orderByWhseprofwhse($order = Criteria::ASC) Order by the whseprofwhse column
 * @method     ChildWhseTblQuery orderByWhseasetwhse($order = Criteria::ASC) Order by the whseasetwhse column
 * @method     ChildWhseTblQuery orderByWhseconsignwhse($order = Criteria::ASC) Order by the whseconsignwhse column
 * @method     ChildWhseTblQuery orderByWhsebinrangelist($order = Criteria::ASC) Order by the whsebinrangelist column
 * @method     ChildWhseTblQuery orderByWhsesupplywhse($order = Criteria::ASC) Order by the whsesupplywhse column
 * @method     ChildWhseTblQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildWhseTblQuery groupByWhseid() Group by the whseid column
 * @method     ChildWhseTblQuery groupByWhsename() Group by the whsename column
 * @method     ChildWhseTblQuery groupByWhseadr1() Group by the whseadr1 column
 * @method     ChildWhseTblQuery groupByWhseadr2() Group by the whseadr2 column
 * @method     ChildWhseTblQuery groupByWhsecity() Group by the whsecity column
 * @method     ChildWhseTblQuery groupByWhsestat() Group by the whsestat column
 * @method     ChildWhseTblQuery groupByWhsezipcode() Group by the whsezipcode column
 * @method     ChildWhseTblQuery groupByWhsectry() Group by the whsectry column
 * @method     ChildWhseTblQuery groupByWhseusehandheld() Group by the whseusehandheld column
 * @method     ChildWhseTblQuery groupByWhsecashcust() Group by the whsecashcust column
 * @method     ChildWhseTblQuery groupByWhsepickdtl() Group by the whsepickdtl column
 * @method     ChildWhseTblQuery groupByWhseprodbin() Group by the whseprodbin column
 * @method     ChildWhseTblQuery groupByWhsephone() Group by the whsephone column
 * @method     ChildWhseTblQuery groupByWhsephoneext() Group by the whsephoneext column
 * @method     ChildWhseTblQuery groupByWhsefax() Group by the whsefax column
 * @method     ChildWhseTblQuery groupByWhseemailadr() Group by the whseemailadr column
 * @method     ChildWhseTblQuery groupByWhseqcrgabin() Group by the whseqcrgabin column
 * @method     ChildWhseTblQuery groupByWhserfprinter1() Group by the whserfprinter1 column
 * @method     ChildWhseTblQuery groupByWhserfprinter2() Group by the whserfprinter2 column
 * @method     ChildWhseTblQuery groupByWhserfprinter3() Group by the whserfprinter3 column
 * @method     ChildWhseTblQuery groupByWhserfprinter4() Group by the whserfprinter4 column
 * @method     ChildWhseTblQuery groupByWhserfprinter5() Group by the whserfprinter5 column
 * @method     ChildWhseTblQuery groupByWhseprofwhse() Group by the whseprofwhse column
 * @method     ChildWhseTblQuery groupByWhseasetwhse() Group by the whseasetwhse column
 * @method     ChildWhseTblQuery groupByWhseconsignwhse() Group by the whseconsignwhse column
 * @method     ChildWhseTblQuery groupByWhsebinrangelist() Group by the whsebinrangelist column
 * @method     ChildWhseTblQuery groupByWhsesupplywhse() Group by the whsesupplywhse column
 * @method     ChildWhseTblQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildWhseTblQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWhseTblQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWhseTblQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWhseTblQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWhseTblQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWhseTblQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWhseTbl findOne(ConnectionInterface $con = null) Return the first ChildWhseTbl matching the query
 * @method     ChildWhseTbl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWhseTbl matching the query, or a new ChildWhseTbl object populated from the query conditions when no match is found
 *
 * @method     ChildWhseTbl findOneByWhseid(string $whseid) Return the first ChildWhseTbl filtered by the whseid column
 * @method     ChildWhseTbl findOneByWhsename(string $whsename) Return the first ChildWhseTbl filtered by the whsename column
 * @method     ChildWhseTbl findOneByWhseadr1(string $whseadr1) Return the first ChildWhseTbl filtered by the whseadr1 column
 * @method     ChildWhseTbl findOneByWhseadr2(string $whseadr2) Return the first ChildWhseTbl filtered by the whseadr2 column
 * @method     ChildWhseTbl findOneByWhsecity(string $whsecity) Return the first ChildWhseTbl filtered by the whsecity column
 * @method     ChildWhseTbl findOneByWhsestat(string $whsestat) Return the first ChildWhseTbl filtered by the whsestat column
 * @method     ChildWhseTbl findOneByWhsezipcode(string $whsezipcode) Return the first ChildWhseTbl filtered by the whsezipcode column
 * @method     ChildWhseTbl findOneByWhsectry(string $whsectry) Return the first ChildWhseTbl filtered by the whsectry column
 * @method     ChildWhseTbl findOneByWhseusehandheld(string $whseusehandheld) Return the first ChildWhseTbl filtered by the whseusehandheld column
 * @method     ChildWhseTbl findOneByWhsecashcust(string $whsecashcust) Return the first ChildWhseTbl filtered by the whsecashcust column
 * @method     ChildWhseTbl findOneByWhsepickdtl(string $whsepickdtl) Return the first ChildWhseTbl filtered by the whsepickdtl column
 * @method     ChildWhseTbl findOneByWhseprodbin(string $whseprodbin) Return the first ChildWhseTbl filtered by the whseprodbin column
 * @method     ChildWhseTbl findOneByWhsephone(string $whsephone) Return the first ChildWhseTbl filtered by the whsephone column
 * @method     ChildWhseTbl findOneByWhsephoneext(string $whsephoneext) Return the first ChildWhseTbl filtered by the whsephoneext column
 * @method     ChildWhseTbl findOneByWhsefax(string $whsefax) Return the first ChildWhseTbl filtered by the whsefax column
 * @method     ChildWhseTbl findOneByWhseemailadr(string $whseemailadr) Return the first ChildWhseTbl filtered by the whseemailadr column
 * @method     ChildWhseTbl findOneByWhseqcrgabin(string $whseqcrgabin) Return the first ChildWhseTbl filtered by the whseqcrgabin column
 * @method     ChildWhseTbl findOneByWhserfprinter1(string $whserfprinter1) Return the first ChildWhseTbl filtered by the whserfprinter1 column
 * @method     ChildWhseTbl findOneByWhserfprinter2(string $whserfprinter2) Return the first ChildWhseTbl filtered by the whserfprinter2 column
 * @method     ChildWhseTbl findOneByWhserfprinter3(string $whserfprinter3) Return the first ChildWhseTbl filtered by the whserfprinter3 column
 * @method     ChildWhseTbl findOneByWhserfprinter4(string $whserfprinter4) Return the first ChildWhseTbl filtered by the whserfprinter4 column
 * @method     ChildWhseTbl findOneByWhserfprinter5(string $whserfprinter5) Return the first ChildWhseTbl filtered by the whserfprinter5 column
 * @method     ChildWhseTbl findOneByWhseprofwhse(string $whseprofwhse) Return the first ChildWhseTbl filtered by the whseprofwhse column
 * @method     ChildWhseTbl findOneByWhseasetwhse(string $whseasetwhse) Return the first ChildWhseTbl filtered by the whseasetwhse column
 * @method     ChildWhseTbl findOneByWhseconsignwhse(string $whseconsignwhse) Return the first ChildWhseTbl filtered by the whseconsignwhse column
 * @method     ChildWhseTbl findOneByWhsebinrangelist(string $whsebinrangelist) Return the first ChildWhseTbl filtered by the whsebinrangelist column
 * @method     ChildWhseTbl findOneByWhsesupplywhse(string $whsesupplywhse) Return the first ChildWhseTbl filtered by the whsesupplywhse column
 * @method     ChildWhseTbl findOneByDummy(string $dummy) Return the first ChildWhseTbl filtered by the dummy column *

 * @method     ChildWhseTbl requirePk($key, ConnectionInterface $con = null) Return the ChildWhseTbl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOne(ConnectionInterface $con = null) Return the first ChildWhseTbl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseTbl requireOneByWhseid(string $whseid) Return the first ChildWhseTbl filtered by the whseid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsename(string $whsename) Return the first ChildWhseTbl filtered by the whsename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseadr1(string $whseadr1) Return the first ChildWhseTbl filtered by the whseadr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseadr2(string $whseadr2) Return the first ChildWhseTbl filtered by the whseadr2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsecity(string $whsecity) Return the first ChildWhseTbl filtered by the whsecity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsestat(string $whsestat) Return the first ChildWhseTbl filtered by the whsestat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsezipcode(string $whsezipcode) Return the first ChildWhseTbl filtered by the whsezipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsectry(string $whsectry) Return the first ChildWhseTbl filtered by the whsectry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseusehandheld(string $whseusehandheld) Return the first ChildWhseTbl filtered by the whseusehandheld column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsecashcust(string $whsecashcust) Return the first ChildWhseTbl filtered by the whsecashcust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsepickdtl(string $whsepickdtl) Return the first ChildWhseTbl filtered by the whsepickdtl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseprodbin(string $whseprodbin) Return the first ChildWhseTbl filtered by the whseprodbin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsephone(string $whsephone) Return the first ChildWhseTbl filtered by the whsephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsephoneext(string $whsephoneext) Return the first ChildWhseTbl filtered by the whsephoneext column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsefax(string $whsefax) Return the first ChildWhseTbl filtered by the whsefax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseemailadr(string $whseemailadr) Return the first ChildWhseTbl filtered by the whseemailadr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseqcrgabin(string $whseqcrgabin) Return the first ChildWhseTbl filtered by the whseqcrgabin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhserfprinter1(string $whserfprinter1) Return the first ChildWhseTbl filtered by the whserfprinter1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhserfprinter2(string $whserfprinter2) Return the first ChildWhseTbl filtered by the whserfprinter2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhserfprinter3(string $whserfprinter3) Return the first ChildWhseTbl filtered by the whserfprinter3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhserfprinter4(string $whserfprinter4) Return the first ChildWhseTbl filtered by the whserfprinter4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhserfprinter5(string $whserfprinter5) Return the first ChildWhseTbl filtered by the whserfprinter5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseprofwhse(string $whseprofwhse) Return the first ChildWhseTbl filtered by the whseprofwhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseasetwhse(string $whseasetwhse) Return the first ChildWhseTbl filtered by the whseasetwhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhseconsignwhse(string $whseconsignwhse) Return the first ChildWhseTbl filtered by the whseconsignwhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsebinrangelist(string $whsebinrangelist) Return the first ChildWhseTbl filtered by the whsebinrangelist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByWhsesupplywhse(string $whsesupplywhse) Return the first ChildWhseTbl filtered by the whsesupplywhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWhseTbl requireOneByDummy(string $dummy) Return the first ChildWhseTbl filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWhseTbl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWhseTbl objects based on current ModelCriteria
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseid(string $whseid) Return ChildWhseTbl objects filtered by the whseid column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsename(string $whsename) Return ChildWhseTbl objects filtered by the whsename column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseadr1(string $whseadr1) Return ChildWhseTbl objects filtered by the whseadr1 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseadr2(string $whseadr2) Return ChildWhseTbl objects filtered by the whseadr2 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsecity(string $whsecity) Return ChildWhseTbl objects filtered by the whsecity column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsestat(string $whsestat) Return ChildWhseTbl objects filtered by the whsestat column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsezipcode(string $whsezipcode) Return ChildWhseTbl objects filtered by the whsezipcode column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsectry(string $whsectry) Return ChildWhseTbl objects filtered by the whsectry column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseusehandheld(string $whseusehandheld) Return ChildWhseTbl objects filtered by the whseusehandheld column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsecashcust(string $whsecashcust) Return ChildWhseTbl objects filtered by the whsecashcust column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsepickdtl(string $whsepickdtl) Return ChildWhseTbl objects filtered by the whsepickdtl column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseprodbin(string $whseprodbin) Return ChildWhseTbl objects filtered by the whseprodbin column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsephone(string $whsephone) Return ChildWhseTbl objects filtered by the whsephone column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsephoneext(string $whsephoneext) Return ChildWhseTbl objects filtered by the whsephoneext column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsefax(string $whsefax) Return ChildWhseTbl objects filtered by the whsefax column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseemailadr(string $whseemailadr) Return ChildWhseTbl objects filtered by the whseemailadr column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseqcrgabin(string $whseqcrgabin) Return ChildWhseTbl objects filtered by the whseqcrgabin column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhserfprinter1(string $whserfprinter1) Return ChildWhseTbl objects filtered by the whserfprinter1 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhserfprinter2(string $whserfprinter2) Return ChildWhseTbl objects filtered by the whserfprinter2 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhserfprinter3(string $whserfprinter3) Return ChildWhseTbl objects filtered by the whserfprinter3 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhserfprinter4(string $whserfprinter4) Return ChildWhseTbl objects filtered by the whserfprinter4 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhserfprinter5(string $whserfprinter5) Return ChildWhseTbl objects filtered by the whserfprinter5 column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseprofwhse(string $whseprofwhse) Return ChildWhseTbl objects filtered by the whseprofwhse column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseasetwhse(string $whseasetwhse) Return ChildWhseTbl objects filtered by the whseasetwhse column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhseconsignwhse(string $whseconsignwhse) Return ChildWhseTbl objects filtered by the whseconsignwhse column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsebinrangelist(string $whsebinrangelist) Return ChildWhseTbl objects filtered by the whsebinrangelist column
 * @method     ChildWhseTbl[]|ObjectCollection findByWhsesupplywhse(string $whsesupplywhse) Return ChildWhseTbl objects filtered by the whsesupplywhse column
 * @method     ChildWhseTbl[]|ObjectCollection findByDummy(string $dummy) Return ChildWhseTbl objects filtered by the dummy column
 * @method     ChildWhseTbl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WhseTblQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WhseTblQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\WhseTbl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWhseTblQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWhseTblQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWhseTblQuery) {
            return $criteria;
        }
        $query = new ChildWhseTblQuery();
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
     * @return ChildWhseTbl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WhseTblTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WhseTblTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildWhseTbl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT whseid, whsename, whseadr1, whseadr2, whsecity, whsestat, whsezipcode, whsectry, whseusehandheld, whsecashcust, whsepickdtl, whseprodbin, whsephone, whsephoneext, whsefax, whseemailadr, whseqcrgabin, whserfprinter1, whserfprinter2, whserfprinter3, whserfprinter4, whserfprinter5, whseprofwhse, whseasetwhse, whseconsignwhse, whsebinrangelist, whsesupplywhse, dummy FROM whse_tbl WHERE whseid = :p0';
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
            /** @var ChildWhseTbl $obj */
            $obj = new ChildWhseTbl();
            $obj->hydrate($row);
            WhseTblTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildWhseTbl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEID, $keys, Criteria::IN);
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
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseid($whseid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEID, $whseid, $comparison);
    }

    /**
     * Filter the query on the whsename column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsename('fooValue');   // WHERE whsename = 'fooValue'
     * $query->filterByWhsename('%fooValue%', Criteria::LIKE); // WHERE whsename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsename($whsename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSENAME, $whsename, $comparison);
    }

    /**
     * Filter the query on the whseadr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseadr1('fooValue');   // WHERE whseadr1 = 'fooValue'
     * $query->filterByWhseadr1('%fooValue%', Criteria::LIKE); // WHERE whseadr1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseadr1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseadr1($whseadr1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseadr1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEADR1, $whseadr1, $comparison);
    }

    /**
     * Filter the query on the whseadr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseadr2('fooValue');   // WHERE whseadr2 = 'fooValue'
     * $query->filterByWhseadr2('%fooValue%', Criteria::LIKE); // WHERE whseadr2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseadr2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseadr2($whseadr2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseadr2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEADR2, $whseadr2, $comparison);
    }

    /**
     * Filter the query on the whsecity column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsecity('fooValue');   // WHERE whsecity = 'fooValue'
     * $query->filterByWhsecity('%fooValue%', Criteria::LIKE); // WHERE whsecity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsecity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsecity($whsecity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsecity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSECITY, $whsecity, $comparison);
    }

    /**
     * Filter the query on the whsestat column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsestat('fooValue');   // WHERE whsestat = 'fooValue'
     * $query->filterByWhsestat('%fooValue%', Criteria::LIKE); // WHERE whsestat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsestat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsestat($whsestat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsestat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSESTAT, $whsestat, $comparison);
    }

    /**
     * Filter the query on the whsezipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsezipcode('fooValue');   // WHERE whsezipcode = 'fooValue'
     * $query->filterByWhsezipcode('%fooValue%', Criteria::LIKE); // WHERE whsezipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsezipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsezipcode($whsezipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsezipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEZIPCODE, $whsezipcode, $comparison);
    }

    /**
     * Filter the query on the whsectry column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsectry('fooValue');   // WHERE whsectry = 'fooValue'
     * $query->filterByWhsectry('%fooValue%', Criteria::LIKE); // WHERE whsectry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsectry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsectry($whsectry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsectry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSECTRY, $whsectry, $comparison);
    }

    /**
     * Filter the query on the whseusehandheld column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseusehandheld('fooValue');   // WHERE whseusehandheld = 'fooValue'
     * $query->filterByWhseusehandheld('%fooValue%', Criteria::LIKE); // WHERE whseusehandheld LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseusehandheld The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseusehandheld($whseusehandheld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseusehandheld)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEUSEHANDHELD, $whseusehandheld, $comparison);
    }

    /**
     * Filter the query on the whsecashcust column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsecashcust('fooValue');   // WHERE whsecashcust = 'fooValue'
     * $query->filterByWhsecashcust('%fooValue%', Criteria::LIKE); // WHERE whsecashcust LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsecashcust The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsecashcust($whsecashcust = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsecashcust)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSECASHCUST, $whsecashcust, $comparison);
    }

    /**
     * Filter the query on the whsepickdtl column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsepickdtl('fooValue');   // WHERE whsepickdtl = 'fooValue'
     * $query->filterByWhsepickdtl('%fooValue%', Criteria::LIKE); // WHERE whsepickdtl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsepickdtl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsepickdtl($whsepickdtl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsepickdtl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEPICKDTL, $whsepickdtl, $comparison);
    }

    /**
     * Filter the query on the whseprodbin column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseprodbin('fooValue');   // WHERE whseprodbin = 'fooValue'
     * $query->filterByWhseprodbin('%fooValue%', Criteria::LIKE); // WHERE whseprodbin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseprodbin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseprodbin($whseprodbin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseprodbin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEPRODBIN, $whseprodbin, $comparison);
    }

    /**
     * Filter the query on the whsephone column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsephone('fooValue');   // WHERE whsephone = 'fooValue'
     * $query->filterByWhsephone('%fooValue%', Criteria::LIKE); // WHERE whsephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsephone($whsephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEPHONE, $whsephone, $comparison);
    }

    /**
     * Filter the query on the whsephoneext column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsephoneext('fooValue');   // WHERE whsephoneext = 'fooValue'
     * $query->filterByWhsephoneext('%fooValue%', Criteria::LIKE); // WHERE whsephoneext LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsephoneext The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsephoneext($whsephoneext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsephoneext)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEPHONEEXT, $whsephoneext, $comparison);
    }

    /**
     * Filter the query on the whsefax column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsefax('fooValue');   // WHERE whsefax = 'fooValue'
     * $query->filterByWhsefax('%fooValue%', Criteria::LIKE); // WHERE whsefax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsefax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsefax($whsefax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsefax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEFAX, $whsefax, $comparison);
    }

    /**
     * Filter the query on the whseemailadr column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseemailadr('fooValue');   // WHERE whseemailadr = 'fooValue'
     * $query->filterByWhseemailadr('%fooValue%', Criteria::LIKE); // WHERE whseemailadr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseemailadr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseemailadr($whseemailadr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseemailadr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEEMAILADR, $whseemailadr, $comparison);
    }

    /**
     * Filter the query on the whseqcrgabin column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseqcrgabin('fooValue');   // WHERE whseqcrgabin = 'fooValue'
     * $query->filterByWhseqcrgabin('%fooValue%', Criteria::LIKE); // WHERE whseqcrgabin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseqcrgabin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseqcrgabin($whseqcrgabin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseqcrgabin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEQCRGABIN, $whseqcrgabin, $comparison);
    }

    /**
     * Filter the query on the whserfprinter1 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhserfprinter1('fooValue');   // WHERE whserfprinter1 = 'fooValue'
     * $query->filterByWhserfprinter1('%fooValue%', Criteria::LIKE); // WHERE whserfprinter1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whserfprinter1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhserfprinter1($whserfprinter1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whserfprinter1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSERFPRINTER1, $whserfprinter1, $comparison);
    }

    /**
     * Filter the query on the whserfprinter2 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhserfprinter2('fooValue');   // WHERE whserfprinter2 = 'fooValue'
     * $query->filterByWhserfprinter2('%fooValue%', Criteria::LIKE); // WHERE whserfprinter2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whserfprinter2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhserfprinter2($whserfprinter2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whserfprinter2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSERFPRINTER2, $whserfprinter2, $comparison);
    }

    /**
     * Filter the query on the whserfprinter3 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhserfprinter3('fooValue');   // WHERE whserfprinter3 = 'fooValue'
     * $query->filterByWhserfprinter3('%fooValue%', Criteria::LIKE); // WHERE whserfprinter3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whserfprinter3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhserfprinter3($whserfprinter3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whserfprinter3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSERFPRINTER3, $whserfprinter3, $comparison);
    }

    /**
     * Filter the query on the whserfprinter4 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhserfprinter4('fooValue');   // WHERE whserfprinter4 = 'fooValue'
     * $query->filterByWhserfprinter4('%fooValue%', Criteria::LIKE); // WHERE whserfprinter4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whserfprinter4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhserfprinter4($whserfprinter4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whserfprinter4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSERFPRINTER4, $whserfprinter4, $comparison);
    }

    /**
     * Filter the query on the whserfprinter5 column
     *
     * Example usage:
     * <code>
     * $query->filterByWhserfprinter5('fooValue');   // WHERE whserfprinter5 = 'fooValue'
     * $query->filterByWhserfprinter5('%fooValue%', Criteria::LIKE); // WHERE whserfprinter5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whserfprinter5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhserfprinter5($whserfprinter5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whserfprinter5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSERFPRINTER5, $whserfprinter5, $comparison);
    }

    /**
     * Filter the query on the whseprofwhse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseprofwhse('fooValue');   // WHERE whseprofwhse = 'fooValue'
     * $query->filterByWhseprofwhse('%fooValue%', Criteria::LIKE); // WHERE whseprofwhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseprofwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseprofwhse($whseprofwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseprofwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEPROFWHSE, $whseprofwhse, $comparison);
    }

    /**
     * Filter the query on the whseasetwhse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseasetwhse('fooValue');   // WHERE whseasetwhse = 'fooValue'
     * $query->filterByWhseasetwhse('%fooValue%', Criteria::LIKE); // WHERE whseasetwhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseasetwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseasetwhse($whseasetwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseasetwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEASETWHSE, $whseasetwhse, $comparison);
    }

    /**
     * Filter the query on the whseconsignwhse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhseconsignwhse('fooValue');   // WHERE whseconsignwhse = 'fooValue'
     * $query->filterByWhseconsignwhse('%fooValue%', Criteria::LIKE); // WHERE whseconsignwhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whseconsignwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhseconsignwhse($whseconsignwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whseconsignwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSECONSIGNWHSE, $whseconsignwhse, $comparison);
    }

    /**
     * Filter the query on the whsebinrangelist column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsebinrangelist('fooValue');   // WHERE whsebinrangelist = 'fooValue'
     * $query->filterByWhsebinrangelist('%fooValue%', Criteria::LIKE); // WHERE whsebinrangelist LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsebinrangelist The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsebinrangelist($whsebinrangelist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsebinrangelist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSEBINRANGELIST, $whsebinrangelist, $comparison);
    }

    /**
     * Filter the query on the whsesupplywhse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhsesupplywhse('fooValue');   // WHERE whsesupplywhse = 'fooValue'
     * $query->filterByWhsesupplywhse('%fooValue%', Criteria::LIKE); // WHERE whsesupplywhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whsesupplywhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByWhsesupplywhse($whsesupplywhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whsesupplywhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_WHSESUPPLYWHSE, $whsesupplywhse, $comparison);
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
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WhseTblTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWhseTbl $whseTbl Object to remove from the list of results
     *
     * @return $this|ChildWhseTblQuery The current query, for fluid interface
     */
    public function prune($whseTbl = null)
    {
        if ($whseTbl) {
            $this->addUsingAlias(WhseTblTableMap::COL_WHSEID, $whseTbl->getWhseid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the whse_tbl table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseTblTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WhseTblTableMap::clearInstancePool();
            WhseTblTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseTblTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WhseTblTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WhseTblTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WhseTblTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WhseTblQuery
