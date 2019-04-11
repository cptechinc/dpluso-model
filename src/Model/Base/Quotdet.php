<?php

namespace Base;

use \QuotdetQuery as ChildQuotdetQuery;
use \Exception;
use \PDO;
use Map\QuotdetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'quotdet' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Quotdet implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\QuotdetTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the sessionid field.
     *
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the recno field.
     *
     * @var        int
     */
    protected $recno;

    /**
     * The value for the date field.
     *
     * @var        int
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        int
     */
    protected $time;

    /**
     * The value for the quotenbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $quotenbr;

    /**
     * The value for the custid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custid;

    /**
     * The value for the linenbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $linenbr;

    /**
     * The value for the sublinenbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sublinenbr;

    /**
     * The value for the itemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the desc1 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $desc1;

    /**
     * The value for the desc2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $desc2;

    /**
     * The value for the custitemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custitemid;

    /**
     * The value for the vendorid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $vendorid;

    /**
     * The value for the vendoritemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $vendoritemid;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $status;

    /**
     * The value for the lostreason field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lostreason;

    /**
     * The value for the lostdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lostdate;

    /**
     * The value for the kititemflag field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $kititemflag;

    /**
     * The value for the hasnotes field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $hasnotes;

    /**
     * The value for the venddetail field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $venddetail;

    /**
     * The value for the rshipdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rshipdate;

    /**
     * The value for the leaddays field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $leaddays;

    /**
     * The value for the taxcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $taxcode;

    /**
     * The value for the ordrqty field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ordrqty;

    /**
     * The value for the ordrprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ordrprice;

    /**
     * The value for the ordrcost field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ordrcost;

    /**
     * The value for the ordrtotalprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ordrtotalprice;

    /**
     * The value for the ordrtotalcost field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ordrtotalcost;

    /**
     * The value for the uom field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $uom;

    /**
     * The value for the costuom field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $costuom;

    /**
     * The value for the whse field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $whse;

    /**
     * The value for the listprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $listprice;

    /**
     * The value for the stancost field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $stancost;

    /**
     * The value for the quotind field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $quotind;

    /**
     * The value for the quotqty field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $quotqty;

    /**
     * The value for the quotprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $quotprice;

    /**
     * The value for the quotcost field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $quotcost;

    /**
     * The value for the quotmkupmarg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $quotmkupmarg;

    /**
     * The value for the discpct field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $discpct;

    /**
     * The value for the spcord field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $spcord;

    /**
     * The value for the error field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $error;

    /**
     * The value for the errormsg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $errormsg;

    /**
     * The value for the minprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $minprice;

    /**
     * The value for the nsitemgroup field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $nsitemgroup;

    /**
     * The value for the shipfromid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipfromid;

    /**
     * The value for the itemtype field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $itemtype;

    /**
     * The value for the dummy field.
     *
     * Note: this column has a database default value of: 'x'
     * @var        string
     */
    protected $dummy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->quotenbr = '';
        $this->custid = '';
        $this->linenbr = '';
        $this->sublinenbr = '';
        $this->itemid = '';
        $this->desc1 = '';
        $this->desc2 = '';
        $this->custitemid = '';
        $this->vendorid = '';
        $this->vendoritemid = '';
        $this->status = '';
        $this->lostreason = '';
        $this->lostdate = '';
        $this->kititemflag = '';
        $this->hasnotes = '';
        $this->venddetail = '';
        $this->rshipdate = '';
        $this->leaddays = 0;
        $this->taxcode = '';
        $this->ordrqty = '';
        $this->ordrprice = '';
        $this->ordrcost = '';
        $this->ordrtotalprice = '';
        $this->ordrtotalcost = '';
        $this->uom = '';
        $this->costuom = '';
        $this->whse = '';
        $this->listprice = '';
        $this->stancost = '';
        $this->quotind = '';
        $this->quotqty = 0;
        $this->quotprice = '';
        $this->quotcost = '';
        $this->quotmkupmarg = '';
        $this->discpct = '';
        $this->spcord = '';
        $this->error = '';
        $this->errormsg = '';
        $this->minprice = '';
        $this->nsitemgroup = '';
        $this->shipfromid = '';
        $this->itemtype = '';
        $this->dummy = 'x';
    }

    /**
     * Initializes internal state of Base\Quotdet object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Quotdet</code> instance.  If
     * <code>obj</code> is an instance of <code>Quotdet</code>, delegates to
     * <code>equals(Quotdet)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Quotdet The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [sessionid] column value.
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Get the [recno] column value.
     *
     * @return int
     */
    public function getRecno()
    {
        return $this->recno;
    }

    /**
     * Get the [date] column value.
     *
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [time] column value.
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [quotenbr] column value.
     *
     * @return string
     */
    public function getQuotenbr()
    {
        return $this->quotenbr;
    }

    /**
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
    }

    /**
     * Get the [linenbr] column value.
     *
     * @return string
     */
    public function getLinenbr()
    {
        return $this->linenbr;
    }

    /**
     * Get the [sublinenbr] column value.
     *
     * @return string
     */
    public function getSublinenbr()
    {
        return $this->sublinenbr;
    }

    /**
     * Get the [itemid] column value.
     *
     * @return string
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Get the [desc1] column value.
     *
     * @return string
     */
    public function getDesc1()
    {
        return $this->desc1;
    }

    /**
     * Get the [desc2] column value.
     *
     * @return string
     */
    public function getDesc2()
    {
        return $this->desc2;
    }

    /**
     * Get the [custitemid] column value.
     *
     * @return string
     */
    public function getCustitemid()
    {
        return $this->custitemid;
    }

    /**
     * Get the [vendorid] column value.
     *
     * @return string
     */
    public function getVendorid()
    {
        return $this->vendorid;
    }

    /**
     * Get the [vendoritemid] column value.
     *
     * @return string
     */
    public function getVendoritemid()
    {
        return $this->vendoritemid;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [lostreason] column value.
     *
     * @return string
     */
    public function getLostreason()
    {
        return $this->lostreason;
    }

    /**
     * Get the [lostdate] column value.
     *
     * @return string
     */
    public function getLostdate()
    {
        return $this->lostdate;
    }

    /**
     * Get the [kititemflag] column value.
     *
     * @return string
     */
    public function getKititemflag()
    {
        return $this->kititemflag;
    }

    /**
     * Get the [hasnotes] column value.
     *
     * @return string
     */
    public function getHasnotes()
    {
        return $this->hasnotes;
    }

    /**
     * Get the [venddetail] column value.
     *
     * @return string
     */
    public function getVenddetail()
    {
        return $this->venddetail;
    }

    /**
     * Get the [rshipdate] column value.
     *
     * @return string
     */
    public function getRshipdate()
    {
        return $this->rshipdate;
    }

    /**
     * Get the [leaddays] column value.
     *
     * @return int
     */
    public function getLeaddays()
    {
        return $this->leaddays;
    }

    /**
     * Get the [taxcode] column value.
     *
     * @return string
     */
    public function getTaxcode()
    {
        return $this->taxcode;
    }

    /**
     * Get the [ordrqty] column value.
     *
     * @return string
     */
    public function getOrdrqty()
    {
        return $this->ordrqty;
    }

    /**
     * Get the [ordrprice] column value.
     *
     * @return string
     */
    public function getOrdrprice()
    {
        return $this->ordrprice;
    }

    /**
     * Get the [ordrcost] column value.
     *
     * @return string
     */
    public function getOrdrcost()
    {
        return $this->ordrcost;
    }

    /**
     * Get the [ordrtotalprice] column value.
     *
     * @return string
     */
    public function getOrdrtotalprice()
    {
        return $this->ordrtotalprice;
    }

    /**
     * Get the [ordrtotalcost] column value.
     *
     * @return string
     */
    public function getOrdrtotalcost()
    {
        return $this->ordrtotalcost;
    }

    /**
     * Get the [uom] column value.
     *
     * @return string
     */
    public function getUom()
    {
        return $this->uom;
    }

    /**
     * Get the [costuom] column value.
     *
     * @return string
     */
    public function getCostuom()
    {
        return $this->costuom;
    }

    /**
     * Get the [whse] column value.
     *
     * @return string
     */
    public function getWhse()
    {
        return $this->whse;
    }

    /**
     * Get the [listprice] column value.
     *
     * @return string
     */
    public function getListprice()
    {
        return $this->listprice;
    }

    /**
     * Get the [stancost] column value.
     *
     * @return string
     */
    public function getStancost()
    {
        return $this->stancost;
    }

    /**
     * Get the [quotind] column value.
     *
     * @return string
     */
    public function getQuotind()
    {
        return $this->quotind;
    }

    /**
     * Get the [quotqty] column value.
     *
     * @return int
     */
    public function getQuotqty()
    {
        return $this->quotqty;
    }

    /**
     * Get the [quotprice] column value.
     *
     * @return string
     */
    public function getQuotprice()
    {
        return $this->quotprice;
    }

    /**
     * Get the [quotcost] column value.
     *
     * @return string
     */
    public function getQuotcost()
    {
        return $this->quotcost;
    }

    /**
     * Get the [quotmkupmarg] column value.
     *
     * @return string
     */
    public function getQuotmkupmarg()
    {
        return $this->quotmkupmarg;
    }

    /**
     * Get the [discpct] column value.
     *
     * @return string
     */
    public function getDiscpct()
    {
        return $this->discpct;
    }

    /**
     * Get the [spcord] column value.
     *
     * @return string
     */
    public function getSpcord()
    {
        return $this->spcord;
    }

    /**
     * Get the [error] column value.
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Get the [errormsg] column value.
     *
     * @return string
     */
    public function getErrormsg()
    {
        return $this->errormsg;
    }

    /**
     * Get the [minprice] column value.
     *
     * @return string
     */
    public function getMinprice()
    {
        return $this->minprice;
    }

    /**
     * Get the [nsitemgroup] column value.
     *
     * @return string
     */
    public function getNsitemgroup()
    {
        return $this->nsitemgroup;
    }

    /**
     * Get the [shipfromid] column value.
     *
     * @return string
     */
    public function getShipfromid()
    {
        return $this->shipfromid;
    }

    /**
     * Get the [itemtype] column value.
     *
     * @return string
     */
    public function getItemtype()
    {
        return $this->itemtype;
    }

    /**
     * Get the [dummy] column value.
     *
     * @return string
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [sessionid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [quotenbr] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setQuotenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotenbr !== $v) {
            $this->quotenbr = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_QUOTENBR] = true;
        }

        return $this;
    } // setQuotenbr()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [linenbr] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setLinenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->linenbr !== $v) {
            $this->linenbr = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_LINENBR] = true;
        }

        return $this;
    } // setLinenbr()

    /**
     * Set the value of [sublinenbr] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setSublinenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sublinenbr !== $v) {
            $this->sublinenbr = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_SUBLINENBR] = true;
        }

        return $this;
    } // setSublinenbr()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [desc1] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setDesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc1 !== $v) {
            $this->desc1 = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_DESC1] = true;
        }

        return $this;
    } // setDesc1()

    /**
     * Set the value of [desc2] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setDesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc2 !== $v) {
            $this->desc2 = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_DESC2] = true;
        }

        return $this;
    } // setDesc2()

    /**
     * Set the value of [custitemid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setCustitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custitemid !== $v) {
            $this->custitemid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_CUSTITEMID] = true;
        }

        return $this;
    } // setCustitemid()

    /**
     * Set the value of [vendorid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setVendorid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendorid !== $v) {
            $this->vendorid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_VENDORID] = true;
        }

        return $this;
    } // setVendorid()

    /**
     * Set the value of [vendoritemid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setVendoritemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendoritemid !== $v) {
            $this->vendoritemid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_VENDORITEMID] = true;
        }

        return $this;
    } // setVendoritemid()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [lostreason] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setLostreason($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lostreason !== $v) {
            $this->lostreason = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_LOSTREASON] = true;
        }

        return $this;
    } // setLostreason()

    /**
     * Set the value of [lostdate] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setLostdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lostdate !== $v) {
            $this->lostdate = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_LOSTDATE] = true;
        }

        return $this;
    } // setLostdate()

    /**
     * Set the value of [kititemflag] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setKititemflag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kititemflag !== $v) {
            $this->kititemflag = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_KITITEMFLAG] = true;
        }

        return $this;
    } // setKititemflag()

    /**
     * Set the value of [hasnotes] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setHasnotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasnotes !== $v) {
            $this->hasnotes = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_HASNOTES] = true;
        }

        return $this;
    } // setHasnotes()

    /**
     * Set the value of [venddetail] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setVenddetail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->venddetail !== $v) {
            $this->venddetail = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_VENDDETAIL] = true;
        }

        return $this;
    } // setVenddetail()

    /**
     * Set the value of [rshipdate] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setRshipdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rshipdate !== $v) {
            $this->rshipdate = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_RSHIPDATE] = true;
        }

        return $this;
    } // setRshipdate()

    /**
     * Set the value of [leaddays] column.
     *
     * @param int $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setLeaddays($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->leaddays !== $v) {
            $this->leaddays = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_LEADDAYS] = true;
        }

        return $this;
    } // setLeaddays()

    /**
     * Set the value of [taxcode] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setTaxcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcode !== $v) {
            $this->taxcode = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_TAXCODE] = true;
        }

        return $this;
    } // setTaxcode()

    /**
     * Set the value of [ordrqty] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setOrdrqty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordrqty !== $v) {
            $this->ordrqty = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ORDRQTY] = true;
        }

        return $this;
    } // setOrdrqty()

    /**
     * Set the value of [ordrprice] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setOrdrprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordrprice !== $v) {
            $this->ordrprice = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ORDRPRICE] = true;
        }

        return $this;
    } // setOrdrprice()

    /**
     * Set the value of [ordrcost] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setOrdrcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordrcost !== $v) {
            $this->ordrcost = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ORDRCOST] = true;
        }

        return $this;
    } // setOrdrcost()

    /**
     * Set the value of [ordrtotalprice] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setOrdrtotalprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordrtotalprice !== $v) {
            $this->ordrtotalprice = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ORDRTOTALPRICE] = true;
        }

        return $this;
    } // setOrdrtotalprice()

    /**
     * Set the value of [ordrtotalcost] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setOrdrtotalcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordrtotalcost !== $v) {
            $this->ordrtotalcost = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ORDRTOTALCOST] = true;
        }

        return $this;
    } // setOrdrtotalcost()

    /**
     * Set the value of [uom] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setUom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uom !== $v) {
            $this->uom = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_UOM] = true;
        }

        return $this;
    } // setUom()

    /**
     * Set the value of [costuom] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setCostuom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->costuom !== $v) {
            $this->costuom = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_COSTUOM] = true;
        }

        return $this;
    } // setCostuom()

    /**
     * Set the value of [whse] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setWhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whse !== $v) {
            $this->whse = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_WHSE] = true;
        }

        return $this;
    } // setWhse()

    /**
     * Set the value of [listprice] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setListprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->listprice !== $v) {
            $this->listprice = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_LISTPRICE] = true;
        }

        return $this;
    } // setListprice()

    /**
     * Set the value of [stancost] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setStancost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->stancost !== $v) {
            $this->stancost = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_STANCOST] = true;
        }

        return $this;
    } // setStancost()

    /**
     * Set the value of [quotind] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setQuotind($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotind !== $v) {
            $this->quotind = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_QUOTIND] = true;
        }

        return $this;
    } // setQuotind()

    /**
     * Set the value of [quotqty] column.
     *
     * @param int $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setQuotqty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->quotqty !== $v) {
            $this->quotqty = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_QUOTQTY] = true;
        }

        return $this;
    } // setQuotqty()

    /**
     * Set the value of [quotprice] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setQuotprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotprice !== $v) {
            $this->quotprice = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_QUOTPRICE] = true;
        }

        return $this;
    } // setQuotprice()

    /**
     * Set the value of [quotcost] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setQuotcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotcost !== $v) {
            $this->quotcost = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_QUOTCOST] = true;
        }

        return $this;
    } // setQuotcost()

    /**
     * Set the value of [quotmkupmarg] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setQuotmkupmarg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotmkupmarg !== $v) {
            $this->quotmkupmarg = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_QUOTMKUPMARG] = true;
        }

        return $this;
    } // setQuotmkupmarg()

    /**
     * Set the value of [discpct] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setDiscpct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discpct !== $v) {
            $this->discpct = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_DISCPCT] = true;
        }

        return $this;
    } // setDiscpct()

    /**
     * Set the value of [spcord] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setSpcord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spcord !== $v) {
            $this->spcord = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_SPCORD] = true;
        }

        return $this;
    } // setSpcord()

    /**
     * Set the value of [error] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setError($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error !== $v) {
            $this->error = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ERROR] = true;
        }

        return $this;
    } // setError()

    /**
     * Set the value of [errormsg] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setErrormsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormsg !== $v) {
            $this->errormsg = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ERRORMSG] = true;
        }

        return $this;
    } // setErrormsg()

    /**
     * Set the value of [minprice] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setMinprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->minprice !== $v) {
            $this->minprice = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_MINPRICE] = true;
        }

        return $this;
    } // setMinprice()

    /**
     * Set the value of [nsitemgroup] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setNsitemgroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nsitemgroup !== $v) {
            $this->nsitemgroup = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_NSITEMGROUP] = true;
        }

        return $this;
    } // setNsitemgroup()

    /**
     * Set the value of [shipfromid] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setShipfromid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipfromid !== $v) {
            $this->shipfromid = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_SHIPFROMID] = true;
        }

        return $this;
    } // setShipfromid()

    /**
     * Set the value of [itemtype] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setItemtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemtype !== $v) {
            $this->itemtype = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_ITEMTYPE] = true;
        }

        return $this;
    } // setItemtype()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Quotdet The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[QuotdetTableMap::COL_DUMMY] = true;
        }

        return $this;
    } // setDummy()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->quotenbr !== '') {
                return false;
            }

            if ($this->custid !== '') {
                return false;
            }

            if ($this->linenbr !== '') {
                return false;
            }

            if ($this->sublinenbr !== '') {
                return false;
            }

            if ($this->itemid !== '') {
                return false;
            }

            if ($this->desc1 !== '') {
                return false;
            }

            if ($this->desc2 !== '') {
                return false;
            }

            if ($this->custitemid !== '') {
                return false;
            }

            if ($this->vendorid !== '') {
                return false;
            }

            if ($this->vendoritemid !== '') {
                return false;
            }

            if ($this->status !== '') {
                return false;
            }

            if ($this->lostreason !== '') {
                return false;
            }

            if ($this->lostdate !== '') {
                return false;
            }

            if ($this->kititemflag !== '') {
                return false;
            }

            if ($this->hasnotes !== '') {
                return false;
            }

            if ($this->venddetail !== '') {
                return false;
            }

            if ($this->rshipdate !== '') {
                return false;
            }

            if ($this->leaddays !== 0) {
                return false;
            }

            if ($this->taxcode !== '') {
                return false;
            }

            if ($this->ordrqty !== '') {
                return false;
            }

            if ($this->ordrprice !== '') {
                return false;
            }

            if ($this->ordrcost !== '') {
                return false;
            }

            if ($this->ordrtotalprice !== '') {
                return false;
            }

            if ($this->ordrtotalcost !== '') {
                return false;
            }

            if ($this->uom !== '') {
                return false;
            }

            if ($this->costuom !== '') {
                return false;
            }

            if ($this->whse !== '') {
                return false;
            }

            if ($this->listprice !== '') {
                return false;
            }

            if ($this->stancost !== '') {
                return false;
            }

            if ($this->quotind !== '') {
                return false;
            }

            if ($this->quotqty !== 0) {
                return false;
            }

            if ($this->quotprice !== '') {
                return false;
            }

            if ($this->quotcost !== '') {
                return false;
            }

            if ($this->quotmkupmarg !== '') {
                return false;
            }

            if ($this->discpct !== '') {
                return false;
            }

            if ($this->spcord !== '') {
                return false;
            }

            if ($this->error !== '') {
                return false;
            }

            if ($this->errormsg !== '') {
                return false;
            }

            if ($this->minprice !== '') {
                return false;
            }

            if ($this->nsitemgroup !== '') {
                return false;
            }

            if ($this->shipfromid !== '') {
                return false;
            }

            if ($this->itemtype !== '') {
                return false;
            }

            if ($this->dummy !== 'x') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : QuotdetTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : QuotdetTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : QuotdetTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : QuotdetTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : QuotdetTableMap::translateFieldName('Quotenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : QuotdetTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : QuotdetTableMap::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->linenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : QuotdetTableMap::translateFieldName('Sublinenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sublinenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : QuotdetTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : QuotdetTableMap::translateFieldName('Desc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : QuotdetTableMap::translateFieldName('Desc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : QuotdetTableMap::translateFieldName('Custitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : QuotdetTableMap::translateFieldName('Vendorid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendorid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : QuotdetTableMap::translateFieldName('Vendoritemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendoritemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : QuotdetTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : QuotdetTableMap::translateFieldName('Lostreason', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lostreason = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : QuotdetTableMap::translateFieldName('Lostdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lostdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : QuotdetTableMap::translateFieldName('Kititemflag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kititemflag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : QuotdetTableMap::translateFieldName('Hasnotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasnotes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : QuotdetTableMap::translateFieldName('Venddetail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->venddetail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : QuotdetTableMap::translateFieldName('Rshipdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rshipdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : QuotdetTableMap::translateFieldName('Leaddays', TableMap::TYPE_PHPNAME, $indexType)];
            $this->leaddays = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : QuotdetTableMap::translateFieldName('Taxcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : QuotdetTableMap::translateFieldName('Ordrqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordrqty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : QuotdetTableMap::translateFieldName('Ordrprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordrprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : QuotdetTableMap::translateFieldName('Ordrcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordrcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : QuotdetTableMap::translateFieldName('Ordrtotalprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordrtotalprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : QuotdetTableMap::translateFieldName('Ordrtotalcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordrtotalcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : QuotdetTableMap::translateFieldName('Uom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : QuotdetTableMap::translateFieldName('Costuom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->costuom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : QuotdetTableMap::translateFieldName('Whse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : QuotdetTableMap::translateFieldName('Listprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->listprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : QuotdetTableMap::translateFieldName('Stancost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->stancost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : QuotdetTableMap::translateFieldName('Quotind', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotind = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : QuotdetTableMap::translateFieldName('Quotqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotqty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : QuotdetTableMap::translateFieldName('Quotprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : QuotdetTableMap::translateFieldName('Quotcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : QuotdetTableMap::translateFieldName('Quotmkupmarg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotmkupmarg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : QuotdetTableMap::translateFieldName('Discpct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discpct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : QuotdetTableMap::translateFieldName('Spcord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spcord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : QuotdetTableMap::translateFieldName('Error', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : QuotdetTableMap::translateFieldName('Errormsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : QuotdetTableMap::translateFieldName('Minprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : QuotdetTableMap::translateFieldName('Nsitemgroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nsitemgroup = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : QuotdetTableMap::translateFieldName('Shipfromid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipfromid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : QuotdetTableMap::translateFieldName('Itemtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : QuotdetTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 47; // 47 = QuotdetTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Quotdet'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuotdetTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildQuotdetQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Quotdet::setDeleted()
     * @see Quotdet::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotdetTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildQuotdetQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotdetTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                QuotdetTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(QuotdetTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTENBR)) {
            $modifiedColumns[':p' . $index++]  = 'quotenbr';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'linenbr';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_SUBLINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'sublinenbr';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DESC1)) {
            $modifiedColumns[':p' . $index++]  = 'desc1';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DESC2)) {
            $modifiedColumns[':p' . $index++]  = 'desc2';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_CUSTITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'custitemid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_VENDORID)) {
            $modifiedColumns[':p' . $index++]  = 'vendorid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_VENDORITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'vendoritemid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LOSTREASON)) {
            $modifiedColumns[':p' . $index++]  = 'lostreason';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LOSTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'lostdate';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_KITITEMFLAG)) {
            $modifiedColumns[':p' . $index++]  = 'kititemflag';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_HASNOTES)) {
            $modifiedColumns[':p' . $index++]  = 'hasnotes';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_VENDDETAIL)) {
            $modifiedColumns[':p' . $index++]  = 'venddetail';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_RSHIPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rshipdate';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LEADDAYS)) {
            $modifiedColumns[':p' . $index++]  = 'leaddays';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_TAXCODE)) {
            $modifiedColumns[':p' . $index++]  = 'taxcode';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRQTY)) {
            $modifiedColumns[':p' . $index++]  = 'ordrqty';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'ordrprice';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRCOST)) {
            $modifiedColumns[':p' . $index++]  = 'ordrcost';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRTOTALPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'ordrtotalprice';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRTOTALCOST)) {
            $modifiedColumns[':p' . $index++]  = 'ordrtotalcost';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_UOM)) {
            $modifiedColumns[':p' . $index++]  = 'uom';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_COSTUOM)) {
            $modifiedColumns[':p' . $index++]  = 'costuom';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_WHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whse';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LISTPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'listprice';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_STANCOST)) {
            $modifiedColumns[':p' . $index++]  = 'stancost';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTIND)) {
            $modifiedColumns[':p' . $index++]  = 'quotind';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTQTY)) {
            $modifiedColumns[':p' . $index++]  = 'quotqty';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'quotprice';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTCOST)) {
            $modifiedColumns[':p' . $index++]  = 'quotcost';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTMKUPMARG)) {
            $modifiedColumns[':p' . $index++]  = 'quotmkupmarg';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DISCPCT)) {
            $modifiedColumns[':p' . $index++]  = 'discpct';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_SPCORD)) {
            $modifiedColumns[':p' . $index++]  = 'spcord';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ERROR)) {
            $modifiedColumns[':p' . $index++]  = 'error';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ERRORMSG)) {
            $modifiedColumns[':p' . $index++]  = 'errormsg';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_MINPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'minprice';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_NSITEMGROUP)) {
            $modifiedColumns[':p' . $index++]  = 'nsitemgroup';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_SHIPFROMID)) {
            $modifiedColumns[':p' . $index++]  = 'shipfromid';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ITEMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'itemtype';
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO quotdet (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'sessionid':
                        $stmt->bindValue($identifier, $this->sessionid, PDO::PARAM_STR);
                        break;
                    case 'recno':
                        $stmt->bindValue($identifier, $this->recno, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
                        break;
                    case 'quotenbr':
                        $stmt->bindValue($identifier, $this->quotenbr, PDO::PARAM_STR);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'linenbr':
                        $stmt->bindValue($identifier, $this->linenbr, PDO::PARAM_STR);
                        break;
                    case 'sublinenbr':
                        $stmt->bindValue($identifier, $this->sublinenbr, PDO::PARAM_STR);
                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);
                        break;
                    case 'desc1':
                        $stmt->bindValue($identifier, $this->desc1, PDO::PARAM_STR);
                        break;
                    case 'desc2':
                        $stmt->bindValue($identifier, $this->desc2, PDO::PARAM_STR);
                        break;
                    case 'custitemid':
                        $stmt->bindValue($identifier, $this->custitemid, PDO::PARAM_STR);
                        break;
                    case 'vendorid':
                        $stmt->bindValue($identifier, $this->vendorid, PDO::PARAM_STR);
                        break;
                    case 'vendoritemid':
                        $stmt->bindValue($identifier, $this->vendoritemid, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'lostreason':
                        $stmt->bindValue($identifier, $this->lostreason, PDO::PARAM_STR);
                        break;
                    case 'lostdate':
                        $stmt->bindValue($identifier, $this->lostdate, PDO::PARAM_STR);
                        break;
                    case 'kititemflag':
                        $stmt->bindValue($identifier, $this->kititemflag, PDO::PARAM_STR);
                        break;
                    case 'hasnotes':
                        $stmt->bindValue($identifier, $this->hasnotes, PDO::PARAM_STR);
                        break;
                    case 'venddetail':
                        $stmt->bindValue($identifier, $this->venddetail, PDO::PARAM_STR);
                        break;
                    case 'rshipdate':
                        $stmt->bindValue($identifier, $this->rshipdate, PDO::PARAM_STR);
                        break;
                    case 'leaddays':
                        $stmt->bindValue($identifier, $this->leaddays, PDO::PARAM_INT);
                        break;
                    case 'taxcode':
                        $stmt->bindValue($identifier, $this->taxcode, PDO::PARAM_STR);
                        break;
                    case 'ordrqty':
                        $stmt->bindValue($identifier, $this->ordrqty, PDO::PARAM_STR);
                        break;
                    case 'ordrprice':
                        $stmt->bindValue($identifier, $this->ordrprice, PDO::PARAM_STR);
                        break;
                    case 'ordrcost':
                        $stmt->bindValue($identifier, $this->ordrcost, PDO::PARAM_STR);
                        break;
                    case 'ordrtotalprice':
                        $stmt->bindValue($identifier, $this->ordrtotalprice, PDO::PARAM_STR);
                        break;
                    case 'ordrtotalcost':
                        $stmt->bindValue($identifier, $this->ordrtotalcost, PDO::PARAM_STR);
                        break;
                    case 'uom':
                        $stmt->bindValue($identifier, $this->uom, PDO::PARAM_STR);
                        break;
                    case 'costuom':
                        $stmt->bindValue($identifier, $this->costuom, PDO::PARAM_STR);
                        break;
                    case 'whse':
                        $stmt->bindValue($identifier, $this->whse, PDO::PARAM_STR);
                        break;
                    case 'listprice':
                        $stmt->bindValue($identifier, $this->listprice, PDO::PARAM_STR);
                        break;
                    case 'stancost':
                        $stmt->bindValue($identifier, $this->stancost, PDO::PARAM_STR);
                        break;
                    case 'quotind':
                        $stmt->bindValue($identifier, $this->quotind, PDO::PARAM_STR);
                        break;
                    case 'quotqty':
                        $stmt->bindValue($identifier, $this->quotqty, PDO::PARAM_INT);
                        break;
                    case 'quotprice':
                        $stmt->bindValue($identifier, $this->quotprice, PDO::PARAM_STR);
                        break;
                    case 'quotcost':
                        $stmt->bindValue($identifier, $this->quotcost, PDO::PARAM_STR);
                        break;
                    case 'quotmkupmarg':
                        $stmt->bindValue($identifier, $this->quotmkupmarg, PDO::PARAM_STR);
                        break;
                    case 'discpct':
                        $stmt->bindValue($identifier, $this->discpct, PDO::PARAM_STR);
                        break;
                    case 'spcord':
                        $stmt->bindValue($identifier, $this->spcord, PDO::PARAM_STR);
                        break;
                    case 'error':
                        $stmt->bindValue($identifier, $this->error, PDO::PARAM_STR);
                        break;
                    case 'errormsg':
                        $stmt->bindValue($identifier, $this->errormsg, PDO::PARAM_STR);
                        break;
                    case 'minprice':
                        $stmt->bindValue($identifier, $this->minprice, PDO::PARAM_STR);
                        break;
                    case 'nsitemgroup':
                        $stmt->bindValue($identifier, $this->nsitemgroup, PDO::PARAM_STR);
                        break;
                    case 'shipfromid':
                        $stmt->bindValue($identifier, $this->shipfromid, PDO::PARAM_STR);
                        break;
                    case 'itemtype':
                        $stmt->bindValue($identifier, $this->itemtype, PDO::PARAM_STR);
                        break;
                    case 'dummy':
                        $stmt->bindValue($identifier, $this->dummy, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = QuotdetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getSessionid();
                break;
            case 1:
                return $this->getRecno();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getQuotenbr();
                break;
            case 5:
                return $this->getCustid();
                break;
            case 6:
                return $this->getLinenbr();
                break;
            case 7:
                return $this->getSublinenbr();
                break;
            case 8:
                return $this->getItemid();
                break;
            case 9:
                return $this->getDesc1();
                break;
            case 10:
                return $this->getDesc2();
                break;
            case 11:
                return $this->getCustitemid();
                break;
            case 12:
                return $this->getVendorid();
                break;
            case 13:
                return $this->getVendoritemid();
                break;
            case 14:
                return $this->getStatus();
                break;
            case 15:
                return $this->getLostreason();
                break;
            case 16:
                return $this->getLostdate();
                break;
            case 17:
                return $this->getKititemflag();
                break;
            case 18:
                return $this->getHasnotes();
                break;
            case 19:
                return $this->getVenddetail();
                break;
            case 20:
                return $this->getRshipdate();
                break;
            case 21:
                return $this->getLeaddays();
                break;
            case 22:
                return $this->getTaxcode();
                break;
            case 23:
                return $this->getOrdrqty();
                break;
            case 24:
                return $this->getOrdrprice();
                break;
            case 25:
                return $this->getOrdrcost();
                break;
            case 26:
                return $this->getOrdrtotalprice();
                break;
            case 27:
                return $this->getOrdrtotalcost();
                break;
            case 28:
                return $this->getUom();
                break;
            case 29:
                return $this->getCostuom();
                break;
            case 30:
                return $this->getWhse();
                break;
            case 31:
                return $this->getListprice();
                break;
            case 32:
                return $this->getStancost();
                break;
            case 33:
                return $this->getQuotind();
                break;
            case 34:
                return $this->getQuotqty();
                break;
            case 35:
                return $this->getQuotprice();
                break;
            case 36:
                return $this->getQuotcost();
                break;
            case 37:
                return $this->getQuotmkupmarg();
                break;
            case 38:
                return $this->getDiscpct();
                break;
            case 39:
                return $this->getSpcord();
                break;
            case 40:
                return $this->getError();
                break;
            case 41:
                return $this->getErrormsg();
                break;
            case 42:
                return $this->getMinprice();
                break;
            case 43:
                return $this->getNsitemgroup();
                break;
            case 44:
                return $this->getShipfromid();
                break;
            case 45:
                return $this->getItemtype();
                break;
            case 46:
                return $this->getDummy();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Quotdet'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Quotdet'][$this->hashCode()] = true;
        $keys = QuotdetTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getQuotenbr(),
            $keys[5] => $this->getCustid(),
            $keys[6] => $this->getLinenbr(),
            $keys[7] => $this->getSublinenbr(),
            $keys[8] => $this->getItemid(),
            $keys[9] => $this->getDesc1(),
            $keys[10] => $this->getDesc2(),
            $keys[11] => $this->getCustitemid(),
            $keys[12] => $this->getVendorid(),
            $keys[13] => $this->getVendoritemid(),
            $keys[14] => $this->getStatus(),
            $keys[15] => $this->getLostreason(),
            $keys[16] => $this->getLostdate(),
            $keys[17] => $this->getKititemflag(),
            $keys[18] => $this->getHasnotes(),
            $keys[19] => $this->getVenddetail(),
            $keys[20] => $this->getRshipdate(),
            $keys[21] => $this->getLeaddays(),
            $keys[22] => $this->getTaxcode(),
            $keys[23] => $this->getOrdrqty(),
            $keys[24] => $this->getOrdrprice(),
            $keys[25] => $this->getOrdrcost(),
            $keys[26] => $this->getOrdrtotalprice(),
            $keys[27] => $this->getOrdrtotalcost(),
            $keys[28] => $this->getUom(),
            $keys[29] => $this->getCostuom(),
            $keys[30] => $this->getWhse(),
            $keys[31] => $this->getListprice(),
            $keys[32] => $this->getStancost(),
            $keys[33] => $this->getQuotind(),
            $keys[34] => $this->getQuotqty(),
            $keys[35] => $this->getQuotprice(),
            $keys[36] => $this->getQuotcost(),
            $keys[37] => $this->getQuotmkupmarg(),
            $keys[38] => $this->getDiscpct(),
            $keys[39] => $this->getSpcord(),
            $keys[40] => $this->getError(),
            $keys[41] => $this->getErrormsg(),
            $keys[42] => $this->getMinprice(),
            $keys[43] => $this->getNsitemgroup(),
            $keys[44] => $this->getShipfromid(),
            $keys[45] => $this->getItemtype(),
            $keys[46] => $this->getDummy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Quotdet
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = QuotdetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Quotdet
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setRecno($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setQuotenbr($value);
                break;
            case 5:
                $this->setCustid($value);
                break;
            case 6:
                $this->setLinenbr($value);
                break;
            case 7:
                $this->setSublinenbr($value);
                break;
            case 8:
                $this->setItemid($value);
                break;
            case 9:
                $this->setDesc1($value);
                break;
            case 10:
                $this->setDesc2($value);
                break;
            case 11:
                $this->setCustitemid($value);
                break;
            case 12:
                $this->setVendorid($value);
                break;
            case 13:
                $this->setVendoritemid($value);
                break;
            case 14:
                $this->setStatus($value);
                break;
            case 15:
                $this->setLostreason($value);
                break;
            case 16:
                $this->setLostdate($value);
                break;
            case 17:
                $this->setKititemflag($value);
                break;
            case 18:
                $this->setHasnotes($value);
                break;
            case 19:
                $this->setVenddetail($value);
                break;
            case 20:
                $this->setRshipdate($value);
                break;
            case 21:
                $this->setLeaddays($value);
                break;
            case 22:
                $this->setTaxcode($value);
                break;
            case 23:
                $this->setOrdrqty($value);
                break;
            case 24:
                $this->setOrdrprice($value);
                break;
            case 25:
                $this->setOrdrcost($value);
                break;
            case 26:
                $this->setOrdrtotalprice($value);
                break;
            case 27:
                $this->setOrdrtotalcost($value);
                break;
            case 28:
                $this->setUom($value);
                break;
            case 29:
                $this->setCostuom($value);
                break;
            case 30:
                $this->setWhse($value);
                break;
            case 31:
                $this->setListprice($value);
                break;
            case 32:
                $this->setStancost($value);
                break;
            case 33:
                $this->setQuotind($value);
                break;
            case 34:
                $this->setQuotqty($value);
                break;
            case 35:
                $this->setQuotprice($value);
                break;
            case 36:
                $this->setQuotcost($value);
                break;
            case 37:
                $this->setQuotmkupmarg($value);
                break;
            case 38:
                $this->setDiscpct($value);
                break;
            case 39:
                $this->setSpcord($value);
                break;
            case 40:
                $this->setError($value);
                break;
            case 41:
                $this->setErrormsg($value);
                break;
            case 42:
                $this->setMinprice($value);
                break;
            case 43:
                $this->setNsitemgroup($value);
                break;
            case 44:
                $this->setShipfromid($value);
                break;
            case 45:
                $this->setItemtype($value);
                break;
            case 46:
                $this->setDummy($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = QuotdetTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRecno($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setQuotenbr($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCustid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLinenbr($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSublinenbr($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setItemid($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDesc1($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDesc2($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCustitemid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setVendorid($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setVendoritemid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setStatus($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setLostreason($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setLostdate($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setKititemflag($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setHasnotes($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setVenddetail($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setRshipdate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setLeaddays($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setTaxcode($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setOrdrqty($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setOrdrprice($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setOrdrcost($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setOrdrtotalprice($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setOrdrtotalcost($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setUom($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setCostuom($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setWhse($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setListprice($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setStancost($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setQuotind($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setQuotqty($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setQuotprice($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setQuotcost($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setQuotmkupmarg($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setDiscpct($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setSpcord($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setError($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setErrormsg($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setMinprice($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setNsitemgroup($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setShipfromid($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setItemtype($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setDummy($arr[$keys[46]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Quotdet The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(QuotdetTableMap::DATABASE_NAME);

        if ($this->isColumnModified(QuotdetTableMap::COL_SESSIONID)) {
            $criteria->add(QuotdetTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_RECNO)) {
            $criteria->add(QuotdetTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DATE)) {
            $criteria->add(QuotdetTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_TIME)) {
            $criteria->add(QuotdetTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTENBR)) {
            $criteria->add(QuotdetTableMap::COL_QUOTENBR, $this->quotenbr);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_CUSTID)) {
            $criteria->add(QuotdetTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LINENBR)) {
            $criteria->add(QuotdetTableMap::COL_LINENBR, $this->linenbr);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_SUBLINENBR)) {
            $criteria->add(QuotdetTableMap::COL_SUBLINENBR, $this->sublinenbr);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ITEMID)) {
            $criteria->add(QuotdetTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DESC1)) {
            $criteria->add(QuotdetTableMap::COL_DESC1, $this->desc1);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DESC2)) {
            $criteria->add(QuotdetTableMap::COL_DESC2, $this->desc2);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_CUSTITEMID)) {
            $criteria->add(QuotdetTableMap::COL_CUSTITEMID, $this->custitemid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_VENDORID)) {
            $criteria->add(QuotdetTableMap::COL_VENDORID, $this->vendorid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_VENDORITEMID)) {
            $criteria->add(QuotdetTableMap::COL_VENDORITEMID, $this->vendoritemid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_STATUS)) {
            $criteria->add(QuotdetTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LOSTREASON)) {
            $criteria->add(QuotdetTableMap::COL_LOSTREASON, $this->lostreason);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LOSTDATE)) {
            $criteria->add(QuotdetTableMap::COL_LOSTDATE, $this->lostdate);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_KITITEMFLAG)) {
            $criteria->add(QuotdetTableMap::COL_KITITEMFLAG, $this->kititemflag);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_HASNOTES)) {
            $criteria->add(QuotdetTableMap::COL_HASNOTES, $this->hasnotes);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_VENDDETAIL)) {
            $criteria->add(QuotdetTableMap::COL_VENDDETAIL, $this->venddetail);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_RSHIPDATE)) {
            $criteria->add(QuotdetTableMap::COL_RSHIPDATE, $this->rshipdate);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LEADDAYS)) {
            $criteria->add(QuotdetTableMap::COL_LEADDAYS, $this->leaddays);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_TAXCODE)) {
            $criteria->add(QuotdetTableMap::COL_TAXCODE, $this->taxcode);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRQTY)) {
            $criteria->add(QuotdetTableMap::COL_ORDRQTY, $this->ordrqty);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRPRICE)) {
            $criteria->add(QuotdetTableMap::COL_ORDRPRICE, $this->ordrprice);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRCOST)) {
            $criteria->add(QuotdetTableMap::COL_ORDRCOST, $this->ordrcost);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRTOTALPRICE)) {
            $criteria->add(QuotdetTableMap::COL_ORDRTOTALPRICE, $this->ordrtotalprice);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ORDRTOTALCOST)) {
            $criteria->add(QuotdetTableMap::COL_ORDRTOTALCOST, $this->ordrtotalcost);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_UOM)) {
            $criteria->add(QuotdetTableMap::COL_UOM, $this->uom);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_COSTUOM)) {
            $criteria->add(QuotdetTableMap::COL_COSTUOM, $this->costuom);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_WHSE)) {
            $criteria->add(QuotdetTableMap::COL_WHSE, $this->whse);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_LISTPRICE)) {
            $criteria->add(QuotdetTableMap::COL_LISTPRICE, $this->listprice);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_STANCOST)) {
            $criteria->add(QuotdetTableMap::COL_STANCOST, $this->stancost);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTIND)) {
            $criteria->add(QuotdetTableMap::COL_QUOTIND, $this->quotind);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTQTY)) {
            $criteria->add(QuotdetTableMap::COL_QUOTQTY, $this->quotqty);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTPRICE)) {
            $criteria->add(QuotdetTableMap::COL_QUOTPRICE, $this->quotprice);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTCOST)) {
            $criteria->add(QuotdetTableMap::COL_QUOTCOST, $this->quotcost);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_QUOTMKUPMARG)) {
            $criteria->add(QuotdetTableMap::COL_QUOTMKUPMARG, $this->quotmkupmarg);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DISCPCT)) {
            $criteria->add(QuotdetTableMap::COL_DISCPCT, $this->discpct);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_SPCORD)) {
            $criteria->add(QuotdetTableMap::COL_SPCORD, $this->spcord);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ERROR)) {
            $criteria->add(QuotdetTableMap::COL_ERROR, $this->error);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ERRORMSG)) {
            $criteria->add(QuotdetTableMap::COL_ERRORMSG, $this->errormsg);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_MINPRICE)) {
            $criteria->add(QuotdetTableMap::COL_MINPRICE, $this->minprice);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_NSITEMGROUP)) {
            $criteria->add(QuotdetTableMap::COL_NSITEMGROUP, $this->nsitemgroup);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_SHIPFROMID)) {
            $criteria->add(QuotdetTableMap::COL_SHIPFROMID, $this->shipfromid);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_ITEMTYPE)) {
            $criteria->add(QuotdetTableMap::COL_ITEMTYPE, $this->itemtype);
        }
        if ($this->isColumnModified(QuotdetTableMap::COL_DUMMY)) {
            $criteria->add(QuotdetTableMap::COL_DUMMY, $this->dummy);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildQuotdetQuery::create();
        $criteria->add(QuotdetTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(QuotdetTableMap::COL_RECNO, $this->recno);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getSessionid() &&
            null !== $this->getRecno();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getSessionid();
        $pks[1] = $this->getRecno();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setSessionid($keys[0]);
        $this->setRecno($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getSessionid()) && (null === $this->getRecno());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Quotdet (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setRecno($this->getRecno());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setQuotenbr($this->getQuotenbr());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setLinenbr($this->getLinenbr());
        $copyObj->setSublinenbr($this->getSublinenbr());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setDesc1($this->getDesc1());
        $copyObj->setDesc2($this->getDesc2());
        $copyObj->setCustitemid($this->getCustitemid());
        $copyObj->setVendorid($this->getVendorid());
        $copyObj->setVendoritemid($this->getVendoritemid());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setLostreason($this->getLostreason());
        $copyObj->setLostdate($this->getLostdate());
        $copyObj->setKititemflag($this->getKititemflag());
        $copyObj->setHasnotes($this->getHasnotes());
        $copyObj->setVenddetail($this->getVenddetail());
        $copyObj->setRshipdate($this->getRshipdate());
        $copyObj->setLeaddays($this->getLeaddays());
        $copyObj->setTaxcode($this->getTaxcode());
        $copyObj->setOrdrqty($this->getOrdrqty());
        $copyObj->setOrdrprice($this->getOrdrprice());
        $copyObj->setOrdrcost($this->getOrdrcost());
        $copyObj->setOrdrtotalprice($this->getOrdrtotalprice());
        $copyObj->setOrdrtotalcost($this->getOrdrtotalcost());
        $copyObj->setUom($this->getUom());
        $copyObj->setCostuom($this->getCostuom());
        $copyObj->setWhse($this->getWhse());
        $copyObj->setListprice($this->getListprice());
        $copyObj->setStancost($this->getStancost());
        $copyObj->setQuotind($this->getQuotind());
        $copyObj->setQuotqty($this->getQuotqty());
        $copyObj->setQuotprice($this->getQuotprice());
        $copyObj->setQuotcost($this->getQuotcost());
        $copyObj->setQuotmkupmarg($this->getQuotmkupmarg());
        $copyObj->setDiscpct($this->getDiscpct());
        $copyObj->setSpcord($this->getSpcord());
        $copyObj->setError($this->getError());
        $copyObj->setErrormsg($this->getErrormsg());
        $copyObj->setMinprice($this->getMinprice());
        $copyObj->setNsitemgroup($this->getNsitemgroup());
        $copyObj->setShipfromid($this->getShipfromid());
        $copyObj->setItemtype($this->getItemtype());
        $copyObj->setDummy($this->getDummy());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Quotdet Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->sessionid = null;
        $this->recno = null;
        $this->date = null;
        $this->time = null;
        $this->quotenbr = null;
        $this->custid = null;
        $this->linenbr = null;
        $this->sublinenbr = null;
        $this->itemid = null;
        $this->desc1 = null;
        $this->desc2 = null;
        $this->custitemid = null;
        $this->vendorid = null;
        $this->vendoritemid = null;
        $this->status = null;
        $this->lostreason = null;
        $this->lostdate = null;
        $this->kititemflag = null;
        $this->hasnotes = null;
        $this->venddetail = null;
        $this->rshipdate = null;
        $this->leaddays = null;
        $this->taxcode = null;
        $this->ordrqty = null;
        $this->ordrprice = null;
        $this->ordrcost = null;
        $this->ordrtotalprice = null;
        $this->ordrtotalcost = null;
        $this->uom = null;
        $this->costuom = null;
        $this->whse = null;
        $this->listprice = null;
        $this->stancost = null;
        $this->quotind = null;
        $this->quotqty = null;
        $this->quotprice = null;
        $this->quotcost = null;
        $this->quotmkupmarg = null;
        $this->discpct = null;
        $this->spcord = null;
        $this->error = null;
        $this->errormsg = null;
        $this->minprice = null;
        $this->nsitemgroup = null;
        $this->shipfromid = null;
        $this->itemtype = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(QuotdetTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
