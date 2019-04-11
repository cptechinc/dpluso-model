<?php

namespace Base;

use \OrdrhedQuery as ChildOrdrhedQuery;
use \Exception;
use \PDO;
use Map\OrdrhedTableMap;
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
 * Base class that represents a row from the 'ordrhed' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Ordrhed implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OrdrhedTableMap';


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
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $type;

    /**
     * The value for the custid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custid;

    /**
     * The value for the shiptoid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shiptoid;

    /**
     * The value for the custname field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custname;

    /**
     * The value for the orderno field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $orderno;

    /**
     * The value for the custpo field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custpo;

    /**
     * The value for the custref field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $custref;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $status;

    /**
     * The value for the orderdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $orderdate;

    /**
     * The value for the careof field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $careof;

    /**
     * The value for the quotdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $quotdate;

    /**
     * The value for the invdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $invdate;

    /**
     * The value for the shipdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipdate;

    /**
     * The value for the revdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $revdate;

    /**
     * The value for the expdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $expdate;

    /**
     * The value for the hasdocuments field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $hasdocuments;

    /**
     * The value for the hastracking field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $hastracking;

    /**
     * The value for the subtotal field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $subtotal;

    /**
     * The value for the salestax field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $salestax;

    /**
     * The value for the freight field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $freight;

    /**
     * The value for the misccost field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $misccost;

    /**
     * The value for the ordertotal field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $ordertotal;

    /**
     * The value for the hasnotes field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $hasnotes;

    /**
     * The value for the editord field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $editord;

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
     * The value for the sconame field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sconame;

    /**
     * The value for the shipname field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipname;

    /**
     * The value for the shipaddress field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipaddress;

    /**
     * The value for the shipaddress2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipaddress2;

    /**
     * The value for the shipcity field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipcity;

    /**
     * The value for the shipstate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipstate;

    /**
     * The value for the shipzip field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipzip;

    /**
     * The value for the shipcountry field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipcountry;

    /**
     * The value for the contact field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $contact;

    /**
     * The value for the phintl field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $phintl;

    /**
     * The value for the phone field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $phone;

    /**
     * The value for the extension field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $extension;

    /**
     * The value for the faxnbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $faxnbr;

    /**
     * The value for the email field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $email;

    /**
     * The value for the releasenbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $releasenbr;

    /**
     * The value for the shipviacd field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipviacd;

    /**
     * The value for the shipviadesc field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipviadesc;

    /**
     * The value for the pricecode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pricecode;

    /**
     * The value for the pricecodedesc field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pricecodedesc;

    /**
     * The value for the pricedisp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pricedisp;

    /**
     * The value for the taxcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $taxcode;

    /**
     * The value for the taxcodedesc field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $taxcodedesc;

    /**
     * The value for the taxcodedisp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $taxcodedisp;

    /**
     * The value for the termcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $termcode;

    /**
     * The value for the termtype field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $termtype;

    /**
     * The value for the termcodedesc field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $termcodedesc;

    /**
     * The value for the rqstdate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rqstdate;

    /**
     * The value for the shipcom field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $shipcom;

    /**
     * The value for the sp1 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp1;

    /**
     * The value for the sp1name field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp1name;

    /**
     * The value for the sp2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp2;

    /**
     * The value for the sp2name field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp2name;

    /**
     * The value for the sp2disp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp2disp;

    /**
     * The value for the sp3 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp3;

    /**
     * The value for the sp3name field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp3name;

    /**
     * The value for the sp3disp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sp3disp;

    /**
     * The value for the fob field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $fob;

    /**
     * The value for the deliverydesc field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $deliverydesc;

    /**
     * The value for the whse field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $whse;

    /**
     * The value for the cardnumber field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cardnumber;

    /**
     * The value for the cardexpire field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cardexpire;

    /**
     * The value for the cardcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cardcode;

    /**
     * The value for the cardapproval field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cardapproval;

    /**
     * The value for the totalcost field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $totalcost;

    /**
     * The value for the totaldiscount field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $totaldiscount;

    /**
     * The value for the paymenttype field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $paymenttype;

    /**
     * The value for the srcdatefrom field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $srcdatefrom;

    /**
     * The value for the srcdatethru field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $srcdatethru;

    /**
     * The value for the billname field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billname;

    /**
     * The value for the billaddress field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billaddress;

    /**
     * The value for the billaddress2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billaddress2;

    /**
     * The value for the billaddress3 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billaddress3;

    /**
     * The value for the billcountry field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billcountry;

    /**
     * The value for the billcity field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billcity;

    /**
     * The value for the billstate field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billstate;

    /**
     * The value for the billzip field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $billzip;

    /**
     * The value for the prntfmt field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $prntfmt;

    /**
     * The value for the prntfmtdisp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $prntfmtdisp;

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
        $this->type = '';
        $this->custid = '';
        $this->shiptoid = '';
        $this->custname = '';
        $this->orderno = '';
        $this->custpo = '';
        $this->custref = '';
        $this->status = '';
        $this->orderdate = '';
        $this->careof = '';
        $this->quotdate = '';
        $this->invdate = '';
        $this->shipdate = '';
        $this->revdate = '';
        $this->expdate = '';
        $this->hasdocuments = '';
        $this->hastracking = '';
        $this->subtotal = '0.00';
        $this->salestax = '0.00';
        $this->freight = '0.00';
        $this->misccost = '0.00';
        $this->ordertotal = '0.00';
        $this->hasnotes = '';
        $this->editord = '';
        $this->error = '';
        $this->errormsg = '';
        $this->sconame = '';
        $this->shipname = '';
        $this->shipaddress = '';
        $this->shipaddress2 = '';
        $this->shipcity = '';
        $this->shipstate = '';
        $this->shipzip = '';
        $this->shipcountry = '';
        $this->contact = '';
        $this->phintl = '';
        $this->phone = '';
        $this->extension = '';
        $this->faxnbr = '';
        $this->email = '';
        $this->releasenbr = '';
        $this->shipviacd = '';
        $this->shipviadesc = '';
        $this->pricecode = '';
        $this->pricecodedesc = '';
        $this->pricedisp = '';
        $this->taxcode = '';
        $this->taxcodedesc = '';
        $this->taxcodedisp = '';
        $this->termcode = '';
        $this->termtype = '';
        $this->termcodedesc = '';
        $this->rqstdate = '';
        $this->shipcom = '';
        $this->sp1 = '';
        $this->sp1name = '';
        $this->sp2 = '';
        $this->sp2name = '';
        $this->sp2disp = '';
        $this->sp3 = '';
        $this->sp3name = '';
        $this->sp3disp = '';
        $this->fob = '';
        $this->deliverydesc = '';
        $this->whse = '';
        $this->cardnumber = '';
        $this->cardexpire = '';
        $this->cardcode = '';
        $this->cardapproval = '';
        $this->totalcost = '';
        $this->totaldiscount = '';
        $this->paymenttype = '';
        $this->srcdatefrom = '';
        $this->srcdatethru = '';
        $this->billname = '';
        $this->billaddress = '';
        $this->billaddress2 = '';
        $this->billaddress3 = '';
        $this->billcountry = '';
        $this->billcity = '';
        $this->billstate = '';
        $this->billzip = '';
        $this->prntfmt = '';
        $this->prntfmtdisp = '';
        $this->dummy = 'x';
    }

    /**
     * Initializes internal state of Base\Ordrhed object.
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
     * Compares this with another <code>Ordrhed</code> instance.  If
     * <code>obj</code> is an instance of <code>Ordrhed</code>, delegates to
     * <code>equals(Ordrhed)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Ordrhed The current object, for fluid interface
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
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
    }

    /**
     * Get the [shiptoid] column value.
     *
     * @return string
     */
    public function getShiptoid()
    {
        return $this->shiptoid;
    }

    /**
     * Get the [custname] column value.
     *
     * @return string
     */
    public function getCustname()
    {
        return $this->custname;
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
     * Get the [custpo] column value.
     *
     * @return string
     */
    public function getCustpo()
    {
        return $this->custpo;
    }

    /**
     * Get the [custref] column value.
     *
     * @return string
     */
    public function getCustref()
    {
        return $this->custref;
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
     * Get the [orderdate] column value.
     *
     * @return string
     */
    public function getOrderdate()
    {
        return $this->orderdate;
    }

    /**
     * Get the [careof] column value.
     *
     * @return string
     */
    public function getCareof()
    {
        return $this->careof;
    }

    /**
     * Get the [quotdate] column value.
     *
     * @return string
     */
    public function getQuotdate()
    {
        return $this->quotdate;
    }

    /**
     * Get the [invdate] column value.
     *
     * @return string
     */
    public function getInvdate()
    {
        return $this->invdate;
    }

    /**
     * Get the [shipdate] column value.
     *
     * @return string
     */
    public function getShipdate()
    {
        return $this->shipdate;
    }

    /**
     * Get the [revdate] column value.
     *
     * @return string
     */
    public function getRevdate()
    {
        return $this->revdate;
    }

    /**
     * Get the [expdate] column value.
     *
     * @return string
     */
    public function getExpdate()
    {
        return $this->expdate;
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
     * Get the [hastracking] column value.
     *
     * @return string
     */
    public function getHastracking()
    {
        return $this->hastracking;
    }

    /**
     * Get the [subtotal] column value.
     *
     * @return string
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Get the [salestax] column value.
     *
     * @return string
     */
    public function getSalestax()
    {
        return $this->salestax;
    }

    /**
     * Get the [freight] column value.
     *
     * @return string
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * Get the [misccost] column value.
     *
     * @return string
     */
    public function getMisccost()
    {
        return $this->misccost;
    }

    /**
     * Get the [ordertotal] column value.
     *
     * @return string
     */
    public function getOrdertotal()
    {
        return $this->ordertotal;
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
     * Get the [editord] column value.
     *
     * @return string
     */
    public function getEditord()
    {
        return $this->editord;
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
     * Get the [sconame] column value.
     *
     * @return string
     */
    public function getSconame()
    {
        return $this->sconame;
    }

    /**
     * Get the [shipname] column value.
     *
     * @return string
     */
    public function getShipname()
    {
        return $this->shipname;
    }

    /**
     * Get the [shipaddress] column value.
     *
     * @return string
     */
    public function getShipaddress()
    {
        return $this->shipaddress;
    }

    /**
     * Get the [shipaddress2] column value.
     *
     * @return string
     */
    public function getShipaddress2()
    {
        return $this->shipaddress2;
    }

    /**
     * Get the [shipcity] column value.
     *
     * @return string
     */
    public function getShipcity()
    {
        return $this->shipcity;
    }

    /**
     * Get the [shipstate] column value.
     *
     * @return string
     */
    public function getShipstate()
    {
        return $this->shipstate;
    }

    /**
     * Get the [shipzip] column value.
     *
     * @return string
     */
    public function getShipzip()
    {
        return $this->shipzip;
    }

    /**
     * Get the [shipcountry] column value.
     *
     * @return string
     */
    public function getShipcountry()
    {
        return $this->shipcountry;
    }

    /**
     * Get the [contact] column value.
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Get the [phintl] column value.
     *
     * @return string
     */
    public function getPhintl()
    {
        return $this->phintl;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [extension] column value.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Get the [faxnbr] column value.
     *
     * @return string
     */
    public function getFaxnbr()
    {
        return $this->faxnbr;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [releasenbr] column value.
     *
     * @return string
     */
    public function getReleasenbr()
    {
        return $this->releasenbr;
    }

    /**
     * Get the [shipviacd] column value.
     *
     * @return string
     */
    public function getShipviacd()
    {
        return $this->shipviacd;
    }

    /**
     * Get the [shipviadesc] column value.
     *
     * @return string
     */
    public function getShipviadesc()
    {
        return $this->shipviadesc;
    }

    /**
     * Get the [pricecode] column value.
     *
     * @return string
     */
    public function getPricecode()
    {
        return $this->pricecode;
    }

    /**
     * Get the [pricecodedesc] column value.
     *
     * @return string
     */
    public function getPricecodedesc()
    {
        return $this->pricecodedesc;
    }

    /**
     * Get the [pricedisp] column value.
     *
     * @return string
     */
    public function getPricedisp()
    {
        return $this->pricedisp;
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
     * Get the [taxcodedesc] column value.
     *
     * @return string
     */
    public function getTaxcodedesc()
    {
        return $this->taxcodedesc;
    }

    /**
     * Get the [taxcodedisp] column value.
     *
     * @return string
     */
    public function getTaxcodedisp()
    {
        return $this->taxcodedisp;
    }

    /**
     * Get the [termcode] column value.
     *
     * @return string
     */
    public function getTermcode()
    {
        return $this->termcode;
    }

    /**
     * Get the [termtype] column value.
     *
     * @return string
     */
    public function getTermtype()
    {
        return $this->termtype;
    }

    /**
     * Get the [termcodedesc] column value.
     *
     * @return string
     */
    public function getTermcodedesc()
    {
        return $this->termcodedesc;
    }

    /**
     * Get the [rqstdate] column value.
     *
     * @return string
     */
    public function getRqstdate()
    {
        return $this->rqstdate;
    }

    /**
     * Get the [shipcom] column value.
     *
     * @return string
     */
    public function getShipcom()
    {
        return $this->shipcom;
    }

    /**
     * Get the [sp1] column value.
     *
     * @return string
     */
    public function getSp1()
    {
        return $this->sp1;
    }

    /**
     * Get the [sp1name] column value.
     *
     * @return string
     */
    public function getSp1name()
    {
        return $this->sp1name;
    }

    /**
     * Get the [sp2] column value.
     *
     * @return string
     */
    public function getSp2()
    {
        return $this->sp2;
    }

    /**
     * Get the [sp2name] column value.
     *
     * @return string
     */
    public function getSp2name()
    {
        return $this->sp2name;
    }

    /**
     * Get the [sp2disp] column value.
     *
     * @return string
     */
    public function getSp2disp()
    {
        return $this->sp2disp;
    }

    /**
     * Get the [sp3] column value.
     *
     * @return string
     */
    public function getSp3()
    {
        return $this->sp3;
    }

    /**
     * Get the [sp3name] column value.
     *
     * @return string
     */
    public function getSp3name()
    {
        return $this->sp3name;
    }

    /**
     * Get the [sp3disp] column value.
     *
     * @return string
     */
    public function getSp3disp()
    {
        return $this->sp3disp;
    }

    /**
     * Get the [fob] column value.
     *
     * @return string
     */
    public function getFob()
    {
        return $this->fob;
    }

    /**
     * Get the [deliverydesc] column value.
     *
     * @return string
     */
    public function getDeliverydesc()
    {
        return $this->deliverydesc;
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
     * Get the [cardnumber] column value.
     *
     * @return string
     */
    public function getCardnumber()
    {
        return $this->cardnumber;
    }

    /**
     * Get the [cardexpire] column value.
     *
     * @return string
     */
    public function getCardexpire()
    {
        return $this->cardexpire;
    }

    /**
     * Get the [cardcode] column value.
     *
     * @return string
     */
    public function getCardcode()
    {
        return $this->cardcode;
    }

    /**
     * Get the [cardapproval] column value.
     *
     * @return string
     */
    public function getCardapproval()
    {
        return $this->cardapproval;
    }

    /**
     * Get the [totalcost] column value.
     *
     * @return string
     */
    public function getTotalcost()
    {
        return $this->totalcost;
    }

    /**
     * Get the [totaldiscount] column value.
     *
     * @return string
     */
    public function getTotaldiscount()
    {
        return $this->totaldiscount;
    }

    /**
     * Get the [paymenttype] column value.
     *
     * @return string
     */
    public function getPaymenttype()
    {
        return $this->paymenttype;
    }

    /**
     * Get the [srcdatefrom] column value.
     *
     * @return string
     */
    public function getSrcdatefrom()
    {
        return $this->srcdatefrom;
    }

    /**
     * Get the [srcdatethru] column value.
     *
     * @return string
     */
    public function getSrcdatethru()
    {
        return $this->srcdatethru;
    }

    /**
     * Get the [billname] column value.
     *
     * @return string
     */
    public function getBillname()
    {
        return $this->billname;
    }

    /**
     * Get the [billaddress] column value.
     *
     * @return string
     */
    public function getBilladdress()
    {
        return $this->billaddress;
    }

    /**
     * Get the [billaddress2] column value.
     *
     * @return string
     */
    public function getBilladdress2()
    {
        return $this->billaddress2;
    }

    /**
     * Get the [billaddress3] column value.
     *
     * @return string
     */
    public function getBilladdress3()
    {
        return $this->billaddress3;
    }

    /**
     * Get the [billcountry] column value.
     *
     * @return string
     */
    public function getBillcountry()
    {
        return $this->billcountry;
    }

    /**
     * Get the [billcity] column value.
     *
     * @return string
     */
    public function getBillcity()
    {
        return $this->billcity;
    }

    /**
     * Get the [billstate] column value.
     *
     * @return string
     */
    public function getBillstate()
    {
        return $this->billstate;
    }

    /**
     * Get the [billzip] column value.
     *
     * @return string
     */
    public function getBillzip()
    {
        return $this->billzip;
    }

    /**
     * Get the [prntfmt] column value.
     *
     * @return string
     */
    public function getPrntfmt()
    {
        return $this->prntfmt;
    }

    /**
     * Get the [prntfmtdisp] column value.
     *
     * @return string
     */
    public function getPrntfmtdisp()
    {
        return $this->prntfmtdisp;
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
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [custname] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCustname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custname !== $v) {
            $this->custname = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CUSTNAME] = true;
        }

        return $this;
    } // setCustname()

    /**
     * Set the value of [orderno] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setOrderno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orderno !== $v) {
            $this->orderno = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_ORDERNO] = true;
        }

        return $this;
    } // setOrderno()

    /**
     * Set the value of [custpo] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCustpo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custpo !== $v) {
            $this->custpo = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CUSTPO] = true;
        }

        return $this;
    } // setCustpo()

    /**
     * Set the value of [custref] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCustref($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custref !== $v) {
            $this->custref = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CUSTREF] = true;
        }

        return $this;
    } // setCustref()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [orderdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setOrderdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orderdate !== $v) {
            $this->orderdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_ORDERDATE] = true;
        }

        return $this;
    } // setOrderdate()

    /**
     * Set the value of [careof] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCareof($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->careof !== $v) {
            $this->careof = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CAREOF] = true;
        }

        return $this;
    } // setCareof()

    /**
     * Set the value of [quotdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setQuotdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quotdate !== $v) {
            $this->quotdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_QUOTDATE] = true;
        }

        return $this;
    } // setQuotdate()

    /**
     * Set the value of [invdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setInvdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->invdate !== $v) {
            $this->invdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_INVDATE] = true;
        }

        return $this;
    } // setInvdate()

    /**
     * Set the value of [shipdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipdate !== $v) {
            $this->shipdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPDATE] = true;
        }

        return $this;
    } // setShipdate()

    /**
     * Set the value of [revdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setRevdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->revdate !== $v) {
            $this->revdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_REVDATE] = true;
        }

        return $this;
    } // setRevdate()

    /**
     * Set the value of [expdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setExpdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expdate !== $v) {
            $this->expdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_EXPDATE] = true;
        }

        return $this;
    } // setExpdate()

    /**
     * Set the value of [hasdocuments] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setHasdocuments($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasdocuments !== $v) {
            $this->hasdocuments = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_HASDOCUMENTS] = true;
        }

        return $this;
    } // setHasdocuments()

    /**
     * Set the value of [hastracking] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setHastracking($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hastracking !== $v) {
            $this->hastracking = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_HASTRACKING] = true;
        }

        return $this;
    } // setHastracking()

    /**
     * Set the value of [subtotal] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSubtotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->subtotal !== $v) {
            $this->subtotal = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SUBTOTAL] = true;
        }

        return $this;
    } // setSubtotal()

    /**
     * Set the value of [salestax] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSalestax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salestax !== $v) {
            $this->salestax = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SALESTAX] = true;
        }

        return $this;
    } // setSalestax()

    /**
     * Set the value of [freight] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->freight !== $v) {
            $this->freight = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_FREIGHT] = true;
        }

        return $this;
    } // setFreight()

    /**
     * Set the value of [misccost] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setMisccost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->misccost !== $v) {
            $this->misccost = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_MISCCOST] = true;
        }

        return $this;
    } // setMisccost()

    /**
     * Set the value of [ordertotal] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setOrdertotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordertotal !== $v) {
            $this->ordertotal = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_ORDERTOTAL] = true;
        }

        return $this;
    } // setOrdertotal()

    /**
     * Set the value of [hasnotes] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setHasnotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hasnotes !== $v) {
            $this->hasnotes = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_HASNOTES] = true;
        }

        return $this;
    } // setHasnotes()

    /**
     * Set the value of [editord] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setEditord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->editord !== $v) {
            $this->editord = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_EDITORD] = true;
        }

        return $this;
    } // setEditord()

    /**
     * Set the value of [error] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setError($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error !== $v) {
            $this->error = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_ERROR] = true;
        }

        return $this;
    } // setError()

    /**
     * Set the value of [errormsg] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setErrormsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->errormsg !== $v) {
            $this->errormsg = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_ERRORMSG] = true;
        }

        return $this;
    } // setErrormsg()

    /**
     * Set the value of [sconame] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSconame($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sconame !== $v) {
            $this->sconame = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SCONAME] = true;
        }

        return $this;
    } // setSconame()

    /**
     * Set the value of [shipname] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipname !== $v) {
            $this->shipname = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPNAME] = true;
        }

        return $this;
    } // setShipname()

    /**
     * Set the value of [shipaddress] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipaddress !== $v) {
            $this->shipaddress = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPADDRESS] = true;
        }

        return $this;
    } // setShipaddress()

    /**
     * Set the value of [shipaddress2] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipaddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipaddress2 !== $v) {
            $this->shipaddress2 = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPADDRESS2] = true;
        }

        return $this;
    } // setShipaddress2()

    /**
     * Set the value of [shipcity] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipcity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipcity !== $v) {
            $this->shipcity = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPCITY] = true;
        }

        return $this;
    } // setShipcity()

    /**
     * Set the value of [shipstate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipstate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipstate !== $v) {
            $this->shipstate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPSTATE] = true;
        }

        return $this;
    } // setShipstate()

    /**
     * Set the value of [shipzip] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipzip !== $v) {
            $this->shipzip = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPZIP] = true;
        }

        return $this;
    } // setShipzip()

    /**
     * Set the value of [shipcountry] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipcountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipcountry !== $v) {
            $this->shipcountry = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPCOUNTRY] = true;
        }

        return $this;
    } // setShipcountry()

    /**
     * Set the value of [contact] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setContact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact !== $v) {
            $this->contact = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CONTACT] = true;
        }

        return $this;
    } // setContact()

    /**
     * Set the value of [phintl] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPhintl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phintl !== $v) {
            $this->phintl = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PHINTL] = true;
        }

        return $this;
    } // setPhintl()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [extension] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setExtension($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->extension !== $v) {
            $this->extension = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_EXTENSION] = true;
        }

        return $this;
    } // setExtension()

    /**
     * Set the value of [faxnbr] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setFaxnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->faxnbr !== $v) {
            $this->faxnbr = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_FAXNBR] = true;
        }

        return $this;
    } // setFaxnbr()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [releasenbr] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setReleasenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->releasenbr !== $v) {
            $this->releasenbr = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_RELEASENBR] = true;
        }

        return $this;
    } // setReleasenbr()

    /**
     * Set the value of [shipviacd] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipviacd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipviacd !== $v) {
            $this->shipviacd = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPVIACD] = true;
        }

        return $this;
    } // setShipviacd()

    /**
     * Set the value of [shipviadesc] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipviadesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipviadesc !== $v) {
            $this->shipviadesc = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPVIADESC] = true;
        }

        return $this;
    } // setShipviadesc()

    /**
     * Set the value of [pricecode] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPricecode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pricecode !== $v) {
            $this->pricecode = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PRICECODE] = true;
        }

        return $this;
    } // setPricecode()

    /**
     * Set the value of [pricecodedesc] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPricecodedesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pricecodedesc !== $v) {
            $this->pricecodedesc = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PRICECODEDESC] = true;
        }

        return $this;
    } // setPricecodedesc()

    /**
     * Set the value of [pricedisp] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPricedisp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pricedisp !== $v) {
            $this->pricedisp = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PRICEDISP] = true;
        }

        return $this;
    } // setPricedisp()

    /**
     * Set the value of [taxcode] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTaxcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcode !== $v) {
            $this->taxcode = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TAXCODE] = true;
        }

        return $this;
    } // setTaxcode()

    /**
     * Set the value of [taxcodedesc] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTaxcodedesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcodedesc !== $v) {
            $this->taxcodedesc = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TAXCODEDESC] = true;
        }

        return $this;
    } // setTaxcodedesc()

    /**
     * Set the value of [taxcodedisp] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTaxcodedisp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcodedisp !== $v) {
            $this->taxcodedisp = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TAXCODEDISP] = true;
        }

        return $this;
    } // setTaxcodedisp()

    /**
     * Set the value of [termcode] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTermcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->termcode !== $v) {
            $this->termcode = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TERMCODE] = true;
        }

        return $this;
    } // setTermcode()

    /**
     * Set the value of [termtype] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTermtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->termtype !== $v) {
            $this->termtype = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TERMTYPE] = true;
        }

        return $this;
    } // setTermtype()

    /**
     * Set the value of [termcodedesc] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTermcodedesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->termcodedesc !== $v) {
            $this->termcodedesc = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TERMCODEDESC] = true;
        }

        return $this;
    } // setTermcodedesc()

    /**
     * Set the value of [rqstdate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setRqstdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rqstdate !== $v) {
            $this->rqstdate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_RQSTDATE] = true;
        }

        return $this;
    } // setRqstdate()

    /**
     * Set the value of [shipcom] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setShipcom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipcom !== $v) {
            $this->shipcom = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SHIPCOM] = true;
        }

        return $this;
    } // setShipcom()

    /**
     * Set the value of [sp1] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp1 !== $v) {
            $this->sp1 = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP1] = true;
        }

        return $this;
    } // setSp1()

    /**
     * Set the value of [sp1name] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp1name($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp1name !== $v) {
            $this->sp1name = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP1NAME] = true;
        }

        return $this;
    } // setSp1name()

    /**
     * Set the value of [sp2] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp2 !== $v) {
            $this->sp2 = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP2] = true;
        }

        return $this;
    } // setSp2()

    /**
     * Set the value of [sp2name] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp2name($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp2name !== $v) {
            $this->sp2name = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP2NAME] = true;
        }

        return $this;
    } // setSp2name()

    /**
     * Set the value of [sp2disp] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp2disp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp2disp !== $v) {
            $this->sp2disp = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP2DISP] = true;
        }

        return $this;
    } // setSp2disp()

    /**
     * Set the value of [sp3] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp3 !== $v) {
            $this->sp3 = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP3] = true;
        }

        return $this;
    } // setSp3()

    /**
     * Set the value of [sp3name] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp3name($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp3name !== $v) {
            $this->sp3name = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP3NAME] = true;
        }

        return $this;
    } // setSp3name()

    /**
     * Set the value of [sp3disp] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSp3disp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp3disp !== $v) {
            $this->sp3disp = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SP3DISP] = true;
        }

        return $this;
    } // setSp3disp()

    /**
     * Set the value of [fob] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setFob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fob !== $v) {
            $this->fob = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_FOB] = true;
        }

        return $this;
    } // setFob()

    /**
     * Set the value of [deliverydesc] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setDeliverydesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->deliverydesc !== $v) {
            $this->deliverydesc = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_DELIVERYDESC] = true;
        }

        return $this;
    } // setDeliverydesc()

    /**
     * Set the value of [whse] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setWhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whse !== $v) {
            $this->whse = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_WHSE] = true;
        }

        return $this;
    } // setWhse()

    /**
     * Set the value of [cardnumber] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCardnumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cardnumber !== $v) {
            $this->cardnumber = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CARDNUMBER] = true;
        }

        return $this;
    } // setCardnumber()

    /**
     * Set the value of [cardexpire] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCardexpire($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cardexpire !== $v) {
            $this->cardexpire = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CARDEXPIRE] = true;
        }

        return $this;
    } // setCardexpire()

    /**
     * Set the value of [cardcode] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCardcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cardcode !== $v) {
            $this->cardcode = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CARDCODE] = true;
        }

        return $this;
    } // setCardcode()

    /**
     * Set the value of [cardapproval] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setCardapproval($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cardapproval !== $v) {
            $this->cardapproval = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_CARDAPPROVAL] = true;
        }

        return $this;
    } // setCardapproval()

    /**
     * Set the value of [totalcost] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTotalcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totalcost !== $v) {
            $this->totalcost = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TOTALCOST] = true;
        }

        return $this;
    } // setTotalcost()

    /**
     * Set the value of [totaldiscount] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setTotaldiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totaldiscount !== $v) {
            $this->totaldiscount = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_TOTALDISCOUNT] = true;
        }

        return $this;
    } // setTotaldiscount()

    /**
     * Set the value of [paymenttype] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPaymenttype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->paymenttype !== $v) {
            $this->paymenttype = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PAYMENTTYPE] = true;
        }

        return $this;
    } // setPaymenttype()

    /**
     * Set the value of [srcdatefrom] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSrcdatefrom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->srcdatefrom !== $v) {
            $this->srcdatefrom = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SRCDATEFROM] = true;
        }

        return $this;
    } // setSrcdatefrom()

    /**
     * Set the value of [srcdatethru] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setSrcdatethru($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->srcdatethru !== $v) {
            $this->srcdatethru = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_SRCDATETHRU] = true;
        }

        return $this;
    } // setSrcdatethru()

    /**
     * Set the value of [billname] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBillname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billname !== $v) {
            $this->billname = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLNAME] = true;
        }

        return $this;
    } // setBillname()

    /**
     * Set the value of [billaddress] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBilladdress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billaddress !== $v) {
            $this->billaddress = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLADDRESS] = true;
        }

        return $this;
    } // setBilladdress()

    /**
     * Set the value of [billaddress2] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBilladdress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billaddress2 !== $v) {
            $this->billaddress2 = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLADDRESS2] = true;
        }

        return $this;
    } // setBilladdress2()

    /**
     * Set the value of [billaddress3] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBilladdress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billaddress3 !== $v) {
            $this->billaddress3 = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLADDRESS3] = true;
        }

        return $this;
    } // setBilladdress3()

    /**
     * Set the value of [billcountry] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBillcountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billcountry !== $v) {
            $this->billcountry = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLCOUNTRY] = true;
        }

        return $this;
    } // setBillcountry()

    /**
     * Set the value of [billcity] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBillcity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billcity !== $v) {
            $this->billcity = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLCITY] = true;
        }

        return $this;
    } // setBillcity()

    /**
     * Set the value of [billstate] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBillstate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billstate !== $v) {
            $this->billstate = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLSTATE] = true;
        }

        return $this;
    } // setBillstate()

    /**
     * Set the value of [billzip] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setBillzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billzip !== $v) {
            $this->billzip = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_BILLZIP] = true;
        }

        return $this;
    } // setBillzip()

    /**
     * Set the value of [prntfmt] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPrntfmt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prntfmt !== $v) {
            $this->prntfmt = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PRNTFMT] = true;
        }

        return $this;
    } // setPrntfmt()

    /**
     * Set the value of [prntfmtdisp] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setPrntfmtdisp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prntfmtdisp !== $v) {
            $this->prntfmtdisp = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_PRNTFMTDISP] = true;
        }

        return $this;
    } // setPrntfmtdisp()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Ordrhed The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[OrdrhedTableMap::COL_DUMMY] = true;
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

            if ($this->type !== '') {
                return false;
            }

            if ($this->custid !== '') {
                return false;
            }

            if ($this->shiptoid !== '') {
                return false;
            }

            if ($this->custname !== '') {
                return false;
            }

            if ($this->orderno !== '') {
                return false;
            }

            if ($this->custpo !== '') {
                return false;
            }

            if ($this->custref !== '') {
                return false;
            }

            if ($this->status !== '') {
                return false;
            }

            if ($this->orderdate !== '') {
                return false;
            }

            if ($this->careof !== '') {
                return false;
            }

            if ($this->quotdate !== '') {
                return false;
            }

            if ($this->invdate !== '') {
                return false;
            }

            if ($this->shipdate !== '') {
                return false;
            }

            if ($this->revdate !== '') {
                return false;
            }

            if ($this->expdate !== '') {
                return false;
            }

            if ($this->hasdocuments !== '') {
                return false;
            }

            if ($this->hastracking !== '') {
                return false;
            }

            if ($this->subtotal !== '0.00') {
                return false;
            }

            if ($this->salestax !== '0.00') {
                return false;
            }

            if ($this->freight !== '0.00') {
                return false;
            }

            if ($this->misccost !== '0.00') {
                return false;
            }

            if ($this->ordertotal !== '0.00') {
                return false;
            }

            if ($this->hasnotes !== '') {
                return false;
            }

            if ($this->editord !== '') {
                return false;
            }

            if ($this->error !== '') {
                return false;
            }

            if ($this->errormsg !== '') {
                return false;
            }

            if ($this->sconame !== '') {
                return false;
            }

            if ($this->shipname !== '') {
                return false;
            }

            if ($this->shipaddress !== '') {
                return false;
            }

            if ($this->shipaddress2 !== '') {
                return false;
            }

            if ($this->shipcity !== '') {
                return false;
            }

            if ($this->shipstate !== '') {
                return false;
            }

            if ($this->shipzip !== '') {
                return false;
            }

            if ($this->shipcountry !== '') {
                return false;
            }

            if ($this->contact !== '') {
                return false;
            }

            if ($this->phintl !== '') {
                return false;
            }

            if ($this->phone !== '') {
                return false;
            }

            if ($this->extension !== '') {
                return false;
            }

            if ($this->faxnbr !== '') {
                return false;
            }

            if ($this->email !== '') {
                return false;
            }

            if ($this->releasenbr !== '') {
                return false;
            }

            if ($this->shipviacd !== '') {
                return false;
            }

            if ($this->shipviadesc !== '') {
                return false;
            }

            if ($this->pricecode !== '') {
                return false;
            }

            if ($this->pricecodedesc !== '') {
                return false;
            }

            if ($this->pricedisp !== '') {
                return false;
            }

            if ($this->taxcode !== '') {
                return false;
            }

            if ($this->taxcodedesc !== '') {
                return false;
            }

            if ($this->taxcodedisp !== '') {
                return false;
            }

            if ($this->termcode !== '') {
                return false;
            }

            if ($this->termtype !== '') {
                return false;
            }

            if ($this->termcodedesc !== '') {
                return false;
            }

            if ($this->rqstdate !== '') {
                return false;
            }

            if ($this->shipcom !== '') {
                return false;
            }

            if ($this->sp1 !== '') {
                return false;
            }

            if ($this->sp1name !== '') {
                return false;
            }

            if ($this->sp2 !== '') {
                return false;
            }

            if ($this->sp2name !== '') {
                return false;
            }

            if ($this->sp2disp !== '') {
                return false;
            }

            if ($this->sp3 !== '') {
                return false;
            }

            if ($this->sp3name !== '') {
                return false;
            }

            if ($this->sp3disp !== '') {
                return false;
            }

            if ($this->fob !== '') {
                return false;
            }

            if ($this->deliverydesc !== '') {
                return false;
            }

            if ($this->whse !== '') {
                return false;
            }

            if ($this->cardnumber !== '') {
                return false;
            }

            if ($this->cardexpire !== '') {
                return false;
            }

            if ($this->cardcode !== '') {
                return false;
            }

            if ($this->cardapproval !== '') {
                return false;
            }

            if ($this->totalcost !== '') {
                return false;
            }

            if ($this->totaldiscount !== '') {
                return false;
            }

            if ($this->paymenttype !== '') {
                return false;
            }

            if ($this->srcdatefrom !== '') {
                return false;
            }

            if ($this->srcdatethru !== '') {
                return false;
            }

            if ($this->billname !== '') {
                return false;
            }

            if ($this->billaddress !== '') {
                return false;
            }

            if ($this->billaddress2 !== '') {
                return false;
            }

            if ($this->billaddress3 !== '') {
                return false;
            }

            if ($this->billcountry !== '') {
                return false;
            }

            if ($this->billcity !== '') {
                return false;
            }

            if ($this->billstate !== '') {
                return false;
            }

            if ($this->billzip !== '') {
                return false;
            }

            if ($this->prntfmt !== '') {
                return false;
            }

            if ($this->prntfmtdisp !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OrdrhedTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OrdrhedTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OrdrhedTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OrdrhedTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OrdrhedTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OrdrhedTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OrdrhedTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OrdrhedTableMap::translateFieldName('Custname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OrdrhedTableMap::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OrdrhedTableMap::translateFieldName('Custpo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custpo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OrdrhedTableMap::translateFieldName('Custref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OrdrhedTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OrdrhedTableMap::translateFieldName('Orderdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OrdrhedTableMap::translateFieldName('Careof', TableMap::TYPE_PHPNAME, $indexType)];
            $this->careof = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OrdrhedTableMap::translateFieldName('Quotdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quotdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OrdrhedTableMap::translateFieldName('Invdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OrdrhedTableMap::translateFieldName('Shipdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OrdrhedTableMap::translateFieldName('Revdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->revdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OrdrhedTableMap::translateFieldName('Expdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->expdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OrdrhedTableMap::translateFieldName('Hasdocuments', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasdocuments = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OrdrhedTableMap::translateFieldName('Hastracking', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hastracking = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OrdrhedTableMap::translateFieldName('Subtotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->subtotal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : OrdrhedTableMap::translateFieldName('Salestax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salestax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : OrdrhedTableMap::translateFieldName('Freight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : OrdrhedTableMap::translateFieldName('Misccost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->misccost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : OrdrhedTableMap::translateFieldName('Ordertotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordertotal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : OrdrhedTableMap::translateFieldName('Hasnotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hasnotes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : OrdrhedTableMap::translateFieldName('Editord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->editord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : OrdrhedTableMap::translateFieldName('Error', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : OrdrhedTableMap::translateFieldName('Errormsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->errormsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : OrdrhedTableMap::translateFieldName('Sconame', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sconame = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : OrdrhedTableMap::translateFieldName('Shipname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : OrdrhedTableMap::translateFieldName('Shipaddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipaddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : OrdrhedTableMap::translateFieldName('Shipaddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipaddress2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : OrdrhedTableMap::translateFieldName('Shipcity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipcity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : OrdrhedTableMap::translateFieldName('Shipstate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipstate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : OrdrhedTableMap::translateFieldName('Shipzip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipzip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : OrdrhedTableMap::translateFieldName('Shipcountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipcountry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : OrdrhedTableMap::translateFieldName('Contact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : OrdrhedTableMap::translateFieldName('Phintl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phintl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : OrdrhedTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : OrdrhedTableMap::translateFieldName('Extension', TableMap::TYPE_PHPNAME, $indexType)];
            $this->extension = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : OrdrhedTableMap::translateFieldName('Faxnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->faxnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : OrdrhedTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : OrdrhedTableMap::translateFieldName('Releasenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->releasenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : OrdrhedTableMap::translateFieldName('Shipviacd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipviacd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : OrdrhedTableMap::translateFieldName('Shipviadesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipviadesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : OrdrhedTableMap::translateFieldName('Pricecode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pricecode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : OrdrhedTableMap::translateFieldName('Pricecodedesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pricecodedesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : OrdrhedTableMap::translateFieldName('Pricedisp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pricedisp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : OrdrhedTableMap::translateFieldName('Taxcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : OrdrhedTableMap::translateFieldName('Taxcodedesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcodedesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : OrdrhedTableMap::translateFieldName('Taxcodedisp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcodedisp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : OrdrhedTableMap::translateFieldName('Termcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->termcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : OrdrhedTableMap::translateFieldName('Termtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->termtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : OrdrhedTableMap::translateFieldName('Termcodedesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->termcodedesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : OrdrhedTableMap::translateFieldName('Rqstdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rqstdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : OrdrhedTableMap::translateFieldName('Shipcom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipcom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : OrdrhedTableMap::translateFieldName('Sp1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : OrdrhedTableMap::translateFieldName('Sp1name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp1name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : OrdrhedTableMap::translateFieldName('Sp2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : OrdrhedTableMap::translateFieldName('Sp2name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp2name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : OrdrhedTableMap::translateFieldName('Sp2disp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp2disp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : OrdrhedTableMap::translateFieldName('Sp3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : OrdrhedTableMap::translateFieldName('Sp3name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp3name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 65 + $startcol : OrdrhedTableMap::translateFieldName('Sp3disp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp3disp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 66 + $startcol : OrdrhedTableMap::translateFieldName('Fob', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fob = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 67 + $startcol : OrdrhedTableMap::translateFieldName('Deliverydesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deliverydesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 68 + $startcol : OrdrhedTableMap::translateFieldName('Whse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 69 + $startcol : OrdrhedTableMap::translateFieldName('Cardnumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cardnumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 70 + $startcol : OrdrhedTableMap::translateFieldName('Cardexpire', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cardexpire = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 71 + $startcol : OrdrhedTableMap::translateFieldName('Cardcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cardcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 72 + $startcol : OrdrhedTableMap::translateFieldName('Cardapproval', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cardapproval = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 73 + $startcol : OrdrhedTableMap::translateFieldName('Totalcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 74 + $startcol : OrdrhedTableMap::translateFieldName('Totaldiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totaldiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 75 + $startcol : OrdrhedTableMap::translateFieldName('Paymenttype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paymenttype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 76 + $startcol : OrdrhedTableMap::translateFieldName('Srcdatefrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->srcdatefrom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 77 + $startcol : OrdrhedTableMap::translateFieldName('Srcdatethru', TableMap::TYPE_PHPNAME, $indexType)];
            $this->srcdatethru = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 78 + $startcol : OrdrhedTableMap::translateFieldName('Billname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 79 + $startcol : OrdrhedTableMap::translateFieldName('Billaddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billaddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 80 + $startcol : OrdrhedTableMap::translateFieldName('Billaddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billaddress2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 81 + $startcol : OrdrhedTableMap::translateFieldName('Billaddress3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billaddress3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 82 + $startcol : OrdrhedTableMap::translateFieldName('Billcountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billcountry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 83 + $startcol : OrdrhedTableMap::translateFieldName('Billcity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billcity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 84 + $startcol : OrdrhedTableMap::translateFieldName('Billstate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billstate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 85 + $startcol : OrdrhedTableMap::translateFieldName('Billzip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billzip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 86 + $startcol : OrdrhedTableMap::translateFieldName('Prntfmt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prntfmt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 87 + $startcol : OrdrhedTableMap::translateFieldName('Prntfmtdisp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prntfmtdisp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 88 + $startcol : OrdrhedTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 89; // 89 = OrdrhedTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Ordrhed'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OrdrhedTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOrdrhedQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Ordrhed::setDeleted()
     * @see Ordrhed::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrhedTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOrdrhedQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrhedTableMap::DATABASE_NAME);
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
                OrdrhedTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(OrdrhedTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'custname';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ORDERNO)) {
            $modifiedColumns[':p' . $index++]  = 'orderno';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTPO)) {
            $modifiedColumns[':p' . $index++]  = 'custpo';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTREF)) {
            $modifiedColumns[':p' . $index++]  = 'custref';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ORDERDATE)) {
            $modifiedColumns[':p' . $index++]  = 'orderdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CAREOF)) {
            $modifiedColumns[':p' . $index++]  = 'careof';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_QUOTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'quotdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_INVDATE)) {
            $modifiedColumns[':p' . $index++]  = 'invdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'shipdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_REVDATE)) {
            $modifiedColumns[':p' . $index++]  = 'revdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EXPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'expdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_HASDOCUMENTS)) {
            $modifiedColumns[':p' . $index++]  = 'hasdocuments';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_HASTRACKING)) {
            $modifiedColumns[':p' . $index++]  = 'hastracking';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SUBTOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'subtotal';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SALESTAX)) {
            $modifiedColumns[':p' . $index++]  = 'salestax';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'freight';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_MISCCOST)) {
            $modifiedColumns[':p' . $index++]  = 'misccost';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ORDERTOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'ordertotal';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_HASNOTES)) {
            $modifiedColumns[':p' . $index++]  = 'hasnotes';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EDITORD)) {
            $modifiedColumns[':p' . $index++]  = 'editord';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ERROR)) {
            $modifiedColumns[':p' . $index++]  = 'error';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ERRORMSG)) {
            $modifiedColumns[':p' . $index++]  = 'errormsg';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SCONAME)) {
            $modifiedColumns[':p' . $index++]  = 'sconame';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPNAME)) {
            $modifiedColumns[':p' . $index++]  = 'shipname';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'shipaddress';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'shipaddress2';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPCITY)) {
            $modifiedColumns[':p' . $index++]  = 'shipcity';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPSTATE)) {
            $modifiedColumns[':p' . $index++]  = 'shipstate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPZIP)) {
            $modifiedColumns[':p' . $index++]  = 'shipzip';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPCOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'shipcountry';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'contact';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PHINTL)) {
            $modifiedColumns[':p' . $index++]  = 'phintl';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EXTENSION)) {
            $modifiedColumns[':p' . $index++]  = 'extension';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_FAXNBR)) {
            $modifiedColumns[':p' . $index++]  = 'faxnbr';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_RELEASENBR)) {
            $modifiedColumns[':p' . $index++]  = 'releasenbr';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPVIACD)) {
            $modifiedColumns[':p' . $index++]  = 'shipviacd';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPVIADESC)) {
            $modifiedColumns[':p' . $index++]  = 'shipviadesc';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRICECODE)) {
            $modifiedColumns[':p' . $index++]  = 'pricecode';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRICECODEDESC)) {
            $modifiedColumns[':p' . $index++]  = 'pricecodedesc';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRICEDISP)) {
            $modifiedColumns[':p' . $index++]  = 'pricedisp';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TAXCODE)) {
            $modifiedColumns[':p' . $index++]  = 'taxcode';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TAXCODEDESC)) {
            $modifiedColumns[':p' . $index++]  = 'taxcodedesc';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TAXCODEDISP)) {
            $modifiedColumns[':p' . $index++]  = 'taxcodedisp';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TERMCODE)) {
            $modifiedColumns[':p' . $index++]  = 'termcode';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TERMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'termtype';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TERMCODEDESC)) {
            $modifiedColumns[':p' . $index++]  = 'termcodedesc';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_RQSTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rqstdate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPCOM)) {
            $modifiedColumns[':p' . $index++]  = 'shipcom';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP1)) {
            $modifiedColumns[':p' . $index++]  = 'sp1';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP1NAME)) {
            $modifiedColumns[':p' . $index++]  = 'sp1name';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP2)) {
            $modifiedColumns[':p' . $index++]  = 'sp2';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP2NAME)) {
            $modifiedColumns[':p' . $index++]  = 'sp2name';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP2DISP)) {
            $modifiedColumns[':p' . $index++]  = 'sp2disp';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP3)) {
            $modifiedColumns[':p' . $index++]  = 'sp3';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP3NAME)) {
            $modifiedColumns[':p' . $index++]  = 'sp3name';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP3DISP)) {
            $modifiedColumns[':p' . $index++]  = 'sp3disp';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_FOB)) {
            $modifiedColumns[':p' . $index++]  = 'fob';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_DELIVERYDESC)) {
            $modifiedColumns[':p' . $index++]  = 'deliverydesc';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_WHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whse';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'cardnumber';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDEXPIRE)) {
            $modifiedColumns[':p' . $index++]  = 'cardexpire';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDCODE)) {
            $modifiedColumns[':p' . $index++]  = 'cardcode';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDAPPROVAL)) {
            $modifiedColumns[':p' . $index++]  = 'cardapproval';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TOTALCOST)) {
            $modifiedColumns[':p' . $index++]  = 'totalcost';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TOTALDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'totaldiscount';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PAYMENTTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'paymenttype';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SRCDATEFROM)) {
            $modifiedColumns[':p' . $index++]  = 'srcdatefrom';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SRCDATETHRU)) {
            $modifiedColumns[':p' . $index++]  = 'srcdatethru';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLNAME)) {
            $modifiedColumns[':p' . $index++]  = 'billname';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'billaddress';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'billaddress2';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'billaddress3';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLCOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'billcountry';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLCITY)) {
            $modifiedColumns[':p' . $index++]  = 'billcity';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLSTATE)) {
            $modifiedColumns[':p' . $index++]  = 'billstate';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLZIP)) {
            $modifiedColumns[':p' . $index++]  = 'billzip';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRNTFMT)) {
            $modifiedColumns[':p' . $index++]  = 'prntfmt';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRNTFMTDISP)) {
            $modifiedColumns[':p' . $index++]  = 'prntfmtdisp';
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO ordrhed (%s) VALUES (%s)',
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
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);
                        break;
                    case 'custname':
                        $stmt->bindValue($identifier, $this->custname, PDO::PARAM_STR);
                        break;
                    case 'orderno':
                        $stmt->bindValue($identifier, $this->orderno, PDO::PARAM_STR);
                        break;
                    case 'custpo':
                        $stmt->bindValue($identifier, $this->custpo, PDO::PARAM_STR);
                        break;
                    case 'custref':
                        $stmt->bindValue($identifier, $this->custref, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'orderdate':
                        $stmt->bindValue($identifier, $this->orderdate, PDO::PARAM_STR);
                        break;
                    case 'careof':
                        $stmt->bindValue($identifier, $this->careof, PDO::PARAM_STR);
                        break;
                    case 'quotdate':
                        $stmt->bindValue($identifier, $this->quotdate, PDO::PARAM_STR);
                        break;
                    case 'invdate':
                        $stmt->bindValue($identifier, $this->invdate, PDO::PARAM_STR);
                        break;
                    case 'shipdate':
                        $stmt->bindValue($identifier, $this->shipdate, PDO::PARAM_STR);
                        break;
                    case 'revdate':
                        $stmt->bindValue($identifier, $this->revdate, PDO::PARAM_STR);
                        break;
                    case 'expdate':
                        $stmt->bindValue($identifier, $this->expdate, PDO::PARAM_STR);
                        break;
                    case 'hasdocuments':
                        $stmt->bindValue($identifier, $this->hasdocuments, PDO::PARAM_STR);
                        break;
                    case 'hastracking':
                        $stmt->bindValue($identifier, $this->hastracking, PDO::PARAM_STR);
                        break;
                    case 'subtotal':
                        $stmt->bindValue($identifier, $this->subtotal, PDO::PARAM_STR);
                        break;
                    case 'salestax':
                        $stmt->bindValue($identifier, $this->salestax, PDO::PARAM_STR);
                        break;
                    case 'freight':
                        $stmt->bindValue($identifier, $this->freight, PDO::PARAM_STR);
                        break;
                    case 'misccost':
                        $stmt->bindValue($identifier, $this->misccost, PDO::PARAM_STR);
                        break;
                    case 'ordertotal':
                        $stmt->bindValue($identifier, $this->ordertotal, PDO::PARAM_STR);
                        break;
                    case 'hasnotes':
                        $stmt->bindValue($identifier, $this->hasnotes, PDO::PARAM_STR);
                        break;
                    case 'editord':
                        $stmt->bindValue($identifier, $this->editord, PDO::PARAM_STR);
                        break;
                    case 'error':
                        $stmt->bindValue($identifier, $this->error, PDO::PARAM_STR);
                        break;
                    case 'errormsg':
                        $stmt->bindValue($identifier, $this->errormsg, PDO::PARAM_STR);
                        break;
                    case 'sconame':
                        $stmt->bindValue($identifier, $this->sconame, PDO::PARAM_STR);
                        break;
                    case 'shipname':
                        $stmt->bindValue($identifier, $this->shipname, PDO::PARAM_STR);
                        break;
                    case 'shipaddress':
                        $stmt->bindValue($identifier, $this->shipaddress, PDO::PARAM_STR);
                        break;
                    case 'shipaddress2':
                        $stmt->bindValue($identifier, $this->shipaddress2, PDO::PARAM_STR);
                        break;
                    case 'shipcity':
                        $stmt->bindValue($identifier, $this->shipcity, PDO::PARAM_STR);
                        break;
                    case 'shipstate':
                        $stmt->bindValue($identifier, $this->shipstate, PDO::PARAM_STR);
                        break;
                    case 'shipzip':
                        $stmt->bindValue($identifier, $this->shipzip, PDO::PARAM_STR);
                        break;
                    case 'shipcountry':
                        $stmt->bindValue($identifier, $this->shipcountry, PDO::PARAM_STR);
                        break;
                    case 'contact':
                        $stmt->bindValue($identifier, $this->contact, PDO::PARAM_STR);
                        break;
                    case 'phintl':
                        $stmt->bindValue($identifier, $this->phintl, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'extension':
                        $stmt->bindValue($identifier, $this->extension, PDO::PARAM_STR);
                        break;
                    case 'faxnbr':
                        $stmt->bindValue($identifier, $this->faxnbr, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'releasenbr':
                        $stmt->bindValue($identifier, $this->releasenbr, PDO::PARAM_STR);
                        break;
                    case 'shipviacd':
                        $stmt->bindValue($identifier, $this->shipviacd, PDO::PARAM_STR);
                        break;
                    case 'shipviadesc':
                        $stmt->bindValue($identifier, $this->shipviadesc, PDO::PARAM_STR);
                        break;
                    case 'pricecode':
                        $stmt->bindValue($identifier, $this->pricecode, PDO::PARAM_STR);
                        break;
                    case 'pricecodedesc':
                        $stmt->bindValue($identifier, $this->pricecodedesc, PDO::PARAM_STR);
                        break;
                    case 'pricedisp':
                        $stmt->bindValue($identifier, $this->pricedisp, PDO::PARAM_STR);
                        break;
                    case 'taxcode':
                        $stmt->bindValue($identifier, $this->taxcode, PDO::PARAM_STR);
                        break;
                    case 'taxcodedesc':
                        $stmt->bindValue($identifier, $this->taxcodedesc, PDO::PARAM_STR);
                        break;
                    case 'taxcodedisp':
                        $stmt->bindValue($identifier, $this->taxcodedisp, PDO::PARAM_STR);
                        break;
                    case 'termcode':
                        $stmt->bindValue($identifier, $this->termcode, PDO::PARAM_STR);
                        break;
                    case 'termtype':
                        $stmt->bindValue($identifier, $this->termtype, PDO::PARAM_STR);
                        break;
                    case 'termcodedesc':
                        $stmt->bindValue($identifier, $this->termcodedesc, PDO::PARAM_STR);
                        break;
                    case 'rqstdate':
                        $stmt->bindValue($identifier, $this->rqstdate, PDO::PARAM_STR);
                        break;
                    case 'shipcom':
                        $stmt->bindValue($identifier, $this->shipcom, PDO::PARAM_STR);
                        break;
                    case 'sp1':
                        $stmt->bindValue($identifier, $this->sp1, PDO::PARAM_STR);
                        break;
                    case 'sp1name':
                        $stmt->bindValue($identifier, $this->sp1name, PDO::PARAM_STR);
                        break;
                    case 'sp2':
                        $stmt->bindValue($identifier, $this->sp2, PDO::PARAM_STR);
                        break;
                    case 'sp2name':
                        $stmt->bindValue($identifier, $this->sp2name, PDO::PARAM_STR);
                        break;
                    case 'sp2disp':
                        $stmt->bindValue($identifier, $this->sp2disp, PDO::PARAM_STR);
                        break;
                    case 'sp3':
                        $stmt->bindValue($identifier, $this->sp3, PDO::PARAM_STR);
                        break;
                    case 'sp3name':
                        $stmt->bindValue($identifier, $this->sp3name, PDO::PARAM_STR);
                        break;
                    case 'sp3disp':
                        $stmt->bindValue($identifier, $this->sp3disp, PDO::PARAM_STR);
                        break;
                    case 'fob':
                        $stmt->bindValue($identifier, $this->fob, PDO::PARAM_STR);
                        break;
                    case 'deliverydesc':
                        $stmt->bindValue($identifier, $this->deliverydesc, PDO::PARAM_STR);
                        break;
                    case 'whse':
                        $stmt->bindValue($identifier, $this->whse, PDO::PARAM_STR);
                        break;
                    case 'cardnumber':
                        $stmt->bindValue($identifier, $this->cardnumber, PDO::PARAM_STR);
                        break;
                    case 'cardexpire':
                        $stmt->bindValue($identifier, $this->cardexpire, PDO::PARAM_STR);
                        break;
                    case 'cardcode':
                        $stmt->bindValue($identifier, $this->cardcode, PDO::PARAM_STR);
                        break;
                    case 'cardapproval':
                        $stmt->bindValue($identifier, $this->cardapproval, PDO::PARAM_STR);
                        break;
                    case 'totalcost':
                        $stmt->bindValue($identifier, $this->totalcost, PDO::PARAM_STR);
                        break;
                    case 'totaldiscount':
                        $stmt->bindValue($identifier, $this->totaldiscount, PDO::PARAM_STR);
                        break;
                    case 'paymenttype':
                        $stmt->bindValue($identifier, $this->paymenttype, PDO::PARAM_STR);
                        break;
                    case 'srcdatefrom':
                        $stmt->bindValue($identifier, $this->srcdatefrom, PDO::PARAM_STR);
                        break;
                    case 'srcdatethru':
                        $stmt->bindValue($identifier, $this->srcdatethru, PDO::PARAM_STR);
                        break;
                    case 'billname':
                        $stmt->bindValue($identifier, $this->billname, PDO::PARAM_STR);
                        break;
                    case 'billaddress':
                        $stmt->bindValue($identifier, $this->billaddress, PDO::PARAM_STR);
                        break;
                    case 'billaddress2':
                        $stmt->bindValue($identifier, $this->billaddress2, PDO::PARAM_STR);
                        break;
                    case 'billaddress3':
                        $stmt->bindValue($identifier, $this->billaddress3, PDO::PARAM_STR);
                        break;
                    case 'billcountry':
                        $stmt->bindValue($identifier, $this->billcountry, PDO::PARAM_STR);
                        break;
                    case 'billcity':
                        $stmt->bindValue($identifier, $this->billcity, PDO::PARAM_STR);
                        break;
                    case 'billstate':
                        $stmt->bindValue($identifier, $this->billstate, PDO::PARAM_STR);
                        break;
                    case 'billzip':
                        $stmt->bindValue($identifier, $this->billzip, PDO::PARAM_STR);
                        break;
                    case 'prntfmt':
                        $stmt->bindValue($identifier, $this->prntfmt, PDO::PARAM_STR);
                        break;
                    case 'prntfmtdisp':
                        $stmt->bindValue($identifier, $this->prntfmtdisp, PDO::PARAM_STR);
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
        $pos = OrdrhedTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCustid();
                break;
            case 6:
                return $this->getShiptoid();
                break;
            case 7:
                return $this->getCustname();
                break;
            case 8:
                return $this->getOrderno();
                break;
            case 9:
                return $this->getCustpo();
                break;
            case 10:
                return $this->getCustref();
                break;
            case 11:
                return $this->getStatus();
                break;
            case 12:
                return $this->getOrderdate();
                break;
            case 13:
                return $this->getCareof();
                break;
            case 14:
                return $this->getQuotdate();
                break;
            case 15:
                return $this->getInvdate();
                break;
            case 16:
                return $this->getShipdate();
                break;
            case 17:
                return $this->getRevdate();
                break;
            case 18:
                return $this->getExpdate();
                break;
            case 19:
                return $this->getHasdocuments();
                break;
            case 20:
                return $this->getHastracking();
                break;
            case 21:
                return $this->getSubtotal();
                break;
            case 22:
                return $this->getSalestax();
                break;
            case 23:
                return $this->getFreight();
                break;
            case 24:
                return $this->getMisccost();
                break;
            case 25:
                return $this->getOrdertotal();
                break;
            case 26:
                return $this->getHasnotes();
                break;
            case 27:
                return $this->getEditord();
                break;
            case 28:
                return $this->getError();
                break;
            case 29:
                return $this->getErrormsg();
                break;
            case 30:
                return $this->getSconame();
                break;
            case 31:
                return $this->getShipname();
                break;
            case 32:
                return $this->getShipaddress();
                break;
            case 33:
                return $this->getShipaddress2();
                break;
            case 34:
                return $this->getShipcity();
                break;
            case 35:
                return $this->getShipstate();
                break;
            case 36:
                return $this->getShipzip();
                break;
            case 37:
                return $this->getShipcountry();
                break;
            case 38:
                return $this->getContact();
                break;
            case 39:
                return $this->getPhintl();
                break;
            case 40:
                return $this->getPhone();
                break;
            case 41:
                return $this->getExtension();
                break;
            case 42:
                return $this->getFaxnbr();
                break;
            case 43:
                return $this->getEmail();
                break;
            case 44:
                return $this->getReleasenbr();
                break;
            case 45:
                return $this->getShipviacd();
                break;
            case 46:
                return $this->getShipviadesc();
                break;
            case 47:
                return $this->getPricecode();
                break;
            case 48:
                return $this->getPricecodedesc();
                break;
            case 49:
                return $this->getPricedisp();
                break;
            case 50:
                return $this->getTaxcode();
                break;
            case 51:
                return $this->getTaxcodedesc();
                break;
            case 52:
                return $this->getTaxcodedisp();
                break;
            case 53:
                return $this->getTermcode();
                break;
            case 54:
                return $this->getTermtype();
                break;
            case 55:
                return $this->getTermcodedesc();
                break;
            case 56:
                return $this->getRqstdate();
                break;
            case 57:
                return $this->getShipcom();
                break;
            case 58:
                return $this->getSp1();
                break;
            case 59:
                return $this->getSp1name();
                break;
            case 60:
                return $this->getSp2();
                break;
            case 61:
                return $this->getSp2name();
                break;
            case 62:
                return $this->getSp2disp();
                break;
            case 63:
                return $this->getSp3();
                break;
            case 64:
                return $this->getSp3name();
                break;
            case 65:
                return $this->getSp3disp();
                break;
            case 66:
                return $this->getFob();
                break;
            case 67:
                return $this->getDeliverydesc();
                break;
            case 68:
                return $this->getWhse();
                break;
            case 69:
                return $this->getCardnumber();
                break;
            case 70:
                return $this->getCardexpire();
                break;
            case 71:
                return $this->getCardcode();
                break;
            case 72:
                return $this->getCardapproval();
                break;
            case 73:
                return $this->getTotalcost();
                break;
            case 74:
                return $this->getTotaldiscount();
                break;
            case 75:
                return $this->getPaymenttype();
                break;
            case 76:
                return $this->getSrcdatefrom();
                break;
            case 77:
                return $this->getSrcdatethru();
                break;
            case 78:
                return $this->getBillname();
                break;
            case 79:
                return $this->getBilladdress();
                break;
            case 80:
                return $this->getBilladdress2();
                break;
            case 81:
                return $this->getBilladdress3();
                break;
            case 82:
                return $this->getBillcountry();
                break;
            case 83:
                return $this->getBillcity();
                break;
            case 84:
                return $this->getBillstate();
                break;
            case 85:
                return $this->getBillzip();
                break;
            case 86:
                return $this->getPrntfmt();
                break;
            case 87:
                return $this->getPrntfmtdisp();
                break;
            case 88:
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

        if (isset($alreadyDumpedObjects['Ordrhed'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Ordrhed'][$this->hashCode()] = true;
        $keys = OrdrhedTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getType(),
            $keys[5] => $this->getCustid(),
            $keys[6] => $this->getShiptoid(),
            $keys[7] => $this->getCustname(),
            $keys[8] => $this->getOrderno(),
            $keys[9] => $this->getCustpo(),
            $keys[10] => $this->getCustref(),
            $keys[11] => $this->getStatus(),
            $keys[12] => $this->getOrderdate(),
            $keys[13] => $this->getCareof(),
            $keys[14] => $this->getQuotdate(),
            $keys[15] => $this->getInvdate(),
            $keys[16] => $this->getShipdate(),
            $keys[17] => $this->getRevdate(),
            $keys[18] => $this->getExpdate(),
            $keys[19] => $this->getHasdocuments(),
            $keys[20] => $this->getHastracking(),
            $keys[21] => $this->getSubtotal(),
            $keys[22] => $this->getSalestax(),
            $keys[23] => $this->getFreight(),
            $keys[24] => $this->getMisccost(),
            $keys[25] => $this->getOrdertotal(),
            $keys[26] => $this->getHasnotes(),
            $keys[27] => $this->getEditord(),
            $keys[28] => $this->getError(),
            $keys[29] => $this->getErrormsg(),
            $keys[30] => $this->getSconame(),
            $keys[31] => $this->getShipname(),
            $keys[32] => $this->getShipaddress(),
            $keys[33] => $this->getShipaddress2(),
            $keys[34] => $this->getShipcity(),
            $keys[35] => $this->getShipstate(),
            $keys[36] => $this->getShipzip(),
            $keys[37] => $this->getShipcountry(),
            $keys[38] => $this->getContact(),
            $keys[39] => $this->getPhintl(),
            $keys[40] => $this->getPhone(),
            $keys[41] => $this->getExtension(),
            $keys[42] => $this->getFaxnbr(),
            $keys[43] => $this->getEmail(),
            $keys[44] => $this->getReleasenbr(),
            $keys[45] => $this->getShipviacd(),
            $keys[46] => $this->getShipviadesc(),
            $keys[47] => $this->getPricecode(),
            $keys[48] => $this->getPricecodedesc(),
            $keys[49] => $this->getPricedisp(),
            $keys[50] => $this->getTaxcode(),
            $keys[51] => $this->getTaxcodedesc(),
            $keys[52] => $this->getTaxcodedisp(),
            $keys[53] => $this->getTermcode(),
            $keys[54] => $this->getTermtype(),
            $keys[55] => $this->getTermcodedesc(),
            $keys[56] => $this->getRqstdate(),
            $keys[57] => $this->getShipcom(),
            $keys[58] => $this->getSp1(),
            $keys[59] => $this->getSp1name(),
            $keys[60] => $this->getSp2(),
            $keys[61] => $this->getSp2name(),
            $keys[62] => $this->getSp2disp(),
            $keys[63] => $this->getSp3(),
            $keys[64] => $this->getSp3name(),
            $keys[65] => $this->getSp3disp(),
            $keys[66] => $this->getFob(),
            $keys[67] => $this->getDeliverydesc(),
            $keys[68] => $this->getWhse(),
            $keys[69] => $this->getCardnumber(),
            $keys[70] => $this->getCardexpire(),
            $keys[71] => $this->getCardcode(),
            $keys[72] => $this->getCardapproval(),
            $keys[73] => $this->getTotalcost(),
            $keys[74] => $this->getTotaldiscount(),
            $keys[75] => $this->getPaymenttype(),
            $keys[76] => $this->getSrcdatefrom(),
            $keys[77] => $this->getSrcdatethru(),
            $keys[78] => $this->getBillname(),
            $keys[79] => $this->getBilladdress(),
            $keys[80] => $this->getBilladdress2(),
            $keys[81] => $this->getBilladdress3(),
            $keys[82] => $this->getBillcountry(),
            $keys[83] => $this->getBillcity(),
            $keys[84] => $this->getBillstate(),
            $keys[85] => $this->getBillzip(),
            $keys[86] => $this->getPrntfmt(),
            $keys[87] => $this->getPrntfmtdisp(),
            $keys[88] => $this->getDummy(),
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
     * @return $this|\Ordrhed
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OrdrhedTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Ordrhed
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
                $this->setCustid($value);
                break;
            case 6:
                $this->setShiptoid($value);
                break;
            case 7:
                $this->setCustname($value);
                break;
            case 8:
                $this->setOrderno($value);
                break;
            case 9:
                $this->setCustpo($value);
                break;
            case 10:
                $this->setCustref($value);
                break;
            case 11:
                $this->setStatus($value);
                break;
            case 12:
                $this->setOrderdate($value);
                break;
            case 13:
                $this->setCareof($value);
                break;
            case 14:
                $this->setQuotdate($value);
                break;
            case 15:
                $this->setInvdate($value);
                break;
            case 16:
                $this->setShipdate($value);
                break;
            case 17:
                $this->setRevdate($value);
                break;
            case 18:
                $this->setExpdate($value);
                break;
            case 19:
                $this->setHasdocuments($value);
                break;
            case 20:
                $this->setHastracking($value);
                break;
            case 21:
                $this->setSubtotal($value);
                break;
            case 22:
                $this->setSalestax($value);
                break;
            case 23:
                $this->setFreight($value);
                break;
            case 24:
                $this->setMisccost($value);
                break;
            case 25:
                $this->setOrdertotal($value);
                break;
            case 26:
                $this->setHasnotes($value);
                break;
            case 27:
                $this->setEditord($value);
                break;
            case 28:
                $this->setError($value);
                break;
            case 29:
                $this->setErrormsg($value);
                break;
            case 30:
                $this->setSconame($value);
                break;
            case 31:
                $this->setShipname($value);
                break;
            case 32:
                $this->setShipaddress($value);
                break;
            case 33:
                $this->setShipaddress2($value);
                break;
            case 34:
                $this->setShipcity($value);
                break;
            case 35:
                $this->setShipstate($value);
                break;
            case 36:
                $this->setShipzip($value);
                break;
            case 37:
                $this->setShipcountry($value);
                break;
            case 38:
                $this->setContact($value);
                break;
            case 39:
                $this->setPhintl($value);
                break;
            case 40:
                $this->setPhone($value);
                break;
            case 41:
                $this->setExtension($value);
                break;
            case 42:
                $this->setFaxnbr($value);
                break;
            case 43:
                $this->setEmail($value);
                break;
            case 44:
                $this->setReleasenbr($value);
                break;
            case 45:
                $this->setShipviacd($value);
                break;
            case 46:
                $this->setShipviadesc($value);
                break;
            case 47:
                $this->setPricecode($value);
                break;
            case 48:
                $this->setPricecodedesc($value);
                break;
            case 49:
                $this->setPricedisp($value);
                break;
            case 50:
                $this->setTaxcode($value);
                break;
            case 51:
                $this->setTaxcodedesc($value);
                break;
            case 52:
                $this->setTaxcodedisp($value);
                break;
            case 53:
                $this->setTermcode($value);
                break;
            case 54:
                $this->setTermtype($value);
                break;
            case 55:
                $this->setTermcodedesc($value);
                break;
            case 56:
                $this->setRqstdate($value);
                break;
            case 57:
                $this->setShipcom($value);
                break;
            case 58:
                $this->setSp1($value);
                break;
            case 59:
                $this->setSp1name($value);
                break;
            case 60:
                $this->setSp2($value);
                break;
            case 61:
                $this->setSp2name($value);
                break;
            case 62:
                $this->setSp2disp($value);
                break;
            case 63:
                $this->setSp3($value);
                break;
            case 64:
                $this->setSp3name($value);
                break;
            case 65:
                $this->setSp3disp($value);
                break;
            case 66:
                $this->setFob($value);
                break;
            case 67:
                $this->setDeliverydesc($value);
                break;
            case 68:
                $this->setWhse($value);
                break;
            case 69:
                $this->setCardnumber($value);
                break;
            case 70:
                $this->setCardexpire($value);
                break;
            case 71:
                $this->setCardcode($value);
                break;
            case 72:
                $this->setCardapproval($value);
                break;
            case 73:
                $this->setTotalcost($value);
                break;
            case 74:
                $this->setTotaldiscount($value);
                break;
            case 75:
                $this->setPaymenttype($value);
                break;
            case 76:
                $this->setSrcdatefrom($value);
                break;
            case 77:
                $this->setSrcdatethru($value);
                break;
            case 78:
                $this->setBillname($value);
                break;
            case 79:
                $this->setBilladdress($value);
                break;
            case 80:
                $this->setBilladdress2($value);
                break;
            case 81:
                $this->setBilladdress3($value);
                break;
            case 82:
                $this->setBillcountry($value);
                break;
            case 83:
                $this->setBillcity($value);
                break;
            case 84:
                $this->setBillstate($value);
                break;
            case 85:
                $this->setBillzip($value);
                break;
            case 86:
                $this->setPrntfmt($value);
                break;
            case 87:
                $this->setPrntfmtdisp($value);
                break;
            case 88:
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
        $keys = OrdrhedTableMap::getFieldNames($keyType);

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
            $this->setCustid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setShiptoid($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCustname($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setOrderno($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCustpo($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCustref($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setStatus($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setOrderdate($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCareof($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setQuotdate($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setInvdate($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setShipdate($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setRevdate($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setExpdate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setHasdocuments($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setHastracking($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSubtotal($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setSalestax($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setFreight($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setMisccost($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setOrdertotal($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setHasnotes($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setEditord($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setError($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setErrormsg($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setSconame($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setShipname($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setShipaddress($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setShipaddress2($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setShipcity($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setShipstate($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setShipzip($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setShipcountry($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setContact($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setPhintl($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setPhone($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setExtension($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setFaxnbr($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setEmail($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setReleasenbr($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setShipviacd($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setShipviadesc($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setPricecode($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setPricecodedesc($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setPricedisp($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setTaxcode($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setTaxcodedesc($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setTaxcodedisp($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setTermcode($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setTermtype($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setTermcodedesc($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setRqstdate($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setShipcom($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setSp1($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setSp1name($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setSp2($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setSp2name($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setSp2disp($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setSp3($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setSp3name($arr[$keys[64]]);
        }
        if (array_key_exists($keys[65], $arr)) {
            $this->setSp3disp($arr[$keys[65]]);
        }
        if (array_key_exists($keys[66], $arr)) {
            $this->setFob($arr[$keys[66]]);
        }
        if (array_key_exists($keys[67], $arr)) {
            $this->setDeliverydesc($arr[$keys[67]]);
        }
        if (array_key_exists($keys[68], $arr)) {
            $this->setWhse($arr[$keys[68]]);
        }
        if (array_key_exists($keys[69], $arr)) {
            $this->setCardnumber($arr[$keys[69]]);
        }
        if (array_key_exists($keys[70], $arr)) {
            $this->setCardexpire($arr[$keys[70]]);
        }
        if (array_key_exists($keys[71], $arr)) {
            $this->setCardcode($arr[$keys[71]]);
        }
        if (array_key_exists($keys[72], $arr)) {
            $this->setCardapproval($arr[$keys[72]]);
        }
        if (array_key_exists($keys[73], $arr)) {
            $this->setTotalcost($arr[$keys[73]]);
        }
        if (array_key_exists($keys[74], $arr)) {
            $this->setTotaldiscount($arr[$keys[74]]);
        }
        if (array_key_exists($keys[75], $arr)) {
            $this->setPaymenttype($arr[$keys[75]]);
        }
        if (array_key_exists($keys[76], $arr)) {
            $this->setSrcdatefrom($arr[$keys[76]]);
        }
        if (array_key_exists($keys[77], $arr)) {
            $this->setSrcdatethru($arr[$keys[77]]);
        }
        if (array_key_exists($keys[78], $arr)) {
            $this->setBillname($arr[$keys[78]]);
        }
        if (array_key_exists($keys[79], $arr)) {
            $this->setBilladdress($arr[$keys[79]]);
        }
        if (array_key_exists($keys[80], $arr)) {
            $this->setBilladdress2($arr[$keys[80]]);
        }
        if (array_key_exists($keys[81], $arr)) {
            $this->setBilladdress3($arr[$keys[81]]);
        }
        if (array_key_exists($keys[82], $arr)) {
            $this->setBillcountry($arr[$keys[82]]);
        }
        if (array_key_exists($keys[83], $arr)) {
            $this->setBillcity($arr[$keys[83]]);
        }
        if (array_key_exists($keys[84], $arr)) {
            $this->setBillstate($arr[$keys[84]]);
        }
        if (array_key_exists($keys[85], $arr)) {
            $this->setBillzip($arr[$keys[85]]);
        }
        if (array_key_exists($keys[86], $arr)) {
            $this->setPrntfmt($arr[$keys[86]]);
        }
        if (array_key_exists($keys[87], $arr)) {
            $this->setPrntfmtdisp($arr[$keys[87]]);
        }
        if (array_key_exists($keys[88], $arr)) {
            $this->setDummy($arr[$keys[88]]);
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
     * @return $this|\Ordrhed The current object, for fluid interface
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
        $criteria = new Criteria(OrdrhedTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OrdrhedTableMap::COL_SESSIONID)) {
            $criteria->add(OrdrhedTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_RECNO)) {
            $criteria->add(OrdrhedTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_DATE)) {
            $criteria->add(OrdrhedTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TIME)) {
            $criteria->add(OrdrhedTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TYPE)) {
            $criteria->add(OrdrhedTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTID)) {
            $criteria->add(OrdrhedTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPTOID)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTNAME)) {
            $criteria->add(OrdrhedTableMap::COL_CUSTNAME, $this->custname);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ORDERNO)) {
            $criteria->add(OrdrhedTableMap::COL_ORDERNO, $this->orderno);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTPO)) {
            $criteria->add(OrdrhedTableMap::COL_CUSTPO, $this->custpo);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CUSTREF)) {
            $criteria->add(OrdrhedTableMap::COL_CUSTREF, $this->custref);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_STATUS)) {
            $criteria->add(OrdrhedTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ORDERDATE)) {
            $criteria->add(OrdrhedTableMap::COL_ORDERDATE, $this->orderdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CAREOF)) {
            $criteria->add(OrdrhedTableMap::COL_CAREOF, $this->careof);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_QUOTDATE)) {
            $criteria->add(OrdrhedTableMap::COL_QUOTDATE, $this->quotdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_INVDATE)) {
            $criteria->add(OrdrhedTableMap::COL_INVDATE, $this->invdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPDATE)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPDATE, $this->shipdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_REVDATE)) {
            $criteria->add(OrdrhedTableMap::COL_REVDATE, $this->revdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EXPDATE)) {
            $criteria->add(OrdrhedTableMap::COL_EXPDATE, $this->expdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_HASDOCUMENTS)) {
            $criteria->add(OrdrhedTableMap::COL_HASDOCUMENTS, $this->hasdocuments);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_HASTRACKING)) {
            $criteria->add(OrdrhedTableMap::COL_HASTRACKING, $this->hastracking);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SUBTOTAL)) {
            $criteria->add(OrdrhedTableMap::COL_SUBTOTAL, $this->subtotal);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SALESTAX)) {
            $criteria->add(OrdrhedTableMap::COL_SALESTAX, $this->salestax);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_FREIGHT)) {
            $criteria->add(OrdrhedTableMap::COL_FREIGHT, $this->freight);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_MISCCOST)) {
            $criteria->add(OrdrhedTableMap::COL_MISCCOST, $this->misccost);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ORDERTOTAL)) {
            $criteria->add(OrdrhedTableMap::COL_ORDERTOTAL, $this->ordertotal);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_HASNOTES)) {
            $criteria->add(OrdrhedTableMap::COL_HASNOTES, $this->hasnotes);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EDITORD)) {
            $criteria->add(OrdrhedTableMap::COL_EDITORD, $this->editord);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ERROR)) {
            $criteria->add(OrdrhedTableMap::COL_ERROR, $this->error);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_ERRORMSG)) {
            $criteria->add(OrdrhedTableMap::COL_ERRORMSG, $this->errormsg);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SCONAME)) {
            $criteria->add(OrdrhedTableMap::COL_SCONAME, $this->sconame);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPNAME)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPNAME, $this->shipname);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPADDRESS)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPADDRESS, $this->shipaddress);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPADDRESS2)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPADDRESS2, $this->shipaddress2);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPCITY)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPCITY, $this->shipcity);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPSTATE)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPSTATE, $this->shipstate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPZIP)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPZIP, $this->shipzip);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPCOUNTRY)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPCOUNTRY, $this->shipcountry);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CONTACT)) {
            $criteria->add(OrdrhedTableMap::COL_CONTACT, $this->contact);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PHINTL)) {
            $criteria->add(OrdrhedTableMap::COL_PHINTL, $this->phintl);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PHONE)) {
            $criteria->add(OrdrhedTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EXTENSION)) {
            $criteria->add(OrdrhedTableMap::COL_EXTENSION, $this->extension);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_FAXNBR)) {
            $criteria->add(OrdrhedTableMap::COL_FAXNBR, $this->faxnbr);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_EMAIL)) {
            $criteria->add(OrdrhedTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_RELEASENBR)) {
            $criteria->add(OrdrhedTableMap::COL_RELEASENBR, $this->releasenbr);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPVIACD)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPVIACD, $this->shipviacd);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPVIADESC)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPVIADESC, $this->shipviadesc);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRICECODE)) {
            $criteria->add(OrdrhedTableMap::COL_PRICECODE, $this->pricecode);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRICECODEDESC)) {
            $criteria->add(OrdrhedTableMap::COL_PRICECODEDESC, $this->pricecodedesc);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRICEDISP)) {
            $criteria->add(OrdrhedTableMap::COL_PRICEDISP, $this->pricedisp);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TAXCODE)) {
            $criteria->add(OrdrhedTableMap::COL_TAXCODE, $this->taxcode);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TAXCODEDESC)) {
            $criteria->add(OrdrhedTableMap::COL_TAXCODEDESC, $this->taxcodedesc);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TAXCODEDISP)) {
            $criteria->add(OrdrhedTableMap::COL_TAXCODEDISP, $this->taxcodedisp);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TERMCODE)) {
            $criteria->add(OrdrhedTableMap::COL_TERMCODE, $this->termcode);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TERMTYPE)) {
            $criteria->add(OrdrhedTableMap::COL_TERMTYPE, $this->termtype);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TERMCODEDESC)) {
            $criteria->add(OrdrhedTableMap::COL_TERMCODEDESC, $this->termcodedesc);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_RQSTDATE)) {
            $criteria->add(OrdrhedTableMap::COL_RQSTDATE, $this->rqstdate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SHIPCOM)) {
            $criteria->add(OrdrhedTableMap::COL_SHIPCOM, $this->shipcom);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP1)) {
            $criteria->add(OrdrhedTableMap::COL_SP1, $this->sp1);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP1NAME)) {
            $criteria->add(OrdrhedTableMap::COL_SP1NAME, $this->sp1name);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP2)) {
            $criteria->add(OrdrhedTableMap::COL_SP2, $this->sp2);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP2NAME)) {
            $criteria->add(OrdrhedTableMap::COL_SP2NAME, $this->sp2name);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP2DISP)) {
            $criteria->add(OrdrhedTableMap::COL_SP2DISP, $this->sp2disp);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP3)) {
            $criteria->add(OrdrhedTableMap::COL_SP3, $this->sp3);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP3NAME)) {
            $criteria->add(OrdrhedTableMap::COL_SP3NAME, $this->sp3name);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SP3DISP)) {
            $criteria->add(OrdrhedTableMap::COL_SP3DISP, $this->sp3disp);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_FOB)) {
            $criteria->add(OrdrhedTableMap::COL_FOB, $this->fob);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_DELIVERYDESC)) {
            $criteria->add(OrdrhedTableMap::COL_DELIVERYDESC, $this->deliverydesc);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_WHSE)) {
            $criteria->add(OrdrhedTableMap::COL_WHSE, $this->whse);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDNUMBER)) {
            $criteria->add(OrdrhedTableMap::COL_CARDNUMBER, $this->cardnumber);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDEXPIRE)) {
            $criteria->add(OrdrhedTableMap::COL_CARDEXPIRE, $this->cardexpire);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDCODE)) {
            $criteria->add(OrdrhedTableMap::COL_CARDCODE, $this->cardcode);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_CARDAPPROVAL)) {
            $criteria->add(OrdrhedTableMap::COL_CARDAPPROVAL, $this->cardapproval);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TOTALCOST)) {
            $criteria->add(OrdrhedTableMap::COL_TOTALCOST, $this->totalcost);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_TOTALDISCOUNT)) {
            $criteria->add(OrdrhedTableMap::COL_TOTALDISCOUNT, $this->totaldiscount);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PAYMENTTYPE)) {
            $criteria->add(OrdrhedTableMap::COL_PAYMENTTYPE, $this->paymenttype);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SRCDATEFROM)) {
            $criteria->add(OrdrhedTableMap::COL_SRCDATEFROM, $this->srcdatefrom);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_SRCDATETHRU)) {
            $criteria->add(OrdrhedTableMap::COL_SRCDATETHRU, $this->srcdatethru);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLNAME)) {
            $criteria->add(OrdrhedTableMap::COL_BILLNAME, $this->billname);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLADDRESS)) {
            $criteria->add(OrdrhedTableMap::COL_BILLADDRESS, $this->billaddress);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLADDRESS2)) {
            $criteria->add(OrdrhedTableMap::COL_BILLADDRESS2, $this->billaddress2);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLADDRESS3)) {
            $criteria->add(OrdrhedTableMap::COL_BILLADDRESS3, $this->billaddress3);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLCOUNTRY)) {
            $criteria->add(OrdrhedTableMap::COL_BILLCOUNTRY, $this->billcountry);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLCITY)) {
            $criteria->add(OrdrhedTableMap::COL_BILLCITY, $this->billcity);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLSTATE)) {
            $criteria->add(OrdrhedTableMap::COL_BILLSTATE, $this->billstate);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_BILLZIP)) {
            $criteria->add(OrdrhedTableMap::COL_BILLZIP, $this->billzip);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRNTFMT)) {
            $criteria->add(OrdrhedTableMap::COL_PRNTFMT, $this->prntfmt);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_PRNTFMTDISP)) {
            $criteria->add(OrdrhedTableMap::COL_PRNTFMTDISP, $this->prntfmtdisp);
        }
        if ($this->isColumnModified(OrdrhedTableMap::COL_DUMMY)) {
            $criteria->add(OrdrhedTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildOrdrhedQuery::create();
        $criteria->add(OrdrhedTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(OrdrhedTableMap::COL_RECNO, $this->recno);
        $criteria->add(OrdrhedTableMap::COL_ORDERNO, $this->orderno);

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
     * @param      object $copyObj An object of \Ordrhed (or compatible) type.
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
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setCustname($this->getCustname());
        $copyObj->setOrderno($this->getOrderno());
        $copyObj->setCustpo($this->getCustpo());
        $copyObj->setCustref($this->getCustref());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setOrderdate($this->getOrderdate());
        $copyObj->setCareof($this->getCareof());
        $copyObj->setQuotdate($this->getQuotdate());
        $copyObj->setInvdate($this->getInvdate());
        $copyObj->setShipdate($this->getShipdate());
        $copyObj->setRevdate($this->getRevdate());
        $copyObj->setExpdate($this->getExpdate());
        $copyObj->setHasdocuments($this->getHasdocuments());
        $copyObj->setHastracking($this->getHastracking());
        $copyObj->setSubtotal($this->getSubtotal());
        $copyObj->setSalestax($this->getSalestax());
        $copyObj->setFreight($this->getFreight());
        $copyObj->setMisccost($this->getMisccost());
        $copyObj->setOrdertotal($this->getOrdertotal());
        $copyObj->setHasnotes($this->getHasnotes());
        $copyObj->setEditord($this->getEditord());
        $copyObj->setError($this->getError());
        $copyObj->setErrormsg($this->getErrormsg());
        $copyObj->setSconame($this->getSconame());
        $copyObj->setShipname($this->getShipname());
        $copyObj->setShipaddress($this->getShipaddress());
        $copyObj->setShipaddress2($this->getShipaddress2());
        $copyObj->setShipcity($this->getShipcity());
        $copyObj->setShipstate($this->getShipstate());
        $copyObj->setShipzip($this->getShipzip());
        $copyObj->setShipcountry($this->getShipcountry());
        $copyObj->setContact($this->getContact());
        $copyObj->setPhintl($this->getPhintl());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setExtension($this->getExtension());
        $copyObj->setFaxnbr($this->getFaxnbr());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setReleasenbr($this->getReleasenbr());
        $copyObj->setShipviacd($this->getShipviacd());
        $copyObj->setShipviadesc($this->getShipviadesc());
        $copyObj->setPricecode($this->getPricecode());
        $copyObj->setPricecodedesc($this->getPricecodedesc());
        $copyObj->setPricedisp($this->getPricedisp());
        $copyObj->setTaxcode($this->getTaxcode());
        $copyObj->setTaxcodedesc($this->getTaxcodedesc());
        $copyObj->setTaxcodedisp($this->getTaxcodedisp());
        $copyObj->setTermcode($this->getTermcode());
        $copyObj->setTermtype($this->getTermtype());
        $copyObj->setTermcodedesc($this->getTermcodedesc());
        $copyObj->setRqstdate($this->getRqstdate());
        $copyObj->setShipcom($this->getShipcom());
        $copyObj->setSp1($this->getSp1());
        $copyObj->setSp1name($this->getSp1name());
        $copyObj->setSp2($this->getSp2());
        $copyObj->setSp2name($this->getSp2name());
        $copyObj->setSp2disp($this->getSp2disp());
        $copyObj->setSp3($this->getSp3());
        $copyObj->setSp3name($this->getSp3name());
        $copyObj->setSp3disp($this->getSp3disp());
        $copyObj->setFob($this->getFob());
        $copyObj->setDeliverydesc($this->getDeliverydesc());
        $copyObj->setWhse($this->getWhse());
        $copyObj->setCardnumber($this->getCardnumber());
        $copyObj->setCardexpire($this->getCardexpire());
        $copyObj->setCardcode($this->getCardcode());
        $copyObj->setCardapproval($this->getCardapproval());
        $copyObj->setTotalcost($this->getTotalcost());
        $copyObj->setTotaldiscount($this->getTotaldiscount());
        $copyObj->setPaymenttype($this->getPaymenttype());
        $copyObj->setSrcdatefrom($this->getSrcdatefrom());
        $copyObj->setSrcdatethru($this->getSrcdatethru());
        $copyObj->setBillname($this->getBillname());
        $copyObj->setBilladdress($this->getBilladdress());
        $copyObj->setBilladdress2($this->getBilladdress2());
        $copyObj->setBilladdress3($this->getBilladdress3());
        $copyObj->setBillcountry($this->getBillcountry());
        $copyObj->setBillcity($this->getBillcity());
        $copyObj->setBillstate($this->getBillstate());
        $copyObj->setBillzip($this->getBillzip());
        $copyObj->setPrntfmt($this->getPrntfmt());
        $copyObj->setPrntfmtdisp($this->getPrntfmtdisp());
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
     * @return \Ordrhed Clone of current object.
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
        $this->custid = null;
        $this->shiptoid = null;
        $this->custname = null;
        $this->orderno = null;
        $this->custpo = null;
        $this->custref = null;
        $this->status = null;
        $this->orderdate = null;
        $this->careof = null;
        $this->quotdate = null;
        $this->invdate = null;
        $this->shipdate = null;
        $this->revdate = null;
        $this->expdate = null;
        $this->hasdocuments = null;
        $this->hastracking = null;
        $this->subtotal = null;
        $this->salestax = null;
        $this->freight = null;
        $this->misccost = null;
        $this->ordertotal = null;
        $this->hasnotes = null;
        $this->editord = null;
        $this->error = null;
        $this->errormsg = null;
        $this->sconame = null;
        $this->shipname = null;
        $this->shipaddress = null;
        $this->shipaddress2 = null;
        $this->shipcity = null;
        $this->shipstate = null;
        $this->shipzip = null;
        $this->shipcountry = null;
        $this->contact = null;
        $this->phintl = null;
        $this->phone = null;
        $this->extension = null;
        $this->faxnbr = null;
        $this->email = null;
        $this->releasenbr = null;
        $this->shipviacd = null;
        $this->shipviadesc = null;
        $this->pricecode = null;
        $this->pricecodedesc = null;
        $this->pricedisp = null;
        $this->taxcode = null;
        $this->taxcodedesc = null;
        $this->taxcodedisp = null;
        $this->termcode = null;
        $this->termtype = null;
        $this->termcodedesc = null;
        $this->rqstdate = null;
        $this->shipcom = null;
        $this->sp1 = null;
        $this->sp1name = null;
        $this->sp2 = null;
        $this->sp2name = null;
        $this->sp2disp = null;
        $this->sp3 = null;
        $this->sp3name = null;
        $this->sp3disp = null;
        $this->fob = null;
        $this->deliverydesc = null;
        $this->whse = null;
        $this->cardnumber = null;
        $this->cardexpire = null;
        $this->cardcode = null;
        $this->cardapproval = null;
        $this->totalcost = null;
        $this->totaldiscount = null;
        $this->paymenttype = null;
        $this->srcdatefrom = null;
        $this->srcdatethru = null;
        $this->billname = null;
        $this->billaddress = null;
        $this->billaddress2 = null;
        $this->billaddress3 = null;
        $this->billcountry = null;
        $this->billcity = null;
        $this->billstate = null;
        $this->billzip = null;
        $this->prntfmt = null;
        $this->prntfmtdisp = null;
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
        return (string) $this->exportTo(OrdrhedTableMap::DEFAULT_STRING_FORMAT);
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
