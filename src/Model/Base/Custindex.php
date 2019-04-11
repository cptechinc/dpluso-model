<?php

namespace Base;

use \CustindexQuery as ChildCustindexQuery;
use \Exception;
use \PDO;
use Map\CustindexTableMap;
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
 * Base class that represents a row from the 'custindex' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Custindex implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CustindexTableMap';


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
     * The value for the splogin1 field.
     *
     * @var        string
     */
    protected $splogin1;

    /**
     * The value for the splogin2 field.
     *
     * @var        string
     */
    protected $splogin2;

    /**
     * The value for the splogin3 field.
     *
     * @var        string
     */
    protected $splogin3;

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
     * The value for the addr1 field.
     *
     * @var        string
     */
    protected $addr1;

    /**
     * The value for the addr2 field.
     *
     * @var        string
     */
    protected $addr2;

    /**
     * The value for the city field.
     *
     * @var        string
     */
    protected $city;

    /**
     * The value for the state field.
     *
     * @var        string
     */
    protected $state;

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
     * The value for the cellphone field.
     *
     * @var        string
     */
    protected $cellphone;

    /**
     * The value for the contact field.
     *
     * @var        string
     */
    protected $contact;

    /**
     * The value for the source field.
     *
     * @var        string
     */
    protected $source;

    /**
     * The value for the extension field.
     *
     * @var        string
     */
    protected $extension;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the typecode field.
     *
     * @var        string
     */
    protected $typecode;

    /**
     * The value for the faxnbr field.
     *
     * @var        string
     */
    protected $faxnbr;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the arcontact field.
     *
     * @var        string
     */
    protected $arcontact;

    /**
     * The value for the dunningcontact field.
     *
     * @var        string
     */
    protected $dunningcontact;

    /**
     * The value for the buyingcontact field.
     *
     * @var        string
     */
    protected $buyingcontact;

    /**
     * The value for the certcontact field.
     *
     * @var        string
     */
    protected $certcontact;

    /**
     * The value for the ackcontact field.
     *
     * @var        string
     */
    protected $ackcontact;

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
     * Initializes internal state of Base\Custindex object.
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
     * Compares this with another <code>Custindex</code> instance.  If
     * <code>obj</code> is an instance of <code>Custindex</code>, delegates to
     * <code>equals(Custindex)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Custindex The current object, for fluid interface
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
     * Get the [splogin1] column value.
     *
     * @return string
     */
    public function getSplogin1()
    {
        return $this->splogin1;
    }

    /**
     * Get the [splogin2] column value.
     *
     * @return string
     */
    public function getSplogin2()
    {
        return $this->splogin2;
    }

    /**
     * Get the [splogin3] column value.
     *
     * @return string
     */
    public function getSplogin3()
    {
        return $this->splogin3;
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
     * Get the [addr1] column value.
     *
     * @return string
     */
    public function getAddr1()
    {
        return $this->addr1;
    }

    /**
     * Get the [addr2] column value.
     *
     * @return string
     */
    public function getAddr2()
    {
        return $this->addr2;
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
     * Get the [state] column value.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
     * Get the [cellphone] column value.
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
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
     * Get the [source] column value.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
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
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [typecode] column value.
     *
     * @return string
     */
    public function getTypecode()
    {
        return $this->typecode;
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
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [arcontact] column value.
     *
     * @return string
     */
    public function getArcontact()
    {
        return $this->arcontact;
    }

    /**
     * Get the [dunningcontact] column value.
     *
     * @return string
     */
    public function getDunningcontact()
    {
        return $this->dunningcontact;
    }

    /**
     * Get the [buyingcontact] column value.
     *
     * @return string
     */
    public function getBuyingcontact()
    {
        return $this->buyingcontact;
    }

    /**
     * Get the [certcontact] column value.
     *
     * @return string
     */
    public function getCertcontact()
    {
        return $this->certcontact;
    }

    /**
     * Get the [ackcontact] column value.
     *
     * @return string
     */
    public function getAckcontact()
    {
        return $this->ackcontact;
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
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[CustindexTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[CustindexTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[CustindexTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [splogin1] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setSplogin1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->splogin1 !== $v) {
            $this->splogin1 = $v;
            $this->modifiedColumns[CustindexTableMap::COL_SPLOGIN1] = true;
        }

        return $this;
    } // setSplogin1()

    /**
     * Set the value of [splogin2] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setSplogin2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->splogin2 !== $v) {
            $this->splogin2 = $v;
            $this->modifiedColumns[CustindexTableMap::COL_SPLOGIN2] = true;
        }

        return $this;
    } // setSplogin2()

    /**
     * Set the value of [splogin3] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setSplogin3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->splogin3 !== $v) {
            $this->splogin3 = $v;
            $this->modifiedColumns[CustindexTableMap::COL_SPLOGIN3] = true;
        }

        return $this;
    } // setSplogin3()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[CustindexTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[CustindexTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[CustindexTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [addr1] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setAddr1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addr1 !== $v) {
            $this->addr1 = $v;
            $this->modifiedColumns[CustindexTableMap::COL_ADDR1] = true;
        }

        return $this;
    } // setAddr1()

    /**
     * Set the value of [addr2] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setAddr2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addr2 !== $v) {
            $this->addr2 = $v;
            $this->modifiedColumns[CustindexTableMap::COL_ADDR2] = true;
        }

        return $this;
    } // setAddr2()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[CustindexTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [state] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[CustindexTableMap::COL_STATE] = true;
        }

        return $this;
    } // setState()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[CustindexTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[CustindexTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [cellphone] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setCellphone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cellphone !== $v) {
            $this->cellphone = $v;
            $this->modifiedColumns[CustindexTableMap::COL_CELLPHONE] = true;
        }

        return $this;
    } // setCellphone()

    /**
     * Set the value of [contact] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setContact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact !== $v) {
            $this->contact = $v;
            $this->modifiedColumns[CustindexTableMap::COL_CONTACT] = true;
        }

        return $this;
    } // setContact()

    /**
     * Set the value of [source] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setSource($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->source !== $v) {
            $this->source = $v;
            $this->modifiedColumns[CustindexTableMap::COL_SOURCE] = true;
        }

        return $this;
    } // setSource()

    /**
     * Set the value of [extension] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setExtension($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->extension !== $v) {
            $this->extension = $v;
            $this->modifiedColumns[CustindexTableMap::COL_EXTENSION] = true;
        }

        return $this;
    } // setExtension()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[CustindexTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [typecode] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setTypecode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->typecode !== $v) {
            $this->typecode = $v;
            $this->modifiedColumns[CustindexTableMap::COL_TYPECODE] = true;
        }

        return $this;
    } // setTypecode()

    /**
     * Set the value of [faxnbr] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setFaxnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->faxnbr !== $v) {
            $this->faxnbr = $v;
            $this->modifiedColumns[CustindexTableMap::COL_FAXNBR] = true;
        }

        return $this;
    } // setFaxnbr()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[CustindexTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [arcontact] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setArcontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->arcontact !== $v) {
            $this->arcontact = $v;
            $this->modifiedColumns[CustindexTableMap::COL_ARCONTACT] = true;
        }

        return $this;
    } // setArcontact()

    /**
     * Set the value of [dunningcontact] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setDunningcontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dunningcontact !== $v) {
            $this->dunningcontact = $v;
            $this->modifiedColumns[CustindexTableMap::COL_DUNNINGCONTACT] = true;
        }

        return $this;
    } // setDunningcontact()

    /**
     * Set the value of [buyingcontact] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setBuyingcontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->buyingcontact !== $v) {
            $this->buyingcontact = $v;
            $this->modifiedColumns[CustindexTableMap::COL_BUYINGCONTACT] = true;
        }

        return $this;
    } // setBuyingcontact()

    /**
     * Set the value of [certcontact] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setCertcontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->certcontact !== $v) {
            $this->certcontact = $v;
            $this->modifiedColumns[CustindexTableMap::COL_CERTCONTACT] = true;
        }

        return $this;
    } // setCertcontact()

    /**
     * Set the value of [ackcontact] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setAckcontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ackcontact !== $v) {
            $this->ackcontact = $v;
            $this->modifiedColumns[CustindexTableMap::COL_ACKCONTACT] = true;
        }

        return $this;
    } // setAckcontact()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Custindex The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[CustindexTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CustindexTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CustindexTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CustindexTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CustindexTableMap::translateFieldName('Splogin1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->splogin1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CustindexTableMap::translateFieldName('Splogin2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->splogin2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CustindexTableMap::translateFieldName('Splogin3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->splogin3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CustindexTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CustindexTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CustindexTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CustindexTableMap::translateFieldName('Addr1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->addr1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CustindexTableMap::translateFieldName('Addr2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->addr2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CustindexTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CustindexTableMap::translateFieldName('State', TableMap::TYPE_PHPNAME, $indexType)];
            $this->state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CustindexTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CustindexTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CustindexTableMap::translateFieldName('Cellphone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cellphone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CustindexTableMap::translateFieldName('Contact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CustindexTableMap::translateFieldName('Source', TableMap::TYPE_PHPNAME, $indexType)];
            $this->source = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CustindexTableMap::translateFieldName('Extension', TableMap::TYPE_PHPNAME, $indexType)];
            $this->extension = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : CustindexTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : CustindexTableMap::translateFieldName('Typecode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->typecode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : CustindexTableMap::translateFieldName('Faxnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->faxnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : CustindexTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : CustindexTableMap::translateFieldName('Arcontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->arcontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : CustindexTableMap::translateFieldName('Dunningcontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dunningcontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : CustindexTableMap::translateFieldName('Buyingcontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->buyingcontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : CustindexTableMap::translateFieldName('Certcontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->certcontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : CustindexTableMap::translateFieldName('Ackcontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ackcontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : CustindexTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 29; // 29 = CustindexTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Custindex'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CustindexTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCustindexQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Custindex::setDeleted()
     * @see Custindex::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustindexTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCustindexQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustindexTableMap::DATABASE_NAME);
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
                CustindexTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(CustindexTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SPLOGIN1)) {
            $modifiedColumns[':p' . $index++]  = 'splogin1';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SPLOGIN2)) {
            $modifiedColumns[':p' . $index++]  = 'splogin2';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SPLOGIN3)) {
            $modifiedColumns[':p' . $index++]  = 'splogin3';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ADDR1)) {
            $modifiedColumns[':p' . $index++]  = 'addr1';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ADDR2)) {
            $modifiedColumns[':p' . $index++]  = 'addr2';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'state';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'zip';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CELLPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cellphone';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'contact';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SOURCE)) {
            $modifiedColumns[':p' . $index++]  = 'source';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_EXTENSION)) {
            $modifiedColumns[':p' . $index++]  = 'extension';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_TYPECODE)) {
            $modifiedColumns[':p' . $index++]  = 'typecode';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_FAXNBR)) {
            $modifiedColumns[':p' . $index++]  = 'faxnbr';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ARCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'arcontact';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_DUNNINGCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'dunningcontact';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_BUYINGCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'buyingcontact';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CERTCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'certcontact';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ACKCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'ackcontact';
        }
        if ($this->isColumnModified(CustindexTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO custindex (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'recno':
                        $stmt->bindValue($identifier, $this->recno, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
                        break;
                    case 'splogin1':
                        $stmt->bindValue($identifier, $this->splogin1, PDO::PARAM_STR);
                        break;
                    case 'splogin2':
                        $stmt->bindValue($identifier, $this->splogin2, PDO::PARAM_STR);
                        break;
                    case 'splogin3':
                        $stmt->bindValue($identifier, $this->splogin3, PDO::PARAM_STR);
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
                    case 'addr1':
                        $stmt->bindValue($identifier, $this->addr1, PDO::PARAM_STR);
                        break;
                    case 'addr2':
                        $stmt->bindValue($identifier, $this->addr2, PDO::PARAM_STR);
                        break;
                    case 'city':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'state':
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case 'zip':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'cellphone':
                        $stmt->bindValue($identifier, $this->cellphone, PDO::PARAM_STR);
                        break;
                    case 'contact':
                        $stmt->bindValue($identifier, $this->contact, PDO::PARAM_STR);
                        break;
                    case 'source':
                        $stmt->bindValue($identifier, $this->source, PDO::PARAM_STR);
                        break;
                    case 'extension':
                        $stmt->bindValue($identifier, $this->extension, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'typecode':
                        $stmt->bindValue($identifier, $this->typecode, PDO::PARAM_STR);
                        break;
                    case 'faxnbr':
                        $stmt->bindValue($identifier, $this->faxnbr, PDO::PARAM_STR);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'arcontact':
                        $stmt->bindValue($identifier, $this->arcontact, PDO::PARAM_STR);
                        break;
                    case 'dunningcontact':
                        $stmt->bindValue($identifier, $this->dunningcontact, PDO::PARAM_STR);
                        break;
                    case 'buyingcontact':
                        $stmt->bindValue($identifier, $this->buyingcontact, PDO::PARAM_STR);
                        break;
                    case 'certcontact':
                        $stmt->bindValue($identifier, $this->certcontact, PDO::PARAM_STR);
                        break;
                    case 'ackcontact':
                        $stmt->bindValue($identifier, $this->ackcontact, PDO::PARAM_STR);
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
        $pos = CustindexTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRecno();
                break;
            case 1:
                return $this->getDate();
                break;
            case 2:
                return $this->getTime();
                break;
            case 3:
                return $this->getSplogin1();
                break;
            case 4:
                return $this->getSplogin2();
                break;
            case 5:
                return $this->getSplogin3();
                break;
            case 6:
                return $this->getCustid();
                break;
            case 7:
                return $this->getShiptoid();
                break;
            case 8:
                return $this->getName();
                break;
            case 9:
                return $this->getAddr1();
                break;
            case 10:
                return $this->getAddr2();
                break;
            case 11:
                return $this->getCity();
                break;
            case 12:
                return $this->getState();
                break;
            case 13:
                return $this->getZip();
                break;
            case 14:
                return $this->getPhone();
                break;
            case 15:
                return $this->getCellphone();
                break;
            case 16:
                return $this->getContact();
                break;
            case 17:
                return $this->getSource();
                break;
            case 18:
                return $this->getExtension();
                break;
            case 19:
                return $this->getEmail();
                break;
            case 20:
                return $this->getTypecode();
                break;
            case 21:
                return $this->getFaxnbr();
                break;
            case 22:
                return $this->getTitle();
                break;
            case 23:
                return $this->getArcontact();
                break;
            case 24:
                return $this->getDunningcontact();
                break;
            case 25:
                return $this->getBuyingcontact();
                break;
            case 26:
                return $this->getCertcontact();
                break;
            case 27:
                return $this->getAckcontact();
                break;
            case 28:
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

        if (isset($alreadyDumpedObjects['Custindex'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Custindex'][$this->hashCode()] = true;
        $keys = CustindexTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRecno(),
            $keys[1] => $this->getDate(),
            $keys[2] => $this->getTime(),
            $keys[3] => $this->getSplogin1(),
            $keys[4] => $this->getSplogin2(),
            $keys[5] => $this->getSplogin3(),
            $keys[6] => $this->getCustid(),
            $keys[7] => $this->getShiptoid(),
            $keys[8] => $this->getName(),
            $keys[9] => $this->getAddr1(),
            $keys[10] => $this->getAddr2(),
            $keys[11] => $this->getCity(),
            $keys[12] => $this->getState(),
            $keys[13] => $this->getZip(),
            $keys[14] => $this->getPhone(),
            $keys[15] => $this->getCellphone(),
            $keys[16] => $this->getContact(),
            $keys[17] => $this->getSource(),
            $keys[18] => $this->getExtension(),
            $keys[19] => $this->getEmail(),
            $keys[20] => $this->getTypecode(),
            $keys[21] => $this->getFaxnbr(),
            $keys[22] => $this->getTitle(),
            $keys[23] => $this->getArcontact(),
            $keys[24] => $this->getDunningcontact(),
            $keys[25] => $this->getBuyingcontact(),
            $keys[26] => $this->getCertcontact(),
            $keys[27] => $this->getAckcontact(),
            $keys[28] => $this->getDummy(),
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
     * @return $this|\Custindex
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CustindexTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Custindex
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRecno($value);
                break;
            case 1:
                $this->setDate($value);
                break;
            case 2:
                $this->setTime($value);
                break;
            case 3:
                $this->setSplogin1($value);
                break;
            case 4:
                $this->setSplogin2($value);
                break;
            case 5:
                $this->setSplogin3($value);
                break;
            case 6:
                $this->setCustid($value);
                break;
            case 7:
                $this->setShiptoid($value);
                break;
            case 8:
                $this->setName($value);
                break;
            case 9:
                $this->setAddr1($value);
                break;
            case 10:
                $this->setAddr2($value);
                break;
            case 11:
                $this->setCity($value);
                break;
            case 12:
                $this->setState($value);
                break;
            case 13:
                $this->setZip($value);
                break;
            case 14:
                $this->setPhone($value);
                break;
            case 15:
                $this->setCellphone($value);
                break;
            case 16:
                $this->setContact($value);
                break;
            case 17:
                $this->setSource($value);
                break;
            case 18:
                $this->setExtension($value);
                break;
            case 19:
                $this->setEmail($value);
                break;
            case 20:
                $this->setTypecode($value);
                break;
            case 21:
                $this->setFaxnbr($value);
                break;
            case 22:
                $this->setTitle($value);
                break;
            case 23:
                $this->setArcontact($value);
                break;
            case 24:
                $this->setDunningcontact($value);
                break;
            case 25:
                $this->setBuyingcontact($value);
                break;
            case 26:
                $this->setCertcontact($value);
                break;
            case 27:
                $this->setAckcontact($value);
                break;
            case 28:
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
        $keys = CustindexTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRecno($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDate($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTime($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSplogin1($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setSplogin2($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSplogin3($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCustid($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setShiptoid($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setName($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAddr1($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setAddr2($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCity($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setState($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setZip($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPhone($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCellphone($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setContact($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSource($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setExtension($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setEmail($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTypecode($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setFaxnbr($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setTitle($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setArcontact($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setDunningcontact($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setBuyingcontact($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setCertcontact($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setAckcontact($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setDummy($arr[$keys[28]]);
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
     * @return $this|\Custindex The current object, for fluid interface
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
        $criteria = new Criteria(CustindexTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CustindexTableMap::COL_RECNO)) {
            $criteria->add(CustindexTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_DATE)) {
            $criteria->add(CustindexTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_TIME)) {
            $criteria->add(CustindexTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SPLOGIN1)) {
            $criteria->add(CustindexTableMap::COL_SPLOGIN1, $this->splogin1);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SPLOGIN2)) {
            $criteria->add(CustindexTableMap::COL_SPLOGIN2, $this->splogin2);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SPLOGIN3)) {
            $criteria->add(CustindexTableMap::COL_SPLOGIN3, $this->splogin3);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CUSTID)) {
            $criteria->add(CustindexTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SHIPTOID)) {
            $criteria->add(CustindexTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_NAME)) {
            $criteria->add(CustindexTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ADDR1)) {
            $criteria->add(CustindexTableMap::COL_ADDR1, $this->addr1);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ADDR2)) {
            $criteria->add(CustindexTableMap::COL_ADDR2, $this->addr2);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CITY)) {
            $criteria->add(CustindexTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_STATE)) {
            $criteria->add(CustindexTableMap::COL_STATE, $this->state);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ZIP)) {
            $criteria->add(CustindexTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_PHONE)) {
            $criteria->add(CustindexTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CELLPHONE)) {
            $criteria->add(CustindexTableMap::COL_CELLPHONE, $this->cellphone);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CONTACT)) {
            $criteria->add(CustindexTableMap::COL_CONTACT, $this->contact);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_SOURCE)) {
            $criteria->add(CustindexTableMap::COL_SOURCE, $this->source);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_EXTENSION)) {
            $criteria->add(CustindexTableMap::COL_EXTENSION, $this->extension);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_EMAIL)) {
            $criteria->add(CustindexTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_TYPECODE)) {
            $criteria->add(CustindexTableMap::COL_TYPECODE, $this->typecode);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_FAXNBR)) {
            $criteria->add(CustindexTableMap::COL_FAXNBR, $this->faxnbr);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_TITLE)) {
            $criteria->add(CustindexTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ARCONTACT)) {
            $criteria->add(CustindexTableMap::COL_ARCONTACT, $this->arcontact);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_DUNNINGCONTACT)) {
            $criteria->add(CustindexTableMap::COL_DUNNINGCONTACT, $this->dunningcontact);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_BUYINGCONTACT)) {
            $criteria->add(CustindexTableMap::COL_BUYINGCONTACT, $this->buyingcontact);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_CERTCONTACT)) {
            $criteria->add(CustindexTableMap::COL_CERTCONTACT, $this->certcontact);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_ACKCONTACT)) {
            $criteria->add(CustindexTableMap::COL_ACKCONTACT, $this->ackcontact);
        }
        if ($this->isColumnModified(CustindexTableMap::COL_DUMMY)) {
            $criteria->add(CustindexTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildCustindexQuery::create();
        $criteria->add(CustindexTableMap::COL_RECNO, $this->recno);

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
        $validPk = null !== $this->getRecno();

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
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getRecno();
    }

    /**
     * Generic method to set the primary key (recno column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRecno($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getRecno();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Custindex (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRecno($this->getRecno());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setSplogin1($this->getSplogin1());
        $copyObj->setSplogin2($this->getSplogin2());
        $copyObj->setSplogin3($this->getSplogin3());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setName($this->getName());
        $copyObj->setAddr1($this->getAddr1());
        $copyObj->setAddr2($this->getAddr2());
        $copyObj->setCity($this->getCity());
        $copyObj->setState($this->getState());
        $copyObj->setZip($this->getZip());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setCellphone($this->getCellphone());
        $copyObj->setContact($this->getContact());
        $copyObj->setSource($this->getSource());
        $copyObj->setExtension($this->getExtension());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setTypecode($this->getTypecode());
        $copyObj->setFaxnbr($this->getFaxnbr());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setArcontact($this->getArcontact());
        $copyObj->setDunningcontact($this->getDunningcontact());
        $copyObj->setBuyingcontact($this->getBuyingcontact());
        $copyObj->setCertcontact($this->getCertcontact());
        $copyObj->setAckcontact($this->getAckcontact());
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
     * @return \Custindex Clone of current object.
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
        $this->recno = null;
        $this->date = null;
        $this->time = null;
        $this->splogin1 = null;
        $this->splogin2 = null;
        $this->splogin3 = null;
        $this->custid = null;
        $this->shiptoid = null;
        $this->name = null;
        $this->addr1 = null;
        $this->addr2 = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->phone = null;
        $this->cellphone = null;
        $this->contact = null;
        $this->source = null;
        $this->extension = null;
        $this->email = null;
        $this->typecode = null;
        $this->faxnbr = null;
        $this->title = null;
        $this->arcontact = null;
        $this->dunningcontact = null;
        $this->buyingcontact = null;
        $this->certcontact = null;
        $this->ackcontact = null;
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
        return (string) $this->exportTo(CustindexTableMap::DEFAULT_STRING_FORMAT);
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
