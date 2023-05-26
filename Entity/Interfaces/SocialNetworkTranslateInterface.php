<?php
/*
 * This file is part of the Austral SocialNetwork Bundle package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\SocialNetworkBundle\Entity\Interfaces;

/**
 * Austral SocialNetworkTranslate Interface.
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface SocialNetworkTranslateInterface
{

  /**
   * @return string|null
   */
  public function getUrl(): ?string;

  /**
   * @param string|null $url
   *
   * @return SocialNetworkTranslateInterface
   */
  public function setUrl(?string $url): SocialNetworkTranslateInterface;

}
