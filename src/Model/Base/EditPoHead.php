<?php

namespace Base;

use \EditPoHeadQuery as ChildEditPoHeadQuery;
use \Exception;
use \PDO;
use Map\EditPoHeadTableMap;
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
 * Base class that represents a row from the 'edit_po_head' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EditPoHead implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Map\\EditPoHeadTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var bool
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var bool
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = [];

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = [];

    /**
     * The value for the sessionid field.
     *
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the pohdnbr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pohdnbr;

    /**
     * The value for the pohdstat field.
     *
     * @var        string|null
     */
    protected $pohdstat;

    /**
     * The value for the pohdref field.
     *
     * @var        string|null
     */
    protected $pohdref;

    /**
     * The value for the apvevendid field.
     *
     * @var        string|null
     */
    protected $apvevendid;

    /**
     * The value for the apfmshipid field.
     *
     * @var        string|null
     */
    protected $apfmshipid;

    /**
     * The value for the pohdtoname field.
     *
     * @var        string|null
     */
    protected $pohdtoname;

    /**
     * The value for the pohdtoadr1 field.
     *
     * @var        string|null
     */
    protected $pohdtoadr1;

    /**
     * The value for the pohdtoadr2 field.
     *
     * @var        string|null
     */
    protected $pohdtoadr2;

    /**
     * The value for the pohdtoadr3 field.
     *
     * @var        string|null
     */
    protected $pohdtoadr3;

    /**
     * The value for the pohdtoctry field.
     *
     * @var        string|null
     */
    protected $pohdtoctry;

    /**
     * The value for the pohdtocity field.
     *
     * @var        string|null
     */
    protected $pohdtocity;

    /**
     * The value for the pohdtostat field.
     *
     * @var        string|null
     */
    protected $pohdtostat;

    /**
     * The value for the pohdtozipcode field.
     *
     * @var        string|null
     */
    protected $pohdtozipcode;

    /**
     * The value for the pohdptname field.
     *
     * @var        string|null
     */
    protected $pohdptname;

    /**
     * The value for the pohdptadr1 field.
     *
     * @var        string|null
     */
    protected $pohdptadr1;

    /**
     * The value for the pohdptadr2 field.
     *
     * @var        string|null
     */
    protected $pohdptadr2;

    /**
     * The value for the pohdptadr3 field.
     *
     * @var        string|null
     */
    protected $pohdptadr3;

    /**
     * The value for the pohdptctry field.
     *
     * @var        string|null
     */
    protected $pohdptctry;

    /**
     * The value for the pohdptcity field.
     *
     * @var        string|null
     */
    protected $pohdptcity;

    /**
     * The value for the pohdptstat field.
     *
     * @var        string|null
     */
    protected $pohdptstat;

    /**
     * The value for the pohdptzipcode field.
     *
     * @var        string|null
     */
    protected $pohdptzipcode;

    /**
     * The value for the pohdcont field.
     *
     * @var        string|null
     */
    protected $pohdcont;

    /**
     * The value for the pohdordrdate field.
     *
     * @var        string|null
     */
    protected $pohdordrdate;

    /**
     * The value for the aptmtermcode field.
     *
     * @var        string|null
     */
    protected $aptmtermcode;

    /**
     * The value for the artbsviacode field.
     *
     * @var        string|null
     */
    protected $artbsviacode;

    /**
     * The value for the pohdoldfob field.
     *
     * @var        string|null
     */
    protected $pohdoldfob;

    /**
     * The value for the aptbbuyrcode field.
     *
     * @var        string|null
     */
    protected $aptbbuyrcode;

    /**
     * The value for the pohdcolppd field.
     *
     * @var        string|null
     */
    protected $pohdcolppd;

    /**
     * The value for the pohdteleintl field.
     *
     * @var        string|null
     */
    protected $pohdteleintl;

    /**
     * The value for the pohdtelenbr field.
     *
     * @var        string|null
     */
    protected $pohdtelenbr;

    /**
     * The value for the pohdteleext field.
     *
     * @var        string|null
     */
    protected $pohdteleext;

    /**
     * The value for the pohdfaxintl field.
     *
     * @var        string|null
     */
    protected $pohdfaxintl;

    /**
     * The value for the pohdfaxnbr field.
     *
     * @var        string|null
     */
    protected $pohdfaxnbr;

    /**
     * The value for the pohdrcnt field.
     *
     * @var        string|null
     */
    protected $pohdrcnt;

    /**
     * The value for the pohdtaxexem field.
     *
     * @var        string|null
     */
    protected $pohdtaxexem;

    /**
     * The value for the pohdexchctry field.
     *
     * @var        string|null
     */
    protected $pohdexchctry;

    /**
     * The value for the pohdexchrate field.
     *
     * @var        string|null
     */
    protected $pohdexchrate;

    /**
     * The value for the pohdexptdate field.
     *
     * @var        string|null
     */
    protected $pohdexptdate;

    /**
     * The value for the pohdcancdate field.
     *
     * @var        string|null
     */
    protected $pohdcancdate;

    /**
     * The value for the pohdicnt field.
     *
     * @var        string|null
     */
    protected $pohdicnt;

    /**
     * The value for the pohdfob field.
     *
     * @var        string|null
     */
    protected $pohdfob;

    /**
     * The value for the pohdpickqueue field.
     *
     * @var        string|null
     */
    protected $pohdpickqueue;

    /**
     * The value for the pohdpackedby field.
     *
     * @var        string|null
     */
    protected $pohdpackedby;

    /**
     * The value for the pohdpackdate field.
     *
     * @var        string|null
     */
    protected $pohdpackdate;

    /**
     * The value for the pohdpacktime field.
     *
     * @var        string|null
     */
    protected $pohdpacktime;

    /**
     * The value for the pohdlandcost field.
     *
     * @var        string|null
     */
    protected $pohdlandcost;

    /**
     * The value for the pohdedipodate field.
     *
     * @var        string|null
     */
    protected $pohdedipodate;

    /**
     * The value for the pohdfuturebuy field.
     *
     * @var        string|null
     */
    protected $pohdfuturebuy;

    /**
     * The value for the pohdemailaddr field.
     *
     * @var        string|null
     */
    protected $pohdemailaddr;

    /**
     * The value for the pohdshipdate field.
     *
     * @var        string|null
     */
    protected $pohdshipdate;

    /**
     * The value for the pohdackdate field.
     *
     * @var        string|null
     */
    protected $pohdackdate;

    /**
     * The value for the pohdreleasenbr field.
     *
     * @var        int|null
     */
    protected $pohdreleasenbr;

    /**
     * The value for the pohdreturnspo field.
     *
     * @var        string|null
     */
    protected $pohdreturnspo;

    /**
     * The value for the dateupdtd field.
     *
     * @var        string|null
     */
    protected $dateupdtd;

    /**
     * The value for the timeupdtd field.
     *
     * @var        string|null
     */
    protected $timeupdtd;

    /**
     * The value for the status field.
     *
     * @var        string|null
     */
    protected $status;

    /**
     * The value for the dummy field.
     *
     * @var        string|null
     */
    protected $dummy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var bool
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues(): void
    {
        $this->pohdnbr = '';
    }

    /**
     * Initializes internal state of Base\EditPoHead object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return bool True if the object has been modified.
     */
    public function isModified(): bool
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param string $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return bool True if $col has been modified.
     */
    public function isColumnModified(string $col): bool
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns(): array
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return bool True, if the object has never been persisted.
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param bool $b the state of the object.
     */
    public function setNew(bool $b): void
    {
        $this->new = $b;
    }

    /**
     * Whether this object has been deleted.
     * @return bool The deleted state of this object.
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param bool $b The deleted state of this object.
     * @return void
     */
    public function setDeleted(bool $b): void
    {
        $this->deleted = $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified(?string $col = null): void
    {
        if (null !== $col) {
            unset($this->modifiedColumns[$col]);
        } else {
            $this->modifiedColumns = [];
        }
    }

    /**
     * Compares this with another <code>EditPoHead</code> instance.  If
     * <code>obj</code> is an instance of <code>EditPoHead</code>, delegates to
     * <code>equals(EditPoHead)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param mixed $obj The object to compare to.
     * @return bool Whether equal to the object specified.
     */
    public function equals($obj): bool
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
    public function getVirtualColumns(): array
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return bool
     */
    public function hasVirtualColumn(string $name): bool
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return mixed
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getVirtualColumn(string $name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of nonexistent virtual column `%s`.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @param mixed $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn(string $name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param string $msg
     * @param int $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log(string $msg, int $priority = Propel::LOG_INFO): void
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param \Propel\Runtime\Parser\AbstractParser|string $parser An AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
     * @return string The exported data
     */
    public function exportTo($parser, bool $includeLazyLoadColumns = true, string $keyType = TableMap::TYPE_PHPNAME): string
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     *
     * @return array<string>
     */
    public function __sleep(): array
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
     * Get the [pohdnbr] column value.
     *
     * @return string
     */
    public function getPohdnbr()
    {
        return $this->pohdnbr;
    }

    /**
     * Get the [pohdstat] column value.
     *
     * @return string|null
     */
    public function getPohdstat()
    {
        return $this->pohdstat;
    }

    /**
     * Get the [pohdref] column value.
     *
     * @return string|null
     */
    public function getPohdref()
    {
        return $this->pohdref;
    }

    /**
     * Get the [apvevendid] column value.
     *
     * @return string|null
     */
    public function getApvevendid()
    {
        return $this->apvevendid;
    }

    /**
     * Get the [apfmshipid] column value.
     *
     * @return string|null
     */
    public function getApfmshipid()
    {
        return $this->apfmshipid;
    }

    /**
     * Get the [pohdtoname] column value.
     *
     * @return string|null
     */
    public function getPohdtoname()
    {
        return $this->pohdtoname;
    }

    /**
     * Get the [pohdtoadr1] column value.
     *
     * @return string|null
     */
    public function getPohdtoadr1()
    {
        return $this->pohdtoadr1;
    }

    /**
     * Get the [pohdtoadr2] column value.
     *
     * @return string|null
     */
    public function getPohdtoadr2()
    {
        return $this->pohdtoadr2;
    }

    /**
     * Get the [pohdtoadr3] column value.
     *
     * @return string|null
     */
    public function getPohdtoadr3()
    {
        return $this->pohdtoadr3;
    }

    /**
     * Get the [pohdtoctry] column value.
     *
     * @return string|null
     */
    public function getPohdtoctry()
    {
        return $this->pohdtoctry;
    }

    /**
     * Get the [pohdtocity] column value.
     *
     * @return string|null
     */
    public function getPohdtocity()
    {
        return $this->pohdtocity;
    }

    /**
     * Get the [pohdtostat] column value.
     *
     * @return string|null
     */
    public function getPohdtostat()
    {
        return $this->pohdtostat;
    }

    /**
     * Get the [pohdtozipcode] column value.
     *
     * @return string|null
     */
    public function getPohdtozipcode()
    {
        return $this->pohdtozipcode;
    }

    /**
     * Get the [pohdptname] column value.
     *
     * @return string|null
     */
    public function getPohdptname()
    {
        return $this->pohdptname;
    }

    /**
     * Get the [pohdptadr1] column value.
     *
     * @return string|null
     */
    public function getPohdptadr1()
    {
        return $this->pohdptadr1;
    }

    /**
     * Get the [pohdptadr2] column value.
     *
     * @return string|null
     */
    public function getPohdptadr2()
    {
        return $this->pohdptadr2;
    }

    /**
     * Get the [pohdptadr3] column value.
     *
     * @return string|null
     */
    public function getPohdptadr3()
    {
        return $this->pohdptadr3;
    }

    /**
     * Get the [pohdptctry] column value.
     *
     * @return string|null
     */
    public function getPohdptctry()
    {
        return $this->pohdptctry;
    }

    /**
     * Get the [pohdptcity] column value.
     *
     * @return string|null
     */
    public function getPohdptcity()
    {
        return $this->pohdptcity;
    }

    /**
     * Get the [pohdptstat] column value.
     *
     * @return string|null
     */
    public function getPohdptstat()
    {
        return $this->pohdptstat;
    }

    /**
     * Get the [pohdptzipcode] column value.
     *
     * @return string|null
     */
    public function getPohdptzipcode()
    {
        return $this->pohdptzipcode;
    }

    /**
     * Get the [pohdcont] column value.
     *
     * @return string|null
     */
    public function getPohdcont()
    {
        return $this->pohdcont;
    }

    /**
     * Get the [pohdordrdate] column value.
     *
     * @return string|null
     */
    public function getPohdordrdate()
    {
        return $this->pohdordrdate;
    }

    /**
     * Get the [aptmtermcode] column value.
     *
     * @return string|null
     */
    public function getAptmtermcode()
    {
        return $this->aptmtermcode;
    }

    /**
     * Get the [artbsviacode] column value.
     *
     * @return string|null
     */
    public function getArtbsviacode()
    {
        return $this->artbsviacode;
    }

    /**
     * Get the [pohdoldfob] column value.
     *
     * @return string|null
     */
    public function getPohdoldfob()
    {
        return $this->pohdoldfob;
    }

    /**
     * Get the [aptbbuyrcode] column value.
     *
     * @return string|null
     */
    public function getAptbbuyrcode()
    {
        return $this->aptbbuyrcode;
    }

    /**
     * Get the [pohdcolppd] column value.
     *
     * @return string|null
     */
    public function getPohdcolppd()
    {
        return $this->pohdcolppd;
    }

    /**
     * Get the [pohdteleintl] column value.
     *
     * @return string|null
     */
    public function getPohdteleintl()
    {
        return $this->pohdteleintl;
    }

    /**
     * Get the [pohdtelenbr] column value.
     *
     * @return string|null
     */
    public function getPohdtelenbr()
    {
        return $this->pohdtelenbr;
    }

    /**
     * Get the [pohdteleext] column value.
     *
     * @return string|null
     */
    public function getPohdteleext()
    {
        return $this->pohdteleext;
    }

    /**
     * Get the [pohdfaxintl] column value.
     *
     * @return string|null
     */
    public function getPohdfaxintl()
    {
        return $this->pohdfaxintl;
    }

    /**
     * Get the [pohdfaxnbr] column value.
     *
     * @return string|null
     */
    public function getPohdfaxnbr()
    {
        return $this->pohdfaxnbr;
    }

    /**
     * Get the [pohdrcnt] column value.
     *
     * @return string|null
     */
    public function getPohdrcnt()
    {
        return $this->pohdrcnt;
    }

    /**
     * Get the [pohdtaxexem] column value.
     *
     * @return string|null
     */
    public function getPohdtaxexem()
    {
        return $this->pohdtaxexem;
    }

    /**
     * Get the [pohdexchctry] column value.
     *
     * @return string|null
     */
    public function getPohdexchctry()
    {
        return $this->pohdexchctry;
    }

    /**
     * Get the [pohdexchrate] column value.
     *
     * @return string|null
     */
    public function getPohdexchrate()
    {
        return $this->pohdexchrate;
    }

    /**
     * Get the [pohdexptdate] column value.
     *
     * @return string|null
     */
    public function getPohdexptdate()
    {
        return $this->pohdexptdate;
    }

    /**
     * Get the [pohdcancdate] column value.
     *
     * @return string|null
     */
    public function getPohdcancdate()
    {
        return $this->pohdcancdate;
    }

    /**
     * Get the [pohdicnt] column value.
     *
     * @return string|null
     */
    public function getPohdicnt()
    {
        return $this->pohdicnt;
    }

    /**
     * Get the [pohdfob] column value.
     *
     * @return string|null
     */
    public function getPohdfob()
    {
        return $this->pohdfob;
    }

    /**
     * Get the [pohdpickqueue] column value.
     *
     * @return string|null
     */
    public function getPohdpickqueue()
    {
        return $this->pohdpickqueue;
    }

    /**
     * Get the [pohdpackedby] column value.
     *
     * @return string|null
     */
    public function getPohdpackedby()
    {
        return $this->pohdpackedby;
    }

    /**
     * Get the [pohdpackdate] column value.
     *
     * @return string|null
     */
    public function getPohdpackdate()
    {
        return $this->pohdpackdate;
    }

    /**
     * Get the [pohdpacktime] column value.
     *
     * @return string|null
     */
    public function getPohdpacktime()
    {
        return $this->pohdpacktime;
    }

    /**
     * Get the [pohdlandcost] column value.
     *
     * @return string|null
     */
    public function getPohdlandcost()
    {
        return $this->pohdlandcost;
    }

    /**
     * Get the [pohdedipodate] column value.
     *
     * @return string|null
     */
    public function getPohdedipodate()
    {
        return $this->pohdedipodate;
    }

    /**
     * Get the [pohdfuturebuy] column value.
     *
     * @return string|null
     */
    public function getPohdfuturebuy()
    {
        return $this->pohdfuturebuy;
    }

    /**
     * Get the [pohdemailaddr] column value.
     *
     * @return string|null
     */
    public function getPohdemailaddr()
    {
        return $this->pohdemailaddr;
    }

    /**
     * Get the [pohdshipdate] column value.
     *
     * @return string|null
     */
    public function getPohdshipdate()
    {
        return $this->pohdshipdate;
    }

    /**
     * Get the [pohdackdate] column value.
     *
     * @return string|null
     */
    public function getPohdackdate()
    {
        return $this->pohdackdate;
    }

    /**
     * Get the [pohdreleasenbr] column value.
     *
     * @return int|null
     */
    public function getPohdreleasenbr()
    {
        return $this->pohdreleasenbr;
    }

    /**
     * Get the [pohdreturnspo] column value.
     *
     * @return string|null
     */
    public function getPohdreturnspo()
    {
        return $this->pohdreturnspo;
    }

    /**
     * Get the [dateupdtd] column value.
     *
     * @return string|null
     */
    public function getDateupdtd()
    {
        return $this->dateupdtd;
    }

    /**
     * Get the [timeupdtd] column value.
     *
     * @return string|null
     */
    public function getTimeupdtd()
    {
        return $this->timeupdtd;
    }

    /**
     * Get the [status] column value.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [dummy] column value.
     *
     * @return string|null
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [sessionid] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_SESSIONID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdnbr] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdnbr !== $v) {
            $this->pohdnbr = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDNBR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdstat] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdstat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdstat !== $v) {
            $this->pohdstat = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDSTAT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdref] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdref($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdref !== $v) {
            $this->pohdref = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDREF] = true;
        }

        return $this;
    }

    /**
     * Set the value of [apvevendid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setApvevendid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apvevendid !== $v) {
            $this->apvevendid = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_APVEVENDID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [apfmshipid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setApfmshipid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apfmshipid !== $v) {
            $this->apfmshipid = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_APFMSHIPID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtoname] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtoname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtoname !== $v) {
            $this->pohdtoname = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTONAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtoadr1] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtoadr1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtoadr1 !== $v) {
            $this->pohdtoadr1 = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOADR1] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtoadr2] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtoadr2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtoadr2 !== $v) {
            $this->pohdtoadr2 = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOADR2] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtoadr3] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtoadr3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtoadr3 !== $v) {
            $this->pohdtoadr3 = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOADR3] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtoctry] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtoctry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtoctry !== $v) {
            $this->pohdtoctry = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOCTRY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtocity] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtocity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtocity !== $v) {
            $this->pohdtocity = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOCITY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtostat] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtostat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtostat !== $v) {
            $this->pohdtostat = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOSTAT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtozipcode] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtozipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtozipcode !== $v) {
            $this->pohdtozipcode = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTOZIPCODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptname] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptname !== $v) {
            $this->pohdptname = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTNAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptadr1] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptadr1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptadr1 !== $v) {
            $this->pohdptadr1 = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTADR1] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptadr2] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptadr2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptadr2 !== $v) {
            $this->pohdptadr2 = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTADR2] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptadr3] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptadr3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptadr3 !== $v) {
            $this->pohdptadr3 = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTADR3] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptctry] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptctry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptctry !== $v) {
            $this->pohdptctry = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTCTRY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptcity] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptcity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptcity !== $v) {
            $this->pohdptcity = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTCITY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptstat] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptstat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptstat !== $v) {
            $this->pohdptstat = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTSTAT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdptzipcode] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdptzipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdptzipcode !== $v) {
            $this->pohdptzipcode = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPTZIPCODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdcont] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdcont($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdcont !== $v) {
            $this->pohdcont = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDCONT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdordrdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdordrdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdordrdate !== $v) {
            $this->pohdordrdate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDORDRDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [aptmtermcode] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setAptmtermcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->aptmtermcode !== $v) {
            $this->aptmtermcode = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_APTMTERMCODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [artbsviacode] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setArtbsviacode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->artbsviacode !== $v) {
            $this->artbsviacode = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_ARTBSVIACODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdoldfob] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdoldfob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdoldfob !== $v) {
            $this->pohdoldfob = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDOLDFOB] = true;
        }

        return $this;
    }

    /**
     * Set the value of [aptbbuyrcode] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setAptbbuyrcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->aptbbuyrcode !== $v) {
            $this->aptbbuyrcode = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_APTBBUYRCODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdcolppd] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdcolppd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdcolppd !== $v) {
            $this->pohdcolppd = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDCOLPPD] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdteleintl] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdteleintl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdteleintl !== $v) {
            $this->pohdteleintl = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTELEINTL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtelenbr] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtelenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtelenbr !== $v) {
            $this->pohdtelenbr = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTELENBR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdteleext] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdteleext($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdteleext !== $v) {
            $this->pohdteleext = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTELEEXT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdfaxintl] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdfaxintl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdfaxintl !== $v) {
            $this->pohdfaxintl = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDFAXINTL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdfaxnbr] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdfaxnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdfaxnbr !== $v) {
            $this->pohdfaxnbr = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDFAXNBR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdrcnt] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdrcnt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdrcnt !== $v) {
            $this->pohdrcnt = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDRCNT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdtaxexem] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdtaxexem($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdtaxexem !== $v) {
            $this->pohdtaxexem = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDTAXEXEM] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdexchctry] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdexchctry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdexchctry !== $v) {
            $this->pohdexchctry = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDEXCHCTRY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdexchrate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdexchrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdexchrate !== $v) {
            $this->pohdexchrate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDEXCHRATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdexptdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdexptdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdexptdate !== $v) {
            $this->pohdexptdate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDEXPTDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdcancdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdcancdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdcancdate !== $v) {
            $this->pohdcancdate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDCANCDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdicnt] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdicnt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdicnt !== $v) {
            $this->pohdicnt = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDICNT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdfob] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdfob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdfob !== $v) {
            $this->pohdfob = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDFOB] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdpickqueue] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdpickqueue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdpickqueue !== $v) {
            $this->pohdpickqueue = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPICKQUEUE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdpackedby] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdpackedby($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdpackedby !== $v) {
            $this->pohdpackedby = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPACKEDBY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdpackdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdpackdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdpackdate !== $v) {
            $this->pohdpackdate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPACKDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdpacktime] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdpacktime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdpacktime !== $v) {
            $this->pohdpacktime = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDPACKTIME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdlandcost] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdlandcost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdlandcost !== $v) {
            $this->pohdlandcost = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDLANDCOST] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdedipodate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdedipodate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdedipodate !== $v) {
            $this->pohdedipodate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDEDIPODATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdfuturebuy] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdfuturebuy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdfuturebuy !== $v) {
            $this->pohdfuturebuy = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDFUTUREBUY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdemailaddr] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdemailaddr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdemailaddr !== $v) {
            $this->pohdemailaddr = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDEMAILADDR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdshipdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdshipdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdshipdate !== $v) {
            $this->pohdshipdate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDSHIPDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdackdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdackdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdackdate !== $v) {
            $this->pohdackdate = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDACKDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdreleasenbr] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdreleasenbr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pohdreleasenbr !== $v) {
            $this->pohdreleasenbr = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDRELEASENBR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pohdreturnspo] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPohdreturnspo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pohdreturnspo !== $v) {
            $this->pohdreturnspo = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_POHDRETURNSPO] = true;
        }

        return $this;
    }

    /**
     * Set the value of [dateupdtd] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDateupdtd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dateupdtd !== $v) {
            $this->dateupdtd = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_DATEUPDTD] = true;
        }

        return $this;
    }

    /**
     * Set the value of [timeupdtd] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTimeupdtd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->timeupdtd !== $v) {
            $this->timeupdtd = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_TIMEUPDTD] = true;
        }

        return $this;
    }

    /**
     * Set the value of [status] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_STATUS] = true;
        }

        return $this;
    }

    /**
     * Set the value of [dummy] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[EditPoHeadTableMap::COL_DUMMY] = true;
        }

        return $this;
    }

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return bool Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues(): bool
    {
            if ($this->pohdnbr !== '') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    }

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by DataFetcher->fetch().
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param bool $rehydrate Whether this object is being re-hydrated from the database.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int next starting column
     * @throws \Propel\Runtime\Exception\PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate(array $row, int $startcol = 0, bool $rehydrate = false, string $indexType = TableMap::TYPE_NUM): int
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EditPoHeadTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdstat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdstat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EditPoHeadTableMap::translateFieldName('Apvevendid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->apvevendid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EditPoHeadTableMap::translateFieldName('Apfmshipid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->apfmshipid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtoname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtoname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtoadr1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtoadr1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtoadr2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtoadr2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtoadr3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtoadr3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtoctry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtoctry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtocity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtocity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtostat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtostat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtozipcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtozipcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptadr1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptadr1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptadr2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptadr2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptadr3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptadr3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptctry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptctry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptcity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptcity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptstat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptstat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdptzipcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdptzipcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdcont', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdcont = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdordrdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdordrdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : EditPoHeadTableMap::translateFieldName('Aptmtermcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aptmtermcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : EditPoHeadTableMap::translateFieldName('Artbsviacode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->artbsviacode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdoldfob', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdoldfob = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : EditPoHeadTableMap::translateFieldName('Aptbbuyrcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aptbbuyrcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdcolppd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdcolppd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdteleintl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdteleintl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtelenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtelenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdteleext', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdteleext = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdfaxintl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdfaxintl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdfaxnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdfaxnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdrcnt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdrcnt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdtaxexem', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdtaxexem = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdexchctry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdexchctry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdexchrate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdexchrate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdexptdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdexptdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdcancdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdcancdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdicnt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdicnt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdfob', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdfob = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdpickqueue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdpickqueue = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdpackedby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdpackedby = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdpackdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdpackdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdpacktime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdpacktime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdlandcost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdlandcost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdedipodate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdedipodate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdfuturebuy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdfuturebuy = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdemailaddr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdemailaddr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdshipdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdshipdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdackdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdackdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdreleasenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdreleasenbr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : EditPoHeadTableMap::translateFieldName('Pohdreturnspo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pohdreturnspo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : EditPoHeadTableMap::translateFieldName('Dateupdtd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateupdtd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : EditPoHeadTableMap::translateFieldName('Timeupdtd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timeupdtd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : EditPoHeadTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : EditPoHeadTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 58; // 58 = EditPoHeadTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EditPoHead'), 0, $e);
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
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function ensureConsistency(): void
    {
    }

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param bool $deep (optional) Whether to also de-associated any related objects.
     * @param ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload(bool $deep = false, ?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEditPoHeadQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @param ConnectionInterface $con
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @see EditPoHead::setDeleted()
     * @see EditPoHead::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoHeadTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEditPoHeadQuery::create()
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
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    public function save(?ConnectionInterface $con = null): int
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoHeadTableMap::DATABASE_NAME);
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
                EditPoHeadTableMap::addInstanceToPool($this);
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
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con): int
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
    }

    /**
     * Insert the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con): void
    {
        $modifiedColumns = [];
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EditPoHeadTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDNBR)) {
            $modifiedColumns[':p' . $index++]  = 'PohdNbr';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDSTAT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdStat';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDREF)) {
            $modifiedColumns[':p' . $index++]  = 'PohdRef';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APVEVENDID)) {
            $modifiedColumns[':p' . $index++]  = 'ApveVendId';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APFMSHIPID)) {
            $modifiedColumns[':p' . $index++]  = 'ApfmShipId';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTONAME)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToName';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOADR1)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToAdr1';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOADR2)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToAdr2';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOADR3)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToAdr3';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOCTRY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToCtry';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOCITY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToCity';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOSTAT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToStat';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdToZipCode';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtName';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTADR1)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtAdr1';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTADR2)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtAdr2';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTADR3)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtAdr3';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTCTRY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtCtry';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTCITY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtCity';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTSTAT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtStat';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPtZipCode';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDCONT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdCont';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDORDRDATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdOrdrDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APTMTERMCODE)) {
            $modifiedColumns[':p' . $index++]  = 'AptmTermCode';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_ARTBSVIACODE)) {
            $modifiedColumns[':p' . $index++]  = 'ArtbSviaCode';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDOLDFOB)) {
            $modifiedColumns[':p' . $index++]  = 'PohdOldFob';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APTBBUYRCODE)) {
            $modifiedColumns[':p' . $index++]  = 'AptbBuyrCode';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDCOLPPD)) {
            $modifiedColumns[':p' . $index++]  = 'PohdColPpd';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTELEINTL)) {
            $modifiedColumns[':p' . $index++]  = 'PohdTeleIntl';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTELENBR)) {
            $modifiedColumns[':p' . $index++]  = 'PohdTeleNbr';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTELEEXT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdTeleExt';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFAXINTL)) {
            $modifiedColumns[':p' . $index++]  = 'PohdFaxIntl';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFAXNBR)) {
            $modifiedColumns[':p' . $index++]  = 'PohdFaxNbr';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDRCNT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdRCnt';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTAXEXEM)) {
            $modifiedColumns[':p' . $index++]  = 'PohdTaxExem';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEXCHCTRY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdExchCtry';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEXCHRATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdExchRate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEXPTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdExptDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDCANCDATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdCancDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDICNT)) {
            $modifiedColumns[':p' . $index++]  = 'PohdICnt';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFOB)) {
            $modifiedColumns[':p' . $index++]  = 'PohdFob';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPICKQUEUE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPickQueue';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPACKEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPackedBy';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPACKDATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPackDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPACKTIME)) {
            $modifiedColumns[':p' . $index++]  = 'PohdPackTime';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDLANDCOST)) {
            $modifiedColumns[':p' . $index++]  = 'PohdLandCost';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEDIPODATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdEdiPoDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFUTUREBUY)) {
            $modifiedColumns[':p' . $index++]  = 'PohdFutureBuy';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEMAILADDR)) {
            $modifiedColumns[':p' . $index++]  = 'PohdEmailAddr';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDSHIPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdShipDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDACKDATE)) {
            $modifiedColumns[':p' . $index++]  = 'PohdAckDate';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDRELEASENBR)) {
            $modifiedColumns[':p' . $index++]  = 'PohdReleaseNbr';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDRETURNSPO)) {
            $modifiedColumns[':p' . $index++]  = 'PohdReturnsPo';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_DATEUPDTD)) {
            $modifiedColumns[':p' . $index++]  = 'DateUpdtd';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_TIMEUPDTD)) {
            $modifiedColumns[':p' . $index++]  = 'TimeUpdtd';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO edit_po_head (%s) VALUES (%s)',
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
                    case 'PohdNbr':
                        $stmt->bindValue($identifier, $this->pohdnbr, PDO::PARAM_STR);

                        break;
                    case 'PohdStat':
                        $stmt->bindValue($identifier, $this->pohdstat, PDO::PARAM_STR);

                        break;
                    case 'PohdRef':
                        $stmt->bindValue($identifier, $this->pohdref, PDO::PARAM_STR);

                        break;
                    case 'ApveVendId':
                        $stmt->bindValue($identifier, $this->apvevendid, PDO::PARAM_STR);

                        break;
                    case 'ApfmShipId':
                        $stmt->bindValue($identifier, $this->apfmshipid, PDO::PARAM_STR);

                        break;
                    case 'PohdToName':
                        $stmt->bindValue($identifier, $this->pohdtoname, PDO::PARAM_STR);

                        break;
                    case 'PohdToAdr1':
                        $stmt->bindValue($identifier, $this->pohdtoadr1, PDO::PARAM_STR);

                        break;
                    case 'PohdToAdr2':
                        $stmt->bindValue($identifier, $this->pohdtoadr2, PDO::PARAM_STR);

                        break;
                    case 'PohdToAdr3':
                        $stmt->bindValue($identifier, $this->pohdtoadr3, PDO::PARAM_STR);

                        break;
                    case 'PohdToCtry':
                        $stmt->bindValue($identifier, $this->pohdtoctry, PDO::PARAM_STR);

                        break;
                    case 'PohdToCity':
                        $stmt->bindValue($identifier, $this->pohdtocity, PDO::PARAM_STR);

                        break;
                    case 'PohdToStat':
                        $stmt->bindValue($identifier, $this->pohdtostat, PDO::PARAM_STR);

                        break;
                    case 'PohdToZipCode':
                        $stmt->bindValue($identifier, $this->pohdtozipcode, PDO::PARAM_STR);

                        break;
                    case 'PohdPtName':
                        $stmt->bindValue($identifier, $this->pohdptname, PDO::PARAM_STR);

                        break;
                    case 'PohdPtAdr1':
                        $stmt->bindValue($identifier, $this->pohdptadr1, PDO::PARAM_STR);

                        break;
                    case 'PohdPtAdr2':
                        $stmt->bindValue($identifier, $this->pohdptadr2, PDO::PARAM_STR);

                        break;
                    case 'PohdPtAdr3':
                        $stmt->bindValue($identifier, $this->pohdptadr3, PDO::PARAM_STR);

                        break;
                    case 'PohdPtCtry':
                        $stmt->bindValue($identifier, $this->pohdptctry, PDO::PARAM_STR);

                        break;
                    case 'PohdPtCity':
                        $stmt->bindValue($identifier, $this->pohdptcity, PDO::PARAM_STR);

                        break;
                    case 'PohdPtStat':
                        $stmt->bindValue($identifier, $this->pohdptstat, PDO::PARAM_STR);

                        break;
                    case 'PohdPtZipCode':
                        $stmt->bindValue($identifier, $this->pohdptzipcode, PDO::PARAM_STR);

                        break;
                    case 'PohdCont':
                        $stmt->bindValue($identifier, $this->pohdcont, PDO::PARAM_STR);

                        break;
                    case 'PohdOrdrDate':
                        $stmt->bindValue($identifier, $this->pohdordrdate, PDO::PARAM_STR);

                        break;
                    case 'AptmTermCode':
                        $stmt->bindValue($identifier, $this->aptmtermcode, PDO::PARAM_STR);

                        break;
                    case 'ArtbSviaCode':
                        $stmt->bindValue($identifier, $this->artbsviacode, PDO::PARAM_STR);

                        break;
                    case 'PohdOldFob':
                        $stmt->bindValue($identifier, $this->pohdoldfob, PDO::PARAM_STR);

                        break;
                    case 'AptbBuyrCode':
                        $stmt->bindValue($identifier, $this->aptbbuyrcode, PDO::PARAM_STR);

                        break;
                    case 'PohdColPpd':
                        $stmt->bindValue($identifier, $this->pohdcolppd, PDO::PARAM_STR);

                        break;
                    case 'PohdTeleIntl':
                        $stmt->bindValue($identifier, $this->pohdteleintl, PDO::PARAM_STR);

                        break;
                    case 'PohdTeleNbr':
                        $stmt->bindValue($identifier, $this->pohdtelenbr, PDO::PARAM_STR);

                        break;
                    case 'PohdTeleExt':
                        $stmt->bindValue($identifier, $this->pohdteleext, PDO::PARAM_STR);

                        break;
                    case 'PohdFaxIntl':
                        $stmt->bindValue($identifier, $this->pohdfaxintl, PDO::PARAM_STR);

                        break;
                    case 'PohdFaxNbr':
                        $stmt->bindValue($identifier, $this->pohdfaxnbr, PDO::PARAM_STR);

                        break;
                    case 'PohdRCnt':
                        $stmt->bindValue($identifier, $this->pohdrcnt, PDO::PARAM_STR);

                        break;
                    case 'PohdTaxExem':
                        $stmt->bindValue($identifier, $this->pohdtaxexem, PDO::PARAM_STR);

                        break;
                    case 'PohdExchCtry':
                        $stmt->bindValue($identifier, $this->pohdexchctry, PDO::PARAM_STR);

                        break;
                    case 'PohdExchRate':
                        $stmt->bindValue($identifier, $this->pohdexchrate, PDO::PARAM_STR);

                        break;
                    case 'PohdExptDate':
                        $stmt->bindValue($identifier, $this->pohdexptdate, PDO::PARAM_STR);

                        break;
                    case 'PohdCancDate':
                        $stmt->bindValue($identifier, $this->pohdcancdate, PDO::PARAM_STR);

                        break;
                    case 'PohdICnt':
                        $stmt->bindValue($identifier, $this->pohdicnt, PDO::PARAM_STR);

                        break;
                    case 'PohdFob':
                        $stmt->bindValue($identifier, $this->pohdfob, PDO::PARAM_STR);

                        break;
                    case 'PohdPickQueue':
                        $stmt->bindValue($identifier, $this->pohdpickqueue, PDO::PARAM_STR);

                        break;
                    case 'PohdPackedBy':
                        $stmt->bindValue($identifier, $this->pohdpackedby, PDO::PARAM_STR);

                        break;
                    case 'PohdPackDate':
                        $stmt->bindValue($identifier, $this->pohdpackdate, PDO::PARAM_STR);

                        break;
                    case 'PohdPackTime':
                        $stmt->bindValue($identifier, $this->pohdpacktime, PDO::PARAM_STR);

                        break;
                    case 'PohdLandCost':
                        $stmt->bindValue($identifier, $this->pohdlandcost, PDO::PARAM_STR);

                        break;
                    case 'PohdEdiPoDate':
                        $stmt->bindValue($identifier, $this->pohdedipodate, PDO::PARAM_STR);

                        break;
                    case 'PohdFutureBuy':
                        $stmt->bindValue($identifier, $this->pohdfuturebuy, PDO::PARAM_STR);

                        break;
                    case 'PohdEmailAddr':
                        $stmt->bindValue($identifier, $this->pohdemailaddr, PDO::PARAM_STR);

                        break;
                    case 'PohdShipDate':
                        $stmt->bindValue($identifier, $this->pohdshipdate, PDO::PARAM_STR);

                        break;
                    case 'PohdAckDate':
                        $stmt->bindValue($identifier, $this->pohdackdate, PDO::PARAM_STR);

                        break;
                    case 'PohdReleaseNbr':
                        $stmt->bindValue($identifier, $this->pohdreleasenbr, PDO::PARAM_INT);

                        break;
                    case 'PohdReturnsPo':
                        $stmt->bindValue($identifier, $this->pohdreturnspo, PDO::PARAM_STR);

                        break;
                    case 'DateUpdtd':
                        $stmt->bindValue($identifier, $this->dateupdtd, PDO::PARAM_STR);

                        break;
                    case 'TimeUpdtd':
                        $stmt->bindValue($identifier, $this->timeupdtd, PDO::PARAM_STR);

                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);

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
     * @param ConnectionInterface $con
     *
     * @return int Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con): int
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName(string $name, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EditPoHeadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos Position in XML schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition(int $pos)
    {
        switch ($pos) {
            case 0:
                return $this->getSessionid();

            case 1:
                return $this->getPohdnbr();

            case 2:
                return $this->getPohdstat();

            case 3:
                return $this->getPohdref();

            case 4:
                return $this->getApvevendid();

            case 5:
                return $this->getApfmshipid();

            case 6:
                return $this->getPohdtoname();

            case 7:
                return $this->getPohdtoadr1();

            case 8:
                return $this->getPohdtoadr2();

            case 9:
                return $this->getPohdtoadr3();

            case 10:
                return $this->getPohdtoctry();

            case 11:
                return $this->getPohdtocity();

            case 12:
                return $this->getPohdtostat();

            case 13:
                return $this->getPohdtozipcode();

            case 14:
                return $this->getPohdptname();

            case 15:
                return $this->getPohdptadr1();

            case 16:
                return $this->getPohdptadr2();

            case 17:
                return $this->getPohdptadr3();

            case 18:
                return $this->getPohdptctry();

            case 19:
                return $this->getPohdptcity();

            case 20:
                return $this->getPohdptstat();

            case 21:
                return $this->getPohdptzipcode();

            case 22:
                return $this->getPohdcont();

            case 23:
                return $this->getPohdordrdate();

            case 24:
                return $this->getAptmtermcode();

            case 25:
                return $this->getArtbsviacode();

            case 26:
                return $this->getPohdoldfob();

            case 27:
                return $this->getAptbbuyrcode();

            case 28:
                return $this->getPohdcolppd();

            case 29:
                return $this->getPohdteleintl();

            case 30:
                return $this->getPohdtelenbr();

            case 31:
                return $this->getPohdteleext();

            case 32:
                return $this->getPohdfaxintl();

            case 33:
                return $this->getPohdfaxnbr();

            case 34:
                return $this->getPohdrcnt();

            case 35:
                return $this->getPohdtaxexem();

            case 36:
                return $this->getPohdexchctry();

            case 37:
                return $this->getPohdexchrate();

            case 38:
                return $this->getPohdexptdate();

            case 39:
                return $this->getPohdcancdate();

            case 40:
                return $this->getPohdicnt();

            case 41:
                return $this->getPohdfob();

            case 42:
                return $this->getPohdpickqueue();

            case 43:
                return $this->getPohdpackedby();

            case 44:
                return $this->getPohdpackdate();

            case 45:
                return $this->getPohdpacktime();

            case 46:
                return $this->getPohdlandcost();

            case 47:
                return $this->getPohdedipodate();

            case 48:
                return $this->getPohdfuturebuy();

            case 49:
                return $this->getPohdemailaddr();

            case 50:
                return $this->getPohdshipdate();

            case 51:
                return $this->getPohdackdate();

            case 52:
                return $this->getPohdreleasenbr();

            case 53:
                return $this->getPohdreturnspo();

            case 54:
                return $this->getDateupdtd();

            case 55:
                return $this->getTimeupdtd();

            case 56:
                return $this->getStatus();

            case 57:
                return $this->getDummy();

            default:
                return null;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array An associative array containing the field names (as keys) and field values
     */
    public function toArray(string $keyType = TableMap::TYPE_PHPNAME, bool $includeLazyLoadColumns = true, array $alreadyDumpedObjects = []): array
    {
        if (isset($alreadyDumpedObjects['EditPoHead'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['EditPoHead'][$this->hashCode()] = true;
        $keys = EditPoHeadTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getPohdnbr(),
            $keys[2] => $this->getPohdstat(),
            $keys[3] => $this->getPohdref(),
            $keys[4] => $this->getApvevendid(),
            $keys[5] => $this->getApfmshipid(),
            $keys[6] => $this->getPohdtoname(),
            $keys[7] => $this->getPohdtoadr1(),
            $keys[8] => $this->getPohdtoadr2(),
            $keys[9] => $this->getPohdtoadr3(),
            $keys[10] => $this->getPohdtoctry(),
            $keys[11] => $this->getPohdtocity(),
            $keys[12] => $this->getPohdtostat(),
            $keys[13] => $this->getPohdtozipcode(),
            $keys[14] => $this->getPohdptname(),
            $keys[15] => $this->getPohdptadr1(),
            $keys[16] => $this->getPohdptadr2(),
            $keys[17] => $this->getPohdptadr3(),
            $keys[18] => $this->getPohdptctry(),
            $keys[19] => $this->getPohdptcity(),
            $keys[20] => $this->getPohdptstat(),
            $keys[21] => $this->getPohdptzipcode(),
            $keys[22] => $this->getPohdcont(),
            $keys[23] => $this->getPohdordrdate(),
            $keys[24] => $this->getAptmtermcode(),
            $keys[25] => $this->getArtbsviacode(),
            $keys[26] => $this->getPohdoldfob(),
            $keys[27] => $this->getAptbbuyrcode(),
            $keys[28] => $this->getPohdcolppd(),
            $keys[29] => $this->getPohdteleintl(),
            $keys[30] => $this->getPohdtelenbr(),
            $keys[31] => $this->getPohdteleext(),
            $keys[32] => $this->getPohdfaxintl(),
            $keys[33] => $this->getPohdfaxnbr(),
            $keys[34] => $this->getPohdrcnt(),
            $keys[35] => $this->getPohdtaxexem(),
            $keys[36] => $this->getPohdexchctry(),
            $keys[37] => $this->getPohdexchrate(),
            $keys[38] => $this->getPohdexptdate(),
            $keys[39] => $this->getPohdcancdate(),
            $keys[40] => $this->getPohdicnt(),
            $keys[41] => $this->getPohdfob(),
            $keys[42] => $this->getPohdpickqueue(),
            $keys[43] => $this->getPohdpackedby(),
            $keys[44] => $this->getPohdpackdate(),
            $keys[45] => $this->getPohdpacktime(),
            $keys[46] => $this->getPohdlandcost(),
            $keys[47] => $this->getPohdedipodate(),
            $keys[48] => $this->getPohdfuturebuy(),
            $keys[49] => $this->getPohdemailaddr(),
            $keys[50] => $this->getPohdshipdate(),
            $keys[51] => $this->getPohdackdate(),
            $keys[52] => $this->getPohdreleasenbr(),
            $keys[53] => $this->getPohdreturnspo(),
            $keys[54] => $this->getDateupdtd(),
            $keys[55] => $this->getTimeupdtd(),
            $keys[56] => $this->getStatus(),
            $keys[57] => $this->getDummy(),
        ];
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this
     */
    public function setByName(string $name, $value, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EditPoHeadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        $this->setByPosition($pos, $value);

        return $this;
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return $this
     */
    public function setByPosition(int $pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setPohdnbr($value);
                break;
            case 2:
                $this->setPohdstat($value);
                break;
            case 3:
                $this->setPohdref($value);
                break;
            case 4:
                $this->setApvevendid($value);
                break;
            case 5:
                $this->setApfmshipid($value);
                break;
            case 6:
                $this->setPohdtoname($value);
                break;
            case 7:
                $this->setPohdtoadr1($value);
                break;
            case 8:
                $this->setPohdtoadr2($value);
                break;
            case 9:
                $this->setPohdtoadr3($value);
                break;
            case 10:
                $this->setPohdtoctry($value);
                break;
            case 11:
                $this->setPohdtocity($value);
                break;
            case 12:
                $this->setPohdtostat($value);
                break;
            case 13:
                $this->setPohdtozipcode($value);
                break;
            case 14:
                $this->setPohdptname($value);
                break;
            case 15:
                $this->setPohdptadr1($value);
                break;
            case 16:
                $this->setPohdptadr2($value);
                break;
            case 17:
                $this->setPohdptadr3($value);
                break;
            case 18:
                $this->setPohdptctry($value);
                break;
            case 19:
                $this->setPohdptcity($value);
                break;
            case 20:
                $this->setPohdptstat($value);
                break;
            case 21:
                $this->setPohdptzipcode($value);
                break;
            case 22:
                $this->setPohdcont($value);
                break;
            case 23:
                $this->setPohdordrdate($value);
                break;
            case 24:
                $this->setAptmtermcode($value);
                break;
            case 25:
                $this->setArtbsviacode($value);
                break;
            case 26:
                $this->setPohdoldfob($value);
                break;
            case 27:
                $this->setAptbbuyrcode($value);
                break;
            case 28:
                $this->setPohdcolppd($value);
                break;
            case 29:
                $this->setPohdteleintl($value);
                break;
            case 30:
                $this->setPohdtelenbr($value);
                break;
            case 31:
                $this->setPohdteleext($value);
                break;
            case 32:
                $this->setPohdfaxintl($value);
                break;
            case 33:
                $this->setPohdfaxnbr($value);
                break;
            case 34:
                $this->setPohdrcnt($value);
                break;
            case 35:
                $this->setPohdtaxexem($value);
                break;
            case 36:
                $this->setPohdexchctry($value);
                break;
            case 37:
                $this->setPohdexchrate($value);
                break;
            case 38:
                $this->setPohdexptdate($value);
                break;
            case 39:
                $this->setPohdcancdate($value);
                break;
            case 40:
                $this->setPohdicnt($value);
                break;
            case 41:
                $this->setPohdfob($value);
                break;
            case 42:
                $this->setPohdpickqueue($value);
                break;
            case 43:
                $this->setPohdpackedby($value);
                break;
            case 44:
                $this->setPohdpackdate($value);
                break;
            case 45:
                $this->setPohdpacktime($value);
                break;
            case 46:
                $this->setPohdlandcost($value);
                break;
            case 47:
                $this->setPohdedipodate($value);
                break;
            case 48:
                $this->setPohdfuturebuy($value);
                break;
            case 49:
                $this->setPohdemailaddr($value);
                break;
            case 50:
                $this->setPohdshipdate($value);
                break;
            case 51:
                $this->setPohdackdate($value);
                break;
            case 52:
                $this->setPohdreleasenbr($value);
                break;
            case 53:
                $this->setPohdreturnspo($value);
                break;
            case 54:
                $this->setDateupdtd($value);
                break;
            case 55:
                $this->setTimeupdtd($value);
                break;
            case 56:
                $this->setStatus($value);
                break;
            case 57:
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
     * @param array $arr An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return $this
     */
    public function fromArray(array $arr, string $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = EditPoHeadTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPohdnbr($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPohdstat($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPohdref($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setApvevendid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setApfmshipid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPohdtoname($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPohdtoadr1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPohdtoadr2($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPohdtoadr3($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPohdtoctry($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPohdtocity($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPohdtostat($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPohdtozipcode($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPohdptname($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPohdptadr1($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPohdptadr2($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setPohdptadr3($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPohdptctry($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPohdptcity($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setPohdptstat($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPohdptzipcode($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPohdcont($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setPohdordrdate($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setAptmtermcode($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setArtbsviacode($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPohdoldfob($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setAptbbuyrcode($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setPohdcolppd($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setPohdteleintl($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setPohdtelenbr($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setPohdteleext($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setPohdfaxintl($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setPohdfaxnbr($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setPohdrcnt($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setPohdtaxexem($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setPohdexchctry($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setPohdexchrate($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setPohdexptdate($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setPohdcancdate($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setPohdicnt($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setPohdfob($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setPohdpickqueue($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setPohdpackedby($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setPohdpackdate($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setPohdpacktime($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setPohdlandcost($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setPohdedipodate($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setPohdfuturebuy($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setPohdemailaddr($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setPohdshipdate($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setPohdackdate($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setPohdreleasenbr($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setPohdreturnspo($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setDateupdtd($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setTimeupdtd($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setStatus($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setDummy($arr[$keys[57]]);
        }

        return $this;
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
     * @return $this The current object, for fluid interface
     */
    public function importFrom($parser, string $data, string $keyType = TableMap::TYPE_PHPNAME)
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
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria(): Criteria
    {
        $criteria = new Criteria(EditPoHeadTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EditPoHeadTableMap::COL_SESSIONID)) {
            $criteria->add(EditPoHeadTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDNBR)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDNBR, $this->pohdnbr);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDSTAT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDSTAT, $this->pohdstat);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDREF)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDREF, $this->pohdref);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APVEVENDID)) {
            $criteria->add(EditPoHeadTableMap::COL_APVEVENDID, $this->apvevendid);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APFMSHIPID)) {
            $criteria->add(EditPoHeadTableMap::COL_APFMSHIPID, $this->apfmshipid);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTONAME)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTONAME, $this->pohdtoname);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOADR1)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOADR1, $this->pohdtoadr1);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOADR2)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOADR2, $this->pohdtoadr2);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOADR3)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOADR3, $this->pohdtoadr3);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOCTRY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOCTRY, $this->pohdtoctry);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOCITY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOCITY, $this->pohdtocity);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOSTAT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOSTAT, $this->pohdtostat);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTOZIPCODE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTOZIPCODE, $this->pohdtozipcode);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTNAME)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTNAME, $this->pohdptname);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTADR1)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTADR1, $this->pohdptadr1);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTADR2)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTADR2, $this->pohdptadr2);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTADR3)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTADR3, $this->pohdptadr3);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTCTRY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTCTRY, $this->pohdptctry);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTCITY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTCITY, $this->pohdptcity);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTSTAT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTSTAT, $this->pohdptstat);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPTZIPCODE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPTZIPCODE, $this->pohdptzipcode);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDCONT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDCONT, $this->pohdcont);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDORDRDATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDORDRDATE, $this->pohdordrdate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APTMTERMCODE)) {
            $criteria->add(EditPoHeadTableMap::COL_APTMTERMCODE, $this->aptmtermcode);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_ARTBSVIACODE)) {
            $criteria->add(EditPoHeadTableMap::COL_ARTBSVIACODE, $this->artbsviacode);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDOLDFOB)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDOLDFOB, $this->pohdoldfob);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_APTBBUYRCODE)) {
            $criteria->add(EditPoHeadTableMap::COL_APTBBUYRCODE, $this->aptbbuyrcode);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDCOLPPD)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDCOLPPD, $this->pohdcolppd);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTELEINTL)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTELEINTL, $this->pohdteleintl);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTELENBR)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTELENBR, $this->pohdtelenbr);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTELEEXT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTELEEXT, $this->pohdteleext);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFAXINTL)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDFAXINTL, $this->pohdfaxintl);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFAXNBR)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDFAXNBR, $this->pohdfaxnbr);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDRCNT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDRCNT, $this->pohdrcnt);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDTAXEXEM)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDTAXEXEM, $this->pohdtaxexem);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEXCHCTRY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDEXCHCTRY, $this->pohdexchctry);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEXCHRATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDEXCHRATE, $this->pohdexchrate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEXPTDATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDEXPTDATE, $this->pohdexptdate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDCANCDATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDCANCDATE, $this->pohdcancdate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDICNT)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDICNT, $this->pohdicnt);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFOB)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDFOB, $this->pohdfob);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPICKQUEUE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPICKQUEUE, $this->pohdpickqueue);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPACKEDBY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPACKEDBY, $this->pohdpackedby);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPACKDATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPACKDATE, $this->pohdpackdate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDPACKTIME)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDPACKTIME, $this->pohdpacktime);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDLANDCOST)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDLANDCOST, $this->pohdlandcost);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEDIPODATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDEDIPODATE, $this->pohdedipodate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDFUTUREBUY)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDFUTUREBUY, $this->pohdfuturebuy);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDEMAILADDR)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDEMAILADDR, $this->pohdemailaddr);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDSHIPDATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDSHIPDATE, $this->pohdshipdate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDACKDATE)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDACKDATE, $this->pohdackdate);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDRELEASENBR)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDRELEASENBR, $this->pohdreleasenbr);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_POHDRETURNSPO)) {
            $criteria->add(EditPoHeadTableMap::COL_POHDRETURNSPO, $this->pohdreturnspo);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_DATEUPDTD)) {
            $criteria->add(EditPoHeadTableMap::COL_DATEUPDTD, $this->dateupdtd);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_TIMEUPDTD)) {
            $criteria->add(EditPoHeadTableMap::COL_TIMEUPDTD, $this->timeupdtd);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_STATUS)) {
            $criteria->add(EditPoHeadTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EditPoHeadTableMap::COL_DUMMY)) {
            $criteria->add(EditPoHeadTableMap::COL_DUMMY, $this->dummy);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria(): Criteria
    {
        $criteria = ChildEditPoHeadQuery::create();
        $criteria->add(EditPoHeadTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(EditPoHeadTableMap::COL_POHDNBR, $this->pohdnbr);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int|string Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getSessionid() &&
            null !== $this->getPohdnbr();

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
        $pks = [];
        $pks[0] = $this->getSessionid();
        $pks[1] = $this->getPohdnbr();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey(array $keys): void
    {
        $this->setSessionid($keys[0]);
        $this->setPohdnbr($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return (null === $this->getSessionid()) && (null === $this->getPohdnbr());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \EditPoHead (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setPohdnbr($this->getPohdnbr());
        $copyObj->setPohdstat($this->getPohdstat());
        $copyObj->setPohdref($this->getPohdref());
        $copyObj->setApvevendid($this->getApvevendid());
        $copyObj->setApfmshipid($this->getApfmshipid());
        $copyObj->setPohdtoname($this->getPohdtoname());
        $copyObj->setPohdtoadr1($this->getPohdtoadr1());
        $copyObj->setPohdtoadr2($this->getPohdtoadr2());
        $copyObj->setPohdtoadr3($this->getPohdtoadr3());
        $copyObj->setPohdtoctry($this->getPohdtoctry());
        $copyObj->setPohdtocity($this->getPohdtocity());
        $copyObj->setPohdtostat($this->getPohdtostat());
        $copyObj->setPohdtozipcode($this->getPohdtozipcode());
        $copyObj->setPohdptname($this->getPohdptname());
        $copyObj->setPohdptadr1($this->getPohdptadr1());
        $copyObj->setPohdptadr2($this->getPohdptadr2());
        $copyObj->setPohdptadr3($this->getPohdptadr3());
        $copyObj->setPohdptctry($this->getPohdptctry());
        $copyObj->setPohdptcity($this->getPohdptcity());
        $copyObj->setPohdptstat($this->getPohdptstat());
        $copyObj->setPohdptzipcode($this->getPohdptzipcode());
        $copyObj->setPohdcont($this->getPohdcont());
        $copyObj->setPohdordrdate($this->getPohdordrdate());
        $copyObj->setAptmtermcode($this->getAptmtermcode());
        $copyObj->setArtbsviacode($this->getArtbsviacode());
        $copyObj->setPohdoldfob($this->getPohdoldfob());
        $copyObj->setAptbbuyrcode($this->getAptbbuyrcode());
        $copyObj->setPohdcolppd($this->getPohdcolppd());
        $copyObj->setPohdteleintl($this->getPohdteleintl());
        $copyObj->setPohdtelenbr($this->getPohdtelenbr());
        $copyObj->setPohdteleext($this->getPohdteleext());
        $copyObj->setPohdfaxintl($this->getPohdfaxintl());
        $copyObj->setPohdfaxnbr($this->getPohdfaxnbr());
        $copyObj->setPohdrcnt($this->getPohdrcnt());
        $copyObj->setPohdtaxexem($this->getPohdtaxexem());
        $copyObj->setPohdexchctry($this->getPohdexchctry());
        $copyObj->setPohdexchrate($this->getPohdexchrate());
        $copyObj->setPohdexptdate($this->getPohdexptdate());
        $copyObj->setPohdcancdate($this->getPohdcancdate());
        $copyObj->setPohdicnt($this->getPohdicnt());
        $copyObj->setPohdfob($this->getPohdfob());
        $copyObj->setPohdpickqueue($this->getPohdpickqueue());
        $copyObj->setPohdpackedby($this->getPohdpackedby());
        $copyObj->setPohdpackdate($this->getPohdpackdate());
        $copyObj->setPohdpacktime($this->getPohdpacktime());
        $copyObj->setPohdlandcost($this->getPohdlandcost());
        $copyObj->setPohdedipodate($this->getPohdedipodate());
        $copyObj->setPohdfuturebuy($this->getPohdfuturebuy());
        $copyObj->setPohdemailaddr($this->getPohdemailaddr());
        $copyObj->setPohdshipdate($this->getPohdshipdate());
        $copyObj->setPohdackdate($this->getPohdackdate());
        $copyObj->setPohdreleasenbr($this->getPohdreleasenbr());
        $copyObj->setPohdreturnspo($this->getPohdreturnspo());
        $copyObj->setDateupdtd($this->getDateupdtd());
        $copyObj->setTimeupdtd($this->getTimeupdtd());
        $copyObj->setStatus($this->getStatus());
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
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \EditPoHead Clone of current object.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function copy(bool $deepCopy = false)
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
     *
     * @return $this
     */
    public function clear()
    {
        $this->sessionid = null;
        $this->pohdnbr = null;
        $this->pohdstat = null;
        $this->pohdref = null;
        $this->apvevendid = null;
        $this->apfmshipid = null;
        $this->pohdtoname = null;
        $this->pohdtoadr1 = null;
        $this->pohdtoadr2 = null;
        $this->pohdtoadr3 = null;
        $this->pohdtoctry = null;
        $this->pohdtocity = null;
        $this->pohdtostat = null;
        $this->pohdtozipcode = null;
        $this->pohdptname = null;
        $this->pohdptadr1 = null;
        $this->pohdptadr2 = null;
        $this->pohdptadr3 = null;
        $this->pohdptctry = null;
        $this->pohdptcity = null;
        $this->pohdptstat = null;
        $this->pohdptzipcode = null;
        $this->pohdcont = null;
        $this->pohdordrdate = null;
        $this->aptmtermcode = null;
        $this->artbsviacode = null;
        $this->pohdoldfob = null;
        $this->aptbbuyrcode = null;
        $this->pohdcolppd = null;
        $this->pohdteleintl = null;
        $this->pohdtelenbr = null;
        $this->pohdteleext = null;
        $this->pohdfaxintl = null;
        $this->pohdfaxnbr = null;
        $this->pohdrcnt = null;
        $this->pohdtaxexem = null;
        $this->pohdexchctry = null;
        $this->pohdexchrate = null;
        $this->pohdexptdate = null;
        $this->pohdcancdate = null;
        $this->pohdicnt = null;
        $this->pohdfob = null;
        $this->pohdpickqueue = null;
        $this->pohdpackedby = null;
        $this->pohdpackdate = null;
        $this->pohdpacktime = null;
        $this->pohdlandcost = null;
        $this->pohdedipodate = null;
        $this->pohdfuturebuy = null;
        $this->pohdemailaddr = null;
        $this->pohdshipdate = null;
        $this->pohdackdate = null;
        $this->pohdreleasenbr = null;
        $this->pohdreturnspo = null;
        $this->dateupdtd = null;
        $this->timeupdtd = null;
        $this->status = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);

        return $this;
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param bool $deep Whether to also clear the references on all referrer objects.
     * @return $this
     */
    public function clearAllReferences(bool $deep = false)
    {
        if ($deep) {
        } // if ($deep)

        return $this;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EditPoHeadTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preSave(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postSave(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before inserting to database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preInsert(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postInsert(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preUpdate(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postUpdate(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preDelete(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postDelete(?ConnectionInterface $con = null): void
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed $params
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
            $inputData = $params[0];
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->importFrom($format, $inputData, $keyType);
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = $params[0] ?? true;
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
