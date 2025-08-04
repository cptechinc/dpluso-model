<?php

namespace Base;

use \Wmpickdet as ChildWmpickdet;
use \WmpickdetQuery as ChildWmpickdetQuery;
use \Exception;
use \PDO;
use Map\WmpickdetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `wmpickdet` table.
 *
 * @method     ChildWmpickdetQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildWmpickdetQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildWmpickdetQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildWmpickdetQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildWmpickdetQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildWmpickdetQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildWmpickdetQuery orderBySublinenbr($order = Criteria::ASC) Order by the sublinenbr column
 * @method     ChildWmpickdetQuery orderByItemnbr($order = Criteria::ASC) Order by the itemnbr column
 * @method     ChildWmpickdetQuery orderByItemdesc1($order = Criteria::ASC) Order by the itemdesc1 column
 * @method     ChildWmpickdetQuery orderByItemdesc2($order = Criteria::ASC) Order by the itemdesc2 column
 * @method     ChildWmpickdetQuery orderByQtyordered($order = Criteria::ASC) Order by the qtyordered column
 * @method     ChildWmpickdetQuery orderByQtypulled($order = Criteria::ASC) Order by the qtypulled column
 * @method     ChildWmpickdetQuery orderByQtyremaining($order = Criteria::ASC) Order by the qtyremaining column
 * @method     ChildWmpickdetQuery orderByBinnbr($order = Criteria::ASC) Order by the binnbr column
 * @method     ChildWmpickdetQuery orderByCaseqty($order = Criteria::ASC) Order by the caseqty column
 * @method     ChildWmpickdetQuery orderByInnerpack($order = Criteria::ASC) Order by the innerpack column
 * @method     ChildWmpickdetQuery orderByBinqty($order = Criteria::ASC) Order by the binqty column
 * @method     ChildWmpickdetQuery orderByOverbin1($order = Criteria::ASC) Order by the overbin1 column
 * @method     ChildWmpickdetQuery orderByOverbinqty1($order = Criteria::ASC) Order by the overbinqty1 column
 * @method     ChildWmpickdetQuery orderByOverbin2($order = Criteria::ASC) Order by the overbin2 column
 * @method     ChildWmpickdetQuery orderByOverbinqty2($order = Criteria::ASC) Order by the overbinqty2 column
 * @method     ChildWmpickdetQuery orderByStatusmsg($order = Criteria::ASC) Order by the statusmsg column
 * @method     ChildWmpickdetQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildWmpickdetQuery groupBySessionid() Group by the sessionid column
 * @method     ChildWmpickdetQuery groupByRecno() Group by the recno column
 * @method     ChildWmpickdetQuery groupByDate() Group by the date column
 * @method     ChildWmpickdetQuery groupByTime() Group by the time column
 * @method     ChildWmpickdetQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildWmpickdetQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildWmpickdetQuery groupBySublinenbr() Group by the sublinenbr column
 * @method     ChildWmpickdetQuery groupByItemnbr() Group by the itemnbr column
 * @method     ChildWmpickdetQuery groupByItemdesc1() Group by the itemdesc1 column
 * @method     ChildWmpickdetQuery groupByItemdesc2() Group by the itemdesc2 column
 * @method     ChildWmpickdetQuery groupByQtyordered() Group by the qtyordered column
 * @method     ChildWmpickdetQuery groupByQtypulled() Group by the qtypulled column
 * @method     ChildWmpickdetQuery groupByQtyremaining() Group by the qtyremaining column
 * @method     ChildWmpickdetQuery groupByBinnbr() Group by the binnbr column
 * @method     ChildWmpickdetQuery groupByCaseqty() Group by the caseqty column
 * @method     ChildWmpickdetQuery groupByInnerpack() Group by the innerpack column
 * @method     ChildWmpickdetQuery groupByBinqty() Group by the binqty column
 * @method     ChildWmpickdetQuery groupByOverbin1() Group by the overbin1 column
 * @method     ChildWmpickdetQuery groupByOverbinqty1() Group by the overbinqty1 column
 * @method     ChildWmpickdetQuery groupByOverbin2() Group by the overbin2 column
 * @method     ChildWmpickdetQuery groupByOverbinqty2() Group by the overbinqty2 column
 * @method     ChildWmpickdetQuery groupByStatusmsg() Group by the statusmsg column
 * @method     ChildWmpickdetQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildWmpickdetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWmpickdetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWmpickdetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWmpickdetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWmpickdetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWmpickdetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWmpickdet|null findOne(?ConnectionInterface $con = null) Return the first ChildWmpickdet matching the query
 * @method     ChildWmpickdet findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildWmpickdet matching the query, or a new ChildWmpickdet object populated from the query conditions when no match is found
 *
 * @method     ChildWmpickdet|null findOneBySessionid(string $sessionid) Return the first ChildWmpickdet filtered by the sessionid column
 * @method     ChildWmpickdet|null findOneByRecno(int $recno) Return the first ChildWmpickdet filtered by the recno column
 * @method     ChildWmpickdet|null findOneByDate(int $date) Return the first ChildWmpickdet filtered by the date column
 * @method     ChildWmpickdet|null findOneByTime(int $time) Return the first ChildWmpickdet filtered by the time column
 * @method     ChildWmpickdet|null findOneByOrdernbr(string $ordernbr) Return the first ChildWmpickdet filtered by the ordernbr column
 * @method     ChildWmpickdet|null findOneByLinenbr(int $linenbr) Return the first ChildWmpickdet filtered by the linenbr column
 * @method     ChildWmpickdet|null findOneBySublinenbr(int $sublinenbr) Return the first ChildWmpickdet filtered by the sublinenbr column
 * @method     ChildWmpickdet|null findOneByItemnbr(string $itemnbr) Return the first ChildWmpickdet filtered by the itemnbr column
 * @method     ChildWmpickdet|null findOneByItemdesc1(string $itemdesc1) Return the first ChildWmpickdet filtered by the itemdesc1 column
 * @method     ChildWmpickdet|null findOneByItemdesc2(string $itemdesc2) Return the first ChildWmpickdet filtered by the itemdesc2 column
 * @method     ChildWmpickdet|null findOneByQtyordered(int $qtyordered) Return the first ChildWmpickdet filtered by the qtyordered column
 * @method     ChildWmpickdet|null findOneByQtypulled(int $qtypulled) Return the first ChildWmpickdet filtered by the qtypulled column
 * @method     ChildWmpickdet|null findOneByQtyremaining(int $qtyremaining) Return the first ChildWmpickdet filtered by the qtyremaining column
 * @method     ChildWmpickdet|null findOneByBinnbr(string $binnbr) Return the first ChildWmpickdet filtered by the binnbr column
 * @method     ChildWmpickdet|null findOneByCaseqty(int $caseqty) Return the first ChildWmpickdet filtered by the caseqty column
 * @method     ChildWmpickdet|null findOneByInnerpack(int $innerpack) Return the first ChildWmpickdet filtered by the innerpack column
 * @method     ChildWmpickdet|null findOneByBinqty(int $binqty) Return the first ChildWmpickdet filtered by the binqty column
 * @method     ChildWmpickdet|null findOneByOverbin1(string $overbin1) Return the first ChildWmpickdet filtered by the overbin1 column
 * @method     ChildWmpickdet|null findOneByOverbinqty1(int $overbinqty1) Return the first ChildWmpickdet filtered by the overbinqty1 column
 * @method     ChildWmpickdet|null findOneByOverbin2(string $overbin2) Return the first ChildWmpickdet filtered by the overbin2 column
 * @method     ChildWmpickdet|null findOneByOverbinqty2(int $overbinqty2) Return the first ChildWmpickdet filtered by the overbinqty2 column
 * @method     ChildWmpickdet|null findOneByStatusmsg(string $statusmsg) Return the first ChildWmpickdet filtered by the statusmsg column
 * @method     ChildWmpickdet|null findOneByDummy(string $dummy) Return the first ChildWmpickdet filtered by the dummy column
 *
 * @method     ChildWmpickdet requirePk($key, ?ConnectionInterface $con = null) Return the ChildWmpickdet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOne(?ConnectionInterface $con = null) Return the first ChildWmpickdet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWmpickdet requireOneBySessionid(string $sessionid) Return the first ChildWmpickdet filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByRecno(int $recno) Return the first ChildWmpickdet filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByDate(int $date) Return the first ChildWmpickdet filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByTime(int $time) Return the first ChildWmpickdet filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByOrdernbr(string $ordernbr) Return the first ChildWmpickdet filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByLinenbr(int $linenbr) Return the first ChildWmpickdet filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneBySublinenbr(int $sublinenbr) Return the first ChildWmpickdet filtered by the sublinenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByItemnbr(string $itemnbr) Return the first ChildWmpickdet filtered by the itemnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByItemdesc1(string $itemdesc1) Return the first ChildWmpickdet filtered by the itemdesc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByItemdesc2(string $itemdesc2) Return the first ChildWmpickdet filtered by the itemdesc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByQtyordered(int $qtyordered) Return the first ChildWmpickdet filtered by the qtyordered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByQtypulled(int $qtypulled) Return the first ChildWmpickdet filtered by the qtypulled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByQtyremaining(int $qtyremaining) Return the first ChildWmpickdet filtered by the qtyremaining column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByBinnbr(string $binnbr) Return the first ChildWmpickdet filtered by the binnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByCaseqty(int $caseqty) Return the first ChildWmpickdet filtered by the caseqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByInnerpack(int $innerpack) Return the first ChildWmpickdet filtered by the innerpack column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByBinqty(int $binqty) Return the first ChildWmpickdet filtered by the binqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByOverbin1(string $overbin1) Return the first ChildWmpickdet filtered by the overbin1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByOverbinqty1(int $overbinqty1) Return the first ChildWmpickdet filtered by the overbinqty1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByOverbin2(string $overbin2) Return the first ChildWmpickdet filtered by the overbin2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByOverbinqty2(int $overbinqty2) Return the first ChildWmpickdet filtered by the overbinqty2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByStatusmsg(string $statusmsg) Return the first ChildWmpickdet filtered by the statusmsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWmpickdet requireOneByDummy(string $dummy) Return the first ChildWmpickdet filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWmpickdet[]|Collection find(?ConnectionInterface $con = null) Return ChildWmpickdet objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildWmpickdet> find(?ConnectionInterface $con = null) Return ChildWmpickdet objects based on current ModelCriteria
 *
 * @method     ChildWmpickdet[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildWmpickdet objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findBySessionid(string|array<string> $sessionid) Return ChildWmpickdet objects filtered by the sessionid column
 * @method     ChildWmpickdet[]|Collection findByRecno(int|array<int> $recno) Return ChildWmpickdet objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByRecno(int|array<int> $recno) Return ChildWmpickdet objects filtered by the recno column
 * @method     ChildWmpickdet[]|Collection findByDate(int|array<int> $date) Return ChildWmpickdet objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByDate(int|array<int> $date) Return ChildWmpickdet objects filtered by the date column
 * @method     ChildWmpickdet[]|Collection findByTime(int|array<int> $time) Return ChildWmpickdet objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByTime(int|array<int> $time) Return ChildWmpickdet objects filtered by the time column
 * @method     ChildWmpickdet[]|Collection findByOrdernbr(string|array<string> $ordernbr) Return ChildWmpickdet objects filtered by the ordernbr column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByOrdernbr(string|array<string> $ordernbr) Return ChildWmpickdet objects filtered by the ordernbr column
 * @method     ChildWmpickdet[]|Collection findByLinenbr(int|array<int> $linenbr) Return ChildWmpickdet objects filtered by the linenbr column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByLinenbr(int|array<int> $linenbr) Return ChildWmpickdet objects filtered by the linenbr column
 * @method     ChildWmpickdet[]|Collection findBySublinenbr(int|array<int> $sublinenbr) Return ChildWmpickdet objects filtered by the sublinenbr column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findBySublinenbr(int|array<int> $sublinenbr) Return ChildWmpickdet objects filtered by the sublinenbr column
 * @method     ChildWmpickdet[]|Collection findByItemnbr(string|array<string> $itemnbr) Return ChildWmpickdet objects filtered by the itemnbr column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByItemnbr(string|array<string> $itemnbr) Return ChildWmpickdet objects filtered by the itemnbr column
 * @method     ChildWmpickdet[]|Collection findByItemdesc1(string|array<string> $itemdesc1) Return ChildWmpickdet objects filtered by the itemdesc1 column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByItemdesc1(string|array<string> $itemdesc1) Return ChildWmpickdet objects filtered by the itemdesc1 column
 * @method     ChildWmpickdet[]|Collection findByItemdesc2(string|array<string> $itemdesc2) Return ChildWmpickdet objects filtered by the itemdesc2 column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByItemdesc2(string|array<string> $itemdesc2) Return ChildWmpickdet objects filtered by the itemdesc2 column
 * @method     ChildWmpickdet[]|Collection findByQtyordered(int|array<int> $qtyordered) Return ChildWmpickdet objects filtered by the qtyordered column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByQtyordered(int|array<int> $qtyordered) Return ChildWmpickdet objects filtered by the qtyordered column
 * @method     ChildWmpickdet[]|Collection findByQtypulled(int|array<int> $qtypulled) Return ChildWmpickdet objects filtered by the qtypulled column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByQtypulled(int|array<int> $qtypulled) Return ChildWmpickdet objects filtered by the qtypulled column
 * @method     ChildWmpickdet[]|Collection findByQtyremaining(int|array<int> $qtyremaining) Return ChildWmpickdet objects filtered by the qtyremaining column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByQtyremaining(int|array<int> $qtyremaining) Return ChildWmpickdet objects filtered by the qtyremaining column
 * @method     ChildWmpickdet[]|Collection findByBinnbr(string|array<string> $binnbr) Return ChildWmpickdet objects filtered by the binnbr column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByBinnbr(string|array<string> $binnbr) Return ChildWmpickdet objects filtered by the binnbr column
 * @method     ChildWmpickdet[]|Collection findByCaseqty(int|array<int> $caseqty) Return ChildWmpickdet objects filtered by the caseqty column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByCaseqty(int|array<int> $caseqty) Return ChildWmpickdet objects filtered by the caseqty column
 * @method     ChildWmpickdet[]|Collection findByInnerpack(int|array<int> $innerpack) Return ChildWmpickdet objects filtered by the innerpack column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByInnerpack(int|array<int> $innerpack) Return ChildWmpickdet objects filtered by the innerpack column
 * @method     ChildWmpickdet[]|Collection findByBinqty(int|array<int> $binqty) Return ChildWmpickdet objects filtered by the binqty column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByBinqty(int|array<int> $binqty) Return ChildWmpickdet objects filtered by the binqty column
 * @method     ChildWmpickdet[]|Collection findByOverbin1(string|array<string> $overbin1) Return ChildWmpickdet objects filtered by the overbin1 column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByOverbin1(string|array<string> $overbin1) Return ChildWmpickdet objects filtered by the overbin1 column
 * @method     ChildWmpickdet[]|Collection findByOverbinqty1(int|array<int> $overbinqty1) Return ChildWmpickdet objects filtered by the overbinqty1 column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByOverbinqty1(int|array<int> $overbinqty1) Return ChildWmpickdet objects filtered by the overbinqty1 column
 * @method     ChildWmpickdet[]|Collection findByOverbin2(string|array<string> $overbin2) Return ChildWmpickdet objects filtered by the overbin2 column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByOverbin2(string|array<string> $overbin2) Return ChildWmpickdet objects filtered by the overbin2 column
 * @method     ChildWmpickdet[]|Collection findByOverbinqty2(int|array<int> $overbinqty2) Return ChildWmpickdet objects filtered by the overbinqty2 column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByOverbinqty2(int|array<int> $overbinqty2) Return ChildWmpickdet objects filtered by the overbinqty2 column
 * @method     ChildWmpickdet[]|Collection findByStatusmsg(string|array<string> $statusmsg) Return ChildWmpickdet objects filtered by the statusmsg column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByStatusmsg(string|array<string> $statusmsg) Return ChildWmpickdet objects filtered by the statusmsg column
 * @method     ChildWmpickdet[]|Collection findByDummy(string|array<string> $dummy) Return ChildWmpickdet objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildWmpickdet> findByDummy(string|array<string> $dummy) Return ChildWmpickdet objects filtered by the dummy column
 *
 * @method     ChildWmpickdet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildWmpickdet> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class WmpickdetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WmpickdetQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Wmpickdet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWmpickdetQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWmpickdetQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildWmpickdetQuery) {
            return $criteria;
        }
        $query = new ChildWmpickdetQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$sessionid, $recno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildWmpickdet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WmpickdetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WmpickdetTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildWmpickdet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, ordernbr, linenbr, sublinenbr, itemnbr, itemdesc1, itemdesc2, qtyordered, qtypulled, qtyremaining, binnbr, caseqty, innerpack, binqty, overbin1, overbinqty1, overbin2, overbinqty2, statusmsg, dummy FROM wmpickdet WHERE sessionid = :p0 AND recno = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildWmpickdet $obj */
            $obj = new ChildWmpickdet();
            $obj->hydrate($row);
            WmpickdetTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildWmpickdet|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(WmpickdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(WmpickdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
        if (empty($keys)) {
            $this->add(null, '1<>1', Criteria::CUSTOM);

            return $this;
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(WmpickdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(WmpickdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sessionid column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionid('fooValue');   // WHERE sessionid = 'fooValue'
     * $query->filterBySessionid('%fooValue%', Criteria::LIKE); // WHERE sessionid LIKE '%fooValue%'
     * $query->filterBySessionid(['foo', 'bar']); // WHERE sessionid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sessionid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_SESSIONID, $sessionid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the recno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecno(1234); // WHERE recno = 1234
     * $query->filterByRecno(array(12, 34)); // WHERE recno IN (12, 34)
     * $query->filterByRecno(array('min' => 12)); // WHERE recno > 12
     * </code>
     *
     * @param mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRecno($recno = null, ?string $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_RECNO, $recno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDate($date = null, ?string $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_DATE, $date, $comparison);

        return $this;
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTime($time = null, ?string $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordernbr column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdernbr('fooValue');   // WHERE ordernbr = 'fooValue'
     * $query->filterByOrdernbr('%fooValue%', Criteria::LIKE); // WHERE ordernbr LIKE '%fooValue%'
     * $query->filterByOrdernbr(['foo', 'bar']); // WHERE ordernbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordernbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdernbr($ordernbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordernbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_ORDERNBR, $ordernbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the linenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLinenbr(1234); // WHERE linenbr = 1234
     * $query->filterByLinenbr(array(12, 34)); // WHERE linenbr IN (12, 34)
     * $query->filterByLinenbr(array('min' => 12)); // WHERE linenbr > 12
     * </code>
     *
     * @param mixed $linenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, ?string $comparison = null)
    {
        if (is_array($linenbr)) {
            $useMinMax = false;
            if (isset($linenbr['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_LINENBR, $linenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linenbr['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_LINENBR, $linenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_LINENBR, $linenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sublinenbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySublinenbr(1234); // WHERE sublinenbr = 1234
     * $query->filterBySublinenbr(array(12, 34)); // WHERE sublinenbr IN (12, 34)
     * $query->filterBySublinenbr(array('min' => 12)); // WHERE sublinenbr > 12
     * </code>
     *
     * @param mixed $sublinenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySublinenbr($sublinenbr = null, ?string $comparison = null)
    {
        if (is_array($sublinenbr)) {
            $useMinMax = false;
            if (isset($sublinenbr['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_SUBLINENBR, $sublinenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sublinenbr['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_SUBLINENBR, $sublinenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_SUBLINENBR, $sublinenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByItemnbr('fooValue');   // WHERE itemnbr = 'fooValue'
     * $query->filterByItemnbr('%fooValue%', Criteria::LIKE); // WHERE itemnbr LIKE '%fooValue%'
     * $query->filterByItemnbr(['foo', 'bar']); // WHERE itemnbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemnbr($itemnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_ITEMNBR, $itemnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemdesc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByItemdesc1('fooValue');   // WHERE itemdesc1 = 'fooValue'
     * $query->filterByItemdesc1('%fooValue%', Criteria::LIKE); // WHERE itemdesc1 LIKE '%fooValue%'
     * $query->filterByItemdesc1(['foo', 'bar']); // WHERE itemdesc1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemdesc1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemdesc1($itemdesc1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemdesc1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_ITEMDESC1, $itemdesc1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemdesc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByItemdesc2('fooValue');   // WHERE itemdesc2 = 'fooValue'
     * $query->filterByItemdesc2('%fooValue%', Criteria::LIKE); // WHERE itemdesc2 LIKE '%fooValue%'
     * $query->filterByItemdesc2(['foo', 'bar']); // WHERE itemdesc2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemdesc2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemdesc2($itemdesc2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemdesc2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_ITEMDESC2, $itemdesc2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qtyordered column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyordered(1234); // WHERE qtyordered = 1234
     * $query->filterByQtyordered(array(12, 34)); // WHERE qtyordered IN (12, 34)
     * $query->filterByQtyordered(array('min' => 12)); // WHERE qtyordered > 12
     * </code>
     *
     * @param mixed $qtyordered The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtyordered($qtyordered = null, ?string $comparison = null)
    {
        if (is_array($qtyordered)) {
            $useMinMax = false;
            if (isset($qtyordered['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_QTYORDERED, $qtyordered['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyordered['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_QTYORDERED, $qtyordered['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_QTYORDERED, $qtyordered, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qtypulled column
     *
     * Example usage:
     * <code>
     * $query->filterByQtypulled(1234); // WHERE qtypulled = 1234
     * $query->filterByQtypulled(array(12, 34)); // WHERE qtypulled IN (12, 34)
     * $query->filterByQtypulled(array('min' => 12)); // WHERE qtypulled > 12
     * </code>
     *
     * @param mixed $qtypulled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtypulled($qtypulled = null, ?string $comparison = null)
    {
        if (is_array($qtypulled)) {
            $useMinMax = false;
            if (isset($qtypulled['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_QTYPULLED, $qtypulled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtypulled['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_QTYPULLED, $qtypulled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_QTYPULLED, $qtypulled, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qtyremaining column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyremaining(1234); // WHERE qtyremaining = 1234
     * $query->filterByQtyremaining(array(12, 34)); // WHERE qtyremaining IN (12, 34)
     * $query->filterByQtyremaining(array('min' => 12)); // WHERE qtyremaining > 12
     * </code>
     *
     * @param mixed $qtyremaining The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtyremaining($qtyremaining = null, ?string $comparison = null)
    {
        if (is_array($qtyremaining)) {
            $useMinMax = false;
            if (isset($qtyremaining['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_QTYREMAINING, $qtyremaining['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyremaining['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_QTYREMAINING, $qtyremaining['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_QTYREMAINING, $qtyremaining, $comparison);

        return $this;
    }

    /**
     * Filter the query on the binnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByBinnbr('fooValue');   // WHERE binnbr = 'fooValue'
     * $query->filterByBinnbr('%fooValue%', Criteria::LIKE); // WHERE binnbr LIKE '%fooValue%'
     * $query->filterByBinnbr(['foo', 'bar']); // WHERE binnbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $binnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBinnbr($binnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_BINNBR, $binnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the caseqty column
     *
     * Example usage:
     * <code>
     * $query->filterByCaseqty(1234); // WHERE caseqty = 1234
     * $query->filterByCaseqty(array(12, 34)); // WHERE caseqty IN (12, 34)
     * $query->filterByCaseqty(array('min' => 12)); // WHERE caseqty > 12
     * </code>
     *
     * @param mixed $caseqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCaseqty($caseqty = null, ?string $comparison = null)
    {
        if (is_array($caseqty)) {
            $useMinMax = false;
            if (isset($caseqty['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_CASEQTY, $caseqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($caseqty['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_CASEQTY, $caseqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_CASEQTY, $caseqty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the innerpack column
     *
     * Example usage:
     * <code>
     * $query->filterByInnerpack(1234); // WHERE innerpack = 1234
     * $query->filterByInnerpack(array(12, 34)); // WHERE innerpack IN (12, 34)
     * $query->filterByInnerpack(array('min' => 12)); // WHERE innerpack > 12
     * </code>
     *
     * @param mixed $innerpack The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByInnerpack($innerpack = null, ?string $comparison = null)
    {
        if (is_array($innerpack)) {
            $useMinMax = false;
            if (isset($innerpack['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_INNERPACK, $innerpack['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($innerpack['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_INNERPACK, $innerpack['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_INNERPACK, $innerpack, $comparison);

        return $this;
    }

    /**
     * Filter the query on the binqty column
     *
     * Example usage:
     * <code>
     * $query->filterByBinqty(1234); // WHERE binqty = 1234
     * $query->filterByBinqty(array(12, 34)); // WHERE binqty IN (12, 34)
     * $query->filterByBinqty(array('min' => 12)); // WHERE binqty > 12
     * </code>
     *
     * @param mixed $binqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBinqty($binqty = null, ?string $comparison = null)
    {
        if (is_array($binqty)) {
            $useMinMax = false;
            if (isset($binqty['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_BINQTY, $binqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($binqty['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_BINQTY, $binqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_BINQTY, $binqty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the overbin1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbin1('fooValue');   // WHERE overbin1 = 'fooValue'
     * $query->filterByOverbin1('%fooValue%', Criteria::LIKE); // WHERE overbin1 LIKE '%fooValue%'
     * $query->filterByOverbin1(['foo', 'bar']); // WHERE overbin1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $overbin1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOverbin1($overbin1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($overbin1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_OVERBIN1, $overbin1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the overbinqty1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbinqty1(1234); // WHERE overbinqty1 = 1234
     * $query->filterByOverbinqty1(array(12, 34)); // WHERE overbinqty1 IN (12, 34)
     * $query->filterByOverbinqty1(array('min' => 12)); // WHERE overbinqty1 > 12
     * </code>
     *
     * @param mixed $overbinqty1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOverbinqty1($overbinqty1 = null, ?string $comparison = null)
    {
        if (is_array($overbinqty1)) {
            $useMinMax = false;
            if (isset($overbinqty1['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_OVERBINQTY1, $overbinqty1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($overbinqty1['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_OVERBINQTY1, $overbinqty1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_OVERBINQTY1, $overbinqty1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the overbin2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbin2('fooValue');   // WHERE overbin2 = 'fooValue'
     * $query->filterByOverbin2('%fooValue%', Criteria::LIKE); // WHERE overbin2 LIKE '%fooValue%'
     * $query->filterByOverbin2(['foo', 'bar']); // WHERE overbin2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $overbin2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOverbin2($overbin2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($overbin2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_OVERBIN2, $overbin2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the overbinqty2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOverbinqty2(1234); // WHERE overbinqty2 = 1234
     * $query->filterByOverbinqty2(array(12, 34)); // WHERE overbinqty2 IN (12, 34)
     * $query->filterByOverbinqty2(array('min' => 12)); // WHERE overbinqty2 > 12
     * </code>
     *
     * @param mixed $overbinqty2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOverbinqty2($overbinqty2 = null, ?string $comparison = null)
    {
        if (is_array($overbinqty2)) {
            $useMinMax = false;
            if (isset($overbinqty2['min'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_OVERBINQTY2, $overbinqty2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($overbinqty2['max'])) {
                $this->addUsingAlias(WmpickdetTableMap::COL_OVERBINQTY2, $overbinqty2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_OVERBINQTY2, $overbinqty2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the statusmsg column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusmsg('fooValue');   // WHERE statusmsg = 'fooValue'
     * $query->filterByStatusmsg('%fooValue%', Criteria::LIKE); // WHERE statusmsg LIKE '%fooValue%'
     * $query->filterByStatusmsg(['foo', 'bar']); // WHERE statusmsg IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $statusmsg The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStatusmsg($statusmsg = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusmsg)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_STATUSMSG, $statusmsg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * $query->filterByDummy(['foo', 'bar']); // WHERE dummy IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $dummy The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(WmpickdetTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildWmpickdet $wmpickdet Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($wmpickdet = null)
    {
        if ($wmpickdet) {
            $this->addCond('pruneCond0', $this->getAliasedColName(WmpickdetTableMap::COL_SESSIONID), $wmpickdet->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(WmpickdetTableMap::COL_RECNO), $wmpickdet->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the wmpickdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WmpickdetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WmpickdetTableMap::clearInstancePool();
            WmpickdetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WmpickdetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WmpickdetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WmpickdetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WmpickdetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
