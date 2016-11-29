<?php

namespace Driven\Listings\Model;

use Pagekit\Application as App;
use Pagekit\Database\ORM\ModelTrait;

/**
 * @Entity(tableClass="@listings_template")
 */
class Template
{
    use ModelTrait;

    /** @Column(type="integer") @Id */
    public $id;

    /** @Column(type="integer") */
    public $created_by;

    /** @Column(type="integer") */
    public $created_on;

    /** @Column(type="integer") */
    public $modified_by;

    /** @Column(type="integer") */
    public $modified_on;

    /** @Column(type="string") */
    public $title;

    /** @Column(type="string") */
    public $description;

    /** @Column(type="string") */
    public $html;

    /** @Column(type="smallint") */
    public $editable;

    /** @Column(type="smallint") */
    public $locked;

    /**
     * @BelongsTo(targetEntity="Pagekit\User\Model\User", keyFrom="created_by")
     */
    public $creator;

    /**
     * @BelongsTo(targetEntity="Pagekit\User\Model\User", keyFrom="modified_by")
     */
    public $editor;

    /** @var array */
    protected static $properties = [
        'editor' => 'getEditor',
        'creator' => 'getCreator'
    ];

    public function getEditor()
    {
        return $this->user ? $this->user->username : null;
    }
}
