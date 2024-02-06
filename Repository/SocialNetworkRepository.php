<?php
/*
 * This file is part of the Austral SocialNetwork Bundle package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\SocialNetworkBundle\Repository;

use Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkInterface;
use Austral\EntityBundle\Repository\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;

/**
 * App SocialNetwork Repository.
 * @author Matthieu Beurel <matthieu@austral.dev>
 * @final
 */
class SocialNetworkRepository extends EntityRepository
{

  /**
   * @param string $keyname
   * @param \Closure|null $closure
   *
   * @return SocialNetworkInterface|null
   * @throws NonUniqueResultException
   */
  public function retreiveByKeyname(string $keyname, \Closure $closure = null): ?SocialNetworkInterface
  {
    return $this->retreiveByKey("keyname", $keyname, $closure);
  }



  /**
   * @param $name
   * @param QueryBuilder $queryBuilder
   *
   * @return QueryBuilder
   */
  public function queryBuilderExtends($name, QueryBuilder $queryBuilder): QueryBuilder
  {
    if (strpos($name, "count") === false) {
      $queryBuilder->leftJoin('root.translates', 'translates')->addSelect('translates');
    }
    return $queryBuilder;
  }

}
