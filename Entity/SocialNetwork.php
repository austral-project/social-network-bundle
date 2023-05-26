<?php
/*
 * This file is part of the Austral SocialNetwork Bundle package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\SocialNetworkBundle\Entity;
use Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkInterface;

use Austral\EntityBundle\Entity\Entity;
use Austral\EntityBundle\Entity\EntityInterface;
use Austral\EntityBundle\Entity\Traits\EntityTimestampableTrait;
use Austral\EntityBundle\Entity\Interfaces\TranslateMasterInterface;
use Austral\EntityFileBundle\Entity\Traits\EntityFileCropperTrait;
use Austral\EntityTranslateBundle\Entity\Traits\EntityTranslateMasterTrait;
use Austral\EntityTranslateBundle\Annotation\Translate;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Austral\HttpBundle\Annotation\DomainFilter;
use Austral\HttpBundle\Entity\Traits\FilterByDomainTrait;
use Austral\EntityBundle\Entity\Interfaces\FileInterface;
use Austral\EntityFileBundle\Entity\Traits\EntityFileTrait;
use Austral\EntityFileBundle\Annotation as AustralFile;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App SocialNetwork Entity.
 * @author Matthieu Beurel <matthieu@austral.dev>
 * @abstract
 * @Translate(relationClass="Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkTranslateInterface")
 * @DomainFilter(forAllDomainEnabled=true, autoDomainId=true)
 * @ORM\MappedSuperclass
 */
abstract class SocialNetwork extends Entity implements SocialNetworkInterface, EntityInterface, TranslateMasterInterface, FileInterface
{

  use EntityTimestampableTrait;
  use EntityTranslateMasterTrait;
  use FilterByDomainTrait;
  use EntityFileTrait;
  use EntityFileCropperTrait;
  
  /**
   * @var string
   * @ORM\Column(name="id", type="string", length=40)
   * @ORM\Id
   */
  protected $id;

  /**
   * @ORM\OneToMany(targetEntity="Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkTranslateInterface", mappedBy="master", cascade={"persist", "remove"})
   */
  protected Collection $translates;
  
  /**
   * @var string|null
   * @ORM\Column(name="name", type="string", length=255, nullable=true )
   */
  protected ?string $name = null;
  
  /**
   * @var string|null
   * @ORM\Column(name="keyname", type="string", length=255, nullable=true )
   */
  protected ?string $keyname = null;

  /**
   * @var boolean
   * @ORM\Column(name="is_active", type="boolean", nullable=true)
   */
  protected bool $isActive = false;

  /**
   * @var string|null
   * @ORM\Column(name="simple_icon", type="string", length=255, nullable=true )
   */
  protected ?string $simpleIcon = null;

  /**
   * @var string|null
   * @ORM\Column(name="picto", type="string", length=255, nullable=true)
   * @AustralFile\UploadParameters(configName="social_network_picto", virtualnameField="pictoReelname")
   * @AustralFile\ImageSize()
   * @AustralFile\Croppers({
   *  "social_network_picto",
   * })
   */
  protected ?string $picto = null;

  /**
   * @var string|null
   * @ORM\Column(name="picto_reelname", type="string", length=255, nullable=true)
   */
  protected ?string $pictoReelname = null;

  /**
   * @var string|null
   * @ORM\Column(name="picto_alt", type="string", length=255, nullable=true)
   */
  protected ?string $pictoAlt = null;
  
  /**
   * SocialNetwork constructor
   * @throws \Exception
   */
  public function __construct()
  {
    parent::__construct();
    $this->id = Uuid::uuid4()->toString();
    $this->translates = new ArrayCollection();
  }

  /**
   * @return string
   * @throws \Exception
   */
  public function __toString()
  {
    return $this->getTranslateCurrent() ? $this->getTranslateCurrent()->__toString() : "";
  }

  /**
   * @return string|null
   */
  public function getName(): ?string
  {
    return $this->name;
  }

  /**
   * @param string|null $name
   *
   * @return SocialNetworkInterface
   */
  public function setName(?string $name): SocialNetworkInterface
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getKeyname(): ?string
  {
    return $this->keyname;
  }

  /**
   * @param string|null $keyname
   *
   * @return SocialNetworkInterface
   */
  public function setKeyname(?string $keyname): SocialNetworkInterface
  {
    $this->keyname = $keyname;
    return $this;
  }

  /**
   * @return bool
   */
  public function getIsActive(): bool
  {
    return $this->isActive;
  }

  /**
   * @param bool $isActive
   *
   * @return SocialNetworkInterface
   */
  public function setIsActive(bool $isActive): SocialNetworkInterface
  {
    $this->isActive = $isActive;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getSimpleIcon(): ?string
  {
    return $this->simpleIcon;
  }

  /**
   * @param string|null $simpleIcon
   *
   * @return SocialNetworkInterface
   */
  public function setSimpleIcon(?string $simpleIcon): SocialNetworkInterface
  {
    $this->simpleIcon = $simpleIcon;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getPicto(): ?string
  {
    return $this->picto;
  }

  /**
   * @param string|null $picto
   *
   * @return SocialNetworkInterface
   */
  public function setPicto(?string $picto): SocialNetworkInterface
  {
    $this->picto = $picto;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getPictoReelname(): ?string
  {
    return $this->pictoReelname;
  }

  /**
   * @param string|null $pictoReelname
   *
   * @return SocialNetworkInterface
   */
  public function setPictoReelname(?string $pictoReelname): SocialNetworkInterface
  {
    $this->pictoReelname = $pictoReelname;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getPictoAlt(): ?string
  {
    return $this->pictoAlt;
  }

  /**
   * @param string|null $pictoAlt
   *
   * @return SocialNetworkInterface
   */
  public function setPictoAlt(?string $pictoAlt): SocialNetworkInterface
  {
    $this->pictoAlt = $pictoAlt;
    return $this;
  }

}
