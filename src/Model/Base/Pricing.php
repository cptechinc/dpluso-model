<?php

namespace Base;

use \PricingQuery as ChildPricingQuery;
use \Exception;
use \PDO;
use Map\PricingTableMap;
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
 * Base class that represents a row from the 'pricing' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Pricing implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PricingTableMap';


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
     * The value for the itemid field.
     *
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the price field.
     *
     * @var        string
     */
    protected $price;

    /**
     * The value for the qty field.
     *
     * @var        int
     */
    protected $qty;

    /**
     * The value for the priceqty1 field.
     *
     * @var        int
     */
    protected $priceqty1;

    /**
     * The value for the priceqty2 field.
     *
     * @var        int
     */
    protected $priceqty2;

    /**
     * The value for the priceqty3 field.
     *
     * @var        int
     */
    protected $priceqty3;

    /**
     * The value for the priceqty4 field.
     *
     * @var        int
     */
    protected $priceqty4;

    /**
     * The value for the priceqty5 field.
     *
     * @var        int
     */
    protected $priceqty5;

    /**
     * The value for the priceqty6 field.
     *
     * @var        int
     */
    protected $priceqty6;

    /**
     * The value for the priceprice1 field.
     *
     * @var        string
     */
    protected $priceprice1;

    /**
     * The value for the priceprice2 field.
     *
     * @var        string
     */
    protected $priceprice2;

    /**
     * The value for the priceprice3 field.
     *
     * @var        string
     */
    protected $priceprice3;

    /**
     * The value for the priceprice4 field.
     *
     * @var        string
     */
    protected $priceprice4;

    /**
     * The value for the priceprice5 field.
     *
     * @var        string
     */
    protected $priceprice5;

    /**
     * The value for the priceprice6 field.
     *
     * @var        string
     */
    protected $priceprice6;

    /**
     * The value for the unit field.
     *
     * @var        string
     */
    protected $unit;

    /**
     * The value for the listprice field.
     *
     * @var        string
     */
    protected $listprice;

    /**
     * The value for the name1 field.
     *
     * @var        string
     */
    protected $name1;

    /**
     * The value for the name2 field.
     *
     * @var        string
     */
    protected $name2;

    /**
     * The value for the shortdesc field.
     *
     * @var        string
     */
    protected $shortdesc;

    /**
     * The value for the image field.
     *
     * @var        string
     */
    protected $image;

    /**
     * The value for the familyid field.
     *
     * @var        string
     */
    protected $familyid;

    /**
     * The value for the ermes field.
     *
     * @var        string
     */
    protected $ermes;

    /**
     * The value for the speca field.
     *
     * @var        string
     */
    protected $speca;

    /**
     * The value for the specb field.
     *
     * @var        string
     */
    protected $specb;

    /**
     * The value for the specc field.
     *
     * @var        string
     */
    protected $specc;

    /**
     * The value for the specd field.
     *
     * @var        string
     */
    protected $specd;

    /**
     * The value for the spece field.
     *
     * @var        string
     */
    protected $spece;

    /**
     * The value for the specf field.
     *
     * @var        string
     */
    protected $specf;

    /**
     * The value for the specg field.
     *
     * @var        string
     */
    protected $specg;

    /**
     * The value for the spech field.
     *
     * @var        string
     */
    protected $spech;

    /**
     * The value for the longdesc field.
     *
     * @var        string
     */
    protected $longdesc;

    /**
     * The value for the orderno field.
     *
     * @var        string
     */
    protected $orderno;

    /**
     * The value for the name3 field.
     *
     * @var        string
     */
    protected $name3;

    /**
     * The value for the name4 field.
     *
     * @var        string
     */
    protected $name4;

    /**
     * The value for the thumb field.
     *
     * @var        string
     */
    protected $thumb;

    /**
     * The value for the width field.
     *
     * @var        string
     */
    protected $width;

    /**
     * The value for the height field.
     *
     * @var        string
     */
    protected $height;

    /**
     * The value for the familydes field.
     *
     * @var        string
     */
    protected $familydes;

    /**
     * The value for the keywords field.
     *
     * @var        string
     */
    protected $keywords;

    /**
     * The value for the vpn field.
     *
     * @var        string
     */
    protected $vpn;

    /**
     * The value for the uomdesc field.
     *
     * @var        string
     */
    protected $uomdesc;

    /**
     * The value for the vidinffg field.
     *
     * @var        string
     */
    protected $vidinffg;

    /**
     * The value for the vidinflk field.
     *
     * @var        string
     */
    protected $vidinflk;

    /**
     * The value for the additemflag field.
     *
     * @var        string
     */
    protected $additemflag;

    /**
     * The value for the schemafam field.
     *
     * @var        string
     */
    protected $schemafam;

    /**
     * The value for the origitemid field.
     *
     * @var        string
     */
    protected $origitemid;

    /**
     * The value for the techspecflg field.
     *
     * @var        string
     */
    protected $techspecflg;

    /**
     * The value for the techspecname field.
     *
     * @var        string
     */
    protected $techspecname;

    /**
     * The value for the cost field.
     *
     * @var        string
     */
    protected $cost;

    /**
     * The value for the prop65 field.
     *
     * @var        string
     */
    protected $prop65;

    /**
     * The value for the leadfree field.
     *
     * @var        string
     */
    protected $leadfree;

    /**
     * The value for the extendesc field.
     *
     * @var        string
     */
    protected $extendesc;

    /**
     * The value for the minprice field.
     *
     * @var        string
     */
    protected $minprice;

    /**
     * The value for the spcord field.
     *
     * @var        string
     */
    protected $spcord;

    /**
     * The value for the vendorid field.
     *
     * @var        string
     */
    protected $vendorid;

    /**
     * The value for the vendoritemid field.
     *
     * @var        string
     */
    protected $vendoritemid;

    /**
     * The value for the shipfromid field.
     *
     * @var        string
     */
    protected $shipfromid;

    /**
     * The value for the nsitemgroup field.
     *
     * @var        string
     */
    protected $nsitemgroup;

    /**
     * The value for the itemtype field.
     *
     * @var        string
     */
    protected $itemtype;

    /**
     * The value for the dummy field.
     *
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
     * Initializes internal state of Base\Pricing object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>Pricing</code> instance.  If
     * <code>obj</code> is an instance of <code>Pricing</code>, delegates to
     * <code>equals(Pricing)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Pricing The current object, for fluid interface
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
     * Get the [itemid] column value.
     *
     * @return string
     */
    public function getItemid()
    {
        return $this->itemid;
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
     * Get the [qty] column value.
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Get the [priceqty1] column value.
     *
     * @return int
     */
    public function getPriceqty1()
    {
        return $this->priceqty1;
    }

    /**
     * Get the [priceqty2] column value.
     *
     * @return int
     */
    public function getPriceqty2()
    {
        return $this->priceqty2;
    }

    /**
     * Get the [priceqty3] column value.
     *
     * @return int
     */
    public function getPriceqty3()
    {
        return $this->priceqty3;
    }

    /**
     * Get the [priceqty4] column value.
     *
     * @return int
     */
    public function getPriceqty4()
    {
        return $this->priceqty4;
    }

    /**
     * Get the [priceqty5] column value.
     *
     * @return int
     */
    public function getPriceqty5()
    {
        return $this->priceqty5;
    }

    /**
     * Get the [priceqty6] column value.
     *
     * @return int
     */
    public function getPriceqty6()
    {
        return $this->priceqty6;
    }

    /**
     * Get the [priceprice1] column value.
     *
     * @return string
     */
    public function getPriceprice1()
    {
        return $this->priceprice1;
    }

    /**
     * Get the [priceprice2] column value.
     *
     * @return string
     */
    public function getPriceprice2()
    {
        return $this->priceprice2;
    }

    /**
     * Get the [priceprice3] column value.
     *
     * @return string
     */
    public function getPriceprice3()
    {
        return $this->priceprice3;
    }

    /**
     * Get the [priceprice4] column value.
     *
     * @return string
     */
    public function getPriceprice4()
    {
        return $this->priceprice4;
    }

    /**
     * Get the [priceprice5] column value.
     *
     * @return string
     */
    public function getPriceprice5()
    {
        return $this->priceprice5;
    }

    /**
     * Get the [priceprice6] column value.
     *
     * @return string
     */
    public function getPriceprice6()
    {
        return $this->priceprice6;
    }

    /**
     * Get the [unit] column value.
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
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
     * Get the [name1] column value.
     *
     * @return string
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * Get the [name2] column value.
     *
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * Get the [shortdesc] column value.
     *
     * @return string
     */
    public function getShortdesc()
    {
        return $this->shortdesc;
    }

    /**
     * Get the [image] column value.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the [familyid] column value.
     *
     * @return string
     */
    public function getFamilyid()
    {
        return $this->familyid;
    }

    /**
     * Get the [ermes] column value.
     *
     * @return string
     */
    public function getErmes()
    {
        return $this->ermes;
    }

    /**
     * Get the [speca] column value.
     *
     * @return string
     */
    public function getSpeca()
    {
        return $this->speca;
    }

    /**
     * Get the [specb] column value.
     *
     * @return string
     */
    public function getSpecb()
    {
        return $this->specb;
    }

    /**
     * Get the [specc] column value.
     *
     * @return string
     */
    public function getSpecc()
    {
        return $this->specc;
    }

    /**
     * Get the [specd] column value.
     *
     * @return string
     */
    public function getSpecd()
    {
        return $this->specd;
    }

    /**
     * Get the [spece] column value.
     *
     * @return string
     */
    public function getSpece()
    {
        return $this->spece;
    }

    /**
     * Get the [specf] column value.
     *
     * @return string
     */
    public function getSpecf()
    {
        return $this->specf;
    }

    /**
     * Get the [specg] column value.
     *
     * @return string
     */
    public function getSpecg()
    {
        return $this->specg;
    }

    /**
     * Get the [spech] column value.
     *
     * @return string
     */
    public function getSpech()
    {
        return $this->spech;
    }

    /**
     * Get the [longdesc] column value.
     *
     * @return string
     */
    public function getLongdesc()
    {
        return $this->longdesc;
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
     * Get the [name3] column value.
     *
     * @return string
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * Get the [name4] column value.
     *
     * @return string
     */
    public function getName4()
    {
        return $this->name4;
    }

    /**
     * Get the [thumb] column value.
     *
     * @return string
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * Get the [width] column value.
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the [height] column value.
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the [familydes] column value.
     *
     * @return string
     */
    public function getFamilydes()
    {
        return $this->familydes;
    }

    /**
     * Get the [keywords] column value.
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Get the [vpn] column value.
     *
     * @return string
     */
    public function getVpn()
    {
        return $this->vpn;
    }

    /**
     * Get the [uomdesc] column value.
     *
     * @return string
     */
    public function getUomdesc()
    {
        return $this->uomdesc;
    }

    /**
     * Get the [vidinffg] column value.
     *
     * @return string
     */
    public function getVidinffg()
    {
        return $this->vidinffg;
    }

    /**
     * Get the [vidinflk] column value.
     *
     * @return string
     */
    public function getVidinflk()
    {
        return $this->vidinflk;
    }

    /**
     * Get the [additemflag] column value.
     *
     * @return string
     */
    public function getAdditemflag()
    {
        return $this->additemflag;
    }

    /**
     * Get the [schemafam] column value.
     *
     * @return string
     */
    public function getSchemafam()
    {
        return $this->schemafam;
    }

    /**
     * Get the [origitemid] column value.
     *
     * @return string
     */
    public function getOrigitemid()
    {
        return $this->origitemid;
    }

    /**
     * Get the [techspecflg] column value.
     *
     * @return string
     */
    public function getTechspecflg()
    {
        return $this->techspecflg;
    }

    /**
     * Get the [techspecname] column value.
     *
     * @return string
     */
    public function getTechspecname()
    {
        return $this->techspecname;
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
     * Get the [prop65] column value.
     *
     * @return string
     */
    public function getProp65()
    {
        return $this->prop65;
    }

    /**
     * Get the [leadfree] column value.
     *
     * @return string
     */
    public function getLeadfree()
    {
        return $this->leadfree;
    }

    /**
     * Get the [extendesc] column value.
     *
     * @return string
     */
    public function getExtendesc()
    {
        return $this->extendesc;
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
     * Get the [spcord] column value.
     *
     * @return string
     */
    public function getSpcord()
    {
        return $this->spcord;
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
     * Get the [shipfromid] column value.
     *
     * @return string
     */
    public function getShipfromid()
    {
        return $this->shipfromid;
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
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[PricingTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[PricingTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[PricingTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[PricingTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[PricingTableMap::COL_ITEMID] = true;
        }

        return $this;
    } // setItemid()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [qty] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[PricingTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [priceqty1] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceqty1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->priceqty1 !== $v) {
            $this->priceqty1 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEQTY1] = true;
        }

        return $this;
    } // setPriceqty1()

    /**
     * Set the value of [priceqty2] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceqty2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->priceqty2 !== $v) {
            $this->priceqty2 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEQTY2] = true;
        }

        return $this;
    } // setPriceqty2()

    /**
     * Set the value of [priceqty3] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceqty3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->priceqty3 !== $v) {
            $this->priceqty3 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEQTY3] = true;
        }

        return $this;
    } // setPriceqty3()

    /**
     * Set the value of [priceqty4] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceqty4($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->priceqty4 !== $v) {
            $this->priceqty4 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEQTY4] = true;
        }

        return $this;
    } // setPriceqty4()

    /**
     * Set the value of [priceqty5] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceqty5($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->priceqty5 !== $v) {
            $this->priceqty5 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEQTY5] = true;
        }

        return $this;
    } // setPriceqty5()

    /**
     * Set the value of [priceqty6] column.
     *
     * @param int $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceqty6($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->priceqty6 !== $v) {
            $this->priceqty6 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEQTY6] = true;
        }

        return $this;
    } // setPriceqty6()

    /**
     * Set the value of [priceprice1] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceprice1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priceprice1 !== $v) {
            $this->priceprice1 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEPRICE1] = true;
        }

        return $this;
    } // setPriceprice1()

    /**
     * Set the value of [priceprice2] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceprice2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priceprice2 !== $v) {
            $this->priceprice2 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEPRICE2] = true;
        }

        return $this;
    } // setPriceprice2()

    /**
     * Set the value of [priceprice3] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceprice3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priceprice3 !== $v) {
            $this->priceprice3 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEPRICE3] = true;
        }

        return $this;
    } // setPriceprice3()

    /**
     * Set the value of [priceprice4] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceprice4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priceprice4 !== $v) {
            $this->priceprice4 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEPRICE4] = true;
        }

        return $this;
    } // setPriceprice4()

    /**
     * Set the value of [priceprice5] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceprice5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priceprice5 !== $v) {
            $this->priceprice5 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEPRICE5] = true;
        }

        return $this;
    } // setPriceprice5()

    /**
     * Set the value of [priceprice6] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setPriceprice6($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priceprice6 !== $v) {
            $this->priceprice6 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PRICEPRICE6] = true;
        }

        return $this;
    } // setPriceprice6()

    /**
     * Set the value of [unit] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit !== $v) {
            $this->unit = $v;
            $this->modifiedColumns[PricingTableMap::COL_UNIT] = true;
        }

        return $this;
    } // setUnit()

    /**
     * Set the value of [listprice] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setListprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->listprice !== $v) {
            $this->listprice = $v;
            $this->modifiedColumns[PricingTableMap::COL_LISTPRICE] = true;
        }

        return $this;
    } // setListprice()

    /**
     * Set the value of [name1] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setName1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name1 !== $v) {
            $this->name1 = $v;
            $this->modifiedColumns[PricingTableMap::COL_NAME1] = true;
        }

        return $this;
    } // setName1()

    /**
     * Set the value of [name2] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setName2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name2 !== $v) {
            $this->name2 = $v;
            $this->modifiedColumns[PricingTableMap::COL_NAME2] = true;
        }

        return $this;
    } // setName2()

    /**
     * Set the value of [shortdesc] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setShortdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shortdesc !== $v) {
            $this->shortdesc = $v;
            $this->modifiedColumns[PricingTableMap::COL_SHORTDESC] = true;
        }

        return $this;
    } // setShortdesc()

    /**
     * Set the value of [image] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[PricingTableMap::COL_IMAGE] = true;
        }

        return $this;
    } // setImage()

    /**
     * Set the value of [familyid] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setFamilyid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->familyid !== $v) {
            $this->familyid = $v;
            $this->modifiedColumns[PricingTableMap::COL_FAMILYID] = true;
        }

        return $this;
    } // setFamilyid()

    /**
     * Set the value of [ermes] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setErmes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ermes !== $v) {
            $this->ermes = $v;
            $this->modifiedColumns[PricingTableMap::COL_ERMES] = true;
        }

        return $this;
    } // setErmes()

    /**
     * Set the value of [speca] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpeca($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->speca !== $v) {
            $this->speca = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECA] = true;
        }

        return $this;
    } // setSpeca()

    /**
     * Set the value of [specb] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpecb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specb !== $v) {
            $this->specb = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECB] = true;
        }

        return $this;
    } // setSpecb()

    /**
     * Set the value of [specc] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpecc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specc !== $v) {
            $this->specc = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECC] = true;
        }

        return $this;
    } // setSpecc()

    /**
     * Set the value of [specd] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpecd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specd !== $v) {
            $this->specd = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECD] = true;
        }

        return $this;
    } // setSpecd()

    /**
     * Set the value of [spece] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpece($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spece !== $v) {
            $this->spece = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECE] = true;
        }

        return $this;
    } // setSpece()

    /**
     * Set the value of [specf] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpecf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specf !== $v) {
            $this->specf = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECF] = true;
        }

        return $this;
    } // setSpecf()

    /**
     * Set the value of [specg] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpecg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specg !== $v) {
            $this->specg = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECG] = true;
        }

        return $this;
    } // setSpecg()

    /**
     * Set the value of [spech] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpech($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spech !== $v) {
            $this->spech = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPECH] = true;
        }

        return $this;
    } // setSpech()

    /**
     * Set the value of [longdesc] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setLongdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->longdesc !== $v) {
            $this->longdesc = $v;
            $this->modifiedColumns[PricingTableMap::COL_LONGDESC] = true;
        }

        return $this;
    } // setLongdesc()

    /**
     * Set the value of [orderno] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setOrderno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orderno !== $v) {
            $this->orderno = $v;
            $this->modifiedColumns[PricingTableMap::COL_ORDERNO] = true;
        }

        return $this;
    } // setOrderno()

    /**
     * Set the value of [name3] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setName3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name3 !== $v) {
            $this->name3 = $v;
            $this->modifiedColumns[PricingTableMap::COL_NAME3] = true;
        }

        return $this;
    } // setName3()

    /**
     * Set the value of [name4] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setName4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name4 !== $v) {
            $this->name4 = $v;
            $this->modifiedColumns[PricingTableMap::COL_NAME4] = true;
        }

        return $this;
    } // setName4()

    /**
     * Set the value of [thumb] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setThumb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumb !== $v) {
            $this->thumb = $v;
            $this->modifiedColumns[PricingTableMap::COL_THUMB] = true;
        }

        return $this;
    } // setThumb()

    /**
     * Set the value of [width] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setWidth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->width !== $v) {
            $this->width = $v;
            $this->modifiedColumns[PricingTableMap::COL_WIDTH] = true;
        }

        return $this;
    } // setWidth()

    /**
     * Set the value of [height] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setHeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->height !== $v) {
            $this->height = $v;
            $this->modifiedColumns[PricingTableMap::COL_HEIGHT] = true;
        }

        return $this;
    } // setHeight()

    /**
     * Set the value of [familydes] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setFamilydes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->familydes !== $v) {
            $this->familydes = $v;
            $this->modifiedColumns[PricingTableMap::COL_FAMILYDES] = true;
        }

        return $this;
    } // setFamilydes()

    /**
     * Set the value of [keywords] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setKeywords($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->keywords !== $v) {
            $this->keywords = $v;
            $this->modifiedColumns[PricingTableMap::COL_KEYWORDS] = true;
        }

        return $this;
    } // setKeywords()

    /**
     * Set the value of [vpn] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setVpn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vpn !== $v) {
            $this->vpn = $v;
            $this->modifiedColumns[PricingTableMap::COL_VPN] = true;
        }

        return $this;
    } // setVpn()

    /**
     * Set the value of [uomdesc] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setUomdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uomdesc !== $v) {
            $this->uomdesc = $v;
            $this->modifiedColumns[PricingTableMap::COL_UOMDESC] = true;
        }

        return $this;
    } // setUomdesc()

    /**
     * Set the value of [vidinffg] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setVidinffg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vidinffg !== $v) {
            $this->vidinffg = $v;
            $this->modifiedColumns[PricingTableMap::COL_VIDINFFG] = true;
        }

        return $this;
    } // setVidinffg()

    /**
     * Set the value of [vidinflk] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setVidinflk($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vidinflk !== $v) {
            $this->vidinflk = $v;
            $this->modifiedColumns[PricingTableMap::COL_VIDINFLK] = true;
        }

        return $this;
    } // setVidinflk()

    /**
     * Set the value of [additemflag] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setAdditemflag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->additemflag !== $v) {
            $this->additemflag = $v;
            $this->modifiedColumns[PricingTableMap::COL_ADDITEMFLAG] = true;
        }

        return $this;
    } // setAdditemflag()

    /**
     * Set the value of [schemafam] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSchemafam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->schemafam !== $v) {
            $this->schemafam = $v;
            $this->modifiedColumns[PricingTableMap::COL_SCHEMAFAM] = true;
        }

        return $this;
    } // setSchemafam()

    /**
     * Set the value of [origitemid] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setOrigitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->origitemid !== $v) {
            $this->origitemid = $v;
            $this->modifiedColumns[PricingTableMap::COL_ORIGITEMID] = true;
        }

        return $this;
    } // setOrigitemid()

    /**
     * Set the value of [techspecflg] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setTechspecflg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->techspecflg !== $v) {
            $this->techspecflg = $v;
            $this->modifiedColumns[PricingTableMap::COL_TECHSPECFLG] = true;
        }

        return $this;
    } // setTechspecflg()

    /**
     * Set the value of [techspecname] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setTechspecname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->techspecname !== $v) {
            $this->techspecname = $v;
            $this->modifiedColumns[PricingTableMap::COL_TECHSPECNAME] = true;
        }

        return $this;
    } // setTechspecname()

    /**
     * Set the value of [cost] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setCost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cost !== $v) {
            $this->cost = $v;
            $this->modifiedColumns[PricingTableMap::COL_COST] = true;
        }

        return $this;
    } // setCost()

    /**
     * Set the value of [prop65] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setProp65($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prop65 !== $v) {
            $this->prop65 = $v;
            $this->modifiedColumns[PricingTableMap::COL_PROP65] = true;
        }

        return $this;
    } // setProp65()

    /**
     * Set the value of [leadfree] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setLeadfree($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->leadfree !== $v) {
            $this->leadfree = $v;
            $this->modifiedColumns[PricingTableMap::COL_LEADFREE] = true;
        }

        return $this;
    } // setLeadfree()

    /**
     * Set the value of [extendesc] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setExtendesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->extendesc !== $v) {
            $this->extendesc = $v;
            $this->modifiedColumns[PricingTableMap::COL_EXTENDESC] = true;
        }

        return $this;
    } // setExtendesc()

    /**
     * Set the value of [minprice] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setMinprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->minprice !== $v) {
            $this->minprice = $v;
            $this->modifiedColumns[PricingTableMap::COL_MINPRICE] = true;
        }

        return $this;
    } // setMinprice()

    /**
     * Set the value of [spcord] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setSpcord($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spcord !== $v) {
            $this->spcord = $v;
            $this->modifiedColumns[PricingTableMap::COL_SPCORD] = true;
        }

        return $this;
    } // setSpcord()

    /**
     * Set the value of [vendorid] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setVendorid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendorid !== $v) {
            $this->vendorid = $v;
            $this->modifiedColumns[PricingTableMap::COL_VENDORID] = true;
        }

        return $this;
    } // setVendorid()

    /**
     * Set the value of [vendoritemid] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setVendoritemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendoritemid !== $v) {
            $this->vendoritemid = $v;
            $this->modifiedColumns[PricingTableMap::COL_VENDORITEMID] = true;
        }

        return $this;
    } // setVendoritemid()

    /**
     * Set the value of [shipfromid] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setShipfromid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipfromid !== $v) {
            $this->shipfromid = $v;
            $this->modifiedColumns[PricingTableMap::COL_SHIPFROMID] = true;
        }

        return $this;
    } // setShipfromid()

    /**
     * Set the value of [nsitemgroup] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setNsitemgroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nsitemgroup !== $v) {
            $this->nsitemgroup = $v;
            $this->modifiedColumns[PricingTableMap::COL_NSITEMGROUP] = true;
        }

        return $this;
    } // setNsitemgroup()

    /**
     * Set the value of [itemtype] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setItemtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemtype !== $v) {
            $this->itemtype = $v;
            $this->modifiedColumns[PricingTableMap::COL_ITEMTYPE] = true;
        }

        return $this;
    } // setItemtype()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Pricing The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[PricingTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PricingTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PricingTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PricingTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PricingTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PricingTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PricingTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PricingTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PricingTableMap::translateFieldName('Priceqty1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceqty1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PricingTableMap::translateFieldName('Priceqty2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceqty2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PricingTableMap::translateFieldName('Priceqty3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceqty3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PricingTableMap::translateFieldName('Priceqty4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceqty4 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PricingTableMap::translateFieldName('Priceqty5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceqty5 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PricingTableMap::translateFieldName('Priceqty6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceqty6 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PricingTableMap::translateFieldName('Priceprice1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceprice1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PricingTableMap::translateFieldName('Priceprice2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceprice2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PricingTableMap::translateFieldName('Priceprice3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceprice3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : PricingTableMap::translateFieldName('Priceprice4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceprice4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : PricingTableMap::translateFieldName('Priceprice5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceprice5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : PricingTableMap::translateFieldName('Priceprice6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priceprice6 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : PricingTableMap::translateFieldName('Unit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : PricingTableMap::translateFieldName('Listprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->listprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : PricingTableMap::translateFieldName('Name1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : PricingTableMap::translateFieldName('Name2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : PricingTableMap::translateFieldName('Shortdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shortdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : PricingTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : PricingTableMap::translateFieldName('Familyid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->familyid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : PricingTableMap::translateFieldName('Ermes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ermes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : PricingTableMap::translateFieldName('Speca', TableMap::TYPE_PHPNAME, $indexType)];
            $this->speca = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : PricingTableMap::translateFieldName('Specb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : PricingTableMap::translateFieldName('Specc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : PricingTableMap::translateFieldName('Specd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : PricingTableMap::translateFieldName('Spece', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spece = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : PricingTableMap::translateFieldName('Specf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specf = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : PricingTableMap::translateFieldName('Specg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : PricingTableMap::translateFieldName('Spech', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spech = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : PricingTableMap::translateFieldName('Longdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->longdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : PricingTableMap::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : PricingTableMap::translateFieldName('Name3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : PricingTableMap::translateFieldName('Name4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : PricingTableMap::translateFieldName('Thumb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : PricingTableMap::translateFieldName('Width', TableMap::TYPE_PHPNAME, $indexType)];
            $this->width = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : PricingTableMap::translateFieldName('Height', TableMap::TYPE_PHPNAME, $indexType)];
            $this->height = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : PricingTableMap::translateFieldName('Familydes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->familydes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : PricingTableMap::translateFieldName('Keywords', TableMap::TYPE_PHPNAME, $indexType)];
            $this->keywords = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : PricingTableMap::translateFieldName('Vpn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vpn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : PricingTableMap::translateFieldName('Uomdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uomdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : PricingTableMap::translateFieldName('Vidinffg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vidinffg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : PricingTableMap::translateFieldName('Vidinflk', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vidinflk = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : PricingTableMap::translateFieldName('Additemflag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->additemflag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : PricingTableMap::translateFieldName('Schemafam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->schemafam = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : PricingTableMap::translateFieldName('Origitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->origitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : PricingTableMap::translateFieldName('Techspecflg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->techspecflg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : PricingTableMap::translateFieldName('Techspecname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->techspecname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : PricingTableMap::translateFieldName('Cost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : PricingTableMap::translateFieldName('Prop65', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prop65 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : PricingTableMap::translateFieldName('Leadfree', TableMap::TYPE_PHPNAME, $indexType)];
            $this->leadfree = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : PricingTableMap::translateFieldName('Extendesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->extendesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : PricingTableMap::translateFieldName('Minprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : PricingTableMap::translateFieldName('Spcord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spcord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : PricingTableMap::translateFieldName('Vendorid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendorid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : PricingTableMap::translateFieldName('Vendoritemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vendoritemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : PricingTableMap::translateFieldName('Shipfromid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipfromid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : PricingTableMap::translateFieldName('Nsitemgroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nsitemgroup = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : PricingTableMap::translateFieldName('Itemtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : PricingTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 65; // 65 = PricingTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Pricing'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PricingTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPricingQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Pricing::setDeleted()
     * @see Pricing::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PricingTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPricingQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PricingTableMap::DATABASE_NAME);
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
                PricingTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(PricingTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(PricingTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(PricingTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(PricingTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(PricingTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY1)) {
            $modifiedColumns[':p' . $index++]  = 'priceqty1';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY2)) {
            $modifiedColumns[':p' . $index++]  = 'priceqty2';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY3)) {
            $modifiedColumns[':p' . $index++]  = 'priceqty3';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY4)) {
            $modifiedColumns[':p' . $index++]  = 'priceqty4';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY5)) {
            $modifiedColumns[':p' . $index++]  = 'priceqty5';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY6)) {
            $modifiedColumns[':p' . $index++]  = 'priceqty6';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE1)) {
            $modifiedColumns[':p' . $index++]  = 'priceprice1';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE2)) {
            $modifiedColumns[':p' . $index++]  = 'priceprice2';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE3)) {
            $modifiedColumns[':p' . $index++]  = 'priceprice3';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE4)) {
            $modifiedColumns[':p' . $index++]  = 'priceprice4';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE5)) {
            $modifiedColumns[':p' . $index++]  = 'priceprice5';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE6)) {
            $modifiedColumns[':p' . $index++]  = 'priceprice6';
        }
        if ($this->isColumnModified(PricingTableMap::COL_UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'unit';
        }
        if ($this->isColumnModified(PricingTableMap::COL_LISTPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'listprice';
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME1)) {
            $modifiedColumns[':p' . $index++]  = 'name1';
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME2)) {
            $modifiedColumns[':p' . $index++]  = 'name2';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SHORTDESC)) {
            $modifiedColumns[':p' . $index++]  = 'shortdesc';
        }
        if ($this->isColumnModified(PricingTableMap::COL_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'image';
        }
        if ($this->isColumnModified(PricingTableMap::COL_FAMILYID)) {
            $modifiedColumns[':p' . $index++]  = 'familyid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_ERMES)) {
            $modifiedColumns[':p' . $index++]  = 'ermes';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECA)) {
            $modifiedColumns[':p' . $index++]  = 'speca';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECB)) {
            $modifiedColumns[':p' . $index++]  = 'specb';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECC)) {
            $modifiedColumns[':p' . $index++]  = 'specc';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECD)) {
            $modifiedColumns[':p' . $index++]  = 'specd';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECE)) {
            $modifiedColumns[':p' . $index++]  = 'spece';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECF)) {
            $modifiedColumns[':p' . $index++]  = 'specf';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECG)) {
            $modifiedColumns[':p' . $index++]  = 'specg';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECH)) {
            $modifiedColumns[':p' . $index++]  = 'spech';
        }
        if ($this->isColumnModified(PricingTableMap::COL_LONGDESC)) {
            $modifiedColumns[':p' . $index++]  = 'longdesc';
        }
        if ($this->isColumnModified(PricingTableMap::COL_ORDERNO)) {
            $modifiedColumns[':p' . $index++]  = 'orderno';
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME3)) {
            $modifiedColumns[':p' . $index++]  = 'name3';
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME4)) {
            $modifiedColumns[':p' . $index++]  = 'name4';
        }
        if ($this->isColumnModified(PricingTableMap::COL_THUMB)) {
            $modifiedColumns[':p' . $index++]  = 'thumb';
        }
        if ($this->isColumnModified(PricingTableMap::COL_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'width';
        }
        if ($this->isColumnModified(PricingTableMap::COL_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'height';
        }
        if ($this->isColumnModified(PricingTableMap::COL_FAMILYDES)) {
            $modifiedColumns[':p' . $index++]  = 'familydes';
        }
        if ($this->isColumnModified(PricingTableMap::COL_KEYWORDS)) {
            $modifiedColumns[':p' . $index++]  = 'keywords';
        }
        if ($this->isColumnModified(PricingTableMap::COL_VPN)) {
            $modifiedColumns[':p' . $index++]  = 'vpn';
        }
        if ($this->isColumnModified(PricingTableMap::COL_UOMDESC)) {
            $modifiedColumns[':p' . $index++]  = 'uomdesc';
        }
        if ($this->isColumnModified(PricingTableMap::COL_VIDINFFG)) {
            $modifiedColumns[':p' . $index++]  = 'vidinffg';
        }
        if ($this->isColumnModified(PricingTableMap::COL_VIDINFLK)) {
            $modifiedColumns[':p' . $index++]  = 'vidinflk';
        }
        if ($this->isColumnModified(PricingTableMap::COL_ADDITEMFLAG)) {
            $modifiedColumns[':p' . $index++]  = 'additemflag';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SCHEMAFAM)) {
            $modifiedColumns[':p' . $index++]  = 'schemafam';
        }
        if ($this->isColumnModified(PricingTableMap::COL_ORIGITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'origitemid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_TECHSPECFLG)) {
            $modifiedColumns[':p' . $index++]  = 'techspecflg';
        }
        if ($this->isColumnModified(PricingTableMap::COL_TECHSPECNAME)) {
            $modifiedColumns[':p' . $index++]  = 'techspecname';
        }
        if ($this->isColumnModified(PricingTableMap::COL_COST)) {
            $modifiedColumns[':p' . $index++]  = 'cost';
        }
        if ($this->isColumnModified(PricingTableMap::COL_PROP65)) {
            $modifiedColumns[':p' . $index++]  = 'prop65';
        }
        if ($this->isColumnModified(PricingTableMap::COL_LEADFREE)) {
            $modifiedColumns[':p' . $index++]  = 'leadfree';
        }
        if ($this->isColumnModified(PricingTableMap::COL_EXTENDESC)) {
            $modifiedColumns[':p' . $index++]  = 'extendesc';
        }
        if ($this->isColumnModified(PricingTableMap::COL_MINPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'minprice';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPCORD)) {
            $modifiedColumns[':p' . $index++]  = 'spcord';
        }
        if ($this->isColumnModified(PricingTableMap::COL_VENDORID)) {
            $modifiedColumns[':p' . $index++]  = 'vendorid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_VENDORITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'vendoritemid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_SHIPFROMID)) {
            $modifiedColumns[':p' . $index++]  = 'shipfromid';
        }
        if ($this->isColumnModified(PricingTableMap::COL_NSITEMGROUP)) {
            $modifiedColumns[':p' . $index++]  = 'nsitemgroup';
        }
        if ($this->isColumnModified(PricingTableMap::COL_ITEMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'itemtype';
        }
        if ($this->isColumnModified(PricingTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO pricing (%s) VALUES (%s)',
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
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_INT);
                        break;
                    case 'priceqty1':
                        $stmt->bindValue($identifier, $this->priceqty1, PDO::PARAM_INT);
                        break;
                    case 'priceqty2':
                        $stmt->bindValue($identifier, $this->priceqty2, PDO::PARAM_INT);
                        break;
                    case 'priceqty3':
                        $stmt->bindValue($identifier, $this->priceqty3, PDO::PARAM_INT);
                        break;
                    case 'priceqty4':
                        $stmt->bindValue($identifier, $this->priceqty4, PDO::PARAM_INT);
                        break;
                    case 'priceqty5':
                        $stmt->bindValue($identifier, $this->priceqty5, PDO::PARAM_INT);
                        break;
                    case 'priceqty6':
                        $stmt->bindValue($identifier, $this->priceqty6, PDO::PARAM_INT);
                        break;
                    case 'priceprice1':
                        $stmt->bindValue($identifier, $this->priceprice1, PDO::PARAM_STR);
                        break;
                    case 'priceprice2':
                        $stmt->bindValue($identifier, $this->priceprice2, PDO::PARAM_STR);
                        break;
                    case 'priceprice3':
                        $stmt->bindValue($identifier, $this->priceprice3, PDO::PARAM_STR);
                        break;
                    case 'priceprice4':
                        $stmt->bindValue($identifier, $this->priceprice4, PDO::PARAM_STR);
                        break;
                    case 'priceprice5':
                        $stmt->bindValue($identifier, $this->priceprice5, PDO::PARAM_STR);
                        break;
                    case 'priceprice6':
                        $stmt->bindValue($identifier, $this->priceprice6, PDO::PARAM_STR);
                        break;
                    case 'unit':
                        $stmt->bindValue($identifier, $this->unit, PDO::PARAM_STR);
                        break;
                    case 'listprice':
                        $stmt->bindValue($identifier, $this->listprice, PDO::PARAM_STR);
                        break;
                    case 'name1':
                        $stmt->bindValue($identifier, $this->name1, PDO::PARAM_STR);
                        break;
                    case 'name2':
                        $stmt->bindValue($identifier, $this->name2, PDO::PARAM_STR);
                        break;
                    case 'shortdesc':
                        $stmt->bindValue($identifier, $this->shortdesc, PDO::PARAM_STR);
                        break;
                    case 'image':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case 'familyid':
                        $stmt->bindValue($identifier, $this->familyid, PDO::PARAM_STR);
                        break;
                    case 'ermes':
                        $stmt->bindValue($identifier, $this->ermes, PDO::PARAM_STR);
                        break;
                    case 'speca':
                        $stmt->bindValue($identifier, $this->speca, PDO::PARAM_STR);
                        break;
                    case 'specb':
                        $stmt->bindValue($identifier, $this->specb, PDO::PARAM_STR);
                        break;
                    case 'specc':
                        $stmt->bindValue($identifier, $this->specc, PDO::PARAM_STR);
                        break;
                    case 'specd':
                        $stmt->bindValue($identifier, $this->specd, PDO::PARAM_STR);
                        break;
                    case 'spece':
                        $stmt->bindValue($identifier, $this->spece, PDO::PARAM_STR);
                        break;
                    case 'specf':
                        $stmt->bindValue($identifier, $this->specf, PDO::PARAM_STR);
                        break;
                    case 'specg':
                        $stmt->bindValue($identifier, $this->specg, PDO::PARAM_STR);
                        break;
                    case 'spech':
                        $stmt->bindValue($identifier, $this->spech, PDO::PARAM_STR);
                        break;
                    case 'longdesc':
                        $stmt->bindValue($identifier, $this->longdesc, PDO::PARAM_STR);
                        break;
                    case 'orderno':
                        $stmt->bindValue($identifier, $this->orderno, PDO::PARAM_STR);
                        break;
                    case 'name3':
                        $stmt->bindValue($identifier, $this->name3, PDO::PARAM_STR);
                        break;
                    case 'name4':
                        $stmt->bindValue($identifier, $this->name4, PDO::PARAM_STR);
                        break;
                    case 'thumb':
                        $stmt->bindValue($identifier, $this->thumb, PDO::PARAM_STR);
                        break;
                    case 'width':
                        $stmt->bindValue($identifier, $this->width, PDO::PARAM_STR);
                        break;
                    case 'height':
                        $stmt->bindValue($identifier, $this->height, PDO::PARAM_STR);
                        break;
                    case 'familydes':
                        $stmt->bindValue($identifier, $this->familydes, PDO::PARAM_STR);
                        break;
                    case 'keywords':
                        $stmt->bindValue($identifier, $this->keywords, PDO::PARAM_STR);
                        break;
                    case 'vpn':
                        $stmt->bindValue($identifier, $this->vpn, PDO::PARAM_STR);
                        break;
                    case 'uomdesc':
                        $stmt->bindValue($identifier, $this->uomdesc, PDO::PARAM_STR);
                        break;
                    case 'vidinffg':
                        $stmt->bindValue($identifier, $this->vidinffg, PDO::PARAM_STR);
                        break;
                    case 'vidinflk':
                        $stmt->bindValue($identifier, $this->vidinflk, PDO::PARAM_STR);
                        break;
                    case 'additemflag':
                        $stmt->bindValue($identifier, $this->additemflag, PDO::PARAM_STR);
                        break;
                    case 'schemafam':
                        $stmt->bindValue($identifier, $this->schemafam, PDO::PARAM_STR);
                        break;
                    case 'origitemid':
                        $stmt->bindValue($identifier, $this->origitemid, PDO::PARAM_STR);
                        break;
                    case 'techspecflg':
                        $stmt->bindValue($identifier, $this->techspecflg, PDO::PARAM_STR);
                        break;
                    case 'techspecname':
                        $stmt->bindValue($identifier, $this->techspecname, PDO::PARAM_STR);
                        break;
                    case 'cost':
                        $stmt->bindValue($identifier, $this->cost, PDO::PARAM_STR);
                        break;
                    case 'prop65':
                        $stmt->bindValue($identifier, $this->prop65, PDO::PARAM_STR);
                        break;
                    case 'leadfree':
                        $stmt->bindValue($identifier, $this->leadfree, PDO::PARAM_STR);
                        break;
                    case 'extendesc':
                        $stmt->bindValue($identifier, $this->extendesc, PDO::PARAM_STR);
                        break;
                    case 'minprice':
                        $stmt->bindValue($identifier, $this->minprice, PDO::PARAM_STR);
                        break;
                    case 'spcord':
                        $stmt->bindValue($identifier, $this->spcord, PDO::PARAM_STR);
                        break;
                    case 'vendorid':
                        $stmt->bindValue($identifier, $this->vendorid, PDO::PARAM_STR);
                        break;
                    case 'vendoritemid':
                        $stmt->bindValue($identifier, $this->vendoritemid, PDO::PARAM_STR);
                        break;
                    case 'shipfromid':
                        $stmt->bindValue($identifier, $this->shipfromid, PDO::PARAM_STR);
                        break;
                    case 'nsitemgroup':
                        $stmt->bindValue($identifier, $this->nsitemgroup, PDO::PARAM_STR);
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
        $pos = PricingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getItemid();
                break;
            case 5:
                return $this->getPrice();
                break;
            case 6:
                return $this->getQty();
                break;
            case 7:
                return $this->getPriceqty1();
                break;
            case 8:
                return $this->getPriceqty2();
                break;
            case 9:
                return $this->getPriceqty3();
                break;
            case 10:
                return $this->getPriceqty4();
                break;
            case 11:
                return $this->getPriceqty5();
                break;
            case 12:
                return $this->getPriceqty6();
                break;
            case 13:
                return $this->getPriceprice1();
                break;
            case 14:
                return $this->getPriceprice2();
                break;
            case 15:
                return $this->getPriceprice3();
                break;
            case 16:
                return $this->getPriceprice4();
                break;
            case 17:
                return $this->getPriceprice5();
                break;
            case 18:
                return $this->getPriceprice6();
                break;
            case 19:
                return $this->getUnit();
                break;
            case 20:
                return $this->getListprice();
                break;
            case 21:
                return $this->getName1();
                break;
            case 22:
                return $this->getName2();
                break;
            case 23:
                return $this->getShortdesc();
                break;
            case 24:
                return $this->getImage();
                break;
            case 25:
                return $this->getFamilyid();
                break;
            case 26:
                return $this->getErmes();
                break;
            case 27:
                return $this->getSpeca();
                break;
            case 28:
                return $this->getSpecb();
                break;
            case 29:
                return $this->getSpecc();
                break;
            case 30:
                return $this->getSpecd();
                break;
            case 31:
                return $this->getSpece();
                break;
            case 32:
                return $this->getSpecf();
                break;
            case 33:
                return $this->getSpecg();
                break;
            case 34:
                return $this->getSpech();
                break;
            case 35:
                return $this->getLongdesc();
                break;
            case 36:
                return $this->getOrderno();
                break;
            case 37:
                return $this->getName3();
                break;
            case 38:
                return $this->getName4();
                break;
            case 39:
                return $this->getThumb();
                break;
            case 40:
                return $this->getWidth();
                break;
            case 41:
                return $this->getHeight();
                break;
            case 42:
                return $this->getFamilydes();
                break;
            case 43:
                return $this->getKeywords();
                break;
            case 44:
                return $this->getVpn();
                break;
            case 45:
                return $this->getUomdesc();
                break;
            case 46:
                return $this->getVidinffg();
                break;
            case 47:
                return $this->getVidinflk();
                break;
            case 48:
                return $this->getAdditemflag();
                break;
            case 49:
                return $this->getSchemafam();
                break;
            case 50:
                return $this->getOrigitemid();
                break;
            case 51:
                return $this->getTechspecflg();
                break;
            case 52:
                return $this->getTechspecname();
                break;
            case 53:
                return $this->getCost();
                break;
            case 54:
                return $this->getProp65();
                break;
            case 55:
                return $this->getLeadfree();
                break;
            case 56:
                return $this->getExtendesc();
                break;
            case 57:
                return $this->getMinprice();
                break;
            case 58:
                return $this->getSpcord();
                break;
            case 59:
                return $this->getVendorid();
                break;
            case 60:
                return $this->getVendoritemid();
                break;
            case 61:
                return $this->getShipfromid();
                break;
            case 62:
                return $this->getNsitemgroup();
                break;
            case 63:
                return $this->getItemtype();
                break;
            case 64:
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

        if (isset($alreadyDumpedObjects['Pricing'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pricing'][$this->hashCode()] = true;
        $keys = PricingTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getItemid(),
            $keys[5] => $this->getPrice(),
            $keys[6] => $this->getQty(),
            $keys[7] => $this->getPriceqty1(),
            $keys[8] => $this->getPriceqty2(),
            $keys[9] => $this->getPriceqty3(),
            $keys[10] => $this->getPriceqty4(),
            $keys[11] => $this->getPriceqty5(),
            $keys[12] => $this->getPriceqty6(),
            $keys[13] => $this->getPriceprice1(),
            $keys[14] => $this->getPriceprice2(),
            $keys[15] => $this->getPriceprice3(),
            $keys[16] => $this->getPriceprice4(),
            $keys[17] => $this->getPriceprice5(),
            $keys[18] => $this->getPriceprice6(),
            $keys[19] => $this->getUnit(),
            $keys[20] => $this->getListprice(),
            $keys[21] => $this->getName1(),
            $keys[22] => $this->getName2(),
            $keys[23] => $this->getShortdesc(),
            $keys[24] => $this->getImage(),
            $keys[25] => $this->getFamilyid(),
            $keys[26] => $this->getErmes(),
            $keys[27] => $this->getSpeca(),
            $keys[28] => $this->getSpecb(),
            $keys[29] => $this->getSpecc(),
            $keys[30] => $this->getSpecd(),
            $keys[31] => $this->getSpece(),
            $keys[32] => $this->getSpecf(),
            $keys[33] => $this->getSpecg(),
            $keys[34] => $this->getSpech(),
            $keys[35] => $this->getLongdesc(),
            $keys[36] => $this->getOrderno(),
            $keys[37] => $this->getName3(),
            $keys[38] => $this->getName4(),
            $keys[39] => $this->getThumb(),
            $keys[40] => $this->getWidth(),
            $keys[41] => $this->getHeight(),
            $keys[42] => $this->getFamilydes(),
            $keys[43] => $this->getKeywords(),
            $keys[44] => $this->getVpn(),
            $keys[45] => $this->getUomdesc(),
            $keys[46] => $this->getVidinffg(),
            $keys[47] => $this->getVidinflk(),
            $keys[48] => $this->getAdditemflag(),
            $keys[49] => $this->getSchemafam(),
            $keys[50] => $this->getOrigitemid(),
            $keys[51] => $this->getTechspecflg(),
            $keys[52] => $this->getTechspecname(),
            $keys[53] => $this->getCost(),
            $keys[54] => $this->getProp65(),
            $keys[55] => $this->getLeadfree(),
            $keys[56] => $this->getExtendesc(),
            $keys[57] => $this->getMinprice(),
            $keys[58] => $this->getSpcord(),
            $keys[59] => $this->getVendorid(),
            $keys[60] => $this->getVendoritemid(),
            $keys[61] => $this->getShipfromid(),
            $keys[62] => $this->getNsitemgroup(),
            $keys[63] => $this->getItemtype(),
            $keys[64] => $this->getDummy(),
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
     * @return $this|\Pricing
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PricingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Pricing
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
                $this->setItemid($value);
                break;
            case 5:
                $this->setPrice($value);
                break;
            case 6:
                $this->setQty($value);
                break;
            case 7:
                $this->setPriceqty1($value);
                break;
            case 8:
                $this->setPriceqty2($value);
                break;
            case 9:
                $this->setPriceqty3($value);
                break;
            case 10:
                $this->setPriceqty4($value);
                break;
            case 11:
                $this->setPriceqty5($value);
                break;
            case 12:
                $this->setPriceqty6($value);
                break;
            case 13:
                $this->setPriceprice1($value);
                break;
            case 14:
                $this->setPriceprice2($value);
                break;
            case 15:
                $this->setPriceprice3($value);
                break;
            case 16:
                $this->setPriceprice4($value);
                break;
            case 17:
                $this->setPriceprice5($value);
                break;
            case 18:
                $this->setPriceprice6($value);
                break;
            case 19:
                $this->setUnit($value);
                break;
            case 20:
                $this->setListprice($value);
                break;
            case 21:
                $this->setName1($value);
                break;
            case 22:
                $this->setName2($value);
                break;
            case 23:
                $this->setShortdesc($value);
                break;
            case 24:
                $this->setImage($value);
                break;
            case 25:
                $this->setFamilyid($value);
                break;
            case 26:
                $this->setErmes($value);
                break;
            case 27:
                $this->setSpeca($value);
                break;
            case 28:
                $this->setSpecb($value);
                break;
            case 29:
                $this->setSpecc($value);
                break;
            case 30:
                $this->setSpecd($value);
                break;
            case 31:
                $this->setSpece($value);
                break;
            case 32:
                $this->setSpecf($value);
                break;
            case 33:
                $this->setSpecg($value);
                break;
            case 34:
                $this->setSpech($value);
                break;
            case 35:
                $this->setLongdesc($value);
                break;
            case 36:
                $this->setOrderno($value);
                break;
            case 37:
                $this->setName3($value);
                break;
            case 38:
                $this->setName4($value);
                break;
            case 39:
                $this->setThumb($value);
                break;
            case 40:
                $this->setWidth($value);
                break;
            case 41:
                $this->setHeight($value);
                break;
            case 42:
                $this->setFamilydes($value);
                break;
            case 43:
                $this->setKeywords($value);
                break;
            case 44:
                $this->setVpn($value);
                break;
            case 45:
                $this->setUomdesc($value);
                break;
            case 46:
                $this->setVidinffg($value);
                break;
            case 47:
                $this->setVidinflk($value);
                break;
            case 48:
                $this->setAdditemflag($value);
                break;
            case 49:
                $this->setSchemafam($value);
                break;
            case 50:
                $this->setOrigitemid($value);
                break;
            case 51:
                $this->setTechspecflg($value);
                break;
            case 52:
                $this->setTechspecname($value);
                break;
            case 53:
                $this->setCost($value);
                break;
            case 54:
                $this->setProp65($value);
                break;
            case 55:
                $this->setLeadfree($value);
                break;
            case 56:
                $this->setExtendesc($value);
                break;
            case 57:
                $this->setMinprice($value);
                break;
            case 58:
                $this->setSpcord($value);
                break;
            case 59:
                $this->setVendorid($value);
                break;
            case 60:
                $this->setVendoritemid($value);
                break;
            case 61:
                $this->setShipfromid($value);
                break;
            case 62:
                $this->setNsitemgroup($value);
                break;
            case 63:
                $this->setItemtype($value);
                break;
            case 64:
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
        $keys = PricingTableMap::getFieldNames($keyType);

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
            $this->setItemid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPrice($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setQty($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPriceqty1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPriceqty2($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPriceqty3($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPriceqty4($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPriceqty5($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPriceqty6($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPriceprice1($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPriceprice2($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPriceprice3($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPriceprice4($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setPriceprice5($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPriceprice6($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setUnit($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setListprice($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setName1($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setName2($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setShortdesc($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setImage($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setFamilyid($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setErmes($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setSpeca($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setSpecb($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setSpecc($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setSpecd($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setSpece($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setSpecf($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setSpecg($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setSpech($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setLongdesc($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setOrderno($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setName3($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setName4($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setThumb($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setWidth($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setHeight($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setFamilydes($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setKeywords($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setVpn($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setUomdesc($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setVidinffg($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setVidinflk($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setAdditemflag($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setSchemafam($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setOrigitemid($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setTechspecflg($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setTechspecname($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setCost($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setProp65($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setLeadfree($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setExtendesc($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setMinprice($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setSpcord($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setVendorid($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setVendoritemid($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setShipfromid($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setNsitemgroup($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setItemtype($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setDummy($arr[$keys[64]]);
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
     * @return $this|\Pricing The current object, for fluid interface
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
        $criteria = new Criteria(PricingTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PricingTableMap::COL_SESSIONID)) {
            $criteria->add(PricingTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_RECNO)) {
            $criteria->add(PricingTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(PricingTableMap::COL_DATE)) {
            $criteria->add(PricingTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(PricingTableMap::COL_TIME)) {
            $criteria->add(PricingTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(PricingTableMap::COL_ITEMID)) {
            $criteria->add(PricingTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICE)) {
            $criteria->add(PricingTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(PricingTableMap::COL_QTY)) {
            $criteria->add(PricingTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY1)) {
            $criteria->add(PricingTableMap::COL_PRICEQTY1, $this->priceqty1);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY2)) {
            $criteria->add(PricingTableMap::COL_PRICEQTY2, $this->priceqty2);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY3)) {
            $criteria->add(PricingTableMap::COL_PRICEQTY3, $this->priceqty3);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY4)) {
            $criteria->add(PricingTableMap::COL_PRICEQTY4, $this->priceqty4);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY5)) {
            $criteria->add(PricingTableMap::COL_PRICEQTY5, $this->priceqty5);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEQTY6)) {
            $criteria->add(PricingTableMap::COL_PRICEQTY6, $this->priceqty6);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE1)) {
            $criteria->add(PricingTableMap::COL_PRICEPRICE1, $this->priceprice1);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE2)) {
            $criteria->add(PricingTableMap::COL_PRICEPRICE2, $this->priceprice2);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE3)) {
            $criteria->add(PricingTableMap::COL_PRICEPRICE3, $this->priceprice3);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE4)) {
            $criteria->add(PricingTableMap::COL_PRICEPRICE4, $this->priceprice4);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE5)) {
            $criteria->add(PricingTableMap::COL_PRICEPRICE5, $this->priceprice5);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PRICEPRICE6)) {
            $criteria->add(PricingTableMap::COL_PRICEPRICE6, $this->priceprice6);
        }
        if ($this->isColumnModified(PricingTableMap::COL_UNIT)) {
            $criteria->add(PricingTableMap::COL_UNIT, $this->unit);
        }
        if ($this->isColumnModified(PricingTableMap::COL_LISTPRICE)) {
            $criteria->add(PricingTableMap::COL_LISTPRICE, $this->listprice);
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME1)) {
            $criteria->add(PricingTableMap::COL_NAME1, $this->name1);
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME2)) {
            $criteria->add(PricingTableMap::COL_NAME2, $this->name2);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SHORTDESC)) {
            $criteria->add(PricingTableMap::COL_SHORTDESC, $this->shortdesc);
        }
        if ($this->isColumnModified(PricingTableMap::COL_IMAGE)) {
            $criteria->add(PricingTableMap::COL_IMAGE, $this->image);
        }
        if ($this->isColumnModified(PricingTableMap::COL_FAMILYID)) {
            $criteria->add(PricingTableMap::COL_FAMILYID, $this->familyid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_ERMES)) {
            $criteria->add(PricingTableMap::COL_ERMES, $this->ermes);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECA)) {
            $criteria->add(PricingTableMap::COL_SPECA, $this->speca);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECB)) {
            $criteria->add(PricingTableMap::COL_SPECB, $this->specb);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECC)) {
            $criteria->add(PricingTableMap::COL_SPECC, $this->specc);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECD)) {
            $criteria->add(PricingTableMap::COL_SPECD, $this->specd);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECE)) {
            $criteria->add(PricingTableMap::COL_SPECE, $this->spece);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECF)) {
            $criteria->add(PricingTableMap::COL_SPECF, $this->specf);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECG)) {
            $criteria->add(PricingTableMap::COL_SPECG, $this->specg);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPECH)) {
            $criteria->add(PricingTableMap::COL_SPECH, $this->spech);
        }
        if ($this->isColumnModified(PricingTableMap::COL_LONGDESC)) {
            $criteria->add(PricingTableMap::COL_LONGDESC, $this->longdesc);
        }
        if ($this->isColumnModified(PricingTableMap::COL_ORDERNO)) {
            $criteria->add(PricingTableMap::COL_ORDERNO, $this->orderno);
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME3)) {
            $criteria->add(PricingTableMap::COL_NAME3, $this->name3);
        }
        if ($this->isColumnModified(PricingTableMap::COL_NAME4)) {
            $criteria->add(PricingTableMap::COL_NAME4, $this->name4);
        }
        if ($this->isColumnModified(PricingTableMap::COL_THUMB)) {
            $criteria->add(PricingTableMap::COL_THUMB, $this->thumb);
        }
        if ($this->isColumnModified(PricingTableMap::COL_WIDTH)) {
            $criteria->add(PricingTableMap::COL_WIDTH, $this->width);
        }
        if ($this->isColumnModified(PricingTableMap::COL_HEIGHT)) {
            $criteria->add(PricingTableMap::COL_HEIGHT, $this->height);
        }
        if ($this->isColumnModified(PricingTableMap::COL_FAMILYDES)) {
            $criteria->add(PricingTableMap::COL_FAMILYDES, $this->familydes);
        }
        if ($this->isColumnModified(PricingTableMap::COL_KEYWORDS)) {
            $criteria->add(PricingTableMap::COL_KEYWORDS, $this->keywords);
        }
        if ($this->isColumnModified(PricingTableMap::COL_VPN)) {
            $criteria->add(PricingTableMap::COL_VPN, $this->vpn);
        }
        if ($this->isColumnModified(PricingTableMap::COL_UOMDESC)) {
            $criteria->add(PricingTableMap::COL_UOMDESC, $this->uomdesc);
        }
        if ($this->isColumnModified(PricingTableMap::COL_VIDINFFG)) {
            $criteria->add(PricingTableMap::COL_VIDINFFG, $this->vidinffg);
        }
        if ($this->isColumnModified(PricingTableMap::COL_VIDINFLK)) {
            $criteria->add(PricingTableMap::COL_VIDINFLK, $this->vidinflk);
        }
        if ($this->isColumnModified(PricingTableMap::COL_ADDITEMFLAG)) {
            $criteria->add(PricingTableMap::COL_ADDITEMFLAG, $this->additemflag);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SCHEMAFAM)) {
            $criteria->add(PricingTableMap::COL_SCHEMAFAM, $this->schemafam);
        }
        if ($this->isColumnModified(PricingTableMap::COL_ORIGITEMID)) {
            $criteria->add(PricingTableMap::COL_ORIGITEMID, $this->origitemid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_TECHSPECFLG)) {
            $criteria->add(PricingTableMap::COL_TECHSPECFLG, $this->techspecflg);
        }
        if ($this->isColumnModified(PricingTableMap::COL_TECHSPECNAME)) {
            $criteria->add(PricingTableMap::COL_TECHSPECNAME, $this->techspecname);
        }
        if ($this->isColumnModified(PricingTableMap::COL_COST)) {
            $criteria->add(PricingTableMap::COL_COST, $this->cost);
        }
        if ($this->isColumnModified(PricingTableMap::COL_PROP65)) {
            $criteria->add(PricingTableMap::COL_PROP65, $this->prop65);
        }
        if ($this->isColumnModified(PricingTableMap::COL_LEADFREE)) {
            $criteria->add(PricingTableMap::COL_LEADFREE, $this->leadfree);
        }
        if ($this->isColumnModified(PricingTableMap::COL_EXTENDESC)) {
            $criteria->add(PricingTableMap::COL_EXTENDESC, $this->extendesc);
        }
        if ($this->isColumnModified(PricingTableMap::COL_MINPRICE)) {
            $criteria->add(PricingTableMap::COL_MINPRICE, $this->minprice);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SPCORD)) {
            $criteria->add(PricingTableMap::COL_SPCORD, $this->spcord);
        }
        if ($this->isColumnModified(PricingTableMap::COL_VENDORID)) {
            $criteria->add(PricingTableMap::COL_VENDORID, $this->vendorid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_VENDORITEMID)) {
            $criteria->add(PricingTableMap::COL_VENDORITEMID, $this->vendoritemid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_SHIPFROMID)) {
            $criteria->add(PricingTableMap::COL_SHIPFROMID, $this->shipfromid);
        }
        if ($this->isColumnModified(PricingTableMap::COL_NSITEMGROUP)) {
            $criteria->add(PricingTableMap::COL_NSITEMGROUP, $this->nsitemgroup);
        }
        if ($this->isColumnModified(PricingTableMap::COL_ITEMTYPE)) {
            $criteria->add(PricingTableMap::COL_ITEMTYPE, $this->itemtype);
        }
        if ($this->isColumnModified(PricingTableMap::COL_DUMMY)) {
            $criteria->add(PricingTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildPricingQuery::create();
        $criteria->add(PricingTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(PricingTableMap::COL_RECNO, $this->recno);

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
     * @param      object $copyObj An object of \Pricing (or compatible) type.
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
        $copyObj->setItemid($this->getItemid());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setQty($this->getQty());
        $copyObj->setPriceqty1($this->getPriceqty1());
        $copyObj->setPriceqty2($this->getPriceqty2());
        $copyObj->setPriceqty3($this->getPriceqty3());
        $copyObj->setPriceqty4($this->getPriceqty4());
        $copyObj->setPriceqty5($this->getPriceqty5());
        $copyObj->setPriceqty6($this->getPriceqty6());
        $copyObj->setPriceprice1($this->getPriceprice1());
        $copyObj->setPriceprice2($this->getPriceprice2());
        $copyObj->setPriceprice3($this->getPriceprice3());
        $copyObj->setPriceprice4($this->getPriceprice4());
        $copyObj->setPriceprice5($this->getPriceprice5());
        $copyObj->setPriceprice6($this->getPriceprice6());
        $copyObj->setUnit($this->getUnit());
        $copyObj->setListprice($this->getListprice());
        $copyObj->setName1($this->getName1());
        $copyObj->setName2($this->getName2());
        $copyObj->setShortdesc($this->getShortdesc());
        $copyObj->setImage($this->getImage());
        $copyObj->setFamilyid($this->getFamilyid());
        $copyObj->setErmes($this->getErmes());
        $copyObj->setSpeca($this->getSpeca());
        $copyObj->setSpecb($this->getSpecb());
        $copyObj->setSpecc($this->getSpecc());
        $copyObj->setSpecd($this->getSpecd());
        $copyObj->setSpece($this->getSpece());
        $copyObj->setSpecf($this->getSpecf());
        $copyObj->setSpecg($this->getSpecg());
        $copyObj->setSpech($this->getSpech());
        $copyObj->setLongdesc($this->getLongdesc());
        $copyObj->setOrderno($this->getOrderno());
        $copyObj->setName3($this->getName3());
        $copyObj->setName4($this->getName4());
        $copyObj->setThumb($this->getThumb());
        $copyObj->setWidth($this->getWidth());
        $copyObj->setHeight($this->getHeight());
        $copyObj->setFamilydes($this->getFamilydes());
        $copyObj->setKeywords($this->getKeywords());
        $copyObj->setVpn($this->getVpn());
        $copyObj->setUomdesc($this->getUomdesc());
        $copyObj->setVidinffg($this->getVidinffg());
        $copyObj->setVidinflk($this->getVidinflk());
        $copyObj->setAdditemflag($this->getAdditemflag());
        $copyObj->setSchemafam($this->getSchemafam());
        $copyObj->setOrigitemid($this->getOrigitemid());
        $copyObj->setTechspecflg($this->getTechspecflg());
        $copyObj->setTechspecname($this->getTechspecname());
        $copyObj->setCost($this->getCost());
        $copyObj->setProp65($this->getProp65());
        $copyObj->setLeadfree($this->getLeadfree());
        $copyObj->setExtendesc($this->getExtendesc());
        $copyObj->setMinprice($this->getMinprice());
        $copyObj->setSpcord($this->getSpcord());
        $copyObj->setVendorid($this->getVendorid());
        $copyObj->setVendoritemid($this->getVendoritemid());
        $copyObj->setShipfromid($this->getShipfromid());
        $copyObj->setNsitemgroup($this->getNsitemgroup());
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
     * @return \Pricing Clone of current object.
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
        $this->itemid = null;
        $this->price = null;
        $this->qty = null;
        $this->priceqty1 = null;
        $this->priceqty2 = null;
        $this->priceqty3 = null;
        $this->priceqty4 = null;
        $this->priceqty5 = null;
        $this->priceqty6 = null;
        $this->priceprice1 = null;
        $this->priceprice2 = null;
        $this->priceprice3 = null;
        $this->priceprice4 = null;
        $this->priceprice5 = null;
        $this->priceprice6 = null;
        $this->unit = null;
        $this->listprice = null;
        $this->name1 = null;
        $this->name2 = null;
        $this->shortdesc = null;
        $this->image = null;
        $this->familyid = null;
        $this->ermes = null;
        $this->speca = null;
        $this->specb = null;
        $this->specc = null;
        $this->specd = null;
        $this->spece = null;
        $this->specf = null;
        $this->specg = null;
        $this->spech = null;
        $this->longdesc = null;
        $this->orderno = null;
        $this->name3 = null;
        $this->name4 = null;
        $this->thumb = null;
        $this->width = null;
        $this->height = null;
        $this->familydes = null;
        $this->keywords = null;
        $this->vpn = null;
        $this->uomdesc = null;
        $this->vidinffg = null;
        $this->vidinflk = null;
        $this->additemflag = null;
        $this->schemafam = null;
        $this->origitemid = null;
        $this->techspecflg = null;
        $this->techspecname = null;
        $this->cost = null;
        $this->prop65 = null;
        $this->leadfree = null;
        $this->extendesc = null;
        $this->minprice = null;
        $this->spcord = null;
        $this->vendorid = null;
        $this->vendoritemid = null;
        $this->shipfromid = null;
        $this->nsitemgroup = null;
        $this->itemtype = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(PricingTableMap::DEFAULT_STRING_FORMAT);
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
