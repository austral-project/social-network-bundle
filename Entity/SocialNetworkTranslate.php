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
use Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkTranslateInterface;

use Austral\EntityBundle\Entity\Entity;
use Austral\EntityBundle\Entity\EntityInterface;
use Austral\EntityBundle\Entity\Traits\EntityTimestampableTrait;
use Austral\EntityBundle\Entity\Interfaces\TranslateMasterInterface;
use Austral\EntityBundle\Entity\Interfaces\TranslateChildInterface;
use Austral\EntityTranslateBundle\Entity\Traits\EntityTranslateChildTrait;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App SocialNetworkTranslate Entity.
 * @author Matthieu Beurel <matthieu@austral.dev>
 * @abstract
 * @ORM\MappedSuperclass
 */
abstract class SocialNetworkTranslate extends Entity implements SocialNetworkTranslateInterface, EntityInterface, TranslateChildInterface
{

  use EntityTimestampableTrait;
  use EntityTranslateChildTrait;
  
  /**
   * @var string
   * @ORM\Column(name="id", type="string", length=40)
   * @ORM\Id
   */
  protected $id;

  /**
   * @var SocialNetworkTranslate|TranslateMasterInterface
   *
   * @ORM\ManyToOne(targetEntity="Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkInterface", inversedBy="translates", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="master_id", referencedColumnName="id")
   */
  protected TranslateMasterInterface $master;
  
  /**
   * @var string|null
   * @ORM\Column(name="url", type="string", length=255, nullable=true )
   */
  protected ?string $url = null;
  
  /**
   * SocialNetworkTranslate constructor
   * @throws \Exception
   */
  public function __construct()
  {
    parent::__construct();
    $this->id = Uuid::uuid4()->toString();
    
  }

  /**
   * @return string
   * @throws \Exception
   */
  public function __toString()
  {
    return $this->id;
  }

  /**
   * @return string|null
   */
  public function getUrl(): ?string
  {
    return $this->url;
  }

  /**
   * @param string|null $url
   *
   * @return SocialNetworkTranslateInterface
   */
  public function setUrl(?string $url): SocialNetworkTranslateInterface
  {
    $this->url = $url;
    return $this;
  }

}
