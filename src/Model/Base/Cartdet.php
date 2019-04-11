<?php

namespace Base;

use \CartdetQuery as ChildCartdetQuery;
use \Exception;
use \PDO;
use Map\CartdetTableMap;
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
 * Base class that represents a row from the 'cartdet' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Cartdet implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CartdetTableMap';


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
     * The value for the orderno field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $orderno;

    /**
     * The value for the linenbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $linenbr;

    /**
     * The value for the itemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the custitemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custitemid;

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
     * The value for the price field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $price;

    /**
     * The value for the totalprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $totalprice;

    /**
     * The value for the qty field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $qty;

    /**
     * The value for the qtyshipped field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $qtyshipped;

    /**
     * The value for the qtybackord field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $qtybackord;

    /**
     * The value for the rshipdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rshipdate;

    /**
     * The value for the hasdocuments field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $hasdocuments;

    /**
     * The value for the qtyavail field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $qtyavail;

    /**
     * The value for the hasnotes field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $hasnotes;

    /**
     * The value for the cost field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cost;

    /**
     * The value for the whse field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $whse;

    /**
     * The value for the uom field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $uom;

    /**
     * The value for the spcord field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $spcord;

    /**
     * The value for the kititemflag field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $kititemflag;

    /**
     * The value for the promocode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $promocode;

    /**
     * The value for the taxcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $taxcode;

    /**
     * The value for the taxcodeperc field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $taxcodeperc;

    /**
     * The value for the discpct field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $discpct;

    /**
     * The value for the listprice field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $listprice;

    /**
     * The value for the uomconv field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $uomconv;

    /**
     * The value for the catlgid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $catlgid;

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
     * The value for the ponbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ponbr;

    /**
     * The value for the poref field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $poref;

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
        $this->orderno = '';
        $this->linenbr = '';
        $this->itemid = '';
        $this->custitemid = '';
        $this->desc1 = '';
        $this->desc2 = '';
        $this->price = '';
        $this->totalprice = '';
        $this->qty = '';
        $this->qtyshipped = '';
        $this->qtybackord = '';
        $this->rshipdate = '';
        $this->hasdocuments = '';
        $this->qtyavail = '';
        $this->hasnotes = '';
        $this->cost = '';
        $this->whse = '';
        $this->uom = '';
        $this->spcord = '';
        $this->kititemflag = '';
        $this->promocode = '';
        $this->taxcode = '';
        $this->taxcodeperc = '';
        $this->discpct = '';
        $this->listprice = '';
        $this->uomconv = '';
        $this->catlgid = '';
        $this->errormsg = '';
        $this->minprice = '';
        $this->vendorid = '';
        $this->vendoritemid = '';
        $this->ponbr = '';
        $this->poref = '';
        $this->nsitemgroup = '';
        $this->shipfromid = '';
        $this->itemtype = '';
        $this->dummy = 'x';
    }

    /**
     * Initializes internal state of Base\Cartdet object.
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
     * Compares this with another <code>Cartdet</code> instance.  If
     * <code>obj</code> is an instance of <code>Cartdet</code>, delegates to
     * <code>equals(Cartdet)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Cartdet The current object, for fluid interface
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
     * Get the [orderno] column value.
     *
     * @return string
     */
    public function getOrderno()
    {
        return $this->orderno;
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
     * Get the [itemid] column value.
     *
     * @return string
     */
    public function getItemid()
    {
        return $this->itemid;
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
     * Get the [price] column value.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [totalprice] column value.
     *
     * @return string
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * Get the [qty] column value.
     *
     * @return string
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Get the [qtyshipped] column value.
     *
     * @return string
     */
    public function getQtyshipped()
    {
        return $this->qtyshipped;
    }

    /**
     * Get the [qtybackord] column value.
     *
     * @return string
     */
    public function getQtybackord()
    {
        return $this->qtybackord;
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
     * Get the [hasdocuments] column value.
     *
     * @return string
     */
    public function getHasdocuments()
    {
        return $this->hasdocuments;
    }

    /**
     * Get the [qtyavail] column value.
     *
     * @return string
     */
    public function getQtyavail()
    {
        return $this->qtyavail;
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
     * Get the [cost] column value.
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
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
     * Get the [uom] column value.
     *
     * @return string
     */
    public function getUom()
    {
        return $this->uom;
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
     * Get the [kititemflag] column value.
     *
     * @return string
     */
    public function getKititemflag()
    {
        return $this->kititemflag;
    }

    /**
     * Get the [promocode] column value.
     *
     * @return string
     */
    public function getPromocode()
    {
        return $this->promocode;
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
     * Get the [taxcodeperc] column value.
     *
     * @return string
     */
    public function getTaxcodeperc()
    {
        return $this->taxcodeperc;
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
     * Get the [listprice] column value.
     *
     * @return string
     */
    public function getListprice()
    {
        return $this->listprice;
    }

    /**
     * Get the [uomconv] column value.
     *
     * @return string
     */
    public function getUomconv()
    {
        return $this->uomconv;
    }

    /**
     * Get the [catlgid] column value.
     *
     * @return string
     */
    public function getCatlgid()
    {
        return $this->catlgid;
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
     * Get the [ponbr] column value.
     *
     * @return string
     */
    public function getPonbr()
    {
        return $this->ponbr;
    }

    /**
     * Get the [poref] column value.
     *
     * @return string
     */
    public function getPoref()
    {
        return $this->poref;
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
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[CartdetTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[CartdetTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[CartdetTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [orderno] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setOrderno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orderno !== $v) {
            $this->orderno = $v;
            $this->modifiedColumns[CartdetTableMap::COL_ORDERNO] = true;
        }

        return $this;
    } // setOrderno()

    /**
     * Set the value of [linenbr] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setLinenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->linenbr !== $v) {
            $this->linenbr = $v;
            $this->modifiedColumns[CartdetTableMap::COL_LINENBR] = true;
        }

        return $this;
    } // setLinenbr()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [custitemid] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setCustitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custitemid !== $v) {
            $this->custitemid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_CUSTITEMID] = true;
        }

        return $this;
    } // setCustitemid()

    /**
     * Set the value of [desc1] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setDesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc1 !== $v) {
            $this->desc1 = $v;
            $this->modifiedColumns[CartdetTableMap::COL_DESC1] = true;
        }

        return $this;
    } // setDesc1()

    /**
     * Set the value of [desc2] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setDesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc2 !== $v) {
            $this->desc2 = $v;
            $this->modifiedColumns[CartdetTableMap::COL_DESC2] = true;
        }

        return $this;
    } // setDesc2()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[CartdetTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [totalprice] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setTotalprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totalprice !== $v) {
            $this->totalprice = $v;
            $this->modifiedColumns[CartdetTableMap::COL_TOTALPRICE] = true;
        }

        return $this;
    } // setTotalprice()

    /**
     * Set the value of [qty] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[CartdetTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [qtyshipped] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setQtyshipped($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qtyshipped !== $v) {
            $this->qtyshipped = $v;
            $this->modifiedColumns[CartdetTableMap::COL_QTYSHIPPED] = true;
        }

        return $this;
    } // setQtyshipped()

    /**
     * Set the value of [qtybackord] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setQtybackord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qtybackord !== $v) {
            $this->qtybackord = $v;
            $this->modifiedColumns[CartdetTableMap::COL_QTYBACKORD] = true;
        }

        return $this;
    } // setQtybackord()

    /**
     * Set the value of [rshipdate] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setRshipdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rshipdate !== $v) {
            $this->rshipdate = $v;
            $this->modifiedColumns[CartdetTableMap::COL_RSHIPDATE] = true;
        }

        return $this;
    } // setRshipdate()

    /**
     * Set the value of [hasdocuments] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setHasdocuments($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasdocuments !== $v) {
            $this->hasdocuments = $v;
            $this->modifiedColumns[CartdetTableMap::COL_HASDOCUMENTS] = true;
        }

        return $this;
    } // setHasdocuments()

    /**
     * Set the value of [qtyavail] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setQtyavail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qtyavail !== $v) {
            $this->qtyavail = $v;
            $this->modifiedColumns[CartdetTableMap::COL_QTYAVAIL] = true;
        }

        return $this;
    } // setQtyavail()

    /**
     * Set the value of [hasnotes] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setHasnotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasnotes !== $v) {
            $this->hasnotes = $v;
            $this->modifiedColumns[CartdetTableMap::COL_HASNOTES] = true;
        }

        return $this;
    } // setHasnotes()

    /**
     * Set the value of [cost] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setCost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cost !== $v) {
            $this->cost = $v;
            $this->modifiedColumns[CartdetTableMap::COL_COST] = true;
        }

        return $this;
    } // setCost()

    /**
     * Set the value of [whse] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setWhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whse !== $v) {
            $this->whse = $v;
            $this->modifiedColumns[CartdetTableMap::COL_WHSE] = true;
        }

        return $this;
    } // setWhse()

    /**
     * Set the value of [uom] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setUom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uom !== $v) {
            $this->uom = $v;
            $this->modifiedColumns[CartdetTableMap::COL_UOM] = true;
        }

        return $this;
    } // setUom()

    /**
     * Set the value of [spcord] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setSpcord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spcord !== $v) {
            $this->spcord = $v;
            $this->modifiedColumns[CartdetTableMap::COL_SPCORD] = true;
        }

        return $this;
    } // setSpcord()

    /**
     * Set the value of [kititemflag] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setKititemflag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kititemflag !== $v) {
            $this->kititemflag = $v;
            $this->modifiedColumns[CartdetTableMap::COL_KITITEMFLAG] = true;
        }

        return $this;
    } // setKititemflag()

    /**
     * Set the value of [promocode] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setPromocode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->promocode !== $v) {
            $this->promocode = $v;
            $this->modifiedColumns[CartdetTableMap::COL_PROMOCODE] = true;
        }

        return $this;
    } // setPromocode()

    /**
     * Set the value of [taxcode] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setTaxcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcode !== $v) {
            $this->taxcode = $v;
            $this->modifiedColumns[CartdetTableMap::COL_TAXCODE] = true;
        }

        return $this;
    } // setTaxcode()

    /**
     * Set the value of [taxcodeperc] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setTaxcodeperc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcodeperc !== $v) {
            $this->taxcodeperc = $v;
            $this->modifiedColumns[CartdetTableMap::COL_TAXCODEPERC] = true;
        }

        return $this;
    } // setTaxcodeperc()

    /**
     * Set the value of [discpct] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setDiscpct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discpct !== $v) {
            $this->discpct = $v;
            $this->modifiedColumns[CartdetTableMap::COL_DISCPCT] = true;
        }

        return $this;
    } // setDiscpct()

    /**
     * Set the value of [listprice] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setListprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->listprice !== $v) {
            $this->listprice = $v;
            $this->modifiedColumns[CartdetTableMap::COL_LISTPRICE] = true;
        }

        return $this;
    } // setListprice()

    /**
     * Set the value of [uomconv] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setUomconv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uomconv !== $v) {
            $this->uomconv = $v;
            $this->modifiedColumns[CartdetTableMap::COL_UOMCONV] = true;
        }

        return $this;
    } // setUomconv()

    /**
     * Set the value of [catlgid] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setCatlgid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catlgid !== $v) {
            $this->catlgid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_CATLGID] = true;
        }

        return $this;
    } // setCatlgid()

    /**
     * Set the value of [errormsg] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setErrormsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormsg !== $v) {
            $this->errormsg = $v;
            $this->modifiedColumns[CartdetTableMap::COL_ERRORMSG] = true;
        }

        return $this;
    } // setErrormsg()

    /**
     * Set the value of [minprice] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setMinprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->minprice !== $v) {
            $this->minprice = $v;
            $this->modifiedColumns[CartdetTableMap::COL_MINPRICE] = true;
        }

        return $this;
    } // setMinprice()

    /**
     * Set the value of [vendorid] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setVendorid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendorid !== $v) {
            $this->vendorid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_VENDORID] = true;
        }

        return $this;
    } // setVendorid()

    /**
     * Set the value of [vendoritemid] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setVendoritemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendoritemid !== $v) {
            $this->vendoritemid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_VENDORITEMID] = true;
        }

        return $this;
    } // setVendoritemid()

    /**
     * Set the value of [ponbr] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setPonbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ponbr !== $v) {
            $this->ponbr = $v;
            $this->modifiedColumns[CartdetTableMap::COL_PONBR] = true;
        }

        return $this;
    } // setPonbr()

    /**
     * Set the value of [poref] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setPoref($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poref !== $v) {
            $this->poref = $v;
            $this->modifiedColumns[CartdetTableMap::COL_POREF] = true;
        }

        return $this;
    } // setPoref()

    /**
     * Set the value of [nsitemgroup] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setNsitemgroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nsitemgroup !== $v) {
            $this->nsitemgroup = $v;
            $this->modifiedColumns[CartdetTableMap::COL_NSITEMGROUP] = true;
        }

        return $this;
    } // setNsitemgroup()

    /**
     * Set the value of [shipfromid] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setShipfromid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipfromid !== $v) {
            $this->shipfromid = $v;
            $this->modifiedColumns[CartdetTableMap::COL_SHIPFROMID] = true;
        }

        return $this;
    } // setShipfromid()

    /**
     * Set the value of [itemtype] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setItemtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemtype !== $v) {
            $this->itemtype = $v;
            $this->modifiedColumns[CartdetTableMap::COL_ITEMTYPE] = true;
        }

        return $this;
    } // setItemtype()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Cartdet The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[CartdetTableMap::COL_DUMMY] = true;
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
            if ($this->orderno !== '') {
                return false;
            }

            if ($this->linenbr !== '') {
                return false;
            }

            if ($this->itemid !== '') {
                return false;
            }

            if ($this->custitemid !== '') {
                return false;
            }

            if ($this->desc1 !== '') {
                return false;
            }

            if ($this->desc2 !== '') {
                return false;
            }

            if ($this->price !== '') {
                return false;
            }

            if ($this->totalprice !== '') {
                return false;
            }

            if ($this->qty !== '') {
                return false;
            }

            if ($this->qtyshipped !== '') {
                return false;
            }

            if ($this->qtybackord !== '') {
                return false;
            }

            if ($this->rshipdate !== '') {
                return false;
            }

            if ($this->hasdocuments !== '') {
                return false;
            }

            if ($this->qtyavail !== '') {
                return false;
            }

            if ($this->hasnotes !== '') {
                return false;
            }

            if ($this->cost !== '') {
                return false;
            }

            if ($this->whse !== '') {
                return false;
            }

            if ($this->uom !== '') {
                return false;
            }

            if ($this->spcord !== '') {
                return false;
            }

            if ($this->kititemflag !== '') {
                return false;
            }

            if ($this->promocode !== '') {
                return false;
            }

            if ($this->taxcode !== '') {
                return false;
            }

            if ($this->taxcodeperc !== '') {
                return false;
            }

            if ($this->discpct !== '') {
                return false;
            }

            if ($this->listprice !== '') {
                return false;
            }

            if ($this->uomconv !== '') {
                return false;
            }

            if ($this->catlgid !== '') {
                return false;
            }

            if ($this->errormsg !== '') {
                return false;
            }

            if ($this->minprice !== '') {
                return false;
            }

            if ($this->vendorid !== '') {
                return false;
            }

            if ($this->vendoritemid !== '') {
                return false;
            }

            if ($this->ponbr !== '') {
                return false;
            }

            if ($this->poref !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CartdetTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CartdetTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CartdetTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CartdetTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CartdetTableMap::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CartdetTableMap::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->linenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CartdetTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CartdetTableMap::translateFieldName('Custitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CartdetTableMap::translateFieldName('Desc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CartdetTableMap::translateFieldName('Desc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CartdetTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CartdetTableMap::translateFieldName('Totalprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CartdetTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CartdetTableMap::translateFieldName('Qtyshipped', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyshipped = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CartdetTableMap::translateFieldName('Qtybackord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtybackord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CartdetTableMap::translateFieldName('Rshipdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rshipdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CartdetTableMap::translateFieldName('Hasdocuments', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasdocuments = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CartdetTableMap::translateFieldName('Qtyavail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyavail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CartdetTableMap::translateFieldName('Hasnotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasnotes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : CartdetTableMap::translateFieldName('Cost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : CartdetTableMap::translateFieldName('Whse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : CartdetTableMap::translateFieldName('Uom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : CartdetTableMap::translateFieldName('Spcord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spcord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : CartdetTableMap::translateFieldName('Kititemflag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kititemflag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : CartdetTableMap::translateFieldName('Promocode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->promocode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : CartdetTableMap::translateFieldName('Taxcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : CartdetTableMap::translateFieldName('Taxcodeperc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcodeperc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : CartdetTableMap::translateFieldName('Discpct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discpct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : CartdetTableMap::translateFieldName('Listprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->listprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : CartdetTableMap::translateFieldName('Uomconv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uomconv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : CartdetTableMap::translateFieldName('Catlgid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catlgid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : CartdetTableMap::translateFieldName('Errormsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : CartdetTableMap::translateFieldName('Minprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : CartdetTableMap::translateFieldName('Vendorid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendorid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : CartdetTableMap::translateFieldName('Vendoritemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendoritemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : CartdetTableMap::translateFieldName('Ponbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ponbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : CartdetTableMap::translateFieldName('Poref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : CartdetTableMap::translateFieldName('Nsitemgroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nsitemgroup = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : CartdetTableMap::translateFieldName('Shipfromid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipfromid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : CartdetTableMap::translateFieldName('Itemtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : CartdetTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 41; // 41 = CartdetTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Cartdet'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CartdetTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCartdetQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Cartdet::setDeleted()
     * @see Cartdet::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCartdetQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
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
                CartdetTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(CartdetTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ORDERNO)) {
            $modifiedColumns[':p' . $index++]  = 'orderno';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_LINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'linenbr';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_CUSTITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'custitemid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DESC1)) {
            $modifiedColumns[':p' . $index++]  = 'desc1';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DESC2)) {
            $modifiedColumns[':p' . $index++]  = 'desc2';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TOTALPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'totalprice';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTYSHIPPED)) {
            $modifiedColumns[':p' . $index++]  = 'qtyshipped';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTYBACKORD)) {
            $modifiedColumns[':p' . $index++]  = 'qtybackord';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_RSHIPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rshipdate';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_HASDOCUMENTS)) {
            $modifiedColumns[':p' . $index++]  = 'hasdocuments';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTYAVAIL)) {
            $modifiedColumns[':p' . $index++]  = 'qtyavail';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_HASNOTES)) {
            $modifiedColumns[':p' . $index++]  = 'hasnotes';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_COST)) {
            $modifiedColumns[':p' . $index++]  = 'cost';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_WHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whse';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_UOM)) {
            $modifiedColumns[':p' . $index++]  = 'uom';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_SPCORD)) {
            $modifiedColumns[':p' . $index++]  = 'spcord';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_KITITEMFLAG)) {
            $modifiedColumns[':p' . $index++]  = 'kititemflag';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_PROMOCODE)) {
            $modifiedColumns[':p' . $index++]  = 'promocode';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TAXCODE)) {
            $modifiedColumns[':p' . $index++]  = 'taxcode';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TAXCODEPERC)) {
            $modifiedColumns[':p' . $index++]  = 'taxcodeperc';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DISCPCT)) {
            $modifiedColumns[':p' . $index++]  = 'discpct';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_LISTPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'listprice';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_UOMCONV)) {
            $modifiedColumns[':p' . $index++]  = 'uomconv';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_CATLGID)) {
            $modifiedColumns[':p' . $index++]  = 'catlgid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ERRORMSG)) {
            $modifiedColumns[':p' . $index++]  = 'errormsg';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_MINPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'minprice';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_VENDORID)) {
            $modifiedColumns[':p' . $index++]  = 'vendorid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_VENDORITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'vendoritemid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_PONBR)) {
            $modifiedColumns[':p' . $index++]  = 'ponbr';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_POREF)) {
            $modifiedColumns[':p' . $index++]  = 'poref';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_NSITEMGROUP)) {
            $modifiedColumns[':p' . $index++]  = 'nsitemgroup';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_SHIPFROMID)) {
            $modifiedColumns[':p' . $index++]  = 'shipfromid';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ITEMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'itemtype';
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO cartdet (%s) VALUES (%s)',
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
                    case 'orderno':
                        $stmt->bindValue($identifier, $this->orderno, PDO::PARAM_STR);
                        break;
                    case 'linenbr':
                        $stmt->bindValue($identifier, $this->linenbr, PDO::PARAM_STR);
                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);
                        break;
                    case 'custitemid':
                        $stmt->bindValue($identifier, $this->custitemid, PDO::PARAM_STR);
                        break;
                    case 'desc1':
                        $stmt->bindValue($identifier, $this->desc1, PDO::PARAM_STR);
                        break;
                    case 'desc2':
                        $stmt->bindValue($identifier, $this->desc2, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'totalprice':
                        $stmt->bindValue($identifier, $this->totalprice, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_STR);
                        break;
                    case 'qtyshipped':
                        $stmt->bindValue($identifier, $this->qtyshipped, PDO::PARAM_STR);
                        break;
                    case 'qtybackord':
                        $stmt->bindValue($identifier, $this->qtybackord, PDO::PARAM_STR);
                        break;
                    case 'rshipdate':
                        $stmt->bindValue($identifier, $this->rshipdate, PDO::PARAM_STR);
                        break;
                    case 'hasdocuments':
                        $stmt->bindValue($identifier, $this->hasdocuments, PDO::PARAM_STR);
                        break;
                    case 'qtyavail':
                        $stmt->bindValue($identifier, $this->qtyavail, PDO::PARAM_STR);
                        break;
                    case 'hasnotes':
                        $stmt->bindValue($identifier, $this->hasnotes, PDO::PARAM_STR);
                        break;
                    case 'cost':
                        $stmt->bindValue($identifier, $this->cost, PDO::PARAM_STR);
                        break;
                    case 'whse':
                        $stmt->bindValue($identifier, $this->whse, PDO::PARAM_STR);
                        break;
                    case 'uom':
                        $stmt->bindValue($identifier, $this->uom, PDO::PARAM_STR);
                        break;
                    case 'spcord':
                        $stmt->bindValue($identifier, $this->spcord, PDO::PARAM_STR);
                        break;
                    case 'kititemflag':
                        $stmt->bindValue($identifier, $this->kititemflag, PDO::PARAM_STR);
                        break;
                    case 'promocode':
                        $stmt->bindValue($identifier, $this->promocode, PDO::PARAM_STR);
                        break;
                    case 'taxcode':
                        $stmt->bindValue($identifier, $this->taxcode, PDO::PARAM_STR);
                        break;
                    case 'taxcodeperc':
                        $stmt->bindValue($identifier, $this->taxcodeperc, PDO::PARAM_STR);
                        break;
                    case 'discpct':
                        $stmt->bindValue($identifier, $this->discpct, PDO::PARAM_STR);
                        break;
                    case 'listprice':
                        $stmt->bindValue($identifier, $this->listprice, PDO::PARAM_STR);
                        break;
                    case 'uomconv':
                        $stmt->bindValue($identifier, $this->uomconv, PDO::PARAM_STR);
                        break;
                    case 'catlgid':
                        $stmt->bindValue($identifier, $this->catlgid, PDO::PARAM_STR);
                        break;
                    case 'errormsg':
                        $stmt->bindValue($identifier, $this->errormsg, PDO::PARAM_STR);
                        break;
                    case 'minprice':
                        $stmt->bindValue($identifier, $this->minprice, PDO::PARAM_STR);
                        break;
                    case 'vendorid':
                        $stmt->bindValue($identifier, $this->vendorid, PDO::PARAM_STR);
                        break;
                    case 'vendoritemid':
                        $stmt->bindValue($identifier, $this->vendoritemid, PDO::PARAM_STR);
                        break;
                    case 'ponbr':
                        $stmt->bindValue($identifier, $this->ponbr, PDO::PARAM_STR);
                        break;
                    case 'poref':
                        $stmt->bindValue($identifier, $this->poref, PDO::PARAM_STR);
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
        $pos = CartdetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getOrderno();
                break;
            case 5:
                return $this->getLinenbr();
                break;
            case 6:
                return $this->getItemid();
                break;
            case 7:
                return $this->getCustitemid();
                break;
            case 8:
                return $this->getDesc1();
                break;
            case 9:
                return $this->getDesc2();
                break;
            case 10:
                return $this->getPrice();
                break;
            case 11:
                return $this->getTotalprice();
                break;
            case 12:
                return $this->getQty();
                break;
            case 13:
                return $this->getQtyshipped();
                break;
            case 14:
                return $this->getQtybackord();
                break;
            case 15:
                return $this->getRshipdate();
                break;
            case 16:
                return $this->getHasdocuments();
                break;
            case 17:
                return $this->getQtyavail();
                break;
            case 18:
                return $this->getHasnotes();
                break;
            case 19:
                return $this->getCost();
                break;
            case 20:
                return $this->getWhse();
                break;
            case 21:
                return $this->getUom();
                break;
            case 22:
                return $this->getSpcord();
                break;
            case 23:
                return $this->getKititemflag();
                break;
            case 24:
                return $this->getPromocode();
                break;
            case 25:
                return $this->getTaxcode();
                break;
            case 26:
                return $this->getTaxcodeperc();
                break;
            case 27:
                return $this->getDiscpct();
                break;
            case 28:
                return $this->getListprice();
                break;
            case 29:
                return $this->getUomconv();
                break;
            case 30:
                return $this->getCatlgid();
                break;
            case 31:
                return $this->getErrormsg();
                break;
            case 32:
                return $this->getMinprice();
                break;
            case 33:
                return $this->getVendorid();
                break;
            case 34:
                return $this->getVendoritemid();
                break;
            case 35:
                return $this->getPonbr();
                break;
            case 36:
                return $this->getPoref();
                break;
            case 37:
                return $this->getNsitemgroup();
                break;
            case 38:
                return $this->getShipfromid();
                break;
            case 39:
                return $this->getItemtype();
                break;
            case 40:
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

        if (isset($alreadyDumpedObjects['Cartdet'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cartdet'][$this->hashCode()] = true;
        $keys = CartdetTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getOrderno(),
            $keys[5] => $this->getLinenbr(),
            $keys[6] => $this->getItemid(),
            $keys[7] => $this->getCustitemid(),
            $keys[8] => $this->getDesc1(),
            $keys[9] => $this->getDesc2(),
            $keys[10] => $this->getPrice(),
            $keys[11] => $this->getTotalprice(),
            $keys[12] => $this->getQty(),
            $keys[13] => $this->getQtyshipped(),
            $keys[14] => $this->getQtybackord(),
            $keys[15] => $this->getRshipdate(),
            $keys[16] => $this->getHasdocuments(),
            $keys[17] => $this->getQtyavail(),
            $keys[18] => $this->getHasnotes(),
            $keys[19] => $this->getCost(),
            $keys[20] => $this->getWhse(),
            $keys[21] => $this->getUom(),
            $keys[22] => $this->getSpcord(),
            $keys[23] => $this->getKititemflag(),
            $keys[24] => $this->getPromocode(),
            $keys[25] => $this->getTaxcode(),
            $keys[26] => $this->getTaxcodeperc(),
            $keys[27] => $this->getDiscpct(),
            $keys[28] => $this->getListprice(),
            $keys[29] => $this->getUomconv(),
            $keys[30] => $this->getCatlgid(),
            $keys[31] => $this->getErrormsg(),
            $keys[32] => $this->getMinprice(),
            $keys[33] => $this->getVendorid(),
            $keys[34] => $this->getVendoritemid(),
            $keys[35] => $this->getPonbr(),
            $keys[36] => $this->getPoref(),
            $keys[37] => $this->getNsitemgroup(),
            $keys[38] => $this->getShipfromid(),
            $keys[39] => $this->getItemtype(),
            $keys[40] => $this->getDummy(),
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
     * @return $this|\Cartdet
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CartdetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Cartdet
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
                $this->setOrderno($value);
                break;
            case 5:
                $this->setLinenbr($value);
                break;
            case 6:
                $this->setItemid($value);
                break;
            case 7:
                $this->setCustitemid($value);
                break;
            case 8:
                $this->setDesc1($value);
                break;
            case 9:
                $this->setDesc2($value);
                break;
            case 10:
                $this->setPrice($value);
                break;
            case 11:
                $this->setTotalprice($value);
                break;
            case 12:
                $this->setQty($value);
                break;
            case 13:
                $this->setQtyshipped($value);
                break;
            case 14:
                $this->setQtybackord($value);
                break;
            case 15:
                $this->setRshipdate($value);
                break;
            case 16:
                $this->setHasdocuments($value);
                break;
            case 17:
                $this->setQtyavail($value);
                break;
            case 18:
                $this->setHasnotes($value);
                break;
            case 19:
                $this->setCost($value);
                break;
            case 20:
                $this->setWhse($value);
                break;
            case 21:
                $this->setUom($value);
                break;
            case 22:
                $this->setSpcord($value);
                break;
            case 23:
                $this->setKititemflag($value);
                break;
            case 24:
                $this->setPromocode($value);
                break;
            case 25:
                $this->setTaxcode($value);
                break;
            case 26:
                $this->setTaxcodeperc($value);
                break;
            case 27:
                $this->setDiscpct($value);
                break;
            case 28:
                $this->setListprice($value);
                break;
            case 29:
                $this->setUomconv($value);
                break;
            case 30:
                $this->setCatlgid($value);
                break;
            case 31:
                $this->setErrormsg($value);
                break;
            case 32:
                $this->setMinprice($value);
                break;
            case 33:
                $this->setVendorid($value);
                break;
            case 34:
                $this->setVendoritemid($value);
                break;
            case 35:
                $this->setPonbr($value);
                break;
            case 36:
                $this->setPoref($value);
                break;
            case 37:
                $this->setNsitemgroup($value);
                break;
            case 38:
                $this->setShipfromid($value);
                break;
            case 39:
                $this->setItemtype($value);
                break;
            case 40:
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
        $keys = CartdetTableMap::getFieldNames($keyType);

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
            $this->setOrderno($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLinenbr($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setItemid($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCustitemid($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDesc1($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDesc2($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPrice($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotalprice($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setQty($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setQtyshipped($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setQtybackord($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setRshipdate($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setHasdocuments($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setQtyavail($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setHasnotes($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCost($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setWhse($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setUom($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setSpcord($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setKititemflag($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setPromocode($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setTaxcode($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setTaxcodeperc($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setDiscpct($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setListprice($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setUomconv($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setCatlgid($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setErrormsg($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setMinprice($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setVendorid($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setVendoritemid($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setPonbr($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setPoref($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setNsitemgroup($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setShipfromid($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setItemtype($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setDummy($arr[$keys[40]]);
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
     * @return $this|\Cartdet The current object, for fluid interface
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
        $criteria = new Criteria(CartdetTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CartdetTableMap::COL_SESSIONID)) {
            $criteria->add(CartdetTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_RECNO)) {
            $criteria->add(CartdetTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DATE)) {
            $criteria->add(CartdetTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TIME)) {
            $criteria->add(CartdetTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ORDERNO)) {
            $criteria->add(CartdetTableMap::COL_ORDERNO, $this->orderno);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_LINENBR)) {
            $criteria->add(CartdetTableMap::COL_LINENBR, $this->linenbr);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ITEMID)) {
            $criteria->add(CartdetTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_CUSTITEMID)) {
            $criteria->add(CartdetTableMap::COL_CUSTITEMID, $this->custitemid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DESC1)) {
            $criteria->add(CartdetTableMap::COL_DESC1, $this->desc1);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DESC2)) {
            $criteria->add(CartdetTableMap::COL_DESC2, $this->desc2);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_PRICE)) {
            $criteria->add(CartdetTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TOTALPRICE)) {
            $criteria->add(CartdetTableMap::COL_TOTALPRICE, $this->totalprice);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTY)) {
            $criteria->add(CartdetTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTYSHIPPED)) {
            $criteria->add(CartdetTableMap::COL_QTYSHIPPED, $this->qtyshipped);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTYBACKORD)) {
            $criteria->add(CartdetTableMap::COL_QTYBACKORD, $this->qtybackord);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_RSHIPDATE)) {
            $criteria->add(CartdetTableMap::COL_RSHIPDATE, $this->rshipdate);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_HASDOCUMENTS)) {
            $criteria->add(CartdetTableMap::COL_HASDOCUMENTS, $this->hasdocuments);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_QTYAVAIL)) {
            $criteria->add(CartdetTableMap::COL_QTYAVAIL, $this->qtyavail);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_HASNOTES)) {
            $criteria->add(CartdetTableMap::COL_HASNOTES, $this->hasnotes);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_COST)) {
            $criteria->add(CartdetTableMap::COL_COST, $this->cost);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_WHSE)) {
            $criteria->add(CartdetTableMap::COL_WHSE, $this->whse);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_UOM)) {
            $criteria->add(CartdetTableMap::COL_UOM, $this->uom);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_SPCORD)) {
            $criteria->add(CartdetTableMap::COL_SPCORD, $this->spcord);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_KITITEMFLAG)) {
            $criteria->add(CartdetTableMap::COL_KITITEMFLAG, $this->kititemflag);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_PROMOCODE)) {
            $criteria->add(CartdetTableMap::COL_PROMOCODE, $this->promocode);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TAXCODE)) {
            $criteria->add(CartdetTableMap::COL_TAXCODE, $this->taxcode);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_TAXCODEPERC)) {
            $criteria->add(CartdetTableMap::COL_TAXCODEPERC, $this->taxcodeperc);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DISCPCT)) {
            $criteria->add(CartdetTableMap::COL_DISCPCT, $this->discpct);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_LISTPRICE)) {
            $criteria->add(CartdetTableMap::COL_LISTPRICE, $this->listprice);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_UOMCONV)) {
            $criteria->add(CartdetTableMap::COL_UOMCONV, $this->uomconv);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_CATLGID)) {
            $criteria->add(CartdetTableMap::COL_CATLGID, $this->catlgid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ERRORMSG)) {
            $criteria->add(CartdetTableMap::COL_ERRORMSG, $this->errormsg);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_MINPRICE)) {
            $criteria->add(CartdetTableMap::COL_MINPRICE, $this->minprice);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_VENDORID)) {
            $criteria->add(CartdetTableMap::COL_VENDORID, $this->vendorid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_VENDORITEMID)) {
            $criteria->add(CartdetTableMap::COL_VENDORITEMID, $this->vendoritemid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_PONBR)) {
            $criteria->add(CartdetTableMap::COL_PONBR, $this->ponbr);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_POREF)) {
            $criteria->add(CartdetTableMap::COL_POREF, $this->poref);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_NSITEMGROUP)) {
            $criteria->add(CartdetTableMap::COL_NSITEMGROUP, $this->nsitemgroup);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_SHIPFROMID)) {
            $criteria->add(CartdetTableMap::COL_SHIPFROMID, $this->shipfromid);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_ITEMTYPE)) {
            $criteria->add(CartdetTableMap::COL_ITEMTYPE, $this->itemtype);
        }
        if ($this->isColumnModified(CartdetTableMap::COL_DUMMY)) {
            $criteria->add(CartdetTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildCartdetQuery::create();
        $criteria->add(CartdetTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(CartdetTableMap::COL_RECNO, $this->recno);

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
     * @param      object $copyObj An object of \Cartdet (or compatible) type.
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
        $copyObj->setOrderno($this->getOrderno());
        $copyObj->setLinenbr($this->getLinenbr());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setCustitemid($this->getCustitemid());
        $copyObj->setDesc1($this->getDesc1());
        $copyObj->setDesc2($this->getDesc2());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setTotalprice($this->getTotalprice());
        $copyObj->setQty($this->getQty());
        $copyObj->setQtyshipped($this->getQtyshipped());
        $copyObj->setQtybackord($this->getQtybackord());
        $copyObj->setRshipdate($this->getRshipdate());
        $copyObj->setHasdocuments($this->getHasdocuments());
        $copyObj->setQtyavail($this->getQtyavail());
        $copyObj->setHasnotes($this->getHasnotes());
        $copyObj->setCost($this->getCost());
        $copyObj->setWhse($this->getWhse());
        $copyObj->setUom($this->getUom());
        $copyObj->setSpcord($this->getSpcord());
        $copyObj->setKititemflag($this->getKititemflag());
        $copyObj->setPromocode($this->getPromocode());
        $copyObj->setTaxcode($this->getTaxcode());
        $copyObj->setTaxcodeperc($this->getTaxcodeperc());
        $copyObj->setDiscpct($this->getDiscpct());
        $copyObj->setListprice($this->getListprice());
        $copyObj->setUomconv($this->getUomconv());
        $copyObj->setCatlgid($this->getCatlgid());
        $copyObj->setErrormsg($this->getErrormsg());
        $copyObj->setMinprice($this->getMinprice());
        $copyObj->setVendorid($this->getVendorid());
        $copyObj->setVendoritemid($this->getVendoritemid());
        $copyObj->setPonbr($this->getPonbr());
        $copyObj->setPoref($this->getPoref());
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
     * @return \Cartdet Clone of current object.
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
        $this->orderno = null;
        $this->linenbr = null;
        $this->itemid = null;
        $this->custitemid = null;
        $this->desc1 = null;
        $this->desc2 = null;
        $this->price = null;
        $this->totalprice = null;
        $this->qty = null;
        $this->qtyshipped = null;
        $this->qtybackord = null;
        $this->rshipdate = null;
        $this->hasdocuments = null;
        $this->qtyavail = null;
        $this->hasnotes = null;
        $this->cost = null;
        $this->whse = null;
        $this->uom = null;
        $this->spcord = null;
        $this->kititemflag = null;
        $this->promocode = null;
        $this->taxcode = null;
        $this->taxcodeperc = null;
        $this->discpct = null;
        $this->listprice = null;
        $this->uomconv = null;
        $this->catlgid = null;
        $this->errormsg = null;
        $this->minprice = null;
        $this->vendorid = null;
        $this->vendoritemid = null;
        $this->ponbr = null;
        $this->poref = null;
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
        return (string) $this->exportTo(CartdetTableMap::DEFAULT_STRING_FORMAT);
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
