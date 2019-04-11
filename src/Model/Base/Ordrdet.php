<?php

namespace Base;

use \OrdrdetQuery as ChildOrdrdetQuery;
use \Exception;
use \PDO;
use Map\OrdrdetTableMap;
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
 * Base class that represents a row from the 'ordrdet' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Ordrdet implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OrdrdetTableMap';


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
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the recno field.
     *
     * Note: this column has a database default value of: 0
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
     * The value for the type field.
     *
     * Note: this column has a database default value of: 'O'
     * @var        string
     */
    protected $type;

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
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $linenbr;

    /**
     * The value for the sublinenbr field.
     *
     * Note: this column has a database default value of: '0'
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
     * The value for the custid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custid;

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
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $price;

    /**
     * The value for the totalprice field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $totalprice;

    /**
     * The value for the qty field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $qty;

    /**
     * The value for the qtyshipped field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $qtyshipped;

    /**
     * The value for the qtybackord field.
     *
     * Note: this column has a database default value of: '0'
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
     * Note: this column has a database default value of: 'N'
     * @var        string
     */
    protected $hasdocuments;

    /**
     * The value for the qtyavail field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $qtyavail;

    /**
     * The value for the hasnotes field.
     *
     * Note: this column has a database default value of: 'N'
     * @var        string
     */
    protected $hasnotes;

    /**
     * The value for the cost field.
     *
     * Note: this column has a database default value of: '0.00'
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
     * Note: this column has a database default value of: '0.00'
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
     * The value for the mfgid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mfgid;

    /**
     * The value for the mfgitemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mfgitemid;

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
     * The value for the notes field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $notes;

    /**
     * The value for the leaddays field.
     *
     * @var        int
     */
    protected $leaddays;

    /**
     * The value for the ordrtotalcost field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $ordrtotalcost;

    /**
     * The value for the costuom field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $costuom;

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
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $quotprice;

    /**
     * The value for the quotcost field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $quotcost;

    /**
     * The value for the quotmkupmarg field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $quotmkupmarg;

    /**
     * The value for the quotdiscpct field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $quotdiscpct;

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
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $minprice;

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
     * The value for the canbackorder field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $canbackorder;

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
        $this->sessionid = '';
        $this->recno = 0;
        $this->type = 'O';
        $this->orderno = '';
        $this->linenbr = '0';
        $this->sublinenbr = '0';
        $this->itemid = '';
        $this->custid = '';
        $this->custitemid = '';
        $this->desc1 = '';
        $this->desc2 = '';
        $this->price = '0.00';
        $this->totalprice = '0.00';
        $this->qty = '0';
        $this->qtyshipped = '0';
        $this->qtybackord = '0';
        $this->rshipdate = '';
        $this->hasdocuments = 'N';
        $this->qtyavail = '0';
        $this->hasnotes = 'N';
        $this->cost = '0.00';
        $this->whse = '';
        $this->uom = '';
        $this->spcord = '';
        $this->kititemflag = '';
        $this->promocode = '';
        $this->taxcode = '';
        $this->taxcodeperc = '';
        $this->discpct = '';
        $this->listprice = '0.00';
        $this->uomconv = '';
        $this->vendorid = '';
        $this->vendoritemid = '';
        $this->mfgid = '';
        $this->mfgitemid = '';
        $this->status = '';
        $this->lostreason = '';
        $this->lostdate = '';
        $this->notes = '';
        $this->ordrtotalcost = '0.00';
        $this->costuom = '';
        $this->stancost = '';
        $this->quotind = '';
        $this->quotqty = 0;
        $this->quotprice = '0.00';
        $this->quotcost = '0.00';
        $this->quotmkupmarg = '0.00';
        $this->quotdiscpct = '0.00';
        $this->errormsg = '';
        $this->minprice = '0.00';
        $this->ponbr = '';
        $this->poref = '';
        $this->nsitemgroup = '';
        $this->shipfromid = '';
        $this->itemtype = '';
        $this->canbackorder = '';
        $this->dummy = 'x';
    }

    /**
     * Initializes internal state of Base\Ordrdet object.
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
     * Compares this with another <code>Ordrdet</code> instance.  If
     * <code>obj</code> is an instance of <code>Ordrdet</code>, delegates to
     * <code>equals(Ordrdet)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Ordrdet The current object, for fluid interface
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
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
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
     * Get the [mfgid] column value.
     *
     * @return string
     */
    public function getMfgid()
    {
        return $this->mfgid;
    }

    /**
     * Get the [mfgitemid] column value.
     *
     * @return string
     */
    public function getMfgitemid()
    {
        return $this->mfgitemid;
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
     * Get the [notes] column value.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
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
     * Get the [ordrtotalcost] column value.
     *
     * @return string
     */
    public function getOrdrtotalcost()
    {
        return $this->ordrtotalcost;
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
     * Get the [quotdiscpct] column value.
     *
     * @return string
     */
    public function getQuotdiscpct()
    {
        return $this->quotdiscpct;
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
     * Get the [canbackorder] column value.
     *
     * @return string
     */
    public function getCanbackorder()
    {
        return $this->canbackorder;
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
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [orderno] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setOrderno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orderno !== $v) {
            $this->orderno = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_ORDERNO] = true;
        }

        return $this;
    } // setOrderno()

    /**
     * Set the value of [linenbr] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setLinenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->linenbr !== $v) {
            $this->linenbr = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_LINENBR] = true;
        }

        return $this;
    } // setLinenbr()

    /**
     * Set the value of [sublinenbr] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setSublinenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sublinenbr !== $v) {
            $this->sublinenbr = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_SUBLINENBR] = true;
        }

        return $this;
    } // setSublinenbr()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [custitemid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setCustitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custitemid !== $v) {
            $this->custitemid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_CUSTITEMID] = true;
        }

        return $this;
    } // setCustitemid()

    /**
     * Set the value of [desc1] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setDesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc1 !== $v) {
            $this->desc1 = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_DESC1] = true;
        }

        return $this;
    } // setDesc1()

    /**
     * Set the value of [desc2] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setDesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc2 !== $v) {
            $this->desc2 = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_DESC2] = true;
        }

        return $this;
    } // setDesc2()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [totalprice] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setTotalprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totalprice !== $v) {
            $this->totalprice = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_TOTALPRICE] = true;
        }

        return $this;
    } // setTotalprice()

    /**
     * Set the value of [qty] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [qtyshipped] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQtyshipped($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qtyshipped !== $v) {
            $this->qtyshipped = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QTYSHIPPED] = true;
        }

        return $this;
    } // setQtyshipped()

    /**
     * Set the value of [qtybackord] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQtybackord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qtybackord !== $v) {
            $this->qtybackord = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QTYBACKORD] = true;
        }

        return $this;
    } // setQtybackord()

    /**
     * Set the value of [rshipdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setRshipdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rshipdate !== $v) {
            $this->rshipdate = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_RSHIPDATE] = true;
        }

        return $this;
    } // setRshipdate()

    /**
     * Set the value of [hasdocuments] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setHasdocuments($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasdocuments !== $v) {
            $this->hasdocuments = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_HASDOCUMENTS] = true;
        }

        return $this;
    } // setHasdocuments()

    /**
     * Set the value of [qtyavail] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQtyavail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qtyavail !== $v) {
            $this->qtyavail = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QTYAVAIL] = true;
        }

        return $this;
    } // setQtyavail()

    /**
     * Set the value of [hasnotes] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setHasnotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasnotes !== $v) {
            $this->hasnotes = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_HASNOTES] = true;
        }

        return $this;
    } // setHasnotes()

    /**
     * Set the value of [cost] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setCost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cost !== $v) {
            $this->cost = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_COST] = true;
        }

        return $this;
    } // setCost()

    /**
     * Set the value of [whse] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setWhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whse !== $v) {
            $this->whse = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_WHSE] = true;
        }

        return $this;
    } // setWhse()

    /**
     * Set the value of [uom] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setUom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uom !== $v) {
            $this->uom = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_UOM] = true;
        }

        return $this;
    } // setUom()

    /**
     * Set the value of [spcord] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setSpcord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spcord !== $v) {
            $this->spcord = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_SPCORD] = true;
        }

        return $this;
    } // setSpcord()

    /**
     * Set the value of [kititemflag] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setKititemflag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kititemflag !== $v) {
            $this->kititemflag = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_KITITEMFLAG] = true;
        }

        return $this;
    } // setKititemflag()

    /**
     * Set the value of [promocode] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setPromocode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->promocode !== $v) {
            $this->promocode = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_PROMOCODE] = true;
        }

        return $this;
    } // setPromocode()

    /**
     * Set the value of [taxcode] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setTaxcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcode !== $v) {
            $this->taxcode = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_TAXCODE] = true;
        }

        return $this;
    } // setTaxcode()

    /**
     * Set the value of [taxcodeperc] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setTaxcodeperc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcodeperc !== $v) {
            $this->taxcodeperc = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_TAXCODEPERC] = true;
        }

        return $this;
    } // setTaxcodeperc()

    /**
     * Set the value of [discpct] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setDiscpct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discpct !== $v) {
            $this->discpct = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_DISCPCT] = true;
        }

        return $this;
    } // setDiscpct()

    /**
     * Set the value of [listprice] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setListprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->listprice !== $v) {
            $this->listprice = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_LISTPRICE] = true;
        }

        return $this;
    } // setListprice()

    /**
     * Set the value of [uomconv] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setUomconv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uomconv !== $v) {
            $this->uomconv = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_UOMCONV] = true;
        }

        return $this;
    } // setUomconv()

    /**
     * Set the value of [vendorid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setVendorid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendorid !== $v) {
            $this->vendorid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_VENDORID] = true;
        }

        return $this;
    } // setVendorid()

    /**
     * Set the value of [vendoritemid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setVendoritemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendoritemid !== $v) {
            $this->vendoritemid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_VENDORITEMID] = true;
        }

        return $this;
    } // setVendoritemid()

    /**
     * Set the value of [mfgid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setMfgid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mfgid !== $v) {
            $this->mfgid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_MFGID] = true;
        }

        return $this;
    } // setMfgid()

    /**
     * Set the value of [mfgitemid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setMfgitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mfgitemid !== $v) {
            $this->mfgitemid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_MFGITEMID] = true;
        }

        return $this;
    } // setMfgitemid()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [lostreason] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setLostreason($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lostreason !== $v) {
            $this->lostreason = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_LOSTREASON] = true;
        }

        return $this;
    } // setLostreason()

    /**
     * Set the value of [lostdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setLostdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lostdate !== $v) {
            $this->lostdate = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_LOSTDATE] = true;
        }

        return $this;
    } // setLostdate()

    /**
     * Set the value of [notes] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_NOTES] = true;
        }

        return $this;
    } // setNotes()

    /**
     * Set the value of [leaddays] column.
     *
     * @param int $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setLeaddays($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->leaddays !== $v) {
            $this->leaddays = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_LEADDAYS] = true;
        }

        return $this;
    } // setLeaddays()

    /**
     * Set the value of [ordrtotalcost] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setOrdrtotalcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordrtotalcost !== $v) {
            $this->ordrtotalcost = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_ORDRTOTALCOST] = true;
        }

        return $this;
    } // setOrdrtotalcost()

    /**
     * Set the value of [costuom] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setCostuom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->costuom !== $v) {
            $this->costuom = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_COSTUOM] = true;
        }

        return $this;
    } // setCostuom()

    /**
     * Set the value of [stancost] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setStancost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->stancost !== $v) {
            $this->stancost = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_STANCOST] = true;
        }

        return $this;
    } // setStancost()

    /**
     * Set the value of [quotind] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQuotind($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotind !== $v) {
            $this->quotind = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QUOTIND] = true;
        }

        return $this;
    } // setQuotind()

    /**
     * Set the value of [quotqty] column.
     *
     * @param int $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQuotqty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->quotqty !== $v) {
            $this->quotqty = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QUOTQTY] = true;
        }

        return $this;
    } // setQuotqty()

    /**
     * Set the value of [quotprice] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQuotprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotprice !== $v) {
            $this->quotprice = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QUOTPRICE] = true;
        }

        return $this;
    } // setQuotprice()

    /**
     * Set the value of [quotcost] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQuotcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotcost !== $v) {
            $this->quotcost = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QUOTCOST] = true;
        }

        return $this;
    } // setQuotcost()

    /**
     * Set the value of [quotmkupmarg] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQuotmkupmarg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotmkupmarg !== $v) {
            $this->quotmkupmarg = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QUOTMKUPMARG] = true;
        }

        return $this;
    } // setQuotmkupmarg()

    /**
     * Set the value of [quotdiscpct] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setQuotdiscpct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotdiscpct !== $v) {
            $this->quotdiscpct = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_QUOTDISCPCT] = true;
        }

        return $this;
    } // setQuotdiscpct()

    /**
     * Set the value of [errormsg] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setErrormsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormsg !== $v) {
            $this->errormsg = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_ERRORMSG] = true;
        }

        return $this;
    } // setErrormsg()

    /**
     * Set the value of [minprice] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setMinprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->minprice !== $v) {
            $this->minprice = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_MINPRICE] = true;
        }

        return $this;
    } // setMinprice()

    /**
     * Set the value of [ponbr] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setPonbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ponbr !== $v) {
            $this->ponbr = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_PONBR] = true;
        }

        return $this;
    } // setPonbr()

    /**
     * Set the value of [poref] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setPoref($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->poref !== $v) {
            $this->poref = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_POREF] = true;
        }

        return $this;
    } // setPoref()

    /**
     * Set the value of [nsitemgroup] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setNsitemgroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nsitemgroup !== $v) {
            $this->nsitemgroup = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_NSITEMGROUP] = true;
        }

        return $this;
    } // setNsitemgroup()

    /**
     * Set the value of [shipfromid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setShipfromid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipfromid !== $v) {
            $this->shipfromid = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_SHIPFROMID] = true;
        }

        return $this;
    } // setShipfromid()

    /**
     * Set the value of [itemtype] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setItemtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemtype !== $v) {
            $this->itemtype = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_ITEMTYPE] = true;
        }

        return $this;
    } // setItemtype()

    /**
     * Set the value of [canbackorder] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setCanbackorder($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->canbackorder !== $v) {
            $this->canbackorder = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_CANBACKORDER] = true;
        }

        return $this;
    } // setCanbackorder()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Ordrdet The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[OrdrdetTableMap::COL_DUMMY] = true;
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
            if ($this->sessionid !== '') {
                return false;
            }

            if ($this->recno !== 0) {
                return false;
            }

            if ($this->type !== 'O') {
                return false;
            }

            if ($this->orderno !== '') {
                return false;
            }

            if ($this->linenbr !== '0') {
                return false;
            }

            if ($this->sublinenbr !== '0') {
                return false;
            }

            if ($this->itemid !== '') {
                return false;
            }

            if ($this->custid !== '') {
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

            if ($this->price !== '0.00') {
                return false;
            }

            if ($this->totalprice !== '0.00') {
                return false;
            }

            if ($this->qty !== '0') {
                return false;
            }

            if ($this->qtyshipped !== '0') {
                return false;
            }

            if ($this->qtybackord !== '0') {
                return false;
            }

            if ($this->rshipdate !== '') {
                return false;
            }

            if ($this->hasdocuments !== 'N') {
                return false;
            }

            if ($this->qtyavail !== '0') {
                return false;
            }

            if ($this->hasnotes !== 'N') {
                return false;
            }

            if ($this->cost !== '0.00') {
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

            if ($this->listprice !== '0.00') {
                return false;
            }

            if ($this->uomconv !== '') {
                return false;
            }

            if ($this->vendorid !== '') {
                return false;
            }

            if ($this->vendoritemid !== '') {
                return false;
            }

            if ($this->mfgid !== '') {
                return false;
            }

            if ($this->mfgitemid !== '') {
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

            if ($this->notes !== '') {
                return false;
            }

            if ($this->ordrtotalcost !== '0.00') {
                return false;
            }

            if ($this->costuom !== '') {
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

            if ($this->quotprice !== '0.00') {
                return false;
            }

            if ($this->quotcost !== '0.00') {
                return false;
            }

            if ($this->quotmkupmarg !== '0.00') {
                return false;
            }

            if ($this->quotdiscpct !== '0.00') {
                return false;
            }

            if ($this->errormsg !== '') {
                return false;
            }

            if ($this->minprice !== '0.00') {
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

            if ($this->canbackorder !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OrdrdetTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OrdrdetTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OrdrdetTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OrdrdetTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OrdrdetTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OrdrdetTableMap::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OrdrdetTableMap::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->linenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OrdrdetTableMap::translateFieldName('Sublinenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sublinenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OrdrdetTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OrdrdetTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OrdrdetTableMap::translateFieldName('Custitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OrdrdetTableMap::translateFieldName('Desc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OrdrdetTableMap::translateFieldName('Desc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OrdrdetTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OrdrdetTableMap::translateFieldName('Totalprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OrdrdetTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OrdrdetTableMap::translateFieldName('Qtyshipped', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyshipped = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OrdrdetTableMap::translateFieldName('Qtybackord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtybackord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OrdrdetTableMap::translateFieldName('Rshipdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rshipdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OrdrdetTableMap::translateFieldName('Hasdocuments', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasdocuments = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OrdrdetTableMap::translateFieldName('Qtyavail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyavail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OrdrdetTableMap::translateFieldName('Hasnotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasnotes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : OrdrdetTableMap::translateFieldName('Cost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : OrdrdetTableMap::translateFieldName('Whse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : OrdrdetTableMap::translateFieldName('Uom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : OrdrdetTableMap::translateFieldName('Spcord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spcord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : OrdrdetTableMap::translateFieldName('Kititemflag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kititemflag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : OrdrdetTableMap::translateFieldName('Promocode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->promocode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : OrdrdetTableMap::translateFieldName('Taxcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : OrdrdetTableMap::translateFieldName('Taxcodeperc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcodeperc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : OrdrdetTableMap::translateFieldName('Discpct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discpct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : OrdrdetTableMap::translateFieldName('Listprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->listprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : OrdrdetTableMap::translateFieldName('Uomconv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uomconv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : OrdrdetTableMap::translateFieldName('Vendorid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendorid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : OrdrdetTableMap::translateFieldName('Vendoritemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendoritemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : OrdrdetTableMap::translateFieldName('Mfgid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mfgid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : OrdrdetTableMap::translateFieldName('Mfgitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mfgitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : OrdrdetTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : OrdrdetTableMap::translateFieldName('Lostreason', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lostreason = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : OrdrdetTableMap::translateFieldName('Lostdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lostdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : OrdrdetTableMap::translateFieldName('Notes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->notes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : OrdrdetTableMap::translateFieldName('Leaddays', TableMap::TYPE_PHPNAME, $indexType)];
            $this->leaddays = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : OrdrdetTableMap::translateFieldName('Ordrtotalcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordrtotalcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : OrdrdetTableMap::translateFieldName('Costuom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->costuom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : OrdrdetTableMap::translateFieldName('Stancost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->stancost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : OrdrdetTableMap::translateFieldName('Quotind', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotind = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : OrdrdetTableMap::translateFieldName('Quotqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotqty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : OrdrdetTableMap::translateFieldName('Quotprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : OrdrdetTableMap::translateFieldName('Quotcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : OrdrdetTableMap::translateFieldName('Quotmkupmarg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotmkupmarg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : OrdrdetTableMap::translateFieldName('Quotdiscpct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotdiscpct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : OrdrdetTableMap::translateFieldName('Errormsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : OrdrdetTableMap::translateFieldName('Minprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : OrdrdetTableMap::translateFieldName('Ponbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ponbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : OrdrdetTableMap::translateFieldName('Poref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->poref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : OrdrdetTableMap::translateFieldName('Nsitemgroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nsitemgroup = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : OrdrdetTableMap::translateFieldName('Shipfromid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipfromid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : OrdrdetTableMap::translateFieldName('Itemtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : OrdrdetTableMap::translateFieldName('Canbackorder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->canbackorder = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : OrdrdetTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 60; // 60 = OrdrdetTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Ordrdet'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOrdrdetQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Ordrdet::setDeleted()
     * @see Ordrdet::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOrdrdetQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrdetTableMap::DATABASE_NAME);
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
                OrdrdetTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(OrdrdetTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ORDERNO)) {
            $modifiedColumns[':p' . $index++]  = 'orderno';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'linenbr';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_SUBLINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'sublinenbr';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_CUSTITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'custitemid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DESC1)) {
            $modifiedColumns[':p' . $index++]  = 'desc1';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DESC2)) {
            $modifiedColumns[':p' . $index++]  = 'desc2';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TOTALPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'totalprice';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTYSHIPPED)) {
            $modifiedColumns[':p' . $index++]  = 'qtyshipped';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTYBACKORD)) {
            $modifiedColumns[':p' . $index++]  = 'qtybackord';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_RSHIPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rshipdate';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_HASDOCUMENTS)) {
            $modifiedColumns[':p' . $index++]  = 'hasdocuments';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTYAVAIL)) {
            $modifiedColumns[':p' . $index++]  = 'qtyavail';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_HASNOTES)) {
            $modifiedColumns[':p' . $index++]  = 'hasnotes';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_COST)) {
            $modifiedColumns[':p' . $index++]  = 'cost';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_WHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whse';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_UOM)) {
            $modifiedColumns[':p' . $index++]  = 'uom';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_SPCORD)) {
            $modifiedColumns[':p' . $index++]  = 'spcord';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_KITITEMFLAG)) {
            $modifiedColumns[':p' . $index++]  = 'kititemflag';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_PROMOCODE)) {
            $modifiedColumns[':p' . $index++]  = 'promocode';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TAXCODE)) {
            $modifiedColumns[':p' . $index++]  = 'taxcode';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TAXCODEPERC)) {
            $modifiedColumns[':p' . $index++]  = 'taxcodeperc';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DISCPCT)) {
            $modifiedColumns[':p' . $index++]  = 'discpct';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LISTPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'listprice';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_UOMCONV)) {
            $modifiedColumns[':p' . $index++]  = 'uomconv';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_VENDORID)) {
            $modifiedColumns[':p' . $index++]  = 'vendorid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_VENDORITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'vendoritemid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_MFGID)) {
            $modifiedColumns[':p' . $index++]  = 'mfgid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_MFGITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'mfgitemid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LOSTREASON)) {
            $modifiedColumns[':p' . $index++]  = 'lostreason';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LOSTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'lostdate';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_NOTES)) {
            $modifiedColumns[':p' . $index++]  = 'notes';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LEADDAYS)) {
            $modifiedColumns[':p' . $index++]  = 'leaddays';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ORDRTOTALCOST)) {
            $modifiedColumns[':p' . $index++]  = 'ordrtotalcost';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_COSTUOM)) {
            $modifiedColumns[':p' . $index++]  = 'costuom';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_STANCOST)) {
            $modifiedColumns[':p' . $index++]  = 'stancost';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTIND)) {
            $modifiedColumns[':p' . $index++]  = 'quotind';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTQTY)) {
            $modifiedColumns[':p' . $index++]  = 'quotqty';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'quotprice';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTCOST)) {
            $modifiedColumns[':p' . $index++]  = 'quotcost';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTMKUPMARG)) {
            $modifiedColumns[':p' . $index++]  = 'quotmkupmarg';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTDISCPCT)) {
            $modifiedColumns[':p' . $index++]  = 'quotdiscpct';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ERRORMSG)) {
            $modifiedColumns[':p' . $index++]  = 'errormsg';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_MINPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'minprice';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_PONBR)) {
            $modifiedColumns[':p' . $index++]  = 'ponbr';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_POREF)) {
            $modifiedColumns[':p' . $index++]  = 'poref';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_NSITEMGROUP)) {
            $modifiedColumns[':p' . $index++]  = 'nsitemgroup';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_SHIPFROMID)) {
            $modifiedColumns[':p' . $index++]  = 'shipfromid';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ITEMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'itemtype';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_CANBACKORDER)) {
            $modifiedColumns[':p' . $index++]  = 'canbackorder';
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO ordrdet (%s) VALUES (%s)',
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
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'orderno':
                        $stmt->bindValue($identifier, $this->orderno, PDO::PARAM_STR);
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
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
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
                    case 'vendorid':
                        $stmt->bindValue($identifier, $this->vendorid, PDO::PARAM_STR);
                        break;
                    case 'vendoritemid':
                        $stmt->bindValue($identifier, $this->vendoritemid, PDO::PARAM_STR);
                        break;
                    case 'mfgid':
                        $stmt->bindValue($identifier, $this->mfgid, PDO::PARAM_STR);
                        break;
                    case 'mfgitemid':
                        $stmt->bindValue($identifier, $this->mfgitemid, PDO::PARAM_STR);
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
                    case 'notes':
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case 'leaddays':
                        $stmt->bindValue($identifier, $this->leaddays, PDO::PARAM_INT);
                        break;
                    case 'ordrtotalcost':
                        $stmt->bindValue($identifier, $this->ordrtotalcost, PDO::PARAM_STR);
                        break;
                    case 'costuom':
                        $stmt->bindValue($identifier, $this->costuom, PDO::PARAM_STR);
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
                    case 'quotdiscpct':
                        $stmt->bindValue($identifier, $this->quotdiscpct, PDO::PARAM_STR);
                        break;
                    case 'errormsg':
                        $stmt->bindValue($identifier, $this->errormsg, PDO::PARAM_STR);
                        break;
                    case 'minprice':
                        $stmt->bindValue($identifier, $this->minprice, PDO::PARAM_STR);
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
                    case 'canbackorder':
                        $stmt->bindValue($identifier, $this->canbackorder, PDO::PARAM_STR);
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
        $pos = OrdrdetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getType();
                break;
            case 5:
                return $this->getOrderno();
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
                return $this->getCustid();
                break;
            case 10:
                return $this->getCustitemid();
                break;
            case 11:
                return $this->getDesc1();
                break;
            case 12:
                return $this->getDesc2();
                break;
            case 13:
                return $this->getPrice();
                break;
            case 14:
                return $this->getTotalprice();
                break;
            case 15:
                return $this->getQty();
                break;
            case 16:
                return $this->getQtyshipped();
                break;
            case 17:
                return $this->getQtybackord();
                break;
            case 18:
                return $this->getRshipdate();
                break;
            case 19:
                return $this->getHasdocuments();
                break;
            case 20:
                return $this->getQtyavail();
                break;
            case 21:
                return $this->getHasnotes();
                break;
            case 22:
                return $this->getCost();
                break;
            case 23:
                return $this->getWhse();
                break;
            case 24:
                return $this->getUom();
                break;
            case 25:
                return $this->getSpcord();
                break;
            case 26:
                return $this->getKititemflag();
                break;
            case 27:
                return $this->getPromocode();
                break;
            case 28:
                return $this->getTaxcode();
                break;
            case 29:
                return $this->getTaxcodeperc();
                break;
            case 30:
                return $this->getDiscpct();
                break;
            case 31:
                return $this->getListprice();
                break;
            case 32:
                return $this->getUomconv();
                break;
            case 33:
                return $this->getVendorid();
                break;
            case 34:
                return $this->getVendoritemid();
                break;
            case 35:
                return $this->getMfgid();
                break;
            case 36:
                return $this->getMfgitemid();
                break;
            case 37:
                return $this->getStatus();
                break;
            case 38:
                return $this->getLostreason();
                break;
            case 39:
                return $this->getLostdate();
                break;
            case 40:
                return $this->getNotes();
                break;
            case 41:
                return $this->getLeaddays();
                break;
            case 42:
                return $this->getOrdrtotalcost();
                break;
            case 43:
                return $this->getCostuom();
                break;
            case 44:
                return $this->getStancost();
                break;
            case 45:
                return $this->getQuotind();
                break;
            case 46:
                return $this->getQuotqty();
                break;
            case 47:
                return $this->getQuotprice();
                break;
            case 48:
                return $this->getQuotcost();
                break;
            case 49:
                return $this->getQuotmkupmarg();
                break;
            case 50:
                return $this->getQuotdiscpct();
                break;
            case 51:
                return $this->getErrormsg();
                break;
            case 52:
                return $this->getMinprice();
                break;
            case 53:
                return $this->getPonbr();
                break;
            case 54:
                return $this->getPoref();
                break;
            case 55:
                return $this->getNsitemgroup();
                break;
            case 56:
                return $this->getShipfromid();
                break;
            case 57:
                return $this->getItemtype();
                break;
            case 58:
                return $this->getCanbackorder();
                break;
            case 59:
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

        if (isset($alreadyDumpedObjects['Ordrdet'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Ordrdet'][$this->hashCode()] = true;
        $keys = OrdrdetTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getType(),
            $keys[5] => $this->getOrderno(),
            $keys[6] => $this->getLinenbr(),
            $keys[7] => $this->getSublinenbr(),
            $keys[8] => $this->getItemid(),
            $keys[9] => $this->getCustid(),
            $keys[10] => $this->getCustitemid(),
            $keys[11] => $this->getDesc1(),
            $keys[12] => $this->getDesc2(),
            $keys[13] => $this->getPrice(),
            $keys[14] => $this->getTotalprice(),
            $keys[15] => $this->getQty(),
            $keys[16] => $this->getQtyshipped(),
            $keys[17] => $this->getQtybackord(),
            $keys[18] => $this->getRshipdate(),
            $keys[19] => $this->getHasdocuments(),
            $keys[20] => $this->getQtyavail(),
            $keys[21] => $this->getHasnotes(),
            $keys[22] => $this->getCost(),
            $keys[23] => $this->getWhse(),
            $keys[24] => $this->getUom(),
            $keys[25] => $this->getSpcord(),
            $keys[26] => $this->getKititemflag(),
            $keys[27] => $this->getPromocode(),
            $keys[28] => $this->getTaxcode(),
            $keys[29] => $this->getTaxcodeperc(),
            $keys[30] => $this->getDiscpct(),
            $keys[31] => $this->getListprice(),
            $keys[32] => $this->getUomconv(),
            $keys[33] => $this->getVendorid(),
            $keys[34] => $this->getVendoritemid(),
            $keys[35] => $this->getMfgid(),
            $keys[36] => $this->getMfgitemid(),
            $keys[37] => $this->getStatus(),
            $keys[38] => $this->getLostreason(),
            $keys[39] => $this->getLostdate(),
            $keys[40] => $this->getNotes(),
            $keys[41] => $this->getLeaddays(),
            $keys[42] => $this->getOrdrtotalcost(),
            $keys[43] => $this->getCostuom(),
            $keys[44] => $this->getStancost(),
            $keys[45] => $this->getQuotind(),
            $keys[46] => $this->getQuotqty(),
            $keys[47] => $this->getQuotprice(),
            $keys[48] => $this->getQuotcost(),
            $keys[49] => $this->getQuotmkupmarg(),
            $keys[50] => $this->getQuotdiscpct(),
            $keys[51] => $this->getErrormsg(),
            $keys[52] => $this->getMinprice(),
            $keys[53] => $this->getPonbr(),
            $keys[54] => $this->getPoref(),
            $keys[55] => $this->getNsitemgroup(),
            $keys[56] => $this->getShipfromid(),
            $keys[57] => $this->getItemtype(),
            $keys[58] => $this->getCanbackorder(),
            $keys[59] => $this->getDummy(),
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
     * @return $this|\Ordrdet
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OrdrdetTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Ordrdet
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
                $this->setType($value);
                break;
            case 5:
                $this->setOrderno($value);
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
                $this->setCustid($value);
                break;
            case 10:
                $this->setCustitemid($value);
                break;
            case 11:
                $this->setDesc1($value);
                break;
            case 12:
                $this->setDesc2($value);
                break;
            case 13:
                $this->setPrice($value);
                break;
            case 14:
                $this->setTotalprice($value);
                break;
            case 15:
                $this->setQty($value);
                break;
            case 16:
                $this->setQtyshipped($value);
                break;
            case 17:
                $this->setQtybackord($value);
                break;
            case 18:
                $this->setRshipdate($value);
                break;
            case 19:
                $this->setHasdocuments($value);
                break;
            case 20:
                $this->setQtyavail($value);
                break;
            case 21:
                $this->setHasnotes($value);
                break;
            case 22:
                $this->setCost($value);
                break;
            case 23:
                $this->setWhse($value);
                break;
            case 24:
                $this->setUom($value);
                break;
            case 25:
                $this->setSpcord($value);
                break;
            case 26:
                $this->setKititemflag($value);
                break;
            case 27:
                $this->setPromocode($value);
                break;
            case 28:
                $this->setTaxcode($value);
                break;
            case 29:
                $this->setTaxcodeperc($value);
                break;
            case 30:
                $this->setDiscpct($value);
                break;
            case 31:
                $this->setListprice($value);
                break;
            case 32:
                $this->setUomconv($value);
                break;
            case 33:
                $this->setVendorid($value);
                break;
            case 34:
                $this->setVendoritemid($value);
                break;
            case 35:
                $this->setMfgid($value);
                break;
            case 36:
                $this->setMfgitemid($value);
                break;
            case 37:
                $this->setStatus($value);
                break;
            case 38:
                $this->setLostreason($value);
                break;
            case 39:
                $this->setLostdate($value);
                break;
            case 40:
                $this->setNotes($value);
                break;
            case 41:
                $this->setLeaddays($value);
                break;
            case 42:
                $this->setOrdrtotalcost($value);
                break;
            case 43:
                $this->setCostuom($value);
                break;
            case 44:
                $this->setStancost($value);
                break;
            case 45:
                $this->setQuotind($value);
                break;
            case 46:
                $this->setQuotqty($value);
                break;
            case 47:
                $this->setQuotprice($value);
                break;
            case 48:
                $this->setQuotcost($value);
                break;
            case 49:
                $this->setQuotmkupmarg($value);
                break;
            case 50:
                $this->setQuotdiscpct($value);
                break;
            case 51:
                $this->setErrormsg($value);
                break;
            case 52:
                $this->setMinprice($value);
                break;
            case 53:
                $this->setPonbr($value);
                break;
            case 54:
                $this->setPoref($value);
                break;
            case 55:
                $this->setNsitemgroup($value);
                break;
            case 56:
                $this->setShipfromid($value);
                break;
            case 57:
                $this->setItemtype($value);
                break;
            case 58:
                $this->setCanbackorder($value);
                break;
            case 59:
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
        $keys = OrdrdetTableMap::getFieldNames($keyType);

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
            $this->setType($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setOrderno($arr[$keys[5]]);
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
            $this->setCustid($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCustitemid($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDesc1($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDesc2($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPrice($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTotalprice($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setQty($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setQtyshipped($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setQtybackord($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setRshipdate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setHasdocuments($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setQtyavail($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setHasnotes($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setCost($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setWhse($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setUom($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setSpcord($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setKititemflag($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPromocode($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setTaxcode($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setTaxcodeperc($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setDiscpct($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setListprice($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setUomconv($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setVendorid($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setVendoritemid($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setMfgid($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setMfgitemid($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setStatus($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setLostreason($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setLostdate($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setNotes($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setLeaddays($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setOrdrtotalcost($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setCostuom($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setStancost($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setQuotind($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setQuotqty($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setQuotprice($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setQuotcost($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setQuotmkupmarg($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setQuotdiscpct($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setErrormsg($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setMinprice($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setPonbr($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setPoref($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setNsitemgroup($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setShipfromid($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setItemtype($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setCanbackorder($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setDummy($arr[$keys[59]]);
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
     * @return $this|\Ordrdet The current object, for fluid interface
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
        $criteria = new Criteria(OrdrdetTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OrdrdetTableMap::COL_SESSIONID)) {
            $criteria->add(OrdrdetTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_RECNO)) {
            $criteria->add(OrdrdetTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DATE)) {
            $criteria->add(OrdrdetTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TIME)) {
            $criteria->add(OrdrdetTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TYPE)) {
            $criteria->add(OrdrdetTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ORDERNO)) {
            $criteria->add(OrdrdetTableMap::COL_ORDERNO, $this->orderno);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LINENBR)) {
            $criteria->add(OrdrdetTableMap::COL_LINENBR, $this->linenbr);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_SUBLINENBR)) {
            $criteria->add(OrdrdetTableMap::COL_SUBLINENBR, $this->sublinenbr);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ITEMID)) {
            $criteria->add(OrdrdetTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_CUSTID)) {
            $criteria->add(OrdrdetTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_CUSTITEMID)) {
            $criteria->add(OrdrdetTableMap::COL_CUSTITEMID, $this->custitemid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DESC1)) {
            $criteria->add(OrdrdetTableMap::COL_DESC1, $this->desc1);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DESC2)) {
            $criteria->add(OrdrdetTableMap::COL_DESC2, $this->desc2);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_PRICE)) {
            $criteria->add(OrdrdetTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TOTALPRICE)) {
            $criteria->add(OrdrdetTableMap::COL_TOTALPRICE, $this->totalprice);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTY)) {
            $criteria->add(OrdrdetTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTYSHIPPED)) {
            $criteria->add(OrdrdetTableMap::COL_QTYSHIPPED, $this->qtyshipped);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTYBACKORD)) {
            $criteria->add(OrdrdetTableMap::COL_QTYBACKORD, $this->qtybackord);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_RSHIPDATE)) {
            $criteria->add(OrdrdetTableMap::COL_RSHIPDATE, $this->rshipdate);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_HASDOCUMENTS)) {
            $criteria->add(OrdrdetTableMap::COL_HASDOCUMENTS, $this->hasdocuments);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QTYAVAIL)) {
            $criteria->add(OrdrdetTableMap::COL_QTYAVAIL, $this->qtyavail);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_HASNOTES)) {
            $criteria->add(OrdrdetTableMap::COL_HASNOTES, $this->hasnotes);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_COST)) {
            $criteria->add(OrdrdetTableMap::COL_COST, $this->cost);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_WHSE)) {
            $criteria->add(OrdrdetTableMap::COL_WHSE, $this->whse);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_UOM)) {
            $criteria->add(OrdrdetTableMap::COL_UOM, $this->uom);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_SPCORD)) {
            $criteria->add(OrdrdetTableMap::COL_SPCORD, $this->spcord);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_KITITEMFLAG)) {
            $criteria->add(OrdrdetTableMap::COL_KITITEMFLAG, $this->kititemflag);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_PROMOCODE)) {
            $criteria->add(OrdrdetTableMap::COL_PROMOCODE, $this->promocode);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TAXCODE)) {
            $criteria->add(OrdrdetTableMap::COL_TAXCODE, $this->taxcode);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_TAXCODEPERC)) {
            $criteria->add(OrdrdetTableMap::COL_TAXCODEPERC, $this->taxcodeperc);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DISCPCT)) {
            $criteria->add(OrdrdetTableMap::COL_DISCPCT, $this->discpct);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LISTPRICE)) {
            $criteria->add(OrdrdetTableMap::COL_LISTPRICE, $this->listprice);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_UOMCONV)) {
            $criteria->add(OrdrdetTableMap::COL_UOMCONV, $this->uomconv);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_VENDORID)) {
            $criteria->add(OrdrdetTableMap::COL_VENDORID, $this->vendorid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_VENDORITEMID)) {
            $criteria->add(OrdrdetTableMap::COL_VENDORITEMID, $this->vendoritemid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_MFGID)) {
            $criteria->add(OrdrdetTableMap::COL_MFGID, $this->mfgid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_MFGITEMID)) {
            $criteria->add(OrdrdetTableMap::COL_MFGITEMID, $this->mfgitemid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_STATUS)) {
            $criteria->add(OrdrdetTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LOSTREASON)) {
            $criteria->add(OrdrdetTableMap::COL_LOSTREASON, $this->lostreason);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LOSTDATE)) {
            $criteria->add(OrdrdetTableMap::COL_LOSTDATE, $this->lostdate);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_NOTES)) {
            $criteria->add(OrdrdetTableMap::COL_NOTES, $this->notes);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_LEADDAYS)) {
            $criteria->add(OrdrdetTableMap::COL_LEADDAYS, $this->leaddays);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ORDRTOTALCOST)) {
            $criteria->add(OrdrdetTableMap::COL_ORDRTOTALCOST, $this->ordrtotalcost);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_COSTUOM)) {
            $criteria->add(OrdrdetTableMap::COL_COSTUOM, $this->costuom);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_STANCOST)) {
            $criteria->add(OrdrdetTableMap::COL_STANCOST, $this->stancost);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTIND)) {
            $criteria->add(OrdrdetTableMap::COL_QUOTIND, $this->quotind);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTQTY)) {
            $criteria->add(OrdrdetTableMap::COL_QUOTQTY, $this->quotqty);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTPRICE)) {
            $criteria->add(OrdrdetTableMap::COL_QUOTPRICE, $this->quotprice);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTCOST)) {
            $criteria->add(OrdrdetTableMap::COL_QUOTCOST, $this->quotcost);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTMKUPMARG)) {
            $criteria->add(OrdrdetTableMap::COL_QUOTMKUPMARG, $this->quotmkupmarg);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_QUOTDISCPCT)) {
            $criteria->add(OrdrdetTableMap::COL_QUOTDISCPCT, $this->quotdiscpct);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ERRORMSG)) {
            $criteria->add(OrdrdetTableMap::COL_ERRORMSG, $this->errormsg);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_MINPRICE)) {
            $criteria->add(OrdrdetTableMap::COL_MINPRICE, $this->minprice);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_PONBR)) {
            $criteria->add(OrdrdetTableMap::COL_PONBR, $this->ponbr);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_POREF)) {
            $criteria->add(OrdrdetTableMap::COL_POREF, $this->poref);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_NSITEMGROUP)) {
            $criteria->add(OrdrdetTableMap::COL_NSITEMGROUP, $this->nsitemgroup);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_SHIPFROMID)) {
            $criteria->add(OrdrdetTableMap::COL_SHIPFROMID, $this->shipfromid);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_ITEMTYPE)) {
            $criteria->add(OrdrdetTableMap::COL_ITEMTYPE, $this->itemtype);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_CANBACKORDER)) {
            $criteria->add(OrdrdetTableMap::COL_CANBACKORDER, $this->canbackorder);
        }
        if ($this->isColumnModified(OrdrdetTableMap::COL_DUMMY)) {
            $criteria->add(OrdrdetTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildOrdrdetQuery::create();
        $criteria->add(OrdrdetTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(OrdrdetTableMap::COL_RECNO, $this->recno);
        $criteria->add(OrdrdetTableMap::COL_ORDERNO, $this->orderno);

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
            null !== $this->getRecno() &&
            null !== $this->getOrderno();

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
        $pks[2] = $this->getOrderno();

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
        $this->setOrderno($keys[2]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getSessionid()) && (null === $this->getRecno()) && (null === $this->getOrderno());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Ordrdet (or compatible) type.
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
        $copyObj->setType($this->getType());
        $copyObj->setOrderno($this->getOrderno());
        $copyObj->setLinenbr($this->getLinenbr());
        $copyObj->setSublinenbr($this->getSublinenbr());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setCustid($this->getCustid());
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
        $copyObj->setVendorid($this->getVendorid());
        $copyObj->setVendoritemid($this->getVendoritemid());
        $copyObj->setMfgid($this->getMfgid());
        $copyObj->setMfgitemid($this->getMfgitemid());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setLostreason($this->getLostreason());
        $copyObj->setLostdate($this->getLostdate());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setLeaddays($this->getLeaddays());
        $copyObj->setOrdrtotalcost($this->getOrdrtotalcost());
        $copyObj->setCostuom($this->getCostuom());
        $copyObj->setStancost($this->getStancost());
        $copyObj->setQuotind($this->getQuotind());
        $copyObj->setQuotqty($this->getQuotqty());
        $copyObj->setQuotprice($this->getQuotprice());
        $copyObj->setQuotcost($this->getQuotcost());
        $copyObj->setQuotmkupmarg($this->getQuotmkupmarg());
        $copyObj->setQuotdiscpct($this->getQuotdiscpct());
        $copyObj->setErrormsg($this->getErrormsg());
        $copyObj->setMinprice($this->getMinprice());
        $copyObj->setPonbr($this->getPonbr());
        $copyObj->setPoref($this->getPoref());
        $copyObj->setNsitemgroup($this->getNsitemgroup());
        $copyObj->setShipfromid($this->getShipfromid());
        $copyObj->setItemtype($this->getItemtype());
        $copyObj->setCanbackorder($this->getCanbackorder());
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
     * @return \Ordrdet Clone of current object.
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
        $this->type = null;
        $this->orderno = null;
        $this->linenbr = null;
        $this->sublinenbr = null;
        $this->itemid = null;
        $this->custid = null;
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
        $this->vendorid = null;
        $this->vendoritemid = null;
        $this->mfgid = null;
        $this->mfgitemid = null;
        $this->status = null;
        $this->lostreason = null;
        $this->lostdate = null;
        $this->notes = null;
        $this->leaddays = null;
        $this->ordrtotalcost = null;
        $this->costuom = null;
        $this->stancost = null;
        $this->quotind = null;
        $this->quotqty = null;
        $this->quotprice = null;
        $this->quotcost = null;
        $this->quotmkupmarg = null;
        $this->quotdiscpct = null;
        $this->errormsg = null;
        $this->minprice = null;
        $this->ponbr = null;
        $this->poref = null;
        $this->nsitemgroup = null;
        $this->shipfromid = null;
        $this->itemtype = null;
        $this->canbackorder = null;
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
        return (string) $this->exportTo(OrdrdetTableMap::DEFAULT_STRING_FORMAT);
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
