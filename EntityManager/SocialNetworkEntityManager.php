<?php
/*
 * This file is part of the Austral SocialNetwork Bundle package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\SocialNetworkBundle\EntityManager;

use Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkInterface;
use Austral\EntityBundle\Entity\Interfaces\TranslateMasterInterface;
use Austral\SocialNetworkBundle\Repository\SocialNetworkRepository;

use Austral\EntityBundle\EntityManager\EntityManager;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Austral SocialNetwork EntityManager.
 * @author Matthieu Beurel <matthieu@austral.dev>
 * @final
 */
class SocialNetworkEntityManager extends EntityManager
{

  /**
   * @var SocialNetworkRepository
   */
  protected $repository;

  /**
   * @param array $values
   *
   * @return SocialNetworkInterface
   */
  public function create(array $values = array()): SocialNetworkInterface
  {
    /** @var SocialNetworkInterface|TranslateMasterInterface $object */
    $object = parent::create($values);
    $object->setCurrentLanguage($this->currentLanguage);
    $object->createNewTranslateByLanguage();
    return $object;
  }

  /**
   * @param $keyname
   * @param \Closure|null $closure
   *
   * @return SocialNetworkInterface|null
   * @throws NonUniqueResultException
   */
  public function retreiveByKeyname($keyname, \Closure $closure = null): ?SocialNetworkInterface
  {
    return $this->repository->retreiveByKeyname($keyname, $closure);
  }

}

