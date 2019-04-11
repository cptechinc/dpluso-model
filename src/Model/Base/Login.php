<?php

namespace Base;

use \LoginQuery as ChildLoginQuery;
use \Exception;
use \PDO;
use Map\LoginTableMap;
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
 * Base class that represents a row from the 'login' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Login implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\LoginTableMap';


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
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the recordno field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $recordno;

    /**
     * The value for the date field.
     *
     * @var        string
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        string
     */
    protected $time;

    /**
     * The value for the custid field.
     *
     * @var        string
     */
    protected $custid;

    /**
     * The value for the shiptoid field.
     *
     * @var        string
     */
    protected $shiptoid;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the address1 field.
     *
     * @var        string
     */
    protected $address1;

    /**
     * The value for the address2 field.
     *
     * @var        string
     */
    protected $address2;

    /**
     * The value for the city field.
     *
     * @var        string
     */
    protected $city;

    /**
     * The value for the st field.
     *
     * @var        string
     */
    protected $st;

    /**
     * The value for the zip field.
     *
     * @var        string
     */
    protected $zip;

    /**
     * The value for the phone field.
     *
     * @var        string
     */
    protected $phone;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the contact field.
     *
     * @var        string
     */
    protected $contact;

    /**
     * The value for the validlogin field.
     *
     * @var        string
     */
    protected $validlogin;

    /**
     * The value for the cconly field.
     *
     * @var        string
     */
    protected $cconly;

    /**
     * The value for the ermes field.
     *
     * @var        string
     */
    protected $ermes;

    /**
     * The value for the passwd field.
     *
     * @var        string
     */
    protected $passwd;

    /**
     * The value for the cbi field.
     *
     * @var        string
     */
    protected $cbi;

    /**
     * The value for the mmn field.
     *
     * @var        string
     */
    protected $mmn;

    /**
     * The value for the country field.
     *
     * @var        string
     */
    protected $country;

    /**
     * The value for the type field.
     *
     * @var        string
     */
    protected $type;

    /**
     * The value for the address3 field.
     *
     * @var        string
     */
    protected $address3;

    /**
     * The value for the vpromo field.
     *
     * @var        string
     */
    protected $vpromo;

    /**
     * The value for the promocode field.
     *
     * @var        string
     */
    protected $promocode;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->sessionid = '0';
        $this->recordno = 0;
    }

    /**
     * Initializes internal state of Base\Login object.
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
     * Compares this with another <code>Login</code> instance.  If
     * <code>obj</code> is an instance of <code>Login</code>, delegates to
     * <code>equals(Login)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Login The current object, for fluid interface
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
     * Get the [recordno] column value.
     *
     * @return int
     */
    public function getRecordno()
    {
        return $this->recordno;
    }

    /**
     * Get the [date] column value.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [time] column value.
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [address1] column value.
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Get the [address2] column value.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Get the [city] column value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the [st] column value.
     *
     * @return string
     */
    public function getSt()
    {
        return $this->st;
    }

    /**
     * Get the [zip] column value.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
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
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Get the [validlogin] column value.
     *
     * @return string
     */
    public function getValidlogin()
    {
        return $this->validlogin;
    }

    /**
     * Get the [cconly] column value.
     *
     * @return string
     */
    public function getCconly()
    {
        return $this->cconly;
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
     * Get the [passwd] column value.
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Get the [cbi] column value.
     *
     * @return string
     */
    public function getCbi()
    {
        return $this->cbi;
    }

    /**
     * Get the [mmn] column value.
     *
     * @return string
     */
    public function getMmn()
    {
        return $this->mmn;
    }

    /**
     * Get the [country] column value.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
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
     * Get the [address3] column value.
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Get the [vpromo] column value.
     *
     * @return string
     */
    public function getVpromo()
    {
        return $this->vpromo;
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
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[LoginTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recordno] column.
     *
     * @param int $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setRecordno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recordno !== $v) {
            $this->recordno = $v;
            $this->modifiedColumns[LoginTableMap::COL_RECORDNO] = true;
        }

        return $this;
    } // setRecordno()

    /**
     * Set the value of [date] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[LoginTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[LoginTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[LoginTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[LoginTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[LoginTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [address1] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[LoginTableMap::COL_ADDRESS1] = true;
        }

        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[LoginTableMap::COL_ADDRESS2] = true;
        }

        return $this;
    } // setAddress2()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[LoginTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [st] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setSt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->st !== $v) {
            $this->st = $v;
            $this->modifiedColumns[LoginTableMap::COL_ST] = true;
        }

        return $this;
    } // setSt()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[LoginTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[LoginTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[LoginTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [contact] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setContact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact !== $v) {
            $this->contact = $v;
            $this->modifiedColumns[LoginTableMap::COL_CONTACT] = true;
        }

        return $this;
    } // setContact()

    /**
     * Set the value of [validlogin] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setValidlogin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->validlogin !== $v) {
            $this->validlogin = $v;
            $this->modifiedColumns[LoginTableMap::COL_VALIDLOGIN] = true;
        }

        return $this;
    } // setValidlogin()

    /**
     * Set the value of [cconly] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setCconly($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cconly !== $v) {
            $this->cconly = $v;
            $this->modifiedColumns[LoginTableMap::COL_CCONLY] = true;
        }

        return $this;
    } // setCconly()

    /**
     * Set the value of [ermes] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setErmes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ermes !== $v) {
            $this->ermes = $v;
            $this->modifiedColumns[LoginTableMap::COL_ERMES] = true;
        }

        return $this;
    } // setErmes()

    /**
     * Set the value of [passwd] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setPasswd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->passwd !== $v) {
            $this->passwd = $v;
            $this->modifiedColumns[LoginTableMap::COL_PASSWD] = true;
        }

        return $this;
    } // setPasswd()

    /**
     * Set the value of [cbi] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setCbi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cbi !== $v) {
            $this->cbi = $v;
            $this->modifiedColumns[LoginTableMap::COL_CBI] = true;
        }

        return $this;
    } // setCbi()

    /**
     * Set the value of [mmn] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setMmn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mmn !== $v) {
            $this->mmn = $v;
            $this->modifiedColumns[LoginTableMap::COL_MMN] = true;
        }

        return $this;
    } // setMmn()

    /**
     * Set the value of [country] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country !== $v) {
            $this->country = $v;
            $this->modifiedColumns[LoginTableMap::COL_COUNTRY] = true;
        }

        return $this;
    } // setCountry()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[LoginTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [address3] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[LoginTableMap::COL_ADDRESS3] = true;
        }

        return $this;
    } // setAddress3()

    /**
     * Set the value of [vpromo] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setVpromo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vpromo !== $v) {
            $this->vpromo = $v;
            $this->modifiedColumns[LoginTableMap::COL_VPROMO] = true;
        }

        return $this;
    } // setVpromo()

    /**
     * Set the value of [promocode] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setPromocode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->promocode !== $v) {
            $this->promocode = $v;
            $this->modifiedColumns[LoginTableMap::COL_PROMOCODE] = true;
        }

        return $this;
    } // setPromocode()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Login The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[LoginTableMap::COL_DUMMY] = true;
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
            if ($this->sessionid !== '0') {
                return false;
            }

            if ($this->recordno !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : LoginTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : LoginTableMap::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recordno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : LoginTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : LoginTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : LoginTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : LoginTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : LoginTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : LoginTableMap::translateFieldName('Address1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : LoginTableMap::translateFieldName('Address2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : LoginTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : LoginTableMap::translateFieldName('St', TableMap::TYPE_PHPNAME, $indexType)];
            $this->st = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : LoginTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : LoginTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : LoginTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : LoginTableMap::translateFieldName('Contact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : LoginTableMap::translateFieldName('Validlogin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->validlogin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : LoginTableMap::translateFieldName('Cconly', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cconly = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : LoginTableMap::translateFieldName('Ermes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ermes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : LoginTableMap::translateFieldName('Passwd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->passwd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : LoginTableMap::translateFieldName('Cbi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cbi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : LoginTableMap::translateFieldName('Mmn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mmn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : LoginTableMap::translateFieldName('Country', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : LoginTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : LoginTableMap::translateFieldName('Address3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : LoginTableMap::translateFieldName('Vpromo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vpromo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : LoginTableMap::translateFieldName('Promocode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->promocode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : LoginTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 27; // 27 = LoginTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Login'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(LoginTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildLoginQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Login::setDeleted()
     * @see Login::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildLoginQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginTableMap::DATABASE_NAME);
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
                LoginTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(LoginTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(LoginTableMap::COL_RECORDNO)) {
            $modifiedColumns[':p' . $index++]  = 'recordno';
        }
        if ($this->isColumnModified(LoginTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(LoginTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(LoginTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(LoginTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(LoginTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(LoginTableMap::COL_ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = 'address1';
        }
        if ($this->isColumnModified(LoginTableMap::COL_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'address2';
        }
        if ($this->isColumnModified(LoginTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(LoginTableMap::COL_ST)) {
            $modifiedColumns[':p' . $index++]  = 'st';
        }
        if ($this->isColumnModified(LoginTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'zip';
        }
        if ($this->isColumnModified(LoginTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(LoginTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(LoginTableMap::COL_CONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'contact';
        }
        if ($this->isColumnModified(LoginTableMap::COL_VALIDLOGIN)) {
            $modifiedColumns[':p' . $index++]  = 'validlogin';
        }
        if ($this->isColumnModified(LoginTableMap::COL_CCONLY)) {
            $modifiedColumns[':p' . $index++]  = 'cconly';
        }
        if ($this->isColumnModified(LoginTableMap::COL_ERMES)) {
            $modifiedColumns[':p' . $index++]  = 'ermes';
        }
        if ($this->isColumnModified(LoginTableMap::COL_PASSWD)) {
            $modifiedColumns[':p' . $index++]  = 'passwd';
        }
        if ($this->isColumnModified(LoginTableMap::COL_CBI)) {
            $modifiedColumns[':p' . $index++]  = 'cbi';
        }
        if ($this->isColumnModified(LoginTableMap::COL_MMN)) {
            $modifiedColumns[':p' . $index++]  = 'mmn';
        }
        if ($this->isColumnModified(LoginTableMap::COL_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'country';
        }
        if ($this->isColumnModified(LoginTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(LoginTableMap::COL_ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'address3';
        }
        if ($this->isColumnModified(LoginTableMap::COL_VPROMO)) {
            $modifiedColumns[':p' . $index++]  = 'vpromo';
        }
        if ($this->isColumnModified(LoginTableMap::COL_PROMOCODE)) {
            $modifiedColumns[':p' . $index++]  = 'promocode';
        }
        if ($this->isColumnModified(LoginTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO login (%s) VALUES (%s)',
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
                    case 'recordno':
                        $stmt->bindValue($identifier, $this->recordno, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_STR);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'address1':
                        $stmt->bindValue($identifier, $this->address1, PDO::PARAM_STR);
                        break;
                    case 'address2':
                        $stmt->bindValue($identifier, $this->address2, PDO::PARAM_STR);
                        break;
                    case 'city':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'st':
                        $stmt->bindValue($identifier, $this->st, PDO::PARAM_STR);
                        break;
                    case 'zip':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'contact':
                        $stmt->bindValue($identifier, $this->contact, PDO::PARAM_STR);
                        break;
                    case 'validlogin':
                        $stmt->bindValue($identifier, $this->validlogin, PDO::PARAM_STR);
                        break;
                    case 'cconly':
                        $stmt->bindValue($identifier, $this->cconly, PDO::PARAM_STR);
                        break;
                    case 'ermes':
                        $stmt->bindValue($identifier, $this->ermes, PDO::PARAM_STR);
                        break;
                    case 'passwd':
                        $stmt->bindValue($identifier, $this->passwd, PDO::PARAM_STR);
                        break;
                    case 'cbi':
                        $stmt->bindValue($identifier, $this->cbi, PDO::PARAM_STR);
                        break;
                    case 'mmn':
                        $stmt->bindValue($identifier, $this->mmn, PDO::PARAM_STR);
                        break;
                    case 'country':
                        $stmt->bindValue($identifier, $this->country, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'address3':
                        $stmt->bindValue($identifier, $this->address3, PDO::PARAM_STR);
                        break;
                    case 'vpromo':
                        $stmt->bindValue($identifier, $this->vpromo, PDO::PARAM_STR);
                        break;
                    case 'promocode':
                        $stmt->bindValue($identifier, $this->promocode, PDO::PARAM_STR);
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
        $pos = LoginTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRecordno();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getCustid();
                break;
            case 5:
                return $this->getShiptoid();
                break;
            case 6:
                return $this->getName();
                break;
            case 7:
                return $this->getAddress1();
                break;
            case 8:
                return $this->getAddress2();
                break;
            case 9:
                return $this->getCity();
                break;
            case 10:
                return $this->getSt();
                break;
            case 11:
                return $this->getZip();
                break;
            case 12:
                return $this->getPhone();
                break;
            case 13:
                return $this->getEmail();
                break;
            case 14:
                return $this->getContact();
                break;
            case 15:
                return $this->getValidlogin();
                break;
            case 16:
                return $this->getCconly();
                break;
            case 17:
                return $this->getErmes();
                break;
            case 18:
                return $this->getPasswd();
                break;
            case 19:
                return $this->getCbi();
                break;
            case 20:
                return $this->getMmn();
                break;
            case 21:
                return $this->getCountry();
                break;
            case 22:
                return $this->getType();
                break;
            case 23:
                return $this->getAddress3();
                break;
            case 24:
                return $this->getVpromo();
                break;
            case 25:
                return $this->getPromocode();
                break;
            case 26:
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

        if (isset($alreadyDumpedObjects['Login'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Login'][$this->hashCode()] = true;
        $keys = LoginTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecordno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getCustid(),
            $keys[5] => $this->getShiptoid(),
            $keys[6] => $this->getName(),
            $keys[7] => $this->getAddress1(),
            $keys[8] => $this->getAddress2(),
            $keys[9] => $this->getCity(),
            $keys[10] => $this->getSt(),
            $keys[11] => $this->getZip(),
            $keys[12] => $this->getPhone(),
            $keys[13] => $this->getEmail(),
            $keys[14] => $this->getContact(),
            $keys[15] => $this->getValidlogin(),
            $keys[16] => $this->getCconly(),
            $keys[17] => $this->getErmes(),
            $keys[18] => $this->getPasswd(),
            $keys[19] => $this->getCbi(),
            $keys[20] => $this->getMmn(),
            $keys[21] => $this->getCountry(),
            $keys[22] => $this->getType(),
            $keys[23] => $this->getAddress3(),
            $keys[24] => $this->getVpromo(),
            $keys[25] => $this->getPromocode(),
            $keys[26] => $this->getDummy(),
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
     * @return $this|\Login
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = LoginTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Login
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setRecordno($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setCustid($value);
                break;
            case 5:
                $this->setShiptoid($value);
                break;
            case 6:
                $this->setName($value);
                break;
            case 7:
                $this->setAddress1($value);
                break;
            case 8:
                $this->setAddress2($value);
                break;
            case 9:
                $this->setCity($value);
                break;
            case 10:
                $this->setSt($value);
                break;
            case 11:
                $this->setZip($value);
                break;
            case 12:
                $this->setPhone($value);
                break;
            case 13:
                $this->setEmail($value);
                break;
            case 14:
                $this->setContact($value);
                break;
            case 15:
                $this->setValidlogin($value);
                break;
            case 16:
                $this->setCconly($value);
                break;
            case 17:
                $this->setErmes($value);
                break;
            case 18:
                $this->setPasswd($value);
                break;
            case 19:
                $this->setCbi($value);
                break;
            case 20:
                $this->setMmn($value);
                break;
            case 21:
                $this->setCountry($value);
                break;
            case 22:
                $this->setType($value);
                break;
            case 23:
                $this->setAddress3($value);
                break;
            case 24:
                $this->setVpromo($value);
                break;
            case 25:
                $this->setPromocode($value);
                break;
            case 26:
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
        $keys = LoginTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRecordno($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCustid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setShiptoid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAddress1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAddress2($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCity($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSt($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setZip($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPhone($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setEmail($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setContact($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setValidlogin($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCconly($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setErmes($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPasswd($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCbi($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setMmn($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setCountry($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setType($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setAddress3($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setVpromo($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setPromocode($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setDummy($arr[$keys[26]]);
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
     * @return $this|\Login The current object, for fluid interface
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
        $criteria = new Criteria(LoginTableMap::DATABASE_NAME);

        if ($this->isColumnModified(LoginTableMap::COL_SESSIONID)) {
            $criteria->add(LoginTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(LoginTableMap::COL_RECORDNO)) {
            $criteria->add(LoginTableMap::COL_RECORDNO, $this->recordno);
        }
        if ($this->isColumnModified(LoginTableMap::COL_DATE)) {
            $criteria->add(LoginTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(LoginTableMap::COL_TIME)) {
            $criteria->add(LoginTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(LoginTableMap::COL_CUSTID)) {
            $criteria->add(LoginTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(LoginTableMap::COL_SHIPTOID)) {
            $criteria->add(LoginTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(LoginTableMap::COL_NAME)) {
            $criteria->add(LoginTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(LoginTableMap::COL_ADDRESS1)) {
            $criteria->add(LoginTableMap::COL_ADDRESS1, $this->address1);
        }
        if ($this->isColumnModified(LoginTableMap::COL_ADDRESS2)) {
            $criteria->add(LoginTableMap::COL_ADDRESS2, $this->address2);
        }
        if ($this->isColumnModified(LoginTableMap::COL_CITY)) {
            $criteria->add(LoginTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(LoginTableMap::COL_ST)) {
            $criteria->add(LoginTableMap::COL_ST, $this->st);
        }
        if ($this->isColumnModified(LoginTableMap::COL_ZIP)) {
            $criteria->add(LoginTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(LoginTableMap::COL_PHONE)) {
            $criteria->add(LoginTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(LoginTableMap::COL_EMAIL)) {
            $criteria->add(LoginTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(LoginTableMap::COL_CONTACT)) {
            $criteria->add(LoginTableMap::COL_CONTACT, $this->contact);
        }
        if ($this->isColumnModified(LoginTableMap::COL_VALIDLOGIN)) {
            $criteria->add(LoginTableMap::COL_VALIDLOGIN, $this->validlogin);
        }
        if ($this->isColumnModified(LoginTableMap::COL_CCONLY)) {
            $criteria->add(LoginTableMap::COL_CCONLY, $this->cconly);
        }
        if ($this->isColumnModified(LoginTableMap::COL_ERMES)) {
            $criteria->add(LoginTableMap::COL_ERMES, $this->ermes);
        }
        if ($this->isColumnModified(LoginTableMap::COL_PASSWD)) {
            $criteria->add(LoginTableMap::COL_PASSWD, $this->passwd);
        }
        if ($this->isColumnModified(LoginTableMap::COL_CBI)) {
            $criteria->add(LoginTableMap::COL_CBI, $this->cbi);
        }
        if ($this->isColumnModified(LoginTableMap::COL_MMN)) {
            $criteria->add(LoginTableMap::COL_MMN, $this->mmn);
        }
        if ($this->isColumnModified(LoginTableMap::COL_COUNTRY)) {
            $criteria->add(LoginTableMap::COL_COUNTRY, $this->country);
        }
        if ($this->isColumnModified(LoginTableMap::COL_TYPE)) {
            $criteria->add(LoginTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(LoginTableMap::COL_ADDRESS3)) {
            $criteria->add(LoginTableMap::COL_ADDRESS3, $this->address3);
        }
        if ($this->isColumnModified(LoginTableMap::COL_VPROMO)) {
            $criteria->add(LoginTableMap::COL_VPROMO, $this->vpromo);
        }
        if ($this->isColumnModified(LoginTableMap::COL_PROMOCODE)) {
            $criteria->add(LoginTableMap::COL_PROMOCODE, $this->promocode);
        }
        if ($this->isColumnModified(LoginTableMap::COL_DUMMY)) {
            $criteria->add(LoginTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildLoginQuery::create();
        $criteria->add(LoginTableMap::COL_SESSIONID, $this->sessionid);

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
        $validPk = null !== $this->getSessionid();

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
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getSessionid();
    }

    /**
     * Generic method to set the primary key (sessionid column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSessionid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getSessionid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Login (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setRecordno($this->getRecordno());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setName($this->getName());
        $copyObj->setAddress1($this->getAddress1());
        $copyObj->setAddress2($this->getAddress2());
        $copyObj->setCity($this->getCity());
        $copyObj->setSt($this->getSt());
        $copyObj->setZip($this->getZip());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setContact($this->getContact());
        $copyObj->setValidlogin($this->getValidlogin());
        $copyObj->setCconly($this->getCconly());
        $copyObj->setErmes($this->getErmes());
        $copyObj->setPasswd($this->getPasswd());
        $copyObj->setCbi($this->getCbi());
        $copyObj->setMmn($this->getMmn());
        $copyObj->setCountry($this->getCountry());
        $copyObj->setType($this->getType());
        $copyObj->setAddress3($this->getAddress3());
        $copyObj->setVpromo($this->getVpromo());
        $copyObj->setPromocode($this->getPromocode());
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
     * @return \Login Clone of current object.
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
        $this->recordno = null;
        $this->date = null;
        $this->time = null;
        $this->custid = null;
        $this->shiptoid = null;
        $this->name = null;
        $this->address1 = null;
        $this->address2 = null;
        $this->city = null;
        $this->st = null;
        $this->zip = null;
        $this->phone = null;
        $this->email = null;
        $this->contact = null;
        $this->validlogin = null;
        $this->cconly = null;
        $this->ermes = null;
        $this->passwd = null;
        $this->cbi = null;
        $this->mmn = null;
        $this->country = null;
        $this->type = null;
        $this->address3 = null;
        $this->vpromo = null;
        $this->promocode = null;
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
        return (string) $this->exportTo(LoginTableMap::DEFAULT_STRING_FORMAT);
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
